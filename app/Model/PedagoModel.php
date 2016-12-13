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
		$sql = 'SELECT * FROM aliments';
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






}
