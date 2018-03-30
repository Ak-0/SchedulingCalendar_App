<?php

class Migrate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
        $this->load->database('default');
    }

    public function index()
    {
        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
        else {
            echo '<br>Change default DB To Gr_Calendar_db and delete the migration table/controller!';
        }
    }

}