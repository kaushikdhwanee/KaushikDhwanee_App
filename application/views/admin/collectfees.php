<style>

.black{

	background-color:#fff !important;

	color:#444 !important;

}

</style>
<style>
  .nav-tab li{
  display:inline-block;
   font-size:16px;
   color:#444;
  }

.nav-tab li a{
   padding:9px 20px;
}
.nav-tab li:hover{
    background-color: #2196F3;
 color:#fff !important;
}
 .nav-tab li.active a{
 background-color: #2196F3;
 color:#fff !important;
 }
</style>

<div class="content-wrapper">

   <div class="row">

      <div class="col-md-16 margin-0">

       <ul class="nav nav-tab">

       <li  class="<?= in_array($this->uri->segment(2),array("collectfees"))? "active" : ""  ?>"> <a href="<?=base_url("admin/collectfees/")?>">Collect Fees </a></li>
            <li  class="<?= in_array($this->uri->segment(2),array("viewpendingpayments"))? "active" : ""  ?>"><a href="<?=base_url("admin/viewpendingpayments")?>">Pending Payments</a></li>

             <li  class="<?= in_array($this->uri->segment(2),array("payfeeadvance"))? "active" : ""  ?>"><a href="<?=base_url("admin/payfeeadvance")?>">Advance Payments</a></li>
          
      </ul>

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">Collect Fees</h5>

            </div>

			 <div class="col-md-12" >

                <div class=" col-md-4">
	
									    <select data-placeholder="Type mobile or Name" class="select box" name="user_id"  id="mobile">
						                            	<option value=""> Select Mobile</option> 

			                               <?php
			                            	if(!empty($users))
			                            	{
			                            		foreach ($users as $cat_info) 
			                            		{
			                            			?>
			                            			 <option value="<?=$cat_info['id']?>"><?=$cat_info['mobile']."(".$cat_info['name'].")"?></option> 
			                            <?php   }
			                            	}
			                            	?>


						                                
						                            </select>
							
								</div> 

			        

              
			  

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
var	user_id;
	$(document).ready(function(){
		//var user_id;
		/*$("#mobile").change(function(){
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
			
		});*/
	
		$("#mobile").change(function(){
			
			  user_id = $(this).val();
			
			$.ajax({
				type:"post",
				url:"<?=base_url('admin/getstudentbatches')?>",
				data:{user_id:user_id},//member_id:member_id,month:month,
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
