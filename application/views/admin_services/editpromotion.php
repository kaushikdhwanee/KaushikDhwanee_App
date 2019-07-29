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
		<link rel="stylesheet" href="<?=base_url('assets/admin_services/css/teacher')?>/date.css" type="text/css">
	
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="hidden-lg hidden-sm hidden-md">
			
			<!-- <h4 class="text-center">TEACHER</h4> -->
			<section id="scroller" class="overflow">
				<div id="content" class="offer">
					<div class="swiper-container gallery-thumbs top-menu">
						<div class="swiper-wrapper some">
							
							<div class="swiper-slide over" >
								<h6><i class="fa fa-eye" aria-hidden="true" style="font-size: 17px;"></i><br>EDIT PROMOTION</h6>
							</div>
							
						</div>
					</div>
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							
							<div class="swiper-slide">
								<div style="margin-top:18%;">
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
						                            			 <option value="<?=$branch_info['id']?>" <?=@$promotion['branch_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                 </select>
						                 </div>
                                           
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" class="form-control" id="promocode" name="promocode" value="<?=@$promotion['promocode']?>"  placeholder="PromoCode">
												<i class="fa fa-barcode" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<input type="number" id="amount" class="form-control"  value="<?=@$promotion['amount']?>"   name="amount" placeholder="Amount">
											
										</div>
										
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input id="datepicker-example1" class="form-control datepicker-example1"  autocomplete="off"  value="<?=@($promotion['start_date']!="")?date("d-m-Y",strtotime($promotion['start_date'])):""?>"  name="start_date" placeholder="Start Date" type="text">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>

										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input id="datepicker-example1" class="form-control datepicker-example1"  autocomplete="off"  value="<?=@($promotion['end_date']!="")?date("d-m-Y",strtotime($promotion['end_date'])):""?>"  name="end_date" placeholder="End Date" type="text">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>
										
									<input type="hidden" name="id" value="<?=@$promotion['id']?>">
									<button type="submit" >SUMBIT</button>
									</form>
								</div>
							</div><!--2-->

							

						</div>
					</div>
				</div>
			</section>
		</div>
		
	
		<script src="<?=base_url("assets/admin_services")?>/js/jquery.min.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url("assets/admin_services")?>/js/zebra_datepicker.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/bootstrap.min.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/test.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/swiper.js"></script>
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
        promocode:"required"        
      },
    });
     		/*$("#branch_id1").change(function(){
			$("input[name=amount]").val('');
			$("input[name=promocode]").val('');
			var branch_id = $("#branch_id1").val();
		   	if(branch_id !="")
		   	{
		   		$.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin_services/getpromotionaloffer')?>",
		   		data:{branch_id:branch_id},
		   		success: function(message)
		   		{
		   			var resp = JSON.parse(message);
		   			if(resp.success==1)
		   			{
		   				$("input[name=amount]").val(resp.amount);
		   				$("input[name=promocode]").val(resp.promocode);
		   				
		   			}

		   		}
		   	});
		   	}
		   	
   		}); */

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

});
$(".datepicker-example1").Zebra_DatePicker();
</script>
	</body>
	</html>