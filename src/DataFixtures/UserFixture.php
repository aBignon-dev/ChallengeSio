<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 5; $i++) { 
            $user = new User();
            $user->setNom('eleve '.$i);
            $user->setEmail('eleve '.$i.'@gmail.com');
            $user->setPassword('mdpeleve '.$i);
            $user->setRoles(false);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
