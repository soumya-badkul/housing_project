<?php    session_start();
    error_reporting(E_PARSE & ~E_NOTICE);
if($_SESSION['role']=='admin'){ 
        include './_navbar.php';
        echo '<div class="page-header">
        <h3 class="page-title ">HelpDesk </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">HelpDesk</li>
            </ol>
    </div>';
    }
    else if($_SESSION['role']=='shop'){
        include './_navbar_shop.php'; 
        echo '<div class="page-header">
        <h3 class="page-title ">HelpDesk </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="shop.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">HelpDesk</li>
            </ol>
    </div>';       
    }
    else if($_SESSION['role']=='resident'){
        include './_navbar_resident.php'; 
        echo '<div class="page-header">
        <h3 class="page-title ">HelpDesk </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="resident.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">HelpDesk</li>
            </ol>
    </div>';               
    }
    else if($_SESSION['role']=='tenant'){
        include './_navbar.php'; 
        echo '<div class="page-header">
        <h3 class="page-title ">HelpDesk </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="tenant.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">HelpDesk</li>
            </ol>
    </div>';               
    }
    ?>

<style>
  ::-webkit-input-placeholder {
    /* Chrome/Opera/Safari */
    font-size: 15px;
  }
  thead{
    visibility:hidden;
  }
  ::-moz-placeholder {
    /* Firefox 19+ */
    font-size: 15px;
  }

  :-ms-input-placeholder {
    /* IE 10+ */
    font-size: 15px;
  }

  :-moz-placeholder {
    /* Firefox 18- */
    font-size: 15px;
  }

  #faqsearch {
    width: 80%;
  }

  #search,
  #allfaq {
    border: 1px solid gray;
  }

  #faq {
    margin-left: 20px;
  }

  .dataTables_filter input {
    margin-right: 500px;
    width:100%;
    padding: 17px;
  }

  @media (max-width:767px) {
    .dataTables_filter input {
      width: 100%;
      padding: 17px;
    }

    #faqsearch {
      width: 70%;
    }

    #search,
    #allfaq {
      border: 1px solid black !important;
    }

    #faq {
      margin-left: 0px;
    }

    #fhead {
      width: 100%
    }

    .border-left,
    .border-right,
    .border {
      border: 0px solid !important
    }
  }
</style>
<div class="card">
  <div class="card-body py-1 mb-4 ">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
          aria-controls="nav-home" aria-selected="true">Emergency Contacts</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
          aria-controls="nav-profile" aria-selected="false">Frequently Asked Questions</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <div class="py-4">
        <h4 class="ml-5">Society Contacts</h4><hr>
        <?php
              if($_SESSION['role']=='shop'){
                  echo '<button type="button" class="btn btn-secondary float-right mt-4 mr-5" data-target="#mycontact" data-toggle="modal" > + Add New Contact</button>';
                }
                ?>
        </div>
          <div id="contact" class="accordion" id="accordionExample"></div>
      </div>


      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">        
        <div class="py-4">
          <h4 class="ml-5">Frequently Asked Questions</h4><hr>
        <?php
              if($_SESSION['role']=='shop'){
                  echo '<button type="button" class="btn btn-secondary float-right mr-5" data-target="#myModal" data-toggle="modal" > + Add New FAQ</button>';
                }
                ?>
          <div id="faq" class="accordion" id="accordionExample"></div>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="modal  " id="myModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">New FAQ</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <label for="firstname"> Question:</label>
        <input type="text" id="faqquest" class="form-control">
        <label for="lastname">Answer:</label>
        <textarea name="Description" class="form-control" rows="8" cols="80" id="faqans"></textarea>
      </div>
      <div class="modal-footer float-right">
        <button class="btn btn-outline-primary" data-dismiss="modal" id="faqsubmit">Add</button>
      </div>
    </div>
  </div>
</div>
<div class="modal  " id="mycontact">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">New Contact</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <label for="firstname"> Type:</label>
        <input type="text" id="conttype" class="form-control">
        <label for="lastname">Contact Number:</label>
        <input class="form-control" type="number" id="contnum">
      </div>
      <div class="modal-footer float-right">
        <button class="btn btn-outline-primary" id="contsub">Add Contact</button>
      </div>
    </div>
  </div>
</div>
</div>

<?php  include './footer.html';?>
<script type="text/javascript"
  src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>

<script>
  $('document').ready(function () {
    readfaq();
    readcontact();
  });

  function readfaq() {
    var faq = 'faq';
    $.ajax({
      url: '../backend_files/helpdesk.inc.php',
      type: "post",
      data: {
        faq: faq
      },
      success: function (data) {
        $('#faq').html(data);
        $('#faqtable').DataTable({
          dom: "<'row'<'col-sm-2'f>>",
          ordering: false,
          'language': {
            "search": "",
            'searchPlaceholder': 'Search FAQ\'s'
          }
        });
      }
    });
  }

  function readcontact() {
    var cont = 'cont';
    $.ajax({
      url: '../backend_files/helpdesk.inc.php',
      type: "post",
      data: {
        cont: cont
      },
      success: function (data) {
        $('#contact').html(data);
        $('#conttable').DataTable({
          dom: "<'row'<'col-sm-2'f>>",
          ordering: false,
          'language': {
            "search": "",
            'searchPlaceholder': 'Search FAQ\'s'
          }
        });
      }
    });
  }
  $('#allfaq').click(function () {
    readfaq();
    $('#faqsearch').val('');
  });


  $('#faqsubmit').click(function () {
    var faqquest = $('#faqquest').val();
    var faqans = $('#faqans').val();
    if (faqquest == '' || faqans == '') {
      alert('Please Fill all Sections!');
    } else {
      $.ajax({
        url: '../backend_files/helpdesk.inc.php',
        type: "post",
        data: {
          faqquest: faqquest,
          faqans: faqans
        },
        success: function (data) {
          $('#echo').html(data);
          readfaq();
          $('#faqquest').val('');
          $('#faqans').val('');
        }
      });
    }
  });

  $('#contsub').click(function () {
    var conttype = $('#conttype').val();
    var contnum = $('#contnum').val();
    if (conttype == '' || contnum == '') {
      alert('Please Fill all Sections!');
    } else {
      $.ajax({
        url: '../backend_files/helpdesk.inc.php',
        type: "post",
        data: {
          conttype: conttype,
          contnum: contnum
        },
        success: function (data) {
          $('#pico').html(data);
          $('#mycontact').modal('toggle');
          readcontact();
          $('#conttype').val('');
          $('#contnum').val('');
        }
      });
    }
  });

  function delfaq(fid) {
    var conf = confirm("Do you want to Delete this FAQ?");
    if (conf == true) {
      $.post("../backend_files/helpdesk.inc.php", {
          fid: fid
        },
        function (data, status) {
          $('#echo').html(data);
          readfaq();
        });
    }
  }

  function delcont(cid) {
    var conf = confirm("Do you want to Remove this contact?");
    if (conf == true) {
      $.post("../backend_files/helpdesk.inc.php", {
          cid: cid
        },
        function (data, status) {
          $('#pico').html(data);
          readcontact();
        });
    }
  }
</script>