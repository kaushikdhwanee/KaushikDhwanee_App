<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

 header("Access-Control-Allow-Origin: *");
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
	.bootstrap-select.btn-group.show-tick .dropdown-menu li.selected a span.check-mark {
    position: absolute !important;
    display: inline-block!important;
    right: 15px!important;
    margin-top: 5px!important;
		background-color:green;
}
	.glyphicon-ok:before {
    content: "\e013"!important;
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
                        
                    <h2 >Summercamp Registration </h2>
                </div>

							<form method="post" action="<?=base_url("summercamp/insertcampstudent")?>" id="student" enctype="multipart/form-data" >
							  <div class="col-md-12">
                              	<div class="col-md-8">
							    <div class="form-group col-md-6" >
									
								 <input class="form-control" name="name" style="text-transform:capitalize" placeholder="Name Of The Student" type="text" onkeypress="return ((event.charCode >= 65 && event.charCode <= 122 )||(event.charCode == 32))"><i class="fa fa-asterisk text-danger"></i> 
								</div>
								<div class="form-group  col-md-6">
<!-- 								 <input class="form-control" name="age"  placeholder="Age" onkeypress="return event.charCode>=48 && event.charCode<=57" type="text">
 -->								 <select  class="selectbox form-control" name="age" id="age">
						                            	<option value=""> Select Age</option>

			                               <?php
			                            	
			                            		for ($i=3;$i<=16;$i++) {
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
								 <input class="form-control" name="whatsapp_number" placeholder="Whatsapp No" onkeypress="return event.charCode>=48 &&                event.charCode<=57" type="text"><i class="fa fa-asterisk text-danger"></i>
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
                             

								<div class="form-group  col-md-12">
								<textarea rows="2" cols="5" class="form-control" name="address" placeholder="Address"></textarea>
								</div>
									
								<div class="col-md-6">
								  	 
								     
								<div class="form-group">
                                              <select  name="branch_id" id="branch_id"  class="form-control branch_id">

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
								
								
								<div class="clearfix"></div>
								  
								
								 <div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Plan</p></label>
									 <div class="col-md-4">
									 <select data-placeholder="Select Plan" class="select form-control" id="plan_id" name="plan_id">

						                            	<option value="">Select Plan</option>
                                                        
						                                
						                            </select>
									    
							
								</div>
									 <div class="form-group col-md-4" id="package" style="display:none">
									 <select class="selectpicker" id="activity" name="activity[]" multiple multiple data-max-options="4" data-style="btn-info"                                                title="Select Activities (max four)">
            	
										 <option value="Music">Music</option>
										 <option value="Dance">Dance</option>
										 <option value="Arts">Arts</option>
										 <option value="CACW">Creative And Cursive Writing</option>
										 <option value="Coding">Coding (age 12+)</option>
										 <option value="Robotics">Robotics</option>
										 <option value="Rubics Cube">Rubics Cube</option>
										           
						                            </select>
									    
							
								</div>
									 <input type="hidden" name="weeks" id="weeks" value="">
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
								
								<div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Avail Transport?</p></label>
									 <div class="col-md-4">
									 <select data-placeholder="Select Plan" class="select form-control" id="transport" name="transport">
										                <option value="">Transport</option>
						                            	<option value="1">YES</option>
                                                        <option value="2">NO</option>
						                                
						                            </select><i class="fa fa-asterisk text-danger"></i>
									    
							
								</div>
									
									<div class="col-md-4" style="display:none" id="pick_drop">
									 <select data-placeholder="Select Distance in KM" class="select form-control" id="distance" name="distance">
                                                        <option value="">Distance</option>
						                            	<option value="1">0 - 2</option>
                                                        <option value="2">2 - 4</option>
						                                
						                            </select><i class="fa fa-asterisk text-danger"></i>
									    
							
								</div>
									
									<div class="clearfix"></div>
								</div>
								  
								 
								<div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Summercamp Fee </p></label>
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
									<label class="control-label col-md-4"><p class="sib-dis">Transport Fee </p></label>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="transport_fee" name="transport_fee" readonly value ="0">
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								  
								  <div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Total Amount </p></label>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control"  id="total_amount" name="total_amount" placeholder="Amount" readonly>
											
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
									<label class="control-label col-md-4"><p class="sib-dis">Additional Notes </p></label>

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
	
	var total_amount;
var sibling_discount = 0;

var course_fee;
var current_month_amount_discount=0;
var price_per_month;
var discount_persent;
var final_amount;
var feature_months_amount =0;
var trfee=0;
var discount_type= 1;
var enddate ;
	var endDate;
	var tot_amt=0;
var days;
var sessions_per_week;
var session;
var e;
 var amt=0;
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
		startDate: new Date(2020, 03, 13),
		  endDate:new Date(2020, 04, 30),
		  daysOfWeekDisabled: "0,6"

       
        
        
    });
	  //$("#datepicker2").datepicker("setDate", new Date());

	  $('#datepicker3').datepicker({
        format: 'dd-mm-yyyy'
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
        	
        	},
      },
      
		 
				
    });
	  
	 
	  
  
   $("#btn_apply").click(function(){

var promo_code= $("#promo").val();
	     tot_amt = $("#total_amount").val();
if(promo_code!=""){
   $.ajax({
   type:"post",
   url:"<?=base_url('register/verify_code')?>",
   data:{promocode:promo_code},
   success: function(message){
	   var resp = JSON.parse(message);
	   var registration_amount = $('#regist_amt').text();
	   if(resp.success==1)
	   {
		   amt = resp.promotional_amount;
		   $("#discount_amount").val(amt);
		 
		   
		   total_amount = parseFloat(tot_amt)- parseFloat(amt);
		  
		   $("#final_amount").val(Math.round(total_amount));
		   
		   $('.promo').show();

	   }
				 else{
				  alert('Promo Code not Valid' );
					 $('.promo').hide();
					  $("#discount_amount").val("");
					 // total_amount = parseInt(registration_amount)+parseFloat(course_fee);
					  $("#final_amount").val(Math.round(tot_amt));
				 }
	}
	});

}
	   
})
	  
	   $("#age").change(function(){  
		$("#branch_id").val("");
		  $("#plan_id").val("");
		  $('#plan_id').empty();
		   var age = $('#age').val();
		   if (age <= 11){
		$('#activity option[value="Coding"]').attr('disabled',true);
			   $("#activity").selectpicker('refresh');
			   
	}
		   else{
		   $('#activity option[value="Coding"]').attr('disabled',false);
			    $("#activity").selectpicker('refresh');
		   }
		$('#package').hide();
	
	});
	  

$("#branch_id").change(function(){

	        $('#package').hide();
		   	$('#plan_id').empty();
		   	$('#plan_id').append('<option value="">Select Plan</option>');
		   	var branch_id = $(this).val();
		    var age = $('#age').val();
		   	if(branch_id!="")
		   	{
		   		
		   	$.ajax({
			   		type:"post",
			   		url:"<?=base_url('summercamp/getsummerplan')?>",
			   		data:{branch_id:branch_id},
			   		success: function(message){
			   			var resp = JSON.parse(message);
			   			if(resp.success==1)
			   			{
			   				
			   			if (age>=8 && age<=11){
							$('#plan_id').append('<option value="3|'+resp.art_3w+'"> Art (3 weeks) @ '+resp.art_3w+'</option>');
							$('#plan_id').append('<option value="6|'+resp.art_4w+'"> Art (4 weeks) @ '+resp.art_4w+'</option>');
							$('#plan_id').append('<option value="7|'+resp.art_5w+'"> Art (5 weeks) @ '+resp.art_5w+'</option>');
						    $('#plan_id').append('<option value="5|'+resp.arttech_3w+'"> Art + Tech(3 weeks) @ '+resp.arttech_3w+'</option>');
							$('#plan_id').append('<option value="8|'+resp.arttech_4w+'"> Art + Tech(4 weeks) @ '+resp.arttech_4w+'</option>');
							$('#plan_id').append('<option value="9|'+resp.arttech_5w+'"> Art + Tech(5 weeks) @ '+resp.arttech_5w+'</option>');
							
			   					//$(".select").selectpicker("refresh");
						}
							else if(age<=7){
							$('#plan_id').append('<option value="3|'+resp.art_3w+'"> Art (3 weeks) @ '+resp.art_3w+'</option>');
							$('#plan_id').append('<option value="6|'+resp.art_4w+'"> Art (4 weeks) @ '+resp.art_4w+'</option>');
							$('#plan_id').append('<option value="7|'+resp.art_5w+'"> Art (5 weeks) @ '+resp.art_5w+'</option>');
							}
			   				else if(age>=12){
								
				            $('#plan_id').append('<option value="3|'+resp.art_3w+'"> Art (3 weeks) @ '+resp.art_3w+'</option>');
							$('#plan_id').append('<option value="6|'+resp.art_4w+'"> Art (4 weeks) @ '+resp.art_4w+'</option>');
							$('#plan_id').append('<option value="7|'+resp.art_5w+'"> Art (5 weeks) @ '+resp.art_5w+'</option>');
						    $('#plan_id').append('<option value="4|'+resp.tech_3w+'"> Tech (3 weeks) @ '+resp.tech_3w+'</option>');
							$('#plan_id').append('<option value="10|'+resp.tech_4w+'"> Tech (4 weeks) @ '+resp.tech_4w+'</option>');
							$('#plan_id').append('<option value="5|'+resp.arttech_3w+'"> Art + Tech(3 weeks) @ '+resp.arttech_3w+'</option>');
							$('#plan_id').append('<option value="8|'+resp.arttech_4w+'"> Art + Tech(4 weeks) @ '+resp.arttech_4w+'</option>');
							$('#plan_id').append('<option value="9|'+resp.arttech_5w+'"> Art + Tech(5 weeks) @ '+resp.arttech_5w+'</option>');
							
							}

			   			}

			   		}
			   	});
		   	}else{
		   		alert('please select required fields');
		   	}

   		}); 

 
$("#plan_id").change(function(){

//var class_id = $("#class_id").val();
var branch_id = $("#branch_id").val();
var age = $("#age").val();
var str = $(this).val();
var str1 = str.split("|");	
	console.log(str1);
course_fee = str1[1];
	
var cls = str1[0];
	if (cls==5 || cls==8 || cls==9){
	$('#package').show();
	
	}
	else{
	$('#package').hide();
	}
	 if(cls ==3 ||cls==4 ||cls==5){
                  
					  $("#weeks").val("3")
            }
				else if(cls ==6 ||cls==8 ||cls==10){
				
					$("#weeks").val("4")
               
            }
				else if(cls ==7||cls==9 ||cls==11){
					
					$("#weeks").val("5")
               
            }
	
			$("#course_fee").val(course_fee);
	total_amount= parseFloat(course_fee)+ parseFloat(trfee)- parseFloat(amt);
	var amount =  parseFloat(course_fee)+ parseFloat(trfee);
			$("#final_amount").val(total_amount);
	$("#total_amount").val(amount);
		 	$("#datepicker2").val("");
			$("#datepicker3").val("");
		});

		   $(document).on('change',"#datepicker2",function(){
		 	//alert("fffffffffff");
		 	var start_date = $(this).val();
            //var offset = $("#selectoffset").val();
			   var count=0;
            if (start_date != "" ) {
                var dat = $("#datepicker2").datepicker("getDate");
				//var d= new date(dat);
                var str = $("#plan_id").val();
		   	    var str1 = str.split("|");	
		   	var cls = str1[0];
                  if(cls ==3 ||cls==4 ||cls==5){
                  days=14;
				
            }
				else if(cls ==6 ||cls==8 ||cls==10){
					days=19;
				
            }
				else if(cls ==7||cls==9 ||cls==11){
					days=24;
					
               
            }
				
				   
             while(count < days){
    endDate = new Date(dat.setDate(dat.getDate() + 1));
    if(endDate.getDay() != 0 && endDate.getDay() != 6){
       
       count++;
    }
}  
           
	var day = endDate.getDate();
    
    var month = endDate.getMonth() + 1 ;
    
    var year = endDate.getFullYear();
    

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    

    var today = day + "-" + month + "-" + year;
    
			$("#datepicker3").val(today);
		}
			});

	
	  
	  $("#transport").change(function(){

		   	var transport = $(this).val();
		if(transport==1){
		    $('#pick_drop').show();
			
	}
	else{
			$('#pick_drop').hide();			
	  }				   
	});
	  
	  $("#distance").change(function(){

		   	var distance = $(this).val();
		   var str = $("#plan_id").val();
		   	    var str1 = str.split("|");	
		   	var cls = str1[0];
		  var weeks = $("#weeks").val()
		  
		if(distance==1 && weeks==3){
			 trfee = 999;
		}
		  if(distance==1 && weeks==4){
			 trfee = 1499;
		}
		  if(distance==1 && weeks==5){
			 trfee = 1999;
		}
		  if(distance==2 && weeks==3){
			 trfee = 1499;
		}
		  if(distance==2 && weeks==4){
			 trfee = 1999;
		}
		  if(distance==2 && weeks==5){
			 trfee = 2499;
		}
		var total_amount = parseFloat(course_fee) + parseFloat(trfee);
		  var abc = parseFloat(course_fee) + parseFloat(trfee)-parseFloat(amt)
		  // $("#discount_amount").val("");
		$("#transport_fee").val(trfee);
		 //  $('.promo').hide();
		   $("#total_amount").val(Math.round(total_amount)); 
		   $("#final_amount").val(Math.round(abc));  
			
	
	
						   
	});
	  
	  
  });


</script>
     	