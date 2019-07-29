
<div class="content-wrapper">

    <div class="row">

	    <div class="col-lg-8">
			<div class="panel panel-flat">

				<div class="panel-heading">

					<h5 class="panel-title">Add Admin</h5>

					<br>



				</div>

				<form method="post" action="<?=base_url("admin/insertadminrole")?>" id="adminrole" >        
					<div class="col-md-11">
                                    <div class="form-group  col-md-5">

								    <select name="admin_type" class="select">

						            <option value="">Admin Type</option> 

						                <option >Super Admin </option>
	                        			 <!--<option >City Admin </option>-->
	                        			 <option >Branch Admin</option> 
	                                           
						            </select>
				    </div>
				</div>
					<div class="col-md-11 product">

						<div class="form-group  col-md-5">

							<input class="form-control" value="<?=@$role_info['name']?>" name="name" placeholder="Admin Name" type="text">

						</div>
                          <div class="col-md-1"></div>
                        <div class="form-group1  col-md-5">

						    <input type="file" name="image" class="file-styled">

						</div>
					</div>
                    <div class="col-md-11">
						<div class="form-group  col-md-5">
                                <div class="input-group">

								<span class="input-group-addon"><i class="icon-calendar"></i></span>

								<input type="text" value="<?=@($role_info['date_of_birth']!="")?date("d-m-Y",strtotime($role_info['date_of_birth'])):""?>" class="form-control" id="datepicker" name="date_of_birth" placeholder="Date of Birth">

							</div>
							

						</div>
                        <div class="col-md-1"></div>
						<div class="form-group  col-md-5">

							<input class="form-control" value="<?=@$role_info['email']?>" name="email" placeholder="Email ID" type="text">

						</div>
                    </div>
                    <div class="col-md-11">
						<div class="form-group  col-md-5">

							<input class="form-control" value="<?=@$role_info['mobile']?>" name="mobile" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Mobile No(as Login User name)" type="text">

						</div>
						<div class="col-md-1"></div>
                        <div class="form-group  col-md-5">

							<input class="form-control" name="password" placeholder="Password" type="password">

						</div>
                    </div>
                    <div class="col-md-11">

                                <div class="form-group  col-md-5">

								    <select name="city_id" class="select">

						            <option value="">Select City</option> 

						                <?php
						                if(!empty($city))
						                  {
						                    foreach ($city as $city_info) {
						                ?>
						                    <option value="<?=$branch_info['id']?>" <?=@$role_info['branch_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>
						                               
						                            </select>

								</div>

                                 <div class="col-md-1"></div>
								<div class="form-group  col-md-5">

								                   <select name="branch_id" class="select">

						                            	 <option value="">Select Branch</option> 

						                                <?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>" <?=@$role_info['branch_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>
						                               
						                            </select>

								</div>

								

								<div class="form-group  col-md-8">

								 <textarea rows="2" cols="5"  name="address" class="form-control" placeholder="Address"><?=@$role_info['address']?></textarea>

								</div>

								<div class="clearfix"></div>

								<div class="sub-btn form-group">
			<input type="hidden" name="admin_role_id" value="<?=@$role_info['admin_role_id']?>">						
		<button  class="btn btn-primary active legitRipple center">SUBMIT</button>

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
<script type="text/javascript">
   //function initialize() {}
     $(function(){
     	
        $("#geocomplete").geocomplete({
          //location: [<?php echo  @$branch_info['latitude'];?>,<?php echo  @$branch_info['longitude'];?>],
          map: ".map_canvas",
          details: "form",
          types: ["geocode", "establishment"],
        
        });       
      $("#geocomplete").bind("geocode:dragged", function(event, latLng){
           $("input[name=lat]").val(latLng.lat());
           $("input[name=lng]").val(latLng.lng());
       
          $("#reset").show();
        });
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        });
      
   
      });

</script>
<script type="text/javascript">
	var vendor_id ="";  	
	vendor_id ="<?=$this->uri->segment('3')?>";
  $(document).ready(function(){
  	
     $("#adminrole").validate({
      rules: {
        name: "required",
       	//password:"required",
		email: "required",
        date_of_birth:"required",
        //password: "required",
        mobile: {
        	required: true,
        	minlength: 10,
        	maxlength: 10,
        	remote:{
        		url: "<?=base_url('admin/checkmobile')?>",
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

   
  });
</script>