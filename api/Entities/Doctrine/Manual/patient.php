<?php

// api/Entities/Doctrine/Primary/patient.php

namespace Api\Entities\Doctrine\Primary;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="patient")
 **/
class patient
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;
     /**
     * @ORM\OneToMany(targetEntity="vitals",inversedBy="patient")
     */
    protected $vitals;
     /**
     * @ORM\OneToOne(targetEntity="patientinfo",inversedBy="patient")
     */
    protected $patientinfo;
     /**
     * @ORM\OneToOne(targetEntity="caretakerinfo",inversedBy="patient")
     */
    protected $caretakerinfo;

}