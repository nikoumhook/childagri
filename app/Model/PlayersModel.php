<?php
namespace Model;

use \W\Model\Model;
use \W\Model\ConnectionModel;

class PlayersModel extends Model
{
	
	/**
	 * Récupère un utilisateur en fonction de son email ou de son pseudo
	 * @param string $usernameOrEmail Le pseudo ou l'email d'un utilisateur
	 * @return mixed L'utilisateur, ou false si non trouvé
	 */
	public function getPlayer($username)
	{

		$app = getApp();
		$sql = 'SELECT * FROM ' . $this->table . 
			   ' WHERE username = :username';
		$dbh = ConnectionModel::getDbh();
		$sth = $dbh->prepare($sql);
		$sth->bindValue(':username', $username);
		
		if($sth->execute()){
			$foundUser = $sth->fetch();
			if($foundUser){
				return $foundUser;
			}
		}

		return false;
	}



	/**
	 * Vérifie qu'une combinaison d'email/username et mot de passe (en clair) sont présents en bdd et valides
	 * @param  string $usernameOrEmail Le pseudo ou l'email à test
	 * @param  string $plainPassword Le mot de passe en clair à tester
	 * @return int  0 si invalide, l'identifiant de l'utilisateur si valide
	 */
	public function isValidLoginInfo($username, $plainPassword)
	{

		$app = getApp();
		$username = strip_tags(trim($username));
		$foundUser = $this->getPlayer($username);
		if(!$foundUser){
			return 0;
		}

		if(password_verify($plainPassword, $foundUser['password'])){
			return $foundUser['id'];
		}

		return 0;
	}













}
