<?php  
$url='http://112.186.146.96:4080/_hourdat?sc=91002&nal=1&s=0';

$html=file_get_contents($url);

echo $final=json_decode($html, true);
if($need=='today'){
    $today_tt=print_r($final['시간표'][$grade][$class][$day], true); 
    echo $today_tt;
}
if($need=='tomorrow'){
    $tom_tt=print_r($final['시간표'][$grade][$class][$day_tom], true); 
    echo $tom_tt;
}
if($need=='week'){
    $week_tt=print_r($final['시간표'][$grade_int][$class_int], true); 
    echo $week_tt;
}
?>