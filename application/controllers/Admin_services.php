<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_services extends CI_Controller {
	
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
			$this->load->model("promotional_offers_model");
			$this->load->model("demo_classes_model");
			$this->load->model("notifications_model");
			$this->load->library("notifications");
			$this->load->library("email");

			



			
		}

       
        
        public function login_service()
        {
        	  $_POST = json_decode ( file_get_contents ( "php://input" ),true );	
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
					$this->session->set_userdata('user_type',1);
					//redirect('admin_services/addcategory');
					$result['success'] =1;
					echo json_encode($result);

				}else{
					//$this->session->set_flashdata('msg','user');
					//redirect('admin_services/index');
					$result['success'] =4;
					echo json_encode($result);
				}
				
			  }else
			  {
			  	$result['success'] =2;
				echo json_encode($result);
			  }
        }

		public function addcategory()
        {
        	$id= $this->uri->segment(3);
        	$category_info=array();
        	if(!empty($id))
        	{
        		$category_info = $this->categories_model->get_category($id);
        	}
        	
        	$categories = $this->categories_model->get_categories();
            $data = array('categories'=>$categories,'category_info'=>$category_info);
			$this->load->view('admin_services/addcategory',$data);
        }

         public function getcategory()
        {
        	$id= $this->input->post('class_id');
        	$class_info=array();
        	if(!empty($id))
        	{
        		$class_info = $this->categories_model->get_category($id);
        	}
        	$data = array("class_info"=>$class_info);//,"service_info"=>$service_info
			$this->load->view('admin_services/getcategory',$data);
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
				
				if(isset($_POST['image']) && $_POST['image'] != '')
			    {
			        $desired_dir = 'uploads/category_images/';
			        $base=$_POST['image'];
			        $file_name = strtotime('now');
			        //decoding image
			        $binary=base64_decode($base);
			        header('Content-Type: bitmap; charset=utf-8');
					if(is_dir($desired_dir)==false){
			            mkdir("$desired_dir", 0700);    
			        }
			            $file = fopen($desired_dir.$file_name, 'wb');
			            fwrite($file, $binary);
			            fclose($file);
			            $userDetails['logo'] = $file_name;
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
					redirect('admin_services/addcategory');
				}else
				{
					redirect("admin_services/addcategory");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin_services/addmaincategory");
        	/*$views = array('addcategory');
            $data = array('views'=>$views);
			$this->load->view('admin_services/template/template',$data);*/
        }

        public function notifications()
        {
        	$views = array('notifications');
        	$classes = $this->classes_model->getclasses();
        	$branches = $this->branches_model->getbranches();
        	$notifications = $this->notifications_model->getallnotifications();
            $data = array('classes'=>$classes,'branches'=>$branches,"notifications"=>$notifications);
			$this->load->view('admin_services/notifications',$data);
        }

        public function sendnotification()
        {
        	//print_r($_POST);exit;
        	$this->form_validation->set_rules('branch_id','branch_id','trim|required');
        	$this->form_validation->set_rules('message','message','trim|required');

			if($this->form_validation->run())
			{
				$branch_id = $this->input->post('branch_id');
				$class_id = $this->input->post('class_id');
				$message = $this->input->post('message');

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
				}	
				$mobiles = array_unique(array_column($users, "mobile"));
				$gcm = array_unique(array_column($users, "gcm_id"));
				$device = array_unique(array_column($users, "device_id"));

				 $mobile_nos = implode($mobiles, ",");
				//exit;

				//$responsez = $this->sms->sendsms($mobile_nos,$message);

				$userDetails = array('branch_id'=>$branch_id,
									 'message'=>$message,
									 'created_on'=>date("Y-m-d H:i:s")
									);
				if(!empty($class_id))
				{
					$userDetails['class_id']=@implode(",", $class_id);
				}
				$response = $this->notifications_model->save($userDetails);

				$message2["message"]	= $message;
	        	$message2["target"]	= 1;
				$message2["success"]	= 1;
				$message1=json_encode($message2);
				
				if(!empty($device_id))
	        	{
	        		$responsez1 =  $this->notifications->send_ios_notification($device,$message1);
	       		}
	       		if(!empty($gcm))
	       		{
	        		$responsez = $this->notifications->send_notification($gcm,$message1);
	        	}

				if(!empty($response))
				{
	 				//echo 1;
	 				$this->session->set_flashdata("message","Notification sent successfully");
	 				redirect("admin_services/notifications");
				}
				else
				{
	 				redirect("admin_services/notifications");
					
				}
	 			
	 		

			}else
			{
				redirect("admin_services/notifications");
			}
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
				redirect('admin_services/addcategory');
			}else
			{
				redirect("admin_services/addcategory");
			}
			
			redirect("admin_services/addcategory");
        	
        
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
				redirect('admin_services/addcategory');
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
        	$categories = $this->categories_model->get_categories();
        	$classes = $this->classes_model->getclasses();
            $data = array('categories'=>$categories,"class_info"=>$class_info,"classes"=>$classes);//,"service_info"=>$service_info
			$this->load->view('admin_services/addclass',$data);
        }


        public function getclass()
        {
        	$id= $this->input->post('class_id');
        	$class_info=array();
        	if(!empty($id))
        	{
        		$class_info = $this->classes_model->getclass($id);
        	}
        	$data = array("class_info"=>$class_info);//,"service_info"=>$service_info
			$this->load->view('admin_services/getclass',$data);
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
				
				
            	if(isset($_POST['image']) && $_POST['image'] != '')
			    {
			        $desired_dir = 'uploads/class_images/';
			        $base=$_POST['image'];
			        $file_name = strtotime('now');
			        //decoding image
			        $binary=base64_decode($base);
			        header('Content-Type: bitmap; charset=utf-8');
					if(is_dir($desired_dir)==false){
			            mkdir("$desired_dir", 0700);    
			        }
			            $file = fopen($desired_dir.$file_name, 'wb');
			            fwrite($file, $binary);
			            fclose($file);
			            $userDetails['logo'] = $file_name;
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
						redirect('admin_services/addclass/success');
					}else{
						$this->session->set_flashdata('message', 'Class added successfully.');
						redirect('admin_services/addclass');
					}
					//redirect('admin_services/addclass');
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin_services/addclass");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin_services/addclass");
        	/*$views = array('addcategory');
            $data = array('views'=>$views);
			$this->load->view('admin_services/template/template',$data);*/
        
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
			$this->load->view('admin_services/template/template',$data);
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
				redirect('admin_services/addclass');
			}else
			{
				redirect("admin_services/addclass");
			}
			
			redirect("admin_services/addclass");
        	
        
        }



        public function addbranch()
        {
        	$id= $this->uri->segment(3);
        	$branch_info=array();
        	if(!empty($id))
        	{
        		$branch_info = $this->branches_model->getbranch($id);
        	}
        	$branches = $this->branches_model->getbranches();
        	//$views = array('addbranch');
        	$data = array('branches'=>$branches,'branch_info'=>$branch_info);//,"service_info"=>$service_info
			$this->load->view('admin_services/addbranch',$data);
        }

         public function getbranch()
        {
        	$id= $this->input->post('branch_id');
        	$branch_info=array();
        	if(!empty($id))
        	{
        		$branch_info = $this->branches_model->getbranch($id);
        	}
        	$data = array("branch_info"=>$branch_info);//,"service_info"=>$service_info
			$this->load->view('admin_services/getbranch',$data);
        }

        public function insertbranch()
        {
        	//print_r($_POST);exit();

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
				
				if(isset($_POST['image']) && $_POST['image'] != '')
			    {
			        $desired_dir = 'uploads/branch_images/';
			        $base=$_POST['image'];
			        $file_name = strtotime('now');
			        //decoding image
			        $binary=base64_decode($base);
			        header('Content-Type: bitmap; charset=utf-8');
					if(is_dir($desired_dir)==false){
			            mkdir("$desired_dir", 0700);    
			        }
			            $file = fopen($desired_dir.$file_name, 'wb');
			            fwrite($file, $binary);
			            fclose($file);
			            $userDetails['logo'] = $file_name;
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
						//redirect('admin_services/viewbranches');
					}else{
						$this->session->set_flashdata('message', 'Branch added successfully.');
						
					}redirect('admin_services/addbranch');
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin_services/addbranch");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin_services/addbranch");        
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
				redirect('admin_services/addbranch');
			}else
			{
				redirect("admin_services/addbranch");
			}
			
			redirect("admin_services/addbranch");
        	
        
        }


        public function addteacher()
        {
        	$id= $this->uri->segment(3);
        	
        	$classes = $this->classes_model->getclasses(1);
        	$branches = $this->branches_model->getbranches(1);
        	$teachers = $this->teachers_model->getteachers();

            $data = array('classes'=>$classes,'branches'=>$branches,"teachers"=>$teachers);
			$this->load->view('admin_services/addteacher',$data);
        }

         public function getteacher()
        {
        	$id= $this->input->post('teacher_id');
        	$role_info=array();
        	if(!empty($id))
        	{
        		$teacher_info = $this->teachers_model->getteacher($id);
        	}
        	$data = array("teacher_info"=>$teacher_info);//,"service_info"=>$service_info
			$this->load->view('admin_services/getteacher',$data);
        }

        public function getteachers()
        {
        	$branch= $this->input->post('branch');
        	$role_info=array();
        	if(!empty($branch))
        	{
        		$teachers = $this->teachers_timings_model->getteachersbybranch($branch);
        	}else
        	{
        		$teachers = $this->teachers_model->getteachers();

        	}
        	$data = array("teachers"=>$teachers);//,"service_info"=>$service_info
			$this->load->view('admin_services/getteachers',$data);
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
			$this->load->view('admin_services/editteacher',$data);
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




				$id = $this->input->post('branch_id');

				$userDetails = array(
								'username' => $mobile,
								'user_type' => 3,
								'created_date'=> date("Y-m-d H:i:s")
								);

				$teacher_id = $this->mastertable_model->save($userDetails);
				
				$userDetails1 = array(
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
								'created_date'=> date("Y-m-d H:i:s")
								);
				
				
            	if(isset($_POST['image']) && $_POST['image'] != '')
			    {
			        $desired_dir = 'uploads/teacher_images/';
			        $base=$_POST['image'];
			        $file_name = strtotime('now');
			        //decoding image
			        $binary=base64_decode($base);
			        header('Content-Type: bitmap; charset=utf-8');
					if(is_dir($desired_dir)==false){
			            mkdir("$desired_dir", 0700);    
			        }
			            $file = fopen($desired_dir.$file_name, 'wb');
			            fwrite($file, $binary);
			            fclose($file);
			            $userDetails1['profile_pic'] = $file_name;
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
            								'in_time'=>$in_time[$key],
            								'out_time'=>$out_time[$key],
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
						redirect('admin_services/viewteachers');
					}else{
						$this->session->set_flashdata('message', 'Teacher added successfully.');
						redirect('admin_services/addteacher');
					}
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin_services/addbranch");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin_services/addbranch");        
        
        	
        }


        public function viewteachers()
        {
        	$views = array('viewteachers');
        	
        	$cat_id ="";
        	
        	if($cat_id!="")
        	{
        		//$classes = $this->classes_model->getservicesbycondition(array('cat_id'=>$cat_id));
        	}
        	else
        	{
        		$teachers = $this->teachers_model->getteachers();
        	}
        	$categories = $this->categories_model->get_categories();
        	$branches = $this->branches_model->getbranches();

            $data = array('views'=>$views,'categories'=>$categories,'branches'=>$branches,'teachers'=>$teachers);//,"service_info"=>$service_info,"teacher_info"=>$teacher_info

        	$this->load->view('admin_services/template/template',$data);
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
				redirect('admin_services/addteacher');
			}else
			{
				redirect("admin_services/addteacher");
			}
			
			redirect("admin_services/addteacher");
        	
        
        }
     
        

        public function updateteacher()
        {
        	
        	$this->form_validation->set_rules('teacher_name','teacher_name','trim|required');
        	//$this->form_validation->set_rules('mobile','mobile','trim|required');


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
								'teacher_id'=>$teacher_id,
								'whatsapp_number' => $whatsapp_number,
								'address' => $address,
								'email' =>$email,
								'location'=>$location,
								'latitude'=>$latitude,
								'longitude'=>$longitude,
								//'created_date'=> date("Y-m-d H:i:s")
								);
				
				if(isset($_POST['image']) && $_POST['image'] != '')
			    {
			        $desired_dir = 'uploads/teacher_images/';
			        $base=$_POST['image'];
			        $file_name = strtotime('now');
			        //decoding image
			        $binary=base64_decode($base);
			        header('Content-Type: bitmap; charset=utf-8');
					if(is_dir($desired_dir)==false){
			            mkdir("$desired_dir", 0700);    
			        }
			            $file = fopen($desired_dir.$file_name, 'wb');
			            fwrite($file, $binary);
			            fclose($file);
			            $userDetails1['profile_pic'] = $file_name;
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
            			$this->teachers_timings_model->delete($teacher_id);
            			$branch_timings = array();
            			foreach ($branch as $key => $value) {
            				$dayz = !empty($days[$key])?implode(",", $days[$key]):"";
            				$users = array("branch_id"=>$value,
            								'days'=>$dayz,
            								'in_time'=>$in_time[$key],
            								'out_time'=>$out_time[$key],
            								'teacher_id'=>$teacher_id
            							);
            				array_push($branch_timings, $users);

            			}
            			$this->teachers_timings_model->save($branch_timings);
            		}
            	
				
				
				if($response)
				{
					
					$this->session->set_flashdata('message', 'Teacher updated successfully.');
					redirect('admin_services/addteacher');
					
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin_services/addteacher");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin_services/addteacher");        
        
        	
        }

        public function addplan()
        {
        	$id= $this->uri->segment(3);
        	$plan_info=array();
        	if(!empty($id))
        	{
        		$plan_info = $this->plans_model->getplan($id);
        	}
        	
        	$classes = $this->classes_model->getclasses(1);
        	$branches = $this->branches_model->getbranches(1);
        	$plans = $this->plans_model->getplans();
        	//print_r($classes);exit();
            $data = array('classes'=>$classes,"plan_info"=>$plan_info,'branches'=>$branches,'plans'=>$plans);//,"service_info"=>$service_info
			$this->load->view('admin_services/addplan',$data);
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

				$id = $this->input->post('id');
				
				$userDetails = array(
								'class_id' => $class_id,
								'branch_id' => $branch_id,
								'one_session' => $one_session,
								'two_session' => $two_session,
								'three_session' => $three_session,
								'four_session' => $four_session,
								'five_session' => $five_session,
								'six_session' => $six_session,
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
						redirect('admin_services/addplan');
					}else{
						$this->session->set_flashdata('message', 'Plan added successfully.');
						redirect('admin_services/addplan');
					}
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin_services/addplan");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin_services/addplan");
        	
        }

        public function addadminrole()
        {
        	$id= $this->uri->segment(3);
        	$role_info=array();
        	if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
        	}
        	//$views = array('addadminrole');
        	$branches = $this->branches_model->getbranches(1);
        	//print_r($classes);exit();
        	$roles = $this->admin_roles_model->getroles();
            $data = array('branches'=>$branches,'roles'=>$roles,"role_info"=>$role_info);//,'classes'=>$classes
			$this->load->view('admin_services/addadminrole',$data);
        }

        public function getadminrole()
        {
        	$id= $this->input->post('role_id');
        	$role_info=array();
        	if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
        	}
        	$data = array("role_info"=>$role_info);//,"service_info"=>$service_info
			$this->load->view('admin_services/getadminrole',$data);
        }

        public function insertadminrole()
        {
        	$this->form_validation->set_rules('name','name','trim|required');
        	$this->form_validation->set_rules('mobile','mobile','trim|required');


			if($this->form_validation->run())
			{

				$name = $this->input->post('name');
				$mobile = $this->input->post('mobile');
				$address = $this->input->post('address');
				//$categories = $this->input->post('categories');
				$branch_id = $this->input->post('branch_id');
				$email = $this->input->post('email');
				$date_of_birth = $this->input->post('date_of_birth');
				//$date_of_bitrth = $this->input->post('date_of_bitrth');
				$branch_id = $this->input->post('branch_id');
				$password = $this->input->post('password');

				/*$location = $this->input->post('geolocation');
				$latitude = $this->input->post('lat');
				$longitude = $this->input->post('lng');*/
				$id= $this->input->post('admin_role_id');

				$userDetails = array(
								'username' => $mobile,
								'user_type' => 4,
								'password' => md5($password),
								'created_date'=> date("Y-m-d H:i:s")
								);

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
								/*'location'=>$location,
								'latitude'=>$latitude,
								'longitude'=>$longitude,*/
								'created_date'=> date("Y-m-d H:i:s")
								);
				
				if(isset($_POST['image']) && $_POST['image'] != '')
			    {
			        $desired_dir = 'uploads/admin_role_images/';
			        $base=$_POST['image'];
			        $file_name = strtotime('now');
			        //decoding image
			        $binary=base64_decode($base);
			        header('Content-Type: bitmap; charset=utf-8');
					if(is_dir($desired_dir)==false){
			            mkdir("$desired_dir", 0700);    
			        }
			            $file = fopen($desired_dir.$file_name, 'wb');
			            fwrite($file, $binary);
			            fclose($file);
			            $userDetails1['profile_pic'] = $file_name;
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
						//redirect('admin_services/viewadminroles');
					}else{
						$this->session->set_flashdata('message', 'Admin Role added successfully.');
						
					}
					redirect('admin_services/addadminrole');
				}else
				{
					redirect("admin_services/addadminrole");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin_services/addadminrole");        
        
        	
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
				$this->session->set_flashdata('message', 'Role status updated successfully.');
				redirect('admin_services/addadminrole');
			}else
			{
				redirect("admin_services/addadminrole");
			}
			
			redirect("admin_services/addadminrole");
        	
        
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

		

        public function addstudent()
        {
        	$id= $this->uri->segment(3);
        	$user_info=array();
        	if(!empty($id))
        	{
        		$user_info = $this->user_family_members_model->getuser($id);
        	}
        	$classes = $this->classes_model->getclasses(1);
        	$branches = $this->branches_model->getbranches(1);
        	$users = $this->users_model->getusers();
        	

        	$data = array('classes'=>$classes,'branches'=>$branches,"user_info"=>$user_info,'users'=>$users); //,'discount_info'=>$discount_info,'classes'=>$classes
			$this->load->view('admin_services/addstudent',$data);
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
				$payment_id = null;
				$name = $this->input->post('name');
				$mobile = $this->input->post('mobile');
				$email = $this->input->post('email');
				$address = $this->input->post('address');
				$age = $this->input->post('age');
				$branch_id = $this->input->post('branch_id');
				$whatsapp_number = $this->input->post('whatsapp_number');
				$organization_name = $this->input->post('organization_name');
				$known_from = $this->input->post('known_from');
				$registration_amount = $this->input->post('registration_amount');
				$other_info = $this->input->post('other_info');
				$reg_type = $this->input->post('reg_type');


				$id= $this->input->post('user_id');

				$known_from =  (!empty($known_from)?implode(",", $known_from):"");

				
				$userDetails1 = array(
								//'name' => $name,
								'age' => $age,
								'branch_id' =>$branch_id,
								'mobile' => $mobile,
								//'user_id'=>$user_id,
								'address' => $address,
								'email' =>$email,
								'registration_amount'=>$registration_amount,
								'whatsapp_number'=>$whatsapp_number,
								/*'location'=>$location,
								'latitude'=>$latitude,
								'longitude'=>$longitude,*/
								'other_info'=>$other_info,
								'created_date'=> date("Y-m-d H:i:s")
								);

            		$response = $this->users_model->save($userDetails1);
            	
						$this->email->subject("Account confirmation mail");
	                    $this->email->from('info@kaushikdhwanee.com', 'Kaushik dhwanee');
	                    $this->email->set_newline("\r\n");
	                    $this->email->to($email);
	                    $data = array(
	                             'username'=>$name,
	                             'message'=>"Your account created successfully"
	                            );
	            		$message1 = $this->load->view('emails/success_message',$data,true);
	                    $this->email->message($message1);
						$this->email->send();
				
					if($response)
					{

						
						$userDetails = array(
							'name' => $name,
							'branch_id'=>$branch_id,
							'user_id'=>$response,
							'registration_amount'=>$registration_amount,
							);

						

						if(isset($_POST['image']) && $_POST['image'] != '')
					    {
					        $desired_dir = 'uploads/user_images/';
					        $base=$_POST['image'];
					        $file_name = strtotime('now');
					        //decoding image
					        $binary=base64_decode($base);
					        header('Content-Type: bitmap; charset=utf-8');
							if(is_dir($desired_dir)==false){
					            mkdir("$desired_dir", 0700);    
					        }
					            $file = fopen($desired_dir.$file_name, 'wb');
					            fwrite($file, $binary);
					            fclose($file);
					            $userDetails['profile_pic'] = $file_name;
					    }

            			$response1 = $this->user_family_members_model->save($userDetails);

            			if($reg_type==1)
	            		{
	            			$userDetails1 = array(
									'member_id'=>$response1,
									'user_id'=>$response,
									 'total_amount'=>$registration_amount,
									 'final_amount'=>$registration_amount,
									 
									   'payment_type'=>1,
									   
									     'created_date'=>date("Y-m-d H:i:s"), 
									);
					
							$payment_id = $this->payments_model->save($userDetails1);

							$users = array('amount'=>$registration_amount,
											
											'payment_id'=>$payment_id
												);
							$response = $this->payments_invoice_model->save(array($users));
								
	            		}

						$result['success']=1;
						$result['user_id']=$response1;

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
				$payment_id = null;
				$name = $this->input->post('name');
				$user_id = $this->input->post('user_id');
				$branch_id = $this->input->post('branch_id');
				$registration_amount = $this->input->post('registration_amount');
				$reg_type = $this->input->post("reg_type");
				$userDetails1 = array(
								'name' => $name,
								'user_id'=>$user_id,
								'branch_id'=>$branch_id,
								'registration_amount'=>$registration_amount
								);

			    if(isset($_POST['image']) && $_POST['image'] != '')
			    {
			        $desired_dir = 'uploads/user_images/';
			        $base=$_POST['image'];
			        $file_name = strtotime('now');
			        //decoding image
			        $binary=base64_decode($base);
			        header('Content-Type: bitmap; charset=utf-8');
					if(is_dir($desired_dir)==false){
			            mkdir("$desired_dir", 0700);    
			        }
			            $file = fopen($desired_dir.$file_name, 'wb');
			            fwrite($file, $binary);
			            fclose($file);
			            $userDetails1['profile_pic'] = $file_name;
			    }

				$response = $this->user_family_members_model->save($userDetails1);
				
				if($reg_type==1)
        		{
        			$userDetails = array(
									'member_id'=>$response,
									'user_id'=>$user_id,
									'total_amount'=>$registration_amount,
									'final_amount'=>$registration_amount,
									
									'payment_type'=>1,
									
									'created_date'=>date("Y-m-d H:i:s")
									);
			
					$payment_id = $this->payments_model->save($userDetails);

					$users = array('amount'=>$registration_amount,
									
									'payment_id'=>$payment_id
								);
					$response = $this->payments_invoice_model->save(array($users));
						
        		}	

				if($response)
				{
					$result['success']=1;
					$result['user_id']=$response;
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
        	if(!empty($id))
        	{
        		//$user_info = $this->users_model->getuser(array('id'=>$id));
        		$user_info = $this->user_family_members_model->getuser($id);
        	}
        	
        	$classes = $this->classes_model->getclasses(1);
        	$plans = $this->plans_model->getplans(1);
        	$discount_info =$this->discounts_model->getdiscount();
        	//print_r($classes);exit();
            $data = array('classes'=>$classes,'plans'=>$plans,"user_info"=>$user_info,'discount_info'=>$discount_info,'user_id'=>$id,'registration_amount'=>$user_info['registration_amount']);//,'classes'=>$classes
			$this->load->view('admin_services/addenrollstudent',$data);
        } 

         public function addenroll()
        {
        	$id= $this->uri->segment(3);
        	$user_info=array();
        	if(!empty($id))
        	{
        		$user_info = $this->user_family_members_model->getuser($id);
        	}
        	$classes = $this->classes_model->getclasses(1);
        	$discount_info =$this->discounts_model->getdiscount();
            $data = array('classes'=>$classes,"user_info"=>$user_info,'discount_info'=>$discount_info,'user_id'=>$id,'registration_amount'=>null);//,'classes'=>$classes, 'plans'=>$plans,
			$this->load->view('admin_services/addenrollstudent',$data);
        } 


        public function insertenrollstudent()
        {


        	$this->form_validation->set_rules('class_id','class_id','trim|required');
        	
        	if($this->form_validation->run())
			{
				$user_id = $this->input->post('user_id');
				$member_id = $this->input->post('member_id');

				$class_id = $this->input->post('class_id');
				$plan_id = $this->input->post('plan_id');
				$resp = @explode("|", $plan_id);
				$sessions_per_week = @$resp[0];
				$price_per_month = @$resp[1];

				$sibling_discount = $this->input->post('sibling_discount');

				$start_date = date("Y-m-d",strtotime($this->input->post('start_date')));
				$current_month_amount = $this->input->post('current_month_amount');
				$next_plan = $this->input->post('next_plan');
				$resp1 = @explode("|", $next_plan);
				$next_month_duration = @$resp1[0];
				$discount = @$resp1[1];

				$registration_amount = $this->input->post('registration_amount');
				$next_month_amount = $this->input->post('next_month_amount');
				


				$total_amount = $this->input->post('total_amount');
				$final_amount = $this->input->post('final_amount');
				$admin_discount = $this->input->post('admin_discount');

				$selected_days = $this->input->post('selected_days');
				$selected_batches = $this->input->post('selected_batches');
				$discount_type = $this->input->post('discount_type');

				
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
						$userDetailsz = array(
									'user_id'=>$user_id,
									'member_id'=>$member_id,
									 'total_amount'=>$total_amount,
									 'final_amount'=>$final_amount,
									  'admin_discount'=>$admin_discount,
									   'payment_type'=>1,
									   'discount_type'=> $discount_type,
									    'created_date'=>date("Y-m-d H:i:s"), 
									);
				
						$payment_id = $this->payments_model->save($userDetailsz);


						if(!empty($registration_amount)){
									$usersz = array("enroll_student_id"=>$enroll_student_id,
													'amount'=>$registration_amount,
													//'user_id'=>$user_id,
													'payment_id'=>$payment_id
												);

									$response = $this->payments_invoice_model->save(array($usersz));
								}

						/*saving in payments table end*/

						$invoices = array();
						$payment_invoice = array();
						$userdtailsx = array(
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
						$invoice_id = $this->invoice_model->save($userdtailsx);
						/*
						$invoice_id = $this->invoice_model->save($invoices);*/
						$usersx = array("enroll_student_id"=>$enroll_student_id,
												'amount'=>$current_month_amount,
												'invoice_id'=>$invoice_id,
												'payment_id'=>$payment_id
											);
						//array_push($payment_invoice, $usersx);
						$response = $this->payments_invoice_model->save(array($usersx));


						if(!empty($next_plan)){


							$amount = $next_month_amount/$next_month_duration;

							for ($i=1; $i <=$next_month_duration ; $i++) { 
								
								$userdtails1 = array(
											'enroll_student_id' => $enroll_student_id,
											'amount' => $amount,
											'sibling_discount' => $sibling_discount,
											'final_amount' => $amount,
											'invoice_month' => date("m", strtotime($start_date."+".$i." month")),
											'invoice_year' => date("Y",strtotime($start_date."+".$i." month")),
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

						
						$user_info = $this->users_model->getuserinfo($user_id);
					
						if(!empty($user_info['mobile']))
						{
							
							//$this->sms->sendsms($user_info['mobile'],$message);
						}
						
						if(!empty($user_info['device_id']))
			        	{
			        		$responsez1 =  $this->notifications->send_ios_notification(array($user_info['device_id']),$message1);
			       		}
			       		if(!empty($user_info['gcm_id']))
			       		{
			        		$responsez = $this->notifications->send_notification(array($user_info['gcm_id']),$message1);
			        	}


						$this->session->set_flashdata('message', 'student enroll added successfully.');
						redirect('admin_services/addstudent');
				}else
				{
					redirect("admin_services/addstudent");
				}
					
				
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin_services/addstudent");
        	/*$views = array('addcategory');
            $data = array('views'=>$views);
			$this->load->view('admin/template/template',$data);*/
        
        
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

        public function getplan()
        {

        	$result = array();
        	$sibling_discount = 0;
        	$sessions_per_week = $this->input->post('sessions_per_week');
        	$class_id = $this->input->post('class_id');
        	$branch_id = $this->input->post('branch_id');
        	$user_id =$this->input->post('user_id');
        	$plan = $this->plans_model->getplan($class_id,$branch_id);
        	$days = $this->batches_model->getweekdays($class_id,$branch_id);
			$discount_info =$this->discounts_model->getdiscount($branch_id);

        	if($sessions_per_week==2 || $sessions_per_week==3)
        	{
        		$enrolls = $this->enroll_students_model->getenrolls($user_id, 1);
        		if(!empty($enrolls))
        		{
        			$sibling_discount = $discount_info['sibling_discount'];
        		}
        	}
        	else if($sessions_per_week==4 || $sessions_per_week==5 || $sessions_per_week==6)
        	{
        		$sibling_discount = $discount_info['sibling_discount'];
        	}
        	$week_days = array_unique(array_column($days,"type"));
        	

        	if(!empty($week_days))
        	{
        		$result['weekdays'] = $this->load->view("admin_services/weekdays",array('sessions_per_week'=>$sessions_per_week,'weekdays'=>$week_days),true);
	        	//$result['plan'] = $plan;
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
        	$id= $this->uri->segment(3);
        	$role_info=array();
        	/*if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
        	}*/
        	$views = array('viewstudents');
        	$users = $this->users_model->getusers();
        	//print_r($classes);exit();
            $data = array('views'=>$views,'users'=>$users,"role_info"=>$role_info);//,'classes'=>$classes
			$this->load->view('admin_services/template/template',$data);
        } 

        public function getstudent()
        {
        	$member_id = $this->input->post('member_id');
        	$student = $this->user_family_members_model->getuser($member_id);
        	$data = array('student'=>$student);
			$this->load->view('admin_services/getstudent',$data);
        }

        public function creatediscounts()
        {
        	
        	$discount_info = array();
        	
        	//$discount_info = $this->discounts_model->getdiscount();
        	
        	$views = array('creatediscounts');
        	$branches = $this->branches_model->getbranches(1);
        	$data = array('views'=>$views,'branches'=>$branches,"discount_info"=>$discount_info);//,'classes'=>$classes
			$this->load->view('admin_services/template/template',$data);
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
						redirect('admin_services/addpromotions');
					}else{
						$this->session->set_flashdata('message', 'Discount added successfully.');
						redirect('admin_services/addpromotions');
					}
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin_services/addpromotions");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin_services/addpromotions");
        
        
        }

         public function getpromotionaloffer()
        {
        	$id= $this->input->post('id');
        	$result=array();
        	if(!empty($id))
        	{
        		$result = $this->promotional_offers_model->get_promotion($id);
        	}
        	
			$data = array('result'=>$result);
			$this->load->view('admin_services/getpromotionaloffer',$data);
        }

        public function insertpromotion()
        {


        	$this->form_validation->set_rules('branch_id','branch_id','trim|required');
        	
        	if($this->form_validation->run())
			{
				$branch_id = $this->input->post('branch_id');
				$promo_code = $this->input->post('promocode');
				$amount = $this->input->post('amount');
				$start_date = date("Y-m-d",strtotime($this->input->post('start_date')));
				$end_date = date("Y-m-d",strtotime($this->input->post('end_date')));
				$id= $this->input->post('id');
				
				//$promotion = $this->promotional_offers_model->get_promotionbybranch($branch_id);
				
				$userDetails = array(
								'branch_id' => $branch_id,
								'promocode' => $promo_code,
								'amount' => $amount,
								'start_date'=>$start_date,
								'end_date'=>$end_date
								);
				
				if(!empty($id))
            	{
					$response = $this->promotional_offers_model->update($userDetails,$id);
					
            	}else
            	{
            		$response = $this->promotional_offers_model->save($userDetails);
            	}
				
				
				if($response)
				{
					if(!empty($id)){
						$this->session->set_flashdata('message', 'Promotion updated successfully.');
						redirect('admin_services/addpromotions');
					}else{
						$this->session->set_flashdata('message', 'Promotion added successfully.');
						redirect('admin_services/addpromotions');
					}
					//$this->session->set_flashdata('message', 'Category added successfully.');
					
				}else
				{
					redirect("admin_services/addpromotions");
				}
			}else
			{
				redirect("admin_services/addpromotions");
			}
			
        
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
				redirect('admin_services/addpromotions');
			}else
			{
				redirect("admin_services/addpromotions");
			}
			
			redirect("admin_services/addpromotions");
        	
        
        }

        public function viewreceipt()
        {
        	$id= $this->uri->segment(3);
        	$role_info=array();
        	if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
        	}
        	$views = array('viewreceipt');
        	$branches = $this->branches_model->getbranches(1);
        	//print_r($classes);exit();
            $data = array('views'=>$views,'branches'=>$branches,"role_info"=>$role_info);//,'classes'=>$classes
			$this->load->view('admin_services/template/template',$data);
        }
         public function collectfees()
        {
        	$id= $this->uri->segment(3);
        	$role_info=array();
        	if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
        	}
        	$users = $this->users_model->getusers(1);
        	
        	$data = array('users'=>$users,"role_info"=>$role_info);
			$this->load->view('admin_services/collectfees',$data);
        }

         public function getreceipts()
        {
        	$id = $this->input->post('id');
        	$results = $this->payments_model->getpayments(array('user_id'=>$id));
        	$data = array('results'=>$results);//,'classes'=>$classes
			$this->load->view('admin_services/getreceipts',$data);
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

			$invoice = $this->invoice_model->getinvoicebyusers($user_id);

			$this->load->view("admin_services/getstudentbatches", array('invoice'=>$invoice, 'user_id'=>$user_id));

        }

        public function insertpayments()
        {
        	
        	$this->form_validation->set_rules('final_amount','final_amount','trim|required');

			if($this->form_validation->run())
			{

				$payable_amount = $this->input->post('payable_amount');
				$invoice = $this->input->post('invoice');
				$admin_discount = $this->input->post('admin_discount');

				$comments = $this->input->post('comments');
				$user_id = $this->input->post('user_id');
				$email = $this->input->post('email');
				$final_amount = $this->input->post('final_amount');
				//$member_id = $this->input->post('member_id');

				$total_amount = $this->input->post('total_amount');
				$payment_type = $this->input->post('payment_type');
				$enroll_student_id = $this->input->post('enroll_student_id');

				//$userinfo = $this->enroll_students_model->getenroll($enroll_student_id);
			
				
				$userDetails = array(
								'user_id'=>$user_id,
								//'member_id'=>$member_id,
								 'total_amount'=>$total_amount,
								 'final_amount'=>$final_amount,
								  'admin_discount'=>$admin_discount,
								   'payment_type'=>$payment_type,
								    'comments'=>$comments,
								    'discount_type'=> (!empty($admin_discount)?"1":null),
								     'created_date'=>date("Y-m-d H:i:s"), 
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
				}

				$user_info = $this->users_model->getuserinfo($user_id);
				$email = $user_info['email'];
                $this->email->subject("Payment Information");
                $this->email->from('info@kaushikdhwanee.com', 'Kaushik dhwanee');
                $this->email->set_newline("\r\n");
                $this->email->to($email);
                $data = array(
                         'username'=>$user_info['name'],
                         'message'=>"Payment made successfully",
                         'receipt'=>base_url("index/printreceipt/".$payment_id)
                        );
        		$message1 = $this->load->view('emails/success_message',$data,true);
                $this->email->message($message1);
				$this->email->send();
            	
				if($response)
				{

					$this->session->set_flashdata('message', 'Payment made successfully.');
					redirect('admin_services/collectfees');
					
				}else
				{
					redirect("admin_services/collectfees");
				}
			}else
			{
				echo validation_errors();exit;
			}
			redirect("admin_services/collectfees");        
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
			//$this->load->view('admin_services/template/template',$data);
			echo json_encode($users);
        
        }

        public function batches()
        {
        	
        	$classes = $this->classes_model->getclasses();
        	$branches = $this->branches_model->getbranches();
        	$teachers = $this->teachers_model->getteachers();

            $data = array('classes'=>$classes,'branches'=>$branches,"teachers"=>$teachers);//,"service_info"=>$service_info
			$this->load->view('admin_services/batches',$data);
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
            $data = array('teachers'=>$teachers,'class_id'=>$class_id,'branch_id'=>$branch_id,'batch_id'=>$batch_id);//,"service_info"=>$service_info
			$this->load->view('admin_services/getbatches',$data);//
        }

         public function addpromotions()
        {
        	$branches = $this->branches_model->getbranches(1);
        	$promotions = $this->promotional_offers_model->get_promotions();
        	$data = array('branches'=>$branches,"promotions"=>$promotions);
			$this->load->view('admin_services/addpromotions',$data);
        }

        public function editpromotion()
        {
        	$branches = $this->branches_model->getbranches(1);
        	//$promotions = $this->promotional_offers_model->get_promotions();
        	$id= $this->uri->segment(3);
        	$promotion=array();
        	if(!empty($id))
        	{
        		$promotion = $this->promotional_offers_model->get_promotion($id);
        	}
        	$data = array('branches'=>$branches,"promotion"=>$promotion);
			$this->load->view('admin_services/editpromotion',$data);
        }

  		public function adddemoclass()
        {
        	
        	$demos = $this->demo_classes_model->getdemos();
        	$data = array('demos'=>$demos);
			$this->load->view('admin_services/adddemoclass',$data);
        }

        public function getdemoclass()
        {

        	 $user_id = $this->input->post('user_id');
    		$user = $this->demo_classes_model->getdemo($user_id);
    		
        	$data = array('user'=>$user);
			$this->load->view('admin_services/getdemoclass',$data);
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

				redirect('admin_services/adddemoclass');
			}else
			{
				redirect("admin_services/adddemoclass");
			}
			
			redirect("admin_services/adddemoclass");
        	
        
        }


        public function getclasses()
        {
        	$id= $this->input->post("main_category");
        	$classes = $this->classes_model->getclasses($id);
        	$result['classes'] = $classes; 
        	echo json_encode($result);
        				
        }

        public function insertbatch()
        {
        	$batch_info = array();

        	$branch_id = $this->input->post('branch_id');
        	$class_id = $this->input->post('class_id');
        	$start_time = $this->input->post('start_time');
        	$end_time = $this->input->post('end_time');
        	$teachers = $this->input->post('teachers');
        	$type = $this->input->post("type");
        	//$batch_id = $this->input->post('batch_id');
        	//$result = $this->batches_model->
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
        	$userDetails = array('start_time'=> date("H:i:s", strtotime($start_time)),
        						 'end_time' => date("H:i:s", strtotime($end_time)),
        						 'batch_id' => $batch_id,
        						 'type' => $type
        						);

        	$batch_class_id = $this->batch_classes_model->save($userDetails);

        	$batch_teachers = array();
        	if(!empty($teachers))
        	{
				foreach ($teachers as $key => $value) {

					$users = array("batch_id"=>$batch_id,
									'batch_class_id'=>$batch_class_id,
									'teacher_id'=>$value
								);
					array_push($batch_teachers, $users);

				}

	           $response = $this->batch_class_teachers_model->save($batch_teachers);        		
        	}

           	if($response)
			{

				$this->session->set_flashdata('message', 'Batch Created successfully...');
				redirect('admin_services/batches');
				
			}else
			{
				redirect("admin_services/batches");
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

        	$this->batch_classes_model->save($userDetails);

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

        public function getbatchclasses()
        {

			$days = array(
						"1"=>'Monday',
					    "2"=>'Tuesday',
					    "3"=>'Wednesday',
					    "4"=>'Thursday',
					    "5"=>'Friday',
					    "6"=>'Saturday',
					    "7"=>'Sunday'
					);


        	$branch_id = $this->input->post('branch_id');
        	$class_id = $this->input->post('class_id');

        	$batch_info = $this->batches_model->getbatch($branch_id,$class_id);
        	if(!empty($batch_info))
        	{
        		
        		$batch_id = $batch_info['id'];
        	
        		$day_type= $this->input->post('day_type');

        		foreach ($days as $key => $value) 
        		{
        			$data[$key] = $this->batch_classes_model->get_classes_by_day($batch_id, $key);
        		}
        		$classes = $data;
        		

			}else{
				$classes = array();
			}
        	//echo $this->db->last_query();
        	$this->load->view("admin_services/getbatchclasses",array('classes'=>$classes));

        }

        public function getbatchclassesbyweekday()
        {
        	$day_type = $this->input->post('weekday');
        	$class_id = $this->input->post('class_id');
        	$branch_id = $this->input->post('branch_id');
        	$date1 = $this->input->post('start_date');
        	$selected_days = $this->input->post('selected_days');
        	$month = date("m",strtotime($date1));
			 $date2 = date("y-".$month."-t");
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
        	
        	$this->load->view("admin_services/editbatchclass",array('class_info'=>$class_info,"teachers"=>$teachers));

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
				redirect('admin_services/viewteachers');*/
			}else
			{
				echo 2;
				//redirect("admin_services/viewteachers");
			}
			
			//redirect("admin_services/viewteachers");
        	
        
        }

        public function searchteacherschedule()
        {
        	$views = array('searchteacherschedule');
        	$branches = $this->branches_model->getbranches();
        	$teachers = $this->teachers_model->getteachers();


            $data = array('views'=>$views,'teachers'=>$teachers,'branches'=>$branches); 
			$this->load->view('admin_services/template/template',$data);
        }

        public function getteacherclasses()
        {
        	$days = array(
						"1"=>'Monday',
					    "2"=>'Tuesday',
					    "3"=>'Wednesday',
					    "4"=>'Thursday',
					    "5"=>'Friday',
					    "6"=>'Saturday',
					    "7"=>'Sunday'
					);

        	//$day_type= $this->input->post('day_type');
        	$teacher_id= $this->uri->segment(3);
        	//$branch_id= $this->input->post('branch_id');
        	foreach ($days as $key => $value) {
        		
        		$data[$key] = $this->batch_class_teachers_model->getclassesbyteacher($teacher_id, $key);//$branch_id,

			}
			$classes = $data;

        	$this->load->view("admin_services/getteacherclasses",array('classes'=>$classes));

        }

        public function logout()
		{
			$this->session->sess_destroy();
			redirect('admin_services/index');
		}

		

}
	