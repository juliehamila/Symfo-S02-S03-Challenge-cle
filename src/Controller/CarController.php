<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\Type\CarType;
use App\Repository\CarRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



/**
 * @Route("/Car")
 */
class CarController extends AbstractController
{


    /**
     * @Route("/list", name="car_list")
     */
    public function listCars()
    {
        /** @var CarRepository */
        $carRepository = $this->getDoctrine()->getRepository(Car::class);
        
        $cars = $carRepository->findAll();

        return $this->render(
            'car/list.html.twig',
            [
                'cars' => $cars
            ]
        );
    }

 /**
     * @Route("/create", name="car_create")
     */
    public function createArtist(Request $request)
    {
        $newCar = new Car();
  
        // pour utiliser ma classe de formulaire j'utilise la methode createForm
        // premier argument : la classe de formulaire à utiliser
        // deuxieme argument : l'objet à manipuler dans le formulaire
        $form = $this->createForm(CarType::class, $newCar);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($newCar);
            $manager->flush();

            $this->addFlash("success", "La voiture a bien été ajouté");
            return $this->redirectToRoute('car_list');
        }

        return $this->render(
            "car/add.html.twig",
            [
                "formView" => $form->createView()
            ]
        );
    }

  

}