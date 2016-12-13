<?php

namespace Controller;

use \W\Controller\Controller;
use \Controller\GameController;
class AssietteController extends Controller
{



	/**
	 *  Redirection complete vers l'assiette avec les parametres nikel
	 */
	public function assiette(){

        if (isset($_SESSION['player'])) {

            // Ont récupère les repas qui ont été selectionné
            $gameController = new GameController();
            $repas = $gameController->getRepasSelected(false);

            // si des repas ont été validé je viens mettre la bonne forme a la valeur
            // if (!empty($repas)) {
            //     foreach ($repas as $key => $value) {
            //         $repasV[] = 'repas' . $value;
            //     }
            // }else {
            //     $repasV = NULL;
            // }
            // $repas = unserialize('a:2:{i:1;s:5:"1,2,3";i:4;s:5:"2,4,6";}');

            if (empty($repas)) {
                $this->show('front/assiette-taff-sur-selection-repas',[
                    'repas' =>  $repas
                ]);
            }else {

                $this->show('front/assiette-taff-sur-selection-repas',[
                    'repas' =>  $repas
                ]);
                var_dump($repas);
                die();
            }

        }else {
            $this->redirectToRoute('game_landing');
        }

	}

}
