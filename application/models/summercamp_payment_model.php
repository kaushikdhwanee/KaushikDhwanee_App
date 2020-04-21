<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Summercamp_payment_model extends CI_Model {

	const TABLE_NAME = "summercamp_payment";
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
		$this->db->select("summercamp_payment.*,summercamp_reg.name,summercamp_reg.plan,summercamp_reg.distance,summercamp_reg.mobile,(location.address)as br_address,(location.mobile)as br_mobile,location.time");
		$this->db->join("summercamp_reg","summercamp_reg.id=summercamp_payment.member_id");

	
        $this->db->join("location",'location.id=summercamp_reg.branch_id');

		$this->db->where('summercamp_payment.id',$id);
		$query = $this->db->get(self::TABLE_NAME);		
        return $query->row_array();				 
	}
	public function getpaymentr($id)
	{	
		$this->db->select("payments.*,user_family_members.name,users.mobile,branches.address,(branches.mobile)as br_mobile");
		$this->db->join("user_family_members","user_family_members.user_id=payments.user_id");

		$this->db->join("users","users.id=payments.user_id");
		$this->db->join("branches",'branches.id=users.branch_id');

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

    public function todays_collections($date){
	$this->db->select("payments.*,user_family_members.name,branches.branch_name,(payments.created_date)as created_date,(payments.final_amount)as final_amount");
	//$this->db->join("users","users.id=payments.user_id");
	
	$this->db->join("user_family_members","user_family_members.id = payments.member_id");
	$this->db->join("branches","branches.id=user_family_members.branch_id");
	$this->db->where("payments.created_date",$date);
	$query = $this->db->get(self::TABLE_NAME);		
        return $query->result_array();	

}
public function totalcollections($date){

$this->db->select_sum("payments.final_amount");
$this->db->where("payments.created_date",$date);
$query = $this->db->get(self::TABLE_NAME);		
        return $query->row()->final_amount;	

}
public function totalcollectionsbybranch($date,$branch_id){

$this->db->select_sum("payments.final_amount");
	$this->db->join("users","users.id=payments.user_id");
$this->db->where("payments.created_date",$date);
	$this->db->where_in("users.branch_id",$branch_id);
$query = $this->db->get(self::TABLE_NAME);		
        return $query->row()->final_amount;	

}
    public function todays_collection($date,$branch_id){
	$this->db->select("payments.*,user_family_members.name,branches.branch_name,(payments.created_date)as created_date,(payments.final_amount)as final_amount");
	//$this->db->join("users","users.id=payments.user_id");
	$this->db->join("user_family_members","user_family_members.id = payments.member_id");
	$this->db->join("branches","branches.id=user_family_members.branch_id");
	$this->db->where("payments.created_date",$date);
	$this->db->where_in("user_family_members.branch_id",$branch_id);
	$query = $this->db->get(self::TABLE_NAME);		
        return $query->result_array();	

}

public function tot_collectionsbybranch($start_date,$end_date,$branch_id){

$this->db->select_sum("payments.final_amount");
	$this->db->join("users","users.id=payments.user_id");
$this->db->where("payments.created_date >=",$start_date);
$this->db->where("payments.created_date <=",$end_date);
	$this->db->where_in("users.branch_id",$branch_id);
$query = $this->db->get(self::TABLE_NAME);		
        return $query->row()->final_amount;	

}
public function tot_collections($start_date,$end_date){

$this->db->select_sum("payments.final_amount");
	//$this->db->join("users","users.id=payments.user_id");
$this->db->where("payments.created_date >=",$start_date);
$this->db->where("payments.created_date <=",$end_date);
	
$query = $this->db->get(self::TABLE_NAME);		
        return $query->row()->final_amount;	

}

	public function getusers($date)
	{		
		$this->db->select("summercamp_payment.*,summercamp_reg.*,location.branch_name");
		$this->db->join("summercamp_reg",'summercamp_reg.id=summercamp_payment.member_id');
         $this->db->join("location",'location.id=summercamp_reg.branch_id');
		$this->db->where("summercamp_payment.created_date",$date);
		$this->db->order_by("summercamp_payment.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	
	public function getusersbybranch($date,$branch_id)
	{		
		$this->db->select("summercamp_payment.*,summercamp_reg.*,location.branch_name");
		$this->db->join("summercamp_reg",'summercamp_reg.id=summercamp_payment.member_id');
         $this->db->join("location",'location.id=summercamp_reg.branch_id');
		$this->db->where_in("summercamp_reg.branch_id",$branch_id);
		$this->db->where("summercamp_payment.created_date",$date);
		$this->db->order_by("summercamp_payment.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	
	public function collections($date){

$this->db->select_sum("summercamp_payment.final_amount");
$this->db->where("summercamp_payment.created_date",$date);
$query = $this->db->get(self::TABLE_NAME);		
        return $query->row()->final_amount;	

}
	public function summer_collections($start_date,$end_date)
	{		
		$this->db->select("summercamp_payment.*,summercamp_reg.*,location.branch_name");
		$this->db->join("summercamp_reg",'summercamp_reg.id=summercamp_payment.member_id');
         $this->db->join("location",'location.id=summercamp_reg.branch_id');
		$this->db->where("summercamp_payment.created_date>=",$start_date);
		$this->db->where("summercamp_payment.created_date<=",$end_date);
		$this->db->order_by("summercamp_payment.id","desc");
		$query = $this->db->get(self::TABLE_NAME);			
        return $query->result_array();			 
	}
	
	public function collectionsbybranch($start_date,$end_date,$branch_id)
	{		
		$this->db->select("summercamp_payment.*,summercamp_reg.*,location.branch_name");
		$this->db->join("summercamp_reg",'summercamp_reg.id=summercamp_payment.member_id');
         $this->db->join("location",'location.id=summercamp_reg.branch_id');
		$this->db->where_in("summercamp_reg.branch_id",$branch_id);
		$this->db->where("summercamp_payment.created_date>=",$start_date);
		$this->db->where("summercamp_payment.created_date<=",$end_date);
		$this->db->order_by("summercamp_payment.id","desc");
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
