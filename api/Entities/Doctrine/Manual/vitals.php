<?php

// api/Entities/Doctrine/Primary/vitals.php

namespace Api\Entities\Doctrine\Manual;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="vitals")
 **/
class vitals
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
     /**
     * @ORM\Column(type="float")
     */
    protected $bloodpressure;
     /**
     * @ORM\Column(type="float")
     */
    protected $o2;
     /**
     * @ORM\Column(type="float")
     */
    protected $heartrate;
     /**
     * @ORM\Column(type="float")
     */
    protected $temperature;
     /**
     * @ORM\Column(type="float")
     */
    protected $bloodsugar;
    /**
     * @ORM\ManyToOne(targetEntity="patient",inversedBy="vitals")
     **/
    protected $patient;
    /**
     * @ORM\Column(type="string")
     */
    protected $date;

}