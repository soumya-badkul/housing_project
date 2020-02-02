<?php
include 'navbar.php';
    $tab = NULL;?>
    <style>
    .save-btn{
        color:#42b6f5;
        background:transparent;border:1px solid #42b6f5;border-radius:5px;
    }
    .save-btn:hover{
        background:#42b6f5;
        color:white;
    }
    .save-btn:focus{
        color:white;
        opacity:0.5;
        background: #42b6f5;
        outline:none;border:1px solid blue;border-radius:5px;
    }
        @media print{
            #sidebar-wrapper,nav,.shin,#print,.dataTable_filter{
                display:none !important;
            }
        }
    </style>
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<div class="container-fluid">
    <h3>Get Bank Records</h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="resident.php">Homepage</a></li>
       <li class="breadcrumb-item"><a href="accountingtabs.php">Accouting</a></li>
      <li class="breadcrumb-item active" aria-current="page">Bank Records</li>
    </ol>
  </nav>
    <div class="shin m-3">
        <form class="form-inline" class="" id="myform">
            <div class="form-group">
                <label for="from">From Date:&nbsp;&nbsp;</label>
                <input autofocus type="date" id="from" name="from" class="form-control" >
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="form-group">
                <label for="from">Till Date:&nbsp;&nbsp;</label>
                <input type="date" id="till" name= "till" class="form-control" > 
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-success shadow" type="button" id="adon">Fetch Detials</button>
        </form>
    </div>
    <button class="btn btn-dark float-right m-2" id="print" style="display:none;">Print</button>
    <hr class="bg-dark">


<div class="tbody"></div>
</div>   <!-- container--->
</div>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script>
$("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
     });
     $('.container-fluid').click(function() {
   $('#wrapper').removeClass("toggled");
});
$('#adon').click(function(){
    var from = $('#from').val();
    var till = $('#till').val();
    if(from == ''){
        $('#from').css("border","2px solid red");}
    else if( till ==''){        
        $('#till').css("border","2px solid red");
    }
    else {
        $('#from').css("border","1px solid green");
        $('#till').css("border","1px solid green");
            $('.tbody').html('Loading Please wait.');
            $.ajax({
                url:"xls4_8_19.inc.php",
                type:"post",
                data :{from:from,till:till},
                dataType: 'json',
                success:function(data,status){
                    $('.tbody').html(data.tab);
                    $('#myTable').DataTable({
                        dom: 'lBfrtip',
                        buttons: [
                            {
                                extend: 'print',
                                title: '',
                                customize: function ( win ) {
                                    $(win.document.body)
                                        // .css( 'font-size', '10pt' )
                                        .prepend(
                                            '<h4>Bank Record</h4><br><h4>From :'+data.from+'&nbsp; &nbsp;To:'+data.till+'</h4>'
                                        );
                                        $(win.document.body)
                                        // .css( 'font-size', '10pt' )
                                        .append(
                                            '<h4>Credited :'+data.val1+'&nbsp;<br>Debited:'+data.val2+'&nbsp;<br>Balance:'+data.val3+'</h4>'
                                        );
                                   

                                }
                            }
                        ]
                    });
                    }
            });
        }
});
function edittype(id){
    $('#edit'+id).hide();
    $('#update'+id).show();
    $('#select_'+id).attr('disabled', false);
}
function updatetype(id) { 
    var newtype = $('#select_'+id).val();
    if(newtype=='null'){
        $('#select_'+id).css('border', '1px solid red');
        $('#small-alert').show();
    }
    else{

        $('#small-alert').hide();
    $.ajax({
        type: "post",
        url: "xls4_8_19.inc.php",
        data: {changetypeid:id,newtype:newtype},
        success: function (response) {
            $('#select_'+id).val(newtype);
            $('#select_'+id).attr('disabled', true);
            $('#edit'+id).show();
            $('#update'+id).hide();
        }
    });
    }
    
}
$('#print').click(function(){
    window.print();
});

</script>
</body>
</html>
