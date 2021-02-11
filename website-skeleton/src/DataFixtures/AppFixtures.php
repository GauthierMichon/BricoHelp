<?php

namespace App\DataFixtures;

use App\Entity\Meuble;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $meuble = new Meuble();
        $meuble->setRef("naruto")
                ->setEtape(3);
                
        $manager->persist($meuble);
        $manager->flush();
    }
}
