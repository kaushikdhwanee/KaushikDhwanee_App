<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Online_transactions_model extends CI_Model
{
	const TABLE_NAME='online_transactions';
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function save($userdata)
	{
		$this->db->insert(self::TABLE_NAME, $userdata);
		return $this->db->insert_id();
	}
	public function update($userdata,$id)
	{
		$this->db->where('master_id',$id);
		return $this->db->update(self::TABLE_NAME, $userdata);
		 
	}
	
}