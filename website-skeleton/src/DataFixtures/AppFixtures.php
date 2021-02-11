<?php

namespace App\DataFixtures;

use App\Entity\Manuel;
use App\Entity\Meuble;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $meuble = new Meuble();
        $meuble->setRef("naruto")
                ->SetName("meuble")
                ->setOutils(['couteau', 'ciseaux'])
                ->setEtape(3);
                
        $manuel = new Manuel();
        $manuel->SetName("meuble")
                ->setImage("https://via.placeholder.com/350x150")
                ->setMateriel(['planche1', 'planche2'])
                ->setPage(1);

        $manager->persist($meuble);
        $manager->persist($manuel);

        $manager->flush();
    }
}
