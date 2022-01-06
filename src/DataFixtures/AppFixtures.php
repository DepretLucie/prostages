<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création d'un générateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');
        
        // Créations de formations 
        $DUTInfo = new Formation();
        $DUTInfo->setNomCourt("DUT INFO");
        $DUTInfo->setNomLong("DUT Informatique");
       
        $DUTGea = new Formation();
        $DUTGea->setNomCourt("DUT GEA");
        $DUTGea->setNomLong("DUT Gestion des Entreprises/Admin");
        
        $BUTGim = new Formation();
        $BUTGim->setNomCourt("BUT GIM");
        $BUTGim->setNomLong("BUT Génie Industriel et Maintenance");
        
        $LPGs = new Formation();
        $LPGs->setNomCourt("LP GS");
        $LPGs->setNomLong("LP Gestion Salariale");
         
        $LPNum = new Formation();
        $LPNum->setNomCourt("LP NUM");
        $LPNum->setNomLong("LP Métiers du Numérique");
        
        $LPProg = new Formation();
        $LPProg->setNomCourt("LP Prog");
        $LPProg->setNomLong("LP Programmation avancée");

        // Création d'un tableau contenant toutes les formations
        $tableauDesFormations = array($DUTInfo, $DUTGea, $BUTGim, $LPGs, $LPNum, $LPProg);

        // Enregistrement
        foreach($tableauDesFormations as $tabFormations)
        {
            $manager->persist($tabFormations);
        }
        
        // Création des entreprises
        $nbrEntreprises = 18;

        for($i = 0; $i < $nbrEntreprises; $i++)
        {
            $entreprise = new Entreprise();
            $entreprise->setNom($faker->company);
            $entreprise->setAdresse($faker->address);
            $entreprise->setActivite($faker->realText($maxNbChars = 50, $indexSize = 2));
            $entreprise->setSiteWeb($faker->url);

            // Création d'un tableau d'entreprises
            $tableauDesEntreprises[] = $entreprise;
            $manager->persist($entreprise);
        }

        // Création des stages
        $nbrStages = 20;
        
        $tableauDesMetiers = array('Développeur WEB', 'Développeur MOBILE', 'Chef de projet', 'Webmaster', 'Concepteur de jeux vidéos', 'Architecture réseaux');
        $tableauDesLangages = array('JavaScript', 'ReactNative', 'Shell', 'C#', 'Android', 'Programmation Objet', 'Xamarin', 'Flutter', 'PHP');
        
        for($iS = 0; $iS < $nbrStages; $iS++)
        {
            $stage = new Stage();
            $stage->setTitre($tableauDesMetiers[rand(0, count($tableauDesMetiers)-1)]." en ".$tableauDesLangages[rand(0, count($tableauDesLangages)-1)]);
            $stage->setMission($faker->realText($maxNbChars = 30, $indexSize = 2));
            $stage->setEmail($faker->email);

            $entrepriseVersStage = $faker->numberBetween($min = 0, $max = 17);
            $stage->setEntreprise($tableauDesEntreprises[$entrepriseVersStage]);

            $formationVersStage = $faker->numberBetween($min = 0, $max = 5);
            $stage->addFormation($tableauDesFormations[$formationVersStage]);

            $manager->persist($stage);
        }

        // Envoyer les données en BD
        $manager->flush();
    }
}
