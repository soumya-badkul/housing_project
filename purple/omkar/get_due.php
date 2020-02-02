<?php
session_start();
    $conn =new mysqli('localhost','root','','house') or die(mysqli_error($conn));
    $flat_no=$_SESSION['username'];
    $due_noti='';
    $sql="SELECT * from due WHERE flat_no='$flat_no'";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $isdue=null;
    $quat='';
    $sf = substr($flat_no,0,1);
    if($row['isdue']){
        $isdue=$row['isdue'];
        $due_date=$row['due_date'];
        $days_due=$row['days_due'];
        $due_date_q=null;
        $due_date_year=substr($due_date,2,2);
        
        $num_quarters=intdiv($days_due,90)+1;
        $due_payment=(intdiv($days_due,90)+1)*100;
        $due_noti='<div class="col-12" style="color:red;"><hr style="border:0.3px solid gray;"><h4 class="ml-3">You have missed the following payments</h4></div><div class="col-12"><ul>';
        include 'current_quarter.php';
        $r = $remaining_q;

        // mysqli_close($conn);
        if(substr($due_date,5,2)>=1 && substr($due_date,5,2)<=3){
            $due_date_q=4;
        }
        else if(substr($due_date,5,2)>=3 && substr($due_date,5,2)<=6){
            $due_date_q=1;
        }
        else if(substr($due_date,5,2)>=6 && substr($due_date,5,2)<=9){
            $due_date_q=2;
        }
        else{
            $due_date_q=3;
        }
        if($due_date_q==4)
        {
            $due_date_year -= 1;
        }
        for($i=1; $i<= $num_quarters; $i++){
            if($due_date_q==1){
                $due_noti.='<li>Quarter 1(Apr,May,Jun) of 20'.$due_date_year.'-'.($due_date_year+1).'</li>';
                $quat .='1-20'.$due_date_year.',';
                $due_date_q+=1;
            }
            else if($due_date_q==2){
                $due_noti.='<li>Quarter 2(Jul,Aug,Sept) of 20'.$due_date_year.'-'.($due_date_year+1).'</li>';
                $quat .='2-20'.$due_date_year.',';
                $due_date_q+=1;
            }
            else if($due_date_q==3){
                $due_noti.='<li>Quarter 3(Oct,Nov,Dec) of 20'.$due_date_year.'-'.($due_date_year+1).'</li>';
                $quat .='3-20'.$due_date_year.',';
                $due_date_q+=1;
            }
            else{
                
                $due_noti.='<li>Quarter 4(Jan,Feb,Mar) of 20'.$due_date_year.'-'.($due_date_year+1).'</li>';
                $quat .='4-20'.$due_date_year.',';
                $due_date_q=1;
                $due_date_year+=1;
            }
        }
        $due_noti.='</ul>';
        if($sf == 'A' || $sf == 'B'){

            $sqq ="SELECT f.shop_dimensions,p.flat_dimensions,a.rebate, a.mpsf,a.interest,d.days_due,d.isdue
            FROM flat_details AS p
            INNER JOIN shop_details AS f
            INNER JOIN charges AS a 
            INNER JOIN due AS d WHERE p.flat_no = '$flat_no' AND d.flat_no = '$flat_no'";
            $nes = mysqli_query($conn,$sqq);
            $riw = mysqli_fetch_assoc($nes);
            $vyaj = ($riw['flat_dimensions']*$riw['mpsf']*$riw['interest'])/100;
            $normal = $riw['flat_dimensions']*$riw['mpsf'];
            $rebate = ($normal*4*$riw['rebate'])/100;
            $due =  $normal*$num_quarters+$vyaj*$num_quarters;
            $dueqc =  $normal*$num_quarters+$vyaj*$num_quarters+$normal;
            // $dueyr = $normal*4;
            $dueyr= (($vyaj*$num_quarters)-$rebate)+(($num_quarters+1)-$r)*$normal+$normal*4;
                $due_noti.= '
                
                <div class="border border-secondary rounded ml-3 p-2 mb-3">
                <h5 class="m-1 text-primary">Payment Options  (Inclusive of Interest)</h5>
                <table class="table table-info table-hover" style="width:40%">
                <tr><td>'.$num_quarters.' - Pending Dues : </td><td>₹'.$due.'/-</td></tr>
                <tr><td>Pending Dues + Current Quarter : </td><td>₹'.$dueqc.'/-</td></tr>
                <tr><td>Payfor Current Year (Dues + Current Year): </td><td>₹'.$dueyr.'/-</td></tr>
                </table>
                <smal ><hr><p class="m-1" style="color:#666">INTEREST<sub>(per quarter)</sub>: '.$riw['interest'].'%</p><hr></small>
                </div>
                <p class="ml-3">You are requested to clear the Maintenance Dues before making any further payments</p>
                <p class="ml-3"><b>If you have already made the Payment Intimation please ignore this message.<br>
                This message won\'t be shown once your payment is approved.</b></p>
                <hr style="border:0.5px solid gray;"></div>';

        }
        else if($sf == 'S'){

        
        $sqq ="SELECT f.shop_dimensions,p.flat_dimensions,a.rebate, a.mpsf,a.interest,d.days_due,d.isdue
    FROM flat_details AS p
    INNER JOIN shop_details AS f
    INNER JOIN charges AS a 
    INNER JOIN due AS d WHERE f.shop_no = '$flat_no' AND d.flat_no = '$flat_no'";
    $nes = mysqli_query($conn,$sqq);
    $riw = mysqli_fetch_assoc($nes);
    $vyaj = ($riw['shop_dimensions']*$riw['mpsf']*$riw['interest'])/100;
    $normal = $riw['shop_dimensions']*$riw['mpsf'];
    $rebate = ($normal*4*$riw['rebate'])/100;
    $due =  $normal*$num_quarters+$vyaj*$num_quarters;
    $dueqc =  $normal*$num_quarters+$vyaj*$num_quarters+$normal;
    // $dueyr = $normal*4;
    $dueyr= (($vyaj*$num_quarters)-$rebate)+(($num_quarters+1)-$r)*$normal+$normal*4;
        $due_noti.= '
        
        <div class="border border-secondary rounded ml-3 p-2 mb-3">
        <h5 class="m-1 text-primary">Payment Options  (Inclusive of Interest)</h5>
        <table class="table table-info table-hover" style="width:40%">
        <tr><td>'.$num_quarters.'Pending Dues : </td><td>₹'.$due.'/-</td></tr>
		<tr><td>Pending Dues + Current Quarter : </td><td>₹'.$dueqc.'/-</td></tr>
        <tr><td>Payfor Current Year (Dues + Current Year): </td><td>₹'.$dueyr.'/-</td></tr>
        </table>
        <smal ><hr><p class="m-1" style="color:#666">INTEREST<sub>(per quarter)</sub>: '.$riw['interest'].'%</p><hr></small>
        </div>
        <p class="ml-3">You are requested to clear the Maintenance Dues before making any further payments</p>
        <p class="ml-3"><b>If you have already made the Payment Intimation please ignore this message.<br>
        This message won\'t be shown once your payment is approved.</b></p>
        <hr style="border:0.5px solid gray;"></div>';
    }
}

?>
