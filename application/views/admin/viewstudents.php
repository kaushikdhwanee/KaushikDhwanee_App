<?php //include_once 'includes/header.php'?>

<!-- <script type="text/javascript" src="js/widgets.min.js"></script>

<script type="text/javascript" src="js/globalize.js"></script>

<script type="text/javascript" src="js/jqueryui_forms.js"></script> -->

<!-- Main content -->

<style>
.table-responsive {
    overflow-x: auto !important;
    min-height: .01%;
}
.refar-price [class*="text-size-small"]{
  font-size:13px !important;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
  padding:12px 10px !important;
}
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
.view{
  margin-top: 50px !important;
}

td.details-control {
    background: url('../resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('../resources/details_close.png') no-repeat center center;
}

.child{
  background-color: grey;
  text-align: center;
}
.studentid{
  
  width: 150px;
  overflow:hidden 
}
	table th.sort_ASC:after {
   font-size:10px;
   color:green;
	content: "▲";
}
table th.sort_DESC:after {
   font-size:10px;
   color:green;
	content: "▼";
}
	.space{
	padding-bottom:40px;
	}
	.box{
	border:1px solid green;
		padding-top:20px;
	}
</style>

<div class="content-wrapper">

   <!-- Dashboard content -->

   <div class="row">

      <div class="col-md-16 margin-0">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title ">View Student Profile</h5>

            </div>
                     <form method="get">
						 <div class="col-md-10 col-md-offset-1">Filter By :</div>
                      <div class="col-md-10 col-md-offset-1 box" >
                      <?php if($this->session->userdata("user_type")==1){?>
                      <div class=" col-md-2 space"style="margin-right:30px">
   
                               <select data-placeholder="select branch" class="select box" name="branch_id" >

                                                <option value=""> Select branch</option> 

                                        <?php
                                       if(!empty($branches))
                                       {
                                          foreach ($branches as $cat_info) 
                                          {
                                             ?>
                                             <option value=""></option>
                                              <option value="<?=$cat_info['id']?>"<?=($this->input->get('branch_id'))==$cat_info['id']?"selected":""?>><?=$cat_info['branch_name']?></option> 
                                     <?php   }
                                       }
                                       ?>


                                                  
                                              </select>
                     
                        </div>
                         <?php }?>
                <div class=" col-md-3 space" style="margin-right:30px">
   
                               <select data-placeholder="Type mobile or Name" class="select box" name="user_id"  ><!-- id="mobile" -->
                                                <option value=""> Select Mobile</option> 

                                        <?php
                                       if(!empty($all_users))
                                       {
                                          foreach ($all_users as $cat_info) 
                                          {
                                             ?>
                                              <option value="<?=$cat_info['member_id']?>"<?=($this->input->get('user_id'))==$cat_info['member_id']?"selected":""?>><?=$cat_info['mobile']."(".$cat_info['name'].")"?></option> 
                                     <?php   }
                                       }
                                       ?>


                                                  
                                              </select>
                     
                        </div> 
						  
						  <div class="col-md-3 space"style="margin-right:30px">

								                   <select  data-placeholder="Select Class" name="class_id"  id="class_id" class="select">

						                            	 	<option value="">Select class</option>

						                                <?php
						                            	if(!empty($classes))
						                            	{
						                            		foreach ($classes as $cat_info) {
						                            			?>
						                            			 <option value="<?=$cat_info['id']?>"><?=$cat_info['class_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                            </select>
                                
								</div>
						  <div class=" col-md-2 space"style="margin-right:30px">
					
   
                               <select  class="select" name="plan"  ><!-- id="mobile" -->
                                                <option value=""> Select Plan</option> 

                                        
                                              <option value="1" <?=($this->input->get('plan'))==1?"selected":""?> >Three Months</option> 
                                              <option value="3" <?=($this->input->get('plan'))==3?"selected":""?> >Six Months</option> 
								              <option value="5" <?=($this->input->get('plan'))==5?"selected":""?> >One Year</option>
                                     

                                                  
                                              </select>
                     
                        </div>      

                <div class=" col-md-2 space"style="margin-right:30px">
					
   
                               <select  class="select box" name="status"  ><!-- id="mobile" -->
                                                <option value=""> Select Status</option> 

                                        
                                              <option value="1" <?=($this->input->get('status'))==1?"selected":""?> >Active</option> 
                                              <option value="2" <?=($this->input->get('status'))==2?"selected":""?> >In Active</option> 
                                     

                                                  
                                              </select>
                     
                        </div>         

                         <div class=" col-md-2 space">
   
							 <button type="submit" name="search"class="btn-primary">GO</button>
                     
                        </div>


            </div>
            </form>

            <div class="col-md-12 margin-0 view">

	

								<div class="table-responsive">

            

               <table  id="example"  class="table text-nowrap display" style="width:100%">

                  <thead>

                     <tr>
                       
                        <th>S No</th>
                        <th <?php echo($sort_by == 'enroll_student_id' ? 'class="sort_'.$sort_order.'"' : ''); ?>>
						<?php
                            echo anchor("admin/viewstudents/enroll_student_id/" .
                                    (($sort_order == 'ASC' && $sort_by == 'enroll_student_id') ? 'DESC' : 'ASC'), 'ID');
                        ?>
					</th>
                        
                         
                        <th>User Name</th>

                        

                        

                         

                         <th>Branch</th>

                         <th <?php echo($sort_by == 'class_names' ? 'class="sort_'.$sort_order.'"' : ''); ?>>
						<?php
                            echo anchor("admin/viewstudents/class_names/" .
                                    (($sort_order == 'ASC' && $sort_by == 'class_names') ? 'DESC' : 'ASC'), 'Activities');
                        ?>
					</th>

               <th <?php echo($sort_by == 'total_sessions' ? 'class="sort_'.$sort_order.'"' : ''); ?>>
						<?php
                            echo anchor("admin/viewstudents/total_sessions/" .
                                    (($sort_order == 'ASC' && $sort_by == 'total_sessions') ? 'DESC' : 'ASC'), 'Sessions');
                        ?>
					</th>

                         <th <?php echo($sort_by == 'start_date' ? 'class="sort_'.$sort_order.'"' : ''); ?>>
						<?php
                            echo anchor("admin/viewstudents/start_date/" .
                                    (($sort_order == 'ASC' && $sort_by == 'start_date') ? 'DESC' : 'ASC'), 'Start Date');
                        ?>
					</th>

                         <th <?php echo($sort_by == 'end_date' ? 'class="sort_'.$sort_order.'"' : ''); ?>>
						<?php
                            echo anchor("admin/viewstudents/end_date/" .
                                    (($sort_order == 'ASC' && $sort_by == 'end_date') ? 'DESC' : 'ASC'), 'End Date');
                        ?>
					</th>

                         <th>Status</th>


                        <th>Action</th>

                     </tr>
                  </thead>
                  

                  <tbody class="refar-price">
                     

  <?php 

/*echo "<pre>";
print_r($users);exit;*/

                if(!empty($users)){
                                 $i=1;
                                    foreach ($users as $branch_info) {?>
                                      
                      

                     <tr id="rows">
                     <!-- <td >
                      
                      <input type="button" id="submit" class="details-control" >+</div>
                    </td>-->

                        <td><div class=" text-muted text-size-small"><?=$i?></div></td>
                        <td> <div class=" text-muted text-size-small "><?=$branch_info['enroll_student_id']?></div> </td>
                     
                       
                        <td> <div class=" text-muted text-size-small"><?=$branch_info['name']?></div> 
						      <input type="hidden" id="member_id" name="member_id" value="<?=$branch_info['member_id']?>">
						 </td>

                      

                     

                     

                      

                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=($branch_info['branch_name'])?></div>

                     

                     </div> 

                     </td> 

                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['class_names']?></div>

                     

                     </div> 

                     </td>
						 <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small col-md-3"><?=$branch_info['total_sessions']?></div>

                     

                     </div> 

                     </td>			
                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=date('d-m-Y',strtotime($branch_info['start_date']))?></div>

                     

                     </div> 

                     </td>
									 <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=date('d-m-Y',strtotime($branch_info['end_date']))?></div>

                     

                     </div> 

                     </td>
                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['status']==1?"Active":"In Active"?></div>

                     

                     </div> 

                     </td> 
                      
                        <td class="text-center">

                          <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                                 

                                 <ul class="dropdown-menu dropdown-menu-right">

                                   <!-- <li><a href="<?=base_url("admin/addenroll/".$branch_info['member_id'])?>"> add New Class</a></li>-->

                                    <!--<li><a href="<?=$branch_info['type']==1?base_url("admin/editstudent/".$branch_info['member_id']):base_url("admin/editfamilymember/".$branch_info['member_id'])?>"> Edit</a></li>-->
                                    
                                     <li><a href="<?=base_url("admin/addadditionalfee/".$branch_info['enroll_student_id'])?>"> add additional fee</a></li>
                                     <li><a href="<?=base_url("admin/editclassenroll/".$branch_info['enroll_student_id'])?>" > Edit class</a></li>

                                 <li><a href="<?=base_url("admin/editclassstatus/".$branch_info['member_id'])?>" > Edit class Status</a></li>
									 <li><a href="<?=base_url("admin/enterattendence/".$branch_info['enroll_student_id'])?>" > Enter Attendence</a></li>

                                 <!-- <li><a  href="<?=base_url("admin/updatestudentstatus/".$branch_info['member_id']."/".$branch_info['user_status'])?>" ><?=$branch_info['user_status']==2? "Activate":"DeActivate"?> Student</a></li>-->


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

<script type="text/javascript">
  var enroll=[];
  var member_id;
  var x=$('tr#rows').length;

</script>

<script type="text/javascript">
   $("#mobile").change(function(){
      var id = $(this).val();
      window.location="<?=base_url("admin/viewstudents/")?>"+id;
   });
</script>



