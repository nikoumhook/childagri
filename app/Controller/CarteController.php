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

                $this->show('front/carte',[
                    'aliment1' => $aliment1 ,
                    'aliment2' => $aliment2 ,
                    'aliment3' => $aliment3 
                ]);

            }

            $this->redirectToRoute('game_assiette');

        }

        public function endCarte(){


            unset($_SESSION['repasEnCour']) ;

        }

}
