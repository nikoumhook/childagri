<?php

namespace Controller;

use \W\Controller\Controller;
use Model\PlayersModel; 
use Respect\Validation\Validator as v;

class AjaxController extends Controller
{


	//METHODE ADD PLAYER : page landing Page - Formulaire d'inscription
	public function addPlayer()
	{
		$errors = [];
		$modelAddPlayer = new PlayersModel();

		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim($value);
			}//fermeture de nettoyage de $post

			$usernameValidator = v::alnum('é,è,ê,à,ï,ö')->length(5, 20);

			if(!v::notEmpty()->length(2,15)->validate($post['firstname'])){
				$errors[] = 'Ton prénom nom doit comporter entre 2 et 15 lettres';
			}

			if(!v::notEmpty()->length(2,15)->validate($post['lastname'])){
				$errors[] = 'Ton nom nom doit comporter entre 2 et 15 lettres';
			}

			if(!v::notEmpty()->length(2,15)->validate($post['username'])){
				$errors[] = 'Choisi un pseudo entre 2 et 15 lettres';
			}

			if(!v::notEmpty()->length(5,15)->validate($post['password'])){
				$errors[] = 'Choisi un mot de passe nom entre 5 et 15 lettres';
			}

			if($post['passwordVerify']!= $post['password']){
				$errors[] = 'Attention tu n\'as pas écrit le même mot de passe';
			}

			if((!v::notEmpty()->email()->validate($post['mail']))){
				$errors[] = 'Ton email n\'est pas écrit correctement';
			}

			//sin mon formulaire n'a pas d'erreur
			if (count($errors) === 0) {
			
				//je déclare une varaible pour traiter l'insertion
				$dataInsert=[
					'firstname' => $post['firstname'],
					'lastname'  => $post['lastname'],
					'username'	=> $post['username'],
					'email'		=> $post['mail'],
					'password'	=> password_hash($post['password'], PASSWORD_DEFAULT),
				];
	
				//Si la methode d'insertion s'execute
				if($modelAddPlayer->insert($dataInsert)){
					$this->showJson(['code'=>'valid', 'msg'=>'Bravo tu es inscrit ! Nous aussi on est ravis. A toi de joueur maintenant']);
				}

			} // fermeture if count $error ===0

			//sinon (si mon formulaire a des erreurs)
			else{
				$this->showJson(['code'=>'error', 'msg'=>implode( '<br>',$errors)]);
			}

		}//fermeture 1ère condition !empty

	}// fermeture function AddPlayer




//METHODE CONNECT PLAYER : page landing Page - Formulaire de connexion
	public function connectPlayer()
	{
		$errors = null;

		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim($value);
			}

			if (empty($post['username']) || empty($post['passwordconnect'])) {
				$error = 'Pour te connecter il te faut saisir ton pseudo et ton mot de passe';
			}

			else{
				$connectPlayer = new PlayersModel();
					if($result= $connectPlayer->isValidLoginInfo($post['username'], $post['passwordconnect'])){
						$this->showJson(['code'=>'valid', 'msg'=>'Bravo tu es bien connecté ! Prêt feu, jouez !']);
					}
				}
		}// fermeture 1ère condition !empty
	}// fermeture function connectPlayer


}//fermeture de la class
