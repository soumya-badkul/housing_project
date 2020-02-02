<?php include './_navbar.php';
$conn = mysqli_connect( 'localhost','root',"",'house' );
$sql="SELECT flat_no,flat_owner1_name FROM flat_owner_details";
$result1=mysqli_query($conn,$sql);
$sql="SELECT id,name,role FROM society_committee WHERE name!='0'";
$result2=mysqli_query($conn,$sql);
$sql="SELECT shop_no FROM shop_owner_details";
$result3=mysqli_query($conn,$sql);

?>
<style media="screen">
#logo{
  width: 50px;
  height: 50px;

}

.brek a{
  font-size: 16px;
}
@media screen and (max-width: 480px) {

}
</style>

<div class="page-header">
<h2 style="color:teal;">Meetings</h2>
<div >
          <p aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="admin.php">Homepage</a></li>
            <li class="breadcrumb-item"><a>Meetings</a></li>
          </ol>
        </p>
        </div>
</div>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
        <div class="container-fluid">

        <div id="mail" style="display:none;color:green;" class="h3"><img src="dist/png/loading-big.gif" alt="Loading" width="30px;"> Sending Mails Please Wait.....</div>
  <div class="row">
      <button onclick="add_meeting()" class='btn w-25 mx-3 btn-outline-primary'>Add New Meeting</button>
      <button onclick="window.location.href='meeting_records.php'" class='btn w-25 mx-3 btn-outline-info'>View All Meeting</button>
  </div>
  <hr>
  <div class="table-responsive pr-3">
    <table class="table table-hover" id="meetingtable">
      <thead class="bg-secondary text-white">
        <tr>
          <th>Name</th>
          <th>Date</th>
          <th>Attendance</th>
          <th>Minutes</th>
          <th>Close</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>
  <!-- Add Meeting Modal -->
  <div class="modal" id="add_meeting_modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Meeting</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form id='add_meeting_form' method='post'>
              <div class="form-row ">
                <div class="form-group col-12">
                  <label for="name">Meeting Name</label>
                  <input type="text" class="form-control" name='name' required>
                </div>
              </div>
              <div class="form-row ">
                <div class="form-group col-12">
                  <label for="date">Meeting Date</label>
                  <input type="date" class="form-control" name='date' required>
                </div>
              </div>
              <div class="form-row">
              <div class="form-group col-12">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Type of Meeting</label>
                <select class="custom-select mr-sm-2" name='meeting_type'>
                  <option value='general'>General Body</option>
                  <option value="committee">Committee</option>
                </select>
              </div>
              </div>
              <input type="hidden" name='submit_details' value='submit_details'>
              <button type="submit" class="btn btn-success float-right">Add Meeting</button>
            </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Attendance Modal Residents-->
  <div class="modal" id="add_attendance_modal_resident">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Attendance</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form id='add_attendance_form_resident' method='post'>
              <input type="hidden" id='meeting_id_resident' name='meeting_id_resident'>
              <div class="row">
                <div class="col-6">
                    <h5>Flats</h5>
                    <?php
                      while($row=mysqli_fetch_assoc($result1)){
                        echo '<div class="form-row">
                      
                            <div class="form-group col-6">
                              <input class="form-control" type="text" value="'.$row['flat_no'].'" readonly>
                            </div>
                            
                            <div class="form-group col-12">
                              <div class="checkbox">
                                  <label><input type="checkbox" name="'.$row['flat_no'].'">Attended</label>
                              </div>
                            </div>
                  
                      </div>';
                      }
                    ?>
                </div>
                <div class="col-6">
                    <h5>Shops</h5>
                    <?php
                      while($row=mysqli_fetch_assoc($result3)){
                        echo '<div class="form-row">
                      
                            <div class="form-group col-6">
                              <input class="form-control" type="text" value="'.$row['shop_no'].'" readonly>
                            </div>
                            
                            <div class="form-group col-12">
                              <div class="checkbox">
                                  <label><input type="checkbox" name="'.$row['shop_no'].'">Attended</label>
                              </div>
                            </div>
                  
                      </div>';
                      }
                    ?>
                </div>
              </div>
              
        
              <input type="hidden" name='submit_attendance_resident' value='submit_attendance'>
              <button type="submit" class="btn btn-danger">Add Attendance</button>
            </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Attendance Modal Committee-->
  <div class="modal" id="add_attendance_modal_committee">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Attendance</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form id='add_attendance_form_committee' method='post'>
              <input type="hidden" id='meeting_id_committee' name='meeting_id_committee'>
              <?php
                while($row=mysqli_fetch_assoc($result2)){
                  echo '<div class="form-row">
                  <div class="form-group col-3">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" value="'.$row['name'].'" readonly>
                  </div>
                  <div class="form-group col-6">
                    <label for="name">Role</label>
                    <input class="form-control" type="text" value='.$row['role'].' readonly>
                  </div>
                  <div class="form-group col-8">
                    <div class="checkbox">
                        <label><input type="checkbox" name="'.$row['id'].'">Attended</label>
                    </div>
                  </div>
                  </div>';
                }
              ?>
        
              <input type="hidden" name='submit_attendance_committee' value='submit_attendance'>
              <button type="submit" class="btn btn-danger">Add Attendance</button>
            </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Minutes Modal -->
  <div class="modal" id="add_minutes_modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Minutes</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form id='add_minutes_form'>
              <input type="hidden" id='meeting_id_m' name='meeting_id_m'>
              <label for="minutes">Enter The Minutes(Each Points On NEW LINE)</label>
              <textarea name="minutes" class="form-control mb-3" id="minutes" cols="50" rows="10"></textarea>
              <input type="hidden" name='submit_minutes' value='submit_minutes'>
              <button type="submit" class="btn btn-danger">Add Minutes</button>
            </form>
        </div>

      </div>
    </div>
  </div>


    </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>

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
    $('#add_meeting_form').on('submit',function(e){
      e.preventDefault();
      $('#add_meeting_modal').modal('hide');
      $('#mail').show();
      $.ajax({
        url: '../backend_files/meeting.inc.php',
        type: "POST",
        data: $('#add_meeting_form').serialize(),
        success: function(data, status){
          $('#add_meeting_form').trigger('reset');
          console.log(data);
          $('#mail').hide();
          readRecords();
        }
      });
    });

    $('#add_attendance_form_resident').on('submit',function(e){
      e.preventDefault();
      console.log('hello');
      $.ajax({
        url: '../backend_files/meeting.inc.php',
        type: "POST",
        data: $('#add_attendance_form_resident').serialize(),
        success: function(data, status){
          console.log(data, status);
          $('#add_attendance_modal_resident').modal('hide');
          $('#add_attendance_form_resident').trigger('reset');
          readRecords();
        }
      });
    });

    $('#add_attendance_form_committee').on('submit',function(e){
      e.preventDefault();
      $.ajax({
        url: '../backend_files/meeting.inc.php',
        type: "POST",
        data: $('#add_attendance_form_committee').serialize(),
        success: function(data, status){
          console.log(data, status);
          $('#add_attendance_modal_committee').modal('hide');
          $('#add_attendance_form_committee').trigger('reset');
          readRecords();
        }
      });
    });

    $('#add_minutes_form').on('submit',function(e){
      e.preventDefault();
      $('#add_minutes_modal').modal('hide');
      $('#mail').show();
      $.ajax({
        url: '../backend_files/meeting.inc.php',
        type: "POST",
        data: $('#add_minutes_form').serialize(),
        success: function(data, status){
          console.log(data);
          $('#add_minutes_form').trigger('reset');          
          $('#mail').hide();
          readRecords();
        }
      });
    });

 		function readRecords(){
			var readrecord = "readrecord";
			$.ajax({
				url : "../backend_files/meeting.inc.php",
				type : "post",
				data :{ readrecord:readrecord },
				success:function(data,status){
					$('tbody').html(data);
					$('#meetingtable').DataTable();

				}
			});
		}

    function check_attendance(a,id,meeting_type){
      console.log(a,id,meeting_type);
      if(a){
        console.log('attendance is disabled');
      }
      else{
        if(meeting_type=='general'){
          $('#meeting_id_resident').val(id);
          $('#add_attendance_modal_resident').modal('show');
        }
        else{
          $('#meeting_id_committee').val(id);
          $('#add_attendance_modal_committee').modal('show');
        }
      }
    }
    function check_minutes(a, id){
      $('#meeting_id_m').val(id);
      console.log($('#meeting_id_m').val(), a);
      if(a){
        console.log('Minutes is disabled');
      }
      else{
        $('#add_minutes_modal').modal('show');
      }
    }
    function close_meeting(id){
      console.log(id);
      $.post("../backend_files/meeting.inc.php",{
				id:id
			},function(data,status){
        console.log(data);
        readRecords();
      });
    }
    function add_meeting(){
        $('#add_meeting_modal').modal('show');
    }
    $("#success-close").on('click',function(e) {
        e.preventDefault();
        $('#success').hide();
    });
    $("#error-close").on('click',function(e) {
        e.preventDefault();
        $('#error').hide();
    });
  </script>


<?php  include './footer.html';?>