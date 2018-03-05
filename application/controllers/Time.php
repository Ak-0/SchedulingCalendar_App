<?php
/**
 * Created by PhpStorm.
 * User: ak
 * Date: 2/25/18
 * Time: 11:21 PM
 */

class Time extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('TimesModel');

    }

    public  function index(){
        $times = $this->TimesModel->get_times();
        $data['date_id'] = $this->input->post('dateid');
        $data['times'] = $this->mark_disabled_times($times, $data['date_id']);
        $this->load->view('Times',$data);
    }

    public function mark_disabled_times($times, $date_id){
        foreach ($times as $t=>$time){
            $array[$t]['time'] =  date('h:i A',strtotime( $time->time) ) ;
            $array[$t]['disabled'] = $this->TimesModel->get_disabled($time->id, $date_id)?1:0;
        }
       return  $array;


    }
}