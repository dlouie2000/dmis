<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- The head of your HTML Website -->
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8">
		
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
		  
      <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/HeaderNFooter/style.css">
	      
        <!-- <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css"> -->

        <!-- <script src="https://kit.fontawesome.com/0a3cb2abd3.js" crossorigin="anonymous"></script> -->

        <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->
        <!-- Developer Created Css -->
        <!-- Google Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet"> -->
        <!-- Datatables Css  -->
    
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <!-- Font Awesome -->

        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->


</head>

<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>

$(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

</script>

<div class="wrapper">
<div id="grad1">
 <nav id="sidebar">

 	
 	 <div class="sidebar-header">
    <img src="https://i.imgur.com/WGz8BdN.png" alt="profile picture" class="img-fluid  my-3 p-1 d-none d-md-block"/>
 	 </div>
 	 <ul class="lisst-unstyled components">
	  <?php if($this->session->userdata('level')==='1'):?>
 	 
 	 	<li <?php echo (($this->uri->segment(1) == '' || $this->uri->segment(1) == 'main') ? "active" : null) ?> class="active">
 	 		<a href="<?php echo base_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
 	 	  <ul class="collapse list-unstyled" id="homeSubmenu">

 	 	  </ul>
 	 	</li>
		 
 	 	<li <?php echo (($this->uri->segment(1) == 'report' || $this->uri->segment(1) == 'main') ? "active" : null) ?>>
 	 		<a href="<?php echo base_url('report')?>"><i class="fa fa-book" aria-hidden="true"></i> Report</a>
		</li>
 
        <li <?php echo (($this->uri->segment(1) == 'products' || $this->uri->segment(1) == 'main') ? "active" : null) ?>>
 	 				<a href="<?php echo base_url('products')?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Products</a>
 	 	</li>
		<li <?php echo (($this->uri->segment(1) == 'approveproducts' || $this->uri->segment(1) == 'main') ? "active" : null) ?>>
 	 				<a href="<?php echo base_url('approveproducts')?>"><i class="fa fa-tasks" aria-hidden="true"></i> Product Approval</a>
 	 	</li>
		<!-- <li <?php echo (($this->uri->segment(1) == 'reqproducts' || $this->uri->segment(1) == 'main') ? "active" : null) ?>>
 	 				<a href="<?php echo base_url('reqproducts')?>"><i class="fa fa-tasks" aria-hidden="true"></i> Request Products</a>
 	 	</li> -->
		  <!-- <li <?php echo (($this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'main') ? "active" : null) ?>>
 	 				<a href="<?php echo base_url('category')?>"><i class="fa fa-tags" aria-hidden="true"></i> Category</a>
 	 	</li> -->
		  <li></li>
		 
		  <?php elseif($this->session->userdata('level')==='2'):?>
			<!-- <li <?php echo (($this->uri->segment(1) == '' || $this->uri->segment(1) == 'main') ? "active" : null) ?> class="active">
 	 		<a href="<?php echo base_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a> -->
 	 	  <ul class="collapse list-unstyled" id="homeSubmenu">

 	 	  </ul>
 	 	</li>
        <li <?php echo (($this->uri->segment(1) == 'products' || $this->uri->segment(1) == 'main') ? "active" : null) ?>>
 	 				<a href="<?php echo base_url('products')?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Products</a>
 	 	</li>
		<!-- <li <?php echo (($this->uri->segment(1) == 'approveproducts' || $this->uri->segment(1) == 'main') ? "active" : null) ?>>
 	 				<a href="<?php echo base_url('approveproducts')?>"><i class="fa fa-tasks" aria-hidden="true"></i> Approve Products</a>
 	 	</li> -->
		<li <?php echo (($this->uri->segment(1) == 'reqproducts' || $this->uri->segment(1) == 'main') ? "active" : null) ?>>
 	 				<a href="<?php echo base_url('reqproducts')?>"><i class="fa fa-tasks" aria-hidden="true"></i> Request Products</a>
 	 	</li>
		<li <?php echo (($this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'main') ? "active" : null) ?>>
 	 				<a href="<?php echo base_url('category')?>"><i class="fa fa-tags" aria-hidden="true"></i> Category</a>
 	 	</li>
		  <li></li>
		  <?php endif;?>


 	<li>
	 </ul>
	  <!-- <span class="navbar-text"> -->
      <a class="nav-link" href="<?php echo site_url('Login/logout');?>"><i class="fa fa-power-off" aria-hidden="true"></i></i>   Log out</a>
    <!-- </span> -->
	</li>
	
 </nav>
      </div>


<div id="content">
	
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  	<div class="container-fluid">
  		<button type="button" id="sidebarCollapse" class="btn  btn-info" style="background-color:#fda4ba;">
  			<i class="fas fa-align-left"></i>
  			<span>Menu</span>
  			
  		</button>
  	</div>
  	  </nav>


</body>
</html>


 	 	  	<!-- <li>
 	 	  		<a href="<?php echo base_url('')?>">Home 1</a>
 	 	  	</li>
 	 	  	<li>
 	 	  		<a href="#">Home 2</a>
 	 	  	</li> -->



	 	<!-- sub chu chu button -->
		  <!-- </li>
		  
			<li>
				<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
				<ul class="collapse list-unstyled" id="pageSubmenu">
					<li>
						<a href="#">Page 1</a>
					</li>
					<li>
						<a href="#">Page 2</a>
					</li>
				</ul> 
 	 	</li> -->
