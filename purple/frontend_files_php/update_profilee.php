<?php
error_reporting((E_ERROR) || (E_PARSE));
session_start();
if(!isset($_SESSION['username'])){
	header("location:index.php");
}
	
if($_SESSION['role']=='admin'){
	include './_navbar.php';
}
else if($_SESSION['role']=='resident'){
	include './_navbar_resident.php';
}
else if($_SESSION['role']=='tenant'){
	include './_navbar_tenant.php';
}
else if($_SESSION['role']=='shop'){
	include './_navbar_shop.php';
}
	$uu= $_SESSION['username'];
?>
<style>
	.clk {
		background-color: #326da8;
		border: none;
		color: white;
		border-radius: 13px;
		padding: 12px 20px;
		width: 98%;
		outline: none;
		margin-top: 10px;
		text-decoration: none;
		cursor: pointer;
	}

	.conlk {
		background-color: #326da8;
		border: none;
		color: white;
		border-radius: 8px;
		margin-left: 0px;
		padding: 5px 15px;
		width: 40%;
		text-decoration: none;
		cursor: pointer;
	}

	.hlk i {
		color: #ff6b61;
	}

	.circletag{
		overflow: hidden;
	display: block;
    width: 120px;
    height: 120px;
    text-align: center;
    align-content: center;
    align-items: center;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
	}
	.circletag>img{
		max-height: 100%;
   max-width: 100%;
	}
	.form-control {
		/* width:40%; */
	}

	::-webkit-file-upload-button {
		background-color: #4CAF50;
		border: none;
		color: white;
		border-radius: 13px;
		padding: 12px 20px;
		width: 40%;
		outline: none;
		text-decoration: none;
		cursor: pointer;
		/* margin-left:-20px; */
	}

	.clk:focus,
	.clk:hover,
	.conlk:focus,
	.conlk:hover {
		background-color: #333ffe;
		outline: none;
	}

	::-webkit-file-upload-button:focus,
	::-webkit-file-upload-button:hover {
		background-color: #4CCC30;
		outline: none;
	}
</style>

<div class="page-header">
<h2 class="pl-3 pt-3">Update Profile</h2>
          <p aria-label="breadcrumb">
          <ol class="breadcrumb">
		  <?php if($_SESSION['role']=='resident') {?>
            <li class="breadcrumb-item "><a href="resident.php">Homepage</a></li>
          <?php }else if($_SESSION['role']=='shop'){?>
            <li class="breadcrumb-item "><a href="shop.php">Homepage</a></li>
            <?php }else if($_SESSION['role']=='tenant'){?>
              <li class="breadcrumb-item "><a href="tenant.php">Homepage</a></li>
            <?php }?>
			<li class="breadcrumb-item ">Update Profile</li>
          </ol>
        </p>
</div>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
        <div class="container-fluid">
	<div class="row p-2">
		<div class="col-12 col-lg-4 " style="height:100%;">
			<div class="card p-5 shadow" style="border:1px solid gray">
				<center>
			<div class="circletag">
			</div>
					<br>
					<hr>
					<p class="h3 mt-3">
						Flat No : <div id="tag"></div>
						<div id="tagtag"></div></p>
				</center>
				<hr>
				<form method="post" enctype="multipart/form-data" class="fofo">
					<label for=""><b>Update Profile Image </b></label><br>
					<small class="text-info">(Select Image and Click on "Click To update to add New Image")</small>
					<hr>
					<div style="width:100%;">
						<input type="file" class="f" name="f" id="f" class="form-control">
					</div>
					<br>
					<button type="submit" name="update" class="clk" onclick="addPro()">
						Click To update&nbsp;&nbsp;&nbsp;<i class="mdi mdi-grease-pencil"></i> </button>
				</form>

			</div>
		</div>
		<div class="col-12 col-lg-8">
			<div id="viewprofile">
				
			</div>
	</div>
</div>
</div>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	  <div class="d-md-none d-lg-block" style="height:100px"></div>
        <div class="modalimage">
		</div>
		<div class="d-md-none d-lg-block" style="height:100px"></div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="phone_verify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">              
      <div class="modal-body"> 
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><br>
        Error In your Phone Number. Please Verify and upload. <br><br>
		<button class="btn btn-danger float-right" data-dismiss="modal" >Close</button>
      </div>
    </div>
  </div>
</div>

    </div>
</div>

<?php  include './footer.html';?>

<script type="text/javascript">
	$(document).ready(function () {
		readprofile();
		readPropic();
	});

	$('.circletag').on('click', function() {
			$('#imagemodal').modal('show');   
		});		

	function readPropic(){
        var pic = '<?php echo $uu ?>';
		$.ajax({
		url:"../backend_files/update_profile.inc.php",
		type:"post",
		data:{pic:pic},
		success:function(data,status){
			var pp = JSON.parse(data);
			$('#tag').html('<h4>'+pp.username+'</h4>');
			$('#tagtag').html('<h5>'+pp.usertype+'</h5>');
			$('.circletag').html('<img src="../DB_docs_images/profile_images/'+pp.username+'/'+pp.profile_pic+'" height="140px"/>');
			$('.modalimage').html('<img src="../DB_docs_images/profile_images/'+pp.username+'/'+pp.profile_pic+'" class="img-thumbnail">');
	    }
		});
	}



	function readprofile() {
		var pro = "$pro";
		$.ajax({
			url: '../backend_files/update_profile.inc.php',
			type: 'post',
			data: {
				pro: pro,
			},
			success: function (data, status) {
				$('#viewprofile').html(data);
			}
		});
	}


	function addPro(){
		var propic = $('.fofo');
		var files = $('#f')[0].files;
		var pop = $('#f').attr("name");
		var formData = new FormData();
		formData.append(pop, files[0]);
		$.ajax({
			url:"../backend_files/update_profile.inc.php",
			type:'post',
			contentType:false,
			processData:false,
			cache:false,
  			data: formData,
			success:function(data,status){
			readPropic();
			}
		});
	}



	function contact() {
		var con = $('#con').val();
		if(con.length >= 11 || con.length <1){
			$('#phone_verify').modal('show');
		}
		else {
		$.ajax({
			url: "../backend_files/update_profile.inc.php",
			type: "post",
			data: {
				con: con
			},
			success: function (data, status) {
				$('#alert').html(data);
				$('#con').val('');
				readprofile();
			}
		});
	}
	}

	function email() {
		var email = $('#e').val();
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(email) || email == ''){
			alert('Please Verify Email');
			}
		else {
		$.ajax({
			url: "../backend_files/update_profile.inc.php",
			type: "post",
			data: {
				email: email
			},
			success: function (data, status) {
				$('#alert').html(data);			
				$('#e').val('');
				readprofile();
			}
		});
	}
	}

	function password() {
		var current_password = $('#current_password').val();
		var new_password = $('#new_password').val();
		var confirm_password = $('#confirm_password').val();
		var update = "update";

		$.ajax({
			url: "./includes/update_profile.inc.php",
			type: "post",
			data: {
				current_password: current_password,
				new_password: new_password,
				confirm_password: confirm_password,
				update: update,
			},
			success: function (data, status) {
				var response = JSON.parse(data);
				if (response.success) {
					$('.success-text').text(response.success);
					$('.success').show();
				} else {
					$('.error-text').text(response.error);
					$('.error').show();
				}
				$('#update_password').trigger('reset');
			}
		});



	}

	$('.success-close').click(function () {
		$('.success').hide();
	});
	$('.error-close').click(function () {
		$('.error').hide();
	});
</script>