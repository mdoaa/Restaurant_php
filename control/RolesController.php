<?php

require_once '../../models/role.php';
require_once '../../control/DBController.php';
class RolesController
{
    protected $db;
    public function getAllRoleId()
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "select roles.Roles_Id from roles";
            return $this->db->Execution($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }

    }

}




?>