<?php include './_navbar.php';?>

<style media="screen">
#logo{
  width: 50px;
  height: 50px;

}
.nav-tabs .nav-link:not(.active) {
    border-color: transparent !important;
}
#view_form{
  width: 100%;
}
embed{
  width: 100%;
  height: 80vh;
}
.brek a{
  font-size: 16px;
}
.hidden{
  display: none;
  cursor: pointer;
}
@media screen and (max-width: 480px) {

}
</style>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
        <div class="container-fluid">
<h2 style="color:teal;"> Documents</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin.php" id="dashboardbox1">Homepage</a></li>
      <li class="breadcrumb-item active" aria-current="page">Documents</li>
    </ol>
  </nav> 
  <div id="success" class="mt-3 mb-3 alert alert-success " style='display: none;'><span class="success_text"></span><span style="float:right; cursor: pointer;" class="success-close">&times;</span></div>
  <div id="error" class="mt-3 mb-3 alert alert-danger " style='display: none;'> <span class="error_text"></span><span style="float:right; cursor: pointer;" class="error-close">&times;</span></div>
  
  <div class="alert alert-success " style="display:none;" id="formup">Update Successfull</div>
  <div class="alert alert-danger " style="display:none;" id="formuper">Error While Updating Form</div>
  <div class="d-flex">
    <button class="btn w-25 float-right mb-3 mr-3 btn-outline-primary" id="addfield">Add New Form Field</button>
    <button class="btn w-25 float-right mb-3 mr-3 btn-outline-primary" id="addform">View / Add Forms</button>
  </div>
<div class="row">
    <div class="col-lg-12">
        <div style="display:none;" id="addformforuser">
            <div class="row border-bottom">
                <div class="col-12 mb-3">
                <form id='get_form'>
                    <div class="form-row">
                    <div class="form-group">
                        <label for="flat_no">Flat / Shop No.</label>
                        <input type="text" class='form-control' name='flat_no' id='flat_no'>
                    </div>
                    </div>
                    <button type='submit' class='btn btn-info'>Get Form Details</button>
                    <button type="button" class="closeee btn btn-danger ">Close</button>
                </form>
                </div>
                <div id="view_form" style='display: none;'>
                <div class='ml-auto' class='text-right' style='cursor: pointer; text-align: right;'><span id='form_close' style='padding: .2em; background-color: red; color: white;'>Close</span></div>
                <embed src="" type="application/pdf">
                </div>
                <div id='form_data' class='col-12 mt-3' style='padding:1em; border:1px solid black; display:none;'>
                <form enctype="multipart/form-data" action="../backend_files/form_admin.inc.php" method="POST" id="update_form">
                    
                </form>
                               
                </div>
            </div>
        </div>


        <div style="display:none;" id="addformfield">
        <h3>Add A New Form Field</h3>
            <div class="row">
                <div class="col-12 m-2">
                <form id="add_field">
                    <div class="form-row">
                    <div class="form-group col-4">
                        <label for=""><b>Add a new Form Field:</b> </label>
                        <input type="text" class="form-control" name="field">
                    </div>
                    <div class="form-group col-4">
                        <label>Add for</label>
                        <select name="for" class="custom-select mr-sm-2" >
                        <option value="t">Tenants</option>
                        <option value="fo">Flat Owners</option>
                        <option value="so">Shop Owners</option>
                        <option value="st">Shop Tenants</option>
                        </select>
                    </div>
                    </div>
                    <input type="hidden" name="add" value="add">
                    <button type="submit" class="btn btn-success">Add new field</button>                    
                    <button type="button" class="closeee btn btn-danger ">Close</button>
                </form>
                </div>
            </div>
        </div>
        <br><hr><br>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link border border-dark border-bottom-0 active" id="nav-resident-tab" data-toggle="tab" href="#nav-resident" role="tab" aria-controls="nav-resident" aria-selected="true">Resident Documents</a>
            <a class="nav-item nav-link border border-dark border-bottom-0" id="nav-tenant-tab" data-toggle="tab" href="#nav-tenant" role="tab" aria-controls="nav-tenant" aria-selected="false">Tenant Document</a>
            <a class="nav-item nav-link border border-dark border-bottom-0" id="nav-shop-tab" data-toggle="tab" href="#nav-shop" role="tab" aria-controls="nav-shop" aria-selected="false">Shop Document</a>
            <a class="nav-item nav-link border border-dark border-bottom-0" id="nav-shoptenant-tab" data-toggle="tab" href="#nav-shoptenant" role="tab" aria-controls="nav-shoptenant" aria-selected="false">Shop Tenant Document</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-resident" role="tabpanel" aria-labelledby="nav-resident-tab">
            <div class="resident_form"></div>
        </div>
        <div class="tab-pane fade" id="nav-tenant" role="tabpanel" aria-labelledby="nav-tenant-tab">
        <div class="tenant_form"></div>
        </div>
        <div class="tab-pane fade" id="nav-shop" role="tabpanel" aria-labelledby="nav-shop-tab">
        <div class="shop_form"></div>
        </div>
        <div class="tab-pane fade" id="nav-shoptenant" role="tabpanel" aria-labelledby="nav-shoptenant-tab">
        <div class="shoptenant_form"></div>
        </div>
    </div>
    </div>
</div>
</div>
    </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    readrecords();
  });

  $('#addfield').click(function(){
    $('#addformforuser').hide();
    $('#addformfield').slideDown('fast');
  });
  $('#addform').click(function(){
    $('#addformfield').hide();
    $('#addformforuser').slideDown('fast');
  });
  $('.closeee').click(function(){
      $('#addformfield').slideUp('fast');
      $('#addformforuser').slideUp('fast');
  });

  function readrecords(){
    $.ajax({
      url: '../backend_files/form_admin.inc.php',
      type: 'POST',
      data: {show_forms: "show_forms"},
      success: function(data){
          var response = JSON.parse(data);
        $('.resident_form').html(response.resident);
        $('.tenant_form').html(response.tenant);
        $('.shop_form').html(response.shop);
        $('.shoptenant_form').html(response.shoptenant);
      }
    })
  }

  function rmowner(name){
    console.log(name);
    var conf = confirm('Are you sure you want to Delete?');
    if(conf){
      $.ajax({
        url: '../backend_files/form_admin.inc.php',
        type: 'POST',
        data: {name: name, rmowner: "owner_form"},
        success: function(data){
          var response=JSON.parse(data);
          if(response.success){
            $('#formup').show();
            $("#formup").delay(4000).slideUp(300);
          }
          else{
            $('#formuper').show();
            $("#formuper").delay(4000).slideUp(300);
          }
          readrecords();
        }
      });      
    }
  }
  function rmtenant(name){
    console.log(name);
    var conf = confirm('Are you sure you want to Delete?');
    if(conf){
    $.ajax({
      url: '../backend_files/form_admin.inc.php',
      type: 'POST',
      data: {name: name, rmtenant: "owner_form"},
      success: function(data){
        var response =JSON.parse(data);
        if(response.success){
            $('#formup').show();
            $("#formup").delay(4000).slideUp(300);
          }
          else{
            $('#formuper').show();
            $("#formuper").delay(4000).slideUp(300);
          }
        readrecords();
      }
    });
  }
  }
  function rmshop(name){
    console.log(name);
    var conf = confirm('Are you sure you want to Delete?');
    if(conf){
    $.ajax({
      url: '../backend_files/form_admin.inc.php',
      type: 'POST',
      data: {name: name, rmshop: "owner_form"},
      success: function(data){
        var response=JSON.parse(data);
        if(response.success){
            $('#formup').show();
            $("#formup").delay(4000).slideUp(300);
          }
          else{
            $('#formuper').show();
            $("#formuper").delay(4000).slideUp(300);
          }
        readrecords();
      }
    });
  }
  }
  function rmshoptenant(name){
    console.log(name);
    var conf = confirm('Are you sure you want to Delete?');
    if(conf){
    $.ajax({
      url: '../backend_files/form_admin.inc.php',
      type: 'POST',
      data: {name: name, rmshoptenant: "owner_form"},
      success: function(data){
        var response=JSON.parse(data);
        if(response.success){
            console.log('abcd');
            $('#formup').show();
            $("#formup").delay(4000).slideUp(300);
          }
          else{
            $('#formuper').show();
            $("#formuper").delay(4000).slideUp(300);
          }
        readrecords();
      }
    });
  }
  }

  $('#get_form').on('submit',function(e){
    e.preventDefault();
    var flat_no=$('#flat_no').val();

    $.post("../backend_files/form_admin.inc.php",{
				form: 'form',
        flat_no:flat_no
			},function(data,status){
        var response=JSON.parse(data);
        if(response.error){
          $('.error_text').text(response.error);
          $('#form_data').hide();
          $('#error').show();
          $('#error').delay(6000).slideUp();
        }else{
          $('#update_form').html(response.data);
          $('#error').hide();
          $('#form_data').show();
        }
    });
  });


  $('#add_field').on('submit',function(e){
    e.preventDefault();
    $.ajax({
      url: '../backend_files/form_admin.inc.php',
      type: 'POST',
      data: $('#add_field').serialize(),
      success: function(data){
        var response=JSON.parse(data);
        if(response.success){
          readrecords();
          $('.success-text').text(response.success);
          $('.success').show();
          $('.success').delay(4000).slideUp('fast');                    
      $('#addformfield').slideUp('fast');
      $('#addformforuser').slideUp('fast');
          $('#add_field').trigger('reset');
        }
        else{
          $('.error-text').text(response.error);
          $('.error').show();
          $('.error').delay(4000).slideUp('fast');
        }
      }
    })
  });
  
  function view(flat_no, doc){
    var path='./forms/'+flat_no+'/'+doc.split(' ')[0]+'.pdf';
    $('#view_form').show();
    $('embed').attr("src",path);
  }
  $('#form_close').on('click',function(e){
    e.preventDefault();
    $('embed').attr("src","");
    $('#view_form').hide();
  });
  $("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
     });
     $('.container-fluid').click(function() {
   $('#wrapper').removeClass("toggled");
});
  $('.success-close').click(function(){
    $('.success').hide();
  });
  $('.error-close').click(function(){
    $('.error').hide();
  });

</script>

<?php  include './footer.html';?>