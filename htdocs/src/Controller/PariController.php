<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pari;

/**
 * Class PariController
 * @package App\Controller
 * Ce controller permet d'ajouter le pari dans la BDD
 */
class PariController extends AbstractController
{
    /**
     * @Route("/pari", name="Pari", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $id = $request->request->get("match_id");
        $score1 = $request->request->get("score_domicile");
        $score2 = $request->request->get("score_exterieur");

        $entityManager = $this->getDoctrine()->getManager();

        $pari = new Pari();
        $pari->setIdMatch($id);
        $pari->setScoreDomicile($score1);
        $pari->setScoreExterieur($score2);
        $pari->setIdUser($this->getUser()->getId());
        $entityManager->persist($pari);
        $entityManager->flush();


        return $this->redirectToRoute('home');
    }
}