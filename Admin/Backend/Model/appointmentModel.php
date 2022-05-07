<?php
require_once PROJECT_ROOT_PATH . "/Model/database.php";
 
class AppointmentModel extends Database
{
    public function getAppointments($limit)
    {
        return $this->select("SELECT appointments.id,appointments.address,appointments.name,appointments.date,appointments.time,appointments.problem,appointments.mobile,personalinfo.name as doctorName FROM appointments INNER JOIN personalinfo ON appointments.doctorId= personalinfo.id");
    }

    public function createAppointment($name,$time,$mobile,$problem,$address,$date,$doctorId)
    {
       return $this->insert("INSERT INTO appointments(name,time,mobile,problem,address,date,doctorId)VALUES('$name','$time','$mobile','$problem','$address','$date',$doctorId)");
    }
    public function deleteAppointment($id)
    {
       return $this->delete("DELETE from appointments WHERE id=$id");
    }

    public function updateAppointment($name,$time,$mobile,$problem,$address,$date,$id)
    {
       return $this->update("UPDATE  appointments set name ='$name',time='$time',mobile = '$mobile',problem='$problem',address='$address',date='$date' WHERE id=$id");
    }
}   