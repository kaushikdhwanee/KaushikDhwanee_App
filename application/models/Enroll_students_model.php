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
			$this->db->where('enroll_students.user_id', $user_id);
		}
		if(!empty($status))
		{
			$this->db->where('status', $status);
		}	
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getuser($user_id)
	{
		$this->db->select("enroll_students.id, enroll_students.total_sessions, count(student_attendence.enroll_id) as attendence");
		$this->db->join("student_attendence","student_attendence.enroll_id=enroll_students.id");
		$this->db->where("student_attendence.date >= enroll_students.start_date");
		$this->db->where("student_attendence.date <= enroll_students.end_date");
		$this->db->where('enroll_students.user_id',$user_id);
		$this->db->group_by('enroll_students.id');
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->result_array();
				 
	}
	

	public function getuseradv($user_id)
	{
		$this->db->select("enroll_students.id, enroll_students.total_sessions, COALESCE(count(student_attendence.enroll_id), 0) as attendence");
		$this->db->join("student_attendence","student_attendence.enroll_id=enroll_students.id","left outer");
		$this->db->where("student_attendence.date >= enroll_students.start_date");
		//$this->db->where("student_attendence.date <= enroll_students.end_date");
		$this->db->where('enroll_students.user_id',$user_id);
		$this->db->group_by('enroll_students.id');
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->result_array();
				 
	}
	public function gettotalsession($user_id)
	{
		$this->db->select("enroll_students.*");
		$this->db->where('enroll_students.user_id',$user_id);
		$this->db->group_by('enroll_students.id');
		$query = $this->db->get(self::TABLE_NAME);	
        return $query->result_array();
				 
	}

	public function getuserbeforeenddate($user_id){
		$this->db->select("enroll_students.*,user_family_members.name,user_family_members.profile_pic,user_family_members.id as member_id,user_family_members.type, classes.class_name, enroll_students.next_fees_due_date, enroll_students.id as enroll_student_id,(enroll_students.total_sessions) as total_sessions");
		$this->db->join("user_family_members","user_family_members.id=enroll_students.member_id");
		//$this->db->join("users","users.id=enroll_students.users_id");
		$this->db->join("classes","classes.id=enroll_students.class_id");
		//$this->db->join("student_attendence","student_attendence.enroll_id = enroll_students.id");
		
		//$this->db->where("enroll_students.next_fees_due_date >",$date);
		$this->db->where("enroll_students.user_id",$user_id );
		
		
		$this->db->group_by('enroll_students.id');
		
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getuserenrolls($member_id)
	{	
		$this->db->select("enroll_students.*, classes.class_name");
		$this->db->join("classes","classes.id=enroll_students.class_id");
		$this->db->where('enroll_students.member_id', $member_id);
		//$this->db->where('enroll_students.total_session', $total_session);
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
	public function getmemberenrollsbyduedate($member_id,$date)
	{	
		$this->db->select("enroll_students.*, classes.class_name");
		$this->db->join("classes","classes.id=enroll_students.class_id");
		$this->db->where('enroll_students.member_id', $member_id);
		$this->db->where("enroll_students.next_fees_due_date >",$date);
		//$this->db->where('enroll_students.status', 1);
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getusersbymemberandclass($member_id,$class_id)
	{	
		$this->db->select("enroll_students.*, classes.class_name,users.branch_id,users.mobile,users.email");
		$this->db->join("classes","classes.id=enroll_students.class_id");
		$this->db->join("users","users.id=enroll_students.user_id");
		//$this->db->join("student_attendence","student_attendence.enroll_id=enroll_students.id");
		$this->db->where('enroll_students.member_id', $member_id);
		$this->db->where('enroll_students.class_id', $class_id);
		$this->db->where('enroll_students.status', 1);
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->row_array();			 
	}
	public function userrelatedclasses($user_id)
	{
		$this->db->select("group_concat(enroll_students.class_id) classes_id");
		$this->db->where('enroll_students.user_id', $user_id);
		$query = $this->db->get(self::TABLE_NAME);	
       	
        return $query->row_array();	
	}

	public function getuserenrollswithbatches($member_id,$status)
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
			$this->db->where('status',$status);
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
		
           
     public function getenrollsbyactiveusers($date,$enddate)
	{	
        $this->db->select("enroll_students.*,users.branch_id");
        $this->db->join("users",'users.id=enroll_students.user_id');
        $this->db->where("enroll_students.status", 1);
		$this->db->where ("enroll_students.next_fees_due_date <=", $date);
		//$this->db->where ("enroll_students.status", 1);
        $this->db->where('enroll_students.id NOT IN(select enroll_student_id from invoice WHERE invoice.invoice_date <="'.$date.'" AND invoice.invoice_date >= "'.$enddate.'")');
		//$query = $this->db->query("SELECT `enroll_students`.*, users.branch_id FROM `enroll_students` JOIN users on users.id=enroll_students.user_id  where `enroll_students`.`status` = 1 and 
			//enroll_students.next_fee_due_date <= $date and enroll_students.id not in 
				//(select enroll_student_id from invoice WHERE `invoice`.`invoice_date` <= $date AND `invoice`.`invoice_end_date`>= $enddate )");

		
		//$query = $this->db->get();			
        			 
	
		
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	public function getusersenrollactive($date){
		$this->db->select("enroll_students.*");
		$this->db->where("enroll_students.status", 1);
		$this->db->where ("DATE_SUB(enroll_students.next_fees_due_date, INTERVAL 10 DAY)  <=", $date);
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();	
	}


	public function getenrollsbyactiveuser($date,$user_id)
	{	
       
     $this->db->select("enroll_students.*,users.branch_id, um.name, c.class_name, i.id as invoice_id, COALESCE(sum(pi.amount),0) as paid_amount, (enroll_students.final_amount-COALESCE(sum(pi.amount),0)) as balance_amount,");

     $this->db->join("users", "users.id = enroll_students.user_id");
     $this->db->join("invoice i","i.enroll_student_id = enroll_students.id");
     $this->db->join("user_family_members um","um.id=enroll_students.member_id");
     $this->db->join("classes c","c.id=enroll_students.class_id");
     $this->db->join("payments_invoice pi"," pi.enroll_student_id=enroll_students.id ");
     $this->db->where('enroll_students.status', 1);
     $this->db->where ('enroll_students.next_fees_due_date <=', $date);
     $this->db->where('enroll_students.user_id',$user_id);
     $this->db->group_by('users.id');
     $query = $this->db->get(self::TABLE_NAME);
     return $query->result_array();			 
	}

    //$this->db->where("enroll_student.id Not In",
    //" invoice.enroll_student_id where invoice.invoice_generated = 2");
   // $this->db->where()
     //$this->db->where('enroll_students.id')

     //$this->db->where('invoice.invoice_date', $date);
     //$this->db->where('invoice.invoice_year', $year);
     

		/*$query = $this->db->query("SELECT `enroll_students`.*, 'users.branch_id' FROM `users` JOIN users on 'users.id'='enroll_students.user_id'  where `enroll_students`.`status` = 1 and 'enroll_students.next_fees_due_date' <= $date AND 'enroll_students.id' not in 
				(select enroll_student_id from invoice WHERE `invoice`.`invoice_date` >= $date and 'invoice_date'<= $enddate)");*/

		
					
        

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
	public function getuserenrollbeforeenddate($date,$user_id,$status=null){
		$this->db->select("users.*,enroll_students.*,user_family_members.name,user_family_members.profile_pic,user_family_members.id as member_id,user_family_members.type, classes.class_name, enroll_students.next_fees_due_date, enroll_students.id as enroll_student_id,(enroll_students.total_sessions) as total_sessions");
		$this->db->join("user_family_members","user_family_members.id=enroll_students.member_id");
		$this->db->join("users","users.id=enroll_students.users_id");
		$this->db->join("classes","classes.id=enroll_students.class_id");
		$this->db->where("enroll_students.next_fees_due_date >",$date);
		$this->db->where("enroll_students.user_id",$user_id );
		if(!empty($status))
		{
			$this->db->where("users.status",$status);
		}
		$this->db->group_by('enroll_students.id');
		//$this->db->group_by("user_family_members.id");
		//$this->db->order_by("user_family_members.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
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

	public function update_batch($userDetails, $category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->update_batch(self::TABLE_NAME, $userDetails, $category_id);				 
	}


	public function updatebyuser($userDetails, $category_id)
	{
		
		$this->db->where('user_id', $category_id);
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
		$this->db->select("enroll_students.id,enroll_students.sessions_per_week, classes.class_name, count(student_attendence.enroll_id) as attendance");
		$this->db->join("classes","classes.id=enroll_students.class_id","inner");
		$this->db->join("attendence_list","attendence_list.enroll_student_id=enroll_students.id","left");
		$this->db->join("student_attendence","student_attendence.enroll_id=attendence_list.enroll_student_id and DATE_FORMAT(student_attendence.date,'%Y-%m')=DATE_FORMAT(now(),'%Y-%m')","left");
		//$this->db->where("MONTH(attendence.date)","MONTH(now())");
		$this->db->where('enroll_students.member_id', $member_id);
		$this->db->group_by('enroll_students.id');
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

	public function getstudentsattendancebysession($member_id)
	{	
		$this->db->select("enroll_students.id,enroll_students.sessions_per_week, classes.class_name, COALESCE(count(student_attendence.enroll_id),0 ) as attendance,");
		$this->db->join("classes","classes.id=enroll_students.class_id", "inner");
		$this->db->join("attendence_list","attendence_list.enroll_student_id=enroll_students.id","left");
		$this->db->join("student_attendence","student_attendence.enroll_id=enroll_students.id");
		$this->db->where("student_attendence.date >= enroll_students.start_date");
		$this->db->where("student_attendence.date <= enroll_students.end_date");
		$this->db->where('enroll_students.member_id', $member_id);
		$this->db->group_by('enroll_students.id');
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();	
}

        public function sessionenddate($enroll_id){
        	$this->db->select("enroll_students.id, student_attendence.date, enroll_students.total_sessions,");
        	$this->db->join("student_attendence",'student_attendence.enroll_id=enroll_students.id');
        	$this->db->where("student_attendence.date >= enroll_students.start_date");
        	$this->db->where("student_attendence.date <= enroll_students.end_date");
        	$this->db->where('student_attendence.enroll_id', $enroll_id);
        	$this->db->order_by("student_attendence.date", 'ASC');
        	$query = $this->db->get(self::TABLE_NAME);			
            return $query->result_array();	
}
public function attendence($enroll_id){
	$this->db->select("enroll_students.*, count(student_attendence.enroll_id) as attendence");
	$this->db->join("student_attendence",'student_attendence.enroll_id=enroll_students.id');
    $this->db->where("student_attendence.date >= enroll_students.start_date");
    $this->db->where("student_attendence.date <= enroll_students.end_date");
	$this->db->where('enroll_students.id', $enroll_id);
	$query = $this->db->get(self::TABLE_NAME);			
            return $query->row_array();	
}
public function attendencebyuser($user_id){
	$this->db->select("users.id, enroll_students.id, count(student_attendence.enroll_id) as attendence, enroll_students.total_sessions");
	$this->db->join("users", "users.id=enroll_students.user_id");
	$this->db->join("student_attendence",'student_attendence.enroll_id=enroll_students.id');
    $this->db->where("student_attendence.date >= enroll_students.start_date");
    $this->db->where("student_attendence.date <= enroll_students.end_date");
	$this->db->where('users.id', $user_id);
	$this->db->order_by("enroll_students.id", 'DSC');
	$query = $this->db->get(self::TABLE_NAME);			
            return $query->result_array();	
}    

        public function getattendence($member_id)
	{	
		$this->db->select("enroll_students.id,count(student_attendence.enroll_id ) as attendance,");
		
		//$this->db->join("attendence_list","attendence_list.enroll_student_id=enroll_students.id","left");
		$this->db->join("student_attendence","student_attendence.enroll_id=enroll_students.id");
		$this->db->where("student_attendence.date >= enroll_students.start_date");
		$this->db->where("student_attendence.date <= enroll_students.end_date");
		$this->db->where('enroll_students.member_id', $member_id);
		$this->db->group_by('enroll_students.id');

		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();	
}

	public function getstudentattendancebyenrollid($enroll_id)
	{	
		$this->db->select("enroll_students.id,student_attendence.date");
		$this->db->join("classes","classes.id=enroll_students.class_id","inner");
		//$this->db->join("attendence_list","attendence_list.enroll_student_id=enroll_students.id");
		$this->db->join("student_attendence","student_attendence.enroll_id=enroll_students.id");
		//$this->db->where("MONTH(attendence.date)","MONTH(now())");
		$this->db->where('enroll_students.id', $enroll_id);
		
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

	public function getstudentsattendancebymonth($date,$enroll_id)
	{	
		$this->db->select("enroll_students.id,student_attendence.date");
		$this->db->join("classes","classes.id=enroll_students.class_id","inner");
		//$this->db->join("attendence_list","attendence_list.enroll_student_id=enroll_students.id");
		$this->db->join("student_attendence","student_attendence.enroll_id=enroll_students.id and DATE_FORMAT(student_attendence.date,'%Y-%m')='$date'");
		//$this->db->where("MONTH(attendence.date)","MONTH(now())");
		$this->db->where('enroll_students.id', $enroll_id);
	//	$this->db->group_by('attendence.date');
		
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

	public function getuserwithbranch($member_id)
	{		
		$this->db->select("enroll_students.*, users.*, (classes.class_name) as class_name, enroll_students.id as enroll_student_id, attendence_list.attendence_id,");
		$this->db->join("users","users.id=enroll_students.user_id","left");
		
		$this->db->join("attendence_list",'attendence_list.enroll_student_id=enroll_students.id');
		$this->db->join("classes","classes.id=enroll_students.class_id","left");

		$this->db->where("enroll_students.member_id", $member_id);


		//$this->db->group_by("user_family_members.id");
		$this->db->order_by("enroll_students.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
public function getuserswithbranch($branch_id=null,$user_id=null,$status=null)
	{		
		$this->db->select("enroll_students.*,users.*,user_family_members.name,user_family_members.profile_pic,user_family_members.type, (classes.class_name) as class_names, enroll_students.id as enroll_student_id,(enroll_students.member_id) as member_id,  branches.branch_name, user_family_members.user_status");
		$this->db->join("users","users.id=enroll_students.user_id","left");
		$this->db->join("user_family_members","user_family_members.id=enroll_students.member_id");
		//$this->db->join("enroll_students","enroll_students.member_id=user_family_members.id","left");
		//$this->db->join("attendence_list",'attendence_list.enroll_student_id=enroll_students.id');
		$this->db->join("classes","classes.id=enroll_students.class_id","left");
		$this->db->join("branches","branches.id=user_family_members.branch_id","left");



		if(!empty($status))
		{
			$this->db->where("enroll_students.status",$status);
		}
		if(!empty($branch_id))
		{
			$this->db->where("user_family_members.branch_id",$branch_id);
		}
		if(!empty($user_id))
		{
			$this->db->where("user_family_members.id",$user_id);
		}
		//$this->db->group_by("user_family_members.id");
		$this->db->order_by("enroll_students.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

     public function getusersbyenroll($id){
     	$this->db->select("enroll_students.*, user_family_members.name, branches.branch_name,user_family_members.branch_id, classes.class_name,(plans.two_session_three_months) as plan1,(plans.three_session_three_months) as plan2,(plans.two_session_six_months) as plan3,(plans.three_session_six_months) as plan4");
     	$this->db->join("user_family_members","user_family_members.id=enroll_students.member_id");
     	$this->db->join("branches", "branches.id=user_family_members.branch_id");
     	$this->db->join("classes", "classes.id=enroll_students.class_id");
     	$this->db->join("plans","plans.class_id=enroll_students.class_id and plans.branch_id=user_family_members.branch_id",'left');
     	$this->db->where('enroll_students.id',$id);
     	$query = $this->db->get(self::TABLE_NAME);			
        return $query->row_array();

     }


}
