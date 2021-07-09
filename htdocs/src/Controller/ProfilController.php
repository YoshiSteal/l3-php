<?php

namespace App\Controller;

use App\Entity\Pari;
use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends ClassementController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index(): Response
    {
        $securityContext =$this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            $json = file_get_contents('../matchs.json');
            $matchs = json_decode($json, true);
            $paris = $this->getDoctrine()->getRepository(Pari::class)->findBy(['id_user' => $this->getUser()->getId()]);
            $points = $this->calculPoint($paris, $matchs);
            return $this->render('profil/index.html.twig', [
                'paris' => $paris,
                'matchs' => $matchs,
                'points' => $points
            ]);
        }else{
            return $this->redirectToRoute('app_login');
        }
    }
}
