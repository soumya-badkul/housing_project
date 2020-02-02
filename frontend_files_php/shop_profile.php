<?php include './_navbar_shop.php';?>
<style>
    .modal-backdrop {
        background-color: white;
        opacity: 0.5 !important;
    }

    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 0.9s linear infinite;
        /* Safari */
        animation: spin 0.9s linear infinite;
    }

    .edit,
    .edit_img {
        display: none;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @media only screen and (min-width: 300px) {
        .hideupperedit {
            display: none;
        }

        .hideloweredit {
            display: block;
        }

        .editbtn {
            position: absolute;
            bottom: 75%;
            left: 70%;
            justify-content: center;
            border-radius: 50%;
            padding: 15px;
            transform: translate(-10%, -10%);
            -ms-transform: translate(-10%, -10%);
        }

        .img-profile {
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
            height: 100%;
        }

        .name-profile {
            padding: 0.75rem 1.25rem;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            width: 100%;
            height: 100%;
        }
    }
</style>
<div class="card nonedit">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="row ">
                    <div class="col-12">
                        <?php echo'<img src="../DB_docs_images/shop/profile_images/'.$_SESSION['username'].'/'.$_SESSION['profile_pic'].'" class="shadow-sm img-profile" alt="profile">'; ?>
                    </div>
                    <div class="col-12">
                        <div class="shadow name-profile ">
                            <button id="edit_image" class="editbtn bg-gradient-danger shadow-lg text-light">
                                <i class="las la-camera icon-md"></i>
                            </button>
                            <div class="p-2 text-dark">
                                <p class="h4 font-weight-bold"> <?php echo strtolower($name) ?></p><br>
                                <p class="h4 font-weight-bold"> Unit No: <?php echo $_SESSION['username'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div><button class="btn btn-block btn-rounded shadow m-3 text-dark " id="edit_btn"
                        style="background-color:#2ee8bd"><i class="las la-edit"></i>Edit Info</button></div>
            </div>
            <div class="col-lg-1 col-12"></div>
            <div class="col-lg-7 col-12">
                <div class="mt-2 d-lg-none"></div>
                <h4 style="width:fit-content;"
                    class="ml-3 mb-1 font-weight-bold text-primary border-bottom border-success">About <i
                        class="mdi mdi-account"></i></h4>
                <hr style="margin-top:-5px;">
                <table class="table-borderless table table-responsive ">
                    <tr>
                        <td>
                            <p class="ml-2 text-secondary">Contact Information</p>
                        </td>
                        <td>
                            <p class="ml-2 text-secondary">Basic Information</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold text-info">Phone</td>
                        <td class="font-weight-bold text-info">Join Date</td>
                    </tr>
                    <tr>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $indate; ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold text-info">Email</td>
                        <td class="font-weight-bold text-info">Business Type</td>
                    </tr>
                    <tr>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $business_type; ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold text-info">Date of Birth</td>
                        <td class="font-weight-bold text-info">Ownership Type</td>
                    </tr>
                    <tr>
                        <td><?php echo $dob; ?></td>
                        <td><?php echo $type_of_ownership; ?> Owner</td>
                    </tr>
                </table>
            </div>

        </div>
        <div class="col-lg-12 mt-5">
            <h4 style="width:fit-content;" class=" mb-1 font-weight-bold text-primary border-bottom border-success">
                General Info <i class="las la-id-card"></i></h4>
            <hr style="margin-top:-5px;">
            <p class=" text-secondary">Member Information</p>
            <table class="table-borderless table table-responsive">
                <tr>
                    <td width="30%" class="text-info font-weight-bold">Name</td>
                    <td class="text-wrap"><?php echo $name2; ?></td>
                </tr>
                <tr>
                    <td width="30%" class="text-info font-weight-bold">Phone Number</td>
                    <td class="text-wrap"><?php echo $phone2; ?></td>
                </tr>
                <tr>
                    <td width="30%" class="text-info font-weight-bold">Date of Birth</td>
                    <td class="text-wrap"><?php echo $dob2; ?></td>
                </tr>
                <tr>
                    <td width="30%" class="text-info font-weight-bold">Email</td>
                    <td class="text-wrap"><?php echo $email2; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="card edit">
    <div class="card-body px-1">
        <div class="pl-3">
            <h4 style="width:fit-content;" class=" mb-1 font-weight-bold text-primary border-bottom border-success">
                General Info <i class="las la-id-card"></i></h4>

        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <p class="pl-3 text-secondary">Personal Information</p>
                <table class="table table-borderless">
                    <tr>
                        <td width="10%" class="text-info">Name</td>
                        <td><input type="text" value="<?php echo $name; ?>" id="name" class="form-control"></td>
                    </tr>
                    <tr>
                        <td width="10%" class="text-info">Phone Number</td>
                        <td><input type="text" value="<?php echo $phone; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td width="10%" class="text-info">Date of Birth</td>
                        <td><input type="text" value="<?php echo $dob; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td width="10%" class="text-info">Email</td>
                        <td><input type="text" value="<?php echo $email; ?>" class="form-control"></td>
                    </tr>
                </table>
            </div>
            <div class="col-12 col-lg-6">
                <p class="pl-3 text-secondary">Member Information</p>
                <table class="table table-borderless">
                    <tr>
                        <td width="10%" class="text-info">Member Name</td>
                        <td><input type="text" value="<?php echo $name2; ?>" id="name" class="form-control"></td>
                    </tr>
                    <tr>
                        <td width="10%" class="text-info">Phone Number</td>
                        <td><input type="text" value="<?php echo $phone2; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td width="10%" class="text-info">Date of Birth</td>
                        <td><input type="text" value="<?php echo $dob2; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td width="10%" class="text-info">Business Type</td>
                        <td><input type="text" value="<?php echo $email2; ?>" class="form-control"></td>
                    </tr>
                </table>
            </div>
            <div class="col-12 col-lg-6">
                <p class="pl-3 text-secondary">Basic Information</p>
                <table class="table table-borderless">
                    <tr>
                        <td width="10%" class="text-info">Ownership Type</td>
                        <td><input type="text" value="<?php echo $type_of_ownership; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td width="10%" class="text-info">Business Type</td>
                        <td><input type="text" value="<?php echo $business_type; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td width="10%" class="text-info">Join Date</td>
                        <td><input type="text" value="<?php echo $indate; ?>" id="name" class="form-control"></td>
                    </tr>
                </table>
            </div>
        </div>
        <button class="btn btn-rounded shadow btn-gradient-info m-4"><i class="las la-paper-plane icon-md"></i>
            Update</button>
        <button class="btn btn-rounded shadow btn-danger m-4" id="cancel"><i class="mdi mdi-close icon-md"></i>
            Cancel</button>

    </div>
</div>
<div class="card edit_img">
    <div class="card-body border border-dark px-5">
        <center class="mx-5">
            <div class="pb-5 ">
                <h4 style="width:fit-content;" class=" mb-1 font-weight-bold text-dark border-bottom border-success">
            Profile Picture <i class="las la-id-card"></i></h4>
            </div>
            
            <input type="file" class="fileToUpload m-3" id="abcds"></input><br>

            <!-- <input type='file' id="newimage" class="fileToUpload" onchange="readURL(this);" /><br><br> -->
            <p class="text-danger small">Square Image Recommeded.</p>
            <div style="width:170px;height:auto;" class="border border-secondary p-2">
                Image Preview
                <img id="blah" src="" alt="" />
            </div>
            <button class="btn w-25 btn-outline-success" onclick="uploadFile()">Upload</button>
            <button id="imgcancel" class="btn btn-success mt-3">Cancel</button>
    </div>
    </center>

</div>
</div>
</div>


<div class="modal" id="loader">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color:transparent;border:none;">
            <center>
                <div class="loader"></div>
            </center>
        </div>
    </div>
</div>


<?php  include './footer.html';?>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function uploadFile(){
        var file_data = $('.fileToUpload').prop('files')[0];
        var form_data = new FormData();
        form_data.append("file",file_data);

        $.ajax({
            url: "../backend_files/shop_profile.inc.php",
            type: "POST",
            dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success:function(dat2){
                console.log(dat2);
                // if(dat2 == 1) 
                alert(dat2);
                // else alert(dat2); 
                // $('#filename').val('');
                // $('#abcds').val('');
                // setTimeout(() => {
                //     window.location.href="index.php";
                // }, 200);
            }

        });
    }
    $('#edit_btn').click(function () {
        $('#loader').modal('show');
        setTimeout(function () {
            $('#loader').modal('hide');
            $('.nonedit').hide('slow');
            $('.edit').show('slow');
        }, 1000);
    });

    $('#edit_image').click(function () {
        $('#loader').modal('show');
        setTimeout(function () {
            $('#loader').modal('hide');
            $('.nonedit').hide('slow');
            $('.edit_img').show('slow');
        }, 10);
    });

    $('#cancel').click(function () {
        $('.nonedit').show('slow');
        $('.edit').hide('slow');
    });
    $('#imgcancel').click(function () {
        $('.nonedit').show('slow');
        $('.edit_img').hide('slow');
    });
</script>