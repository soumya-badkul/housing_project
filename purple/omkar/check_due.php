<?php
    $conn =new mysqli('localhost','root','','house') or die(mysqli_error($conn));
    $flat=$_SESSION['username'];
    $sql="SELECT * from due WHERE flat_no='$flat'";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $today=date('Y-m-d',strtotime('today'));
    $due=$row['due_date'];
    if(substr($today,2,2)>substr($due,2,2)){
        $days=(substr($today,2,2)-substr($due,2,2)-1)*365;
        $days+=(12-substr($due,5,2))*30;
        $days+=(30-substr($due,8,2));
        $days+=(substr($today,5,2)-1)*30;
        $days+=substr($today,8,2);
        $days+=6;
        $sql = "UPDATE residents SET isdue=1, days_due='$days' WHERE id=1";
        mysqli_query($conn, $sql);
        $_SESSION['noti']='Your payment is due by '.$days.' days';;
    }
    else if(substr($today,2,2)==substr($due,2,2)){
        if(substr($today,5,2)>=substr($due,5,2)){
            if(substr($today,5,2)==substr($due,5,2) && substr($today,8,2)<=substr($due,8,2)){
                $sql = "UPDATE residents SET isdue=0, days_due=0 WHERE id=1";
                mysqli_query($conn, $sql);
                $_SESSION['noti']=null;
            }
            else if(substr($today,5,2)==substr($due,5,2)){
                $days=abs(substr($today,8,2)-substr($due,8,2));
                $sql = "UPDATE residents SET isdue=1, days_due='$days' WHERE id=1";
                mysqli_query($conn, $sql);
                $_SESSION['noti']='Your payment is due by '.$days.' days';
            }
            else{
                $days=abs(substr($today,8,2)+(30-substr($due,8,2)))+30*abs(substr($today,5,2)-substr($due,5,2)-1);
                $sql = "UPDATE residents SET isdue=1, days_due='$days' WHERE id=1";
                mysqli_query($conn, $sql);
                $_SESSION['noti']='Your payment is due by '.$days.' days';
            }
        }
        else{
            $sql = "UPDATE residents SET isdue=0, days_due=0 WHERE id=1";
            mysqli_query($conn, $sql);
            $_SESSION['noti']=null;
        }
    }
    else{
        $sql = "UPDATE residents SET isdue=0, days_due=0 WHERE id=1";
        mysqli_query($conn, $sql);
        $_SESSION['noti']=null;
    }
    // if(substr($today,5,2)>=substr($due,5,2)){
    //    if(substr($today,5,2)>=1 && substr($today,5,2)<=3){
    //     $sql = "SELECT * from due WHERE quarter='Q4' && yearno='19'";
    //     if (mysqli_num_rows(mysqli_query($conn, $sql))<1){
    //         $sql = "INSERT INTO due (flat_no, quarter, yearno) values ('A301', 'Q4', '19')";
    //         mysqli_query($conn, $sql);
    //     }
    //    }
    //    else if(substr($today,5,2)>=3 && substr($today,5,2)<=6){
    //     $sql = "SELECT * from due WHERE quarter='Q1' && yearno='19'";
    //     if (mysqli_num_rows(mysqli_query($conn, $sql))<1){
    //         $sql = "INSERT INTO due (flat_no, quarter, yearno) values ('A301', 'Q1', '19')";
    //         mysqli_query($conn, $sql);
    //     }
    //    }
    //    else if(substr($today,5,2)>=6 && substr($today,5,2)<=9){
    //     $sql = "SELECT * from due WHERE quarter='Q2' && yearno='19'";
    //     if (mysqli_num_rows(mysqli_query($conn, $sql))<1){
    //         $sql = "INSERT INTO due (flat_no, quarter, yearno) values ('A301', 'Q2', '19')";
    //         mysqli_query($conn, $sql);
    //     }
    //    }
    //    else if(substr($today,5,2)>=9 && substr($today,5,2)<=12){
    //     $sql = "SELECT * from due WHERE quarter='Q3' && yearno='19'";
    //     if (mysqli_num_rows(mysqli_query($conn, $sql))<1){
    //         $sql = "INSERT INTO due (flat_no, quarter, yearno) values ('A301', 'Q3', '19')";
    //         mysqli_query($conn, $sql);
    //     }
    //    }
    // }
    // else{
    //     $sql = "UPDATE residents SET isdue=0, days_due=0 WHERE id=1";
    //     mysqli_query($conn, $sql);
    //     $_SESSION['noti']=null;
    // }
?>
