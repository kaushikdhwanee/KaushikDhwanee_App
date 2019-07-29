<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promotional_offers_model extends CI_Model {

	const TABLE_NAME = "promotional_offers";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		return	$this->db->insert(self::TABLE_NAME, $userDetails);
	}
	public function get_promotions($status=null)
	{	
		$this->db->select("promotional_offers.*,branches.branch_name");	
		$this->db->join("branches","branches.id= promotional_offers.branch_id");
		if(!empty($status))
		{
			$this->db->where('promotional_offers.status', $status);
		}

		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

	public function checkpromotion($condition_array)
	{	

		$this->db->where($condition_array);
		
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->row_array();			 
	}

	/*public function get_categories_by_condition($condition)
	{		
		$query = $this->db->get_where(self::TABLE_NAME,$condition);			
        return $query->result_array();			 
	}*/
	public function get_promotionbybranch($category_id)
	{		
		$this->db->where('branch_id', $category_id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();
				 
	}
	public function get_promotionbybranchid($branch_id,$status=null)
	{	$this->db->select("promotional_offers.*, branches.branch_name");	
		$this->db->join("branches","branches.id= promotional_offers.branch_id");	
		$this->db->where('promotional_offers.branch_id', $branch_id);
		if(!empty($status))
		{
			$this->db->where('promotional_offers.status', $status);
		}
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->result_array();
				 
	}
	public function get_promotion($category_id)
	{	
		$this->db->select("promotional_offers.*,branches.branch_name");	
		$this->db->join("branches","branches.id= promotional_offers.branch_id");	
		$this->db->where('promotional_offers.id', $category_id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();
				 
	}

	public function update($userDetails, $category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);				 
	}

	public function statusupdate()
	{
		$this->db->where("date_add(`end_date`,INTERVAL 1 DAY)=curdate()");
		return $this->db->update(self::TABLE_NAME, array('status'=>2));	
	}

	public function delete($category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->delete(self::TABLE_NAME);				 
	}
}
