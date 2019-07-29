<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	public function __construct() 
	{
        parent::__construct();
        $this->load->model('payments_model');
        $this->load->model('payments_invoice_model');
        $this->load->library('m_pdf');
	}
   
   public function save_download($payment_id)
    { 
                
                //now pass the data//
                 //$this->data['title']="MY PDF TITLE 1.";
                 //$this->data['description']="";
                 //$this->data['description']=$this->official_copies;
                 //now pass the data //

                //base_url("index/printreceipt/".$payment_id)
                    $payments = $this->payments_model->getpayment($payment_id);
                    $payment_invoice = $this->payments_invoice_model->getpayment_invoice($payment_id);
                    //echo $this->db->last_query();exit;
                    $data = array('payments'=>$payments,"payment_invoice"=>$payment_invoice);
                    $html=$this->load->view("admin/printreceiptpdf.php",$data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
             
                //this the the PDF filename that user will get to download
                $pdfFilePath ="mypdfName-".time()."-download.pdf";

                
                //actually, you can pass mPDF parameter on this load() function
                $pdf = $this->m_pdf->load();
                //generate the PDF!
                $pdf->WriteHTML($html);
                //offer it to user via browser download! (The PDF won't be saved on your server HDD)
                 return $pdf->Output($pdfFilePath, "S");
                 
                    
    }
}