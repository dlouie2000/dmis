<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Design Your Report Here! -->

<div class="">
    <div class="Analytical-graph container" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header">
                <h2>Analytical Report</h2>
            </div>
            
            <!-- Informations -->
            <!-- <div class="form-row" style="padding:10px;">
                <div class="totalProductsField col-md-6" style="padding:10px;">
                    <label for="totalProductsField">Total of Products Added</label>
                    <input name="totalProductsField" type="text" class="form-control" id="totalProductsField" value="1009" readonly>
                </div>
                <div class="totalProductsField col-md-6" style="padding:10px;">
                    <label for="totalProductsImportedField">Total of Products sold per week</label>
                    <input name="totalProductsImportedField" type="text" class="form-control" id="totalProductsImportedField" value="399" readonly>
                </div>
                </div> -->
                <!-- Graph here!!  -->

             
                </div>
                <div class="panel-body">
                    <div id="container"></div> 
                </div>

                <div class="panel-body">
                    <div id="monthTotalQuantity"></div>
                </div>

                
                <div class="panel-body">
                    <div id="container"></div> 
                </div>

                <div class="panel-body">
                    <div id="yearlyTotalQuantity"></div>
                </div>

<!-- Top Report Table Container -->
<div class = "row">
  <div class="Toprequestedproduct-Table col-md-6" style="margin-top: 50px">
    <div class="card">
      <div class="card-header"  style="margin-bottom: 10px">
        <h3 style= "text-align: center;">Top Requested Products</h3>
      </div>
      <div class="card-body" >
        <div class="table-responsive">
          <table id="toprequestedproduct_table" class="display" width="100%">
            <thead>
              <tr>
                <th>Product Id</th>
                <th>Product Name</th>
              </tr>
            </thead>
          </table>
        </div>    
      </div>
    </div>
  </div>
  <div class="Toprequestedproductcategory-Table col-md-6" style="margin-top: 50px">
    <div class="card">
      <div class="card-header"  style="margin-bottom: 10px">
        <h3 style= "text-align: center;">Top Requested Product Categories</h3>
      </div>
      <div class="card-body" >
        <div class="table-responsive">
          <table id="toprequestedproductcategory_table" class="display" width="100%">
            <thead>
              <tr>
                <th>Category Name</th>
                <th>Quantity</th>
              </tr>
            </thead>
          </table>
        </div>    
      </div>
    </div>
  </div>

                <!-- <div id="activeUserLineChart" style="padding:10px;"></div>
            </div>      
        </div>
    </div>
    <div class="Report-graph container" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header">
            <h2>Product Report</h2>
            </div>
            <div id="activeUsersLineChart">
            </div>
        </div>
    </div> -->
</div>
