<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Migrate extends CI_Migration
{
    public function up()
    {
        $this->load->dbforge();

        $new_db = $this->dbforge->create_database('Gr_Calendar_db');
        if ($new_db){
            $this->db->query('use Gr_Calendar_db');

          // $this->dbforge = $this->load->dbforge($this->$new_db, TRUE);

               //define fields
               $dates_fields = array(
                   'date' => array(
                       'type' => 'date',
                       'unique' => TRUE
                   )
               );
               $info_fields = array(
                   'id_date' => array(
                       'type' => 'INT',
                       'constraint' => 5,
                       'null' => false
                   ),
                   'id_time' => array(
                       'type' => 'INT',
                       'constraint' => 5,
                       'null' => false
                   ),
                   'name' => array(
                       'type' => 'VARCHAR',
                       'constraint' => 50
                   ),
               );
               $times_fields = array(
                   'time' => array(
                       'type' => 'time',
                       'unique' => TRUE
                   )
               );
               $users_fields = array(
                   'username' => ['type' => 'varchar', 'constraint' => 50],
                   'passwd' => ['type' =>'varchar', 'constraint' => 50]
               );

               //create tables
               $this->dbforge->add_field('id');
               $this->dbforge->add_field($dates_fields);
               if($this->dbforge->create_table('dates', TRUE)){
                   $this->dbforge->add_field($info_fields);
                   if($this->dbforge->create_table('info', TRUE)){
                       $this->dbforge->add_field('id');
                       $this->dbforge->add_field($times_fields);
                       if($this->dbforge->create_table('times', TRUE)){
                           $this->dbforge->add_field('id');
                           $this->dbforge->add_field($users_fields);
                          if($this->dbforge->create_table('users', TRUE)){
                           $success = true;
                          }
                       }
                       else return false;

                   }

               }




           }




    if ($success){
            $this->Dates();
            $this->Times();
            $this->Users();

                        echo '<br>Created Tables Successfully<br>';


    }
    else return false;
        $this->load->database('default');
    }


public function Dates(){
    $Startdate = "2018-01-01";
    $EndDate = strtotime("+1 year", strtotime($Startdate));

//convert it to the right format to insert into database
    $start = date("Y-m-d", strtotime($Startdate));
    $end = date("Y-m-d", $EndDate);

    $newday = $start;


    while ($newday < $end){

        $insert = $this->db->query("INSERT INTO dates (date) VALUES ('$newday')");

        $newday = date("Y-m-d", strtotime("+1 day", strtotime($newday)));
    }

}


public function Times(){

    $date = new DateTime('2018-03-01 8:30:00');
    $count = 9 * 60 / 30;
    $arr = [];



    /** @var int $i */
    for($i=0; $i<$count; $i++) {

        $arr[$i] = $date->add(new DateInterval("P0Y0DT0H30M"))->format('H:i');
        $insert = $this->db->query("INSERT INTO times 
                                    (time) 
                                    VALUES ('$arr[$i]');
                                    ");

    }



    echo ('<br><br><hr><br>all times and dates "should be" inserted.');


}

public function Users(){
    $this->db->query('INSERT INTO users(username, passwd) VALUES ("admin", "toor")');
    $this->db->close();

}


    public function down(){
        if ($this->dbforge->drop_database('Gr_Calendar_db'))
        {
            echo 'Database deleted!';
        }
    }

}