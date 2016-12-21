<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\PedagoModel;
use \Model\AlimentsModel;
use \Controller\GameController ;


class CarteController extends Controller
{


        /**
        * methode qui redirige vers la carte
         */
        public function carte(){

            if (isset($_SESSION['save']['id_quizz']) && !empty($_SESSION['save']['id_quizz']) && count(explode(',',$_SESSION['save']['id_quizz'])) == 12) {
                $this->redirectToRoute('game_quizz');
            }
            if (isset($_SESSION['results']) && !empty($_SESSION['results'])) {
                $this->redirectToRoute('game_result');
            }


            if (isset($_SESSION['repasEnCour']) && !empty($_SESSION['repasEnCour'])) {

                // faire la requette pour indiquer dans quel zone on viens faire de l'affichage et quel affichage ont viens faire.

                // selon les ingredients choisi dans  $_SESSION['repasEnCour']

                $pedagoModel = new PedagoModel();
                $gameController = new GameController();
                $alimentsModel = new AlimentsModel();

                $aliments = $gameController->getAlimentSelected();


                $i = 1;
                foreach ($aliments as $idaliment) {

                    switch ($i) {
                        case '1':
                            $aliment1 = $alimentsModel->getAlimentsAndPedago($idaliment) ;
                            break;
                        case '2':
                            $aliment2 = $alimentsModel->getAlimentsAndPedago($idaliment) ;
                            break;
                        case '3':
                            $aliment3 = $alimentsModel->getAlimentsAndPedago($idaliment) ;
                            break;

                    }
                        $i++;
                }

                // Ont récupère les repas qui ont été selectionné utile pour le bouton repas et l'intestin
                $repas = $gameController->getRepasSelected(false);

                $this->show('front/carte',[
                    'repas' =>  $repas,
                    'aliment1' => $aliment1 ,
                    'aliment2' => $aliment2 ,
                    'aliment3' => $aliment3
                ]);

            }
            $this->redirectToRoute('game_assiette');

        }


}
