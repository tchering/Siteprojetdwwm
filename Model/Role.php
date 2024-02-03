<?php

class Role
{
    private $id_role;
    private $nom_role;
    public function __construct($data = [])
    {
        if ($data) {
            foreach ($data as $key => $value) {
                $set = "set" . ucfirst($key);
                if (method_exists($this, $set)) {
                    $this->$set($value);
                }
            }
        }
    }

    public function getId_role()
    {
        return $this->id_role;
    }

    public function setId_role($id_role)
    {
        $this->id_role = $id_role;

        return $this;
    }

    public function getNom_role()
    {
        return $this->nom_role;
    }

    public function setNom_role($nom_role)
    {
        $this->nom_role = $nom_role;

        return $this;
    }
} 