<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class CarType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'model',
            TextType::class,
            [
                "label" => "Nom du model"
            ]
        );

        $builder->add(
            'date',
            DateType::class,
            [
                "label" => "Date de sortie",
                "years" => range(1890, date('Y')+5)
            ]
        );

        

        $builder->add(
            'save',
            SubmitType::class, 
            [
                "label" => "Enregistrer"
            ]
        );
    }
}