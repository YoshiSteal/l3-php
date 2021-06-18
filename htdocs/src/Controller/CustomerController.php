<?php


namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Customer;

class CustomerController extends AbstractController
{
    /**
     * @Route ("/catalog/customers", name="catalog_customers")
     */
    public function viewCustomers() : Response
    {
        $customerRepository = $this->getDoctrine()->getRepository(Customer::class);
        $customers = $customerRepository->findAll();
        return $this->render("catalog_customers.html.twig", ['customers' => $customers]);
    }

    /**
     * @Route ("/catalog/customers/customer", name="catalog_customer")
     */
    public function viewCustomer() : Response
    {
        $customerRepository = $this->getDoctrine()->getRepository(Customer::class);
        $customer = $customerRepository->find(1);
        return $this->render("customer.html.twig", ['customer' => $customer]);
    }
}