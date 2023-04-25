<?php

// api/Entities/Doctrine/Primary/caretakerinfo.php

namespace Api\Entities\Doctrine\Primary;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="caretakerinfo")
 **/
class caretakerinfo
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
    protected $ctname;     
    /**
    * @ORM\Column(type="string")
    */
   protected $ctphone;
     /**
     * @ORM\Column(type="string")
     */
    protected $ctemail;
    
    /**
     * @ORM\OneToOne(targetEntity="patient",mappedBy="caretakerinfo")
     * @ORM\JoinColumn(name="patient_id", referencedColumnName="id")
     **/
    protected $patient;
    
    /**
     * Set id.
     *
     * @param int $id
     *
     * @return caretakerinfo
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
     * Set ctname.
     *
     * @param string $ctname
     *
     * @return caretakerinfo
     */
    public function setCtname($ctname)
    {
        $this->ctname = $ctname;

        return $this;
    }

    /**
     * Get ctname.
     *
     * @return string
     */
    public function getCtname()
    {
        return $this->ctname;
    }

    /**
     * Set ctphone.
     *
     * @param string $ctphone
     *
     * @return caretakerinfo
     */
    public function setCtphone($ctphone)
    {
        $this->ctphone = $ctphone;

        return $this;
    }

    /**
     * Get ctphone.
     *
     * @return string
     */
    public function getCtphone()
    {
        return $this->ctphone;
    }

    /**
     * Set ctemail.
     *
     * @param string $ctemail
     *
     * @return caretakerinfo
     */
    public function setCtemail($ctemail)
    {
        $this->ctemail = $ctemail;

        return $this;
    }

    /**
     * Get ctemail.
     *
     * @return string
     */
    public function getCtemail()
    {
        return $this->ctemail;
    }

    /**
     * Set patient.
     *
     * @param \Api\Entities\Doctrine\Primary\patient|null $patient
     *
     * @return caretakerinfo
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