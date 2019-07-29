<?php 
//$sessions_per_week = $plan['sessions'];
$weekdays = $weekdays;
$days = array('1'=>'Monday','2'=>'Tuesday','3'=>'Wednesday','4'=>'Thursday','5'=>'Friday','6'=>'Saturday','7'=>'Sunday');
$dayz = array_flip($days);
$result = array_intersect($dayz, $weekdays);
//$selectedays =$selectedays;
//$select=array_intersect($dayz, $selectedays);
$day = array();


	for ($i=1; $i <= $sessions_per_week; $i++){ ?>
				
<div class="form-group">
	<label class="control-label col-lg-4"><p class="sib-dis">Select Days</p></label> 
	<div class="form-group  col-md-4">

		 <select data-placeholder="Select Category" name="selected_days[]" class="select selectday" data="<?=$i?>" >

                        	<option value="">select days</option>
                            <?php 
                            foreach ($result as $key => $valu) {?>
                            	<option value="<?=$valu?>"><?=$key?></option>
                            <?php }
                            ?>
                        </select>
	</div>
	 <div class="form-group  col-md-4">

		    <select data-placeholder="Select Category" name="selected_batches[]" class="select" id="week<?=$i?>"  >
                        	<option value="">Select Batch</option>
                            
                            
                        </select>

	</div>
		<div class="clearfix"></div>
</div>

<?php }?>