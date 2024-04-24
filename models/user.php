<?php

class User
{
    private $User_Id;
    private $User_Name;
    private $Role_Id;
    private $User_Password;
    private $User_Email;
    private $User_Phone;

    public function getUser_Id(){
        return $this->User_Id;
    }
    public function getUser_Name(){
        return $this->User_Name;
    }
    public function getRole_Id(){
        return $this->Role_Id;
    }
    public function getUser_Password(){
        return $this->User_Password;
    }
    public function getUser_Email(){
        return $this->User_Email;
    }
    public function getUser_Phone(){
        return $this->User_Phone;
    }

    public function setUser_Id($userid){
        $this->User_Id=$userid;
    }
    public function setUser_Name($username){
        $this->User_Name=$username;
    }
    public function setRole_Id($roleid){
        $this->Role_Id=$roleid;
    }
    public function setUser_Password($userpassword){
        $this->User_Password=$userpassword;
    }
    public function setUser_Email($useremail){
        $this->User_Email=$useremail;
    }
    public function setUser_Phone($userphone){
        $this->User_Phone=$userphone;
    }

}


?>