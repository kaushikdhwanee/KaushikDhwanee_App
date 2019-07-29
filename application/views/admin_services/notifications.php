<!DOCTYPE html>

<html>

	<head>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="<?=base_url('assets/admin_services/css/branch')?>/bootstrap.css" rel="stylesheet">

		<link href="<?=base_url('assets/admin_services/css/branch')?>/swiper.css" rel="stylesheet">

		<link href="<?=base_url('assets/admin_services/css/branch')?>/style.css" rel="stylesheet">

		<link rel="shortcut icon" type="image/x-icon" href="images/shor-cut.jpg" />

		<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet"> 

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">

		<style>

		   .new_image{

    width:100px;

    height:100px;

    border-radius:50%;

    border:2px solid #ccc;

   

} 
.view-tech-txt{
	font-size: 13px;
    position: absolute;
    top: -12px;
    left: 30px;
    font-weight: bold;
    margin-top: 10px;
    color: #000;
    width: 100%;
}
.view-small-txt {
    position: absolute;
    top:0px;
    left: 30px;
    margin-top: 17px;
    color: #b3b3b3;
    width: 100%;
        font-size: 12px;
}

		</style>

	

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

								<h6><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 17px;"></i><br>ADD Notification</h6>

							</div>

							<div class="swiper-slide over" >

								<h6><i class="fa fa-eye" aria-hidden="true" style="font-size: 17px;"></i><br>VIEW Notifications</h6>

							</div>

							

						</div>

					</div><!---menu---->

					<div class="swiper-container gallery-top">

						<div class="swiper-wrapper swiper1" >

							<div class="swiper-slide">

								<div class="branch-box">

									<form method="post" id="notification" enctype="multipart/form-data" action="<?=base_url("admin_services/sendnotification")?>">

											<div class="form-group">

												<div class="icon-addon addon-lg">

													<select data-placeholder="Select branch" name="branch_id" id="branch_id" class="select form-control">

									                	<option value="">Select Branch</option>
									                	<?php if(!empty($branches)){
									                		foreach ($branches as $branch_info) {?>
									                		<option value="<?=$branch_info['id']?>"><?=$branch_info['branch_name']?></option>
									                	<?php	}
									                		}?>
									                   

									                </select>

												</div>

											</div>

											<div class="form-group">

												<div class="icon-addon addon-lg"> 
												<select data-placeholder="Select Classes " multiple="multiple" name="class_id[]" id="class_id"  class="multiselect form-control">

						                            	<!-- <option value="">Select Class</option>	 -->					                               

						                            </select></div>

												<div class="map_canvas" style="display:none"></div>

											</div>

											

											<div class="form-group">

												<div class="icon-addon addon-lg">

													<textarea name="message" class="form-control" placeholder="Description" ></textarea>


												</div>

											</div>

								<div class="form-group">

								

									<input type="submit"  class="form-control"  value="SUMBIT"> 


								</div>

								</form>

								</div>

							</div><!---1menu end---->

							<div class="swiper-slide bg-clr-total-box">

								<div class="branch-box">

								 <?php if(!empty($notifications)){

                                

                                    foreach ($notifications as $branch_infoz) {?>

									<div class="paper">

										<div class="row ">

											<div class="col-xs-4">

												<a data-toggle="modal" class="getbranch" data="<?=$branch_infoz['id']?>" id="clsses-link" >

													<span class=""><?=$branch_infoz['branch_name']?></span>

													<small class=""><?=@$branch_infoz['class_name']?></small>

												</a>

											</div>

											<div class="col-xs-8">
                                            	<small class=""><?=@$branch_infoz['message']?></small>
                                            </div>
											
											

										</div>

										  <div class="ripple"></div>

									</div>

									<?php }

                                 }
                                 else
                                 {
                                    echo "<tr><td>No results found</td></tr>" ;  

                                 }

                                 ?>

									<!--1box-->

									

								</div><!---teach-app end--->

							</div><!---2menu end---->

							

						</div><!----swiper-wrapper swiper1 end-->

					</div><!---tab-content end---->

				</div>

			</section>

		</div><!---hidden--->

		

		<!-- myBranch Modal -->

			<div id="classDetails" class="modal fade" role="dialog"></div>

			<!-- myDetails Modal end-->	



			





		<script src="<?=base_url("assets/admin_services/js/jquery.min.js")?>"></script>

		<script src="<?=base_url("assets/admin_services/js/jquery.validate.js")?>"></script>





		<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAIBZT8aT2n2k8VtZ1J1b6GF8bN0uAvN_g"></script>



		    <script src="<?=base_url("assets/admin/js/jquery.geocomplete.js")?>"></script>





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

			<script>

				

			</script>

	</body>

	</html>



	 <script type="text/javascript">

$(document).ready(function(){


$("#branch_id").change(function(){

		 branch_id = $(this).val();

		var options = "" ;//<option value=''>Select class</option>
		
		$.ajax({
			type:"post",
			url:"<?=base_url('admin/getclasses')?>",
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
                    	//categCheck.multiselect('rebuild');
                     


                    
                    }
                    
                }
		})
});

$("#notification").validate({
   rules: {
        branch_id: "required",
        message:"required",
        
      },
});

});
</script>


<script type="text/javascript">

			$(document).on("click",".getbranch1111",function(){

				

				var branch_id = $(this).attr('data');

				$.ajax({

					type:"post",

					url:"<?=base_url("admin_services/getbranch")?>",

					data:{branch_id:branch_id},

					success: function(message)

					{

						$("#classDetails").html(message);

						 $('#classDetails').modal('show');

					}

				});

			});

		</script>