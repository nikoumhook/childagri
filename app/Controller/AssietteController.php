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


        // le player peut se trouver sur l'assiette uniquement si il est connecté
        if (isset($_SESSION['player'])) {

            // Ont récupère les repas qui ont été selectionné
            $repas = $gameController->getRepasSelected(false);



            $this->show('front/assiette',[
                'repas' =>  $repas,
                'aliments'=> $content
            ]);


        }

        // si il n'est pas connecté il est redirigé sur la page d'accueil.
        $this->redirectToRoute('game_landing');

	}

}
