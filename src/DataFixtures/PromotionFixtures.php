<?php

namespace App\DataFixtures;

use App\Entity\Promotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PromotionFixtures extends Fixture
{
    const PROMOTIONS = [
        'Promotion A',
        'Promotion B',
        'Promotion C',
        'Promotion D',
        'Promotion E',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROMOTIONS as $key => $promotionName)
        {
            $promotion = new Promotion();
            $promotion->setName($promotionName);
            $promotion->setCapacity(rand(10, 25));
            $manager->persist($promotion);

            $this->addReference('promotion_' . $key, $promotion);
        }
        $manager->flush();
    }
}
