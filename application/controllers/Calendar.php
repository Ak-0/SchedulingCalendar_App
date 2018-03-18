<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
      //  $this->load->helper('url');
        $this->load->model('CalendarModel');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('cookie');


    }
    protected $year= '2018';

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index($admin = null)
    {
        $month = date('Y-m-d');
        $days = $this->CalendarModel->get_month($month,$this->year);
        $data['weeks'] = $this->get_weeks($days);
        $data['month'] = $month;
        $data['admin'] = $admin ;
        $data['controller']=$this;
        $data['admin'] = $admin;
        $this->load->view('Calendar', $data);

    }

    public function get_weeks($days)
    {

        $weeks = [];
        $i=0;
        $week = [];
                //get the day in value of number position of the week
                //if it is on a monday
               //store the days of the week in an array
        foreach ($days as $k=>$d) {
                if ($i < 7){
                    $week[$i] = $d;
                    $i++;
                }
                else{
                    $week[$i] = $d;
                    $i = 0;
                    array_push($weeks, $week);
                    $week = [];
                }
        }
        array_push($weeks, $week);
        return $weeks;
    }


    public function month($month){

        if($month = $this->uri->segment('2')){

            $month = new DateTime('2018-'.$month.'-01');
            $month = $month->format('Y-m-d');
        }

        $days = $this->CalendarModel->get_month($month,$this->year);
        $data['weeks'] = $this->get_weeks($days);
        $data['month'] = $month;
        $data['admin'] = $this->verify_login();
        $data['controller']=$this;
        $this->load->view('Calendar', $data);


    }

    public function admin(){

        if($admin = $this->verify_login()) {
           $this->index( $admin );
       }
       else echo 'error';

    }


    public function verify_login($user = null, $pass = null){

        if(  ($user =  $this->session->username) && ($pass = $this->session->userdata('password')) ){
            $admin = $this->CalendarModel->admin($user, $pass);
            return($admin);
        }
    else return 0;


    }


}

