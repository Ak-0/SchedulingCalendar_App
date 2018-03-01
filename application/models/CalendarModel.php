<?php
/**
 * Created by PhpStorm.
 * User: Ark
 * Date: 2018-02-25
 * Time: 12:53 AM
 */
class CalendarModel extends CI_Model {

    public function get_month($month,$year) {
        //YEAR -> EDIT THIS

        // MONTH BEING PASSED FROM CONTROLLER
        $month = date('m', strtotime($month));
        //MYSQL  QUERY THAT RETURNS THE DAYS FOR THE MONTH
        $result = $this->db->query("SELECT id, date FROM dates WHERE date LIKE '".$year."-".$month."%';");

        $days = $result->result_array();
        return $days;
    }





}