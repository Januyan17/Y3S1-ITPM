<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
 
class UserModel extends Database
{
    public function getDoctors($limit)
    {
        return $this->select("SELECT personalinfo.id ,personalinfo.name,personalinfo.image,doctortype.Type FROM personalinfo INNER JOIN doctortype ON doctortype.id = personalinfo.Type ORDER BY id ");
    }

    public function createDocotors($name,$image,$Type)
    {
       return $this->insert("INSERT INTO personalinfo(Type,Name,Image)VALUES($Type,'$name','$image')");
    }
}   