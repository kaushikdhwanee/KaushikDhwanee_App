<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments_model extends CI_Model {

	const TABLE_NAME = "payments";
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

	public function getpayment($id)
	{	
		$this->db->select("payments.*,user_family_members.name,users.mobile,attendence_list.attendence_id");
		$this->db->join("user_family_members","user_family_members.user_id=payments.user_id");

		$this->db->join("users","users.id=payments.user_id");
		$this->db->join("enroll_students", '$enroll_students.user_id=users.id');
        $this->db->join("attendence_list",'$attendence_list.enroll_student_id=enroll_students.id');

		$this->db->where('payments.id',$id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();				 
	}
	
	public function getpayments($condition)
	{		
		$this->db->where($condition);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->result_array();				 
	}


	/*
	public function getenrollsbymember($member_id,$month,$year)
	{	
		$this->db->select("enroll_students.id,enroll_students.class_id,classes.class_name,invoice.*");

		$this->db->join("classes","classes.id=enroll_students.class_id");

		$this->db->join("enroll_students","enroll_students.id=invoice.enroll_student_id");

		$this->db->where('invoice.invoice_month', $month);

		$this->db->where('invoice.invoice_year', $year);

		$this->db->where('enroll_students.member_id', $member_id);
			
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}*/

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
				 
	}
	public function get_categories_by_condition($condition)
	{		
		$query = $this->db->get_where(self::TABLE_NAME,$condition);			
        return $query->result_array();			 
	}
	
*/
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
