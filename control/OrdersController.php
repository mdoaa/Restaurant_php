<?php

require_once '../../models/order.php';
require_once '../../control/DBController.php';
class OrdersController
{
    protected $db;

    public function addOrder(Order $order)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $userid=$order->getUser_Id();
            $mealid=$order->getMeal_Id();
            $query = "insert into orders  values ('','$userid','$mealid',CURRENT_TIMESTAMP)";
            return $this->db->insert($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }



    }
    public function getAllOrders()
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "select orders.Order_Id,User_Id,Meal_Id,Order_Date from orders";
            return $this->db->Execution($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function getspecificOrder($id)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "select orders.User_Id,Meal_Id,Order_Date from orders where Order_Id='$id'";
            return $this->db->Execution($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function getspecificOrderforUser($id)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "select orders.User_Id,Meal_Id,Order_Date,Order_Id from orders where User_Id='$id'";
            return $this->db->Execution($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    
    public function deleteOrder($Id)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query = "delete from orders  where Order_Id=$Id";
            return $this->db->delete($query);
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function updateOrder(Order $order)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $userid=$order->getUser_Id();
            $mealid=$order->getMeal_Id();
            $orderid=$order->getOrder_Id();
            $query="update orders set User_Id='$userid', Meal_Id='$mealid' where Order_Id='$orderid'";
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