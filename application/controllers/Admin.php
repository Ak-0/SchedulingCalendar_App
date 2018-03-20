<?php
/**
 * Created by PhpStorm.
 * User: ak
 * Date: 3/11/18
 * Time: 3:12 PM
 */

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //  $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('cookie');
    }



    public function index()
    {
        if ($this->session->username && $this->session->password ) {

        redirect('../Calendar/admin');
        }
        else{
        $this->load->view('AdminLogin');
        }

    }

    public function mark(){



    }

}