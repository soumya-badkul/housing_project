<?php include './_navbar.php';?>

<style>
@import url("https://cdnjs.cloudflare.com/ajax/libs/tag-editor/1.0.20/jquery.tag-editor.css");
 .modal-backdrop{
	background-color: rgba(5,5,5,0.5);
}
	tr:hover {
		cursor: pointer;
	}
</style>
<div class="page-header">
<h2 style="color:teal;" class="mt-3">Individual Notices</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="admin.php" id="dashboardbox1">Homepage</a></li>
			<li class="breadcrumb-item"><a href="discussionstabs.php">All Forums</a></li>
			<li class="breadcrumb-item active" aria-current="page">Individual Notices</li>
		</ol>
</div>
<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
	</nav>
	<!-- <div style="color:green;display:none;" class="h3" id="mail"><img src="../assets/image/loading-big.gif" alt="Loading"
			width="30px;"> Sending Mails Please Wait ...</div> -->
	<div class="d-flex justify-content-center">
		<button type="button" class="btn pr-5 pl-5 btn-info" data-toggle="modal"  data-target="#myModal"> Add New Notice
		</button>
	</div>
	<table class="table table-hover table-bordered " id="mydata">
		<thead>
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
					<label for="">Send Notice To : </label>
					<input id="receiver"/>
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
<div class="modal" id="mail">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-white">
			<div class="modal-body p-5">
			<div style="color:green;" class="h3"><img src="../assets/image/loading-big.gif" alt="Loading"
			width="30px;"> Sending Mails Please Wait ...</div>
			</div>
		</div>

	</div>
</div>

</div>
</div>

	<?php  include './footer.html';?>
	
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/caret/1.3.4/jquery.caret.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tag-editor/1.0.20/jquery.tag-editor.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>
<script>
<?php
$conn = mysqli_connect('localhost', 'root', "", 'house');
$suggestions = array();
$flats = "	SELECT `flat_no` FROM `flat_owner_details` 
UNION
SELECT `shop_no`
FROM `shop_owner_details`
";
$res = mysqli_query($conn, $flats);
while ($row = mysqli_fetch_array($res)) {
    array_push($suggestions, strval($row['flat_no']));
} ?>
var flats = [ <?php echo '"'.implode('","', $suggestions).'"' ?>
];

$('#receiver').tagEditor({

    autocomplete: {
        delay: 0, // show suggestions immediately
        position: {
            collision: 'flip'
        }, // automatic menu position up/down
        source: flats,
    },
    forceLowercase: false,
    placeholder: 'Enter Flat Numbers'
});


$('.cclose').click(function () {
    $('#notmod').hide();
});

$(document).ready(function () {
    readRecords();
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
        data: {
            highlight: a
        },
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
    $('#mail').modal({
      backdrop: 'static',
      keyboard: false
   });
    $.ajax({
        url: "../backend_files/individual_notice.inc.php",
        type: 'post',
        data: {
            receiver: receiver,
            subject: subject,
            description: description,
        },
        success: function (data, status) {
            $('#mail').modal('hide');
            console.log(data);
            readRecords();
        }
    });
} 
</script>