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
     * @ORM\GeneratedValue
     */
    protected $id;
     /**
     * @ORM\OneToMany(targetEntity="vitals",mappedBy="patient")
     */
    protected $vitals;
     /**
     * @ORM\OneToOne(targetEntity="patientinfo",mappedBy="patient")
     */
    protected $patientinfo;
     /**
     * @ORM\OneToOne(targetEntity="caretakerinfo",mappedBy="patient")
     */
    protected $caretakerinfo;
    
     /**
     * Set id.
     *
     * @param int $id
     *
     * @return patient
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
     * Set patientinfo.
     *
     * @param \Api\Entities\Doctrine\Primary\patientinfo|null $patientinfo
     *
     * @return patient
     */
    public function setPatientinfo(\Api\Entities\Doctrine\Primary\patientinfo $patientinfo = null)
    {
        $this->patientinfo = $patientinfo;

        return $this;
    }

    /**
     * Get patientinfo.
     *
     * @return \Api\Entities\Doctrine\Primary\patientinfo|null
     */
    public function getPatientinfo()
    {
        return $this->patientinfo;
    }

    /**
     * Add vital.
     *
     * @param \Api\Entities\Doctrine\Primary\vitals $vital
     *
     * @return patient
     */
    public function addVital(\Api\Entities\Doctrine\Primary\vitals $vital)
    {
        $this->vitals[] = $vital;

        return $this;
    }

    /**
     * Remove vital.
     *
     * @param \Api\Entities\Doctrine\Primary\vitals $vital
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVital(\Api\Entities\Doctrine\Primary\vitals $vital) //removes one vital
    {
        return $this->vitals->removeElement($vital);
    }

    /**
     * Get vitals.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVitals()
    {
        return $this->vitals;
    }

    /**
     * Set caretakerinfo.
     *
     * @param \Api\Entities\Doctrine\Primary\caretakerinfo|null $caretakerinfo
     *
     * @return patient
     */
    public function setCaretakerinfo(\Api\Entities\Doctrine\Primary\caretakerinfo $caretakerinfo = null)
    {
        $this->caretakerinfo = $caretakerinfo;

        return $this;
    }

    /**
     * Get caretakerinfo.
     *
     * @return \Api\Entities\Doctrine\Primary\caretakerinfo|null
     */
    public function getCaretakerinfo()
    {
        return $this->caretakerinfo;
    }

    public function getpatient(){
        return $this; //not working
    }
    

}