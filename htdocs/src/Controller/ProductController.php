<?php


namespace App\Controller;
use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route ("/catalog/products", name="catalog_products")
     */
    public function viewProducts() : Response
    {
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $products = $productRepository->findAll();
        return $this->render("catalog_products.html.twig", ['products' => $products]);
    }

    /**
     * @Route ("/catalog/products/product", name="catalog_product")
     */
    public function viewProduct() : Response
    {
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $product = $productRepository->find(1);
        return $this->render("product.html.twig", ['product' => $product]);
    }

}