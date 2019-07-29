<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploaddata{

	
	public function __construct() 
	{
		$this->CI =& get_instance();
		$this->CI->load->library('session');
		$this->CI->load->library('image_lib');
	}

	public function uploadImages($files,$folders)
	{
		$filename = "";
		$folder_structure = "/";
		if(count($folders)>0){
			
			foreach ($folders as $folder) {
				$folder_structure .= $folder."/";
				$folderpath = base_path . '/uploads'.$folder_structure;
				
				if(!is_dir($folderpath))
				{
					mkdir($folderpath,0777);
				}
				
			}
				$_FILES['image']['name']= $files['name'];
            	$_FILES['image']['type']= $files['type'];
            	$_FILES['image']['tmp_name']= $files['tmp_name'];
            	$_FILES['image']['error']= $files['error'];
            	$_FILES['image']['size']= $files['size'];

				$config['upload_path'] = $folderpath;
	        	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	        	$config['max_size']	= '5120';
	        	$config['encrypt_name']	= TRUE;

	        $this->CI->load->library('upload'); //initialize

		/*$image[] = $image;*/
            	$config['filename'] =$files['name'];

            	$this->CI->upload->initialize($config);

            	if ($this->CI->upload->do_upload('image')) 
            	{
                	$img_description = $this->CI->upload->data();
                	$filename = $img_description['file_name'];	
            	} 
            	else 
            	{
            		var_dump($this->CI->upload->display_errors());
                	return false;
            	}
            	return $filename;
		}
	}


	/*$name_array = array();
                $count = count($_FILES['userfile']['size']);
                foreach($_FILES as $key=>$value)
                for($s=0; $s<=$count-1; $s++) {
                $_FILES['userfile']['name']=$value['name'][$s];
                $_FILES['userfile']['type']    = $value['type'][$s];
                $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['userfile']['error']       = $value['error'][$s];
                $_FILES['userfile']['size']    = $value['size'][$s];  
                    $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size']     = '100';
                        $config['max_width']  = '1024';
                        $config['max_height']  = '768';
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $data = $this->upload->data();
                $name_array[] = $data['file_name'];
                        } - See more at: http:*///arjun.net.in/multiple-image-uploading-using-single-input-codeigniter/#sthash.6D96az7b.B0I5g1jB.dpuf

	public function uploadVideo($challengeid, $fieldname)
	{
		$uid = $this->CI->session->userdata('member_id');
		if(!empty($uid)){
			$folderpath = base_path . '/data/challenge_videos/'.$challengeid."/";
			if(!is_dir($folderpath)){
				mkdir($folderpath,0777);
			}

			$configVideo['upload_path'] = $folderpath;
            $configVideo['allowed_types'] = 'avi|flv|wmv|mp4';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;

			$config['upload_path'] = $folderpath;
	        $config['allowed_types'] = 'avi|flv|wmv|mp4';
	        $config['max_size']	= '20480';
	        $config['encrypt_name']	= TRUE;

			$this->CI->load->library('upload', $config); //initialize
			if ( ! $this->CI->upload->do_upload($fieldname)){
	            return 1;
	        }else{
	            $uploaddata = $this->CI->upload->data();
				return $uploaddata['file_name'];
	        }			
		}
	}

	public function uploadVideotoVimeo($videopath)
	{
		$params = array(
                'consumer_key'=>"0407319feb888444c1ea49f50b814b54e36b682f", 
                'consumer_secret'=>"5c4ee98158b97f518183bfa1be8a4a91fb93ee57", 
                'token'=>"ab891877d08164e12be55fbbb989db54", 
                'token_secret'=>"2c477d65de363ceb037cfb308337b177fecc3e3e"
                );

		$this->CI->load->library('vimeo', $params); //initialize
		try {
			$video_id = $this->CI->vimeo->upload($videopath);
			if ($video_id>0) {
		        //$this->vimeo->call('vimeo.videos.setTitle', array('title' => 'Sample Title from 2Challenges', 'video_id' => $video_id));
		        //$this->vimeo->call('vimeo.videos.setDescription', array('description' => 'This is a challenge description', 'video_id' => $video_id));
		        return $video_id;
		    }
		    else {
		        return 0;
		    }
		}
		catch (VimeoAPIException $e) {
		    echo "Encountered an API error -- code {$e->getCode()} - {$e->getMessage()}";
		}
	}
	
	public function upload_multiple_images($files,$folders)
	{

		//$uid = $car_id;
		$file_names = array();
		$folder_structure = "/";
		if(count($folders)>0)
		{
			foreach ($folders as $folder) {
				$folder_structure .= $folder."/";
				$folderpath = base_path . '/uploads'.$folder_structure;
				
				if(!is_dir($folderpath))
				{
					mkdir($folderpath,0777);
				}
				
			}
			$folderpath = base_path . '/uploads/'.$folder_structure;
			$config['upload_path'] = $folderpath;
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size']	= '5120';
	        $config['encrypt_name']	= TRUE;

	        $this->CI->load->library('upload', $config); //initialize
	       
	        foreach($files['name'] as $key => $image)
	        {
	        	$_FILES['image[]']['name']= $files['name'][$key];
            	$_FILES['image[]']['type']= $files['type'][$key];
            	$_FILES['image[]']['tmp_name']= $files['tmp_name'][$key];
            	$_FILES['image[]']['error']= $files['error'][$key];
            	$_FILES['image[]']['size']= $files['size'][$key];

            	/*$image[] = $image;*/
            	$config['filename'] = $image;

            	$this->CI->upload->initialize($config);

            	if ($this->CI->upload->do_upload('image[]')) 
            	{
                	$img_description = $this->CI->upload->data();
                	array_push($file_names,$img_description['file_name']);	
            	} 
            	/*$config['image_library'] = 'gd2';
            	$config['source_image'] = $this->CI->upload->upload_path.$this->CI->upload->file_name;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 400;
				$config['height'] = 400;
				$confif['quality'] = '100%';
				$this->CI->image_lib->clear();
				$this->CI->image_lib->initialize($config);
				$this->CI->image_lib->resize();*/
				
            }
            if(count($file_names)>0)
            {
           		 return $file_names; 	
            }else{
            	return array();
            }
	        
	       

		}
	}
	public function uploadexel($files,$folders)
	{
		$filename = "";
		$folder_structure = "/";
		if(count($folders)>0){
			
			foreach ($folders as $folder) {
				$folder_structure .= $folder."/";
				$folderpath = base_path . '/uploads'.$folder_structure;
				
				if(!is_dir($folderpath))
				{
					mkdir($folderpath,0777);
				}
				
			}
				$_FILES['image']['name']= $files['name'];
            	$_FILES['image']['type']= $files['type'];
            	$_FILES['image']['tmp_name']= $files['tmp_name'];
            	$_FILES['image']['error']= $files['error'];
            	$_FILES['image']['size']= $files['size'];

				$config['upload_path'] = $folderpath;
	        	$config['allowed_types'] = 'xls|xlsx';
	        	//$config['max_size']	= '5120';
	        	$config['encrypt_name']	= TRUE;

	        $this->CI->load->library('upload'); //initialize

		/*$image[] = $image;*/
            	$config['filename'] =$files['name'];

            	$this->CI->upload->initialize($config);

            	if ($this->CI->upload->do_upload('image')) 
            	{
                	$img_description = $this->CI->upload->data();
                	$filename = $img_description['file_name'];	
            	} 
            	else 
            	{
            		var_dump($this->CI->upload->display_errors());
                	return false;
            	}
            	return $filename;
		}
	}
}
