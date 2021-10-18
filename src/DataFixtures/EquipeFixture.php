<?php

namespace App\DataFixtures;

use App\Entity\Equipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EquipeFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 5; $i++) { 
            $product = new Equipe();
            $product->setEquipecomplete(false);
            $product->setNom("equipe ".$i);
            //$product->addLesuser();
            $manager->persist($product);
        }

        $manager->flush();
    }
}
