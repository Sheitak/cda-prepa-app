<?php

namespace App\Repository;

use App\Entity\Learner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Learner|null find($id, $lockMode = null, $lockVersion = null)
 * @method Learner|null findOneBy(array $criteria, array $orderBy = null)
 * @method Learner[]    findAll()
 * @method Learner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LearnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Learner::class);
    }

    // "FindCreate" method using the QueryBuilder from Symfony to query the database and selected a sort in our GroupType form,
    /**
    * @return Learner[] Returns an array of Learner objects
    */
    public function findCreate(Learner $learner)
    {
        $queryBuilder = $this->createQueryBuilder('l');

        if($learner->getPromotion() !== null) {
            $queryBuilder
                ->where('l.promotion = :promotion')
                ->setParameter('promotion', $learner->getPromotion())
                ;
        }

        if($learner->getSex() !== null) {
            $queryBuilder
                ->andWhere('l.sex LIKE :sex')
                ->setParameter('sex', '%'.$learner->getSex().'%');
                ;
        }

        if($learner->getSkills() !== null) {
            $queryBuilder
                ->andWhere('l.skills LIKE :skills')
                ->setParameter('skills', '%'.$learner->getSkills().'%');
                ;
        }
        return $queryBuilder->getQuery()->getResult();
    }
        
    // /**
    //  * @return Learner[] Returns an array of Learner objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Learner
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
