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
<!-- Main content -->

<div class="content-wrapper">

   <!-- Dashboard content -->

   <div class="row">

      <div class="col-lg-12">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">View Classes</h5>

            </div>

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

						      <th>images</th>

                        <th>Class Name</th>

                        <th>Catagory</th>

                        <th>Description</th>

                        <th>Status</th>

                        <th>Acction</th>

                     </tr>

                  </thead>

                  <tbody class="refar-price">

                  <?php if(!empty($classes)){
                                 $i=1;
                                    foreach ($classes as $class_info) {?>
                                       

                     <tr>

                        <td class="text-center"><h6 class="no-margin"><?=$i?></h6></td>

						  <td>

						  <div class="media-left media-middle">

													<a href="#"><img src="<?=base_url("uploads/class_images/".$class_info['logo'])?>" class="img-circle img-xs" alt=""></a>

						   </div>

                           

                        </td>

                        <td> <div class="text-muted text-size-small"><?=$class_info['class_name']?></div> </td>

                        <td> 

						   <div class="media-left">

							<div class="text-muted text-size-small"><?=$class_info['category_name']?></div>

							

						   </div> 

						   </td>

                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small" title="<?=$class_info['description']?>"><?=(strlen($class_info['description'])>50)?substr($class_info['description'],0,50)."...":$class_info['description']?></div>

                     

                     </div> 

                     </td>

                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$class_info['status']==1?"Active":"Inactive"?></div>

                     

                     </div> 

                     </td>

                        <td class="text-center">

                           <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                                 <ul class="dropdown-menu dropdown-menu-right">

                                    <li><a href="<?=base_url("admin/addclass/".$class_info['id'])?>"><i class="fa fa-trash-o"></i> Edit</a></li>

                                 <li><a href="<?=base_url("admin/updateclassstatus/".$class_info['id']."/".$class_info['status'])?>"  onclick="return confirm('Are you sure to change the status');"><i class="fa fa-refresh" aria-hidden="true"></i> <?=$class_info['status']==1?"Deactivate":"Activate"?></a></li>
<!--                                  <li><a href="<?=base_url("admin/deletecategory/".$class_info['id'])?>" onclick="return confirm('are you sure you want delete this main category')"><i class="fa fa-trash-o"></i> Delete</a></li>
 -->

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



