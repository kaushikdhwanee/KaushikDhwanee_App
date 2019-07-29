<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller 
{


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model("payments_model");
		$this->load->model("payments_invoice_model");
		/*$this->load->model("users_model");
		$this->load->model("services_model");
		$this->load->model("category_slots_model");
		$this->load->model("user_address_model");
		$this->load->model("service_tax_model");
		$this->load->library('Uploaddata');
		$this->load->library("sms");*/
		

		
		
	}
	public function index()
	{
		
	}

	public function printreceipt()
    {
    	$views = array('printreceipt');
    	$payment_id = $this->uri->segment(3);
    	$payments = $this->payments_model->getpayment($payment_id);
    	$payment_invoice = $this->payments_invoice_model->getpayment_invoice($payment_id);
    	//echo $this->db->last_query();exit;
    	$data = array('views'=>$views,'payments'=>$payments,"payment_invoice"=>$payment_invoice); //,'classes'=>$classes
		$this->load->view('admin/printreceipt',$data);
    }


    
}
