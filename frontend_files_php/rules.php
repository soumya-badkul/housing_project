<?php    session_start();
    error_reporting(E_PARSE & ~E_NOTICE);
if($_SESSION['role']=='admin'){ 
        include './_navbar.php';
        echo '<div class="page-header">
        <h3 class="page-title ">Rules & Regulations </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rules & Regulations</li>
            </ol>
    </div>';
    }
    else if($_SESSION['role']=='shop'){
        include './_navbar_shop.php'; 
        echo '<div class="page-header">
        <h3 class="page-title ">Rules & Regulations </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="shop.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rules & Regulations</li>
            </ol>
    </div>';       
    }
    else if($_SESSION['role']=='resident'){
        include './_navbar_resident.php'; 
        echo '<div class="page-header">
        <h3 class="page-title ">Rules & Regulations </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="resident.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rules & Regulations</li>
            </ol>
    </div>';               
    }
    else if($_SESSION['role']=='tenant'){
        include './_navbar.php'; 
        echo '<div class="page-header">
        <h3 class="page-title ">Rules & Regulations </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="tenant.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rules & Regulations</li>
            </ol>
    </div>';               
    }
    ?>
    
<style>
.form-control {
  width:65%;}
</style>
    <div class="card">
        <div class="card-body"> 
        <div style="width:100%;display:none;" id="del"><p class="alert alert-success">Removed Successfully</div>
        <div style="width:100%;display:none;" id="add"><p class="alert alert-success">Added Successfully</div>
           
    <?php if($_SESSION['role']=='admin'){
          echo '<div class="row">
          <div class="col-12 col-md-8 px-5 py-3">
              <h3>All Rules</h3>
          </div>
          <div class="col-12 col-md-4">    
          <p id="adme" class="btn btn-outline-primary btn-lg ml-3 mr-3 float-right">Add New Rule</p>
          </div>
          </div>
              
          <div class="row addo " style="display:none;">
              <div class="col">
              <button class="btn ml-3 border border-warning float-right" id="canbtn">Cancel</button>
              <button class="btn ml-3 border border-primary float-right" id="newbtn">Add</button>
              <textarea  id="newame" Placeholder="Add Rules here" class="form-control float-left"></textarea>
              </div>
              </div>
              <hr><br>';
        }
    
        ?>    
    <div class="row">
        <div class="col">    
            <div id="box">
              <p class="text-center">Loading Please Wait..</p></div>
        </div>
    </div>
    </div>
</div>

<?php  include './footer.html';?>
<script>
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
			url:'../backend_files/rules.inc.php',
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
      url:'../backend_files/rules.inc.php',
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
    $.post("../backend_files/rules.inc.php",
    {aid:aid},
    function(data,status){
      $('#del').show();
      $("#del").show().delay(3000).slideUp(300);
      readamenity();
   });
 }
}
</script>