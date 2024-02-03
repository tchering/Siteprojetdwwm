<?php
class ClientManager extends Manager
{
    public function search($mot){
        return $this->searchTable('Clients',$mot);
      }
    
    public function supprimer($id){
        return $this->deleteId('Clients',$id);
    }
    //!this is function to actually modify client when form is submitted
    public function modifierClient($data){
      return $this->modifierDb('Clients',$data);
    }
    //!this is to insert new Client 
    public function insertClient($data)
    {
        // extract($data);
        return $this->insert('Clients',$data);
    }
    //! this is function when client modifiy then it shows form to modify.
    public function modifier($id)
    {
        $message = $this->showById('Clients', $id);
        return $message;
    }
    // function d'inscription
    public function register($data)
    {
        $message = $this->registerDb('Clients', $data);
        return $message;
    }
    public function showId($id, $type = 'object')
    {
        // function pour afficher seulement les clients
        $resultat = $this->showById('Clients', $id);
        if ($type) {
            $object = new Client($resultat);
            return $object;
        } else {
            return $resultat;
        }
    }

    public function showClient()
    {
        // function pour afficher la liste entiere des clients
        return $this->listTable('Clients');
    }
    public function login($data)
    {
        $message = $this->loginDb('Clients', $data);
        return $message;
    }
} 