<?php
 $month = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
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
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="2" style="width:100%">
                    <table style="width:100%; border-bottom: 1px solid #efe9e9;">
                        <tr>
                             <td style="width:33%; text-align:left; font-size:12px; line-height:18px;">
							 
                             House Number 7-1/45 </br>
Nallagandla HUDA, </br>
Behind Kitsons, </br>
Serilingampally, Hyderabad-19 </br>
							  
                            </td>
                             <td style="width:33%" class="title">
                                <img src="<?=base_url()."/assets/admin/images/"?>kaushikdhwaneelogo.png" style="width:100%; max-width:200px;">
                            </td>
                            <td style="width:33%; text-align:right; font-size:12px; line-height:18px;">
							 
                              <!-- 1-111/4/3/38, Hanuman Nagar,</br>

Near Aparna Towers, Kondapur,</br>
Kothaguda, Hyderabad. -->
							  
                            </td>
                        </tr>
						
						<tr>
						   <td colspan="3">
						     <p style="font-size:12px; margin:0px;">Plot No.41/c, C-Block, Lane Opp Chirec Public
School, Sri Ramnagar, Kondapur, Hyderabad-500084</p>
						   </td>
						</tr>
						
                    </table>
                </td>
            </tr>
			<tr class="information">
			   <td colspan="2"><h4 style="font-size:18px; text-transform:uppercase; text-align:center; color:#444; background-color:#ccc; padding:5px; margin:0px;">Receipt</h4></td>
            </tr>

          <tr class="information">
			   <td style="width:50%"><h4 style="font-size:16px; margin:0px;">No: <b style="font-size:20px; font-weight:600; margin-left:4px;"><?=$payments['id']?></b></h4></td>
			   <td style="width:50%"><h4 style="font-size:14px; margin:0px;">Date: <?=date("d-m-Y",strtotime($payments['created_date']))?></h4></td>
            </tr>
			  <tr class="">
			    <td colspan="2">
				<table>
				  <tr>
				   <td style="width:40%">
				     <h6 style="font-size:14px; margin:0px; line-height:20px; ">Received With Thanks From</h6> 
				   </td>
				    <td style="width:60%">
				     <h6 style="font-size:14px; margin:0px; line-height:20px; text-align:center; border-bottom:1px dotted #ccc; "> <?=$payments['name']."(".$payments['mobile'].") with unique id ".$payments['attendence_id']."" ?> </h6> 
				   </td>
				  </tr>
				   <tr>
				  
				    <td  colspan="2" style="width:100%">
				     <h6 style="font-size:14px; margin:0px; line-height:20px; height:30px; text-align:center; border-bottom:1px dotted #ccc; "> </h6> 
				   </td>
				  </tr>
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
			  <td colspan="2">
			     <table class="table-border1" style="width:100%;">
				    <tr>
					
					<th>Particulars</th>
					<th>Rs</th>
					<!-- <th>Ps</th> -->
					</tr>
                    <?php if(!empty($payment_invoice)){
                        foreach ($payment_invoice as $key => $value) {
                           
                        ?>
                    <tr>
                    <td style="height:50px;"><?=(!empty($value['invoice_month']) && !empty($value['invoice_year'])?$value['name']." ".$month[$value['invoice_month']]."'".date("y",strtotime($value['invoice_year']))."-".$value['class_name']:"Registration Amount")?></td>
                    <td><?=$value['amount']?>/-</td>
                    <!-- <td>---</td> -->
                    </tr>
                    <?php 
                        }
                    }?> 
                       <?php if($payments['admin_discount']>0){ ?> 
					<tr>
                    <td style="text-align:right"><h6 style="margin:0px 10px; padding:0px; font-size:16px; ">Discount</h6></td>
                    <td><?=($payments['discount_type']==1)?$payments['admin_discount']."%":$payments['admin_discount']?></td>
                    <!-- <td>---</td> -->
                    </tr>
                     <?php 
                        }
                    ?>
					 <tr>
					<td style="text-align:right"><h6 style="margin:0px 10px; padding:0px; font-size:16px; ">Total</h6></td>
					<td><?=$payments['final_amount']?>/-</td>
					<!-- <td>---</td> -->
					</tr>
					
				 </table>
			  </td>
			</tr>

             <?php if(!empty($payments['comments'])){?>
<tr class="information">
               <td>
                  <h6 style="padding:0px; margin:0px; font-size:16px;">Final Notes</h6>
               </td>
               <td style="text-align:right;">
                <b><?=$payments['comments']?></b>
               </td>
            </tr>
          <?php }?>

           <tr class="information">
			   <td>
			      <h6 style="padding:0px; margin:0px; font-size:16px;">By Cash/Cheque/D.D.No:</h6>
			   </td>
			   <td style="text-align:right;">
			     <h6 style="margin:0px; padding:0px; font-size:18px; line-height:24px;"> For Kaushik Dhwanee</h6>
				 <!-- <p style="margin:0px; padding:0px; font-size:13px; font-weight:600; line-height:18px;">a Combridge School</p> -->
				 <h5></h5>
				 <p style="margin:0px; padding:0px; font-size:13px; font-weight:600; line-height:18px;">Authorised Signotary</p>
			   </td>
            </tr>
			
			   <tr class="information" style="border-top:1px solid #ccc;">
			   <td colspan="2" style="border-top: 1px solid #ccc;">
			      <h6 style="padding:0px; margin:0px; font-size:14px;">Cell:9989268453, 8790423038</h6>
				  
				  <ul class="link-social">
				  
<li>Email: Kaushikdhwanee@gmail.com </li>

<li>www.facebook.com/kaushidhwanee</li>

<li style="border:none !important;">www.kaushikdhwanee.com</li>
				  </ul>
			   </td>
			  
            </tr>
		
		</table>
    </div>
</body>
</html>
<div align="center" class="print_list">
<button onclick="myFunction()" >Print</button>
</div>

