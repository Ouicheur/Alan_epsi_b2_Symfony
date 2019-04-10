<?php

namespace App\Repository;

use App\Entity\MasterClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MasterClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method MasterClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method MasterClass[]    findAll()
 * @method MasterClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MasterClassRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MasterClass::class);
    }

    // /**
    //  * @return MasterClass[] Returns an array of MasterClass objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MasterClass
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
