<?php
    if(substr($due_date,5,2)>=1 && substr($due_date,5,2)<=3){
        $due_date_q=4;
        $due_date_q1=4;

    }
    else if(substr($due_date,5,2)>=3 && substr($due_date,5,2)<=6){
        $due_date_q=1;
        $due_date_q1=1;

    }
    else if(substr($due_date,5,2)>=6 && substr($due_date,5,2)<=9){
        $due_date_q=2;
        $due_date_q1=2;

    }
    else{
        $due_date_q=3;
        $due_date_q1=3;

    }
    if($due_date_q==4){
        $due_date_year -= 1;
    }

?>