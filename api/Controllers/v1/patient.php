<?php

namespace Api\Controllers\v1;
use Api\Controllers\MC;
use Mamluk\Kipchak\Components\Controllers;
use Mamluk\Kipchak\Components\Http;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Api\Entities\Doctrine\Primary;
/**
 * All Controllers extending Controllers\Slim Contain the Service / DI Container as a protected property called $container.
 * Access it using $this->container in your controller.
 * Default objects bundled into a container are:
 * logger - which returns an instance of \Monolog\Logger. This is also a protected property on your controller. Access it using $this->logger.
 */

 class patient extends MC
 {
 
    public function get(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {


        return Http\Response::json($response,
            [
               'saeed is slow'
            ],
            200
        );

    }
    public function createpatient(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // Read the body.

        $payload = $request->getParsedBody(); //get the payload

        $patientinfo = $payload['patientinfo']; //take the patient info from the payload into object
        $contactinfo = $patientinfo['contactinfo']; //take the contact info from patient info object to a contact info object
        // $caretakerinfo = $payload['caretakerinfo'];
        
        $npi = new Primary\patientinfo();//make new patient info and set all variables
        $npi->setName($patientinfo['name']);
        $npi->setAge($patientinfo['age']);
        $npi->setGender($patientinfo['gender']);
         
        $this->em->persist($npi);
        echo "done";
        
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
        echo "done";
        exit;


        $allpatients = $this->entityManager->getRepository(Primary/patient::class)->findAll();
        if (!($allpatient['name'] == $patientinfo['name'] && $allpatients['email'] == $contactinfo['email']))
        {
            $payload.dump();
        } 
        else
        {
            return "Error: Duplicate information.";
        }
        
        exit;

        return Http\Response::json($response,
            [
               'saeed is not as slow'
            ],
            200
        );

    }
 
 }

