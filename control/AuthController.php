<?php
require_once '../../models/user.php';
require_once '../../control/DBController.php';
class AuthController
{
    protected $db;
    public function login(User $user)
    {
        //1- open connect
        //2- run query
        //3- close connect
        $this->db=new DBController;
        if($this->db->openConnection())
        {   
            $password=$user->getUser_Password();
            $email=$user->getUser_Email();
            
            $query="select * from users where User_Email='$email' and User_Password='$password'";
            $result=$this->db->Execution($query);
            if($result===false)
            {
                echo " Error in Query ";
                return false;
            }
            else
            {
                if(count($result)==0)
                {
                    session_start();
                    $_SESSION["errMessage"]="You Have Entered Wrong Email or Password!";
                    $this->db->closeConnection();
                    return false;
                }
                else
                {
                    session_start();
                    $_SESSION["userId"]=$result[0]["User_Id"];
                    $_SESSION["userName"]=$result[0]["User_Name"];
                    if($result[0]["Role_Id"]==1)
                    {
                        $_SESSION["userRole"]="admin";
                    }
                    else
                    {
                        $_SESSION["userRole"]="user";
                    }
                    $this->db->closeConnection();
                    return true;
                }
            }

        }
        else
        {
            echo " Error in Connection ";
            return false;
        }




    }

    public function register(User $user)
    {
        //1- open connect
        //2- run query
        //3- close connect
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $name=$user->getUser_Name();
            $password=$user->getUser_Password();
            $email=$user->getUser_Email();
            $phone=$user->getUser_Phone();
            $query="insert into users values ('','$name', 2 ,'$password','$email','$phone')";
            $result = $this->db->insert($query);
            if($result != false)
            {
                session_start();
                $_SESSION["userId"]=$result;
                $_SESSION["userName"]=$name;
                $_SESSION["userRole"]="user";
                $this->db->closeConnection();
                return true;

            }
            else
            {
                $_SESSION["errMessage"]="Something Went Wrong... Try Again Later!";
                $this->db->closeConnection();
                return false;
            }
        }
        else
        {
            echo " Error in Connection ";
            return false;
        }

    }

}


?>