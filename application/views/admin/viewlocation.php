<style>
.panel-title{
  background-color: lightgrey;
  margin:0;
  padding-left: 15px;
  font-style: italic;
  font-weight: bold;
	}	
	.panel-heading{
  margin: 0;
  padding:0;
  padding-bottom: 50px;

}
</style>
<!-- <script type="text/javascript" src="js/widgets.min.js"></script>

<script type="text/javascript" src="js/globalize.js"></script>

<script type="text/javascript" src="js/jqueryui_forms.js"></script> -->

<!-- Main content -->

<div class="content-wrapper">

   <!-- Dashboard content -->

   <div class="row">

      <div class="col-lg-16">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">View Summercamp Locations</h5>

            </div>

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

						

                        <th>Location Name</th>

                        <th>Location</th>

                        <th>Mobile</th>
						 <th>Timing</th>

                        <th>status</th>


                        <th>Action</th>

                     </tr>

                  </thead>

                  <tbody class="refar-price">
  <?php if(!empty($branches)){
                                 $i=1;
                                    foreach ($branches as $branch_info) {?>
                     <tr>

                        <td class="text-center"><h6 class="no-margin"><?=$i?></h6></td>

                    
                       <td> <div class="text-muted text-size-small"><?=$branch_info['branch_name']?></div> </td>

                      <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['address']?></div>

                     </div> 

                     </td>

                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['mobile']?></div>

                     

                     </div> 

                     </td>
						 <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['time']?></div>

                     

                     </div> 

                     </td>

                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['status']==1?"Active":"Inactive"?></div>

                     

                     </div> 

                     </td>

                        <td class="text-center">

                           <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                                 <ul class="dropdown-menu dropdown-menu-right">

                                    <li><a href="<?=base_url("admin/addlocation/".$branch_info['id'])?>"><i class="fa fa-trash-o"></i> Edit</a></li>

                                 <li><a href="<?=base_url("admin/updatelocationstatus/".$branch_info['id']."/".$branch_info['status'])?>" onclick="return confirm('Are you sure to change the status');"><i class="fa fa-refresh" aria-hidden="true"></i> <?=$branch_info['status']==1?"Deactivate":"Activate"?></a></li>
                                 <li><a href="<?=base_url("admin/deletelocation/".$branch_info['id'])?>" onclick="return confirm('are you sure you want delete this location')"><i class="fa fa-trash-o"></i> Delete</a></li>

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



