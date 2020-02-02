<?php
$html ="";
date_default_timezone_set("Asia/Calcutta");
  $today = date("d-m-y");
  $conn = mysqli_connect( 'localhost','root',"",'house' );

$flatno = $_POST['id'];
$displayquery = "SELECT * FROM flat_owner_details WHERE flat_no ='$flatno'";
$result = mysqli_query($conn,$displayquery);
$row = mysqli_fetch_array($result);

  $path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
  require_once $path . '/vendor/autoload.php';
  $mpdf = new \Mpdf\Mpdf([
  	'margin_left' => 5,
  	'margin_right' => 5,
  	'margin_top' => 8,
  	'margin_bottom' => 8,
  	'margin_header' => 10,
  	'margin_footer' => 10
  ]);
  $mpdf->showImageErrors = true;
$html .= '
<html>
<head>
<style>
</style>
</head>
<body style="font-family:calibri;padding: 5px;">
  <h2>Details of Flat: '.$row['flat_no'].'</h2>
  <br>
  <div style="border:1px solid white">
  <table>
  <tr class="">
    <td>Owner 1 Photo:</td>
    <td>Owner 2 Photo:</td>
    <td>Spouse Photo:</td>
  </tr>
    <tr>';
    $row['owner1_image1'] != NULL ? $html .='<td><img style="border:1px solid black;width:200px;height:150px;margin:20px" src="../DB_docs_images/flat_owner/'.$row['flat_no'].'/'.$row['owner1_image1'].'"/></td>' 
    : $html.='<td width="30%">No Image Added</td>';
    $row['owner2_image1'] != NULL ? $html .='<td><img style="border:1px solid black;width:200px;height:150px;margin:20px" src="../DB_docs_images/flat_owner/'.$row['flat_no'].'/'.$row['owner2_image1'].'"/></td>' 
    : $html.='<td width="30%">No Image Added</td>';
    $row['spouse_image1'] != NULL ? $html .='<td><img style="border:1px solid black;width:200px;height:150px;margin:20px" src="../DB_docs_images/flat_owner/'.$row['flat_no'].'/'.$row['spouse_image1'].'"/></td>' 
    : $html.='<td width="30%">No Image Added</td>';
    // if(){
      
    // }
    // else if($row['owner1_image1'] != NULL){

    // }
    // else if($row['owner1_image1'] != NULL){
    // }
    // <td><img style="border:1px solid black;width:200px;height:150px;margin:20px" src="../DB_docs_images/flat_owner/'.$row['flat_no'].'/'.$row['owner2_image1'].'"/></td>
    // <td><img style="border:1px solid black;width:200px;height:150px;margin:20px" src="../DB_docs_images/flat_owner/'.$row['flat_no'].'/'.$row['spouse_image1'].'"/></td>
  $html.='  </tr>
  </table>
    <table width="100%">
        <tr>
        <td colspan="2" style="font-size:15pt;border-bottom: 1px solid gray;">
            <p>Flat Details</p>
            </td>
          </tr>
      <tr>
        <td>
          <b>Owner Name: </b>'.$row['flat_owner1_name'].'
        </td>
        <td>
          <b>Flat Ownership Type:</b> '.$row['flat_type_of_ownership'].'
        </td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>
      <tr> 
        <td>
          <b>Move In Date :</b>'.$row['flat_move_in_date'].'
        </td>
      </tr>
      <tr><tr><td colspan="2" height="15pt"></td></tr></tr>



      <!-- owner 1 details -->
      <tr>
        <td  colspan="2" style="font-size:17pt;border-bottom: 1px solid gray;">
          <p>Owner 1 Details:</p>
        </td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>
      <tr>
        <td><b>Date Of Birth:</b>'.$row['flat_owner1_dob'].'</td>
        <td><b>Email:</b>'.$row['flat_owner1_email'].'</td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>
      <tr>
        <td><b>Mob:</b>'.$row['flat_owner1_mob'].'</td>
        <td><b>occupation:</b> '.$row['flat_owner1_occup'].'</td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>';


      if($row['flat_type_of_ownership']=='joint'){
      $html.='<tr>
      <td  colspan="2" style="font-size:17pt;border-bottom: 1px solid gray;">
          <p>Owner 2 Details:</p>
        </td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>
      <tr>
        <td><b>Date Of Birth:</b>'.$row['flat_owner2_dob'].'</td>
        <td><b>Email:</b>'.$row['flat_owner2_email'].'</td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>
      <tr>
        <td><b>Mob:</b>'.$row['flat_owner2_mob'].'</td>
        <td><b>occupation:</b>'.$row['flat_owner2_occup'].'</td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>';
      }


      $html .='<tr>
      <td  colspan="2" style="font-size:17pt;border-bottom: 1px solid gray;">
      <p>Associate Member Details</p></td>
  </tr>
  <tr><td colspan="2" height="15pt"></td></tr>
  <tr>
    <td><b>Associate Member Details:</b>'.$row['assosciate_member_name'].'</td>
    <td><b>Associate Member Relation:</b>'.$row['assosciate_member_reln'].'</td>
  </tr>
  <tr><td colspan="2" height="15pt"></td></tr>
<!-- nominee details -->
      <tr>
          <td  colspan="2" style="font-size:17pt;border-bottom: 1px solid gray;">
          <p>Nominee Details</p></td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>
      <tr>
        <td><b>Nominee Name:</b>'.$row['nominee'].'</td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>


      <!-- member details -->
      <tr>
          <td  colspan="2" style="font-size:17pt;border-bottom: 1px solid gray;">
          <p>Member Details</p></td>
        </tr>
        <tr><td colspan="2" height="15pt"></td></tr>';
        if($row['flat_member2_name'] == ''){
          $html .='<tr>
          <td colspan="2"><b>Flat Member Count:</b> 1</td>
        </tr>';
        }
        else{
          $html .='<tr>
          <td colspan="2"><b>Flat Member Count:</b>'.((int)$row['flat_member_count']).'</td>
        </tr>';
        }
      $html .='
      <tr><td colspan="2" height="15pt"></td></tr>
      <tr>
        <td><b>Member 1 Name :</b>'.$row['assosciate_member_name'].'</td>
        <td><b>Member 1 Relation:</b>'.$row['assosciate_member_reln'].'</td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>
      <tr>
        <td><b>Member 2 Name :</b>'.$row['flat_member2_name'].'</td>
        <td><b>Member 2 Relation:</b> '.$row['flat_member2_reln'].'</td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>
      <tr>
        <td><b>Member 3 Name :</b>'.$row['flat_member3_name'].'</td>
        <td><b>Member 3 Relation:</b>'.$row['flat_member3_reln'].'</td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>
      <tr>
        <td><b>Member 4 Name :</b>'.$row['flat_member4_name'].'</td>
        <td><b>Member 4 Relation:</b> '.$row['flat_member4_reln'].'</td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>
      <tr>
        <td><b>Member 5 Name :</b>'.$row['flat_member5_name'].'</td>
        <td><b>Member 5 Relation:</b> '.$row['flat_member5_reln'].'</td>
      </tr>
      <tr><td colspan="2" height="15pt"></td></tr>
      <tr>
        <td colspan="2" height="15pt"></td>
      </tr>
      <!-- vehicle,pet,maid -->
      <tr>
          <td  colspan="2" style="font-size:17pt;border-bottom: 1px solid gray;">
          <p>Other Details</p></td>
        </tr>
      <tr>
        <td><b>Vehicle Count :</b> '.$row['flat_vehicle_count'].'</td>
        <td><b>Vehicle Description :</b>'.$row['flat_vehicle_description'].'</td>
      </tr>
      <tr>
        <td colspan="2" height="15pt"></td>
      </tr>
      <tr>
        <td><b>Pet Count :</b>'.$row['flat_petcount'].'</td>
        <td><b>Pet Description: :</b>'.$row['flat_petdescription'].'</td>
      </tr>
      <tr>
        <td colspan="2" height="15pt"></td>
      </tr>
      <tr>
        <td><b>Maid Name :</b>'.$row['flat_maid_name'].'</td>
      </tr>
    </table>
  </div>
</body>
</html>
';
$invoicename = $row['flat_no'].'.pdf';
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
// $mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Flat Details");
$mpdf->SetAuthor("Co-operative Housing society");
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output($invoicename,\Mpdf\Output\Destination::INLINE);
