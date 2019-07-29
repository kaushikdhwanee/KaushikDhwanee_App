	   <form method="post" action="<?=base_url("admin_services/insertpayments")?>"> 
	<?php 
                     $days = array('1'=>'Mon','2'=>'Tue','3'=>'Wed','4'=>'Thu','5'=>'Fri','6'=>'Sat','7'=>'Sun');
                     $total_amount =0;
                     $total_amount_paid =0;
                     $total_amount_due =0;
                     
                     $month = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');

                     //print_r($batches);
                     if(!empty($invoice)){
                     	$i=1;
                     	foreach ($invoice as $key => $value) {                     		
                     	
                     	?>
									<div class="fee-box1  cool" data="ab<?=$i?>">
										<div class="row" >
											<div class="col-xs-4">
												<span><?="<b>".$value['name']."</b>(".$value['class_name'].")"?></span>
											</div>
											<div class="col-xs-5">
												<span> <?=$month[$value['invoice_month']]."-".$value['invoice_year']?></span>
												
											
												<small style="color:rgb(179,179,179);">Total Amount <?=$value['final_amount']  ." : Amount Paid :".$value['paid_amount'] ?> </small><br>
											</div>
											<div class="col-xs-3">
												<h3 style="position: absolute;top:-9px;left:16%;font-size:20px"><i class="fa fa-rupee" style="color:rgb(237,28,36);"></i><?=$value['final_amount']-$value['paid_amount']?></h3>
												<div class="answer" style="display:none">
												<?php if(($value['final_amount']-$value['paid_amount'])>0){?>
													
													 <input type="number" autocomplete="off" class="form-control payable_amount"  id="abcd<?=$i?>" name="payable_amount[]"  style="width:54px;" />

													<?php }?>
													
												</div>
												<input type="hidden" name="invoice[]" value="<?=$value['invoice_id']?>">
						   							<input type="hidden" name="enroll_student_id[]" value="<?=$value['id']?>">
											</div>
										</div>
									</div>
									 <?php	$i++;
                      $total_amount +=$value['final_amount'];
                      $total_amount_paid +=$value['paid_amount'];
                      $total_amount_due +=($value['final_amount']-$value['paid_amount']);

                      }?>
									
									<div class="box-total">
										<h5 class="text-center">TOTAL</h5>
										<div class="row">
											<div class="col-xs-4">
												<div class="form-group">
													<input type="number" class="form-control" id="admin_discount" name="admin_discount" placeholder="Enter Discount">
												</div>
											</div>
											<div class="col-xs-4">
												<!-- <button class="bnt btn-default btn-xs">Apply</button> -->
												<span  id="apply"  class="apply">Apply</span>
											</div>
											<div class="col-xs-4">
												<span class="dance-rupees"><i class="fa fa-rupee" style="color:rgb(237,28,36);"></i><span id="admin_discount_amount"></span></span>
												
											</div>
										</div>
										
										<div class="row">
											<div class="col-xs-4">
												<h5>GrandTotal</h5>
											</div>
											<div class="col-xs-4">
												<span class="cntr-txt"></span>
											</div>
											<div class="col-xs-4">
												<span class="dance-rupees"><i class="fa fa-rupee" style="color:rgb(237,28,36);"></i><span id="final_amount_display"></span></span>
											</div>
										</div><br>
										<div class="row">
											<div class="col-xs-12">
												<div class="form-group">
													<div class="icon-addon addon-md">
														<select name="payment_type" class="form-control">

															<option value="">Select Payment</option> 

															<option value="1">Cash</option> 

							                                <option value="2">Credit Card/Debit Card</option> 

							                                <option value="3">NEFT</option> 

							                                <option value="4">Cheque</option>
							                                
							                                <option value="5">Paytm</option> 

														</select>
														<i class="fa fa-rupee" aria-hidden="true"></i>
													</div>
												</div>
												
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div class="form-group">
													<textarea class="form-control" name="comments" placeholder="Comments"></textarea>
												</div>
											</div>
										</div>
									
								  </div>
								   	<input type="hidden" name="final_amount" id="final_amount">
			   						<!-- <input type="hidden" name="member_id" value="<?=$member_id?>"> -->
			   						 <input type="hidden" name="user_id" value="<?=$user_id?>">
			   						<input type="hidden" name="total_amount" id="total_amount">
								  <button type="submit">PAY</button>

								<?php  }else{ echo "<tr><td> NO Classes are there</td></tr>";}?>

</form>

<script type="text/javascript">
var payable_amount = 0;
var final_amount;
	$(document).on("click",".check",function(){
		var data = $(this).attr('data');
		//alert(data);return false;

		 if($('.check').is(':checked') ){
		 	//alert("hiiiiiiii");
		        $('#abcd'+data).removeAttr('disabled');
		  } else {
		        $('#abcd'+data).attr('disabled','');
		        $('#abcd'+data).val('');
		  }
		  

	});
	$(document).on("change",".payable_amount",function(){

		//payable_amount = parseInt(payable_amount)+parseInt($(this).val());
		payable_amount = 0;
		$("#admin_discount").val('');
		$("#admin_discount_amount").text('');
		$(".payable_amount").each(function(){
			//alert($(this).val());

			if ($(this).val()!="") {
			  	payable_amount = parseInt(payable_amount)+parseInt($(this).val());}
			  });
		//alert(payable_amount);
		final_amount = payable_amount;
		$("#total_amount_display").text(payable_amount);
		$("#total_amount").val(payable_amount);

		$("#final_amount_display").text(final_amount);
	   	$("#final_amount").val(final_amount);
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
</script>


<script>


$(document).on('click','.cool', function(){
	
	var data = $(this).attr('data');

	$(this).css("background", "#F4F4F4");
  	$('.answer').show();
});

</script>