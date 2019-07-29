<!-- Main content -->

<div class="content-wrapper">

   <!-- Dashboard content -->

   <div class="row">

      <div class="col-lg-12">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">View Teachers</h5>

            </div>
            <?php if($this->session->userdata("user_type")==1){?>
            <form method="get">
                      <div class="col-md-12" >
                      
                      <div class=" col-md-3">
   
                               <select data-placeholder="select branch" class="select box" name="branch_id" >

                                                <option value=""> Select branch</option> 

                                        <?php
                                       if(!empty($branches))
                                       {
                                          foreach ($branches as $cat_info) 
                                          {
                                             ?>
                                              <option value="<?=$cat_info['id']?>"<?=($this->input->get('branch_id'))==$cat_info['id']?"selected":""?>><?=$cat_info['branch_name']?></option> 
                                     <?php   }
                                       }
                                       ?>


                                                  
                                              </select>
                     
                        </div>
                         
                         <div class=" col-md-3">
   
                               <input  name="search"  type="submit" name="search" >
                     
                        </div>
                      </div>
                   </form>
                  <?php }?>
            <div class="col-md-12 margin-0">

	

								<div class="tabbable">

								

									<div class="tab-content">

										<div class="tab-pane active" id="solid-tab1">

										     

               <div class="clearfix"></div>

			   <div class="table-responsive">

            

               <table class="table text-nowrap">

                  <thead>

                     <tr>

                        <th>S No</th>

						      <th>Profile Pic</th>

                        <th>Teacher Name</th>
                        
                          
                        
                        <th>DOB</th>

                        <th>Mobile</th>

                        <th>Email ID</th>

                        <th>Date of Joining</th>

                        <?php if($this->session->userdata("user_type")==1){?>
                        <th>Acction</th>
                       <?php }?>
                     </tr>

                  </thead>

                  <tbody class="refar-price">

                    <?php if(!empty($teachers)){
                                 $i=1;
                                    foreach ($teachers as $teacher_info) {?>

                     <tr>

                        <td class="text-center"><h6 class="no-margin"><?=$i?> </h6></td>

						  <td>

						  <div class="media-left media-middle">

													<a href="#"><img src="<?=base_url("uploads/teacher_images/".$teacher_info['profile_pic'])?>" class="img-circle img-xs" alt=""></a>

						   </div>

                           

                        </td>

                        <td> <div class="text-muted text-size-small"><?=$teacher_info['teacher_name']?></div> </td>

                       


                        <td> 

						   <div class="media-left">

							<div class="text-muted text-size-small"><?=date("d-m-Y",strtotime($teacher_info['date_of_joining']))?></div>

							

						   </div> 

						   </td>

                        <td> <div class="text-muted text-size-small"><?=$teacher_info['mobile']?></div> </td>


                        <td><div class="text-muted text-size-small"><?=$teacher_info['email']?></div> </td>
                        <td><div class="text-muted text-size-small"><?=date("d-m-Y",strtotime($teacher_info['date_of_joining']))?></div> </td>

                       <?php if($this->session->userdata("user_type")==1){?>

                        <td class="text-center">

                           <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                                 <ul class="dropdown-menu dropdown-menu-right">

                                    <li><a href="<?=base_url("admin/editteacher/".$teacher_info['teacher_id'])?>"><i class="fa fa-trash-o"></i> Edit</a></li>

                                    <li><a href="<?=base_url("admin/updateteacherstatus/".$teacher_info['teacher_id']."/".$teacher_info['status'])?>"  onclick="return confirm('Are you sure to change the status');"> <i class="fa fa-refresh" aria-hidden="true"></i> <?=$teacher_info['status']==1?"Deactivate":"Activate"?></a></li>


                                 </ul>

                              </li>

                           </ul>

                        </td>
                       <?php }?>
                     </tr>

                     <?php $i++;}
                                 }else{
                                    echo "<tr><td>No results found</td></tr>" ;  
                                 }
                                 ?>

                    </tbody>

               </table>

            </div>

			<!-- <div class="page-nacation">

			   <ul class="pagination pagination-rounded">

								<li><a href="#">&lsaquo;</a></li>

								<li class="active"><a href="#">1</a></li>

								<li><a href="#">2</a></li>

								<li><a href="#">3</a></li>

								<li><a href="#">4</a></li>

								<li><a href="#">5</a></li>

								<li><a href="#">&rsaquo;</a></li>

							</ul>

							</div>
 -->
			   

										</div>



								

									</div>

								</div>

							

							

					

			

          

             

      

            </div>

            <div class="clearfix"></div>

            

         </div>

      </div>

      <div class="col-lg-3">

         <?php //include_once 'includes/right-sidepanel.php'?>

      </div>

   </div>

</div>

</div>

</div>

<!-- Footer -->

<?php //include_once 'includes/footer.php'?>

</body>

</html>



