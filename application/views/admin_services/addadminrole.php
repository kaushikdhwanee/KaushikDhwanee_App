<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/admin_services/css/adminrole')?>/bootstrap.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/adminrole')?>/swiper.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/adminrole')?>/style.css" rel="stylesheet">
			<link rel="stylesheet" href="<?=base_url('assets/admin_services/css/teacher')?>/default.css" type="text/css">
		<link rel="stylesheet" href="<?=base_url('assets/admin_services/css/teacher')?>/date.css" type="text/css">
		<link rel="shortcut icon" type="image/x-icon" href="images/shor-cut.jpg" />
		<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		
	
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
							<div class="swiper-slide over">
								<h6><i class="fa fa-plus-circle"></i><br>ADMIN MANAGEMENT</h6>
							</div>
							<div class="swiper-slide over" >
								<h6><i class="fa fa-eye"></i><br>VIEW ADMIN</h6>
							</div>
							
						</div>
					</div><!---menu---->
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							<div class="swiper-slide">
								<div class="branch-box">
								<form method="post" id="adminrole" action="<?=base_url("admin_services/insertadminrole")?>"  >
										<div class="form-group">
										<div class="icon-addon addon-lg">
											<input type="text" value="<?=@$role_info['name']?>" autocomplete="off" name="name" required  placeholder="Enter Admin Name" class="form-control">
											<i class="fa fa-user" aria-hidden="true"></i>
										</div>
									</div>
									<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="number"  value="<?=@$role_info['mobile']?>" autocomplete="off" name="mobile" required  placeholder="Enter Mobile Number" class="form-control">
												<i class="fa fa-mobile" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text"  value="<?=@$role_info['email']?>" autocomplete="off" name="email" required placeholder="Enter EmailID" class="form-control">
												<i class="fa fa-envelope" aria-hidden="true"></i>
											</div>
										</div>
										
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<div class="selectdiv">
													<select class="form-control" name="branch_id" required>
														<option value="">Select Branch</option>
														 <?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>" <?=@$role_info['branch_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>
													</select>
												</div>
												<i class="fa fa-cloud-download" aria-hidden="true"></i>
											</div>
										</div>

										<div class="form-group">

								 				<input class="form-control" autocomplete="off" name="password" placeholder="Password" type="password">

										</div>
										
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input  type="text" placeholder="Date of birth" autocomplete="off" id="datepicker2" class="form-control" value="<?=@($role_info['date_of_birth']!="")?date("d-m-Y",strtotime($role_info['date_of_birth'])):""?>" class="form-control"  name="date_of_birth" >
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>
										
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<textarea class="form-control" name="address" placeholder="Enter Address"></textarea>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group"><span class="input-group-btn">


 <img  src="<?=@($role_info['profile_pic']=="")?base_url("assets/admin_services/images/profile.png"):base_url("uploads/admin_role_images/".$role_info['profile_pic'])?>"   class="img-responcive new_image" onClick="choosePhoto()"  style="width:100px" />
					<input type="hidden" name="image" id="photo1" value="" />												</span></div>
										</div>
									
									
								<!-- <button>SUMBIT</button> -->
								<div class="form-group">
									<input type="submit" class="form-control" name="submit" value="SUBMIT">
									<div class="ripple square"></div>
								</div>
								</form>
								</div>
							</div><!---1menu end---->
							<div class="swiper-slide">
								<div class="branch-box">
									 <?php if(!empty($roles)){
                                
                                    foreach ($roles as $role_info) {?>
									<div class="paper">
										<div class="row ">
											<div class="col-xs-6">
												<a  data-toggle="modal" class="getadminrole" data="<?=$role_info['admin_role_id']?>" id="clsses-link">
													<img src="<?=($role_info['profile_pic']!="")?base_url("uploads/admin_role_images/".$role_info['profile_pic']):base_url("assets/admin_services/images/temp.jpg")?>" class="img-circle immg-brder"/> 
													<span class="view-tech-txt"><?=@$role_info['name']."(".$role_info['mobile'].")"?></span>
													<small class="view-small-txt"><?=$role_info['branch_name']?></small>
												</a>
											</div>
											<div class="col-xs-6">
												<a href="tel:<?=$role_info['mobile']?>">
													<img src="<?=base_url()?>/assets/admin_services/images/phone.png" class="pull-right" style="height: 30px; margin-top: 10px;">
												</a>
											</div>
										</div>
										  <div class="ripple"></div>
									</div>
									<?php }
                                 }else{
                                    echo "<tr><td>No results found</td></tr>" ;  
                                 }
                                 ?>
									
								</div><!---teach-app end--->
							</div><!---2menu end---->
							
						</div><!----swiper-wrapper swiper1 end-->
					</div><!---tab-content end---->
				</div>
			</section>
		</div><!---hidden--->
		
		<!-- myAdmin Modal -->
			<div id="classDetails" class="modal fade" role="dialog"></div>
			<!-- myDetails Modal end-->	

		<script src="<?=base_url("assets/admin_services")?>/js/jquery.min.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/jquery.validate.js"></script>
		
		<script type="text/javascript" src="<?=base_url("assets/admin_services")?>/js/zebra_datepicker.js"></script>
        <script type="text/javascript" src="<?=base_url("assets/admin_services")?>/js/core.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/bootstrap.min.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/swiper.js"></script>
		<?php include ("successmessage.php");?>
		<!----------------tab-slider code start---------------------->
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
		<!----------------tab-slider code end---------------------->
	
		
			<!-------rippel effect-------------->
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
			</script>
			<script>
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

			<script type="text/javascript">
	var vendor_id ="";  	
	vendor_id ="<?=$this->uri->segment('3')?>";
  $(document).ready(function(){
  	
     $("#adminrole").validate({
      rules: {
        name: "required",
       	
		email: "required",
        date_of_birth:"required",
        //password: "required",
        mobile: {
        	required: true,
        	minlength: 10,
        	maxlength: 10,
        	remote:{
        		url: "<?=base_url('admin_services/checkmobile')?>",
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

   
  });
</script>
<script type="text/javascript">
			$(document).on("click",".getadminrole",function(){
				
				var role_id = $(this).attr('data');
				$.ajax({
					type:"post",
					url:"<?=base_url("admin_services/getadminrole")?>",
					data:{role_id:role_id},
					success: function(message)
					{
						$("#classDetails").html(message);
						 $('#classDetails').modal('show');
					}
				});
			});
		</script>
			
	</body>
	</html>