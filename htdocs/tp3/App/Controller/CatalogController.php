<?php

namespace App\Controller;

use App\Entity\Product;

class CatalogController extends Controller {

    public function view()
    {
        $list_product = [];
        $productRepo = new \App\Entity\Repository\Product();
        $list_product = $productRepo->findAll();
        var_dump($list_product);
        $this->render('catalogue/view.phtml', ['products' => $list_product]);
    }

    public function viewProduct()
    {
        echo 'Hello view Product';
    }
}
