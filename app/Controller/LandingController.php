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
		$this->show('landingPage.php');
		
	}


	/**
	 * Page 404
	 */
	public function NotFound()
	{
		//$this ->showNotFound est une methode qui existe déjà
		$this->showNotFound();
	}







}