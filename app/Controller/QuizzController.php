<?php

namespace Controller;

use \W\Controller\Controller;
use Model\QuizzModel;
use Model\PedagoModel;
use \Controller\GameController;

class QuizzController extends Controller
{

    private $nbrDeResult = 24 ;

    public function quizz(){
        $gameController = new GameController;
        $quizzModel = new QuizzModel();
        $pedagoModel = new PedagoModel();
        //echo array_shift($_SESSION['aliments_quizz']['uncomplete']);



        // netoyage du tableau pour que la redirection fonctionne mieux
        if (isset($_SESSION['aliments_quizz']['uncomplete'])) {
            $_SESSION['aliments_quizz']['uncomplete'] = array_filter($_SESSION['aliments_quizz']['uncomplete']);
        }

        // traitement du resultat du quizz :
        if(!empty($_POST)){

            foreach ($_POST as $key => $value) {
                $_SESSION['results'][$key] = $value;
            }



            if (isset($_SESSION['aliments_quizz']['uncomplete']) && !empty($_SESSION['aliments_quizz']['uncomplete'])) {
                $_SESSION['aliments_quizz']['complete'][] = array_shift($_SESSION['aliments_quizz']['uncomplete']);
            }
        }


        //unset($_SESSION['aliments_quizz']);
        //unset($_SESSION['results']);
        if (!isset($_SESSION['aliments_quizz'])) {
            // sert a créé la variable qui indique que l'on a commencé les quizz
            $_SESSION['aliments_quizz']['uncomplete'] = explode(',',$_SESSION['save']['id_quizz']);
            $gameController->savGame(true);
        }

        if(isset($_SESSION['aliments_quizz']['uncomplete']) && !empty($_SESSION['aliments_quizz']['uncomplete'])){


            //sert a afficher les quizz
            $question = $quizzModel->getQuizzByIdAliment($_SESSION['aliments_quizz']['uncomplete'][0]);
            $question = $pedagoModel->getQuizzAliment($question[0]['id_aliment']);

            if(isset($_SESSION['aliments_quizz']['uncomplete'][1]) && empty($quizzModel->getQuizzByIdAliment($_SESSION['aliments_quizz']['uncomplete'][1]))){
                if (isset($_SESSION['aliments_quizz']['uncomplete']) && !empty($_SESSION['aliments_quizz']['uncomplete'])) {
                    $_SESSION['aliments_quizz']['complete'][] = array_shift($_SESSION['aliments_quizz']['uncomplete']);
                }
            }

            if (!empty($_SESSION['aliments_quizz']['uncomplete']) && !isset($_SESSION['aliments_quizz']['uncomplete'][1]) && empty($quizzModel->getQuizzByIdAliment($_SESSION['aliments_quizz']['uncomplete'][1]))) {
                $_SESSION['aliments_quizz']['uncomplete'] = [];
                $gameController->savGame(true);
                $this->redirectToRoute('game_result');
            }

            $gameController->savGame(true);
            $this->show('front/quizz',[
                'question' => $question
            ]);
        }
        elseif(empty($_SESSION['aliments_quizz']['uncomplete'])){
            //upload des résultats et redirection sur la page Result
            $gameController->savGame(true);
            $this->redirectToRoute('game_result');
        }
        else{
            $this->redirectToRoute('game_landing');
        }
    }

    public function updateQuizz(){
    }
}
