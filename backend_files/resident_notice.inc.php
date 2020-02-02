<?php

$conn = mysqli_connect( 'localhost','root',"",'house' );

extract($_POST);


if(isset($_POST['notice'])){
 
  $data ="";
  $auery = "SELECT * FROM notice ORDER BY notice_id DESC LIMIT 5";
  $res =mysqli_query($conn,$auery);

  if(mysqli_num_rows($res)>0){
    $number=1;
    $data .='';
    while ($row = mysqli_fetch_array($res)) {
      $data .='
      <a href="../frontend_files_php/resident_notice.php" style="text-decoration:none;" ><div class="alert alert-info" style="margin-top:2px;">
         '.$number.'. '.$row['subject'].'</div></a>
      ';
              $number++;

        }
      }
else if(mysqli_num_rows($res)==0){
  $data .='<p class="m-3"> No New Notices</p>';
}

echo $data;
}


if(isset($_POST['mark_read'])){
	$id= $_POST['id'];
	$query = "UPDATE notice_user SET isread='yes' WHERE id= '$id'";
	mysqli_query($conn,$query);


}

// -------------display individual notice--------------------------
if(isset($_POST['sendnotice'])){

    $data =  '';
    $userid= $_POST['flat_id'];
    $displayquery = " SELECT * FROM notice_user WHERE receiver='$userid' AND isread='no'";
    $result = mysqli_query($conn,$displayquery);
   
   
    if(mysqli_num_rows($result)==0){
      $data.='<div class="row m-2 text-center" style="color:black;">
        <h4> No New Notice </h4>
        </div>
      ';
    }
   
    else if(mysqli_num_rows($result) > 0){
   
   $data .='
     <table class="table table-hover table-responsive table-striped" style="" id="mydata"><tbody>';
   
   
      $i = 1;
      while ($row = mysqli_fetch_array($result)) {
   
       $data .= '<tr><div class="row p-2" style="width:100%">
                          <div class="card-body border-bottom" style="id="head'.$i.'" class="" data-toggle="collapse" data-target="#colapse'.$i.'">'.$row['subject'].'<button type="button" onclick="read('.$row['id'].')" class="btn btn-outline-primary float-right">Mark as Read </button></div>				                          
                          <div id="colapse'.$i.'"style="width:100%;background-color:#eee;" class="border collapse" aria-labelledby="head'.$i.'" data-parent="#accordionExample">
                              <p class="p-3">'.$row['description'].'</p>
                              <p class="small ml-3">Posted on : '.date('d-m-Y',strtotime($row['datentime'])).'</p></div>                          
                      </div>
                      </tr>';
                 $i++;
               }
               $data .= ' </tbody>
                       </table>';
             }
                 echo $data;
   }
   // -------------display individual notice--------------------------

   if(isset($_POST['getnotice'])){

	$data ="";
	$userid=$_POST['flat_id'];
	$auery = "SELECT * FROM notice_user WHERE receiver='$userid' AND `isread` = 'yes'";
	$res =mysqli_query($conn,$auery);
	$i =1;
	if(mysqli_num_rows($res)>0){
		while ($row = mysqli_fetch_array($res)) {
			$data .='
			<div class="row " style="width:100%">
                        <div class="card-body border-bottom" style="id="heading'.$i.'" class="" data-toggle="collapse" data-target="#collapse'.$i.'">'.$row['subject'].'<i class="mdi mdi-plus float-right text-primary"></i></div>				                          
                        <div id="collapse'.$i.'"style="width:100%;background-color:#eee;" class="border collapse" aria-labelledby="heading'.$i.'" data-parent="#accordionExample">
                            <p class="p-3">'.$row['description'].'</p>
                            <p class="small ml-3">Posted on : '.date('d-m-Y',strtotime($row['datentime'])).'</p></div>                          
                    </div>';
			$i++;
				}
			}
	else if(mysqli_num_rows($res)==0){
	$data .='<p class="m-3"> No previous Notices</p>';
	}

	echo $data;
	}

	if(isset($_POST['findnoti'])){
		$today = strtotime(date("Y-m-d"));
		$fltno = $_POST['flat_no'];
		$data ="";
		$kuery = "SELECT * FROM notice_user WHERE receiver='$fltno'";
		$res =mysqli_query($conn,$kuery);
		if(mysqli_num_rows($res)==0){
		//   $data .='<p class="m-3"> You\' re all caught up !</p>';
		}
		if(mysqli_num_rows($res)>0){
	  
		  $number=1;
		  while ($row = mysqli_fetch_array($res)) {
			  $data .='<a href="noti_res.php" class="btn btn-block border-bottom" style="text-decoration:none;color:black;">
						  '.$number.'.'.$row['subject'].'
						</a>';
						  $number++;
		}
	  }
	  echo $data;
      }
      
      if(isset($_POST['readrecord'])){

        $data =  '';
    
        $displayquery = " SELECT * FROM notice_user ORDER BY id DESC";
        $result = mysqli_query($conn,$displayquery);
        if(mysqli_num_rows($result) > 0){
            $number = 1;
            while ($row = mysqli_fetch_array($result)) {
                $data .= '<tr onclick="alldet('.$row['id'].')">
                    <td>'.$number.'</td>
                    <td>'.$row['receiver'].'</td>
                    <td>'.$row['subject'].'</td>
                    <td>'.$row['description'].'</td>
                    <td>'.date('d-m-Y',strtotime($row['datentime'])).'</td>
                    
                </tr>';
                $number++;
    
            }
        }
         $data .= '';
            echo $data;
    }
?>