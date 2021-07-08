<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatchsController extends AbstractController
{
    /**
     * @Route("/matchs", name="matchs")
     */
    public function index(): Response
    {
        $json = file_get_contents('../matchs.json');
        $obj = json_decode($json, true);
        return $this->render('matchs/index.html.twig', [
            'matchs' => $obj
        ]);
    }
}
