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
            $query = $this->db->query("SELECT * FROM users WHERE username = '" . $user . "' AND passwd = '" . $pass . "'");
            $row = $query->result_array();
            var_dump($row);
        //cmpare  to post the db user and pass
            if ($row[0]['username'] == $user && $row[0]['passwd'] == $pass) {
                echo "LOG IN SUCCEEDED<br>";
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;
                //set cookie info if correct user and pass
                setcookie("globalrose_schedule_calendar", $user, time() + 3600, '/');
                echo "Logged in as " . $user;
            }
        }
        //redirect to correct controller/view if logged in
        if (!empty($_SESSION['user']) && $_SESSION['user'] == "user") {
            $data['admin']='true';
            $this->Calendar('admin',$data);
        }
        //or if not logged in print message
        else {
            print "not logged in";
        }
    }

    //logout method
    public function logout(){
        //DESTROY COOKIES AND SESSION
            if (isset($_SESSION['user']) && $_SESSION['user'] == 'user') {
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