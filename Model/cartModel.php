<?php
require_once PROJECT_ROOT_PATH . "/Model/database.php";
 
class CartModel extends Database
{
    public function getCarts($limit)
    {
        return $this->select("SELECT product.name,product.image,product.price,product.id as productId,cart.quantity,cart.totalPrice,cart.id FROM cart INNER JOIN product ON product.id = cart.productId");
    }

    public function createCart($quantity,$id,$totalPrice)
    {
       return $this->insert("INSERT INTO cart(quantity,productId,totalPrice)VALUES($quantity,$id,$totalPrice)");
    }
    public function deleteCart($id)
    {
       return $this->delete("DELETE from cart WHERE id=$id");
    }

    public function updateCart($id,$qantity,$totalPrice)
    {
       return $this->update("UPDATE  cart set quantity =$qantity,totalPrice =$totalPrice WHERE id=$id");
    }
}   