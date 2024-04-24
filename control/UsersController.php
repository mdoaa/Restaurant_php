<?php

require_once '../../models/user.php';
require_once '../../control/DBController.php';
class UsersController
{
    protected $db;

    public function addUser(User $user)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $name=$user->getUser_Name();
            $roleid=$user->getRole_Id();
            $password=$user->getUser_Password();
            $email=$user->getUser_Email();
            $phone=$user->getUser_Phone();

            $query = "insert into users  values ('','$name','$roleid','$password','$email','$phone')";
            return $this->db->insert($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }



    }
    public function getAllUsers()
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "select users.User_Id,Role_Id,User_Name,User_Email,User_Password,User_Phone from users";
            return $this->db->Execution($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function getAllUsersid()
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "select users.User_Id from users";
            return $this->db->Execution($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    
    public function getspecificUser($id)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "select users.Role_Id,User_Name,User_Email,User_Password,User_Phone from users where User_Id='$id'";
            return $this->db->Execution($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function deleteUser($Id)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "delete from users  where User_Id=$Id";
            return $this->db->delete($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function updateUser(User $user)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $id=$user->getUser_Id();
            $name=$user->getUser_Name();
            $roleid=$user->getRole_Id();
            $password=$user->getUser_Password();
            $email=$user->getUser_Email();
            $phone=$user->getUser_Phone();
            $query="update users set User_Name='$name', Role_Id='$roleid', User_Email='$email',User_Password='$password',User_Phone='$phone' where User_Id='$id'";
            return $this->db->update($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }



}




?>