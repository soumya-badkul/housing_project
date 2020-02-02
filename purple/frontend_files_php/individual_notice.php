<?php include './_navbar.php';?>

<style>
 .modal-backdrop{
	background-color: rgba(5,5,5,0.5);
}
	tr:hover {
		cursor: pointer;
	}
</style>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
        <div class="container-fluid">
	<h2 style="color:teal;" class="mt-3">Individual Notices</h2>
	<hr>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="admin.php" id="dashboardbox1">Homepage</a></li>
			<li class="breadcrumb-item"><a href="discussionstabs.php">All Forums</a></li>
			<li class="breadcrumb-item active" aria-current="page">Individual Notices</li>
		</ol>
	</nav>
	<div style="color:green;display:none;" class="h3" id="mail"><img src="dist/png/loading-big.gif" alt="Loading"
			width="30px;"> Sending Mails Please Wait ...</div>
	<div class="d-flex justify-content-center">
		<button type="button" class="btn pr-5 pl-5 btn-info" data-toggle="modal" data-target="#myModal"> Add New Notice
		</button>
	</div>
	<table class="table table-hover table-bordered " id="mydata">
		<thead class="bg-secondary text-white">
			<tr>
				<th>No.</th>
				<th>Receiver</th>
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
			<div class="modal-footer" style="background-color:rgb(239,239,239);">
			<button type="button" class="btn btn-outline-danger cclose w-100">Close</button>
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
				<div class="form-group">
					<label for="">Send Notice To : <small>(Add Flat/Shop No. on Separate Lines)</small> </label>
					<textarea cols='20' rows="5" class="form-control" id="receiver" name="receiver"></textarea>
				</div>
				<div class="form-group">
					<label for=""> Subject:</label>
					<input type="text" name="" id="subject" class="form-control" placeholder="subject">
				</div>
				<div class="form-group">
					<label for="lastname"> Description:</label>
					<textarea name="Description" class="form-control" rows="8" cols="80" id="description"></textarea>
				</div>
				<div class="form-group custom-input-space has-feedback">


					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"
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

	<?php  include './footer.html';?>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>
 
<script>


	$('.cclose').click(function(){
		$('#notmod').hide();
	});

	function readRecords() {
		var readrecord = "readrecord";
		$.ajax({
			url: "../backend_files/individual_notice.inc.php",
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
			url: "../backend_files/individual_notice.inc.php",
			type: "post",
			data: {highlight: a},
			success: function (data, status) {
				$('.notdiv').html(data);
				$('#notmod').show();
			}
		});
	}

	function addRecord() {
		var receiver = $('#receiver').val();
		var subject = $('#subject').val();
		var description = $('#description').val();
		console.log(receiver, subject, description);
		$('#myModal').modal('hide');
		$('#mail').show();
		$.ajax({
			url: "../backend_files/individual_notice.inc.php",
			type: 'post',
			data: {
				receiver: receiver,
				subject: subject,
				description: description,
			},
			success: function (data, status) {
				$('#mail').hide();
				console.log(data);
				readRecords();
			}
		});
	}
</script>
