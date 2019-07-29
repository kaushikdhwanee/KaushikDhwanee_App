<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/admin_services/css/plan')?>/bootstrap.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/plan')?>/swiper.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/plan')?>/style.css" rel="stylesheet">
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
							  <h6><i class="fa fa-plus-circle"></i><br>CREATE PLAN</h6>
							</div>
							<!-- <div class="swiper-slide over" >
							  <h6><i class="fa fa-eye"></i><br>VIEW PLAN</h6>
							</div> -->
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							<div class="swiper-slide">
								<div class="plan-box">
									<form id="plan" method="post" action="<?=base_url("admin_services/insertplan")?>">
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<div class="selectdiv">
													<select id="branch_id"  required name="branch_id" class="form-control">

						                            	<option value="">Select</option>

						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>"><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                 </select>
												</div>
												<i class="fa fa-cloud-download" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<div class="selectdiv">
													
													<select   name="class_id" required  id="class_id" class="form-control">

						                            	 	<option value="">Select class</option>

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


												</div>
												<i class="fa fa-cloud-download" aria-hidden="true"></i>
											</div>
										</div>
										
									
									<table class="table">
											<tbody>
												<tr>
													<td>1 class per week </td>
													<td>
													<input class="form-control" name="one_session" required  onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=@$plan_info['one_session']?>" placeholder="Price per Month" type="text">

													</td>
												</tr>
												<tr>
													<td>2 class per week </td>
													<td>
													<input class="form-control" name="two_session" required  onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=@$plan_info['two_session']?>" placeholder="Price per Month" type="text">
													</td>
												</tr>
												<tr>
													<td>3 class per week </td>
													<td>
													<input class="form-control" name="three_session" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=@$plan_info['three_session']?>" placeholder="Price per Month" type="text">
													</td>
												</tr>
												<tr>
													<td>4 class per week </td>
													<td>
													<input class="form-control" name="four_session"  required onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=@$plan_info['four_session']?>" placeholder="Price per Month" type="text">
													</td>
												</tr>
												<tr>
													<td>5 class per week  </td>
													<td>
													<input class="form-control" name="five_session" required  onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=@$plan_info['five_session']?>" placeholder="Price per Month" type="text">
													</td>
												</tr>
												<tr>
													<td>6 class per week  </td>
													<td>
													<input class="form-control" name="six_session" required  onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=@$plan_info['six_session']?>" placeholder="Price per Month" type="text">
													</td>
												</tr>
											</tbody>
										</table>
									<div class="form-group">
									<input type="hidden" name="id" id="plan_id" value="">
									  <p id="num"><input type="submit" name="submit" value="SUBMIT"></p>
									  <div class="ripple"></div>
									</div>
									</form>
								</div><!--plan-box end-->
							</div><!---swiper-slide end 1-->
							
							
							
							
						</div><!--swiper-wrapper end-->
						
						
					</div><!--swiper-container end-->
				</div><!--offer end-->
			</section><!--tab slide end-->
		</div><!--hidden-sm hidden-lg hidden-md--->
	
	
		<script src="<?=base_url("assets/admin_services/js/jquery.min.js")?>"></script>
		<script src="<?=base_url("assets/admin_services/js/jquery.validate.js")?>"></script>


<script src="<?=base_url("assets/admin_services")?>/js/bootstrap.min.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/swiper.js"></script>
		<!---slider tab code-->
<?php include("successmessage.php");?>
		
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
	<!-----ripple effect-->
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
	</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
  	
    $("#plan").validate({
      rules: {
        class_id: "required",
        branch_id:"required",
        one_session:"required",
        two_session:"required",
        three_session: "required",
        four_session: "required",
        five_session: "required",
        six_session: "required",

      },
    });
   
  

  		$("#class_id").change(function(){
		  
		   	var class_id = $(this).val();
		   	var branch_id = $("#branch_id").val();

		   	$("input[name=one_session]").val('');
			$("input[name=two_session]").val('');
			$("input[name=three_session]").val('');
			$("input[name=four_session]").val('');
			$("input[name=five_session]").val('');
			$("input[name=six_session]").val('');
			$("input[name=id]").val('');
		   	//alert(branch_id);alert(class_id);
		   	if(class_id !="" && branch_id !="")
		   	{
		   		$.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin_services/getplanbybranch')?>",
		   		data:{class_id:class_id,branch_id:branch_id},
		   		success: function(message){
		   			var resp = JSON.parse(message);
		   			if(resp.success==1)
		   			{
		   				$("input[name=one_session]").val(resp.one_session);
		   				$("input[name=two_session]").val(resp.two_session);
		   				$("input[name=three_session]").val(resp.three_session);
		   				$("input[name=four_session]").val(resp.four_session);
		   				$("input[name=five_session]").val(resp.five_session);
		   				$("input[name=six_session]").val(resp.six_session);
		   				$("input[name=id]").val(resp.id);

		   			}

		   		}
		   	});
		   	}
		   	
   		}); 

});
</script>