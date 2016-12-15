<?php
namespace Model;

use \W\Model\Model ;
use \W\Model\ConnectionModel;

class AlimentsModel extends Model
{

    public function getAlimentsAndPedago($id){
		$app = getApp();
		$sql = 'SELECT aliments.*, pedago.content, pedago.urlImg AS illus, pedago.urlSound FROM pedago RIGHT JOIN aliments ON pedago.id_Aliment = aliments.id WHERE aliments.id = :id' ;
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
