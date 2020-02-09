<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Car
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(max=255)
     */
    private $model;

    /**
     * @ORM\Column(type="date")
     * 
     */
    private $year;


    /** 
     * @ORM\Column(type="string")
     * @Assert\Length(max=255)
     * @ORM\ManyToOne(targetEntity="App\Entity\Brand", inversedBy="car")
    */
    private $brand;

}