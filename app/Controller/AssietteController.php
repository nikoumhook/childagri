<?php

namespace Controller;

use \W\Controller\Controller;
use \Controller\GameController;
class AssietteController extends Controller
{



	/**
	 *  Redirection complete vers l'assiette avec les parametres nikel
	 */
	public function assiette($content =''){


        $gameController = new GameController();

        // la variable sessions['repasEnCours'] est créé une fois que les 3 ingredients ont été selectionné et unset quand il demande le retour sa la carte
        // donc si elle existe le player n'a rien a faire sur cette page mais devrait se situé sur la carte
        // vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv  < du coup ici ont controle si elle existe et ont la redirige si c'est le cas
        if (isset($_SESSION['repasEnCour']) && !empty($_SESSION['repasEnCour'])) {
            $this->redirectToRoute('game_carte');
        }

        if (isset($_SESSION['save']['id_quizz']) && !empty($_SESSION['save']['id_quizz']) && count(explode(',',$_SESSION['save']['id_quizz'])) == 12) {
            $this->redirectToRoute('game_carte');
        }

        // si tout est repondu il n'y a plus a venir sur l'assiette mais ont doit directement être redirigé sur le quizz

        // le player peut se trouver sur l'assiette uniquement si il est connecté
        if (isset($_SESSION['player'])) {

            // Ont récupère les repas qui ont été selectionné utile pour le bouton repas et l'intestin
            $repas = $gameController->getRepasSelected(false);


            $_SESSION['aliments_quizz']['uncomplete'] = explode(',', $_SESSION['save']['id_quizz']);
            $this->show('front/assiette',[
                'repas' =>  $repas,
                'aliments'=> $content
            ]);


        }

        // si il n'est pas connecté il est redirigé sur la page d'accueil.
        $this->redirectToRoute('game_landing');

	}

}
