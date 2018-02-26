<?php
/**
 * Created by PhpStorm.
 * User: ak
 * Date: 2/25/18
 * Time: 11:23 PM
 */

class TimesModel extends CI_Model
    {
    public function get_times(){

        return $this->hoursRange();

    }

    function hoursRange( $lower = 0, $upper = 86400, $step = 3600, $format = '' ) {
        $times = array();

        if ( empty( $format ) ) {
            $format = 'g:i a';
        }

        foreach ( range( $lower, $upper, $step ) as $increment ) {
            $increment = gmdate( 'H:i', $increment );

            list( $hour, $minutes ) = explode( ':', $increment );

            $date = new DateTime( $hour . ':' . $minutes );

            $times[(string) $increment] = $date->format( $format );
        }

        return $times;
    }

}