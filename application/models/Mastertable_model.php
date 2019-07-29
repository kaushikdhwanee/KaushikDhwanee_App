<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Mastertable_model extends CI_Model
{
	const TABLE_NAME='mastertable';
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function save($userDetails)
	{
		$this->db->insert(self::TABLE_NAME, $userDetails);
		return $this->db->insert_id();
	}

	public function authentication($userid,$password,$user_type = null)
	{
		$this->db->select("id,username,user_type");
		$this->db->where('username', $userid);
        $this->db->where('password', $password);
        $query = $this->db->get(self::TABLE_NAME);			
        return $query->row_array();	
	}


	public function checkuser($userid)
	{
		//$this->db->select("id,username,user_type");
		$this->db->where('username', $userid);
        //$this->db->where('password', $password);
        $query = $this->db->get(self::TABLE_NAME);			
        return $query->row_array();	
	}
	
	public function checkusermobile($username,$user_id=null)
	{
		
		//$this->db->select("id,username,user_type");
		$this->db->where('username', $username);
		if(!empty($user_id))
		{
			$this->db->where("id != $user_id");
		}
        
        $query = $this->db->get(self::TABLE_NAME);	
       	
        return $query->row_array();	
	}

	public function checkuserbytype($userid,$type=null,$status=null)
	{
		//$this->db->select("id,username,user_type");
		$this->db->where('username', $userid);
		if(!empty($type))
		{
			$this->db->where('user_type', $type);
		}
		if(!empty($status))
		{
			$this->db->where('status', $status);
		}
		
        //$this->db->where('password', $password);
        $query = $this->db->get(self::TABLE_NAME);			
        return $query->row_array();	
	}


	public function updatestatus($user_id)
	{		
		$this->db->set('status', 'IF(status = 1, 2, 1)', FALSE);
        $this->db->where('id', $user_id); 
		return $this->db->update(self::TABLE_NAME);			 
	}

	public function update($userDetails, $user_id)
	{
		
		$this->db->where('id', $user_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);			 
	}

	public function delete($product_id)
	{
		
		$this->db->where('id', $product_id);
		return $this->db->delete(self::TABLE_NAME);
		
	}

	
	
}