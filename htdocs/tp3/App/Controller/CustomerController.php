<?php


namespace App\Controller;


class CustomerController extends Controller
{
    public function view()
    {
        $list_customer = [];
        $customerRepo = new \App\Entity\Repository\Customer();
        $list_customer = $customerRepo->findAll();
        $this->render('customer/view.phtml', ['customers' => $list_customer]);
    }

    public function viewCustomer()
    {
        $customerRepo = new \App\Entity\Repository\Customer();
        $customer = $customerRepo->find(1);
        $this->render('customer/viewCustomer.phtml', ['customers' => $customer]);
    }
}