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

								<h6><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 17px;"></i><br>ADD BRANCHES</h6>

							</div>

							<div class="swiper-slide over" >

								<h6><i class="fa fa-eye" aria-hidden="true" style="font-size: 17px;"></i><br>VIEW BRANCHES</h6>

							</div>

							

						</div>

					</div><!---menu---->

					<div class="swiper-container gallery-top">

						<div class="swiper-wrapper swiper1" >

							<div class="swiper-slide">

								<div class="branch-box">

									<form method="post" id="branch" enctype="multipart/form-data" action="<?=base_url("admin_services/insertbranch")?>">

											<div class="form-group">

												<div class="icon-addon addon-lg">

													<input type="text" placeholder="Enter Branch Name" autocomplete="off"  name="branch_name" value="<?=@$branch_info['branch_name']?>" class="form-control">

													<i class="fa fa-user" aria-hidden="true"></i>

												</div>

											</div>

											<div class="form-group">

												<div class="icon-addon addon-lg">

													<input class="form-control" id="geocomplete" name="geolocation" value="<?=@$branch_info['location']?>" autocomplete="off"  placeholder="Location(geolocation)" type="text">

								 					<input type="hidden" name="lat" value="<?=@$branch_info['latitude']?>" data-geo="lat">

                  				  					<input type="hidden" name="lng" value="<?=@$branch_info['longitude']?>" data-geo="lng">

													<i class="fa fa-map-marker" aria-hidden="true"></i>

												</div>

												<div class="map_canvas" style="display:none"></div>

											</div>

											

											<div class="form-group">

												<div class="icon-addon addon-lg">

													<input type="number" placeholder="contact No"  name="mobile" onkeypress="return event.charCode>=48 && event.charCode<=57" value="<?=@$branch_info['mobile']?>" class="form-control">

													<i class="fa fa-mobile" aria-hidden="true"></i>

												</div>

											</div>

											

											

											<div class="form-group">

												<div class="icon-addon addon-lg">

													<input type="email" class="form-control"  placeholder="Email ID"  name="email" value="<?=@$branch_info['email']?>" >

													<i class="fa fa-envelope" aria-hidden="true"></i>

												</div>

											</div>

											<div class="form-group">

												<div class="icon-addon addon-lg">

													<input class="form-control" placeholder="Contact Person"   name="contact_person_name" value="<?=@$branch_info['contact_person_name']?>" >

													<i class="fa fa-phone" aria-hidden="true"></i>

												</div>

											</div>

											<div class="form-group">

												<div class="input-group">

													<span class="input-group-btn">





 <img  src="<?=@($branch_info['logo']=="")?base_url("assets/admin_services/images/profile.png"):base_url("uploads/branch_images/".$branch_info['logo'])?>"   class="img-responcive new_image" onClick="choosePhoto()"  style="width:100px" />

					<input type="hidden" name="image" id="photo1" value="" />												</span>

												</div>

											</div>

											<div class="form-group">

												<div class="icon-addon addon-lg">

													<input type="number" class="form-control" placeholder="Registration Amount"   name="registration_amount" onkeypress="return event.charCode>=48 && event.charCode<=57" value="<?=@$branch_info['registration_amount']?>">

													<i class="fa fa-envelope" aria-hidden="true"></i>

												</div>

											</div>

											<div class="form-group">

												<div class="icon-addon addon-lg">

													<textarea name="address" class="form-control"   placeholder="Address"><?=@$branch_info['address']?></textarea>

													<i class="fa fa-envelope" aria-hidden="true"></i>

												</div>

											</div>

										

									

								<!-- <button>SUMBIT</button> -->

								<div class="form-group"><!--  class="paper1" style="background:rgb(25,182,240);" -->

								<input type="hidden" name="branch_id" value="<?=@$branch_info['id']?>">	

									<input type="submit"  class="form-control"  value="SUMBIT"> 

									<!-- <div class="ripple square"></div> -->

								</div>

								</form>

								</div>

							</div><!---1menu end---->

							<div class="swiper-slide bg-clr-total-box">

								<div class="branch-box">

								 <?php if(!empty($branches)){

                                

                                    foreach ($branches as $branch_infoz) {?>

									<div class="paper">

										<div class="row ">

											<div class="col-xs-8">

												<a data-toggle="modal" class="getbranch" data="<?=$branch_infoz['id']?>" id="clsses-link" >

													<img src="<?=$branch_infoz['logo']!="" ? base_url("uploads/branch_images/".$branch_infoz['logo']):base_url("assets/admin_services/temp.jpg")?>" class="img-circle immg-brder"/>

													<span class="view-tech-txt"><?=$branch_infoz['branch_name']?></span>

													<small class="view-small-txt"><?=$branch_infoz['location']?></small>

												</a>

											</div>

											<div class="col-xs-4">

												<a href="tel:<?=$branch_infoz['mobile']?>">

													<img src="<?=base_url("assets/admin_services/")?>images/phone.png" class="pull-right" style="height: 30px; margin-top: 10px;">

												</a>
												<span class="active-box"><?=$branch_infoz['status']==1?"Active":"Inactive"?></span>
											</div>
											
											<!-- <div class="col-xs-6">
													<span class="txt-box1"><?=$class_info['class_name']?></span>
													
												</div> -->

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

   //function initialize() {}

     $(function(){

     	

        $("#geocomplete").geocomplete({

<?php if(!empty($branch_info)){?>

          location:"<?=$branch_info['location']?>",

          <?php }?>

          map: ".map_canvas",

          details: "form",

          types: ["geocode", "establishment"],

        

        });       

      $("#geocomplete").bind("geocode:dragged", function(event, latLng){

           $("input[name=lat]").val(latLng.lat());

           $("input[name=lng]").val(latLng.lng());

       

          $("#reset").show();

        });

        $("#find").click(function(){

          $("#geocomplete").trigger("geocode");

        });

      

   

      });



</script>

<script type="text/javascript">

  $(document).ready(function(){

  	

    $("#branch").validate({

      rules: {

        branch_name: "required",

        geolocation:"required",

      },

    });

   

  });

</script>

<script type="text/javascript">

			$(document).on("click",".getbranch",function(){

				

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