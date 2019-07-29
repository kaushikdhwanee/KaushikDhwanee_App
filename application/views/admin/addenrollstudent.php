<style>
.loaderdiv{
position: fixed; left: 0; top: 0; z-index: 999; width: 100%; height: 100%; overflow: visible; background: #333 ;opacity: 0.5;
}
.loader {
  margin: 0px auto;
    margin-top: 21%;
}
</style>
<div class="loaderdiv" style="display:none"><div class="loader" ></div></div>


<div class="content-wrapper">
   <div class="row">
      <div class="col-lg-12">
     	<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Enroll Students</h5>
								
							</div>
							<form name="enroll" method="post" action="<?=base_url("admin/insertenrollstudent")?>" id="enrollstudent">
							<div class="col-md-12 product">

								 <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Branch Name</p></label>
									<input type="hidden" name="branch" value="<?=$user_info['branch_id']?>">

									  <div class="form-group  col-md-4">
									    <?=$user_info['branch_name']?>
							
								</div>

									<div class="clearfix"></div>
								</div>
                                      
							     <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Student Name</p></label>
									  <div class="form-group  col-md-4">
									    <?=$user_info['name']?></div><!-- (<?=@$registration_amount?>) -->
							
								


									<div class="clearfix"></div>
								</div>

								
									<div class="form-group hidden">
									<label class="control-label col-lg-4"><p class="sib-dis">Country</p></label>
									<input type="hidden" name="branch" value="<?=$user_info['country']?>">
									<label class="control-label col-lg-4"><p class="sib-dis">Categories</p></label>
									<input _idtype="hidden" name="category" value="<?=$user_info['cat_id']?>">
								    <div class="clearfix"></div>
								</div>
									 
	
								  <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Select Class</p></label>
									 <div class="form-group  col-md-4">
	
									  <select data-placeholder="Select Class" class="select" name="class_id" id="class_id">
						                    <option value=""> Select class</option>

			                               <?php
			                            	if(!empty($classes))
			                            	{
			                            		foreach ($classes as $cat_info) 
			                            		{
			                            			if( !in_array($cat_info['id'], $active_classes)){
			                            				
			                            			
			                            			?>
			                            			 <option value="<?=$cat_info['id']?>"><?=$cat_info['class_name']?></option> 
			                            	<?php	}}
			                            	}
			                            	?>
						                </select>
							
								</div>

									<div class="clearfix"></div>
								</div> 
								
								 <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Select Plan</p></label>
									 <div class="form-group  col-md-4">
	
									    <select data-placeholder="Select Category" class="select " id="plan_id" name="plan_id">

						                            	<option value="">Select Plan</option>

														
						                                
						                            </select>
							
								</div>
								<div class="clearfix"></div>
								</div> 
								<!--<label class="control-label col-lg-4"><p class="sib-dis"> <span id="sessions_per_week"></span> Classes A Week</p></label>-->
									
                                  <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Number of Classes</p></label>
									 <div class="form-group  col-md-4">
	                                   <div class="input-group">
										
										<input type="number" class="form-control" id="number_of_class" class="number_of_class" name="number_of_class" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="" min="1" max="4">
									</div>
									    <!--<select data-placeholder=" Number of classes" class="select " id="number_of_class" name="number_of_class">
									    	<option value ='' id="default_value">Number of Sessions</option>
									     <option value="1">1  </option>
	                        			 <option value="2">2  </option>
	                        			 <option value="3">3  </option> 
	                        			 <option value="4">4  </option>
	                        			 
									    </select>-->
							
								</div>
                               <label class="control-label col-lg-4"><p class="sib-dis"> <span id="sessions_per_week" name="sessions_per_week"></span> Sessions / Week</p></label>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Sessions</p></label>
									 <div class="form-group  col-md-4">
	                                 <div class="input-group">
										
										<input type="text" class="form-control" id="total_sessions" class="session_id" name="total_sessions" placeholder="Total Sessions" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
									</div>
									    
							
								</div>
								<!--<label class="control-label col-lg-4"><p class="sib-dis"> <span id="sessions_per_week"></span> Classes/ Week</p></label>-->
									<div class="clearfix"></div>
								</div>
								<?php if(!empty($registration_date)){?>
								 <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Registration Date</p></label>
								<div class="form-group  col-md-4">
	
									    <?=$user_info['registration_date']?>
								 </div>
									<div class="clearfix"></div>
								</div>
								<?php }?>
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Start Date</p></label>
								<div class="form-group  col-md-4">
									<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" id="datepicker2" class="datepicker1" name="start_date" placeholder="Select Date" >
									</div>
								</div>
								 
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">End Date</p></label>
								<div class="form-group  col-md-4">
									<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" id="datepicker1" class="datepicker1" name="end_date" placeholder="Select Date" value="">
									</div>
								</div>
								 
									<div class="clearfix"></div>
								</div>
								<!--<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Select Days</p></label>
									 <div class="form-group  col-md-4">
	
									  <select  class="selectdays" name="select_id" id="select_id">
						                    <option value=""> Select days</option>

			                               <?php
			                            	if(!empty($classes))
			                            	{
			                            		foreach ($classes as $cat_info) 
			                            		{
			                            			if( !in_array($cat_info['id'], $active_classes)){
			                            				
			                            			
			                            			?>
			                            			 <option value="<?=$cat_info['id']?>"><?=$cat_info['class_name']?></option> 
			                            	<?php	}}
			                            	}
			                            	?>
						                </select>
							
								</div>

									<div class="clearfix"></div>
								</div> -->
								<div class="selectdays"></div>
								
								<!--<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Current Month Amount </p></label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="current_month_amount" name="current_month_amount" value="" placeholder="Amount">
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>

								 

								<!--<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Select Next month plan</p></label>
									 <div class="form-group  col-md-4">
	
									  <select  class="select" name="next_plan" id="next_plan">
						                 <option value="">Select</option>
	                        			 <option value="1|0">1 month (0%)</option> 
	                        			 <option value="3|<?=$discount_info['three_months_discount']?>">3 Months (<?=$discount_info['three_months_discount']?>%)</option> 
	                        			 <option value="6|<?=$discount_info['six_months_discount']?>">6 Months (<?=$discount_info['six_months_discount']?>%)</option> 
	                        			 <option value="12|<?=$discount_info['one_year_discount']?>">1 Year (<?=$discount_info['one_year_discount']?>%)</option> 

	                        			 <option value="">Select</option>
	                        			 <option value="1|0">1 month </option>
	                        			 <option value="2|0">2 months </option>
	                        			 <option value="3|0">3 Months </option> 
	                        			 <option value="4|0">4 months </option>
	                        			 <option value="5|0">5 months </option>
	                        			 
	                        			 <option value="6|0">6 Months </option> 
	                        			 <option value="7|0">7 months </option>
	                        			 <option value="8|0">8 months </option>
	                        			 <option value="9|0">9 months </option>
	                        			 <option value="10|0">10 months </option>
	                        			 <option value="11|0">11 months </option>
	                        			 
	                        			 <option value="12|0">1 Year</option> 
	                        			

			                            	
						                </select>
							
								</div>

								<label class="control-label col-lg-4"><!-- <p class="sib-dis" >Select Next month plan</p>id="next_plan_amount" 
								<input type="text" name="next_month_amount" id="next_month_amount" class="form-control">
								</label>

									<div class="clearfix"></div>
								</div> -->
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
                                    <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Course Fee </p></label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="course_fee" name="course_fee" placeholder="Amount">
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Amount To Be Paid </p></label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="total_amount" name="total_amount" placeholder="Amount">
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Admin Discount <input type="radio" class="discount_type" name="discount_type" checked id="percent" value="1" >Percentage
									<input type="radio" id="amount"  name="discount_type" class="discount_type"  value="2" >Amount</p><input type="text" class="form-control col-md-4" id="admin_discount" name="admin_discount"  onkeypress="return event.charCode>=48 && event.charCode<=57"  placeholder="Discount"></label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="admin_discount_amount"  readonly   placeholder="Discount">
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Final Amount To Be Paid </p></label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control"  id="final_amount" name="final_amount" placeholder="Amount">
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>


									<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Select Payment mode </p></label>

									<div class="col-lg-4">
										<select name="payment_type" class="select box">

									<option value="">Select Payment</option> 

										<option value="1">Cash</option> 

		                                <option value="2">Credit Card/Debit Card</option> 

		                                <option value="3">NEFT</option> 

		                                <option value="4">Cheque</option>
		                                <option value="5">Paytm</option> 

									</select>
									</div>
									<div class="clearfix"></div>
								</div>


								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Final Notes </p></label>

									<div class="col-lg-4">
										<textarea name="comments" class="form-control">

									</textarea>
									</div>
									<div class="clearfix"></div>
								</div>


									
								<div class="clearfix"></div>
								<div class="sub-btn form-group">
								<input type="hidden" name="branch_id" id="branch_id" value="<?=$user_info['branch_id']?>">
								<input type="hidden" name="user_id" id="user_id" value="<?=$user_info['id']?>">
								<input type="hidden" name="member_id" id="" value="<?=$user_id?>">
								<input type="hidden" name="sibling_discount" id="sibling_discount">

								<!-- <input type="hidden" name="next_month_amount" id="next_month_amount" > -->

								<!--<button type="button" data-loading-text="Loading..."  class="btn btn-primary">Pay Now</button>-->
								<button type="button" data-loading-text="Loading..."  class="btn btn-primary">Pay Now</button>
								
								
		</div>
		
						
							</div>
							</form>
							<div class="clearfix"></div>
						</div>
						</div>
      <div class="col-lg-3">
      </div>
   </div>
</div>





<!-- /main content -->
</div>
</div>
<!-- Footer -->

</body>
</html>


<script type="text/javascript">



/*function addDays( i ){
  // i is the reference to the date field, we need the value of that field
  var dateval = $("#datepicker2").val();
            //var offset = $("#selectoffset").val();
            if (dateval != "" ) {
                var dat = $("#datepicker2").datepicker("getDate");
                if($("#plan_id").val()=='1'||$("#session_id").val()=='3'){

                dat.setDate(dat.getDate() + parseInt(90));
            }
            else
                $("#datepicker1").val($.datepicker.formatDate("dd-mm-yy", dat));
            }
}*/


$("button").click(function() {
    //var $btn = $(this);
    //$btn.button('loading');
   $('.loaderdiv').show();
    
    $('#enrollstudent').submit();
});

var total_amount;
var sibling_discount = 0;
var registration_amount  = "<?=$registration_amount==null?0:$registration_amount?>";
var course_fee;
var current_month_amount_discount=0;
var price_per_month;
var discount_persent;
var final_amount;
var feature_months_amount =0;
var member_id = "<?=$user_id?>";
var discount_type= 1;
var enddate ;
//var currnt_month_sessions;
var sessions_per_week;
var session;


var end_date;
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


		$("#enrollstudent").validate({
      rules: {

        class_id:"required",
       /* class_id: {
        	required: true,
        	remote:{
        		url: "<?=base_url('admin/checkstudentclass')?>",
        		type:"POST",
        		data:{
        			class_id:function(){
        				return $("input[name=class_id]").val();
        				},
        			member_id: member_id	
        			},
        	},
        	},*/
        plan_id: "required",
      	start_date:"required",
        course_fee:"required",
         "selected_batches[]":{
         	required: true
         },
         payment_type: "required"
        
        

      },
    });

		   $("#class_id").change(function(){

		   	$('#plan_id').empty();
		   	$('#plan_id').append('<option value="">Select Plan</option>');
		   	var class_id = $(this).val();
		   	var branch_id = $("#branch_id").val();
		   	if(class_id!="" && branch_id!="")
		   	{
		   		
		   	$.ajax({
			   		type:"post",
			   		url:"<?=base_url('admin/getplans')?>",
			   		data:{class_id:class_id,branch_id:branch_id},
			   		success: function(message){
			   			var resp = JSON.parse(message);
			   			if(resp.success==1)
			   			{
			   				
			   				$('#plan_id').append('<option value="1|'+resp.three_session_three_months+'"> 24 Session (3 months) '+resp.two_session_three_months+'</option>');
			   				$('#plan_id').append('<option value="2|'+resp.three_session_three_months+'"> 36 Session (3 months) '+resp.three_session_three_months+'</option>');
			   				$('#plan_id').append('<option value="3|'+resp.two_session_six_months+'"> 48 Session (6 months)  '+resp.two_session_six_months+'</option>')
			   				$('#plan_id').append('<option value="4|'+resp.three_session_six_months+'"> 72 Session (6 months) '+resp.three_session_six_months+'</option>');
			   				//$('#plan_id').append('<option value="5|'+resp.five_session+'"> 5 Session for Week '+resp.five_session+'</option>');
			   					//$('#plan_id').append('<option value="6|'+resp.six_session+'"> 6 Session for Week '+resp.six_session+'</option>');
			   					$(".select").selectpicker("refresh");

			   				

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
		   	course_fee = str1[1];
		    var cls = str1[0];
		    if(cls==1){
		    	sessions_per_week = '2';
		    	 session = '24';
		    	 //end_date = strtotime("+90 day",start_date);

		    }
		    else if (cls==2) {
		    	sessions_per_week = '3';
		    	 session = '36';
		    }
		    else if(cls==3) {
		    	sessions_per_week = '2';
		    	 session = '48';
		    }
		    	else {
		    	sessions_per_week = '3';
		    	 session = '72';
		    }


		    $.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin/getplan')?>",
		   		data:{sessions_per_week:sessions_per_week,class_id:class_id,branch_id:branch_id,user_id:user_id},
		   		success: function(message){
		   			var resp = JSON.parse(message);
		   			if(resp.success==1)
		   			{
		   				sibling_discount = resp.sibling_discount;
		   				//price_per_month = price_per_month-(price_per_month*sibling_discount/100);
		   				
		   				//price_per_session = price_per_month/(sessions_per_week*4);
                        $("#number_of_class").val(sessions_per_week);
		   				$("#sessions_per_week").text(sessions_per_week);
		   				$(".selectdays").html(resp.weekdays);
		   				$(".select").selectpicker("refresh");
		   				$("#total_sessions").val(session);
		   				//course_fee = 0;
						total_amount = parseInt(registration_amount)+parseFloat(course_fee);
						//feature_months_amount =0;
						$("#total_amount").val(parseFloat(total_amount).toFixed(2));
						$("#final_amount").val(Math.round(total_amount));
						$("#course_fee").val(course_fee);
						$("#sibling_discount").val(sibling_discount);
						//$("#next_plan_amount").html(''); 
						//$("#next_plan").val('').trigger('change');
						$(".select").selectpicker("refresh");
						

		   			}

		   		}
		   	});
			

        });
		   

		   $("#number_of_class").change(function(){

		   	var class_id = $("#class_id").val();
		   	var branch_id = $("#branch_id").val();
		   	var user_id =$("#user_id").val();

		   	var str = $(this).val();
		   //	var str1 = str.split("|");	
		   	sessions_per_week = str;
		   	//price_per_month = str1[1];
		   //	price_per_session = price_per_month/(sessions_per_week*4);

		   	$.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin/getplan')?>",
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
		   				$(".select").selectpicker("refresh");
		   				//$("#course_fee").val(course_fee);
						//total_amount = parseInt(registration_amount)+parseFloat(course_fee);
						//feature_months_amount =0;
						//$("#total_amount").val(parseFloat(total_amount).toFixed(2));
						//$("#final_amount").val(Math.round(total_amount));
						
						//$("#sibling_discount").val(sibling_discount);
						//$("#next_plan_amount").html(''); 
						$("#next_plan").val('').trigger('change');
						$(".select").selectpicker("refresh");
						

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
			   		url:"<?=base_url('admin/getbatchclassesbyweekday')?>",
			   		data:{weekday:weekday,class_id:class_id,branch_id:branch_id,start_date:start_date,selected_days:selected_days},
			   		success: function(message){
			   			var resp = JSON.parse(message);
			   			if(resp.success==1)
			   			{
			   				var i=1;
			   				//current_month_amount = parseFloat(price_per_session)*parseFloat(resp.no_days);
			   				//alert(resp.no_days);
			   				
			   				//$("#current_month_amount").val(current_month_amount);
			   				//total_amount = parseFloat(registration_amount)+parseFloat(course_fee);
			   				//$("#total_amount").val(parseFloat(total_amount).toFixed(2));
			   				//$("#final_amount").val(Math.round(total_amount));

			   				$.each(resp.batches, function(index,value){
			   					//console.log(value.start_time);
			   					$("#week"+id).append('<option value="'+value.id+'">Batch'+i+'('+fomartTimeShow(value.start_time)+'-'+fomartTimeShow(value.end_time)+')</option>');
			   					i++;
			   				});
			   				$(".select").selectpicker("refresh");
			   				
			   			}

			   		}
			   	});
		   }
   		});   

		$(document).on('change',"#datepicker2",function(){
		 	//alert("fffffffffff");
		 	var start_date = $(this).val();
            //var offset = $("#selectoffset").val();
            if (start_date != "" ) {
                var dat = $("#datepicker2").datepicker("getDate");
                var str = $("#plan_id").val();
		   	    var str1 = str.split("|");	
		   	
		        var cls = str1[0];
                if(cls ==1||cls==2){

                dat.setDate(dat.getDate() + parseInt(90));
            }
            else{
                dat.setDate(dat.getDate() + parseInt(180));
            }
			
            
		 	
			   	var selected_days = [];

			   	$(".selectday").each(function(){
			   		selected_days.push($(this).val());
			   		 
			   	});

			   	
			   	$.ajax({
			   		type:"post",
			   		url:"<?=base_url('admin/getweekdayscount')?>",
			   		data:{selected_days:selected_days,start_date:start_date},
			   		success: function(message){
			   			var resp = JSON.parse(message);
			   			if(resp.success==1)
			   			{
			   				//current_month_amount = parseFloat(parseFloat(price_per_session)*parseInt(resp.no_days)).toFixed(2);
			   				//$("#current_month_amount").val(current_month_amount);
			   				//$("#datepicker").datepicker(start_date, '+30 days');
                            $("#datepicker1").val($.datepicker.formatDate("dd-mm-yy", dat));
			   				total_amount = parseInt(registration_amount)+parseFloat(course_fee);
			   				$("#total_amount").val(parseFloat(total_amount).toFixed(2));
			   				
			   				$("#final_amount").val(Math.round(total_amount));
			   				$(".select").selectpicker("refresh")
			   			}

			   		}
			   	});
		   }
   		});

   		$("#course_fee").change(function(){
        course_fee = $("#course_fee").val()
        total_amount = parseInt(registration_amount)+parseFloat(course_fee);
			   				$("#total_amount").val(parseFloat(total_amount).toFixed(2));
			   				$("#final_amount").val(Math.round(total_amount));
			   				$(".select").selectpicker("refresh")
			   			})

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
			   		console.log(price_per_month);
			   		current_month_amount_discount = current_month_amount*(discount/100);
			   		abcd = current_month_amount-current_month_amount_discount;
			   		$("#current_month_amount").val(abcd);
			   	/*}*/



			   	feature_months_amount = (parseFloat(price_per_month)*parseFloat(months))-((parseFloat(price_per_month)*parseFloat(months))*(parseFloat(discount)/100));
		   				

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

		$("#current_month_amount").change(function(){
   			current_month_amount = $(this).val();
   			//alert(current_month_amount);
   			var atm = parseFloat(registration_amount)+parseFloat(current_month_amount)+parseFloat(feature_months_amount);
			$("#total_amount").val(parseFloat(atm).toFixed(2));
			$("#final_amount").val(Math.round(atm));
			$("#admin_discount").val('');
			$("#admin_discount_amount").val('');
   		});

   		$("#next_month_amount").change(function(){
   			feature_months_amount = $(this).val();
   			//alert(current_month_amount);
   			var atm = parseFloat(registration_amount)+parseFloat(current_month_amount)+parseFloat(feature_months_amount);
				$("#total_amount").val(parseFloat(atm).toFixed(2));
				$("#final_amount").val(Math.round(atm));
				$("#admin_discount").val('');
				$("#admin_discount_amount").val('');
   		});

		$(".discount_type").click(function(){
			discount_type= $(this).val();
			//alert(discount_type);
			$("#admin_discount").val('');
			$("#admin_discount_amount").val('');
		    total_amount1 = parseFloat(registration_amount)+parseFloat(course_fee)<!---parseFloat(current_month_amount_discount)+parseFloat(feature_months_amount);-->

			$("#final_amount").val(Math.round(total_amount1));
			
		});

		$("#admin_discount").change(function(){
			
			var admin_discount = $(this).val();

		   	if(admin_discount!=null)
		   	{
		   		
		   		//abd=parseFloat(registration_amount)+parseFloat(current_month_amount)+parseFloat(feature_months_amount)-parseFloat(current_month_amount_discount);
		   		abd=parseFloat(course_fee)//parseFloat(feature_months_amount)-parseFloat(current_month_amount_discount);-->


		   		if(discount_type==1)
		   		{
		   			var admin_discount_amount = Math.round(abd*(admin_discount/100));
		   		}else
		   		{
		   			var admin_discount_amount = parseInt(admin_discount);
		   		}
		   		
		   		
		   		final_amount = parseInt(registration_amount)+parseFloat(course_fee)-parseFloat(admin_discount_amount);
		   		$("#final_amount").val(Math.round(final_amount));
		   		$("#admin_discount_amount").val(admin_discount_amount);
		   		$(".select").selectpicker("refresh")
		   	}
		

		});





	});
</script>