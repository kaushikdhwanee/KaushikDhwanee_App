

<!-- <script type="text/javascript" src="js/widgets.min.js"></script>

<script type="text/javascript" src="js/globalize.js"></script>

<script type="text/javascript" src="js/jqueryui_forms.js"></script> -->

<!-- Main content -->
<?php

function transport($trans)
{
  switch ($trans) {
    case 1:
      return "YES";
      break;
    case 2:
      return "NO";
      break;
	
        default:
      # code...
      break;
  }
}	

function distance($dist)
{
  switch ($dist) {
    case 1:
      return " (0-2 km)";
      break;
    case 2:
      return " (2-4 km)";
      break;
	
        default:
      return " ";
      break;
  }
}	  
		  
function paymentplan($plan)
{
  switch ($plan) {
    case 1:
      return "One Weeks";
      break;
    case 2:
      return "Two Weeks";
      break;
    
    case 3:
      return "Arts(3 weeks)";
      break;
    case 4:
      return "Tech(3 weeks)";
      break;
		  case 5:
      return "Arts + Tech(3 weeks)";
      break;
		  
		   case 6:
      return "Arts(4 weeks)";
      break;
		  
		   case 7:
      return "Arts(5 weeks)";
      break;
		  
		  case 8:
      return "Arts + Tech(4 weeks)";
      break;
		  
		  case 9:
      return "Arts + Tech(5 weeks)";
      break;
		  
		  case 10:
      return "Tech(4 weeks)";
      break;
		  
		  case 11:
      return "Tech(5 weeks)";
      break;
	
        default:
      # code...
      break;
  }
}
?>
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
</style>

<div class="content-wrapper">

   <!-- Dashboard content -->

   <div class="row">

      <div class="col-md-16 margin-0">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title ">View Student </h5>

            </div>
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
                                             <option value=""></option>
                                              <option value="<?=$cat_info['id']?>"<?=($this->input->get('branch_id'))==$cat_info['id']?"selected":""?>><?=$cat_info['branch_name']?></option> 
                                     <?php   }
                                       }
                                       ?>


                                                  
                                              </select>
                     
                        </div>
                        
                <div class=" col-md-3">
   
                               <select data-placeholder="Type mobile or Name" class="select box" name="user_id"  >
                                                <option value=""> Select Mobile</option> 

                                        <?php
                                       if(!empty($all_users))
                                       {
                                          foreach ($all_users as $cat_info) 
                                          {
                                             ?>
                                              <option value="<?=$cat_info['id']?>"<?=($this->input->get('user_id'))==$cat_info['id']?"selected":""?>><?=$cat_info['mobile']."(".$cat_info['name'].")"?></option> 
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

            <div class="col-md-12 margin-0 view">

	

								<div class="table-responsive">

            

               <table  id="example"  class="table text-nowrap display" style="width:100%">

                  <thead>

                     <tr>
                       
                        <th>S No</th>
                        
                        
                         
                        <th>Name</th>

                         <th>Mobile</th>
						 <th>Email</th>
						 <th>Address</th>
                         <th>Branch</th>

                         <th>Start Date</th>
                         <th>End Date</th>

                         <th>plan</th>
						 <th>Activity</th>
						 <th>Transport</th>
						
                       

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
                        
                     
                       
                        <td> <div class=" text-muted text-size-small"><?=$branch_info['name']?></div> 
						     
						 </td>

                      <td> <div class=" text-muted text-size-small"><?=$branch_info['mobile']?></div> 
						      
						 </td>

                     <td> <div class=" text-muted text-size-small"><?=$branch_info['email']?></div> 
						     
						 </td>

                      <td> <div class=" text-muted text-size-small"><?=$branch_info['address']?></div> 
						     
						 </td>

                      

                     <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['branch_name']?></div>

                     

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

                     <div class="text-muted text-size-small"><?=paymentplan($branch_info['plan'])?></div>

                     

                     </div> 

                     </td>
						 <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=$branch_info['activity']?></div>

                     

                     </div> 

                     </td>
						 <td> 

                     <div class="media-left">

                     <div class="text-muted text-size-small"><?=transport($branch_info['transport'])?><?=distance($branch_info['distance'])?></div>

                     

                     </div> 

                     </td>
                    
                      
                   <td class="text-center">

                          <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                                 

                                 <ul class="dropdown-menu dropdown-menu-right">

                                  

                                    <!--<li><a href="<?=base_url("admin/editcampstudent/".$branch_info['id'])?>"> Edit</a></li>-->
                                    
                                     <li><a href="<?=base_url("admin/extendedfee/".$branch_info['id'])?>"> add Extended fee</a></li>
                                     

                                <li><a  href="<?=base_url("admin/campstudentstatus/".$branch_info['id']."/".$branch_info['status'])?>" > <?=$branch_info['status']==2? "Activate":"DeActivate"?> Student</a></li>
									 <!--<li><a href="<?=base_url("admin/reciept/".$branch_info['id'])?>" > Reciept</a></li>-->

                                


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
/*$('tr#rows').each(function(i, row){

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
      window.location="<?=base_url("admin/viewcampstudents/")?>"+id;
   });
</script>



