<?php

namespace Controller;

use \W\Controller\Controller;
use Model\PlayersModel;
use \Controller\GameController;
use Respect\Validation\Validator as v;

class AjaxController extends Controller
{


	//METHODE ADD PLAYER : page landing Page - Formulaire d'inscription
	public function addPlayer()
	{
		$errors = [];
        $controlMail = false; // sert a controler si le champ mail a été rempli
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
				$errors[] = 'Choisis un pseudo entre 2 et 15 lettres';
			}

			if($modelAddPlayer->getplayer($post['username'])){
				$errors[] = 'Ce pseudo est déja pris';
			}

			if(!v::notEmpty()->length(5,15)->validate($post['password'])){
				$errors[] = 'Choisis un mot de passe nom entre 5 et 15 lettres';
			}

			if($post['passwordVerify']!= $post['password']){
				$errors[] = 'Attention tu n\'as pas écrit le même mot de passe';
			}

			if (v::notEmpty()->validate($post['mail'])) {
                $controlMail = true;
                if((!v::email()->validate($post['mail']))){
    				$errors[] = 'Ton email n\'est pas écrit correctement';
    			}
			}

			//sin mon formulaire n'a pas d'erreur
			if (count($errors) === 0) {

				//je déclare une varaible pour traiter l'insertion
				$dataInsert=[
					'firstname' => $post['firstname'],
					'lastname'  => $post['lastname'],
					'username'	=> $post['username'],
					'password'	=> password_hash($post['password'], PASSWORD_DEFAULT),
				];
                if ($controlMail) {
                    $dataInsert['email'] = $post['mail'];
                }

				//Si la methode d'insertion s'execute
                $user = $modelAddPlayer->insert($dataInsert);
				if($user){

                    // ont enregistre la joueur dans la session.
                    $gameController = new GameController();
                    $gameController->setPlayer($user['id']);

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
		$errors = [];

		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim($value);
			}

			if (empty($post['username']) || empty($post['passwordconnect'])) {
				$error[] = 'Pour te connecter il te faut saisir ton pseudo et ton mot de passe';
			}
			else{
				$connectPlayer = new PlayersModel();
					if($result= $connectPlayer->isValidLoginInfo($post['username'], $post['passwordconnect'])){

                        // ont enregistre la joueur dans la session.
                        $gameController = new GameController();
                        $gameController->setPlayer($result);

						$this->showJson(['code'=>'valid', 'msg'=>'Bravo tu es bien connecté. <br>PRET, FEU, JOUEZ !']);
					}else {
					    $error[] = 'si tu as oublié ton mot de passe demande le ici';
					}
				}

            if (count($error) != 0) {
                $this->showJson(['code'=>'error', 'msg'=> implode(',',$error)]);
            }
		}// fermeture 1ère condition !empty
	}// fermeture function connectPlayer





	/***************** Page quizz:  TRAITEMENTS **********/
	public function quizz()
	{

		$errors = [];
		$formValid = false;
		$modelQuizz = new QuizzModel();
		$modelPedago = new PedagoModel();

		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim($value);
			}

			$usernameValidator = v::alnum('é,è,ê,à,ï,ö')->length(5, 20);

			if (!isset($post['aliment']) && !is_numeric($post['aliment'])) {
				$errors [] ="Vous devez selectionner l'aliment dont vous rédigez le quizz dans le menu déroulant";
			}

			// Verif QUESTION - REPONSE 1
			if(!v::notEmpty()->length(20,1000)->validate($post['question1'])){
				$errors[] = 'Votre question doit comporter un minimum de 20 caractères';
			}

			if (!isset($post['answer1']) || empty($post['answer1']) || !($post['answer1']== 'oui' || $post['answer1']=='non')) {
				$errors[] = 'Votre devez choisir la réponse de votre première question';
			}

			// Verif QUESTION - REPONSE 2
			if(!v::notEmpty()->length(20,1000)->validate($post['question2'])){
				$errors[] = 'Votre question doit comporter un minimum de 20 caractères';
			}

			if (!isset($post['answer2']) || empty($post['answer2']) || !($post['answer2']== 'oui' || $post['answer2']=='non')) {
				$errors[] = 'Votre devez choisir la réponse de votre deuxième question';
			}

			// Verif QUESTION - REPONSE 3
			if(!v::notEmpty()->length(20,1000)->validate($post['question3'])){
				$errors[] = 'Votre question doit comporter un minimum de 20 caractères';
			}

			if (!isset($post['answer3']) || empty($post['answer3']) || !($post['answer3']== 'oui' || $post['answer3']=='non')) {
				$errors[] = 'Votre devez choisir la réponse de votre troisième question';
			}

			// Verif QUESTION - REPONSE 4
			if(!v::notEmpty()->length(20,1000)->validate($post['question4'])){
				$errors[] = 'Votre question doit comporter un minimum de 20 caractères';
			}

			if (!isset($post['answer4']) || empty($post['answer4']) || !($post['answer4']== 'oui' || $post['answer4']=='non')) {
				$errors[] = 'Votre devez choisir la réponse de votre quatrième question';
			}

			//si mon formulaire n'a pas d'erreur
			if (count($errors) === 0) {


				$dataInsert1 = [
					'question1'=>$post['question1'],
					'answer1'=>$post['answer1'],
				];

				$dataInsert2 = [
					'question2'=>$post['question2'],
					'answer2'=>$post['answer2'],
				];

				$dataInsert3 = [
					'question3'=>$post['question3'],
					'answer3'=>$post['answer3'], 
				];

				$dataInsert4 = [
					'question4'=>$post['question4'],
					'answer4'=>$post['answer4'],
				];

				if ($modelQuizz->insert($dataInsert1)) {
					$this->showJson(['code'=>'valid', 'msg'=>'Votre première question a bien été enregistré dans le quizz']);
				}
			
				if ($modelQuizz->insert($dataInsert2)) {
					$this->showJson(['code'=>'valid', 'msg'=>'Votre deuxième question a bien été enregistré dans le quizz']);
				}
				
				if ($modelQuizz->insert($dataInsert3)) {
					$this->showJson(['code'=>'valid', 'msg'=>'Votre troisième question a bien été enregistré dans le quizz']);
				}

				if ($modelQuizz->insert($dataInsert4)) {
					$this->showJson(['code'=>'valid', 'msg'=>'Votre quatrième question a bien été enregistré dans le quizz']);
				}

			}//fermeture if count error=0

			//sinon (si le formulaire a des erreurs)	
			else {
				$this->showJson (['code'=>'error', 'msg'=>implode( '<br>',$errors)])

			}
			
		}// fermeture 1ère condition !empty

	} // fermeture function quizz








}//fermeture de la class
