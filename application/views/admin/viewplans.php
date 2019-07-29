<!-- Main content -->

<div class="content-wrapper">

   <!-- Dashboard content -->

   <div class="row">

      <div class="col-lg-16">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">View Plans</h5>

            </div>

               <form method="get">
                      <div class="col-md-16" >
<?php if($this->session->userdata("user_type")==1){?>
                <div class=" col-md-4">
   
                               <select data-placeholder="Select Branch" class="select box" name="user_id"  id="mobile">
                                                <option value=""> Select Branch</option> 

                                        <?php
                                       if(!empty($branches))
                                       {
                                          foreach ($branches as $branch_info) 
                                          {
                                             ?>
                                              <option value="<?=$branch_info['id']?>"<?=($this->uri->segment(3))==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
                                     <?php   }
                                       }
                                       ?>


                                                  
                                              </select>
                     
                        </div> 
                     <?php }?>

            </div>
            </form>

            <div class="col-md-16 margin-0">

	

								<div class="tabbable">

								

									<div class="tab-content">

										<div class="tab-pane active" id="solid-tab1">

										     

               <div class="clearfix"></div>

			   <div class="table-responsive">

            

               <table class="table text-nowrap">

                  <thead>

                     <tr>

                        <th>S No</th>

						      <th>Branch Name</th>

                        <th>Class Name</th>

                        <th>24 session (3 months)<br>2 session/week</th>
                        
                        <th>36 session (3 months)<br>3 session/week</th>

                        <th>48 session (6 months)<br>2 session/week</th>

                        <th>48 session (6 months)<br>3 session/week</th>

                        

                       
                        <!-- <th>Acction</th> -->

                     </tr>

                  </thead>

                  <tbody class="refar-price">

                  <?php if(!empty($plans)){
                                 $i=1;
                                    foreach ($plans as $class_info) {?>
                                       

                     <tr>

                        <td class="text-center"><h6 class="no-margin"><?=$i?></h6></td>

                        <td> <div class="text-muted text-size-small"><?=$class_info['branch_name']?></div> </td>
						      

                        <td> <div class="text-muted text-size-small"><?=$class_info['class_name']?></div> </td>

                        <td> <div class="media-left"><?=$class_info['two_session_three_months']?></div></td>

                        <td> <div class="media-left"><?=$class_info['three_session_three_months']?></div></td>

                        <td> <div class="media-left"><?=$class_info['two_session_six_months']?></div></td>

                        <td> <div class="media-left"><?=$class_info['three_session_six_months']?></div></td>

                        


                        <!-- <td class="text-center">

                           <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                                 <ul class="dropdown-menu dropdown-menu-right">

                                    <li><a href="<?=base_url("admin/addplan/".$class_info['id'])?>"><i class="fa fa-trash-o"></i> Edit</a></li>

                                 <li><a href="<?=base_url("admin/updateplanstatus/".$class_info['id']."/".$class_info['status'])?>"  onclick="return confirm('Are you sure to change the status');"><i class="fa fa-check-square-o"></i> <?=$class_info['status']==1?"Deactivate":"Activate"?></a></li>


                                 </ul>

                              </li>

                           </ul>

                        </td> -->

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

							</div> -->

			   

										</div>



								

									</div>

								</div>

							

							

					

			

          

             

      

            </div>

            <div class="clearfix"></div>

            

         </div>

      </div>

      <div class="col-lg-3">


      </div>

   </div>

</div>

</div>

</div>

<!-- Footer -->


</body>

</html>
<script type="text/javascript">
   $("#mobile").change(function(){
      var id = $(this).val();
      window.location="<?=base_url("admin/viewplans/")?>"+id;
   });
</script>


