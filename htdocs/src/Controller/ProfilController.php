<?php

namespace App\Controller;

use App\Entity\Pari;
use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProfilController
 * @package App\Controller
 * Controller de profil
 */
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
            return $this->render('profil/index.html.twig', [
                'paris' => $paris,
                'matchs' => $matchs,
                'points' => $this->calculPoint($paris, $matchs),
                'position' => $this->getRang($this->buildClassement())
            ]);
        }else{
            return $this->redirectToRoute('app_login');
        }
    }

    /**
     * @param $classement
     * @return int
     * récupère le rang du joueur
     */
    public function getRang ($classement) : int
    {
        $position = 0;
        $i = 0;
        do{
            if($classement[$i]["user"]->getId() == $this->getUser()->getId()){
                $position = $i + 1;
            }
            $i++;
        }while($i != sizeof($classement));
        return $position;
    }
}
