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
.refar-price [class*="text-size-small"]{
  font-size:13px !important;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
  padding:12px 10px !important;
}
</style>

<div class="content-wrapper">

   <!-- Dashboard content -->

   <div class="row">

      <div class="col-md-16 margin-0">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">View Users</h5>

            </div>
                     <form method="get">
                      <div class="col-md-12" >
                      <?php if($this->session->userdata("user_type")==1){?>
                      <div class=" col-md-3">
   
                               <select data-placeholder="Type mobile or Name" class="select box" name="branch_id" >

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
                        <?php }?>
                <div class=" col-md-4">
   
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

                <div class=" col-md-3">
   
                               <select  class="select box" name="status"  ><!-- id="mobile" -->
                                                <option value=""> Select Status</option> 

                                        
                                              <option value="1" <?=($this->input->get('status'))==1?"selected":""?> >Active</option> 
                                              <option value="2" <?=($this->input->get('status'))==2?"selected":""?> >In Active</option> 
                                     

                                                  
                                              </select>
                     
                        </div>         

                         <div class=" col-md-2">
   
                               <input  name="search"  type="submit" name="search" >
                     
                        </div>


            </div>
            </form>

            <div class="col-md-12 margin-0 view ">

	

								<div class="table-responsive">

            

               <table  id="example"  class="table text-nowrap">

                  <thead>

                     <tr>

                        <th>S No</th>

                        <th>Profile Pic</th>

                        <th>User Name</th>
                        
                       

                        <th>Mobile</th>

                        <th>Email ID</th>

                         <th>User Type</th>

                         <th>Branch</th>

                         <th>Activities</th>

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
                     <tr>

                     <td><div class=" text-muted text-size-small"><?=$i?></div></td>

                     <td>

                    <div class="media-left media-middle">

                                       <a href="#"><img src="<?=base_url("uploads/user_images/".$branch_info['profile_pic'])?>" class="img-circle img-xs" alt=""></a>

                     </div>

                           

                        </td> 

                        <td> <div class="text-muted text-size-small"><?=$branch_info['name']?></div> </td>

                      

                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['mobile']?></div>

                     

                     </div> 

                     </td>

                      <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['email']?></div>

                     

                     </div> 

                     </td>

                       <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=($branch_info['type']==1?"Primary":"Secondary")?></div>

                     

                     </div> 

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

                     <div class="text-muted text-size-small"><?=$branch_info['user_status']==1?"Active":"In Active"?></div>

                     

                     </div> 

                     </td> 

                        <td class="text-center">

                           <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                                 <ul class="dropdown-menu dropdown-menu-right">

                                    <li><a href="<?=base_url("admin/addenroll/".$branch_info['member_id'])?>"> add New Class</a></li>
                                    <li><a href="<?=$branch_info['type']==1?base_url("admin/editstudent/".$branch_info['member_id']):base_url("admin/editfamilymember/".$branch_info['member_id'])?>"> Edit</a></li>

                                     <li><a href="<?=base_url("admin/addadditionalfee/".$branch_info['enroll_student_id'])?>"> add additional fee</a></li>

                                 <li><a href="<?=base_url("admin/editclassstatus/".$branch_info['member_id'])?>" > Edit class Status</a></li>

                                  <li><a  href="<?=base_url("admin/updatestudentstatus/".$branch_info['member_id']."/".$branch_info['user_status'])?>" > <?=$branch_info['user_status']==2? "Activate":"DeActivate"?> Student</a></li>


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
   $("#mobile").change(function(){
      var id = $(this).val();
      window.location="<?=base_url("admin/viewstudents/")?>"+id;
   });
</script>

</body>

</html>
