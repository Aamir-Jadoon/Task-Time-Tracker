<?php
/**
 * Created by PhpStorm.
 * User: Aamir Khan
 * Date: 10/30/2019
 * Time: 12:07 AM
 */

include_once 'timezone.php';

/**
 * @param $iconType, a string containing icon TYPE
 * @return string, containing the fontawesome icon
*/
function icon($iconType){
    if($iconType == 'fa-stop'){
        $icon = '<i class="fas '.$iconType.' pause "></i>';
    }
    else if($iconType == 'fa-trash'){
        $icon = '<i class="fas '.$iconType.' delete "></i>';
    }
    else if($iconType == 'fa-clock'){
        $icon = '<i class="fas '.$iconType.' clock"></i>';
    }
    else if ($iconType == 'fa-redo'){
        $icon = '<i class="fas '.$iconType.' redo"></i>';
    }
    return $icon;
}

/**
 * @param $date, UNIX Timestamp or time()
 * @return date, return date with Nov 1 2019 10:10 PM format
*/
function formated_date($date){
    return date('M j Y g:i A', $date);
    # M - three letter month representation
    # j - Day of the month without leading zero
    # Y - A full numeric representation of a year e.g 2002
    # g - 12 hour format of an hour without leading zero
    # i - Minutes with leading zero
    # A - Uppercase Ante meridiem and Post meridiem AM or PM
}

/**
 * @param $seconds, an integer containing number of seconds
 * @return string, a formatted string containing hours and minutes.
*/
function formated_time($seconds){

    $hour = floor(($seconds/60)/60);
    $minute = round(($seconds/60) - ($hour * 60));

    return $hour. ' h : '.$minute.' m';
}

/**
 * @param $data, an arrays containing previous and newly created data
 * @return null
 */
function save($data){
    $json = json_encode($data);
    $file = fopen("data.json", 'w');
    fwrite($file, $json);
}



?>