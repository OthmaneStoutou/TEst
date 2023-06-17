<?php

namespace App\DataFixtures;

use App\Factory\CabinetFactory;
use App\Factory\CabinetRowFactory;
use App\Factory\ContainerFactory;
use App\Factory\DataCenterFactory;
use App\Factory\ZoneFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         ZoneFactory::createMany(3);
         CabinetFactory::createMany(3);
         CabinetRowFactory::createMany(3);
         DataCenterFactory::createMany(3);
         ContainerFactory::createMany(3);

        // $manager->persist($product);

        $manager->flush();
    }
}
