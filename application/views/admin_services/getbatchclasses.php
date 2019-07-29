<?php 
$days = array(
                  "1"=>'Monday',
                   "2"=>'Tuesday',
                   "3"=>'Wednesday',
                   "4"=>'Thursday',
                   "5"=>'Friday',
                   "6"=>'Saturday',
                   "7"=>'Sunday'
               );
/*echo "<pre>";
print_r($classes);exit;*/
if(!empty($classes)){
foreach ($classes as $key => $value) {
?>

 <div class="panel panel-default">
                                          <div class="panel-heading monday-box"><?=$days[$key]?></div>
                                          <div class="panel-body">
                                              <div class="table-responsive"> 
                                             <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>BatchNo</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Faculty</th>
                                                  </tr>
                                                </thead><tbody>
                                                <?php
                                                if(!empty($value)){
                                                   $i=1;
                                                   foreach ($value as $batch_info) {?>
                                                     <tr>
                                                    <td>Batch<?=$i?></td>
                                                    <td><?=$batch_info['start_time']?></td>
                                                    <td><?=$batch_info['end_time']?></td>
                                                    <td><?=$batch_info['teachers']?></td>
                                                  </tr>
                                                <?php  $i++;  }
                                                }else{ echo "<tr><td> No results</td></tr>";}
                                                ?>
                                                
                                                  
                                                  
                                                </tbody>  
                                              </table> 
                                              </div>
                                          </div>
                                         </div>

                     <?php
                                }
 }else{
                                    echo " <div class='panel panel-default'>
                                          <div class='panel-heading monday-box'>No results</div></div></div>" ;  
                                 }
                                 ?>


				     
				     

				     


               