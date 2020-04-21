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
.refar-price [class*="text-size-small"]{
  font-size:13px !important;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
  padding:12px 10px !important;
}
	.bottom{
		margin-bottom:100px;
	}
</style>

<div class="content-wrapper">

   <!-- Dashboard content -->

   <div class="row">

      <div class="col-lg-12">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">View Attendance</h5>

            </div>
                     <form class="bottom" method="get">
                      <div class="col-md-12" >

                      <!--<div class=" col-md-3">
   
                               <select data-placeholder="Select Branch" class="select box" name="branch_id" >

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
                     
                        </div>-->

                <div class=" col-md-5">
   
                               <select data-placeholder="Type mobile or Name" class="select box" name="user_id"  ><!-- id="mobile" -->
                                                <option value=""> Select Mobile</option> 

                                        <?php
                                       if(!empty($all_users))
                                       {
                                          foreach ($all_users as $cat_info) 
                                          {
                                             ?>
                                              <option value="<?=$cat_info['member_id']?>"<?=($this->input->get('user_id'))==$cat_info['member_id']?"selected":""?>><?=$cat_info['mobile']." (".$cat_info['name'].")"?></option> 
                                     <?php   }
                                       }
                                       ?>


                                                  
                                              </select>
                     
                        </div> 

                <!-- <div class=" col-md-3">
   
                <select  class="select box" name="status"  >
                  <option value=""> Select Status</option> 

          
                <option value="1" <?=($this->input->get('status'))==1?"selected":""?> >Active</option> 
                <option value="2" <?=($this->input->get('status'))==2?"selected":""?> >In Active</option> 
       

                    
                </select>
                     
                        </div>    -->      

               <div class=" col-md-3">

                     <input  name="search"  type="submit" name="search" >
           
              </div>


            </div>
            </form>

            <div class="col-md-12 margin-0">

	

								<div class="table-responsive">

            

               <table  id="example"  class="table text-nowrap">

                  <thead>

                     <tr>

                        <th>S No</th>

                        <!-- <th>Profile Pic</th> -->

                        <th>Class Name</th>
                        <th>Attendance</th>
                        <th></th>


                     </tr>

                  </thead>

                  <tbody class="refar-price">
                     

  <?php 

/*echo "<pre>";
print_r($users);exit;*/

//if(!empty($_GET['branch_id'])){
  if(!empty($users)){

                                 $i=1;
                                    foreach ($users as $branch_info) {?>
                     <tr>

                        <td><h6 class="no-margin"><?=$i?></h6></td>

                      <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['class_name']?></div>

                     

                     </div> 
                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['attendance']?></div>

                     

                     </div> 

                     </td>
                     <td>
                       <div class="calendar"><a href="<?=base_url('admin/attendance_calendar/'.$branch_info['id'])?>"><i class="fa fa-calendar icon-clr"></i></a></div>
                     </td>
                     

                     

                     </tr>

                     <?php $i++;}
                                 }else{
                                    echo "<tr><td>No results found</td></tr>" ;  
                                 }
                                

//} 
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


<script>
  $(document).ready(function(){
    $(".calendar").click(function(){
      //alert("hai");
    $(inputselector).daterangepicker('show');
    });
  });
  
</script>

</body>

</html>



