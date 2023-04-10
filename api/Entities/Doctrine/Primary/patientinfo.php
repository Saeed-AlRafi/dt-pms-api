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
     * @ORM\GeneratedValue
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
     * @ORM\Column(type="string")
     */
    protected $gender;
    /**
     * @ORM\OneToOne(targetEntity="contactinfo",inversedBy="patientinfo")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     **/
    protected $contactinfo;
    /**
     * @ORM\OneToOne(targetEntity="patient",mappedBy="patientinfo")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     **/
    protected $patient;

    /**
     * Set id.
     *
     * @param int $id
     *
     * @return patientinfo
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return patientinfo
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set age.
     *
     * @param int $age
     *
     * @return patientinfo
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age.
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set gender.
     *
     * @param float $gender
     *
     * @return patientinfo
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender.
     *
     * @return float
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set contactinfo.
     *
     * @param \Api\Entities\Doctrine\Primary\contactinfo|null $contactinfo
     *
     * @return patientinfo
     */
    public function setContactinfo(\Api\Entities\Doctrine\Primary\contactinfo $contactinfo = null)
    {
        $this->contactinfo = $contactinfo;

        return $this;
    }

    /**
     * Get contactinfo.
     *
     * @return \Api\Entities\Doctrine\Primary\contactinfo|null
     */
    public function getContactinfo()
    {
        return $this->contactinfo;
    }

    /**
     * Set patient.
     *
     * @param \Api\Entities\Doctrine\Primary\patient|null $patient
     *
     * @return patientinfo
     */
    public function setPatient(\Api\Entities\Doctrine\Primary\patient $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient.
     *
     * @return \Api\Entities\Doctrine\Primary\patient|null
     */
    public function getPatient()
    {
        return $this->patient;
    }

}