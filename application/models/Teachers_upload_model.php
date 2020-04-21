<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachers_upload_model extends CI_Model {

	const TABLE_NAME = "teacher_upload";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		$this->db->insert_batch(self::TABLE_NAME, $userDetails);
		return $this->db->insert_id();
	}
	
	public function savedata($userDetails)
	{
		return	$this->db->insert(self::TABLE_NAME, $userDetails);
	}

	public function teacher_upload($user_id){
		
   $this->db->select("group_concat(uploads)as uploads,group_concat(videos)as video,group_concat(message) as message, created_on, users.*, user_family_members.name, classes.class_name");
   $this->db->join("enroll_students","enroll_students.id=teacher_upload.enroll_student_id");
   $this->db->join("users","users.id=enroll_students.user_id");
   $this->db->join("user_family_members","user_family_members.id=enroll_students.member_id");
   $this->db->join("classes","classes.id=enroll_students.class_id");
   $this->db->where("users.id",$user_id);
		$this->db->group_by("enroll_students.id");
   $this->db->group_by("teacher_upload.created_on");
   
   $query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();	

	}
	public function teacher_uploadbyid($enroll_id){
		
   $this->db->select("group_concat(uploads)as uploads,group_concat(videos)as video,group_concat(message) as message, created_on, user_family_members.name, classes.class_name");
   $this->db->join("enroll_students","enroll_students.id=teacher_upload.enroll_student_id");
  // $this->db->join("users","users.id=enroll_students.user_id");
   $this->db->join("user_family_members","user_family_members.id=enroll_students.member_id");
   $this->db->join("classes","classes.id=enroll_students.class_id");
   $this->db->where("enroll_students.id",$enroll_id);
		//$this->db->group_by("enroll_students.id");
   $this->db->group_by("teacher_upload.created_on");
   
   $query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();	

	}
	/*public function getleaves()
	{	
		$this->db->select("u.*,leaves.*");
		$this->db->join("users u","u.id=leaves.user_id");
		$this->db->order_by("leaves.id","desc");	
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

	public function getuser($id)
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
	}*/
	


	public function delete($product_id)
	{
		
		$this->db->where('attendence_id', $product_id);
		return $this->db->delete(self::TABLE_NAME);
		
	}
	
	public function update($userDetails, $product_id)
	{
		
		$this->db->where('id', $product_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);			 
	}
	
}
