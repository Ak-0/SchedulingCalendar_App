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

    public  function index($dateid = null){
        $times = $this->TimesModel->get_times();
        if($dateid === null) {
            $data['date_id'] = $this->input->post('dateid');
        }
        else{$data['date_id'] = $dateid;}
        $data['admin']= 0;
        if($this->input->post('admin') == 'true'){
            $data['admin'] = true;
            if(!empty($this->list_taken_times($times, $data['date_id']))){
                $data['times'] = $this->list_taken_times($times, $data['date_id']);
            }

        }
        else{
            $data['times'] = $this->mark_disabled_times($times, $data['date_id']);
        }
        $this->load->view('Times',$data);
    }



    /* The mark_disabled_times function will return a 'one' for true that the time is disabled. To the view.
        It currently checks if the day selected is the present date, if it is, it disables all
        past times. It also disbles times that have been already alloted and submitted.
    */
    public function mark_disabled_times($times, $date_id){

        $current_time = $this->TimesModel->get_Date($date_id);


        foreach ($times as $t => $time) {
                $array[$t]['time'] = date('h:i A', strtotime($time->time));
                $array[$t]['disabled'] = $this->TimesModel->get_disabled($time->id, $date_id) ? 1 : 0;

                if($current_time){
                    if (strtotime($time->time.' America/New_York') < $current_time){
                        $array[$t]['disabled'] = 1 ;
                    }
                }

            }

       return  $array;
    }

    public function list_taken_times($times, $date_id){
        $i=0;
        foreach ($times as $t => $time) {
                if($this->TimesModel->getAdminTimes($time->id, $date_id)) {
                    $time_taken[$i] = $this->TimesModel->getAdminTimes($time->id, $date_id);
                    $time_taken[$i]['time'] =  date('h:i A', strtotime($time->time));

                    //$array[$t]['name'] = $time_taken[$i]->name;
                    //$array[$t]['phone'] = $time_taken[$i]->phone;
                    //$array[$t]['notes'] = $time_taken[$i]->notes;
                    //$array[$t]['email'] = $time_taken[$i]->email;

                    $i++;
                }

               // if(!empty($time_taken)){var_dump($time_taken);};

        }//var_dump($array);
       if (!empty($time_taken)){ return $time_taken;}

        }

        public function admin_mark_done(){
                $dateid = $this->uri->segment('3');
                $timeid = $this->uri->segment('4');
                if($this->TimesModel->markDone($dateid,$timeid)) {
                    $this->index($dateid);
                }
                else echo 'error';
        }

    }