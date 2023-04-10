<?php

// api/Entities/Doctrine/Primary/vitals.php

namespace Api\Entities\Doctrine\Primary;

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
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     **/
    protected $patient;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;

    
    /**
     * Set id.
     *
     * @param int $id
     *
     * @return vitals
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
     * Set bloodpressure.
     *
     * @param float $bloodpressure
     *
     * @return vitals
     */
    public function setBloodpressure($bloodpressure)
    {
        $this->bloodpressure = $bloodpressure;

        return $this;
    }

    /**
     * Get bloodpressure.
     *
     * @return float
     */
    public function getBloodpressure()
    {
        return $this->bloodpressure;
    }

    /**
     * Set o2.
     *
     * @param float $o2
     *
     * @return vitals
     */
    public function setO2($o2)
    {
        $this->o2 = $o2;

        return $this;
    }

    /**
     * Get o2.
     *
     * @return float
     */
    public function getO2()
    {
        return $this->o2;
    }

    /**
     * Set heartrate.
     *
     * @param float $heartrate
     *
     * @return vitals
     */
    public function setHeartrate($heartrate)
    {
        $this->heartrate = $heartrate;

        return $this;
    }

    /**
     * Get heartrate.
     *
     * @return float
     */
    public function getHeartrate()
    {
        return $this->heartrate;
    }

    /**
     * Set temperature.
     *
     * @param float $temperature
     *
     * @return vitals
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * Get temperature.
     *
     * @return float
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Set bloodsugar.
     *
     * @param float $bloodsugar
     *
     * @return vitals
     */
    public function setBloodsugar($bloodsugar)
    {
        $this->bloodsugar = $bloodsugar;

        return $this;
    }

    /**
     * Get bloodsugar.
     *
     * @return float
     */
    public function getBloodsugar()
    {
        return $this->bloodsugar;
    }

    /**
     * Set date.
     *
     * @param string $date
     *
     * @return vitals
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set patient.
     *
     * @param \Api\Entities\Doctrine\Primary\patient|null $patient
     *
     * @return vitals
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