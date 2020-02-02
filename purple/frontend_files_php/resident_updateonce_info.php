<?php include './_navbar_resident.php';
error_reporting(E_PARSE & ~E_NOTICE);
?>

<div class="page-header">
<h2 class="m-3">Add Resident Details:</h2>
<div class="mt-3 ">
          <p aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="resident.php">Homepage</a></li>
			<li class="breadcrumb-item ">Update Your Information</li>
          </ol>
        </p>
        </div>

</div>

<div class="card">
    <div class="card-body">        
        <!-- write your code here -->

        <div class="container">
  <?php 
    $s = $_GET['success'];
    $e=$_GET['error'];
    if($s==1){
      echo '<div id="re" class="mt-3 mb-0 alert alert-success">Details Updated Successfully<a href="" style="float:right"data-dismiss="alert" data-target="#re">&times;</a></div>';
    }
    else if ($e){
      echo '<div id="re" class="mt-3 mb-0 alert alert-danger">'.$e.'<a href="" style="float:right;"data-dismiss="alert" data-target="#re">&times;</a></div>';
     }
   ?>
<div class="row">
<div id="dikha"class="row m-2 text-center" style="width:100%;display:none;">
<h3><i class="fas fa-exclamation-triangle"></i></h3>
<p class="" style="color:red;">&nbsp;&nbsp;&nbsp;You already Updated information once... Please contact Committee to Update your information</p>
<div style="" class="pl-5 mb-4">
<form action="printflat.php" method="post">
			   <input type="hidden" value="<?php echo $_SESSION['username'];?>" name="id">
				 <button type="submit" class="btn btn-block btn-outline-secondary" style="border-radius:10px;">Print</button>
				 </form>
 </div>
 <div class="container-fluid">
<div class="row">
              <div class="col-4">Owner 1:</div>
              <div class="col-4">Owner 2:</div>
              <div class="col-4">Spouse : </div>
          </div>
          <br>
          <div class="row">
            <div class="col-4">
              <img id="owner1_image1" alt="no image added" width="200px" height="200px" class="img-thumbnail">
            </div>
            <div class="col-4">
              <img id="owner2_image1" alt="no image added" width="200px" height="200px" class="img-thumbnail">
            </div>
            <div class="col-4">
              <img id="spouse_image1" alt="no image added" width="200px" height="200px" class="img-thumbnail">
            </div>
          </div><hr>
          <div class="row mt-4">
            <div class="col">
              <mark><b>Owner 1 :&nbsp;&nbsp;</b><div class="d-inline "></div></mark><hr>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <b>Name:&nbsp;&nbsp;</b><div class="d-inline " id="name1"></div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <b>Email:&nbsp;&nbsp;</b><div class="d-inline " id="email1"></div>
            </div>
            <div class="col">
              <b>Contact:&nbsp;&nbsp;</b><div class="d-inline " id="phoneno1"></div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <b>Occupation:&nbsp;&nbsp;</b><div class="d-inline " id="occup1"></div><hr>
            </div>
            <div class="col">
              <b>DOB:&nbsp;&nbsp;</b><div class="d-inline " id="dob1"></div><hr>
            </div>
          </div>

          <div class='owner2'>
            <div class="row">
              <div class="col">
                <mark><b>Owner 2 :&nbsp;&nbsp;</b><div class="d-inline "></div></mark><hr>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <b>Name:&nbsp;&nbsp;</b><div class="d-inline " id="name2"></div><hr>
              </div>
              <div class="col">
                <b>Email:&nbsp;&nbsp;</b><div class="d-inline " id="email2"></div><hr>
              </div>
              <div class="col">
                <b>Contact:&nbsp;&nbsp;</b><div class="d-inline " id="phoneno2"></div><hr>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <b>Occupation:&nbsp;&nbsp;</b><div class="d-inline " id="occup2"></div><hr>
              </div>
              <div class="col">
                <b>DOB:&nbsp;&nbsp;</b><div class="d-inline " id="dob2"></div><hr>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <b>Nominee Name:</b><div class="d-inline p-2 "id="nominee"></div>
            </div>        
            <div class="col">
              <b>Members Count:</b><div class="d-inline p-2 "id="members_count"></div>
            </div>        
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <b>Assosciate members's name:</b><div class="d-inline p-2 "id="assosciate_members_name"></div>
            </div>    
          <!-- </div>     -->
          <hr>
          <!-- <div class="row">  -->
            <div class="col">
              <b>Assosciate members's relation with owner:</b><div class="d-inline p-2 "id="assosciate_members_reln"></div>
            </div>        
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <b>Member 2 name:</b><div class="d-inline p-1 "id="memname2"></div>
            </div>    
          <!-- </div>    
          <div class="row">  -->
            <div class="col">
              <b>Relation:</b><div class="d-inline p-1 "id="memname2reln"></div>
            </div>        
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <b>Member 3 name:</b><div class="d-inline p-2 "id="memname3"></div>
            </div>    
          <!-- </div>    
          <div class="row">  -->
            <div class="col">
              <b>Relation:</b><div class="d-inline p-2 "id="memname3reln"></div>
            </div>        
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <b>Member 4 name:</b><div class="d-inline p-2 "id="memname4"></div>
            </div>    
          <!-- </div>    
          <div class="row">  -->
            <div class="col">
              <b>Relation:</b><div class="d-inline p-2 "id="memname4reln"></div>
            </div>        
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <b>Member 5 name:</b><div class="d-inline p-2 "id="memname5"></div>
            </div>    
          <!-- </div>    
          <div class="row">  -->
            <div class="col">
              <b>Relation:</b><div class="d-inline p-2 "id="memname5reln"></div>
            </div>        
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <b>Ownership Type:</b><div class="d-inline p-2 "id="type_of_ownership"></div>
            </div>
            <div class="col">
              <b>BHK:</b><div class="d-inline p-2 "id="bhk"></div>
            </div>
        
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <b>Dimensions :</b><div class="d-inline p-2 " id="flat_dimensions"></div>
            </div>
            <div class="col">
              <b>Current Status :</b><div class="d-inline p-2 " id="flat_status"></div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <b>Vehicle Count :</b><div class="d-inline p-2 " id="flat_vehicle_count"></div>
            </div>
            <div class="col">
              <b>Pet Count :</b><div class="d-inline p-2 " id="flat_petcount"></div>
            </div>
          </div>
          <hr>
          
          <div class="row">
            <div class="col">
              <b>Vehicle Count :</b><div class="d-inline p-2 " id="flat_vehicle_count"></div>
            </div>
            <div class="col">
              <b>Pet Count :</b><div class="d-inline p-2 " id="flat_petcount"></div>
            </div>
          </div>


</div>
</div>
<div id="must">
<h5 class="mb-4"style="color:red">*<u>You can add/update your details only once</u></h5>
<div class="row">
<div class="col col-xl-9 col-12 ">
  <form action="../backend_files/resident_updateonce_info.inc.php" method="post" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label >Flat Id:</label>
        <input type="text" class="form-control" name="flat_no" id="flat_no" readonly>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="mr-sm-2" for="inlineFormCustomSelect">Type of Ownership</label>
        <select required class="custom-select mr-sm-2" name="flat_type_of_ownership" id='flat_type_of_ownership'>
          <option value="">Select</option>
          <option value="single">Single</option>
          <option value="joint">Joint</option>
        </select>
      </div>
    </div>


  <!--    <b>Owner 1 details:</b> <br>-->

    <div class="row">
      <h4 class="ml-3">Owner 1 details:</h4>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label >Name:</label>
        <input type="text" name="flat_owner1_name" class="form-control" placeholder="Name" id="o1name" required>
      </div>
      <div class="form-group col-md-6">
        <label >EmailID:</label>
        <input type="email" name="flat_owner1_email"class="form-control" placeholder="emailId" id="o1email" required>
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
          <label >Contact</label>
          <input type="tel" class="form-control" name="flat_owner1_mob" placeholder="Contact" id="o1contact" required>
        </div>
        <div class="form-group col-md-4">
          <label >Occupation</label>
          <input type="text" class="form-control" name="flat_owner1_occup" placeholder="Occupation" id="o1occ" required> 
        </div>
        <div class="form-group col-md-4">
          <label >Date of birth</label>
          <input type="date" class="form-control" name="flat_owner1_dob" placeholder="DOB" id="o1dob" required>
        </div>
    </div>

    <!--Owner 2 details:-->
    <div class="owner2">
      <div class="row" owner2>
        <h4 class="ml-3">Owner 2 details:</h4>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label >Name:</label>
          <input type="text" name="flat_owner2_name" class="form-control" placeholder="Name" id="o2name">
        </div>
        <div class="form-group col-md-6">
          <label >EmailID:</label>
          <input type="email" name="flat_owner2_email"class="form-control" placeholder="emailId" id="o2email">
        </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label >Contact</label>
            <input type="number" class="form-control" name="flat_owner2_mob" placeholder="Contact" id="o2contact">
          </div>
          <div class="form-group col-md-4">
     1       <label >Occupation</label>
            <input type="text" class="form-control" name="flat_owner2_occup" placeholder="Occupation" id="o2occ">
          </div>
          <div class="form-group col-md-4">
            <label >Date of birth</label>
            <input type="date" class="form-control" name="flat_owner2_dob" placeholder="DOB" id="o2dob">
          </div>
      </div>
    </div>

    <hr>
    <div class="row">
    <div class="form-group col-md-4">
    <p>Pictures:</p>
    </div>
    <div class="form-group col-md-5">
    </div>
    <div class="form-group col-md-3">
    <!-- <div style="padding-left:400px;"> -->
     <input type="button" onclick="zoomimg()" value="click to update pictures" class="form-control btn-outline-primary btn-block">
     <!-- </div> -->
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md-4">
      <label >Owner 1</label>
      <img src="" alt="No picture uploaded" srcset="" id="img1" width="150" height="150">
      <!-- <input class="form-control-file" type="file" name="owner1_image"> -->
    </div>
    <div class="form-group col-md-4">
      <label >Owner 2</label>
      <img src="" alt="No picture uploaded" srcset="" id="img2" width="150" height="150">
      <!-- <input class="form-control-file" type="file" name="owner2_image"> -->
    </div>
    <div class="form-group col-md-4">
      <label >Spouse</label>
      <img src="" alt="No picture uploaded" srcset="" id="img3" width="150" height="150">
      <!-- <input class="form-control-file" type="file" name="spouse_image"> -->
    </div>

    <br>
    </div>
    <hr>

    <div class="row">
      <h4 class="ml-3">Nominee:</h4>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label >Enter Nominee's name</label>
        <input type="text" class="form-control" name="nominee" id="nomineeee" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <label >Number of members</label>
        <input type="number" class="form-control" name="flat_member_count" placeholder="Number of members" id="nom" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label >Assosciate Member's Name</label>
        <input type="text" class="form-control" name="assosciate_member_name"placeholder="Name of member 1" id="amn" required>
      </div>
      <div class="form-group col-md-6">
        <label >Assosciate Member's Relation with owner</label>
        <input type="text" class="form-control"name="assosciate_member_reln" placeholder="Relation with owner" id="amr" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label >Name of member 2</label>
        <input type="text" class="form-control" name="flat_member2_name"placeholder="Name of member 2" id="m2">
      </div>
      <div class="form-group col-md-3">
        <label >Relation with owner</label>
        <input type="text" class="form-control" name="flat_member2_reln" placeholder="Relation with owner" id="r2">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label >Name of member 3</label>
        <input type="text" class="form-control"name="flat_member3_name"  placeholder="Name of member 3" id="m3">
      </div>
      <div class="form-group col-md-3">
        <label >Relation with owner</label>
        <input type="text" class="form-control" name="flat_member3_reln"  placeholder="Relation with owner" id="r3">
      </div>
      <div class="form-group col-md-3">
        <label >Name of member 4</label>
        <input type="text" class="form-control" name="flat_member4_name" placeholder="Name of member 4" id="m4">
      </div>
      <div class="form-group col-md-3">
        <label >Relation with owner</label>
        <input type="text" class="form-control" name="flat_member4_reln" placeholder="Relation with owner" id="r4">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label >Name of member 5</label>
        <input type="text" class="form-control" name="flat_member2_name"placeholder="Name of member 2" id="m5">
      </div>
      <div class="form-group col-md-3">
        <label >Relation with owner</label>
        <input type="text" class="form-control" name="flat_member2_reln" placeholder="Relation with owner" id="r5">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label >Move in date</label>
        <input type="date" class="form-control" name="flat_move_in_date"  placeholder="Vehical count" id="move_in_date">
      </div>
      <div class="form-group col-md-6">
        <label >Vehicle count</label>
        <input type="number" class="form-control" name="flat_vehicle_count"  placeholder="Vehical count" id="vc">
      </div>
      <div class="form-group col-md-6">
        <label >Vehicle description</label>
        <input type="text" class="form-control" name="flat_vehicle_description" placeholder="Vehical description" id="vd">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label >Pet count</label>
        <input type="number" class="form-control" name="flat_petcount" placeholder="Pet count" id="pc">
      </div>
      <div class="form-group col-md-6">
        <label >Pet description</label>
        <input type="text" class="form-control"name="flat_petdescription"  placeholder="Pet description" id="pd">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-12">
        <label >Maid name</label>
        <input type="text" class="form-control"name="flat_maid_name"  placeholder="Maid name" id="maidn">
      </div>
    </div>
    <div class="form-group">
      <div class="col-auto my-1">

      </div>
    </div>

    <div class="modal fade" id="con">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title ml-2" style="color:gray;"><i class="fas fa-exclamation-triangle"></i></h3>
           
              <h5><p class="row m-1 text-center" style="width:100%; color:brown;">You are about to update your information for the last time.Are you sure to update?<p></h5>
              <center><button type="submit" name="submit_owner_details" class="btn btn-success text-center btn-sm">Update Details</button></center>
        </div>
            </div>
            </div>
            </div>


      <input type="button" id="btnUpload" value="submit" class="btn btn-primary" onclick="badaalert()">
    <!-- <button type="submit" name="submit_owner_details" class="btn btn-primary text-center">Add Details</button> -->
    </form>
</div>
</div>
</div>
</div>


<form enctype="multipart/form-data" id="MyForm1">
<div class="modal" id="imgmodal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header bg-light">
            <h4 class="modal-title" id="view_flat_no">upload picture</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <div class="modal-body">
          <p class="text-danger text-small">*Picture should be of format jpg,jpeg,png</p>
      <input type="hidden" value="<?php echo $_SESSION['username']?>" name="fl">
      <input type="hidden" name="shenga" value="shenga">
      <div class="form-group">
        	<label for="proof">Owner1 picture:</label>
        	<input type="file" name="File11" id="ffiillee1" class="form-control">
        </div>
        <div class="form-group">
        	<label for="proof">Owner2 picture:</label>
        	<input type="file" name="File12" id="ffiillee2" class="form-control">
        </div>
        <div class="form-group">
        	<label for="proof">Spouse picture:</label>
        	<input type="file" name="File13" id="ffiillee3" class="form-control">
        </div>

        <div class="modal-footer">
      	<input type="button" id="btnUpload" value="submit" class="btn btn-success" onclick="updateimg()">
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
      </div>
</div>
</div>
</div>
</form>

    </div>
</div>

<?php  include './footer.html';?>
    <script>
      $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
        $('#flat_type_of_ownership').change(function(){
          if($('#flat_type_of_ownership').val()=='joint'){
            $(".owner2").show();
          }
          else{
            $(".owner2").hide();
          }
        }).change();
        resiup();
        viewuserdetails();
      });
      function badaalert(){
        $('#con').modal('show');
      }

      function resiup(){
          var df = '<?php echo $_SESSION['username']; ?>' ;
        $.ajax({
            url:'../backend_files/resident_updateonce_info.inc.php',
            type:'post',
            data:{df:df},
            success:function(data,status){

//-----------------------------------------------------------------------------------------
// $('#flat_type_of_ownership').change(function(){
//           if($('#flat_type_of_ownership').val()=='joint'){
//             $(".owner2").show();
//           }
//           else{
//             $(".owner2").hide();
//           }
//         }).change();

//-----------------------------------------------------------------------------------------

                var jd=JSON.parse(data);
                if(jd.display=="nhi"){
                  $('#must').hide();
                  $('#dikha').show();
                }
                else if((jd.message=="Data not found!")&&(jd.status==200)){
                  $('#flat_no').val('<?php echo $_SESSION['username']; ?>');
                }
                else{
                var jd=JSON.parse(data);
                $('#flat_no').val(jd.flat_no);
                if(jd.flat_type_of_ownership=='joint'){
                      $('.owner2').show();
                 }
                else{
                      $('.owner2').hide();
                 }
                $('#flat_type_of_ownership').val(jd.flat_type_of_ownership);
                 $('#o1name').val(jd.flat_owner1_name);                 
                 $('#o1email').val(jd.flat_owner1_email);
                 $('#o1contact').val(jd.flat_owner1_mob);
                 $('#o1occ').val(jd.flat_owner1_occup);
                 $('#o1dob').val(jd.flat_owner1_dob);
                 $('#o2name').val(jd.flat_owner2_name);                 
                 $('#o2email').val(jd.flat_owner2_email);
                 $('#o2contact').val(jd.flat_owner2_mob);
                 $('#o2occ').val(jd.flat_owner2_occup);
                 $('#o2dob').val(jd.flat_owner2_dob);
                 $('#nomineeee').val(jd.nominee);
                 $('#nom').val(jd.flat_member_count);
                 $('#amr').val(jd.assosciate_member_reln);
                 $('#amn').val(jd.assosciate_member_name);
                 $('#m1').val(jd.flat_member1_name);
                 $('#r1').val(jd.flat_member1_reln);
                 $('#m2').val(jd.flat_member2_name);
                 $('#r2').val(jd.flat_member2_reln);
                 $('#m3').val(jd.flat_member3_name);
                 $('#r3').val(jd.flat_member3_reln);
                 $('#m4').val(jd.flat_member4_name);
                 $('#r4').val(jd.flat_member4_reln);
                 $('#m5').val(jd.flat_member5_name);
                 $('#r5').val(jd.flat_member5_reln);
                 $('#move_in_date').val(jd.flat_move_in_date);
                 $('#vc').val(jd.flat_vehical_count);
                 $('#vd').val(jd.flat_vehical_description);
                 $('#pc').val(jd.flat_petcount);
                 $('#pd').val(jd.flat_petdescription);
                 $('#maidn').val(jd.flat_maid_name);
                 $('#img1').attr("src","../DB_docs_images/flat_owner/"+df+"/"+jd.owner1_image1);
                 $('#img2').attr("src","../DB_docs_images/flat_owner/"+df+"/"+jd.owner2_image1);
                 $('#img3').attr("src","../DB_docs_images/flat_owner/"+df+"/"+jd.spouse_image1);
                }
            }
        });
      }

      function updateimg(){
        var df = '<?php echo $_SESSION['username']; ?>' ;
         var shenga="shenga";
         var flat_no='<?php echo $_SESSION['username']?>';
        var form = $("#MyForm1");
        var params = form.serializeArray();

        var files1 = $("#ffiillee1")[0].files; 
        var pop1 = $('#ffiillee1').attr("name");  
        var files2 = $("#ffiillee2")[0].files; 
        var pop2 = $('#ffiillee2').attr("name");  
        var files3 = $("#ffiillee3")[0].files; 
        var pop3 = $('#ffiillee3').attr("name");  

        var formData = new FormData();
        formData.append(pop1, files1[0]);
        formData.append(pop2, files2[0]);
        formData.append(pop3, files3[0]);

    $(params).each(function (index, element) {
        formData.append(element.name, element.value);
    });
    //  for (var pair of formData.entries()) {
    //  console.log(pair[0]+ ' - ' + pair[1]);
    // } 
 
      $.ajax({
  		url:'../backend_files/resident_updateonce_info.inc.php',
  		type:'post',
			contentType:false,
			processData:false,
			cache:false,
  			data: formData,
			success:function(data,status){
        var jd=JSON.parse(data);
                 $('#img1').attr("src","../DB_docs_images/flat_owner/"+df+"/"+jd.owner1_image1);
                 $('#img2').attr("src","../DB_docs_images/flat_owner/"+df+"/"+jd.owner2_image1);
                 $('#img3').attr("src","../DB_docs_images/flat_owner/"+df+"/"+jd.spouse_image1);
			  $('#imgmodal').modal("hide");
        // if(response.error){
        // $('.error-text').text(response.error);
        //   $('.error').show();
        // }
			}
			});
      }

      function zoomimg(){
        $('#imgmodal').modal("show");
      }


      function viewuserdetails(){
       var id ='<?php echo $_SESSION["username"]; ?>';
      $.post("../backend_files/resident_updateonce_info.inc.php",{
        id:id
      },function(data,status){
        var dekhle = JSON.parse(data);
        $('#view_flat_no').text(dekhle.flat_no);
        var path1 = '../DB_docs_images/flat_owner/'+dekhle.flat_no+'/'+dekhle.owner1_image1;
        var path2 = '../DB_docs_images/flat_owner/'+dekhle.flat_no+'/'+dekhle.owner2_image1;
          var path3 = '../DB_docs_images/flat_owner/'+dekhle.flat_no+'/'+dekhle.spouse_image1;
          $('#owner1_image1').attr('src',path1);
          $('#owner2_image1').attr('src',path2);
          $('#spouse_image1').attr('src',path3);
         
        $('#name1').text(dekhle.flat_owner1_name);
        $('#email1').text(dekhle.flat_owner1_email);
        $('#phoneno1').text(dekhle.flat_owner1_mob);
        $('#occup1').text(dekhle.flat_owner1_occup);
        $('#dob1').text(dekhle.flat_owner1_dob);
        $('#members_count').text(dekhle.flat_member_count);
        $('#name2').text(dekhle.flat_owner2_name);
        $('#email2').text(dekhle.flat_owner2_email);
        $('#phoneno2').text(dekhle.flat_owner2_mob);
        $('#occup2').text(dekhle.flat_owner2_occup);
        $('#dob2').text(dekhle.flat_owner2_dob);
        if(dekhle.flat_type_of_ownership=='joint'){
          $('.owner2').show();
        }
        else{
          $('.owner2').hide();
        }
        $('#memname2').text(dekhle.flat_member2_name);
        $('#memname2reln').text(dekhle.flat_member2_reln);
        $('#memname3').text(dekhle.flat_member3_name);
        $('#memnae3reln').text(dekhle.flat_member3_name);
        $('#memnae4').text(dekhle.flat_member4_name);
        $('#memnae4reln').text(dekhle.flat_member4_reln);
        $('#memnae5').text(dekhle.flat_member5_name);
        $('#memnae5reln').text(dekhle.flat_member5_reln);

        $('#nominee').text(dekhle.nominee);
        $('#assosciate_members_name').text(dekhle.assosciate_member_name);
        $('#assosciate_members_reln').text(dekhle.assosciate_member_reln);
        $('#type_of_ownership').text(dekhle.flat_type_of_ownership);
        $('#flat_dimensions').text(dekhle.flat_dimensions);
        $('#flat_status').text(dekhle.flat_status);
        $('#bhk').text(dekhle.BHK);
        //$('#view_flat_parking').text(dekhle.flat_parking);
        });
     // $('#viewmodal').modal("show");

    }





      $("#menu-toggle").click(function(e) {
       e.preventDefault();
       $("#wrapper").toggleClass("toggled");
     });
     $('.container-fluid').click(function() {
   $('#wrapper').removeClass("toggled");
});
   </script>