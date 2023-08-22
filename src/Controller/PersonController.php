<?php

namespace App\Controller;

use App\Entity\Person;
use App\Form\PersonType;
use App\Repository\PersonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonController extends AbstractController
{
    #[Route('/add', name: 'app_person')]
    public function index(Request $request, EntityManagerInterface $entityManager, PersonRepository $personRepository): Response
    {
        $person = new Person();
        $personForm = $this->createForm(PersonType::class, $person);
        $personForm->handleRequest($request);

        if ($personForm->isSubmitted() && $personForm->isValid()) {
            $person = $personForm->getData();

            $entityManager->persist($person);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('person/index.html.twig', [
            'personForm' => $personForm->createView(),
        ]);
    }
}