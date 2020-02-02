<?php
session_start();

if(!isset($_SESSION['username']) || $_SESSION['role']!="resident"){
  header("location:index.php");
}
require 'check_due.php';
if(isset($_SESSION['noti'])){
  echo '<h4>'.$_SESSION['noti'].'</h4>';
}
?>

 <h1>HELLO : <?=  $_SESSION['username'] ?></h1>
 <h2>you are:<?= $_SESSION['role'] ?></h2>
 <style media="screen">
   a{
     font-size: 40px;
   }
 </style>
 <a href="user_payment.php">Add user_payment</a> <br>
 <a href="logout.php">Logout</a>
