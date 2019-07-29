<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/admin_services/css/student')?>/bootstrap.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/student')?>/swiper.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/student')?>/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<![endif]-->
		
	</head>
	<body>
		<div class="hidden-lg hidden-sm hidden-md">
			<section id="scroller" class="overflow">
				<div id="content" class="offer">
					<div class="swiper-container gallery-thumbs top-menu">
						<div class="swiper-wrapper some">
							<div class="swiper-slide over" id="abc1">
								<h6><i class="fa fa-plus-circle"></i><br>CREATE STUDENT</h6>
							</div>
							<!-- <div class="swiper-slide over" id="abc2" >
								<h6><i class="fa fa-eye"></i><br>ENROLL STUDENTS</h6>
							</div> -->
							<div class="swiper-slide over" id="abc3">
								<h6><i class="fa fa-eye"></i><br>VIEW STUDENT</h6>
							</div>
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							<div class="swiper-slide">


								
							    <div class="form-group teacher-box">
    								<label class="radio inline"> <input type="radio" id="new-user" checked name="abc" class=" form-control"><span>New user</span></label>
    								 <label class="radio inline"><input type="radio" id="new-user1" name="abc" class="form-control"><span>Family Member</span></label>
                                </div>
								
								<div class="clearfix"></div>
							

								<div class="">


									
									<form  action="<?=base_url("admin_services/insertstudent")?>"  id="student" method="post">
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="name"  placeholder="Name Of The Student" class="form-control">
												<i class="fa fa-user" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
<!-- 												<input type="text" name="age"  placeholder="Age" class="form-control"  onkeypress="return event.charCode>=48 && event.charCode<=57">
 -->												<select  class="form-control" name="age">
						                            	<option value=""> Select Age</option>

			                               <?php
			                            	
			                            		for ($i=2;$i<=99;$i++) {
			                            			?>
			                            			 <option value="<?=$i?>"><?=$i?></option> 
			                            	<?php	}
			                            	
			                            	?>


						                                
						                            </select><i class="fa fa-user-circle" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="email" name="email" autocomplete="off"  placeholder="Email ID" class="form-control">
												<i class="fa fa-envelope-o" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="number" name="mobile"  autocomplete="off"  placeholder="Phone No" class="form-control"  >
												<i class="fa fa-phone" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="number" name="whatsapp_number"  autocomplete="off"  placeholder="WhatsApp No" class="form-control"  onkeypress="return event.charCode>=48 && event.charCode<=57">
												<i class="fa fa-whatsapp" aria-hidden="true"></i>
											</div>
										</div>
										
										
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="organization_name"  autocomplete="off" placeholder="Name Of Your Organization" class="form-control">
												<i class="fa fa-address-book" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
												<div class="input-group"><span class="input-group-btn">


 <img  src="<?=base_url("assets/admin_services/")?>images/profile.png"   class="img-responcive new_image" onClick="choosePhoto()"  style="width:100px" />
					<input type="hidden" name="image" id="photo1" value="" />												</span></div>
											</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												 <select  name="branch_id" id="branch_id"  class="form-control branch_id">

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
												<i class="fa fa-rupee" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="number" placeholder="Registration Fee"  autocomplete="off" name="registration_amount" readonly id="registration_amount" class="form-control registration_amount">
												<i class="fa fa-rupee" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<textarea  name="address"  placeholder="Address" class="form-control"></textarea>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
											</div>
										</div>
										
										<div class="checkbox">
											<input type="checkbox" id="checkbox1" name="known_from[]" value="Newspaper">
											<label for="checkbox1">Newspaper Insert</label>
										</div>
										<div class="checkbox">
											<input type="checkbox" id="checkbox2"  name="known_from[]" value="friends">
											<label for="checkbox2">Friend Reference,specify </label>
										</div>
										<div class="checkbox">
											<input type="checkbox" id="checkbox3"  name="known_from[]" value="Just dial" >
											<label for="checkbox3">Just Dial</label>
										</div>
										<div class="checkbox">
											<input type="checkbox" class="specify" id="checkbox4"  name="known_from[]" value="others" >
											<label for="checkbox4">Others,specify </label>
										</div>
										<div class="checkbox">
											<input type="checkbox" class="specify" id="checkbox5" name="known_from[]" value="internet sites" >
											<label for="checkbox5">Internet sites,specify </label>
										</div>

										<div class="form-control other_info" style="display:none">
											<input type="text"  name="other_info" placeholder="Specify Others" >
											
										</div>
										
									
									<div class="form-control">
									  <input type="button" class="register" name="submit" value="Register">

									  <div class="ripple"></div>
									</div><br>
									<div class="form-control">
									  <input type="button" class="enroll" name="submit" value="Register & Enroll">

									  <div class="ripple"></div>
									</div>
									</form>
									<form method="post" action="<?=base_url("admin_services/insertfamilymember")?>" id="family-memeber"  enctype="multipart/form-data" style="display:none">
								
								<div class="form-group">
									
									<span class="input-group-btn">


 <img  src="<?=base_url("assets/admin_services/")?>images/profile.png"   class="img-responcive new_image" onClick="choosePhoto()"  style="width:100px" />
					<input type="hidden" name="image" id="photo1" value="" />												</span>
									
								</div>
		
								  <div class="form-group">
	
									    <select  required class="select box form-control" name="user_id" >
						                            	<option value=""> Select Mobile</option>

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
							
								</div> 
                              <div class="form-group">
								 <input class="form-control" name="name"  placeholder="Family Member name" type="text">
								</div>
								<div class="form-group">
											<div class="icon-addon addon-lg">
												 <select  name="branch_id" id="branch_id"  class="form-control branch_id">

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
												<i class="fa fa-rupee" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="number" placeholder="Registration Fee"  autocomplete="off" name="registration_amount" readonly id="registration_amount" class="form-control registration_amount">
												<i class="fa fa-rupee" aria-hidden="true"></i>
											</div>
										</div>
								<!--<div class="form-group">
								   <input type="file" class="file-styled profile_pic" id="fileupload"  name="image"   >
                                <div id="dvPreview">
                       
                                </div>
								</div>-->
								<!-- <div class="form-group">
									<div class="input-group">
										<span class="input-group-btn">
											<span class="btn btn-info btn-file">Choose File <i  class="fa fa-cloud-upload" aria-hidden="true"></i> <input type="file" class="file-styled profile_pic" id="fileupload"  name="image"   ></span>
										</span>
										 <div id="dvPreview"> </div>
									</div>
								</div> -->
								<div class="form-group">
<!-- 									<button type="submit" class="btn btn-info active btn-block legitRipple center enroll">Register</button>
 -->		<button type="button" class="btn btn-primary active legitRipple center add_family_member">Registration Only</button>
<br>
		<button type="button" class="btn btn-primary active legitRipple center enroll_family_member">Register and Enroll</button>

								</div> 
	
</form>
								</div><!--teacher-box end-->
							</div><!---swiper-slide end 1-->
							
							
							<div class="swiper-slide "></div><!---swiper-slide end 2-->
							
							
							<div class="swiper-slide bg-clr-total-box">
								<div class="teacher-box">
								 <?php if(!empty($users)){
                                    foreach ($users as $user_info) {?>
									<div class="paper">
										<!-- <a href="#viewUser" data-toggle="modal"  data="<?=$user_info['member_id']?>" class="viewuser" id="clsses-link"> -->
											<div class="row">
												<!-- <div class="col-xs-6">
													<img src="<?=($user_info['profile_pic']!="")?base_url("uploads/user_images/".$user_info['profile_pic']):base_url("assets/admin_services/images/temp.jpg")?>" style="width:50px" class="img-circle immg-brder"/>
												</div>
												<div class="col-xs-6">
													<h5 class="clss-txt"><?=$user_info['name']?></h5>
												</div> -->
												<div class="col-xs-6">
												<a  data-toggle="modal" href="#viewUser" class="viewuser" data="<?=$user_info['member_id']?>" id="clsses-link">
													<img src="<?=($user_info['profile_pic']!="")?base_url("uploads/user_images/".$user_info['profile_pic']):base_url("assets/admin_services/images/temp.jpg")?>" class="img-circle immg-brder"/> 
													<span class="view-tech-txt"><?=@$user_info['name']."(".$user_info['mobile'].")"?></span>
													<small class="view-small-txt"><?=$user_info['address']?></small> 
												</a>
											</div>
											<div class="col-xs-6">
												<a href="tel:<?=$user_info['mobile']?>">
													<img src="<?=base_url()?>/assets/admin_services/images/phone.png" class="pull-right" style="height: 30px; margin-top: 10px;">
												</a>
											</div>
											</div>
										<!-- </a> --> 
										<div class="ripple"></div>
									</div><!--1-->
									 <?php }
                                 }else{
                                    echo "<tr><td>No results found</td></tr>" ;  
                                 }
                                 ?>
									
								</div><!--teacher-box end-->
							</div><!---swiper-slide end 3-->
							
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
				</div><!--offer end-->
			</section><!--tab slide end-->
		</div><!--hidden-sm hidden-lg hidden-md--->
	
		<!-- myDetails Modal -->
			<div id="viewUser" class="modal fade" role="dialog"></div>
			<!-- myDetails Modal end-->	
	
			<script src="<?=base_url("assets/admin_services/js/jquery.min.js")?>"></script>
			<script src="<?=base_url("assets/admin_services/js/jquery.validate.js")?>"></script>
			<script src="<?=base_url("assets/admin_services")?>/js/bootstrap.min.js"></script>
			<script src="<?=base_url("assets/admin_services")?>/js/swiper.js"></script>
		<?php include("successmessage.php");?>

		<!---slider tab code-->
		<script>
			var galleryTop = new Swiper('.gallery-top', {
			 
				spaceBetween: 0,
			});
			var galleryThumbs = new Swiper('.gallery-thumbs', {
				spaceBetween: 0,
				centeredSlides: true,
				slidesPerView: 'auto',
				touchRatio: 0.2,
				slideToClickedSlide: true
			});
			galleryTop.params.control = galleryThumbs;
			galleryThumbs.params.control = galleryTop;
			
		</script> 
		
		<!--ripple effect-->
		<script>
				$(document).ready(function() {
			   $(".paper").mousedown(function(e) {
				  var ripple = $(this).find(".ripple");
				  ripple.removeClass("animate");
				  var x = parseInt(e.pageX - $(this).offset().left) - (ripple.width() / 2);
				  var y = parseInt(e.pageY - $(this).offset().top) - (ripple.height() / 2);
				  ripple.css({
					 top: y,
					 left: x
				  }).addClass("animate");
			   });
			});

			//button effect
				$(document).ready(function() {
			   $(".paper1").mousedown(function(e) {
				  var ripple = $(this).find(".ripple");
				  ripple.removeClass("animate");
				  var x = parseInt(e.pageX - $(this).offset().left) - (ripple.width() / 2);
				  var y = parseInt(e.pageY - $(this).offset().top) - (ripple.height() / 2);
				  ripple.css({
					 top: y,
					 left: x
				  }).addClass("animate");
			   });
			});
		</script>

<script>

	$(document).ready(function(){
	    $('#purpose').on('change', function() {
	      if ( this.value == '1')
	      {
	        $("#business").show();
	      }
	      else
	      {
	        $("#business").hide();
	      }
	    });
	});

   $(".branch_id").change(function(){
   	var branch_id = $(this).val();
   	$.ajax({
   		type:"post",
   		url:"<?=base_url('admin_services/getregistrationamount')?>",
   		data:{branch_id:branch_id},
   		success: function(message){
   			var resp = JSON.parse(message);
   			if(resp.status==1)
   			{
   				$("#reg_amount").html(resp.registration_amount);
   				$(".registration_amount").val(resp.registration_amount);

   			}

   		}
   	});
   }); 
$("#new-user").click(function(){
	$("#family-memeber").hide();
	$("#student").show();

});
$("#new-user1").click(function(){
	$("#family-memeber").show();
	$("#student").hide();

});
var vendor_id ="";  
	var profile_pic1 =[];	
	vendor_id ="<?=$this->uri->segment('3')?>";
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

    $(".register").click(function(){
   	if($("#student").valid())
   	{
   		
        var data = new FormData();
		var other_data = $("#student").serializeArray();

		$.each(other_data,function(key,input){

		data.append(input.name,input.value);

		});
   		/*if(profile_pic1.length != 0)
		{
			$.each(profile_pic1,function(index,value){
			data.append('image',value);
			});
	    }*/
		data.append('reg_type','1');
   		$.ajax({
   			type:"post",
   			url:"<?=base_url("admin_services/insertstudent")?>",
   			data:data,
   			contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData:false,
   			success: function(message){
   				var result = JSON.parse(message);
   				if(result.success==1){
					alert("user registered successfully");
					window.location = "<?=base_url('admin_services/addstudent')?>";
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
   			url:"<?=base_url("admin_services/insertstudent")?>",
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
					window.location = "<?=base_url('admin_services/addenrollstudent/')?>"+result.user_id;
   				}
   				else
   				{

   				}
   			}
   		});

   	}	

   	});
$(".viewuser").click(function(){

	var member_id = $(this).attr('data');
	$.ajax({
		type:"post",
		url:"<?=base_url('admin_services/getstudent')?>",
		data:{member_id:member_id},
		success : function(message){
			$("#viewUser").html(message);
		}
	});

});
$(".specify").click(function(){

if($(".specify").is(':checked')){
$(".other_info").show();
}else{
	$(".other_info").hide();
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
   			url:"<?=base_url("admin_services/insertfamilymember")?>",
   			data:data,
   			contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData:false,
   			success: function(message){
   				var result = JSON.parse(message);
   				if(result.success==1){
					alert("Family Member added successfully");
					window.location = "<?=base_url('admin_services/addstudent')?>";
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
   			url:"<?=base_url("admin_services/insertfamilymember")?>",
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
					window.location = "<?=base_url('admin_services/addenrollstudent/')?>"+result.user_id;
   				}
   				else
   				{

   				}
   			}
   		});

   	}	

   	});

</script>
	<script type="text/javascript">
			var is = '<?= $this->uri->segment(3) ?>';
			if(is == '3'){
				//alert("aaaaaaaaaa");
			var s = $("#abc2");
			s.trigger("click");
			
		   }
		

		</script>	
		
	</body>
	</html>