<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $customer = new Customer();
            $customer->setFirstName('FirstName'.$i);
            $customer->setLastName('LastName'.$i);
            $manager->persist($customer);
        }

        $manager->flush();
    }
}
