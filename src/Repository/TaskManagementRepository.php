<?php

namespace App\Repository;

use App\Entity\TaskManagement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TaskManagement|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaskManagement|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaskManagement[]    findAll()
 * @method TaskManagement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskManagementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TaskManagement::class);
    }

    // /**
    //  * @return TaskManagement[] Returns an array of TaskManagement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TaskManagement
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
