<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Batch_classes_model extends CI_Model {

	const TABLE_NAME = "batch_classes";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function save($userDetails)
	{
		$this->db->insert("batch_classes", $userDetails);
		return $this->db->insert_id();
	}
	
	public function getclass($id)
	{	
		$this->db->select("batch_classes.*, group_concat(batch_class_teachers.teacher_id) as teachers");	
		$this->db->join('batch_class_teachers'," batch_class_teachers.batch_class_id=batch_classes.id")	;
		$this->db->where('batch_classes.id', $id);
		

		$query = $this->db->get(self::TABLE_NAME);			
        return $query->row_array();			 
	}
	/*
	public function getbranch($category_id)
	{		
		$this->db->where('id', $category_id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();
				 
	}*/

	public function get_classes_by_day($batch_id, $day_type)
	{	
		$this->db->select("batch_classes.*, group_concat(teacher_name) as teachers");

		$this->db->join('batch_class_teachers'," batch_class_teachers.batch_class_id=batch_classes.id")	;
		$this->db->join('teachers',"teachers.teacher_id=batch_class_teachers.teacher_id")	;
		$this->db->where('batch_classes.batch_id', $batch_id);
		$this->db->where('batch_classes.type', $day_type);
		$this->db->group_by("batch_classes.id");
		$this->db->order_by('batch_classes.start_time','ASC');
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

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
