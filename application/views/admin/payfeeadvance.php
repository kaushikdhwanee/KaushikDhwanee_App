<style>
  .nav-tab li{
  display:inline-block;
   font-size:16px;
   color:#444;
  }
  .change{
	color:red;
	font-style: italic;
    cursor: pointer;
    float:right;
	

}
.nav-tab li a{
   padding:9px 20px;
}
.nav-tab li:hover{
    background-color: #2196F3;
 color:#fff !important;
}
 .nav-tab li.active a{
 background-color: #2196F3;
 color:#fff !important;
 }
</style>

<div class="content-wrapper">
   <div class="row">

      <div class="col-lg-12">

      	<ul class="nav nav-tab">

       <li  class="<?= in_array($this->uri->segment(2),array("collectfees"))? "active" : ""  ?>"> <a href="<?=base_url("admin/collectfees/")?>">Collect Fees </a></li>
            <li  class="<?= in_array($this->uri->segment(2),array("viewpendingpayments"))? "active" : ""  ?>"><a href="<?=base_url("admin/viewpendingpayments")?>">Pending Payments</a></li>

            <li  class="<?= in_array($this->uri->segment(2),array("payfeeadvance"))? "active" : ""  ?>"><a href="<?=base_url("admin/payfeeadvance")?>">Advance Payments</a></li>
          
      </ul>

     	<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Advance Fees Payment</h5>
								
							</div>
							<form method="post" action="<?=base_url("admin/insertpaymentsadvance")?>" id="enrollstudent">
							<div class="col-md-12 product">

			                        <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Student Name</p></label>
									  <div class="form-group  col-md-4">
	
                                        <select  class="select" name="member_id" id="member_id">
						                    <option value=""> Select user</option>

			                               <?php
			                            	if(!empty($all_users))
			                            	{
			                            		foreach ($all_users as $cat_info) 
			                            		{
			                            			//if( !in_array($cat_info['id'], $active_classes)){
			                            				
			                            			
			                            			?>
			                            			 <option value="<?=$cat_info['member_id']?>"><?=$cat_info['name']."(".$cat_info['mobile'].")"?></option> 
			                            	<?php	}//}
			                            	}
			                            	?>
						                </select>							
								</div>

									<div class="clearfix"></div>
								</div>
								  <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Select Class</p></label>
									 <div class="form-group  col-md-4">
	
									  <select  class="select" name="enroll_student_id" id="class_id">
						                    <option value=""> Select class</option>

			                               <?php
			                            	/*if(!empty($classes))
			                            	{
			                            		foreach ($classes as $cat_info) 
			                            		{
			                            			if( !in_array($cat_info['id'], $active_classes)){
			                            				
			                            			
			                            			?>
			                            			 <option value="<?=$cat_info['id']?>"><?=$cat_info['class_name']?></option> 
			                            	<?php	}}
			                            	}*/
			                            	?>
						                </select>
							
								</div>

									<div class="clearfix"></div>
								</div> 
								
								 
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Select plan</p></label>
									 <div class="form-group  col-md-4">
	
									  <select  class="select" name="plan_id" id="plan_id">
						                 
	                        			 <option >select plan</option>
	                        			 
						                </select>
							
								</div>

								<label class="control-label col-lg-4"><!-- <p class="sib-dis" >Select Next month plan</p>id="next_plan_amount" -->
								<input type="hidden" name="next_month_amount" id="next_month_amount" class="form-control">
								
								</label>

									<div class="clearfix"></div>
								</div> 
								
                                   <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">total_sessions </p></label>
									<div class="col-lg-4">
										<div class="input-group">
											
											<input type="text" class="form-control" id="total_sessions" name="total_sessions" value="" placeholder="Sessions">
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Sessions / Week</p></label>
									 <div class="form-group  col-md-4">
	                                   <div class="input-group">
										
										<input type="number" class="form-control" id="number_of_class" class="number_of_class" name="number_of_class" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="" min="1" max="4" value="">
									</div>
									    
								</div>
								<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Start Date</p></label>
								<div class="form-group  col-md-4">
									<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" id="datepicker" class="datepicker1" name="start_date" placeholder="Select Date" value="" >
									</div>
								</div>
								 
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">End Date</p></label>
								<div class="form-group  col-md-4">
									<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" id="datepicker1" class="datepicker1" name="end_date" placeholder="Select Date" value="" >
									</div>
								</div>
								<div class="clearfix"></div>
								</div>
								<div class="form-group">
								<div class="change form-group col-lg-2" id="change_batch">Change Batch</div>
									<div class="clearfix"></div>
								</div>
								<div class="selectdays"></div>
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Amount To Be Paid </p></label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="total_amount" name="total_amount" value="" readonly placeholder="Amount">
											
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
											<input type="text" class="form-control"   id="final_amount" name="final_amount" value="<?=@$registration_amount?>" placeholder="Amount">
											
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
								 <input type="hidden" name="branch_id" id="branch_id" > 
								 <input type="hidden" name="user_id" id="user_id" > 
								 <!-- <input type="hidden" name="member_id" id="" >  -->
								<input type="hidden" name="sibling_discount" id="sibling_discount">
								<input type="hidden" name="enroll_student_id" id="enroll_student_id">
								<input type="hidden" name="price_per_month" id="price_per_month">


								<!-- <input type="hidden" name="next_month_amount" id="next_month_amount" > -->

								<!--<button type="submit" class="btn btn-primary">Pay Now</button>-->
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

    $("button").click(function() {
    //var $btn = $(this);
    //$btn.button('loading');
   $('#loading').show();
    
    $('#enrollstudent').submit();
});




var total_amount=0;
var sibling_discount = 0;
var registration_amount  =0;
var current_month_amount=0;
var current_month_amount_discount=0;
var course_fee=0;
var discount_persent=0;
var final_amount=0;
var feature_months_amount =0;
var member_id = "";
var discount_type= 1;
var class_id;
var sessions_per_week=0;
var price_per_session=0;
var total_sessions = 0;
var attendence=0;
var sessions;
var diff=0;
var start_day;
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
        current_month_amount:"required",
         "selected_batches[]":{
         	required: true
         },
         payment_type: "required"
        
        },
    });

	var newdate = new Date();
	newdate.setDate(newdate.getDate());
	var day = newdate.getDate();
	var month = newdate.getMonth() + 1 ;
	var year = newdate.getFullYear();
	if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;
	var today = day + "-" + month + "-" + year;
	$("#datepicker").attr("value",today);
    

		$("#member_id").change(function(){
			$("#class_id").empty('');
			$("#class_id").append('<option value="">select</option>');

			var member_id = $(this).val();
			$.ajax({
			   		type:"post",
			   		url:"<?=base_url('admin/getclassesbymemberid')?>",
			   		data:{member_id:member_id},
			   		success: function(message){
			   			var resp = JSON.parse(message);
			   			if(resp.success==1)
			   			{
			   				$.each(resp.batches, function(index,value){
			   					
			   					$("#class_id").append('<option value="'+value.class_id+'">'+value.class_name+'</option>');
			   					
			   				});

			   				$("#branch_id").val(resp.user.branch_id);
			   				$("#user_id").val(resp.user.id);
			   				//$("#branch_id").val();
			   				$(".select").selectpicker("refresh");
			   				
			   			}

			   		}
			   	});
		});




		  /* $("#class_id").change(function(){

		   	//$('#plan_id').empty();
		   //	$('#plan_id').append('<option value="">Select Plan</option>');
		   	var class_id = $(this).val();
		   	member_id=$("#member_id").val();
		   //	var branch_id = $("#branch_id").val();
		   	if(class_id!="")// && branch_id!=""
		   	{
		   		$.ajax({
			   		type:"post",
			   		url:"<?=base_url('admin/getpricepermonthbyenroll_id')?>",
			   		data:{enroll_id:class_id},
			   		success: function(message){
			   			var resp = JSON.parse(message);
			   			console.log(resp);//return false;
			   			if(resp.success==1) 
			   			{

			   				price_per_month = resp.data.price_per_month;
			   				sibling_discount = resp.data.sibling_discount;
			   				$("#price_per_month").val(price_per_month);
			   				$("#sibling_discount").val(sibling_discount);

			   				//console.log(price_per_month);
			   			}

			   		}
			   	});
		   	}else{
		   		alert('please select required fields');
		   	}

   		}); */



		   $("#class_id").change(function(){

		   	//$('#plan_id').empty();
		   //	$('#plan_id').append('<option value="">Select Plan</option>');
		   	 class_id = $(this).val();
		   	member_id=$("#member_id").val();
			   $('#plan_id').empty();
		   	//$('#plan_id').append('<option value="">Select Plan</option>');
		   console.log(member_id);
		   	if(class_id!="" )// && branch_id!=""
		   	{
		   		$.ajax({
			   		type:"post",
			   		url:"<?=base_url('admin/getpricepermonthbyenroll_id')?>",
			   		data:{class_id:class_id,member_id:member_id},
			   		success: function(message){
			   			var resp = JSON.parse(message);
			   			console.log(resp);//return false;
			   			if(resp.success==1) 
			   			{     session_taken = resp.data.session_count;
                              total_sessions = resp.data.total_sessions;
							  start_date = resp.data.due_date;
							  sessions_per_week=resp.data.sessions_per_week;
                              var cls = resp.data.plan;
							  var s;
							  if (cls== 1){
                                s = 24;
							  }
							  if (cls== 2){
                                s = 36;
							  }
							  if (cls== 3){
                                s = 48;
							  }
							  if (cls== 4){
                                s = 72;
							  }

							   diff = total_sessions - session_taken;
							   var enroll_id=resp.data.id;
							  console.log(diff);
                              console.log(cls);
                              console.log(total_sessions);
							  console.log(enroll_id);
							  sessions=parseFloat(s)+parseFloat(diff);
							  console.log(sessions);
                             $("#total_sessions").val(sessions);
							 $('#plan_id').append('<option value="1|'+resp.user.plan1+'"> 24 Session (3 months)</option>');
			   				$('#plan_id').append('<option value="2|'+resp.user.plan2+'"> 36 Session (3 months)</option>');
			   				$('#plan_id').append('<option value="3|'+resp.user.plan3+'"> 48 Session (6 months)</option>')
			   				$('#plan_id').append('<option value="4|'+resp.user.plan4+'"> 72 Session (6 months) </option>');

							   
							   $("#plan_id option").each(function(){ 
								var str=$(this).val();
								var str1 = str.split("|");
								var plan = str1[0] ;
                                if(plan == cls){
                            $(this).prop("selected",true);    
        }
    });
							   $('#number_of_class').val(sessions_per_week);
			   				course_fee =  resp.data.course_fee;
							   var enddate = new Date(start_date);
							   
    

    

    if(cls==1||cls==2){
    enddate.setDate(enddate.getDate() + 92);
}
else
	{
		enddate.setDate(enddate.getDate() + 183);
}



    
    var day1 = enddate.getDate();
    
    var month1 = enddate.getMonth() + 1;
    
    var year1 = enddate.getFullYear();

    

    if (month1 < 10) month1 = "0" + month1;
    if (day1 < 10) day1 = "0" + day1;

    
	console.log(today);
    var end_date = day1 + "-" + month1 + "-" + year1;

	

    
    $("#datepicker1").attr("value",end_date);
			   				//sibling_discount = resp.data.sibling_discount;
			   				$("#total_amount").val(course_fee);
			   				$("#sibling_discount").val(sibling_discount);
							   $("#datepicker2").val(start_day);
							   $("#final_amount").val(course_fee);
							   $("#enroll_student_id").val(resp.data.id);
			   				

			   				

			   				//console.log(price_per_month);
			   			}

			   		}
			   	});
		   	}else{
		   		alert('please select required fields');
		   	}

   		}); 


		   $(document).on("change","#plan_id",function(){
             
			 var class_id = $("#class_id").val();
			 var branch_id = $("#branch_id").val();
			 var user_id =$("#user_id").val();
			 var start_date=$("#datepicker").val();
			 if (start_date != "" ) {
			  var dat = $("#datepicker").datepicker("getDate");
		  }
			 var str = $("#plan_id").val();
			 var str1 = str.split("|");
			 course_fee = str1[1];
		  var cls = str1[0];
		  if(cls==1){
			  sessions_per_week = '2';
			   sessions = 24 + parseFloat(diff);
			   dat.setDate(dat.getDate() + parseInt(91));

		  }
		  else if (cls==2) {
			  sessions_per_week = '3';
			   sessions = 36 + parseFloat(diff);
			   dat.setDate(dat.getDate() + parseInt(91));
		  }
		  else if(cls==3) {
			  sessions_per_week = '2';
			   sessions = 48 + parseFloat(diff);
			   dat.setDate(dat.getDate() + parseInt(182));
		  }
			  else {
			  sessions_per_week = '3';
			   sessions = 72 + parseFloat(diff);
			   dat.setDate(dat.getDate() + parseInt(182));
		  }


		  $.ajax({
				 type:"post",
				 url:"<?=base_url('admin/getplan')?>",
				 data:{sessions_per_week:sessions_per_week,class_id:class_id,branch_id:branch_id,user_id:user_id},
				 success: function(message){
					 var resp = JSON.parse(message);
					 if(resp.success==1)
					 {
						 //sibling_discount = resp.sibling_discount;
						 //price_per_month = price_per_month-                                                                                                                                                                                                                                                                                                                        (price_per_month*sibling_discount/100);
						 
						 //price_per_session = price_per_month/(sessions_per_week*4);*/
					  $("#number_of_class").val(sessions_per_week);
						 $("#sessions_per_week").text(sessions_per_week);
						 $(".selectdays").html(resp.weekdays);
						 $("#change_batch").addClass("hidden");
						 $(".select").selectpicker("refresh");
						 $("#total_sessions").val(sessions);
						 $("#course_fee").val(parseFloat(course_fee));
					     total_amount = parseFloat(course_fee).toFixed(2);
					  $("#datepicker1").val($.datepicker.formatDate("dd-mm-yy", dat));
					  $("#total_amount").val(total_amount);
					  $("#final_amount").val(total_amount);
					  
				  
					  $(".select").selectpicker("refresh");
					  

					 

				 }
			 }
		  

	  });
		 
});

$("#change_batch").click(function(){
sessions_per_week=$("#number_of_class").val();
var class_id = $("#class_id").val();
		   	var branch_id = $("#branch_id").val();
		   	var user_id =$("#user_id").val();
		   	

		  $.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin/getplan')?>",
		   		data:{sessions_per_week:sessions_per_week,class_id:class_id,branch_id:branch_id,user_id:user_id},
		   		success: function(message){
		   			var resp = JSON.parse(message);
		   			if(resp.success==1)
		   			{
		   			$(".selectdays").html(resp.weekdays);
		   			$("#batch").addClass("hidden");
                    }
                }
            });
		})

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
			$("#change_batch").addClass("hidden");
			
		 $(".select").selectpicker("refresh");
		 

		}

	}
});
}); 
$(document).on('change',"#datepicker",function(){
		 	//alert("fffffffffff");
		 	var start_date = $(this).val();
            //var offset = $("#selectoffset").val();
            if (start_date != "" ) {
                var dat = $("#datepicker").datepicker("getDate");
                var str = $("#plan_id").val();
		   	    var str1 = str.split("|");	
		   	
		        var cls = str1[0];
                if(cls ==1||cls==2){

                dat.setDate(dat.getDate() + parseInt(91));
            }
            else{
                dat.setDate(dat.getDate() + parseInt(182));
            }
			
            $("#datepicker1").val($.datepicker.formatDate("dd-mm-yy", dat));
		 	total_amount =parseFloat(course_fee);
			   				$("#total_amount").val(parseFloat(total_amount).toFixed(2));
			   				
			   				$("#final_amount").val(Math.round(total_amount));
			   				$(".select").selectpicker("refresh")
			   	
			   		}
			   	});
		   $(document).on('change',".selectday",function(){
		 	
		 	var id = $(this).attr('data');
		 	var class_id = $("#class_id").val();
			var branch_id = $("#branch_id").val();
			var start_date = $("#datepicker").val();
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

		


		

		   $(".discount_type").click(function(){
			discount_type= $(this).val();
			//alert(discount_type);
			$("#admin_discount").val('');
			$("#admin_discount_amount").val('');
		    total_amount1 = parseFloat(course_fee);

			$("#final_amount").val(Math.round(course_fee));
			
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