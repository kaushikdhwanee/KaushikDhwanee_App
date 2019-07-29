
			<div class="content-wrapper">
     			<div class="row">
					<div class="col-lg-12">

						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Add Users</h5>
							</div>
							<div class="loader" style="display:none"></div>
							<div class="col-md-12 product">
							
							<form method="post" action="<?=base_url("admin/updatestudent")?>" id="student" enctype="multipart/form-data" >
							  <div class="col-md-8">
							    <div class="form-group  col-md-6">
								 <input class="form-control" name="name" value="<?=$user_info['name']?>" placeholder="Name Of The Student" type="text">
								</div>
								<div class="form-group  col-md-6">
							 <select  class="selectbox form-control" name="age">
						                            	<option value=""> Select Age</option>

			                               <?php
			                            	
			                            		for ($i=2;$i<=99;$i++) {
			                            			?>
			                            			 <option value="<?=$i?>" <?=$user_info['age']==$i?"selected":""?>><?=$i?></option> 
			                            	<?php	}
			                            	
			                            	?>


						                                
						                            </select>
							
								</div>
						        <div class="form-group  col-md-6">
								 <input class="form-control" name="email"  value="<?=$user_info['email']?>" placeholder="Email ID" type="text">
								</div>
								
								<div class="form-group  col-md-6">
								 <input class="form-control" value="<?=$user_info['mobile']?>" readonly placeholder="Phone No" onkeypress="return event.charCode>=48 && event.charCode<=57" type="text">
								</div>
								<div class="form-group  col-md-6">
								 <input class="form-control" value="<?=$user_info['whatsapp_number']?>" name="whatsapp_number" placeholder="Whatsapp No" onkeypress="return event.charCode>=48 && event.charCode<=57" type="text">
								</div>
								
                              <div class="form-group  col-md-6">
								 <input class="form-control" name="organization_name" value="<?=$user_info['organization_name']?>" placeholder="Name Of Your Organization" type="text">
								</div>
								<div class="form-group  col-md-12">
								 <textarea rows="2" cols="5" class="form-control" name="address" placeholder="Address"><?=$user_info['address']?></textarea>
								</div>
								</div>
								<div class="form-group col-md-4">
                   <input type="file" class="file-styled imgInp" name="image"   >
                       
                        <div id="dvPreview"><img src="<?=base_url("uploads/user_images/".$user_info['profile_pic'])?>" id="imgPreview" style="width:100px"/></div>
                        
                </div>
								
								
							    <div class="clearfix"></div>
								 
                                  	<div class="col-md-12">

								<div class="sub-btn form-group col-md-6">
								<input type="hidden" id="" class="registration_amount" name="member_id" value="<?=$user_info['member_id']?>">
		<button type="submit" class="btn btn-primary active legitRipple center register">Update</button>
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
		data.append('reg_type','1');
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