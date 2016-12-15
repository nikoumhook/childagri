<?php
namespace Model;

use \W\Model\Model ;
use \W\Model\ConnectionModel;

class AlimentsModel extends Model
{

    // récupères les infos de la zone pedago en fonction d'un aliment ainsi que le nom de l'alimen et ces infos
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


    //  récupère les aliments en fonction du repas
    public function getAlimentForRepas(){
        if (isset($_POST['repas']) && !empty($_POST['repas'])) {

            if ($_POST['repas'] == 'repas1' || $_POST['repas'] == 'repas2' || $_POST['repas'] == 'repas3' || $_POST['repas'] == 'repas4') {
                $repas = $_POST['repas'];
            }else {
                return false;
            }

        }

        if (isset($repas)) {

            $app = getApp();
            $sql = 'SELECT * FROM aliments WHERE '.$repas.' = "oui"' ;
            $dbh = ConnectionModel::getDbh();
            $sth = $dbh->prepare($sql);
            if($sth->execute()){
                $foundPedago = $sth->fetchAll();
                if($foundPedago){
                    return $foundPedago;
                }
            }// fin if execute

        }// fin if isset $post
		return false;
    }

}
