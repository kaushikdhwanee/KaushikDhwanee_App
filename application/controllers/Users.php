<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MY_Controller {
	
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
			$this->load->model("feedback_model");
			$this->load->model("leaves_model");
			$this->load->model("notifications_model");
			$this->load->helper('paytm');
			$this->load->library('sms');
			$this->load->library('email');


			$this->load->model('online_transactions_model');
			
		}

        public function index()
        {
        	//echo "hiiiiiiii";exit;
			$this->load->view('admin/index');  
        }

        public function login_service()
        {
        	  $_POST = json_decode ( file_get_contents ( "php://input" ),true );	
              $this->form_validation->set_rules('mobile','mobile','trim|required');
			  //$this->form_validation->set_rules('password','Password','trim|required');
			  if($this->form_validation->run())
			  {

				$mobile = $this->input->post('mobile');
				$gcm_id = $this->input->post('gcm_id');
				$device_id = $this->input->post('device_id');

				
				$results = $this->users_model->checkusermobile($mobile);
				
				if(!empty($results))
				{
					if(!empty($gcm_id)){
						$response = $this->users_model->update(array('gcm_id'=>$gcm_id),$results['id']);
					}elseif (!empty($device_id)) 
					{
						$response = $this->users_model->update(array('device_id'=>$device_id),$results['id']);
					}
					
					$result=$this->users_model->getuserinfo($results['id']);
					$result['success']=1;
					echo json_encode($result);

				}else{
					$result['success']=2;
					echo json_encode($result);
				}
				
			  }else
			  {
			  	$result['success']=2;
				echo json_encode($result);
			  }
        }

       

		public function checkusermobile_service()
		{
			$_POST = json_decode ( file_get_contents ( "php://input" ),true );	
			$this->form_validation->set_rules('mobile','mobile','trim|required');
			if($this->form_validation->run())
			{
				$mobile = $this->input->post('mobile');
				
				$result = $this->users_model->checkusermobile($mobile);
				//echo $this->db->last_query();
				if(empty($result))
				{
					/*$otp = rand(1000,9999);
					$message = "Kaushik Dwanee otp has $otp";
	 				$response = $this->sms->sendsms($mobile,$message);
	 				if(!empty($response))
	 				{
 						$result['otp']=$otp;
 						$result['success'] ="1";
 						echo json_encode($result);
					}
					else
					{
						$result['success'] ="2";
						echo json_encode($result);
					}*/
					$result['success']=1;
					echo json_encode($result);

				}
				else
				{
					$result['success']=3;
					echo json_encode($result);
				}
	 			
			}else
			{
				$result['success']=2;
				echo json_encode($result);
			}
	 			
		}

		public function getbranches_service()
        {

        	$results = $this->branches_model->getbranches(1);
        	$results['success']=1;
        	echo json_encode($results);
        } 


        public function getregistrationamount()
        {
        	$this->form_validation->set_rules('branch_id','branch_id','trim|required');
			if($this->form_validation->run())
			{
				$branch_id = $this->input->post('branch_id');
				
				$result = $this->branches_model->getbranch($branch_id);
				//echo $this->db->last_query();
				if(!empty($result))
				{
	 				$result['success']=1;
				}
				else
				{
					$result['success']=2;
				}
	 			echo json_encode($result);
	 		}	
        }

        public function user_registration_service()
        {
        	array('name',"email","mobile","address","age","branch_id","whatsapp_number","organization_name","known_from","registration_amount","gcm_id","device_id","promotional_id","promotional_amount","final_amount",'payment_through','other_info');
        	$_POST = json_decode ( file_get_contents ( "php://input" ),true );
        	$this->form_validation->set_rules('name','name','trim|required');
        	$this->form_validation->set_rules('mobile','mobile','trim|required');
        	$this->form_validation->set_rules('email','email','trim|required');
        	//$this->form_validation->set_rules('address','address','trim|required');
        	$this->form_validation->set_rules('age','age','trim|required');
        	$this->form_validation->set_rules('branch_id','branch_id','trim|required');
        	$this->form_validation->set_rules('payment_through','payment_through','trim|required');
        	$this->form_validation->set_rules('registration_amount','registration_amount','trim|required');
        	
        	
			if($this->form_validation->run())
			{

				$name = $this->input->post('name');
				$mobile = $this->input->post('mobile');
				$email = $this->input->post('email');
				$address = "";//$this->input->post('address')
				$age = $this->input->post('age');
				$branch_id = $this->input->post('branch_id');
				$whatsapp_number = $this->input->post('whatsapp_number');
				$organization_name = $this->input->post('organization_name');
				$known_from = $this->input->post('known_from');
				$registration_amount = $this->input->post('registration_amount');
				$reg_type = $this->input->post('reg_type');
				$gcm_id = @$this->input->post('gcm_id');
				$device_id = @$this->input->post('device_id');
				$promotional_id = @$this->input->post('promotional_id');
				$promotional_amount = @$this->input->post('promotional_amount');
				$final_amount = $this->input->post('final_amount');
				$payment_through = $this->input->post('payment_through');
				$other_info = $this->input->post('other_info');


				//$known_from =  (!empty($known_from)?implode(",", $known_from):"");
				
				$userDetails1 = array(
								'age' => $age,
								'branch_id' =>$branch_id,
								'mobile' => $mobile,
								'address' => $address,
								'email' =>$email,
								'registration_amount'=>$registration_amount,
								'whatsapp_number'=>$whatsapp_number,
								'created_date'=> date("Y-m-d H:i:s"),
								'organization_name'=>$organization_name,
								'gcm_id'=>$gcm_id,
								'device_id'=>$device_id,
								'promotional_amount'=>$promotional_amount,
								'promotional_id'=>$promotional_id,
								'other_info'=>@$other_info,
								'final_amount'=>$final_amount,
								

								);

				
				
            	
            	if(empty($this->users_model->checkusermobile($mobile)))
            	{
            		$response = $this->users_model->save($userDetails1);

            		if($response)
					{

						$userDetails = array(
								'name' => $name,
								'user_id'=>$response,
								'branch_id' =>$branch_id,
								'registration_amount'=>$registration_amount,
								'type'=>1
								);

						if(!empty($_FILES['image']['name']))
						{

							$config['upload_path']          = 'uploads/user_images/';
			                $config['allowed_types']        = 'gif|jpg|png';
			                $config['max_width']            = 1024;
			                $config['max_height']           = 768;
			                $config['file_name'] = strtotime('now').str_replace(" ", "_", $_FILES['image']['name']);
			                //print_r($_FILES);
			                $this->load->library('upload', $config);

			                if ( ! $this->upload->do_upload('image'))
			                {
			                        $error = array('error' => $this->upload->display_errors());
			                       
			                        $this->session->set_flashdata('message','Image upload error');
			                       
			                }
			                else
			                {
			                        $data = array('upload_data' => $this->upload->data());

			                }
			                $userDetails['profile_pic'] = $config['file_name'];
		            	}

	        			$response1 = $this->user_family_members_model->save($userDetails);

	            		/*if($reg_type==1)
	            		{*/
	            			$userDetails2 = array(
									 'member_id'=>$response1,
									 'total_amount'=>$registration_amount,
									 'final_amount'=>$final_amount,
									 'admin_discount'=>0,
									 'payment_type'=>1,
									 'user_id'=>$response,
									 'payment_through'=>$payment_through,
									 'created_date'=>date("Y-m-d H:i:s")
									);
					
							$payment_id = $this->payments_model->save($userDetails2);

							$users = array('amount'=>$final_amount,
											//'user_id'=>$response,
											'payment_id'=>$payment_id
												);
								
							$responsez = $this->payments_invoice_model->save(array($users));
	            		/*}*/

						

	            		/*$this->email->subject("Account confirmation mail");
	                    $this->email->from('info@kaushikdhwanee.com', 'Kaushik dhwanee');
	                    $buffer = $this->save_download($payment_id);
                		$this->email->attach($buffer, 'attachment', 'print_receipt.pdf', 'application/pdf');
	                    $this->email->set_newline("\r\n");
	                    $this->email->to($email);
	                    $data = array(
	                             'username'=>$name,
	                            'amount'=>$final_amount,
	                            'date'=>date("Y-m-d H:i"),
	                             //'receipt'=>base_url("index/printreceipt/".$payment_id)
	                            );
	            		$message1 = $this->load->view('emails/registration_payment',$data,true);
	                    $this->email->message($message1);
						$this->email->send();*/


						$userDetails = array('branch_id'=> $branch_id,
									 'message'=> "Welcome to KaushikDhwanee! Payment of Rs $final_amount has been made successfully on date('d-m-Y',strtotime($date)) at date('h:i A',strtotime($date))",
									 'user_id'=>$response,
									 'created_on'=>date("Y-m-d H:i:s")
									);

					$responsex = $this->notifications_model->save($userDetails);


						$message = "Welcome $name to KaushikDhwanee. You have been successfully registered, Payment of Rs $final_amount has been made successfully. Team KAUSHIKDHWANEE";//You have been successfully registered
 						$response = $this->sms->sendsms($mobile,$message);

						//echo "1";
						$result=$this->users_model->getuserinfo($response);
						$result['success']=1;
						echo json_encode($result);exit;
						
					}else
					{
						$result['success']=6;
						echo json_encode($result);exit;
					}

            	}else
            	{
            		$result['success']=3;
					echo json_encode($result);exit();
            	}

            	

					
			}else
			{
				$result['success']=2;
				echo json_encode($result);exit;
			}

		}

		public function verify_offer_service()
        {
        	$parameters = array("total_amount","promocode");
        	$_POST = json_decode ( file_get_contents ( "php://input" ),true);	
        	$this->form_validation->set_rules('total_amount','total_amount','trim|required');
        	$this->form_validation->set_rules('promocode','promocode','trim|required');
        	if($this->form_validation->run()) 			
			{
				$promocode = $this->input->post('promocode');
				$total_amount = $this->input->post('total_amount');
				$condition_array = array('promocode'=>$promocode,
										 'status'=>1	
										);
				$result2 = $this->promotional_offers_model->checkpromotion($condition_array);
				if(!empty($result2))
				{
					$result['promotion_id']=$result2['id'];
					$result['promotional_amount']=$result2['amount'];
					$result['success'] =1;
					echo json_encode($result);
				}else
				{
					$result['success'] =4;
					echo json_encode($result);
				}
				

			}
 			else
			{
				$result['success'] =2;
				echo json_encode($result);
			}

        }   

		public function getclasses_service()
        {
        	$categories = $this->categories_model->get_categories(1);
        	foreach ($categories as $cat_info) {
        		$classes =array();
        		$classes = $this->classes_model->getclassesbycat($cat_info['id']);
        		$results[$cat_info['id']]=$classes;
        	}
        	$results['categories']=$categories;
        	
        	$results['image_url']=base_url("uploads/class_images");
        	$results['success']=1;
        	echo json_encode($results);
        }


        public function add_demo_class_service()
        {
        	$parameters = array("name","mobile","email","class_id","branch_id","comments");
        	$_POST = json_decode ( file_get_contents ( "php://input" ),true);	

			
        	$this->form_validation->set_rules('name','name','trim|required');
        	$this->form_validation->set_rules('mobile','mobile','trim|required');
        	$this->form_validation->set_rules('email','email','trim|required');
        	$this->form_validation->set_rules('class_id','class_id','trim|required');

			if($this->form_validation->run()) 			
			{

 				$name = $this->input->post('name');
 				$email = $this->input->post('email');
 				$mobile = $this->input->post('mobile');
 				$branch_id = $this->input->post('branch_id');
 				$class_id = $this->input->post('class_id');
 				$comments = $this->input->post('comments');


 				
 				$userDetails =array('name'=>$name,
									'mobile'=>$mobile,
									'email'=>$email,
									'branch_id'=>$branch_id,
									'class_id'=>$class_id,
									'comments'=>$comments,
									'created_date'=>date('Y-m-d H:i:s')
									);

 				

				$response = $this->demo_classes_model->save($userDetails);
				
				
				if(!empty($response))
				{
					$result['success'] =1;
					echo json_encode($result);
				}
				else
				{
					$result['success'] =6;
					echo json_encode($result);
				}
				
 			}
 			else
			{
				$result['success'] =2;
				echo json_encode($result);
			}

        }


        public function getcategories_service()
        {

        	$results = $this->categories_model->get_categories(1);
        	$results['success']=1;
        	echo json_encode($results);
        } 
       
        public function getplans_service()
        {
        	$_POST = json_decode ( file_get_contents ( "php://input" ) );
        	$this->form_validation->set_rules('branch_id','branch name','trim|required');
        	$this->form_validation->set_rules('class_id','class name','trim|required');

			if($this->form_validation->run())
			{
				$branch_id = $this->input->post('branch_id');
				$class_id = $this->input->post('class_id');

	        	$results = $this->plans_model->getplan($branch_id,$class_id);
	        	$results['success']=1;
	        	echo json_encode($results);
	        }else
	        {
	        	$results['success']=2;
	        	echo json_encode($results);
	        }
        } 

        public function getpromotions_service()
        {
        		$results = $this->promotional_offers_model->get_promotions(1);
	        	$results['success']=1;
	        	echo json_encode($results);
	        
        } 


        public function getmyclasses_service()
        {
        	$_POST = json_decode ( file_get_contents ( "php://input" ),true );
        	$this->form_validation->set_rules('user_id','user id','trim|required');
        	//$this->form_validation->set_rules('member_id','member_id','trim|required');

			if($this->form_validation->run())
			{
				$user_id = $this->input->post('user_id');
				//$member_id = $this->input->post('member_id');
				$members = $this->user_family_members_model->getmembers($user_id);
				$classeslist  = $this->classes_model->getclasses();
				$sessions=$this->enroll_students_model->gettotalsession($user_id);
				$attendence = $this->enroll_students_model->getuser($user_id);
				foreach ($members as $member_info) 
				{
					$classes = $this->enroll_students_model->getuserenrolls($member_info['id']);
					//$sessions=$this->enroll_students_model->getuserenrolls($member_info['id'])
					if(!empty($classes))
					{
						$results1= array();
						foreach ($classes as $class_info) {
							$results1[$class_info['class_id']]=$this->enroll_students_batches_model->getbatchclasses($class_info['id']);
						}
						$results[$member_info['id']] = $results1;
					}

				}

	        	//$results = $this->plans_model->getplan($branch_id,$class_id);
	        	$results['classes'] =  $classeslist;
	        	$results['members'] =  $members;
				$results['sessions'] =$sessions;
				$results['attendence'] = $attendence;
	        	$results['image_url'] = base_url("uploads/class_images");
	        	$results['success'] = 1;
	        	echo json_encode($results);
	        }else
	        {
	        	$results['success']=2;
	        	echo json_encode($results);
	        }
        }

        public function getpayments_due_service()
        {
        	$_POST = json_decode ( file_get_contents ( "php://input" ),true );
        	$this->form_validation->set_rules('enroll_student_id','user id','trim|required');
        	//$this->form_validation->set_rules('member_id','member_id','trim|required');

			if($this->form_validation->run())
			{
				$enroll_student_id = $this->input->post('enroll_student_id');
				$response = $this->enroll_students_model->getenroll($enroll_student_id);
				if(!empty($response)){
					$results = $this->invoice_model->getinvoicebyenrollid($enroll_student_id);
		        		if(!empty($results))
		        		{
		        			$results['user_info'] = $response;
		        			$results['success'] = 1;
		        			echo json_encode($results);
		        		}else
		        		{
		        			$results['success'] = 5;
		        			echo json_encode($results);
		        		}
		        		
				}else
				{
					$results['success'] = 4;
	        		echo json_encode($results);
				}
				
	        }else
	        {
	        	$results['success']=2;
	        	echo json_encode($results);
	        }
        }

        public function getpayments_due_by_user_service()
        {
			
        	$_POST = json_decode ( file_get_contents ( "php://input" ),true );
        	$user_id = $this->input->post('user_id');
			$invoice = $this->invoice_model->getinvoicebyusers($user_id);
			
			//$enddate="";
			if(!empty($invoice)){
				
			    $results['invoice'] = $invoice;
				$results['user_id'] = $user_id;
				
    			$results['success'] = 1;
    			echo json_encode($results);
    	    }else
    		{
    			$results['success'] = 5;
    			echo json_encode($results);
    		}
			}
		
			public function get_price_advance_service()
			{
				
				
				$_POST = json_decode ( file_get_contents ( "php://input" ),true );
	
				
	            $date = date("Y-m-d");
				$user_id = $this->input->post('user_id');
				
				if(!empty($user_id)){
				$users = $this->enroll_students_model->getuserbeforeenddate($user_id);
				$attendence=$this->enroll_students_model->getuseradv($user_id);
				
				$result['data'] = $users;
				
				$result['sessioncount']=$attendence;
				
				$result['success']=1;
				echo json_encode($result);
			}else
			{
				//$result = $invoices;
				$result['success']=5;
			echo json_encode($result);
				
			}
        	//exit;/**/
        }
	
        public function generatechecksum_service()
		{
			header("Pragma: no-cache");
			header("Cache-Control: no-cache");
			header("Expires: 0");
			$checkSum = "";
			$_POST = json_decode ( file_get_contents ( "php://input" ),true );
			$paramList = array();

			$paramList["MID"] = $this->input->post('MID'); //Provided by Paytm
			$paramList["ORDER_ID"] =  $this->input->post('ORDER_ID'); //unique OrderId for every request
			$paramList["CUST_ID"] =  $this->input->post('CUST_ID');// unique customer identifier 
			$paramList["INDUSTRY_TYPE_ID"] =  $this->input->post('INDUSTRY_TYPE_ID'); //Provided by Paytm
			$paramList["CHANNEL_ID"] =  $this->input->post('CHANNEL_ID'); //Provided by Paytm
			$paramList["TXN_AMOUNT"] =  $this->input->post('TXN_AMOUNT'); // transaction amount
			$paramList["WEBSITE"] =  $this->input->post('WEBSITE');//Provided by Paytm
			$paramList["CALLBACK_URL"] =  $this->input->post('CALLBACK_URL');//'https://pguat.paytm.com/paytmchecksum/paytmCallback.jsp';//Provided by Paytm
			$paramList["EMAIL"] =  $this->input->post('EMAIL'); // customer email id
			$paramList["MOBILE_NO"] =  $this->input->post('MOBILE_NO'); // customer 10 digit mobile no.

			$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
			$paramList["CHECKSUMHASH"] = $checkSum;
			//print_r($paramList);
			if(!empty($checkSum)){
				
				echo json_encode(array('payt_STATUS'=>1,'CHECKSUMHASH'=>$checkSum,'paramList'=>$paramList));//
			}else{
				echo json_encode(array('payt_STATUS'=>2));
			}


		}

		public function payment_success_service()
	    {
	    	
	    	$parameters = array("member_id","user_id","total_amount","final_amount","invoice_id","amount","enroll_student_id","start_dates","end_dates","total_session","classes");

 			$_POST = json_decode(file_get_contents("php://input"), true);
 			
 			$this->form_validation->set_rules('member_id','member_id','trim|required');
 			$this->form_validation->set_rules('user_id','user_id','trim|required');
 			$this->form_validation->set_rules('total_amount','total_amount','trim|required');
 			$this->form_validation->set_rules('final_amount','final_amount','trim|required');
 			$this->form_validation->set_rules('payment_through','payment_through','trim|required');
 			
 			if($this->form_validation->run())
 			{
		    	extract($_POST);

			    $userDetails = array(
								 'member_id'=>$member_id,
								 'total_amount'=>$total_amount,
								 'final_amount'=>$final_amount,
								 'payment_type'=>5,
								 'payment_through'=>$payment_through,
								 'created_date'=>date("Y-m-d H:i:s"), 
								 'user_id'=>$user_id
								);
				
				$payment_id = $this->payments_model->save($userDetails);

				if(!empty($invoice_id) && !empty($enroll_student_id) && !empty($amount)){
					$invoces = explode(",", $invoice_id);
					$amounts = explode(",", $amount);
					$enroll_student_id = explode(",", $enroll_student_id);
					foreach ($invoces as $key => $value) {	
				
                $userDetails1 = array(
					'start_date'=>$Start_dates,
					'end_date'=>$end_date,
					'total_sessions'=>$total_session,
					'sessions_per_week'=>$classes
				) ;
				}
			}
			if(!empty($invoice_id) && !empty($enroll_student_id) && !empty($amount))
			{
				$invoces = explode(",", $invoice_id);
				$amounts = explode(",", $amount);
				$enroll_student_id = explode(",", $enroll_student_id);
				$payments = array();
				foreach ($invoces as $key => $value) {
					
					$usersz = array("enroll_student_id"=>$enroll_student_id[$key],
														'amount'=>$amounts[$key],
														'invoice_id'=>$value,
														'payment_id'=>$payment_id
													);
					array_push($payments, $usersz);

				}
				$response = $this->payments_invoice_model->save($payments);

				if(!empty($invoces))
				{
					foreach ($invoces as $invoice_info) 
					{
						$this->invoice_model->updateinvoicestatus($invoice_info);
						//echo $this->db->last_query();exit;
					}						
				}

			}

		    $response_data = array(
		            "payment_id" => $payment_id,
		           	"mmp_txn"=>$mmp_txn,
					"mer_txn"=>$mer_txn, 
					"amt"=>$amt,
					"prod"=>$prod,
					"date"=>$date,
					"bank_txn"=>$bank_txn,
					"f_code"=>$f_code,
					"clientcode"=>$clientcode,
					"bank_name"=>$bank_name,
					"auth_code"=>@$auth_code,
					"ipg_txn_id"=>@$ipg_txn_id,
					"merchant_id"=>$merchant_id,
					"desc1"=>@$desc,
					"udf9"=>$udf9,
					"discriminator"=>$discriminator,
					"surcharge"=>$surcharge,
					"CardNumber"=>$CardNumber,
					"udf1"=>$udf1,
					"udf2"=>$udf2,
					"udf3"=>$udf3,
					"udf4"=>$udf4,
					"udf5"=>$udf5,
					"udf6"=>$udf6,
					"created_on"=>date("Y-m-d H:i:s")

		      );


		    	$isInserted = $this->online_transactions_model->save($response_data);
		    	$user_info = $this->users_model->getuserinfo($user_id);
/*
				$email = $user_info['email'];
                $this->email->subject("Payment Information");
                $this->email->from('info@kaushikdhwanee.com', 'Kaushik dhwanee');
                $buffer = $this->save_download($payment_id);
                $this->email->attach($buffer, 'attachment', 'print_receipt.pdf', 'application/pdf');
                $this->email->set_newline("\r\n");
                $this->email->to($email);
                $data = array(
                         'username'=>$user_info['name'],
                         'message'=>"Received fees Rs $amount.",
                         //'receipt'=>base_url("index/printreceipt/".$payment_id)
                        );
        		$message1 = $this->load->view('emails/success_message',$data,true);
                $this->email->message($message1);
				$this->email->send();*/

				$username = $user_info['name'];
				$message = "Dear $username, Received fees Rs $amount. Thank you, Team KAUSHIKDHWANEE";
 				$response = $this->sms->sendsms($user_info['mobile'],$message);
				//echo "1";
				$result=$this->users_model->getuserinfo($user_id);
				$userDetails = array('branch_id'=>$result['branch_id'],
									 'message'=>$message,
									 'user_id'=>$user_id,
									 'created_on'=>date("Y-m-d H:i:s")
									);

				$responsex = $this->notifications_model->save($userDetails);
				$result['success']=1;
				echo json_encode($result);exit;
		
				
				
		     }else
		     {
		     	
		     	echo  json_encode(array('success'=>2));
				//echo json_encode(array('success'=>2));
		     }
   
		}

        public function enrollstudent_service()
        {
        	$_POST = json_decode ( file_get_contents ( "php://input" ) );
        	$this->form_validation->set_rules('class_id','class_id','trim|required');
        	$this->form_validation->set_rules('plan_id','plan_id','trim|required');
        	$this->form_validation->set_rules('sessions_per_week','sessions_per_week','trim|required');
        	$this->form_validation->set_rules('price_per_month','price_per_month','trim|required');
        	$this->form_validation->set_rules('sibling_discount','sibling_discount','trim|required');
        	$this->form_validation->set_rules('start_date','start_date','trim|required');
        	$this->form_validation->set_rules('payment_through','payment_through','trim|required');


        	if($this->form_validation->run())
			{
				$user_id = $this->input->post('user_id');
				$member_id = $this->input->post('member_id');

				$class_id = $this->input->post('class_id');
				$plan_id = $this->input->post('plan_id');
				$resp = explode("|", $plan_id);
				$sessions_per_week = $resp[0];
				$price_per_month = $resp[1];

				$sibling_discount = $this->input->post('sibling_discount');

				$start_date = date("Y-m-d",strtotime($this->input->post('start_date')));
				$current_month_amount = $this->input->post('current_month_amount');
				$next_plan = $this->input->post('next_plan');
				$resp1 = explode("|", $next_plan);
				$next_month_duration = $resp1[0];
				$discount = $resp1[1];

				$registration_amount = $this->input->post('registration_amount');
				$next_month_amount = $this->input->post('next_month_amount');
				


				$total_amount = $this->input->post('total_amount');
				$final_amount = $this->input->post('final_amount');
				$admin_discount = $this->input->post('admin_discount');

				$selected_days = $this->input->post('selected_days');
				$selected_batches = $this->input->post('selected_batches');
				$discount_type = $this->input->post('discount_type');
				$payment_through = $this->input->post('payment_through');


				
				$userDetails = array(
								'member_id' => $member_id,
								'user_id' => $user_id,
								'class_id' => $class_id,
								'start_date' => $start_date,
								'discount' => $discount,
								'current_month_amount' => $current_month_amount,
								'next_month_amount' => $next_month_amount,
								'total_amount' => $total_amount,
								'next_month_duration' => $next_month_duration,
								'price_per_month' => $price_per_month,
								'sessions_per_week' => $sessions_per_week,
								'admin_discount' => $admin_discount,
								'final_amount' => $final_amount,
								'sibling_discount'=> $sibling_discount,
								'created_date' => date('Y-m-d H:i:s'),
								'discount_type'=> $discount_type

								);
				
				
            	$enroll_student_id = $this->enroll_students_model->save($userDetails);
            	
				
					
				if(!empty($enroll_student_id))
				{
						$total_batches =array();
						foreach ($selected_days as $key => $value) {
							$userdata = array(
											'enroll_student_id'=>$enroll_student_id,
											'batch_class_id'=>$selected_batches[$key]
								);

							array_push($total_batches, $userdata);
						}

						$resss = $this->enroll_students_batches_model->save($total_batches);


						/*saving in payments table start*/
						$userDetails = array(
									'user_id'=>$user_id,
									'member_id'=>$member_id,
									 'total_amount'=>$total_amount,
									 'final_amount'=>$final_amount,
									  'admin_discount'=>$admin_discount,
									   'payment_type'=>1,
									   'discount_type'=> $discount_type,
									   'payment_through'=>$payment_through,
									    'created_date'=>date("Y-m-d H:i:s")
									);
				
						$payment_id = $this->payments_model->save($userDetails);


						if(!empty($registration_amount)){
								$usersz = array("enroll_student_id"=>$enroll_student_id,
												'amount'=>$registration_amount,
												'user_id'=>$user_id,
												'payment_id'=>$payment_id
											);

								$response = $this->payments_invoice_model->save(array($usersz));
							}

						/*saving in payments table end*/

						$invoices = array();
						$payment_invoice = array();
						$userdtails = array(
										'enroll_student_id' => $enroll_student_id,
										'amount' => $current_month_amount,
										'sibling_discount' => $sibling_discount,
										'final_amount' => $current_month_amount,
										'invoice_month' => date("m",strtotime($start_date)),
										'invoice_year' => date("Y",strtotime($start_date)),
										'price_per_month' => $price_per_month,
										'created_date' => date('Y-m-d H:i:s'),
										'paid_status' => 2
										);
						//array_push($invoices, $userdtails);
						$invoice_id = $this->invoice_model->save($userdtails);
						/*
						$invoice_id = $this->invoice_model->save($invoices);*/
						$usersx = array("enroll_student_id"=>$enroll_student_id,
												'amount'=>$current_month_amount,
												'invoice_id'=>$invoice_id,
												'payment_id'=>$payment_id
											);
						//array_push($payment_invoice, $usersx);
						$response = $this->payments_invoice_model->save(array($usersx));
						
							$amount = $next_month_amount/$next_month_duration;

						for ($i=1; $i <=$next_month_duration ; $i++) { 
							
							$userdtails1 = array(
										'enroll_student_id' => $enroll_student_id,
										'amount' => $amount,
										'sibling_discount' => $sibling_discount,
										'final_amount' => $amount,
										'invoice_month' => date("m", strtotime($start_date."+".$i." month")),
										'invoice_year' => date("Y", strtotime($start_date."+".$i." month")),
										'price_per_month' => $price_per_month,
										'created_date' => date('Y-m-d H:i:s'),
										'paid_status' => 2
										);



							//array_push($invoices, $userdtails1);

							$invoice_id =$this->invoice_model->save($userdtails1);

							$usersz = array("enroll_student_id"=>$enroll_student_id,
												'amount'=>$amount,
												'invoice_id'=>$invoice_id,
												'payment_id'=>$payment_id
											);

							$response = $this->payments_invoice_model->save(array($usersz));/**/

							
							


						}

						//$this->invoice_model->save_batch($invoices);


						

						

						/**/

						/*if(!empty($payable_amount))
						{
							$payment_invoice = array();
							foreach ($payable_amount as $key => $value) {
								
								$users = array("enroll_student_id"=>$enroll_student_id[$key],
												'amount'=>$value,
												'invoice_id'=>$invoice[$key],
												'payment_id'=>$payment_id
											);
								array_push($payment_invoice, $users);

							}
							$response = $this->payments_invoice_model->save($payment_invoice);
						}*/

						/**/

						$this->session->set_flashdata('message', 'student enroll added successfully.');
						redirect('admin/viewstudents');
				}else
				{
					redirect("admin/viewstudents");
				}
					
				
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin/viewstudents");
        	/*$views = array('addcategory');
            $data = array('views'=>$views);
			$this->load->view('admin/template/template',$data);*/
        
        
        }

        public function feedback_service()
        {
        	$parameters = array("user_id","support_type","description");
 			$params = json_decode ( file_get_contents ( "php://input" ) );
 			$user_id = $params->user_id;
 			$support_type = $params->support_type;
 			$description = $params->description;


 			if(!empty($user_id))
 			{
 				
 				$user_info = $this->users_model->getuserinfo($user_id);

 				if(!empty($user_info))
 				{
 					$userDetails =array('user_id'=>$user_id,
 										'description'=>$description,
 										'support_type'=>$support_type,
 										'created_date'=>date("Y-m-d H:i:s")
									);
 					
 					
					$response = $this->feedback_model->save($userDetails);
					if($response)
					{
						$results['success'] = 1;
						echo json_encode($results);
					}
					else
					{
						$results['success'] = 5;
						echo json_encode($results);
					}
 					
 					//$result['verify_status']=(!empty($response))?1:2;
					
 				}else
 				{
 					$results['success'] = 4;
					echo json_encode($results);
 				}
 				
 			}
 			else
			{
				$results['success'] =2;
				echo json_encode($results);
			}
 			
        }

        public function leaves_service()
        {
        	$parameters = array("user_id","start_date","type","enroll_student_id");
 			$params = json_decode ( file_get_contents ( "php://input" ) );
 			$user_id = $params->user_id;
 			$start_date = $params->start_date;
 			$type = $params->type;
 			$enroll_student_id = $params->enroll_student_id;

 			if(!empty($user_id))
 			{
 				
 				$user_info = $this->users_model->getuserinfo($user_id);

 				if(!empty($user_info))
 				{
 					$leavestatus =  $this->leaves_model->getleavestatus($enroll_student_id,$start_date);
 					
 					if(empty($leavestatus))
 					{
 						$enroll_info = $this->enroll_students_model->getenroll($enroll_student_id);
 						$userDetails =array('user_id'=>$user_id,
 										'type'=>$type,
 										'start_date'=>$start_date,
 										'enroll_student_id'=>$enroll_student_id,
 										'created_date'=>date("Y-m-d H:i:s"),
 										'member_id'=>$enroll_info['member_id']
									);
 					
 					
						$response = $this->leaves_model->save($userDetails);
						if($response)
						{
							$results['success'] = 1;
							echo json_encode($results);
						}
						else
						{
							$results['success'] = 5;
							echo json_encode($results);
						}
 					}else
 					{
 						$results['success'] = 3;
						echo json_encode($results);
 					}
 					
 					
 					//$result['verify_status']=(!empty($response))?1:2;
					
 				}else
 				{
 					$results['success'] = 4;
					echo json_encode($results);
 				}
 				
 			}
 			else
			{
				$results['success'] =2;
				echo json_encode($results);
			}
 			
        }

        public function get_batch_classes_service()
        {	
        	$parameters = array("enroll_student_id");
 			
 			$_POST = json_decode ( file_get_contents ( "php://input" ),true );
 			
 			$this->form_validation->set_rules('enroll_student_id','enroll_student_id','trim|required');


			if($this->form_validation->run())
			{
	 			$enroll_student_id = $this->input->post('enroll_student_id');
	 			$enroll_info = $this->enroll_students_model->getenroll($enroll_student_id);
	 			//echo $this->db->last_query();
	 			//print_r($enroll_info);

	 			$batch = $this->batches_model->getbatch($enroll_info['branch_id'],$enroll_info['class_id']);
	        	$batch_id= $batch['id'];
	        	$days = array(1,2,3,4,5,6,7);
	        	foreach ($days as $day_type) {
	        		$classes[$day_type] = $this->batch_classes_model->get_classes_by_day($batch_id, $day_type);
	        	}
	        	$results = $classes;
	        	//print_r($results);
	        	if(!empty($results)){

	        		$results['sessions_per_week']=$enroll_info['sessions_per_week'];
	        		$results['success']=1;
	        	}else
	        	{
	        		$results['success']=2;
	        	}
	        	echo json_encode($results);
	        }else
	        {
	        	$results['success']=2;
	        	echo json_encode($results);
	        }	
 			
        }

        public  function update_batch_classes_service()
        {
        	$parameters = array("enroll_student_id");
 			
 			$_POST = json_decode ( file_get_contents ( "php://input" ),true );
 			
 			$this->form_validation->set_rules('enroll_student_id','enroll_student_id','trim|required');
 			$this->form_validation->set_rules('batch_class_id','enroll_student_id','trim|required');



			if($this->form_validation->run())
			{
	 			$enroll_student_id = $this->input->post('enroll_student_id');
	 			$batch_class_id = $this->input->post('batch_class_id');

	 			$selected_days = explode(",", $batch_class_id);

	 			$total_batches =array();
	 			$rec2 = $this->enroll_students_batches_model->delete($enroll_student_id);

						foreach ($selected_days as $key => $value) {
							$userdata = array(
											'enroll_student_id'=>$enroll_student_id,
											'batch_class_id'=>$selected_batches[$key]
								);

							array_push($total_batches, $userdata);
						}

						$resss = $this->enroll_students_batches_model->save($total_batches);

	        	if(!empty($results)){
	        		$results['success']=1;
	        	}else
	        	{
	        		$results['success']=2;
	        	}
	        	echo json_encode($results);
	        }else
	        {
	        	$results['success']=2;
	        	echo json_encode($results);
	        }	
 			
        }

        public function get_userprofile_service()
        {
        	$parameters = array("user_id");
 			$params = json_decode ( file_get_contents ( "php://input" ) );
 			$user_id = $params->user_id;
 			
 			if(!empty($user_id))
 			{
 				
 				$results = $this->users_model->getuserinfo($user_id);

 				if(!empty($results))
 				{
 					$results['profile_pic'] = base_url()."/uploads/user_images/".$results['profile_pic'];
 					$results['success'] = 1;
					echo json_encode($results);
 					
 				}else
 				{
 					$results['success'] = 4;
					echo json_encode($results);
 				}
 				
 			}
 			else
			{
				$results['success'] =2;
				echo json_encode($results);
			}
 			
        }

        public function update_profile_picture_service()
        {
        	$parameters = array("user_id","profile_pic","member_id");
 			$_POST = json_decode ( file_get_contents ( "php://input" ),true );
 			$user_id = $this->input->post('user_id');
 			$member_id = $this->input->post('member_id');
 			$profile_pic = $this->input->post('profile_pic');
 			/*echo json_encode($profile_pic);
 			exit;*/

 			if(!empty($user_id))
 			{
 				
 				$user_info = $this->users_model->getuserinfo($user_id);

 				if(!empty($user_info))
 				{

 					$userDetails = array();
 					if(isset($profile_pic) && $profile_pic != '')
				    {
				    	
				        $desired_dir = 'uploads/user_images/';
				        $base=$profile_pic;
				        $file_name = strtotime('now');
				        //decoding image
				        $binary=base64_decode($base);
				        header('Content-Type: bitmap; charset=utf-8');
						
			            $file = fopen($desired_dir.$file_name, 'wb');
			            fwrite($file, $binary);
			            fclose($file);
			            $userDetails['profile_pic'] = $file_name;
			            $response = $this->user_family_members_model->update($userDetails,$member_id);

			            if($response)
						{
							
							$results['success'] = 1;
							$results['profile_pic'] =  base_url("uploads/user_images/".$userDetails['profile_pic']);
							echo json_encode($results);
						}
						else
						{
							$results['success'] = 5;
							echo json_encode($results);
						}

				    }

 				}
 				else
 				{
 					$results['success'] = 4;
					echo json_encode($results);
 				}
 				
 			}
 			else
			{
				$results['success'] =2;
				echo json_encode($results);
			}
 			
        }

        public function update_profile_service()
        {
        	$parameters = array("user_id","name","email","member_id");
 			$params = json_decode ( file_get_contents ( "php://input" ) );
 			$user_id = $params->user_id;
 			$name = $params->name;
 			$email = $params->email;
 			$member_id = $params->member_id;


 			if(!empty($user_id))
 			{
 				
 				$user_info = $this->users_model->getuserinfo($user_id);

 				if(!empty($user_info))
 				{
 					$userDetails =array('name'=>$name
									
									);
 					$userDetails1 =array(
									'email'=>$email
									);
 					
 					$resp = $this->users_model->update($userDetails1,$user_id);
					$response = $this->user_family_members_model->update($userDetails,$member_id);
					if($response)
					{
						
						$results['success'] = 1;
						echo json_encode($results);
					}
					else
					{
						$results['success'] = 5;
						echo json_encode($results);
					}
 					
 					//$result['verify_status']=(!empty($response))?1:2;
					
 				}else
 				{
 					$results['success'] = 4;
					echo json_encode($results);
 				}
 				
 			}
 			else
			{
				$results['success'] =2;
				echo json_encode($results);
			}
 			
        }

        public function getnotifications_service()
        {

        	$parameters = array("user_id");
 			$_POST = json_decode ( file_get_contents ( "php://input" ), true );
 			$user_id = $this->input->post('user_id');
 			
 			if(!empty($user_id))
 			{
 				
 				$user_info = $this->users_model->getuserinfo($user_id);

 				if(!empty($user_info))
 				{
 					
 					$classes_id = array();
 					$user_info1 = $this->enroll_students_model->userrelatedclasses($user_id);

 					if(!empty($user_info1['classes_id']))
 					{ 
 						$classes_id = explode(",", $user_info1['classes_id']);
 						array_push($classes_id, '0');
	 					$results = $this->notifications_model->getnotifications($user_info['branch_id'],$classes_id,$user_id, $user_info['created_date']);
	 					//echo $this->db->last_query();
	 					
	 					if(!empty($results))
	 					{
	 						$results['success'] = 1;
							echo json_encode($results);
	 					}else
	 					{
	 						$results['success'] = 5;
							echo json_encode($results);
	 					}
 					}else
 					{
 						$results['success'] = 5;
						echo json_encode($results);exit;
 					}
 					
 				}else
 				{
 					$results['success'] = 4;
					echo json_encode($results);
 				}
 				
 			}
 			else
			{
				$results['success'] =2;
				echo json_encode($results);
			}
 			
        
        }


        public function userlogin_service()
        {
        	$parameters = array("mobile","gcm_id","device_id");//,"device_id"
 			$params = json_decode ( file_get_contents ( "php://input" ) );
 			$mobile = $params->mobile;
 			$gcm_id = @$params->gcm_id;
 			$device_id = @$params->device_id;

			//$device_id = @$params->device_id;
 			if(!empty($mobile) && ( !empty($gcm_id) || !empty($device_id))  )//|| !empty($device_id))
 			{
 				
				$user = $this->users_model->checkusermobile($mobile,null);
				if(!empty($user))
				{
					$otp = rand(1000,9999);
					//$otp = 1234;
 					$message = "Kaushik dhwanee otp has $otp";
 					$response = $this->sms->sendsms($mobile,$message);
					$result = $this->users_model->getuserinfo($user['id']);
					if(!empty($gcm_id))
					{
						$userDetails = array('gcm_id'=>$gcm_id);
					}else
					{
						$userDetails = array('device_id'=>$device_id);

					}
					
					$this->users_model->update($userDetails, $user['id']);
					
					$result['profile_pic']=(!empty($result['profile_pic'])?base_url('uploads/user_images/'.$result['profile_pic']):base_url('assets/admin/images/user.jpg')); 					
					$result['otp']=$otp;
					$result['success'] =1;
					echo json_encode($result);
					
				}
				else
				{
					$result['success'] =4;
					echo json_encode($result);
				}
 					
 			}
 			else
			{
				$result['success'] =2;
				echo json_encode($result);
			}
 			


        }

        public function resendotp_service()
        {
        	$parameters = array("mobile","otp");
 			$params = json_decode ( file_get_contents ( "php://input" ) );
 			$mobile = $params->mobile;
 			$otp = $params->otp;
 			if(!empty($mobile) && !empty($otp))
 			{
 				//$otp = rand(1000,9999);
 				$message = "Kaushik dhwanee otp has $otp";
 				$response = $this->sms->sendsms($mobile,$message);
 				if(!empty($response))
 				{
 					$result['otp']=$otp;
 					$result['success'] ="1";
 					echo json_encode($result);
 				}

 			}
 			else
			{
				$result['success'] ="2";
				echo json_encode($result);
			}
 			


        }


        public function logout()
		{
			$this->session->sess_destroy();
			redirect('admin/index');
		}
		
		public function getallbatchesbybranch_service(){

			$parameters = array("branch_id");

 			$_POST = json_decode(file_get_contents('php://input'),true);

 			$this->form_validation->set_rules('branch_id','branch_id','trim|required');

 			$branch_id = $this->input->post('branch_id');

            $classes = $this->classes_model->getclasses();

            foreach ($classes as  $classes_info) 
            {
             	
             	$branch_class = $this->batches_model->getbatch($branch_id,$classes_info['id']);
             	//$batches_count = array();
             	for($i=1;$i<=7;$i++)
				{
					//$classes[$i] = array();
					$batches[$i] = $this->batch_classes_model->get_classes_by_day($branch_class['id'], $i);
					//$batches_count[$i]= count($classes);
					//echo $this->db->last_query();exit;
				}
				$classes_info['batches'] = $batches;
				$classes1[] = $classes_info;
             	
	 	    } 	

            		$result["classes"]=$classes1;
 					$result['success'] ="1";
 					echo json_encode($result);
 			
	 		

		}

		

}
	