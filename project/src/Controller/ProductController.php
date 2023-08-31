<?php

namespace App\Controller;

use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    public function __construct(private ProductService $productService) {}

    #[Route('/product', name: 'app_product')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductController.php',
        ]);
    }


    #[Route('/product/read/{productId}', name: 'product_read', methods:['GET'])]
    public function customerNameOwnsProduct($productId) : JsonResponse
    {
        $customerName = $this->productService->customerNameOwnsProductService($productId);
        return new JsonResponse($customerName, Response::HTTP_OK);
    }


    
}
