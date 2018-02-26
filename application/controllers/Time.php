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
        $data['times'] = $this->TimesModel->get_times();
       $this->load->view('Times',$data);
    }
}