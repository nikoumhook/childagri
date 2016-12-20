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


}
