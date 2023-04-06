<?php

// api/Entities/Doctrine/Primary/contactinfo.php

namespace Api\Entities\Doctrine\Manual;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="contactinfo")
 **/
class contactinfo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
     /**
     * @ORM\Column(type="string")
     */
    protected $phone;
     /**
     * @ORM\Column(type="float")
     */
    protected $address;
     /**
     * @ORM\Column(type="float")
     */
    protected $email;
    /**
     * @ORM\OneToOne(targetEntity="patientinfo",mappedBy="contactinfo")
     **/
    protected $patientinfo;
}