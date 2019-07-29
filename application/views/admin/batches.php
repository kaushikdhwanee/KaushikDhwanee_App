<div class="content-wrapper">

   <div class="row">

      <div class="col-lg-12">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">Add Batch</h5>

          

            </div>

              <div class="col-md-4 col-md-offset-2" >

                  <div class="form-group">
                                              <select data-placeholder="Select Branch" name="branch_id" id="branch_id" class="select">

						                            	<option value="">Select Branch</option>
						                            	<?php if(!empty($branches)){
						                            		foreach ($branches as $branch_info) {?>
						                            		<option value="<?=$branch_info['id']?>"><?=$branch_info['branch_name']?></option>
						                            	<?php	}
						                            		}?>
						                               

						                            </select>

                  </div>

               </div>

			   <div class="col-md-4" >

                  <div class="form-group">

                                        <select data-placeholder="Select Class" name="class_id" id="class_id" class="select">

						                            	<!-- <option>Select Class</option>	 -->					                               

						                            </select>

                  </div>

               </div>

			

			   

               <div class="clearfix"></div>

			   

			   <div class="cont-tables">

			   
			   </div>

			    <div class="clearfix"></div>

					<div class="panel-group panel-group-control panel-group-control-right content-group-lg" id="getbatches"></div>

				

			   

			

		

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

<?php //include_once 'includes/footer.php'?>

<script>
 var branch_id="";
 var class_id ="";

$(function(){

    $('#teacher1').find(".multiselect-selected-text").text('Select Teacher ');

})
$(document).ready(function(){


$("#branch_id").change(function(){

		 branch_id = $(this).val();

		var options = "<option value=''>Select class</option>" ;
		
		$.ajax({
			type:"post",
			url:"<?=base_url('admin/getclasses')?>",
			data: {"branch_id":branch_id},
			success:function(data){
                    var results = JSON.parse(data);
                    var classes = results.classes;
                    var length =classes.length;
                    if(length>0)
                    {
                    	
                    	$.each(classes,function(index,value){
                    		options += "<option value='"+value.id+"'>"+value.class_name  +"</option>"
                      	
                    	});	
                    	$('#class_id').html(options);
                    	$(".select").selectpicker("refresh");

                    
                    }
                    
                }
		})
});

$("#class_id").change(function(){

		 class_id = $(this).val();

		$.ajax({
			type:"post",
			url:"<?=base_url('admin/getbatches')?>",
			data: {"branch_id":branch_id,class_id:class_id},
			success:function(data){
                   
                    $('#getbatches').html(data);
                    //$(".select").selectpicker("refresh");
                    $(".multiselect").multiselect("refresh");
                    $(".form-control").pickatime("refresh");
                    
                }
		})
});

});
</script>	

</body>

</html>



