<?php

namespace App\DataFixtures;

use App\Entity\Convention;
use App\Entity\Etudiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {
            $fakeConvention  =  $this->createFakeConvention($faker);
            $fakeEtudiant = $this->createFakeEtudiant($faker, $fakeConvention);

            $manager->persist($fakeConvention);
            $manager->persist($fakeEtudiant);
        }


        $manager->flush();
    }

    private function createFakeConvention ($faker): Convention
    {
        $convention = new Convention();
        $convention->setNom($faker->company());
        $convention->setNbHeur($faker->randomDigitNotNull());

        return  $convention;
    }

    private function createFakeEtudiant($faker, Convention $convention): Etudiant
    {
        $etudiant = new Etudiant();
        $etudiant->setNom($faker->lastName());
        $etudiant->setPrenom($faker->firstName());
        $etudiant->setMail($faker->unique()->email());
        $etudiant->setConvention($convention);

        return $etudiant;
    }
}
