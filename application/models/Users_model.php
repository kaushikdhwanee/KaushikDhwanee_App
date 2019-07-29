<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

	const TABLE_NAME = "users";
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

	public function getuser($condition_array)
	{
		$this->db->select("users.*,branches.branch_name");
		$this->db->join("branches","branches.id=users.branch_id");
		$this->db->where($condition_array);//id=$id or 
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->row_array();
				 
	}

	public function getusersbybranch($branch_id)
	{		
		$this->db->select("users.*");
		
		$this->db->where("branch_id",$branch_id);
		$this->db->group_by("users.id");

		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

	public function getusersbybranchclass($branch_id,$class_id)
	{		
		$this->db->select("u.*");

		$this->db->join("users u","u.id=e.user_id and u.branch_id = $branch_id");

		$this->db->where("e.class_id",$class_id);
		$this->db->group_by("u.id");
		$query = $this->db->get("enroll_students e");			
        return $query->result_array();			 
	}

	public function userrelatedclasses($user_id)
	{
		$this->db->select("users.*, group_concat(distinct(es.class_id)) classes_id");
		$this->db->join("enroll_students es","es.user_id=users.id and es.user_id=$user_id");
		$query = $this->db->get(self::TABLE_NAME);	
       	
        return $query->row_array();	
	}
	
	public function getusers($status=null)
	{		
		$this->db->select("users.*,user_family_members.name,user_family_members.profile_pic,user_family_members.id as member_id,user_family_members.type, group_concat(classes.class_name) as class_names, enroll_students.id as enroll_student_id,(enroll_students.total_sessions) as total_sessions");
		$this->db->join("user_family_members","user_family_members.user_id=users.id");
		$this->db->join("enroll_students","enroll_students.member_id=user_family_members.id");
		$this->db->join("classes","classes.id=enroll_students.class_id");
		


		if(!empty($status))
		{
			$this->db->where("users.status",$status);
		}
		$this->db->group_by("user_family_members.id");
		$this->db->order_by("user_family_members.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getuserbeforeenddate($date,$status=null)
	{		
		$this->db->select("users.*,enroll_students.*,user_family_members.name,user_family_members.profile_pic,user_family_members.id as member_id,user_family_members.type, group_concat(classes.class_name) as class_names, enroll_students.next_fees_due_date, enroll_students.id as enroll_student_id,(enroll_students.total_sessions) as total_sessions");
		$this->db->join("user_family_members","user_family_members.user_id=users.id");
		$this->db->join("enroll_students","enroll_students.member_id=user_family_members.id");
		$this->db->join("classes","classes.id=enroll_students.class_id");
		$this->db->where("enroll_students.next_fees_due_date >",$date);
		


		if(!empty($status))
		{
			$this->db->where("users.status",$status);
		}
		$this->db->group_by("user_family_members.id");
		$this->db->order_by("user_family_members.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getuserenrollbeforeenddate($date,$user_id){
		$this->db->select("users.*,enroll_students.*,user_family_members.name,user_family_members.profile_pic,count(student_attendence.enroll_id ) as attendence,user_family_members.id as member_id,user_family_members.type, classes.class_name, enroll_students.next_fees_due_date, enroll_students.id as enroll_student_id,(enroll_students.total_sessions) as total_sessions");
		$this->db->join("user_family_members","user_family_members.user_id=users.id");
		$this->db->join("enroll_students","enroll_students.user_id=users.id");
		$this->db->join("classes","classes.id=enroll_students.class_id");
		$this->db->join("student_attendence","student_attendence.enroll_id = enroll_students.id");
		
		$this->db->where("enroll_students.next_fees_due_date >",$date);
		$this->db->where("users.id",$user_id );
		$this->db->order_by("enroll_students.id","desc");
		
		$this->db->group_by('enroll_students.id');
	//	$this->db->group_by("user_family_members.id");
		//$this->db->order_by("user_family_members.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	


	public function getuserswithbranch($branch_id=null,$user_id=null,$status=null)
	{		
		$this->db->select("users.*,user_family_members.name,user_family_members.profile_pic,user_family_members.id as member_id,user_family_members.type, group_concat(classes.class_name) as class_names, enroll_students.id as enroll_student_id, branches.branch_name,user_family_members.user_status");
		$this->db->join("user_family_members","user_family_members.user_id=users.id");
		$this->db->join("enroll_students","enroll_students.member_id=user_family_members.id","left");
		$this->db->join("classes","classes.id=enroll_students.class_id","left");
		$this->db->join("branches","branches.id=user_family_members.branch_id","left");



		if(!empty($status))
		{
			$this->db->where("user_family_members.user_status",$status);
		}
		if(!empty($branch_id))
		{
			$this->db->where("user_family_members.branch_id",$branch_id);
		}
		if(!empty($user_id))
		{
			$this->db->where("user_family_members.id",$user_id);
		}
		$this->db->group_by("user_family_members.id");
		$this->db->order_by("user_family_members.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

	public function getusersonly($status=null)
	{		
		$this->db->select("users.*");
		if(!empty($status))
		{
			$this->db->where("users.status",$status);
		}

		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

	public function checkusermobile($mobile,$user_id=null)
	{
		
		//$this->db->select("id,username,user_type");
		$this->db->where('mobile', $mobile);
		if(!empty($user_id))
		{
			$this->db->where("id != $user_id");
		}
        
        $query = $this->db->get(self::TABLE_NAME);	
       	
        return $query->row_array();	
	}

	public function getuserinfo($id)
	{
		$this->db->select("users.*, user_family_members.name, branches.branch_name,user_family_members.id as member_id, user_family_members.profile_pic, user_family_members.branch_id,");
		$this->db->join("branches","branches.id=users.branch_id");
		$this->db->join("user_family_members","user_family_members.user_id=users.id");
		$this->db->where("users.id", $id); //id=$id or
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->row_array();				 
	}
public function getusersbyuserclass($user_id,$class_id){
	$this->db->select("users.*, user_family_members.name, branches.branch_name,user_family_members.id as member_id, user_family_members.profile_pic, user_family_members.branch_id, (enroll_students.id) as enroll_id, user_family_members.country,user_family_members.country");
	$this->db->join("branches","branches.id=users.branch_id");
	$this->db->join("enroll_students","enroll_students.user_id=users.id");
	$this->db->join("user_family_members","user_family_members.user_id=users.id");
		$this->db->where("users.id",$user_id);
		 $this->db->where("enroll_students.class_id",$class_id);
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->row_array();				 
}
	/*public function getuserbycondition($mobile,$email)
	{
		$this->db->select("users.*,count(orders.id) as orders");
		$this->db->join("orders","orders.user_id=users.user_id","left");
		$this->db->where("mobile='$mobile' or email ='$email'");//id=$id or 
		$this->db->group_by("users.user_id");
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->result_array();
				 
	}*/

	public function updatestatus($user_id)
	{
	//update users SET status = IF(status = 1, 2, 1) where upid=".$_REQUEST['user_id']
		
		$this->db->set('status', 'IF(status = 1, 2, 1)', FALSE);
        $this->db->where('user_id', $user_id); 
		return $this->db->update(self::TABLE_NAME);			 
	}
	

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
