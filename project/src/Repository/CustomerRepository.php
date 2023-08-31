<?php

namespace App\Repository;

use App\Entity\Customer;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Customer>
 *
 * @method Customer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Customer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Customer[]    findAll()
 * @method Customer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Customer::class);
    }

    public function _saveCustomer(Customer $newCustomer){
        $this->entityManager->persist($newCustomer);
        $this->entityManager->flush();
    }

    public function updateCustomer(Customer $customer): Customer
    {
        $this->entityManager->persist($customer);
        $this->entityManager->flush();
        return $customer;
    }

    public function removeCustomer(Customer $customer): Customer
    {
        $this->entityManager->remove($customer);
        $this->entityManager->flush();
        return $customer;
    }

    public function _addCustomer2Product($customer, $product){
        $this->entityManager->persist($customer);
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }

//    /**
//     * @return Customer[] Returns an array of Customer objects
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

//    public function findOneBySomeField($value): ?Customer
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
