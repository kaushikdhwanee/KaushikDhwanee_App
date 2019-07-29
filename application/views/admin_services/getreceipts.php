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
         echo "NEFT";
         break;
      case 4:
         echo "Cheque";
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
                               

                        foreach ($results as $result_info) {?>
<tr>


                                       <td><a href="#regstNo" id="txt-line-remve" data-toggle="modal"> <?=date("d-m-Y",strtotime($result_info['created_date']))?><br><span style="color:rgb(179,179,179);"> <?=date("h:i A",strtotime($result_info['created_date']))?></span></a></td>
                                       <td><?=$result_info['id']?></td>
                                       <td><i class="fa fa-rupee"></i>&nbsp;<?=$result_info['final_amount']?></td>
                                       <td><?=payment_type($result_info['payment_type'])?></td>

                       

                     

</tr>
<?php
}}else{
	echo "<tr><td>No results found</td></tr>";
}
?>