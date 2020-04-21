<?php


	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//defined('BASEPATH') OR exit('No direct script access allowed');
class Summercamp extends MY_Controller {
	
	
	
		public function __construct()
		{
			parent::__construct();
			
			$this->load->model("mastertable_model");
			$this->load->model("categories_model");
			$this->load->model("classes_model");
			$this->load->model("branches_model");
			$this->load->model("teachers_model");
			$this->load->model("teachers_timings_model");
			$this->load->model("teachers_categories_model");
			$this->load->model("teachers_classes_model");
			$this->load->model("plans_model");
			$this->load->model("batches_model");
			$this->load->model("batch_classes_model");
			$this->load->model("batch_class_teachers_model");
			$this->load->model("admin_roles_model");
			$this->load->model("users_model");
			$this->load->model("discounts_model");
			$this->load->model("enroll_students_model");
			$this->load->model("enroll_students_batches_model");
			$this->load->model("user_family_members_model");
			$this->load->model("invoice_model");
			$this->load->model("payments_model");
			$this->load->model("payments_invoice_model");
			$this->load->model("demo_classes_model");
			$this->load->model("promotional_offers_model");
			$this->load->model("notifications_model");
			$this->load->model("feedback_model");
			$this->load->model("leaves_model");
			$this->load->library("sms");
			$this->load->library("notifications");
			$this->load->library('email');
			$this->load->library('m_pdf');
			$this->load->model('attendence_list_model');
			$this->load->model('paytime_enroll_model');
			$this->load->model('student_attendence_model');
			$this->load->model('whatsapp_model');
			$this->load->model('summercamp_reg_model');
			$this->load->model('summercamp_payment_model');
			$this->load->model('location_model');
			$this->load->model('summerplan_model');
			$this->load->library('atompay/transactionrequest');
			$this->load->library('atompay/transactionresponse');
			
			//$this->load->model('paytime_attendence');
			$this->load->model('online_transactions_model');
             
			$config_email['protocol']    = 'smtp';
             $config_email['smtp_host']    = 'ssl://smtp.gmail.com';
             $config_email['smtp_port']    = '465';
             $config_email['smtp_timeout'] = '7';
             $config_email['smtp_user']    = 'kaushikdhwanee@gmail.com';
             $config_email['smtp_pass']    = 'Pwdnew$$2510';
             $config_email['charset']    = 'utf-8';
             $config_email['newline']    = "\r\n";
              $config_email['mailtype'] = 'html'; // or html
              $config_email['validation'] = TRUE; 

			$this->email->initialize($config_email);

			//$user_type = $this->session->userdata('user_type');

			$request_method = $this->router->fetch_method();

		}

        public function index()
        {
			
			$views = array('summercamp_reg');
        	$classes = $this->classes_model->getclasses(1);
        	$branches = $this->location_model->getbranches(1);
        	
        	$data = array('views'=>$views,'classes'=>$classes,'branches'=>$branches); //,'classes'=>$classesS
			$this->load->view('admin/template/templateweb',$data);
			header("Cache-Control: private, must-revalidate, max-age=0");
            header("Pragma: no-cache");
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
			session_destroy();
            session_start();
        } 
	
	
	public function summercamp()
        {
			
			
            $views = array('summercamp_reg');
        	$classes = $this->classes_model->getclasses(1);
        	$branches = $this->location_model->getbranches(1);
        	
        	$data = array('views'=>$views,'classes'=>$classes,'branches'=>$branches); //,'classes'=>$classesS
			$this->load->view('admin/template/templateweb',$data);
			
        } 
	
	public function sumcamp_success(){
			
				//$this->transactionresponse->setRespHashKey("KEYRESP123657234");
			$this->transactionresponse->setRespHashKey("00e7291c96efb88dc1");
				$f_code = $_POST["f_code"];
				$amt = $_POST["amt"];
				$date=$_POST["date"];
				
			 $views = array('sumcamp_success');
			 $data = array('views'=>$views,'f_code'=>$f_code,'amt'=>$amt,'date'=>$date);
			 $this->load->view('admin/template/templateweb',$data);
			
			} 
	
	
public function insertcampstudent()
        {
            
        	$this->form_validation->set_rules('mobile','mobile','trim|required');
        	
        	
				$aname=$this->input->post('name');
				
				$amobile = $this->input->post('mobile');		
				$aemail = $this->input->post('email');
				$aaddress = $this->input->post('address');
				$aage = $this->input->post('age');
				$awhatsapp_number = $this->input->post('whatsapp_number');
                $aplan_id = $this->input->post('plan_id');
	            $activities=$this->input->post('activity');
	            $activities =  (!empty($activities)?implode(", ", $activities):"");
				$aclass_id = $this->input->post('class_id');			
				$anumber_of_class = $this->input->post('number_of_class');
				$asession_id=$this->input->post('session_id');
                $abranch_id = $this->input->post('branch_id');
				$astart_date = date("Y-m-d",strtotime($this->input->post('start_date')));
				$aend_date = date("Y-m-d",strtotime($this->input->post('end_date')));
				$acourse_fee = $this->input->post('course_fee');
				$afinal_amount = $this->input->post('final_amount');
				$aadmin_discount = $this->input->post('discount');
	            $transport=$this->input->post('transport');
	            $distance=$this->input->post('distance');
				$acomments = $this->input->post('comments');
	           $transport_fee =$this->input->post('transport_fee');
	           $total_amount = $this->input->post('total_amount');
	            
		
			
			$data=array(
					
								'name' => $aname,
					            'age'=>$aage,
					            'mobile'=>$amobile,
					            'email'=>$aemail,
					            'address'=>$aaddress,
				                'branch_id'=>$abranch_id,
								'start_date' => $astart_date,
								'original_start_date'=>$astart_date,
								'end_date' => $aend_date,
					            'plan_id'=>$aplan_id,
				                'whatsapp'=>$awhatsapp_number,
								//'discount' => $discount,
								'course_fee' => $acourse_fee,
								'admin_discount' => $aadmin_discount,
								'final_amount' => $afinal_amount,
								'created_date' => date('Y-m-d'),
				                'activity'=>$activities,
				                'transport'=>$transport,
				                 'distance'=>$distance,
				                 'transport_fee'=>$transport_fee,
				                  'total_amount'=>$total_amount,
								//'plan'=>$aplan,
								'comments'=>$acomments,
								
								

				);
	$mobile = $data['mobile'];
	echo $mobile;
				

if($this->form_validation->run())
			{
				date_default_timezone_set('Asia/Calcutta');
                $datenow = date("d/m/Y h:m:s");
$transactionDate = str_replace(" ", "%20", $datenow);

$transactionId = rand(1,1000000);
$this->session->set_userdata('user_data',$data);

//Setting all values here
	
	$this->transactionrequest->setMode("test");
$this->transactionrequest->setLogin(197);
$this->transactionrequest->setPassword("Test@123");
$this->transactionrequest->setProductId("NSE");
$this->transactionrequest->setAmount($afinal_amount);
$this->transactionrequest->setTransactionCurrency("INR");
$this->transactionrequest->setTransactionAmount(50);
$this->transactionrequest->setReturnUrl("http://beta.kaushikdhwanee.in/app/summercamp/sumcamp_success/");
$this->transactionrequest->setClientCode(123);
$this->transactionrequest->setTransactionId($transactionId);
$this->transactionrequest->setTransactionDate($transactionDate);
$this->transactionrequest->setCustomerName($aname);
$this->transactionrequest->setCustomerEmailId($aemail);
$this->transactionrequest->setCustomerMobile($amobile);
$this->transactionrequest->setCustomerBillingAddress("Mumbai");
$this->transactionrequest->setCustomerAccount("639827");
$this->transactionrequest->setReqHashKey("KEY123657234");
	
/*$this->transactionrequest->setMode("live");
$this->transactionrequest->setLogin(41735);
$this->transactionrequest->setPassword("Kaushik$2510");
$this->transactionrequest->setProductId("KAUSHIK");
$this->transactionrequest->setAmount($afinal_amount);
$this->transactionrequest->setTransactionCurrency("INR");
$this->transactionrequest->setTransactionAmount(50);
				
$this->transactionrequest->setReturnUrl("http://beta.kaushikdhwanee.in/app/summercamp/sumcamp_success");
$this->transactionrequest->setClientCode(007);
$this->transactionrequest->setTransactionId($transactionId);
$this->transactionrequest->setTransactionDate($transactionDate);
$this->transactionrequest->setCustomerName($aname);
$this->transactionrequest->setCustomerEmailId($aemail);
$this->transactionrequest->setCustomerMobile($amobile);
$this->transactionrequest->setCustomerBillingAddress("Hyderabad");
$this->transactionrequest->setCustomerAccount("32200984908");
$this->transactionrequest->setReqHashKey("30b9415cb7ee313262");*/
//$this->transactionresponse->setRespHashKey("00e7291c96efb88dc1");	

$url = $this->transactionrequest->getPGUrl();
//echo $url;
header("Location: $url");

		
				
		}else
			{
				echo validation_errors();exit;
			}
			
        	
      
	
        }
	
    public function summercamp_insert(){
		
		$data_value= $this->session->userdata('user_data');
		 echo $data_value['age'];
		
        $age = $data_value['age'];
		$name = $data_value['name'];
	    $name = ucwords($name);
		$mobile = $data_value['mobile'];
		$email = $data_value['email'];
		$branch_id = $data_value['branch_id'];
		$address = $data_value['address'];
		$whatsapp = $data_value['whatsapp'];
		$start_date=$data_value['start_date'];
		$end_date=$data_value['end_date'];
		$course_fee=$data_value['course_fee'];
		$final_amount=$data_value['final_amount'];
		$plan = $data_value['plan_id'];
		$comments = $data_value['comments'];
		$admin_discount = $data_value['admin_discount'];
		 $activity = $data_value['activity'];
		 $transport = $data_value['transport'];
		 $distance = $data_value['distance'];
		 $transport_fee =  $data_value['transport_fee'];
		 $total_amount = $data_value['total_amount'];
		
		$users = array(
					'age' => $age,
					'branch_id'=>$branch_id,
					'mobile' => $mobile,
					'address' => $address,
					'email' =>$email,
			        'name'=>$name,
					'start_date'=>$start_date,
			         'end_date'=>$end_date,
					'whatsapp'=>$whatsapp,
					'payment_type'=>9,
			        'payment_through'=>4,
			         'plan'=>$plan,
					'final_amount'=>$final_amount,
					 'fees'=>$course_fee,
			         'discount'=>$admin_discount,
			          'activity'=>$activity,
					//'country'=>$country,
			         'comments'=>$comments,
			         'transport'=>$transport,
				     'distance'=>$distance,
					'created_date'=> date("Y-m-d")
					);


					$response = $this->summercamp_reg_model->save($users);
	             $users1 = array(
	
	               'payment_type'=>9,
			        'payment_through'=>4,
			         'member_id'=>$response,
					'final_amount'=>$final_amount,
					 'course_fee'=>$course_fee,
			         'admin_discount'=>$admin_discount,
					 'transport_fee'=>$transport_fee,
					 'total_amount'=>$total_amount,
					//'country'=>$country,
			         'comments'=>$comments,
					'created_date'=> date("Y-m-d")
					);
            $response1 = $this->summercamp_payment_model->save($users1);
	
	       $message9 = "Dear ".$name." You have been enrolled into Summer Camp starting from $start_date. Happy learning! Team KAUSHIKDHWANEE";
					 
		
					if(!empty($mobile))
					{
						$this->sms->sendsms($mobile,$message9);
					}
		
		
                        $message5 = " You have been enrolled into SummerCamp starting from $start_date. Happy learning! Team KAUSHIKDHWANEE";                                    
						$this->email->subject("Enrollment of Summercamp");
	                    $this->email->from('kaushikdhwanee@gmail.com', 'Kaushik dhwanee');
	                    $buffer = $this->save_downloads($response1);
                		$this->email->attach($buffer, 'attachment', 'print_receipt.pdf', 'application/pdf');
	                    $this->email->set_newline("\r\n");
	                    $this->email->to($email);
	                    $data = array(
	                            'username'=>$name,
	                            'message'=>$message5,
	                            'date'=>date("Y-m-d H:i"),
	                            );
	            		$message1 = $this->load->view('emails/success_message',$data,true);
	                    $this->email->message($message1);
						$this->email->send();
		
		
			 $branches =$this->location_model->getbranch($branch_id);
		     $startdate= date('d-m-Y',strtotime($start_date));
			 $views = array('confirmcampreg');
			 $data = array('views'=>$views,'branches'=>$branches,'class_name'=>$class_name,'start_date'=>$startdate,'name'=>$name,'whatsapp'=>$whatsapp);
			 $this->load->view('admin/template/templateweb',$data);
		     $this->session->unset_userdata('user_data');
		     //session_destroy();
		 
		
		
	}
	
	
    public function confirmreg(){
	$mobile = $this->uri->segment(3);
				echo $mobile;
			$user = $this->users_model->getdata($mobile);
				//echo $user;
			$branch=$user['branch_id'];
			$branches =$this->branches_model->getbranch($branch_id);
			 $views = array('confirmreg');
			 $data = array('views'=>$views,'branches'=>$branches);
			 $this->load->view('admin/template/templateweb',$data);

}
public function getsummerplan()
        {

        	$result = array();

        	
        	$branch_id = $this->input->post('branch_id');
        	
        	$plan = $this->summerplan_model->getplan($branch_id);
        	
        	if(!empty($plan))
        	{
	        	$result = $plan;
	        	$result['success']=1;
	        	echo json_encode($result);

        	}else
        	{
        		$result['success']=2;
	        	echo json_encode($result);
        	}

        }


}
	
