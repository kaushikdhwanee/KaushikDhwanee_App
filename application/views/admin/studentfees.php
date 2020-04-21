<style>

.black{

	background-color:#fff !important;

	color:#444 !important;

}

</style>
<style>
  .nav-tab li{
  display:inline-block;
   font-size:16px;
   color:#444;
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
<style type="text/css">
                 	.text{
                 		font-size: 12px;
                 	}
                 		.table-responsive {
    overflow-x: scroll !important;
    min-height: .01%;
}
                 	
                 </style>

<div class="content-wrapper">

   <div class="row">

      <div class="col-md-16 margin-0">

       <ul class="nav nav-tab">

       <li  class="<?= in_array($this->uri->segment(2),array("collectfees"))? "active" : ""  ?>"> <a href="<?=base_url("admin/collectfees/")?>">Collect Fees </a></li>
            <li  class="<?= in_array($this->uri->segment(2),array("viewpendingpayments"))? "active" : ""  ?>"><a href="<?=base_url("admin/viewpendingpayments")?>">Pending Payments</a></li>

             <li  class="<?= in_array($this->uri->segment(2),array("payfeeadvance"))? "active" : ""  ?>"><a href="<?=base_url("admin/payfeeadvance")?>">Monthly Payments</a></li>
          
      </ul>

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">Collect Fees</h5>

            </div>
            

            <div class="clearfix"></div>
		
                 <div class="table-responsive student_info">
                 <form name="fees" class="col-lg-16" method="post" action="<?=base_url("admin/insertpayments")?>" id="enrollstudent"> 
                     <table class="table text-nowrap table-responsive" id='table'>

                  <thead>

                     <tr>

                        <th>S No</th>

						
                        <th>Student Name</th>

                        <th>Class Name</th>

                        <th>Plan</th>
                        <th>session / week</th>
                        <th>Total Session</th>
                        <th>Session Taken</th>
                        <th>Start Date</th>
                        <th>End Date
                        
                        <th> Amount Due</th>


                        <th>Action</th>

						<th>Amount Paying</th>

                     </tr>

                  </thead>

                  <tbody class="refar-price">


                     <?php 
                    /*echo "<pre>";
                     print_r($invoice); exit;*/
                     $month = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
                     $total_amount =0;
                     $total_amount_paid =0;
                     $total_amount_due =0;
                    /* $days = array('1'=>'Mon','2'=>'Tue','3'=>'Wed','4'=>'Thu','5'=>'Fri','6'=>'Sat','7'=>'Sun');
                     
                     

                     
                     if(!empty($batches)){*/
						 $i=1;
						 
                     	if(!empty($invoice)){
                     	foreach ($invoice as $value) {
                     		
                     	
                     	




       ?>             
                     <tr id="rows">

                        <td ><?=$i?></td>
                        
                        <td id="name"><a href="<?=base_url("admin/editenroll/".$value['id']."/".$value['invoice_id'])?>"><div class="text"><?=$value['name']?></div></a></td>

                        <td><div class="text"> <?=$value['class_name']?></div> 

						</td>

						 <td>  <div class="text-muted text-size-small" id="plan_id" name="plan_id{$i}" value="<?=$value['plan']?>"><?=$value['plan']?>
                             <!--<select data-placeholder="Select Category" class="select " id="plan_id" name="plan_id">
                                                   
						                            
						            <option value="1|<?=$value['plan1']?>"<?php if($value['plan']==1) echo "SELECTED";?>> 24 Session (3 months) </option>
						            <option value="2|<?=$value['plan2']?>"<?php if($value['plan']==2) echo "SELECTED";?>> 36 Session (3 months) </option>
						            <option value="3|<?=$value['plan3']?>"<?php if($value['plan']==3) echo "SELECTED";?>> 48 Session (6 months) </option>
						            <option value="4|<?=$value['plan4']?>"<?php if($value['plan']==4) echo "SELECTED";?>> 72 Session (6 months)
</option>


														
						                                
						                            </select>-->
						  </div> 

						</td>	
						

                        

						<td>  <div class="text-muted text-size-small">
                           	<input type="text" class="form-control" id="session_week" name="session_week[<?=$value['invoice_id']?>]" value="<?=$value['session_per_week']?>"placeholder="" >
                            <input type="hidden" class="form-control" id="enroll_id" name="enroll_id[<?=$value['invoice_id']?>]" value="<?=$value['id']?>"placeholder="" >
							<input type="hidden" class="form-control" id="member_id" name="member_id" value="<?=$value['member_id']?>"placeholder="" >
                           </div></td>
                           <!--<td class="hidden"><input type="text" class="form-control" id="class_id" name="class_id" value="<?=$value['class_id']?>"placeholder="" ></td>
                           <td class="hidden"><input type="text" class="form-control" id="branch_id" name="branch_id" value="<?=$value['branch_id']?>"placeholder="" ></td>-->						
                           <td>  <div class="text-muted text-size-small">
                           	<input type="text" class="form-control" id="total_session" name="total_sessions[<?=$value['invoice_id']?>]" value="<?=$value['total_sessions']?>"placeholder=""  >

                           </div></td>
                           <td>  <div class="text-muted text-size-small">
                           	<input type="text" class="form-control col-md-2" id="session_taken" name="session_taken[<?=$value['invoice_id']?>]" value=""readonly="readonly"  >
                           	
                           	<input type="hidden" class="form-control" id="attendence_date" name="attendence_date" placeholder="" >

                           </div></td>
                           <td class="hidden"><div class="text-muted text-size-small">
							<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" id="hiddendate" name="startdate[<?=$value['invoice_id']?>]" value="<?=$value['due_date']?>"placeholder="" >
						</div>
						</div> 

						</td>
						<td>  <div class="text-muted text-size-small col-md-2">
							<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="date" class="form-control" id="start_date" name="start_date[<?=$value['invoice_id']?>]" value= "" placeholder="" class="start_date">
						</div>
						</div> 

						</td>
						<td>  <div class="text-muted text-size-small">
							<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="date" class="form-control" name="end_date[<?=$value['invoice_id']?>]" id="end_date" value=""placeholder="">
						</div>
						</div> 

						</td>
                       <td>
					  <div class="text-muted text-size-small" ><i class="fa fa-inr" aria-hidden="true"></i> 
					  <input type="text" class="form-control" id="course_fee" name="course_fee[<?=$value['invoice_id']?>]" value="<?=$value['course_fee']?>"placeholder="" ></div> 

					  </td>

					   

					    
                       

                       

                        <td class="text-center">

                          <div class="checkbox">

										<label>

											<input type="checkbox" <?=$value['course_fee']==0?"disabled":""?>  data="<?=$i?>" class="styled check" data-id="<?=$value['course_fee']?>" id="check">

										

										</label>
							</div>
						

                        </td>

						<td>

						   <input type="text" class="form-control payable_amount" id="abcd<?=$i?>" name="payable_amount[<?=$value['invoice_id']?>]"  disabled="disabled" />
						   <input type="hidden" name="invoice[<?=$value['invoice_id']?>]" value="<?=$value['invoice_id']?>">
						   <input type="hidden" name="enroll_student_id[<?=$value['invoice_id']?>]" value="<?=$value['id']?>">

					    </td>

                     </tr>
                

                      <?php	$i++;
                      $total_amount +=$value['course_fee'];
                      $total_amount_paid +=$value['paid_amount'];
                      $total_amount_due +=$value['course_fee'];
                       

                      }}else{ //echo "<tr><td> NO Classes are there</td></tr>";
                      }?>

				        

				 

					 <tr>

					    <td colspan="9"><div class="text-muted text-size-small text-right"><b>TOTAL</b></div></td>

						 
						

						 <td >  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <span class="form-control"style="color:red;"><?=$total_amount_due?></span></div> </td>
						 <td></td>

						 <td >  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i><span id="total_amount_display" class="form-control"style="color:green;"></span> </div> </td>

					 </tr>

					  <tr>

					    <td colspan="7">
                       
						<div class="text-muted text-size-small text-right">
                          <label>Discount</label>
							</div>
						  </td>
						  <td colspan="3">
                       
						<div class="text-muted text-size-small text-right">
					        <div class="input-group">
								
											<input type="text" class="form-control" id="admin_discount" name="admin_discount" placeholder="Enter Discount %" value="">
								
											<span class="input-group-btn">

												<button class="btn btn-success" id="apply" type="button">Apply</button>

											</span>

						    </div>

						</div>

						</td>

						 <td>

						  

						  </td>

						 

						 <td>  <div class="text-muted text-size-small"> <i class="fa fa-inr" aria-hidden="true"></i> - <span id="admin_discount_amount" class="form-control"></span></div> </td>

					 </tr>

					 

					  <tr>

					    <td colspan="10"><div class="text-muted text-size-small text-right"><b>GRAND TOTAL</b></div></td>
						  <td></td>
						 
						 <td>  <div class="text-muted"><span id="final_amount_display" class="form-control" style="font-weight:bold;color:green"></span></div> </td>

					 </tr>
						
					 </tbody>

               </table>

			   <div class="clearfix"></div>

			 

			   <div class="col-md-12 margin-0">

			   <div class="form-group col-md-4 ">

									

									<select name="payment_type" class="select form-control" required>

									<option value="">Payment Type</option> 

										<option value="1">Cash</option> 

		                                <option value="2">Credit Card/Debit Card</option> 

		                                <option value="3">NEFT</option> 

		                                <option value="4">Cheque</option>
		                                <option value="5">Paytm</option> 
										<option value="6">GPay</option> 
										<option value="7">Others</option> 


									</select>

								</div>

			        

								 

					<div class="form-group  col-md-8">

								 <textarea rows="1" cols="5" name="comments" class="form-control" placeholder="Comments"></textarea>

								</div>

			  <div class="clearfix"></div>

			   </div>          

			    <div class="clearfix"></div>

			   <div class="sub-btn form-group">

			   <input type="hidden" name="final_amount" id="final_amount">
			  <!--  <input type="hidden" name="maber_id" value="<?=$member_id?>"> -->
			   <input type="hidden" name="user_id" value="<?=$value['user_id']?>">

			   <input type="hidden" name="total_amount" id="total_amount">

		<!--<button type="submit" class="btn btn-primary active legitRipple center">Pay</button>-->
<button type="button" id="button" data-loading-text="Loading..."  class="btn btn-primary">Pay Now</button>
		</div>
</form> 
                 </div>
            </div>
            </div>
            </div>
            </div>
            <script>

	var startdate;
	var session_enddate;
	var session_per_week;
	var session;
	var course_fee;
	var final_amount;
   	var date;
   	var session_taken;
   	var total_session;
	var edate	
	var diff;
	var lastdate;
	
   	
	$('tr#rows').each(function(i, row){
		
    

		var $row = $(row);
	var enroll_id = $row.find('td #enroll_id').val();
     
		   
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
                         else{
                         	session_enddate="";
                         	session_taken="0";
                         }
                         var cls = $row.find("td #plan_id").text();
	
                           
                            $row.find("td #session_taken").val(session_taken);

                           total_session = $row.find("td #total_session").val();

                          diff= (session_taken-total_session)

                         if(diff <= 0){
                         date = $row.find('td #hiddendate').val();
                      
                      }
    else{
    
     date = session_enddate;
     
    }
   
    var newdate = new Date(date);
    var enddate = new Date(date);
    newdate.setDate(newdate.getDate() + 1);

    

    if(cls==1||cls==2||cls==7){
    enddate.setDate(enddate.getDate() + 92);
}
else if(cls==3||cls==4||cls==8)
	{
		enddate.setDate(enddate.getDate() + 182);
}
else if(cls==5||cls==6||cls==9)
	{
		enddate.setDate(enddate.getDate() + 365);
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

    var today = year + "-" + month + "-" + day;
    var end_date = year1 + "-" + month1 + "-" + day1;

	$row.find("td #start_date").attr("value", today);

    
    $row.find("td #end_date").attr("value",end_date);
    
                         
    $row.find("td #attendence_date").val(session_enddate);
     startdate= $row.find("td #start_date").val();
     lastdate =  $row.find("td #end_date").val();
     
	 }
	})
	}	   	
})

	





    $("#button").click(function() {
    //var $btn = $(this);
    //$btn.button('loading');
   $('#loading').show();
    
    $('#enrollstudent').submit();
})




</script>				
<script type="text/javascript">

var payable_amount = 0;
var final_amount=0;
var amount;
//var data = $("#check").attr('data');

	$(document).on("click",".check",function(){
		 
         var data = $(this).attr('data');
		 var amount = $(this).data('id');
		 if($(this).is(':checked') ){
		 	
		 	    $('#abcd'+data).removeAttr('disabled');
		 	    $('#abcd'+data).val(amount);
		  } else {
		        $('#abcd'+data).attr('disabled','');
		        $('#abcd'+data).val('');
		  }

		  payable_amount = 0;
		$("#admin_discount").val('');
		$("#admin_discount_amount").text('');
		$(".payable_amount").each(function(){
			if ($(this).val()!="") {
			  	payable_amount = parseInt(payable_amount)+parseInt($(this).val());}
			  });
		
		final_amount = payable_amount;
		$("#total_amount_display").text(payable_amount);
		$("#total_amount").val(payable_amount);

		$("#final_amount_display").text(final_amount);
	   	$("#final_amount").val(final_amount);
		  

	});

	
		var y= $('tr#rows').length;
     $(document).on("change",'#course_fee', function(){
	$('tr#rows').each(function(index,value){
		$row = $(value);
      //start_date = $row.find('td #course_fee');

      
      var amt = $row.find('td #course_fee').val();
			$row.find('td .check').data('id',amt);
		
	});
	})
		
	 /*$(document).on("change","#plan_id",function(){
  	
		   	var date = $('#start_date').val();
		   	var enddate = new Date(date);
		   	
		   	var str = $(this).val();
		   	var str1 = str.split("|");	
		   	course_fee = str1[1];
		    var cls = str1[0];
		    if(cls==1){
		    	sessions_per_week = '2';
		    	 session = '24';
		    	 enddate.setDate(enddate.getDate() + 90);
		    	 

		    }
		    else if (cls==2) {
		    	sessions_per_week = '3';
		    	 session = '36';
		    	 enddate.setDate(enddate.getDate() + 90);

		    }
		    else if(cls==3) {
		    	sessions_per_week = '2';
		    	 session = '48';
		    	 enddate.setDate(enddate.getDate() + 180);
		    }
		    	else {
		    	sessions_per_week = '3';
		    	 session = '72';
		    	 enddate.setDate(enddate.getDate() + 180);
		    }

		    var day1 = enddate.getDate();
            var month1 = enddate.getMonth() + 1 ;
            var year1 = enddate.getFullYear();
             //data = $(".check").attr('data');

             if (month1 < 10) month1 = "0" + month1;
             if (day1 < 10) day1 = "0" + day1;
            var end_date = year1 + "-" + month1 + "-" + day1;
             var paid_amount =$("#paid_amount").val();
             var balance_amount= (course_fee)-(paid_amount);
             var final_amount =$('#final_amount').text();
              
           var item = $(this).closest("tr.main").find('.check');
           item = 0;
           console.log(item)

           $(item).click(function() {
           var data= $(this).attr('data');
            var amount = 8000;
		 if ($(this).is(':checked')){
		 $('#abcd'+data).removeAttr('disabled');
		 $('#abcd'+data).text(amount);
        } 
		})
		  

              
             //$('#abcd'+data).text(balance_amount);
		    $(this).closest("tr.main").find('#total_session').val(total_session);
		    $("#total_session").val(session);
		    $("#end_date").attr("value",end_date);
		    $("#final_amount").text(course_fee);
		    $("#balance_amount").text(balance_amount);
		    
             // $total_amount += final_amount;
              //$("#total_amount").text($total_amount);
		   
		})*/


	$(document).on("change",".payable_amount",function(){

		//payable_amount = parseInt(payable_amount)+parseInt($(this).val());
		payable_amount = 0;
		$("#admin_discount").val('');
		$("#admin_discount_amount").text('');
		$(".payable_amount").each(function(){
			//alert($(this).val());

			if ($(this).val()!="") {
			  	payable_amount = parsInt(payable_amount)+parseInt($(this).val());}
			  });
		//alert(payable_amount);
		final_amount = payable_amount;
		$("#total_amount_display").text(payable_amount);
		$("#total_amount").val(payable_amount);

		$("#final_amount_display").val(payable_amount);
	   	$("#final_amount").val(payable_amount);
	});


	$(document).on("click","#apply",function(){
			
		var admin_discount = $("#admin_discount").val();

	   	if(admin_discount!=null)
	   	{
	   		var admin_discount_amount = (payable_amount*(admin_discount/100));
	   		final_amount = parseInt(payable_amount)-(admin_discount_amount);
	   		$("#final_amount_display").text(final_amount);
	   		$("#final_amount").val(final_amount);

	   		$("#admin_discount_amount").text(admin_discount_amount);
	   	}
		

		});
     var start_date;
     var end_date;


     var y= $('tr#rows').length;
     $(document).on("change",'#start_date', function(){
	$('tr#rows').each(function(index,value){
		$row = $(value);
      //start_date = $row.find('td #start_date');

      
      var date = $row.find('td #start_date').val();
		   	var enddate = new Date(date);
		   	
		   	var cls = $row.find('td #plan_id').text();
		   	
		    if(cls==1||cls==2||cls==7){
		    	
		    	 enddate.setDate(enddate.getDate() + 91);
		    	 
               }
		    
		    else if(cls==3||cls==4||cls==8) {
		    	
		    	 enddate.setDate(enddate.getDate() + 182);
		    }
			else if(cls==5||cls==6||cls==9)
	{
		enddate.setDate(enddate.getDate() + 365);
}
		    	

		    var day1 = enddate.getDate();
            var month1 = enddate.getMonth() + 1 ;
            var year1 = enddate.getFullYear();
             //data = $(".check").attr('data');

             if (month1 < 10) month1 = "0" + month1;
             if (day1 < 10) day1 = "0" + day1;
             end_date = year1 + "-" + month1 + "-" + day1;
             
              $row.find('td #end_date').val(end_date);
		    

      })
  });



</script>