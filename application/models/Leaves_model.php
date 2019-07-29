<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leaves_model extends CI_Model {

	const TABLE_NAME = "leaves";
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
	
	public function getleaves($status=null,$member_id=null)
	{	
		$this->db->select("u.*,leaves.*,um.name,c.class_name,(b.branch_name) as branch_name");
		$this->db->join("users u","u.id=leaves.user_id");
		$this->db->join("branches b","b.id=u.branch_id");
		$this->db->join("enroll_students es","es.id=leaves.enroll_student_id");
		$this->db->join("classes c","c.id=es.class_id");


		$this->db->join("user_family_members um","um.id=es.member_id");

		if(!empty($status))
		{
			$this->db->where('leaves.status', $status);
		}
		if(!empty($member_id))
		{
			$this->db->where('leaves.member_id', $member_id);
		}
		//$this->db->order_by("leaves.id","desc");	
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getleavesbybranches($branch_id,$status=null,$member_id=null)
	{	
		$this->db->select("u.*,leaves.*,um.name,c.class_name,(b.branch_name) as branch_name");
		$this->db->join("users u","u.id=leaves.user_id");
		$this->db->join("branches b","b.id=u.branch_id");
		$this->db->join("enroll_students es","es.id=leaves.enroll_student_id");
		$this->db->join("classes c","c.id=es.class_id");
		//$this->db->join("branches b","b.id=leaves.branch_id");
		$this->db->where('u.branch_id', $branch_id);

		$this->db->join("user_family_members um","um.id=es.member_id");

		if(!empty($status))
		{
			$this->db->where('leaves.status', $status);
		}
		if(!empty($member_id))
		{
			$this->db->where('leaves.member_id', $member_id);
		}
		//$this->db->order_by("leaves.id","desc");	
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}


	public function getleave($id)
	{	
		$this->db->select("leaves.*,um.name,c.class_name,u.mobile,u.email,u.gcm_id,u.device_id,um.user_id,u.branch_id");
		
		$this->db->join("enroll_students es","es.id=leaves.enroll_student_id");
		$this->db->join("user_family_members um","um.id=es.member_id");
		$this->db->join("classes c","c.id=es.class_id");
		$this->db->join("users u","u.id=es.user_id");

		$this->db->where('leaves.id', $id);
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->row_array();			 
	}

	public function getleavestatus($enroll_student_id,$date)
	{
		$date1 = date("m",strtotime($date));
		$this->db->where("enroll_student_id=$enroll_student_id and month(start_date)=$date1");
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->row_array();
				 
	}

	/*public function getuserbycondition($mobile,$email)
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
	


	public function delete($product_id)
	{
		
		$this->db->where('user_id', $product_id);
		return $this->db->delete(self::TABLE_NAME);
		
	}*/
	
	public function update($userDetails, $product_id)
	{
		
		$this->db->where('id', $product_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);			 
	}
	
}
