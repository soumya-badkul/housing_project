<?php include './_navbar.php';?>

<style media="screen">
#logo{
  width: 50px;
  height: 50px;

}
.bbg:hover{
  background-color:#eee;
}
.brek a{
  font-size: 16px;
}
@media screen and (max-width: 480px) {

  .njo{
    display:none;
  }
#sidebar-wrapper{
  display: none;
}/* top:70px;
   overflow-y: scroll;
   z-index: 1000;
   position: fixed;
   height: 100%;
   overflow-y: auto;
}  */
}
</style>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
        <div class="container-fluid">
<h4 class="mb-3">Comittee Members</h4>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin.php" id="dashboardbox1">Homepage</a></li>
      <li class="breadcrumb-item active" aria-current="page">Society Committee</li>
    </ol>
  </nav>
  <div id="success"  style="display:none;" class="alert alert-success">Update Successfull</div>
  <div id="eror"  style="display:none;" class="alert alert-danger">Error While Updating</div>
  <div id="members">

  </div>
  
  <div class="modal" id="view_details_modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div> 

        <!-- Modal body -->
       <div class="modal-body view_details">
          
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>


  <div class="modal" id="edit_details_modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div> 

        <!-- Modal body -->
       <div class="modal-body edit_details_body">
          <form id="edit_details_form">
            <div class="form-row">          
                <input type="hidden" id="edit_role" name="edit_role">
                <label >Name:</label>
                <input type="text" class="form-control" name="name" id="edit_name">
              </div>
              <div class="form-row">          
                <label >Flat No:</label>
                <input type="text" class="form-control" name="flat_no" id="edit_flat_no">
            </div>
            
            <div class="form-row">          
                <label >Phone no.:</label>
                <input type="text" class="form-control" name="mob_no" id="edit_mob_no">
            </div>
              <div class="form-row">
                <label >Email:</label>
                <input type="text" class="form-control" name="email" id="edit_email">
            </div>
            <div class="form-row">          
                <label >Join Date:</label>
                <input type="text" class="form-control" name="join_date" id="edit_join_date">
            </div>
            <div class="form-row">
              <input type="hidden" name="edit_details" value="edit">
              <button type="submit" class="m-1 btn-block btn btn-success">Edit</button>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>


  <div class="modal" id="update_details_modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div> 

        <!-- Modal body -->
        <div class="modal-body">
          <form id="update_details_form">
            <div class="form-row">
              <div class="form-group">
                <label >Flat No:</label>
                <input type="text" class="form-control" autocomplete = "off" name="flat_no" id="suggest_flat">
                <div id="flats" style="max-height:300px;overflow-y:scroll;border:1px solid gray"></div>
              </div>
              <div class="form-group ml-3">
                <input type="hidden" id="update_role" name="update_role">
                <!-- <label >Name:</label>
                <input type="text" class="form-control" autocomplete = "off" name="name" id="suggest_it">
                <div id="names" class= "border p-2 "></div> -->
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label >Join Date:</label>
                <input type="date" class="form-control" name="join_date" max = "<?php echo date('Y-m-d'); ?>" >
              </div>
            </div>
            <div class="form-row">
              <input type="hidden" name="update_details" value="update">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

</div>

    </div>
</div>

<?php  include './footer.html';?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    readRecords();
  });
  function readRecords(){
    $.post("../backend_files/committee.inc.php",{
        readRecord: 'readRecord'
    },function(data,status){
      $('#members').html(data);
    });
	}
  function get(a){
    console.log(a);
    $.ajax({
      url: '../backend_files/committee.inc.php',
      type: "POST",
      data: {view_details: "view_Details", role: a},
      success: function(data){
        $('.view_details').html(data);
        $('#view_details_modal').modal('show');
      }
    });
  }
  function delte(a){
    var conf = confirm('Do you want to delete ?');
    if(conf){
    $.ajax({
      url: '../backend_files/committee.inc.php',
      type: "POST",
      data: {deletecomm: "view_Details", role: a},
      success: function(data){
        console.log(data);
        $('#success').slideDown('fast');
        $('#success').delay(5000).slideUp('fast');
        readRecords();
      }
    });
  }
  }
  
  function update(a){
    $('#update_details_modal').modal('show');
    $('#update_role').val(a);
    //----------------------------------------------

    // --------------Suggestions Code for flats-----
    $('#suggest_flat').keyup(function(){
			var flat = $(this).val();
			if(flat != ''){
				$.ajax({
					url:"../backend_files/committee.inc.php",
					method: "POST",
					data:{flat:flat},
					success:function(data){
						$('#flats').fadeIn();
						$('#flats').html(data);
					}
				});
			}
		});
		$(document).on('click','li', function(){
			$('#suggest_flat').val($(this).text());
			$('#flats').fadeOut();
		});
    //--------------------------------------------
  }

  $('#update_details_form').on('submit',function(e){
    e.preventDefault();
    $.ajax({
      url: '../backend_files/committee.inc.php',
      type: "POST",
      data: $('#update_details_form').serialize(),
      success: function(data){
        console.log(data);
        $('#update_details_modal').modal('hide');
        readRecords();
      }
    });
  });


</script>