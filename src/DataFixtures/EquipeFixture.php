<?php

namespace App\DataFixtures;

use App\Entity\Equipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EquipeFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i <= 12; $i++) { 
            $equipe = new Equipe();
            $equipe->setNom("équipe ".$i);
            $manager->persist($equipe);
        }

        $manager->flush();
    }
}
