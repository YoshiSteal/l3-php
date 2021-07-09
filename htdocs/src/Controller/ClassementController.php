<?php

namespace App\Controller;

use App\Entity\Pari;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassementController extends AbstractController
{
    /**
     * @Route("/classement", name="classement")
     */
    public function index(): Response
    {
        $json = file_get_contents('../matchs.json');
        $matchs = json_decode($json, true);
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        foreach ($users as $user){
            $paris = $this->getDoctrine()->getRepository(Pari::class)->findBy(['id_user' => $user->getId()]);
            $points = $this->calculPoint($paris, $matchs);
            var_dump($points);
        }
        return $this->render('classement/index.html.twig', [
            'controller_name' => 'ClassementController',
        ]);
    }

    public function calculPoint($paris, $matchs): int
    {
        $score = 0;
        foreach ($paris as $pari){
            if (isset($matchs[$pari->getIdMatch()]["scores"])){
                if ($pari->getScoreDomicile() > $pari->getScoreExterieur()) {
                    #domicile gagne ?
                    if ($matchs[$pari->getIdMatch()]["scores"]["domicile"] > $matchs[$pari->getIdMatch()]["scores"]["exterieur"]) {
                        #equipe gagnante correcte !
                        $score += 1;
                    }
                } elseif ($pari->getScoreDomicile() < $pari->getScoreExterieur()) {
                    #exterieur gagne ?
                    if ($matchs[$pari->getIdMatch()]["scores"]["domicile"] < $matchs[$pari->getIdMatch()]["scores"]["exterieur"]) {
                        #equipe gagnante correcte !
                        $score += 1;
                    }
                } else {
                    #todo
                    #tir au but
                }
                if ($pari->getScoreDomicile() == $matchs[$pari->getIdMatch()]["scores"]["domicile"] && $pari->getScoreExterieur() == $matchs[$pari->getIdMatch()]["scores"]["exterieur"]){
                    $score += 2;
                }
            }
        }

        return $score;
    }
}
