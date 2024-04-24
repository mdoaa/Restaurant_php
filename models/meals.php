<?php

class Meals
{
    private $Meal_Id;
    private $Meal_Name;
    private $Meal_Price;
    private $Meal_Restaurant;
    private $Meal_Image;
    
    public function getMeal_Id(){
        return $this->Meal_Id;
    }
    public function getMeal_Name(){
        return $this->Meal_Name;
    }
    public function getMeal_Price(){
        return $this->Meal_Price;
    }
    public function getMeal_Restaurant(){
        return $this->Meal_Restaurant;
    }
    public function getMeal_Image(){
        return $this->Meal_Image;
    }

    public function setMeal_Id($mealid){
        $this->Meal_Id=$mealid;
    }
    public function setMeal_Name($mealname){
        $this->Meal_Name=$mealname;
    }
    public function setMeal_Price($mealprice){
        $this->Meal_Price=$mealprice;
    }
    public function setMeal_Restaurant($mealrestaurant){
        $this->Meal_Restaurant=$mealrestaurant;
    }
    public function setMeal_Image($mealimage){
        $this->Meal_Image=$mealimage;
    }
   


}


?>