<?php

namespace Controller;

use \W\Controller\Controller;
use Model\PlayersModel;
use Model\AlimentsModel;
use Model\QuizzModel;
use \Controller\GameController;
use Respect\Validation\Validator as v;


class AjaxController extends Controller
{

    private $nbrDeRepasRequis = 2 ;

	//METHODE ADD PLAYER : page landing Page - Formulaire d'inscription
	public function addPlayer()
	{
		$errors = [];
        $controlMail = false; // sert a controler si le champ mail a été rempli
		$modelAddPlayer = new PlayersModel();

		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
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
				$post[$key] = trim(strip_tags($value));
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
					    $error[] = 'Si tu as oublié ton mot de passe demande le ici';
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


		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}

			$usernameValidator = v::alnum('é,è,ê,à,ï,ö')->length(5, 20);


			if (!isset($post['aliment']) || !is_numeric($post['aliment']) || empty($post['aliment'])) {
				$errors [] ="Vous devez selectionner l'aliment dont vous rédigez le quizz dans le menu déroulant";
			}

			// Verif QUESTION - REPONSE
			if(!v::notEmpty()->length(20,1000)->validate($post['question'])){
				$errors[] = 'Votre question doit comporter un minimum de 20 caractères';
			}

			if (!isset($post['answer']) || empty($post['answer']) || !($post['answer']== 'oui' || $post['answer']=='non')) {
				$errors[] = 'Votre devez choisir la réponse de votre question';
			}


			// Verif complément de réponse
			if(!v::notEmpty()->length(20,1000)->validate($post['ExplainAnswer'])){
				$errors[] = 'Votre complément de réponse doit comporter un minimum de 20 caractères';
			}

			//si mon formulaire n'a pas d'erreur
			if (count($errors) === 0) {

				$dataInsert = [
					'id_aliment'	=>	$post['aliment'],
					'content' 		=>	$post['question'],
					'answer' 		=>	$post['answer'],
					'explainAnswer' =>	$post['ExplainAnswer']
				];

				if ($modelQuizz->insert($dataInsert)) {
					$this->showJson(['code'=>'valid', 'msg'=>'Votre question a bien été enregistré dans le quizz']);
				}

			}//fermeture if count error=0

			//sinon (si le formulaire a des erreurs)
			else {
				$this->showJson (['code'=>'error', 'msg'=>implode( '<br>',$errors)]);
			}

		}// fermeture 1ère condition !empty

	} // fermeture function quizz


    public function finAssiette(){
        $gameController = new GameController();

        if (!empty($_POST['repas']) && is_numeric($_POST['repas']) && !empty($_POST['aliments'])) {

            // Stock le repas qui vient d'être fait pour la passer a la carte
            $_SESSION['repasEnCour'] = [ $_POST['repas'] => $_POST['aliments'] ];

            $controle1 = $gameController->setAlimentsToRepas($_POST['repas'],implode(',',$_POST['aliments']));

            $controle2 = $gameController->savGame(true);

            if ($controle1 && $controle2) {

                $this->showJson(['control' => 'ok']);
            }

            $this->showJson(['control' => 'ko']);
        }

    }// fin fonction fin Assiette

    // fonction qui permet de récupéré l'affichage des ingredients en fonction du POST['']
    public function getNeedIngredientsForRepas(){

        $alimentsModel = new AlimentsModel();

        $alimentsSelected = [];

        // construction des aliments deja selectionné
        if (!empty($_SESSION['save']['repas'])) {
            $alimentsSelected = '';
            foreach ($_SESSION['save']['repas'] as $value) {
                $alimentsSelected .= implode(',',$value);
            }
            $alimentsSelected = explode(',',$alimentsSelected);
        }

        // preparation de l'affichage pour la liste des ingredients

        $aliments = $alimentsModel->getAlimentForRepas();


        if ($aliments) {
            //$html = '';
            $html = '<a class="customNavigation btn prev"> < </a><ul id="owl-demo">' ;
            foreach ($aliments as $aliment) {

                if ($aliment['publish'] == 'oui' && !empty($aliment['urlImg']) && !in_array($aliment['id'],$alimentsSelected)) {

                    $html .= '<li class="item" id="from'.$aliment['id'].'" name="'.$aliment['name'].'"><img src="../assets/'.$aliment['urlImg'].'" alt=""></li>';

                }
            };

            $html .= '</ul><a class="customNavigation btn next"> > </a>' ;


            $this->showJson(['ingredients' => $html,'success'=> 'ok']);
        }



    }// fin fonction getNeedIngredientsForRepas


    // fonction qui controle la sortie de la page carte
    public function finCarte(){

        $gameController = new GameController();

        $success = false ;

        // si le nombre de repas reglementaire a été
        if (count($_SESSION['save']['repas']) >= $this->nbrDeRepasRequis) {


            foreach ($_SESSION['save']['repas'] as $key => $value) {
                $quizz[] = $value ;
            }

            foreach ($quizz as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $aliments) {
                        $alimentsId[] = $aliments;
                    }
                }
            }


            $_SESSION['save']['id_quizz'] = implode(',',$alimentsId);

        }

        unset($_SESSION['repasEnCour']) ;
        $controle1 = $gameController->savGame(true);
        if ($controle1) {
            $success = true;
        }


        $this->ShowJson(['success' => $success]);
        //controle au cas ou si la sauvegarde c'est bien passé si le nombre de rpas est atteind


    }



}//fermeture de la class
