<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/admin_services/css/class')?>/bootstrap.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/class')?>/swiper.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/class')?>/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<![endif]-->
		<style type="text/css">
			.bs-searchbox .form-control {
    margin-bottom: 0;
    width: 100%;
    float: none;
}
.new_image{
    width:100px;
    height:100px;
    border-radius:50%;
    border:2px solid #ccc;
  
}
		</style>
	</head>
	<body>
	<!--popup classes -->
		<div id="classDetails" class="modal fade" role="dialog">
				
			</div>
		<div class="hidden-lg hidden-sm hidden-md">
			<section id="scroller" class="overflow">
				<div id="content" class="offer">
					<div class="swiper-container gallery-thumbs top-menu">
						<div class="swiper-wrapper some">
							<div class="swiper-slide over">
							  <h6><i class="fa fa-plus-circle"></i><br>ADD CATEGORY</h6>
							</div>
							<div class="swiper-slide over" >
							  <h6><i class="fa fa-eye"></i><br>VIEW CATEGORIES</h6>
							</div>
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							<div class="swiper-slide">
								<div class="class-box">
									<form method="post" id="addcategory" enctype="multipart/form-data" action="<?=base_url("admin_services/insertcategory")?>">
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" autocomplete="off" placeholder="Enter Category Name"  value="<?=@$category_info['category_name']?>" name="category_name"  class="form-control">
												<i class="fa fa-user" aria-hidden="true"></i>
											</div>
										</div>

										<div class="form-group">
											<div class="input-group">
												<span class="input-group-btn">


 <img  src="<?=@($category_info['logo']=="")?base_url("assets/admin_services/images/profile1.png"):base_url("uploads/category_images/".$category_info['logo'])?>"   class="img-responcive new_image" onClick="choosePhoto()"  style="width:100px" />
					<input type="hidden" name="image" id="photo1" value="" />												</span>
												
											</div>
										</div>
										
										<div class="form-group"><!--  class="paper1" style="background:rgb(25,182,240);" -->
										<input type="hidden" value="<?=@$category_info['id']?>" name="id">
									<input type="submit"  class="form-control"  value="SUMBIT"> 
									<!-- <div class="ripple square"></div> -->
								</div>
									</form>
								</div><!--class-box end--->
								
							</div><!---swiper-slide end 1-->
							
							
							<div class="swiper-slide bg-clr-total-box">
								<div class="class-box">
								 <?php if(!empty($categories)){
                                    foreach ($categories as $class_info) {?>
									<div class="test ripple">
										<a data-toggle="modal" class="getclass" data="<?=$class_info['id']?>" id="clsses-link">
											<div class="row">
												<div class="col-xs-6">
													<img src="<?=base_url("uploads/category_images/".$class_info['logo'])?>" class="img-circle img-responsive immg-brder"/>
													<span class="txt-box"><?=$class_info['category_name']?></span>
												</div>
												
												<div class="col-xs-6">
													
													<span class="active-box"><?=$class_info['status']==1?"Active":"Inactive"?></span>
												</div>
											</div>
										</a>
									</div><!--1-->
									<?php }
                                 }else{
                                    echo "<tr><td> No results found</td></tr>" ;  
                                 }
                                 ?>
									
								</div><!--class-box end-->
							</div><!---swiper-slide end 2-->
							
						</div><!--swiper-wrapper end-->
						
						
					</div><!--swiper-container end-->
				</div><!--offer end-->
			</section><!--tab slide end-->
		</div><!--hidden end-->
		
		
		
		<script src="<?=base_url("assets/admin_services/js/jquery.min.js")?>"></script>
		<script src="<?=base_url("assets/admin_services/js/jquery.validate.js")?>"></script>

		<script src="<?=base_url("assets/admin_services/")?>js/bootstrap.min.js"></script>
		<script src="<?=base_url("assets/admin_services/")?>js/swiper.js"></script>
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
		
		<!--button ripple effect -->
		<script>
			(function(window, $) {

			  $(function() {

				$('.ripple').on('click', function(event) {
				  event.preventDefault();

				  var $div = $('<div/>'),
					btnOffset = $(this).offset(),
					xPos = event.pageX - btnOffset.left,
					yPos = event.pageY - btnOffset.top;

				  $div.addClass('ripple-effect');
				  var $ripple = $(".ripple-effect");

				  $ripple.css("height", $(this).height());
				  $ripple.css("width", $(this).height());
				  $div
					.css({
					  top: yPos - ($ripple.height() / 2),
					  left: xPos - ($ripple.width() / 2),
					  background: $(this).data("ripple-color")
					})
					.appendTo($(this));

				  window.setTimeout(function() {
					$div.remove();
				  }, 2000);
				});

			  });

			})(window, jQuery);
		</script>
		
		<!--file upload-->
		<script type="text/javascript">
			$(document).on("click",".getclass",function(){
				
				var class_id = $(this).attr('data');
				$.ajax({
					type:"post",
					url:"<?=base_url("admin_services/getcategory")?>",
					data:{class_id:class_id},
					success: function(message)
					{
						$("#classDetails").html(message);
						$('#classDetails').modal('show');
					}
				});
			});
		</script>
		
		
		<script type="text/javascript">
  $(document).ready(function(){
  	
    $("#addcategory").validate({
      rules: {
        category_name: "required",
        
      },
    });
   
  });
</script>
	</body>
	</html>