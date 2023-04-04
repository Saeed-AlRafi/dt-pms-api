<?php

// api/Entities/Doctrine/Primary/patientinfo.php

namespace Api\Entities\Doctrine\Primary;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="patientinfo")
 **/
class patientinfo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

     /**
     * @ORM\Column(type="string")
     */
    protected $name;
     /**
     * @ORM\Column(type="integer")
     */
    protected $age;
     /**
     * @ORM\Column(type="float")
     */
    protected $gender;
    /**
     * @ORM\OneToOne(targetEntity="contactinfo",inversedBy="patientinfo")
     **/
    protected $contactinfo;
    /**
     * @ORM\OneToOne(targetEntity="patient",mappedBy="patientinfo")
     **/
    protected $patient;

}