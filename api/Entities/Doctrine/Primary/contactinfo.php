<?php

// api/Entities/Doctrine/Primary/contactinfo.php

namespace Api\Entities\Doctrine\Primary;

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
     * @ORM\Column(type="string")
     */
    protected $address;
     /**
     * @ORM\Column(type="string")
     */
    protected $email;
    /**
     * @ORM\OneToOne(targetEntity="patientinfo",inversedBy="contactinfo")
     * @ORM\JoinColumn(name="contactinfo_id", referencedColumnName="id")
     **/
    protected $patientinfo;

       /**
     * Set id.
     *
     * @param int $id
     *
     * @return contactinfo
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
     * Set phone.
     *
     * @param string $phone
     *
     * @return contactinfo
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address.
     *
     * @param float $address
     *
     * @return contactinfo
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return float
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set email.
     *
     * @param float $email
     *
     * @return contactinfo
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return float
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set patientinfo.
     *
     * @param \Api\Entities\Doctrine\Primary\patientinfo|null $patientinfo
     *
     * @return contactinfo
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
}