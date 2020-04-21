<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enroll_students_batches_model extends CI_Model {

	const TABLE_NAME = "enroll_students_batches";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		return	$this->db->insert_batch(self::TABLE_NAME, $userDetails);
		 //$this->db->insert_id();
	}
	
	public function getbatchteacher($enroll_student_id)
	{
	$this->db->select("enroll_students_batches.*,batch_class_teachers.teacher_id");
		$this->db->join("batch_class_teachers","batch_class_teachers.batch_class_id=enroll_students_batches.batch_class_id");
		$this->db->where('enroll_student_id',$enroll_student_id);
		$this->db->group_by('enroll_student_id');
		$query = $this->db->get_where(self::TABLE_NAME);			
        return $query->row_array();
	}
	
	public function getbatchclasses($enroll_student_id)
	{	

		$this->db->select("enroll_students_batches.*,batch_classes.type,batch_classes.start_time,batch_classes.end_time,enroll_students.user_id as user_id,enroll_students.total_sessions");
		$this->db->join("enroll_students","enroll_students.id=enroll_students_batches.enroll_student_id");
		$this->db->join("batch_classes","batch_classes.id=enroll_students_batches.batch_class_id");
		$this->db->where('enroll_student_id', $enroll_student_id);
		$this->db->order_by('type');
		$query = $this->db->get_where(self::TABLE_NAME);			
        return $query->result_array();			 
	}

	

	public function getstudentsbybatch($batch_class_id)
	{	

		$this->db->select("e.*,m.name");
		$this->db->join("enroll_students es","es.id=e.enroll_student_id");
		$this->db->join("user_family_members m","m.id=es.member_id");
		$this->db->where('e.batch_class_id', $batch_class_id);	
		
		$query = $this->db->get(self::TABLE_NAME." e");			
        return $query->result_array();	 
	}

	public function getstudentsbybatchwithattendence($teacher_id,$date,$batch_class_id)
	{	

		$query = $this->db->query("SELECT `e`.*,al.type, `m`.`name`,es.member_id,es.class_id
FROM `enroll_students_batches` `e`
JOIN `enroll_students` `es` ON `es`.`id`=`e`.`enroll_student_id`
LEFT JOIN (select al.* from student_attendence al join attendence a on a.id = al.attendence_id WHERE `a`.`batch_class_id` = $batch_class_id and `a`.`date` = '$date' and `a`.`teacher_id` = $teacher_id ) al on al.enroll_id=e.enroll_student_id JOIN `user_family_members` `m` ON `m`.`id`=`es`.`member_id`
WHERE `e`.`batch_class_id`= $batch_class_id group by `e`.`enroll_student_id`");
				
        return $query->result_array();		 
	}
	
	/*public function getstudentsbybatchwithattendence($date,$batch_class_id){
	$this->db->select("e.*,m.name,es.*,sa.date");
		$this->db->join("enroll_students es","es.id=e.enroll_student_id");
		$this->db->join("user_mafily_members m","m.id=es.member_id");
		$this->db->where('e.batch_class_id',$batch_class_id);
		$this->db->where('es.batch_class_id',$batch_class_id);
		
	}*/

	/*public function get_branches_by_condition($condition)
	{		
		$query = $this->db->get_where(self::TABLE_NAME,$condition);			
        return $query->result_array();			 
	}
	public function getbranch($category_id)
	{		
		$this->db->where('id', $category_id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();
				 
	}*/

	public function update($userDetails, $category_id)
	{
		
		$this->db->where('enroll_student_id', $category_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);				 
	}

	public function delete($category_id)
	{
		
		$this->db->where('enroll_student_id', $category_id);
		return $this->db->delete(self::TABLE_NAME);				 
	}
	
}
