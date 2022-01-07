<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;

class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function index(): Response
    {
        // Récupérer le respository de l'entité Stage
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les stages enregistrés en BD
        $stages = $repositoryStage->findAll();

        // Envoyer les stages récupérés à la vue chargée de les afficher
        return $this->render('prostages/index.html.twig', ['controller_name' => 'ProstagesController', 'stages' => $stages,]);
    }

    /**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function affEntreprises(): Response
    {
        // Récupérer le respository de l'entité Stage
        $repositoryEntreprise= $this->getDoctrine()->getRepository(Entreprise::class);

        // Récupérer les stages enregistrés en BD
        $entreprises = $repositoryEntreprise->findAll();

        return $this->render('prostages/entreprises.html.twig', ['controller_name' => 'Controleur prostages entreprises', 'entreprises' => $entreprises,]);
    }

    /**
     * @Route("/entreprise/{id}", name="prostages_stagesParEntreprise")
     */
    public function affStageParEntreprise($id): Response
    {
        // Récupérer le respository de l'entité Entreprise
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        // Récupérer les entreprises enregistrés en BD
        $entreprise = $repositoryEntreprise->find($id);

        // Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('prostages/stagesParEntreprise.html.twig', ['controller_name' => 'ProstagesController', 'entreprise' => $entreprise,]);
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
     * @Route("/formation/{id}", name="prostages_stagesParFormation")
     */
    public function affStageParFormation($id): Response
    {
        // Récupérer le respository de l'entité Entreprise
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);

        // Récupérer les entreprises enregistrés en BD
        $formation = $repositoryFormation->find($id);

        // Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('prostages/stagesParFormation.html.twig', ['controller_name' => 'ProstagesController', 'formation' => $formation,]);
    }

    /**
     * @Route("/stages/{id}", name="prostages_stages")
     */
    public function affStages($id): Response
    {
        // Récupérer le respository de l'entité Stage
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les stages enregistrés en BD
        $stage = $repositoryStage->find($id);

        return $this->render('prostages/stages.html.twig', ['controller_name' => 'Controleur prostages stages', 'stage' => $stage,]);
    }
}
