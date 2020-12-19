<?php

/**
 * @file
 * Show the status of various link status.
 */

// Place Ping.php in the same folder as this script.
require_once('Ping.php');

use JJG\Ping as Ping;

// Define a list of servers to check. Each item in the array is one server; the
// key is the title of the server, and the value is the ip address or host name
// that will be checked.
 
$linkpath = file_get_contents('linkinfo.ini');
 
    $contents_array = preg_split("/\\r\\n|\\r|\\n/", $linkpath);
    foreach ($contents_array as $record) {    // for each line
  
            $arr			      = explode('|',$record);
            $ips		        = 	 @$arr[0];
            $servicename		= 	 @$arr[1];
            $circuitid	  	= 	 @$arr[2];
            $helpline		    = 	 @$arr[3];
            $ping = new Ping($ips);
            $latency = $ping->ping();
  if ($latency) { echo '<span class="status up">Up</span>';} else { echo '<span class="status down">Down</span>';}
  
      }
?>