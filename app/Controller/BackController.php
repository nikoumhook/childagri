<?php

namespace Controller;

use \W\Controller\Controller;
use Respect\Validation\Validator as v;
use Model\PedagoModel; 

class BackController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('back/home');
	}

	/**
	 * Page aliment: AFFIACHE de la page
	 */
	public function aliment()
	{
		$PedagoModel = new PedagoModel();
		$this->show('back/aliment',['lands'=>$PedagoModel->getLands()]);
	}



	/**
	 * Page Zone Pedago: AFFICHE dans le formulaire la liste de zones de production + la liste des ingrédients enregistrés dans la DB (pour 2menus select)
	 */
	public function zonePedago()
	{
		$PedagoModel = new PedagoModel();
		$this->show('back/zonePedago', [
			'aliments'=>$PedagoModel->getAliments(),
			'lands'=>$PedagoModel->getLands()
			]);

	}


	/**
	 * Page Zone Pedago: ajoute dans la DB du contenu pedago (text-img-audio) pour 1 ingrédient avec sa zone de prod
	 */

	public function addPedago ()
	{
		$errors = [];
		$formValid = false;
		$modelAddPedago = new PedagoModel();

		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim($value);
			}//fermeture de nettoyage de $post

			$usernameValidator = v::alnum('é,è,ê,à,ï,ö')->length(5, 20);

			if (!isset($post['aliment']) && !is_numeric($post['aliment'])) {
			$errors [] ="Vous devez selectionner l'aliment de votre contenu pedagogique dans le menu déroulant";
			}

			if (!isset($post['land']) && !is_numeric($post['land'])) {
			$errors [] ="Vous devez selectionner la région de production de votre aliment dans le menu déroulant";
			}

			if (!isset($post['publish']) || !empty($post['publish']) || $post['publish']!= 'oui' || $post['publish']!= 'non') {
				$errors[] = 'Votre devez choisir si vous souhaitez publier votre contenu pédagogique ou si vous souhaitez l\'enregistrer en brouillon';
			}

			if(!v::notEmpty()->length(50,1000)->validate($post['content'])){
				$errors[] = 'Votre contenu pédagogique doit comporter un minimum de 50 caractères';
			}

			//Condition fichier audio
			//ici valide le format du fichier audio
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


			//sin mon formulaire n'a pas d'erreur
			if (count($errors) === 0) {

			$result= $modelAddPedago->insert ([
					'id_aliment'=>$post['aliment'],
					'id_land'	=>$post['land'],
					'content' 	=>$post['content'],
					'urlImg'	=>$post['picture'],
					'urlSound'  =>$post['sound'],
					'pusblish'	=>$post['publish'], //verif avec Tony
				]);

			$formValid = true;

			}//fermeture if count error =0

			//ici Affichage des messages d'erreurs




		}//fermeture function addPedago

		
	}// fermeture fuction addPedago


}
