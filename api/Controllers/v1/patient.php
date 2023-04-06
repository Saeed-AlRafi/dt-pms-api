<?php

namespace Api\Controllers\v1;

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

 class patient extends Controllers\Slim
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

        $payload = $request->getParsedBody();

        var_dump($payload);
        $patientinfo = $payload['patientinfo'];
        $contactinfo = $patientinfo['contactinfo'];
        // $caretakerinfo = $payload['caretakerinfo'];
        
        $npi = new Primary\patientinfo();
        $npi->setName($patientinfo['name']);
        $npi->setAge($patientinfo['age']);
        $npi->setGender($patientinfo['gender']);

        $nci = new Primary\contactinfo();
        $nci->setPhone($contactinfo['phone']);
        $nci->setEmail($contactinfo['email']);
        $nci->setAddress($contactinfo['address']);

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

