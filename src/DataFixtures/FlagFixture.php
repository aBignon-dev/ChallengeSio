<?php

namespace App\DataFixtures;

use App\Entity\Flag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FlagFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; ++$i) {
            $flag = new Flag();
            $flag->setTextQuote('flag numero '.$i);
            $flag->setPoints(10);
            $flag->setTextReponse('reponse '.$i);
            $flag->setTitreQuestion('question '.$i);
            $flag->setNID($i);
            $manager->persist($flag);
        }

        $manager->flush();
    }
}