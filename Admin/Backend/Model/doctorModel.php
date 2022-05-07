
<?php
require_once PROJECT_ROOT_PATH . "/Model/database.php";
 
class UserModel extends Database
{
    public function getDoctors($limit)
    {
        return $this->select("SELECT * FROM personalinfo");
    }

    public function createDocotors($name,$image,$Type)
    {
       return $this->insert("INSERT INTO personalinfo(Type,Name,Image)VALUES('$Type','$name','$image')");
    }
    public function deleteDoctor($id)
    {
       return $this->delete("DELETE from personalinfo WHERE id=$id");
    }

    public function updateDoctor($id,$name,$image,$type)
    {
       return $this->delete("UPDATE  personalinfo set name ='$name',Type='$type',image = '$image' WHERE id=$id");
    }
}   