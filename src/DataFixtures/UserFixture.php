<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $eleves = file_get_contents('./eleves.txt');
       foreach(preg_split("/((\r?\n)|(\r\n?))/", $eleves) as $line){
            $tl = explode(',',$line);
            $eleve = new User($tl[0],$tl[1],$tl[2],$tl[3],$tl[4]);
            $manager->persist($eleve);
       }

        $manager->flush();
    }
}
