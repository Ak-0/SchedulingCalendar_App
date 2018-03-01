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

    public function get_disabled($timeid, $dateid){
        $disabled = $this->db->query("SELECT id_time FROM info WHERE id_time LIKE ".trim($timeid)." AND id_date LIKE ".trim($dateid));

        return $disabled->result();
    }



}