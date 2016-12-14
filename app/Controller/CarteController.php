<?php

namespace Controller;

use \W\Controller\Controller;

class CarteController extends Controller
{


        /**
        * methode qui redirige vers la carte
         */
        public function carte(){

            if (isset($_SESSION['repasEnCour']) && !empty($_SESSION['repasEnCour'])) {

                // faire la requette pour indiquer dans quel zone on viens faire de l'affichage et quel affichage ont viens faire.

                // selon les ingredients choisi dans  $_SESSION['repasEnCour']

                $this->show('front/carte');

            }

            $this->redirectToRoute('game_assiette');

        }

        public function endCarte(){


            unset($_SESSION['repasEnCour']) ;

        }

}
