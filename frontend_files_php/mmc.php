<?php 
error_reporting(E_PARSE & ~E_NOTICE);
 include './_navbar.php';?>

<style>

.pgt{
  margin-top:-10px;
}
@media (max-width:767px) {
  .pgt{display:none;}

}
</style>
<div class="page-header">
    <h3 class="page-title ">MMC Calculations</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item"><a href="fintabs.php">Finance And Accounting</a></li>
            <li class="breadcrumb-item active" aria-current="page">MMC Calculations</li>
        </ol>
        </nav>
</div>
<div class="card">
    <div class="card-body">        
        <!-- write your code here -->
<div class="row " style="border-bottom:1px solid black">
        <div class="col-12" style="border-right:1px solid black">
          <form id="formo" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                  <td colspan="2"><h4> Fill the Details</h4> </td>
                </tr>
                <tr>
                <td colspan="2" class="font-weight-bold">A. Area Wise Contribution</td>
                </tr>
                <tr>
                  <td>Construction Costs : </td>
                  <td><input min="1" placeholder="0" type="number" id="const_cost" class="form-control"></td>
                </tr>
                <tr>
                <td colspan="2" class="font-weight-bold">B. Equal Contribution</td>
                </tr>
                <tr>
                  <td>Interest For Late/Due Payments(Yearly %) : </td>
                  <td><input min="0" placeholder="0%" type="number" id="interest" class="form-control"></td>
                </tr>
                <tr>
                  <td>Rebate for Early Payments(Yearly %): </td>
                  <td><input min="0" placeholder="0%" type="number" id="rebate" class="form-control"></td>
                </tr>
                <tr>
                  <td>Annual Building Insurance Amount : </td>
                  <td><input min="1" placeholder="0" type="number" id="insurance" class="form-control"></td>
                </tr>
                <tr>
                  <td>Annual Water Charges : </td>
                  <td><input min="1" placeholder="0" type="number" id="water" class="form-control"></td>
                </tr>
                <tr>
                  <td>Annual Electricity Charges : </td>
                  <td><input min="1" placeholder="0" type="number" id="electricity" class="form-control"></td>
                </tr>
                <tr>
                  <td>Annual Lift Charges : </td>
                  <td><input min="1" placeholder="0" type="number" id="lift" class="form-control"></td>
                </tr>
                <tr>
                  <td>Annual Security Charges : </td>
                  <td><input min="1" placeholder="0" type="number" id="security" class="form-control"></td>
                </tr>
                <tr>
                  <td>Annual Service Charges </td>
                  <td><input min="1" placeholder="0" type="number" id="service" class="form-control"></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="button" id="subi" class="btn btn-outline-success btn-block " value="Submit"></td>
                </tr>
            </table>
          </form>
        </div>
        <!-- <div class="pgt col-lg-6 col-md-0 ">
          <h5 class="text-secondary">MMC Calculation Information</h5>
          <embed class="border shadow ppdf" src="./Housing.pdf" type="application/pdf" width="100%" height="95%">
        </div> -->
      </div>
      
<footer id="footer">
</footer>
<!-- <div class="meaage alert alert-success " style="display:none;">Charges Have been Successfully applied.</div> -->
      <div class="row m-3 " id="terer" >
      </div>
    </div>
</div>

<?php  include './footer.html';?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript">
   $('#subi').click(function(){

    var construction = $('#const_cost').val() || 1;
    var insu = $('#insurance').val() || 1;
    var interest = $('#interest').val() || 0;
    var rebate = $('#rebate').val() || 1;
    var sqftarea = $('#sqft').val() ;
    var water = $('#water').val() || 1;
    var elec = $('#electricity').val() || 1;
    var security = $('#security').val() || 1;
    var lifto = $('#lift').val() || 1;
    var servico = $('#service').val() || 1;
    var justshow = 'show';
  if( insu       == '' ||
      sqftarea   == '' ||
      interest   == '' ||
      rebate   == '' ||
      water      == '' ||
      elec       == '' ||
      lifto      == '' ||
      security   == '' ||
      servico    == ''){
      alert('Please fill all the Amounts');
    }
    else{
      $('html, body').animate({
          scrollTop: $("#subi").offset().top
      }, 200);
    $.ajax({
            url:'../backend_files/mmc.inc.php',
            type:'post',
            data:{justshow:justshow,
                  construction:construction,
                  insu:insu,
                  interest:interest,
                  rebate:rebate,
                  water:water,
                  elec:elec,
                  lifto:lifto,
                  security:security,
                  servico:servico                
                },
            success:function(data,status){ 
                    $('#terer').html(data);
                    $('#mmctable').DataTable({
                      dom:"<'row'<'col-sm-6'B><'col-sm-6'f>>"+
                          "<'row'<'col-sm-12'tr>>"+
                          "<'row'<'col-sm-6'i><'col-sm-6'p>>",
                      buttons:[{
                        extend:'print',
                        text: 'Print Flat Charges',
                        className:'btn-info',
                        messageTop:'Per Month Maintenance Charges for Flats',
                      }],
                    });
                    $('#smmct').DataTable({
                      dom:"<'row'<'col-sm-6'B><'col-sm-6'f>>"+
                          "<'row'<'col-sm-12'tr>>"+
                          "<'row'<'col-sm-6'i><'col-sm-6'p>>",
                      buttons:[{
                        extend:'print',
                        text: 'Print Shop Charges',
                        className:'btn-info',
                        messageTop:'Per Month Maintenance Charges for Shops',
                      }],
                    });
                  }
			 });
    }
   });
   function applycharges(){
    var construction = $('#const_cost').val() || 1;
    var insu = $('#insurance').val() || 1;
    var sqftarea = $('#sqft').val() || 1;
    var water = $('#water').val() || 1;
    var interest = $('#interest').val() || 1;
    var rebate = $('#rebate').val() || 1;
    var elec = $('#electricity').val() || 1;
    var lifto = $('#lift').val() || 1;
    var security = $('#security').val() || 1;
    var servico = $('#service').val() || 1;
    var apply = "apply";
    $.ajax({
            url:'../backend_files/mmc.inc.php',
            type:'post',
            data:{  apply:apply,
                  construction:construction,
                  insu:insu,
                  water:water,
                  interest:interest,
                  rebate:rebate,
                  elec:elec,
                  security:security ,
                  lifto:lifto,
                  servico:servico            
                },
            success:function(data,status){ 
                      alert('Charges Have been Successfully applied.');
                    // $('#terer').html(data);
                    console.log(data);
                  }
			 });

   }
   function stog(){
      $('#flat').hide();
      $('#shop').show();
      $('#stogo').addClass('active');
      $('#ftogo').removeClass('active');
   }
   function ftog(){
      $('#flat').show();
      $('#shop').hide();
      $( "#stogo" ).removeClass( "active" );
      $('#ftogo').addClass("active");
   }
   </script>


