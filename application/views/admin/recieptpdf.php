  <?php
 $month = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
?>

<?php
function paymentplan($plan)
{
  switch ($plan) {
    case 1:
      return "One Week";
      break;
    case 2:
      return "Two Weeks";
      break;
    
    case 3:
      return "Art (3 week)";
      break;
    case 4:
      return "Tech (3 week)";
      break;
	case 5:
      return "Art + Tech (3 week)";
      break;
		  
		  case 6:
      return "Art - 4 week";
      break;
	case 7:
      return "Art - 5 week";
      break;
	case 8:
      return "Art + Tech - 4 week";
      break;
		  
		  case 9:
      return "Art + Tech - 5 week";
      break;
	
	case 10:
      return "Tech - 4 week";
      break;
		  
		  case 11:
      return "Tech - 5 week";
      break;
		  
        default:
      # code...
      break;
  }
}

function trdistance($distance)
{
  switch ($distance) {
    case 1:
      return "0 - 2 KM";
      break;
    case 2:
      return "2 - 4 KM";
      break;
    
    	
        default:
      # code...
      break;
  }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Receipt template</title>
  <script>
  $(document).ready(function(){

    myFunction();
  })
function myFunction() {
        window.print();
    }

</script>  
    <style>
    @media print {
  .print_list {
    display: none;
  }
   @page { margin: 0; }
   body { margin: 1.6cm; }
}
    .invoice-box{
        max-width:600px;
        margin:auto;
        padding:5px;
		
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    .table-border1{
      border-collapse: collapse;
    width: 100%;
    }
    .table-border1 td, th {
    border: 2px solid #444;
    padding: 8px;
}

    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
 .data-ta{
        width:100%;
        line-height:inherit;
    }
    
 .data-ta td{
        padding:2px !important;
        vertical-align:middle;
    }
  .data-ta tr.information table td{
        padding-bottom:0px !important;
    }
    .invoice-box table tr.information table td{
        padding-bottom:15px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
.data-ta1{
text-align:right !important;
}
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
.link-social{
  margin:0px;
  padding:0px;
}
.link-social li{
    display: inline-block;
    padding-right: 12px;
    font-size: 12px;
    border-right: 2px solid #ccc;
}
	.list{margin-top: 10px;
    padding-top: 0;
    padding-bottom: 0;
    
}
.list li{
   padding-right: 10px;
    font-size: 10px;
    margin-top: 0;
    margin-bottom: 0;
    padding-bottom: 0;
    padding-top: 0;

    
    
}	
		
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0" autosize="1"style="border-bottom: 1px solid #efe9e9; overflow:wrap; min-width: 50%" >
            <tr>
                <td colspan="2" style="width:100%">
                    <table style="width:100%; border-bottom: 1px solid #efe9e9; overflow:wrap;min-width:50%;" autosize="1">
                        <tr>
                             <td style="width:25%;font-size:12px; line-height:18px;">
						
                            </td>
                             <td style="width:50%;text-align:center" class="text-center">
                                <img src="<?=base_url()."/assets/admin/images/"?>logo1.png" style="width:50%;max-width 350px;">
                            </td>
                            <td style="width:25%;font-size:12px; line-height:18px;">
							 
                              <!-- 1-111/4/3/38, Hanuman Nagar,</br>

Near Aparna Towers, Kondapur,</br>
Kothaguda, Hyderabad. -->
							  
                            </td>
                        </tr>
						
						<tr>
                            
                           <td colspan="3" style="text-align:center;" class="text-center">
                             <p style="font-size:13px; color: #000"><?=$payments['br_address']?></p>
                           </td>
                           
                        </tr>
						
                    </table>
                </td>
            </tr>
			<tr class="information">
			   <td colspan="2"><h4 style="font-size:18px; text-transform:uppercase; text-align:center; color:#444; background-color:#ccc; padding:5px; margin:0px;">Receipt</h4></td>
            </tr>

          <tr class="information">
			   <td style="width:50%"><h4 style="font-size:16px; margin:0px;">No: <b style="font-size:18px; font-weight:600; margin-left:4px;"><?=$payments['id']?></b></h4></td>
			   <td style="width:50%; text-align:right"><h4 style="font-size:14px; margin:0px;">Date: <?=date("d-m-Y",strtotime($payments['created_date']))?></h4></td>
            </tr>
			  <tr class="">
			    <td colspan="2">
				<table>
				  <tr>
				   <td style="width:30%">
				     <p style="font-size:12px; margin:0px; line-height:20px; ">Received With Thanks From:</p> 
				   </td>
				    <td style="width:70%">
				     <p style="font-size:15px; margin:0px; line-height:20px; text-align:center; border-bottom:1px dotted #ccc; "> <?=$payments['name']." (".$payments['mobile'].")" ?> </p> 
				   </td>
				  </tr>
				  <!-- <tr>
				  
				    <td  colspan="2" style="width:100%">
				     <p style="font-size:14px; margin:0px; line-height:20px; height:30px; text-align:center; border-bottom:1px dotted #ccc; "> </p> 
				   </td>
				  </tr>-->
				    <tr>
				  </tr>
				</table>
				<?php 
               /* echo "<pre>";
                print_r($payment_invoice);*/
                ?>
				</td>
            </tr>
			<tr>
			  <td colspan="2" class="text-center">
			     <table class="table-border1" style="width:100%; text-align:center; min-width:100%; overflow:auto;">
				    <tr>
                    <th>Student Id</th>
                    <th>Name</th>
					<th>Particulars</th>
					<th>Rs</th>
					<!-- <th>Ps</th> -->
					</tr>
                   
                    <tr>
                        <td style="margin:0px 10px; padding:0px;"><?=$payments['member_id']?></td>
                        <td style="margin:0px 10px; padding:0px;"><?=$payments['name']?></td>
                    <td>Summer Camp(<?=paymentplan($payments['plan'])?>)</td>
                    <td><?=$payments['course_fee']?>/-</td>
                    <!-- <td>---</td> -->
                    </tr>
					 
					  <?php if($payments['transport_fee']>0){ ?> 
					<tr>
                    <td colspan="3" style="text-align:right;"><p style="margin:0px 10px; padding:0px; font-size:16px; ">Transport Fee (<?=trdistance($payments['distance'])?>)</p></td>
                    
                    <td><?=$payments['transport_fee']?></td>
                    <!-- <td>---</td> -->
                    </tr>
                     <?php 
                        }
                    ?>
                    
                       <?php if($payments['admin_discount']>0){ ?> 
					<tr>
                    <td colspan="3" style="text-align:right;"><p style="margin:0px 10px; padding:0px; font-size:16px; ">Discount</p></td>
                    
                    <td><?=$payments['admin_discount']?></td>
                    <!-- <td>---</td> -->
                    </tr>
                     <?php 
                        }
                    ?>
					 
					 <tr>
                    <td colspan="3" style="text-align:right"><p style="margin:0px 10px; padding:0px; font-size:16px; ">Total</p></td>
                    
					<td><?=$payments['final_amount']?>/-</td>
					<!-- <td>---</td> -->
					</tr>
					
				 </table>
			  </td>
			</tr>

             <?php if(!empty($payments['comments'])){?>
<tr class="information">
               <td>
                  <p style="padding:0px; margin:0px; font-size:15px;">Final Notes:</p>
               </td>
               <td style="text-align:right;">
                <b><?=$payments['comments']?></b>
               </td>
            </tr>
          <?php }?>
<tr class="information">
	<td>
                  <p style="padding:0px; margin:0px; font-size:15px;">SummerCamp Timings:</p>
               </td>
	<td style="text-align:right;">
                <b><?=$payments['time']?></b>
               </td>
            </tr>
           <tr class="information">
			   <td>
			      <p style="padding:0px; margin:0px; font-size:16px;">By Cash/Cheque/D.D.No:</p>
			   </td>
			   <td style="text-align:right;">
			     <h7 style="margin:0px; padding:0px; font-size:16px; line-height:24px;"> For Kaushik Dhwanee</h7>
				 <!-- <p style="margin:0px; padding:0px; font-size:13px; font-weight:600; line-height:18px;">a Combridge School</p> -->
				 <p style="margin:0px; padding:0px; font-size:13px; line-height:18px;">Authorised Signotary</p>
			   </td>
            </tr>
			<tr class="information">
               <td style="border-top: 1px solid #ccc;">
                  <p style="padding:0px; margin:0px; font-size:13px; font-weight:bold;">call: <?=$payments['br_mobile']?></p></td>
                 </tr>
			   <tr class="information" style="border-top:1px solid #ccc;">
			   <td colspan="3" style="border-top: 1px solid #ccc;">
			      
				  
				  <ul class="link-social">
				  
<li>Email:Kaushikdhwanee@gmail.com </li>

<li>www.facebook.com/kaushidhwanee</li>

<li style="border:none !important;">www.kaushikdhwanee.com</li>
				  </ul>
			   </td>
			  
            </tr>
		
		</table>
        <hr>
        <div>
        <!--<div>Guidelines</div>
        <ul class="list" type="1"> 
                  
<li>The duration of each class will be 45 minutes to 1 hour depending on student’s learning ability </li>

<li>Students shall finish taking all the classes for their chosen package within the stipulated time-frame. For 3 months package, 1
week grace period will be provided, for 6 months package, 2 weeks grace period will be provided and so on (prior approval from
the admin for this grace period is a must)</li>

<li>After completion of your fees term, fees for the next term shall be paid within one week of starting of the term. Late fees of
Rs.100/- will be charged per day afterwards.</li>
<li style="border:none !important;">For many classes at KaushikDhwanee, slots are allotted to the students based on the availability. If you are assigned a slot and
would like to retain that slot, you shall inform the Admin prior to the completion of your fee term.</li>
<li style="border:none !important;">Students shall reach KaushikDhwanee 5 to 10 minutes prior to their class time. If parents are picking up their children, they shall
arrive on time for pick up (no later than 8 minutes past the class end time)</li>
<li style="border:none !important;">If the school cancels any class, then wherever possible the student will be asked to attend classes on alternative days to make up for the lost day(s).</li>
<li style="border:none !important;">If no such possibility (as mentioned above) exists only then the fees will be adjusted on a pro-rated basis.</li>
<li style="border:none !important;">We encourage students to make up any missed classes depending on the teacher's availability and consent.</li>
<li style="border:none !important;">The school will observe all national holidays and other important holidays and the regional festivals in the year. School will also give holiday to the regular classes whenever school’s concerts are held. No pro-rated fee reduction or any make up classes will be offered in these scenarios.</li>
<li style="border:none !important;">In the art classes, KaushikDhwanee will provide all the material needed for the course; however all the work done by the student will be owned by KaushikDhwanee. If a student wishes to take their work home, they shall bring their own material.</li>
<li style="border:none !important;">There will be no refund for any reason whatsoever.</li>
                  </ul>
    </div>-->
    </div>
    <div align="center" class="print_list">


</div>
</body>

</html>


