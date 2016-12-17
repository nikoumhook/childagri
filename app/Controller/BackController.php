<?php

namespace Controller;

use \W\Controller\Controller;
use Respect\Validation\Validator as v;
use Model\PedagoModel;
use Model\AlimentsModel;
use Model\QuizzModel;

use Intervention\Image\ImageManagerStatic as Image;


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
        $modelQuizz = new QuizzModel();

        $listealiments = $modelPedago->getAliments();
        foreach ($listealiments as $key => $value) {
            if ($modelQuizz->getQuizzByIdAliment($value['id'])) {
                $listealiments[$key]['selected'] = true;
            }
            else {
                $listealiments[$key]['selected'] = false;
            }
        }

		$this->show('back/quizz', [
			'aliments'=>$listealiments
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

		$errors = [];
		$formValid = false;
		$modelPedago = new PedagoModel();
		$modelQuizz = new QuizzModel();

        if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
					$post[$key] = trim(strip_tags($value));
				}

			$usernameValidator = v::alnum('é,è,ê,à,ï,ö')->length(5, 20);

			// Verif QUESTION - REPONSE1
			if(!v::notEmpty()->length(20,1000)->validate($post['question1'])){
				$errors[] = 'Votre question doit comporter un minimum de 20 caractères';
			}

			if (!isset($post['answer1']) || empty($post['answer1']) || !($post['answer1']== 'oui' || $post['answer1']=='non')) {
					$errors[] = 'Votre devez choisir la réponse de votre question';
			}

			// Verif complément de réponse
			if(!v::notEmpty()->length(20,1000)->validate($post['explainAnswer1'])){
				$errors[] = 'Votre complément de réponse doit comporter un minimum de 20 caractères';
			}


			// Verif QUESTION - REPONSE2
			if(!v::notEmpty()->length(20,1000)->validate($post['question2'])){
				$errors[] = 'Votre question doit comporter un minimum de 20 caractères';
			}

			if (!isset($post['answer2']) || empty($post['answer2']) || !($post['answer2']== 'oui' || $post['answer2']=='non')) {
					$errors[] = 'Votre devez choisir la réponse de votre question';
			}

			// Verif complément de réponse
			if(!v::notEmpty()->length(20,1000)->validate($post['explainAnswer2'])){
				$errors[] = 'Votre complément de réponse doit comporter un minimum de 20 caractères';
			}


			// Verif QUESTION - REPONSE3
			if(!v::notEmpty()->length(20,1000)->validate($post['question3'])){
				$errors[] = 'Votre question doit comporter un minimum de 20 caractères';
			}

			if (!isset($post['answer3']) || empty($post['answer3']) || !($post['answer3']== 'oui' || $post['answer3']=='non')) {
					$errors[] = 'Votre devez choisir la réponse de votre question';
			}

			// Verif complément de réponse
			if(!v::notEmpty()->length(20,1000)->validate($post['explainAnswer3'])){
				$errors[] = 'Votre complément de réponse doit comporter un minimum de 20 caractères';
			}

			// Verif QUESTION - REPONSE4
			if(!v::notEmpty()->length(20,1000)->validate($post['question4'])){
				$errors[] = 'Votre question doit comporter un minimum de 20 caractères';
			}

			if (!isset($post['answer4']) || empty($post['answer4']) || !($post['answer4']== 'oui' || $post['answer4']=='non')) {
					$errors[] = 'Votre devez choisir la réponse de votre question';
			}

			// Verif complément de réponse
			if(!v::notEmpty()->length(20,1000)->validate($post['explainAnswer4'])){
				$errors[] = 'Votre complément de réponse doit comporter un minimum de 20 caractères';
			}

			if (count($errors) === 0) {


				$data1=[
					'content'		=> $post['question1'],
					'answer'		=> $post['answer1'],
					'explainAnswer' => $post['explainAnswer1']
				];

				$data2=[
					'content'		=> $post['question2'],
					'answer'		=> $post['answer2'],
					'explainAnswer' => $post['explainAnswer2']
				];

				$data3=[
					'content'		=> $post['question3'],
					'answer'		=> $post['answer3'],
					'explainAnswer' => $post['explainAnswer3']
				];

				$data4=[
					'content'		=> $post['question4'],
					'answer'		=> $post['answer4'],
					'explainAnswer' => $post['explainAnswer4']
				];

			}//fermeture if count $error=0

			$result=  $modelQuizz->update($data1, $post['id1']);
			$result1= $modelQuizz->update($data2, $post['id2']);
			$result2= $modelQuizz->update($data3, $post['id3']);
			$result3= $modelQuizz->update($data4, $post['id4']);

			if ($result && $result1 && $result2 && $result3) {
				$formValid=true;
			}

        }//fermeture 1ère condition !empty$POST

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
			'errors'	=>$errors,
			'success'	=>$formValid,
			'quizz1'	=>$quizz1,
			'quizz2'	=>$quizz2,
			'quizz3'	=>$quizz3,
			'quizz4'	=>$quizz4
			]);


	}//fermeture functionficheQuizz


	/***************** Page LISTE ALIMENT: AFFICHAGE  **********/

	public function listeAliment()
	{
		$modelPedago = new PedagoModel();
		$this->show('back/listeAliment', [
			'aliments'=>$modelPedago->getAliments()
			]);
	}


	/***************** Page FICHE ALIMENT: AFFICHAGE et traitement update  **********/

	public function ficheAliment($id)
	{
		$modelPedago = new PedagoModel();
		$modelAliments = new AlimentsModel();

		$errors = [];
		$formValid = false;
		$imgvalid= false;


		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}

			$usernameValidator = v::alnum('é,è,ê,à,ï,ö')->length(5, 20);

			if(!v::notEmpty()->length(3,100)->validate($post['aliment'])){
				$errors[] = 'Le nom de votre aliment doit comporter un minimum de 3 caractères';
			}

			if (!isset($post['land']) && !is_numeric($post['land'])) {
				$errors [] ="Vous devez selectionner la région de production de votre aliment dans le menu déroulant";
			}

			if(v::notEmpty()->validate($_FILES['picture']['name'])){

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

                // traitement de l'image

                $redimNeed = false ;

                // adresse de stockage des l'image :
                $adressImg = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/';

                if ($imgvalid) {

                    $picto = Image::make($_FILES['picture']['tmp_name']);

    				// On définit l'extension de l'image en fonction de son mimeType
    				switch($picto->mime()){
    						case 'image/jpg':
    						case 'image/jpeg':
                                $redimNeed = true ;
    						break;
    						case 'image/png':
                                $redimNeed = true ;
    						break;
    						case 'image/gif':
                                $redimNeed = true ;
    						break;

				    }// fin swich
                    if ($redimNeed) {
                        $picto->resize(256, 256);
                    }
                    // Le nom du picto + son extension

					$pictoName = 'aliment_'.$_FILES['picture']['name'];

					// On sauvegarde l'image

					$controle = $picto->save($adressImg.$pictoName);
                }// fin if $imgvalid

                // fin traitement de l'image

				$data = [
					'name'		=>  $post['aliment'],
					'id_land'	=>  $post['land'],
					'publish'	=>  $post['publish'],
					'repas1'	=>  $repas1,
					'repas2'	=>  $repas2,
					'repas3'	=>  $repas3,
					'repas4'	=>  $repas4
				];

			//condition si tu enregistre une img
			if ($imgvalid) {
					$data ['urlImg'] = 'img/'.$pictoName;
				}

			$result= $modelAliments->Update($data, $post['id']);

			$formValid = true;

			}//fermeture if count error =0

		//quoi qu'il se passe je redirige sur la route de la page (affichage du formualire vide)

		}// fermeture 1ère condition !empty

		$this->show('back/ficheAliment', [
			'aliment'=>$modelPedago->getOneAliment($id),
			'lands'=>$modelPedago->getLands(),
			'errors'=>$errors,
			'success'=>$formValid,
			]);

	}// fermeture function ficheAliment



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
				$post[$key] = trim(strip_tags($value));
			}

			$usernameValidator = v::alnum('é,è,ê,à,ï,ö')->length(5, 20);

			if(!v::notEmpty()->length(3,100)->validate($post['aliment'])){
				$errors[] = 'Le nom de votre aliment doit comporter un minimum de 3 caractères';
			}

			if (empty($post['land']) && !is_numeric($post['land'])) {
				$errors [] ="Vous devez selectionner la région de production de votre aliment dans le menu déroulant";
			}


			if(v::notEmpty()->validate($_FILES['picture']['name'])){

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

                // traitement de l'image

                $redimNeed = false ;

                // adresse de stockage des l'image :
                $adressImg = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/';

                if ($imgvalid) {

                    $picto = Image::make($_FILES['picture']['tmp_name']);

    				// On définit l'extension de l'image en fonction de son mimeType
    				switch($picto->mime()){
    						case 'image/jpg':
    						case 'image/jpeg':
                                $redimNeed = true ;
    						break;
    						case 'image/png':
                                $redimNeed = true ;
    						break;
    						case 'image/gif':
                                $redimNeed = true ;
    						break;

				    }// fin swich
                    if ($redimNeed) {
                        $picto->resize(256, 256);
                    }
                    // Le nom du picto + son extension

					$pictoName = 'aliment_'.$_FILES['picture']['name'];

					// On sauvegarde l'image

					$controle = $picto->save($adressImg.$pictoName);
                }// fin if $imgvalid

                // fin traitement de l'image

				$data = [
					'name'		=>   $post['aliment'],
					'id_land'	=>   $post['land'],
					//img
					'publish'	=>   $post['publish'],
					'repas1'	=>   $repas1,
					'repas2'	=>   $repas2,
					'repas3'	=>   $repas3,
					'repas4'	=>   $repas4

				];

				//condition si tu enregistre une img
				if ($imgvalid) {
					$data['urlImg'] = 'img/'.$pictoName;
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

	/***************** Page FICHE PEDAGO: AFFICHAGE  et traitement update **********/

	public function fichePedago($id)
	{

		$errors = [];
		$formValid = false;
		$mp3valid = false;
		$imgvalid= false;
		$modelPedago = new PedagoModel();
		$AlimentsModel = new AlimentsModel();

		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}

			$usernameValidator = v::alnum('é,è,ê,à,ï,ö')->length(5, 20);

			if(!v::notEmpty()->length(20,5000)->validate($post['content'])){
				$errors[] = 'Votre contenu pédagogique doit comporter un minimum de 20 caractères';
			}

			if (!isset($post['publish']) || empty($post['publish']) || !($post['publish']== 'oui' || $post['publish']=='non')) {
				$errors[] = 'Votre devez choisir si vous souhaitez publier votre contenu ou si vous souhaitez l\'enregistrer en brouillon';
			}

			//Condition fichier audio
			//ici valide le format du fichier audio
			if (v::notEmpty()->validate($_FILES['sound']['name'])) {

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

			if(v::notEmpty()->validate($_FILES['picture']['name'])){

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

                // traitement de l'image

                $redimNeed = false ;

                // adresse de stockage des l'image :
                $adressImg = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/';

                if ($imgvalid) {

                    $picto = Image::make($_FILES['picture']['tmp_name']);

                    // On définit l'extension de l'image en fonction de son mimeType
                    switch($picto->mime()){
                            case 'image/jpg':
                            case 'image/jpeg':
                                $redimNeed = true ;
                            break;
                            case 'image/png':
                                $redimNeed = true ;
                            break;
                            case 'image/gif':
                                $redimNeed = true ;
                            break;

                    }// fin swich
                    if ($redimNeed) {
                        //$picto->resize(256, 256);
                    }
                    // Le nom du picto + son extension

                    $pictoName = 'aliment_'.$_FILES['picture']['name'];

                    // On sauvegarde l'image

                    $controle = $picto->save($adressImg.$pictoName);
                }// fin if $imgvalid

                // fin traitement de l'image

                // traitement du son

                $redimNeed = false ;

                // adresse de stockage des l'image :
                $adressSound = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/sound/';

                if ($mp3valid) {

                    // On sauvegarde l'image
                    if (!move_uploaded_file($_FILES['sound']['tmp_name'], $adressSound.'Pedago_'.$_FILES['sound']['name'])) {
                        $mp3valid = false ;
                    }

                }// fin if $mp3valid

                // fin traitement du son


				$data = [
					'content' 	=>$post['content'],
					'publish'	=>$post['publish'],
				];

				//condition si tu enregistre une piste audio
				if ($mp3valid) {
					$data ['urlSound'] = '/sound/Pedago_'.$_FILES['sound']['name'];
				}

				//condition si tu enregistre une img
				if ($imgvalid) {
					$data ['urlImg'] = '/img/'.$pictoName;
				}

				$result= $modelPedago->Update($data, $post['id']);

				$formValid = true;

			}//fermeture if count error =0

			//quoi qu'il se passe je redirige sur la route de la page (affichage du formualire vide)

		}// fermeture 1ère condition !empty

		$this->show('back/fichePedago', [
			'pedago'=>$modelPedago->getOnePedagobyIdAliment($id),
			'errors'=>$errors,
			'success'=>$formValid,
			]);

	}//fermeture function fichePedago


	/***************** Page Zones Pédagogiques: AFFICHAGE et TRAITEMENTS **********/

	public function zonePedago(){


		$errors = [];
		$formValid = false;
		$modelPedago = new PedagoModel();
		$mp3valid = false;
		$imgvalid= false;

        // récupère les id des aliment qui sont deja associé
        $alimentAssoc = [];
        foreach ($modelPedago->findSelect('id_aliment') as $value) {
            if (is_array($value)) {
                foreach ($value as $value2) {
                    $alimentAssoc[] = $value2;
                }
            }
        }

		if (!empty($_POST)) {

			foreach ($_POST as $key => $value) {
				$post[$key] = trim(strip_tags($value));
			}

			$usernameValidator = v::alnum('é,è,ê,à,ï,ö')->length(5, 20);

			if (!isset($post['aliment']) && !is_numeric($post['aliment'])) {
			$errors [] ="Vous devez selectionner l'aliment de votre contenu pedagogique dans le menu déroulant";
			}

			if (!isset($post['publish']) || empty($post['publish']) || !($post['publish']== 'oui' || $post['publish']=='non')) {
				$errors[] = 'Votre devez choisir si vous souhaitez publier votre contenu pédagogique ou si vous souhaitez l\'enregistrer en brouillon';
			}

			if(!v::notEmpty()->length(20,5000)->validate($post['content'])){
				$errors[] = 'Votre contenu pédagogique doit comporter un minimum de 20 caractères';
			}

			//Condition fichier audio
			//ici valide le format du fichier audio
			if (v::notEmpty()->validate($_FILES['sound']['name'])) {

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

			if(v::notEmpty()->validate($_FILES['picture']['name'])){

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


                // traitement de l'image

                $redimNeed = false ;

                // adresse de stockage des l'image :
                $adressImg = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/';

                if ($imgvalid) {

                    $picto = Image::make($_FILES['picture']['tmp_name']);

                    // On définit l'extension de l'image en fonction de son mimeType
                    switch($picto->mime()){
                            case 'image/jpg':
                            case 'image/jpeg':
                                $redimNeed = true ;
                            break;
                            case 'image/png':
                                $redimNeed = true ;
                            break;
                            case 'image/gif':
                                $redimNeed = true ;
                            break;

                    }// fin swich
                    if ($redimNeed) {
                        //$picto->resize(256, 256);
                    }
                    // Le nom du picto + son extension

                    $pictoName = 'aliment_'.$_FILES['picture']['name'];

                    // On sauvegarde l'image

                    $controle = $picto->save($adressImg.$pictoName);
                }// fin if $imgvalid

                // fin traitement de l'image

                // traitement du son

                $redimNeed = false ;

                // adresse de stockage des l'image :
                $adressSound = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/sound/';

                if ($mp3valid) {

                    // On sauvegarde l'image
                    if (!move_uploaded_file($_FILES['sound']['tmp_name'], $adressSound.'Pedago_'.$_FILES['sound']['name'])) {
                        $mp3valid = false ;
                    }

                }// fin if $mp3valid

                // fin traitement du son


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
					$data ['urlSound'] = '/sound/'.'Pedago_'.$_FILES['sound']['name'];
				}

				//condition si tu enregistre une img
				if ($imgvalid) {
					$data ['urlImg'] = '/img/'.$pictoName;
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
            'alimentsAssoc'=>$alimentAssoc
			]);

	}//fermeture fonction zonePedago





}//fermeture de la class
