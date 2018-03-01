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

    public  function index(){
            $day = $this->input->post('day');
            $time = $this->input->post('time');
            echo $this->InfoModel->makeRelation($day, $time);

    }
}