<?php

require_once '../../models/meals.php';
require_once '../../control/DBController.php';
class MealsController
{
    protected $db;

    public function addMeal(Meals $meal)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $name=$meal->getMeal_Name();
            $price=$meal->getMeal_Price();
            $restaurant=$meal->getMeal_Restaurant();
            $image=$meal->getMeal_Image();
            $query = "insert into melas  values ('','$name','$price','$restaurant','$image')";
            return $this->db->insert($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }



    }
    public function getAllMeals()
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "select melas.Meal_Id,Meal_Name,Meal_Price,Meal_Restaurant,Meal_Image from melas";
            return $this->db->Execution($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function getAllMealsid()
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "select melas.Meal_Id from melas";
            return $this->db->Execution($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function getspecificMeal($id)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "select melas.Meal_Name,Meal_Price,Meal_Restaurant,Meal_Image from melas where Meal_Id='$id'";
            return $this->db->Execution($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    
    public function deleteMeal($Id)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "delete from melas  where Meal_Id=$Id";
            return $this->db->delete($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function updateMeal(Meals $meal)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $id=$meal->getMeal_Id();
            $name=$meal->getMeal_Name();
            $price=$meal->getMeal_Price();
            $restaurant=$meal->getMeal_Restaurant();
            $image=$meal->getMeal_Image();
            $query="update melas set Meal_Name='$name', Meal_Price='$price', Meal_Restaurant='$restaurant',Meal_Image='$image' where Meal_Id='$id'";
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