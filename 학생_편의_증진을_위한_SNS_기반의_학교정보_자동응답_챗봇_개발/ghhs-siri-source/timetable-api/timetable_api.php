<?php  
$grade = $_GET['grade'];                // grade
$class = $_GET['class'];                // class
$need = $_GET['need'];                  // need : today, tomorrow, week

$time = time();

$today=date("Y-m-d");                    
$tomorrow=date("Y-m-d", strtotime("+24 hours", $time));

$day=date("w");                
$day_tom=date("w", strtotime($tomorrow));

$url='http://112.186.146.96:4080/_hourdat?sc=91002&nal=1&s=0';

$contents=file_get_contents($url);
$final=json_decode($contents, true);
if($need=='today'){
    $today_tt=print_r($final['시간표'][$grade][$class][$day], true); 
    echo $today_tt;
}
if($need=='tomorrow'){
    $tom_tt=print_r($final['시간표'][$grade][$class][$day_tom], true); 
    echo $tom_tt;
}
elseif($need=='week'){
    $week_tt=print_r($final['시간표'][$grade][$class], true); 
    echo $week_tt;
}
?>