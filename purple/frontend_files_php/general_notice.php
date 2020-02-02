<?php include './_navbar.php';?>

<style>
 .modal-backdrop {
	background-color: rgba(50,50,50,.5);
}
	tr:hover {
		cursor: pointer;
	}
</style>

<div class="page-header">
<h2 style="color:teal;" class="mt-3">General Notices</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="admin.php" id="dashboardbox1">Homepage</a></li>
			<!-- <li class="breadcrumb-item"><a href="discussionstabs.php">All Forums</a></li> -->
			<li class="breadcrumb-item active" aria-current="page">General Notices</li>
		</ol>
</div>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
        <div class="container-fluid">

	<div class="d-flex justify-content-center">
		<button type="button" class="btn pr-5 pl-5 btn-info" data-toggle="modal" data-target="#myModal"> Add New Notice
		</button>
	</div>
    <br>
	<div style="color:green;display:none;" class="h3" id="mail"><img src="dist/png/loading-big.gif" alt="Loading"
			width="30px;"> Sending Mails Please Wait ... This might take a few minutes</div>
	<table class="table table-hover table-striped table-bordered table-white table-responsive" id="mydata">
		<thead class="bg-secondary text-white">
			<tr class=" bg-dark text-white sticky-header">
				<th>No.</th>
				<th style="width:10%">Sent to</th>
				<th>Subject</th>
				<th>Description</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>
</div>

<div class="modal modal-backdrop" id="notmod">
	<div class="modal-dialog ">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header" style="background-color:rgb(200,200,200);">
				<h4 class="modal-title">Notice Details</h4>
				<button type="button" class="close cclose" >&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body" style="background-color:rgb(239,239,239);">
				<div class="notdiv"></div>
			</div>
		</div>
	</div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Notice</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<!-- <div class="form-group">
        	<label for="firstname"> To :</label>
        	<input type="text" name="" id="receiver" class="form-control" placeholder="All  /  Flat-no. " style="text-transform:uppercase" >
        </div> -->
				<div class="form-group">
					<label for="firstname"> Subject:</label>
					<input type="text" name="" id="subject" class="form-control" placeholder="subject">
				</div>
				<div class="form-group">
					<label for="lastname"> Description:</label>
					<textarea name="Description" class="form-control" rows="8" cols="80" id="Description"></textarea>
				</div>
				<div class="form-group custom-input-space has-feedback">


					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal"
							onclick="addRecord()">Save</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>




    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<!-- Datatable -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		readRecords();
	});
	$("#menu-toggle").click(function (e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
	$('.container-fluid').click(function () {
		$('#wrapper').removeClass("toggled");
	});
	$('.cclose').click(function(){
		$('#notmod').hide();
	});
	function readRecords() {
		var readrecord = "readrecord";
		$.ajax({
			url: "../backend_files/general_notice.inc.php",
			type: "post",
			data: {
				readrecord: readrecord
			},
			success: function (data, status) {
				$('tbody').html(data);
				$('#mydata').DataTable();

			}
		});
	}

	function alldet(a) {
		$('.notdiv').html('<p class="h3 text-primary">Loading Data Please wait..</p>');
		$.ajax({
			url: "../backend_files/general_notice.inc.php",
			type: "post",
			data: {highlight: a},
			success: function (data, status) {
				$('.notdiv').html(data);
				$('#notmod').show();

			}
		});
	}

	function addRecord() {
		var subject = $('#subject').val();
		var Description = $('#Description').val();
		$('#mail').show();
		$.ajax({
			url: "../backend_files/general_notice.inc.php",
			type: 'post',
			data: {
				subject: subject,
				Description: Description,
			},
			success: function (data, status) {
				console.log(data);
				$('#mail').hide();
				$('#subject').val('');
				$('#Description').val('');
				readRecords();
			}
		});
	}
</script>

<?php  include './footer.html';?>