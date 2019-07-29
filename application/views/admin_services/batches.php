<?php 
$days = array(
      "1"=>'Monday',
        "2"=>'Tuesday',
        "3"=>'Wednesday',
        "4"=>'Thursday',
        "5"=>'Friday',
        "6"=>'Saturday',
        "7"=>'Sunday'
    );

?>
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
		<style>
		    .monday-box{
		       background: #19B6F0!important;
                padding: 10px!important;
                color: #fff!important;
                text-align: center;

		    }
		    .panel-body {
                padding: 5px!important;
            }
            .btn-default{
                background:#fff!important;
                border-bottom:1px solid #ddd;
            }
		</style>
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
							<div class="swiper-slide over">
								<h6><i class="fa fa-plus-circle"></i><br>BATCHES</h6>
							</div>
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
					
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							<div class="swiper-slide">
								<div class="batches-box">
								   
									
    									
    									 <form id="branch-form" method="post" action="<?=base_url("admin_services/insertbatch")?>">
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
									
							             
                            <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <select name="start_time" class="form-control">
                                          <option value="">Start Time</option>
                                          <?php
                                          $x= array("00","30");
                                          for ($i=5; $i<=23; $i++) { 
                                            foreach ($x as $value1) {?>
                                              <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                            <?php }
                                          }
                                          ?>
                                        </select>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <select name="end_time" class="form-control">
                                          <option value="">End time</option>
                                          <?php
                                          $x= array("00","30");
                                          for ($i=5; $i<=23; $i++) { 
                                            foreach ($x as $value1) {?>
                                              <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                            <?php }
                                          }
                                          ?>
                                        </select>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                            <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <div class="multi-select-full" id="teacher1">

    <!-- <select class="selectpicker form-control"  multiple="" data-live-search="true" data-live-search-placeholder="Search" tabindex="-98">
 -->
                                            <select class="form-control" placeholder="select Teachers" name="teachers[]" multiple="multiple" >
                                                 <option value="">Select Teacher</option>
                                                <?php if(!empty($teachers)){
                                                     foreach ($teachers as $teacher_info) {?>
                                                     <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                                                  <?php }
                                                     }?>
                    
                                            </select>
                                        </div>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                              </div>
    							           

                          <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <div class="multi-select-full" id="teacher1">

                                            <select class="form-control" name="type" >
                                                 <option value=""> select Days</option>
                                                    <?php 
                                                    if(!empty($days)){
                                                      foreach ($days as $key=>$value) {?>
                                                        <option value="<?=$key?>"><?=$value?></option>
                                                    <?php  }
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                              </div>
									    
    									 <button class="btn btn-info btn-block" type="submit">SUBMIT</button> 
    									</form>
									</div><!--teacher-box end--->
							    </div><!--- 1st swiper-slide end 3-->
							    <div class="swiper-slide">
							        <div class="batches-box">
							           <form>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select name="branch_id" id="branch_id" class="form-control branch_id">

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
												<select  name="class_id" id="class_id" class="form-control class_id">
													<option value="">Select class</option>
													
												</select>
												<i class="fa fa-download" aria-hidden="true"></i>
											</div>
										</div>
									</form>
									
									<!--<div class="panel-group getbatches" id="accordion " role="tablist" aria-multiselectable="true"></div>--><!-- panel-group -->
									   <div class="getbatches">
                    
                     </div>                   
                                        
									   
									</div>
							    </div><!--2nd swiper-slider-->
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
				</div><!--offer end-->
			</section><!--tab slide end-->
		</div><!--hidden-sm hidden-lg hidden-md-->
	
		
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?=base_url("assets/admin_services/js/jquery.validate.js")?>"></script>
		<script src="<?=base_url("assets/admin_services/")?>js/bootstrap.min.js"></script>
		<script src="<?=base_url("assets/admin_services/")?>js/swiper.js"></script>
		<script src="<?=base_url("assets/admin_services/")?>js/selector.js"></script>
     <?php include 'successmessage.php';?>
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

$(".branch_id").change(function(){

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
                      $('.class_id').html(options);
                      //$(".select").selectpicker("refresh");

                    
                    }
                    
                }
    })
});



$(".class_id").change(function(){

class_id = $(this).val();

$.ajax({
	type:"post",
	url:"<?=base_url('admin_services/getbatchclasses')?>",
	data: {"branch_id":branch_id,class_id:class_id},
	success:function(data){
           
            $('.getbatches').html(data);
          
            
        }
})
});

    
     $("#branch-form").validate({
      rules: {
        branch_id: "required",
        class_id:"required",
        email: "required",
        start_time:"required",
        end_time: "required",
        type: {
          required: true,
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
	</body>
	</html>