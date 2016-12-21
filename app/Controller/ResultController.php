<?php

namespace Controller;

use \W\Controller\Controller;
use Model\QuizzModel;
use Model\ResultatsModel;
use Model\PedagoModel;
use \Controller\GameController;

class ResultController extends Controller
{

    public function result(){

        $quizzModel = new QuizzModel();
        $pedagoModel = new PedagoModel();


        if(!empty($_SESSION['results'])){
            for($i = 0; $i < count($_SESSION['aliments_quizz']['complete']); $i++){
                $question[$i] = $quizzModel->getQuizzByIdAliment($_SESSION['aliments_quizz']['complete'][$i]);
                $question[$i] = $pedagoModel->getQuizzAliment($_SESSION['aliments_quizz']['complete'][$i]);
            }
            $this->show('front/result',[
                'question'  => $question,
            ]);
        }
        else{
            $this->redirectToRoute('game_assiette');
        }

    }

    public function recupresult($id){

        $resultatsModel = new ResultatsModel();
        $gameController = new GameController();

        if (!empty($id) && is_numeric($id)) {

            $resultat = $resultatsModel->find($id);
            $resultat = unserialize($resultat['resultats']);

            $gameController->resetGame(false);

            $_SESSION['results'] = $resultat['results'];
            $_SESSION['aliments_quizz'] = $resultat['aliments_quizz'];

            $this->redirectToRoute('game_result');

        }

    }

}
