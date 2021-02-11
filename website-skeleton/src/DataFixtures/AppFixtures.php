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
        $meuble->setRef("FR21032001")
                ->SetName("Table de Chevet")
                ->setOutils(['visseuse ou clé six pans'])
                ->setImage("table_de_chevet.png")
                ->setEtape(6);
                
        $étape_1 = new Manuel();
        $étape_1->SetName("Table de Chevet")
                ->setImage("étape_1.png")
                ->setMateriel(['2 visses 190419'])
                ->setPage(1);

        $étape_2 = new Manuel();
        $étape_2->SetName("Table de Chevet")
                ->setImage("étape_2.png")
                ->setMateriel(['2 visses 190419'])
                ->setPage(2);

        $étape_3 = new Manuel();
        $étape_3->SetName("Table de Chevet")
                ->setImage("étape_3.png")
                ->setMateriel(['4 visses 190419'])
                ->setPage(3);


        $étape_4 = new Manuel();
        $étape_4->SetName("Table de Chevet")
                ->setImage("étape_4.png")
                ->setMateriel(['4 visses 190419'])
                ->setPage(4);


        $étape_5 = new Manuel();
        $étape_5->SetName("Table de Chevet")
                ->setImage("étape_5.png")
                ->setMateriel(['4 visses 190419'])
                ->setPage(5);


        $étape_6 = new Manuel();
        $étape_6->SetName("Table de Chevet")
                ->setImage("étape_6.png")
                ->setMateriel(['16 visses 190419'])
                ->setPage(6);


        $manager->persist($meuble);
        $manager->persist($étape_1);
        $manager->persist($étape_2);
        $manager->persist($étape_3);
        $manager->persist($étape_4);
        $manager->persist($étape_5);
        $manager->persist($étape_6);

        $manager->flush();
    }
}
