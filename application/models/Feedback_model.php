<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_model extends CI_Model {

	const TABLE_NAME = "feedback";
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
	
	public function getfeedbacks()
	{	
		$this->db->select("u.*,feedback.*,(branches.branch_name) as branch_name");
		$this->db->join("users u","u.id=feedback.user_id");
		$this->db->join("branches","branches.id=u.branch_id");
		$this->db->order_by("feedback.id","desc");	
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
public function getfeedback($branch_id)
	{	
		$this->db->select("u.*,feedback.*,(branches.branch_name) as branch_name");
		$this->db->join("users u","u.id=feedback.user_id");
		$this->db->join("branches","branches.id=u.branch_id");
		$this->db->where("u.branch_id", $branch_id);

		$this->db->order_by("feedback.id","desc");	
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	/*public function getuser($id)
	{
		$this->db->where("user_id=$id");//id=$id or 
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->row_array();
				 
	}

	public function getuserbycondition($mobile,$email)
	{
		$this->db->where("mobile='$mobile' or email ='$email'");//id=$id or 
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->result_array();
				 
	}

	public function getuserinfo($condition_array)
	{
		$this->db->where($condition_array);//id=$id or 
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->row_array();
				 
	}

	public function updatestatus($user_id)
	{
//		update users SET status = IF(status = 1, 2, 1) where upid=".$_REQUEST['user_id']
		
		$this->db->set('status', 'IF(status = 1, 2, 1)', FALSE);
        $this->db->where('user_id', $user_id); 
		return $this->db->update(self::TABLE_NAME);			 
	}
	*/

	public function update($userDetails, $product_id)
	{
		
		$this->db->where('id', $product_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);			 
	}

	public function delete($product_id)
	{
		
		$this->db->where('id', $product_id);
		return $this->db->delete(self::TABLE_NAME);
		
	}
	
}
