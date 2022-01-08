<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Repository\StageRepository;
use App\Repository\FormationRepository;
use App\Repository\EntrepriseRepository;

class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function index(StageRepository $repositoryStage): Response
    {
        // Récupérer les stages enregistrés en BD
        $stages = $repositoryStage->findAll();

        // Envoyer les stages récupérés à la vue chargée de les afficher
        return $this->render('prostages/index.html.twig', ['controller_name' => 'ProstagesController', 'stages' => $stages,]);
    }

    /**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function affEntreprises(EntrepriseRepository $repositoryEntreprise): Response
    {
        // Récupérer les stages enregistrés en BD
        $entreprises = $repositoryEntreprise->findAll();

        return $this->render('prostages/entreprises.html.twig', ['controller_name' => 'Controleur prostages entreprises', 'entreprises' => $entreprises,]);
    }

    /**
     * @Route("/entreprise/{id}", name="prostages_stagesParEntreprise")
     */
    public function affStageParEntreprise(Entreprise $entreprise): Response
    {
        // Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('prostages/stagesParEntreprise.html.twig', ['controller_name' => 'ProstagesController', 'entreprise' => $entreprise,]);
    }

    /**
     * @Route("/entreprise/{idE}/stage/{idS}", name="prostages_stagesPourUneEntreprise")
     */
    public function affStagePourUneEntreprise($idE, $idS): Response
    {
        // Récupérer le respository de l'entité Entreprise
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les entreprises enregistrés en BD
        $unStage = $repositoryStage->find($idS);

        // Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('prostages/stagesPourUneEntreprise.html.twig', ['controller_name' => 'ProstagesController', 'unStage' => $unStage,]);
    }

    /**
     * @Route("/formation", name="prostages_formation")
     */
    public function affFormation(FormationRepository $repositoryFormation): Response
    {
        // Récupérer les stages enregistrés en BD
        $formations = $repositoryFormation->findAll();

        return $this->render('prostages/formations.html.twig', ['controller_name' => 'Controleur prostages formation', 'formations' => $formations,]);
    }

    /**
     * @Route("/formation/{id}", name="prostages_stagesParFormation")
     */
    public function affStageParFormation(Formation $formation): Response
    {
        // Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('prostages/stagesParFormation.html.twig', ['controller_name' => 'ProstagesController', 'formation' => $formation,]);
    }

    /**
     * @Route("/formation/{idF}/stages/{idS}", name="prostages_stagesPourUneFormation")
     */
    public function affStagePourUneFormation($idF, $idS): Response
    {
        // Récupérer le respository de l'entité Entreprise
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les entreprises enregistrés en BD
        $unStage = $repositoryStage->find($idS);

        // Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('prostages/stagesPourUneFormation.html.twig', ['controller_name' => 'ProstagesController', 'unStage' => $unStage,]);
    }

    /**
     * @Route("/stages/{id}", name="prostages_stages")
     */
    public function affStages(Stage $stage): Response
    {
        return $this->render('prostages/stages.html.twig', ['controller_name' => 'Controleur prostages stages', 'stage' => $stage,]);
    }
}
