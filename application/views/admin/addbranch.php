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
			<div class="content-wrapper">

     			<div class="row">

					<div class="col-lg-12">



						<div class="panel panel-flat">

							<div class="panel-heading">

								<h5 class="panel-title">Add Branches</h5>

								<br>



							</div>

							<form method="post" id="branch" enctype="multipart/form-data" action="<?=base_url("admin/insertbranch")?>">
								
							

							<div class="col-md-12 product">

							

							  <div class="form-group  col-md-4">



								 <input class="form-control" name="branch_name" placeholder="Enter Branch Name" value="<?=@$branch_info['branch_name']?>" type="text">



								</div>



								<div class="form-group  col-md-4">

								 <input class="form-control" id="geocomplete" name="geolocation" value="<?=@$branch_info['location']?>" placeholder="Location(geolocation)" type="text">
								 <input type="hidden" name="lat" value="<?=@$branch_info['latitude']?>" data-geo="lat">
                  				  <input type="hidden" name="lng" value="<?=@$branch_info['longitude']?>" data-geo="lng">
								<div class="map_canvas" style="display:none"></div>
								</div>

								<div class="form-group  col-md-4">

								 <input class="form-control" name="mobile" onkeypress="return event.charCode>=48 && event.charCode<=57" value="<?=@$branch_info['mobile']?>" placeholder="contact No" type="text">

								</div>

								<div class="form-group  col-md-4">

								 <input class="form-control" name="email" value="<?=@$branch_info['email']?>" placeholder="Email ID" type="text">

								</div>



								<div class="form-group  col-md-4">

								 <input class="form-control" name="contact_person_name" value="<?=@$branch_info['contact_person_name']?>" placeholder="Contact Person" type="text">

								</div>

								<div class="form-group  col-md-4">

										

<input type="file" class="file-styled" id="fileupload"  name="image"  id="fileupload" >
                        <div id="dvPreview">
                        <?php if(isset($branch_info) && !empty($branch_info) && $branch_info['logo']!=""){?>
                          <img src="<?=base_url('uploads/branch_images/'.$branch_info['logo'])?>" style="width:100px">
                       <?php } ?>
                        </div>
								

								</div>

								<div class="form-group  col-md-4">

								 <input class="form-control" name="registration_amount" onkeypress="return event.charCode>=48 && event.charCode<=57" value="<?=@$branch_info['registration_amount']?>" placeholder="Registration Amount" type="text">

								</div>

								 <div class="form-group col-md-8">

								 <textarea rows="2" cols="5" class="form-control" name="address" placeholder="Address"><?=@$branch_info['address']?></textarea>

								</div>

											 <div class="clearfix"></div>

				   	        

								

								<div class="sub-btn form-group">
		<input type="hidden" name="branch_id" value="<?=@$branch_info['id']?>">								
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
   //function initialize() {}
     $(function(){
     	
        $("#geocomplete").geocomplete({
  			location: "<?php echo  @$branch_info['location'];?>",
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