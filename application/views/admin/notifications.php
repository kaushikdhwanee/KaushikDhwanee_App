<div class="content-wrapper">

   <div class="row">

      <div class="col-lg-12">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">Send Notification</h5>

          

            </div>
              <form method="post" id="notification" action="<?=base_url("admin/sendnotification")?>" > 
                <?php if($this->session->userdata("user_type")==1){?>
              <div class="col-md-4" >
                
                  <div class="form-group">

                      <select data-placeholder="Select branch" name="branch_id" id="branch_id" class="select">

                	<option value="">Select Branch</option>
                	<?php if(!empty($branches)){
                		foreach ($branches as $branch_info) {?>
                		<option value="<?=$branch_info['id']?>"><?=$branch_info['branch_name']?></option>
                	<?php	}
                		}?>
                   

                </select>

                  </div>

               </div>
              <?php }?>
			   <div class="col-md-4" >

                  <div class="form-group multi-select-full">
                    
                    
                   
                                        <select data-placeholder="Select Classes" multiple="multiple" name="class_id[]" id="class_id"  class="multiselect">

						                          <?php
                                    if(!empty($classes))
                                    {
                                      foreach ($classes as $cat_info) 
                                      {
                                        if( !in_array($cat_info['id'], $active_classes)){
                                          
                                        
                                        ?>
                                         <option value="<?=$cat_info['id']?>"><?=$cat_info['class_name']?></option> 
                                    <?php }}
                                    }
                                    ?>				                               

						                            </select>

                  </div>

               </div>

			 
                  <div class="col-md-10" >

                  <div class="form-group">

                  <textarea name="message" class="form-control" placeholder="Description" ></textarea>

                                        
                  </div>

               </div>

                 <div class="col-md-4" >

                  <div class="form-group">

                          

                  <input type="submit" name="submit" >

                                          

                  </div>

               </div>
			   
</form>
               <div class="clearfix"></div>

	
					<div class="panel-group panel-group-control panel-group-control-right content-group-lg" id="getbatches">
       

              <div class="table-responsive">

                <table class="table text-nowrap tab-margin-bottom">

                  <thead>

                    <tr>

                      <th class="col-md-2">Branch name</th>

                      <th class="col-md-2">Class name</th>

                      <th class="col-md-2">Description</th>
                      <th class="col-md-2">Date & Time</th>

                      
                      

                      

                    </tr>

                  </thead>

                  <tbody>

                    <?php if(!empty($notifications)){
                      $i=1;
                        foreach ($notifications as $service_info) {?>
                          
                      
                    <tr>
                    
                    <td><?=$service_info['branch_name']?></td>

                    <td><?=@$service_info['class_name']?></td> 
                    
                    <td><?=$service_info['message']?></td>

                    <td><?=date("d-m-Y h:i A",strtotime($service_info['created_on']))?></td>


                              

        

                    </tr>


<?php $i++;}
                      }else{
                        echo "<tr><td>No results found</td></tr>" ; 
                      }
                      ?>

                      </tbody>

                </table>

              </div>

            

          </div>

				

         </div>

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

var categCheck  = $('#class_id').multiselect({
    includeSelectAllOption: true,
     enableFiltering : true
});
/*$("#branch_id").change(function(){

		 branch_id = $(this).val();

		var options = "" ;//<option value=''>Select class</option>
		
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
                    	categCheck.multiselect('rebuild');
                     


                    
                    }
                    
                }
		})
});
*/
/*$("#class_id").change(function(){

		 class_id = $(this).val();

		$.ajax({
			type:"post",
			url:"<?=base_url('admin/getbatches')?>",
			data: {"branch_id":branch_id,class_id:class_id},
			success:function(data){
                   
                    $('#getbatches').html(data);
                    $(".multiselect").multiselect("refresh");
                    $(".form-control").pickatime("refresh");
                    
                }
		})
});*/
/*if($this->session->userdata("user_type")==4){
$("#class_id").click(function(){
  branch_id = $('#branch').val();

    var options = "" ;//<option value=''>Select class</option>
    
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
                      categCheck.multiselect('rebuild');
                     


                    
                    }
                    
                }
    })
});
}
*/
$("#notification").validate({
   rules: {
        //branch_id: "required",
        message:"required",
        
      },
});

});


</script>	

</body>

</html>



