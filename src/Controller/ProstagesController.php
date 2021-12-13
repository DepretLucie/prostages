<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function index(): Response
    {
        return $this->render('prostages/index.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }

    /**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function affEntreprises(): Response
    {
        return $this->render('prostages/entreprises.html.twig', [
            'controller_name' => 'Controleur prostages entreprises',
        ]);
    }

    /**
     * @Route("/formation", name="prostages_formation")
     */
    public function affFormation(): Response
    {
        return $this->render('prostages/formations.html.twig', [
            'controller_name' => 'Controleur prostages formation',
        ]);
    }

    /**
     * @Route("/stages/{id}", name="prostages_stages")
     */
    public function affStages($id): Response
    {
        return $this->render('prostages/stages.html.twig', [
            'controller_name' => 'Controleur prostages stages', 
            'id' => $id,
        ]);
    }
}
