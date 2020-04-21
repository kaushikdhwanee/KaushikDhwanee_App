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

?>
			<div class="content-wrapper">

     			<div class="row">

					<div class="col-lg-12">



						<div class="panel panel-flat">

							<div class="panel-heading">

								<h5 class="panel-title">Creat Summercamp Plan</h5>

								<br>

							</div>

							<form id="plan" method="post" action="<?=base_url("admin/insertsummerplan")?>">

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
						  	
                                </div>
                                <div class="col-md-12">
                              
								<div class="form-group  col-md-6">
								<label>One Week</label>
								 <input class="form-control" name="one_week" id="two_session_3months" onkeypress='return event.charCode >= 48 &&                                              event.charCode <= 57' value="<?=@$plan_info['one_week']?>" placeholder="Price for one week" type="text">

								</div>

								<div class="form-group  col-md-6">
								<label>Two Week </label>

								 <input class="form-control" name="two_week" id="two_session_6months" onkeypress='return event.charCode >= 48 &&                                               event.charCode <= 57' value="<?=@$plan_info['two_week']?>" placeholder="Price for two week" type="text">

								</div>

								<div class="form-group  col-md-6">
								<label>Three Week</label>

								 <input class="form-control" name="three_week" id="three_session_3months" onkeypress='return event.charCode >= 48 &&                                            event.charCode <= 57' value="<?=@$plan_info['three_week']?>" placeholder="Price for three week" type="text">

								</div>

								<div class="form-group  col-md-6">

								<label>Four Week </label>

								 <input class="form-control" name="four_week" id="three_session_6months"onkeypress='return event.charCode >= 48 &&                                            event.charCode <= 57' value="<?=@$plan_info['four_week']?>" placeholder="Price for four week" type="text">

								</div>
								<div class="form-group  col-md-6">

								<label>Five Week</label>

								 <input class="form-control" name="five_week" id="two_session_12months"onkeypress='return event.charCode >= 48 &&                                              event.charCode <= 57' value="<?=@$plan_info['five_week']?>" placeholder="Price for five week" type="text">

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

</body>

</html>

<script type="text/javascript">
  $(document).ready(function(){
  	
    $("#plan").validate({
      rules: {
       
        branch_id:"required",
        one_week:"required",
        two_week:"required",
		  three_week:"required",
		  four_week:"required",
		  five_week:"required",
       // three_session_3months: "required",
        //three_session_6months: "required",
        //five_session: "required",
        //six_session: "required",

      },
    });
   
  	   	$("#branch_id").change(function(){
		  
		   	var  branch_id = $(this).val();
		  
		   	//$("input[name=one_session]").val('');
			$("input[name=one_week]").val('');
			$("input[name=two_week]").val('');
			$("input[name=three_week]").val('');
			$("input[name=four_week]").val('');
			$("input[name=five_week]").val('');
			$("input[name=id]").val('');
		   	
		   	//alert(branch_id);alert(class_id);
		   	if(branch_id !="")
		   	{
		   		$.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin/getsummerplan')?>",
		   		data:{branch_id:branch_id},
		   		success: function(message){
		   			var resp = JSON.parse(message);
		   			if(resp.success==1)
		   			{
		   				$("input[name=one_week]").val(resp.one_week);
		   				$("input[name=two_week]").val(resp.two_week);
		   				$("input[name=three_week]").val(resp.three_week);
		   				$("input[name=four_week]").val(resp.four_week);
		   				$("input[name=five_week]").val(resp.five_week);
		   				$("input[name=id]").val(resp.id);

		   			}

		   		}
		   	});
		   	}
		   	
   		}); 

  		

});
</script>