<?php include './_navbar.php';?>
<div class="page-header">
<h3 class="page-title">Add Shop Tenant Details</h3>
          <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="admin.php">Homepage</a></li>
            <li class="breadcrumb-item"><a href="shop_tabs.php"> Manage Shops</a></li>   
            <li class="breadcrumb-item active"><a>Add shop tenant details</a></li>           
          </ol>
        </nav>
</div>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
          
        <div id="re" class="mt-3 mb-0 alert alert-success success" style='display: none;'><span class="success-text"></span><span style="float:right; cursor: pointer;" class="success-close">&times;</span></div><br>
  <div id="re" class="mt-3 mb-0 alert alert-danger error" style='display: none;'> <span class="error-text"></span><span style="float:right; cursor: pointer;" class="error-close">&times;</span></div><br>

  <div class="row ">
     <div class="col col-xl-10 col-lg-10 col-xs-10">
       <form id="shop_tenant_form" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Shop No:</label>
              <?php
            if($_SESSION['role']=="admin"){
                echo '<input type="text" name="shop_no" class="form-control" id="shop_no" >';
              }
              else if($_SESSION['role']=="shop"){
                echo '<input type="text" name="shop_no" class="form-control" value="'.$_SESSION['username'].'" id="shop_no" readonly>';
              }  
            ?>
            </div>
            </div>

      <div class="form-row"> 
          <h4><strong>Agreement Holder Details</strong></h4>
        </div>
    <div class="form-row">
      <div class="form-group col-md-5">
        <label for="name"> Name </label>
        <input type="name" class="form-control" name="name" placeholder=" ">
      </div>
      </div>

      <div class="form-row">
      <div class="form-group col-md-5">
        <label for="email">Email id </label>
        <input type="email" class="form-control" name="email" placeholder=" ">
      </div>

    <div class="form-group col-md-5">
      <label for="phoneno">Contact number</label>
      <input type="text" class="form-control" name="phoneno" placeholder=" ">
    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-5">
      <label for="dob">Date Of birth</label>
      <input type="date" class="form-control" name="dob" placeholder=" ">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="move_in_date">Move in date</label>
      <input type="date" class="form-control" name="move_in_date" placeholder=" ">
    </div>

    <div class="form-group col-md-4">
      <label for="image">Agreement Holder's Image:</label>
      <input type="file" class="" id="File1" name="image1" required>
    </div>
  </div>
  <div class="form-row">
  <button type="submit" class="btn btn-primary btn-sm text-center" >Add Details</button>
  </div>
</form>
</div>
</div>


    </div>
</div>

<?php  include './footer.html';?>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>

<script>
  $('#shop_tenant_form').on('submit',function(e){
    e.preventDefault();
    var form=$("#shop_tenant_form");
      var params = form.serializeArray();

      var files = $("#File1")[0].files;

      var ele = $('#File1').attr("name");  
     // var pop = ele.attr("name"); 
      var formData = new FormData(); 
      formData.append(ele, files[0]);
      $(params).each(function (index, element) {
                formData.append(element.name, element.value);
            });
      console.log(formData);
  //  console.log($('#shop_tenant_form').serialize());
    $.ajax({
      url:"../backend_files/shop_tenant_add_details.inc.php",
      type:"POST",
      contentType:false,
      processData:false,
      cache:false,
      data: formData,
      // dataType:'json',
      success:function(data, status){
        console.log(data);
        var response=JSON.parse(data);
        if(response.success){
          $('.success-text').text(response.success);
          $('.success').show();
          $('#shop_tenant_form').trigger('reset');
        }
        else{
          $('.error-text').text(response.error);
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
</script>