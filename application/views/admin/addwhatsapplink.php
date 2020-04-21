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

								<h5 class="panel-title">Add Whatsapp Link</h5>

								<br>



							</div>



							<div class="col-md-12">

							<form method="post" action="<?=base_url("admin/insertwhatsapp")?>" id="addclass" enctype="multipart/form-data">

							  
                                 <?php if($this->session->userdata("user_type")==1){?>
								  <div class="form-group col-md-3">

	

									    <select data-placeholder="Select Branches" name="branch_id" class="select" id="branch_id">

						                            	<option value="">Select</option>

						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $cat_info) {
						                            			?>
						                            			 <option value="<?=$cat_info['id']?>" <?=@$class_info['cat_id']==$cat_info['id']?"selected":""?>><?=$cat_info['branch_name']?>                                                          </option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                            </select>

							

								</div>
								  
								
								<?php } else { ?>
	                      
							  <input type="hidden" name="branch_id" value="<?=$branch_id?>" id="branch_id">
							  
								<?php }?>
								<div class="form-group  col-md-3 ">

	

									    <select data-placeholder="Select Class" name="class_id" class="select" id="class_id">

						                            	<option value="">Select</option>

						                            	<?php
						                            	if(!empty($classes))
						                            	{
						                            		foreach ($classes as $cat_info) {
						                            			?>
						                            			 <option value="<?=$cat_info['id']?>" <?=@$class_info['cat_id']==$cat_info['id']?"selected":""?>><?=$cat_info['class_name']?>                                                                    </option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                            </select>

							

								</div>
                                
                                 <div class="form-group col-md-4" >

                 

                                        <select name="teacher_id"  id="teacher_id" class="select">

						                            	<option value="">Select Teacher</option>

						                                <?php if(!empty($teachers)){
                                                   foreach ($teachers as $teacher_info) {?>
                                                   <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                                                <?php }
                                                   }?>
						                            </select>

                  </div>

             
	 
								<div class="form-group  col-md-5 ">



								 <input class="form-control" placeholder="Enter Whatsapp Link" value="" name="whatsapp" type="text">

                           
								</div>

								
								<div class="clearfix"></div>
<div class="form-group  col-md-12">

<input type="file" class="file-styled" id="fileupload"  name="image"  id="fileupload" >
                        <div id="dvPreview">
                        
                          <img id="imageload" style="width:100px" src="">
                       
                        </div>
								
								<div class="clearfix"></div>
								</div>
								<div class="form-group col-md-12 text-center">
				<input type="hidden" value="" name="id">
		<button type="submit" class="btn btn-primary active">SUBMIT</button>

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


<script type="text/javascript">
	var check;
	
  $(document).ready(function(){
	  
  	
    $("#addclass").validate({
      rules: {
        cat_id: "required",
        class_name :"required",
      },
    });
   
  
	
	$("#teacher_id").change(function(){
		  
		   	var teacher_id = $(this).val();
		   var branch_id = $("#branch_id").val();
		var class_id =$("#class_id").val();

		   	$("input[name=whatsapp").val('');
			
			$("input[name=id]").val('');
		   	
		   	//alert(branch_id);alert(class_id);
		   	if(class_id !="" && branch_id !="")
		   	{
		   		$.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin/getlink')?>",
		   		data:{class_id:class_id,branch_id:branch_id,teacher_id:teacher_id},
		   		success: function(message){
		   			var resp = JSON.parse(message);
		   			if(resp.success==1)
						
		   			{
						var code =resp.qrcode;
						var url = "http://beta.kaushikdhwanee.in/app/uploads/qr_codes/"+code;
		   				$("input[name=whatsapp]").val(resp.whatsapp_link);
						$("#dvPreview").prepend('<img src="'+ url + '" style="width:100px;">')
		   				//$("#imageload").attr('src','<?php echo base_url()?>uploads/qr_codes/'+code);
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

