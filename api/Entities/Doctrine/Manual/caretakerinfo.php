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
     * @ORM\Column(type="float")
     */
    protected $ctemail;
    
    /**
     * @ORM\OneToOne(targetEntity="patient",mappedBy="caretakerinfo")
     **/
    protected $patient;
}