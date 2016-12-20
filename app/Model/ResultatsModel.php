<?php
namespace Model;

use \W\Model\Model ;
use \W\Model\ConnectionModel;

class ResultatsModel extends Model
{
	//Récupère les commentaires associés à un article
    public function getresultats($id){
        $app = getApp();
        $sql = 'SELECT * FROM resultats WHERE id_player = :id ORDER BY datetime';
        $dbh = ConnectionModel::getDbh();
        $sth = $dbh->prepare($sql);
        $sth->bindValue(':id', $id);

            if($sth->execute()){
                $foundAliment = $sth->fetchAll();
                if($foundAliment){
                    return $foundAliment;
            }
        }
        return false;
    } //fermeture fonction getland
}
