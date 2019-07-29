<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enroll_students_model extends CI_Model {

	const TABLE_NAME = "enroll_students";
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
	public function getenrolls($user_id=null,$status=null)
	{	
		if(!empty($user_id))
		{
			$this->db->where('user_id', $user_id);
		}
		if(!empty($status))
		{
			$this->db->where('status', $status);
		}	
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getuserenrolls($member_id)
	{	
		$this->db->select("enroll_students.*, classes.class_name");
		$this->db->join("classes","classes.id=enroll_students.class_id");
		$this->db->where('enroll_students.member_id', $member_id);
		$this->db->where('enroll_students.status', 1);
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getmemberenrolls($member_id)
	{	
		$this->db->select("enroll_students.*, classes.class_name");
		$this->db->join("classes","classes.id=enroll_students.class_id");
		$this->db->where('enroll_students.member_id', $member_id);
		//$this->db->where('enroll_students.status', 1);
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function userrelatedclasses($user_id)
	{
		$this->db->select("group_concat(enroll_students.class_id) classes_id");
		$this->db->where('enroll_students.user_id', $user_id);
		$query = $this->db->get(self::TABLE_NAME);	
       	
        return $query->row_array();	
	}

	public function getuserenrollswithbatches($member_id)
	{	
		$this->db->select("enroll_students.*,enroll_students.id as enroll_student_id, classes.class_name,batch_classes.type,batch_classes.start_time,batch_classes.end_time,batch_classes.id as batch_class_id");
		$this->db->join("classes","classes.id=enroll_students.class_id");
		$this->db->join("enroll_students_batches esb","esb.enroll_student_id=enroll_students.id");
		$this->db->join("batch_classes","batch_classes.id=esb.batch_class_id");
		$this->db->where('enroll_students.member_id', $member_id);
		$this->db->where('enroll_students.status', 1);
		$this->db->group_by('enroll_students.id');

		if(!empty($status))
		{
			$this->db->where('status', $status);
		}	
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

	public function getenrollsbymember($member_id,$month,$year)
	{	
		$this->db->select("enroll_students.id,enroll_students.class_id,classes.class_name,invoice.final_amount,invoice.paid_status,invoice.id invoice_id, COALESCE(sum(payments_invoice.amount),0,sum(payments_invoice.amount)) as paid_amount");

		$this->db->join("classes","classes.id=enroll_students.class_id");

		

		$this->db->join("invoice","enroll_students.id=invoice.enroll_student_id");

		$this->db->join("payments_invoice","invoice.id=payments_invoice.invoice_id","left");

		$this->db->where('invoice.invoice_month', $month);

		$this->db->where('invoice.invoice_year', $year);

		$this->db->where('enroll_students.member_id', $member_id);

		$this->db->group_by("invoice.id");
			
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getenrollsbyactiveusers($month,$year)
	{	

		$query = $this->db->query("SELECT `enroll_students`.*,users.branch_id FROM `enroll_students` JOIN users on users.id=enroll_students.user_id  where `enroll_students`.`status` = 1 and enroll_students.id not in 
				(select enroll_student_id from invoice WHERE `invoice`.`invoice_month` = $month AND `invoice`.`invoice_year` = $year )");

		
		//$query = $this->db->get();			
        return $query->result_array();			 
	}

	public function getenrollbymonth($month,$year,$enroll_student_id)
	{	

		$query = $this->db->query("SELECT `enroll_students`.*,users.branch_id FROM `enroll_students` JOIN users on users.id=enroll_students.user_id  where `enroll_students`.`status` = 1 and enroll_students.id not in 
				(select enroll_student_id from invoice WHERE `invoice`.`invoice_month` = $month AND `invoice`.`invoice_year` = $year AND invoice.enroll_student_id=$enroll_student_id )");

		
		//$query = $this->db->get();			
        return $query->row_array();			 
	}

	public function checkenrollstudent($member_id,$class_id)
	{
		
		$this->db->where('member_id', $member_id);
		
		$this->db->where('class_id', $class_id);
		
        
        $query = $this->db->get(self::TABLE_NAME);	
       	
        return $query->row_array();	
	}

	public function getenroll($id)
	{	
		$this->db->select("enroll_students.*,users.branch_id,users.mobile,users.email");
		$this->db->join("users","users.id=enroll_students.user_id");
		$this->db->where('enroll_students.id', $id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();
				 
	}

	public function update($userDetails, $category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);				 
	}

	public function updatestatusbymember($userDetails, $category_id)
	{
		
		$this->db->where($category_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);				 
	}

	public function delete($category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->delete(self::TABLE_NAME);				 
	}
	
	public function getstudentsattendance($member_id)
	{	
		$this->db->select("enroll_students.*, classes.class_name,count(attendence_list.id) as attendance");
		$this->db->join("classes","classes.id=enroll_students.class_id","inner");
		$this->db->join("attendence_list","attendence_list.enroll_student_id=enroll_students.id","inner");
		$this->db->join("attendence","attendence.id=attendence_list.attendence_id","inner");
		$this->db->where(month(attendence.date), month(now()));
		$this->db->where('enroll_students.member_id', $member_id);
		
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
}
