<?php

namespace Controller;

use \W\Controller\Controller;
use Model\QuizzModel;
use Model\PedagoModel;

class QuizzController extends Controller
{

    public function quizz(){
        $quizzModel = new QuizzModel();
        $pedagoModel = new PedagoModel();
        //echo array_shift($_SESSION['aliments_quizz']['uncomplete']);
        $_SESSION['aliments_quizz']['complete'][] = array_shift($_SESSION['aliments_quizz']['uncomplete']);
        //unset($_SESSION['aliments_quizz']);
        //unset($_SESSION['results']);
        if(!empty($_SESSION['aliments_quizz']['uncomplete'])){
            $question = $quizzModel->getQuizzByIdAliment($_SESSION['aliments_quizz']['uncomplete'][0]);
            $question = $pedagoModel->getQuizzAliment($question[0]['id_aliment']);
            $this->show('front/quizz',[
                'question' => $question
            ]);
        }
        else{
            //upload des résultats et redirection sur la page Result
            $this->redirectToRoute('game_result');
        }
    }

    public function updateQuizz(){
        if(!empty($_POST)){
                $_SESSION['aliments_quizz']['complete'][] = array_shift($_SESSION['aliments_quizz']['uncomplete']);
                $_SESSION['results'][81] = 'oui';
                $_SESSION['results'][82] = 'non';
                $_SESSION['results'][83] = 'oui';
                $_SESSION['results'][84] = 'non';
			    $this->showJson(['code'=>'valid']);
        }
    }
}
