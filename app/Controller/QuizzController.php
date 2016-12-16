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
        $aliments = array_slice(explode(',', $_SESSION['save']['id_quizz']), -3, 3);
        for($i = 0; $i < count($aliments); null){
            ${'question'.$e} = $quizzModel->getQuizzByIdAliment($aliments[$i]);
            ${'question'.$e} = $pedagoModel->getQuizzAliment(${'question'.$e}[$i]['id_aliment']);
            $e++;
            $i++;
        }
        $this->show('front/quizz',[
            'question1' => $question1,
            'question2' => $question2,
            'question3' => $question3
            // 'question4' => $question4,
            // 'question5' => $question5,
            // 'question6' => $question6,
            // 'question7' => $question7,
            // 'question8' => $question8,
            // 'question9' => $question9,
            // 'question10' => $question10,
            // 'question11' => $question11,
            // 'question12' => $question12,
        ]);
    }
}
