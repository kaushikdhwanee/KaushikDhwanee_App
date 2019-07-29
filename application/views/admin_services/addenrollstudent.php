<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/admin_services/css/student')?>/bootstrap.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/student')?>/swiper.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/student')?>/style.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/teacher')?>/date.css" rel="stylesheet">
				<link rel="stylesheet" href="<?=base_url('assets/admin_services/css/teacher')?>/default.css" type="text/css">


		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<![endif]-->
		
	</head>
	<body>
		<div class="hidden-lg hidden-sm hidden-md">
			<section id="scroller" class="overflow">
				<div id="content" class="offer">
					<div class="enroll-menu top-menu">
						<div class="swiper-wrapper some">
							<div class="swiper-slide over" id="abc2" >
								<h6><i class="fa fa-eye"></i><br>ENROLL STUDENTS</h6>
							</div>
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							
							
							
							<div class="swiper-slide ">
								<div class="teacher-box">
									<form method="post" id="enrollstudent" action="<?=base_url("admin_services/insertenrollstudent")?>" >
										<div class="form-group">
										    <div class="row">
										        <div class="col-xs-6">Student Name:</div>
										        <div class="col-xs-6"><?=$user_info['name']?></div>
										    </div>
										<!--<div class="icon-addon addon-lg">
											<?=$user_info['name']?>
											<i class="fa fa-user" aria-hidden="true"></i>
										</div>-->
										</div>
										
										
										<div class="form-group">
										    <div class="row">
										        <div class="col-xs-6">Branch Name:</div>
										        <div class="col-xs-6"><?=$user_info['branch_name']?></div>
										    </div>
        										<!--<div class="icon-addon addon-lg">
        											<?=$user_info['branch_name']?>
        											<i class="fa fa-user" aria-hidden="true"></i>
        										</div>-->
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select class="form-control"  name="class_id" id="class_id">
													<option value="">Select Class</option>
													<?php
			                            	if(!empty($classes))
			                            	{
			                            		foreach ($classes as $cat_info) 
			                            		{
			                            			?>
			                            			 <option value="<?=$cat_info['id']?>"><?=$cat_info['class_name']?></option> 
			                            	<?php	}
			                            	}
			                            	?>
												</select>
												<i class="fa fa-rupee" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												
												 <select  class="form-control"  id="plan_id" name="plan_id">

						                            	<option value="">Select Plan</option>
														
						                                
						                         </select>
												<i class="fa fa-rupee" aria-hidden="true"></i>
											</div>
										</div>

										
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input  class="form-control"   name="start_date" id="datepicker2"
												 placeholder="Start Date" type="text">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>
										<div class="selectdays"></div>
										
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" class="form-control" id="current_month_amount" readonly name="current_month_amount" value="" placeholder="Current Month Amount">
												<i class="fa fa-rupee" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
									 <!--<label class="control-label col-lg-4"><p class="sib-dis">Select Next month plan</p></label>-->
	                                        <div class="icon-addon addon-lg">
									  <select  class="select form-control" name="next_plan" id="next_plan">
						                 <option value="">Select Next Month Plan</option>
	                        			 <option value="1|0">1 month (0%)</option> 
	                        			 <option value="3|<?=$discount_info['three_months_discount']?>">3 Months (<?=$discount_info['three_months_discount']?>%)</option> 
	                        			 <option value="6|<?=$discount_info['six_months_discount']?>">6 Months (<?=$discount_info['six_months_discount']?>%)</option> 
	                        			 <option value="12|<?=$discount_info['one_year_discount']?>">1 Year (<?=$discount_info['one_year_discount']?>%)</option> 
	                        			 <!-- <option value="<?=$discount_info['id']?>"><?=$discount_info['class_name']?></option>  -->

			                            	
						                </select>
						                	<i class="fa fa-calendar" aria-hidden="true"></i>
							            </div>
								




								<!--<label id="next_plan_amount">Select Next month plan</label>-->

									<div class="clearfix"></div>
								</div> 

								<?php if(!empty($registration_amount)){?>
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Registration Amount </p></label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="" name="registration_amount" value="<?=@$registration_amount?>" placeholder="Amount">
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>

								<?php }?>

								<!--<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Amount To Be Paid </p></label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="total_amount" name="total_amount" value="<?=@$registration_amount?>" placeholder="Amount">
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>-->
									<div class="form-group">
										<div class="icon-addon addon-lg">
											<input type="text" class="form-control" id="total_amount" name="total_amount" value="<?=@$registration_amount?>" placeholder="Amount To Be Paid">
											<i class="fa fa-rupee" aria-hidden="true"></i>
										</div>
									</div>

								
								<div class="form-group">
										<div class="icon-addon addon-lg">
										<label class="control-label col-lg-4"><p class="sib-dis"><input type="radio" class="discount_type" checked name="discount_type" id="percent" value="1" >Percentage
									<input type="radio" id="amount"  name="discount_type" class="discount_type"  value="2" >Amount</p></label>
											
										</div>
									</div>
								
                                
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                            	<div class="icon-addon addon-lg">
                                            	    <input type="number" class="form-control col-md-4" id="admin_discount" name="admin_discount"  onkeypress="return event.charCode>=48 && event.charCode<=57"  placeholder="Admin Discount">
                                            	    <i class="fa fa-rupee" aria-hidden="true"></i>
                                            	 </div>
                                            </div>
                                        </div>
                                         <div class="col-xs-6">
                                             <div class="form-group">
                                            	<div class="icon-addon addon-lg">
                                            	    	<input type="text" class="form-control" id="admin_discount_amount"  readonly   placeholder="Discount">
                                            	    <i class="fa fa-rupee" aria-hidden="true"></i>
                                            	 </div>
                                            </div>
                                             
                                         </div>
                                    </div>
                                     <div class="form-group">
                                    	<div class="icon-addon addon-lg">
                                    	    	<input type="text" class="form-control" readonly id="final_amount" name="final_amount" value="<?=@$registration_amount?>" placeholder="Final Amount To Be Paid">
                                    	    <i class="fa fa-rupee" aria-hidden="true"></i>
                                    	 </div>
                                    </div>

                                    <div class="form-group">
									

									<div class="icon-addon addon-lg">
										<select name="payment_type" class="form-control">

									<option value="">Select Payment mode</option> 

										<option value="1">Cash</option> 

		                                <option value="2">Credit Card/Debit Card</option> 

		                                <option value="3">NEFT</option> 

		                                <option value="4">Cheque</option>
		                                <option value="5">Paytm</option> 

									</select>
									</div>
									<div class="clearfix"></div>
								</div>

                                    
                                    
                                    
								<!--<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Final Amount To Be Paid </p></label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="final_amount" name="final_amount" value="<?=@$registration_amount?>" placeholder="Amount">
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>-->


									
							<div class="form-group">
									<input type="hidden" name="branch_id" id="branch_id" value="<?=$user_info['branch_id']?>">
								<input type="hidden" name="user_id" id="user_id" value="<?=$user_info['id']?>">
								<input type="hidden" name="member_id" id="" value="<?=$user_id?>">
								<input type="hidden" name="sibling_discount" id="sibling_discount">

								<input type="hidden" name="next_month_amount" id="next_month_amount" >
									<input type="submit" name="submit" value="Submit"> 
									  <div class="ripple"></div>
							</div>
							</form>
								</div><!---teacher-box end-->
							</div><!---swiper-slide end 2-->
							
							
							
					</div><!--swiper-container end-->
				</div><!--offer end-->
			</section><!--tab slide end-->
		</div><!--hidden-sm hidden-lg hidden-md-->
	
<script src="<?=base_url("assets/admin_services/js/jquery.min.js")?>"></script>
<script src="<?=base_url("assets/admin_services")?>/js/swiper.js"></script>
<script src="<?=base_url("assets/admin_services/js/jquery.validate.js")?>"></script>
<script src="<?=base_url("assets/admin_services")?>/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?=base_url("assets/admin_services")?>/js/zebra_datepicker.js"></script>
 <script type="text/javascript">
  $('#datepicker2').Zebra_DatePicker({
        format: 'd-m-Y',
    });
 </script>

<?php include("successmessage.php");?>
	
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
		
		<!--ripple effect-->
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

<script>

	$(document).ready(function(){
	    $('#purpose').on('change', function() {
	      if ( this.value == '1')
	      {
	        $("#business").show();
	      }
	      else
	      {
	        $("#business").hide();
	      }
	    });
	});

   $("#branch_id").change(function(){
   	var branch_id = $(this).val();
   	$.ajax({
   		type:"post",
   		url:"<?=base_url('admin_services/getregistrationamount')?>",
   		data:{branch_id:branch_id},
   		success: function(message){
   			var resp = JSON.parse(message);
   			if(resp.status==1)
   			{
   				$("#reg_amount").html(resp.registration_amount);
   				$("#registration_amount").val(resp.registration_amount);

   			}

   		}
   	});
   }); 

</script>

<script type="text/javascript">
var total_amount;
var sibling_discount = 0;
var registration_amount  = "<?=$registration_amount==null?0:$registration_amount?>";
var current_month_amount;
var current_month_amount_discount=0;
var price_per_month;
var discount_persent;
var final_amount;
var feature_months_amount = 0;
var member_id = "<?=$user_id?>";
var discount_type= 1;

//var currnt_month_sessions;
var sessions_per_week;
var price_per_session;
function fomartTimeShow(time24){
var tmpArr = time24.split(':'), time12;
if(+tmpArr[0] == 12) {
time12 = tmpArr[0] + ':' + tmpArr[1] + ' pm';
} else {
if(+tmpArr[0] == 00) {
time12 = '12:' + tmpArr[1] + ' am';
} else {
if(+tmpArr[0] > 12) {
time12 = (+tmpArr[0]-12) + ':' + tmpArr[1] + ' pm';
} else {
time12 = (+tmpArr[0]) + ':' + tmpArr[1] + ' am';
}
}
}
return time12;
}
	$(document).ready(function(){
		   $("#class_id").change(function(){

		   	$('#plan_id').empty();
		   	$('#plan_id').append('<option value="">Select Plan</option>');
		   	var class_id = $(this).val();
		   	var branch_id = $("#branch_id").val();
		   	if(class_id!="" && branch_id!="")
		   	{
		   		$.ajax({
			   		type:"post",
			   		url:"<?=base_url('admin_services/getplans')?>",
			   		data:{class_id:class_id,branch_id:branch_id},
			   		success: function(message){
			   			var resp = JSON.parse(message);
			   			if(resp.success==1)
			   			{
			   				
			   					  $('#plan_id').append('<option value="1|'+resp.one_session+'"> 1 Session for Week '+resp.one_session+'</option>');
			   					  $('#plan_id').append('<option value="2|'+resp.two_session+'"> 2 Session for Week '+resp.two_session+'</option>');
			   					  $('#plan_id').append('<option value="3|'+resp.three_session+'"> 3 Session for Week  '+resp.three_session+'</option>');
			   					  $('#plan_id').append('<option value="4|'+resp.four_session+'"> 4 Session for Week '+resp.four_session+'</option>');
			   					  $('#plan_id').append('<option value="5|'+resp.five_session+'"> 5 Session for Week '+resp.five_session+'</option>');
			   					  $('#plan_id').append('<option value="6|'+resp.six_session+'"> 6 Session for Week '+resp.six_session+'</option>');
			   					  //$(".select").selectpicker("refresh");

			   				

			   			}

			   		}
			   	});
		   	}else{
		   		alert('please select required fields');
		   	}

   		}); 

		   $("#plan_id").change(function(){

		   	var class_id = $("#class_id").val();
		   	var branch_id = $("#branch_id").val();
		   	var user_id =$("#user_id").val();

		   	var str = $(this).val();
		   	var str1 = str.split("|");	
		   	sessions_per_week = str1[0];
		   	price_per_month = str1[1];
		   	price_per_session = price_per_month/(sessions_per_week*4);

		   	$.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin_services/getplan')?>",
		   		data:{sessions_per_week:sessions_per_week,class_id:class_id,branch_id:branch_id,user_id:user_id},
		   		success: function(message){
		   			var resp = JSON.parse(message);
		   			if(resp.success==1)
		   			{
		   				sibling_discount = resp.sibling_discount;
		   				price_per_month = price_per_month-(price_per_month*sibling_discount/100);
		   				price_per_session = price_per_month/(sessions_per_week*4);

		   				$("#sessions_per_week").text(sessions_per_week);
		   				$(".selectdays").html(resp.weekdays);
		   				//$(".select").selectpicker("refresh");
		   				current_month_amount = 0;
						total_amount =0;
						feature_months_amount =0;
						$("#total_amount").val(parseFloat(total_amount).toFixed(2));
						$("#final_amount").val(Math.round(total_amount));
						$("#current_month_amount").val(current_month_amount);
						$("#sibling_discount").val(sibling_discount);
						$("#next_plan_amount").html(''); 
						$("#next_plan").val('').trigger('change');
						//$(".select").selectpicker("refresh");
						

		   			}

		   		}
		   	});
   		}); 

		 $(document).on('change',".selectday",function(){
		 	
		 	var id = $(this).attr('data');
		 	var class_id = $("#class_id").val();
			var branch_id = $("#branch_id").val();
			var start_date = $("#datepicker2").val();
			//alert(start_date);
		 	if(id!=undefined && start_date !="")
		 	{//alert("hiiiiiiii");
			 	$('#week'+id).empty();
			   	$('#week'+id).append('<option value="">Select batch</option>');
			   	
			   	
			   	var weekday = $(this).val();

			   	var selected_days = [];

			   	$(".selectday").each(function(){
			   		selected_days.push($(this).val());
			   	});

			   	
			   	$.ajax({
			   		type:"post",
			   		url:"<?=base_url('admin_services/getbatchclassesbyweekday')?>",
			   		data:{weekday:weekday,class_id:class_id,branch_id:branch_id,start_date:start_date,selected_days:selected_days},
			   		success: function(message){
			   			var resp = JSON.parse(message);
			   			if(resp.success==1)
			   			{
			   				var i=1;
			   				current_month_amount = parseFloat(price_per_session)*parseInt(resp.no_days);
			   				//alert(resp.no_days);
			   				$("#current_month_amount").val(current_month_amount);
			   				total_amount = parseInt(registration_amount)+parseFloat(current_month_amount);
			   				$("#total_amount").val(parseFloat(total_amount).toFixed(2));
							$("#final_amount").val(Math.round(total_amount));

			   				$.each(resp.batches, function(index,value){
			   					//console.log(value.start_time);
			   					$("#week"+id).append('<option value="'+value.id+'">Batch'+i+'('+fomartTimeShow(value.start_time)+'-'+fomartTimeShow(value.end_time)+')</option>');
			   					i++;
			   				});
			   				//selectday$(".select").selectpicker("refresh");
			   				
			   			}

			   		}
			   	});
		   }
   		});   

		$(document).on('change',"#datepicker2",function(){
		 	//alert("fffffffffff");
			var start_date = $(this).val();
			//alert(start_date);
		 	if(start_date !="")
		 	{
			   	var selected_days = [];

			   	$(".selectday").each(function(){
			   		selected_days.push($(this).val());
			   	});

			   	
			   	$.ajax({
			   		type:"post",
			   		url:"<?=base_url('admin_services/getweekdayscount')?>",
			   		data:{selected_days:selected_days,start_date:start_date},
			   		success: function(message){
			   			var resp = JSON.parse(message);
			   			if(resp.success==1)
			   			{
			   				current_month_amount = parseFloat(parseFloat(price_per_session)*parseInt(resp.no_days)).toFixed(2);

			   				$("#current_month_amount").val(current_month_amount);
			   				total_amount = parseInt(registration_amount)+parseFloat(current_month_amount);
			   				$("#total_amount").val(parseFloat(total_amount).toFixed(2));
			   				$("#final_amount").val(Math.round(total_amount));
			   				
			   			}

			   		}
			   	});
		   }
   		});


		$("#next_plan").change(function(){
			feature_months_amount = 0;
			current_month_amount_discount =0;
			//admin_discount =
			var str = $(this).val();
			if(str!="")
			{
				var str1 = str.split("|");	
			   	var months = str1[0];
			   	var discount = str1[1];
			   	/*if(discount!=null)
			   	{*/
			   		current_month_amount_discount = current_month_amount*(discount/100);
			   		abcd = current_month_amount-current_month_amount_discount;
			   		$("#current_month_amount").val(abcd);
			   	/*}*/

			   	feature_months_amount = (parseFloat(price_per_month)*parseInt(months))-((parseFloat(price_per_month)*parseInt(months))*(parseFloat(discount)/100));
				total_amount1 = parseFloat(registration_amount)+parseFloat(current_month_amount)-parseFloat(current_month_amount_discount)+parseFloat(feature_months_amount);
				$("#total_amount").val(parseFloat(total_amount1).toFixed(2));
				$("#final_amount").val(Math.round(total_amount1));


			   	$("#next_plan_amount").text(feature_months_amount); 
			   	$("#next_month_amount").val(feature_months_amount); 
			   	$("#admin_discount").val('');
			   	$("#admin_discount_amount").val('');
			}else
			{
				$("#current_month_amount").val(current_month_amount);
				$("#admin_discount").val('');
				$("#admin_discount_amount").val('');

				$("#total_amount").val(parseFloat(total_amount).toFixed(2));
				$("#final_amount").val(Math.round(total_amount));

			   	$("#next_plan_amount").text(''); 
			   	$("#next_month_amount").val(''); 
			}
		   	

		});

		$(".discount_type").click(function(){
			discount_type= $(this).val();
			//alert(discount_type);
			$("#admin_discount").val('');
			$("#admin_discount_amount").val('');
		    total_amount1 = parseFloat(registration_amount)+parseFloat(current_month_amount)-parseFloat(current_month_amount_discount)+parseFloat(feature_months_amount);

			$("#final_amount").val(Math.round(total_amount1));
			
		});

		$("#admin_discount").change(function(){
			
			var admin_discount = $(this).val();

			//alert(admin_discount);

		   	if(admin_discount!=null)
		   	{
		   		
		   		//abd=parseFloat(registration_amount)+parseFloat(current_month_amount)+parseFloat(feature_months_amount)-parseFloat(current_month_amount_discount);
		   		abd=parseFloat(current_month_amount)+parseFloat(feature_months_amount)-parseFloat(current_month_amount_discount);


		   		if(discount_type==1)
		   		{
		   			var admin_discount_amount = Math.round(abd*(admin_discount/100));
		   		}else
		   		{
		   			var admin_discount_amount = parseInt(admin_discount);
		   		}
		   		
		   		
		   		final_amount = parseInt(registration_amount)+parseFloat(current_month_amount)+parseFloat(feature_months_amount)-parseFloat(admin_discount_amount+current_month_amount_discount);
		   		$("#final_amount").val(Math.round(final_amount));
		   		$("#admin_discount_amount").val(admin_discount_amount);
		   	}
		

		});

		$("#enrollstudent").validate({
      rules: {
        class_id:"required",
        plan_id: "required",
      	start_date:"required",
        current_month_amount:"required",
         "selected_batches[]":{
         	required: true
         },
          payment_type: "required",
      },
    });


		
	});
</script>
	</body>
	</html>