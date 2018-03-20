<?php
/**
 * Created by PhpStorm.
 * User: ak
 * Date: 3/1/18
 * Time: 8:20 AM
 */
class Info extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('InfoModel');

    }

    public  function index($status = ''){
            $day = $this->input->post('day');
            $info['name'] = $this->input->post('name');
            $info['phone'] = $this->input->post('phone');
            $info['notes'] = $this->input->post('notes');
            $info['email'] = $this->input->post('email');
            $info['ip'] = $this->input->ip_address();
            $event_date = $this->input->post('event_date');
           if ( !empty($event_date)) {
               if (!$event_date = date("jS F, Y", strtotime($event_date))) {
                   $status = 'error';
               }
           }

            $time = $this->input->post('time');

            foreach ($info as $item){
                if(empty($item)){
                    $status = 'error';
                }
            }

            if($status === 'error' || !is_numeric($time) || !is_numeric($day)){
                $status = 'error';
            }
            else {
                $status = $this->InfoModel->makeRelation($day, $time, $info, $event_date);
            }


            if($status === 'error'){$this->load->view($status);}
            else{
                $data['day'] = $this->InfoModel->formatOfTimes($day,$time)['date'];
                $data['time'] = $this->InfoModel->formatOfTimes($day,$time)['time'];
                $data['event_date'] = $event_date?$event_date:'N/A';
                $this->load->view($status, $data);
            }
    }


}