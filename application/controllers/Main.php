<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{
    public function __construct()
    {
		parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE) {
			redirect('Login');
		}

        date_default_timezone_set('Asia/Singapore');
		$this->load->helper('url');
		$this->load->library('session');
        $this->load->model('category_model');
        $this->load->model('inventory_model');
        $this->load->model('reqproduct_model');
        $this->load->model('dashboard_model');
        $this->load->model('report_model');
        $this->load->model('charts_model');
	}
	public function index()
	{
        $data['notif'] = $this->inventory_model->notification();
        $data['top'] = $this->reqproduct_model->topRequestedProducts();

        $data['stock'] = $this->dashboard_model->totalStockQuantity();
        $data['request'] = $this->dashboard_model->requestToBeApproved();
        $data['released'] = $this->dashboard_model->totalProductsReleased();
        $data['totNum'] = $this->dashboard_model->totalNumberOfProducts();


        if($this->session->userdata('level')==='1') {
            $this->load->view('HeaderNFooter/Header');
            $this->load->view('Pages/home', $data);
            $this->load->view('HeaderNFooter/Footer');
		} 
        elseif($this->session->userdata('level')==='2') {
            $this->load->view('HeaderNFooter/Header');
            // $this->load->view('Pages/home', $data);
            $this->load->view('HeaderNFooter/Footer');
        }

        else {
            redirect('Login');
        }
			
        // $this->load->view('HeaderNFooter/Header');
		// $this->load->view('Pages/home');
        // $this->load->view('HeaderNFooter/Footer');
	}

    // public function category()
	// { 
    //     $this->load->view('HeaderNFooter/Header');
	// 	   $this->load->view('Pages/category');
    //     $this->load->view('HeaderNFooter/Footer');
	// }
    
    //request products page/request product and have a pending status
    public function reqproducts()
	{
        $data['products'] = $this->inventory_model->getProductDataById($this->uri->segment(3));

        //form validations
        $this->form_validation->set_rules('reqproductQuantityForm', 'Product Quantity' ,'required|max_length[30]');
        $this->form_validation->set_rules('reqDateTimeForm', 'Date' ,'required|max_length[30]');
        
        //create request form
        $data['document'] = (object)$postData = array(
            'reqproductId' => "REQPRD-".$this->randStrGen(2,7),
            'productId' => $this->input->post('productIdField'),
            'reqproductQuantity' => $this->input->post('reqproductQuantityForm'),
            'reqDateTime' => $this->input->post('reqDateTimeForm'),
            'reqproductStatus' => "Pending",
            'approveDateTime' => "Pending",
        );

        if($this->form_validation->run() === true){ 
            if($this->reqproduct_model->createrequest($postData)){
               $this->session->set_flashdata('success','Add Success');
            }
            else{
               $this->session->set_flashdata('error','Add Failed');
            }
            redirect('reqproducts');
        }          
        else{
            $this->load->helper('form');
            $this->load->view('HeaderNFooter/Header');
            $this->load->view('Pages/reqproducts', $data);
            $this->load->view('HeaderNFooter/Footer');
        }
	}

    //approve products page/approve products and error statement wherein user cant exceeds in product stock
    public function approve()
    {
        $data['document'] = (object)$postData = array(
            'reqproductId' => $this->uri->segment(3),
            'reqproductStatus' => "Approved", 
            'approveDateTime' => date('Y-m-d H:i:s'), 
        );


        $status = $this->reqproduct_model->updateReqproductRecord($postData);
        if($status === TRUE){
            $this->session->set_flashdata('success','Success');             
        }
        else if($status == 'stockError'){
            $this->session->set_flashdata('error','Request quantity exceeds Product Stock.');  
        }
        else{
            $this->session->set_flashdata('error','Failed');  
        }
        redirect('approveproducts');
    }

    //approve products page/reject products
    public function reject()
    {
        $data['document'] = (object)$postData = array(
            'reqproductId' => $this->uri->segment(3),
            'reqproductStatus' => "Rejected",   
        );
        
        if($this->reqproduct_model->rejectReqproductRecord($postData)){
            $this->session->set_flashdata('error','Request Rejected');             
            }
            else{
                $this->session->set_flashdata('error','Failed');  
            }
            redirect('approveproducts');
    }

    //products page/create new product
    public function products()
	{ 
         // form validation
         $this->form_validation->set_rules('productNameForm', 'Product Name' ,'required|max_length[50]');
         $this->form_validation->set_rules('productCategoryForm', 'Product Category' ,'required|max_length[30]');
         $this->form_validation->set_rules('productQuantityForm', 'Product Quantity' ,'required|max_length[30]');
         $this->form_validation->set_rules('productConditionForm', 'Product Condition' ,'required|max_length[30]');
         //$this->form_validation->set_rules('productImageForm', 'Product Image' ,'required|max_length[30]'); need to update
         $this->form_validation->set_rules('DateTimeForm', 'Date' ,'required|max_length[30]');

         if (empty($_FILES['productImageForm']['name'])) {
            $this->form_validation->set_rules('attachment','attachment','required');
        }

        $data['array'] = $this->category_model->getCategoryName();

        $config['upload_path']   = APPPATH.'assets/attachments';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 0;
        $config['max_width']     = 0;
        $config['max_height']    = 0;
        $config['overwrite']     = true;
        
        $this->load->library('upload');
        $this->upload->initialize($config);

        $name = 'productImageForm';
        
        //create new product
        $data['document'] = (object)$postData = array(
            'productId' => "PRD-".$this->randStrGen(2,7),
            'productName' => $this->input->post('productNameForm'),
            'productCategory' => $this->input->post('productCategoryForm'),
            'productQuantity' => $this->input->post('productQuantityForm'),
            'productCondition' => $this->input->post('productConditionForm'),
            'DateTime' => $this->input->post('DateTimeForm'),
        );
        
        //add products
         if($this->form_validation->run() === true){
            if ( ! $this->upload->do_upload($name)){
                $this->session->set_flashdata('error', $this->upload->display_errors());       
            }
            else{

                $upload = $this->upload->data();
                $postData ['productImage'] = $upload ['file_name'];
                
                if($this->inventory_model->create($postData)){
                    $this->session->set_flashdata('success','Add Success');
                 }
                 else{
                    $this->session->set_flashdata('error','Add Failed');
                 }
            }
            redirect('products');   
         }          
         else{
             $this->load->helper('form');
             $this->load->view('HeaderNFooter/Header');
             $this->load->view('Pages/products',$data);
             $this->load->view('HeaderNFooter/Footer');
         }
	}

    //products page/edit and update product by product id
    public function edit($id = "")
    {
        //load data
        $data['products'] = $this->inventory_model->getProductDataById($this->uri->segment(3));
        $data['array'] = $this->category_model->getCategoryName();
       
        //form validations
         $this->form_validation->set_rules('productNameForm', 'Product Name' ,'required|max_length[50]');
         $this->form_validation->set_rules('productCategoryForm', 'Product Category' ,'required|max_length[30]');
         $this->form_validation->set_rules('productQuantityForm', 'Product Quantity' ,'required|max_length[30]');
         $this->form_validation->set_rules('productConditionForm', 'Product Condition' ,'required|max_length[30]');
         $this->form_validation->set_rules('DateTimeForm', 'Date' ,'required|max_length[30]');

         

         $config['upload_path']   = APPPATH.'assets/attachments';
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size']      = 0;
         $config['max_width']     = 0;
         $config['max_height']    = 0;
         $config['overwrite']     = true;
         
         $this->load->library('upload');
         $this->upload->initialize($config);
 
         $name = 'productImageForm';
        

        //get Data
        $data['document'] = (object)$postData = array(
            'productId' => $this->input->post('productIdField'),
            'productName' => $this->input->post('productNameForm'),
            'productCategory' => $this->input->post('productCategoryForm'),
            'productQuantity' => $this->input->post('productQuantityForm'),
            'productCondition' => $this->input->post('productConditionForm'),
            'DateTime' => $this->input->post('DateTimeForm'),   
        );

         //save data
        if($this->form_validation->run() === true){ 
            if (empty($_FILES['productImageForm']['name'])) {
                $this->form_validation->set_rules('attachment','attachment','required');
                
                if($this->inventory_model->updateProductRecord($postData)){
                    $this->session->set_flashdata('success','Update Success');             
                }
                else{
                    $this->session->set_flashdata('error','Update Failed');  
                }
            }
            else { 
                if ( ! $this->upload->do_upload($name)) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());       
                }
                else { 

                    $upload = $this->upload->data();
                    $postData ['productImage'] = $upload ['file_name'];

                    $query = $this->inventory_model->getProductDataById($this->input->post('productIdField'));
                    $imgfile = $query->productImage;
                    unlink(APPPATH.'/assets/attachments/'.$imgfile);
                    
                    if($this->inventory_model->updateProductRecord($postData)){
                        $this->session->set_flashdata('success','Update Success');             
                    }
                    else {
                        $this->session->set_flashdata('error','Update Failed');  
                    }
                }          
            }
            redirect('products');
        } 
        else {
            if(validation_errors()){
                $this->session->set_flashdata('error',validation_errors());
                redirect('main/edit/'.$postData['productId']);
            }
           else{
            $this->load->view('HeaderNFooter/Header');
            $this->load->view('Pages/productseditpage',  $data);
            $this->load->view('HeaderNFooter/Footer'); 
           }
        }
    }

    //products page/delete products in datatables
    public function delete($data)
    {   
        $query = $this->inventory_model->getProductDataById($data);
        $imgfile = $query->productImage;

        if($this->inventory_model->deleteProducts($data)){
            unlink(APPPATH.'/assets/attachments/'.$imgfile);
            $this->session->set_flashdata('success','Delete Success');
        }
        else{
            $this->session->set_flashdata('error','Delete Failed');
         }
        redirect('products');
    }

    public function deletecategory($data)
    {
        if($this->category_model->deleteCategories($data)){
            $this->session->set_flashdata('success','Delete Success');
         }
         else{
            $this->session->set_flashdata('error','Delete Failed');
         }
        redirect('category');
    }

    //products page/get products that is entered in the database and load it in the table
    public function getProducts()
    {
      $products = $this->inventory_model->productList();
      $json_data['data'] = $products;
      echo json_encode($json_data);
    }

    public function getTopReqProducts()
    {
      $top = $this->reqproduct_model->topRequestedProducts();
      $json_data['data'] = $top;
      echo json_encode($json_data);
    }

    public function getTopReqCategories()
    {
      $topctrgy = $this->reqproduct_model->topRequestedCategories();
      $json_data['data'] = $topctrgy;
      echo json_encode($json_data);
    }

    //request products page/get request products that is entered in the database and load it in the table
    public function getRequests()
    {
      $reqproducts = $this->reqproduct_model->reqproductList();
      $json_data['data'] = $reqproducts;
      echo json_encode($json_data);
    }

    public function getCategories()
    {
      $categories = $this->category_model->categoryList();
      $json_data['data'] = $categories;
      echo json_encode($json_data);
    }

    //approve products page/get request products that is entered in the database and load it in the table
    public function getRequestAdminView(){
        $reqproducts = $this->reqproduct_model->reqproductListAdminView();
        $json_data['data'] = $reqproducts;
        echo json_encode($json_data);
    }

    //products page/create new category
    public function category()
	{ 
    // form validation
    $this->form_validation->set_rules('categoryNameForm', 'Category Name' ,'required|max_length[30]');

    $data['array'] = $this->category_model->getCategoryName();
        
        //create new category
        $data['document'] = (object)$postData = array(
            'categoryID' => "CTGRYPRD-".$this->randStrGen(2,7),
            'categoryName' => $this->input->post('categoryNameForm'),
        );
        
        //add products
         if($this->form_validation->run() === true){ 
             if($this->category_model->createcategory($postData)){
                $this->session->set_flashdata('success','Add Success');
             }
             else{
                $this->session->set_flashdata('error','Add Failed');
             }
             redirect('category');
         }          
         else{
             $this->load->helper('form');
             $this->load->view('HeaderNFooter/Header');
             $this->load->view('Pages/category', $data);
             $this->load->view('HeaderNFooter/Footer');
         }
	}

    
    
    // public function home()
    // {
    //     $this->load->view('header');
    //     $this->load->view('Pages/home');
    //     $this->load->view('footer');
    // }

    public function report()
	{
        $data['dataYear'] = $this->charts_model->yearlyTotalQuantity();
        $data['year'] = $this->charts_model->getYear();

        $data['dataMonth'] = $this->charts_model->monthTotalQuantity();
        $data['month'] = $this->charts_model->getMonth();
        
        $this->load->view('HeaderNFooter/Header');
		$this->load->view('Pages/report');
        $this->load->view('HeaderNFooter/Footer', $data);
	}

    public function scan()
	{
        $this->load->view('HeaderNFooter/Header');
		$this->load->view('Pages/scan');
        $this->load->view('HeaderNFooter/Footer');
	}

    public function approveproducts()
	{
        $this->load->view('HeaderNFooter/Header');
		$this->load->view('Pages/approveproducts');
        $this->load->view('HeaderNFooter/Footer');
	}

    //random id generator for the id's in the website
    public function randStrGen($mode = null, $len = null){
        $result = "";
        if($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 4):
            $chars = "0123456789";
        endif;

        $charArray = str_split($chars);
        for($i = 0; $i <= $len; $i++) {
                $randItem = array_rand($charArray);
                $result .="".$charArray[$randItem];
        }
        return $result;
    }

    // public function create(){
    //     $this->load->helper('url');
    //     $this->load->model('inventory_model');
    //     $this->inventory_model->insertProductRecord();
    //     redirect('');
    // }


    // public function products(){
    //     $this->load->view('header');
    //     $this->load->view('products');
    //     $this->load->view('footer');
    // }
}

