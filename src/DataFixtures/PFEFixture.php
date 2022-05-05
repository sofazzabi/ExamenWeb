<?php

namespace App\DataFixtures;

use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PFEFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data1 = [
            "Etudiant1",
            "Etudiant2",
            "Etudiant3",
            "Etudiant4",
            "Etudiant5",
        ];
        $data2 = [
            "titel1",
            "titel2",
            "titel3",
            "titel4",
            "titel5",

        ];
        for ($i=0;$i<count($data1);$i++){
            $pfe = new PFE();
            $pfe->setStudent($data1[$i]);
            $pfe->setTitle($data2[$i]);
            $manager->persist($pfe);
        }
        $manager->flush();
    }
}
