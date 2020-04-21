<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends CI_Model {

	const TABLE_NAME = "invoice";
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
	public function save_batch($userDetails)
	{
		return	$this->db->insert_batch(self::TABLE_NAME, $userDetails);
	}

	public function getinvoice($condition)
	{		
		$this->db->where($condition);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();				 
	}

	public function getinvoicebyenrollid($enroll_student_id)
	{	
		$this->db->select("i.id as ionvoice_id, i.enroll_student_id, i.invoice_date, e.course_fee as balance_amount");
		$this->db->join("enroll_students e", "e.id=i.enroll_student_id");
		$this->db->join("payments_invoice pi"," pi.enroll_student_id=i.enroll_student_id and i.id=pi.invoice_id ",'left');
		$this->db->where('i.enroll_student_id',$enroll_student_id);
		$this->db->where('i.paid_status',1);
		$this->db->group_by('i.id');
		//$this->db->having("balance_amount>0");

		$query = $this->db->get(self::TABLE_NAME.' i');		
        return $query->row_array();				 
	}

	public function get_invoice_by_enroll_id($enroll_student_id)
	{	
		$this->db->select("i.*");//,(final_amount-COALESCE(sum(pi.amount),0)) as balance_amount
		$this->db->join("payments_invoice pi"," pi.enroll_student_id=i.enroll_student_id and i.id=pi.invoice_id ",'left');
		$this->db->where('i.enroll_student_id',$enroll_student_id);
		//$this->db->where('i.paid_status',1);
		//$this->db->group_by('i.id');
		//$this->db->having("balance_amount>0");
		$this->db->order_by('i.id',"desc");

		$query = $this->db->get(self::TABLE_NAME.' i');		
        return $query->row_array();				 
	}

	public function getinvoicebyusers($user_id)
	{	

		$this->db->select("(e.id) as id, (um.id) as member_id, um.name, um.user_id,c.class_name, i.id as invoice_id, i.enroll_student_id, i.invoice_month, i.invoice_year, e.course_fee, COALESCE(sum(pi.amount),0) as paid_amount, (e.course_fee-COALESCE(sum(pi.amount),0)) as balance_amount, i.comments,(e.total_sessions) as total_sessions,(e.end_date) as end_date,(e.plan) as plan,(e.sessions_per_week) as session_per_week, (e.next_fees_due_date)as due_date, um.branch_id,e.class_id");

		$this->db->join("invoice i"," i.enroll_student_id=e.id and i.paid_status=1");
		$this->db->join("payments_invoice pi"," pi.enroll_student_id=i.enroll_student_id and i.id=pi.invoice_id ",'left');
		$this->db->join("user_family_members um","um.id=e.member_id");
		$this->db->join("plans p","p.class_id=e.class_id and p.branch_id=um.branch_id",'left');
		$this->db->join("classes c","c.id=e.class_id");
		//$this->db->join("student_attendence","student_attendence.enroll_id=e.id");
		//$this->db->where("student_attendence.date<= e.start_date");
		//$this->db->where("student_attendence.date>=e.end_date");
		$this->db->where('e.user_id',$user_id);
		
		
		//$this->db->where('i.paid_status',1);
		$this->db->group_by('i.id');
		//$this->db->having("balance_amount>0");

		$query = $this->db->get('enroll_students e');		
        return $query->result_array();				 
	}
	public function getinvoicebymember($user_id)
	{	

		$this->db->select("(e.id) as id, (um.id) as member_id, um.name, um.user_id,c.class_name, i.id as invoice_id, i.enroll_student_id, i.invoice_month, i.invoice_year, e.course_fee, COALESCE(sum(pi.amount),0) as paid_amount, (e.course_fee-COALESCE(sum(pi.amount),0)) as balance_amount, i.comments,(e.total_sessions) as total_sessions,(e.end_date) as end_date,(e.plan) as plan,(e.sessions_per_week) as session_per_week, (e.next_fees_due_date)as due_date, um.branch_id,e.class_id");

		$this->db->join("invoice i"," i.enroll_student_id=e.id and i.paid_status=1");
		$this->db->join("payments_invoice pi"," pi.enroll_student_id=i.enroll_student_id and i.id=pi.invoice_id ",'left');
		$this->db->join("user_family_members um","um.id=e.member_id");
		$this->db->join("plans p","p.class_id=e.class_id and p.branch_id=um.branch_id",'left');
		$this->db->join("classes c","c.id=e.class_id");
		//$this->db->join("student_attendence","student_attendence.enroll_id=e.id");
		//$this->db->where("student_attendence.date<= e.start_date");
		//$this->db->where("student_attendence.date>=e.end_date");
		$this->db->where('e.member_id',$user_id);
		
		
		//$this->db->where('i.paid_status',1);
		$this->db->group_by('i.id');
		//$this->db->having("balance_amount>0");

		$query = $this->db->get('enroll_students e');		
        return $query->result_array();				 
	}

	public function getinvoices($branch_id=null,$month=null,$status,$date)
	{	

		$this->db->select("e.id, e.course_fee, um.name, (um.id) as member_id, um.user_id, e.end_date, c.class_name, i.id as invoice_id, i.enroll_student_id, i.invoice_month, i.invoice_year, i.final_amount, COALESCE(sum(pi.amount),0) as paid_amount, (i.final_amount-COALESCE(sum(pi.amount),0)) as balance_amount, i.comments, b.branch_name");
		$this->db->join("invoice i"," i.enroll_student_id=e.id and i.paid_status=1");
		$this->db->join("payments_invoice pi"," pi.enroll_student_id=i.enroll_student_id and i.id=pi.invoice_id ",'left');
		$this->db->join("user_family_members um","um.id=e.member_id");
		$this->db->join("classes c","c.id=e.class_id");
		$this->db->join("branches b","b.id=um.branch_id");

		if(!empty($branch_id))
		{
			$this->db->where('um.branch_id',$branch_id);
		}
		$this->db->where('e.end_date <=', $date);
		$this->db->where('e.status',$status);
		
		/*if(!empty($month))
		{
			$dat = explode("-", $month);
			$this->db->where('i.invoice_month',$dat[0]);
			$this->db->where('i.invoice_year',$dat[1]);

		}*/
		
		$this->db->group_by('i.id');

		$query = $this->db->get('enroll_students e');		
        return $query->result_array();				 
	}

	/*public function getenrollsbymember($member_id,$month,$year)
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
	public function updateinvoicestatus($invoice_id)
	{
		$query = "update invoice i join (SELECT COALESCE(sum(payments_invoice.amount),0) as paid_amount from payments_invoice where payments_invoice.invoice_id=$invoice_id) as p on p.paid_amount=i.final_amount SET i.paid_status=2 WHERE i.id=$invoice_id";	
		
		$this->db->query($query);
		
	}
	
	public function delete($category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->delete(self::TABLE_NAME);				 
	}
	public function update($userDetails,$category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);				 
	}
	public function getinvoicebyid($id){
$this->db->select("invoice.*");
$this->db->where("invoice.enroll_student_id",$id);
$this->db->where("invoice.paid_status",3);
$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();	
	}
}
