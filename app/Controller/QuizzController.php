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
        $aliments = array_slice(explode(',', $_SESSION['save']['id_quizz']), -3, 3);
        $question1 = $quizzModel->getQuizzByIdAliment($aliments[0]);
        $question2 = $quizzModel->getQuizzByIdAliment($aliments[1]);
        $question3 = $quizzModel->getQuizzByIdAliment($aliments[2]);
        $titre = $pedagoModel->getQuizzAliment($question1[0]['id_aliment']);
        $this->show('front/quizz',[
            'titre'     => $titre,
            'question1' => $question1,
            'question2' => $question2,
            'question3' => $question3,
        ]);
    }
}
