<?php include './_navbar.php';
error_reporting(E_PARSE & ~E_NOTICE);
?>

<div class="page-header">
        <h3 class="page-title"> Add Tenant Details </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                <li class="breadcrumb-item"><a href="flat_tabs.php">Manage Flats</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Tenant Details</li>
            </ol>
        </nav>
    </div>
<div class="card">
    <div class="card-body">
    <div id="re" class="mt-3 mb-0 alert alert-success success" style='display: none;'><span class="success-text"></span><span style="float:right; cursor: pointer;" class="success-close">&times;</span></div>
  <div id="re" class="mt-3 mb-0 alert alert-danger error" style='display: none;'> <span class="error-text"></span><span style="float:right; cursor: pointer;" class="error-close">&times;</span></div>

        <div class="row ">
            <div class="col col-xl-10 col-lg-10 col-xs-10">
                <form id="tenant-form" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for='flat_no'>Flat No:</label>
                            <input type="text" name='flat_no' class="form-control" id='flat_no' required pattern="[A]\d{3,4}|[B]\d{3,4}" oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' :'invalid format');" placeholder="Ex:A301">
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="ml-3">Agreement Holder's:</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for='agreement_holder_name'>Name:</label>
                            <input type="text" name='agreement_holder_name' class="form-control"
                                id='agreement_holder_name' pattern="[a-zA-Z\s]{5,40}" required oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' :'invalid name')">
                        </div>
                        <div class="form-group col-md-6">
                            <label for='agreement_holder_email'>EmailID:</label>
                            <input type="email" name='agreement_holder_email' class="form-control"
                                id='agreement_holder_email' required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for='agreement_holder_mobile'>Contact</label>
                            <!-- <input type="number" name='agreement_holder_mobile' class="form-control"
                                id='agreement_holder_mobile' required> -->
                                <input type="text" pattern="[+]\d{2}[0-9]{10}|[0-9]{10}" required oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' :'invalid contact')"  name='agreement_holder_mobile' class="form-control"
                                id='agreement_holder_mobile'>
                                
                        </div>
                        <div class="form-group col-md-4">
                            <label for="agreement_holder_dob">Date of birth</label>
                            <input type="date" name='agreement_holder_dob' class="form-control"
                                id="agreement_holder_dob" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tenant_count_of_members">Number of members</label>
                            <input type="number" name='tenant_count_of_members' class="form-control"
                                id="tenant_count_of_members" min=1>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="member1_name">Name of member 1</label>
                            <input type="text" class="form-control" id="member1_name" name="member1_name"  pattern="[a-zA-Z\s]{5,40}" required oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' :'invalid name')">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="member2_name">Name of member 2</label>
                            <input type="text" class="form-control" id="member2_name" name="member2_name"  pattern="[a-zA-Z\s]{5,40}" oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' :'invalid name')">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="member3_name">Name of member 3</label>
                            <input type="text" class="form-control" id="member3_name" name="member3_name" pattern="[a-zA-Z\s]{5,40}" oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' :'invalid name')">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="member4_name">Name of member 4</label>
                            <input type="text" class="form-control" id="member4_name" name="member4_name" pattern="[a-zA-Z\s]{5,40}"oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' :'invalid name')">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for='tenant_move_in_date'>Move in date</label>
                            <input type="date" name='tenant_move_in_date' class="form-control" id='tenant_move_in_date'
                                required>
                        </div>

                    </div>
                    <hr>
                    <div class="text-danger">
                        <h6></h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>tenant's image</label>
                            <input class="form-control-file" type="file" name="image1" id="File1" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-auto my-1">
                            <input type="hidden" name='submit_details' value='submit_details'>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-center" name="addtenant" value="addtenant">Add
                        Details</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php  include './footer.html';?>
<script>
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
        url: '../backend_files/tenant_add_details.inc.php',
        type: "POST",
        contentType:false,
        processData:false,
        cache:false,
        data: formData,
        success: function(data, status){
            console.log(data);
          var response= JSON.parse(data);
      
          if(response.success){
            $('.success-text').text(response.success);
            $('.success').show();
            $('#tenant-form').trigger("reset");
          }
          else{
            $('.error-text').text(response.error);
            $('.error').show();
            $('html, body').animate({ scrollTop: $("#toppp").offset().top },100);
          }
        }
      });
    }
   );
    $('.success-close').click(function(){
      $('.success').hide();
    });
    $('.error-close').click(function(){
      $('.error').hide();
    });
   </script>
