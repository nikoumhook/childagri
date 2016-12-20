<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\PlayersModel;
use \Model\SaveModel;

class GameController extends Controller{


    private $alimentSelected ;// aliment deja selectionné par l'utilisateur
    private $repasSelected; // permet de stocker les repas selectionné. sous le forme $repasSelected[i]= 1 , $repasSelected[i] = 2
    private $resultats; // permet de stocker les quizz fait dans les clés et les reponse bonne ou fausse dans les valeurs.
    // ex: [id quizz : '1' => false,4 => true]


    /**
     * Controle la debut de la partie pour savoir ou diriger le joueur en fonction des sauvegardes
     */
    public function startGame(){

        // si le joueur est identifié et qu'il n'y a pas deja une partie dans sa session alors ont viens lui en attribuer une
        if (isset($_SESSION['player']) && !isset($_SESSION['save'])) {

            $save = $this->setSav();
            $_SESSION['save'] = $save['save'];

            if (isset($save['repasEnCour']) && !empty($save['repasEnCour']) && $save['repasEnCour']) {
                $_SESSION['repasEnCour'] = $save['repasEnCour'];
            }

        }

        if (isset($_SESSION['player'])) {

            // Si le joueur est connecté on va chercher (ou on créé) sa sauvegarde et ont la met dans la sessions
            if (isset($_SESSION['save']['repas'])) {
                $this->redirectToRoute('game_assiette');
            }

        }

        // si l'utilisateur n'est pas connecté alors ont le redirige vers la page de connexion
        $this->redirectToRoute('game_landing');



    }

    /**
     * construit Player dans la session
     * Cette fonction est utilisé a la fin de la requete ajax de connexion pour mettre en place la partie
     * @param  int $id id du player
     * @return les données de la sauvegarde si elle existe ou redirige sur la route de la carte si il n'y a aucune seuvegarde en cour
     */
    public function setPlayer($id){


        $playersModel = new PlayersModel();
        $player = $playersModel->find($id);

        // config les informations de base du joueur :

        $_SESSION['player'] = [
            'username'  =>  $player['username'],
            'id'        =>  $player['id'],
        ];


    }// setplayer

    /**
     * controle si la sauvegarde existe et sinon l'attribut et l'enregistre
     * @param  string $data option qui permet de mettre a jour les données
     * @return l'id de la sauvegarde
     */
     public function setSav(){

        if (isset($_SESSION['player']['id'])) {

             $playersModel = new PlayersModel();
             $player = $playersModel->find($_SESSION['player']['id']);

             // controle si une partie est en cour dans la base de donné :
             // recupère dans la base de donnée les infos sur la player afin de récupéré ingame et de le controler
             $saveModel = new SaveModel();

             // si une sauvegarde existe dans la base de donné :
             if (isset($player['inGame']) && !empty($player['inGame']) && is_numeric($player['inGame'])) {

                 // fait la requete pour récupéré la sauvegarde en cour
                 $save = $saveModel->getSav($player['inGame']);
                 $save = $this->structureSaveRecup($save);

                 // assigne automatiquement les repas qui ont deja été fait

                 return $save;

             }else {

                 // permet de creer une sauvegarde a la creation de la partie si elle n'existait pas
                 $save = $this->savGame();
                 $save = $this->structureSaveRecup($save);

                // la lie automatiquement dans ingame de Players dans la bdd
                 $playersModel->update([
                     'inGame' => $save['save']['id'],
                 ],$player['id']);
                 // Si il ne trouve pas de sauvegarde on commence le jeux vide


             }

             return $save ;

        }else{
            die("rediriger vers la connection avec un message d'exuse nous somme desolé nous avons peut etre perdu votre connection");
        }
     }


    /**
     * construit la session de jeux ou met a jour si des données sont passé
     * @param  bool $data variable qui est a true ou false et qui permet d'enregistré ou de créé une sauvegarde
     * @return les données de la sauvegarde si elle existe ou redirige sur la route de la carte si il n'y a aucune seuvegarde en cour
     */
     public function savGame($data = false){

         $saveModel = new SaveModel();


        if (!$data) {

            // créé juste un sauvegarde dans la base et retourne son id
            return $saveModel->createSav(); // retourne l'id d'une nouvelle sauvegarde

        }else {

            $data = [ 'repas' => serialize($_SESSION['save']['repas']), 'id_quizz' => $_SESSION['save']['id_quizz']];

            // si la partie est a la carte ont enregistre
            if (isset($_SESSION['repasEnCour']) && !empty($_SESSION['repasEnCour'])) {

                $data['repasEnCour'] = serialize($_SESSION['repasEnCour']) ;

            }
            if (isset($_SESSION['results']) && !empty($_SESSION['results'])) {

                $data['results'] = serialize($_SESSION['results']) ;

            }
            if (isset($_SESSION['aliments_quizz']) && !empty($_SESSION['aliments_quizz'])) {

                $data['aliments_quizz'] = serialize($_SESSION['aliments_quizz']) ;

            }

            $save = $saveModel->update($data,$_SESSION['save']['id']);

            if ($save) {

                return $save ;

            }
        }

        return false;

     }

     /**
      * Fonction qui ne sert qu'a structurer les sauvegarde récupéré dans la bbd pour les poster dans la session directement
      * @return @array save correct
      */
     public function structureSaveRecup($save){

         if (!empty($save)) {
             $saveGood['save']['id'] = $save['id'];
             $saveGood['save']['id_quizz'] = $save['id_quizz'];
             $saveGood['save']['repas'] = unserialize($save['repas']);
             $saveGood['repasEnCour'] = unserialize($save['repasEnCour']);
             $saveGood['results'] = unserialize($save['results']);
             $saveGood['aliments_quizz'] = unserialize($save['aliments_quizz']);
         }else {
             $saveGood = $save;
         }

         return $saveGood ;
     }

    /**
     * attribut a la propriété aliments ceux qui ont été selectionné
     * elle renvoi les données a jour en fonction du repasSelected
     * @return @mixed les données de la propriété ou false si il n'y a rien
     */
    public function getAlimentSelected(){

        if (!empty($_SESSION['repasEnCour'])) {

            foreach ($_SESSION['repasEnCour'] as $aliments) {

                if (!empty($aliments)) {
                    $aliments = $aliments ;
                }

            }

            return $aliments;
        }

        return false ;

    }

    /**
     * récupère les repas qui ont deja été selectionné repasSelected
     * @param @bool $implode par defaut a true permet de choisir le format de retour entre implode ou un simple tableau
     * @return @mixed les données de la propriété ou false si il n'y a rien
     */
    public function getRepasSelected($implode = true){

        $repas='';
        // recupère juste les repas selectionné
        if (!empty($_SESSION['save']['repas'])) {
            $repas = array_keys($_SESSION['save']['repas']) ;

            if ($implode) {
                // a voir si utile les mets sur une seule ligne
                $repas = implode(',',$repas);
            }
        }


        return $repas;

    }

    /**
     * Permet de d'attribuer a la propriété les valeurs des ingredient choisi dans le repas selectionné
     * @param @numeric $repas valeur qui correspond a la valeur du repas selectionné
     * @param @string $aliments correspond a la valeur des ingredients séparé par une vigrule !important (1,2,3)
     * @return @mixed return un error si c'est pas bon ou true si ok
     */
    public function setAlimentsToRepas($repas,$aliments){

        // repas = 1 si matin, 2 si apres-midi, 3 si goutter, 4 si soir
        switch ($repas) {
            case '1':
                if (!isset($_SESSION['save']['repas'][1])) {

                    $_SESSION['save']['repas'][1] = explode(',',$aliments);
                    return true;

                }else {
                    return trigger_error("Repas deja selectionné", E_USER_ERROR);
                }
                break;
            case '2':
                if (!isset($_SESSION['save']['repas'][2])) {

                    $_SESSION['save']['repas'][2] = explode(',',$aliments);
                    return true;

                }else {
                    return trigger_error("Repas deja selectionné", E_USER_ERROR);
                }
                break;
            case '3':
                if (!isset($_SESSION['save']['repas'][3])) {

                    $_SESSION['save']['repas'][3] = explode(',',$aliments);
                    return true;

                }else {
                    return trigger_error("Repas deja selectionné", E_USER_ERROR);
                }
                break;
            case '4':
                if (!isset($_SESSION['save']['repas'][4])) {

                    $_SESSION['save']['repas'][4] = explode(',',$aliments);
                    return true;

                }else {
                    return trigger_error("Repas deja selectionné", E_USER_ERROR);
                }
                break;
        }
    }

    /**
     * methode reset la partie et redirige
     * parametre par defaut a true pour rediriger sur la page d'accueil mais si false peut être utliliser sans redirection
     */
    public function resetGame($redirect = true){

        $playersModel = new PlayersModel();
        $saveModel = new SaveModel();

        $playersModel->update([
            'inGame' => '',
        ],$_SESSION['player']['id']);

        $saveModel->deleteSav($_SESSION['save']['id']);

        unset($_SESSION['save']);
        unset($_SESSION['repasEnCour']);
        unset($_SESSION['results']);
        unset($_SESSION['aliments_quizz']);

        if ($redirect) {
            $this->redirectToRoute('game_startPlay');
        }

    }

    /**
     * methode qui redirige vers l'assiette
     */
    public function quitGame(){

        $this->savGame(true);

        unset($_SESSION['player']);
        unset($_SESSION['save']);
        unset($_SESSION['repasEnCour']);
        unset($_SESSION['results']);
        unset($_SESSION['aliments_quizz']);

        $this->redirectToRoute('game_landing');

    }


}// fin de class
