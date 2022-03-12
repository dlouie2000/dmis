<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="Products">
    
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


    <div class="Product-Form container-fluid" style ="width:auto; margin-top:30px; font-weight: ;">    
    <?php if($this->session->userdata('level')==='1'):?>   
      
            <?php elseif($this->session->userdata('level')==='2'):?>
                <div class="card mx-auto" >

            <div class="card-header"  >
         
                <h3 >Add Product</h3>

            
            </div>
                <div class="card-body">
            <?php echo form_open_multipart('main/products') ?>
            <div class="form-row">
                <div class="productNameForm col-md-6" style="padding:10px;">
           
                    <label for="productNameForm">Product Name</label>
                   
                     
                  
                    <input name="productNameForm" type="text" class="form-control" id="productNameForm" placeholder="Input Name">
                </div>
                <!-- Product Category Part -->
                <div class="productCategoryForm col-md-6" style="padding:10px;">
                    <label for="productCategoryForm">Product Category Select</label>
                        <select class="form-control" id="productCategoryForm" name="productCategoryForm">
                        '<option value="">Select Category</option>'
                        <?php foreach($array as $list){
                        //needs to change...
                        echo '<option value="'.$list->categoryName.'"> '.$list->categoryName.' </option>';
                        }
                        ?>
                        </select>
                </div>
            </div>
             <!-- Product Condition Part -->
             <div class="form-row"> 
                <div class="productConditionForm col-md-3" style="padding:10px;">
                    <label for="productConditionForm">Product Condition</label>
                        <select class="form-control" id="productConditionForm" name="productConditionForm">
                            <option value="">Choose a condition...</option>
                            <option value="Good">Good</option>
                            <option value="Mildly Damaged">Mildly Damaged</option>
                            <option value="Repairable">Repairable</option>
                            <option value="Bad">Bad</option>
                        </select>
                </div>
                <!-- Product Quantity Part -->
                <div class="productQuantityForm col-md-3" style="padding:10px;">
                    <label for="productQuantityForm">Quantity</label>
                    <input name="productQuantityForm" type="text" class="form-control" id="productQuantityForm" placeholder="Input Quantity">
                 </div>

                <div class="DateTimeForm col-md-3"style="padding:10px;">
                    <label for=""> Date & Time</label>
                    <input type="datetime-local" name="DateTimeForm" class="form-control">
                </div>

                 <!-- Upload Button  -->
                 <div class="productImageForm col-md-3" style="padding: 10px">
                    <label for="productImageForm">Upload Product Picture</label>
                    <input name="productImageForm" type="file" class="form-control-file" id="productImageForm">
                </div>
            </div>
            <!-- Create Button  -->
            <button type="submit" style="margin-top: 30px;" class="btn btn-primary">Create</button>
            <?php echo form_close() ?>
            </div>
            </div>         
    </div>

            <?php endif;?>

           
    <!-- Product Table Container -->
    
    <div class="Product-Table container-fluid" style="margin-top: 50px">
        <div class="card">
            <div class="card-header"  style="margin-bottom: 10px" >
                <h3>Inbound Products</h3>
            </div>
            <div class="card-body" style="padding: 10px;">
            <div class="table-responsive">
            <table id="product_table" class="display" width="100%">
        <thead>
        <?php if($this->session->userdata('level')==='1'):?>
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Condition</th>
                <th>Quantity</th>
                <th>Product Picture</th>
                <th>Date</th>
                <th>Modify</th>       
            </tr>
            <?php elseif($this->session->userdata('level')==='2'):?>
                <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Condition</th>
                <th>Quantity</th>
                <th>Product Picture</th>
                <th>Date</th>
                <th>Modify</th>
                <?php endif;?>       
            </tr>
        </thead>
    </table>
            </div>
            
            </div>
    </div>
</div>

