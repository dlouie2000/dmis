<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
  .square {
    background-color: #ffa1b9;
    padding: 5px;
    margin: 10px;
    text-align: center;
    border-radius: 25px;
    color: white;
  }
  table.center {
    margin-left:auto; 
    margin-right:auto;
  }
  
</style>
<!-- Design Your Report Here! -->


<div class="">
  <!-- Top Report Table Container -->

  <div class = "center" align="center">
  <div class="col-md-10" style="margin-top: 30px">
    <div class="card" >
      <div class="card-header"  style="margin-bottom: 10px">
        <h3 style= "text-align: center;">Inventory Summary</h3>
      </div>
      <div class="card-body" >
        <div class="table-responsive">
          <table class="display" width="100%">
            <thead>
              <tr>
                <th>Total Stock Quantity</th>
                <th><?php
                      foreach ($stock as $list){
                      echo $list->stock;
                      }
                    ?></th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th>Request to be Approved</th>
                <th><?php
        foreach ($request as $list){
        echo $list->request;
        }
      ?></th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th>Total Approved Request by 2022</th>
                <th><?php
        foreach ($released as $list){
        echo $list->released;
        }
      ?></th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th>Total Number of Unique Products</th>
                <th><?php
        foreach ($totNum as $list){
        echo $list->totNum;
      }
      ?></th>
              </tr>
            </thead>
          </table>
        </div>    
      </div>
    </div>
  </div>
  

  <div class = "center" align="center">


  <div class="Toprequestedproduct-Table col-md-10" style="margin-top: 30px" >
    <div class="card" >
      <div class="card-header"  style="margin-bottom: 10px">
        <h3 style= "text-align: center;">Top Requested Inbound Products</h3>
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

  <div class="Toprequestedproductcategory-Table col-md-10" style="margin-top: 30px">
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







  
      <!-- DASHBOARD SQUARES -->

<!-- <div class="container-fluid">
  <div class="row">
    <div class="col-sm square">
      <h1><b><?php
        foreach ($stock as $list){
        echo $list->stock;
        }
      ?></b></h1>
      <label>TOTAL STOCK <br> QUANTITY</label>
    </div>
    <div class="col-sm square">
      <h1><b><?php
        foreach ($request as $list){
        echo $list->request;
        }
      ?></b></h1>
      <label>REQUEST TO <br> BE APPROVED</label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm square">
      <h1><b><?php
        foreach ($released as $list){
        echo $list->released;
        }
      ?></b></h1>
      <label>TOTAL PRODUCTS <br> RELEASED BY <?php echo date('Y')?> </label>
    </div>
    <div class="col-sm square">
      <h1><b><?php
        foreach ($totNum as $list){
        echo $list->totNum;
      }
      ?></b></h1>
      <label>TOTAL NUMBER <br> OF PRODUCTS</label>
    </div>
  </div>
</div>
 -->



    <div class="Analytical-graph container" style="margin-top: 30px;">
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
