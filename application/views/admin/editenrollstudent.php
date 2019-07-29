<style>
.loaderdiv{
position: fixed; left: 0; top: 0; z-index: 999; width: 100%; height: 100%; overflow: visible; background: #333 ;opacity: 0.5;
}
.loader {
  margin: 0px auto;
    margin-top: 21%;
}
.change{
	color:red;
	font-style: italic;
    cursor: pointer;
    float:right;
	

}
.group{
	margin-left:0;
	padding-left:0;
}
</style>
<!--<div class="loaderdiv" style="display:none"><div class="loader" ></div></div>-->


<div class="content-wrapper">
   <div class="row">
      <div class="col-lg-12">
     	<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Edit Enrollment</h5>
								
							</div>
							<form name="enroll" method="post" action="<?=base_url("admin/insertpaymentsupdate")?>" id="enrollstudent">
							<div class="col-md-12 product">

								 <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Branch Name</p></label>
									<input type="hidden" name="branch" id="branch_id" value="<?=$enroll_info['branch_id']?>">

									  <div class="form-group  col-md-4">
									    <?=$enroll_info['branch_name']?>
							
								</div>

									<div class="clearfix"></div>
								</div>
                                      
							     <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Student Name</p></label>
									  <div class="form-group  col-md-4">
									    <?=$enroll_info['name']?></div><!-- (<?=@$registration_amount?>) -->
							
								


									<div class="clearfix"></div>
								</div>

								
									
									 
	
								  <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Select Class</p></label>
									<input type="hidden" id="class_id" name="class_id" value="<?=$enroll_info['class_id']?>">
									 <div class="form-group  col-md-4">
	                               <?=$enroll_info['class_name']?>
									  
							
								</div>

									<div class="clearfix"></div>
								</div> 
								
								 <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Select Plan</p></label>
									 <div class="form-group  col-md-4">
	
									    <select data-placeholder="Select Category" class="select " id="plan_id" name="plan_id">

						            <option value="1|<?=$enroll_info['plan1']?>"<?php if($enroll_info['plan']==1) echo "SELECTED";?>> 24 Session (3 months) </option>
						            <option value="2|<?=$enroll_info['plan2']?>"<?php if($enroll_info['plan']==2) echo "SELECTED";?>> 36 Session (3 months) </option>
						            <option value="3|<?=$enroll_info['plan3']?>"<?php if($enroll_info['plan']==3) echo "SELECTED";?>> 48 Session (6 months) </option>
						            <option value="4|<?=$enroll_info['plan4']?>"<?php if($enroll_info['plan']==4) echo "SELECTED";?>> 72 Session (6 months) </option>

															                                
						                            </select>
							
								</div>
								<div class="clearfix"></div>
								</div> 
								<!--<label class="control-label col-lg-4"><p class="sib-dis"> <span id="sessions_per_week"></span> Classes A Week</p></label>-->
									
                                  <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Number of Classes</p></label>
									 <div class="form-group  col-md-4">
	                                   <div class="input-group">
										
										<input type="number" class="form-control" id="number_of_class" class="number_of_class" name="number_of_class" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="" min="1" max="4" value="<?=$enroll_info['sessions_per_week']?>">
									</div>
									    
							
								</div>
                               <label class="control-label col-lg-4"><p class="sib-dis"> <span id="sessions_per_week" name="sessions_per_week" value="<?=$enroll_info['sessions_per_week']?>"></span> Sessions / Week</p></label>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Sessions</p></label>
									 <div class="form-group  col-md-4">
	                                 <div class="input-group">
										
										<input type="text" class="form-control" id="total_sessions" class="session_id" name="total_sessions" placeholder="Total Sessions" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=$enroll_info['total_sessions']?>">
									</div>
									    
							
								</div>
								<!--<label class="control-label col-lg-4"><p class="sib-dis"> <span id="sessions_per_week"></span> Classes/ Week</p></label>-->
									<div class="clearfix"></div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Start Date</p></label>
								<div class="form-group  col-md-4">
									<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" id="datepicker2" class="datepicker1" name="start_date" placeholder="Select Date" value="" >
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
								<div class="form-group" id="batch">
                               
									<?php
									foreach ($batchinfo as $value) {?>
										
										<div class="col-md-12 group">
                                     
                                        <label class="control-label col-lg-4"><p class="sib-dis">Selected Batch</p></label>
                                            
                                        	<span class="col-lg-4" id="day"><input type="text" class="form-control" id="batchday" value="<?=$value['type']?>"></span>
                                        	<span class="col-lg-4"><input type="text" class="form-control" id="batchday" value=<?=$value['start_time']?>-<?=$value['end_time']?>></span>
                                        
                                     </div>
										
									<?php 
								}?>
								 <div class="change form-group col-lg-2" id="change_batch">Change Batch</div>
								<div class="clearfix"></div>

								</div>
								<div class="selectdays"></div>
								
                                    <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Course Fee </p></label>
									<div class="col-lg-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="course_fee" name="course_fee" placeholder="Amount" value="<?=$enroll_info['course_fee']?>">
											
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
											<input type="text" class="form-control" id="total_amount" name="total_amount" placeholder="Amount" value="<?=$enroll_info['course_fee']?>">
											
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
											<input type="text" class="form-control"  id="final_amount" name="final_amount" placeholder="Amount" value="<?=$enroll_info['course_fee']?>">
											
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


									
								
								<div class="sub-btn form-group">
								<input type="hidden" name="branch_id" id="branch_id" value="<?=$enroll_info['branch_id']?>">
								<input type="hidden" name="user_id" id="user_id" value="<?=$enroll_info['user_id']?>">
								<input type="hidden" name="member_id" id="" value="<?=$enroll_info['member_id']?>">
								<input type="hidden" name="enroll_id" id="enroll_id" value="<?=$enroll_info['id']?>">
								<input type="hidden" name="hiddendate" id="hiddendate" value="<?=$enroll_info['next_fees_due_date']?>">
								<input type="hidden" name="sibling_discount" id="sibling_discount">
								<input type="hidden" name="select_discount" id="selectdays" value="<?=$enroll_info['selected_days']?>">
								<input type="hidden" name="invoice_id" id="invoice_id" value="<?=$invoice_id?>">

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

<!-- Footer -->

</body>
</html>


<script type="text/javascript">





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

var discount_type= 1;
var enddate ;
//var currnt_month_sessions;
var sessions_per_week;
var session;
var date;
var session_taken;
var session_enddate;
var today;
//var selectdays=$('#selectdays').val();


var end_date;
var price_per_session;

function fomartTimeShow(time24){
var tmpArr = time24.split(':'), time12;
if(+tmpArr[0] == 12) {
time12 = tmpArr[0] + ':' + tmpArr[1] + ' pm';
} else {
if(+tmpArr[0] == 0) {
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
        
        

      }
    });

var enroll_id=$("#enroll_id").val();
var total_sessions=$("#total_sessions").val();

           if(enroll_id!="")
		   	{
		   		
		   	$.ajax({
			   		type:"post",
			   		url:"<?=base_url('admin/getsessionenddate')?>",
			   		data:{enroll_id:enroll_id},
			   		success: function(message){
			   			var resp = JSON.parse(message);
			   			if(resp.success==1)
			   			{ 
                         session_enddate = resp.date;
                         session_taken = resp.count;
                        
                         }
                         var str = $("#plan_id").val();
                         var str1 = str.split("|");
                         var cls = str1[0];
                        var diff= (session_taken-total_sessions)

                         if(diff <= 0){
                        date = $('#hiddendate').val();
                      
                      }
    else{
    
     date = session_enddate;
     
    }
   
    var newdate = new Date(date);
    var enddate = new Date(date);
    newdate.setDate(newdate.getDate() + 1);

    

    if(cls==1||cls==2){
    enddate.setDate(enddate.getDate() + 92);
}
else
	{
		enddate.setDate(enddate.getDate() + 182);
}



    var day = newdate.getDate();
    var day1 = enddate.getDate();
    var month = newdate.getMonth() + 1 ;
    var month1 = enddate.getMonth() + 1 ;
    var year = newdate.getFullYear();
    var year1 = enddate.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    if (month1 < 10) month1 = "0" + month1;
    if (day1 < 10) day1 = "0" + day1;

     today = year + "-" + month + "-" + day;
    var end_date = year1 + "-" + month1 + "-" + day1;

	$("#datepicker2").attr("value", today);

    
    $("#datepicker1").attr("value",end_date);
}


});
}

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


$(function(){
 $('[id*="day"]').find("#batchday").each(function(){

var day;
var batchday = $(this).val()
if(batchday==1){
day="Monday";
}
 if(batchday==2){
day="Tuesday";
}
 if(batchday==3){
day="Wednesday";
}
if(batchday==4){
day="Thursday";
}
 if(batchday==5){
day="Friday";
}
 if(batchday==6){
day="Saturday";
}
 if(batchday==7){
day="Sunday";
}
$(this).val(day);

});
})

		   $(document).on("change","#plan_id",function(){
             
		   	var class_id = $("#class_id").val();
		   	var branch_id = $("#branch_id").val();
		   	var user_id =$("#user_id").val();
		   	var start_date=$("#datepicker2").val();
		   	if (start_date != "" ) {
                var dat = $("#datepicker2").datepicker("getDate");
            }
		   	var str = $("#plan_id").val();
		   	var str1 = str.split("|");
		   	course_fee = str1[1];
		    var cls = str1[0];
		    if(cls==1){
		    	sessions_per_week = '2';
		    	 session = '24';
		    	 dat.setDate(dat.getDate() + parseInt(90));

		    }
		    else if (cls==2) {
		    	sessions_per_week = '3';
		    	 session = '36';
		    	 dat.setDate(dat.getDate() + parseInt(90));
		    }
		    else if(cls==3) {
		    	sessions_per_week = '2';
		    	 session = '48';
		    	 dat.setDate(dat.getDate() + parseInt(180));
		    }
		    	else {
		    	sessions_per_week = '3';
		    	 session = '72';
		    	 dat.setDate(dat.getDate() + parseInt(180));
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
		   				$("#batch").addClass("hidden");
		   				$(".select").selectpicker("refresh");
		   				$("#total_sessions").val(session);
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
		   				$("#batch").addClass("hidden");
		   				//$("#course_fee").val(course_fee);
						//total_amount = parseInt(registration_amount)+parseFloat(course_fee);
						//feature_months_amount =0;
						//$("#total_amount").val(parseFloat(total_amount).toFixed(2));
						//$("#final_amount").val(Math.round(total_amount));
						
						//$("#sibling_discount").val(sibling_discount);
						//$("#next_plan_amount").html(''); 
						//$("#next_plan").val('').trigger('change');
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

                dat.setDate(dat.getDate() + parseInt(92));
            }
            else{
                dat.setDate(dat.getDate() + parseInt(183));
            }
			
            $("#datepicker1").val($.datepicker.formatDate("dd-mm-yy", dat));
		 	total_amount =parseFloat(course_fee);
			   				$("#total_amount").val(parseFloat(total_amount).toFixed(2));
			   				
			   				$("#final_amount").val(Math.round(total_amount));
			   				$(".select").selectpicker("refresh")
			   	
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