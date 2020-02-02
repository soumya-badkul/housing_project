<?php
    $today=date('Y-m-d',strtotime('today'));
    $current_q=null;
    $remaining_q=null;
    if(substr($today,5,2)>=1 && substr($today,5,2)<=3){
        $current_q=4;
    }
    else if(substr($today,5,2)>=3 && substr($today,5,2)<=6){
        $current_q=1;
    }
    else if(substr($today,5,2)>=6 && substr($today,5,2)<=9){
        $current_q=2;
    }
    else{
        $current_q=3;
    }
    // if($current_q==4){
    //     $current_year -= 1;
    // }
    $remaining_q=4-$current_q;
?>
