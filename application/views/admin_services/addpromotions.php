<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/admin_services/css/promotion')?>/bootstrap.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/promotion')?>/swiper.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/promotion')?>/style.css" rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="images/shor-cut.jpg" />
		<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url('assets/admin_services/css/promotion')?>/date.css" type="text/css">
		
	
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div id="viewUser1" class="modal fade" role="dialog"></div>
		<div class="">
			
			<!-- <h4 class="text-center">TEACHER</h4>hidden-md -->
			<section id="scroller" class="overflow">
				<div id="content" class="offer">
					<div class="swiper-container gallery-thumbs top-menu">
						<div class="swiper-wrapper some">
							<div class="swiper-slide over">
								<h6><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 17px;"></i><br>CREATE PROMOTIONS</h6>
							</div>
							<div class="swiper-slide over" >
								<h6><i class="fa fa-eye" aria-hidden="true" style="font-size: 17px;"></i><br>ADDITIONAL PROMOTIONS</h6>
							</div>
							<div class="swiper-slide over" >
								<h6><i class="fa fa-eye" aria-hidden="true" style="font-size: 17px;"></i><br>VIEW PROMOTIONS</h6>
							</div>
						</div>
					</div>
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							<div class="swiper-slide">
								<div style="margin-top:19%;">
     								<form method="post" id="discount" action="<?=base_url("admin_services/insertdiscount")?>">

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

										<table class="table">
											<tbody>
											<!-- <tr>
													
													<td>
														 <select  name="branch_id" id="branch_id" class="form-select">

						                            	<option value="">Select Branch</option>

						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>" <?=@$discount_info['branch_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                 </select>
													</td>
												</tr> -->
												<tr>
													<td>SiblingDiscounts</td>
													<td>
											<input type="text" class="form-control" value="<?=@$discount_info['sibling_discount']?>" name="sibling_discount" placeholder="Sibling Discounts">

											
														<span><i class="fa fa-percent" aria-hidden="true" style="float: right;margin-top: -24px;"></i></span>
													</td>
												</tr>
												<tr>
													<td>3 Months Upfront Discounts</td>
													<td>
<input type="text" class="form-control" name="three_months_discount"  value="<?=@$discount_info['three_months_discount']?>" placeholder="3 Months Upfront Discounts">

											
														<span><i class="fa fa-percent" aria-hidden="true" style="float: right;margin-top: -24px;"></i></span>
													</td>
												</tr>
												<tr>
													<td>6 Months Upfront Discounts</td>
													<td>
<input type="text" class="form-control" value="<?=@$discount_info['six_months_discount']?>"  name="six_months_discount" placeholder="6 Months Upfront Discounts">

																								<span><i class="fa fa-percent" aria-hidden="true" style="float: right;margin-top: -24px;"></i></span>
													</td>
												</tr>
												<tr>
													<td>12 Months Upfront Discounts</td>
													<td>
<input type="text" name="one_year_discount" value="<?=@$discount_info['one_year_discount']?>" class="form-control" placeholder="12 Months Upfront Discounts"><i class="fa fa-percent" aria-hidden="true" style="float: right;margin-top: -24px;"></i>

																							</td>
												</tr>
												<tr>
													<td>Referal </td>
													<td>
	<input type="text" class="form-control" value="<?=@$discount_info['referral']?>" name="referral" placeholder="Referal">
	<i class="fa fa-rupee" aria-hidden="true" style="float: right;margin-top: -24px;"></i>

													</td>
												</tr>
												<tr>
													<td>Referee </td>
													<td>
											<input type="text" value="<?=@$discount_info['referee']?>" name="referee" class="form-control" placeholder="Referee"><i class="fa fa-rupee" aria-hidden="true" style="float: right;margin-top: -24px;"></i>
													</td>
												</tr>
											</tbody>
										</table>
									<button><input type="submit" name="submit" value="SUBMIT"></button>
									</form>
								</div><!--panel-default end-->
							</div><!--1-->
							<div class="swiper-slide">
								<div style="margin-top:19%;">
									<form method="post" action="<?=base_url("admin_services/insertpromotion")?>" id="add-promotion">

										<div class="form-group">
										<div class="icon-addon addon-lg">

											<select  name="branch_id" id="branch_id1" class="form-select form-control">

						                            	<option value="">Select Branch</option>

						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>" <?=@$discount_info['branch_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                 </select>
						                 </div>
                                           
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" class="form-control" id="promocode" name="promocode" placeholder="PromoCode">
												<i class="fa fa-barcode" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
										    	<div class="icon-addon addon-lg">
											<input type="number" id="amount" class="form-control"  name="amount" placeholder="Amount">
											<i class="fa fa-rupee" aria-hidden="true"></i>
											</div>
										</div>
										
										<!--<div class="form-group">
											<div class="icon-addon addon-lg">
												<input id="datepicker-example1" class="form-control datepicker-example1"  autocomplete="off" name="start_date" placeholder="Start Date" type="text">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>

										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input id="datepicker-example1" class="form-control datepicker-example1"  autocomplete="off" name="end_date" placeholder="End Date" type="text">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>-->
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input id="datepicker-example3" class="form-control"  autocomplete="off" name="start_date" placeholder="Start Date" type="text">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>
											<div class="form-group">
											<div class="icon-addon addon-lg">
												<input id="datepicker-example4"  class="form-control"  autocomplete="off" name="end_date" placeholder="End Date" type="text">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>
									
									<button type="submit" >SUMBIT</button>
									</form>
								</div>
							</div><!--2-->

							<div class="swiper-slide">
								<div style="margin-top:19%;">
								<div class="teacher-box">
								 <?php if(!empty($promotions)){
                                    foreach ($promotions as $user_info) {?>
									<div class="paper" >
										
											<div class="row " >
											
												<div class="col-xs-6">
												<a data-toggle="modal" href="#viewUser" class="viewuser"  data="<?=$user_info['id']?>" id="clsses-link">
													<span class=""><?=@$user_info['promocode']."(".$user_info['branch_name'].")"?></span>
													<small class=""><?=date("d-m-Y",strtotime($user_info['start_date']))."-".date("d-m-Y",strtotime($user_info['end_date']))?></small> 
												</a>
											</div>
											<div class="col-xs-6">
												<a href="#" class="">
													<div class="active-bbbtn">
													<span><?=($user_info['status']==1)?"Active":"In active"?></span>
												 </div>
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
								
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
		</div>
		
	
		<script src="<?=base_url("assets/admin_services")?>/js/jquery.min.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/jquery.validate.js"></script>
        <script src="<?=base_url("assets/admin_services")?>/js/datepicker-promotion.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/bootstrap.min.js"></script>
		
		<script src="<?=base_url("assets/admin_services")?>/js/swiper.js"></script>
		 <script src="<?=base_url("assets/admin_services")?>/js/core.js"></script>
		<?php include("successmessage.php");?>
<script>
     $('#datepicker-example3').Zebra_DatePicker({
                direction: true,
                disabled_dates: ['* * * 0,6']   
            });
            
            
         $('#datepicker-example4').Zebra_DatePicker({
                direction: [1, 10]
            });
</script>
	
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
		<script>
			$(document).on('click', '#close-preview', function(){ 
				$('.image-preview').popover('hide');
				// Hover befor close the preview    
			});

			$(function() {
				// Create the close button
				var closebtn = $('<button/>', {
					type:"button",
					text: 'x',
					id: 'close-preview',
					style: 'font-size: initial;',
				});
				closebtn.attr("class","close pull-right");

				// Clear event
				$('.image-preview-clear').click(function(){
					$('.image-preview').attr("data-content","").popover('hide');
					$('.image-preview-filename').val("");
					$('.image-preview-clear').hide();
					$('.image-preview-input input:file').val("");
					$(".image-preview-input-title").text("Browse"); 
				}); 
				// Create the preview image
				$(".image-preview-input input:file").change(function (){     
					var img = $('<img/>', {
						id: 'dynamic',
						width:250,
						height:200
					});      
					var file = this.files[0];
					var reader = new FileReader();
					// Set preview image into the popover data-content
					reader.onload = function (e) {
						$(".image-preview-input-title").text("Change");
						$(".image-preview-clear").show();
						$(".image-preview-filename").val(file.name);
					}        
					reader.readAsDataURL(file);
				});  
			});
		</script>

		<script type="text/javascript">
  $(document).ready(function(){

  	 $("#discount").validate({
      rules: {
        branch_id:"required",
        sibling_discount: "required",
        three_months_discount:"required",
        six_months_discount:"required",
        one_year_discount: "required",
        referral: "required",
        referee: "required",
        

      },
    });


  	
  		$("#branch_id").change(function(){
			$("input[name=three_months_discount]").val('');
			$("input[name=six_months_discount]").val('');
			$("input[name=one_year_discount]").val('');
			$("input[name=referee]").val('');
			$("input[name=referral]").val('');
			$("input[name=sibling_discount]").val('');
			$("input[name=id]").val('');
		   	
		   	var branch_id = $("#branch_id").val();
		   	if(branch_id !="")
		   	{
		   		$.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin_services/getdiscount')?>",
		   		data:{branch_id:branch_id},
		   		success: function(message){
		   			var resp = JSON.parse(message);
		   			if(resp.success==1)
		   			{
		   				$("input[name=three_months_discount]").val(resp.three_months_discount);
		   				$("input[name=six_months_discount]").val(resp.six_months_discount);
		   				$("input[name=one_year_discount]").val(resp.one_year_discount);
		   				$("input[name=referee]").val(resp.referee);
		   				$("input[name=referral]").val(resp.referral);
		   				$("input[name=sibling_discount]").val(resp.sibling_discount);
		   				$("input[name=id]").val(resp.id);

		   			}

		   		}
		   	});
		   	}
		   	
   		}); 


	$("#add-promotion").validate({
      rules: {
        branch_id:"required",
        amount: "required",
        promocode:"required" ,
        start_date:"required",
        end_date:"required",       
      },
    });
     	

$(".viewuser").click(function(){

	var id = $(this).attr('data');
	$.ajax({
		type:"post",

		url:"<?=base_url('admin_services/getpromotionaloffer')?>",
		data:{id:id},
		success : function(message){
			$("#viewUser1").html(message);
			 $('#viewUser1').modal('show');
		}
	});

});

});
</script>

	</body>
	</html>