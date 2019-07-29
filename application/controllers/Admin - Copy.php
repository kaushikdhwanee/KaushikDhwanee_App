<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	
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







			$user_type = $this->session->userdata('user_type');

			$request_method = $this->router->fetch_method();

            $allowed = array(
                    'index',
                    'logincheck',
                    'login_service',
                    'getteacherclasses'
                  );
			
			if( $user_type != null && ($user_type == 1 || $user_type == 4))
            {
              
            }
            else if(!in_array($request_method, $allowed))
            {
              redirect('admin/index');
            }
			
		}

        public function index()
        {
        	//echo "hiiiiiiii";exit;
			$this->load->view('admin/index');  
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
				//print_r($userDetails);exit;
				
				if(!empty($userDetails))
				{
					//echo "hiiiiiiiii";
					$this->session->set_userdata($userDetails);	
					$this->session->set_userdata('user_type',1);
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
					$this->session->set_userdata('user_type',1);
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
        	/*$views = array('addcategory');
            $data = array('views'=>$views);
			$this->load->view('admin/template/template',$data);*/
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
				

				$id = $this->input->post('id');
				
				$userDetails = array(
								'cat_id' => $cat_id,
								'class_name' => $class_name,
								'created_date'=> date("Y-m-d H:i:s")
								);
				
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/class_images/';
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
				
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/teacher_images/';
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
            								'days'=>implode(",", $days[$key]),
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
								'date_of_joining' => $date_of_joining,
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
				
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/teacher_images/';
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

            				$users = array("branch_id"=>$value,
            								'days'=>implode(",", $days[$key]),
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

        /*public function viewplans()
        {
        	$views = array('viewplans');
        	
        	$plans = $this->plans_model->getplans();//
        	
        	
        	$data = array('views'=>$views, 'plans'=>$plans);
			$this->load->view('admin/template/template',$data);
        }

        public function updateplanstatus()
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

				$name = $this->input->post('name');
				$mobile = $this->input->post('mobile');
				$address = $this->input->post('address');
				$branch_id = $this->input->post('branch_id');
				$email = $this->input->post('email');
				$date_of_birth = $this->input->post('date_of_birth');
				$branch_id = $this->input->post('branch_id');
				$password = $this->input->post('password');
				$id= $this->input->post('admin_role_id');


				$userDetails = array(
								'username' => $mobile,
								'user_type' => 4,
								'created_date'=> date("Y-m-d H:i:s")
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
								/*'location'=>$location,
								'latitude'=>$latitude,
								'longitude'=>$longitude,*/
								'created_date'=> date("Y-m-d H:i:s")
								);
				
				if(!empty($_FILES['image']['name']))
				{

					$config['upload_path']          = 'uploads/admin_role_images/';
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
        	$role_info=array();
        	if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
        	}
        	$views = array('addpromotions');
        	$branches = $this->branches_model->getbranches(1);
        	//print_r($classes);exit();
            $data = array('views'=>$views,'branches'=>$branches,"role_info"=>$role_info);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        } 

         public function addstudent()
        {
        	$id= $this->uri->segment(3);
        	$role_info=array();
        	if(!empty($id))
        	{
        		$role_info = $this->admin_roles_model->getrole($id);
        	}
        	$views = array('addstudent');
        	$classes = $this->classes_model->getclasses(1);
        	$branches = $this->branches_model->getbranches(1);
        	$users = $this->users_model->getusers();
        	$data = array('views'=>$views,'classes'=>$classes,'branches'=>$branches,"role_info"=>$role_info,'users'=>$users); //,'classes'=>$classes
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
        	/*echo "<pre>";
        	print_r($_FILES);
        	print_r($_POST);exit;*/
        	$this->form_validation->set_rules('name','name','trim|required');
        	$this->form_validation->set_rules('mobile','mobile','trim|required');


			if($this->form_validation->run())
			{

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


				/*$location = $this->input->post('geolocation');
				$latitude = $this->input->post('lat');
				$longitude = $this->input->post('lng');*/
				$id= $this->input->post('user_id');

				$known_from =  (!empty($known_from)?implode(",", $known_from):"");

				/*$userDetails = array(
								'username' => $mobile,
								'user_type' => 2,
								
								'created_date'=> date("Y-m-d H:i:s")
								);//'password' => md5($password),

					$user_id = $this->mastertable_model->save($userDetails);*/
				
				
				
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
								'created_date'=> date("Y-m-d H:i:s")
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
	                $userDetails['profile_pic'] = $config['file_name'];
            	}
            	/*if(!empty($id))
            	{
            		//print_r($_POST);exit;
					$response = $this->users_model->update($userDetails1,$id);
					
            	}else
            	{*/

            		$response = $this->users_model->save($userDetails1);
            	/*}*/
				
				
					if($response)
					{

						$userDetails = array(
								'name' => $name,
								'user_id'=>$response,
								);

            		$response1 = $this->user_family_members_model->save($userDetails);

						//echo "1";
						$result['success']=1;
						$result['user_id']=$response;

						echo json_encode($result);
						/*if(!empty($id)){
							
							/*$this->session->set_flashdata('message', 'User updated successfully.');
							redirect('admin/viewadminroles');*/
					}else
					{
						/*$this->session->set_flashdata('message', 'User added successfully.');
						redirect('admin/addadminrole');*/
						$result['success']=2;
						//$result['user_id']=$user_id;

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
        	/*echo "<pre>";
        	print_r($_FILES);
        	print_r($_POST);exit;*/
        	$this->form_validation->set_rules('name','name','trim|required');
        	//$this->form_validation->set_rules('mobile','mobile','trim|required');


			if($this->form_validation->run())
			{

				$name = $this->input->post('name');
				$user_id = $this->input->post('user_id');
				
				$userDetails1 = array(
								'name' => $name,
								'user_id'=>$user_id,
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

            		$response = $this->user_family_members_model->save($userDetails1);
				
					if($response)
					{
							$this->session->set_flashdata('message', 'Family member added successfully.');
							redirect('admin/addstudent');
					}else
					{
						$this->session->set_flashdata('message', 'Family member adding error.');
						redirect('admin/addstudent');
					}
					
				}else
				{
					echo validation_errors();exit;
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
        	$views = array('addenrollstudent');
        	$classes = $this->classes_model->getclasses(1);
        	$plans = $this->plans_model->getplans(1);
        	$discount_info =$this->discounts_model->getdiscount();
        	//print_r($classes);exit();
            $data = array('views'=>$views,'classes'=>$classes,'plans'=>$plans,"user_info"=>$user_info,'discount_info'=>$discount_info,'user_id'=>$id,'registration_amount'=>$user_info['registration_amount']);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        } 

        public function addenroll()
        {
        	$id= $this->uri->segment(3);
        	$user_info=array();
        	if(!empty($id))
        	{
        		$user_info = $this->user_family_members_model->getuser($id);
        	}
        	$views = array('addenrollstudent');
        	$classes = $this->classes_model->getclasses(1);
        	$plans = $this->plans_model->getplans(1);
        	$discount_info =$this->discounts_model->getdiscount();
        	//print_r($classes);exit();
            $data = array('views'=>$views,'classes'=>$classes,'plans'=>$plans,"user_info"=>$user_info,'discount_info'=>$discount_info,'user_id'=>$id,'registration_amount'=>null);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
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
								'created_date' => date('Y-m-d H:i:s')
								);
				
				
            	$enroll_student_id = $this->enroll_students_model->save($userDetails);
            	
				if($enroll_student_id)
				{
					/*saving in payments table start*/
					$userDetails = array(
								'member_id'=>$member_id,
								 'total_amount'=>$total_amount,
								 'final_amount'=>$final_amount,
								  'admin_discount'=>$admin_discount,
								   'payment_type'=>1,
								   // 'comments'=>"",
								     'created_date'=>date("Y-m-d H:i:s"), 
								);
				
						$payment_id = $this->payments_model->save($userDetails);

						/*saving in payments table end*/

					if(!empty($enroll_student_id)){
						$total_batches =array();
						foreach ($selected_days as $key => $value) {
							$userdata = array(
											'enroll_student_id'=>$enroll_student_id,
											//'type'=>$value,
											'batch_class_id'=>$selected_batches[$key]
								);

							array_push($total_batches, $userdata);
						}

						$resss = $this->enroll_students_batches_model->save($total_batches);

						$invoices = array();
						$payment_invoice = array();
						$userdtails = array(
										'enroll_student_id' => $enroll_student_id,
										'amount' => $current_month_amount,
										'sibling_discount' => $sibling_discount,
										'final_amount' => $current_month_amount,
										'invoice_month' => date("m"),
										'invoice_year' => date("Y"),
										'price_per_month' => $price_per_month,
										'created_date' => date('Y-m-d H:i:s'),
										'paid_status' => 2
										);
						array_push($invoices, $userdtails);

						/*
						$invoice_id = $this->invoice_model->save($invoices);
						$usersx = array("enroll_student_id"=>$enroll_student_id,
												'amount'=>$current_month_amount,
												'invoice_id'=>$invoice_id,
												'payment_id'=>$payment_id
											);
						array_push($payment_invoice, $usersx);*/

						
							$amount = $next_month_amount/$next_month_duration;

						for ($i=1; $i <=$next_month_duration ; $i++) { 
							
							$userdtails1 = array(
										'enroll_student_id' => $enroll_student_id,
										'amount' => $amount,
										'sibling_discount' => $sibling_discount,
										'final_amount' => $amount,
										'invoice_month' => date("m", strtotime("+".$i." month")),
										'invoice_year' => date("Y"),
										'price_per_month' => $price_per_month,
										'created_date' => date('Y-m-d H:i:s'),
										'paid_status' => 2
										);



							array_push($invoices, $userdtails1);

							/*$invoice_id =$this->invoice_model->save($invoices);

							$usersz = array("enroll_student_id"=>$enroll_student_id,
												'amount'=>$amount,
												'invoice_id'=>$invoice_id,
												'payment_id'=>$payment_id
											);

							$response = $this->payments_invoice_model->save(array($usersz));*/


						}

						$this->invoice_model->save_batch($invoices);

						

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
					}
					
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

        public function generateinvoice()
        {
        	
        	function getculumnname($name)
        	{
        		switch ($name) {
        					case '1':
        						return "one_session";
        						break;

        					case '2':
        						return "two_session";
        						break;

        					case '3':
        						return "three_session";
        						break;	
        					
        					case '4':
        						return "four_session";
        						break;

        					case '5':
        						return "five_session";
        						break;

        					case '6':
        						return "six_session";
        						break;
        					
        				}		
        	}

        	$current_month = date("m");
        	$current_year = date("Y");
        	
        	$enroll_students = $this->enroll_students_model->getenrollsbyactiveusers($current_month,$current_year);
        	//echo $this->db->last_query();
        	echo("<pre>");
			print_r($enroll_students);
			$sibling_discount = 0;
			$invoices = array();
			foreach ($enroll_students as $key => $student_info) {

				//$active_user = $this->enroll_students_model->getenrolls($student_info['user_id'],1);

				$discount_info =$this->discounts_model->getdiscount($student_info['branch_id']);
				$sessions_per_week = $student_info['sessions_per_week'];

	        	if($sessions_per_week==2 || $sessions_per_week==3)
	        	{
	        		$enrolls = $this->enroll_students_model->getenrolls($student_info['user_id'], 1);
	        		if(!empty($enrolls))
	        		{
	        			$sibling_discount = $discount_info['sibling_discount'];
	        		}
	        	}
	        	else if($sessions_per_week==4 || $sessions_per_week==5 || $sessions_per_week==6)
	        	{
	        		$sibling_discount = $discount_info['sibling_discount'];
	        	}
	        	//getculumnname($sessions_per_week);

	        	$plan_info = $this->plans_model->getplan($student_info['branch_id'],$student_info['class_id']);

	        	$price_per_month = $plan_info[getculumnname($sessions_per_week)];

	        	$discount = $price_per_month*$sibling_discount/100;

	        	$amount = $price_per_month-$discount;

	        	$userdtails1 = array(
										'enroll_student_id' => $student_info['id'],
										'amount' => $amount,
										'sibling_discount' => $sibling_discount,
										'final_amount' => $amount,
										'invoice_month' => $current_month,
										'invoice_year' => $current_year,
										'price_per_month' => $price_per_month,
										'created_date' => date('Y-m-d H:i:s'),
										'inserted_through'=>2
									);

							array_push($invoices, $userdtails1);


			}
			//print_r($invoices);
			
			$this->invoice_model->save_batch($invoices);
        	//exit;/**/
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
        		$result['weekdays'] = $this->load->view("admin/weekdays",array('sessions_per_week'=>$sessions_per_week,'weekdays'=>$week_days),true);
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
			$this->load->view('admin/template/template',$data);
        } 

        public function creatediscounts()
        {
        	
        	$discount_info = array();
        	
        	//$discount_info = $this->discounts_model->getdiscount();
        	
        	$views = array('creatediscounts');
        	$branches = $this->branches_model->getbranches(1);
        	$data = array('views'=>$views,'branches'=>$branches,"discount_info"=>$discount_info);//,'classes'=>$classes
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
        	$users = $this->users_model->getusersonly(1);
        	$views = array('viewreceipt');
        	$branches = $this->branches_model->getbranches(1);
        	//print_r($classes);exit();
            $data = array('views'=>$views,'users'=>$users,'branches'=>$branches,"role_info"=>$role_info);//,'classes'=>$classes
			$this->load->view('admin/template/template',$data);
        }
         public function collectfees()
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
        	
        	$member_id = $this->input->post('member_id');
        	$monthyear = $this->input->post('month');

        	$resp = explode("-", $monthyear);

        	$month = $resp[0];

        	$year = $resp[1];

        	
        	$batches =$this->enroll_students_model->getenrollsbymember($member_id,$month,$year);
        	//echo $this->db->last_query();
        	
        	foreach ($batches as $batch_info) {
        	
        	$batch_classes[$batch_info['id']] = $this->enroll_students_batches_model->getbatchclasses($batch_info['id']);
			
			}
			

			$this->load->view("admin/getstudentbatches",array('batches'=>$batches,'batch_classes'=>$batch_classes,'member_id'=>$member_id));

        }


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

				$comments = $this->input->post('comments');
				$email = $this->input->post('email');
				$final_amount = $this->input->post('final_amount');
				$member_id = $this->input->post('member_id');

				$total_amount = $this->input->post('total_amount');
				$payment_type = $this->input->post('payment_type');
				$enroll_student_id = $this->input->post('enroll_student_id');


			
				
				$userDetails = array(
								'member_id'=>$member_id,
								 'total_amount'=>$total_amount,
								 'final_amount'=>$final_amount,
								  'admin_discount'=>$admin_discount,
								   'payment_type'=>$payment_type,
								    'comments'=>$comments,
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
            	
				if($response)
				{

					$this->session->set_flashdata('message', 'Payment made successfully.');
					redirect('admin/collectfees');
					
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
			$this->load->view('admin/getbatches',$data);//
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
        	$day_type= $this->input->post('day_type');
        	$batch_id= $this->input->post('batch_id');
        	$classes = $this->batch_classes_model->get_classes_by_day($batch_id, $day_type);

        	//echo $this->db->last_query();
        	$this->load->view("admin/getbatchclasses",array('classes'=>$classes));

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
        	$branches = $this->branches_model->getbranches();
        	$teachers = $this->teachers_model->getteachers();


            $data = array('views'=>$views,'teachers'=>$teachers,'branches'=>$branches); 
			$this->load->view('admin/template/template',$data);
        }

        public function getteacherclasses()
        {
        	
        	$day_type= $this->input->post('day_type');
        	$teacher_id= $this->input->post('teacher_id');
        	$branch_id= $this->input->post('branch_id');

        	$classes = $this->batch_class_teachers_model->getclasses($branch_id,$teacher_id, $day_type);
        	//echo $this->db->last_query();exit;
        	$this->load->view("admin/getteacherclasses",array('classes'=>$classes));

        }

        public function logout()
		{
			$this->session->sess_destroy();
			redirect('admin/index');
		}

		

}
	