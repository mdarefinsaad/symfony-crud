<?php

namespace App\Controller;

use App\Service\CustomerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{

    public function __construct(private CustomerService $customerService) {}

    /*
    *                   Create (Customer)
    */
    #[Route('/customers', name: 'add_customer', methods:['POST'])]
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $customer['firstName'] = $data['firstName'];
        $customer['lastName'] = $data['lastName'];

        $this->customerService->saveCustomer($customer);

        return new JsonResponse(
            ['status'=>'Customer created!'],
            Response::HTTP_CREATED
        );
    }


    /*
    *                   Read one (Customer)
    */
    #[Route('/customer/{id}', name: 'get_one_customer', methods:['GET'])]
    public function get($id): JsonResponse
    {
        $customer = $this->customerService->readOneCustomer($id);
        return new JsonResponse($customer,Response::HTTP_OK);
    }




    /*
    *                   Read All (Customer)
    */
    #[Route('/customers', name: 'get_all_customer', methods:['GET'])]
    public function getAll(): JsonResponse
    {
        $customerArr = $this->customerService->readAllCustomer();
        return new JsonResponse($customerArr, Response::HTTP_OK);
    }



    /*
    *                   Update (Customer)
    */
    #[Route('/customer/{id}', name: 'update_customer', methods:['PUT'])]
    public function update($id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $reqData['firstName'] = $data['firstName'];
        $reqData['lastName'] = $data['lastName'];

        $customer = $this->customerService->updateCustomer($id, $reqData);

        return new JsonResponse($customer, Response::HTTP_OK);
    }


    
    /*
    *                   Remove (Customer)
    */
    #[Route('/customer/{id}', name: 'delete_customer', methods:['DELETE'])]
    public function delete($id): JsonResponse
    {
        $customer = $this->customerService->removeCustomer($id);
        return new JsonResponse(['deleted customer'=>$customer], Response::HTTP_OK);
    }





    // Multi table query

    #[Route('/product/create', name: 'product_create', methods:['GET'])]
    public function customerBuysProduct() : JsonResponse
    {
        $this->customerService->addCustomer2Product();
        return new JsonResponse(['status'=>'Entry created in both tables'], Response::HTTP_OK);
    }

    // read on ProductController


    #[Route('/customer/delete/product/{customerId}/{productId}', name: 'customer_product_remove', methods:['GET'])]
    public function customerRemovesProduct($customerId, $productId) : JsonResponse
    {
        $customerName = $this->customerService->customerRemovesProductService($customerId, $productId);
        return new JsonResponse($customerName, Response::HTTP_OK);
    }
}
