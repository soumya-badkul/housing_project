<?php  
session_start();
if($_SESSION['role']=='resident')
  include './_navbar_resident.php';
else if($_SESSION['role']=='shop')
  include './_navbar_shop.php';

?>
<style media="screen">
#logo{
  width: 50px;
  height: 50px;

}
#view_form{
  width: 100%;
}
embed{
  width: 100%;
  height: 400px;
}
.brek a{
  font-size: 16px;
}
@media screen and (max-width: 480px) {

  .njo{
    display:none;
  }
#sidebar-wrapper{
  display: none;
}/* top:70px;
   overflow-y: scroll;
   z-index: 1000;
   position: fixed;
   height: 100%;
   overflow-y: auto;
}  */
}
</style>
<div class="page-header">
<h2  style="color:teal;" class="m-2">Your Documents</h2>
          <p aria-label="breadcrumb">
          <ol class="breadcrumb">
          <?php if($_SESSION['role']=='resident') {?>
            <li class="breadcrumb-item "><a href="resident.php">Homepage</a></li>
          <?php }else if($_SESSION['role']=='shop'){?>
            <li class="breadcrumb-item "><a href="shop.php">Homepage</a></li>
            <?php }else if($_SESSION['role']=='tenant'){?>
              <li class="breadcrumb-item "><a href="tenant.php">Homepage</a></li>
            <?php }?>
            <li class="breadcrumb-item "><a>Your Document</a></li>
          </ol>
        </p>
</div>
        
<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
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
          <div id='form_data' class='col-12 mt-3' style='display:none;'>
            <form enctype="multipart/form-data" action="../backend_files/form_admin.inc.php" method="POST" id="update_form">
              
            </form>
          </div>
        </div>
          <div style="height:100px;"></div>
      </div>
    </div>
<?php include 'footer.html';?>
<script type="text/javascript">
  
    $(document).ready(function(){
      readRecords();
    });
    function readRecords(){
      var flat_no='<?php echo $_SESSION['username'];?>';    
      $.post("../backend_files/form_admin.inc.php",{
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
    var path='../forms/'+flat_no+'/'+doc.split(' ')[0]+'.pdf';
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
</script>
