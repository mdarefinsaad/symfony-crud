<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\Product;
use App\Repository\CustomerRepository;
use App\Repository\ProductRepository;

class CustomerService {

    public function __construct(
        private CustomerRepository $customerRepository,
        private ProductRepository $productRepository
    ) {}



    public function saveCustomer($customer){
        $newCustomer = new Customer();
        $newCustomer
                ->setFirstName($customer['firstName'])
                ->setLastName($customer['lastName']);
        
        $this->customerRepository->_saveCustomer($newCustomer);
    }



    public function readOneCustomer($id) : array
    {
        $customer = $this->customerRepository->findOneBy(['id'=>$id]);

        $data = [
            'id'=> $customer->getId(),
            'firstName' => $customer->getFirstName(),
            'lastName' => $customer->getLastName()
         ];

        return $data;
    }


    public function readAllCustomer() : array
    {
        $customers = $this->customerRepository->findAll();
        $data = [];

        foreach ($customers as $customer) {
            $data[] = [
                'id' => $customer->getId(),
                'firstName' => $customer->getFirstName(),
                'lastName' => $customer->getLastName()
            ];
        }

        return $data;
    }

    public function updateCustomer($id, $reqData): array 
    {
        $customer = $this->customerRepository->findOneBy(['id'=>$id]);

        empty($reqData['firstName']) ? true : $customer->setFirstName($reqData['firstName']);
        empty($reqData['lastName']) ? true : $customer->setLastName($reqData['lastName']);

        $updatedCostumer = $this->customerRepository->updateCustomer($customer);

        return $updatedCostumer->toArray();
    }


    
    public function removeCustomer($id): array 
    {
        $customer = $this->customerRepository->findOneBy(['id'=>$id]);
        $delCustomer = $this->customerRepository->removeCustomer($customer);
        return $delCustomer->toArray();
    }


    public function addCustomer2Product(){
        $customer = new Customer();
        $customer->setFirstName('Hasib');
        $customer->setLastName('Ahmed');


        $product = new Product();
        $product->setName('IPhone 15');
        $product->setCustomer($customer);
        
        $this->customerRepository->_addCustomer2Product($customer, $product);
    }

    public function customerRemovesProductService($customerId, $productId){
        $customer = $this->customerRepository->find($customerId);
        $product = $this->productRepository->find($productId);
        $product = $customer->removeProduct($product);
        return $product;
    }
}