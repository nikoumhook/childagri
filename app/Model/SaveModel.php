<?php
namespace Model;

use \W\Model\Model ;

class SaveModel extends Model
{
    /**
     * permet de récupérer un sauvegarde
     * @param  string $id l'id de la sauvegarde
     * @return les données de la sauvegarde si elle existe ou un false si elle n'existe pas
     */
    public function getSav($id)
    {
        if ($this->find($id)) {
            return $this->find($id);
        }

        return false;
    }
}
