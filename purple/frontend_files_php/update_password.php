    <?php
    session_start();
    if($_SESSION['role']=='admin'){
    include './_navbar.php';}

    elseif($_SESSION['role']=='resident'){
        include './_navbar_resident.php';
    }
    ?>
    <div class="page-header">
        <h3 class="page-title text-info"> Update Password </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <?php
            if($_SESSION['role']=='admin'){?>
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <?php }
            elseif($_SESSION['role']=='resident'){?>
                <li class="breadcrumb-item"><a href="resident.php">Home</a></li>
            <?php } ?>
                <li class="breadcrumb-item active" aria-current="page">Update Password</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-bold text-center">Update Password</h4>
                    <form>
                        <div class="form-group">
                            <label for="123">Password</label>
                            <input type="password" class="form-control" id="123" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="456">New Password</label>
                            <input type="password" class="form-control" id="456" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="789">Confirm New Password</label>
                            <input type="password" class="form-control" id="789" placeholder="Password">
                        </div>
                        <button type="submit" id="update" class="btn btn-gradient-success mr-2">Submit</button>
                        <button class="btn btn-danger">Cancel</button>
                    </form>
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
        $('#update').click(function (e) { 
            e.preventDefault();
            $('#failpass').modal('show');      
        });
        
  $('#update_password').on('submit',function(e){
		e.preventDefault();
		$.ajax({
			url:"./includes/update_password.inc.php",
			type: "post",
			data: $('#update_password').serialize(),
			success: function(data, status){
				var response=JSON.parse(data);
				if(response.success){
					$('#error-text').text('');
					$('.mdi-checkbox-marked-outline').show();
					$('.mdi-alert-circle-outline').hide();
					$('#success-text').text(response.success);
					// $('.success').show();
					$('#failpass').modal('show');
				}
				else{
					$('#success-text').text('');
					$('.mdi-checkbox-marked-outline').hide();
					$('.mdi-alert-circle-outline').show();
					$('#error-text').text(response.error);
					// $('.error').show();
					$('#failpass').modal('show');
				}
				$('#update_password').trigger('reset');
			}
		});
	});
	
	$('.success-close').click(function(){
    $('.success').hide();
  });
  $('.error-close').click(function(){
    $('.error').hide();
  });
    </script>