<?php
session_start();
$conn = mysqli_connect('localhost','root','','house');
if(!isset($_SESSION['username']) || $_SESSION['role']!="admin"){
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
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold h2 mb-2">Hello</span>
                        <span class="text-secondary h2 ">Admin</span>
                    </div>
                    <!-- <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> -->
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
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
                <a class="nav-link" href="flat_tabs.php">
                    <span class="menu-title">Manage Flats</span>
                    <i class="las la-user menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shop_tabs.php">
                    <span class="menu-title">Manage Shop</span>
                    <i class="mdi mdi-cart-outline menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <span class="menu-title">Finance/Accounting</span>
                    <i class="las la-rupee-sign menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#employee" aria-expanded="false"
                    aria-controls="employee">
                    <span class="menu-title">Employee details</span>
                    <i class="menu-arrow"></i>
                    <i class="lar la-id-card menu-icon"></i>
                </a>

                <div class="collapse" id="employee">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="add_employee.php">Add New Employee</a></li>
                        <li class="nav-item"> <a class="nav-link" href="employee_edit_details.php">Edit Employee Details</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#Notices" aria-expanded="false"
                    aria-controls="Notices">
                    <span class="menu-title">Notices</span>
                    <i class="menu-arrow"></i>
                    <i class="lar la-clipboard menu-icon"></i>
                </a>

                <div class="collapse" id="Notices">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="general_notice.php">General
                                Notices</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="individual_notice.php">Individual Details</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#meeting" aria-expanded="false"
                    aria-controls="meeting">
                    <span class="menu-title">Meetings</span>
                    <i class="menu-arrow"></i>
                    <i class="lar la-handshake menu-icon"></i>
                </a>

                <div class="collapse" id="meeting">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="meeting.php">Add New
                                Meeting</a></li>
                        <li class="nav-item"> <a class="nav-link"
                                href="meeting_records.php">Meeting Details</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="history.php">
                    <span class="menu-title">Records/History</span>
                    <i class="las la-server menu-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="committee.php">
                    <span class="menu-title">Committee</span>
                    <i class="las la-user-check menu-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="form_admin.php">
                    <span class="menu-title">Documents</span>
                    <i class="las la-file-invoice menu-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <span class="menu-title">Amenities</span>
                    <i class="las la-dumbbell menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <span class="menu-title">Rules & Regulations</span>
                    <i class="las la-book-open menu-icon"></i>
                </a>
            </li>
        </ul>
    </nav>

      <div class="main-panel">
        <div class="content-wrapper">