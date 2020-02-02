<?php include './_navbar_shop.php';?>

<div class="page-header">
    <h3 class="page-title ">Tenant Documents</h3>
    <div><hr></div>
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb">
            <?php if($_SESSION['role']=='resident') {?>
            <li class="breadcrumb-item "><a href="resident.php">Homepage</a></li>
            <?php }else if($_SESSION['role']=='shop'){?>
            <li class="breadcrumb-item "><a href="shop.php">Homepage</a></li>
            <?php }else if($_SESSION['role']=='tenant'){?>
                <li class="breadcrumb-item "><a href="tenant.php">Homepage</a></li>
            <?php }?>
            <li class="breadcrumb-item "><a>Tenant Documents</a></li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">        
    <p class="h5 text-danger ">Please upload Forms In PDF format</p>
  <div id="error" style='display: none;' class="alert alert-danger fade show" role="alert">
    <span id="error_body"></span>
    <button type="button" id="error_close" class="close" >
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="row">
    <div id="view_form" style='display: none;'>
      <div class='ml-auto' class='text-right' style='cursor: pointer; text-align: right;'><span id='form_close' style='padding: .2em; background-color: red; color: white;'>Close</span></div>
      <embed src="" type="application/pdf">
    </div>
    <div id='form_data' class='col-12 mt-3' style='padding:1em; display:none;'>
      <form enctype="multipart/form-data" action="./includes/form_admin.inc.php" method="POST" id="update_form">
        
      </form>
    </div>

  </div>
    </div>
</div>

<?php  include './footer.html';?>
<script>

$(document).ready(function(){
      readRecords();
    });
    function readRecords(){
      var flat_no='<?php echo $_SESSION['username'];?>';
      $.post("../backend_files/shop_tenant_doc.inc.php",{
            form: 'form',
            flat_no:flat_no
        },function(data,status){
            var response=JSON.parse(data);
            if(response.error){
                $('#error_body').text(response.error);
                $('#form_data').hide();
                $('#error').show();
            }else{
                $('#update_form').html(response.data);
                $('#error').hide();
                $('#form_data').show();
            }
      });
    }
  
  function view(flat_no, doc){
    var path='./forms/'+flat_no+'/'+doc+'.pdf';
    $('#view_form').show();
    $('embed').attr("src",path);
  }
  $('#form_close').on('click',function(e){
    e.preventDefault();
    $('embed').attr("src","");
    $('#view_form').hide();
  });
  $('#error_close').on('click',function(e){
    $('#error').hide();
  });
</script>