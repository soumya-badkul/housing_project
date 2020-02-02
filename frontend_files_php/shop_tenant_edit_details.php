<?php include './_navbar.php';?>

<div class="page-header">
<h3 class="page-title">Tenant Records</h3>
          <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="admin.php">Homepage</a></li>
            <li class="breadcrumb-item"><a href="shop_tabs.php"> Manage Shops</a></li>   
            <li class="breadcrumb-item active"><a> Tenant Records</a></li>           
          </ol>
        </nav>
</div>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
        <div id="re" class="mt-3 mb-0 alert alert-success success" style='display: none;'><span class="success-text"></span><span style="float:right; cursor: pointer;" class="success-close">&times;</span></div>
  <div id="re" class="mt-3 mb-0 alert alert-danger error" style='display: none;'> <span class="error-text"></span><span style="float:right; cursor: pointer;" class="error-close">&times;</span></div>
	<div class="tbody mt-5"></div>

    <div class="modal" id="viewmodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-light">
        <h4 class="modal-title" id="view_flat_no"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
              <div class="col">
                <img  width="150px" class="img-thumbnail" id="image" alt="">
              </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <b>Shop No. :&nbsp;&nbsp;</b><div class="d-inline " id='flat_no'></div><hr>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <mark><b>Agreement Holder Details :&nbsp;&nbsp;</b></mark><hr>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <b>Name:&nbsp;&nbsp;</b><div class="d-inline " id="agreement_holder_name"></div><hr>
            </div>
            <div class="col">
              <b>Email:&nbsp;&nbsp;</b><div class="d-inline " id="agreement_holder_email"></div><hr>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <b>Contact:&nbsp;&nbsp;</b><div class="d-inline " id="agreement_holder_mobile"></div>
            </div>
            <div class="col">
              <b>Date Of Birth:&nbsp;&nbsp;</b><div class="d-inline " id="agreement_holder_dob"></div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <b>Tenant Move In Date:&nbsp;&nbsp;</b><div class="d-inline " id="move_in_date"></div><hr>
            </div>
          </div>
          
        </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- update modal////////////////////////////////// -->
<div class="modal" id="update_user_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">UPDATE Tenant DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
		<div class="modal-body">
          <div class="row">
            <div class="col">
              <mark><b>Agreement Holder Details:&nbsp;&nbsp;</b><div class="d-inline " id="name1"></div></mark><hr>
            </div>
          </div>
          <div class="form-group">
            <label for="update_agreement_holder_name">Name:</label>
            <input type="text" name="" id="update_agreement_holder_name" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="update_agreement_holder_email">Email:</label>
            <input type="email" name="" id="update_agreement_holder_email" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="update_agreement_holder_mobile">Contact:</label>
            <input type="text" name="" id="update_agreement_holder_mobile" class="form-control">
          </div>

          <div class="form-group">
            <label for="update_agreement_holder_dob">Date Of Birth:</label>
            <input type="text" name="" id="update_agreement_holder_dob" class="form-control">
          </div>
          <hr>
          <div class="form-group">
            <label for="update_move_in_date">Move In Date:</label>
            <input type="text" name="" id="update_move_in_date" class="form-control">
          </div>
        </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="updateuserdetail()">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<input type="hidden" name="" id="hidden_user_id" value="">
      </div>

    </div>
  </div>
</div>
    </div>
</div>

<?php  include './footer.html';?>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>
<script>
    $(document).ready(function(){
    readRecords();

  });
  function readRecords(){
			var readrecord = "readrecord";

			$.ajax({
				url : "../backend_files/shop_tenant_edit_details.inc.php",
				type : "post",
				data :{ readrecord:readrecord },
				success:function(data,status){
                    console.log(data);
					$('.tbody').html(data);
          $('#myTable').DataTable();
				}
			});
		}
    function viewdetails(no){

      $.post("../backend_files/shop_tenant_edit_details.inc.php",{
        no:no
      },function(data,status){

        var dekhle = JSON.parse(data);
          $('#view_flat_no').text(dekhle.shop_no);
          $('#flat_no').text(dekhle.shop_no);
          var path = '../DB_docs_images/shop_tenant/'+dekhle.shop_no+'/'+dekhle.image;
          $('#image').attr('src',path);
          $('#agreement_holder_name').text(dekhle.agreement_holder_name);
          $('#agreement_holder_email').text(dekhle.agreement_holder_email);
          $('#agreement_holder_mobile').text(dekhle.agreement_holder_mobile);
          $('#agreement_holder_dob').text(dekhle.agreement_holder_dob);
          $('#move_in_date').text(dekhle.move_in_date);
        });
      $('#viewmodal').modal("show");
    }

		function getdetails(no){
			$('#hidden_user_id').val(no);
			$.post("../backend_files/shop_tenant_edit_details.inc.php",{
				no:no
			},function(data,status){
				var dekhle = JSON.parse(data);
                $('#update_agreement_holder_name').val(dekhle.agreement_holder_name);
                $('#update_agreement_holder_email').val(dekhle.agreement_holder_email);
                $('#update_agreement_holder_mobile').val(dekhle.agreement_holder_mobile);
                $('#update_agreement_holder_dob').val(dekhle.agreement_holder_dob);
                $('#update_move_in_date').val(dekhle.move_in_date);
			});
			$('#update_user_modal').modal("show");
		}


    function updateuserdetail(){
        var agreement_holder_name=$('#update_agreement_holder_name').val();
        var agreement_holder_email=$('#update_agreement_holder_email').val();
        var agreement_holder_mobile=$('#update_agreement_holder_mobile').val();
        var agreement_holder_dob=$('#update_agreement_holder_dob').val();
        var move_in_date=$('#update_move_in_date').val();
  
        var hidden_user_idupd=$('#hidden_user_id').val();
        $.post("../backend_files/shop_tenant_edit_details.inc.php",{
            hidden_user_idupd: hidden_user_idupd,
            agreement_holder_name:agreement_holder_name,
            agreement_holder_email:agreement_holder_email,
            agreement_holder_mobile:agreement_holder_mobile,
            agreement_holder_dob:agreement_holder_dob,
            move_in_date:move_in_date
        }, function(data,status){
            var response=JSON.parse(data);
            console.log(response);
            if(response.success){
              $('.success-text').text(response.success);
              $('.success').show();
            }
            else{
              $('.error-text').text(response.error);
              $('.error').show();
            }
            $('#update_user_modal').modal("hide");
            readRecords();
        });
    }
    function remove(no){
     
      $.post("../backend/includes/view_shop_tenant_details.inc.php",{
				delete_shop_no:no
			},function(data,status){
     
        var response=JSON.parse(data);
        
        if(response.success){
          $('.success-text').text(response.success);
          $('.success').show();
        }
        else{
          $('.error-text').text(response.error);
          $('.error').show();
        }
        readRecords();
			});
		}
    $('.success-close').click(function(){
      $('.success').hide();
    });
    $('.error-close').click(function(){
      $('.error').hide();
    });
  </script>