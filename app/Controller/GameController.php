<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\PlayersModel;
use \Model\SaveModel;

class GameController extends Controller{


    // dans la bdd il y a un champ ingame qui permet de stocker la configuration si une partie est en cour;
    // [partie en cour, id des fruits selectionné, repas deja choisi, quizz deja repondu]
    // ['true'    ;    '1,2,3'    ;    '1,3'    ;    '5,12'];
    // si la partie est fini il faut le vider


    private $idPlayer ;// utilisateur lié a la partie
    private $usernameUser ;// utilisateur lié a la partie
    private $idAlimentSelected ;// aliment deja selectionné par l'utilisateur
    // entre 0 et 3 aucune action
    private $repasSelected; // permet de stocker les repas selectionné. sous le forme $repasSelected[i]= 1 , $repasSelected[i] = 2
    private $zonePedagoSelected; // entre 0 et 3 , permet de bloquer l'accés au quizz tant que celui-ci n'a pas vu les 3 zone pedago [a utiliser dans jquery surement]
    private $resultats; // permet de stocker les quizz fait dans les clés et les reponse bonne ou fausse dans les valeurs.
    // ex: [id quizz : '1' => false,4 => true]



    // va construire la session de jeux avec les 2 variables de fonctionnement
    public function __construct($username,$id,){


        // config les informations de base du joueur :
        $this->setIdPlayer($id);

        $_SESSION['player'] = [
            'username'  =>  $username,
            'id'        =>  $id,
        ];

        // controle si une partie est en cour dans la base de donné :
        $playersModel = new PlayersModel();
        $saveModel = new SaveModel();


        // recupère dans la base de donnée les infos sur la player afin de récupéré ingame et de le controler
        $player = $playersModel->getPlayer($username);

        if (!$player) {
            return trigger_error("L'utilisateur n'existe pas !!!", E_USER_ERROR);
        }elseif (isset($player['inGame']) && !empty($player['inGame'])) {
            explode(',',$player['inGame']);
            // verifier si true a la premiere variable
            // et en seconde valeur donne le numero de la sauvegarde

            $save = $saveModel->getSave($id);

            var_dump($save);

            $this->show('default/home');

        }




    }// constructeur

    public function setIdPlayer($id){
        $this->idPlayer = $id;
    }

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

            public function assiette(){
                $this->show('front/assiette');
            }

            public function carte(){
                $this->show('front/carte');

            }

}// fin de class
