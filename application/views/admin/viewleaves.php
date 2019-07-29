		<!-- Main content -->

			<div class="content-wrapper">

			

				<!-- Dashboard content -->

				<div class="row">

					<div class="col-lg-12">



						<div class="panel panel-flat">

							<div class="panel-heading">

								<h5 class="panel-title">View Leaves</h5>

								



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
                                            <th class="col-md-2">branch</th>
											<th class="col-md-2">User name</th>

											<th class="col-md-2">Mobile</th>

											<th class="col-md-2">Start date</th>
											
											<th class="col-md-2">End date</th>

											<th class="col-md-2">Status</th> 

											

										</tr>

									</thead>

									<tbody>

										<?php if(!empty($leaves)){
											$i=1;
												foreach ($leaves as $service_info) {?>
													
											
										<tr>
										<td><?=$service_info['branch_name']?></td>
								 		<td><?=$service_info['name']?></td>

										<td><?=$service_info['mobile']?></td>	
										
										<td><?=date("d-m-Y",strtotime($service_info['start_date']))?></td>										
										<td><?=($service_info['type']==1)?date("d-m-Y",strtotime($service_info['start_date']."+ 15 days")):date("d-m-Y",strtotime($service_info['start_date']."+ 30 days"))?></td>					

										<td><?=$service_info['status']==1?"<span style='color:red'>Pending</span>":($service_info['status']==2?"approved":"Rejected")?></td>

										<td class="text-center">

                           <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                                 <?php if($service_info['status']==1){ ?><ul class="dropdown-menu dropdown-menu-right">

										<li><a href="<?=base_url("admin/updateleavesstatus/".$service_info['id']."/2")?>"  onclick="return confirm('Are you sure to change the status');"><i class="fa fa-refresh" aria-hidden="true"></i> Approve</a></li>
										<li><a href="<?=base_url("admin/updateleavesstatus/".$service_info['id']."/3")?>"  onclick="return confirm('Are you sure to change the status');"><i class="fa fa-refresh" aria-hidden="true"></i> Reject</a></li>
										<li><a href="<?=base_url("admin/viewleaves/".$service_info['member_id'])?>" target="_blank"><i class="fa fa-refresh" aria-hidden="true"></i> View Leaves</a></li>
										
										</ul><?php }?>

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
	

