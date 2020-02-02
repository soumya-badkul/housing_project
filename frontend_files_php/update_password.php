    <?php
    session_start();
    error_reporting(E_PARSE & ~E_NOTICE);
    if($_SESSION['role']=='admin'){ 
        include './_navbar.php';
    }
    else if($_SESSION['role']=='shop'){
        include './_navbar_shop.php';        
    }
    else if($_SESSION['role']=='resident'){
        include './_navbar_resident.php';                
    }
    else if($_SESSION['role']=='tenant'){
        include './_navbar.php';                
    }
    ?>
    <div class="page-header">
        <h3 class="page-title text-info"> Update Password </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Password</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body mx-5">
                    <p class="alert alert-danger shadow-sm "style="display:none;" id="errorbox"><span id="errorboxtext"></span><a class="float-right" id="dismiss">x</a></p>
                    <!-- <h4 class="font-weight-bold text-center">Update Password</h4> -->
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control" id="new_password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm_password" placeholder="Password">
                        </div>
                        <button type="button" id="update" class="btn btn-gradient-success mr-2">Update</button>
                        <!-- <button class="btn btn-danger">Cancel</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="failpass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button><br>
                    <i class="mdi mdi-checkbox-marked-outline text-success" style="font-size:105px"></i>
                    <i class="mdi mdi-alert-circle-outline text-danger" style="display:none;font-size:105px"></i>
                    <p class="text-danger h3" id="error-text"></p>
                    <p class="text-success h3" id="success-text">Update Successful</p>
                    <!-- <button class="btn btn-danger float-right" data-dismiss="modal" >Close</button> -->
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.html' ?>
    <script>
        
  $('#update').click(function(e){

		e.preventDefault();
        var newp = $('#new_password').val();
        var newpconfirm = $('#confirm_password').val();
        if(newp != newpconfirm){
            $('#errorboxtext').text('New Password and Confirmed Password Do not match');
            $('#errorbox').show();
        }
        else{
		$.ajax({
			url:"../backend_files/update_password.inc.php",
			type: "post",
			data: {
                current_password:$('#current_password').val(),
                new_password:$('#new_password').val(),
                confirm_password:$('#confirm_password').val(),
                update:'update',
            },
			success: function(data, status){
				var response=JSON.parse(data);
				if(response.success){
					$('#failpass').modal('show');
				}
				else if(response.error == 'Error1'){
                    $('#errorboxtext').text('Current password does not match with previous password!');
                    $('#errorbox').show();
				}
                else{
                    $('#errorboxtext').text('Error Updating Password.');
                    $('#errorbox').show();
                }
                $('#current_password').val('');
                $('#new_password').val('');
                $('#confirm_password').val('');
			}
            });
        } 
	});
    $('#dismiss').click(function (e) { 
        e.preventDefault();
        $('#errorbox').hide();
    });
    </script>