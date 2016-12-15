<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\PlayersModel;

class BackUsersController extends Controller
{

	/**
	 * Affiche la liste des membres
	 */
	public function listeUser()
	{
		$playermodel = new PlayersModel();
		$players = $playermodel->findAll();
		$this->show('back/listeUser',['players' => $players]);
	}

}