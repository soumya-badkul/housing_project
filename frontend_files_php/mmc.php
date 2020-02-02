<div class="row " style="border-bottom:1px solid black">
        <div class="col-12 col-lg-6 " style="border-right:1px solid black">
          <form id="formo" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                  <td colspan="2"><h4> Fill the Details</h4> </td>
                </tr>
                <tr>
                <td colspan="2" class="font-weight-bold">A. Area Wise Contribution</td>
                </tr>
                <tr>
                  <td>Construction Costs : </td>
                  <td><input min="1" placeholder="0" type="number" id="const_cost" class="form-control"></td>
                </tr>
                <tr>
                <td colspan="2" class="font-weight-bold">B. Equal Contribution</td>
                </tr>
                <tr>
                  <td>Annual Building Insurance Amount : </td>
                  <td><input min="1" placeholder="0" type="number" id="insurance" class="form-control"></td>
                </tr>
                <tr>
                  <td>Annual Water Charges : </td>
                  <td><input min="1" placeholder="0" type="number" id="water" class="form-control"></td>
                </tr>
                <tr>
                  <td>Annual Electricity Charges : </td>
                  <td><input min="1" placeholder="0" type="number" id="electricity" class="form-control"></td>
                </tr>
                <tr>
                  <td>Annual Lift Charges : </td>
                  <td><input min="1" placeholder="0" type="number" id="lift" class="form-control"></td>
                </tr>
                <tr>
                  <td>Annual Security Charges : </td>
                  <td><input min="1" placeholder="0" type="number" id="security" class="form-control"></td>
                </tr>
                <tr>
                  <td>Annual Service Charges </td>
                  <td><input min="1" placeholder="0" type="number" id="service" class="form-control"></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="button" id="subi" class="btn btn-outline-success btn-block " value="Submit"></td>
                </tr>
            </table>
          </form>
        </div>
        <div class="pgt col-lg-6 ">
          <h5 class="text-secondary">MMC Calculation Information</h5>
          <embed class="border shadow ppdf" src="./Housing.pdf" type="application/pdf" width="100%" height="95%">
        </div>
      </div>
