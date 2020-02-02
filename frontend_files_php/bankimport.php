<?php
include './_navbar.php';

$conny = mysqli_connect("localhost", "root", "", "house");
require_once('vendor/excelphp/php-excel-reader/excel_reader2.php');
require_once('vendor/excelphp/SpreadsheetReader.php');
extract($_POST);
if (isset($_POST["import"])) {
    $montho = '';
    $montho = $_POST['month'];
    if ($montho == '') {
        echo '<script>alert("Select Correct Month !"); </script>';
    } else {
        $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

        if (in_array($_FILES["file"]["type"], $allowedFileType)) {

            $targetPath = 'vendor/uploads/' . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

            $Reader = new SpreadsheetReader($targetPath);

            $sheetCount = count($Reader->sheets());
            for ($i = 0; $i < $sheetCount; $i++) {

                $Reader->ChangeSheet($i);

                foreach ($Reader as $Row) {
                    $txndate = "";
                    if (isset($Row[0])) {
                        $timestamp = strtotime($Row[0]);
                        $dmy = date("Y-m-d h:i:s", $timestamp);
                        $txndate = $dmy;
                    }
                    $description = "";
                    if (isset($Row[1])) {
                        $description = $Row[1];
                    }
                    $chequeno = "";
                    if (isset($Row[1])) {
                        $chequeno = $Row[2];
                    }
                    $crdr = "";
                    if (isset($Row[1])) {
                        $crdr = $Row[3];
                    }
                    $amount = "";
                    if (isset($Row[1])) {
                        $amount = $Row[4];
                    }

                    if (!empty($txndate) || !empty($description) || !empty($chequeno) || !empty($crdr) || !empty($amount)) {
                        $sql = ("SELECT * FROM `bank_record_temp` WHERE dato = '" . $txndate . "' AND description = '" . $description . "' AND amount = '" . $amount . "' ");
                        $req = mysqli_query($conny, $sql);
                        $ress = mysqli_fetch_assoc($req);
                        if ($ress) {
                            $type = "danger";
                            $message = "Problem in Importing Excel Data.<br>The Data may Already Exist in the Database Please Check Before Inserting.";
                            $result = null;
                        } else {
                            $query = "INSERT INTO `bank_record_temp`(`dato`, `description`, `chequeno`, `crdr`, `amount`,`month`) 
                        values('" . $txndate . "','" . $description . "','" . $chequeno . "','" . $crdr . "','" . $amount . "','" . $montho . "')";
                            $result = mysqli_query($conny, $query);
                        }

                        if (!empty($result)) {
                            $type = "success";
                            $message = "Excel Data Imported into the Database";
                            echo ("<script>location.href = './select_categories.php';</script>");
                        } else if (empty($result)) {
                            $type = "danger";
                            $message = "Problem in Importing Excel Data.<br>The Data may Already Exist in the Database Please Check Before Inserting.";
                        }
                    }
                }
            }
        } else {
            $type = "danger";
            $message = "Invalid File Type. Upload Excel File.";
        }
    }
}
?>
<style>
    ::-webkit-file-upload-button {
        padding: 1em;
        border: 1px solid gray;

        /* margin-left:-20px; */
    }
</style>
<div class="page-header">
    <h3 class="page-title ">Add Income</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item"><a href="fintabs.php">Finance And Accounting</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Income</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <div id="response" class="<?php if (!empty($type)) {
                                        echo 'alert alert-' . $type;
                                    } ?>">


            <?php if (!empty($message)) {
                echo $message;
            } ?>
            <?php if (!empty($message)) {
                echo '<button type="button" class="close" data-dismiss="alert">x</button>';
            } ?>
        </div>

        <button type="button" class="btn btn-info m-2" data-toggle="modal" data-target="#myModal">Click here to see example</button>
        <form action="" id="formo" method="post" enctype="multipart/form-data">
            <table class="table table-bordered shadow">
                <tr>
                    <td>Select Month : </td>
                    <td><input type="month" id="month" class="form-control" name="month">
                        <p class="small" id="eror" style="color:red;display:none;">Data For This Month already Exists!</p>
                    </td>
                </tr>
                <tr>
                    <td>Choose File:</td>
                    <td><input type="file" name="file" id="file" accept=".xls,.xlsx"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" id="submit" name="import" class="btn btn-outline-success  btn-block">Import</button></td>
                </tr>
            </table>
        </form>
        <div class="row m-2">
            <div class="col col-lg-8">
            </div>
            <div class="col col-lg-4">
                <div class="card-body bg-light p-3 text-center  border border-secondary">
                    <a href="xls4_8_19.php" style="text-decoration:none;">
                        Click Here To check the Added Bank Records</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Example</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div>
                    <h3 style="color:white;background-color:red;" class="p-3">
                        NOTE : Select the highlighted columns as shown below and add to New excel (.xlsx) file and Upload </h3>
                    <img src="../assets/image/examplexls.PNG" alt="Select 5 columns from right" width="100%">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<?php include './footer.html'; ?>
<script>
    $(document).ready(function() {
        $('#file').val('');
    });
    $('#file').click(function(e) {
        var tr = $('#month').val();
        if (tr == null || tr == '') {
            e.preventDefault();
            $('#month').css("border", "2px solid red");
        }
    });
</script>

</body>

</html>