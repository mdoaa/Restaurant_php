<?php


class Role
{
    private $Roles_Name;
    private $Roles_Id;
    public function getRoles_Name(){
        return $this->Roles_Name;
    }
    public function getRoles_Id(){
        return $this->Roles_Id;
    }
    public function setRoles_Name($rolesname){
        $this->Roles_Name=$rolesname;
    }
    public function setRoles_Id($rolesid){
        $this->Roles_Id=$rolesid;
    }
}




?>