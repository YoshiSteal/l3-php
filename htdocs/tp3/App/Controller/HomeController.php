<?php

namespace App\Controller;

class HomeController extends Controller
{

    public function home()
    {
        echo $this->render('home.phtml', []);
    }

}