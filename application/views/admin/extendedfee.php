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
.my-error-class {
    color:#FF0000;  /* red */
}
	i{
	font-size:10px !important;}
</style>
<div class="loaderdiv" style="display:none"><div class="loader" ></div></div>


<div class="content-wrapper">
   <div class="row">
      <div class="col-lg-12">
     	<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Extend Summercamp Weeks</h5>
								
							</div>
							<form method="post" action="<?=base_url("admin/insertextendedfee")?>" id="student" enctype="multipart/form-data" >
							  <div class="col-md-12">
                              	
							     <div class="form-group">
									<label class="control-label col-md-4"><p class="sib-dis">Student Name</p> </label>
									  <div class="form-group  col-md-4"><?=$enroll_info['name']?>
									   </div>
							
									<div class="clearfix"></div>
								</div>

								
								
								 <div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Plan <i class="fa fa-asterisk text-danger"></i></p></label>
									 <div class="col-md-4">
									 <select data-placeholder="Select Plan" class="select form-control" id="plan_id" name="plan_id">

						            <option value="1|<?=$enroll_info['one_week']?>"> One_Week </option>
						            <option value="2|<?=$enroll_info['two_week']?>"> Two_Week </option>
									
						            <option value="3|<?=$enroll_info['three_week']?>"> Three_Week </option>
									<option value="4|<?=$enroll_info['four_week']?>"> Four_Week </option>
									
									<option value="5|<?=$enroll_info['five_week']?>"> Five_Week </option>
									               
						                                
						                            </select>
										
									    
							
								</div>
								<div class="clearfix"></div>
								</div> 
								
								<div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Start Date </p></label>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" id="datepicker2" class="datepicker1" name="start_date" value="<?=date('d-m-Y',strtotime($enroll_info['end_date']))?>" >
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
									<label class="control-label col-md-4"><p class="sib-dis">Summercamp Fee </p></label>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="course_fee" name="course_fee"  value ="">
											
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								
								<!--<div class="form-group col-md-12">
								<div class="col-md-4">
									<label class="control-label"><p class="sib-dis">Promotional code </p>
									<input type="text" class="form-control" id="promo" name="promo_code" placeholder="Enter Code">
					                </label>
									<button class="btn btn-primary" type="button" id="btn_apply">Apply</button>
									</div>
									<div class="col-md-4 ">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control" id="discount_amount" name="discount"placeholder="Discount">
											
											
										</div>
										<p class="promo"style="font-size:small;color:green">promo code applied</p>
									</div>
									<div class="clearfix"></div>
								</div>-->
								<div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Final Amount To Be Paid </p></label>
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>
											<input type="text" class="form-control"  id="final_amount" name="final_amount" placeholder="Amount" >
											
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
								  
								  <div class="form-group col-md-12">
									<label class="control-label col-md-4"><p class="sib-dis">Select Payment mode </p></label>

									<div class="col-md-4">
										<select name="payment_type" class="select box">

									<option value="">Select Payment</option> 

										<option value="1">Cash</option> 

		                                <option value="2">Credit Card/Debit Card</option> 

		                                <option value="3">NEFT</option> 

		                                <option value="4">Cheque</option>
		                                <option value="5">Paytm</option>
											<option value="6">GPay</option> 
											<option value="7">Others</option> 
											

									</select>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class=" col-md-12 sub-btn form-group text-center">
									<input id="alwaysFetch" type="hidden" />
								<input type="hidden" name="branch_id" id="branch_id" value="<?=$enroll_info['branch_id']?>">
								<input type="hidden" name="user_id" id="user_id" value="<?=$enroll_info['id']?>">
								<input type="hidden" name="mobile" id="" value="<?=$enroll_info['mobile']?>">
								<input type="hidden" name="email" value="<?=$enroll_info['email']?>">
									<input type="hidden" name="name" value="<?=$enroll_info['name']?>">

								<!-- <input type="hidden" name="next_month_amount" id="next_month_amount" > -->
                                     <input type="text" id="refreshed" value="no" style="display:none">
								<!--<button type="button" data-loading-text="Loading..."  class="btn btn-primary">Pay Now</button>-->
								<button type="button" data-loading-text="Loading..."  class="btn btn-primary " id="insert">Enroll Now</button>
								
								
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


<script>
	
	


   


    $("#insert").click(function() {
		if($("#student").valid()){
	$('.loaderdiv').show();
	$('#student').submit();
			$('#student').reset();
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
var cls;
var discount_type= 1;
var enddate ;
var amt;
var sessions_per_week;
var session;
var e;
var start_date;
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
	
	  
	  $('#datepicker2').datepicker({
        dateFormat: 'dd-mm-yy',
       
        changeMonth: true,
        changeYear: true,
		startDate: new Date(2019, 11, 1),

       
        
        
    });
	

	  $('#datepicker3').datepicker({
        dateFormat: 'dd-mm-yy'
       
        
        
        
        
    });
	//$('#datepicker3').css('pointer-events', 'none');
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
         plan_id:"required",
		start_date:"required",
        course_fee:"required",
		  
        
		  whatsapp_number:{minlength: 10,
        	maxlength: 10},
        mobile: {
        	required: true,
        	minlength: 10,
        	maxlength: 10,
        	
        	}
      }
     
		 
				
    });
	  
	 
	  
  
   $("#btn_apply").click(function(){

var promo_code= $("#promo").val();
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
		  var amnt = resp.promotional_amount;
		   console.log(amnt);
		   $("#discount_amount").val(amnt);
		   
		   total_amount = parseFloat(course_fee) - parseFloat(amnt);
		  
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
	   else{
	   alert('Enter Promo Code');
	   }
});

 


 
$("#plan_id").change(function(){

//var class_id = $("#class_id").val();

//var user_id =$("#user_id").val();
var str = $(this).val();
 start_date = $('#datepicker2').val();
var str1 = str.split("|");	
	console.log(str1);
course_fee = str1[1];
 cls = str1[0];
	if (start_date != "" ) {
                var dat =  $("#datepicker2").datepicker("getDate");;
                
                if(cls ==1){

                dat.setDate(dat.getDate() + parseInt(7));
					
            }
            else if(cls ==2){
                dat.setDate(dat.getDate() + parseInt(14));
				
            }
			else if(cls ==3){
                dat.setDate(dat.getDate() + parseInt(21));
            }
				else if(cls ==4){
                dat.setDate(dat.getDate() + parseInt(28));
            }
				else if(cls ==5){
                dat.setDate(dat.getDate() + parseInt(35));
            }
				   
               
            
			var day = dat.getDate();
    
    var month = dat.getMonth() + 1 ;
    
    var year = dat.getFullYear();
    

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    

   enddate = day + "-" + month + "-" + year;
	
    
			$("#datepicker3").val(enddate);
	}
			$("#course_fee").val(course_fee);
			$("#final_amount").val(course_fee);
		 	
		});


		   $(document).on('change',"#datepicker2",function(){
		 	//alert("fffffffffff");
		 	 start_date = $(this).val();
            //var offset = $("#selectoffset").val();
            if (start_date != "" ) {
                var dat = $("#datepicker2").datepicker("getDate");
                var str = $("#plan_id").val();
		   	    var str1 = str.split("|");	
		   	var cls = str1[0];
                if(cls ==1||cls==9){

                dat.setDate(dat.getDate() + parseInt(7));
            }
            else if(cls ==2){
                dat.setDate(dat.getDate() + parseInt(14));
            }
			else if(cls ==3){
                dat.setDate(dat.getDate() + parseInt(21));
            }
				else if(cls ==4){
                dat.setDate(dat.getDate() + parseInt(28));
            }
				else if(cls ==5){
                dat.setDate(dat.getDate() + parseInt(35));
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
     	