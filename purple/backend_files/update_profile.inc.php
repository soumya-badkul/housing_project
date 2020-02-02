<?php
$conn = mysqli_connect( 'localhost','root',"",'house' );
session_start();
extract($_POST);
$username= $_SESSION['username'];

if(isset($_FILES['some']['name'])){

		$tmp=$_FILES['some']['tmp_name'];
		$array= explode('.',$_FILES['some']['name']);
		$ext=end($array);
		if(in_array(strtolower($ext),array("jpg","jpeg","png"))){

            if(!is_dir("../DB_docs_images/profile_images/$username")){
            mkdir("../DB_docs_images/profile_images/$username");
            }

		$dest='../DB_docs_images/profile_images/'.$username.'/'.$username.'.'.$ext;
		$name=$username.'.'.$ext;
		if(file_exists($dest)){
			unlink($dest);
		}
		$query="UPDATE login SET profile_pic='$name' WHERE username='".$_SESSION['username']."'";
		$res = mysqli_query($conn,$query);
		if($res){
		
		move_uploaded_file($tmp,$dest);}
	}
}

if(isset($_POST['pic'])){
    $usname = $_POST['pic'];
 //   echo $usname;

    $py="SELECT * FROM `login` WHERE `username`= '$usname'";
    if (!$result = mysqli_query($conn,$py)) {
        exit(mysqli_error());
        }

    $response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
                $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
echo json_encode($response);
}

$flat_no=$_SESSION['username'];

if(isset($_POST['pro'])){
  $data='';
    $type=null;
    if(substr($flat_no,0,1)=='S'){
        if(substr($flat_no,-1)=='T'){
            $type='shop_tenant';
        }
        else{
            $type='shop';
        }

    }
    else{
        if(substr($flat_no,-1)=='T'){
            $type='tenant';
        }
        else{
            $type='resident';
        }
    }
    // echo $type;
    if($type=='resident'){
        $you = "SELECT flat_owner1_mob,flat_owner1_email FROM flat_owner_details where flat_no='$flat_no'";
        $mark = mysqli_query($conn,$you);
        $row=mysqli_fetch_assoc($mark);
        $mob=$row['flat_owner1_mob'];
        $email=$row['flat_owner1_email'];
    }
    else if($type=='shop'){
        $you = "SELECT phoneno1,email1 FROM shop_owner_details where shop_no='$flat_no'";
        $mark = mysqli_query($conn,$you);
        $row=mysqli_fetch_assoc($mark);
        $mob=$row['phoneno1'];
        $email=$row['email1'];
    }
    else if($type=='tenant'){
        $you = "SELECT agreement_holder_mobile,agreement_holder_email FROM tenant_details where flat_no='$flat_no'";
        $mark = mysqli_query($conn,$you);
        $row=mysqli_fetch_assoc($mark);
        $mob=$row['agreement_holder_mobile'];
        $email=$row['agreement_holder_email'];
    }
    


    $data.= ' <div class="row">
       <div class="col-6 stretch-card grid-margin">
            <div class="card bg-color-white text-black">
                <div class="card-body">
                        <h2 class="hlk">Current Details</h2>
                             <div class="row">
					            <div class="col-6 col-lg-6 p-3">
						            <h5>Contact Number:</h5>
					            </div>
					            <div class="col-6 col-lg-6 p-3">
						        <h5>'.$mob.'</h5>
					            </div>
				            </div>
				<div class="row">
					<div class="col-6 col-lg-6 p-3">
						<h5>Email Id:</h5>
					</div>
					<div class="col-6 col-lg-6 p-3">
						<h5>'.$email.'</h5>
					</div>
                </div>
        </div>
        </div> 
        </div>
    <div class="col-6 stretch-card grid-margin">
        <div class="card bg-color-white text-black">
            <div class="card-body">     
            <div id="alert"></div>
        <h2 class="hlk">Update Your Details Here.<i class="mdi mdi-account-edit"></i> </h2>
            <div class="row p-2">
                <div class="col-12 col-lg-12 p-3">
                    <label for="">New Contact Number:</label>
                    <input type="number" class="form-control" name="con" id="con" placeholder="Contact">
                    <button id="tact" onclick="contact()" class="mt-3 conlk"> Update</button>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-12 col-lg-12 p-3">
                    <label for="">New Email Id:</label>
                    <input type="email" class="form-control" name="e" id="e" placeholder="Email">
                    <button id="mail" onclick="email()" class="mt-3 conlk"> Update</button>
                </div>
            </div> 
        </div> 
        </div>
    </div>
    </div>
    ';

echo $data;
}

if(isset($_POST['con'])){
    $data="";
    $contact=$_POST['con'];
    if(substr($flat_no,0,1)=='S'){
        if(substr($flat_no,-1)=='T'){
            $type='shop_tenant';
        }
        else{
            $type='shop';
        }

    }
    else{
        if(substr($flat_no,-1)=='T'){
            $type='tenant';
        }
        else{
            $type='resident';
        }
    }

    if($type=='resident'){
        $tyty = "UPDATE flat_owner_details set flat_owner1_mob='$contact' where flat_no='$flat_no'";
        mysqli_query($conn,$tyty);
    }
    else if($type=='shop'){
        $tyty = "UPDATE shop_owner_details set phoneno1='$contact' where shop_no='$flat_no'";
        mysqli_query($conn,$tyty);
    }
    else if($type=='tenant'){
        $tyty = "UPDATE tenant_details set agreement_holder_mobile='$contact' where flat_no='$flat_no'";
        mysqli_query($conn,$tyty);
    }
        $data .='   <p class="alert alert-success">Updated Successfully !</p>';
    echo $data;
}

if(isset($_POST['email'])){
    $data ='';
  $email=$_POST['email'];
  if(substr($flat_no,0,1)=='S'){
        if(substr($flat_no,-1)=='T'){
            $type='shop_tenant';
        }
        else{
            $type='shop';
        }

    }
    else{
        if(substr($flat_no,-1)=='T'){
            $type='tenant';
        }
        else{
            $type='resident';
        }
    }

    if($type=='resident'){
        $tyty = "UPDATE flat_owner_details set flat_owner1_email='$email' where flat_no='$flat_no'";
        mysqli_query($conn,$tyty);
    }
    else if($type=='shop'){
        $tyty = "UPDATE shop_owner_details set email1='$email' where shop_no='$flat_no'";
        mysqli_query($conn,$tyty);
    }
    else if($type=='tenant'){
        $tyty = "UPDATE tenant_details set agreement_holder_email='$email' where flat_no='$flat_no'";
        mysqli_query($conn,$tyty);
    }
    
    $data .='   <p class="alert alert-success">Updated Successfully !</p>';
    echo $data;
}



if(isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password']) ){
    $current=$_POST['current_password'];
    $new=$_POST['new_password'];
    $confirm=$_POST['confirm_password'];
    $role=$_SESSION['role'];
    $flat_no=$_SESSION['username'];
    $response=array();
    if($role=='admin'){
        $sql="SELECT password FROM login WHERE username='admin'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $current=sha1($current);
        if($current==$row['password']){
            $new=sha1($new);
            $confirm=sha1($confirm);
            if($new==$confirm){
                $uquery="UPDATE login SET password='$new' WHERE username='admin'";
                if(mysqli_query($conn,$uquery)){
                    $response['success']='Password updated successfully';
                }
                else{
                    $response['error']='Error while updating password';
                }
            }
            else{
                $response['error']='New password and Confirm Password do not match';
            }
        }
        else{
            $response['error']='Current password is wrong';
        }
        echo json_encode($response);
    }
    else if($role=='resident'){
        $sql="SELECT password FROM login WHERE username='$flat_no'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $current=sha1($current);
        if($current==$row['password']){
            $new=sha1($new);
            $confirm=sha1($confirm);
            if($new==$confirm){
                $uquery="UPDATE login SET password='$new' WHERE username='$flat_no'";
                if(mysqli_query($conn,$uquery)){
                    $response['success']='Password updated successfully';
                }
                else{
                    $response['error']='Error while updating password';
                }
            }
            else{
                $response['error']='New password and Confirm Password do not match';
            }
        }
        else{
            $response['error']='Current password is wrong';
        }
        echo json_encode($response);
    }
    else if($role=='tenant'){
        $sql="SELECT password FROM login WHERE username='$flat_no'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $current=sha1($current);
        if($current==$row['password']){
            $new=sha1($new);
            $confirm=sha1($confirm);
            if($new==$confirm){
                $uquery="UPDATE login SET password='$new' WHERE username='$flat_no'";
                if(mysqli_query($conn,$uquery)){
                    $response['success']='Password updated successfully';
                }
                else{
                    $response['error']='Error while updating password';
                }
            }
            else{
                $response['error']='New password and Confirm Password do not match';
            }
        }
        else{
            $response['error']='Current password is wrong';
        }
        echo json_encode($response);
    }

}

if(isset($_POST['flatno'])){
    $data='';
    $tmp=$_FILES['some']['tmp_name'];
    $array= explode('.',$_FILES['some']['name']);
    $ext=end($array);
    if(in_array(strtolower($ext),array("jpg","jpeg","png"))){

        if(!is_dir("../DB_docs_images/profile_images/$username")){
        mkdir("../DB_docs_images/profile_images/$username");
        }

    $dest='../DB_docs_images/profile_images/'.$username.'/'.$username.'.'.$ext;
    $name=$username.'.'.$ext;
    if(file_exists($dest)){
       if( unlink($dest)){
        $data.='unlink';}
    }
    $query="UPDATE login SET profile_pic='$name' WHERE username='$username'";
    $res = mysqli_query($conn,$query);
    if($res){
    if(move_uploaded_file($tmp,$dest)){
        $data.='hua';}
        else{
            $data.='nope';
        }
    }

}
echo json_encode($data);
}

?>