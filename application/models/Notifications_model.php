<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifications_model extends CI_Model {

	const TABLE_NAME = "notifications";
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
	
	public function getnotifications($branch_id,$class_id,$user_id=null, $created_date)
	{	
		$class_id = implode(",", $class_id);

		$this->db->where("branch_id",$branch_id);
		$this->db->where("(class_id is null  or class_id in ($class_id))");
		if(!empty($user_id)){
			$this->db->where("(user_id is null or user_id=$user_id)");
		}
		$this->db->where("created_on>=",$created_date);



		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

	public function getallnotifications()
	{	
		$this->db->select("n.*, b.branch_name,c.class_name");
		$this->db->join("branches b","b.id=n.branch_id");
		$this->db->join("classes c","c.id=n.class_id","left");
		$this->db->order_by("n.id","desc");
		$query = $this->db->get(self::TABLE_NAME." n");			
        return $query->result_array();			 
	}
public function getallnotificationsbybranch($branch_id)
	{	
		$this->db->select("n.*, b.branch_name,c.class_name");
		$this->db->join("branches b","b.id=n.branch_id");
		$this->db->join("classes c","c.id=n.class_id","left");
		$this->db->where("n.branch_id",$branch_id);
		$this->db->order_by("n.id","desc");
		$query = $this->db->get(self::TABLE_NAME." n");			
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
	

	public function update($userDetails, $product_id)
	{
		
		$this->db->where('user_id', $product_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);			 
	}

	public function delete($product_id)
	{
		
		$this->db->where('user_id', $product_id);
		return $this->db->delete(self::TABLE_NAME);
		
	}*/
	
}
