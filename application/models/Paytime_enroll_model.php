<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paytime_enroll_model extends CI_Model {

	const TABLE_NAME = "paytime_enroll";
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
	


}
