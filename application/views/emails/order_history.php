<?php include("template/header.php");?>
                  
                  <table bgcolor="#f1f1f1" align="center" cellspacing="0" cellpadding="0" border="0" style="width:600px">
                     <tbody>
                        <tr>
                           <td colspan="2" >
                             
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <table cellspacing="0" cellpadding="0" border="0" style="width:600px;">
                                 <tbody>
                                    <tr>
                                     <h2 class="hi">Hi <?=$user_name?></h2>
                                   <!--  <h1 class="inter">We got your back. Our Kitchen is now whipping up your order!. </h1> -->
                                      
                                    </tr>
							
                        
                                 </tbody>
                              </table>
							   <table cellspacing="0" cellpadding="0" class="item-table" border="0" style="width:600px;">
                                 <tbody>
                                    <tr>
                            <th width="60px">S No</th>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Price</th>
                                      
                                    </tr>
                                      <?php if(!empty($productslist)){
                                      	$i=1;
   		foreach ($productslist as $product_info) {
   	?>
   <tr>
   <td><?=$i?></td>
   <td><?=$product_info['product_name']?></td>
   <td><span><?=$product_info['quantity']?></span></td>
   <td>	<p><img src="<?=base_url('assets/images/rupee1.png')?>"><?=$product_info['amount']?> /-</p></td>
   </tr>
   	<?php $i++;} } 	?>
									
									
										<tr>
									<td></td>
									<td>SUB-TOTAL</td>
									<td><b>-</b></td>
									<td><p>₹ <?=$order['total_amount']?></p></td>
									</tr>
									<tr>
									<td></td>
									<td>DELIVERY CHARGE</td>
									<td><b>-</b></td>
									<td><p>₹ <?= $order['delivery_charges']?></p></td>
									</tr>
									<tr>
									<td></td>
									<td>COUPON DISCOUNT</td>
									<td><b>-</b></td>
									<td><p>₹ <?= $order['promo_amount']?></p></td>
									</tr>
									
									<tr>
									<td></td>
									<td>SERVICE TAX</td>
									<td><b>-</b></td>
									<td><p> ₹<?= $order['service_tax']?></p></td>
									</tr>
									<tr class="bold">
									<td></td>
									<td>TOTAL</td>
									<td><b>-</b></td>
									<td><p>₹<?= $order['final_amount']?></p></td>
									</tr>
									
									
                                 </tbody>
                              </table>
							  <div class="clear"></div>
							   <table cellspacing="0" cellpadding="0" border="0" style="width:600px; margin-top:10px;padding-top:10px; border-top:1px solid #333;">
                                 <tbody>
                                    <tr class="address">
									<td>
                                     <h2 class="hi">Delivery Address</h2>
                                    <h1 class="inter"><?=$address_info['landmark']?></h1>
                                    </td>  
                                    </tr>
							
                        
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
<?php include("template/footer.php");?>
                  