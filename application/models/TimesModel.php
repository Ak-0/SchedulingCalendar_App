<?php
/**
 * Created by PhpStorm.
 * User: ak
 * Date: 2/25/18
 * Time: 11:23 PM
 */

class TimesModel extends CI_Model
    {
    public function get_times(){
        $times = $this->db->query("SELECT id, time FROM times ");
        $result = $times->result();
        return $result;
    }
    public function getToday($date)
    {
        $times = $this->db->query("SELECT id FROM dates WHERE date = '".trim($date)."'");
        $result = $times->result();
        $today = $result[0]->id;
        return $today;
    }

    public function get_disabled($timeid, $dateid){
        $disabled = $this->db->query("SELECT id_time FROM info WHERE id_time LIKE ".trim($timeid)." AND id_date LIKE ".trim($dateid));
        return $disabled->result();
    }

    public function getAdminTimes($timeid, $dateid){
        $adminTimes= $this->db->query("SELECT * FROM info WHERE id_time LIKE ".trim($timeid)." AND id_date LIKE ".trim($dateid));
        return $adminTimes->result();
    }
    /*The get_Date method should return the current time if the selected date is today's date.
        this is used by the Time controller to mark past times as disabled.
    */
    public function get_Date($dateid){
        $today1 = new DateTime('now',new DateTimeZone('America/New_York'));
        $today = date('Y-m-d', $today1->getTimestamp());
        $result = $this->db->query("SELECT * FROM dates WHERE id = ".$dateid." AND date = '".$today."'");
        if($result->result()){
            return $today1->getTimestamp();
        }
        else{
            return 0;
        }
    }

    public  function markDone($dateid, $timeid){

        if($this->db->simple_query("UPDATE info SET done = 1 WHERE id_date =".trim($dateid)." AND id_time =".trim($timeid))){
            return true;
        }
        else{ return false;}

    }


}