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

      <div class="col-lg-16">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">View Plans</h5>

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

						      <th>Branch Name</th>

                       

                        <th>One Week</th>
                        
                        <th>Two Week</th>

                        <th>Three Week</th>

                        <th>Four Week</th>
						 <th>Five Week</th>

                        

                       
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
						      

                     

                        <td> <div class="media-left"><?=$class_info['one_week']?></div></td>

                        <td> <div class="media-left"><?=$class_info['two_week']?></div></td>

                        <td> <div class="media-left"><?=$class_info['three_week']?></div></td>

                        <td> <div class="media-left"><?=$class_info['four_week']?></div></td>
						 <td> <div class="media-left"><?=$class_info['five_week']?></div></td>

                        


                       <td class="text-center">

                           <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                                 <ul class="dropdown-menu dropdown-menu-right">

                                    <li><a href="<?=base_url("admin/summerplan")?>"><i class="fa fa-trash-o"></i> Edit</a></li>

                                 <li><a href="<?=base_url("admin/updateplanstatus/".$class_info['id']."/".$class_info['status'])?>"  onclick="return confirm('Are you sure to change the status');"><i class="fa fa-check-square-o"></i> <?=$class_info['status']==1?"Deactivate":"Activate"?></a></li>


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


