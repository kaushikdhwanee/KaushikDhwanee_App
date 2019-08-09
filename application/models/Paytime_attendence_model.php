<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paytime_attendence_model extends CI_Model {

	const TABLE_NAME = "paytime_attendence";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }
}