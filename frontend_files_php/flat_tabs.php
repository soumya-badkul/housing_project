<?php include './_navbar.php';?>


<div class="page-header">
    <h3 class="page-title ">Manage Flats </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Flats</li>
        </ol>
        </nav>
</div>
<div class="stretch-card">
    <div class="card">
        <div class="card-body p-0 p-2">
            <div class="row">
                <div class="col-md-3 stretch-card ">
                    <div class="card card-icon text-center">
                        <a href="flat_status.php" class="text-success">
                            <div class="card-body">
                                <i class="las la-info-circle  circle-icon mt-4 text-success bg-light icon-lg"></i>
                                <h4 class="mt-3 pb-2">Flat Status</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 stretch-card ">
                    <div class="card card-icon text-center">
                        <a href="add_flat_owner_details.php" class="text-primary">
                            <div class="card-body">
                                <i class="las la-user-plus circle-icon mt-4 bg-light text-primary icon-lg"></i>
                                <h4 class="mt-3 pb-2">Add Owner Details</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 stretch-card ">
                    <div class="card card-icon text-center">
                        <a href="tenant_add_details.php" class="text-danger">
                            <div class="card-body">
                                <i class="las la-user-friends circle-icon mt-4 text-danger bg-light icon-lg"></i>
                                <h4 class="mt-3 pb-2">Add Tenant Details</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 stretch-card ">
                    <div class="card card-icon text-center">
                        <a href="flat_edit_details.php" class="text-dark">
                            <div class="card-body">
                                <i class="las la-user-edit  circle-icon mt-4 text-dark bg-light icon-lg"></i>
                                <h4 class="mt-3 pb-2">Edit/View Resident Details</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 stretch-card ">
                    <div class="card card-icon text-center">
                        <a href="tenant_edit_details.php" class="text-info">
                            <div class="card-body">
                                <i class="las la-pen-square circle-icon mt-4 text-info bg-light icon-lg"></i>
                                <h4 class="mt-3 pb-2">Edit/View Flat Tenant Details</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  include './footer.html';?>