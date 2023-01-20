<?php

namespace App\DataFixtures;

// use App\Entity\Page;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // // create 20 pagess! Bam!
        // for ($i = 1; $i <= 20; $i++) {
        //     $product = new Page();
        //     $product->setTitle('page '.$i);
        //     $product->setDescription(mt_rand(10, 100));
        //     $product->setDescription(mt_rand(10, 100));
        //     $manager->persist($product);
        // }

        $manager->flush();
    }
}
