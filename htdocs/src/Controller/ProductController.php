<?php


namespace App\Controller;
use App\Form\ProductFormType;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route ("/form/product", name="form_product")
     */
    public function new(Request $request): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $product = $form->getData();
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('form_product');
        }
        return $this->render('form_product.html.twig', [
            'form' => $form->createView()
        ]);
    }

}