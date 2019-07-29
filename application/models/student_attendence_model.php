<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enroll_students_model extends CI_Model {

	const TABLE_NAME = "student_attendence";
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

	public function sessionenddate($enroll_id){
        	$this->db->select("student_attendence.*, enroll_students.id,enroll_students.total_sessions, as attendence");
        	$this->db->join("student_attendence",'student_attendence.enroll_id=enroll_students.id');
        	$this->db->where("attendence=enroll_students.total_sessions");
        	$this->db->where('student_attendence.enroll_id', $enroll_id);
        	$query = $this->db->get(self::TABLE_NAME);			
            return $query->result_array();	
}
}