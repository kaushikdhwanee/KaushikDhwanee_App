<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/admin_services/css/collect-fee')?>/bootstrap.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/collect-fee')?>/swiper.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/collect-fee')?>/style.css" rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="images/shor-cut.jpg" />
		<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<![endif]-->
		<style>
	
		</style>
	</head>
	<body>
		<div class="hidden-lg hidden-sm hidden-md">
			
			<!-- <h4 class="text-center">TEACHER</h4> -->
			<section id="scroller" class="overflow">
				<div id="content" class="offer">
					<div class="swiper-container gallery-thumbs top-menu">
						<div class="swiper-wrapper some">
							<div class="swiper-slide over">
								<h6><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 17px;"></i><br>COLLECT FEE</h6>
							</div>
							<div class="swiper-slide over" >
								<h6><i class="fa fa-eye" aria-hidden="true" style="font-size: 17px;"></i><br>VIEW RECEIPTS</h6>
							</div>
						</div>
					</div>
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							<div class="swiper-slide">
								
								<div class="class-add-box" style="margin-top:23%;">
									<div class="search-box" >
										<form>
											<div class=" col-md-4">
												 <select  class="form-control" name="user_id"  id="mobile">
						                            	<option value=""> Select Mobile</option>

			                               <?php
			                            	if(!empty($users))
			                            	{
			                            		foreach ($users as $cat_info) 
			                            		{
			                            			?>
			                            			 <!-- <option value="<?=$cat_info['id']?>"><?=$cat_info['mobile']?></option> --> 
			                            			  <option value="<?=$cat_info['id']?>"><?=$cat_info['mobile']."(".$cat_info['name'].")"?></option> 
			                            <?php   }
			                            	}
			                            	?>


						                                
						                            </select>
											</div>
											<!--  <div class=" col-md-4">
	
									    			<select  class="form-control" name="member_id" id="members">
						                            	<option value=""> Select User</option>

			                              


						                                
						                            </select>
							
								</div>  -->
								<!-- <div class=" col-md-4">
	
									    <select  class="form-control" name="month" id="month">
						                            	<option value=""> Select Month</option>
						                            	<?php 
						                            	for ($i=0; $i <12 ; $i++) { ?>
						                            	
						                            	<option value="<?= date("m-Y", strtotime("+".$i." month"))?>"><?= date("M Y", strtotime("+".$i." month"))?></option>
														<?php }
														for ($i=1; $i <12 ; $i++) {
						                            	?><option value="<?= date("m-Y", strtotime("-".$i." month"))?>"><?= date("M Y", strtotime("-".$i." month"))?></option>
														<?php }?>
			                              
						                            </select>
							
								</div>  -->
										</form>
									</div>
									
						
									<div class="student_info"></div>
								</div>
								
							</div><!--1-->
							<div class="swiper-slide">
								<div class="class-add-box"  style="margin-top:23%;">
									<div class="search-box" >
										
											<div class=" col-md-4">
												 <select  class="form-control" name="user_id"  id="mobile1">
						                            	<option value=""> Select Mobile</option>

			                               <?php
			                            	if(!empty($users))
			                            	{
			                            		foreach ($users as $cat_info) 
			                            		{
			                            			?>
			                            			 <option value="<?=$cat_info['id']?>"><?=$cat_info['mobile']?></option> 
			                            <?php   }
			                            	}
			                            	?>


						                                
						                            </select>
												
											</div>
										
									</div>
									
									<br>
									<div class="fee-box1">
										<table class="table">
											<thead>
											  <tr>
												<th>Date&Tiime </th>
												<th>ReceiptNo</th>
												<th>Amount</th>
												<th>Payment type</th>
											  </tr>
											</thead>
											<tbody class="results">
												<tr>
													<td>No results found</td>
													<!-- <td><a href="#regstNo" id="txt-line-remve" data-toggle="modal"> 12-06-2017<br><span style="color:rgb(179,179,179);">18:23:33</span></a></td>
													<td>AB126</td>
													<td><i class="fa fa-rupee"></i>&nbsp;2000</td> -->
												</tr>
												
											
											</tbody>
										</table>
									</div>
								</div>
							</div><!--2-->
						</div>
					</div>
				</div>
			</section>
		</div>
		
		<!-- teacher details Modal -->
			<div id="regstNo" class="modal fade" role="dialog">
				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header view-popup-box-header">
							<a href="#" id="header-popup-icn"><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a>
							<h4 class="modal-title">View Receipt</h4>
						</div>
						<div class="modal-body" style="background:#f3f3f3;">
							<div class="popup-class">
								<div class=" popup-box-clr">
									<div class="row">
										<div class="col-xs-4">
											<img src="images/popup1.jpg" class="img-circle img-responsive "/>
										</div>
										<div class="col-xs-5">
											<span class="txt-popup-stle">BollyWoodDance</span>
										</div>
										<div class="col-xs-3">
											<h4 class="txt-popup-stle1" ><i class="fa fa-rupee" style="color:rgb(237,28,36);"></i>1500</h4>
										</div>
									</div>
								</div>
								<div class=" popup-box-clr">
									<div class="row">
										<div class="col-xs-4">
											<img src="images/popup2.jpg" class="img-circle img-responsive "/>
										</div>
										<div class="col-xs-5">
											<span class="txt-popup-stle">Kuchipudi</span>
										</div>
										<div class="col-xs-3">
											<h4 class="txt-popup-stle1" ><i class="fa fa-rupee" style="color:rgb(237,28,36);"></i>1500</h4>
										</div>
									</div>
								</div>
								
								
									<table class="table tble-box">
										<tr>
											<td><span>Promocode:</span><span class="promo-box">29cff9</span></td>
											<td><span style="float: right;"><i class="fa fa-rupee" style="color:rgb(237,28,36);"></i>3000</span></td>
										</tr>
										<tr>
											<td><span>Discount:</span><span>10%</span></td>
											<td><span style="float: right;"><i class="fa fa-rupee" style="color:rgb(237,28,36);"></i>2700</span></td>
										</tr>
										<tr>
											<td><span>NEFT</span></td>
											<td><span style="float: right;">Transaction </td>
										</tr>
									</table>
								
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- teacher details Modal end-->	
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
<script>

	$(document).ready(function(){
		
/*		$("#mobile").change(function(){
			var id = $(this).val();
			$("#members").empty("");
			$("#members").append('<option value="">select</option>'); 
			$.ajax({
				type:"post",
				url:"<?=base_url('admin_services/getstudents')?>",
				data:{id:id},
				success: function(message){
					var resp = JSON.parse(message);
			   			if(resp.success==1)
			   			{
			   				
			   				$.each(resp.students, function(index,value){
			   					//console.log(value.start_time);
			   					$("#members").append('<option value="'+value.id+'">'+value.name+'</option>');
			   					//i++;
			   				});

			   				//$(".select").selectpicker("refresh");

			   			}
				}
			});
			
		});*/

		$("#mobile").change(function(){
			
			var  user_id = $(this).val();
			
			$.ajax({
				type:"post",
				url:"<?=base_url('admin_services/getstudentbatches')?>",
				data:{user_id:user_id},//member_id:member_id,month:month,
				success: function(message){

			   		$(".student_info").html(message);
			   				
				}
			});
			
		});





    $("#mobile1").change(function(){
         var id = $(this).val();
        
         $.ajax({
            type:"post",
            url:"<?=base_url('admin_services/getreceipts')?>",
            data:{id:id},
            success: function(message){
               $(".results").html(message);
                     
            }
         });
         
      });
      

	});

</script>

<script>

$('.answer').hide();
$('.cool1').on('click', function(){
$(this).css("background", "#F4F4F4");
  $('.answer').show();
});


$('.answer1').hide();
$('.cool2').on('click', function(){
$(this).css("background", "#F4F4F4");
  $('.answer1').show();
});

$('.answer3').hide();
$('.cool3').on('click', function(){
$(this).css("background", "#F4F4F4");
  $('.answer3').show();
});
</script>

	
	</body>
	</html>