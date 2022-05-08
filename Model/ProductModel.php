
<?php
require_once PROJECT_ROOT_PATH . "/Model/database.php";
 
class ProductModel extends Database
{
    public function getProducts($limit)
    {
        return $this->select("SELECT * FROM product");
    }

    public function createProduct($name,$image,$price)
    {
       return $this->insert("INSERT INTO product(name,price,image)VALUES('$name',$price,'$image')");
    }
    public function deleteProduct($id)
    {
       return $this->delete("DELETE from product WHERE id=$id");
    }

    public function updateProduct($id,$name,$image,$price)
    {
       return $this->delete("UPDATE  product set name ='$name',price=$price,image = '$image' WHERE id=$id");
    }
}   