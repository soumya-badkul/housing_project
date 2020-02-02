<?php include './_navbar.php';
  $conn = mysqli_connect( 'localhost','root',"",'house' );
  $sql="SELECT flat_no,flat_owner1_name FROM flat_owner_details";
  $result=mysqli_query($conn,$sql);
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
<h2  style="color:teal;" class="mt-3">Meeting Records</h2><hr>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin.php" id="dashboardbox1">Homepage</a></li>
      <li class="breadcrumb-item active" aria-current="page">Meeting Records</li>
    </ol>
  </nav>
</div>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
        <div class="container">

  <div class="row mt-5" id="meetings"><div class="col-12 all_meetings"></div></div>
  
  <div class="row" id='result' style='display: none;'>
    <button class="btn btn-danger mt-2 ml-3" onclick="close_result()">Close</button>
    <div class="col-12 mt-3">
      <ul class="list-group">
        <li class="list-group-item"><b>Meeting Name: </b><span id='meeting_name'></span></li>
        <li class="list-group-item"><b>Meeting type: </b><span id='meeting_type'></span></li>
      </ul>
    </div>
    <hr>
    <h5 class='col-12 mt-3'>Minutes:</h5>
    <div class="col-12">
        <ul class="list-group" id='minutes'>
            
        </ul>
    </div>
    <hr>
    <h5 class='col-12 mt-3'>Attendance:</h5>
    <div class="col-12">
        <div class="attendance"></div>
    </div>
  </div>
</div>

    </div>
</div>


<?php  include './footer.html';?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
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

    function readRecords(){
      $.post("../backend_files/meeting_records.inc.php",{
				readRecord:'readRecord'
			},function(data,status){
        $('.all_meetings').html(data);
        $('#meetings').show();
        $('#myMeetings').DataTable();
      });
    }
    function view(id){
      $.post("../backend_files/meeting_records.inc.php",{
				get_details:'get_details',
        id: id
			},function(data,status){
                console.log(data);
        var response=JSON.parse(data);
        $('#meeting_id').text(response.id);
        $('#meeting_name').text(response.name);
        $('.attendance').html(response.data);
        $('#minutes').html(response.minutes);
        $('#meeting_type').html(response.type);
        $('#result').show();
        $('#meetings').hide();
        $('#myTable').DataTable();
      });
    }
    function close_result(){
      $('#result').hide();
      $('#meetings').show();
      readRecords();
    }
  </script>

