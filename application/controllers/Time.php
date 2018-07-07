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

    public  function index($dateid = null, $mark= ''){
        $times = $this->TimesModel->get_times();
        if($this->input->post('dateid')) {
            $data['date_id'] = $this->input->post('dateid');
            $data['admin']= $this->input->post('admin');

        }
        elseif ($mark === 'true'){
            $data['date_id'] = $dateid;
            $data['admin'] = true;
        }
        elseif($this->input->post('admin')){
            $data['date_id'] = $this->getToday();
            $data['admin'] = true;

        }

        if($data['admin'] == true){
            $taken_times = $this->list_taken_times($times, $data['date_id']);
            if(!empty($taken_times)){
                $data['times'] = $taken_times;
            }

        }
        else{
            $data['times'] = $this->mark_disabled_times($times, $data['date_id']);
        }
        $this->load->view('Times',$data);
    }

    public function getToday(){
        $today1 = new DateTime('now',new DateTimeZone('America/New_York'));
        $today = date('Y-m-d', $today1->getTimestamp());
        $currentday = $this->TimesModel->getToday($today);
        return $currentday;
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
    public function getTimes()
    {
        $ids = [];
        $times = [];
        foreach ($this->TimesModel->get_times() as $time){
            array_push($ids,$time->id);
            array_push($times, date('g:i A',strtotime($time->time)));
        }
        $result = array_combine($ids,$times);
        echo json_encode($result);
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
                $mark = $this->input->post('mark');
                $dateid = $this->uri->segment('3');
                $timeid = $this->uri->segment('4');
                if($this->TimesModel->markDone($dateid,$timeid)) {
                    $this->index($dateid, $mark);
                }
                else echo 'error';
        }

        public function delApptmt($timeid, $dateid)
        {
            if (!empty($timeid) && !empty($dateid)){
               $dateid = $this->TimesModel->delApptmt($timeid,$dateid);
               return $dateid?true:false;
            }
        }

    public function editInfo()
    {
        $dateid = $this->input->post('dateid');
        $timeid = $this->input->post('timeid');
        $fields = $this->input->post('fields');
        if (!empty($timeid) && !empty($dateid) && is_numeric($timeid) && is_numeric($dateid)){
            $result = $this->TimesModel->editApptmt($timeid,$dateid,$fields);
        }
        echo $result?'<div class="btn-success">Successfully Edited Appointment.</div>':'<div class="btn-warning warning">Could Not Successfully Edit Appointment.</div>';

    }

}