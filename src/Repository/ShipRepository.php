<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Ship;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ship|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ship|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ship[]    findAll()
 * @method Ship[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShipRepository extends ServiceEntityRepository
{
    /**
     * @var PaginatorInterface
     */
    private $paginator;

    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Ship::class);
        $this->paginator = $paginator;
    }

    /**
     * Récupère les ships en lien avec une recherche
     * @return PaginationInterface
     */
    public function findSearch(SearchData $search): PaginationInterface
    {
        $query = $this
            ->createQueryBuilder('ship')
            ->join('ship.type', 'type')
            ->join('ship.brand', 'brand')
            ->join('ship.size', 'size');

        if (!empty($search->q)) {
            $query = $query
                ->andWhere('ship.name LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }

        if (!empty($search->ship)) {
            $query = $query
                ->andWhere('ship.id IN (:ship)')
                ->setParameter('ship', $search->ship);
        }

        if (!empty($search->type)) {
            $query = $query
                ->andWhere('type.id IN (:type)')
                ->setParameter('type', $search->type);
        }

        if (!empty($search->brand)) {
            $query = $query
                ->andWhere('brand.id IN (:brand)')
                ->setParameter('brand', $search->brand);
        }

        if (!empty($search->size)) {
            $query = $query
                ->andWhere('size.id IN (:size)')
                ->setParameter('size', $search->size);
        }

        if (!empty($search->premium)) {
            $query = $query
                ->andWhere('ship.premium = 1');
        }

        $query = $query->getQuery();
        return $this->paginator->paginate(
            $query,
            $search->page,
            9
        );
    }

    /**
     * Récupère les ships en lien avec une recherche
     * @return Ship[]
     */
    public function findSearchPremium(): array
    {
        return $this->findAll();
    }
    

    // /**
    //  * @return Ship[] Returns an array of Ship objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ship
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
