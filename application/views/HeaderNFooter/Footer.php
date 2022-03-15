<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Add all script and other footer source here! -->      
		<!-- Script Source Files -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>		
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>

		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
		
		<!-- Confirmation Messages -->
		<!-- onclick="return ConfirmDelete()" -->

		<script>
			function ConfirmDelete(){
				if (confirm("Are you sure you want to delete?")){
				return true;
				}
				else {
					return false;
				}
			}
		</script>

		<script>
			function ConfirmApprove(){
				if (confirm("Are you sure you want to Approve this request?")){
				return true;
				}
				else {
					return false;
				}
			}
		</script>

		<script>
			function ConfirmReject(){
				if (confirm("Are you sure you want to Reject this request?")){
				return true;
				}
				else {
					return false;
				}
			}
		</script>


		<!-- Product Table Page -->
		<script>
			$(document).ready( function () {
    				$('#product_table').DataTable({
					"ajax": "<?php echo base_url('main/getProducts');?>", 
					<?php if($this->session->userdata('level')==='2'):?>
						<?php elseif($this->session->userdata('level')==='1'):?>
						dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'excel',
                                className: "btn btn-success",
                                text: "Export Excel",
								title: "DoodlesManila-InboundProducts",
								exportOptions: {
       								columns: [0, 1, 2, 3, 4, 6],
								}
                            },
                            {
                                extend: 'pdf',
                                className: "btn btn-danger",
                                text: "Export PDF",
								title: "DoodlesManila-InboundProducts",
								exportOptions: {
       								columns: [0, 1, 2, 3, 4, 6],
								}
                            },
							{
                                extend: 'copy',
                                className: "btn btn-primary",
                                text: "Copy",
								exportOptions: {
       								columns: [0, 1, 2, 3, 4, 6],
								}
                            },
							{
                                extend: 'print',
                                className: "btn btn-info",
                                text: "Print",
								exportOptions: {
       								columns: [0, 1, 2, 3, 4, 6],
								}
                            },
							
                        ],
						<?php endif;?>
					 	columns : [
						{ "data" : 'productId'},
						{ "data" : 'productName' },
						{ "data" : 'productCategory' },
						{ "data" : 'productCondition' },
						{ "data" : 'productQuantity' },
						{
                        "data": 'productImage',
                        render: function(data, type, row, meta) {
							var baseurl = '<?php echo base_url('') ?>';
                            var a = '<img src="'+baseurl+'application/assets/attachments/'+data+'" style="border-radius: 10px;" width="100" height="100">';
                            return a;
                        },
                    	},
						{ "data" : 'DateTime'},
						{ "data" : 'productId',
  						render: function ( data, type, row ) {
						var baseurl = '<?php echo base_url('') ?>';
						<?php if($this->session->userdata('level')==='1'):?>
    					return '<a href="'+baseurl+'main/edit/'+data+'" ></a> <a href="'+baseurl+'main/delete/'+data+'" class="btn btn-danger" onclick="return ConfirmDelete()" <?php echo (($this->uri->segment(2)) == "edit" ? 'style="display:none;"' : null)?>> Delete</a>';
						<?php elseif($this->session->userdata('level')==='2'):?>
						return '<a href="'+baseurl+'main/edit/'+data+'" class="btn btn-primary">Edit</a> <a href="'+baseurl+'main/delete/'+data+'" " <?php echo (($this->uri->segment(2)) == "edit" ? 'style="display:none;"' : null)?>> </a>';
						<?php endif;?>
						}
						}
					]
				} );
			} );
		</script>

		<!-- Request Products Page Data Table Script -->
		<script>
			$(document).ready( function () {
    				$('#reqproduct_table').DataTable({
					"ajax": "<?php echo base_url('main/getProducts');?>", 
					 	columns : [
						{ "data" : 'productId' },
						{ "data" : 'productName' },
						{ "data" : 'productCategory' },
						{ "data" : 'productCondition' },
						{ "data" : 'productQuantity' },
						{ "data" : 'DateTime'},
						{ "data" : 'productId',
  						render: function ( data, type, row ) {
						var baseurl = '<?php echo base_url('') ?>';
    					return '<a href="'+baseurl+'main/reqproducts/'+data+'" class="btn btn-success">Select Product</a>';
						}
						}
					]
				} );
			} );
		</script>

		<!-- Status Product Table Warehouse User -->
		<script>
			$(document).ready( function () {
    				$('#statusproduct_table').DataTable({
					"ajax": "<?php echo base_url('main/getRequests');?>", //echo base url needs to change
					 	columns : [
						{ "data" : 'reqproductId' },
						{ "data" : 'productId' },
						{ "data" : 'reqproductQuantity' },
						{ "data" : 'reqDateTime' },
						{ "data" : 'reqproductStatus' },
						{ "data" : 'approveDateTime' },
						//release product button insert here	
					]
				} );
			} );
		</script>

		<!-- Status Product Table Admin User -->
		<script>
			$(document).ready( function () {
    				$('#adminstatusproduct_table').DataTable({
					"ajax": "<?php echo base_url('main/getRequestAdminView');?>", //echo base url needs to change
					 	columns : [
						{ "data" : 'reqproductId' },
						{ "data" : 'productId' },
						{ "data" : 'reqproductQuantity' },
						{ "data" : 'reqDateTime' },
						{ "data" : 'reqproductStatus' },
						{ "data" : 'approveDateTime' },	
						{ "data" : 'reqproductId',
  						render: function ( data, type, row ) {
						var baseurl = '<?php echo base_url('') ?>';
    					return '<a href="'+baseurl+'main/approve/'+data+'" class="btn btn-primary onclick="return ConfirmApprove()"">Approve</a> <a href="'+baseurl+'main/reject/'+data+'" class="btn btn-danger onclick="return ConfirmReject()"">Reject</a>';
						}
						}
					]
				} );
			} );
		</script>

		<!-- Category Table Admin/Warehouse User -->
		<script>
			$(document).ready( function () {
    				$('#category_table').DataTable({
					"ajax": "<?php echo base_url('main/getCategories');?>", //echo base url needs to change
					 	columns : [
						{ "data" : 'categoryID' },
						{ "data" : 'categoryName' },
						{ "data" : 'categoryID',
							render: function ( data, type, row ) 
							{	
								var baseurl = '<?php echo base_url('') ?>';
								return '<a href="'+baseurl+'main/deletecategory/'+data+'" class="btn btn-danger" onclick="return ConfirmDelete()" ">Delete</a>';
							}
						}
					]
				} );
			} );
		</script>

		

		<!-- Top Requested Product Table -->
		<script>
			$(document).ready( function () {
    				$('#toprequestedproduct_table').DataTable({
					"ajax": "<?php echo base_url('main/getTopReqProducts');?>", //echo base url needs to change
						 ordering: false,
						 lengthChange: false,
						 searching: false,
						 bInfo : false,
						 bPaginate: false,
						 order: [[ 1, 'asc' ]],
						 columns : [ 
						{ "data" : 'productId' },
						{ "data" : 'productName' },
					]
				} );
			} );
		</script>

		<!-- Top Requested Product Table -->
		<script>
			$(document).ready( function () {
    				$('#toprequestedproductcategory_table').DataTable({
					"ajax": "<?php echo base_url('main/getTopReqCategories');?>", //echo base url needs to change
						 ordering: false,
						 lengthChange: false,
						 searching: false,
						 bInfo : false,
						 bPaginate: false,
						 order: [[ 1, 'asc' ]],
						 columns : [ 
						{ "data" : 'productCategory' },
						{ "data" : 'count' },
					]
				} );
			} );
		</script>

        <!-- HighChart.js -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/highcharts.src.js"></script>
		<script src="<?php echo base_url(); ?>application/assets/js/charts.js"></script> 	

		
		<script type="text/javascript">
			$(function () { 
				
				var dataYear = <?php echo $dataYear; ?>;
				 
				$('#yearlyTotalQuantity').highcharts({
					chart: {
						type: 'column'
					},
					title: {
						text: 'Total Inbound Products per Year'
					},
					xAxis: {
						categories: 
						[
							<?php 
								$counter = 0;
								$length = count($year);
								foreach ($year as $list){
									if ($length-1===$counter) {
										echo $list->year;
									} else {
										echo $list->year.',';
									}
								}
							?>
						]

					},
					yAxis: {
						title: {
							text: 'Number of Products'
						}
					},
					series: [{
						name: 'Year',
						data: dataYear
					}]
				});
			});
  
		</script>
		
		<script type="text/javascript">
			$(function () { 
				var dataMonth = <?php echo $dataMonth; ?>;
				$('#monthTotalQuantity').highcharts({
					chart: {
						type: 'column'
					},
					title: {
						text: 'Total Inbound Products per Month'
					},
					xAxis: {
						categories: 
						[
							<?php
								$counter = 0;
								$length = count($month);
								foreach ($month as $list){
									if ($length-1===$counter) {
										echo '"'.date('F', strtotime($list->DateTime)).'"'.',';
									} else {
										echo '"'.date('F', strtotime($list->DateTime)).'"'.',';
									}
								}
							?>
						]
					},

					yAxis: {
						title: {
							text: 'Number of Products'
						}
					},
					series: [{
						name: 'Month',
						data: dataMonth
					}]
				});
				responsive: {
						rules: [{
							condition: {
								maxWidth: 500
							},
							chartOptions: {
								legend: {
									align: 'center',
									verticalAlign: 'bottom',
									layout: 'horizontal'
								}
							}
						}]
					}
				});
  
		</script>
</body>
</html>