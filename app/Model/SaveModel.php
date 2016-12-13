<?php
namespace Model;

use \W\Model\Model ;

class SaveModel extends Model
{

    /**
	 * créé un sauvegarde sauvegarde
	 * @param array $repas Un tableau associatif avec 'id repas(ex:1)' => 'id des ingredients choisis (ex : 1,2,3)'
	 * @return mixed false si erreur, les données insérées mise à jour sinon
	 */
     public function createSav($repas = []){

        $save = $this->insert([
            'repas' => '',
         ]);

         if ($save) {

             return $this->getSav($save['id']);

         }else {

             return false;

         }

        //  if (empty($repas)) {
        //      $this->insert([
        //          'repas' => serialize($repas),
        //      ]);
        //  }else {
        //      $this->insert();
        //  }

     }

    /**
     * permet de récupérer un sauvegarde
     * @param  string $id l'id de la sauvegarde
     * @return les données de la sauvegarde si elle existe ou un false si elle n'existe pas
     */
    public function getSav($id){

        if ($this->find($id)) {
            return $this->find($id);
        }

        return false;
    }

    /**
	 * Efface une sauvegarde en fonction de son id
	 * @param mixed $id La sauvegarde à effacer
	 * @return mixed La valeur de retour de la méthode execute()
	 */
    public function deleteSav($id){

        if (isset($id) && is_numeric($id)) {
            $this->delete($id);
        }

    }

}
