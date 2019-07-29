<?php //include_once 'includes/header.php'?>



<div class="content-wrapper">

   <div class="row">

      <div class="col-lg-12">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">Check Teacher Schedule </h5>

          

            </div>
             <?php if($this->session->userdata("user_type")==1){?>
              <div class="col-md-4 col-md-offset-2" >
                
                  <div class="form-group">

                                        <select name="branch_id" id="branch_id"  class="select"><!-- data-placeholder="Select Category" -->

						                            	<option>Select Branch</label></option>

						                                <?php if(!empty($branches)){
                                                   foreach ($branches as $branch_info) {?>
                                                   <option value="<?=$branch_info['id']?>"><?=$branch_info['branch_name']?></option>
                                                <?php }
                                                   }?>

						                            </select>

                  </div>

               </div>
               <?php }?>
			   <div class="col-md-4" >

                  <div class="form-group">

                                        <select name="teacher_id"  id="teacher_id" class="select"><!-- data-placeholder="Select Category" -->

						                            	<option value="">Select Teacher</label></option>

						                                <?php if(!empty($teachers)){
                                                   foreach ($teachers as $teacher_info) {?>
                                                   <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                                                <?php }
                                                   }?>
						                            </select>

                  </div>

               </div>

			   

               <div class="clearfix"></div>


				<div class="panel-group panel-group-control panel-group-control-right content-group-lg">

							<div class="panel panel-white weekdays" data-id="1">

								<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group1">

									<h6 class="panel-title">

										<a>Monday</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group1" class="panel-collapse collapse in">

									<div class="panel-body1">

										         <table class="table text-nowrap" id="getclasses1">

                      <thead>

                     <tr>

                        <th>Batch No</th>

                  <th>Start Time</th>

                  <th>End Time</th>

                  <!-- <th>Action</th> -->

                     </tr>

                  </thead>

                  <tbody class="refar-price">

                     <tr><td>NO data found</td></tr>

                  </tbody>

               </table>

									</div>

								</div>

							</div>

                            	<div class="panel panel-white weekdays"  data-id="2">

								<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group2">

									<h6 class="panel-title">

										<a>Tuesday</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group2" class="panel-collapse collapse">

									<div class="panel-body1">

										         <table class="table text-nowrap" id="getclasses2"></table>

									</div>

								</div>

							</div>



						<div class="panel panel-white weekdays" data-id="3">

								<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group3">

									<h6 class="panel-title">

										<a>Wednesday</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group3" class="panel-collapse collapse">

									<div class="panel-body1">

										         <table class="table text-nowrap" id="getclasses3"></table>

            

									</div>

								</div>

							</div>



							<div class="panel panel-white weekdays" data-id="4">

								<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group4">

									<h6 class="panel-title">

										<a>Thursday</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group4" class="panel-collapse collapse ">

									<div class="panel-body1">

										         <table class="table text-nowrap" id="getclasses4"></table>

            

									</div>

								</div>

							</div>



								<div class="panel panel-white weekdays" data-id="5">

								<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group5">

									<h6 class="panel-title">

										<a>Friday</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group5" class="panel-collapse collapse">

									<div class="panel-body1">

										         <table class="table text-nowrap"  id="getclasses5"></table>

            

									</div>

								</div>

							</div>



							<div class="panel panel-white weekdays" data-id="6">

								<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group6">

									<h6 class="panel-title">

										<a>Saturday</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group6" class="panel-collapse collapse ">

									<div class="panel-body1">

										         <table class="table text-nowrap" id="getclasses6"></table>

            

									</div>

								</div>

							</div>



						<div class="panel panel-white weekdays" data-id="7">

								<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group7">

									<h6 class="panel-title">

										<a>Sunday</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group7" class="panel-collapse collapse ">

									<div class="panel-body1">

										         <table class="table text-nowrap" id="getclasses7"></table>

            

									</div>

								</div>

							</div>



					

						

						</div>

					

			<div class="clear-50"></div>

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



</body>

</html>


<script type="text/javascript">
var branch_id;
var teacher_id;
var  day_type=1;
 function getbatchclasses()
 {
   $.ajax({
      type:"post",
      data:{day_type:day_type,teacher_id:teacher_id,branch_id:branch_id},
      url:"<?=base_url("admin/getteacherclasses")?>",
      success : function(data){
         $("#getclasses"+day_type).html(data);
         $('.dropdown-toggle').dropdown();
      }
   });
 }


   $(".weekdays").click(function(){

   day_type = $(this).data('id');
   getbatchclasses();

 });
   $(document).ready(function(){
       $("#branch_id").change(function(){
         
         branch_id = $(this).val();
         //alert(branch_id);
         $("#teacher_id").val('');
      });
      $("#teacher_id").change(function(){
         teacher_id = $(this).val();
         //branch_id = $("branch_id").val();
         if(teacher_id!="" && branch_id!="")
         {
            getbatchclasses();
         }
      });


      $(document).on("click",".updatestatus1",function(){
  
      var batch_class_id = $(this).attr('id');
      var status = $(this).data('id');
      alert(status);
      $.ajax({
         type:"post",
         url:"<?=base_url('admin/updatebatchclassstatus')?>",
         data:{batch_class_id:batch_class_id,status:status},
         success: function(data)
         {
           //
           if(data==1)
           {
             alert("status updated successfully");  
           }                  
         }

      });

      });


   });
</script>


