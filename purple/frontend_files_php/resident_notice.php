<?php include './_navbar_resident.php';?>
<style>
 .newspart{
    height:auto;
 }
 .card-body:hover{
   /* background-color:#ddd; */
   cursor:pointer;
   margin-top:0px;
 }
 .noticepart{
   /* height:40vh; */
   overflow-y:scroll;
 }
 .newspart h3,h2,h1{
   /* font-weight: bold; */
}
 </style>
 <div class="page-header">
 <h2  style="color:teal;" class="m-2">Individual Notices</h2>
      <div class="mt-3 ">
          <p aria-label="breadcrumb">
          <ol class="breadcrumb">
            <?php if($_SESSION['role']=='resident') {?>
            <li class="breadcrumb-item "><a href="resident.php">Homepage</a></li>
          <?php }else if($_SESSION['role']=='shop'){?>
            <li class="breadcrumb-item "><a href="shop.php">Homepage</a></li>
            <?php }else if($_SESSION['role']=='tenant'){?>
              <li class="breadcrumb-item "><a href="tenant.php">Homepage</a></li>
            <?php }?>
            <li class="breadcrumb-item"><a>Individual Notices</a></li>
          </ol>
        </p>
 </div>
 </div>
       
        <!-- write your code here -->
        <div class="container-fluid" id="dashboard" >
        </div>
       <div class="row">
         <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                 <div class="card-body"> 
            <div class=" noticepart" style="border:1px solid lightgray;">
              <div style="font-size:25px;background-color:#d7e0fc;" class=" p-3">Unread Notices
              <small class="text-secondary">(Click to expand)</small></div>
              <div class="noticereceive pl-3"></div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
                 <div class="card-body"> 
            <div class=" noticepart" style="border:1px solid lightgray;">
              <div style="font-size:25px;background-color:#d7e0fc;" class=" p-3">Previous Notices</div>
              <div class="getnotice pl-4 pt-3 pb-4"></div>
            </div>
              <!-- <button id="allnotice" class="mt-2 btn border btn-block mb-2" onclick="getnotice()">View previous notices</button>
              <div id='getnotice' class="getnotice p-2 border" style="background-color:#eee;display:none">
              </div>
              <div style="height:200px;display:none;" id="heightincre"></div> -->
          </div>
         <!-- Column -->
  </div>
</div>
</div>

<?php  include './footer.html';?>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/r-2.2.2/datatables.min.js"></script>
<script>
    $(document).ready(function(){
    $("#allnotice").click(function(){
      $(this).toggleClass("red");
    //   $(this).text($(this).text() == 'View all notices' ? 'Hide notices' : 'View all notices');
      $("#getnotice").toggle();
      $('#heightincre').toggle();
    });
  });

  $(document).ready(function(){
  //	readRecords();
    readnotice();
    sendnotice();
    getnotice();
    sucnoti();
    readNot();
  });

  function readnotice(){
    var notice = "notice";
    // var flat_no = '< ?= $_SESSION['username'] ?>';
    $.ajax({
      url : "../backend_files/resident_notice.inc.php",
      type : "post",
      data :{ notice:notice },
      success:function(data,status){console.log(data);
        $('.noticee').html(data);
      }
    });
  }

  function read(id){
    $.ajax({
      url : "../backend_files/resident_notice.inc.php",
      type : "post",
      data :{ mark_read:'read', id: id },
      success:function(data,status){console.log(data);
        sendnotice();
        getnotice();
      }
    });
  }

  function sendnotice(){
    var sendnotice = "sendnotice";
    var flat_id = '<?= $_SESSION['username'] ?>';
    $.ajax({
      url : "../backend_files/resident_notice.inc.php",
      type : "post",
      data :{ sendnotice:sendnotice,flat_id:flat_id },
      success:function(data,status){console.log(data);
        $('.noticereceive').html(data);
      }
    });
  }

  function getnotice(){
    var getnotice = "getnotice";
    var flat_id = '<?= $_SESSION['username'] ?>';
    $.ajax({
      url : "../backend_files/resident_notice.inc.php",
      type : "post",
      data :{ getnotice:getnotice,
              flat_id:flat_id },
      success:function(data,status){console.log(data);
        $('.getnotice').html(data);
      }
    });
  }

function readRecord(){
    var readrecord = "readrecord";
    var flat_id = '<?= $_SESSION['username'] ?>';
    $.ajax({
      url : "../backend_files/resident_notice.inc.php",
      type : "post",
      data :{ readrecord:readrecord,
              flat_id:flat_id },
      success:function(data,status){console.log(data);
        $('').html(data);
      }
    });
}
  </script>