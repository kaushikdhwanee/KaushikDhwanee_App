<?php
function statusname($status)
{
  switch ($status) {
    case 1:
      return "Pending";
      break;
    case 2:
      return "In Progress";
      break;
    
    case 3:
      return "Demo Scheduled";
      break;
    case 4:
      return "Converted";
      break;
      
    case 5:
      return "Did not Joined";
      break;
    
    default:
      # code...
      break;
  }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/admin_services/css/democlass')?>/bootstrap.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/democlass')?>/swiper.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/democlass')?>/style.css" rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="images/shor-cut.jpg" />
		<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
								<h6><i class="fa fa-eye" aria-hidden="true" style="font-size: 17px;"></i><br>DEMO HISTORY</h6>
							</div>
						</div>
					</div>
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							
							<div class="swiper-slide">
								<div style="margin-top:23%;">
									<?php 
									if(!empty($demos)){
										foreach ($demos as $demo_info) {?>
											

									<div class="sec-box test ripple getdemoclass" data="<?=$demo_info['id']?>" style="border-bottom: 1px solid #cccccc;">
										<div class="row">
											<div class="col-xs-6 ">
												
												<span class="view-tech-txt"><?=$demo_info['name']."(".$demo_info['mobile'].")"?></span>
												<small class="view-small-txt"><?=$demo_info['branch_name']."(".$demo_info['class_name'].")"?></small>
												<small class="view-small-txt2"><?=$demo_info['email']?></small>
												<small class="view-small-txt2"><?=$demo_info['comments']?></small>


											</div>
											<div class="col-xs-6">
												<a href="#" class="">
													<div class="statuss">
													<span><?=statusname($demo_info['status'])?></span>
												 </div>
                                                </a>
											</div>
										</div>
									</div>
									<?php }
									}else{
										echo "No results found";
									}
									?>
								</div>
							</div><!--2-->
						</div>
					</div>
				</div>
			</section>
		</div>
		
		<!-- requests details Modal -->
			<div id="demoDetails" class="modal fade " role="dialog">
				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header view-popup-box-header">
							<a href="#" id="header-popup-icn"><i class="fa fa-pencil pull-right" aria-hidden="true" style="margin-top:0px;"></i></a>
							<h5 class="modal-title">KONDAPUR BRANCH</h5>
							<small>Ajay Sharam</small>
						</div>
						<div class="modal-body">
							<ul class="popup-box-democlass">
								<li>
									<a href="instersted.html" id="demo-popup"><img src="images/thumb-up.png"/>&nbsp;INTERSTED</a>
								</li>
								<li>
									<a href="#" id="demo-popup"><img src="images/dislike.png"/>&nbsp;NOT INTERSTED</a>
								</li>
								<li>
									<a href="#" id="demo-popup"><img src="images/no-questions.png"/>&nbsp;NO ANSWERS
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- requests details Modal end-->	
			
			<!-- history details Modal -->
			<div id="myHistory" class="modal fade" role="dialog">
				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header view-popup-box-header">
							<a href="#" id="header-popup-icn"><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a>
							<h5 class="modal-title">STATUS</h5>
							
						</div>
						<div class="modal-body">
							<center><ul class="pagination">
								<li><a href="#">Completed</a></li>
								<li><a href="#">Delete</a></li>
							</ul></center>
						</div>
					</div>
				</div>
			</div>
			<!-- history details Modal end-->
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/bootstrap.min.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/test.js"></script>
		<?php include ("successmessage.php");?>
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
	</body>
	</html>

	<script type="text/javascript">

			$(document).on("click",".getdemoclass",function(){

				

				var user_id = $(this).attr('data');

				$.ajax({

					type:"post",

					url:"<?=base_url("admin_services/getdemoclass")?>",

					data:{user_id:user_id},

					success: function(message)

					{

						$("#demoDetails").html(message);

						 $('#demoDetails').modal('show');

					}

				});

			});

		</script>