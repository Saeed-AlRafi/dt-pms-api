<?php

namespace Api\Entities\Doctrine\Primary;

/**
 * caretakerinfo
 */
class caretakerinfo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $ctname;

    /**
     * @var string
     */
    private $ctphone;

    /**
     * @var float
     */
    private $ctemail;

    /**
     * @var \Api\Entities\Doctrine\Primary\patient
     */
    private $patient;


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
     * @param float $ctemail
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
     * @return float
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
