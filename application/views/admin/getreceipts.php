<?php
function payment_type($status)
{
   switch ($status) {
      case 1:
         echo "Cash";
         break;
      case 2:
         echo "Credit Card/ Debit Card";
         break;
      case 3:
         echo "NEFT";//ready to dispatch
         break;
      case 4:
         echo "Cheque";//On the way
         break;
      case 5:
      echo "PayTm";
      break;
        
      default:
         # code...
         break;
   }
   # code...
}
                   if(!empty($results)){
                                 $i=1;

                        foreach ($results as $result_info) {?>
<tr>


                        <td class="text-center"><h6 class="no-margin"><?=$i?> </h6></td>

                        <td> <div class="media-left">

													<div class=""><a href="#" class="text-default text-semibold"><?=date("d-m-Y",strtotime($result_info['created_date']))?></a></div>

													<div class="text-muted text-size-smalls">

														<span class="status-mark border-danger position-left"></span>

													 <?=date("h:i A",strtotime($result_info['created_date']))?>

													</div>

												

												</div></td>

						   <td> 

					   <div class="text-muted text-size-small"> <?=$result_info['id']?></div> 

					   

					   </td>

                       <td> 

					   <div class="text-muted text-size-small"><i class="fa fa-inr" aria-hidden="true"></i> <?=$result_info['final_amount']?></div> 

					   </td>

                        

					    <td> 

					   <div class="text-muted text-size-small"> <?=payment_type($result_info['payment_type'])?></div> 

					   </td>

                     <td> 

                  <div class="text-muted text-size-small"><a href="<?=base_url("admin/printreceipt/").$result_info['id']?>"> Print</a></div> 

                  </td>   

                        <!-- <td class="text-center">

                            

                           <ul class="icons-list">

                              <li class="dropdown">

                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                                 <ul class="dropdown-menu dropdown-menu-right">

                                    <li><a href="#"><i class="fa fa-eye text-success-600"></i>View</a></li>

									<li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>Resend Email</a></li>

									<li><a href="#"><i class="fa fa-print" aria-hidden="true"></i>Reprint</a></li>

                                    <li><a href="#"><i class="fa fa-times text-violet-600"></i>Deactive</a></li>

                                 </ul>

                              </li>

                           </ul>

                      

                        </td> -->

                     

</tr>
<?php
$i++;
}}else{
	echo "<tr><td>No results found</td></tr>";
}
?>