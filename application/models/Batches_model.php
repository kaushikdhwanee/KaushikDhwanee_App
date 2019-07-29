<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Batches_model extends CI_Model {

	const TABLE_NAME = "batches";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		//$this->db->trans_start();
		$this->db->insert(self::TABLE_NAME, $userDetails);
		return $this->db->insert_id();
	}

	public function getbatches()
	{		
		$query = $this->db->get_where(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function get_batches_by_condition($condition)
	{		
		$query = $this->db->get_where(self::TABLE_NAME,$condition);			
        return $query->result_array();			 
	}
	public function getbatch($branch_id,$class_id)
	{		
		$this->db->where('class_id', $class_id);
		$this->db->where('branch_id', $branch_id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();
	}

	public function getweekdays($class_id,$branch_id)
	{	
		$this->db->select("bc.*");
		$this->db->join("batch_classes bc","bc.batch_id=b.id");
		$this->db->where('b.class_id', $class_id);
		$this->db->where('b.branch_id', $branch_id);
		$this->db->where('bc.status', 1);

		$query = $this->db->get(self::TABLE_NAME." b");		
        return $query->result_array();

	}
	

	public function update($userDetails, $category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);				 
	}

	public function delete($category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->delete(self::TABLE_NAME);	

	}
}
