<?php

namespace App\Repository;

use App\Entity\Inventory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Inventory|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inventory|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inventory[]    findAll()
 * @method Inventory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InventoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inventory::class);
    }

    /**
     * @return Inventory[] Returns an array of Inventory objects filtered by product id
     */
    public function findAllByProductId(int $id)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.product_id = :val')
            ->setParameter('val', $id)
            ->orderBy('i.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Inventory[] Returns an array of Inventory objects filtered by sku
     */
    public function findAllBySku(string $sku)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.sku = :val')
            ->setParameter('val', $sku)
            ->orderBy('i.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
}
