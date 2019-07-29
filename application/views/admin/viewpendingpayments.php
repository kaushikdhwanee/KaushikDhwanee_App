<style>
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
</style>

<!-- <script type="text/javascript" src="js/widgets.min.js"></script>

<script type="text/javascript" src="js/globalize.js"></script>

<script type="text/javascript" src="js/jqueryui_forms.js"></script> -->

<!-- Main content -->

<div class="content-wrapper">

   <!-- Dashboard content -->

   <div class="row">

      <div class="col-lg-12">

       <ul class="nav nav-tab">

       <li  class="<?= in_array($this->uri->segment(2),array("collectfees"))? "active" : ""  ?>"> <a href="<?=base_url("admin/collectfees/")?>">Collect Fees </a></li>
            <li  class="<?= in_array($this->uri->segment(2),array("viewpendingpayments"))? "active" : ""  ?>"><a href="<?=base_url("admin/viewpendingpayments")?>">Pending Payments</a></li>

            <li  class="<?= in_array($this->uri->segment(2),array("payfeeadvance"))? "active" : ""  ?>"><a href="<?=base_url("admin/payfeeadvance")?>">Monthly Payments</a></li>
          
      </ul>

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">View Payments</h5>

            </div>
                     <form method="get">
                      <div class="col-md-12" >

                <div class=" col-md-4">
   
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
                     
                        </div> 

                        <div class=" col-md-4">
   
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

            <div class="col-md-12 margin-0">

	

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



                        <th>Invoice Month</th>


                        <th> Total Amount</th>

                        <th> Amount Paid</th>

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

                        <td class="text-center"><h6 class="no-margin"><?=$i?></h6></td>
                        
                        <td class="text-center"><h6 class="no-margin"><?=$value['name']?></h6></td>

                        <td>  <div class="text-muted text-size-small"> <?=$value['branch_name']?></div> 


                        <td>  <div class="text-muted text-size-small"> <?=$value['class_name']?></div> 

            </td>

             <td>  <div class="text-muted text-size-small"> <?=$month[$value['invoice_month']]."-".$value['invoice_year']?><?=(!empty($value['comments'])?"(".$value['comments'].")":"")?></div> 

            </td>             

                       <td> 

             <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$value['final_amount']?></div> 

            </td>

             <td> 

             <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$value['paid_amount']?></div> 

             </td>

              <td> 

             <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$value['balance_amount']?></div> 

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
             <td >  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$total_amount_paid?></div> </td>

             <td colspan="2">  <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$total_amount_due?></div> </td>

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
</script>

</body>

</html>



