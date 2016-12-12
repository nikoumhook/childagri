<?php

namespace Controller;

use \W\Controller\Controller;

class BackController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('back/home');
	}

}
