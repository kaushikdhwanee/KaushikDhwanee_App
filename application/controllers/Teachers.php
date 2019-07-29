<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//defined('BASEPATH') OR exit('No direct script access allowed');
class Teachers extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			
			$this->load->model("mastertable_model");
			$this->load->model("teachers_model");
			$this->load->model("teachers_timings_model");
			$this->load->model("teachers_categories_model");
			$this->load->model("teachers_classes_model");
			$this->load->model("batches_model");
			$this->load->model("batch_classes_model");
			$this->load->model("batch_class_teachers_model");
			$this->load->model("enroll_students_batches_model");
			$this->load->model("attendence_model");
			$this->load->model("attendence_list_model");
			$this->load->model("users_model");
			$this->load->model("enroll_students_model");
			$this->load->library("sms");
			
		}


        public function teacherlogin_service()
        {
        	$parameters = array("mobile","gcm_id");
 			$_POST = json_decode ( file_get_contents ( "php://input" ),true );
 			$this->form_validation->set_rules('mobile','Mobile','trim|required');
 			$this->form_validation->set_rules('gcm_id','gcm','trim|required');
 			
 			if($this->form_validation->run())
 			{
 				$mobile = $this->input->post('mobile');
 				$gcm_id = @$this->input->post('gcm_id');
 				
				$user = $this->mastertable_model->checkuserbytype($mobile,3,1);
				if(!empty($user))
				{
					$otp = rand(1000,9999);
 					$message = "kaushik dhwanee otp has $otp";
 					$response = $this->sms->sendsms($mobile,$message);
					$result = $this->teachers_model->getteacher($user['id']);
					
					$userDetails = array('gcm_id'=>$gcm_id);
					$this->teachers_model->update($userDetails,$user['id']);
					
					$result['profile_pic']=(!empty($result['profile_pic'])?base_url('uploads/teacher_images/'.$result['profile_pic']):base_url('assets/admin/images/user.jpg')); 					
					$result['otp']=$otp;
					$result['success'] ="1";
					echo json_encode($result);
					
				}
				else
				{
					$result['success'] ="4";
					echo json_encode($result);
				}
 					
 			}
 			else
			{
				$result['success'] ="2";
				echo json_encode($result);
			}
 			
        }


        public function resendotp_service()
        {
        	$parameters = array("mobile","otp");
 			$_POST = json_decode ( file_get_contents ( "php://input" ),true );
 			$this->form_validation->set_rules('mobile','mobile','trim|required');
 			$this->form_validation->set_rules('otp','otp','trim|required');
 			
 			if($this->form_validation->run())
 			{
 				$mobile = $this->input->post('mobile');
 				$otp = $this->input->post('otp');
 				//$otp = rand(1000,9999);
 				$message = "kaushik dhwanee otp has $otp";
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

        public function getbatchesbydate_service12345()
        {
        	$parameters = array("teacher_id","date");
 			$_POST = json_decode (file_get_contents ("php://input"),true);
 			$this->form_validation->set_rules('teacher_id','teacher id','trim|required');
 			$this->form_validation->set_rules('date','date','trim|required');
 			
 			if($this->form_validation->run())
 			{
 				$teacher_id = $this->input->post('teacher_id');
 				$date = $this->input->post('date');
 				$day_type= date("N",strtotime($date));

 				$batches = $this->batch_class_teachers_model->getclassesbyteacher($teacher_id, $day_type);

 				$allclasses = array_column($batches, "class_name");

 				$classes = array_unique($allclasses);

 				foreach ($batches as $value) {

 					$students[$value['batch_class_id']] = $this->enroll_students_batches_model->getstudentsbybatch($value['batch_class_id']);
 					
 					
 				}

 				if(!empty($batches))
 				{
 					$result['classes'] = $classes;
 					$result['batches'] = $batches;
 					$result['students'] = $students;
 					$result['success'] ="1";
 					echo json_encode($result);
 				}else
 				{
 					$result['success'] ="5";
					echo json_encode($result);
 				}

 			}
 			else
			{
				$result['success'] ="2";
				echo json_encode($result);
			}
 			
        }

        public function getbatchesbydate_service()
        {
        	$parameters = array("teacher_id","date");
 			$_POST = json_decode (file_get_contents ("php://input"),true);
 			$this->form_validation->set_rules('teacher_id','teacher id','trim|required');
 			$this->form_validation->set_rules('date','date','trim|required');
 			
 			if($this->form_validation->run())
 			{
 				$teacher_id = $this->input->post('teacher_id');
 				$date = $this->input->post('date');
 				$day_type= date("N",strtotime($date));

 				$batches = $this->batch_class_teachers_model->getclassesbyteacher($teacher_id, $day_type);

 				$allclasses = array_column($batches, "class_name");

 				$classes = array_unique($allclasses);

 				foreach ($batches as $value) {

 					$attendence = $this->enroll_students_batches_model->getstudentsbybatchwithattendence($teacher_id,$date,$value['batch_class_id']);
 					//echo $this->db->last_query();
 					//print_r($attendence);exit;
 					if(empty($attendence))
 					{
 						$students[$value['batch_class_id']] = $this->enroll_students_batches_model->getstudentsbybatch($value['batch_class_id']);
 						//echo $this->db->last_query();exit;
 					}else
 					{
 						$students[$value['batch_class_id']] = $this->enroll_students_batches_model->getstudentsbybatchwithattendence($teacher_id,$date,$value['batch_class_id']);
 					}
 					
 					
 				}

 				if(!empty($batches))
 				{
 					$result['classes'] = $classes;
 					$result['batches'] = $batches;
 					$result['students'] = $students;
 					$result['success'] ="1";
 					echo json_encode($result);
 				}else
 				{
 					$result['success'] ="5";
					echo json_encode($result);
 				}

 			}
 			else
			{
				$result['success'] ="2";
				echo json_encode($result);
			}
 			
        }

        public function getclassesbymember_service()
        {
        	$parameters = array("member_id");
 			$_POST = json_decode (file_get_contents ("php://input"),true);
 			$this->form_validation->set_rules('member_id','member id','trim|required');
 			
 			if($this->form_validation->run())
 			{
 				$member_id = $this->input->post('member_id');
				$classes = $this->enroll_students_model->getuserenrollswithbatches($member_id);
				
				//echo $this->db->last_query();exit;

 				if(!empty($classes))
 				{
 					$result['classes'] = $classes;
 					$result['success'] ="1";
 					echo json_encode($result);
 				}else
 				{
 					$result['success'] ="5";
					echo json_encode($result);
 				}

 			}
 			else
			{
				$result['success'] ="2";
				echo json_encode($result);
			}
 			
        }

        public function saveattendence_service()
        {
        	$parameters = array("teacher_id","batch_class_id","enroll_student_id","date");
 			$_POST = json_decode (file_get_contents ("php://input"),true);
 			$this->form_validation->set_rules('teacher_id','teacher id','trim|required');
 			$this->form_validation->set_rules('batch_class_id','teacher id','trim|required');
 			$this->form_validation->set_rules('date','date','trim|required');
 			$this->form_validation->set_rules('enroll_student_id','student_id','trim|required');
 			$this->form_validation->set_rules('type','type','trim|required');

 			
 			if($this->form_validation->run())
 			{
 				$teacher_id = $this->input->post('teacher_id');
 				$date = $this->input->post('date');
 				$batch_class_id = $this->input->post('batch_class_id');
 				$enroll_student_id = $this->input->post('enroll_student_id');
 				$enrollstudents = explode(",", $enroll_student_id);
 				$type = $this->input->post('type');


 				 $userDetails = array(
								 'teacher_id'=>$teacher_id,
								 'date'=>$date,
								 'batch_class_id'=>$batch_class_id,
								 'created_on'=>date("Y-m-d H:i:s"), 
								 );
 				$attendence = $this->attendence_model->checkattendence(array('teacher_id'=>$teacher_id,
								 'date'=>$date,
								 'batch_class_id'=>$batch_class_id));
				if(empty($attendence))
				{
								  
	 				$attendence_id = $this->attendence_model->save($userDetails);
	 				if(!empty($enrollstudents))
	 				{
	 					$userDetailss = array();
	 					foreach ($enrollstudents as $enroll_student_id1) {
							$userdetails1 = array('attendence_id'=>$attendence_id,
												'enroll_student_id'=>$enroll_student_id1,
												'type'=>$type
												);
							array_push($userDetailss, $userdetails1);
	 					}
	 					
	 					$results =$this->attendence_list_model->save($userDetailss);

	 				}
	 				$result['success'] ="1";
					echo json_encode($result);

				}else
				{
					$this->attendence_list_model->delete($attendence['id']);

					if(!empty($enrollstudents))
	 				{
	 					$userDetailss = array();
	 					foreach ($enrollstudents as $enroll_student_id1) {
							$userdetails1 = array('attendence_id'=>$attendence['id'],
												'enroll_student_id'=>$enroll_student_id1
												);
							array_push($userDetailss, $userdetails1);
	 					}
	 					
	 					$results =$this->attendence_list_model->save($userDetailss);

	 				}
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


        public function getallusers_service()
        {
        	$results = $this->users_model->getusers(1);
        	$results['success']=1;
        	echo json_encode($results);
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

        	
        	$teacher_id = $this->uri->segment(3);
        	
        	foreach ($days as $key => $value) {
        		
        		$data[$key] = $this->batch_class_teachers_model->getclassesbyteacher($teacher_id, $key);//$branch_id,

			}
			$classes = $data;

        	$this->load->view("admin_services/getteacherclasses",array('classes'=>$classes));

        }




       



		

}
	