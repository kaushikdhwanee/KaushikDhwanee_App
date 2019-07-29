<style>

.inline{
  display: inline-block;
}
.inline + .inline{
  margin-left:10px;
}
.radio{
  color:#999;
  font-size:15px;
  position:relative;
}
.radio span{
  position:relative;
   padding-left:20px;
}
.radio span:after{
  content:'';
  width:15px;
  height:15px;
  border:3px solid;
  position:absolute;
  left:0;
  top:1px;
  border-radius:100%;
  -ms-border-radius:100%;
  -moz-border-radius:100%;
  -webkit-border-radius:100%;
  box-sizing:border-box;
  -ms-box-sizing:border-box;
  -moz-box-sizing:border-box;
  -webkit-box-sizing:border-box;
}
.radio input[type="radio"]{
   cursor: pointer; 
  position:absolute;
  width:100%;
  height:100%;
  z-index: 1;
  opacity: 0;
  filter: alpha(opacity=0);
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"
}
.radio input[type="radio"]:checked + span{
  color:#0B8;  
}
.radio input[type="radio"]:checked + span:before{
    content:'';
  width:5px;
  height:5px;
  position:absolute;
  background:#0B8;
  left:5px;
  top:6px;
  border-radius:100%;
  -ms-border-radius:100%;
  -moz-border-radius:100%;
  -webkit-border-radius:100%;
}
.icon-calendar{
	color:rgb(before);
	font-weight: bold;
}
.price{
	color: green;
	font-size: 14px;
	font-weight: bold;
}
</style>

			<div class="content-wrapper">
     			<div class="row">
					<div class="col-lg-12">

						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Add Users</h5>
							</div>
							<div class="loader" style="display:none"></div>
							<div class="col-md-12 product">
							<div class="col-md-12">
							    <div class="form-group col-md-6 ">
							       
								    <label class="radio inline">  <input type="radio" id="new-user" checked name="abc" class=" form-control user"><span>New user</span></label>
    								 <label class="radio inline"> <input type="radio" id="new-user1" name="abc" class="form-control user"><span>Family Member</span></label>
								 
								</div>
								
								<div class="clearfix"></div>
							</div>
							<form method="post" action="<?=base_url("admin/insertstudent")?>" id="student" enctype="multipart/form-data" >
							  <div class="col-md-8">
							  	<div class="form-group col-md-6">
								 		<div class="input-group">
								 <span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" id="datepicker1" class="datepicker1" name="registration_date" placeholder="Registration Date">
								</div></div></div>
								<div class="col-md-8">
							    <div class="form-group  col-md-6">
								 <input class="form-control" name="name" placeholder="Name Of The Student" type="text">
								</div>
								<div class="form-group  col-md-6">
<!-- 								 <input class="form-control" name="age"  placeholder="Age" onkeypress="return event.charCode>=48 && event.charCode<=57" type="text">
 -->								 <select  class="selectbox form-control" name="age">
						                            	<option value=""> Select Age</option>

			                               <?php
			                            	
			                            		for ($i=2;$i<=99;$i++) {
			                            			?>
			                            			 <option value="<?=$i?>"><?=$i?></option> 
			                            	<?php	}
			                            	
			                            	?>


						                                
						                            </select>
							
								</div>
						        <div class="form-group  col-md-6">
								 <input class="form-control" name="email" placeholder="Email ID" type="text">
								</div>
								
								<div class="form-group  col-md-6">
								 <input class="form-control" name="mobile" placeholder="Phone No" onkeypress="return event.charCode>=48 && event.charCode<=57" type="text">
								</div>
								<div class="form-group  col-md-6">
								 <input class="form-control" name="whatsapp_number" placeholder="Whatsapp No" onkeypress="return event.charCode>=48 && event.charCode<=57" type="text">
								</div>
								<!--  <div class="form-group  col-md-6">
	
									    <select  class="selectbox" name="class_id">
						                            	<option value=""> Select class</option>

			                               <?php
			                            	if(!empty($classes))
			                            	{
			                            		foreach ($classes as $cat_info) {
			                            			?>
			                            			 <option value="<?=$cat_info['id']?>"><?=$cat_info['class_name']?></option> 
			                            	<?php	}
			                            	}
			                            	?>


						                                
						                            </select>
							
								</div> -->
                              <div class="form-group  col-md-6">
								 <input class="form-control" name="organization_name" placeholder="Name Of Your Organization" type="text">
								</div>
								<div class="form-group  col-md-12">
								<textarea rows="2" cols="5" class="form-control" name="address" placeholder="Address"></textarea>
								</div>
                                 <div class="form-group  col-md-12">
                                 	
								 <div class="control-label col-lg-4" id="demo" data-input-name="country" data-selected-country="IN" data-button-size="btn-lg" data-button-type="btn-warning" data-scrollable="true" data-scrollable-height="250px"></div>
                                 <input type="hidden" name="hiddeninput" id="hiddeninput" />

								</div>
								</div>
								<div class="col-md-4">
								   <!-- <div class="profile-pic"><img src="images/admin.jpg"/></div> -->
								   <input type="file" class="file-styled profile_pic" id="fileupload"  name="image"   >
                        <div id="dvPreview">
                       
                        </div>
								</div>
								<!-- <div class="form-group  col-md-4">
										

<input type="file" class="file-styled" id="fileupload"  name="image"  id="fileupload" >
                        <div id="dvPreview">
                       
                        </div>
								
								</div> -->
								<div class="clearfix"></div>
							     <div class="col-md-12">
								 <div class="form-group">
								 	<label><p class="sib-dis">How do you know about us?</label>
									<div class="col-md-4">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="known_from[]" value="Newspaper" class="styled">
											Newspaper Insert
										</label>
									</div>
									</div>
									<div class="col-md-4">
									<div class="checkbox">
										<label>
											<input type="checkbox"  name="known_from[]" value="Just dial"  class="styled">
											Just Dial
										</label>
									</div>
									</div>
									<div class="col-md-4">
									<div class="checkbox">
										<label>
											<input type="checkbox"  name="known_from[]" value="internet sites"  class="styled specify">
											Internet sites,specify
										</label>
									</div>
									</div>
								  <div class="col-md-4">
									<div class="checkbox">
										<label>
											<input type="checkbox"  name="known_from[]" value="friends" class="styled specify">
											Friend Reference,specify
										</label>
									</div>
									</div>
									<div class="col-md-4">
									<div class="checkbox">
										<label>
											<input type="checkbox"  name="known_from[]" value="others"  class="styled specify">
											Others,specify
										</label>
									</div>
									</div>

									
									<div class="col-md-4 other_info" style="display:none">
											<input type="text"  name="other_info" placeholder="Specify Others" >
											
										</div>
										
									
									<div class="clearfix"></div>
								</div>
								 
								 </div>
					
								<div class="clearfix"></div>
								  <div class="col-md-8">
								  	 <?php if($this->session->userdata("user_type")==1):?>
								     <div class="form-group col-md-6">
								     
                                              <select  name="branch_id" id="branch_id"  class="selectbox form-control branch_id">

						                            	<option value="">Select Branch</option>

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
									<div class="col-md-6">
									   <p class="re-fonts">Registration Fee <span><i class="fa fa-inr"></i><span id="reg_amount" class="reg_amount">0</span></span></p>
									</div>
									
                                   
								<div class="sub-btn form-group col-md-6">
								<input type="hidden" id="registration_amount" class="registration_amount" name="registration_amount">
							</div>
								<?php else: ?>


									<div class="form-group col-md-12">
										
                                        <div class="col-lg-6">
											
                                              <input type="hidden" class="form-control" id="branch_id" name="branch_id" value="<?=@$branch['id']?>" placeholder="Amount"></input>
                                            </div>  
                                          </div>

                                          <div class=" form-group col-md-12">
									   <label class="control-label col-lg-6"><p class="re-fonts">Registration Amount </p></label>
									<div class="col-lg-6">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control price" id="registration_amount" name="registration_amount" value="<?=@$branch['registration_amount']?>" placeholder="Amount">
										</div>
									</div>
									</div>
								  <?php endif; ?>
								 	<div class="clearfix"></div>
								 </div>
								 	<div class="col-md-10 col-md-offset-2">
        <div class="sub-btn form-group col-md-4">
		<button type="button" class="btn btn-primary active legitRipple center register">Registration Only</button>
		</div>         
<div class="sub-btn form-group col-md-4">
		<button type="button" class="btn btn-primary active legitRipple center enroll">Register and Enroll</button>
		</div>                                                                                   
</div>
</form>
<form method="post" action="<?=base_url("admin/insertfamilymember")?>" id="family-memeber"  enctype="multipart/form-data" style="display:none">
	<div class="col-md-12">
		
								  <div class="form-group  col-md-4">
	                                 <?php if($this->session->userdata("user_type")==1):?>
									    <select  data-placeholder="Select Mobile" class="select box form-control" name="user_id">
						                            <option value="">select</option>

			                               <?php
			                            	if(!empty($users))
			                            	{
			                            		foreach ($users as $cat_info) {
			                            			?>
			                            			 <option value="<?=$cat_info['id']?>"><?=$cat_info['mobile']?></option> 
			                            	<?php	}
			                            	}
			                            	?>

 
						                                
						                            </select>
						            <?php else: ?>
						            	<select  data-placeholder="Select Mobile" class="select box form-control" name="user_id">
						                            <option value="">select</option>

			                               <?php
			                            	if(!empty($user))
			                            	{
			                            		foreach ($user as $cat_info) {
			                            			?>
			                            			 <option value="<?=$cat_info['id']?>"><?=$cat_info['mobile']?></option> 
			                            	<?php	}
			                            	}
			                            	?>


						                                
						                            </select>

						                        <?php endif; ?>
							
								</div> 
                              <div class="form-group  col-md-4">
								 <input class="form-control" name="name" placeholder="Family Member name" type="text">
								</div>
								<div class="form-group col-md-4">
								   <!-- <div class="profile-pic"><img src="images/admin.jpg"/></div> -->
								   <input type="file" class="file-styled profile_pic" id="fileupload"  name="image"   >
                       
                        <div id="dvPreview"></div>
                        
								</div>

								<div class="col-md-12">
								     <?php if($this->session->userdata("user_type")==1):?>
								     <div class="form-group col-md-6">
								     
                                              <select  name="branch_id" id="branch_id"  class="selectbox form-control branch_id">

						                            	<option value="">Select Branch</option>

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
									<div class="col-md-6">
									   <p class="re-fonts">Registration Fee <span><i class="fa fa-inr"></i><span id="reg_amount" class="reg_amount">0</span></span></p>
									</div>
									
                                   
								<div class="sub-btn form-group col-md-6">
								<input type="hidden" id="registration_amount" class="registration_amount" name="registration_amount">
							</div>
								<?php else: ?>


									<div class="form-group col-md-12">
										
                                        <div class="col-lg-6">
											
                                              <input type="hidden" class="form-control" id="branch_id" name="branch_id" value="<?=@$branch['id']?>" placeholder="Amount"></input>
                                            </div>  
                                          </div>

                                          <div class=" form-group col-md-12">
									   <label class="control-label col-lg-6"><p class="re-fonts">Registration Amount </p></label>
									<div class="col-lg-6">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control price" id="registration_amount" name="registration_amount" value="<?=@$branch['registration_amount']?>" placeholder="Amount">
										</div>
									</div>
									</div>
								  <?php endif; ?>
								 	<div class="clearfix"></div>
								 </div>
								 <div class="col-md-10 col-md-offset-2">

								<div class="sub-btn form-group col-md-4">
		<!--<button type="button" class="btn btn-primary active legitRipple center add_family_member bbtn-loader" >Registration Only</button>-->
		<button type="button" data-loading-text="Loading..."  class="btn btn-primary add_family_member">Registration Only</button>
		</div>         
<div class="sub-btn form-group col-md-4">
		<button type="button" class="btn btn-primary active legitRipple center enroll_family_member">Register and Enroll</button>
		</div>                                                                                   
</div>				
								
	</div>
</form>
							</div>
							
							<div class="clearfix"></div>
						</div>
						

					</div>

					<div class="col-lg-3">

					</div>
				</div>
			</div>
			<!-- /main content -->

		</div>
		
	</div>

	<!-- Footer -->
	
</body>
</html>

<script>
    $("button").click(function() {
    //var $btn = $(this);
    //$btn.button('loading');
   $('#loading').show();
    
    $('#enrollstudent').submit();
});

    $("form").submit(function() {
    $("#hiddeninput").val($("#country").data("country-code")); //set value of hidden input
});
    $('#demo').flagStrap();


</script>


<script type="text/javascript">

$("#new-user").click(function(){
	$("#family-memeber").hide();
	$("#student").show();

});
$(".specify").click(function(){

if($(".specify").is(':checked')){
$(".other_info").show();
}else{
	$(".other_info").hide();
}
});
$("#new-user1").click(function(){
	$("#family-memeber").show();
	$("#student").hide();

});

	var vendor_id ="";  
	var profile_pic1 =[];	
	vendor_id ="<?=$this->uri->segment('3')?>";
  $(document).ready(function(){
  	//alert("hi");
     $("#student").validate({
      rules: {
        name: "required",
       	password:"required",
		email: {"required":true,
		email:true},
        date_of_birth:"required",
        password: "required",
        branch_id:"required",
        class_id: "required",
        registration_date:"required",
        mobile: {
        	required: true,
        	minlength: 10,
        	maxlength: 10,
        	remote:{
        		url: "<?=base_url('admin/checkusermobile')?>",
        		type:"POST",
        		data:{
        			mobile:function(){
        				return $("input[name=mobile]").val();
        				},
        			vendor_id: vendor_id	
        			},
        	},
        	},
      },
      messages:{
      	mobile:{
      		remote:"Aleready registered",
      	}
      }
    });

   $(".branch_id").change(function(){
   	var branch_id = $(this).val();
   	$.ajax({
   		type:"post",
   		url:"<?=base_url('admin/getregistrationamount')?>",
   		data:{branch_id:branch_id},
   		success: function(message){
   			var resp = JSON.parse(message);
   			if(resp.status==1)
   			{
   				$(".reg_amount").html(resp.registration_amount);
   				$(".registration_amount").val(resp.registration_amount);

   			}

   		}
   	});
   });  

	$(document).on('change', '.profile_pic', function(e){
		profile_pic1 = e.target.files;
	});

   	$(".register").click(function(){
   	if($("#student").valid())
   	{
   		
        var data = new FormData();
		var other_data = $("#student").serializeArray();

		$.each(other_data,function(key,input){

		data.append(input.name,input.value);

		});
   		if(profile_pic1.length != 0)
		{
			$.each(profile_pic1,function(index,value){
			data.append('image',value);
			});
	    }
		data.append('reg_type','1');
   		$.ajax({
   			type:"post",
   			url:"<?=base_url("admin/insertstudent")?>",
   			data:data,
   			contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData:false,
   			success: function(message){
   				var result = JSON.parse(message);
   				if(result.success==1){
					alert("user registered successfully");
					window.location = "<?=base_url('admin/printreceipt/')?>"+result.payment_id;
   				}
   				else
   				{

   				}
   			}
   		});

   	}	

   	});

  	$(".enroll").click(function(){
   	if($("#student").valid())
   	{
 
        var data = new FormData();
		var other_data = $("#student").serializeArray();

		$.each(other_data,function(key,input){

		data.append(input.name,input.value);

		});
   		if(profile_pic1.length != 0)
		{
			$.each(profile_pic1,function(index,value){
			data.append('image',value);
			});
	    }
		
   		$.ajax({
   			type:"post",
   			url:"<?=base_url("admin/insertstudent")?>",
   			data:data,
   			contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData:false,
   			success: function(message){
   				//return false;
   				var result = JSON.parse(message);
   				//return false;
   				if(result.success==1){
					alert("user registered successfully");
					window.location = "<?=base_url('admin/addenrollstudent/')?>"+result.user_id;
   				}
   				else
   				{

   				}
   			}
   		});

   	}	

   	});

     $("#family-memeber").validate({
      rules: {
        name: "required",
       	user_id:"required",
		branch_id:"required",

      },
      messages:{
      	mobile:{
      		remote:"Aleready registered",
      	}
      }
    });
	$(".add_family_member").click(function(){
   	if($("#family-memeber").valid())
   	{
        var data = new FormData();
		var other_data = $("#family-memeber").serializeArray();

		$.each(other_data,function(key,input){

		data.append(input.name,input.value);

		});
   		if(profile_pic1.length != 0)
		{
			$.each(profile_pic1,function(index,value){
			data.append('image',value);
			});
	    }
		//data.append('reg_type','1');
   		$.ajax({
   			type:"post",
   			url:"<?=base_url("admin/insertfamilymember")?>",
   			data:data,
   			contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData:false,
   			success: function(message){
   				var result = JSON.parse(message);
   				if(result.success==1){
					alert("Family Member added successfully");
					window.location = "<?=base_url('admin/printreceipt/')?>"+result.payment_id;
					
   				}
   				else
   				{

   				}
   			}
   		});

   	}	

   	});

   	$(".enroll_family_member").click(function(){
   	if($("#family-memeber").valid())
   	{
 
        var data = new FormData();
		var other_data = $("#family-memeber").serializeArray();

		$.each(other_data,function(key,input){

		data.append(input.name,input.value);

		});
   		if(profile_pic1.length != 0)
		{
			$.each(profile_pic1,function(index,value){
			data.append('image',value);
			});
	    }
		
   		$.ajax({
   			type:"post",
   			url:"<?=base_url("admin/insertfamilymember")?>",
   			data:data,
   			contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData:false,
   			success: function(message){
   				//return false;
   				var result = JSON.parse(message);
   				//return false;
   				if(result.success==1)
   				{
					alert("Family Member added successfully");
					window.location = "<?=base_url('admin/addenrollstudent/')?>"+result.user_id;
   				}
   				else
   				{

   				}
   			}
   		});

   	}	

   	});

  });


</script>