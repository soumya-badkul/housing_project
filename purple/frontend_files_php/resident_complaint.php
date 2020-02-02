<?php include './_navbar_resident.php';?>

<div class="page-header">
<h2  style="color:teal;" class="m-2">Help & Support</h2>
<div class="mt-3 ">
          <p aria-label="breadcrumb">
          <ol class="breadcrumb">
            <?php if($_SESSION['role']=='resident') {?>
            <li class="breadcrumb-item "><a href="resident.php">Homepage</a></li>
          <?php }else if($_SESSION['role']=='shop'){?>
            <li class="breadcrumb-item "><a href="shop.php">Homepage</a></li>
            <?php }else if($_SESSION['role']=='tenant'){?>
              <li class="breadcrumb-item "><a href="tenant.php">Homepage</a></li>
            <?php }?>
            <li class="breadcrumb-item"><a>Help & Support</a></li>
          </ol>
        </p>
        </div>
</div>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
        <div class="mt-1 text-primary" >*Click on row to know the details</div>


<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal"> Ask Help! </button>
</div>
<div class="tbody"></div>
</div>

<!-- The Modal -->
<form enctype="multipart/form-data" id="MyForm1">
<div class="modal" id="myModal">
<div class="modal-dialog">
<div class="modal-content">

  <!-- Modal Header -->
  <div class="modal-header">
    <h4 class="modal-title">Help & Support</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>

  <!-- Modal body -->

  <div class="modal-body">
    <div class="form-group">
        <label for="firstname"> Subject:</label>
        <input type="text" name="subject" id="subject" class="form-control" placeholder="subject">
    </div>
    <div class="form-group">
        <label for="lastname"> Description:</label>
        <textarea name="Description" class="form-control" rows="8" cols="80" id="Description"></textarea>
    </div>
    <div class="custom-input-inline">
        <label for="proof"> attachment:</label><br>
        <input type="file" name="File" id="File1" class="form-control">
    </div>

    <div class="form-group">
        <input type="hidden" name="flat_no" id="flat_no" class="form-control" placeholder="" readonly value="<?php echo $_SESSION['username'] ?>">
    </div>

  <!-- Modal footer -->
  <div class="modal-footer">
      <input type="button" id="btnUpload" value="submit" class="btn btn-success bg-dark" onclick="addComplaint()">
    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
  </div>

</div>
</div>
</div>
</div>
</form>
	<!--display modal-->

	<div class="modal" id="des">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header bg-light">
            <h4 class="modal-title" id="view_flat_no"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">
		  <hr>
            <div class="row">
              <div class="col">
                <b>Date and Time:&nbsp;&nbsp;</b><div class="d-inline " id="dt"></div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col">
                <b>Subject:&nbsp;&nbsp;</b><div class="d-inline " id="sub"></div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col">
                <b>Description:&nbsp;&nbsp;</b><div class="d-inline " id="description"></div>
              </div>
            </div>
            <hr>
            <div class="row">
            <div class="col">
              <b>Attachment:&nbsp;&nbsp;</b><br><center><div class="d-inline " id="proof"></div>
            </div>
          </div>
          <hr>
            <div class="row">
              <div class="col">
                <b>Status:&nbsp;&nbsp;</b><div class="d-inline " id="status"></div>
              </div>
            </div>
          </div>
          
          <hr>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
          </div>
</div>
</div>
</div>
    </div>
</div>

<?php  include './footer.html';?>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>
<script type="text/javascript">


$(document).ready(function(){
	readRecords();
});

 		function readRecords(){
			var readrecord = "readrecord";
			$.ajax({
				url : "../backend_files/add_complaint.inc.php",
				type : "post",
				data :{ readrecord:readrecord },
				success:function(data,status){
					$('.tbody').html(data);
					$('#ttaabbllee').DataTable({
						'language':{
						"search":"Search Complaints :",
						// 'searchPlaceholder':'Search Contact'
						}
					});
				}
			});
		}

  	function addComplaint(){
		         //getting form into Jquery Wrapper Instance to enable JQuery Functions on form                    
				 var form = $("#MyForm1");

				//Serializing all For Input Values (not files!) in an Array Collection so that we can iterate this collection later.
				var params = form.serializeArray();
        console.log(params);
				//Getting Files Collection
				var files = $("#File1")[0].files;

				var ele = $('#File1');  
                var pop = ele.attr("name");  


				//Declaring new Form Data Instance  
				var formData = new FormData();

	//	for (var i = 0; i < files.length; i++) {
                formData.append(pop, files[0]);
           // }
            //Now Looping the parameters for all form input fields and assigning them as Name Value pairs. 
            $(params).each(function (index, element) {
                formData.append(element.name, element.value);
            });
			//console.log(formData);
            //disabling Submit Button so that user cannot press Submit Multiple times
           // var btn = $(this);
            // btn.val("Uploading...");
            // btn.prop("disabled", true);
  		$.ajax({
            url:"../backend_files/add_complaint.inc.php",
  			type:'post',
			contentType:false,
			processData:false,
			cache:false,
  			data: formData,
			success:function(data,status){
                console.log(data);
			readRecords(); 
			var subject = $('#subject').val('');
  			var Description = $('#Description').val('');
			var flat_no = $('#flat_no').val('');
			var file = $('#File1').val('');
			$('#myModal').modal("hide");
			}
			 });
  	}

	  function viewdes(iid){
  $.ajax({
    url:"../backend_files/add_complaint.inc.php",
    type:"post",
    data:{iid:iid},
    success:function(data,status){
		console.log(data);
        var ss=JSON.parse(data);
        $('#view_flat_no').text(ss.flat_no);
        $('#dt').text(ss.date);
        $('#sub').text(ss.subject);
        $('#description').text(ss.description);
        $('#status').text(ss.status);
        $('#proof').html('<img src="../DB_docs_images/complaints/'+ss.flat_no+'/'+ss.proof+'" width="200px" height="200px" alt="no attachment">');
    }
  });
  $('#des').modal("show");
}


  </script>