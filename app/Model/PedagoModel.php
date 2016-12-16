<?php
namespace Model;

use \W\Model\Model;
use \W\Model\ConnectionModel;

class PedagoModel extends Model
{

	public function getLands(){
		$app = getApp();
		$sql = 'SELECT * FROM lands';
		$dbh = ConnectionModel::getDbh();
		$sth = $dbh->prepare($sql);

			if($sth->execute()){
				$foundAllLand = $sth->fetchAll();
				if($foundAllLand){
					return $foundAllLand;
			}
		}
		return false;
	} //fermeture fonction getland


	public function getAliments(){
		$app = getApp();
		$sql = 'SELECT aliments.*, lands.name AS region FROM aliments LEFT JOIN lands ON aliments.id_land = lands.id ORDER BY aliments.name';
		$dbh = ConnectionModel::getDbh();
		$sth = $dbh->prepare($sql);

			if($sth->execute()){
				$foundAllAliment = $sth->fetchAll();
				if($foundAllAliment){
					return $foundAllAliment;
			}
		}
		return false;
	} //fermeture fonction getland


	public function getOneAliment($id){
		$app = getApp();
		$sql = 'SELECT aliments.*, lands.name AS region FROM aliments LEFT JOIN lands ON aliments.id_land = lands.id WHERE aliments.id = :id';
		$dbh = ConnectionModel::getDbh();
		$sth = $dbh->prepare($sql);
        $sth->bindValue(':id', $id);

			if($sth->execute()){
				$foundAliment = $sth->fetch();
				if($foundAliment){
					return $foundAliment;
			}
		}
		return false;
	} //fermeture fonction getland



	public function getQuizzAliment($id){
		$app = getApp();
		$sql = 'SELECT quizz.*,  aliments.name AS ingredient, lands.name AS region FROM quizz JOIN aliments ON quizz.id_aliment = aliments.id RIGHT JOIN lands ON aliments.id_land = lands.id WHERE quizz.id_aliment = :id';

		$dbh = ConnectionModel::getDbh();
		$sth = $dbh->prepare($sql);
			$sth->bindValue(':id', $id);
			if($sth->execute()){
				$foundAliment = $sth->fetchall();
				if($foundAliment){
					return $foundAliment;
			}
		}
		return false;
	} //fermeture fonction getland


	public function getPedago(){
		$app = getApp();
		$sql = 'SELECT pedago.* , lands.name AS region, aliments.name AS ingredient FROM pedago JOIN lands ON pedago.id_land = lands.id JOIN aliments ON pedago.id_land = aliments.id_land';
		$dbh = ConnectionModel::getDbh();
		$sth = $dbh->prepare($sql);

			if($sth->execute()){
				$foundAllPedago = $sth->fetchAll();
				if($foundAllPedago){
					return $foundAllPedago;
			}
		}
		return false;
	} //fermeture fonction getPedago



	public function getOnePedagoByIdAliment($id){
		$app = getApp();
		$sql = 'SELECT pedago.* , lands.name AS region, aliments.name AS ingredient FROM pedago JOIN lands ON pedago.id_land = lands.id JOIN aliments ON pedago.id_land = aliments.id_land WHERE pedago.id = :id' ;
		$dbh = ConnectionModel::getDbh();
		$sth = $dbh->prepare($sql);
		$sth->bindValue(':id', $id);
			if($sth->execute()){
				$foundPedago = $sth->fetch();
				if($foundPedago){
					return $foundPedago;
			}
		}
		return false;
	} //fermeture fonction getPedag





}
