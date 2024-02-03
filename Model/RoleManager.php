<?php

class RoleManager extends Manager
{
    public function findRoles()
    {
        return $this->listTable('Roles');
    }
} 
