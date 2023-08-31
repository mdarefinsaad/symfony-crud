<?php

namespace App\Service;

use App\Entity\Customer;
use App\Entity\Product;
use App\Repository\CustomerRepository;
use App\Repository\ProductRepository;

class ProductService {
    public function __construct(
        private CustomerRepository $customerRepository,
        private ProductRepository $productRepository
    ) {}


    public function customerNameOwnsProductService($id) {
        $product = $this->productRepository->find($id);
        $customerFirstName = $product->getCustomer()->getFirstName();
        $customerLastName = $product->getCustomer()->getLastName();

        return $customerFirstName . " " . $customerLastName;
    }

    public function customerRemovesProductService($id){
        
    }
}