<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Summercamp_reg_model extends CI_Model {

	const TABLE_NAME = "summercamp_reg";
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
	
	public function getpayment($payment_id){
	$this->db->select("summercamp_reg.*,(branches.address)as br_address,(branches.mobile)as br_mobile");
		$this->db->join("branches",'branches.id=11');
		$this->db->where("summercamp_reg.id",$payment_id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();		
	}
	
	public function getuser($branch_id=null,$user_id=null)
	{		
		$this->db->select("summercamp_reg.*,location.branch_name");
		$this->db->join("location",'location.id=summercamp_reg.branch_id');
        $this->db->where("summercamp_reg.status",1);
		if(!empty($branch_id))
		{
			$this->db->where("summercamp_reg.branch_id",$branch_id);
		}
		if(!empty($user_id))
		{
			$this->db->where("summercamp_reg.id",$user_id);
		}
		//$this->db->group_by("user_family_members.id");
		$this->db->order_by("summercamp_reg.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	/*public function allusers()
	{		
		$this->db->select("summercamp_reg.*,location.branch_name");
        $this->db->join("location",'location.id=summercamp_reg.branch_id');
		
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}*/
	public function allusers(){
	$this->db->select("summercamp_reg.*,location.branch_name");
	$this->db->join("location",'location.id=summercamp_reg.branch_id');
	$this->db->where("summercamp_reg.status",1);
	$query = $this->db->get(self::TABLE_NAME);			
     return $query->result_array();		
	}
	
	
	public function getusers($date)
	{		
		$this->db->select("summercamp_reg.*,location.branch_name");
        $this->db->join("location",'location.id=summercamp_reg.branch_id');
		$this->db->where("summercamp_reg.created_date",$date);
		$this->db->order_by("summercamp_reg.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	
	public function getusersbybranch($date,$branch_id)
	{		
		$this->db->select("summercamp_reg.*,location.branch_name");
        $this->db->join("location",'location.id=summercamp_reg.branch_id');
		$this->db->where_in("summercamp_reg.branch_id",$branch_id);
		$this->db->where("summercamp_reg.created_date",$date);
		$this->db->order_by("summercamp_reg.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	
	
	public function collections(){

$this->db->select_sum("summercamp_reg.final_amount");
//$this->db->where("payments.created_date",$date);
$query = $this->db->get(self::TABLE_NAME);		
        return $query->row()->final_amount;	

}
	public function getusersbyid($id)
	{		
		$this->db->select("summercamp_reg.*,location.branch_name,summercamp_plan.*,(summercamp_reg.id) as id");
         $this->db->join("location",'location.id=summercamp_reg.branch_id');
		$this->db->join("summercamp_plan",'summercamp_plan.branch_id=summercamp_reg.branch_id');
		$this->db->where("summercamp_reg.id",$id);
		
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->row_array();			 
	}
	public function update($userDetails, $category_id)
	{
		
		$this->db->where('id', $category_id);
		return $this->db->update(self::TABLE_NAME, $userDetails);				 
	}
}