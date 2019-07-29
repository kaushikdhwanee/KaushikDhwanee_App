<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_family_members_model extends CI_Model {

	const TABLE_NAME = "user_family_members";
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
	public function getuser($member_id)
	{
		$this->db->select("users.*,branches.branch_name,user_family_members.branch_id,user_family_members.profile_pic, user_family_members.country,user_family_members.registration_amount, user_family_members.name,user_family_members.id as member_id,user_family_members.type, group_concat(classes.class_name) as class_names, enroll_students.id as enroll_student_id, (classes.cat_id) as cat_id");
		$this->db->join("users","users.id=user_family_members.user_id");
		$this->db->join("branches","branches.id=user_family_members.branch_id");
		$this->db->join("enroll_students","enroll_students.member_id=user_family_members.id","left");
		$this->db->join("classes","classes.id=enroll_students.class_id","left");
		$this->db->where('user_family_members.id',$member_id);//id=$id or 
		$this->db->group_by("user_family_members.id");
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->row_array();
				 
	}
	public function getmembers($user_id)
	{
		$this->db->select("user_family_members.*");
		$this->db->where('user_family_members.user_id',$user_id);
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->result_array();
				 
	}
	/*public function getclasses($status=null)
	{	
		$this->db->select("classes.*, categories.category_name");	
		$this->db->join("categories","categories.id=classes.cat_id");
		if(!empty($status))
		{
			$this->db->where('classes.status', $status);
		}
		$query = $this->db->get_where(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getclass($id)
	{		
		$this->db->where('id', $id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();
				 
	}*/
	/*public function get_categories_by_condition($condition)
	{		
		$query = $this->db->get_where(self::TABLE_NAME,$condition);			
        return $query->result_array();			 
	}
	
*/
	public function update($userDetails, $user_id)
	{
		
		$this->db->where('id', $user_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);				 
	}

	public function delete($category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->delete(self::TABLE_NAME);				 
	}
}
