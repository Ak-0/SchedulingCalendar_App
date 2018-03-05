<?php
/**
 * Created by PhpStorm.
 * User: ak
 * Date: 3/1/18
 * Time: 8:14 AM
 */
class InfoModel extends CI_Model {


    public function __construct()
    {
    }


    public function makeRelation($date, $time, $info){
        $exists = $this->checkRelation($date,$time);

        if (!$exists){
            $this->db->query('INSERT INTO info (id_date, id_time, name, phone, notes, email, ip) VALUES ('.$date.', '.$time.',"'.$info['name'].'","'.$info['phone'].'","'.$info['notes'].'","'.$info['email'].'","'.$info['ip'].'")');
            return 'success';
        }
        else {return 'error';}
    }

    public function checkRelation($day, $time){
        $exists = '';
        $this->load->model('TimesModel');

        if($this->TimesModel->get_disabled($time,$day)) {
            $exists = true;
        }
        else{
            $exists = false;
        }

        return $exists;
    }

    public function checkIP(){

    }

}
