<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_roles_model extends CI_Model {

	const TABLE_NAME = "admin_roles";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		$this->db->insert(self::TABLE_NAME, $userDetails);
		return $this->db->insert_id();
	}
	
	public function getroles()
	{	$this->db->select("branches.branch_name, admin_roles.*");	
		$this->db->join("branches","branches.id=admin_roles.branch_id ");
		$query = $this->db->get(self::TABLE_NAME);
		return $query->result_array();			 
	}

	public function getrole($id)
	{
		$this->db->where("admin_role_id=$id");//id=$id or 
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->row_array();
				 
	}

	public function getroleinfo($condition_array)
	{
		$this->db->where($condition_array);//id=$id or 
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->row_array();
				 
	}

	public function updatestatus($user_id)
	{
//		update users SET status = IF(status = 1, 2, 1) where upid=".$_REQUEST['user_id']
		
		$this->db->set('status', 'IF(status = 1, 2, 1)', FALSE);
        $this->db->where('admin_role_id', $user_id); 
		return $this->db->update(self::TABLE_NAME);			 
	}
	

	public function update($userDetails, $product_id)
	{
		
		$this->db->where('admin_role_id', $product_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);			 
	}

	public function delete($product_id)
	{
		
		$this->db->where('admin_role_id', $product_id);
		return $this->db->delete(self::TABLE_NAME);
		
	}
	
}
