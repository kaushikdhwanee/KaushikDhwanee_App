<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Batch_class_teachers_model extends CI_Model {

	const TABLE_NAME = "batch_class_teachers";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function save($userDetails)
	{
		return $this->db->insert_batch("batch_class_teachers", $userDetails);
		/*$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		        
		}
		else
		{
		        $this->db->trans_commit();
		}*/
	}
	public function get_classes_by_day($batch_id, $day_type)
	{	
		$this->db->select("batch_classes.*, group_concat(teacher_name) as teachers");

		$this->db->join('batch_class_teachers'," batch_class_teachers.batch_class_id=batch_classes.id")	;
		$this->db->join('teachers',"teachers.teacher_id=batch_class_teachers.teacher_id")	;
		$this->db->where('batch_classes.batch_id', $batch_id);
		$this->db->where('batch_classes.type', $day_type);
		$this->db->group_by("batch_classes.id");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}

	public function getclasses($branch_id, $teacher_id,$type)
	{
		$this->db->select("batch_classes.*,classes.class_name");
		$this->db->join('batch_classes'," batch_classes.id=batch_class_teachers.batch_class_id  and type=$type ");
		$this->db->join('batches',"batches.id=batch_classes.batch_id");
		$this->db->join('classes',"classes.id=batches.class_id");
		$this->db->where('batch_class_teachers.teacher_id', $teacher_id);
		$this->db->where('batches.branch_id', $branch_id);
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();	
	}

	public function getclassesbyteacher($teacher_id,$type)
	{
		$this->db->select("batch_classes.*,batch_classes.id as batch_class_id,classes.class_name, branches.branch_name");
		$this->db->join('batch_classes'," batch_classes.id=batch_class_teachers.batch_class_id  and type=$type ");
		$this->db->join('batches',"batches.id=batch_classes.batch_id");
		$this->db->join('classes',"classes.id=batches.class_id");
		$this->db->join('branches',"branches.id=batches.branch_id");

		$this->db->where('batch_class_teachers.teacher_id', $teacher_id);
		//$this->db->where('batches.branch_id', $branch_id);
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();	
	}

	/*SELECT * FROM `batch_class_teachers` JOIN batch_classes on batch_classes.id=batch_class_teachers.batch_class_id and type=1 
	join batches on batches.id= batch_classes.batch_id  WHERE batch_class_teachers.teacher_id=11 and batches.branch_id=1*/

	public function delete($category_id)
	{
		
		$this->db->where('batch_class_id', $category_id);
		return $this->db->delete(self::TABLE_NAME);				 
	}
}
