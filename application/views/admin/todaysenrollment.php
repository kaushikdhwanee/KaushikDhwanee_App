<?php
function planname($plan)
{
  switch ($plan) {
    case 1:
      return "3 months";
      break;
    case 2:
      return "";
      break;
    
    case 3:
      return "6 months";
      break;
    case 4:
      return "";
      break;
      
    case 5:
      return "1 year";
      break;
		  
		  case 7:
      return "3 months(1/wk)";
      break;
		  
		  case 8:
      return "6 months(1/wk)";
      break;
		  
		  case 9:
      return "1 year(1/wk)";
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

               <h5 class="panel-title ">Today's Enrollments</h5>

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
                         
                
                 

                         <div class=" form-group col-md-3">
   
                               <input  name="search"  type="submit" name="search" >
                     
                        </div>

<?php }?>
            </div>
            </form>

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
                        <th>Action</th>

                     </tr>
                  </thead>
                  

                  <tbody class="refar-price">
                     

  <?php 

/*echo "<pre>";
print_r($users);exit;*/

                if(!empty($enrollment)){
                                 $i=1;
                                    foreach ($enrollment as $branch_info) {?>
                                      
                      

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

                     <div class="text-muted text-size-small"><?=date('d-m-Y',strtotime($branch_info['start_date']))?></div>

                     

                     </div> 

                     </td>
                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['final_amount']?></div>

                     

                     </div> 

                     </td> 
                      
                        <td class="text-center">

                          <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                                 

                                 <ul class="dropdown-menu dropdown-menu-right">

                                   <!-- <li><a href="<?=base_url("admin/addenroll/".$branch_info['member_id'])?>"> add New Class</a></li>-->

                                    <!--<li><a href="<?=$branch_info['type']==1?base_url("admin/editstudent/".$branch_info['member_id']):base_url("admin/editfamilymember/".$branch_info['member_id'])?>"> Edit</a></li>-->
                                    
                                     
                                     <li><a href="<?=base_url("admin/editclassenroll/".$branch_info['id'])?>" > Edit class</a></l>

                                 
                                 <li><a href="<?=base_url("admin/enterattendence/".$branch_info['id'])?>" > Enter
                                  Attendence</a></li>

                                 <!-- <li><a  href="<?=base_url("admin/updatestudentstatus/".$branch_info['member_id']."/".$branch_info['user_status'])?>" > <?=$branch_info['user_status']==2? "Activate":"DeActivate"?> Student</a></li>-->


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
/*$("#datepicker1").datepicker().datepicker("setDate", new Date());
var lastDate=new Date(); 
lastDate.setDate(lastDate.getDate() - 7);
$("#datepicker2").datepicker().datepicker("setDate", lastDate);*/

/*$('tr#rows').each(function(i, row){
]
var $row = $(row);
 member_id = $row.find('td #member_id').val();
if(member_id!="")
        {
          
        $.ajax({
            type:"post",
            url:"<?=base_url('admin/viewstudentsbymember')?>",
            data:{member_id:member_id},
            success: function(message){
              var resp = JSON.parse(message);
              if(resp.success==1)
              { 
                
              $.each(resp.enrolls, function(index,value){
                
        
                
             
              $row.after('<tr child"><td <div class="studentid">'+value.attendence_id+'</div></td><td class="col-md-4">'
                +value.class_name+'</td><td class="col-md-4">'
                +value.original_start_date+'</td><td>'
                +value.start_date+'</td><td>'
                +value.end_date+'</td><td>'
                +value.total_sessions+'</td></tr>')

                     
                        

        
            })
                
    
        
      
        
        
   
  
}
          }
        });
      }
      })


/*$(document).ready(function() {
    

$('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');

        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );

});*/
</script>

<script type="text/javascript">
   $("#mobile").change(function(){
      var id = $(this).val();
      window.location="<?=base_url("admin/viewstudents/")?>"+id;
   });

   

</script>



