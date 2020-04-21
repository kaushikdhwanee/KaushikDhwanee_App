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
<?php  //print_r($promotion);exit;?>
			<div class="content-wrapper">

     			<div class="row">

					<div class="col-lg-12">



						<div class="panel panel-flat">

							<div class="panel-heading">

								<h5 class="panel-title">Additional Promotions</h5>

								<br>



							</div>
                           <?php if($this->session->userdata("user_type")==1){?>
							<form method="post" id="add-promotion" action="<?=base_url("admin/insertpromotion")?>">
                          
							<div class="col-md-12 product">
                           
							<div class="form-group  col-md-2">
							  <div class="input-group">
								 <select  class="form-control" name="branch_id" id="branch_id1"  required>

						                            	<option value="">Select</option>

						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>" <?=@$promotion['branch_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                                

						                 </select>
						                 </div>
							</div>
						    
							

						    <div class="  col-md-2">
						    <div class="input-group">

								 <input class="form-control" name="promo_code" id="promocode" value="<?=@$promotion['promocode']?>" required placeholder="Enter Promo Code" type="text">
								 </div>

							</div>

							

						     	<div class="form-group  col-md-2">

								<div class="input-group">

											<input type="text" class="form-control" id="amount" value="<?=@$promotion['amount']?>" required onkeypress="return event.charCode>=48 && event.charCode<=57"  name="amount" placeholder="Enter Amount">

											
										</div>

								</div>

								<div class="form-group  col-md-2">
	
								<div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                     <input type="text" class="form-control datepicker2" name="start_date" value="<?=@($promotion['start_date']!="")?date("d-m-Y",strtotime($promotion['start_date'])):""?>" required placeholder="Start Date">
                  </div>
							
								</div>

				   <div class="form-group  col-md-2">
	
								<div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                     <input type="text" class="form-control datepicker2" name="end_date" id="datepicker2" value="<?=@($promotion['end_date']!="")?date("d-m-Y",strtotime($promotion['end_date'])):""?>" required  placeholder="End Date">
                  </div>
							
								</div>

								  

								

								<div class="sub-btn form-group">
											<input type="hidden" class="form-control"  value="<?=@$promotion['id']?>"    name="id" >

		<button type="submit" class="btn btn-primary active legitRipple center">SUBMIT</button>

		</div>

							</div>

							</form>

							<?php }?>

							<div class="clearfix"></div>
																			 <div class="table-responsive">

            

                <table class="table text-nowrap">

                 
                  <thead>

                              <tr>

                                 <th>S No</th>

                                 <th> Branch Name</th>

                                 <th >Promo code</th>

                                 <th>Start date</th>

                                 <th>End date</th>

                                 
                                 <th >Status</th>
                                 <?php if($this->session->userdata("user_type")==1){?>
                                 <th >Action</th>
                                 <?php }?>
                              </tr>

                           </thead>


                  <tbody class="refar-price">


                              <?php 
                             
                              if(!empty($promotions)){
                                 $i=1;
                                    foreach ($promotions as $promo_info) {?>
                                       
                                 
                              <tr>

                              <td><?=$i?></td>

                              <td>

                              <div class="media-left media-middle">

                              			<?=$promo_info['branch_name']?>
                                    </div>

                                 </td>

                                 <td>

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$promo_info['promocode']?></a></div>

                                    </div>

                                 </td>

                                  <td>

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=date("d-m-Y",strtotime($promo_info['start_date']))?></a></div>

                                    </div>

                                 </td> 

                                 <td>

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=date("d-m-Y",strtotime($promo_info['end_date']))?></a></div>

                                    </div>

                                 </td>

                                 <td><span class="label bg-blue"><?=$promo_info['status']==1?"Active":"Inactive"?></span></td>

                                             
              <?php if($this->session->userdata("user_type")==1){?>
            <td class="text-center">

               <ul class="icons-list">

                  <li class="dropdown">

                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                     <ul class="dropdown-menu dropdown-menu-right">

                        
                        <li><a href="<?=base_url("admin/addpromotions/".$promo_info['id'])?>"><i class="fa fa-trash-o"></i> Edit</a></li>

                        <li><a href="<?=base_url("admin/updatepromotionstatus/".$promo_info['id']."/".$promo_info['status'])?>" onclick="return confirm('Are you sure to change the status');"><i class="fa fa-refresh" aria-hidden="true"></i> <?=$promo_info['status']==1?"Deactivate":"Activate"?></a></li>


                        <li class="divider"></li>

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

						</div>

						



					</div>




				</div>

			</div>

			<!-- /main content -->



		</div>

		

	</div>



	<!-- Footer -->

<?php //include_once 'includes/footer.php'?>

	

</body>

</html>

<script type="text/javascript">
	/*$("#branch_id1").change(function(){
			$("input[name=amount]").val('');
			$("input[name=promo_code]").val('');
			var branch_id = $("#branch_id1").val();
		   	if(branch_id !="")
		   	{
		   		$.ajax({
		   		type:"post",
		   		url:"<?=base_url('admin_services/getpromotionaloffer')?>",
		   		data:{branch_id:branch_id},
		   		success: function(message)
		   		{
		   			var resp = JSON.parse(message);
		   			if(resp.success==1)
		   			{
		   				$("input[name=amount]").val(resp.amount);
		   				$("input[name=promo_code]").val(resp.promocode);
		   				
		   			}

		   		}
		   	});
		   	}
		   	
   		}); */


</script>