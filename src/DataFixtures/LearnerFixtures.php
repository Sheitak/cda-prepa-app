<?php

namespace App\DataFixtures;

use App\Entity\Learner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class LearnerFixtures extends Fixture implements DependentFixtureInterface
{
    const SKILLS = [
        'Infographics',
        'Web Developer',
        'Data Analyst',
        'Integrator',
        'Web Design',
        'Other',
    ];

    const SEX =[
        'M',
        'F',
    ];

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        
        for ($i = 1; $i <= 40; $i++) {
            $learner = new Learner();
            $learner->setName($faker->lastname);
            $learner->setUsername($faker->firstname);
            $learner->setSex(self::SEX[rand(0, 1)]);
            $learner->setAge(rand(18, 80));
            $learner->setSkills(self::SKILLS[rand(0, 4)]);
            $manager->persist($learner);

            $this->addReference('learner_' . $i, $learner);
            $learner->setPromotion($this->getReference('promotion_' . rand(0, 4)));
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [PromotionFixtures::class];
    }
}
