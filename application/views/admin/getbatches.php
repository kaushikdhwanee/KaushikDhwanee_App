<style type="text/css">
  .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
    color: #444 !important;
    text-decoration: none;
    outline: 0;
    background-color: #fff !important;
}
</style>
<div id="modal_h2 " class="modal fade modal_h2 editbatch"></div>

							<div class="panel panel-white weekdays" data-id="1">

						<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group1">

									<h6 class="panel-title">

										<a>Monday(<label id="batches1"><?=$batches_count[1]?></label>)</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group1" class="panel-collapse collapse in">

									<div class="panel-body1">

										  <div class="col-md-12 padding-tps">

			<form method="post" id="form1">

				       <div class="col-md-3" >

                  <div class="form-group">

                     <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="start_time" placeholder="Start Time">

                     </div>

                  </div>



                  </div>

               </div>

			    <div class="col-md-3" >

                  <div class="form-group">

                                       <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="end_time" placeholder="End Time">

                     </div>

                  </div>

                  </div>

               </div>

			   	  <div class="col-md-4" >

                    

									

									<div class="multi-select-full faculty" id="teacher1">

									  

										<select class="multiselect" name="teachers[]" multiple="multiple" >

                                  
                              <?php if(!empty($teachers)){
                                 foreach ($teachers as $teacher_info) {?>
                                 <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                              <?php }
                                 }?>

										</select>



										

									</div>

							

               </div>

			    <div class="col-md-2" >

                  <div class="form-group">
                  <!-- <input type="hidden" name="type" value="1"> -->
                  
                  <button type="button" data-id="1" class="btn btn-primary active legitRipple center savebatch">SUBMIT</button>

                  </div>

               </div>

				   </form>

				    <div class="clear"></div>

				  </div>

               

					<table class="table text-nowrap" id="getclasses1" ></table>

            

									</div>

								</div>

							</div>

                             <div class="panel panel-white weekdays" data-id="2">

						<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group2">

									<h6 class="panel-title">

										<a>Tuesday(<label id="batches2"><?=$batches_count[2]?></label>)</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group2" class="panel-collapse collapse ">

									<div class="panel-body1">

										  <div class="col-md-12 padding-tps">

         <form method="post" id="form2">

                   <div class="col-md-3" >

                  <div class="form-group">

                     <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="start_time" placeholder="Start Time">

                     </div>

                  </div>



                  </div>

               </div>

             <div class="col-md-3" >

                  <div class="form-group">

                                       <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="end_time" placeholder="End Time">

                     </div>

                  </div>

                  </div>

               </div>

                 <div class="col-md-4" >

                    

                           

                           <div class="multi-select-full faculty" id="teacher1">

                             

                              <select class="multiselect" name="teachers[]" multiple="multiple" >

                                  
                              <?php if(!empty($teachers)){
                                 foreach ($teachers as $teacher_info) {?>
                                 <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                              <?php }
                                 }?>

                              </select>



                              

                           </div>

                     

               </div>

             <div class="col-md-2" >

                  <div class="form-group">
                  <!-- <input type="hidden" name="type" value="1"> -->
                  
                  <button type="button" data-id="2" class="btn btn-primary active legitRipple center savebatch">SUBMIT</button>

                  </div>

               </div>

               </form>

                <div class="clear"></div>

              </div>

               

										         <table class="table text-nowrap" id="getclasses2"></table>

            

									</div>

								</div>

							</div>

						       <div class="panel panel-white weekdays" data-id="3">

						<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group3">

									<h6 class="panel-title">

										<a>Wednesday(<label id="batches3"><?=$batches_count[3]?></label>)</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group3" class="panel-collapse collapse ">

									<div class="panel-body1">

										  <div class="col-md-12 padding-tps">

         <form method="post" id="form3">

                   <div class="col-md-3" >

                  <div class="form-group">

                     <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="start_time" placeholder="Start Time">

                     </div>

                  </div>



                  </div>

               </div>

             <div class="col-md-3" >

                  <div class="form-group">

                                       <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="end_time" placeholder="End Time">

                     </div>

                  </div>

                  </div>

               </div>

                 <div class="col-md-4" >

                    

                           

                           <div class="multi-select-full faculty" id="teacher1">

                             

                              <select class="multiselect" name="teachers[]" multiple="multiple" >

                                  
                              <?php if(!empty($teachers)){
                                 foreach ($teachers as $teacher_info) {?>
                                 <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                              <?php }
                                 }?>

                              </select>



                              

                           </div>

                     

               </div>

             <div class="col-md-2" >

                  <div class="form-group">
                  <!-- <input type="hidden" name="type" value="1"> -->
                  
                  <button type="button" data-id="3" class="btn btn-primary active legitRipple center savebatch">SUBMIT</button>

                  </div>

               </div>

               </form>

                <div class="clear"></div>

              </div>

               

										         <table class="table text-nowrap" id="getclasses3"></table>

            

									</div>

								</div>

							</div>

						      

							   <div class="panel panel-white weekdays" data-id="4">

						<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group4">

									<h6 class="panel-title">

										<a>Thursday(<label id="batches4"><?=$batches_count[4]?></label>)</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group4" class="panel-collapse collapse">

									<div class="panel-body1">

										  <div class="col-md-12 padding-tps">

         <form method="post" id="form4">

                   <div class="col-md-3" >

                  <div class="form-group">

                     <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="start_time" placeholder="Start Time">

                     </div>

                  </div>



                  </div>

               </div>

             <div class="col-md-3" >

                  <div class="form-group">

                                       <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="end_time" placeholder="End Time">

                     </div>

                  </div>

                  </div>

               </div>

                 <div class="col-md-4" >

                    

                           

                           <div class="multi-select-full faculty" id="teacher1">

                             

                              <select class="multiselect" name="teachers[]" multiple="multiple" >

                                  
                              <?php if(!empty($teachers)){
                                 foreach ($teachers as $teacher_info) {?>
                                 <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                              <?php }
                                 }?>

                              </select>



                              

                           </div>

                     

               </div>

             <div class="col-md-2" >

                  <div class="form-group">
                  <!-- <input type="hidden" name="type" value="1"> -->
                  
                  <button type="button" data-id="4" class="btn btn-primary active legitRipple center savebatch">SUBMIT</button>

                  </div>

               </div>

               </form>

                <div class="clear"></div>

              </div>

               

										         <table class="table text-nowrap" id="getclasses4"></table>

            

									</div>

								</div>

							</div>

						

							  <div class="panel panel-white weekdays" data-id="5">

						<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group5">

									<h6 class="panel-title">

										<a>Friday(<label id="batches5"><?=$batches_count[5]?></label>)</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group5" class="panel-collapse collapse ">

									<div class="panel-body1">

										  <div class="col-md-12 padding-tps">

         <form method="post" id="form5">

                   <div class="col-md-3" >

                  <div class="form-group">

                     <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="start_time" placeholder="Start Time">

                     </div>

                  </div>



                  </div>

               </div>

             <div class="col-md-3" >

                  <div class="form-group">

                                       <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="end_time" placeholder="End Time">

                     </div>

                  </div>

                  </div>

               </div>

                 <div class="col-md-4" >

                    

                           

                           <div class="multi-select-full faculty" id="teacher1">

                             

                              <select class="multiselect" name="teachers[]" multiple="multiple" >

                                  
                              <?php if(!empty($teachers)){
                                 foreach ($teachers as $teacher_info) {?>
                                 <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                              <?php }
                                 }?>

                              </select>



                              

                           </div>

                     

               </div>

             <div class="col-md-2" >

                  <div class="form-group">
                  <!-- <input type="hidden" name="type" value="1"> -->
                  
                  <button type="button" data-id="5" class="btn btn-primary active legitRipple center savebatch">SUBMIT</button>

                  </div>

               </div>

               </form>

                <div class="clear"></div>

              </div>

               

										         <table class="table text-nowrap" id="getclasses5"></table>

            

									</div>

								</div>

							</div>

						

						  <div class="panel panel-white weekdays" data-id="6">

						<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group6">

									<h6 class="panel-title">

										<a>Saturday(<label id="batches6"><?=$batches_count[6]?></label>)</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group6" class="panel-collapse collapse ">

									<div class="panel-body1">

										  <div class="col-md-12 padding-tps">

         <form method="post" id="form6">

                   <div class="col-md-3" >

                  <div class="form-group">

                     <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="start_time" placeholder="Start Time">

                     </div>

                  </div>



                  </div>

               </div>

             <div class="col-md-3" >

                  <div class="form-group">

                                       <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="end_time" placeholder="End Time">

                     </div>

                  </div>

                  </div>

               </div>

                 <div class="form-group  col-md-4" >

                           <div class="multi-select-full faculty" id="">

                             

                              <select class="multiselect" name="teachers[]" multiple="multiple" >

                                  
                              <?php if(!empty($teachers)){
                                 foreach ($teachers as $teacher_info) {?>
                                 <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                              <?php }
                                 }?>

                              </select>



                              

                           </div>

                     

               </div>

             <div class="col-md-2" >

                  <div class="form-group">
                  <!-- <input type="hidden" name="type" value="1"> -->
                  
                  <button type="button" data-id="6" class="btn btn-primary active legitRipple center savebatch">SUBMIT</button>

                  </div>

               </div>

               </form>

                <div class="clear"></div>

              </div>

               

										         <table class="table text-nowrap" id="getclasses6"></table>

            

									</div>

								</div>

							</div>

						

						<div class="panel panel-white weekdays" data-id="7">

						<div class="panel-heading" data-toggle="collapse" data-target="#collapsible-control-right-group7">

									<h6 class="panel-title">

										<a>Sunday(<label id="batches7"><?=$batches_count[7]?></label>)</a>

									</h6>

								</div>

								<div id="collapsible-control-right-group7" class="panel-collapse collapse ">

									<div class="panel-body1">

										  <div class="col-md-12 padding-tps">

         <form method="post" id="form7">

                   <div class="col-md-3" >

                  <div class="form-group">

                     <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="start_time" placeholder="Start Time">

                     </div>

                  </div>



                  </div>

               </div>

             <div class="col-md-3" >

                  <div class="form-group">

                                       <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" name="end_time" placeholder="End Time">

                     </div>

                  </div>

                  </div>

               </div>

                 <div class="col-md-4" >

                    

                           

                           <div class="multi-select-full faculty" id="teacher1">

                             

                              <select class="multiselect" name="teachers[]" multiple="multiple" >

                                  
                              <?php if(!empty($teachers)){
                                 foreach ($teachers as $teacher_info) {?>
                                 <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                              <?php }
                                 }?>

                              </select>



                              

                           </div>

                     

               </div>

             <div class="col-md-2" >

                  <div class="form-group">
                  <!-- <input type="hidden" name="type" value="1"> -->
                  
                  <button type="button" data-id="7" class="btn btn-primary active legitRipple center savebatch">SUBMIT</button>

                  </div>

               </div>

               </form>

                <div class="clear"></div>

              </div>

               

				<table class="table text-nowrap" id="getclasses7"></table>

            

									</div>

								</div>

							</div>

					
<script type="text/javascript">
var batch_id = "<?=$batch_id?>";
var  day_type=1;
$(document).ready(function(){

   $('.faculty').find(".multiselect-selected-text ").text('Select Days ');

 function getbatchclasses()
 {
   $.ajax({
      type:"post",
      data:{day_type:day_type,batch_id:batch_id},
      url:"<?=base_url("admin/getbatchclasses")?>",
      dataType:"Json",
      success : function(data){
         $("#getclasses"+day_type).html(data.data);
         $("#batches"+day_type).html(data.count);
         $('.dropdown-toggle').dropdown();
      }
   });
 }
 getbatchclasses();
   $(".weekdays").click(function(){

   day_type = $(this).data('id');
   getbatchclasses();

 });
   $(".savebatch").click(function(){
      type = $(this).data('id');
      var data = $("#form"+type).serialize();

   $.ajax({
      type:"post",
      url:"<?=base_url("admin/insertbatch")?>",
      data:data+"&class_id="+class_id+"&branch_id="+branch_id+"&type="+type+"&batch_id="+batch_id,
      success: function(data){
        if(data==1){

        alert("Batch Created successfully");

        $("#form"+type)[0].reset();
        $("#form"+type).find(".multiselect-selected-text").text('Select Teacher');
        
        $("#form"+type).find(".dropdown-menu li a.active").romeveClass('active');

        }else{
          alert("Please select all options");
        }

      }
   });

   });

      $(document).on("click",".editbatchclass",function(){
         
            var batch_class_id = $(this).data('id');
            $.ajax({

               type:"post",
               
               url:"<?=base_url("admin/editbatchclass")?>",
               data:{batch_class_id:batch_class_id},
               success: function(data){
                     
                     $(".editbatch").html(data);
                     $(".editbatch").find(".multiselect").multiselect('refresh');
                     $('.modal_h2').modal('show'); 
                     $(".form-group").find(".pickatime").pickatime();
                     //$('.form-group').input('reset');//$('#multibox').multiselect();
                    // $(".multiselect").multiselect('refresh');
                    // $(".select").selectpicker("refresh");
                     }

            });

      });



      $(document).on("click",".updatestatus1",function(){
        
            var batch_class_id = $(this).attr('id');
            var status = $(this).data('id');
            
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

      $(document).on("click","#updatebatchclass",function(){

         //type = $(this).data('id');
         var data = $("#editformz").serialize();

         $.ajax({
            type:"post",
            url:"<?=base_url("admin/updatebatch")?>",
            data:data+"&batch_id="+batch_id,
            success: function(data){
               $('.modal_h2').modal('hide');
               getbatchclasses();
               alert("Batch Updated successfully");

               
            }
         });

   });

});

</script>				

						