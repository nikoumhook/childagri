<?php

namespace Controller;

use \W\Controller\Controller;
use Model\QuizzModel;
use Model\PedagoModel;

class QuizzController extends Controller
{

    public function quizz(){
        $e = 1;
        $quizzModel = new QuizzModel();
        $pedagoModel = new PedagoModel();
        //$_SESSION['aliments'] = [1,7,3,9,2,13];
        array_shift($_SESSION['aliments']);
        if(!empty($_SESSION['aliments'])){
            $question = $quizzModel->getQuizzByIdAliment($_SESSION['aliments'][0]);
            $question = $pedagoModel->getQuizzAliment($question[0]['id_aliment']);
        }
        if(!empty($_SESSION['aliments'])){
            $this->show('front/quizz',[
                'question' => $question
            ]);
        }
        else{
            //upload des résultats et redirection sur la page Result
            $this->redirectToRoute('game_result');
        }
    }
}
