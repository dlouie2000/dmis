<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
    
<div class="Approveproducts">
    <div>
    <h1></h1>
    </div>
</div>

<!-- Status Product Table Container -->
<div class="Statusproduct-Table container-fluid" style="margin-top: 50px">
    <div class="card">
        <div class="card-header"  style="margin-bottom: 10px" >
            <h3>Request Approval</h3>
            <h7>Select Products to Approve</h7>
        </div>
        <div class="card-body" style="padding: 10px;">
            <div class="table-responsive">
                <table id="adminstatusproduct_table" class="display" width="100%">
                    <thead>
                        <tr>
                            <th>Request Id</th>
                            <th>Product Id</th>
                            <th>Quantity to Pull Out</th>
                            <th>Date and Time</th>
                            <th>Approve Date and Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>        
        </div>
    </div>
    <div class="Statusproduct-Table container-fluid-auto" style="margin-top: 50px">
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
