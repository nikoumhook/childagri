<?php


namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;


use W\Security\AuthentificationModel;
use Respect\Validation\Validator as v;

class LandingController extends Controller

{

	/**
	 * Page d'accueil par défaut
	 */
	public function landingPage()
	{

        // si l'utilisateur est déja connecté ont le redirige sur l'assiette
        if (isset($_SESSION['player']) && !empty($_SESSION['player'])) {
            $this->redirectToRoute('game_assiette');
        }

		$this->show('landingPage.php');

	}




}
