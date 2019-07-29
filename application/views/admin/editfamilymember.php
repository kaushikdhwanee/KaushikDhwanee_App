
			<div class="content-wrapper">
     			<div class="row">
					<div class="col-lg-12">

						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Add Users</h5>
							</div>
							
							<div class="col-md-12 product">
							
							
<form method="post" action="<?=base_url("admin/updatefamilymember")?>" id="family-memeber"  enctype="multipart/form-data">
	<div class="col-md-12">
		
								 
                              <div class="form-group  col-md-4">
								 <input class="form-control" name="name" placeholder="Family Member name" value="<?=$user_info['name']?>" type="text">
								</div>
								<div class="form-group col-md-4">
								   <input type="file" class="file-styled imgInp" name="image"   >
                       
                        <div id="dvPreview"><img src="<?=base_url("uploads/user_images/".$user_info['profile_pic'])?>" id="imgPreview" style="width:100px"/></div>
                        
								</div>
								
	 	<div class="clearfix"></div>
        <div class="col-md-12">

								<div class="sub-btn form-group col-md-6">
								<input type="hidden"  class="registration_amount" name="member_id" value="<?=$user_info['member_id']?>">
		<button type="submit" class="btn btn-primary active legitRipple center add_family_member">Update</button>
		</div>         
                                                                                  
</div>				
								
	</div>
</form>
							</div>
							
							<div class="clearfix"></div>
						</div>
						

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

     $("#family-memeber").validate({
      rules: {
        name: "required",
       	user_id:"required",
		branch_id:"required",

      },
      messages:{
      	mobile:{
      		remote:"Aleready registered",
      	}
      }
    });


</script>