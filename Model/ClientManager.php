<?php
class ClientManager extends Manager
{
    public function forgotPassword($email,$token){
        $message = $this->forgotPasswordDb('Client',$email,$token);
        return $message;
    }
    public function search($mot){
        return $this->searchTable('Client',$mot);
      }
    
    public function supprimer($id){
        return $this->deleteId('Client',$id);
    }
    //!this is function to actually modify client when form is submitted
    public function modifierClient($data){
      return $this->modifierDb('Client',$data);
    }
    //!this is to insert new Client 
    public function insertClient($data)
    {
        // extract($data);
        return $this->insert('Client',$data);
    }
    //! this is function when client modifiy then it shows form to modify.
    public function modifier($id)
    {
        $message = $this->showById('Client', $id);
        return $message;
    }
    // function d'inscription
    public function register($data)
    {
        $message = $this->registerDb('Client', $data);
        return $message;
    }
    public function showId($id, $type = 'object')
    {
        // function pour afficher seulement les client
        $resultat = $this->showById('Client', $id);
        if ($type) {
            $object = new Client($resultat);
            return $object;
        } else {
            return $resultat;
        }
    }

    public function showClient()
    {
        // function pour afficher la liste entiere des client
        return $this->listTable('Client');
    }
    public function login($data)
    {
        $message = $this->loginDb('Client', $data);
        return $message;
    }
} 