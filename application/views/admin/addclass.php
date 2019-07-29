<div class="content-wrapper">

   <div class="row">

      <div class="col-lg-12">

     	<div class="panel panel-flat">

							<div class="panel-heading">

								<h5 class="panel-title">ADD Class</h5>

								<br>



							</div>



							<div class="col-md-12 product">

							<form method="post" action="<?=base_url("admin/insertclass")?>" id="addclass" enctype="multipart/form-data">

							  

								  <div class="form-group  col-md-4">

	

									    <select data-placeholder="Select Category" name="cat_id" class="select">

						                            	<option value="">Select</option>

						                            	<?php
						                            	if(!empty($categories))
						                            	{
						                            		foreach ($categories as $cat_info) {
						                            			?>
						                            			 <option value="<?=$cat_info['id']?>" <?=@$class_info['cat_id']==$cat_info['id']?"selected":""?>><?=$cat_info['category_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                            </select>

							

								</div>

								<div class="form-group  col-md-4">



								 <input class="form-control" placeholder="Enter Class Name" value="<?=@$class_info['class_name']?>" name="class_name" type="text">

                              



								</div>

								<div class="form-group  col-md-4">



								 <textarea class="form-control" placeholder="Description" name="description"><?=@$class_info['description']?></textarea>  

                              



								</div>

								<div class="form-group  col-md-4">

<input type="file" class="file-styled" id="fileupload"  name="image"  id="fileupload" >
                        <div id="dvPreview">
                        <?php if(isset($class_info) && !empty($class_info) && $class_info['logo']!=""){?>
                          <img src="<?=base_url('uploads/class_images/'.$class_info['logo'])?>" style="width:100px">
                       <?php } ?>
                        </div>
								</div>

						

								<div class="clearfix"></div>

								<div class="sub-btn form-group">
				<input type="hidden" value="<?=@$class_info['id']?>" name="id">
		<button type="submit" class="btn btn-primary active legitRipple center">SUBMIT</button>

		</div></form>

							</div>

							

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
  	
    $("#addclass").validate({
      rules: {
        cat_id: "required",
        class_name :"required",
      },
    });
   
  });
</script>

