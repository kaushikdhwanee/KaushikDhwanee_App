<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends MY_Controller {
	
	public $aname;
	public $amobile;
	public $aemail;
	public $aaddress;
	public $aage;
	public $awhatsapp_number;
    public $aorganization_name;
	public $aknown_from;
	public $aregistration_date;
	public $aregistration_amount;
	public $aplan_id;
	public $aresp;
	
	public $aother_info;
    public $aplan;
	public $aclass_id;
	public $anumber_of_class;
	public $asession_id;
	public $asessions_per_week;
	public $atotal_sessions;
	public $abranch_id;
	public $acategory;
	public $acountry;
	public $admin_discount;
	public $astart_date;
	public $aend_date;
	public $acourse_fee;
	public $apayment_type;
	public $atotal_amount;
	public $afinal_amount;
	public $anext_fee_due;
	public $aselected_days;
	public $aselected_batches;

	
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
             $config_email['smtp_pass']    = 'Pwdnew$2510';
             $config_email['charset']    = 'utf-8';
             $config_email['newline']    = "\r\n";
              $config_email['mailtype'] = 'html'; // or html
              $config_email['validation'] = TRUE; 

						
			$this->email->initialize($config_email);

			$user_type = $this->session->userdata('user_type');

			$request_method = $this->router->fetch_method();

	      
	
           
			
           
			
		}

        public function index()
        {
			
			$id= $this->uri->segment(3);
        	$role_info=array();
        	if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
        	}
        	//$user_type= $this->session->userdata('user_type');
             $user_id = $this->session->userdata('id');
             $admin_info =$this->admin_roles_model->getrole($user_id);
            $branch_id = $admin_info['branch_id'];
            $branch = $this->branches_model->getbranch($branch_id);
            $views = array('register');
        	$classes = $this->classes_model->getclasses(1);
        	$branches = $this->branches_model->getbranches(1);
        	$users = $this->users_model->getusers();
        	$user = $this->users_model->getusersbybranch($branch_id);
        	$data = array('views'=>$views,'classes'=>$classes,'branches'=>$branches,"role_info"=>$role_info,'users'=>$users,'branch'=>$branch, 'user'=>$user); //,'classes'=>$classesS
			$this->load->view('admin/template/templateweb',$data);
			header("Cache-Control: private, must-revalidate, max-age=0");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        } 
	
	

			public function success(){
			
				//$this->transactionresponse->setRespHashKey("KEYRESP123657234");
			$this->transactionresponse->setRespHashKey("00e7291c96efb88dc1");
				$f_code = $_POST["f_code"];
				$amt = $_POST["amt"];
				$date=$_POST["date"];
				
			 $views = array('success');
			 $data = array('views'=>$views,'f_code'=>$f_code,'amt'=>$amt,'date'=>$date);
			 $this->load->view('admin/template/templateweb',$data);
			
			} 
	
      

        public function logincheck()
        {    
              $this->form_validation->set_rules('username','Username','trim|required');
			  $this->form_validation->set_rules('password','Password','trim|required');
			  if($this->form_validation->run())
			  {

				$userName = $this->input->post('username');
				$password = $this->input->post('password');
				
				$userDetails = $this->mastertable_model->authentication($userName,md5($password));
				$checkuser = $this->mastertable_model->checkuser($userName);
				//print_r($userDetails);exit;
				
				if(!empty($userDetails))
				{
					//echo "hiiiiiiiii";
					$this->session->set_userdata($userDetails);	
					//$this->session->set_userdata('user_type',1);
					
					redirect('admin/dashboard');
                   

				}else{
					$this->session->set_flashdata('msg','user');
					redirect('admin/index');
				}
				
			  }else
			  {
			  	// echo json_encode(validation_errors());

			  	redirect('admin/index');
			  }
        }

        public function login_service()
        {
        	  $_POST = json_decode ( file_get_contents ( "php://input" ) );	
              $this->form_validation->set_rules('username','Username','trim|required');
			  $this->form_validation->set_rules('password','Password','trim|required');
			  if($this->form_validation->run())
			  {

				$userName = $this->input->post('username');
				$password = $this->input->post('password');
				
				$userDetails = $this->mastertable_model->authentication($userName,md5($password));
				//print_r($userDetails);exit;
				
				if(!empty($userDetails))
				{
					//echo "hiiiiiiiii";
					$this->session->set_userdata($userDetails);	
					//$this->session->set_userdata('user_type',1);
					redirect('admin/addcategory');

				}else{
					$this->session->set_flashdata('msg','user');
					redirect('admin/index');
				}
				
			  }else
			  {
			  	// echo json_encode(validation_errors());

			  	redirect('admin/index');
			  }
        }

         public function dashboard()
                 {
             $total=0;
        	$views = array('dashboard');
        	$demos = $this->demo_classes_model->getdemos($status=1);
        	$leave_requests = $this->leaves_model->getleaves($status=1);
        	$feedbacks = $this->feedback_model->getfeedbacks($status=1);
        	$date = date('Y-m-d');
        	$registrations = $this->user_family_members_model->todayregistrations($date);
        	$enrollments = $this->enroll_students_model->todaysenrollments($date);
            $collections = $this->payments_model->todays_collections($date);
             $total = $this->payments_model->totalcollections($date);
            
            
            $user_type= $this->session->userdata('user_type');
            $user_id = $this->session->userdata('id');
            $admin_info =$this->admin_roles_model->getrole($user_id);
            $branch_id = $admin_info['branch_id'];
            $demos_branch = $this->demo_classes_model->getdemosbybranches($branch_id,$status=1);
            $leave_request = $this->leaves_model->getleavesbybranches($branch_id,$status=1);
            $feedback = $this->feedback_model->getfeedback($branch_id,$status=1);
           $total_br = $this->payments_model->totalcollectionsbybranch($date,$branch_id);
            $registration = $this->user_family_members_model->todayregistration($branch_id);
            $enrollment=$this->enroll_students_model->todaysenrollment($date,$branch_id);
            $collection = $this->payments_model->todays_collection($date,$branch_id);
             if ($user_type ==1)
             {
            $data = array('views'=>$views,'demos_count'=>count($demos),'leave_requests_count'=>count($leave_requests),"feedback_count"=>count($feedbacks),"registration_count"=>count($registrations),"enrollment_count"=>count($enrollments),"collection"=>$collections,"total"=>$total);
            //print_r($data);exit;
             }
             else{
             	 $data = array('views'=>$views,'demos_count'=>count($demos_branch),'leave_requests_count'=>count($leave_request),"feedback_count"=>count($feedback),"registration_count"=>count($registration),"enrollment_count"=>count($enrollment),"collection"=>$collection,"total"=>$total_br);
             }
			$this->load->view('admin/template/template',$data);
        }

public function todayregistration()
        {    
        	$date= date('Y-m-d');
        	$user_type= $this->session->userdata('user_type');
            $user_id = $this->session->userdata('id');
            $admin_info =$this->admin_roles_model->getrole($user_id);
            $branch_id = $admin_info['branch_id'];
        	$views = array('todayregistration');
        	
        	$branches = $this->branches_model->getbranches();
        	if($user_type==1){
             $branch_id = $this->input->get('branch_id');
             }
             else{
            $branch_id = $admin_info['branch_id'];
        	}
            $registrations = $this->user_family_members_model->todayregistrations();
            $registration = $this->user_family_members_model->todayregistration($branch_id);

            if(!$branch_id){
            	$data = array('views'=>$views,'branches'=>$branches,'registration'=>$registrations);
            }
            
			        
        else{
        $data = array('views'=>$views,'branches'=>$branches,'registration'=>$registration);
        }
       $this->load->view('admin/template/template',$data);

   }
	
	public function whatsapplink(){
		 
        	
        	$branch_id =null;
        	$user_id = null;
		    $classes=null;
             $user_type = $this->session->userdata('user_type');
        	if(!empty($id))
        	{
        		$link_info = $this->whatsapp_model->getlink($id);
        	}
             $user_id = $this->session->userdata('id');
             $admin_info =$this->admin_roles_model->getrole($user_id);
           
				$classes = $this->classes_model->getclasses();
			
        	$teachers = $this->teachers_model->getteachers();
        
           
			
			if($user_type==4){
				$branch_id = $admin_info['branch_id'];
				$teachers = $this->teachers_timings_model->getteachersbybranch($branch_id);
				//$classes = $this->classes_model->getclasses(1,$branch_id);
				}
        	
        	$views = array('addwhatsapplink');
        	$branches = $this->branches_model->getbranches(1);
        	$data = array('views'=>$views,"branches"=>$branches,'branch_id'=>$branch_id,"classes"=>$classes,'teachers'=>$teachers);
			$this->load->view('admin/template/template',$data);
		} 
	
	public function getlink()
        {

        	$result = array();

        	$class_id = $this->input->post('class_id');
        	$branch_id = $this->input->post('branch_id');
		   $teacher_id = $this->input->post('teacher_id');
        	
        	$whatsapp = $this->whatsapp_model->getlink($branch_id,$class_id,$teacher_id);
        	
        	if(!empty($whatsapp))
        	{
	        	$result = $whatsapp;
	        	$result['success']=1;
	        	echo json_encode($result);

        	}else
        	{
        		$result['success']=2;
	        	echo json_encode($result);
        	}

        }

	public function insertwhatsapp(){
	
		$branch_id = $this->input->post('branch_id');
		$link = $this->input->post('whatsapp');
		$class_id= $this->input->post('class_id');
		$date = date('Y-m-d');
		$teacher_id=$this->input->post('teacher_id');
		$id= $this->input->post('id');
		$userDetails = array(
								
								'branch_id' =>$branch_id,
								'class_id'=>$class_id,
			                     'whatsapp_link'=>$link,
			                      'teacher_id'=>$teacher_id,
								'created_date'=> date("Y-m-d")
								);
		if(!empty($id))
            	{
					$response = $this->whatsapp_model->update($userDetails,$id);
					
            	}else
            	{
            		$response = $this->whatsapp_model->save($userDetails);
            	}
				
				
				if($response)
				{
					if(!empty($id)){
						$this->session->set_flashdata('message', 'Link updated successfully.');
						redirect('admin/whatsapplink');
					}else{
						$this->session->set_flashdata('message', 'Link added successfully.');
						redirect('admin/whatsapplink');
					}
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin/whatsapplink");
				}
			
			

	}
   public function todaysenrollment()
        {    
        	$date = date('Y-m-d');
        	$user_type= $this->session->userdata('user_type');
            $user_id = $this->session->userdata('id');
            $admin_info =$this->admin_roles_model->getrole($user_id);
            $branch_id = $admin_info['branch_id'];
        	$views = array('todaysenrollment');
        	
        	$branches = $this->branches_model->getbranches();
        	if($user_type==1){
             $branch_id = $this->input->get('branch_id');
             }
             else{
            $branch_id = $admin_info['branch_id'];
        	}
            $enrollments = $this->enroll_students_model->todaysenrollments($date);
            $enrollment = $this->enroll_students_model->todaysenrollment($date,$branch_id);

            if(!$branch_id){
            	$data = array('views'=>$views,'branches'=>$branches,'enrollment'=>$enrollments);
            }
            
			        
        else{
        $data = array('views'=>$views,'branches'=>$branches,'enrollment'=>$enrollment);
        }
       $this->load->view('admin/template/template',$data);

   }
      public function viewenrollment(){

      	$date= date('Y-m-d');
        	$user_type= $this->session->userdata('user_type');
            $user_id = $this->session->userdata('id');
            $start_date = date("Y-m-d",strtotime($this->input->get('start_date')));
            $end_date = date("Y-m-d",strtotime($this->input->get('end_date')));
            $admin_info =$this->admin_roles_model->getrole($user_id);
            //$branch_id[] = $admin_info['branch_id'];
        	$views = array('viewenrollments');
        	
        	$branches = $this->branches_model->getbranches();
        	if($user_type==1){
             $branch_id = $this->input->get('branch_id');
             //$branch_id = implode(",",$branch);
             
             }
             else{
            $branch_id = $admin_info['branch_id'];
        	}
            $enrollments = $this->enroll_students_model->enrollments($start_date,$end_date);
            $counts = count($enrollments);
            $enrollment = $this->enroll_students_model->enrollment($start_date,$end_date,$branch_id);
            $count = count($enrollment);
            if(!$branch_id){
            	$data = array('views'=>$views,'branches'=>$branches,'enrollments'=>$enrollments,'count'=>$counts,'start_date'=>$start_date,'end_date'=>$end_date);
            }
            
			        
        else{
        $data = array('views'=>$views,'branches'=>$branches,'enrollments'=>$enrollment,'count'=>$count,'start_date'=>$start_date,'end_date'=>$end_date);
        }
       $this->load->view('admin/template/template',$data);
      }
public function viewcollection(){

      	$date= date('Y-m-d');
        	$user_type= $this->session->userdata('user_type');
            $user_id = $this->session->userdata('id');
            $start_date = date("Y-m-d",strtotime($this->input->get('start_date')));
            $end_date = date("Y-m-d",strtotime($this->input->get('end_date')));
            $admin_info =$this->admin_roles_model->getrole($user_id);
            //$branch_id[] = $admin_info['branch_id'];
        	$views = array('viewcollection');
        	
        	$branches = $this->branches_model->getbranches();
        	if($user_type==1){
             $branch_id = $this->input->get('branch_id');
             //$branch_id = implode(",",$branch);
             
             }
             else{
            $branch_id = $admin_info['branch_id'];
        	}
            $collections = $this->payments_model->collections($start_date,$end_date);
            $total = $this->payments_model->tot_collections($start_date,$end_date);
            $collection = $this->payments_model->collection($start_date,$end_date,$branch_id);
            $total_br = $this->payments_model->tot_collectionsbybranch($start_date,$end_date,$branch_id);

            if(!$branch_id){
            	$data = array('views'=>$views,'branches'=>$branches,'collection'=>$collections,'total'=>$total,'start_date'=>$start_date,'end_date'=>$end_date);
            }
            
			        
        else{
        $data = array('views'=>$views,'branches'=>$branches,'collection'=>$collection,'total'=>$total_br,'start_date'=>$start_date,'end_date'=>$end_date);
        }
       $this->load->view('admin/template/template',$data);
      }
      public function todaycollection()
        {    
        	$date = date('Y-m-d');
        	$user_type= $this->session->userdata('user_type');
            $user_id = $this->session->userdata('id');
            $admin_info =$this->admin_roles_model->getrole($user_id);
            $branch_id = $admin_info['branch_id'];
        	$views = array('todayscollection');
        	$collections = $this->payments_model->todays_collections($date);
        	//$collections = $this->payments_model->todays_collections($date);
        	$branches = $this->branches_model->getbranches();
        	if($user_type==1){
             $branch_id = $this->input->get('branch_id');
             }
             else{
            $branch_id = $admin_info['branch_id'];
        	}
            
           
            $collection = $this->payments_model->todays_collection($date,$branch_id);
            //$total_br = $collection['total_amount'];

            if(!$branch_id){
            	$data = array('views'=>$views,'branches'=>$branches,'collection'=>$collections);
            }
            
			        
        else{
        $data = array('views'=>$views,'branches'=>$branches,'collection'=>$collection);
        }
       $this->load->view('admin/template/template',$data);

   }
		public function addcategory()
        {
        	$id= $this->uri->segment(3);
        	$category_info=array();
        	if(!empty($id))
        	{
        		$category_info = $this->categories_model->get_category($id);
        	}
        	$views = array('addcategory');
        	$categories = $this->categories_model->get_categories();
            $data = array('views'=>$views,'categories'=>$categories,'category_info'=>$category_info);
			$this->load->view('admin/template/template',$data);
        }
         public function printreceiptr()
        {
        	$views = array('printreceiptr');
        	$payment_id = $this->uri->segment(3);
        	$payments = $this->payments_model->getpaymentr($payment_id);
        	$payment_invoice = $this->payments_invoice_model->getpayment_invoicer($payment_id);
        	//echo $this->db->last_query();exit;
        	$data = array('views'=>$views,'payments'=>$payments,"payment_invoice"=>$payment_invoice); //,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        }
        public function insertcategory()
        {
        	//echo "hiiiiii";exit;
        	$this->form_validation->set_rules('category_name','category_name','trim|required');
        	

			if($this->form_validation->run())
			{

				$category_name = $this->input->post('category_name');
				

				$id = $this->input->post('id');
				
				$userDetails = array(
								'category_name' => $category_name,
								'created_date'=> date("Y-m-d H:i:s")
								);
				
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/category_images/';
	                $config['allowed_types']        = 'gif|jpg|png';
	               /* $config['max_width']            = 1024;
	                $config['max_height']           = 768;*/
	                $config['file_name'] = strtotime('now').str_replace(" ", "_", $_FILES['image']['name']);
	                //print_r($_FILES);
	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('image'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        //print_r($error);exit;
	                        $this->session->set_flashdata('message','Image upload error');
	                        redirect("admin/addmaincategory");	
	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());

	                }
	                $userDetails['logo'] = $config['file_name'];
            	}
            	if(!empty($id))
            	{
					$response = $this->categories_model->updatecategory($userDetails,$id);
					if(!empty($response))
					{
						$response= $id;
					}
            	}else
            	{
            		$response = $this->categories_model->savecategory($userDetails);
            	}
				
				
				if($response)
				{
					if(!empty($id)){
						$this->session->set_flashdata('message', 'Category updated successfully.');
					}else{
						$this->session->set_flashdata('message', 'Category added successfully.');
					}
					//$this->session->set_flashdata('message', 'Category added successfully.');
					redirect('admin/addcategory');
				}else
				{
					redirect("admin/addcategory");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin/addmaincategory");
        	
        }

        public function updatecategorystatus()
        {

				
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);

			if($status==1)
			{
				$status=2;
			}else
			{
				$status=1;
			}

			$userDetails = array(
							'status' => $status
							);

			$response = $this->categories_model->updatecategory($userDetails,$id);

			if($response)
			{
				$this->session->set_flashdata('message', 'Category status updated successfully.');
				redirect('admin/addcategory');
			}else
			{
				redirect("admin/addcategory");
			}
			
			redirect("admin/addmaincategory");
        	
        
        }

        public function deletecategory()
        {

            $category_id = $this->uri->segment(3);
            $cat_info = $this->categories_model->get_category($category_id);
            $image2 = $cat_info['logo'];
        	$response = $this->categories_model->deletecategory($category_id);
        	if($response)
        	{
        		@unlink("uploads/category_images/".$image2);

        		$this->session->set_flashdata('message', 'Category deleted successfully.');
				redirect('admin/addcategory');
        	}
     		
        }

       
        public function addclass()
        {
        	$id= $this->uri->segment(3);
        	$class_info=array();
        	if(!empty($id))
        	{
        		$class_info = $this->classes_model->getclass($id);
        	}
        	$views = array('addclass');
        	$categories = $this->categories_model->get_categories();
            $data = array('views'=>$views,'categories'=>$categories,"class_info"=>$class_info);//,"service_info"=>$service_info
			$this->load->view('admin/template/template',$data);
        }

        public function insertclass()
        {

        	$this->form_validation->set_rules('cat_id','category_name','trim|required');
        	$this->form_validation->set_rules('class_name','class_name','trim|required');



			if($this->form_validation->run())
			{

				$cat_id = $this->input->post('cat_id');
				$class_name = $this->input->post('class_name');
				$description = $this->input->post('description');
				

				$id = $this->input->post('id');
				
				$userDetails = array(
								'cat_id' => $cat_id,
								'class_name' => $class_name,
								'description' =>$description,
								'created_date'=> date("Y-m-d H:i:s")
								);
				
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/class_images/';
	                $config['allowed_types']        = 'gif|jpg|png';
	               /* $config['max_width']            = 1024;
	                $config['max_height']           = 768;*/
	                $config['file_name'] = strtotime('now').str_replace(" ", "_", $_FILES['image']['name']);
	                //print_r($_FILES);
	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('image'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        //print_r($error);exit;
	                        $this->session->set_flashdata('message','Image upload error');
	                        redirect("admin/addmaincategory");	
	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());

	                }
	                $userDetails['logo'] = $config['file_name'];
            	}
            	if(!empty($id))
            	{
					$response = $this->classes_model->update($userDetails,$id);
					if(!empty($response))
					{
						$response= $id;
					}
            	}else
            	{
            		$response = $this->classes_model->save($userDetails);
            	}
				
				
				if($response)
				{
					if(!empty($id)){
						$this->session->set_flashdata('message', 'Class updated successfully.');
						redirect('admin/viewclasses');
					}else{
						$this->session->set_flashdata('message', 'Class added successfully.');
						redirect('admin/addclass');
					}
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin/addclass");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin/addclass");
        	/*$views = array('addcategory');
            $data = array('views'=>$views);
			$this->load->view('admin/template/template',$data);*/
        
        }

        public function viewclasses()
        {
        	$views = array('viewclasses');
        	//$categories = $this->classes_model->get_classes();
        	$cat_id ="";
        	$cat_id = $this->input->get('cat_id');
        	if($cat_id!="")
        	{
        		$classes = $this->classes_model->getservicesbycondition(array('cat_id'=>$cat_id));
        	}
        	else
        	{
        		$classes = $this->classes_model->getclasses();//
        	}
        	
        	$data = array('views'=>$views, 'classes'=>$classes);
			$this->load->view('admin/template/template',$data);
        }

        public function updateclassstatus()
        {
		
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);

			if($status==1)
			{
				$status=2;
			}else
			{
				$status=1;
			}

			$userDetails = array(
							'status' => $status
							);

			$response = $this->classes_model->update($userDetails,$id);

			if($response)
			{
				$this->session->set_flashdata('message', 'Class status updated successfully.');
				redirect('admin/viewclasses');
			}else
			{
				redirect("admin/viewclasses");
			}
			
			redirect("admin/viewclasses");
        	
        
        }



        public function addbranch()
        {
        	$id= $this->uri->segment(3);

        	$branch_info=array();
        	//$admin_info=$this->mastertable_model->checkuser($userid)
        	if(!empty($id))
        	{
        		$branch_info = $this->branches_model->getbranch($id);
        	}

        	$views = array('addbranch');
        	$data = array('views'=>$views,'branch_info'=>$branch_info);//,"service_info"=>$service_info
			$this->load->view('admin/template/template',$data);
        }

        public function insertbranch()
        {
        	//print_r($_FILES);exit();

        	$this->form_validation->set_rules('branch_name','category_name','trim|required');
        	$this->form_validation->set_rules('geolocation','location','trim|required');

			if($this->form_validation->run())
			{

				$branch_name = $this->input->post('branch_name');
				$location = $this->input->post('geolocation');
				$registration_amount = $this->input->post('registration_amount');

				$mobile = $this->input->post('mobile');
				$email = $this->input->post('email');
				$latitude = $this->input->post('lat');
				$longitude = $this->input->post('lng');

				$contact_person_name = $this->input->post('contact_person_name');
				$address = $this->input->post('address');
				

				$id = $this->input->post('branch_id');
				
				$userDetails = array(
								'branch_name' => $branch_name,
								'location' => $location,
								'latitude' =>$latitude,
								'longitude' => $longitude,
								'mobile' => $mobile,
								'email' => $email,
								'registration_amount'=>$registration_amount,
								'contact_person_name' => $contact_person_name,
								'address' => $address,
								'created_date'=> date("Y-m-d H:i:s")
								);
				
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/branch_images/';
	                $config['allowed_types']        = 'gif|jpg|png';
	               /* $config['max_width']            = 1024;
	                $config['max_height']           = 768;*/
	                $config['file_name'] = strtotime('now').str_replace(" ", "_", $_FILES['image']['name']);
	                //print_r($_FILES);
	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('image'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        //print_r($error);exit;
	                        $this->session->set_flashdata('message','Image upload error');
	                       // redirect("admin/addmaincategory");	
	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());

	                }
	                $userDetails['logo'] = $config['file_name'];
            	}
            	if(!empty($id))
            	{
            		//print_r($_POST);exit;
					$response = $this->branches_model->update($userDetails,$id);
					
            	}else
            	{
            		$response = $this->branches_model->save($userDetails);
            	}
				
				
				if($response)
				{
					if(!empty($id)){
						$this->session->set_flashdata('message', 'Branch updated successfully.');
						redirect('admin/viewbranches');
					}else{
						$this->session->set_flashdata('message', 'Branch added successfully.');
						redirect('admin/addbranch');
					}
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin/addbranch");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin/addbranch");        
        }

        public function viewbranches()
        {
        	$views = array('viewbranches');
        	//$categories = $this->classes_model->get_classes();
        	$cat_id ="";
        	//$cat_id = $this->input->get('cat_id');
        	if($cat_id!="")
        	{
        		//$classes = $this->classes_model->getservicesbycondition(array('cat_id'=>$cat_id));
        	}
        	else
        	{
        		$branches = $this->branches_model->getbranches();
        	}
        	
        	$data = array('views'=>$views, 'branches'=>$branches);
			$this->load->view('admin/template/template',$data);
        }


        public function updatebranchstatus()
        {

				
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);

			if($status==1)
			{
				$status=2;
			}else
			{
				$status=1;
			}

			$userDetails = array(
							'status' => $status
							);

			$response = $this->branches_model->update($userDetails,$id);

			if($response)
			{
				$this->session->set_flashdata('message', 'Branch status updated successfully.');
				redirect('admin/viewbranches');
			}else
			{
				redirect("admin/viewbranches");
			}
			
			redirect("admin/viewbranches");
        	
        
        }


        public function addteacher()
        {
        	$id= $this->uri->segment(3);
        	/*$teacher_info=array();
        	if(!empty($id))
        	{
        		$teacher_info = $this->classes_model->getclass($id);
        	}*/
        	$views = array('addteacher');

        	$classes = $this->classes_model->getclasses(1);
        	$branches = $this->branches_model->getbranches(1);

            $data = array('views'=>$views,'classes'=>$classes,'branches'=>$branches);//,"teacher_info"=>$teacher_info,"service_info"=>$service_info
			$this->load->view('admin/template/template',$data);
        }

        public function editteacher()
        {
        	$id= $this->uri->segment(3);
        	$teacher_info=array();
        	if(!empty($id))
        	{
        		$teacher_info = $this->teachers_model->getteacher($id);
        	}
        	
        	$teacher_timings = $this->teachers_timings_model->gettimings($id);

        	$classes = $this->classes_model->getclasses(1);

        	$branches = $this->branches_model->getbranches(1);

			$views = array('editteacher');

            $data = array('views'=>$views,'classes'=>$classes,'branches'=>$branches,"teacher_info"=>$teacher_info,"teacher_timings"=>$teacher_timings);//,"service_info"=>$service_info
			$this->load->view('admin/template/template',$data);
        }

        public function insertteacher()
        {
        	/*echo "<pre>";
        	print_r($_POST);exit;*/
        	$this->form_validation->set_rules('teacher_name','teacher_name','trim|required');
        	$this->form_validation->set_rules('mobile','mobile','trim|required');


			if($this->form_validation->run())
			{

				$teacher_name = $this->input->post('teacher_name');
				$date_of_joining = $this->input->post('date_of_joining');
				$mobile = $this->input->post('mobile');
				$whatsapp_number = $this->input->post('whatsapp_number');
				$emergency_contact_number = $this->input->post('emergency_contact_number');
				$emergency_contact_name = $this->input->post('emergency_contact_name');
				$contact_person_name = $this->input->post('contact_person_name');
				$address = $this->input->post('address');
				$categories = $this->input->post('categories');
				$branch = $this->input->post('branch');
				$in_time = $this->input->post('in_time');
				$out_time = $this->input->post('out_time');
				$email = $this->input->post('email');
				$days = $this->input->post('days');
				$location = $this->input->post('geolocation');
				$latitude = $this->input->post('lat');
				$longitude = $this->input->post('lng');
				$branch_id= (!empty($branch)?implode(",", $branch):"");




				$id = $this->input->post('branch_id');

				$userDetails = array(
								'username' => $mobile,
								'user_type' => 3,
								'created_date'=> date("Y-m-d H:i:s")
								);

				$teacher_id = $this->mastertable_model->save($userDetails);

				
				
				$userDetails1 = array(
					            //'branch_id'=>$value,
								'teacher_name' => $teacher_name,
								'date_of_joining' => date("Y-m-d",strtotime($date_of_joining)),
								'emergency_contact_number' =>$emergency_contact_number,
								'emergency_contact_name' => $emergency_contact_name,
								'mobile' => $mobile,
								'teacher_id'=>$teacher_id,
								'whatsapp_number' => $whatsapp_number,
								'address' => $address,
								'email' =>$email,
								'location'=>$location,
								'latitude'=>$latitude,
								'longitude'=>$longitude,
								'created_date'=> date("Y-m-d H:i:s"),
								'branch_id' =>$branch_id
								);


				
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/teacher_images/';
	                $config['allowed_types']        = 'gif|jpg|png';
	               /* $config['max_width']            = 1024;
	                $config['max_height']           = 768;*/
	                $config['file_name'] = strtotime('now').str_replace(" ", "_", $_FILES['image']['name']);
	                //print_r($_FILES);
	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('image'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        //print_r($error);exit;
	                        $this->session->set_flashdata('message','Image upload error');
	                       // redirect("admin/addmaincategory");	
	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());

	                }
	                $userDetails1['profile_pic'] = $config['file_name'];
            	}
            	if(!empty($id))
            	{
            		//print_r($_POST);exit;
					$response = $this->teachers_model->update($userDetails1,$id);
					
            	}else
            	{
            		$response = $this->teachers_model->save($userDetails1);

            		$userdata =array();
            		foreach ($categories as $cat_info) {

            			$categories_info = array(
            								'class_id'=>$cat_info,
            								'teacher_id'=>$teacher_id
            					);
            			array_push($userdata, $categories_info);
            		}
            		$this->teachers_classes_model->save($userdata);

            		if(!empty($branch)){
            			$branch_timings = array();
            			foreach ($branch as $key => $value) {

            				$users = array("branch_id"=>$value,
            								'days'=>@implode(",", $days[$key]),
            								'in_time'=>date('H:i',strtotime($in_time[$key])),
            								'out_time'=>date('H:i',strtotime($out_time[$key])),
            								'teacher_id'=>$teacher_id
            							);
            				array_push($branch_timings, $users);

            			}
            			$this->teachers_timings_model->save($branch_timings);
            		}
            	}
				
				
				if($response)
				{
					if(!empty($id)){
						$this->session->set_flashdata('message', 'Teacher updated successfully.');
						redirect('admin/viewteachers');
					}else{
						$this->session->set_flashdata('message', 'Teacher added successfully.');
						redirect('admin/addteacher');
					}
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin/addbranch");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin/addbranch");        
        
        	
        }


        public function viewteachers()
        {
        	$views = array('viewteachers');
        	$user_type = $this->session->userdata('user_type');
        	
             $user_id = $this->session->userdata('id');
             $admin_info =$this->admin_roles_model->getrole($user_id);
             $categories = $this->categories_model->get_categories();
        	$branches = $this->branches_model->getbranches();

             if($user_type==1){
             $branch_id = $this->input->get('branch_id');
             }
             else{
            $branch_id = $admin_info['branch_id'];
        	}
           
        	$cat_id ="";
        	
        	if($cat_id!="")
        	{
        		//$classes = $this->classes_model->getservicesbycondition(array('cat_id'=>$cat_id));
        	}
        	else
        	{
        		$teachers = $this->teachers_model->getteachers();
        		$teacher = $this->teachers_timings_model->getteachersbybranch($branch_id);
        	}
        	

            if(!$branch_id){
            $data = array('views'=>$views,'categories'=>$categories,'branches'=>$branches,'teachers'=>$teachers );//,"service_info"=>$service_info,"teacher_info"=>$teacher_info
            }
            else{
            	$data = array('views'=>$views,'categories'=>$categories,'branches'=>$branches,'teachers'=>$teacher);
            }
        	$this->load->view('admin/template/template',$data);
        }



        public function updateteacherstatus()
        {

				
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);

			if($status==1)
			{
				$status=2;
			}else
			{
				$status=1;
			}

			$userDetails = array(
							'status' => $status
							);

			$response = $this->teachers_model->update($userDetails,$id);

			if($response)
			{
				$this->session->set_flashdata('message', 'Teacher status updated successfully.');
				redirect('admin/viewteachers');
			}else
			{
				redirect("admin/viewteachers");
			}
			
			redirect("admin/viewteachers");
        	
        
        }
     
        

        public function updateteacher()
        {
        	
        	$this->form_validation->set_rules('teacher_name','teacher_name','trim|required');
        	//$this->form_validation->set_rules('mobile','mobile','trim|required');

        	//print_r($_POST);exit;

			if($this->form_validation->run())
			{

				$teacher_name = $this->input->post('teacher_name');
				$date_of_joining = $this->input->post('date_of_joining');
				//$mobile = $this->input->post('mobile');
				$whatsapp_number = $this->input->post('whatsapp_number');
				$emergency_contact_number = $this->input->post('emergency_contact_number');
				$emergency_contact_name = $this->input->post('emergency_contact_name');
				$contact_person_name = $this->input->post('contact_person_name');
				$address = $this->input->post('address');
				$categories = $this->input->post('categories');
				$branch = $this->input->post('branch');
				$in_time = $this->input->post('in_time');
				$out_time = $this->input->post('out_time');
				$email = $this->input->post('email');
				$days = $this->input->post('days');
				$location = $this->input->post('geolocation');
				$latitude = $this->input->post('lat');
				$longitude = $this->input->post('lng');



				$teacher_id = $this->input->post('teacher_id');

				/*$userDetails = array(
								'username' => $mobile,
								'user_type' => 3,
								'created_date'=> date("Y-m-d H:i:s")
								);

				$teacher_id = $this->mastertable_model->save($userDetails);*/
				
				$userDetails1 = array(
								'teacher_name' => $teacher_name,
								'date_of_joining' => date("Y-m-d",strtotime($date_of_joining)),
								'emergency_contact_number' =>$emergency_contact_number,
								'emergency_contact_name' => $emergency_contact_name,
								//'mobile' => $mobile,
								
								'whatsapp_number' => $whatsapp_number,
								'address' => $address,
								'email' =>$email,
								'location'=>$location,
								'latitude'=>$latitude,
								'longitude'=>$longitude,
								//'created_date'=> date("Y-m-d H:i:s")
								);
				
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/teacher_images/';
	                $config['allowed_types']        = 'gif|jpg|png';
	               /* $config['max_width']            = 1024;
	                $config['max_height']           = 768;*/
	                $config['file_name'] = strtotime('now').str_replace(" ", "_", $_FILES['image']['name']);
	                //print_r($_FILES);
	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('image'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        //print_r($error);exit;
	                        $this->session->set_flashdata('message','Image upload error');
	                       // redirect("admin/addmaincategory");	
	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());

	                }
	                $userDetails1['profile_pic'] = $config['file_name'];
            	}
            	
            		
					$response = $this->teachers_model->update($userDetails1,$teacher_id);
					
            	
            		
            		
            		
            		if(!empty($categories))
            		{
            			$this->teachers_classes_model->delete($teacher_id);
            			$userdata =array();
            			foreach ($categories as $cat_info) {
	            			$categories_info = array(
	            								'class_id'=>$cat_info,
	            								'teacher_id'=>$teacher_id
	            					);
	            			array_push($userdata, $categories_info);
            			}
            			$this->teachers_classes_model->save($userdata);
            		}
            		
            		if(!empty($branch))
            		{
            			/*echo "<pre>";
            			print_r($days);*/
            			
            			$branch_timings = array();
            			foreach ($branch as $key => $value) {

            				$users = array("branch_id"=>$value,
            								'days'=>@implode(",", $days[$key]),
            								'in_time'=>date('H:i',strtotime($in_time[$key])),
            								'out_time'=>date('H:i',strtotime($out_time[$key])),
            								'teacher_id'=>$teacher_id
            							);
            				array_push($branch_timings, $users);

            			}
            			//print_r($branch_timings);exit();
            			$this->teachers_timings_model->delete($teacher_id);
            			$this->teachers_timings_model->save($branch_timings);
            		}
            	
				
				
				if($response)
				{
					
					$this->session->set_flashdata('message', 'Teacher updated successfully.');
					redirect('admin/viewteachers');
					
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin/viewteachers");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin/viewteachers");        
        
        	
        }

        public function addplan()
        {
        	$id= $this->uri->segment(3);
        	$plan_info=array();
        	if(!empty($id))
        	{
        		$plan_info = $this->plans_model->getplan($id);
        	}
        	$views = array('addplan');
        	$classes = $this->classes_model->getclasses(1);
        	$branches = $this->branches_model->getbranches(1);
        	//print_r($classes);exit();
            $data = array('views'=>$views,'classes'=>$classes,"plan_info"=>$plan_info,'branches'=>$branches);//,"service_info"=>$service_info
			$this->load->view('admin/template/template',$data);
        }

        public function insertplan()
        {

        	$this->form_validation->set_rules('class_id','class_id','trim|required');
        	$this->form_validation->set_rules('branch_id','branch_id','trim|required');
        	
			if($this->form_validation->run())
			{

				$class_id = $this->input->post('class_id');
				$branch_id = $this->input->post('branch_id');
				$one_session = $this->input->post('one_session');
				$two_session = $this->input->post('two_session');
				$three_session = $this->input->post('three_session');
				$four_session = $this->input->post('four_session');
				$five_session = $this->input->post('five_session');
				$six_session = $this->input->post('six_session');
				$two_session_3 = $this->input->post('two_session_3months');
				$two_session_6 = $this->input->post('two_session_6months');
				$three_session_3 = $this->input->post('three_session_3months');
				$three_session_6 = $this->input->post('three_session_6months');
				$two_session_12 = $this->input->post('two_session_12months');
				$three_session_12=$this->input->post('three_session_12months');

				$id = $this->input->post('id');
				
				$userDetails = array(
								'class_id' => $class_id,
								'branch_id' => $branch_id,
								//'one_session' => $one_session,
								//'two_session' => $two_session,
								//'three_session' => $three_session,
								//'four_session' => $four_session,
								//'five_session' => $five_session,
								//'six_session' => $six_session,
								'two_session_three_months'=>$two_session_3,
								'two_session_six_months'=>$two_session_6,
								'three_session_three_months'=>$three_session_3,
								'three_session_six_months'=>$three_session_6,
								'two_session_one_year'=>$two_session_12,
								'three_session_one_year'=>$three_session_12,
								'created_date'=> date("Y-m-d H:i:s")
								);
				
				if(!empty($id))
            	{
					$response = $this->plans_model->update($userDetails,$id);
					
            	}else
            	{
            		$response = $this->plans_model->save($userDetails);
            	}
				
				
				if($response)
				{
					if(!empty($id)){
						$this->session->set_flashdata('message', 'Plan updated successfully.');
						redirect('admin/addplan');
					}else{
						$this->session->set_flashdata('message', 'Plan added successfully.');
						redirect('admin/addplan');
					}
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin/addplan");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin/addplan");
        	
        }

       public function viewplans()
        {
        	$user_type= $this->session->userdata('user_type');
             $user_id = $this->session->userdata('id');
             $admin_info =$this->admin_roles_model->getrole($user_id);
             
        	if($user_type==1){
        	$id= $this->uri->segment(3);
        	}
        	else{
        		$id=$admin_info['branch_id'];
        	}
        	if(!empty($id))
        	{
        		$plans = $this->plans_model->getplansbybranch($id);
        	}else
        	{
        		$plans = $this->plans_model->getplans();
        	}
        	$views = array('viewplans');
        	
        	$branches = $this->branches_model->getbranches(1);
        	//$branch = $this->branches_model->getbranch($branch_id);
        	
        	$data = array('views'=>$views, 'plans'=>$plans, 'branches'=>$branches);
        
			$this->load->view('admin/template/template',$data);
        
        }
	
public function studentfees()
        {

        	$result = array();
        	$batch_classes = array();
        	$user_id = $this->uri->segment(3);
             $date = date('Y-m-d');
             
            
        	//$plans = $this->plans_model->getplans(1);
             //$attendence=
			$invoice = $this->invoice_model->getinvoicebyusers($user_id);
			
			//$enroll_id = $invoice['id'];
			//$attendence=$this->enroll_students_model->sessionenddate();
			//$invoice = $this->enroll_students_model->getenrollsbyactiveuser($date,$user_id);
			$views = array('studentfees');
        	//$this->generateinvoice_cron();
        	$data = array('views'=>$views,'invoice'=>$invoice, 'user_id'=>$user_id);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
 			
            //return $this->generateinvoice_cron();

        }


         /*public function updateplanstatus()
        {
		
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);

			if($status==1)
			{
				$status=2;
			}else
			{
				$status=1;
			}

			$userDetails = array(
							'status' => $status
							);

			$response = $this->plans_model->update($userDetails,$id);

			if($response)
			{
				$this->session->set_flashdata('message', 'Plan status updated successfully.');
				redirect('admin/viewclasses');
			}else
			{
				redirect("admin/viewclasses");
			}
			
			redirect("admin/viewclasses");
        	
        
        }*/



        public function addadminrole()
        {
        	$id= $this->uri->segment(3);
        	$role_info=array();
        	if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
        	}
        	$views = array('addadminrole');
        	$branches = $this->branches_model->getbranches(1);
        	//print_r($classes);exit();
            $data = array('views'=>$views,'branches'=>$branches,"role_info"=>$role_info);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        }

        public function insertadminrole()
        {
        	$this->form_validation->set_rules('name','name','trim|required');
        	$this->form_validation->set_rules('mobile','mobile','trim|required');


			if($this->form_validation->run())
			{
                 $user_type = 0;
				$name = $this->input->post('name');
				$mobile = $this->input->post('mobile');
				$address = $this->input->post('address');
				$branch_id = $this->input->post('branch_id');
				$email = $this->input->post('email');
				$date_of_birth = $this->input->post('date_of_birth');
				$branch_id = $this->input->post('branch_id');
				$password = $this->input->post('password');
				$id= $this->input->post('admin_role_id');
				$admin_type = $this->input->post('admin_type');
				//$user_type;
				if($admin_type == "Super Admin"){
					$user_type = 1;
                }
                if ($admin_type=="City Admin")
                	{$user_type = 5;
                	# code...
                }
                 if ($admin_type=="Branch Admin"){
                	$user_type = 4;
                	# code...
                }
                
				$userDetails = array(
								'username' => $mobile,
								//'user_type' => $user_type,
								'created_date'=> date("Y-m-d H:i:s"),
								'user_type' => $user_type

								);

				if($password!="")
				{
					$userDetails['password'] = md5($password);
				}
				

				if(!empty($id)){
					$resp = $this->mastertable_model->update(array('username'=>$mobile,'password'=>md5($password)),$id);
					$admin_role_id = $id;
				}
				else
				{
					$admin_role_id = $this->mastertable_model->save($userDetails);
				}
				
				
				$userDetails1 = array(
								'name' => $name,
								'date_of_birth' => date("Y-m-d",strtotime($date_of_birth)),
								'branch_id' =>$branch_id,
								'mobile' => $mobile,
								'admin_role_id'=>$admin_role_id,
								'address' => $address,
								'email' =>$email,
								'admin_type'=>$admin_type,
								/*'location'=>$location,
								'latitude'=>$latitude,
								'longitude'=>$longitude,*/
								'created_date'=> date("Y-m-d H:i:s")
								);
				
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/admin_role_images/';
	                $config['allowed_types']        = 'gif|jpg|png';
	               /* $config['max_width']            = 1024;
	                $config['max_height']           = 768;*/
	                $config['file_name'] = strtotime('now').str_replace(" ", "_", $_FILES['image']['name']);
	                //print_r($_FILES);
	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('image'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        //print_r($error);exit;
	                        $this->session->set_flashdata('message','Image upload error');
	                       // redirect("admin/addmaincategory");	
	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());

	                }
	                $userDetails1['profile_pic'] = $config['file_name'];
            	}
            	if(!empty($id))
            	{
            		//print_r($_POST);exit;
					$response = $this->admin_roles_model->update($userDetails1,$id);
					
            	}else
            	{

            		$response = $this->admin_roles_model->save($userDetails1);
            	}
				
				
				if($response)
				{
					if(!empty($id)){
						$this->session->set_flashdata('message', 'Admin Role updated successfully.');
						redirect('admin/viewadminroles');
					}else{
						$this->session->set_flashdata('message', 'Admin Role added successfully.');
						redirect('admin/addadminrole');
					}
					
				}else
				{
					redirect("admin/addadminrole");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin/addadminrole");        
        
        	
        }

        public function viewadminroles()
        {
        	$views = array('viewadminroles');
        	//$categories = $this->classes_model->get_classes();
        	/*$cat_id ="";
        	$cat_id = $this->input->get('cat_id');
        	if($cat_id!="")
        	{
        		$classes = $this->classes_model->getservicesbycondition(array('cat_id'=>$cat_id));
        	}
        	else
        	{*/
        		$roles = $this->admin_roles_model->getroles();
        	/*}*/
        	
        	$data = array('views'=>$views, 'roles'=>$roles);
			$this->load->view('admin/template/template',$data);
        }

        public function updateadminrolestatus()
        {
		
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);

			if($status==1)
			{
				$status=2;
			}else
			{
				$status=1;
			}

			$userDetails = array(
							'status' => $status
							);

			$response = $this->plans_model->update($userDetails,$id);

			if($response)
			{
				$this->session->set_flashdata('message', 'Plan status updated successfully.');
				redirect('admin/viewclasses');
			}else
			{
				redirect("admin/viewclasses");
			}
			
			redirect("admin/viewclasses");
        	
        
        }

        public function checkmobile()
		{
			$this->form_validation->set_rules('mobile','mobile','trim|required');
			if($this->form_validation->run())
			{
				$mobile = $this->input->post('mobile');
				$vendor_id = $this->input->post('vendor_id');
				$result = $this->mastertable_model->checkusermobile($mobile,$vendor_id);
				//echo $this->db->last_query();
				if(empty($result))
				{
	 				echo json_encode(true);
				}
				else
				{
					echo json_encode(false);
				}
	 			
	 		

			}
		}

		public function checkusermobile()
		{
			$this->form_validation->set_rules('mobile','mobile','trim|required');
			if($this->form_validation->run())
			{
				$mobile = $this->input->post('mobile');
				$vendor_id = $this->input->post('vendor_id');
				$result = $this->users_model->checkusermobile($mobile,$vendor_id);
				//echo $this->db->last_query();
				if(empty($result))
				{
	 				echo json_encode(true);
				}
				else
				{
					echo json_encode(false);
				}
	 			
	 		

			}
		}

		public function addpromotions()
        {
        	$id= $this->uri->segment(3);
        	$user_type= $this->session->userdata('user_type');
            $user_id = $this->session->userdata('id');
            $admin_info =$this->admin_roles_model->getrole($user_id);
            $branch_id = $admin_info['branch_id'];
        	$promotion=array();
        	if(!empty($id))
        	{
        		$promotion = $this->promotional_offers_model->get_promotion($id);
        	}
        	$views = array('addpromotions');
        	$branches = $this->branches_model->getbranches(1);
        	if($user_type==1){
        	$promotions = $this->promotional_offers_model->get_promotions();
        }
        else{
        	$promotions = $this->promotional_offers_model->get_promotionbybranchid($branch_id);
        	}//print_r($promotion);exit();
        	
            $data = array('views'=>$views,'branches'=>$branches,"promotion"=>$promotion,"promotions"=>$promotions);
            
            	
            
			$this->load->view('admin/template/template',$data);
        } 

        public function getpromotionaloffer()
        {
        	$id= $this->input->post('branch_id');
        	$result=array();
        	if(!empty($id))
        	{
        		$result = $this->promotional_offers_model->get_promotionbybranch($id);
        	}
        	
			if(!empty($result)){
				 $result['success']=1;
			}else{
				 $result['success']=2;
			}
			echo json_encode($result);
        }


        public function insertpromotion()
        {
        	$this->form_validation->set_rules('branch_id','branch_id','trim|required');
        	
        	if($this->form_validation->run())
			{
				$branch_id = $this->input->post('branch_id');
				$promo_code = $this->input->post('promo_code');
				$amount = $this->input->post('amount');
				$start_date = $this->input->post('start_date');
				$end_date = $this->input->post('end_date');

				$id= $this->input->post('id');
				
				//$promotion = $this->promotional_offers_model->get_promotionbybranch($branch_id);
				
				$userDetails = array(
								'branch_id' => $branch_id,
								'promocode' => $promo_code,
								'amount' => $amount,
								'start_date' => date("Y-m-d",strtotime($start_date)),
								'end_date' => date("Y-m-d",strtotime($end_date))
								);
				
				if(!empty($id))
            	{
					$id = $this->promotional_offers_model->update($userDetails,$id);
					$response = $id;
					
            	}else
            	{
            		$response = $this->promotional_offers_model->save($userDetails);
            	}
				
				
				if($response)
				{
					if(!empty($id)){
						$this->session->set_flashdata('message', 'Promotion updated successfully.');
						redirect('admin/addpromotions');
					}else{
						$this->session->set_flashdata('message', 'Promotion added successfully.');
						redirect('admin/addpromotions');
					}
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin/addpromotions");
				}
			}else
			{
				redirect("admin/addpromotions");
			}
			
        	/*$views = array('addcategory');
            $data = array('views'=>$views);
			$this->load->view('admin/template/template',$data);*/
        
        
        }

        public function updatepromotionstatus()
        {

				
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);

			if($status==1)
			{
				$status=2;
			}else
			{
				$status=1;
			}

			$userDetails = array(
							'status' => $status
							);

			$response = $this->promotional_offers_model->update($userDetails,$id);

			if($response)
			{
				$this->session->set_flashdata('message', 'promotion status updated successfully.');
				redirect('admin/addpromotions');
			}else
			{
				redirect("admin/addpromotions");
			}
			
			redirect("admin/addpromotions");
        	
        
        }

        public function viewfeedbacks()
        {
        	$views = array('viewfeedbacks');
        	
        	$user_type= $this->session->userdata('user_type');
             $user_id = $this->session->userdata('id');
             $admin_info =$this->admin_roles_model->getrole($user_id);
             $branches = $this->branches_model->getbranches();
            //$branch_id = $admin_info['branch_id'];
           


           if($user_type==1){
             $branch_id = $this->input->get('branch_id');
             }
             else{
            $branch_id = $admin_info['branch_id'];
        	}
             $feedbacks = $this->feedback_model->getfeedbacks();
        	 $feedback = $this->feedback_model->getfeedback($branch_id,$status=1);

           if(!$branch_id){
        	$data = array('views'=>$views, 'branches'=>$branches,'feedbacks'=>$feedbacks);
        }
            else{
        	$data = array('views'=>$views, 'branches'=>$branches,'feedbacks'=>$feedback);
        }
			$this->load->view('admin/template/template',$data);
        }

        public function updatefeedbackstatus()
        {
		
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);

			if($status==1)
			{
				$status=2;
			}else
			{
				$status=1;
			}

			$userDetails = array(
							'status' => $status
							);

			$response = $this->feedback_model->update($userDetails,$id);

			if($response)
			{
				$this->session->set_flashdata('message', 'feedback status updated successfully.');
				redirect('admin/viewfeedbacks');
			}else
			{
				redirect("admin/viewfeedbacks");
			}
			
			redirect("admin/viewfeedbacks");
        	
        
        }

        public function viewleaves()
        {
        	$user_type= $this->session->userdata('user_type');
             $user_id = $this->session->userdata('id');
             
             $admin_info =$this->admin_roles_model->getrole($user_id);
             $branches = $this->branches_model->getbranches();

           // $branch_id = $admin_info['branch_id'];
        	$views = array('viewleaves');
            
        	$id = $this->uri->segment(3);

        	if($user_type==1){
             $branch_id = $this->input->get('branch_id');
             }
             else{
            $branch_id = $admin_info['branch_id'];
        	}
        	
        	$leave_request = $this->leaves_model->getleavesbybranches($branch_id,$status=1);

        	if(!empty($id)){
        		$leaves = $this->leaves_model->getleaves(null,$id);

        	}else{
        		$leaves = $this->leaves_model->getleaves();
        	}



        	
          if(!$branch_id){
        	$data = array('views'=>$views,"branches"=>$branches, 'leaves'=>$leaves);
        }
        else{
        	$data = array('views'=>$views,"branches"=>$branches, 'leaves'=>$leave_request);
        }
			$this->load->view('admin/template/template',$data);
        }

        public function updateleavesstatus()
        {
		
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);

			$userDetails = array(
							'status' => $status
							);
			$leave_info = $this->leaves_model->getleave($id);

			$message2["message"]	= "Leave Application:".$leave_info['name']."(".$leave_info['class_name'].") start from:".date("d-m-Y",strtotime($leave_info['start_date']))." ".($leave_info['type']==1?"15 days":"30 days")."-".($status==2?"Approved":"Rejected");
        	$message2["target"]	= 1;
			$message2["success"]	= 1;
			$message1 = json_encode($message2);

			$userDetails1 = array("user_id"=>$leave_info['user_id'],
								  'branch_id'=>$leave_info['branch_id'],
								  'message'	=>$message2["message"],
								  'created_on'=> date("Y-m-d H:i:s")
							);

			$responsex = $this->notifications_model->save($userDetails1);
			
			if(!empty($leave_info['mobile']))
			{
				
				//$this->sms->sendsms($leave_info['mobile'],$message);
			}
			
			if(!empty($leave_info['device_id']))
        	{
        		$responsez1 =  $this->notifications->send_ios_notification(array($leave_info['device_id']),$message1);
       		}
       		if(!empty($leave_info['gcm_id']))
       		{
        		$responsez = $this->notifications->send_notification(array($leave_info['gcm_id']),$message1);
        	}

			$response = $this->leaves_model->update($userDetails,$id);

			if($response)
			{
				$this->session->set_flashdata('message', 'Leave status updated successfully.');
				redirect('admin/viewleaves');
			}else
			{
				redirect("admin/viewleaves");
			}
			
			redirect("admin/viewleaves");
        	
        
        }

       public function addstudent()
        {
        	$id= $this->uri->segment(3);
        	$role_info=array();
        	if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
        	}
        	//$user_type= $this->session->userdata('user_type');
             $user_id = $this->session->userdata('id');
             $admin_info =$this->admin_roles_model->getrole($user_id);
            $branch_id = $admin_info['branch_id'];
            $branch = $this->branches_model->getbranch($branch_id);
            $views = array('addstudent');
        	$classes = $this->classes_model->getclasses(1);
        	$branches = $this->branches_model->getbranches(1);
        	$users = $this->users_model->getusers();
        	$user = $this->users_model->getusersbybranch($branch_id);
        	$data = array('views'=>$views,'classes'=>$classes,'branches'=>$branches,"role_info"=>$role_info,'users'=>$users,'branch'=>$branch, 'user'=>$user); //,'classes'=>$classesS
			$this->load->view('admin/template/template',$data);
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

        public function insertstudent()
        {
        	$this->form_validation->set_rules('name','name','trim|required');
        	$this->form_validation->set_rules('mobile','mobile','trim|required');
			if($this->form_validation->run())
			{
				$payment_id= null;
				$name = $this->input->post('name');
				$mobile = $this->input->post('mobile');
				$email = $this->input->post('email');
				$address = $this->input->post('address');
				$age = $this->input->post('age');
				$branch_id = $this->input->post('branch_id');
				$whatsapp_number = $this->input->post('whatsapp_number');
				$organization_name = $this->input->post('organization_name');
				$known_from = $this->input->post('known_from');
				$registration_date=date("Y-m-d",strtotime($this->input->post('registration_date')));
				$registration_amount = $this->input->post('registration_amount');
				$final_amount = $registration_amount;
				$country = $this->input->post('country');
				$country_code =$this->input->post('hiddeninput');
				$reg_type = $this->input->post('reg_type');
				$class_id= $this->input->post('class_id');
				$class_name = $this->input->post('class_id');
				$userDetails1 = array();
				$known_from =  (!empty($known_from)?implode(",", $known_from):"");
				$other_info = $this->input->post('other_info');
				$userDetails = array(
								'age' => $age,
								'branch_id' =>$branch_id,
								'mobile' => $mobile,
								'address' => $address,
								'email' =>$email,
								'organization_name'=>$organization_name,
								'registration_date'=>$registration_date,
								'registration_amount'=>$registration_amount,
								'whatsapp_number'=>$whatsapp_number,
								'other_info'=>$other_info,
								'final_amount'=>$final_amount,
					             
								//'country'=>$country,
								'created_date'=> date("Y-m-d")
								);
				
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/user_images/';
	                $config['allowed_types']        = 'gif|jpg|png';
	               /* $config['max_width']            = 1024;
	                $config['max_height']           = 768;*/
	                $config['file_name'] = strtotime('now').str_replace(" ", "_", $_FILES['image']['name']);
	                //print_r($_FILES);
	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('image'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        //print_r($error);exit;
	                        $this->session->set_flashdata('message','Image upload error');
	                       // redirect("admin/addmaincategory");	
	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());

	                }
	                $userDetails1['profile_pic'] = $config['file_name'];
            	}
				$response = $this->users_model->save($userDetails);
            	$user_id = $response;
				if($response)
				{

					$userDetails1 = array(
							'name' => $name,
							'branch_id'=>$branch_id,
						     'class_name'=>$class_name,
							'country'=>$country,
						    'registration_date'=>$registration_date,
							'user_id'=>$response,
							'type'=>1,
							'registration_amount'=>$registration_amount,
							);

            		$response1 = $this->user_family_members_model->save($userDetails1);

            		if($reg_type==1)
            		{
            			$userDetailsz = array(
								'member_id'=>$response1,
								'user_id'=>$response,
								 'total_amount'=>$registration_amount,
								 'final_amount'=>$final_amount,
								  'admin_discount'=>null,
								   'payment_type'=>1,
								   'discount_type'=> null,
								     'created_date'=>date("Y-m-d"), 
								);
				
						$payment_id = $this->payments_model->save($userDetailsz);

						$users = array('amount'=>$final_amount,
										//'user_id'=>$response,
										'payment_id'=>$payment_id
											);
						$response = $this->payments_invoice_model->save(array($users));
							
            		}

            			/*$this->email->subject("Account confirmation mail");
	                    $this->email->from('info@kaushikdhwanee.com', 'Kaushik dhwanee');
	                    $this->email->set_newline("\r\n");
	                    $this->email->to($email);
	                    $data = array(
	                             'username'=>$name,
	                             'message'=>"Your account created successfully"
	                            );
	            		$message1 = $this->load->view('emails/success_message',$data,true);
	                    $this->email->message($message1);
						$this->email->send();*/

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

						/*$userDetails = array('branch_id'=> $branch_id,
									 'message'=> "Welcome to KaushikDhwanee! Payment of Rs $final_amount has been made successfully on date('d-m-Y',strtotime($date))                                        at date('h:i A',strtotime($date))",
									 'user_id'=>$user_id,
									 'created_on'=>date("Y-m-d H:i:s")
									);

						$responsex = $this->notifications_model->save($userDetails);


						$message = "Welcome $name to KaushikDhwanee. You have been successfully registered. Team KAUSHIKDHWANEE";
 						$response = $this->sms->sendsms($mobile,$message);*/
$this->email->subject("Account confirmation mail");
	                    $this->email->from('kaushikdhwanee@gmail.com', 'Kaushik dhwanee');
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
						$this->email->send();

						$userDetails = array('branch_id'=> $branch_id,
									 'message'=> "Welcome to KaushikDhwanee! Payment of Rs $final_amount has been made successfully on date('d-m-Y',strtotime($date)) at date('h:i A',strtotime($date))",
									 'user_id'=>$user_id,
									 'created_on'=>date("Y-m-d H:i:s")
									);

						$responsex = $this->notifications_model->save($userDetails);


						$message = "Welcome $name to KaushikDhwanee. You have been successfully registered. Team KAUSHIKDHWANEE";
						 $response = $this->sms->sendsms($mobile,$message);
						
						$result['success']=1;
						$result['user_id']=$response1;
						$result['payment_id']=$payment_id;


						echo json_encode($result);
						
					}else
					{
						
						$result['success']=2;
						echo json_encode($result);
					}
					
				}else
				{
					$result['success']=2;
						

						echo json_encode($result);
				}
		}   

		public function insertfamilymember()
        {
        	
        	$this->form_validation->set_rules('name','name','trim|required');
        	if($this->form_validation->run())
			{
				$payment_id= null;
				$name = $this->input->post('name');
				$user_id = $this->input->post('user_id');
				$branch_id = $this->input->post('branch_id');
				$class_name = $this->input->post('class_id');
				$registration_amount = $this->input->post('registration_amount');
				$registration_date = date("Y-m-d",strtotime($this->input->post('registration_date')));
				$reg_type = $this->input->post("reg_type");
				echo $registration_date;
				$userDetails1 = array(
								'name' => $name,
								'user_id'=>$user_id,
								'branch_id'=>$branch_id,
					            'class_name'=>$class_name,
								'registration_amount'=>$registration_amount,
					             'registration_date'=>$registration_date,
								);
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/user_images/';
	                $config['allowed_types']        = 'gif|jpg|png';
	               /* $config['max_width']            = 1024;
	                $config['max_height']           = 768;*/
	                $config['file_name'] = strtotime('now').str_replace(" ", "_", $_FILES['image']['name']);
	                //print_r($_FILES);
	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('image'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        //print_r($error);exit;
	                        $this->session->set_flashdata('message','Image upload error');
	                       // redirect("admin/addmaincategory");	
	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());

	                }
	                $userDetails1['profile_pic'] = $config['file_name'];
            	}
				$response = $this->user_family_members_model->save($userDetails1);
				
				
        			$userDetails = array(
									'member_id'=>$response,
									'user_id'=>$user_id,
									'total_amount'=>$registration_amount,
									'final_amount'=>$registration_amount,
									
									'payment_type'=>1,
									
									'created_date'=>date("Y-m-d")
									);
			
					$payment_id = $this->payments_model->save($userDetails);

					$users = array('amount'=>$registration_amount,
									//'user_id'=>$response,
									'payment_id'=>$payment_id
								);
					$response1 = $this->payments_invoice_model->save(array($users));
						
        			
                 if($response)
				{
				
					$result['success']=1;
					$result['user_id']=$response;
					$result['payment_id']=$payment_id;
                    
					echo json_encode($result);

				}else
				{
					$result['success']=2;
					echo json_encode($result);
				}
					
				}else
				{
					$result['success']=2;
					echo json_encode($result);
				}
		} 
        

        public function addenrollstudent()
        {
        	$id= $this->uri->segment(3);
        	$user_info=array();
        	$active_classes = array();
        	if(!empty($id))
        	{
        		//$user_info = $this->users_model->getuser(array('id'=>$id));
        		$user_info = $this->user_family_members_model->getuser($id);
        	}
        	$views = array('addenrollstudent');
        	$classes = $this->classes_model->getclasses(1);
        	$plans = $this->plans_model->getplans(1);
        	$discount_info =$this->discounts_model->getdiscount();
        	$classes_list = $this->enroll_students_model->getuserenrolls($id);

        	if(!empty($classes_list))
        	{
        		$active_classes = array_column($classes_list, "class_id");
        	}
        	//print_r($classes);exit();
            $data = array('views'=>$views,'classes'=>$classes,'plans'=>$plans,"user_info"=>$user_info,'discount_info'=>$discount_info,'user_id'=>$id,'registration_amount'=>$user_info['registration_amount'],'active_classes'=>$active_classes,'registration_date'=>$user_info['registration_date']);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        } 

        public function addenroll()
        {
        	$id= $this->uri->segment(3);
        	$user_info=array();
        	//$user_id="";
        	$enroll=array();
        	$active_classes = array();
        	if(!empty($id))
        	{
        		$user_info = $this->user_family_members_model->getuser($id);
        		//$user_id = $user_info['user_id'];
        	}
        	$views = array('addenrollstudent');
        	  //$enroll = $this->enroll_students_model->getuserbyuseridandclass($user_id);
        	
        	$classes = $this->classes_model->getclasses(1);

        	$classes_list = $this->enroll_students_model->getuserenrolls($id);


        	if(!empty($classes_list))
        	{
        		$active_classes = array_column($classes_list, "class_id");
        	}

        	$plans = $this->plans_model->getplans(1);
        	$discount_info =$this->discounts_model->getdiscount();
        	//print_r($classes);exit();
            $data = array('views'=>$views,'classes'=>$classes,'plans'=>$plans,'user_info'=>$user_info,'discount_info'=>$discount_info,'user_id'=>$id,'registration_amount'=>null, 'active_classes'=>$active_classes);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        } 

        public function editenroll()
        {
        	$id= $this->uri->segment(3);
        	$invoice_id=$this->uri->segment(4);
        	$enroll_info=array();
        	$batchinfo = array();
        	//$start_date = $this->uri->segment(4);
        	//$end_date= $this->uri->segment(5);
        	
        	if(!empty($id))
        	{
        		$enroll_info = $this->enroll_students_model->getusersbyenroll($id);
        		
			
				$batchinfo = $this->enroll_students_batches_model->getbatchclasses($id);
				
                

			
        	}
        	$views = array('editenrollstudent');
        	  

        	$plans = $this->plans_model->getplans(1);
        	$discount_info =$this->discounts_model->getdiscount();
        	
            $data = array('views'=>$views,'enroll_info'=>$enroll_info,'discount_info'=>$discount_info,'registration_amount'=>null,'batchinfo'=>$batchinfo,'invoice_id'=>$invoice_id);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        }

        public function addadditionalfee()
        {
        	$id= $this->uri->segment(3);
        	
        	$views = array('addadditionalfee');
        	
        	
            $data = array('views'=>$views, 'id'=>$id);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        } 

        public function insertadditionalfee()
        {
        	$this->form_validation->set_rules('enroll_student_id','enroll_student_id','trim|required');
        	$this->form_validation->set_rules('comments','comments','trim|required');
        	$this->form_validation->set_rules('amount','amount','trim|required');
			//print_r($_POST);exit();
        	
        	if($this->form_validation->run())
			{
				$enroll_student_id = $this->input->post('enroll_student_id');
				$comments = $this->input->post('comments');
				$amount = $this->input->post('amount');
				$payment_type = $this->input->post('payment_type');
				$user_info=$this->enroll_students_model->getenrollbyid($enroll_student_id);
				$user_id= $user_info['user_id'];
				$member_id= $user_info['member_id'];

				$userdtails1 = array(
										'enroll_student_id' => $enroll_student_id,
										'amount' => $amount,
										//'sibling_discount' => null,
										'final_amount' => $amount,
										'invoice_month' => date("m"),
										'invoice_year' => date("Y"),
										//'total_sessions'=>$total_sessions,
										//'price_per_month' => null,
										'created_date' => date('Y-m-d H:i:s'),
										'paid_status' => 1,
										'comments'=>$comments
										);

							

							$invoice_id =$this->invoice_model->save($userdtails1);
				
				
				               $userDetails = array(
								'user_id'=>$user_id,
								'member_id'=>$member_id,
								 'total_amount'=>$amount,
								 'final_amount'=>$amount,
								   'payment_type'=>$payment_type,
								  
								    'comments'=>$comments,
								    
								     'created_date'=>date("Y-m-d"), 
								);
				
				$payment_id = $this->payments_model->save($userDetails);

$users = array("enroll_student_id"=>$enroll_student_id,
										'amount'=>$amount,
										'invoice_id'=>$invoice_id,
										'payment_id'=>$payment_id
									);
						

					
					$response = $this->payments_invoice_model->save(array($users));
					

				$user_info = $this->users_model->getuserinfo($user_id);
				$email = $user_info['email'];

                $this->email->subject("Payment Information");
                $this->email->from('kaushikdhwanee@kaushikdhwanee.in', 'Kaushik dhwanee');
                $buffer = $this->save_download($payment_id);
                $this->email->attach($buffer, 'attachment', 'print_receipt.pdf', 'application/pdf');
                
                $this->email->set_newline("\r\n");
                $this->email->to($email);
                $data = array(
                         'username'=>$user_info['name'],
                         'message'=>"Received fees Rs $final_amount."
                          
                        );
        		$message1 = $this->load->view('emails/success_message',$data,true);
                $this->email->message($message1);
				$this->email->send();

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
            	
				if($responsex)
					
				{
					
					$this->session->set_flashdata('message', 'Addtional Fee added successfully.');
					redirect('admin/printreceipt/'.$payment_id);
				}
					
					
				else
				{
					$this->session->set_flashdata('message', 'Addtional Fee not added');
					redirect("admin/viewstudents");
				}
			
			}
			else
			{
				echo validation_errors();exit;
			}
			redirect("admin/viewstudents");        
      

        }

    

	 
        public function insertenrollstudent()
        {

        	$this->form_validation->set_rules('class_id','class_id','trim|required');
        	
        	
				$aname=$this->input->post('name');
				
				
				$amobile = $this->input->post('mobile');				
				
				$aemail = $this->input->post('email');
				
				
				$aaddress = $this->input->post('address');
				
				
				$aage = $this->input->post('age');
				 
				
				$awhatsapp_number = $this->input->post('whatsapp_number');
				
				
				$aorganization_name = $this->input->post('organization_name');
				
				
				//$aknown_from = $this->input->post('known_from');
				//$this->session->set_flashdata('known', $aknown_from);
				
				$aregistration_date= date('Y-m-d');
				
				$aregistration_amount = $this->input->post('registration_amount');
				
				
                $aplan_id = $this->input->post('plan_id');
				
				$aresp = @explode("|", $aplan_id);
				$aknown_from =  (!empty($known_from)?implode(",", $known_from):"");
							
				$aother_info = $this->input->post('other_info');
								
				$aplan = 5;
				$aclass_id = $this->input->post('class_id');
								
				$anumber_of_class = $this->input->post('number_of_class');
				$asession_id=$this->input->post('session_id');
				
				
				//$this->aresp = @explode("|", $number_of_class);
				$asessions_per_week = $this->input->post('number_of_class');
				
				
				$atotal_sessions=$this->input->post('total_sessions');
				
				
				//$this->aprice_per_month = @$resp[1];
                $abranch_id = $this->input->post('branch_id');
				
				
                $this->acategory = $this->input->post('category');
                //$admin_discount=$this->input->post('discount');
                $this->acountry = $this->input->post('country');
				$this->asibling_discount = $this->input->post('sibling_discount');

               
				$astart_date = date("Y-m-d",strtotime($this->input->post('start_date')));
				
				
				$aend_date = date("Y-m-d",strtotime($this->input->post('end_date')));
				
				
				$acourse_fee = $this->input->post('course_fee');
								
				//$this->aregistration_amount = $this->input->post('registration_amount');
				
				

                $this->apayment_type = $this->input->post('payment_type');
				
                $atotal_amount = $this->input->post('total_amount');
				
				
				$afinal_amount = $this->input->post('final_amount');
				
				
				$aadmin_discount = $this->input->post('discount');
				
				//$this->anext_fee_due = date("Y-m-d",strtotime($aend_date. '+1 days'));

				$aselected_days = $this->input->post('selected_days');
				
				
				//$days  = implode(", ", $selected_days);
				$aselected_batches = $this->input->post('selected_batches');
				
				
				//$discount_type = $this->input->post('discount_type');
				$acomments = $this->input->post('comments');
			$data=array(
					
								'name' => $aname,
					'age'=>$aage,
					             'mobile'=>$amobile,
					'email'=>$aemail,
					'organization'=>$aorganization_name,
					'address'=>$aaddress,
				'branch_id'=>$abranch_id,
								'class_id' => $aclass_id,
								'registration_date' => $aregistration_date,
					             'registration_amount' => $aregistration_amount,
								'start_date' => $astart_date,
								'original_start_date'=>$astart_date,
								'end_date' => $aend_date,
					             'plan_id'=>$aplan_id,
					             'known_from'=>$aknown_from,
					             'other_info'=>$aother_info,
				                  'whatsapp'=>$awhatsapp_number,
								//'discount' => $discount,
								'course_fee' => $acourse_fee,
								//'next_month_amount' => $next_month_amount,
								'total_amount' => $atotal_amount,
								//'next_month_duration' => $next_month_duration,
								//'price_per_month' => $price_per_month,
								'sessions_per_week' => $asessions_per_week,
								'total_sessions' =>$atotal_sessions,
								'admin_discount' => $aadmin_discount,
								'final_amount' => $afinal_amount,
								//'sibling_discount'=> $sibling_discount,
								'created_date' => date('Y-m-d'),
								//'discount_type'=> $adiscount_type,
								'plan'=>$aplan,
								'comments'=>$acomments,
								'next_fees_due_date'=>$aend_date,
								'selected_days'=>$aselected_days,
					              'selected_batches'=>$aselected_batches

				);
				
				
if($this->form_validation->run())
			{
				date_default_timezone_set('Asia/Calcutta');
                $datenow = date("d/m/Y h:m:s");
$transactionDate = str_replace(" ", "%20", $datenow);

$transactionId = rand(1,1000000);


//Setting all values here
	
	/*$this->transactionrequest->setMode("test");
$this->transactionrequest->setLogin(197);
$this->transactionrequest->setPassword("Test@123");
$this->transactionrequest->setProductId("NSE");
$this->transactionrequest->setAmount($afinal_amount);
$this->transactionrequest->setTransactionCurrency("INR");
$this->transactionrequest->setTransactionAmount(50);
$this->transactionrequest->setReturnUrl("http://beta.kaushikdhwanee.in/app/register/success");
$this->transactionrequest->setClientCode(123);
$this->transactionrequest->setTransactionId($transactionId);
$this->transactionrequest->setTransactionDate($transactionDate);
$this->transactionrequest->setCustomerName($aname);
$this->transactionrequest->setCustomerEmailId($aemail);
$this->transactionrequest->setCustomerMobile($amobile);
$this->transactionrequest->setCustomerBillingAddress("Mumbai");
$this->transactionrequest->setCustomerAccount("639827");
$this->transactionrequest->setReqHashKey("KEY123657234");*/
	
$this->transactionrequest->setMode("live");
$this->transactionrequest->setLogin(41735);
$this->transactionrequest->setPassword("Kaushik$2510");
$this->transactionrequest->setProductId("KAUSHIK");
$this->transactionrequest->setAmount($afinal_amount);
$this->transactionrequest->setTransactionCurrency("INR");
$this->transactionrequest->setTransactionAmount(50);
				
$this->transactionrequest->setReturnUrl("http://beta.kaushikdhwanee.in/app/register/success");
$this->transactionrequest->setClientCode(007);
$this->transactionrequest->setTransactionId($transactionId);
$this->transactionrequest->setTransactionDate($transactionDate);
$this->transactionrequest->setCustomerName($aname);
$this->transactionrequest->setCustomerEmailId($aemail);
$this->transactionrequest->setCustomerMobile($amobile);
$this->transactionrequest->setCustomerBillingAddress("Hyderabad");
$this->transactionrequest->setCustomerAccount("32200984908");
$this->transactionrequest->setReqHashKey("30b9415cb7ee313262");
//$this->transactionresponse->setRespHashKey("00e7291c96efb88dc1");	

$url = $this->transactionrequest->getPGUrl();
//echo $url;
header("Location: $url");

				
				
		}else
			{
				echo validation_errors();exit;
			}
			//redirect("register/index");
        	
        
       $this->session->set_userdata('data',$data);
        }
	
	public function insert(){
		
		$data_value= $this->session->userdata('data');
		
		 $name = $data_value['name'];
		
		$mobile = $data_value['mobile'];
		
        $age = $data_value['age'];
		$name = $data_value['name'];
		$mobile = $data_value['mobile'];
		$email = $data_value['email'];
		$branch_id = $data_value['branch_id'];
		$class_id = $data_value['class_id'];
		$address = $data_value['address'];
		$whatsapp = $data_value['whatsapp'];
		$organization_name=$data_value['organization'];
		$registration_amount=$data_value['registration_amount'];
		$registration_date=$data_value['registration_date'];
		$start_date=$data_value['start_date'];
		$end_date=$data_value['end_date'];
		$course_fee=$data_value['course_fee'];
		$total_amount=$data_value['total_amount'];
		$final_amount=$data_value['final_amount'];
		$sessions_per_week = $data_value['sessions_per_week'];
		$total_sessions = $data_value['total_sessions'];
		$admin_discount = $data_value['admin_discount'];
		$plan = $data_value['plan'];
		$comments = $data_value['comments'];
		$other_info= $data_value['other_info'];
		$selected_days= $data_value['selected_days'];
		$selected_batches= $data_value['selected_batches'];

	$users = array(
					'age' => $age,
					'branch_id'=>$branch_id,
					'mobile' => $mobile,
					'address' => $address,
					'email' =>$email,
					'organization_name'=>$organization_name,
					'registration_date'=>$registration_date,
					'registration_amount'=>$registration_amount,
					'whatsapp_number'=>$whatsapp,
					'other_info'=>$other_info,
					'final_amount'=>$registration_amount,
					 
					//'country'=>$country,
					'created_date'=> date("Y-m-d")
					);


					$response = $this->users_model->save($users);
		
					$user_id = $response;
					
						$userDetails1 = array(
								'name' => $name,
								'branch_id'=>$branch_id,
								'class_id'=>$class_id,
								//'country'=>$acountry,
								'registration_date'=>date('Y-m-d'),
								'user_id'=>$response,
								'type'=>1,
							'enroll_status'=> 2,
								'registration_amount'=>$registration_amount,
								);
	
								$member_id = $this->user_family_members_model->save($userDetails1);
		
							

							

				$userDetails = array(
								'member_id' => $member_id,
								'user_id' => $user_id,
								'class_id' => $class_id,
								'registration_date' => date('Y-m-d'),
								'start_date' => $start_date,
								'original_start_date'=>$start_date,
								'end_date' =>$end_date,
								//'discount' => $discount,
								'course_fee' => $course_fee,
								
								'total_amount' => $total_amount,
								
								'sessions_per_week' => $sessions_per_week,
								'total_sessions' =>$total_sessions,
								'admin_discount' => $admin_discount,
								'final_amount' => $final_amount,
								
								'created_date' => date('Y-m-d'),
								'discount_type'=> 2,
								'plan'=>$plan,
								'comments'=>$comments,
								'next_fees_due_date'=>$end_date,
								//'selected_days'=>$days

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
				}

						/*saving in payments table start*/
						$userDetailsz = array(
									'user_id'=>$user_id,
									'member_id'=>$member_id,
									 'total_amount'=>$total_amount,
									 'final_amount'=>$final_amount,
									  'admin_discount'=>$admin_discount,
									  //'total_sessions'=>$this->$total_sessions,
									   'payment_type'=>9,
									   //'discount_type'=> $discount_type,
									    'created_date'=>date("Y-m-d"), 
									    'comments'=>$comments,
							           'payment_through'=>4
									);
				
						$payment_id = $this->payments_model->save($userDetailsz);
	
	

				

						if(!empty($registration_amount)){
								$usersz = array("enroll_student_id"=>$enroll_student_id,
												'amount'=>$registration_amount,
												//'user_id'=>$auser_id,
												'payment_id'=>$payment_id
											);

								$response = $this->payments_invoice_model->save(array($usersz));
							}

						/*saving in payments table end*/

						$invoices = array();
						$payment_invoice = array();
						$userdtails = array(
										'enroll_student_id' => $enroll_student_id,
										'amount' => $course_fee,
										//'sibling_discount' => $sibling_discount,
										'final_amount' => $final_amount,
										'invoice_month' => date("m",strtotime($start_date)),
										'invoice_year' => date("Y",strtotime($start_date)),
										//'price_per_month' => $price_per_month,
										'created_date' => date('Y-m-d H:i:s'),
										'total_sessions'=>$total_sessions,
										'invoice_date' =>date('Y-m-d',strtotime($start_date)),
										'paid_status' => 2
										);
						//array_push($invoices, $userdtails);
						$invoice_id = $this->invoice_model->save($userdtails);
						/*
						$invoice_id = $this->invoice_model->save($invoices);*/
						$usersx = array("enroll_student_id"=>$enroll_student_id,
												'amount'=>$course_fee,
												'invoice_id'=>$invoice_id,
												'payment_id'=>$payment_id
											);
						//array_push($payment_invoice, $usersx);
						$response = $this->payments_invoice_model->save(array($usersx));

						
					$user_info = $this->users_model->getuserinfo($user_id);
					//$member_id= $user_info['member_id'];
					$user_enroll = $this->user_family_members_model->getusersbyuserclass($member_id,$class_id);
					//$branch_id= $user_info['branch_id'];
					
                    $class_info = $this->classes_model->getclass($class_id);
		
                   $class_name=$class_info['class_name'];
					$teacher_info = $this->enroll_students_batches_model->getbatchteacher($enroll_student_id);
                    $teacher_id = $teacher_info['teacher_id'];
					
					$message2["message"]= "Dear ".$name." You have been enrolled into ".$class_info['class_name']." starting from $start_date. Happy                                               learning! Team KAUSHIKDHWANEE";
		        	$message2["target"]	= 2;
					$message2["success"]	= 1;
					$message1 = json_encode($message2);
					$message9 = "Dear ".$name." You have been enrolled into ".$class_info['class_name']." starting from $start_date. Happy learning! Team  KAUSHIKDHWANEE";
					
					
					
                    $whatsapp = $this->whatsapp_model->getlink($branch_id,$class_id,$teacher_id);
					//echo $whatsapp['whatsapp_link'];
					
					if(!empty($whatsapp)){
						
					$message9 = "Dear ".$name." You have been enrolled into ".$class_info['class_name']." starting from $start_date.Please click the given link to join our whatsapp group. ".$whatsapp['whatsapp_link']." Happy learning! Team KAUSHIKDHWANEE";
					}  
		
					
					$message5 = " You have been enrolled into ".$class_info['class_name']." starting from $start_date. Happy learning! Team KAUSHIKDHWANEE";
                    
					if(!empty($user_info['mobile']))
					{
						$this->sms->sendsms($mobile,$message9);
					}
					
					if(!empty($user_info['device_id']))
		        	{
		        		$responsez1 =  $this->notifications->send_ios_notification(array($user_info['device_id']),$message9);
		       		}
		       		if(!empty($user_info['gcm_id']))
		       		{
		        		$responsez = $this->notifications->send_notification(array($user_info['gcm_id']),$message9);
		        	}

		        	$userDetails = array('branch_id'=>$branch_id,
									 'message'=>$message9,
									 'user_id'=>$user_id,
									 'created_on'=>date("Y-m-d H:i:s")
									);

					$responsex = $this->notifications_model->save($userDetails);
                 
					

                        $enroll_id=$user_enroll['enroll_id'];
                       // $country_id=$user_enroll['country'];
                        //$branch_id= $user_info['branch_id'];
                        $cat_id=$class_info['cat_id'];
                        //$class_id = $class_info['class_id'];
                        $student_unique_id = "".$branch_id."-".$enroll_id."";
                         // $this->session->set_flashdata('message5', $student_unique_id);
                        // echo "<script>console.log(".json_encode($student_unique_id).");</script>";
                         $userdetail = array('attendence_id'=> $student_unique_id,
                                               'enroll_student_id'=>$enroll_id,
                                               'created_on' =>date("Y-m-d H:i:s")
                                                 );

                         $resp = $this->attendence_list_model->savedata($userdetail);
					    
                         
                         	$paytimeusers= array('EmpID'=>$enroll_id,
												 'EmpJoinDate'=>$start_date,
												 'EmpName'=>$name,
												 'EmpPunchID'=>$enroll_id);
												 
								$this->paytime_enroll_model->save($paytimeusers);
					
					    
                         
						 $message6 ="You have been successfully enrolled into ".$class_info['class_name'].".<br><br> Your unique student enroll id is:                                         <br>".$student_unique_id."";
						$this->email->subject("Enrollment of New class");
	                    $this->email->from('kaushikdhwanee@gmail.com', 'Kaushik dhwanee');
	                    $buffer = $this->save_download($payment_id);
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
		
		//$user = $this->users_model->getdata($mobile);
				//echo $user;
			//$branch=$user['branch_id'];
			 $branches =$this->branches_model->getbranch($branch_id);
		     $startdate= date('d-m-Y',strtotime($start_date));
			 $views = array('confirmreg');
			 $data = array('views'=>$views,'branches'=>$branches,'class_name'=>$class_name,'start_date'=>$startdate,'name'=>$name,'whatsapp'=>$whatsapp);
			 $this->load->view('admin/template/templateweb',$data);
		    $this->session->unset_userdata('data');

		
		
	}
	
    
	
        public function payfeeadvance()
        {
        	$id= $this->uri->segment(3);
        	$user_info=array();
			$active_classes = array();
			$date =  date('Y-m-d');
			$all_users="";
			$user_type = $this->session->userdata('user_type');
        	$users = "";
			$user_id = $this->session->userdata('id');
			$admin_info =$this->admin_roles_model->getrole($user_id);
			/*if($user_type==1){
			$branch_id = $this->input->get('branch_id');
		}*/
		if($user_type==4){
		   $branch_id = $admin_info['branch_id'];
		   $all_users = $this->users_model->getuserbeforeenddatebybrnch($date,$branch_id);
		   }
		   else{	
        	$all_users = $this->users_model->getuserbeforeenddate($date,1);
		   }
        	$views = array('payfeeadvance');
        	//$classes = $this->classes_model->getclasses(1);
        	$plans = $this->plans_model->getplans(1);
        	$discount_info =$this->discounts_model->getdiscount();
        	//$classes_list = $this->enroll_students_model->getuserenrolls($id);

        	/*if(!empty($classes_list))
        	{
        		$active_classes = array_column($classes_list, "class_id");
        	}
        	*///print_r($classes);exit();
            $data = array('views'=>$views,'plans'=>$plans,"all_users"=>$all_users,"discount_info"=>$discount_info);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        }

public function verify_code(){

	$this->form_validation->set_rules('promocode','promocode','trim|required');

	if($this->form_validation->run()) 			
			{
				$promocode = $this->input->post('promocode');
				
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
        public function insertpaymentsadvance()
        {

        	$this->form_validation->set_rules('user_id','user_id','trim|required');
        	$this->form_validation->set_rules('member_id','member_id','trim|required');
        	$this->form_validation->set_rules('enroll_student_id','enroll_student_id','trim|required');


        	
        	if($this->form_validation->run())
			{
				$payable_amount = $this->input->post('final_amount');
				//$invoice = $this->input->post('invoice_id');
				$admin_discount = $this->input->post('admin_discount');
                $balance_amount =$this->input->post('balance_amount');
				$comments = $this->input->post('comments');
				$user_id = $this->input->post('user_id');
				$member_id = $this->input->post('mem_id');
				$email = $this->input->post('email');
				$final_amount = $this->input->post('final_amount');
				$end_date = date("Y-m-d",strtotime($this->input->post('end_date')));
                 $enroll_student_id = $this->input->post('enroll_student_id');
                 $session_week=$this->input->post('number_of_class');
                 $start_date =date("Y-m-d",strtotime($this->input->post('start_date')));
				$total_amount = $this->input->post('total_amount');
				$payment_type = $this->input->post('payment_type');
				$total_sessions =$this->input->post('total_sessions');
				$course_fee=$this->input->post('total_amount');
				//$enroll_student_id = $this->input->post('enroll_id');
				$selected_days = $this->input->post('selected_days');
				//$days  = implode(", ", $selected_days);
				$selected_batches = $this->input->post('selected_batches');
				$next_fee_due = date("Y-m-d",strtotime($end_date. '+1 days'));
				$start = date("Y-m-d",strtotime($start_date. '+1 days'));
			


			
				
				$userDetails = array(
								'user_id'=>$user_id,
								'member_id'=>$member_id,
								 'total_amount'=>$total_amount,
								 'final_amount'=>$final_amount,
								  'admin_discount'=>$admin_discount,
								   'payment_type'=>$payment_type,
								   //'total_sessions'=>$total_sessions,
								    'comments'=>$comments,
								    'discount_type'=> (!empty($admin_discount)?"1":null),
								     'created_date'=>date("Y-m-d"), 
								);
				
				$payment_id = $this->payments_model->save($userDetails);

				$userDetails1 = array(
					'total_sessions'=>$total_sessions,
					'end_date' =>$end_date,
					'start_date'=>$start,
					//'current_start_date'=> $start_date,
					'course_fee'=>$course_fee,
					'sessions_per_week' =>$session_week,
					//'selected_days'=>$days,
				    'final_amount'=>$final_amount,
				    'next_fees_due_date'=>$end_date
);
               $response = $this->enroll_students_model->update($userDetails1,$enroll_student_id);
               if(!empty($selected_days))
				{
						$total_batches =array();
						foreach ($selected_days as $key => $value) {
							$userdata = array(
											'enroll_student_id'=>$enroll_student_id,
											'batch_class_id'=>$selected_batches[$key]
								);

							array_push($total_batches, $userdata);
						}

						$resss = $this->enroll_students_batches_model->update($total_batches,$enroll_student_id);
				}

				$invoices = array();
						$payment_invoice = array();
						$userdtails = array(
										'enroll_student_id' => $enroll_student_id,
										'amount' => $course_fee,
										//'sibling_discount' => $sibling_discount,
										'final_amount' => $final_amount,
										'invoice_month' => date("m",strtotime($start_date)),
										'invoice_year' => date("Y",strtotime($start_date)),
										//'price_per_month' => $price_per_month,
										'created_date' => date('Y-m-d H:i:s'),
										'total_sessions'=>$total_sessions,
										'invoice_date' =>date('Y-m-d',strtotime($start_date)),
										'paid_status' => 2
										);
						//array_push($invoices, $userdtails);
						$invoice_id = $this->invoice_model->save($userdtails);
				
					
					
						
						$users = array("enroll_student_id"=>$enroll_student_id,
										'amount'=>$final_amount,
										'invoice_id'=>$invoice_id,
										'payment_id'=>$payment_id
									);
						

					
					$response = $this->payments_invoice_model->save(array($users));
				

					
					
				

				$user_info = $this->users_model->getuserinfo($user_id);
				$email = $user_info['email'];

                $this->email->subject("Payment Information");
                $this->email->from('kaushikdhwanee@kaushikdhwanee.in', 'Kaushik dhwanee');
                $buffer = $this->save_download($payment_id);
                $this->email->attach($buffer, 'attachment', 'print_receipt.pdf', 'application/pdf');
                
                $this->email->set_newline("\r\n");
                $this->email->to($email);
                $data = array(
                         'username'=>$user_info['name'],
                         'message'=>"Received fees Rs $final_amount."
                        
                        );
        		$message1 = $this->load->view('emails/success_message',$data,true);
                $this->email->message($message1);
				$this->email->send();

				$username = $user_info['name'];
				$message = "Dear $username, Received fees Rs $final_amount. Thank you, Team KAUSHIKDHWANEE";
 				$response = $this->sms->sendsms($user_info['mobile'],$message);
				//echo "1";
				$result=$this->users_model->getuserinfo($user_id);
				$userDetails = array('branch_id'=>$result['branch_id'],
									 'message'=>$message,
									 'user_id'=>$user_id,
									 'created_on'=>date("Y-m-d H:i:s")
									);

				$responsex = $this->notifications_model->save($userDetails);
            	
				if($responsex)
				{
					redirect('admin/printreceipt/'.$payment_id);
					
				}else
				{
					redirect("admin/getstudentbatches");
				}
			
			}
			else
			{
				echo validation_errors();exit;
			}
			redirect("admin/getstudentbatches");        
        }

        public function generateinvoice_cron()
        {
        	
        	/*function getculumnname($name)
        	{
        		switch ($name) {
        					case '1':
        						return "two_session_three_months";
        						break;

        					case '2':
        						return "three_session_three_months";
        						break;

        					case '3':
        						return "two_session_six_months";
        						break;	
        					
        					case '4':
        						return "three_session_six_months";
        						break;

        					
        					
        				}		
        	}*/

			$current_month = date("m");
			
			$current_year = date("Y");
			$current_date = date('Y-m-d');
			
			$students=$this->enroll_students_model->getusersenrollactive($current_date);
			foreach ($students as $info){
				$id=$info['id'];
				$tot_sess=$info['total_sessions'];
				$date =array();
					$attendence_date = $this->enroll_students_model->sessionenddate($id);
					$counts=0;   
                    $enddate="";
					if(!empty($attendence_date)){
						$counts	= count($attendence_date);
						$i=0;
						foreach($attendence_date as $value){
							$i++;
		
						  $date[$i] = $value['date'];
							
							
							if($i==$value['total_sessions']){
							break;
						    }
							
			            }
			
						$enddate = $date[$i];
						if($counts >= $tot_sess){
							$userupdate = array(
								'next_fees_due_date'=> date("Y-m-d",strtotime($enddate)),
								//'total_sessions'=> $total_sessions,
								//'sessions_per_week'=> $course_fee
							);
							$this->enroll_students_model->update($userupdate, $id);
							}
					}
			}
        	$invoice_end_date="";
        	$enroll_students = $this->enroll_students_model->getenrollsbyactiveusers($current_date,$invoice_end_date);
        	
			
			$invoices = array();
			foreach ($enroll_students as $key => $student_info) {
			$sibling_discount = 0;
				//$active_user = $this->enroll_students_model->getenrolls($student_info['user_id'],1);

				$discount_info =$this->discounts_model->getdiscount($student_info['branch_id']);
				$sessions_per_week = $student_info['sessions_per_week'];
				//$due_date =  ($student_info['next_fees_due_date']);
				$course_fee = $student_info['course_fee'];
				$total_sessions=$student_info['total_sessions'];
				$enroll_id = $student_info['id'];
				//$enddate ="";
					
					
					//echo $enddate;
				
				$plan = $student_info['plan'];
				if($plan==1||$plan==2){
				$invoice_end_date =date ("Y-m-d", strtotime($current_date." +3 month"));	
				}
                else{
                	$invoice_end_date = date("Y-m-d", strtotime($current_date." +6 month"));
                }
	        	if($sessions_per_week==2 || $sessions_per_week==3)
	        	{
	        		$enrolls = $this->enroll_students_model->getenrolls($student_info['user_id'], 1);
	        		
	        		if(count($enrolls)>1)
	        		{
	        			$sibling_discount = $discount_info['sibling_discount'];
	        		}
				}
				
				
	        	/*else if($sessions_per_week==4 || $sessions_per_week==5 || $sessions_per_week==6)
	        	{
	        		$sibling_discount = $discount_info['sibling_discount'];
	        	}*/
	        	//getculumnname($sessions_per_week);

	        	$plan_info = $this->plans_model->getplan($student_info['branch_id'],$student_info['class_id']);

	        	//$course_fee = $plan_info[$plan_name];

	        	$discount = $course_fee*$sibling_discount/100;

	        	$amount = $course_fee-$discount;

	        	//if(strotime($current_date) >= strotime($due_date){
                  
	        	$userdtails1 = array(
										'enroll_student_id' => $student_info['id'],
										'amount' => $course_fee,
										//'sibling_discount' => $sibling_discount,
										'final_amount' => $course_fee,
										'invoice_month'=>$current_month,
										'invoice_date' => date('Y-m-d',strtotime($current_date)),
										'total_sessions'=>$total_sessions,
										'invoice_year' => $current_year,
										//'price_per_month' => $price_per_month,
										//'invoice_end_date'=>$invoice_end_date,
										//'invoice_generated'=>2,
										'created_date' => date('Y-m-d H:i:s'),
										'inserted_through'=>2

									);

							array_push($invoices, $userdtails1);


			}
		//}
			//print_r($invoices);exit;
			if(!empty($invoices))
			{
				$this->invoice_model->save_batch($invoices);
			}
			
        	//exit;/**/
        }

	   public function geusersbymembernclass()
	   {
		$class_id = $this->input->post('class_id');
		$member_id = $this->input->post('member_id');

		$users = $this->enroll_students_model->getusersbymemberandclass($member_id,$class_id);
		$id = $users['id'];
		$user_info=$this->enroll_students_model->getusersbyenroll($id);
		$attendence=$this->enroll_students_model->attendence($id);
		if(!empty($users))
		{
			$result['data'] = $users;
			$result['user'] = $user_info;
			$result['attendence']=$attendence;
			$result['success']=1;
			
		}else
		{
			$result['success']=2;
		}
		echo json_encode($result);
	}

        
        public function checkstudentclass()
		{
			$this->form_validation->set_rules('class_id','class_id','trim|required');
			$this->form_validation->set_rules('member_id','member_id','trim|required');

			if($this->form_validation->run())
			{
				$class_id = $this->input->post('class_id');
				$member_id = $this->input->post('member_id');
				$result = $this->enroll_students_model->checkenrollstudent($mobile,$vendor_id);
				//echo $this->db->last_query();
				if(empty($result))
				{
	 				echo json_encode(true);
				}
				else
				{
					echo json_encode(false);
				}
	 			
	 		

			}
		}

        public function getplans()
        {
        	$class_id = $this->input->post('class_id');
        	$branch_id = $this->input->post('branch_id');

        	$plans = $this->plans_model->getplan($branch_id,$class_id);
        	if(!empty($plans))
        	{
        		$result = $plans;
        		$result['success']=1;
        		
        	}else
        	{
        		$result['success']=2;
        	}
        	echo json_encode($result);
        }

        public function getsessionenddate(){
        	$enroll_id=$this->input->post('enroll_id');
        	$enddate="";
        	$date =array();
        	$attendence_date = $this->enroll_students_model->sessionenddate($enroll_id);
             $count=0;    

        	if(!empty($attendence_date)){
        		$count	= count($attendence_date);
        		$i=0;
        		foreach($attendence_date as $value){
        			$i++;

                  $date[$i] = $value['date'];
        			
        			

        			if($i==$value['total_sessions']){
                    break;

                     
        			}

        			}
        			//$session_date=$date;
        		$enddate = $date[$i];
                   
                
        	

     	        $result['date'] = $enddate;
     	        $result['count']=$count;
        		$result['success']=1;
        		
        	}else
        	{
        		$result['success']=2;
        		
        		
        	}
        	echo json_encode($result);
        }
        

        public function getplan()
        {

        	$result = array();
        	$sibling_discount = 0;
        	$sessions_per_week = $this->input->post('sessions_per_week');
        	$class_id = $this->input->post('class_id');
        	$branch_id = $this->input->post('branch_id');
        	$user_id =$this->input->post('user_id');
        	$enroll_id=$this->input->post('enroll_id');
        	$plan = $this->plans_model->getplan($class_id,$branch_id);
        	$days = $this->batches_model->getweekdays($class_id,$branch_id);
			$discount_info =$this->discounts_model->getdiscount($branch_id);
			$selected_days=$this->input->post('selectdays');
			


        	/*if($sessions_per_week==2 || $sessions_per_week==3)
        	{
        		$enrolls = $this->enroll_students_model->getenrolls($user_id,1);
        		if(!empty($enrolls))
        		{
        			$sibling_discount = $discount_info['sibling_discount'];
        		}
        	}*/
        	/*else if($sessions_per_week==4 || $sessions_per_week==5 || $sessions_per_week==6)
        	{
        		$sibling_discount = $discount_info['sibling_discount'];
        	}*/
        	$week_days = array_unique(array_column($days,"type"));
        	//$selected_days = array_column($batchinfo, "type");

        	if(!empty($week_days))
        	{
        		$result['weekdays'] = $this->load->view("admin/weekdaysweb",array('sessions_per_week'=>$sessions_per_week,'weekdays'=>$week_days),true);
	        	$result['plan'] = $plan;
	        	$result['sibling_discount'] = $sibling_discount;
	        	$result['success']=1;
	        	echo json_encode($result);

        	}else
        	{
        		$result['success']=2;
	        	echo json_encode($result);
        	}
        	//$sessions_per_week = $plan['sessions'];

        }
        public function getreceipts()
        {
        	$id = $this->input->post('id');
        	$results = $this->payments_model->getpayments(array('user_id'=>$id));
        	$data = array('results'=>$results);//,'classes'=>$classes
			$this->load->view('admin/getreceipts',$data);
        }

        public function getplanbybranch()
        {

        	$result = array();

        	$class_id = $this->input->post('class_id');
        	$branch_id = $this->input->post('branch_id');
        	
        	$plan = $this->plans_model->getplan($branch_id,$class_id);
        	
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

        public function getdiscount()
        {

        	$result = array();

        	
        	$branch_id = $this->input->post('branch_id');
        	
        	$discount_info =$this->discounts_model->getdiscount($branch_id);

        	if(!empty($discount_info))
        	{
	        	$result = $discount_info;
	        	$result['success']=1;
	        	echo json_encode($result);

        	}else
        	{
        		$result['success']=2;
	        	echo json_encode($result);
        	}

        }
	

        public function viewstudents()
        {
        	
        	$branch_id =null;
        	$user_id = null;
             $user_type = $this->session->userdata('user_type');
        	
             $user_id = $this->session->userdata('id');
             $admin_info =$this->admin_roles_model->getrole($user_id);
             if($user_type==1){
			 $branch_id = $this->input->get('branch_id');
			 $all_users = $this->user_family_members_model->getusers();
         }
             
			//$branch_id = $admin_info['branch_id'];
			elseif($user_type==4){
				$branch_id = $admin_info['branch_id'];
				$all_users = $this->users_model->getuserbybrnch(1,$branch_id);
				}
        	
        	$userid = $this->input->get('user_id');
        	$status = $this->input->get('status');

        	
        	//$all_users = $this->user_family_members_model->getusers();
        	$member_id=$this->input->get('member_id');
        	
        	//$enroll =$this->enroll_students_model->getuserswithbranch($member_id);
			//$users = $this->users_model->getuserswithbranch($branch_id,$user_id,$status);
			$users = $this->enroll_students_model->getuserswithbranch($branch_id,$userid,$status);
        	$views = array('viewstudents');
        	$branches = $this->branches_model->getbranches(1);
        	$data = array('views'=>$views,'users'=>$users,"all_users"=>$all_users,"branches"=>$branches, 'user_id'=>$userid);
			$this->load->view('admin/template/template',$data);
		} 
		public function viewusers(){
			$branch_id =null;
        	$user_id = null;
			$user_type = $this->session->userdata('user_type');
        	
			$user_id = $this->session->userdata('id');
			$admin_info =$this->admin_roles_model->getrole($user_id);
			if($user_type==1){
			$branch_id = $this->input->get('branch_id');
			$all_users = $this->users_model->getusers();
		}
		elseif($user_type==4){
			$branch_id = $admin_info['branch_id'];
			$all_users = $this->users_model->getuserbybrnch(1,$branch_id);
			}
        	//j$branch_id = $this->input->get('branch_id');
        	$userid = $this->input->get('user_id');
        	$status = $this->input->get('status');

        	
        	//$all_users = $this->users_model->getusers();
        	$users = $this->users_model->getuserswithbranch($branch_id,$userid,$status);
        	//echo $this->db->last_query();exit;
        	$views = array('viewusers');
        	$branches = $this->branches_model->getbranches(1);
        	$data = array('views'=>$views,'users'=>$users,"all_users"=>$all_users,"branches"=>$branches);
			$this->load->view('admin/template/template',$data);
		}

        public function viewstudentsbymember(){
         $member_id=$this->input->post('member_id');
        	
        	$result = array();
        	$enrolls = $this->enroll_students_model->getuserwithbranch($member_id);
                 

        	if(!empty($enrolls)){
        		
        		
        		$result['enrolls'] = $enrolls;
        		$result['success']=1;
        		
        	}else
        	{
        		$result['success']=2;
        	}
        	echo json_encode($result);
        }

        	
        

        public function updatestudentstatus()
        {
				
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);

			if($status==1)
			{
				$status =2;
			}else
			{
				$status=1;
			}

			$userDetails = array(
							'user_status' => $status
							);

			$response = $this->user_family_members_model->update($userDetails,$id);
			$response = $this->enroll_students_model->updatestatusbymember(array('status'=>2),array('member_id'=>$id));


			if($response)
			{
				$this->session->set_flashdata('message', 'Student status updated successfully..');
				redirect('admin/viewstudents');
			}else
			{
				redirect("admin/viewstudents");
			}
			
			redirect("admin/viewstudents");
        	
        
        }


        public function editstudent()
        {
        	$id= $this->uri->segment(3);
        	$views = array('editstudent');
        	$user = $this->user_family_members_model->getuser($id);
        	$data = array('views'=>$views,'user_info'=>$user);
			$this->load->view('admin/template/template',$data);
        } 

        public function updatestudent()
        {
        	$this->form_validation->set_rules('name','name','trim|required');
        	
			if($this->form_validation->run())
			{
				$payment_id= null;
				$name = $this->input->post('name');
				
				$email = $this->input->post('email');
				$address = $this->input->post('address');
				$age = $this->input->post('age');
				$member_id = $this->input->post('member_id');
				$user_info = $this->user_family_members_model->getuser($member_id);
				$mobile = $this->input->post('mobile');
				$whatsapp_number = $this->input->post('whatsapp_number');
				$organization_name = $this->input->post('organization_name');
				
				
				
				$userDetails = array(
								'age' => $age,
								'address' => $address,
								'email' =>$email,
								'organization_name'=>$organization_name,
								 'mobile'=>$mobile,
								'whatsapp_number'=>$whatsapp_number,
								
								'created_date'=> date("Y-m-d H:i:s")
								);
				
				
				$response = $this->users_model->update($userDetails,$user_info['id']);
            	
				if($response)
				{

					$userDetails1 = array(
							'name' => $name,
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
		                        //print_r($error);exit;
		                        $this->session->set_flashdata('message','Image upload error');
		                       // redirect("admin/addmaincategory");	
		                }
		                else
		                {
		                        $data = array('upload_data' => $this->upload->data());

		                }
		                $userDetails1['profile_pic'] = $config['file_name'];
	            	}

            		$response1 = $this->user_family_members_model->update($userDetails1,$member_id);

            		
					$this->session->set_flashdata('message', 'User updated successfully.');
					redirect('admin/viewstudents');
					
				}else
				{
					$this->session->set_flashdata('message', 'User Not updated successfully.');
					redirect('admin/editstudent/'.$member_id);
					
					
				}
					
				}else
				{
					$result['success']=2;
						

						echo json_encode($result);
				}
		}  

        public function editfamilymember()
        {
        	$id= $this->uri->segment(3);
        	$views = array('editfamilymember');
        	$user = $this->user_family_members_model->getuser($id);
        	$data = array('views'=>$views,'user_info'=>$user);
			$this->load->view('admin/template/template',$data);
        } 

        public function updatefamilymember()
        {
        	
        	$this->form_validation->set_rules('name','name','trim|required');
        	if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$member_id = $this->input->post('member_id');

				$userDetails1 = array(
								'name' => $name,
								);
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/user_images/';
	                $config['allowed_types']        = 'gif|jpg|png';
	               /* $config['max_width']            = 1024;
	                $config['max_height']           = 768;*/
	                $config['file_name'] = strtotime('now').str_replace(" ", "_", $_FILES['image']['name']);
	                //print_r($_FILES);
	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('image'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        //print_r($error);exit;
	                        $this->session->set_flashdata('message','Image upload error');
	                       // redirect("admin/addmaincategory");	
	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());

	                }
	                $userDetails1['profile_pic'] = $config['file_name'];
            	}
				$response = $this->user_family_members_model->update($userDetails1,$member_id);
				
				if($response)
				{
					$this->session->set_flashdata('message', 'User updated successfully.');
					redirect('admin/viewstudents');
					
				}else
				{
					$this->session->set_flashdata('message', 'User Not updated successfully.');
					redirect('admin/editfamilymember/'.$member_id);
				}
					
			}else
			{
				$result['success']=2;
				echo json_encode($result);
			}
		} 
        

        public function creatediscounts()
        {
       		$discount_info = array();
        	$views = array('creatediscounts');
        	$branches = $this->branches_model->getbranches(1);
        	$data = array('views'=>$views,'branches'=>$branches,"discount_info"=>$discount_info);
			$this->load->view('admin/template/template',$data);
        } 

        public function insertdiscount()
        {


        	$this->form_validation->set_rules('branch_id','branch_id','trim|required');
        	
        	if($this->form_validation->run())
			{
				$branch_id = $this->input->post('branch_id');
				$sibling_discount = $this->input->post('sibling_discount');
				$three_months_discount = $this->input->post('three_months_discount');
				$six_months_discount = $this->input->post('six_months_discount');
				$one_year_discount = $this->input->post('one_year_discount');
				$referral = $this->input->post('referral');
				$referee = $this->input->post('referee');

				/*$sessions = $this->input->post('sessions');
				$amount = $this->input->post('amount');
				$plan_type = $this->input->post('plan_type');
				$duration = $this->input->post('duration');*/

				$id = $this->input->post('id');
				
				$userDetails = array(
								
								'branch_id' => $branch_id,
								'sibling_discount' => $sibling_discount,
								'three_months_discount' => $three_months_discount,
								'six_months_discount' => $six_months_discount,
								'one_year_discount' => $one_year_discount,
								'referral' => $referral,
								'referee' => $referee
								);
				
				if(!empty($id))
            	{
					$response = $this->discounts_model->update($userDetails,$id);
					if(!empty($response))
					{
						$response= $id;
					}
            	}else
            	{
            		$response = $this->discounts_model->save($userDetails);
            	}
				
				
				if($response)
				{
					if(!empty($id)){
						$this->session->set_flashdata('message', 'Discount updated successfully.');
						redirect('admin/creatediscounts');
					}else{
						$this->session->set_flashdata('message', 'Discount added successfully.');
						redirect('admin/creatediscounts');
					}
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin/addplan");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin/addplan");
        	/*$views = array('addcategory');
            $data = array('views'=>$views);
			$this->load->view('admin/template/template',$data);*/
        
        
        }

        public function viewreceipt()
        {
        	$id= $this->uri->segment(3);
        	$role_info=array();
        	if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
        	}
        	$users = $this->users_model->getusers(1);
        	$views = array('viewreceipt');
        	$branches = $this->branches_model->getbranches(1);
        	//print_r($classes);exit();
            $data = array('views'=>$views,'users'=>$users,'branches'=>$branches,"role_info"=>$role_info);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        }

        public function printreceipt()
        {
        	$views = array('printreceipt');
        	$payment_id = $this->uri->segment(3);
        	$payments = $this->payments_model->getpayment($payment_id);
        	$payment_invoice = $this->payments_invoice_model->getpayment_invoice($payment_id);
        	//echo $this->db->last_query();exit;
        	$data = array('views'=>$views,'payments'=>$payments,"payment_invoice"=>$payment_invoice); //,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        }

         public function collectfeesold()
        {
        	$id= $this->uri->segment(3);
        	$role_info=array();
        	if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
        	}
        	$users = $this->users_model->getusersonly(1);
        	//echo $this->db->last_query();exit();
        	$views = array('collectfees');
        	
        	$data = array('views'=>$views,'users'=>$users,"role_info"=>$role_info);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        }



        public function collectfees()
        {
        	/*$id= $this->uri->segment(3);
        	$role_info=array();
        	if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
			}*/
			$user_type = $this->session->userdata('user_type');
        	$users = "";
			$user_id = $this->session->userdata('id');
			$admin_info =$this->admin_roles_model->getrole($user_id);
			/*if($user_type==1){
			$branch_id = $this->input->get('branch_id');
		}*/
		if($user_type==4){
		   $branch_id = $admin_info['branch_id'];
		   $users = $this->users_model->getuserbybrnch(1,$branch_id);
		   }
        	else{
			$users = $this->users_model->getusers(1);
			}
        	//echo $this->db->last_query();exit();
        	$views = array('collectfees');
        	//$this->generateinvoice_cron();
        	$data = array('views'=>$views,'users'=>$users);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        }

        public function viewpendingpayments()
        {

        	$result = array();
        	$batch_classes = array();
        	$branch_id =null;
        	$month = null;

        	$branch_id = $this->input->get('branch_id');
        	$month = $this->input->get('month');


			$invoice = $this->invoice_model->getinvoices($branch_id, $month);
 			
 			$branches = $this->branches_model->getbranches(1);

			$views = array('viewpendingpayments');

			$this->load->view("admin/template/template",array('views'=>$views,'invoice'=>$invoice,'branches'=>$branches));

        }

         public function getstudents()
        {

        	$result = array();

        	
        	$id = $this->input->post('id');
        	
        	$users =$this->user_family_members_model->getmembers($id);

        	if(!empty($users))
        	{
	        	$result['students'] = $users;
	        	$result['success']=1;
	        	echo json_encode($result);

        	}else
        	{
        		$result['success']=2;
	        	echo json_encode($result);
        	}

        }

        public function getstudentbatches()
        {

        	$result = array();
        	$batch_classes = array();
        	$user_id = $this->input->post('user_id');
             $date = date('Y-m-d');
             
            
        	
			$invoice = $this->invoice_model->getinvoicebyusers($user_id);
			
			
 			$this->load->view("admin/getstudentbatches",array('invoice'=>$invoice, 'user_id'=>$user_id));
            //return $this->generateinvoice_cron();

        }

        /*public function save_download($payment_id)
		{ 				
	    	$payments = $this->payments_model->getpayment($payment_id);
	    	$payment_invoice = $this->payments_invoice_model->getpayment_invoice($payment_id);
	    	$data = array('payments'=>$payments,"payment_invoice"=>$payment_invoice);
			$html=$this->load->view("admin/printreceipt.php",$data, true); //load the pdf_output.php by passing our data and get 
			$pdfFilePath ="mypdfName-".time()."-download.pdf";

			$pdf = $this->m_pdf->load();
			$pdf->WriteHTML($html);
			return $pdf->Output($pdfFilePath, "S");				 	
		}*/

        public function insertpayments()
        {
        	/*echo("<pre>");
        	print_r($_POST);exit();*/

        	$this->form_validation->set_rules('final_amount','final_amount','trim|required');

			if($this->form_validation->run())
			{

				$payable_amount = $this->input->post('payable_amount');
				$invoice = $this->input->post('invoice');
				$admin_discount = $this->input->post('admin_discount');
                $balance_amount =$this->input->post('balance_amount');
				$comments = $this->input->post('comments');
				$user_id = $this->input->post('user_id');
				$email = $this->input->post('email');
				$final_amount = $this->input->post('final_amount');
				$enroll_id = $this->input->post('enroll_id');
				$amountpaid =$this->input->post('payable_amount');
				$end_date =  $this->input->post('end_date');
                $session_week=$this->input->post('session_week');
                $start_date = $this->input->post('start_date');
				$total_amount = $this->input->post('total_amount');
				$payment_type = $this->input->post('payment_type');
				$total_sessions =$this->input->post('total_sessions');
				$enroll_student_id = $this->input->post('enroll_student_id');

				
				
				//error_log ($count);
				//error_log($end_date) ;
				//$next_fee_due = date("Y-m-d",strtotime($end_date. '+1 days'));

				$userDetails1 =array();
				
					
				foreach ($payable_amount as $key =>$value){	
					
			    $userDetails1 = array(
				
				//'id'=>$enroll_student_id[$key],
				'total_sessions'=>$total_sessions[$key],
				'end_date' =>$end_date[$key],
				'start_date'=> $start_date[$key],
				'sessions_per_week' =>$session_week[$key],
				'final_amount'=>$amountpaid[$key],
				'next_fees_due_date'=>$end_date[$key]
			);
			
			$response = $this->enroll_students_model->update($userDetails1, $enroll_student_id[$key] );
			
			
		
	}	
				
				$userDetails = array(
								'user_id'=>$user_id,
								//'member_id'=>$member_id,
								 'total_amount'=>$total_amount,
								 'final_amount'=>$final_amount,
								  'admin_discount'=>$admin_discount,
								   'payment_type'=>$payment_type,
								   //'total_sessions'=>$total_sessions,
								    'comments'=>$comments,
								    'discount_type'=> (!empty($admin_discount)?"1":null),
								     'created_date'=>date("Y-m-d"), 
								);
				
				$payment_id = $this->payments_model->save($userDetails);

				
					
			
			
               
				
				if(!empty($payable_amount))
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

					if(!empty($invoice))
					{
						foreach ($invoice as $invoice_info) 
						{
							$user= array("paid_status"=>2,
						'amount'=>$total_amount,
						'final_amount'=>$final_amount);

							$this->invoice_model->update($user,$invoice_info);
						}						
					}
					
				}

				$user_info = $this->users_model->getuserinfo($user_id);
				$email = $user_info['email'];

                $this->email->subject("Payment Information");
                $this->email->from('info@kaushikdhwanee.com', 'Kaushik dhwanee');
                $buffer = $this->save_download($payment_id);
                $this->email->attach($buffer, 'attachment', 'print_receipt.pdf', 'application/pdf');
                
                $this->email->set_newline("\r\n");
                $this->email->to($email);
                $data = array(
                         'username'=>$user_info['name'],
                         'message'=>"Received fees Rs $final_amount."
                        
                        );
        		$message1 = $this->load->view('emails/success_message',$data,true);
                $this->email->message($message1);
				$this->email->send();

				$username = $user_info['name'];
				$message = "Dear $username, Received fees Rs $final_amount. Thank you, Team KAUSHIKDHWANEE";
 				$response = $this->sms->sendsms($user_info['mobile'],$message);
				//echo "1";
				$result=$this->users_model->getuserinfo($user_id);
				$userDetails = array('branch_id'=>$result['branch_id'],
									 'message'=>$message,
									 'user_id'=>$user_id,
									 'created_on'=>date("Y-m-d H:i:s")
									);

				$responsex = $this->notifications_model->save($userDetails);
            	
				if($responsex)
				{
					redirect('admin/printreceipt/'.$payment_id);
					
				}else
				{
					redirect("admin/getstudentbatches");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin/getstudentbatches");        
        }

        /*public function test()
        {
        	$this->invoice_model->updateinvoicestatus("9");
        	echo $this->db->last_query();
        }*/
	
	public function insertpaymentsupdate()
        {
        	

        	$this->form_validation->set_rules('final_amount','final_amount','trim|required');

			if($this->form_validation->run())
			{

				$payable_amount = $this->input->post('final_amount');
				$invoice = $this->input->post('invoice_id');
				echo $invoice;
				$admin_discount = $this->input->post('admin_discount');
                $balance_amount =$this->input->post('balance_amount');
				$comments = $this->input->post('comments');
				$user_id = $this->input->post('user_id');
				$email = $this->input->post('email');
				$final_amount = $this->input->post('final_amount');
				$end_date = date("Y-m-d",strtotime($this->input->post('end_date')));
                 $enroll_id = $this->input->post('enroll_id');
                 $session_week=$this->input->post('number_of_class');
                 $start_date =date("Y-m-d",strtotime($this->input->post('start_date')));;
				$total_amount = $this->input->post('total_amount');
				$payment_type = $this->input->post('payment_type');
				$total_sessions =$this->input->post('total_sessions');
				$enroll_student_id = $this->input->post('enroll_id');
				$selected_days = $this->input->post('selected_days');
				$selected_batches = $this->input->post('selected_batches');
				$next_fee_due = date("Y-m-d",strtotime($end_date. '+1 days'));
			


			
				
				$userDetails = array(
								'user_id'=>$user_id,
								//'member_id'=>$member_id,
								 'total_amount'=>$total_amount,
								 'final_amount'=>$final_amount,
								  'admin_discount'=>$admin_discount,
								   'payment_type'=>$payment_type,
								   //'total_sessions'=>$total_sessions,
								    'comments'=>$comments,
								    'discount_type'=> (!empty($admin_discount)?"1":null),
								     'created_date'=>date("Y-m-d"), 
								);
				
				$payment_id = $this->payments_model->save($userDetails);

				$userDetails1 = array(
					'total_sessions'=>$total_sessions,
					'end_date' =>$end_date,
					'start_date'=>$start_date,
				    //'current_start_date'=> $start_date,
				    'sessions_per_week' =>$session_week,
				    'final_amount'=>$final_amount,
				    'next_fees_due_date'=>$end_date
);
               $response = $this->enroll_students_model->update($userDetails1,$enroll_student_id);
               if(!empty($selected_days))
				{
						$total_batches =array();
						foreach ($selected_days as $key => $value) {
							$userdata = array(
											'enroll_student_id'=>$enroll_student_id,
											'batch_class_id'=>$selected_batches[$key]
								);

							array_push($total_batches, $userdata);
						}
						$this->enroll_students_batches_model->delete($enroll_student_id);

						$resss = $this->enroll_students_batches_model->save($total_batches);
				}
				if(!empty($payable_amount))
				{
					
					
						
						$users = array("enroll_student_id"=>$enroll_student_id,
										'amount'=>$final_amount,
										'invoice_id'=>$invoice,
										'payment_id'=>$payment_id
									);
						

					
					$response = $this->payments_invoice_model->save(array($users));
				}
                     
					if(!empty($invoice))
					echo "<script>console.log({$invoice})</script>";
					echo "<script>console.log('working')</script>";
					{
						$user= array("paid_status"=>2,
						'amount'=>$total_amount,
						'final_amount'=>$final_amount);

							$this->invoice_model->update($user,$invoice);
							//echo $this->db->last_query();exit;
												
					}
					
				

				$user_info = $this->users_model->getuserinfo($user_id);
				$email = $user_info['email'];

                $this->email->subject("Payment Information");
                $this->email->from('info@kaushikdhwanee.com', 'Kaushik dhwanee');
                $buffer = $this->save_download($payment_id);
                $this->email->attach($buffer, 'attachment', 'print_receipt.pdf', 'application/pdf');
                
                $this->email->set_newline("\r\n");
                $this->email->to($email);
                $data = array(
                         'username'=>$user_info['name'],
                         'message'=>"Received fees Rs $final_amount."
                        
                        );
        		$message1 = $this->load->view('emails/success_message',$data,true);
                $this->email->message($message1);
				$this->email->send();

				$username = $user_info['name'];
				$message = "Dear $username, Received fees Rs $final_amount. Thank you, Team KAUSHIKDHWANEE";
 				$response = $this->sms->sendsms($user_info['mobile'],$message);
				//echo "1";
				$result=$this->users_model->getuserinfo($user_id);
				$userDetails = array('branch_id'=>$result['branch_id'],
									 'message'=>$message,
									 'user_id'=>$user_id,
									 'created_on'=>date("Y-m-d H:i:s")
									);

				$responsex = $this->notifications_model->save($userDetails);
            	
				if($responsex)
				{
					redirect('admin/printreceipt/'.$payment_id);
					
				}else
				{
					redirect("admin/getstudentbatches");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin/getstudentbatches");        
        }
           
        public function view_democlasses()
        {    
        	$user_type= $this->session->userdata('user_type');
            $user_id = $this->session->userdata('id');
            $admin_info =$this->admin_roles_model->getrole($user_id);
            $branch_id = $admin_info['branch_id'];
        	$views = array('view_democlasses');
        	
        	$branches = $this->branches_model->getbranches();
        	if($user_type==1){
             $branch_id = $this->input->get('branch_id');
             }
             else{
            $branch_id = $admin_info['branch_id'];
        	}
            $demos = $this->demo_classes_model->getdemos();
            $demos_branch = $this->demo_classes_model->getdemosbybranches($branch_id);

            if(!$branch_id){
            	$data = array('views'=>$views,'branches'=>$branches,'demos'=>$demos);
            }
            
			        
        else{
        $data = array('views'=>$views,'branches'=>$branches,'demos'=>$demos_branch);
        }
       $this->load->view('admin/template/template',$data);
   }
        public function updatedemorequeststatus()
        {
		
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);
			

			$userDetails = array(
							'status' => $status
							);

			$response = $this->demo_classes_model->update($userDetails,$id);

			if($response)
			{
				$this->session->set_flashdata('message', ' Demo Class Request updated successfully.');
				redirect('admin/view_democlasses');
			}else
			{
				redirect("admin/view_democlasses");
			}
			
			redirect("admin/view_democlasses");
        	
        
        }

		public function remove_teacher_timing()
        {
        	$this->form_validation->set_rules('id','id','trim|required');
			if($this->form_validation->run())
			{
				$id = $this->input->post('id');
				
				$result = $this->teachers_timings_model->delete($id);

				//echo $this->db->last_query();
				if(!empty($result))
				{
	 				echo 1;
				}
				else
				{
					echo 2;
				}
	 			
	 		

			}
        }

		 public function getuser()
        {
        	//$views = array('viewusers');
        	$user_id = $this->input->post('user_id');
        	$users =array();
        	$users = $this->users_model->getuser($user_id);
            //$data = array("users"=>$users);
			//$this->load->view('admin/template/template',$data);
			echo json_encode($users);
        
        }

        public function batches()
        {
        	$views = array('batches');
        	$classes = $this->classes_model->getclasses();
        	$branches = $this->branches_model->getbranches();


            $data = array('views'=>$views,'classes'=>$classes,'branches'=>$branches);//,"service_info"=>$service_info
			$this->load->view('admin/template/template',$data);
        }

        public function notifications()

        {   $user_type= $this->session->userdata('user_type');
            $user_id = $this->session->userdata('id');
            $admin_info =$this->admin_roles_model->getrole($user_id);
            $branch_id = $admin_info['branch_id'];
        	$views = array('notifications');
        	$classes = $this->classes_model->getclasses();
        	$branches = $this->branches_model->getbranches();
        	$notifications = $this->notifications_model->getallnotifications();
        	$notifications_branch = $this->notifications_model->getallnotificationsbybranch($branch_id);
        	if($user_type==1){
            $data = array('views'=>$views,'classes'=>$classes,'branches'=>$branches,"notifications"=>$notifications);//,"service_info"=>$service_info
            }
            else{
            	$data = array('views'=>$views,'classes'=>$classes,'branches'=>$branches,"notifications"=>$notifications_branch, 'admin_info'=>$admin_info);
            }
			$this->load->view('admin/template/template',$data);
        }

        public function sendnotification()
        {
        	$user_type= $this->session->userdata('user_type');
            $user_id = $this->session->userdata('id');
            $admin_info =$this->admin_roles_model->getrole($user_id);
            $branch = $admin_info['branch_id'];
        	
        	$this->form_validation->set_rules('message','message','trim|required');


			if($this->form_validation->run())
			{
			
				$branch_id = $this->input->post('branch_id');
			  
				$class_id = $this->input->post('class_id');
				$message = $this->input->post('message');

				if($user_type==4){
					$branch_id = $admin_info['branch_id'];
				}

				if(!empty($class_id) && !empty($branch_id))
				{
					$users1=array();
					foreach ($class_id as $class_id1) 
					{
						$users = $this->users_model->getusersbybranchclass($branch_id,$class_id1);

					}
					array_merge($users,$users1);

				}
				else if(!empty($branch_id))
				{
					$users = $this->users_model->getusersbybranch($branch_id);
					//echo $this->db->last_query();
				}else
				{
					$users = $this->users_model->getusersonly(1);
				}

				//print_r($users);exit;
				
				$mobiles = array_unique(array_filter(array_column($users, "mobile")));
				$gcm = array_column($users, "gcm_id");//array_unique(array_filter(array_column($users, "gcm_id")))
				//echo $gcm;
				//$gcm = array_unique(array_filter(array_column($users, "gcm_id")));
				$device = array_unique(array_filter(array_column($users, "device_id")));

				$mobile_nos = @implode(",",$mobiles);
				$gcm_ids = @implode(",",$mobiles);
				
				$userDetails = array('branch_id'=>$branch_id,
									 'message'=>$message,
									 'created_on'=>date("Y-m-d H:i:s")
									);

				if(!empty($class_id))
				{
					$userDetails['class_id']=@implode(",", $class_id);
				}

				$responsex = $this->notifications_model->save($userDetails);

				$message2["message"]= $message;
	        	$message2["target"]	= 1;
				$message2["success"]= 1;
				$message1 = json_encode($message2);

				
				if(!empty($mobile_nos))
				{
					
					$this->sms->sendsms($mobile_nos,$message);
				}
				
				if(!empty($device))
	        	{	        		$responsez1 =  $this->notifications->send_ios_notification($device,$message1);
	       		}
	       		if(!empty($gcm))
	       		{
	        		$responsez = $this->notifications->send_notification($gcm,$message1);
	        	}

				if(!empty($responsez))
				{
	 				$this->session->set_flashdata("message","Notification sent successfully");
	 				redirect("admin/notifications");
				}
				else
				{
	 				redirect("admin/notifications");
					
				}
	 			
			}else
			{
				redirect("admin/notifications");
			}
        }

        public function send_ios_notification()
        {
        	$message2["message"]	= "hiiiiiiiii wajid bhai.......";
	        	$message2["target"]	= 1;
				$message2["success"]	= 1;
				$message1=json_encode($message2);
				
				/*if(!empty($device_id))
	        	{*/
	        		$responsez1 =  $this->notifications->send_ios_notification(array('32df4507bbb14fde3becd854356f52122c168e2baa3f684feafd3229f6b4763f'),$message1);
	       		/*}*/
        }


        public function getbatches()
        {
        	$branch_id = $this->input->post('branch_id');
        	$class_id = $this->input->post('class_id');
        	$views = array('getbatches');
        	$batch_info = $this->batches_model->getbatch($branch_id,$class_id);
        	if(empty($batch_info))
        	{
        		$userdata = array('branch_id' => $branch_id,
        					'class_id' => $class_id,
        					'created_date' => date('Y-m-d H:i:s')
        					);

        		$batch_id = $this->batches_model->save($userdata);
        	}
        	else
        	{
        		$batch_id = $batch_info['id'];
        	}

			$teachers = $this->teachers_model->getteachers();

			$batches_count = array();

			for($i=1;$i<=7;$i++)
			{
				$classes = array();
				$classes = $this->batch_classes_model->get_classes_by_day($batch_id, $i);
				$batches_count[$i]= count($classes);
			}

            $data = array('teachers'=>$teachers,'class_id'=>$class_id,'branch_id'=>$branch_id,'batch_id'=>$batch_id,'batches_count'=>$batches_count);
            //,"service_info"=>$service_info
			$this->load->view('admin/getbatches',$data);
        }

        public function getbatchclasses()
        {
        	$day_type= $this->input->post('day_type');
        	$batch_id= $this->input->post('batch_id');
        	$classes = $this->batch_classes_model->get_classes_by_day($batch_id, $day_type);
        	$results['data']=$this->load->view("admin/getbatchclasses",array('classes'=>$classes),true);
        	$results['count']=count($classes);
        	echo json_encode($results); 


        }

        public function getclasses()
        {
        	$id= $this->input->post("main_category");
        	$classes = $this->classes_model->getclasses($id);
        	$result['classes'] = $classes; 
        	echo json_encode($result);
        				
        }

        public function getclassesbymemberid()
        {
        	$member_id= $this->input->post("member_id");
			$user_info = $this->user_family_members_model->getuser($member_id);
			$date = date('Y-m-d');
        	$classes = $this->enroll_students_model->getmemberenrollsbyduedate($member_id,$date);
        	if(!empty($classes))
        	{
        		$result['batches'] = $classes; 
        		$result['user'] = $user_info; 

        		$result['success'] = 1; 
        		echo json_encode($result);
        	}else
        	{
        		$result['success'] = 2; 
        		echo json_encode($result);
        	}
        	
        				
        }

        public function insertbatch()
        {
        	$this->form_validation->set_rules('branch_id','branch_id','trim|required');
        	$this->form_validation->set_rules('class_id','message','trim|required');
        	$this->form_validation->set_rules('start_time','message','trim|required');
        	$this->form_validation->set_rules('end_time','message','trim|required');
        	$this->form_validation->set_rules('teachers[]','message','trim|required');

        	if($this->form_validation->run())
			{
	        	$branch_id = $this->input->post('branch_id');
	        	$class_id = $this->input->post('class_id');
	        	$start_time = $this->input->post('start_time');
	        	$end_time = $this->input->post('end_time');
	        	$teachers = $this->input->post('teachers');
	        	$type = $this->input->post("type");
	        	$batch_id = $this->input->post('batch_id');
	        	$userDetails = array('start_time'=> date("H:i:s", strtotime($start_time)),
	        						 'end_time' => date("H:i:s", strtotime($end_time)),
	        						 'batch_id' => $batch_id,
	        						 'type' => $type
	        						);

	        	$batch_class_id = $this->batch_classes_model->save($userDetails);

	        	$batch_teachers = array();

				foreach ($teachers as $key => $value) {

					$users = array("batch_id"=>$batch_id,
									'batch_class_id'=>$batch_class_id,
									'teacher_id'=>$value
								);
					array_push($batch_teachers, $users);

				}

	           $response = $this->batch_class_teachers_model->save($batch_teachers);

	           if($response)
	           {
	           	echo 1;
	           }else
	           {
	           	echo 2;
	           }
       }else{
       	echo 2;
       }

        }


        public function updatebatch()
        {
        	//print_r($_POST);exit;
        	$start_time = $this->input->post('start_time');
        	$end_time = $this->input->post('end_time');
        	$teachers = $this->input->post('teachers');
        	$batch_id = $this->input->post('batch_id');
        	$batch_class_id = $this->input->post("batch_class_id");
        	$userDetails = array('start_time'=> date("H:i:s", strtotime($start_time)),
        						 'end_time' => date("H:i:s", strtotime($end_time)),
        						 );

        	$this->batch_classes_model->update($userDetails,$batch_class_id);

        	$batch_teachers = array();

			foreach ($teachers as $key => $value) {

				$users = array("batch_id"=>$batch_id,
								'batch_class_id'=>$batch_class_id,
								'teacher_id'=>$value

							);
				array_push($batch_teachers, $users);

			}
			if(!empty($batch_teachers))
			{
				$response = $this->batch_class_teachers_model->delete($batch_class_id);
				$response = $this->batch_class_teachers_model->save($batch_teachers);
				
				if($response)
	           	{
	           		echo 1;
	           	}
	           	else
	           	{
	           		echo 2;
	           	}
			}


        }

        

        public function getbatchclassesbyweekday()
        {
        	$day_type = $this->input->post('weekday');
        	$class_id = $this->input->post('class_id');
        	$branch_id = $this->input->post('branch_id');
        	$date1 = $this->input->post('start_date');
        	$selected_days = $this->input->post('selected_days');
        	$month = date("m",strtotime($date1));
			$date2 = date("Y-".$month."-t");
			$no_days=0;
			
			if(!empty($selected_days))
			{
				
				foreach ($selected_days as $key => $value) {
					if($value!=""){
						//echo $value;
						for ($i = 0; $i <= ((strtotime($date2) - strtotime($date1)) / 86400); $i++)
						{
							if(date('N',strtotime($date1) + ($i * 86400)) == "$value")
							{ 

								$no_days++; 
							}	 
						}
					}
					
				 
				}
			}
			
        	$batch = $this->batches_model->getbatch($branch_id,$class_id);
        	$batch_id= $batch['id'];
        	$classes = $this->batch_classes_model->get_classes_by_day($batch_id, $day_type);

			if(!empty($classes))
        	{
        		$result['batches'] = $classes;
        		$result['no_days'] = $no_days;
	        	$result['success']=1;
	        	echo json_encode($result);

        	}else
        	{
        		$result['success']=2;
	        	echo json_encode($result);
        	}
        }

        public function getweekdayscount()
        {

        	$selected_days = $this->input->post('selected_days');
        	$date1 = $this->input->post('start_date');
			$date2 = date("y-m-t");
			$no_days=0;
			
			if(!empty($selected_days))
			{
				
				foreach ($selected_days as $key => $value) {
					if($value!=""){
						//echo $value;
						for ($i = 0; $i < ((strtotime($date2) - strtotime($date1)) / 86400); $i++)
						{
							if(date('N',strtotime($date1) + ($i * 86400)) == "$value")
							{ 
								$no_days++; 
							}	 
						}
					}
				
				}
				$result['no_days'] = $no_days;
	        	$result['success']=1;
	        	echo json_encode($result);
			}
			else
        	{
        		$result['success']=2;
	        	echo json_encode($result);
        	}
        }

        public function editbatchclass()
        {
        	
        	$batch_class_id= $this->input->post('batch_class_id');
        	$teachers = $this->teachers_model->getteachers();

        	$class_info = $this->batch_classes_model->getclass($batch_class_id);
        	
        	$this->load->view("admin/editbatchclass",array('class_info'=>$class_info,"teachers"=>$teachers));

        }

         public function updatebatchclassstatus()
        {

				
			$id = $this->input->post('batch_class_id');
			$status = $this->input->post('status');

			if($status==1)
			{
				$status=2;
			}else
			{
				$status=1;
			}

			$userDetails = array(
							'status' => $status
							);

			$response = $this->batch_classes_model->update($userDetails,$id);

			if($response)
			{
				echo 1;
				/*$this->session->set_flashdata('message', 'Teacher status updated successfully.');
				redirect('admin/viewteachers');*/
			}else
			{
				echo 2;
				//redirect("admin/viewteachers");
			}
			
			//redirect("admin/viewteachers");
        	
        
        }

        public function searchteacherschedule()
        {
        	$views = array('searchteacherschedule');
        	$user_type = $this->session->userdata('user_type');
        	$user_id = $this->session->userdata('id');
            $admin_info =$this->admin_roles_model->getrole($user_id);
            $branch_id = $admin_info['branch_id'];
        	$branches = $this->branches_model->getbranches();
        	if($user_type==1){
        	$teachers = $this->teachers_model->getteachers();
        }
            elseif($user_type==4){
        	$teachers = $this->teachers_timings_model->getteachersbybranch($branch_id);
        }
            
        
            $data = array('views'=>$views,'teachers'=>$teachers,'branches'=>$branches);
        

			$this->load->view('admin/template/template',$data);
        }

        public function getteacherclasses()
        {
        	$user_type= $this->session->userdata('user_type');
            $user_id = $this->session->userdata('id');
            $admin_info =$this->admin_roles_model->getrole($user_id);
            
        	$day_type= $this->input->post('day_type');
        	$teacher_id= $this->input->post('teacher_id');
        	if($user_type==1){
        	$branch_id= $this->input->post('branch_id');
            }
            else{
            	 $branch_id = $admin_info['branch_id'];
            	}
        	$classes = $this->batch_class_teachers_model->getclasses($branch_id,$teacher_id, $day_type);
        	//echo $this->db->last_query();exit;
        	$this->load->view("admin/getteacherclasses",array('classes'=>$classes));

        }

        public function editclassstatus()
        {
        	$id= $this->uri->segment(3);
        	$views = array('editclassstatus');
        	$user = $this->user_family_members_model->getuser($id);
        	$classes = $this->enroll_students_model->getmemberenrolls($id);
        	//print_r($classes);
        	$data = array('views'=>$views,'user_info'=>$user,'classes'=>$classes,'member_id'=>$id);
			$this->load->view('admin/template/template',$data);
        } 

        public function editclassenroll()
        {
        	$id= $this->uri->segment(3);
        	$views = array('editclass');
        	$user = $this->enroll_students_model->getenrollbyid($id);
        	$classes = $this->enroll_students_model->getmemberenrolls($id);
        	//print_r($classes);
        	$data = array('views'=>$views,'user_info'=>$user,'classes'=>$classes,'member_id'=>$id);
			$this->load->view('admin/template/template',$data);
        } 
	public function enterattendence()
        {
        	$id= $this->uri->segment(3);
        	$views = array('enterattendence');
        	$user = $this->enroll_students_model->getenrollbyid($id);
        	$classes = $this->enroll_students_model->getmemberenrolls($id);
        	//print_r($classes);
        	$data = array('views'=>$views,'user_info'=>$user,'classes'=>$classes,'member_id'=>$id);
			$this->load->view('admin/template/template',$data);
        } 
	     
	     public function insertattendence(){
         $enrolls = $this->input->post('enrolls');
        $date=date("Y-m-d",strtotime($this->input->post('date')));
        $end_time=date("H:i:s",strtotime($this->input->post('time_out')));
        $start_time=date("H:i:s",strtotime($this->input->post('time_in')));

        $userdetails=array(
        	                 'enroll_id'=>$enrolls,
                             'date'=>$date,
                             'start_time'=>$start_time,
							  'end_time' =>$end_time 
							   
                          );
        $response = $this->student_attendence_model->save($userdetails);
        if($response){
				
		$this->session->set_flashdata('message', 'entered attendence successfully.');
        redirect("admin/viewstudents");
    }
        }

        public function updateenrollclass(){
        $member_id = $this->input->post('member_id');
        $enrolls = $this->input->post('enrolls');
        $start_date=date("Y-m-d",strtotime($this->input->post('start_date')));
        $end_date=date("Y-m-d",strtotime($this->input->post('end_date')));
        
        $userdetails=array(
                             'start_date'=>$start_date,
                              'end_date' =>$end_date,
			                  'next_fees_due_date'=> $end_date 
                          );
        $response = $this->enroll_students_model->update($userdetails,$enrolls);
        if($response){
				
		$this->session->set_flashdata('message', 'class updated successfully.');
        redirect("admin/viewstudents");
    }
        }

        public function updateenrollclassstatus()
        {

				
			$member_id = $this->input->post('member_id');
			$status = $this->input->post('status');
			$enrolls = $this->input->post('enrolls');

			if(!empty($enrolls))
			{
				foreach ($enrolls as $key => $value) {
				
					$userDetails = array(
								'status' => $status[$key]
								);

					$response = $this->enroll_students_model->update($userDetails,$value);
				}
			}
			

			if($response)
			{
				
				$this->session->set_flashdata('message', 'Student class status updated successfully...');
				redirect('admin/viewstudents');
			}else
			{
				
				redirect("admin/viewstudents");
			}
			
			redirect("admin/viewstudents");
        	
        
        } 

        public function updatepromotionalstatus_cron()
        {

			$response = $this->promotional_offers_model->statusupdate();

        }

        public function logout()
		{
			$this->session->sess_destroy();
			redirect('admin/index');
		}


		public function attendance()
        {
        	
        	$branch_id =null;
			$user_id = null;
			$status = null;
			$all_users="";
        	//$branch_id = $this->input->get('branch_id');
        	$user_id = $this->input->get('user_id');
        	$date =date('Y-m-d');
        	$user_type = $this->session->userdata('user_type');
        	
             $userid = $this->session->userdata('id');
             $admin_info =$this->admin_roles_model->getrole($userid);
             if($user_type==4)
            {
			$branch_id = $admin_info['branch_id'];
			$all_users = $this->users_model->getuserbybrnch($branch_id);
        	}
            else{
        	
        	$all_users = $this->users_model->getusers();}
        	//$users = $this->users_model->getuserswithbranch($branch_id,$user_id,$status);
        	$users = $this->enroll_students_model->getstudentsattendancebysession($user_id);
        	//echo $this->db->last_query();exit;
        	$views = array('attendance');
        	$branches = $this->branches_model->getbranches(1);
        	$data = array('views'=>$views,'users'=>$users,"all_users"=>$all_users,"branches"=>$branches, );
			$this->load->view('admin/template/template',$data);
        }
        public function attendance_calendar()
        {
        	
        	$views = array('attendance-calendar.php');
        	$enroll_id = $this->uri->segment(3);
        	$attendance = $this->enroll_students_model->getstudentattendancebyenrollid($enroll_id);
        	//print_r($attendance);
        	$count = $this->enroll_students_model->getstudentsattendancebymonth(date('Y-m'),$enroll_id);
        	$data = array('views'=>$views,'attendance'=>$attendance,'count'=>$count);


			$this->load->view('admin/template/template',$data);
        }

        public function month_attendance()
        {
        	$enroll_id = $this->input->post("enroll_id");
        	$month = $this->input->post("month");
        	$year = $this->input->post("year");
        	$date = $year."-".date("m",strtotime($year."-".$month));        	
        	$count = $this->enroll_students_model->getstudentsattendancebymonth($date,$enroll_id);
        	//echo $this->db->last_query();
        	echo json_encode(count($count));
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
				$aclass_id = $this->input->post('class_id');			
				$anumber_of_class = $this->input->post('number_of_class');
				$asession_id=$this->input->post('session_id');
                $abranch_id = $this->input->post('branch_id');
				$astart_date = date("Y-m-d",strtotime($this->input->post('start_date')));
				$aend_date = date("Y-m-d",strtotime($this->input->post('end_date')));
				$acourse_fee = $this->input->post('course_fee');
				$afinal_amount = $this->input->post('final_amount');
				$aadmin_discount = $this->input->post('discount');
				$acomments = $this->input->post('comments');
		
			
			$datas=array(
					
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
								//'plan'=>$aplan,
								'comments'=>$acomments,
								
								

				);
				

if($this->form_validation->run())
			{
				date_default_timezone_set('Asia/Calcutta');
                $datenow = date("d/m/Y h:m:s");
$transactionDate = str_replace(" ", "%20", $datenow);

$transactionId = rand(1,1000000);


//Setting all values here
	
	$this->transactionrequest->setMode("test");
$this->transactionrequest->setLogin(197);
$this->transactionrequest->setPassword("Test@123");
$this->transactionrequest->setProductId("NSE");
$this->transactionrequest->setAmount($afinal_amount);
$this->transactionrequest->setTransactionCurrency("INR");
$this->transactionrequest->setTransactionAmount(50);
$this->transactionrequest->setReturnUrl("http://beta.kaushikdhwanee.in/app/register/sumcamp_success/");
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
				
$this->transactionrequest->setReturnUrl("http://beta.kaushikdhwanee.in/app/register/success");
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
 $this->session->set_userdata('dats',$datas);
	echo $datas['name']	;		
				
		}else
			{
				echo validation_errors();exit;
			}
			
        	
       // $this->session->set_userdata('data',$datas);	
      
        }
	
     public function summercamp_insert(){
		
		$data_value= $this->session->userdata('dats');
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
					//'country'=>$country,
			         'comments'=>$comments,
					'created_date'=> date("Y-m-d")
					);


					$response = $this->summercamp_reg_model->save($users);
	             $users1 = array(
	
	               'payment_type'=>9,
			        'payment_through'=>4,
			         'member_id'=>$response,
					'final_amount'=>$final_amount,
					 'total_amount'=>$course_fee,
			         'admin_discount'=>$admin_discount,
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
		     $this->session->unset_userdata('dats');
		 
		
		
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
	
