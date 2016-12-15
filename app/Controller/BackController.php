<?php

namespace Controller;

use \W\Controller\Controller;
use Respect\Validation\Validator as v;
use Model\PedagoModel;
use Model\AlimentsModel;
use Model\QuizzModel;


class BackController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('back/home');
	}

	/***************** Page QUIZZ: AFFICHAGE  **********/

	public function quizz()
	{
		$modelPedago = new PedagoModel();
		$this->show('back/quizz', [
			'aliments'=>$modelPedago->getAliments()
			]);
	}

	/***************** Page LISTE QUIZZ: AFFICHAGE  **********/

	public function listeQuizz()
	{
		$modelPedago = new PedagoModel();
		$this->show('back/listeQuizz', [
			'aliments'=>$modelPedago->getAliments()
			]);
	}

	/***************** Page FICHE QUIZZ: AFFICHAGE  **********/

	public function ficheQuizz($id)
	{
		$modelPedago = new PedagoModel();
		$conteneurQuizz = $modelPedago->getQuizzAliment($id);
        if($conteneurQuizz){
            $i = 1;
            foreach ($conteneurQuizz as $quizz) {
                switch ($i) {
                    case '1':
                    $quizz1=$quizz;
                    break;
                    case '2':
                    $quizz2=$quizz;
                    break;
                    case '3':
                    $quizz3=$quizz;
                    break;
                    case '4':
                    $quizz4=$quizz;
                    break;
                }

                $i++;

            }

        }else {
            $quizz1 = $quizz2 = $quizz3 = $quizz4 = '' ;
        }

		$this->show('back/ficheQuizz',[
			'quizz1'	=>	$quizz1,
			'quizz2'	=>	$quizz2,
			'quizz3'	=>	$quizz3,
			'quizz4'	=>	$quizz4
			]);
	}


	/***************** Page LISTE ALIMENT: AFFICHAGE  **********/

	public function listeAliment()
	{
		$modelPedago = new PedagoModel();
		$this->show('back/listeAliment', [
			'aliments'=>$modelPedago->getAliments()
			]);
	}


	/***************** Page FICHE ALIMENT: AFFICHAGE  **********/

	public function ficheAliment()
	{
		$modelPedago = new PedagoModel();
		$this->show('back/ficheAliment', [
			'aliment'=>$modelPedago->getOneAliment(),
			'lands'=>$modelPedago->getLands()
			]);
	}


	/***************** Page ALIMENT: AFFICHAGE et TRAITEMENTS **********/

	public function aliment()
	{
		$errors = [];
		$formValid = false;
		$imgvalid= false;
		$modelAliments = new AlimentsModel();
		$modelPedago = new PedagoModel();

		if (!empty($_POST)) {
			foreach ($_POST as $key => $value) {
				$post[$key] = trim($value);
			}

			$usernameValidator = v::alnum('é,è,ê,à,ï,ö')->length(5, 20);

			if(!v::notEmpty()->length(3,100)->validate($post['aliment'])){
				$errors[] = 'Le nom de votre aliment doit comporter un minimum de 3 caractères';
			}

			if (!isset($post['land']) && !is_numeric($post['land'])) {
				$errors [] ="Vous devez selectionner la région de production de votre aliment dans le menu déroulant";
			}


			if(v::notEmpty()->validate($_FILES['picture']['tmp_name'])){

				$imgvalid= true;

				//Condition fichier img
				//ici valide le mimetype (format) de l'image
				if(!v::image()->validate($_FILES['picture']['tmp_name'])){
					$errors[] = 'Votre image n\'est pas valide';
				}
				//ici valide le tmp name de l'image
				if (!v::uploaded()->validate($_FILES['picture']['tmp_name'])) {
					$errors[] = 'Une erreur est survenue lors de l\'upload de votre image';
				}

				//ici on valide la taille de l'image
				if (!v::size(null, '2MB')->validate($_FILES['picture']['tmp_name'])) {
					$errors[] = 'Il vous faut télécharger une image inférieure à 2MB';
				}

			}// fermeture condition si jamais c'est pas vide on controle l'image (pas obligatoire d'enregistrer l'image car brouillon)

			if (!isset($post['publish']) || empty($post['publish']) || !($post['publish']== 'oui' || $post['publish']=='non')) {
				$errors[] = 'Votre devez choisir si vous souhaitez publier votre aliment ou si vous souhaitez l\'enregistrer en brouillon';
			}

            // traitement des repas associé a l'ingredient
            if (isset($post['repas1']) && $post['repas1'] == 'oui' ) {
                $repas1 = 'oui';
            }else {
                $repas1 = 'non';
            }
            if (isset($post['repas2']) && $post['repas2'] == 'oui' ) {
                $repas2 = 'oui';
            }else {
                $repas2 = 'non';
            }
            if (isset($post['repas3']) && $post['repas3'] == 'oui' ) {
                $repas3 = 'oui';
            }else {
                $repas3 = 'non';
            }
            if (isset($post['repas4']) && $post['repas4'] == 'oui' ) {
                $repas4 = 'oui';
            }else {
                $repas4 = 'non';
            }

			//si mon formulaire n'a pas d'erreur
			if (count($errors) === 0) {



				$data = [
					'name'		=>   $post['aliment'],
					'id_land'	=>   $post['land'],
					'publish'	=>   $post['publish'],
					'repas1'	=>   $repas1,
					'repas2'	=>   $repas2,
					'repas3'	=>   $repas3,
					'repas4'	=>   $repas4

				];

				//condition si tu enregistre une img
				if ($imgvalid) {
					$data ['urlImg'] = $post['picture'];
				}

				$result= $modelAliments->insert($data);

				$formValid = true;

			}//fermeture if count error =0

			//quoi qu'il se passe je redirige sur la route de la page (affichage du formualire vide)

		}// fermeture 1ère condition !empty

		$this->show('back/aliment', [
			'lands'=>$modelPedago->getLands(),
			'errors'=>$errors,
			'success'=>$formValid,
			]);

	}// fermeture function aliment


	/***************** Page LISTE PEDAGO: AFFICHAGE  **********/

	public function listePedago()
	{
		$modelPedago = new PedagoModel();
		$this->show('back/listePedago', [
			'pedagos'=>$modelPedago->getPedago(),
			]);
	}

	/***************** Page FICHE PEDAGO: AFFICHAGE  **********/

	public function fichePedago($id)
	{
		$modelPedago = new PedagoModel();
		$this->show('back/fichePedago', [
			'pedago'=>$modelPedago->getOnePedagobyIdAliment($id),
			]);
	}


	/***************** Page Zones Pédagogiques: AFFICHAGE et TRAITEMENTS **********/

	public function zonePedago()
	{


		$errors = [];
		$formValid = false;
		$modelPedago = new PedagoModel();
		$mp3valid = false;
		$imgvalid= false;

		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim($value);
			}

			$usernameValidator = v::alnum('é,è,ê,à,ï,ö')->length(5, 20);

			if (!isset($post['aliment']) && !is_numeric($post['aliment'])) {
			$errors [] ="Vous devez selectionner l'aliment de votre contenu pedagogique dans le menu déroulant";
			}

/*			if (!isset($post['land']) && !is_numeric($post['land'])) {
			$errors [] ="Vous devez selectionner la région de production de votre aliment dans le menu déroulant";
			}*/

			if (!isset($post['publish']) || empty($post['publish']) || !($post['publish']== 'oui' || $post['publish']=='non')) {
				$errors[] = 'Votre devez choisir si vous souhaitez publier votre contenu pédagogique ou si vous souhaitez l\'enregistrer en brouillon';
			}

			if(!v::notEmpty()->length(20,5000)->validate($post['content'])){
				$errors[] = 'Votre contenu pédagogique doit comporter un minimum de 20 caractères';
			}

			//Condition fichier audio
			//ici valide le format du fichier audio
			if (v::notEmpty()->validate($_FILES['sound']['tmp_name'])) {

				$mp3valid= true;

				if(v::extension('mp3')->validate($_FILES['sound']['tmp_name'])){
					$errors[] = 'Votre fichier audio n\'est pas valide';
				}

				//ici valide le format du fichier audio
				if(v::mimetype('audio/mpeg3')->validate($_FILES['sound']['tmp_name'])){;
					$errors[] = 'Votre fichier audio n\'est pas valide';
				}

				//ici valide le tmp name du fichier audio
				if (!v::uploaded()->validate($_FILES['sound']['tmp_name'])) {
					$errors[] = 'Une erreur est survenue lors de l\'upload de votre fichier audio';
				}

				//ici on valide la taille de l'image // PAS BON
				if (!v::size(null, '8MB')->validate($_FILES['sound']['tmp_name'])) {
					$errors[] = 'Il vous faut télécharger un fichier audio inférieur à 8MB';
				}

			}//fermture condition si jamais c'est pas vide on controle la piste audio (pas obligatoire d'enregistrer la piste audio car brouillon

			if(v::notEmpty()->validate($_FILES['picture']['tmp_name'])){

				$imgvalid= true;

				//Condition fichier img
				//ici valide le mimetype (format) de l'image
				if(!v::image()->validate($_FILES['picture']['tmp_name'])){
					$errors[] = 'Votre image n\'est pas valide';
				}
				//ici valide le tmp name de l'image
				if (!v::uploaded()->validate($_FILES['picture']['tmp_name'])) {
					$errors[] = 'Une erreur est survenue lors de l\'upload de votre image';
				}

				//ici on valide la taille de l'image
				if (!v::size(null, '2MB')->validate($_FILES['picture']['tmp_name'])) {
					$errors[] = 'Il vous faut télécharger une image inférieure à 2MB';
				}

			}// fermture condition si jamais c'est pas vide on controle l'image (pas obligatoire d'enregistrer l'image car brouillon)


			//si mon formulaire n'a pas d'erreur
			if (count($errors) === 0) {

				$AlimentsModel = new AlimentsModel();
				$aliment= $AlimentsModel->find($post['aliment']);

				$data = [
					'id_aliment'=>$post['aliment'],
					'content' 	=>$post['content'],
					'publish'	=>$post['publish'],
					'id_land'	=>$aliment['id_land'],
				];

				//condition si tu enregistre une piste audio
				if ($mp3valid) {
					$data ['urlSound'] = $post['sound'];
				}

				//condition si tu enregistre une img
				if ($imgvalid) {
					$data ['urlImg'] = $post['picture'];
				}

				$result= $modelPedago->insert($data);

				$formValid = true;

			}//fermeture if count error =0

			//quoi qu'il se passe je redirige sur la route de la page (affichage du formualire vide)

		}// fermeture 1ère condition !empty

		$this->show('back/zonePedago', [
			'aliments'=>$modelPedago->getAliments(),
			'lands'=>$modelPedago->getLands(),
			'errors'=>$errors,
			'success'=>$formValid,
			]);

	}//fermeture fonction zonePedago





}//fermeture de la class
