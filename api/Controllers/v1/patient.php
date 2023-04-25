<?php

namespace Api\Controllers\v1;
use Api\Controllers\MC;
use Api\DataTransferObjects\v1\caretakerinfoDTO;
use Api\DataTransferObjects\v1\contactinfoDTO;
use Api\DataTransferObjects\v1\patientinfoDTO;
use Api\DataTransferObjects\v1\patientDTO;
use Api\DataTransferObjects\v1\vitalsDTO;
use Mamluk\Kipchak\Components\Controllers;
use Mamluk\Kipchak\Components\Http;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Api\Entities\Doctrine\Primary;
use Api\Models\myfunctions;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ObjectRepository;
use Exception;
use Symfony\Component\VarDumper\VarDumper;

/**
 * All Controllers extending Controllers\Slim Contain the Service / DI Container as a protected property called $container.
 * Access it using $this->container in your controller.
 * Default objects bundled into a container are:
 * logger - which returns an instance of \Monolog\Logger. This is also a protected property on your controller. Access it using $this->logger.
 * 
 * "CHUEEESDAY INNNIT"
 *              - Some British fella (circa always and everywhere)
 */

 class patient extends MC
 {
 
    public function getpatientinfo(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $pid = Http\Request::getAttribute($request, 'pid');
        
        
        $p = $this->em->getRepository(Primary\patient::class)->findOneBy(['id' => $pid]);
        if(is_null($p)){
            return Http\Response::json($response,
               'Invalid ID',
            400
        );
        }
        $pi = $p->getpatientinfo();
        $ci= $pi->getContactinfo();
        //$ca = $p->getCaretakerinfo();
        //$v = $p->getVitals();
        
        $cidto =  new contactinfoDTO($ci->getPhone(),$ci->getEmail(),$ci->getAddress());
        //$caidto = new caretakerinfoDTO($ca->getCtname(),$ca->getCtphone(),$ca->getCtemail());
        $pidto = new patientinfoDTO($pi->getName(), $pi->getAge(), $pi->getGender(), $cidto);
        //$vdto = new vitalsDTO($v->getBloodsugar(), $v->getO2(), $v->getHeartrate(),$v->getTemperature(),$v->getBloodpressure(),$v->getDate());
        //$pdto = new patientDTO($pid, $pidto, $vdto, $caidto);

        return Http\Response::json($response,
                $pidto,
            200
        );

    }
    public function deletepatient(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $pid = Http\Request::getAttribute($request, 'pid');

        $p = $this->em->getRepository(Primary\patient::class)->findOneBy(['id' => $pid]);

        if(is_null($p)){
            return Http\Response::json($response,'Invalid ID',400);
        }

        $pi = $this->em->getRepository(Primary\patientinfo::class)->findOneBy(['id' => $pid]);;
        $ci = $this->em->getRepository(Primary\contactinfo::class)->findOneBy(['id' => $pid]);
        $ca = $this->em->getRepository(Primary\caretakerinfo::class)->findOneBy(['id' => $pid]);
        $vi = $this->em->getRepository(Primary\vitals::class)->findAll(['id' => $pid]);
        //$pi->setName(null);
        //$pi->setGender(null);
        //$pi->setAge(null);
        //$ci->setPhone(null);
        //$ci->setAddress(null);
        //$ci->setEmail(null);
        //$pi->setContactinfo(null);
        //$ca->setCtemail(null);
        //$ca->setCtname(null);
        //$ca->setCtphone(null);
       
       
   
        $p->setPatientinfo(null);
        $p->setCaretakerinfo(null);
        
        if(!is_null($ci))
            $this->em->remove($ci);
        echo 'check1';

        if(!is_null($pi))
            $this->em->remove($pi);
        echo 'check2';

        if(!is_null($vi))
            foreach ($vi as $v){
                $this->em->remove($v);//must get all vitals then do remove every vital
            } 
        echo 'check3';

        if(!is_null($ca))
            $this->em->persist($ca);
        echo 'check4';
        
        $this->em->remove($p);
        echo 'check5';


        $this->em->flush();//flush

         return Http\Response::json($response,'Patient removed?',200);
    }

    
    public function createpatient(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // Read the body.

        $payload = $request->getParsedBody(); //get the payload

        $patientinfo = $payload['patientinfo']; //take the patient info from the payload into object
        $contactinfo = $patientinfo['contactinfo']; //take the contact info from patient info object to a contact info object
        $caretakerinfo = $payload['caretakerinfo'];

        $myfunc = new myfunctions($this->em); //create a my functions object(/api/Models/myfunctions.php). send the entity manager. 
        if($myfunc->isDuplicate($patientinfo['name'], $contactinfo['phone'])){
            return Http\Response::json($response,
            'Duplicate Information.',
            400
            );
        }
        
        $npi = new Primary\patientinfo();//make new patient info and set all variables
        $npi->setName($patientinfo['name']);
        $npi->setAge($patientinfo['age']);
        $npi->setGender($patientinfo['gender']);
         
        $this->em->persist($npi);
        
        $nci = new Primary\contactinfo();//make new contact info and set all the variables.
        $nci->setPhone($contactinfo['phone']);
        $nci->setEmail($contactinfo['email']);
        $nci->setAddress($contactinfo['address']);

        $npi->setContactinfo($nci);//add contact info to patient info, then patient info into a new patient
        
        $np = new Primary\patient();
        $np->setPatientinfo($npi);
       
        $this->em->persist($nci);
        $this->em->persist($np);

        $this->em->flush();//flush

        return Http\Response::json($response,
            [
               'Patient added sucessfully.'
            ],
            200
        );
    }

    public function addcaretaker(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        //check if ID is valid
        $pid = Http\Request::getAttribute($request, 'pid');
        $p = $this->em->getRepository(Primary\patient::class)->findOneBy(['id' => $pid]);
        //check if patient exists
        if(is_null($p)){
            return Http\Response::json($response,'Invalid ID',400);
        }
        //check if patient already has a caretaker.
        if(!is_null($this->em->getRepository(Primary\caretakerinfo::class)->findOneBy(['id' => $pid]))){
            return Http\Response::json($response,'Patient already has care taker',400); 
        }

        //add info
        $payload = $request->getParsedBody();

        $ct = new Primary\caretakerinfo();
        $ct->setCtname($payload['ctname']);
        $ct->setCtemail($payload['ctemail']);
        $ct->setctphone($payload['ctphone']);
        $this->em->persist($ct);
        $this->em->flush();
        return Http\Response::json($response,'caretaker added sucessfully.',200);

    }
    public function getcaretaker(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        
        $pid = Http\Request::getAttribute($request, 'pid');
        
        $p = $this->em->getRepository(Primary\caretakerinfo::class)->findOneBy(['id' => $pid]);
        if(is_null($p)){
            return Http\Response::json($response,
               'Invalid ID',
            400
        );
        }
        //$pi = $p->getpatientinfo();
        //$ci= $pi->getContactinfo();
        //$ca = $p->getCaretakerinfo();
        //$v = $p->getVitals();
        
        //$cidto =  new contactinfoDTO($ci->getPhone(),$ci->getEmail(),$ci->getAddress());
        $cadto = new caretakerinfoDTO($p->getCtname(),$p->getCtphone(),$p->getCtemail());
        //$pidto = new patientinfoDTO($pi->getName(), $pi->getAge(), $pi->getGender(), $cidto);
        //$vdto = new vitalsDTO($v->getBloodsugar(), $v->getO2(), $v->getHeartrate(),$v->getTemperature(),$v->getBloodpressure(),$v->getDate());
        //$pdto = new patientDTO($pid, $pidto, $vdto, $caidto);

        return Http\Response::json($response,
                $cadto,
            200
        );
    }

    public function addvitals(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        //check if ID is valid
        $pid = Http\Request::getAttribute($request, 'pid');
        $p = $this->em->getRepository(Primary\patient::class)->findAllBy(['id' => $pid]);
        var_dump($p);
        exit;
        //check if patient exists
        if(is_null($p)){return Http\Response::json($response,'Invalid ID',400);}
        //check if patient already has a caretaker.
        if(!is_null($this->em->getRepository(Primary\caretakerinfo::class)->findOneBy(['id' => $pid]))){
            return Http\Response::json($response,'Patient already has care taker',400); 
        }


        
        return Http\Response::json($response,'vitals added sucessfully.',200);
    }
    public function getvitalsbydate(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        
        $pid = Http\Request::getAttribute($request, 'pid');
        $vdate = Http\Request::getAttribute($request, 'date');
        
        $p = $this->em->getRepository(Primary\vitals::class)->findOneBy(['id' => $pid, 'date' => $vdate]);
        if(is_null($p)){
            return Http\Response::json($response,
               'Invalid ID or Date',
            400
        );
        }
        //$pi = $p->getpatientinfo();
        //$ci= $pi->getContactinfo(); 
        //$ca = $p->getCaretakerinfo();
        //$v = $p->getVitals();
        
        //$cidto =  new contactinfoDTO($ci->getPhone(),$ci->getEmail(),$ci->getAddress());
        //$cadto = new caretakerinfoDTO($p->getCtname(),$p->getCtphone(),$p->getCtemail());
        //$pidto = new patientinfoDTO($pi->getName(), $pi->getAge(), $pi->getGender(), $cidto);
        $vdto = new vitalsDTO($p->getBloodsugar(), $p->getO2(), $p->getHeartrate(),$p->getTemperature(),$p->getBloodpressure(),$p->getDate());
        //$pdto = new patientDTO($pid, $pidto, $vdto, $caidto);

        return Http\Response::json($response,
                $vdto,
            200
        );
    } //make this return index of date times

}