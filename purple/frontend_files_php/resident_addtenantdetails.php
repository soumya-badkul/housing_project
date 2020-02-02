<?php include './_navbar_resident.php';
error_reporting(0);
?>

<div class="page-header">
<h2 class="ml-3">Add Tenant Details:</h2>
  <div class="">
          <p aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item "><a href="resident.php">Homepage</a></li>
			<li class="breadcrumb-item ">Add Payment Intimation</li>
          </ol>
        </p>
        </div>
</div>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
        <div class="container-fluid">
  <div id="re" class="mt-3 mb-0 alert alert-success success" style='display: none;'><span class="success-text"></span><span style="float:right; cursor: pointer;" class="success-close">&times;</span></div><br>
  <div id="re" class="mt-3 mb-0 alert alert-danger error" style='display: none;'> <span class="error-text"></span><span style="float:right; cursor: pointer;" class="error-close">&times;</span></div><br>
<!-- formstarts -->

  <div class="row ">
    <div class="col col-xl-10 col-lg-10 col-xs-10">
      <form id='tenant-form' enctype="multipart/form-data">        
        <div class="row">
          <h4 class="ml-3">Agreement Holder's:</h4>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="hidden" name="flat_no" id="flat_no">
            <label for="inputEmail4">Name:</label>
            <input type="text" name='agreement_holder_name' class="form-control" id="inputEmail4" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">EmailID:</label>
            <input type="email" name='agreement_holder_email' class="form-control" id="inputEmail4" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Contact</label>
            <input type="text" name='agreement_holder_mobile' class="form-control" id="inputEmail4" required>
          </div>
          <!-- <div class="form-group col-md-6">
            <label for="inputEmail4">Occupation</label>
            <input type="text" class="form-control" id="inputEmail4" required>
          </div> -->
          <div class="form-group col-md-6">
            <label for="inputEmail4">Date of birth</label>
            <input type="date" name='agreement_holder_dob' class="form-control" id="inputEmail4" required>
          </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Number of members</label>
            <input type="number" name='tenant_count_of_members' class="form-control" id="inputEmail4" min=1>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Name of member 1</label>
            <input type="text" class="form-control" id="inputEmail4">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Name of member 2</label>
            <input type="text" class="form-control" id="inputEmail4">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Name of member 3</label>
            <input type="text" class="form-control" id="inputEmail4">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Name of member 4</label>
            <input type="text" class="form-control" id="inputEmail4">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Move in date</label>
            <input type="date" name='tenant_move_in_date' class="form-control" id="inputEmail4" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Move out date</label>
            <input type="date" name='tenant_move_out_date' class="form-control" id="inputEmail4">
          </div>
        </div>


        <hr>
    <div class="text-danger"><h6>Photo size should be less than 2MB and in jpg,jpeg,png extension</h6></div>
    <div class="form-row">
    <div class="form-group col-md-4">
      <label >tenant's image</label>
      <input class="form-control-file" type="file" name="image1" id="File1" required>
    </div> 
    </div>
    <hr>



        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputEmail4">Maid name</label>
            <input type="text" name='maid_name' class="form-control" id="inputEmail4">
          </div>
        </div>
        <div class="form-group">
          <div class="col-auto my-1">
            <input type="hidden" name='submit_details' value='submit_details'>
          </div>
        </div>
        <button type="submit" class="btn btn-primary text-center" name="addtenant" value="addtenant">Add Details</button>
      </form>
    </div> 
  </div> 

</div>
    </div>
</div>

<?php  include './footer.html';?>
    <script>
    $(document).ready(function(){
        $('#flat_no').val('<?php echo $_SESSION['username']?>');
        console.log($('#flat_no').val());
    });
    $('#tenant-form').on('submit',function(e){
      e.preventDefault();
      var form=$("#tenant-form");
      var params = form.serializeArray();

      var files = $("#File1")[0].files;

      var ele = $('#File1');  
      var pop = ele.attr("name"); 
      var formData = new FormData(); 
      formData.append(pop, files[0]);
      $(params).each(function (index, element) {
                formData.append(element.name, element.value);
            });
      console.log(formData);
      $.ajax({
        url: '../backend_files/add_flat_tenant_details.inc.php',
        type: "POST",
        contentType:false,
        processData:false,
        cache:false,
        data: formData,
        success: function(data, status){
          console.log(data);
          var response=JSON.parse(data);
          if(response.success){
            $('.success-text').text(response.success);
            $('.success').show();
            $('#tenant-form').trigger("reset");
          }
          else{
            $('.error-text').text(response.error);
            alert(response.error);
            $('.error').show();
          }
        }
      });
    });
    $('.success-close').click(function(){
      $('.success').hide();
    });
    $('.error-close').click(function(){
      $('.error').hide();
    });
    $("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
     });
     $('.container-fluid').click(function() {
   $('#wrapper').removeClass("toggled");
});
   </script>