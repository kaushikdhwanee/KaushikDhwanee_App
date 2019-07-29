
            <div class="modal-sm modal-dialog " >
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h2 class="modal-title">Edit Batch</h2>
                </div>

           <form method="post" id="editformz" >

                   <div class="col-md-9" >

                  <div class="form-group">
<label>Start Time</label>
                     <div class="time-div">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" value="<?=date("h:i A",strtotime($class_info['start_time']))?>" name="start_time" placeholder="Start Time">

                     </div>

                  </div>



                  </div>

               </div>

             <div class="col-md-9" >

                  <div class="form-group">

                                       <div class="time-div">
<label>End Time</label>
                     <div class="input-group">

                        <span class="input-group-addon"><i class="icon-alarm"></i></span>

                        <input type="text" class="form-control pickatime" value="<?=date("h:i A",strtotime($class_info['end_time']))?>" name="end_time" placeholder="End Time">

                     </div>

                  </div>

                  </div>

               </div>

                 <div class="col-md-9" >

  <?php

  ?>                  

                           

                           <div class="multi-select-full" id="teacher1">

                             <label>Select Teacher</label>

                              <select class="multiselect" id="multibox" name="teachers[]" multiple="multiple" >

                            <?php 
                              if(!empty($teachers)){
                                 foreach ($teachers as $teacher_info) {?>
                                 <option value="<?=$teacher_info['teacher_id']?>" <?=@(in_array($teacher_info['teacher_id'], explode(",", $class_info['teachers'])))?"selected":""?>><?=$teacher_info['teacher_name']?></option>
                              <?php }
                                 }?>

                              </select>



                              

                           </div>

                     

               </div>

           <div class="clearfix"></div>

              

                <div class="modal-footer">
                <input type="hidden" name="batch_class_id" value="<?=$class_info['id']?>">
                  <button type="button" id="updatebatchclass" class="btn btn-primary">Save changes</button>
                </div>
                 </form>
              </div>
            </div>
          