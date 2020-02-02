<?php include './_navbar_resident.php';?>

<style>
input {
  border:none;
  width:65%;
  border-bottom:1px solid #757575;}
input:focus{ outline:none; }
input::placeholder{ font-style: italic; }
</style>

<div class="page-header">
<h2 class="m">Amenities</h2>
        <?php if($_SESSION['role']=='admin'){
          echo '
            <div class="row">
            <div class="col-12 col-md-8">
            
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Homepage</a></li>
            <li class="breadcrumb-item active" aria-current="page">Amenities</li>
            </ol>
            </nav>
            </div>
            <div class="col-12 col-md-4">
            <p id="adme" class="btn btn-outline-primary btn-lg ml-3 mr-3 ">Add New Amenity</p>
            
            </div>
            </div>
          <div class="row addo pl-5 pr-5" style="display:none;">
              <div class="col">
                  <input type="text" id="newame" Placeholder="Add Input here">
                  <button class="btn ml-3 btn-sm border border-warning float-right"style="width:15%" id="canbtn">Cancel</button>
                  <button class="btn ml-3 btn-sm border border-primary float-right"style="width:15%" id="newbtn">Add</button>
              </div>
          </div>';
        }
        else{
          echo'<nav aria-label="breadcrumb">
          <ol class="breadcrumb">';
          if($_SESSION['role']=='resident'){ echo '<li class="breadcrumb-item"><a href="resident.php">Homepage</a></li>';}
          if($_SESSION['role']=='shop'){ echo '<li class="breadcrumb-item"><a href="shop.php">Homepage</a></li>';}
          if($_SESSION['role']=='tenant'){ echo '<li class="breadcrumb-item"><a href="tenant.php">Homepage</a></li>';}
          
          echo '<li class="breadcrumb-item active" aria-current="page">Amenities</li>
          </ol>
      </nav>';
        }
        
        ?>
      
   
</div>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
        <div class="container-fluid">

    <div class="row">
        <div class="col">
        <div style="width:100%;display:none;" id="del"><p class="alert alert-success">Removed Successfully</div>
        <div style="width:100%;display:none;" id="add"><p class="alert alert-success">Added Successfully</div>
            <div id="box">
              <p class="text-center">Loading Please Wait..</p>
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
$("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
     });
     $('.container-fluid').click(function() {
   $('#wrapper').removeClass("toggled");
});
  $('document').ready(function(){
    readamenity();
    $('#adme').click(function(){
        $('#adme').hide();
        $('.addo').slideDown(300);
    });
    $('#canbtn').click(function(){
        $('#adme').show();
        $('.addo').slideUp(300);
    });
    $('#newbtn').click(function(){
       var newame = $('#newame').val();
       if(newame == ''){
      $('#newame').css('border','1px solid red');
    }
    else{
      $.ajax({
      url:'../backend_files/amenities.inc.php',
      type:"post",
      data:{ newame:newame},
      success:function(data){
        $("#add").show().delay(3000).slideUp(300);
        readamenity();
        $('#adme').show();
        $('.addo').slideUp(300);
        $('#newame').val('');
      }
    });
    }
    });
  });

function readamenity(){
    var readame = 'readame';
    $.ajax({
      url:'../backend_files/amenities.inc.php',
      type:"post",
      data:{ readame:readame},
      success:function(data){
        $('#box').html(data);
      }
    });
  }
  function delame(aid){
    var conf = confirm("Are you sure?");
    if(conf == true){
    $.post("../backend_files/amenities.inc.php",
    {aid:aid},
    function(data,status){
      $('#del').show();
      $("#del").show().delay(3000).slideUp(300);
      readamenity();
   });
 }
}
</script>