<?php

namespace App\Controller;

use App\Entity\Pari;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index(): Response
    {
        $json = file_get_contents('../matchs.json');
        $matchs = json_decode($json, true);
        $paris = $this->getDoctrine()->getRepository(Pari::class)->findBy(['id_user' => $this->getUser()->getId()]);
        return $this->render('profil/index.html.twig', [
            'paris' => $paris,
            'matchs' => $matchs
        ]);
    }
}
