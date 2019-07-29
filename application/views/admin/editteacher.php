<?php 
$days = array(
			"1"=>'Monday',
		    "2"=>'Tuesday',
		    "3"=>'Wednesday',
		    "4"=>'Thursday',
		    "5"=>'Friday',
		    "6"=>'Saturday',
		    "7"=>'Sunday'
		);

?>

			<div class="content-wrapper">
     			<div class="row">
					<div class="col-lg-12">

						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Edit Teacher</h5>
								<br>

							</div>
					<form method="post" action="<?=base_url("admin/updateteacher")?>" id="teacher" enctype="multipart/form-data">
							<div class="col-md-12 product">
							
							  <div class="form-group  col-md-4">

								 <input class="form-control" placeholder="Enter Teacher Name" value="<?=$teacher_info['teacher_name']?>" name="teacher_name" type="text">
                              

								</div>
								  <div class="form-group  col-md-4">
	
								<div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                     <input type="text" class="form-control" id="datepicker" name="date_of_joining" value="<?=($teacher_info['date_of_joining']!="")?date("d-m-Y",strtotime($teacher_info['date_of_joining'])):""?>" placeholder="Date of Joining;">
                  </div>
							
								</div>
								<div class="form-group  col-md-4">
										

<input type="file" class="file-styled" id="fileupload"  name="image"  id="fileupload" >
                        <div id="dvPreview">
                        <?php if(isset($teacher_info) && !empty($teacher_info) && $teacher_info['profile_pic']!=""){?>
                          <img src="<?=base_url('uploads/teacher_images/'.$teacher_info['profile_pic'])?>" style="width:100px">
                       <?php } ?>
                        </div>
								
								</div>
								<div class="form-group  col-md-4">
								 <input class="form-control" name="email" value="<?=$teacher_info['email']?>" placeholder="Email" type="text">
								</div>
								<div class="form-group  col-md-4">
								 <input class="form-control" name="mobile" readonly value="<?=$teacher_info['mobile']?>" placeholder="Mobile No" type="text">
								</div>
								<div class="form-group  col-md-4">
								 <input class="form-control" name="whatsapp_number" value="<?=$teacher_info['whatsapp_number']?>" placeholder="Whatsapp No" type="text">
								</div>
								<?php 
								//print_r($teacher_info['categories']);
								?>
							<div class="form-group col-md-4">
									
									<div class="multi-select-full" >
									  
 											<select name="categories[]" class="multiselect classes" multiple="multiple">

						                            	<!-- <option value="">Select Categories</option> -->

						                            	<?php
						                            	if(!empty($classes))
						                            	{
						                            		foreach ($classes as $cat_info) {
						                            			?>
						                            			 <option value="<?=$cat_info['id']?>" <?=@in_array($cat_info['id'], explode(",", $teacher_info['classes']))?"selected":""?>><?=$cat_info['class_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                            </select>

										
									</div>
								</div>
									<div class="form-group  col-md-4">
								 <input class="form-control" name="emergency_contact_name" value="<?=$teacher_info['emergency_contact_name']?>" placeholder="Emergency Name" type="text">
								</div>
								<div class="form-group  col-md-4">
								 <input class="form-control" name="emergency_contact_number" value="<?=$teacher_info['emergency_contact_number']?>"  placeholder="Contact Number" type="text">
								</div>

							<?php
							/*echo "<pre>";
							print_r($teacher_timings);exit;*/
							if(!empty($teacher_timings))
							{
								$i=1;
								foreach ($teacher_timings as $time_info) {
									 $selected_days= array();
									?>

									<div class="col-md-12 margin-0" id="box">
									<div class="form-group col-md-3">
									
									<div class="multi-select-full">
									  
										 <select data-placeholder="Select Branch" name="branch[]" class="select">

						                            	<option value="">Select</option>

						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>" <?=@$time_info['branch_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                 </select>
										
									</div>
								</div>


								<div class="form-group col-md-3">
									
									<div class="multi-select-full">
									  
										<select name="days[<?=($i-1)?>][]" class="multiselect days" placeholder="Select Days" multiple="multiple">

						                            <?php


						                             $selected_days= explode(",", $time_info['days']);
						                            	
						                            	foreach ($days as $key => $value) 
						                            	{
						                            		?>
						                            		<option value="<?=$key?>" <?=in_array($key, $selected_days)?"selected":""?> ><?=$value?></option> 
						                            	<?php	
						                            	}
						                            	?>

						                </select>
										
									</div>
								</div>


								 <div class="col-md-2" >
                  <div class="form-group">
                                       <div class="time-div">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" value="<?=date('h:i A',strtotime($time_info['in_time']))?>" name="in_time[]" class="form-control pickatime" placeholder="Login Time">
                     </div>
                  </div>

                  </div>
               </div>
			    <div class="col-md-2" >
                  <div class="form-group">
                                       <div class="time-div">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" value="<?=date('h:i A',strtotime($time_info['out_time']))?>" name="out_time[]" class="form-control pickatime" placeholder="Logout Time">
                     </div>
                  </div>

                  </div>
               </div>
			   <div class="col-md-1">
			   			    <?=($i==1)?'<h6 class="add" id="add">+</h6>':'<h6 class="add" id="remove" data='.$time_info['id'].'>-</h6>'?> 

			   </div>
			   </div>
							<?php	$i++;
						}
							}else{
							?>	
							<div class="col-md-12 margin-0" id="box">
									<div class="form-group col-md-4">
									
									<div class="multi-select-full">
									  
										 <select data-placeholder="Select Branch" name="branch[]" class="select">

						                            	<option value="">Select</option>

						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>" <?=@$class_info['cat_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                 </select>
										
									</div>
								</div>
								 <div class="col-md-4" >
                  <div class="form-group">
                                       <div class="time-div">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" name="in_time[]" class="form-control pickatime" placeholder="Login Time">
                     </div>
                  </div>

                  </div>
               </div>
			    <div class="col-md-3" >
                  <div class="form-group">
                                       <div class="time-div">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" name="out_time[]" class="form-control pickatime" placeholder="Logout Time">
                     </div>
                  </div>

                  </div>
               </div>
			   <div class="col-md-1">
			     <h6 class="add" id="add">+</h6>
			   </div>
			   </div><?php }?>

			   <div class="form-group  col-md-4">

								 <input class="form-control" id="geocomplete" name="geolocation" value="<?=@$teacher_info['location']?>" placeholder="Location(geolocation)" type="text">
								 <input type="hidden" name="lat" value="<?=@$teacher_info['latitude']?>" data-geo="lat">
                  				  <input type="hidden" name="lng" value="<?=@$teacher_info['longitude']?>" data-geo="lng">
								<div class="map_canvas" style="display:none"></div>
								</div>
								
								<div class="form-group  col-md-8">
								 <textarea rows="2" cols="5" class="form-control" name="address" placeholder="Address"><?=$teacher_info['address']?></textarea>
								</div>
								<div class="clearfix"></div>
								<div class="sub-btn form-group">
								<input type="hidden" name="teacher_id" value="<?=$teacher_info['teacher_id']?>">
		<button type="submit" class="btn btn-primary active legitRipple center">SUBMIT</button>
		</div>
							</div>
							</form>
							
							<div class="clearfix"></div>
						</div>
						

					</div>

					<div class="col-lg-3">

				<?php //include_once 'includes/right-sidepanel.php'?>
					</div>
				</div>
			</div>
			<!-- /main content -->

		</div>
		
	</div>

	<!-- Footer -->
<?php //include_once 'includes/footer.php'?>


<script>
$(function(){
    $('.days').find(".multiselect-selected-text").text('Select Classes');
    $('.classes').find(".multiselect-selected-text").text('Select Days');

})
</script>	
<script>

$(document).ready(function(){
	var count = 1;
	var z="<?=count($teacher_timings)?>";
	$('#add').click(function(){
		
		var inp = $('#box');
		
		var i = $('input').size() + 1;
		
		$('<div id="box' + i +'"><div class="form-group col-md-3"><div class="multi-select-full"><select data-placeholder="Select Branch" name="branch[]" class="select"><option value="">Select</option><?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?><option value="<?=$branch_info['id']?>" <?=@$class_info['cat_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option><?php	}
						                            	}
						                            	?></select></div></div><div class="form-group col-md-3"><div class="multi-select-full" id="abc' + i +'"><select name="days['+z+'][]" class="multiselect" multiple="multiple"><?php foreach ($days as $key => $value) 
						                            	{
						                            		?><option value="<?=$key?>"><?=$value?></option><?php	
						                            	}
						                            	?></select></div></div><div class="col-md-2" ><div class="form-group"><div class="time-div"><div class="input-group"><span class="input-group-addon"><i class="icon-alarm"></i></span><input type="text" class="form-control pickatime'+count+'" name="in_time[]" placeholder="Login Time"></div></div></div></div><div class="col-md-2" ><div class="form-group"><div class="time-div"><div class="input-group"><span class="input-group-addon"><i class="icon-alarm"></i></span><input type="text" class="form-control pickatime'+count+'" name="out_time[]" placeholder="Logout Time"></div></div></div></div><div class="col-md-1"><h6 class="add" id="remove">-</h6></div></div>').appendTo(inp);
		
		inp.find(".multiselect"+count).multiselect();
		inp.find(".pickatime"+count).pickatime();
		$("#abc"+i).find(".multiselect").multiselect('refresh');
		i++;
		z++;
		count++;

		
		$(".select").selectpicker("refresh");
	});
	
	
	
	$('body').on('click','#remove',function(){
		z= z-1;
		$(this).parent().parent().remove();
	});

		
});

</script>

	 <script type="text/javascript">
   //function initialize() {}
     $(function(){
     	
        $("#geocomplete").geocomplete({
          //location: "Hyderabad, Telangana, India",
          map: ".map_canvas",
          details: "form",
          types: ["geocode", "establishment"],
        
        });       
      $("#geocomplete").bind("geocode:dragged", function(event, latLng){
           $("input[name=lat]").val(latLng.lat());
           $("input[name=lng]").val(latLng.lng());
       
          $("#reset").show();
        });
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        });
      
   
      });

</script>
<script type="text/javascript">
	var vendor_id ="";  	
	vendor_id ="<?=$this->uri->segment('3')?>";
  $(document).ready(function(){
  	
     $("#branch").validate({
      rules: {
        teacher_name: "required",
       	password:"required",
		email: {"required":true,
		email:true},
        date_of_birth:"required",
        
        mobile: {
        	required: true,
        	minlength: 10,
        	maxlength: 10,
        	remote:{
        		url: "<?=base_url('admin/checkmobile')?>",
        		type:"POST",
        		data:{
        			mobile:function(){
        				return $("input[name=mobile]").val();
        				},
        			vendor_id: vendor_id	
        			},
        	},
        	},
        	whatsapp_number: {
        	
        	minlength: 10,
        	maxlength: 10,
        	
        	},
        	emergency_contact_number: {
        	
        	minlength: 10,
        	maxlength: 10,
        	
        	},
      },
      messages:{
      	mobile:{
      		remote:"Aleready registered",
      	}
      }
    });

   
  });
</script>
</body>
</html>
