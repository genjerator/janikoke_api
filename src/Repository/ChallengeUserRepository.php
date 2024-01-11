<?php

namespace App\Repository;

use App\Entity\ChallengeUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ChallengeUser>
 *
 * @method ChallengeUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChallengeUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChallengeUser[]    findAll()
 * @method ChallengeUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChallengeUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChallengeUser::class);
    }

//    /**
//     * @return ChallengeUser[] Returns an array of ChallengeUser objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ChallengeUser
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
