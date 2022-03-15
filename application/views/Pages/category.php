<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Design Your Category Here! -->
<div class="Category">

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
  /* #sidebar ul li.active>a,
  a[aria-expanded="true"] {
	  color: #fff;
	 
  } */
  
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

    <div class="Category-Form container-fluid" style ="width:auto; margin-top:30px;">       
            <div class="card mx-auto" >
            <div class="card-header"  >
                <h3 >Add a New Product Category </h3>
                <h7>Add new product to be seen in the Product page</h7>
            </div>
            <!-- Product Name Part -->
            <div class="card-body">
            <?php echo form_open_multipart('main/category') ?>
            <div class="form-row">
                <div class="categoryNameForm col-md-6" style="padding:10px;">
                    <label for="categoryNameForm">Product Category Name</label>
                    <input name="categoryNameForm" type="text" class="form-control" id="categoryNameForm" placeholder="Input Name">
                </div>
            </div>
            <!-- Create Button  -->
            <button type="submit" style="margin-top: 30px;" class="btn btn-primary">Create</button>
            <?php echo form_close() ?>
            </div>
        </div>         
</div>

<!-- Category Table Container -->
<div class="Category-Table container-fluid" style="margin-top: 50px">
    <div class="card">
        <div class="card-header"  style="margin-bottom: 10px" >
            <h3>Product Categories</h3>
            <h7>Edit or Delete Product Categories here</h7>
        </div>
        <div class="card-body" style="padding: 10px;">
            <div class="table-responsive">
                <table id="category_table" class="display" width="100%">
                    <thead>
                        <tr>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>        
        </div>
    </div>
</div>


