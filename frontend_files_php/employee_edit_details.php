<?php include './_navbar.php';?>

<style media="screen">
#logo{
  width: 50px;
  height: 50px;

}
#mydata_length{
display: none;
}

.brek a{
  font-size: 16px;
}
#view_idproof,#view_otherdoc{
  width: 100%;
}
#iiddddii,#ddiiiidd{
  width: 100%;
  height: 73vh;
}
@media screen and (max-width: 480px) {
}
</style>
<div class="page-header">
<h2  style="color:teal;" class="mt-3">Employee Records</h2><hr>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin.php" id="dashboardbox1">Homepage</a></li>
      <li class="breadcrumb-item active" aria-current="page">Employee Records</li>
    </ol>
  </nav>
</div>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
        <div id="re" class="mt-3 mb-0 alert alert-success success" style='display: none;'><span class="success-text"></span><span style="float:right; cursor: pointer;" class="success-close">&times;</span></div>
  <div id="re" class="mt-3 mb-0 alert alert-danger error" style='display: none;'> <span class="error-text"></span><span style="float:right; cursor: pointer;" class="error-close">&times;</span></div>  
        <div class="container-fluid">
  
	<div class="tbody"></div>
</div>

	<!-- The Modal -->


<div class="modal" id="viewmodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-light">
        <h4 class="modal-title" id="view_flat_no">Employee Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <mark><b>Employee Id :&nbsp;&nbsp;</b><div class="d-inline " id="emp_id"></div></mark><hr>
          </div>
          </div>
          <div class="row">
          <div class="col">
            <b>Employee's picture :&nbsp;&nbsp;</b><div class="d-inline " id="emp_image"></div><hr>
          </div>
          </div>
        <div class="row">
          <div class="col">
            <b>Name :&nbsp;&nbsp;</b><div class="d-inline " id="emp_name"></div><hr>
          </div>
          <div class="col">
            <b>Employee Type:&nbsp;&nbsp;</b><div class="d-inline " id="emp_type"></div><hr>
          </div>
        </div>    
        <div class="row">
          <div class="col">
            <b>Agency :&nbsp;&nbsp;</b><div class="d-inline " id="agency"></div><hr>
          </div>
          <div class="col">
            <b>Mobile No:&nbsp;&nbsp;</b><div class="d-inline " id="emp_mob"></div><hr>
          </div>
        </div>    
        <div class="row">
          <div class="col">
            <b>Join Date :&nbsp;&nbsp;</b><div class="d-inline " id="join_date"></div><hr>
          </div>
          <div class="col">
            <b>Salary:&nbsp;&nbsp;</b><div class="d-inline " id="emp_salary"></div><hr>
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
        <h4 class="modal-title">UPDATE EMPLOYEE DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
			<div class="modal-body">
        <div class="form-group">
        	<label for="update_flat_no">Update Employee ID</label>
        	<input type="text" name="" id="update_employee_id" class="form-control">
        </div>
        <div class="form-group">
        	<label for="update_flat_no">Update Employee Name</label>
        	<input type="text" name="" id="update_employee_name" class="form-control">
        </div>
        <div class="form-group">
        	<label for="update_flat_no">Update Employee Agency</label>
        	<input type="text" name="" id="update_employee_agency" class="form-control">
        </div>
        <div class="form-group">
        	<label for="update_flat_no">Update Employee Mobile</label>
        	<input type="text" name="" id="update_employee_mobile" class="form-control">
        </div>
        <div class="form-group">
        	<label for="update_flat_no">Update Employee Salary</label>
        	<input type="text" name="" id="update_employee_salary" class="form-control">
        </div>
        <div class="form-group">
        	<label for="update_flat_no">Update Employee Yearly Increment</label>
        	<input type="text" name="" id="update_employee_yearly_incr" class="form-control">
        </div>        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="updatedetails()">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<input type="hidden" name="" id="hidden_user_id" value="">
      </div>

    </div>
  </div>
</div>

<div class="modal " id="view_idproof">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-secondary">
        <h4 class="modal-title text-light" id="view_flat_no">Id Proof</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body"  id="iiddddii">
      </div>
            
      <!-- Modal footer -->
      <div class="modal-footer bg-green">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal " id="view_otherdoc">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-secondary">
        <h4 class="modal-title text-light" id="view_flat_no">Document</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div id="ddiiiid"></div>
      <embed src="" type="application/pdf" id="ddiiiidd">
      </div>
      
            
      <!-- Modal footer -->
      <div class="modal-footer bg-green">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript">
$("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
     });
     $('.container-fluid').click(function() {
   $('#wrapper').removeClass("toggled");
});
  $(document).ready(function(){
    readRecords();

  });

 		function readRecords(){
			var readrecord = "readrecord";

			$.ajax({
				url : "../backend_files/employee_edit_details.inc.php",
				type : "post",
				data :{ readrecord:readrecord },
				success:function(data,status){
					$('.tbody').html(data);
          $('#myTable').DataTable();

				}
			});
		}


  function idproof(pp){
      if(!pp){
        var path= '<p class="alert alert-danger">not found</p>';
      }
      else{
  var path= '<embed width="100%" height="100%" src=\'../DB_docs_images/employee/id_proof/'+pp+'\' type="application/pdf">';
      }
  $('#iiddddii').html(path);
  $('#view_idproof').modal('show');
}

function otherdoc(pp){
  if(pp){
  var path='../DB_docs_images/employee/other_doc/'+pp ;
  console.log(path);
  $('#ddiiiidd').attr("src",path);
  $('#view_otherdoc').modal('show');
  }
  else{
    $('#ddiiiid').html("<center><b><p style='font-size:30px; padding-top:50px; color:red'> No File submitted </p></b></center>");
    $('#view_otherdoc').modal('show');
  }
}

    function viewdetails(id){
      $.post("../backend_files/employee_edit_details.inc.php",{
        id:id
      },function(data,status){
          console.log(data);
        var dekhle = JSON.parse(data);
        $('#emp_id').text(dekhle.emp_id);
        $('#emp_name').text(dekhle.emp_name);
        $('#emp_type').text(dekhle.emp_type);
        $('#agency').text(dekhle.agency);
        $('#emp_mob').text(dekhle.emp_mob);
        $('#join_date').text(dekhle.join_date);
        $('#emp_salary').text(dekhle.emp_salary);
        console.log(dekhle.emp_image);
        $('#emp_image').html('<center><img src="../DB_docs_images/employee/emp_image/'+dekhle.emp_image+'" width="200px" height="200px"></center>');
        });
      $('#viewmodal').modal("show");

    }
    function remove(id){
      var conf = confirm("Do you want to delete ?");
      if(conf==true){
        $.post("../backend_files/employee_edit_details.inc.php",{
          delete_employee:id
        },function(data,status){
          console.log(data);
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
		}

		function getdetails(id){
			$('#hidden_user_id').val(id);
			$.post("../backend_files/employee_edit_details.inc.php",{
				id:id
			},function(data,status){
				var user = JSON.parse(data);
        $('#update_employee_id').val(user.emp_id);
        $('#update_employee_name').val(user.emp_name);
        $('#update_employee_agency').val(user.agency);
        $('#update_employee_mobile').val(user.emp_mob);
        $('#update_employee_salary').val(user.emp_salary);
        $('#update_employee_yearly_incr').val(user.emp_yearly_incr);
			});
			$('#update_user_modal').modal("show");

		}

    function updatedetails(){
      var hidden_user_idupd=$('#hidden_user_id').val();
      var emp_id=$('#update_employee_id').val();
      var emp_name=$('#update_employee_name').val();
      var agency=$('#update_employee_agency').val();
      var emp_mob=$('#update_employee_mobile').val();
      var emp_salary=$('#update_employee_salary').val();
      var emp_yearly_incr=$('#update_employee_yearly_incr').val();
      console.log(hidden_user_idupd);
      $.post("../backend_files/employee_edit_details.inc.php",{
        hidden_user_idupd:hidden_user_idupd,
        emp_id: emp_id,
        emp_name :emp_name,
        agency :agency,
        emp_mob : emp_mob,
        emp_salary : emp_salary,
        emp_yearly_incr: emp_yearly_incr
      }, function(data,status){
        var response=JSON.parse(data);
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
    $('.success-close').click(function(){
      $('.success').hide();
    });
    $('.error-close').click(function(){
      $('.error').hide();
    });

  </script>

<?php  include './footer.html';?>