<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
        body{
            font-family: 'Sen', sans-serif;
	  background: #fafafa;
  }
  p{
    font-family: 'Sen', sans-serif;
	  font-size: 1.1em;
	  font-weight: 300;
	  line-height: 1.7em;
	  color: #999;
  }
  a,
  a:hover,
  a:focus{
	  color: inherit;
	  text-decoration: none;
	  transition: all 0.3s;
  }
  
  /* Side Bar*/
  
  
  
  #sidebar.active {
	  margin-left: -250px;
  }
  .wrapper{
	  display: flex;
	  text-decoration: none;
	  transition: all 0.3s;
  }
  
  #sidebar{
	  min-width: 250px;
	  max-width: 250px;
	  /* background: #fda4ba; */
	  color: #fff;
	  transition: all 0.3s;
  }
  
  #grad1 {
	background-color: red; /* For browsers that do not support gradients */
	background-image: linear-gradient(#fda4ba, #CC4576);
  }
  
  
  #sidebar .sidebar-header{
	  padding: 20px;
	  /* background: #fda4ba; */
  }
  #sidebar ul.components{
	  padding: 20px 0;
	  border-bottom: 1px solid #fda4ba;;
  }
  
  #sidebar ul p{
	  color: #fff;
	  padding: 10px;
  }
  
  #sidebar ul li a{
	  padding: 10px;
	  font-size: 1.1em;
	  display: block;
  }
  
  #sidebar ul li a:hover{
	  color: #7386D5;
	  background: #fff;
  }
  #sidebar ul li.active>a,
  a[aria-expanded="true"] {
	  color: #fff;
	  /* background: #fda4ba; */
  }
  
  a[data-toggle="collapse"]{
	  position: relative;
  }
  
  .dropdown-toggle::after{
	  display: block;
	  position: absolute;
	  top: 50%;
	  right: 20%;
	  transform: translateY(-50%);
  }
  ul ul a{
	  font-size: 0.9em !important;
	  padding-left: 30px !important;
	  background: #fda4ba;
  }
  
  #content{
	  width: 100%;
	  padding: 20px;
	  min-height: 100vh;
	  transition: all 0.3s;
  }
  
  
  @media (max-width: 768px) {
	  #sidebar {
		  margin-left: -250px;
	  }
	  #sidebar.active {
		  margin-left: 0;
	  }
	  #sidebarCollapse span {
		  display: none;
	  }
  }
</style>

    <!-- Validation Error Code -->
    <?php if (validation_errors()){   
            echo '<div class="alert alert-danger container">
            '.validation_errors().'
            </div>'; 
        }
        ?>

    <!-- Success Notification Code -->
    <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success" > 
            <?php  echo $this->session->flashdata('success'); $this->session->unset_userdata ( 'success' );?>
        </div>
    <?php } ?>

    <!-- Error Notification Code -->
    <?php if ($this->session->flashdata('error')){ ?>
        <div class="alert alert-danger" > 
            <?php  echo $this->session->flashdata('error'); $this->session->unset_userdata ( 'error' );?>
        </div>
    <?php } ?>

<!-- Design Your Category Here! -->
<div class="Reqproducts">
<div class="Reqroduct-Form container-fluid" style ="width:auto; margin-top:30px; font-weight: 700;">
        <div class="card mx-auto" >
            <div class="card-header"  >
                <h3>Request Product</h3>
            </div>
            <!-- Product Name Part -->
            <div class="card-body">
                <?php echo form_open_multipart('main/reqproducts') ?>
                <div class="form-row">
                    <div class="reqproductIdForm col-md-6" style="padding:10px;">
                        <label for="reqproductIdForm">Product Id</label>
                        <input name="productIdField" type="text" class="form-control" id="productIdField" placeholder="Product Id" value="<?php echo (($this->uri->segment(3)) == "" ? null : $products->productId )?>" readonly>
                    </div> 
                       
                    <!-- Product Name Part -->
                    <div class="reqproductNameForm col-md-6" style="padding:10px;">
                        <label for="reqproductNameForm">Product Name</label>
                        <input name="reqproductNameForm" type="text" class="form-control" id="reqproductNameForm" placeholder="Product Name" value="<?php echo (($this->uri->segment(3)) == "" ? null : $products->productName)?>" readonly>
                    </div>
                </div>
             <!-- Product Quantity Part -->
            <div class="form-row"> 
            <div class="reqproductQuantityForm col-md-6" style="padding:10px;">
                    <label for="pr">Quantity</label>
                    <input name="reqproductQuantityForm" type="text" class="form-control" id="reqproductQuantityForm" placeholder="Input Quantity" value="<?php echo (($this->uri->segment(3)) == "" ? null : $products->productQuantity)?>" >
                </div>
                <!-- DateRequest -->
                 <div class="reqDateTimeForm col-md-6"style="padding:10px;">
                    <label for="">Request Date & Time</label>
                    <input type="datetime-local" name="reqDateTimeForm" class="form-control">
                </div>
            </div>    
                <!-- Request Button  -->
                <button type="submit" style="margin-top: 30px;" class="btn btn-primary">Request Product</button>
                <?php echo form_close() ?>
        </div>
    </div>         
</div>

<!-- Product Table Container -->
  <div class="Reqproduct-Table container-fluid" style="margin-top: 50px">
    <div class="card">
        <div class="card-header"  style="margin-bottom: 10px" >
            <h3>Select Products to Request</h3>
            <!-- <h7>Select Product to Release</h7> -->
        </div>
        <div class="card-body" style="padding: 10px;">
            <div class="table-responsive">
                <table id="reqproduct_table" class="display" width="100%">
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Condition</th>
                            <th>Quantity</th>
                            <th>Date and Time</th>
                            <th>Select Product</th>
                        </tr>
                    </thead>
                </table>
            </div>        
        </div>
    </div>
</div>

<!-- Status Product Table Container -->
<div class="Statusproduct-Table container-fluid" style="margin-top: 50px">
    <div class="card">
        <div class="card-header"  style="margin-bottom: 10px" >
            <h3>Product Request Status</h3>
            <h7>Select Product to Release</h7>
        </div>
        <div class="card-body" style="padding: 10px;">
            <div class="table-responsive">
                <table id="statusproduct_table" class="display" width="100%">
                    <thead>
                        <tr>
                            <th>Request Id</th>
                            <th>Product Id</th>
                            <th>Quantity to Pull Out</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Approve Date and Time</th>
                        </tr>
                    </thead>
                </table>
            </div>        
        </div>
    </div>
</div>