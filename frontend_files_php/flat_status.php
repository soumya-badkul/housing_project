<?php include './_navbar.php';?>

<div class="page-header">
        <h3 class="page-title text-info"> Flat Status </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                <li class="breadcrumb-item"><a href="flat_tabs.php">Manage FLats</a></li>
                <li class="breadcrumb-item active" aria-current="page">Flat Status</li>
            </ol>
        </nav>
    </div>
<div class="card">
  <div class="card-body">
    <div class="boxes"></div>
  </div>
</div>

<div class="modal" id="viewmodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-light">
        <h4 class="modal-title" id="view_flat_no">FLAT DETAILS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <img src="" id="owner_image">
          </div>
        </div>
        <div >
          <table class="table">
            <tr>
              <th><b>FLAT NO:</b></th>
              <th><div class="d-inline " id="fltno1"></div></th>
            </tr>
            <tr>
              <td><b>Dimensions:</b></td>
              <td><div class="d-inline " id="dim1"></div></td>
            </tr>
            <tr>
              <td><b>Status:</b></td>
              <td><div class="d-inline " id="sta1"></div></td>
            </tr>
            <tr>
              <td><b>BHK's:</b></td>
              <td><div class="d-inline " id="bhk1"></div></td>
            </tr>
            <tr>
              <td><b>Parking Slot:</b></td>
              <td><div class="d-inline " id="park1"></div></td>
            </tr>
          </table>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

  <?php  include './footer.html';?>
  <script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $('.container-fluid').click(function () {
      $('#wrapper').removeClass("toggled");
    });

    $(document).ready(function () {

      readAllRecord();
    });

    function showdet() {
      $('#showdett').modal('show');
    }

    function readAllRecord() {
      var readAllRecord = "readAllRecord";

      $.ajax({
        url: "../backend_files/flat_status.inc.php",
        type: "post",
        data: {
          readAllRecord: readAllRecord
        },
        success: function (data, status) {
          $('.boxes').html(data);
          $('#mynewtable').DataTable();
        }
      });
    }


    function GetUserDetails(id) {
      $.post("../backend_files/flat_status.inc.php", {
        id: id
      }, function (data, status) {
        var dekhle = JSON.parse(data);
        //$('#view_flat_no').text(dekhle.flat_no);
        $('#fltno1').text(dekhle.flat_no);
        $('#dim1').text(dekhle.flat_dimensions);
        $('#sta1').text(dekhle.flat_status);
        $('#bhk1').text(dekhle.BHK);
        $('#park1').text(dekhle.flat_parking);
      });
      $('#viewmodal').modal("show");
    }
  </script>