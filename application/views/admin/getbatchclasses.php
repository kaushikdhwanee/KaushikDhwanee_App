
	              <thead>

                     <tr>

                        <th>Batch No</th>

						            <th>Start Time</th>

						<th>End Time</th>

                        <th>Select Techers</th>

                        <th>Status</th>

						<th>Action</th>

                     </tr>

                  </thead>

                  <tbody class="refar-price">
                     <?php if(!empty($classes)){
                                 $i=1;
                                    foreach ($classes as $class_info) {?>
                                       
                     <tr>

                        <td ><h6 class="no-margin">Batch <?=$i?></h6></td>

                    

						   <td> 

					   <div class="text-muted text-size-small"><?=date("h:i A",strtotime($class_info['start_time']))?></div> 

					   

					   </td>

                       <td> 

					   <div class="text-muted text-size-small"><?=date("h:i A",strtotime($class_info['end_time']))?></div> 

					   </td>

                         <td> 

					   <div class="text-muted text-size-small"><?=$class_info['teachers']?></div> 

					   </td>

                  <td> 

                  <div class="text-muted text-size-small"><?=$class_info['status']==1?"Active":"Inactive"?></div> 

                  </td>

                        <td>

                            

                           <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                                 <ul class="dropdown-menu dropdown-menu-right">

                                    <!-- <li><a href="#"><i class="fa fa-eye text-success-600"></i>View</a></li> -->

									                   <li><a href="#"  class="editbatchclass" data-id="<?=$class_info['id']?>"><i class="fa fa-pencil"></i>Edit</a></li>

                                    <li><a href="#" class="updatestatus1" id="<?=$class_info['id']?>" data-id="<?=$class_info['status']?>" ><i class="fa fa-times text-violet-600"></i>update status</a></li>

                                 </ul>

                              </li>

                           </ul>

                      

                        </td>

                     </tr>

                     <?php $i++;}
                                 }else{
                                    echo "<tr><td>No results found</td></tr>" ;  
                                 }
                                 ?>


				     
				     

				     

                    </tbody>

               