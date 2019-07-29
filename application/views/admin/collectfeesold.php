
<!-- <script type="text/javascript" src="js/form_selectbox.js"></script>

		 <script type="text/javascript" src="js/core.min.js"></script>

		  <script type="text/javascript" src="js/selectboxit.min.js"></script>-->

<style>



.black{

	background-color:#fff !important;

	color:#444 !important;

}



</style>

<div class="content-wrapper">

   <div class="row">

      <div class="col-lg-9">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">Collect Fees</h5>

            </div>

			 <div class="col-md-12" >

                <div class=" col-md-4">
	
									    <select  class="select box" name="user_id"  id="mobile">
						                            	<option value=""> Select Mobile</option>

			                               <?php
			                            	if(!empty($users))
			                            	{
			                            		foreach ($users as $cat_info) 
			                            		{
			                            			?>
			                            			 <option value="<?=$cat_info['id']?>"><?=$cat_info['mobile']?></option> 
			                            <?php   }
			                            	}
			                            	?>


						                                
						                            </select>
							
								</div> 

			        

              
			  

			   </div>
 
			    <div class=" col-md-4">
	
									    <select  class="select box" name="member_id" id="members">
						                            	<option value=""> Select User</option>

			                              


						                                
						                            </select>
							
								</div> 

			    <div class="clearfix"></div>
			    <div class=" col-md-4">
	
									    <select  class="select box" name="month" id="month">
						                            	<option value=""> Select Month</option>
						                            	<?php 
						                            	for ($i=0; $i <12 ; $i++) { ?>
						                            	
						                            	<option value="<?= date("m-Y", strtotime("+".$i." month"))?>"><?= date("M Y", strtotime("+".$i." month"))?></option>
														<?php }
														for ($i=1; $i <12 ; $i++) {
						                            	?><option value="<?= date("m-Y", strtotime("-".$i." month"))?>"><?= date("M Y", strtotime("-".$i." month"))?></option>
														<?php }?>

			                              


						                                
						                            </select>
							
								</div> 

			  

			    <div class="clearfix"></div>

                 <div class="table-responsive student_info"></div>

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

<?php //include_once 'includes/footer.php'?>

<script>

	$(document).ready(function(){
		var user_id;
		$("#mobile").change(function(){
			 user_id = $(this).val();
			$("#members").empty("");
			$("#members").append('<option value="">select</option>'); 
			$.ajax({
				type:"post",
				url:"<?=base_url('admin/getstudents')?>",
				data:{id:user_id},
				success: function(message){
					var resp = JSON.parse(message);
			   			if(resp.success==1)
			   			{
			   				
			   				$.each(resp.students, function(index,value){
			   					//console.log(value.start_time);
			   					$("#members").append('<option value="'+value.id+'">'+value.name+'</option>');
			   					//i++;
			   				});

			   				$(".select").selectpicker("refresh");

			   			}
				}
			});
			
		});

		$("#month").change(function(){
			var member_id = $("#members").val();
			var month = $(this).val();
			/*$('#members').empty();
			$('#members').append('<option value="">Select user</option>');*/
			//alert(id);
			$.ajax({
				type:"post",
				url:"<?=base_url('admin/getstudentbatches')?>",
				data:{member_id:member_id,month:month,user_id:user_id},
				success: function(message){

			   		$(".student_info").html(message);
			   				
				}
			});
			
		});

	});

   function readURL(input) {

       if (input.files && input.files[0]) {

           var reader = new FileReader();

           

           reader.onload = function (e) {

               $(input).parent().find("img").attr('src', e.target.result);

           }

           reader.readAsDataURL(input.files[0]);

       }

   }

   $(".imgInp").change(function(){

       readURL(this);

   });



   

   

/* $(':checkbox').click(function() {

	alert("ok");

    $('input:text').attr('disabled',! this.checked)

}); */

</script>

<script>



var checkboxes = $(".styled");



for(var i = 0; i < checkboxes.length; i++) {

  checkboxes[i].onclick = function() {

    if(this.checked) {

       $(".form-control").removeAttr("disabled");

    } else {

      $(".form-control").atte("disabled" , "disabled");  

    }

  }

}



</script>



</body>

</html>



