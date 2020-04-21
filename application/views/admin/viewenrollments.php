<?php
function planname($plan)
{
  switch ($plan) {
    case 1:
      return "three months";
      break;
    case 2:
      return "";
      break;
    
    case 3:
      return "six months";
      break;
    case 4:
      return "";
      break;
      
    case 5:
      return "one year";
      break;
		 
	  case 7:
      return "three months(1/week)";
      break; 
		 
	  case 8:
      return "six months(1/week)";
      break;
		  
    case 9:
      return "one year(1/week)";
      break;
    default:
      # code...
      break;
  }
}
?>

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
.multiselect{
  width: 200% !important
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
</style>

<div class="content-wrapper">

   <!-- Dashboard content -->

   <div class="row">

      <div class="col-md-16 margin-0">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title ">View Enrollments</h5>

            </div>
                     <form method="get">
                      <div class="col-md-12" >
                      <?php if($this->session->userdata("user_type")==1){?>
                      <div class= "form-group col-md-3">
   
                          <select data-placeholder="select branch" class=" multiselect" name="branch_id[]" multiple="multiple" >

                                                

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
                
                 <div class="form-group  col-md-2">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                    <input type="text" class="form-control" id="datepicker2" class="datepicker1" name="start_date" placeholder="From Date" >
                  </div>
                </div>
                <div class="form-group  col-md-2">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                    <input type="text" class="form-control" id="datepicker1" class="datepicker2" name="end_date" placeholder="To Date" >
                  </div>
                </div>
                 

                         <div class=" form-group col-md-3">
   
                               <input  name="search"  type="submit" name="search" >
                     
                        </div>


            </div>
            </form>
            <div class="col-md-12">

            <div class="col-md-12" id="count"></div>
            <div class="col-md-12" id="description"></div>
           </div>

            <div class="col-md-12 margin-0 view">

	

								<div class="table-responsive">

            

               <table  id="example"  class="table text-nowrap display" style="width:100%">

                  <thead>

                     <tr>
                       
                        <th>S No</th>
                        <th>ID</th>
                        
                         
                        <th>User Name</th>

                        <th>Mobile</th>

                       
                         <th>Branch</th>

                         <th>Activities</th>
                         <th>Plan</th>
                         <th>Start Date</th>
                          <th>Amount Paid</th>

                         <th>Status</th>
                         <th>comments</th>


                        

                     </tr>
                  </thead>
                  

                  <tbody class="refar-price">
                     

  <?php 

/*echo "<pre>";
print_r($users);exit;*/

                if(!empty($enrollments)){
                                 $i=1;
                                    foreach ($enrollments as $branch_info) {?>
                                      
                      

                     <tr id="rows">
                     <!-- <td >
                      
                      <input type="button" id="submit" class="details-control" >+</div>
                    </td>-->

                        <td><div class=" text-muted text-size-small"><?=$i?></div></td>
                        <td> <div class=" text-muted text-size-small "><?=$branch_info['id']?></div> </td>
                     
                       
                        <td> <div class=" text-muted text-size-small"><?=$branch_info['name']?></div> </td>

                      

                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small "><?=$branch_info['mobile']?></div>
                     <input type="hidden" id="member_id" name="member_id" value="<?=$branch_info['member_id']?>"></div>

                     

                     </div> 

                     </td>

                     
                       

                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=($branch_info['branch_name'])?></div>

                     

                     </div> 

                     </td> 

                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['class_name']?></div>

                     

                     </div> 

                     </td>
                     
                      <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small" id="plan"<?php if($branch_info['plan']==1)?> ><?=planname($branch_info['plan'])?></div>

                     

                     </div> 

                     </td>
                     <td>

                     <div class="media-left">

                     <div class="text-muted text-size-small" id="date"><?=date('d-m-Y',strtotime($branch_info['start_date']))?></div>

                     

                     </div> 

                     </td>
                     <td>

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['final_amount']?></div>

                     

                     </div> 

                     </td>
                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['status']==1?"Active":"In Active"?></div>

                     

                     </div> 

                     </td> 
                      
                       <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['comments']?></div>

                     

                     </div> 

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
  $('input').datepicker(
    { dateFormat: 'dd-mm-yy' });
  
  var count="<?=$count?>";
var start = "<?=$start_date?>";
var end = "<?=$end_date?>";

//$('#description').text("Enrollments Between" + " " + start +" and " + end);
//$('#count').text("Total Enrollments : "+" "+ count);

</script>

<script type="text/javascript">
   $("#mobile").change(function(){
      var id = $(this).val();
      window.location="<?=base_url("admin/viewstudents/")?>"+id;
   });

  // $('#description').text("Enrollments Between" + " " + start +" and " + end);

</script>



