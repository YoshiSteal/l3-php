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
        $infos_users = array();
        $json = file_get_contents('../matchs.json');
        $matchs = json_decode($json, true);
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        foreach ($users as $user){
            $paris = $this->getDoctrine()->getRepository(Pari::class)->findBy(['id_user' => $user->getId()]);
            $points = $this->calculPoint($paris, $matchs);
            array_push($infos_users, array("user" => $user->getEmail(), "score" => $points));
        }

        return $this->render('classement/index.html.twig', [
            'classement' => $this->createClassement($infos_users)
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


    public function createClassement($infos_users) : array
    {
        $classement = array();
        $i = 0;
        $max = 0;
        do{
            if ($max <= $infos_users[$i]["score"]){
                array_push($classement, $infos_users[$i]);
                unset($infos_users[$i]);
                $i = 0;
            }
            $i++;
        }while(!empty($infos_users));

        return $classement;
    }
}
