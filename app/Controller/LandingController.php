<?php


namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
		$this->redirectToRoute('user_page1');
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