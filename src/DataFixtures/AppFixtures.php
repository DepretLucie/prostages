<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création d'un générateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');

        $nbFormations = 15;

        for ($i=1; $i <= $nbFormations; $i++) 
        { 
            $DUTInfo = new Formation();
            $DUTInfo->setNomCourt("DUT Informatique");
            $DUTInfo->setNomLong($faker->realText($maxNbChars = 40, $indexSize = 2));
            $manager->persist($DUTInfo);
        }
        
        // Envoyer les données en BD
        $manager->flush();
    }
}
