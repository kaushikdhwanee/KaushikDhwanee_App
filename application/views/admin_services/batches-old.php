<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url("assets/admin_services/css/batch")?>/bootstrap.css" rel="stylesheet">
		<link href="<?=base_url("assets/admin_services/css/batch")?>/swiper.css" rel="stylesheet">
		<link href="<?=base_url("assets/admin_services/css/batch")?>/style.css" rel="stylesheet">
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
								<h6><i class="fa fa-plus-circle"></i><br>ADD BATCH</h6>
							</div>
							
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							<div class="swiper-slide">
								<div class="batches-box">
									<form>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select name="branch_id" id="branch_id" class="form-control">

						                            	<option value="">Select Branch</option>
						                            	<?php if(!empty($branches)){
						                            		foreach ($branches as $branch_info) {?>
						                            		<option value="<?=$branch_info['id']?>"><?=$branch_info['branch_name']?></option>
						                            	<?php	}
						                            		}?>
						                               

						                            </select>
												<i class="fa fa-download" aria-hidden="true"></i>
											</div>
											
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select  name="class_id" id="class_id" class="form-control">
													<option value="">Select class</option>
													
												</select>
												<i class="fa fa-download" aria-hidden="true"></i>
											</div>
										</div>
									</form>
									
									<div class="panel-group getbatches" id="accordion " role="tablist" aria-multiselectable="true"></div><!-- panel-group -->
								</div><!--teacher-box end--->
							</div><!---swiper-slide end 3-->
							
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
				</div><!--offer end-->
			</section><!--tab slide end-->
		</div><!--hidden-sm hidden-lg hidden-md-->
	
		
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="<?=base_url("assets/admin_services/")?>js/bootstrap.min.js"></script>
		<script src="<?=base_url("assets/admin_services/")?>js/swiper.js"></script>
		
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
	
		
		<!--accordion code-->
		<script>
			function toggleIcon(e) {
				$(e.target)
					.prev('.panel-heading')
					.find(".more-less")
					.toggleClass('glyphicon-plus glyphicon-minus');
			}
			$('.panel-group').on('hidden.bs.collapse', toggleIcon);
			$('.panel-group').on('shown.bs.collapse', toggleIcon);
		</script>
		<script>
 var branch_id="";
 var class_id ="";

$(function(){

    $('#teacher1').find(".multiselect-selected-text").text('Select Teacher ');

})
$(document).ready(function(){


$("#branch_id").change(function(){

		 branch_id = $(this).val();

		var options = "<option value=''>Select class</option>" ;
		
		$.ajax({
			type:"post",
			url:"<?=base_url('admin_services/getclasses')?>",
			data: {"branch_id":branch_id},
			success:function(data){
                    var results = JSON.parse(data);
                    var classes = results.classes;
                    var length =classes.length;
                    if(length>0)
                    {
                    	
                    	$.each(classes,function(index,value){
                    		options += "<option value='"+value.id+"'>"+value.class_name  +"</option>"
                      	
                    	});	
                    	$('#class_id').html(options);
                    	//$(".select").selectpicker("refresh");

                    
                    }
                    
                }
		})
});

$("#class_id").change(function(){

		 class_id = $(this).val();

		$.ajax({
			type:"post",
			url:"<?=base_url('admin_services/getbatches')?>",
			data: {"branch_id":branch_id,class_id:class_id},
			success:function(data){
                   
                    $('.getbatches').html(data);
                    /*$(".multiselect").multiselect("refresh");
                    $(".form-control").pickatime("refresh");*/
                    
                }
		})
});

});
</script>
	</body>
	</html>