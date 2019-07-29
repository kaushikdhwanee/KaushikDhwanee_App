<?php
function support_type($status)
{
   switch ($status) 
   {
      case 1:
         echo "Classes";
         break;
      case 2:
         echo "Fees";
         break;
      case 3:
         echo "Timings";//ready to dispatch
         break;
      case 4:
         echo "Others";//On the way
         break;
          
      default:
         # code...
         break;
   }
   # code...
}
?>			<!-- Main content -->

			<div class="content-wrapper">

			

				<!-- Dashboard content -->

				<div class="row">

					<div class="col-lg-12">



						<div class="panel panel-flat">

							<div class="panel-heading">

								<h5 class="panel-title">View Feedbacks</h5>

								



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

                            <div class="mar-one">
							<div class="table-responsive">

								<table class="table text-nowrap tab-margin-bottom">

									<thead>

										<tr>

											<!-- <th width="5%">S No</th> -->

											<th>S No</th>
                                             <th class="col-md-2">Branch</th>
											<th class="col-md-2">Mobile</th>

											<th class="col-md-3">Service issue</th>

											<th class="col-md-3">Description</th>											

											<th class="col-md-2">Status</th> 

											<th class="col-md-2">Date</th> 


											<th>Acction</th>

										</tr>

									</thead>

									<tbody>

										<?php if(!empty($feedbacks)){
											$i=1;
												foreach ($feedbacks as $service_info) { ?>
													
											
										<tr>
										
									<!-- 	<td><?=$service_info['name']?></td> -->
                                           <td><?=$i?></td>
                                         <td><?=$service_info['branch_name']?></td>
										<td><?=$service_info['mobile']?></td>

										

										<td><?=support_type($service_info['support_type'])?></td>

										
										<td><?=$service_info['description']?></td>
										
										<td><?=$service_info['status']==1?"Pending":"Completeed"?></td>

										<td><?=date("d-m-Y h:i A",strtotime($service_info['created_date']))?></td>


										<td class="text-center">

                           <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                                 <?php if($service_info['status']==1){

                                 	?><ul class="dropdown-menu dropdown-menu-right">

										<li><a href="<?=base_url("admin/updatefeedbackstatus/".$service_info['id']."/".$service_info['status'])?>"  onclick="return confirm('Are you sure to change the status');"><i class="fa fa-refresh" aria-hidden="true"></i> <?=$service_info['status']==2?"Pending":"Completed"?></a></li>	
															
</ul> <?php }?>

                              </li>

                           </ul>

                        </td>
				

										</tr>


<?php	$i++;}
											}else{
												echo "<tr><td>No results found</td></tr>" ;	
											}
											?>

											</tbody>

								</table>

							</div>

						</div>

						</div>



					</div>



					<div class="col-lg-3">

					</div>

				</div>

			</div>

			<!-- /main content -->



		</div>

		

	</div>


<script type="text/javascript">
  $(document).ready(function(){
  	//$(window).load(function() {
  	//alert("hiiii");
    $("#category").validate({
      rules: {
        category_name: "required",
        start_time: "required",
        end_time: "required",
        "categories[]": "required"
        //image: "required",
      },
    });
    $("#fileupload").change(function(){
    	//alert($('input[type=file]').val().replace(/C:\\fakepath\\/i, ''));
    	$(".image_name").html($('input[type=file]').val().replace(/C:\\fakepath\\/i, ''));
    });
  });
</script>
	

