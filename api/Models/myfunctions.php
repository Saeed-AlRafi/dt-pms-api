<?php

namespace Api\Models;

use Doctrine\ORM\EntityManager;
use Api\Entities\Doctrine\Primary;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\VarDumper\VarDumper;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

/**
 * Class myfunctions
 * @package Api\Models
 */
class myfunctions
{

    private EntityManager $em;

    private ResponseInterface $response;

    public function __construct(EntityManager $em) {

        $this->em = $em;


    }


    public function isDuplicate(string $tname,string $tphone): bool
    {
        
        //$patientInfoParent;
        //$contantInfoParent;
        $nnp = [];
        $nnc = [];


        $pwsn = $this->em->getRepository(Primary\patientinfo::class)->findBy(['name' => $tname]);
        
        $pwsp = $this->em->getRepository(Primary\contactinfo::class)->findBy(['phone' => $tphone]);
        /**
         * @var $i Primary\patientinfo::class
         */
        foreach ($pwsn as $i) {
            $nnp[] = $i->getId();
            echo "2";
        }
        /**
         * @var $x Primary\contactinfo::class
         */
        foreach ($pwsp as $x){
            $nnc[] = $x->getpatientinfo()->getId();
            echo "3";
        }
        $c = array_intersect($nnc, $nnp);

        return !empty($c);
    

    }
}