<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachers_model extends CI_Model {

	const TABLE_NAME = "teachers";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		return	$this->db->insert(self::TABLE_NAME, $userDetails);
	}
	public function getteachers()
	{	
		
		$query = $this->db->get_where(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	
	public function getteacher($id)
	{	
		$this->db->select("teachers.*,group_concat(teachers_classes.class_id) as classes");
		$this->db->join("teachers_classes","teachers_classes.teacher_id=teachers.teacher_id","left");
		$this->db->join("branches","teachers.branch_id=branches.id");
		$this->db->where('teachers.teacher_id', $id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();
				 
	}
	/*public function get_categories_by_condition($condition)
	{		
		$query = $this->db->get_where(self::TABLE_NAME,$condition);			
        return $query->result_array();			 
	}
	
*/
	public function update($userDetails, $category_id)
	{
		
		$this->db->where('teacher_id', $category_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);				 
	}

	public function delete($category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->delete(self::TABLE_NAME);				 
	}
}
