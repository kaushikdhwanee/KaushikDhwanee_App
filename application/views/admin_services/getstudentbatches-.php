                    <form method="post" action="<?=base_url("admin/insertpayments")?>"> 
                     <table class="table text-nowrap">

                  <thead>

                     <tr>

                        <th>S No</th>

						
                        <th>Timing</th>

                        <th> Total Amount</th>

                        <th> Amount Paid</th>

                        <th> Amount Due</th>


                        <th>Action</th>

						<th>Amount Paying</th>

                     </tr>

                  </thead>

                  <tbody class="refar-price">


                     <?php 
                     $days = array('1'=>'Mon','2'=>'Tue','3'=>'Wed','4'=>'Thu','5'=>'Fri','6'=>'Sat','7'=>'Sun');
                     $total_amount =0;
                     $total_amount_paid =0;
                     $total_amount_due =0;
                     

                     //print_r($batches);
                     if(!empty($batches)){
                     	$i=1;
                     	foreach ($batches as $key => $value) {
                     		
                     	
                     	?>

                    
                     <tr>

                        <td class="text-center"><h6 class="no-margin"><?=$i?></h6></td>



                        <td> <div class="media-left">

													<div class=""><a href="#" class="text-default text-semibold"><?=$value['class_name']?></a></div>

													<?php
													//print_r($batch_classes);exit;
														if(!empty($batch_classes[$value['id']])){

															foreach ($batch_classes[$value['id']] as $class_info) {
																//echo $class_info['type'];
																?>
																
														
													<div class="text-muted text-size-smalls">

														<span class="status-mark border-danger position-left"></span>

														<?=$days[$class_info['type']]." - ".$class_info['start_time']." - ".$class_info['end_time']?>

													</div>

													<?php	}
														}

														?>

													<!-- <div class="text-muted text-size-smalls">

														<span class="status-mark border-danger position-left"></span>

														Tue - 18:00 - 19:00

													</div> -->

												</div></td>

                       <td> 

					   <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$value['final_amount']?></div> 

					  </td>

					   <td> 

					   <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$value['paid_amount']?></div> 

					   </td>

					    <td> 

					   <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$value['final_amount']-$value['paid_amount']?></div> 

					   </td>

                       

                       

                        <td class="text-center">

                          <div class="checkbox">

										<label>

											<input type="checkbox" <?=$value['paid_status']==2?"disabled":""?>  data="<?=$i?>" class="styled check" >

										

										</label>

						</div>

                        </td>

						<td>

						   <input type="text" class="form-control payable_amount" id="abcd<?=$i?>" name="payable_amount[]"  disabled="disabled" />
						   <input type="hidden" name="invoice[]" value="<?=$value['invoice_id']?>">
						   <input type="hidden" name="enroll_student_id[]" value="<?=$value['id']?>">

					    </td>

                     </tr>

                      <?php	$i++;
                      $total_amount +=$value['final_amount'];
                      $total_amount_paid +=$value['paid_amount'];
                      $total_amount_due +=($value['final_amount']-$value['paid_amount']);

                      }}else{ echo "<tr><td> NO Classes are there</td></tr>";}?>

				        

				 

					 <tr>

					    <td colspan="2"><div class="text-muted text-size-small text-center"><b>TOTAL</b></div></td>

						 <td >  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$total_amount?></div> </td>
						 <td >  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$total_amount_paid?></div> </td>

						 <td colspan="2">  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$total_amount_due?></div> </td>

						 <td>  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i><span id="total_amount_display"></span> </div> </td>

					 </tr>

					  <tr>

					    <td colspan="5">

						<div class="text-muted text-size-small">

					        <div class="input-group">

											<input type="text" class="form-control" id="admin_discount" name="admin_discount" placeholder="Enter Discount">

											<span class="input-group-btn">

												<button class="btn btn-default black legitRipple" id="apply" type="button">Apply</button>

											</span>

						    </div>

						</div>

						</td>

						 <td>

						  <i class="fa fa-minus" aria-hidden="true"></i> 

						  </td>

						 

						 <td>  <div class="text-muted text-size-small"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="admin_discount_amount"></span></div> </td>

					 </tr>

					 

					  <tr>

					    <td colspan="3"><div class="text-muted text-size-small text-center"><b>GRAND TOTAL</b></div></td>

						 <td colspan="3">  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$total_amount?></div> </td>

						 <td>  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <span id="final_amount_display"></span></div> </td>

					 </tr>
					 </tbody>

               </table>

			   <div class="clearfix"></div>

			 

			   <div class="col-md-12 margin-0">

			   <div class="form-group col-md-4">

									

									<select name="payment_type" class="selectbox-mousedown">

									<option value="">Select Payment</option> 

										<option value="1">Cash</option> 

		                                <option value="2">Credit Card</option> 

		                                <option value="3">Debit Card</option> 

		                                <option value="4">Cheque</option>

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
			   <input type="hidden" name="member_id" value="<?=$member_id?>">
			   <input type="hidden" name="total_amount" id="total_amount">

		<button type="submit" class="btn btn-primary active legitRipple center">Pay</button>

		</div>
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
                   