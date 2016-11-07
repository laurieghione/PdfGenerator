<?php
/**
 * User: laurie Ghione
 * Date: 07/11/2016
 * Time: 23:28
 */

/*
 * difference between two dates
 * return interval
 */
function dateDiff($date1,$date2){
    return $date2->diff($date1);
}

/*
 * convert a string to date object
 */
function stringToDate($string){
    return new DateTime($string);
}


?>