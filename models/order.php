<?php

class Order
{
    private $Order_Id;
    private $User_Id;
    private $Meal_Id;
    public function getOrder_Id(){
        return $this->Order_Id;
    }
    public function getMeal_Id(){
        return $this->Meal_Id;
    }
    public function getUser_Id(){
        return $this->User_Id;
    }
    public function setMeal_Id($mealid){
        $this->Meal_Id=$mealid;
    }
    public function setOrder_Id($orderid){
        $this->Order_Id=$orderid;
    }
    public function setUser_Id($userid){
        $this->User_Id=$userid;
    }
}


?>