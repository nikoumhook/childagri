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
        if(isset($_SESSION['save']['repas'][1])){
            $_SESSION['test'] = $_SESSION['save']['repas'][1];
        }
        if(isset($_SESSION['save']['repas'][2])){
            $_SESSION['test'] = $_SESSION['save']['repas'][2];
        }
        if(isset($_SESSION['save']['repas'][3])){
            $_SESSION['test'] = $_SESSION['save']['repas'][3];
        }
        if(isset($_SESSION['save']['repas'][4])){
            $_SESSION['test'] = $_SESSION['save']['repas'][4];
        }
        if(!empty($_SESSION['results'])){
            for($i = 0; $i < count($_SESSION['test']); $i++){
                $question[$i] = $quizzModel->getQuizzByIdAliment($_SESSION['test'][$i]);
                $question[$i] = $pedagoModel->getQuizzAliment($_SESSION['test'][$i]);
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
