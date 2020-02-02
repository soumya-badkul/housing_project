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
    <h3 class="page-title ">Manage Flats </h3>
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Flats</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">        
    <div class="all_meetings"></div></div>
  
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
      $.post("../backend_files/meetings_view.inc.php",{
				readRecord:'readRecord'
			},function(data,status){
        $('.all_meetings').html(data);
        $('#myMeetings').DataTable();
      });
    }
    function view(id){
      $.post("../backend_files/meetings_view.inc.php",{
				get_details:'get_details',
        id: id
			},function(data,status){
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