<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model {

	private $table = "productrecord";
	public function __construct() {
        parent::__construct();

        // create table if it doesn't exist 
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'productId' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'productName' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'productCategory' => array(
                'type' => 'VARCHAR',
                'constraint' =>50,
                ),
                'productCondition' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
                ),
                'productQuantity' => array(
                'type' => 'INT',
                'constraint' => 20,
                ),
                'productImage' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),
                'DateTime' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                ),               
            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('productId', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }

    //product table
    public function productList()
    {
        $this->db->select('*');
        $query = $this->db->get('productrecord');
        return $query->result();
    }
    
    //get product data by id
    public function getProductDataById($data)
    {
        return $this->db->select('*')->from($this->table)->where('productId',$data)->get()->row();
    }

    public function notification()
    {
        return $this->db->select('*')->from($this->table)->where('productQuantity <', '50' )->get()->result();
	}

    //edit and update product record
    public function updateProductRecord($data = [])
    {
        return $this->db->where('productId', $data['productId'])->update($this->table,$data);
    }

    //delete product record
    public function deleteProducts($data)
    {
        return $this->db->where('productId', $data)->delete('productrecord');
    }

    public function create($data = [])
    {
		return $this->db->insert($this->table, $data);
	}
    
}


	

    