<?php 
include ('../db.php');
include ('includes/gcm.php');

$parameters = array("emp_id","subscriber_id","x_axis","y_axis","tp_14","tp_17","dish","xaxis_reading","yaxis_reading","tp14_reading","tp17_reading");//,"emp_profile"

$_POST = json_decode ( file_get_contents ( "php://input" ),true );

extract($_POST);

	if(!empty($emp_id) && !empty($x_axis) &&  !empty($y_axis) && !empty($tp_14) && !empty($tp_17) && !empty($xaxis_reading) &&  !empty($yaxis_reading) && !empty($tp14_reading) && !empty($tp17_reading))
	{

		$cond = mysqli_query($conn,"select * from employee where emp_id= '$emp_id' and emp_status = '1' ");

		$count = mysqli_num_rows($cond);

		if($count>0)
		{

			$desired_dir = "../upload_images/";
                  /*//$desired_dir = 'images/projectimages/2';
                  if(is_dir($desired_dir)==false){

                     mkdir("$desired_dir", 0700);    
                  }*/

			if(is_dir($desired_dir)==false)
			{
				mkdir("$desired_dir", 0755);    
			}

			$date = date("d-m-Y"); 

			if(is_dir($desired_dir."/".$date)==false)
			{
				mkdir("$desired_dir/$date", 0755);    
			}

			if(is_dir($desired_dir."/".$date."/".$subscriber_id)==false)
			{
				mkdir("$desired_dir/$date/$subscriber_id", 0755);    
			}


			if(!empty($x_axis))
			{	
								
				$base = $x_axis;
				$file_name = 'x_axis.jpg';
				$binary=base64_decode($base);
				header('Content-Type: bitmap; charset=utf-8');
				$file = fopen($desired_dir."/".$date."/".$subscriber_id."/".$file_name, 'wb');
				fwrite($file, $binary);
				fclose($file);					
				$x_axis = $file_name;				 
			}

			if(!empty($y_axis))
			{					
				if(is_dir($desired_dir)==false)
				{
					mkdir("$desired_dir", 0755);    
				}				
				$base=$y_axis;
				$file_name = 'y_axis.jpg';
				$binary=base64_decode($base);
				header('Content-Type: bitmap; charset=utf-8');
				$file = fopen($desired_dir."/".$date."/".$subscriber_id."/".$file_name, 'wb');
				fwrite($file, $binary);
				fclose($file);					
				$y_axis = $file_name;				 
			}

			if(!empty($tp_14))
			{					
				if(is_dir($desired_dir)==false)
				{
					mkdir("$desired_dir", 0755);    
				}				
				$base=$tp_14;
				$file_name = 'tp_14.jpg';
				$binary=base64_decode($base);
				header('Content-Type: bitmap; charset=utf-8');
				$file = fopen($desired_dir."/".$date."/".$subscriber_id."/".$file_name, 'wb');
				fwrite($file, $binary);
				fclose($file);					
				$tp_14 = $file_name;				 
			}

			if(!empty($tp_17))
			{					
				if(is_dir($desired_dir)==false)
				{
					mkdir("$desired_dir", 0755);    
				}				
				$base=$tp_17;
				$file_name = 'tp_17.jpg';
				$binary=base64_decode($base);
				header('Content-Type: bitmap; charset=utf-8');
				$file = fopen($desired_dir."/".$date."/".$subscriber_id."/".$file_name, 'wb');
				fwrite($file, $binary);
				fclose($file);					
				$tp_17 = $file_name;				 
			}

			if(!empty($dish))
			{					
				if(is_dir($desired_dir)==false)
				{
					mkdir("$desired_dir", 0755);    
				}				
				$base=$dish;
				$file_name = 'dish.jpg';
				$binary=base64_decode($base);
				header('Content-Type: bitmap; charset=utf-8');
				$file = fopen($desired_dir."/".$date."/".$subscriber_id."/".$file_name, 'wb');
				fwrite($file, $binary);
				fclose($file);					
				$dish = $file_name;				 
			}

			$created_date= date("Y-m-d H:i:s");

			$query="INSERT INTO `tracking`(`subscriber_id`, `x_axis`, `y_axis`, `tp_14`, `tp_17`, `dish`, `xaxis_reading`, `yaxis_reading`, `tp14_reading`, `tp17_reading`, `created_date`,`employee_id`) values('".$subscriber_id."', '".$x_axis."', '".$y_axis."', '".$tp_14."', '".$tp_17."', '".$dish."', '".$xaxis_reading."', '".$yaxis_reading."', '".$tp14_reading."', '".$tp17_reading."', '".$created_date."','".$emp_id."')";
	    	//echo $query;exit;
			$res = mysqli_query($conn,$query);
			//$emp_id = mysqli_insert_id($conn);

			//$result['user']= $resp;
			if($res>0){
				$result['success']='1';
			}else{
				$result['success']='6';
			}
			

			echo json_encode($result);

		}
		else
		{
			echo json_encode(array("success" => "3"));
		}


	}

	else{

			echo json_encode(array("success" => "2"));

		}

		

?>