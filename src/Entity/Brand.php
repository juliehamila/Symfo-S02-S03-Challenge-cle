<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Brand
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
     * @ORM\Column(type="string")
     * @ORM\OneToMany(targetEntity="App\Entity\Car", mappedBy="brand")
     */
    private $car;

}