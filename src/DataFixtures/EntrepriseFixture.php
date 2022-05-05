<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EntrepriseFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
          "entreprise1",
            "entreprise2",
            "entreprise3",
            "entreprise4",
            "entreprise5",

        ];
        for ($i=0;$i<count($data);$i++){
            $entreprise = new Entreprise();
            $entreprise->setDesignation($data[$i]);
            $manager->persist($entreprise);
        }
        $manager->flush();
    }
}
