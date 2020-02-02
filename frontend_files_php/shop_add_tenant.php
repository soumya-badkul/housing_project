<?php include './_navbar_shop.php';?>

<div class="page-header">
    <h3 class="page-title ">Manage Tenants </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shop Tenant</li>
        </ol>
</div>
<div class="card">
    <div class="card-body">
        <div class="row ">
            <div class="col-12">
                    <h3>Added Tenant</h3>
                    <table class="table table-borderless table-responsive">
                        <tr>
                            <td class="font-weight-bold">Name : </td>
                            <td><input type="text" value="read" class="form-control" readonly></td>
                            <td class="font-weight-bold">Contact : </td>
                            <td><input type="text" value="read" class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Email : </td>
                            <td><input type="text" value="read" class="form-control" readonly></td>
                            <td class="font-weight-bold">Date Of Birth : </td>
                            <td><input type="date" class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Move In Date : </td>
                            <td><input type="date" class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-block btn-info" style="font-size:15px;">Edit Details</button>
                            </td>
                            <td>
                                <button class="btn btn-block btn-danger " style="font-size:15px;">Remove Tenant</button>
                            </td>
                        </tr>
                    </table>
                </div>
            <!-- <div class="col-1">
                <div class="btn-group dropleft">
                    <i class="las la-ellipsis-v icon-md" style="cursor:pointer;" data-toggle="dropdown"></i>
                    <div class="dropdown-menu ">
                        <button class="btn btn-gradient-info mb-2" style="font-size:15px;">Edit Details</button>
                        <button class="btn btn-gradient-danger " style="font-size:15px;">Remove Tenant</button>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="row d-none">
            <div class="col col-xl-10 col-lg-10 col-xs-10">
                <form id='tenant-form'>
                    <h4 class="">Agreement Holder Details:</h4>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <input type="hidden" name="flat_no" id="flat_no">
                            <label>Name:</label>
                            <input type="text" name='agreement_holder_name' class="form-control" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>EmailID:</label>
                            <input type="email" name='agreement_holder_email' class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label>Contact</label>
                            <input type="text" name='agreement_holder_mobile' class="form-control" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>Date of birth</label>
                            <input type="date" name='agreement_holder_dob' class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Move in date</label>
                            <input type="date" name='tenant_move_in_date' class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Move out date</label>
                            <input type="date" name='tenant_move_out_date' class="form-control">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-auto my-1">
                            <input type="hidden" name='submit_details' value='submit_details'>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-center">Add Details</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php  include './footer.html';?>
<script>
    $('#tenant-form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '../backend_files/shop_tenant_details.inc.php',
            type: "POST",
            data: $('#tenant-form').serialize(),
            success: function (data, status) {
                var response = JSON.parse(data);
                if (response.success) {
                    $('.success-text').text(response.success);
                    $('.success').show();
                    $('#tenant-form').trigger("reset");
                } else {
                    $('.error-text').text(response.error);
                    $('.error').show();
                }
            }
        });
    });
    $('.success-close').click(function () {
        $('.success').hide();
    });
    $('.error-close').click(function () {
        $('.error').hide();
    });
</script>