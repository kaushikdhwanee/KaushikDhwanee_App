<style>
	.table-responsive {
   width:100%;
    overflow-x: auto !important;
   
}
.refar-price [class*="text-size-small"]{
  font-size:13.5px !important;
}
  .nav-tab li{
  display:inline-block;
   font-size:16px;
   color:#444;
  }

.nav-tab li a{
   padding:9px 20px;
}
.nav-tab li:hover{
    background-color: #2196F3;
 color:#fff !important;
}
 .nav-tab li.active a{
 background-color: #2196F3;
 color:#fff !important;
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
	.getreciept{
    background-color:green;
    padding:10px !important;
 }
	.table>tbody>tr>td,.table>thead>tr>td{
		padding:12px 14px !important;
	}
</style>

<!-- <script type="text/javascript" src="js/widgets.min.js"></script>

<script type="text/javascript" src="js/globalize.js"></script>

<script type="text/javascript" src="js/jqueryui_forms.js"></script> -->

<!-- Main content -->

<div class="content-wrapper">

   <!-- Dashboard content -->

   <div class="row">

      <div class="col-lg-16">

       <ul class="nav nav-tab">

       <li  class="<?= in_array($this->uri->segment(2),array("collectfees"))? "active" : ""  ?>"> <a href="<?=base_url("admin/collectfees/")?>">Collect Fees </a></li>
            <li  class="<?= in_array($this->uri->segment(2),array("viewpendingpayments"))? "active" : ""  ?>"><a href="<?=base_url("admin/viewpendingpayments")?>">Pending Payments</a></li>

            <li  class="<?= in_array($this->uri->segment(2),array("payfeeadvance"))? "active" : ""  ?>"><a href="<?=base_url("admin/payfeeadvance")?>">Advance Payments</a></li>
          
      </ul>

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">View Pending Payments</h5>

            </div>
                     <form method="get">
                      <div class="col-md-16" >

                
   
                               <?php if($this->session->userdata("user_type")==1){?>
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
                         <?php }?>
                        

                        <div class=" col-md-3">
   
                               <select data-placeholder="Select Month" class="select box" name="month"  >
                                                <option value=""> Select Month</option> 

                                        <?php
                                       
                                            for ($i=0; $i <=2 ; $i++) 
                                            { 
                                             ?>
                                              <option value="<?=date("m-Y",strtotime("-".$i." month", strtotime('now')))?>" <?=@($this->input->get('month')==date("m-Y",strtotime("-".$i." month", strtotime('now'))))?"selected":""?>> <?=date("M-Y",strtotime("-".$i." month", strtotime('now')))?></option> 
                                     <?php   }
                                       ?>


                                                  
                                              </select>
                     
                        </div> 

                        <div class=" col-md-4">
   
                               <input  name="search"  type="submit" name="search" >
                     
                        </div> 


            </div>
            </form>

            <div class="col-md-12" style="margin-top:80px;">

	

								<div class="tabbable">

								

									<div class="tab-content">

										<div class="tab-pane active" id="solid-tab1">

										     

               <div class="clearfix"></div>

			   <div class="table-responsive">

            

               <table  id="example"  class="table text-nowrap">

                  <thead>

                     <tr>

                        <th>S No</th>

            
                        <th>Student Name</th>

                         <th>Branch Name</th>

                        <th>Class Name</th>



                        <th>Invoice Date</th>


                        

                        <th> Amount Due</th>


                        <!-- <th>Action</th>

            <th>Amount Paying</th> -->

                     </tr>

                  </thead>

                  <tbody class="refar-price">


                     <?php 
                    /*echo "<pre>";
                     print_r($invoice); exit;*/
                     $month = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
                     $total_amount =0;
                     $total_amount_paid =0;
                     $total_amount_due =0;
                    /* $days = array('1'=>'Mon','2'=>'Tue','3'=>'Wed','4'=>'Thu','5'=>'Fri','6'=>'Sat','7'=>'Sun');
                     
                     

                     
                     if(!empty($batches)){*/
                      $i=1;
                      if(!empty($invoice)){
                      foreach ($invoice as $value) {
                        
                      
                      ?>

                    
                     <tr>

                        <td><p class="no-margin"><?=$i?></p></td>
                        
                        <td><p class="no-margin" style="font-size:14px;width:110px"><a href="<?=base_url("admin/studentfees/".$value['member_id'])?>"><?=$value['name']?></a></p></td>

                        <td>  <div class="text-muted text-size-small"> <?=$value['branch_name']?></div> 


                        <td>  <div class="text-muted text-size-small" style="width:70px"> <?=$value['class_name']?></div> 

            </td>

             <td>  <div class="text-muted text-size-small"> <?=date('d-m-Y',strtotime($value['end_date']))?></div> 

            </td>             

                       <td> 

             <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$value['course_fee']?></div> 

            </td>
			<td><button class="btn receipt" id="reciept">reciept</button>
             <input type="hidden" value="<?=$value['user_id']?>" class="abc">
             </td>
             <td class="getreciept" style="display:none">
             <table class="table text-nowrap">

                  <thead>

                     <tr>

                        <th>S No</th>

						<th>Date</th>

                        <th>Receipt No</th>

                        <th>Amount</th>

						<th>Mode</th>

                        <th>Action</th> 
                        <th><button class="btn-danger delete">X</button></th>

                     </tr>

                  </thead>

                  <tbody class="refar-price results">
                    <tr><td>No results found</td></tr>
                  </tbody>

               </table>
             </td>

             

              
                       

                       

                        <!-- <td class="text-center">

                          <div class="checkbox">

                    <label>

                      <input type="checkbox" <?=($value['final_amount']-$value['paid_amount'])==0?"disabled":""?>  data="<?=$i?>" class="styled check" data-id="<?=$value['balance_amount']?>" >

                    

                    </label>

            </div>

                        </td>

            <td>

               <input type="text" class="form-control payable_amount" id="abcd<?=$i?>" name="payable_amount[<?=$value['invoice_id']?>]"  disabled="disabled" />
               <input type="hidden" name="invoice[<?=$value['invoice_id']?>]" value="<?=$value['invoice_id']?>">
               <input type="hidden" name="enroll_student_id[<?=$value['invoice_id']?>]" value="<?=$value['id']?>">

              </td> -->

                     </tr>
					 

                      <?php $i++;
                      $total_amount +=$value['final_amount'];
                      $total_amount_paid +=$value['paid_amount'];
                      $total_amount_due +=($value['final_amount']-$value['paid_amount']);

                      }}else{ echo "<tr><td> NO Pending dues </td></tr>";}?>

                

         

           <tr>

              <td colspan="5"><div class="text-muted text-size-small text-center"><b>TOTAL</b></div></td>

             <td >  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$total_amount?></div> </td>
             

           <!--   <td>  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i><span id="total_amount_display"></span> </div> </td> -->

           </tr>

           <!--  <tr>

              <td colspan="5">

            <div class="text-muted text-size-small">

                  <div class="input-group">

                      <input type="text" class="form-control" id="admin_discount" name="admin_discount" placeholder="Enter Discount">

                      <span class="input-group-btn">

                        <button class="btn btn-default black legitRipple" id="apply" type="button">Apply</button>

                      </span>

                </div>

            </div>

            </td>

             <td>

              <i class="fa fa-minus" aria-hidden="true"></i> 

              </td>

             

             <td>  <div class="text-muted text-size-small"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="admin_discount_amount"></span></div> </td>

           </tr>

           

            <tr>

              <td colspan="5"><div class="text-muted text-size-small text-center"><b>GRAND TOTAL</b></div></td>

             <td colspan="3">  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$total_amount?></div> </td>

             <td>  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <span id="final_amount_display"></span></div> </td>

           </tr>-->
           </tbody>

               </table>

            </div>

			

			   

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

<script type="text/javascript">
   $("#mobile").change(function(){
      var branch = $("#branch").val();
      var month = $(this).val();
      if(branch!="" )
      window.location="<?=base_url("admin/viewpendingpayments/")?>"+branch+"/"+month;
   });
	
	$(".receipt").click(function(){
      var row= $(this).closest('tr');
      var id = row.find('.abc').val();
        
        $.ajax({
           type:"post",
           url:"<?=base_url('admin/getreceipts')?>",
           data:{id:id},
           success: function(message){

            $('td.getreciept').not(row.find('.getreciept')).hide();
              row.find('.getreciept').show();
              $(".results").html(message);
                    
           }
        });
        $(".delete").click(function(){
        // var row= $(this).closest('tr');
         row.find('td.getreciept').hide();
          });

          });

</script>




