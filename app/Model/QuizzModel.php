<?php
namespace Model;

use \W\Model\Model ;
use \W\Model\ConnectionModel;


class QuizzModel extends Model
{
	//Récupère les commentaires associés à un article
    /**
	 * Récupère les quizz associé aux aliments selectionné
	 * @param string $usernameOrEmail Le pseudo ou l'email d'un utilisateur
	 * @return mixed L'utilisateur, ou false si non trouvé
	 */
	public function getQuizzByIdAliment($id,$select = '*'){

		$app = getApp();
		$sql = 'SELECT '.$select.' FROM ' . $this->table .
			   ' WHERE id_aliment = :id';
		$dbh = ConnectionModel::getDbh();
		$sth = $dbh->prepare($sql);
		$sth->bindValue(':id', $id);

		if($sth->execute()){
			$foundQuizz = $sth->fetchAll();
			if($foundQuizz){
				return $foundQuizz;
			}
		}

		return (false);
	}

}
