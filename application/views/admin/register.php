<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
//echo time();
?>
<style>
.loaderdiv{
position: fixed; left: 0; top: 0; z-index: 999; width: 100%; height: 100%; overflow: visible; background: #333 ;opacity: 0.5;
}
.loader {
  margin: 0px auto;
    margin-top: 21%;
}
	
.panel-title{
  background-color: lightgrey;
  margin:0;
  padding-left: 15px;
  font-style: italic;
  font-weight: bold;
	}	
	.panel-heading{
  margin: 0;
  padding:0;
  padding-bottom: 50px;

}
label.my-error-class {
    color:#FF0000;  /* red */
}
.text-danger{
color: #e32 !important;
font-size: x-small!important; 
}
.require:after {
    content:" *";
	font-size: x-small; 
    color: red;
	display:inline;
  }
</style>
<script>
$(window).bind("pageshow", function() {
    var form = $('form'); 
    // let the browser natively reset defaults
    form[0].reset();
});

</script>
<div class="loaderdiv" style="display:none"><div class="loader" ></div></div>
<div class="content-wrapper">
   <div class="row" style="margin-right:0; margin-left:0">
      <div class="col-lg-12">
<div class="news-area section-padding" id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            
            
                <!-- News Page Title-->
                <div class="page-title">
                        
                    <h2 >Registration Form</h2>
                </div>

							<form method="post" action="<?=base_url("register/insertenrollstudent")?>" id="student" enctype="multipart/form-data" >
							  <div class="col-md-12">
                              
								<div class="col-md-8">
							    <div class="form-group col-md-6" >
									
								 <input class="form-control" name="name" style="text-transform:capitalize" placeholder="Name Of The Student" type="text" onkeypress="return ((event.charCode >= 65 && event.charCode <= 122 )||(event.charCode == 32))"><i class="fa fa-asterisk text-danger"></i> 
								</div>
								<div class="form-group  col-md-6">
<!-- 								 <input class="form-control" name="age"  placeholder="Age" onkeypress="return event.charCode>=48 && event.charCode<=57" type="text">
 -->								 <select  class="selectbox form-control" name="age">
						                            	<option value=""> Select Age</option>

			                               <?php
			                            	
			                            		for ($i=2;$i<=99;$i++) {
			                            			?>
			                            			 <option value="<?=$i?>"><?=$i?></option> 
			                            	<?php	}
			                            	
			                            	?>


						                                
						                            </select>
									<i class="fa fa-asterisk text-danger"></i>
							
								</div>
                                <div class="clearfix"></div>
								
						        <div class="form-group  col-md-6">
								 <input class="form-control" name="email" placeholder="Email ID" type="email"><i class="fa fa-asterisk text-danger"></i>
								</div>
								
								<div class="form-group  col-md-6">
								 <input class="form-control" name="mobile" placeholder="Phone No" onkeypress="return event.charCode>=48 && event.charCode<=57"                                             type="text"><i class="fa fa-asterisk text-danger"></i>
								</div>
                                <div class="clearfix"></div>
								
								<div class="form-group  col-md-6">
								 <input class="form-control" name="whatsapp_number" placeholder="Whatsapp No" onkeypress="return event.charCode>=48 && event.charCode<=57" type="text"><i class="fa fa-asterisk text-danger"></i>
								</div>
								<!--  <div class="form-group  col-md-6">
	
									    <select  class="selectbox" name="class_id">
						                            	<option value=""> Select class</option>

			                               <?php
			                            	if(!empty($classes))
			                            	{
			                            		foreach ($classes as $cat_info) {
			                            			?>
			                            			 <option value="<?=$cat_info['id']?>"><?=$cat_info['class_name']?></option> 
			                            	<?php	}
			                            	}
			                            	?>


						                                
						                            </select>
							
								</div> -->
                              <div class="form-group  col-md-6">
								 <input class="form-control" name="organization_name" placeholder="Name Of Your Organization" type="text">
								</div>

								<div class="form-group  col-md-12">
								<textarea rows="2" cols="5" class="form-control" name="address" placeholder="Address"></textarea>
								</div>
									
								<div class="col-md-6">
								  	 
								     
								<div class="form-group">
                                              <select  name="branch_id" id="branch_id"  class="selectbox form-control branch_id">

						                            	<option value="" >Select Branch</option>

						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>" <?=@$class_info['cat_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>
						                               

						                      </select><i class="fa fa-asterisk text-danger"></i>
						                  </div>    
						             
									</div>
										
									<div class="clearfix"></div>
								</div>
								
								
								
							     <div class="form-group col-md-12">
								 <div class="col-md-12">
								 	<label class="control-label"><p class="sib-dis">How do you know about us?</label>
									 </div>
									<div class="col-md-4">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="known_from[]" value="Newspaper" class="styled">
											Newspaper Insert
										</label>
									</div>
									</div>
									<div class="col-md-4">
									<div class="checkbox">
										<label>
											<input type="checkbox"  name="known_from[]" value="Just dial"  class="styled">
											Just Dial
										</label>
									</div>
									</div>
									<div class="col-md-4">
									<div class="checkbox">
										<label>
											<input type="checkbox"  name="known_from[]" value="internet sites"  class="styled specify">
											Internet sites,specify
										</label>
									</div>
									</div>
								  <div class="col-md-4">
									<div class="checkbox">
										<label>
											<input type="checkbox"  name="known_from[]" value="friends" class="styled specify">
											Friend Reference,specify
										</label>
									</div>
									</div>
									<div class="col-md-4">
									<div class="checkbox">
										<label>
											<input type="checkbox"  name="known_from[]" value="others"  class="styled specify">
											Others,specify
										</label>
									</div>
									</div>

									
									<div class="col-md-4 other_info" style="display:none">
											<input type="text"  name="other_info" placeholder="Specify Others" >
											
										</div>
										
									
									<div class="clearfix"></div>
								</div>
								 
								 
					
								<div class="clearfix"></div>
								  
									
									
                                   
								
								

                                          <div class=" form-group col-md-12">
									   <label class="control-label col-md-4"><p class="sib-dis">Registration Amount </p></label>
									   <input type="hidden" class="form-control price" id="registration_amount" name="registration_amount" placeholder="Amount">
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
								<p class="form-control price" id="regist_amt" name="regist_amount" ></p>
										</div>
									</div>
									
									<div class="clearfix"></div>
								 </div>
								 <div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Select Class <i class="fa fa-asterisk text-danger"></i></p></label>
									 <div class="col-md-4">
	                                  
									  <select data-placeholder="Select Class" class="select form-control" name="class_id" id="class_id">
										 
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
								
								 <div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Plan</p></label>
									 <div class="col-md-4">
									 <select data-placeholder="Select Plan" class="select form-control" id="plan_id" name="plan_id">

						                            	<option value="">Select Plan</option>

														
						                                
						                            </select>
									    
							
								</div>
								<div class="clearfix"></div>
								</div> 
								<div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Number of Classes / week</p></label>
									 <div class="col-md-4">
	                                   <div class="input-group">
										
										<input type="text" class="form-control" id="number_of_class" class="number_of_class" name="number_of_class" readonly value="">
									</div>
									    <!--<select data-placeholder=" Number of classes" class="select " id="number_of_class" name="number_of_class">
									    	<option value ='' id="default_value">Number of Sessions</option>
									     <option value="1">1  </option>
	                        			 <option value="2">2  </option>
	                        			 <option value="3">3  </option> 
	                        			 <option value="4">4  </option>
	                        			 
									    </select>-->
							
								</div>
                              
									<div class="clearfix"></div>
								</div>
								<div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Sessions</p></label>
									 <div class="form-group  col-md-4">
	                                 <div class="input-group">
										
										<input type="text" class="form-control" id="total_sessions" class="session_id" name="total_sessions" readonly value="" >
									</div>
									    
							
								</div>
								<!--<label class="control-label col-lg-4"><p class="sib-dis"> <span id="sessions_per_week"></span> Classes/ Week</p></label>-->
									<div class="clearfix"></div>
								</div>

								<div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Start Date <i class="fa fa-asterisk text-danger"></i></p></label>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" id="datepicker2" class="datepicker1" name="start_date" placeholder="Select Date" >
									</div>
								</div>
								 
									<div class="clearfix"></div>
								</div>
								<div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">End Date</p></label>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" id="datepicker3" class="datepicker1" name="end_date" placeholder="Select Date" value="">
									</div>
								</div>
								 
									<div class="clearfix"></div>
								</div>
								<div class="selectdays"></div>
								<div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Course Fee </p></label>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="course_fee" name="course_fee" readonly value ="">
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Amount To Be Paid </p></label>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="total_amount" name="total_amount" placeholder="Amount" readonly>
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group col-md-12">
								<div class="col-md-4">
									<label class="control-label"><p class="sib-dis">Promotional code </p>
									<input type="text" class="form-control" id="promo" name="promo_code" placeholder="Enter Code">
					                </label>
									<button class="btn btn-danger" type="button" id="btn_apply">Apply</button>
									</div>
									<div class="col-md-4 ">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="discount_amount" name="discount" readonly   placeholder="Discount">
											
											
										</div>
										<p class="promo"style="font-size:small;color:green">promo code applied</p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Final Amount To Be Paid </p></label>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control"  id="final_amount" name="final_amount" placeholder="Amount" readonly>
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Final Notes </p></label>

									<div class="col-md-4">
										<textarea name="comments" class="form-control">

									</textarea>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="sub-btn form-group text-center">
									<input id="alwaysFetch" type="hidden" />
								<!--<input type="hidden" name="branch_id" id="branch_id" value="<?=$user_info['branch_id']?>">
								<input type="hidden" name="user_id" id="user_id" value="<?=$user_info['id']?>">
								<input type="hidden" name="member_id" id="" value="<?=$user_id?>">
								<input type="hidden" name="sibling_discount" id="sibling_discount">-->

								<!-- <input type="hidden" name="next_month_amount" id="next_month_amount" > -->
                                     <input type="text" id="refreshed" value="no" style="display:none">
								<!--<button type="button" data-loading-text="Loading..."  class="btn btn-primary">Pay Now</button>-->
								<button type="button" data-loading-text="Loading..."  class="btn btn-primary " id="insert">Pay Now</button>
								
								
		</div>
</div>
                          </form>

							</div>
							
							<div class="clearfix"></div>
						</div>
						

					</div>

					<div class="col-lg-3">

					</div>
				</div>
			</div>
			<!-- /main content -->

		
		
	

	<!-- Footer -->
	


<script>
	
	


   


    $("#insert").click(function() {
		if($("#student").valid()){
	$('.loaderdiv').show();
	$('#student').submit();
			$('#student').reset();
	}
   
		
});
    
    
   
		
 







$(".specify").click(function(){

if($(".specify").is(':checked')){
$(".other_info").show();
}else{
	$(".other_info").hide();
}
});


	var vendor_id ="";  
	var profile_pic1 =[];	
	vendor_id ="<?=$this->uri->segment('3')?>";
	
	$.validator.addMethod("email", 
    function(value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, 
   
);

var vendor_id ="";  
	var profile_pic1 =[];	
	vendor_id ="<?=$this->uri->segment('3')?>";
	
	$.validator.addMethod("email", 
    function(value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, 
   
);

var total_amount;
var sibling_discount = 0;

var course_fee;
var current_month_amount_discount=0;
var price_per_month;
var discount_persent;
var final_amount;
var feature_months_amount =0;

var discount_type= 1;
var enddate ;

var sessions_per_week;
var session;
var e;

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
	

	
	
  $(document).ready(function(e){
	  $('.promo').hide();
	  
	 

	  
	  $('#datepicker1').datepicker({
        format: 'dd/mm/yyyy'
     
    });
	  $("#datepicker1").datepicker("setDate", new Date());
	  $('#datepicker1').css('pointer-events', 'none');
	  $('#datepicker2').datepicker({
        format: 'dd-mm-yyyy',
       
        changeMonth: true,
        changeYear: true,
		startDate: new Date(2019, 11, 1),

       
        
        
    });
	  //$("#datepicker2").datepicker("setDate", new Date());

	  $('#datepicker3').datepicker({
        format: 'dd/mm/yyyy'
       
        
        
        
        
    });
	$('#datepicker3').css('pointer-events', 'none');
	 // $("#datepicker1").datepicker("setDate", new Date());
	
  	//alert("hi");
     $("#student").validate({
		 errorClass: "my-error-class",
		 
      rules: {
        name: "required",
       	password:"required",
		email: {
                        required:  {
                                depends:function(){
                                    $(this).val($.trim($(this).val()));
                                    return true;
                                }   
                            },
                       email: true
                    },
        date_of_birth:"required",
        password: "required",
        branch_id:"required",
        class_id: "required",
       
		
       
        plan_id:"required",
		  number_of_class:"required",
      	start_date:"required",
        course_fee:"required",
		  "selected_days[]":"required",
         	
		 
         "selected_batches[]":"required",
        
        
		  whatsapp_number:{minlength: 10,
        	maxlength: 10},
        mobile: {
        	required: true,
        	minlength: 10,
        	maxlength: 10,
        	remote:{
        		url: "<?=base_url('register/checkusermobile')?>",
			
        		type:"POST",
        		data:{
        			mobile:function(){
        				return $("input[name=mobile]").val();
        				},
        			vendor_id: vendor_id	
        			},
        	},
        	},
      },
      messages:{
      	mobile:{
      		remote:"Aleready registered",
      	}
      }
		 
				
    });
	  
	 
	  
   $(".branch_id").change(function(){
   	var branch_id = $(this).val();
   	$.ajax({
   		type:"post",
   		url:"<?=base_url('register/getregistrationamount')?>",
   		data:{branch_id:branch_id},
   		success: function(message){
   			var resp = JSON.parse(message);
   			if(resp.status==1)
   			{
   				$("#regist_amt").html(resp.registration_amount);
   				$("#registration_amount").val(resp.registration_amount);
				   var registration_amount = resp.registration_amount;
				   
		 total_amount = parseInt(registration_amount)+30;
		 $("#total_amount").val(parseFloat(total_amount).toFixed(2));
		 $("#final_amount").val(Math.round(total_amount));
				

   			}

   		}
   	});
   });  

   $("#btn_apply").click(function(){

var promo_code= $("#promo").val();
var plan = $("#plan_id").val()
var str1 = plan.split("|");	
course_fee = str1[1];
var cls = str1[0];
	var registration_amount = $('#regist_amt').text();   
	   
if(promo_code!=""){ 
	if( promo_code == "ARTCON3000" && cls!=5){
		alert('Promo Code Valid only for "one Year" plan' );
					 $('.promo').hide();
					  $("#discount_amount").val("");
					  total_amount = parseInt(registration_amount)+parseFloat(course_fee);
					  $("#final_amount").val(Math.round(total_amount));
	}
	else{
   $.ajax({
   type:"post",
   url:"<?=base_url('register/verify_code')?>",
   data:{promocode:promo_code},
   success: function(message){
	   var resp = JSON.parse(message);
	   
	   if(resp.success==1)
	   {
		   var amt = resp.promotional_amount;
		   $("#discount_amount").val(amt);
		   
		   total_amount = parseInt(registration_amount)+parseFloat(course_fee) - parseFloat(amt);
		  
		   $("#final_amount").val(Math.round(total_amount));
		   
		   $('.promo').show();

	   }
				 else{
				  alert('Promo Code not Valid' );
					 $('.promo').hide();
					  $("#discount_amount").val("");
					  total_amount = parseInt(registration_amount)+parseFloat(course_fee);
					  $("#final_amount").val(Math.round(total_amount));
				 }
	   
	   
	}
	});
	}

}	   
})



   $("#class_id").change(function(){

$('#plan_id').empty();
$('#plan_id').append('<option value="">Select Plan</option>');
var class_id = $(this).val();
var branch_id = $("#branch_id").val();
if(class_id!="" && branch_id!="")
{
	
$.ajax({
		type:"post",
		url:"<?=base_url('register/getplans')?>",
		data:{class_id:class_id,branch_id:branch_id},
		success: function(message){
			var resp = JSON.parse(message);
			if(resp.success==1)
			{
				if(class_id==16){
					$('#plan_id').append('<option value="9|'+resp.three_session_three_months+'"> 48 Session (3 months) '+resp.three_session_three_months+'</option>');
				}
				else{
				//$('#plan_id').append('<option value="7|'+resp.one_session_three_months+'"> 12 Session (3 months) '+resp.one_session_three_months+'</option>');
				$('#plan_id').append('<option value="1|'+resp.two_session_three_months+'"> 24 Session (3 months) '+resp.two_session_three_months+'</option>');
			 
				//$('#plan_id').append('<option value="2|'+resp.three_session_three_months+'"> 36 Session (3 months) '+resp.three_session_three_months+'</option>');
			// $('#plan_id').append('<option value="8|'+resp.one_session_six_months+'"> 24 Session (6 months) '+resp.one_session_six_months+'</option>');
			$('#plan_id').append('<option value="3|'+resp.two_session_six_months+'"> 48 Session (6 months)  '+resp.two_session_six_months+'</option>')
				//$('#plan_id').append('<option value="4|'+resp.three_session_six_months+'"> 72 Session (6 months) '+resp.three_session_six_months+'</option>');
			// $('#plan_id').append('<option value="9|'+resp.one_session_one_year+'"> 24 Session (12 months) '+resp.one_session_one_year+'</option>');
			 $('#plan_id').append('<option value="5|'+resp.two_session_one_year+'"> 96 Session (12 months) '+resp.two_session_one_year+'</option>');
				}
			 //$('#plan_id').append('<option value="6|'+resp.three_session_one_year+'"> 144 Session (12 months) '+resp.three_session_one_year+'</option>');
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
/*else if (cls==2) {
 sessions_per_week = '3';
  session = '36';
}*/
else if(cls==3) {
 sessions_per_week = '2';
  session = '48';
}
 /*else if(cls==4) {
 sessions_per_week = '3';
  session = '72';
}*/
else if (cls==5){
 sessions_per_week = '2';
  session = '96';
}
/*else if(cls==6){
 sessions_per_week = '3';
  session = '144';}

else if(cls==7){
 sessions_per_week = '1';
  session = '12';}

else if(cls==8)
{
 sessions_per_week = '1';
  session = '24';}*/

else if(cls==9){
 sessions_per_week = '4';
  session = '48';}





$.ajax({
	type:"post",
	url:"<?=base_url('register/getplan')?>",
	data:{sessions_per_week:sessions_per_week,class_id:class_id,branch_id:branch_id},
	success: function(message){
		var resp = JSON.parse(message);
		if(resp.success==1)
		{
			//sibling_discount = resp.sibling_discount;
			//price_per_month = price_per_month-(price_per_month*sibling_discount/100);
			
			//price_per_session = price_per_month/(sessions_per_week*4);
		 $("#number_of_class").val(sessions_per_week);
			$("#sessions_per_week").text(sessions_per_week);
			$(".selectdays").html(resp.weekdays);
			//$(".select").selectpicker("refresh");
			$("#total_sessions").val(session);
			$("#course_fee").val(course_fee);
			//course_fee = 0;
			var registration_amount = $('#regist_amt').text();
		 total_amount = parseInt(registration_amount)+parseFloat(course_fee);
		 //feature_months_amount =0;
		 $("#total_amount").val(parseFloat(total_amount).toFixed(2));
		 $("#final_amount").val(Math.round(total_amount));
			$("#promo").val("");
			 $('.promo').hide();
					  $("#discount_amount").val("");
		 
		 $("#sibling_discount").val(sibling_discount);
			$("#datepicker2").val("");
			$("#datepicker3").val("");
		 //$("#next_plan_amount").html(''); 
		 //$("#next_plan").val('').trigger('change');
		// $(".select").selectpicker("refresh");
		 

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
			   	

			   		var value = $(this).val();
        if (value !== ''){ 
			   		     
        var ids = $(this).parent('select[name*="day"]').prop('id');
        var options = $('select[name*="day"]:not(#' + ids + ') option[value=' + value + ']');
        options.hide();
        }
			   	});
			   	
			   	$.ajax({
			   		type:"post",
			   		url:"<?=base_url('register/getbatchclassesbyweekday')?>",
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
	else{
						alert("select start date")}
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
                if(cls ==1||cls==9){

                dat.setDate(dat.getDate() + parseInt(91));
            }
            else if(cls ==3){
                dat.setDate(dat.getDate() + parseInt(183));
            }
			else if(cls ==5){
                dat.setDate(dat.getDate() + parseInt(365));
            }
				   
               
            
			var day = dat.getDate();
    
    var month = dat.getMonth() + 1 ;
    
    var year = dat.getFullYear();
    

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    

    var today = day + "-" + month + "-" + year;
    
			$("#datepicker3").val(today);
		}
			});

			

  

    

   
   	
  });


</script>
     	