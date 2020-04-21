<?php include("template/header.php");?>
                  <table bgcolor="#f1f1f1" align="center" cellspacing="0" cellpadding="0" border="0" style="width:100%;padding-top:15px;padding-left:10px;">
                     <tbody>
                        <tr>
                           <td colspan="2" >
                             
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
                                 <tbody>
                                    <tr>
                                     <h2 class="hi">Hi <?=$username?>,</h2>
                                    <p class="inter"> <?=$message?></p>
                                     <?php

                                     if(isset($receipt) && !empty($receipt))
                                     {?>
                                      <h1 class="inter"><a href="<?=$receipt?>">print receipt</a></h1>
                                     <?php }

                                     ?> 
                                    </tr>
							
                        
                                 </tbody>
                              </table>
							 </td>
                        </tr>
                     </tbody>
                  </table>
<?php include("template/footer.php");?>