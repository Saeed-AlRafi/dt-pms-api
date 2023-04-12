<?php

namespace Api\Controllers\v1;
use Api\Controllers\MC;
use Mamluk\Kipchak\Components\Controllers;
use Mamluk\Kipchak\Components\Http;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Api\Entities\Doctrine\Primary;
use Api\Models\myfunctions;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ObjectRepository;

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
 
    public function get(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $pid = Http\Request::getAttribute($request, 'pid');
        
        
        $p = $this->em->getRepository(Primary\patient::class)->findOneBy(['id' => $pid]);
        if(is_null($p)){
            return Http\Response::json($response,
               'incorrect ID',
            400
        );
        }
        var_dump($p->getpatient());
        //$pobj = new 

        return Http\Response::json($response,
               $p,
            200
        );

    }
    public function deletepatient(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $payload = $request->getParsedBody();
        // ???
    }

    
    public function createpatient(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // Read the body.

        $payload = $request->getParsedBody(); //get the payload

        $patientinfo = $payload['patientinfo']; //take the patient info from the payload into object
        $contactinfo = $patientinfo['contactinfo']; //take the contact info from patient info object to a contact info object
        // $caretakerinfo = $payload['caretakerinfo'];

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

    
}