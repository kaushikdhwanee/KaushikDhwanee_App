<?php //include_once 'includes/header.php'?>

<div class="content-wrapper">

   <div class="row">

      <div class="col-lg-12">

     	<div class="panel panel-flat">
     			<form method="post" id="discount" action="<?=base_url("admin/insertdiscount")?>">
							<div class="panel-heading">

								<h5 class="panel-title">Create Discounts</h5>

							</div>



							<div class="col-md-12 product">

							

							  <div class="col-md-8 col-md-offset-2">

							  <div class="form-group">
									
									<div class="multi-select-full">
									  
										 <select data-placeholder="Select Branch" name="branch_id" id="branch_id" class="select">

						                            	<option value="">Select</option>

						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>" <?=@$discount_info['branch_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                 </select>
										
									</div>
								</div>

							     <div class="form-group">

									<label class="control-label col-lg-6"><p class="sib-dis">Sibling Discounts</p></label>

									<div class="col-lg-6">

										<div class="input-group">

											<input type="text" class="form-control" value="<?=@$discount_info['sibling_discount']?>" onkeypress="return event.charCode>=48 && event.charCode<=57" name="sibling_discount" placeholder="Sibling Discounts">

											<span class="input-group-addon">%</span>

										</div>

									</div>

									<div class="clearfix"></div>

								</div>

								 <div class="form-group">

									<label class="control-label col-lg-6"><p class="sib-dis">3 Months Upfront Discounts</p></label>

									<div class="col-lg-6">

										<div class="input-group">

											<input type="text" class="form-control" name="three_months_discount" onkeypress="return event.charCode>=48 && event.charCode<=57"  value="<?=@$discount_info['three_months_discount']?>" placeholder="3 Months Upfront Discounts">

											<span class="input-group-addon">%</span>

										</div>

									</div>

									<div class="clearfix"></div>

								</div>

								 <div class="form-group">

									<label class="control-label col-lg-6"><p class="sib-dis">6 Months Upfront Discounts</p></label>

									<div class="col-lg-6">

										<div class="input-group">

											<input type="text" class="form-control" value="<?=@$discount_info['six_months_discount']?>" onkeypress="return event.charCode>=48 && event.charCode<=57" name="six_months_discount" placeholder="6 Months Upfront Discounts">

											<span class="input-group-addon">%</span>

										</div>

									</div>

									<div class="clearfix"></div>

								</div>

									 <div class="form-group">

									<label class="control-label col-lg-6"><p class="sib-dis">12 Months Upfront Discounts</p></label>

									<div class="col-lg-6">

										<div class="input-group">

											<input type="text" name="one_year_discount" value="<?=@$discount_info['one_year_discount']?>" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control" placeholder="12 Months Upfront Discounts">

											<span class="input-group-addon">%</span>

										</div>

									</div>

									<div class="clearfix"></div>

								</div>

								 <div class="form-group">

									<label class="control-label col-lg-6"><p class="sib-dis">Referal </p></label>

									<div class="col-lg-4">

										<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>

											<input type="text" class="form-control" value="<?=@$discount_info['referral']?>" onkeypress="return event.charCode>=48 && event.charCode<=57" name="referral" placeholder="Referal">

									

									</div>

									<div class="clearfix"></div>

								</div>

								 <div class="form-group">

									<label class="control-label col-lg-6"><p class="sib-dis">Referee</p></label>

									<div class="col-lg-4">

										<span class="input-group-btn">	
												<button class="btn btn-default btn-icon legitRipple" type="button">Rs</button>
											</span>

											<input type="text" value="<?=@$discount_info['referee']?>" name="referee" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control" placeholder="Referee">

											

									

									</div>

									<div class="clearfix"></div>

								</div>

								<div class="clearfix"></div>

								<div class="sub-btn form-group">
								<input name="id" value="<?=@$discount_info['id']?>" type="hidden">
		<button type="submit" class="btn btn-primary active legitRipple center">SUBMIT</button>

		</div>

							</div>

							</div>

							<div class="clearfix"></div>
</form>
						</div>

						</div>

      <div class="col-lg-3">

         <?php //include_once 'includes/right-sidepanel.php'?>

      </div>

   </div>

</div>

<!-- /main content -->

</div>

</div>

<!-- Footer -->

<?php //include_once 'includes/footer.php'?>



</body>

</html>



<script type="text/javascript">
  $(document).ready(function(){
  	
    $("#discount").validate({
      rules: {
        branch_id:"required",
        three_months_discount:"required",
        six_months_discount:"required",
        one_year_discount: "required",
        referral: "required",
        referee: "required",
        

      },
    });
   
  

  		$("#branch_id").change(function(){
		  
		   	
		   	var branch_id = $("#branch_id").val();
		   	if(branch_id !="")
		   	{
		   		$.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin/getdiscount')?>",
		   		data:{branch_id:branch_id},
		   		success: function(message){
		   			var resp = JSON.parse(message);
		   			if(resp.success==1)
		   			{
		   				$("input[name=three_months_discount]").val(resp.three_months_discount);
		   				$("input[name=six_months_discount]").val(resp.six_months_discount);
		   				$("input[name=one_year_discount]").val(resp.one_year_discount);
		   				$("input[name=referee]").val(resp.referee);
		   				$("input[name=referral]").val(resp.referral);
		   				$("input[name=sibling_discount]").val(resp.sibling_discount);
		   				$("input[name=id]").val(resp.id);

		   			}else
		   			{
		   				$("input[name=three_months_discount]").val('');
		   				$("input[name=six_months_discount]").val('');
		   				$("input[name=one_year_discount]").val('');
		   				$("input[name=referee]").val('');
		   				$("input[name=referral]").val('');
		   				$("input[name=sibling_discount]").val('');
		   				$("input[name=id]").val('');
		   			}

		   		}
		   	});
		   	}
		   	
   		}); 

});
</script>
