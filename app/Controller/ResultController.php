<?php

namespace Controller;

use \W\Controller\Controller;
use Model\QuizzModel;
use Model\PedagoModel;

class ResultController extends Controller
{

    public function result(){

        $quizzModel = new QuizzModel();
        $pedagoModel = new PedagoModel();

        if(!empty($_SESSION['results'])){
            $question = $quizzModel->getQuizzByIdAliment($_SESSION['save']['id_quizz'][0]);
            $question = $pedagoModel->getQuizzAliment($question[0]['id_aliment']);
            $this->show('front/result',[
                'question'  => $question,
            ]);
        }
        else{
            $this->redirectToRoute('game_assiette');
        }

    }


}
