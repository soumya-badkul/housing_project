<?php
session_start();
$conn = mysqli_connect('localhost','root','','house');
if(!isset($_SESSION['username']) || $_SESSION['role']!="resident"){
header("location:../login.php");
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet"  href="../assets/vendors/1.3.0/css/line-awesome.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- End layout styles -->
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Raleway&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../assets/images/favicon.png" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <style>
    * {
      font-family: 'Raleway', sans-serif;
      font-weight:600;
    }
    .profile {
    color: white;
    text-decoration: none;
    /* background-image: url('css/33.png'); */
    /*background-image:linear-gradient(to bottom,#bdc3c7,#343a40);*/
    align-content: space-around;
  }
  .sideprofile {
    /*box-shadow: -4px 7px 29px 1px #6c6c6c;*/
    border-radius: 50%;
    margin-left: 25px;
    height: 105px;
    width: 185px;
  }

  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar shadow-sm col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center font-weight-bold h3 justify-content-center">
          <div class="navbar-brand brand-logo" style="font-family: 'Josefin Sans';">AMBIKA HERITAGE</div>
          <div class="navbar-brand brand-logo-mini " style="font-family: 'Josefin Sans';">AH</div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
          </button>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-logout d-none d-lg-block">
                  <a class="nav-link" href="logout.php">LOGOUT&nbsp;
                      <i class="mdi mdi-power"></i>
                  </a>
              </li>
          </ul>
      </div>
  </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="#" class="nav-link">     

                </a>

 <!-- --------------------------------profile pic-------------------------------------------------------- -->
 <div class="nav-profile-text d-flex flex-column">  
    <div class="profile">
        <div class="mb-3 ml-3 row">
        <a href="update_profile.php" class="ml-3 text-dark">
          <?php
         // $q=mysqli_query($conn,"SELECT profile_pic from login where username='".$_SESSION['username']."'");
         $q=mysqli_query($conn,"SELECT p.profile_pic,a.flat_owner1_name from login as p JOIN flat_owner_details AS a where p.username='".$_SESSION['username']."' AND a.flat_no='".$_SESSION['username']."'");
          $row=mysqli_fetch_assoc($q);

          echo'<a href="update_profile.php"><img class="sideprofile" title="Update Your profile" src="../DB_docs_images/profile_images/'.$_SESSION['username'].'/'.$row['profile_pic'].'" style="width:100px;" alt="not found"/></a>'; 
          ?>
        </div>
         <div class="row mb-2 text-dark ml-5 txt">
             <h4><?php echo $row['flat_owner1_name'] ?></h4>
        </a>
        </div> 
    </div>
</div>
</li>
 <!-- -----------------------------------profile pic------------------------------------------------------- -->
                    <!-- <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> -->

            <li class="nav-item">
                <a class="nav-link" href="resident.php">
                    <span class="menu-title">Dashboard</span>
                    <i class="las la-braille menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="update_password.php">
                    <span class="menu-title"> Update Password</span>
                    <i class="las la-edit menu-icon"></i>
                </a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="resident_updateonce_info.php">
                    <span class="menu-title">Your Details</span>
                    <i class="las la-user menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="resident_addtenantdetails.php">
                    <span class="menu-title">Add Tenant Details</span>
                    <i class="mdi mdi-cart-outline menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="resident.php">
                    <span class="menu-title">Finance/Accounting</span>
                    <i class="las la-rupee-sign menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="resident_meeting.php">
                    <span class="menu-title">Meeting</span>
                    <i class="lar la-id-card menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="resident_forms.php">
                    <span class="menu-title">Your Documents</span>
                    <i class="lar la-clipboard menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="resident.php">
                    <span class="menu-title">Tenant's Documents</span>
                    <i class="lar la-handshake menu-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="amenities.php">
                    <span class="menu-title">Amenities</span>
                    <i class="las la-server menu-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="rules.php">
                    <span class="menu-title">Rules & Regulations</span>
                    <i class="las la-book-open menu-icon"></i>
                </a>
            </li>
    </nav>

      <div class="main-panel">
        <div class="content-wrapper">