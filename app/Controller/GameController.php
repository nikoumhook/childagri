<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\PlayersModel;
use \Model\SaveModel;

class GameController extends Controller{


    private $idPlayer ;// utilisateur lié a la partie
    private $usernameUser ;// utilisateur lié a la partie
    private $alimentSelected ;// aliment deja selectionné par l'utilisateur
    private $repasSelected; // permet de stocker les repas selectionné. sous le forme $repasSelected[i]= 1 , $repasSelected[i] = 2
    private $resultats; // permet de stocker les quizz fait dans les clés et les reponse bonne ou fausse dans les valeurs.
    // ex: [id quizz : '1' => false,4 => true]



    /**
     * construit la session de jeux
     * @param  string $username username du player
     * @return les données de la sauvegarde si elle existe ou redirige sur la route de la carte si il n'y a aucune seuvegarde en cour
     */
    public function setPlayer($username){

        $playersModel = new PlayersModel();
        $player = $playersModel->getPlayer($username);

        // config les informations de base du joueur :
        $this->setIdPlayer($player['id']);

        $_SESSION['player'] = [
            'username'  =>  $username,
            'id'        =>  $player['id'],
        ];

        // controle si une partie est en cour dans la base de donné :
        // recupère dans la base de donnée les infos sur la player afin de récupéré ingame et de le controler
        $saveModel = new SaveModel();

        if (!$player) {

            return trigger_error("L'utilisateur n'existe pas !!!", E_USER_ERROR);

        }elseif (isset($player['inGame']) && !empty($player['inGame']) && is_numeric($player['inGame'])) {

            // fait la requete pour récupéré la sauvegarde en cour
            $save = $saveModel->getSav($player['inGame']);

            // assigne automatiquement les repas qui ont deja été fait
            $this->repasSelected = unserialize($save['repas']);

            // DEBUG !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            // test de ma methode pour voir si ont récupère bien les aliments deja selectionné
            $this->setAlimentSelected();
            echo "<pre>";
            var_dump($save);
            echo "aliments" ;
            var_dump($this->alimentSelected);
            echo "repas" ;
            var_dump($this->repasSelected);
            echo "getrepasselected";
            var_dump($this->getRepasSelected());
            echo "</pre>";
            die('faire aller sur la carte de france avec la config passé');
            // DEBUG !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        }else {
            // permet de creer une sauvegarde a la creation de la partie si elle n'existait pas
            $save = $this->savGame();

            // la lie automatiquement dans ingame de Players dans la bdd
            $playersModel->update([
                'inGame' => $save,
            ],$player['id']);

            die("permet d'instaurer une sauvegarde des la creation de l'utilisateur");
        }

        // Si il ne trouve pas de sauvegarde on commence le jeux vide
        $this->redirectToRoute('game_assiette');



    }// constructeur

    /**
     * construit la session de jeux ou met a jour si des données sont passé
     * @param  string $data option qui permet de mettre a jour les données
     * @return les données de la sauvegarde si elle existe ou redirige sur la route de la carte si il n'y a aucune seuvegarde en cour
     */
     public function savGame($data = []){

         $saveModel = new SaveModel();

        if (empty($data)) {
            return $saveModel->createSav();
        }else {
            $save = $SaveModel->update($data);
            if ($save) {
                return $save ;
            }
        }

        return false;

     }

    /**
     * rempli la propriété id de l'objet
     * @param  string $id id du player
     * @return $this l'objet
     */
    public function setIdPlayer($id){

        $this->idPlayer = $id;

        return $this;

    }

    /**
     * attribut a la propriété aliments ceux qui ont été selectionné
     * elle renvoi les données a jour en fonction du repasSelected
     * @return @mixed les données de la propriété ou false si il n'y a rien
     */
    public function setAlimentSelected(){

        if (!empty($this->repasSelected)) {
            foreach ($this->repasSelected as $aliment) {
                $this->alimentSelected[] = $aliments ;
            }

            return $this->alimentSelected;
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
        if (!empty($this->repasSelected)) {
            $repas = array_keys($this->repasSelected) ;

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
                if (isset(repas[1]) && !empty(repas[1])) {
                    $repas[1] = explode(',',$aliments);
                    $this->repasSelected[] = 1;

                    // retourne sur une methode qui lui dit quel ingregients choisir dans la bdd puis show la carte de france
                }else {
                    return trigger_error("Repas deja selectionné", E_USER_ERROR);
                }
                break;
            case '2':
                if (isset(repas[2]) && !empty(repas[2])) {
                    $repas[2] = explode(',',$aliments);
                    $this->repasSelected[] = 2;
                    // retourne sur une methode qui lui dit quel ingregients choisir dans la bdd puis show la carte de france
                }else {
                    return trigger_error("Repas deja selectionné", E_USER_ERROR);
                }
                break;
            case '3':
                if (isset(repas[3]) && !empty(repas[3])) {
                    $repas[3] = explode(',',$aliments);
                    $this->repasSelected[] = 3;
                    // retourne sur une methode qui lui dit quel ingregients choisir dans la bdd puis show la carte de france
                }else {
                    return trigger_error("Repas deja selectionné", E_USER_ERROR);
                }
                break;
            case '4':
                if (isset(repas[4]) && !empty(repas[4])) {
                    $repas[4] = explode(',',$aliments);
                    $this->repasSelected[] = 4;
                    // retourne sur une methode qui lui dit quel ingregients choisir dans la bdd puis show la carte de france
                }else {
                    return trigger_error("Repas deja selectionné", E_USER_ERROR);
                }
                break;
        }
    }

    /**
     * methode qui redirige vers l'assiette
     */
    public function assiette(){
        $this->show('front/assiette');
    }

    /**
    * methode qui redirige vers la carte
     */
    public function carte(){
        $this->show('front/carte');

    }

}// fin de class
