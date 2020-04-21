<style>
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
</style>
<?php
//print_r($classes);exit;
?>
			<div class="content-wrapper">

     			<div class="row">

					<div class="col-lg-12">



						<div class="panel panel-flat">

							<div class="panel-heading">

								<h5 class="panel-title">Creat Plan</h5>

								<br>



							</div>

							<form id="plan" method="post" action="<?=base_url("admin/insertplan")?>">

							<div class="col-md-12 product">

								<div class="form-group col-md-6">
									
									<div class="multi-select-full">
									  
										 <select data-placeholder="Select Branch" id="branch_id" name="branch_id" class="select">

						                            	<option value="">Select</option>

						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>"><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                 </select>
										
									</div>
								</div>
							

							  	<div class="form-group  col-md-6">

								                   <select  data-placeholder="Select Class" name="class_id"  id="class_id" class="select">

						                            	 	<option value="">Select class</option>

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
                                
								</div>
                                </div>
                                <div class="col-md-12">
                                
								<div class="form-group  col-md-6">
								<label>2 sessions / week (3 months)</label>
								 <input class="form-control" name="two_session_3months" id="two_session_3months" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=@$plan_info['two_session_three_months']?>" placeholder="Price for three Month" type="text">

								</div>

								<div class="form-group  col-md-6">
								<label>2 session / week (6 months)</label>

								 <input class="form-control" name="two_session_6months" id="two_session_6months" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=@$plan_info['two_session_six_months']?>" placeholder="Price for three Month" type="text">

								</div>

								<div class="form-group  col-md-6">
								<label>2 session / week (2 months)</label>

								 <input class="form-control" name="two_session_2months" id="three_session_3months" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=@$plan_info['two_session_two_months']?>" placeholder="Price for six Month" type="text">

								</div>

								<div class="form-group  col-md-6">

								<label>3 session / week (6 months)</label>

								 <input class="form-control" name="three_session_6months" id="three_session_6months"onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=@$plan_info['three_session_six_months']?>" placeholder="Price for six Month" type="text">

								</div>
								<div class="form-group  col-md-6">

								<label>2 session / week (12 months)</label>

								 <input class="form-control" name="two_session_12months" id="two_session_12months"onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=@$plan_info['two_session_one_year']?>" placeholder="Price for twelve Month" type="text">

								</div>
								<div class="form-group  col-md-6">

                                <label>3 session / week (12 months)</label>

                                <input class="form-control" name="three_session_12months" id="three_session_12months"onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=@$plan_info['three_session_six_months']?>" placeholder="Price for twelve Month" type="text">

                                </div>


								
								 <div class="clearfix"></div>

								<div class="sub-btn form-group">
				<input type="hidden" name="id" id="plan_id" value="">
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


	

</body>

</html>

<script type="text/javascript">
  $(document).ready(function(){
  	
    $("#plan").validate({
      rules: {
        class_id: "required",
        branch_id:"required",
        two_session_3months:"required",
        two_session_6months:"required",
       // three_session_3months: "required",
        //three_session_6months: "required",
        //five_session: "required",
        //six_session: "required",

      },
    });
   
  	   	$("#branch_id").change(function(){
		  
		   	var  branch_id = $(this).val();
		   	var  class_id = $("#class_id").val();

		   	//$("input[name=one_session]").val('');
			$("input[name=two_session_3months]").val('');
			$("input[name=three_session_3months]").val('');
			$("input[name=two_session_6months]").val('');
			$("input[name=three_session_6months]").val('');
			//$("input[name=six_session]").val('');
			$("input[name=id]").val('');
		   	
		   	//alert(branch_id);alert(class_id);
		   	if(class_id !="" && branch_id !="")
		   	{
		   		$.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin/getplanbybranch')?>",
		   		data:{class_id:class_id,branch_id:branch_id},
		   		success: function(message){
		   			var resp = JSON.parse(message);
		   			if(resp.success==1)
		   			{
		   				$("input[name=two_session_3months]").val(resp.two_session_three_months);
		   				$("input[name=two_session_2months]").val(resp.two_session_two_months);
		   				$("input[name=two_session_6months]").val(resp.two_session_six_months);
		   				//$("input[name=three_session_6months]").val(resp.three_session_six_months);
						$("input[name=two_session_12months]").val(resp.two_session_one_year);
		   				//$("input[name=five_session]").val(resp.five_session);
		   				//$("input[name=six_session]").val(resp.six_session);
		   				$("input[name=id]").val(resp.id);

		   			}

		   		}
		   	});
		   	}
		   	
   		}); 

  		$("#class_id").change(function(){
		  
		   	var class_id = $(this).val();
		   	var branch_id = $("#branch_id").val();

		   	$("input[name=two_session_3months]").val('');
			$("input[name=three_session_3months]").val('');
			$("input[name=two_session_6months]").val('');
			$("input[name=three_session_6months]").val('');
			//$("input[name=six_session]").val('');
			$("input[name=id]").val('');
		   	
		   	//alert(branch_id);alert(class_id);
		   	if(class_id !="" && branch_id !="")
		   	{
		   		$.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin/getplanbybranch')?>",
		   		data:{class_id:class_id,branch_id:branch_id},
		   		success: function(message){
		   			var resp = JSON.parse(message);
		   			if(resp.success==1)
		   			{
		   				$("input[name=two_session_3months]").val(resp.two_session_three_months);
		   				$("input[name=two_session_2months]").val(resp.two_session_two_months);
		   				$("input[name=two_session_6months]").val(resp.two_session_six_months);
		   				//$("input[name=three_session_6months]").val(resp.three_session_six_months);
						$("input[name=two_session_12months]").val(resp.two_session_one_year);
		   				//$("input[name=five_session]").val(resp.five_session);
		   				//$("input[name=six_session]").val(resp.six_session);
		   				$("input[name=id]").val(resp.id);

		   			}

		   		}
		   	});
		   	}
		   	
   		});

});
</script>