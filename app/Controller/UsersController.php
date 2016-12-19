<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;
use Respect\Validation\Validator as v;
use \W\Security\AuthorizationModel;

class UsersController extends Controller
{

    public function login(){

        $usersModel = new UsersModel();
        $authentificationModel = new AuthentificationModel();

        if ($authentificationModel->getLoggedUser()) {
            $this->redirectToRoute('back_home');
        }

        // controle du formulaire passé
        $errors =[];

        if (!empty($_POST)) {

            $post = array_map('strip_tags',array_map('trim',$_POST));

            if(!v::notEmpty()->email()->validate($post['email'])){
				$errors[] = 'L\'adresse email n\'est pas valide';
			}
            if(!v::notEmpty()->validate($post['password'])){
				$errors[] = 'Le mot de passe n\'a pas été rempli';
			}

            if (empty($errors)) {

                $controle = $authentificationModel->isValidLoginInfo($post['email'],$post['password']);

                if ($controle) {
                    if ($controle) {
                        $controle = $usersModel->getUserByUsernameOrEmail($post['email']);
                            if ($controle['role'] != 'out') {
                                $authentificationModel->logUserIn($controle);
                                $this->redirectToRoute('back_home');
                            }else {
                                $errors[] = 'Votre compte est en attente de validation par un administrateur';
                            }
                    }
                }

            }


        }

        $this->show('back/login',[
            'errors' => $errors
        ]);

    }


    public function addUser(){

        $authentificationModel = new AuthentificationModel();

        $errors = [];
        $controlMail = false; // sert a controler si le champ mail a été rempli
        $usersModel = new UsersModel();

        if (!empty($_POST)) {

            foreach ($_POST as $key => $value) {
                $post[$key] = trim(strip_tags($value));
            }//fermeture de nettoyage de $post


            if(!v::notEmpty()->alnum()->length(2,15)->validate($post['username'])){
                $errors[] = 'Choisis un nom d\'utilisateur entre 2 et 15 lettres';
            }

            if($usersModel->getUserByUsernameOrEmail($post['email'])){
                $errors[] = 'Cette email est déja pris';
            }

            if(!v::notEmpty()->length(5,15)->validate($post['password'])){
                $errors[] = 'Choisis un mot de passe entre 5 et 15 lettres';
            }

            if((!v::email()->validate($post['email']))){
                $errors[] = 'Ton email n\'est pas écrit correctement';
            }

            //sin mon formulaire n'a pas d'erreur
            if (count($errors) === 0) {

                //je déclare une varaible pour traiter l'insertion
                $dataInsert=[
                    'username' => $post['username'],
                    'email'  => $post['email'],
                    'role'  => $post['out'],
                    'password'	=> password_hash($post['password'], PASSWORD_DEFAULT),
                ];

                //Si la methode d'insertion s'execute
                $user = $usersModel->insert($dataInsert);
                if($user){

                    // ont enregistre la joueur dans la session.
                    $this->redirectToRoute('login');

                }

            } // fermeture if count $error ===0


        }//fermeture 1ère condition !empty

        $this->show('back/addUser',[
            'errors'    =>  $errors,
        ]);

    }

    public function logout(){

        $authentificationModel = new AuthentificationModel();

        // Si l'utilisateur n'est pas connecté
        if ($authentificationModel->getLoggedUser()) {
            $authentificationModel->logUserOut();
        }

        $this->redirectToRoute('login');

    }

    public function listUsers(){


        $authentificationModel = new AuthentificationModel();
        $usersModel = new UsersModel();

        if (!$authentificationModel->getLoggedUser()) {
            $this->redirectToRoute('login');
        }


        if (!empty($_POST)) {

            if ($_POST['action'] == 'validate' && isset($_POST['users']) && !empty($_POST['users'])) {

                foreach ($_POST['users'] as $userid) {
                    $usersModel->update([
                        'role'  =>  ''
                    ],$userid);
                }


            }elseif ($_POST['action'] == 'delete' && isset($_POST['users']) && !empty($_POST['users'])) {

                foreach ($_POST['users'] as $userid) {
                    $debug = $usersModel->delete($userid);
                }

            }elseif ($_POST['action'] == 'blocked' && isset($_POST['users']) && !empty($_POST['users'])) {

                foreach ($_POST['users'] as $userid) {
                    $usersModel->update([
                        'role'  =>  'out'
                    ],$userid);
                }

            }
        }// fin !empty $POST


        $usersModel = new UsersModel();
        $users = $usersModel->findAll();

        $this->show('back/userslist',[
            'users'     =>  $users,
        ]);
        var_dump($users);
        die;

    }

}
