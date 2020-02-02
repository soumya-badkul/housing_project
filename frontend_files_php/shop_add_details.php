<?php include './_navbar.php';?>

<div class="page-header">
<h3 class="page-title">Shop Details</h3>
          <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="admin.php">Homepage</a></li>
            <li class="breadcrumb-item"><a href="shop_tabs.php"> Manage Shops</a></li>   
            <li class="breadcrumb-item active"><a>Shop details</a></li>           
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
      <form id='shop-details' method='POST'>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Shop No:</label>
            <input type="text" name='shop_no' class="form-control" id="inputEmail4" >
          </div>
          
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Shop Dimensions:</label>
            <input type="number" name='shop_dimensions' class="form-control" id="inputEmail4" placeholder="in sqft.">
          </div>
          
        </div>
        
        <div class="form-row">
          <div class="form-group">
            <div class="col-auto my-1">
          </div>
          <input type="hidden" name='submit_details' value='submit_details'>
          <button type="submit" class="btn btn-primary text-center">Add Details</button>
        </div>
        
      </form>
    </div>
  </div>
</div>

    </div>
</div>

<?php  include './footer.html';?>

<script>
    
    $('#shop-details').on('submit',function(e){
      e.preventDefault();
      $.ajax({
        url : "../backend_files/shop_add_details.inc.php",
        type : "POST",
        data :$('#shop-details').serializeArray(),
        success:function(data,status){
          var response=JSON.parse(data);
          if(response.success){
            $('.success-text').text(response.success);
            $('.success').show();
            $('#shop-details').trigger('reset');
          }
          else{
            $('.error-text').text(response.error);
            $('.error').show();
          }
        }
            });
    })

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
