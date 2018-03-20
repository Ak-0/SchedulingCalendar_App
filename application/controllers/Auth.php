<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //  $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('cookie');
    }

    public function index()
    {
        //get post of the login form
        if ($this->input->post('user') && $this->input->post('pass')) {
            $user = $this->input->post('user');
            $pass = $this->input->post('pass');

        //query db for login info
           if( $query = $this->db->query("SELECT * FROM users WHERE username = '" . $user . "' AND passwd = '" . $pass . "'")->result()) {
                $row = $query[0];
        //cmpare  to post the db user and pass
            if ($user === $row->username  && $pass  === $row->passwd) {
                echo "LOG IN SUCCEEDED<br>";

                $newdata = array(
                    'username'  => $user,
                    'password'  => $pass,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($newdata);

                //set cookie info if correct user and pass
                setcookie("globalrose_schedule_calendar", $user, time() + 3600, '/');
                echo "Logged in as " . $user;
                redirect('/Calendar/admin');            }

            else {
                print"IN CORRECT LOGIN DATA";
            }
           }
           else {
               print "not logged in";
           }
        }
        //redirect to correct controller/view if logged in

        //or if not logged in print message

    }





    //logout method
    public function logout(){
        //DESTROY COOKIES AND SESSION
            if ($this->session->username && $this->session->password ) {
                session_destroy();
                if (isset($_SERVER['HTTP_COOKIE'])) {
                    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
                    foreach($cookies as $cookie) {
                        $parts = explode('=', $cookie);
                        $name = trim($parts[0]);
                        setcookie($name, '', time()-1000);
                        setcookie($name, '', time()-1000, '/');
                    }
                }
            }
            echo'Logging You out';
            redirect('../');
    }
}