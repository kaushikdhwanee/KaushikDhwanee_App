
			<div class="content-wrapper">

     			<div class="row">

					<div class="col-lg-12">



						<div class="panel panel-flat">

							<div class="panel-heading">

								<h5 class="panel-title">ADD Additional Fee</h5>

								<br>



							</div>

							<form method="post" id="branch" enctype="multipart/form-data" action="<?=base_url("admin/insertadditionalfee")?>">
								
							

							<div class="col-md-12 product">

							

								<div class="form-group  col-md-8">

								 <input class="form-control" name="amount" onkeypress="return event.charCode>=48 && event.charCode<=57" value="<?=@$branch_info['amount']?>" placeholder="Additional amount" type="text">

								</div>

								 <div class="form-group col-md-8">

								 <textarea rows="2" cols="5" class="form-control" name="comments" placeholder="comments"><?=@$branch_info['comments']?></textarea>

								</div>

											 <div class="clearfix"></div>

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
											<option value="6">GPay</option> 
											<option value="7">Others</option> 
											

									</select>
									</div>

								</div>

								<div class="sub-btn form-group">
		<input type="hidden" name="enroll_student_id" value="<?=@$this->uri->segment(3)?>">								
		<button type="submit" class="btn btn-primary active legitRipple center">SUBMIT</button>

		</div>

							</div>

							
</form>
							<div class="clearfix"></div>

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

<?php // include_once 'includes/footer.php'?>

	

</body>

</html>

	
<script type="text/javascript">
  $(document).ready(function(){
  	
    $("#branch").validate({
      rules: {
        branch_name: "required",
        geolocation:"required",
        email:{
        	email:true
        },
        mobile: {
        	
        	minlength: 10,
        	maxlength: 10,
        	
        	},

      },
    });
   
  });
</script>