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

            $gameController = new GameController();
            $repas = $gameController->getRepasSelected(false);
            foreach ($repas as $key => $value) {
                $repas[$key] = 'repas' . $value;
            }
            // $repas = unserialize('a:2:{i:1;s:5:"1,2,3";i:4;s:5:"2,4,6";}');

            if (empty($repas)) {
                $this->show('front/assiette-taff-sur-selection-repas');
            }else {

                var_dump($repas);
                die();
            }

        }else {
            $this->redirectToRoute('game_landing');
        }

	}

}
