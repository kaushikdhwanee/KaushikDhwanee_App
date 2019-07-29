 <style>
    .moving-left{
        margin-left:-23px;
    }
</style>

<div id="modal_h2 " class="modal fade modal_h2 editbatch"></div>


                    <div class="panel panel-default">
                      <div class="panel-heading weekdays" data-id="1" role="tab" id="headingOne">
                        <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            Monday
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <form method="post" id="form1">
                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <select name="start_time" class="form-control">
                                          <option value="">Start Time</option>
                                          <?php
                                          $x= array("00","30");
                                          for ($i=5; $i<=23; $i++) { 
                                            foreach ($x as $value1) {?>
                                              <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                            <?php }
                                          }
                                          ?>
                                        </select>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <select name="end_time" class="form-control">
                                          <option value="">End time</option>
                                          <?php
                                          $x= array("00","30");
                                          for ($i=5; $i<=23; $i++) { 
                                            foreach ($x as $value1) {?>
                                              <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                            <?php }
                                          }
                                          ?>
                                        </select>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <div class="multi-select-full" id="teacher1">
                                            <select class="form-control" name="teachers[]" multiple="multiple" >
                                                 <option value="">Select Teacher</option>
                                                <?php if(!empty($teachers)){
                                                     foreach ($teachers as $teacher_info) {?>
                                                     <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                                                  <?php }
                                                     }?>
                    
                                            </select>
                                        </div>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    <button type="button" data-id="1" class="btn btn-info btn-block active legitRipple center savebatch">SUBMIT</button>
                                </div>
                            </form>
                            <table class="table text-nowrap moving-left" id="getclasses1" ></table> 
                        </div><!---panel-body end--->
                    </div><!-- panel-collapse collapse end 1-->




                    <div class="panel panel-default">
                      <div class="panel-heading weekdays" data-id="2" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            Tuesday
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <form method="post" id="form2">

                                <div class="form-group">
                                     <div class="icon-addon addon-lg">
                                        <select name="start_time" class="form-control">
                                          <option value="">start Time</option>
                                          <?php
                                          $x= array("00","30");
                                          for ($i=5; $i<=23; $i++) { 
                                            foreach ($x as $value1) {?>
                                              <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                            <?php }
                                          }
                                          ?>
                                        </select>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <select name="end_time" class="form-control">
                                          <option value="">End time</option>
                                          <?php
                                          $x= array("00","30");
                                          for ($i=5; $i<=23; $i++) { 
                                            foreach ($x as $value1) {?>
                                              <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                            <?php }
                                          }
                                          ?>
                                        </select>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="icon-addon addon-lg">
                                        <div class="multi-select-full" id="teacher1">
                                            <select class="form-control" name="teachers[]" multiple="multiple" >
                                                <option value="">Select Teacher</option>
                                                 <?php if(!empty($teachers)){
                                                     foreach ($teachers as $teacher_info) {?>
                                                     <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                                                  <?php }
                                                     }?>
                                            </select>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                               <div class="form-group">
                                     <!-- <input type="hidden" name="type" value="1"> -->
                                    <button type="button" data-id="2" class="btn btn-info btn-block active legitRipple center savebatch">SUBMIT</button>
                                </div>
                            </form>
                            <table class="table text-nowrap moving-left" id="getclasses2" ></table> 
                         </div><!---panel-body end--->
                    </div><!-- panel-collapse collapse end 2-->
                    
                    

                    <div class="panel panel-default">
                        <div class="panel-heading weekdays" data-id="3" role="tab" id="headingThree">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                Wednesday
                              </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <form method="post" id="form3">
                                     <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                            <select name="start_time" class="form-control">
                                              <option value="">start Time</option>
                                              <?php
                                              $x= array("00","30");
                                              for ($i=5; $i<=23; $i++) { 
                                                foreach ($x as $value1) {?>
                                                  <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                                <?php }
                                              }
                                              ?>
                                            </select>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                         <div class="icon-addon addon-lg">
                                            <select name="end_time" class="form-control">
                                              <option value="">End time</option>
                                              <?php
                                              $x= array("00","30");
                                              for ($i=5; $i<=23; $i++) { 
                                                foreach ($x as $value1) {?>
                                                  <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                                <?php }
                                              }
                                              ?>
                                            </select>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                     </div>

                                    <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                            <div class="multi-select-full" id="teacher1">
                                                <select class="form-control" name="teachers[]" multiple="multiple" >
                                                    <option value="">Select Teacher</option>
                                                         <?php if(!empty($teachers)){
                                                             foreach ($teachers as $teacher_info) {?>
                                                             <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                                                          <?php }
                                                             }?>
                            
                                                </select>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <!-- <input type="hidden" name="type" value="1"> -->
                                        <button type="button" data-id="3" class="btn btn-info btn-block active legitRipple center savebatch">SUBMIT</button>

                                    </div>
                                </form>
                                <table class="table text-nowrap moving-left" id="getclasses3" ></table> 
                             </div><!---panel-body end--->
                        </div><!-- panel-collapse collapse end 3-->
                        
                        
                        
                    <div class="panel panel-default">
                      <div class="panel-heading weekdays" data-id="4" role="tab" id="headingFour">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            Thursday
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <form method="post" id="form4">

                                    <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                            <select name="start_time" class="form-control">
                                                  <option value="">start Time</option>
                                                  <?php
                                                  $x= array("00","30");
                                                  for ($i=5; $i<=23; $i++) { 
                                                    foreach ($x as $value1) {?>
                                                      <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                                    <?php }
                                                  }
                                                  ?>
                                            </select>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                            <select name="end_time" class="form-control">
                                              <option value="">End time</option>
                                              <?php
                                              $x= array("00","30");
                                              for ($i=5; $i<=23; $i++) { 
                                                foreach ($x as $value1) {?>
                                                  <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                                <?php }
                                              }
                                              ?>
                                            </select>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                             <div class="multi-select-full" id="teacher1">
                                                <select class="form-control" name="teachers[]" multiple="multiple" >
                                                    <option value="">Select Teacher</option>
                                                         <?php if(!empty($teachers)){
                                                         foreach ($teachers as $teacher_info) {?>
                                                         <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                                                      <?php }
                                                         }?>
                                                </select>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <!-- <input type="hidden" name="type" value="1"> -->
                                        <button type="button" data-id="4" class="btn btn-info btn-block active legitRipple center savebatch">SUBMIT</button>
                                     </div>
                                </form>
                                <table class="table text-nowrap moving-left" id="getclasses4" ></table> 
                            </div><!---panel-body end--->
                        </div><!-- panel-collapse collapse end 4-->
                        
                        
                        
                    <div class="panel panel-default">
                      <div class="panel-heading weekdays" data-id="5" role="tab" id="headingFive">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            Friday
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">
                                <form method="post" id="form5">
                                    <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                            <select name="start_time" class="form-control">
                                              <option value="">start Time</option>
                                              <?php
                                              $x= array("00","30");
                                              for ($i=5; $i<=23; $i++) { 
                                                foreach ($x as $value1) {?>
                                                  <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                                <?php }
                                              }
                                              ?>
                                            </select>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                            <select name="end_time" class="form-control">
                                              <option value="">End time</option>
                                              <?php
                                              $x= array("00","30");
                                              for ($i=5; $i<=23; $i++) { 
                                                foreach ($x as $value1) {?>
                                                  <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                                <?php }
                                              }
                                              ?>
                                            </select>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                            <div class="multi-select-full" id="teacher1">
                                                 <select class="form-control" name="teachers[]" multiple="multiple" >
                                                     <option value="">Select Teacher</option>
                                
                                                                  
                                                      <?php if(!empty($teachers)){
                                                         foreach ($teachers as $teacher_info) {?>
                                                         <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                                                      <?php }
                                                         }?>
                                                </select>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <!-- <input type="hidden" name="type" value="1"> -->
                                        <button type="button" data-id="5" class="btn btn-info btn-block active legitRipple center savebatch">SUBMIT</button>
                                    </div>
                                </form>
                                <table class="table text-nowrap moving-left" id="getclasses5" ></table> 
                            </div><!---panel-body end--->
                        </div><!-- panel-collapse collapse end 5-->
                        
                        
                        
                    <div class="panel panel-default">
                      <div class="panel-heading weekdays" data-id="6" role="tab" id="headingSix">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            Saturday
                          </a>
                        </h4>
                      </div>
                      <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                            <div class="panel-body">
                                <form method="post" id="form6">

                                    <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                            <select name="start_time" class="form-control">
                                              <option value="">start Time</option>
                                              <?php
                                              $x= array("00","30");
                                              for ($i=5; $i<=23; $i++) { 
                                                foreach ($x as $value1) {?>
                                                  <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                                <?php }
                                              }
                                              ?>
                                            </select>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                         <div class="icon-addon addon-lg">
                                            <select name="end_time" class="form-control">
                                              <option value="">End time</option>
                                              <?php
                                              $x= array("00","30");
                                              for ($i=5; $i<=23; $i++) { 
                                                foreach ($x as $value1) {?>
                                                  <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                                <?php }
                                              }
                                              ?>
                                            </select>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                         <div class="icon-addon addon-lg">
                                            <div class="multi-select-full" id="teacher1">
                                                <select class="form-control" name="teachers[]" multiple="multiple" >

                                                    <option value="">Select Teacher</option>
                                
                                                                  
                                                              <?php if(!empty($teachers)){
                                                                 foreach ($teachers as $teacher_info) {?>
                                                                 <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                                                              <?php }
                                                                 }?>
                                
                                                </select>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <input type="hidden" name="type" value="1"> -->
                  
                                        <button type="button" data-id="6" class="btn btn-info btn-block active legitRipple center savebatch">SUBMIT</button>
                                    </div>
                                </form>
                                <table class="table text-nowrap moving-left" id="getclasses6" ></table> 
                            </div><!---panel-body end--->
                        </div><!-- panel-collapse collapse end 6-->
                        
                        
                    <div class="panel panel-default">
                      <div class="panel-heading weekdays" data-id="7" role="tab" id="headingSeven">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            Sunday
                          </a>
                        </h4>
                      </div>
                      <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                            <div class="panel-body">
                                <form method="post" id="form7">
                                    <div class="form-group">
                                         <div class="icon-addon addon-lg">
                                            <select name="start_time" class="form-control">
                                              <option value="">start Time</option>
                                              <?php
                                              $x= array("00","30");
                                              for ($i=5; $i<=23; $i++) { 
                                                foreach ($x as $value1) {?>
                                                  <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                                <?php }
                                              }
                                              ?>
                                            </select>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                            <select name="end_time" class="form-control">
                                              <option value="">End time</option>
                                              <?php
                                              $x= array("00","30");
                                              for ($i=5; $i<=23; $i++) { 
                                                foreach ($x as $value1) {?>
                                                  <option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
                                                <?php }
                                              }
                                              ?>
                                            </select>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="icon-addon addon-lg">
                                            <div class="multi-select-full" id="teacher1">
                                                <select class="form-control" name="teachers[]" multiple="multiple" >
                                                    <option value="">Select Teacher</option>

                                  
                                                          <?php if(!empty($teachers)){
                                                             foreach ($teachers as $teacher_info) {?>
                                                             <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                                                          <?php }
                                                             }?>
                                                </select>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <input type="hidden" name="type" value="1"> -->
                                        <button type="button" data-id="7" class="btn btn-info btn-block active legitRipple center savebatch">SUBMIT</button>
                                    </div>
                                </form>
                                <table class="table text-nowrap moving-left" id="getclasses7" ></table> 
                            </div><!---panel-body end--->
                        </div><!-- panel-collapse collapse end 7-->

                  

					
<script type="text/javascript">
var batch_id = "<?=$batch_id?>";
var  day_type=1;
$(document).ready(function(){

 function getbatchclasses()
 {
   $.ajax({
      type:"post",
      data:{day_type:day_type,batch_id:batch_id},
      url:"<?=base_url("admin_services/getbatchclasses")?>",
      success : function(data){
         $("#getclasses"+day_type).html(data);
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
      url:"<?=base_url("admin_services/insertbatch")?>",
      data:data+"&class_id="+class_id+"&branch_id="+branch_id+"&type="+type+"&batch_id="+batch_id,
      success: function(data){
         alert("thank u");
         $("#form"+type)[0].reset();
         getbatchclasses();

      }
   });

   });

      $(document).on("click",".editbatchclass",function(){
         
            var batch_class_id = $(this).data('id');
            $.ajax({

               type:"post",
               
               url:"<?=base_url("admin_services/editbatchclass")?>",
               data:{batch_class_id:batch_class_id},
               success: function(data){
                     
                     $(".editbatch").html(data);
                     $(".editbatch").find(".multiselect").multiselect('refresh');
                     $('.modal_h2').modal('show'); //$('#multibox').multiselect();
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
               url:"<?=base_url('admin_services/updatebatchclassstatus')?>",
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
            url:"<?=base_url("admin_services/updatebatch")?>",
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

						