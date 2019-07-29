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
                                     <h2 class="hi">Hi <?=$username?>,</h2>
                                   <!--  <h1 class="inter"> <?=$message?></h1> -->
                                     <h1 class="inter"> Welcome to KaushikDhwanee! Payment of Rs <?=$amount?> has been made successfully on <?=date("d-m-Y",strtotime($date))?> at <?=date("h:i A",strtotime($date))?></h1>

 
 <h1 class="inter"> 
To enroll for your chosen activity or activities, please visit your chosen kaushikdhwanee learning center.
</h1>
 
 <h1 class="inter"> 
For any questions/queries please reach us via below mentioned contact info.
</h1>
  <h1 class="inter"> 

Thank you.
<br>
 

KaushikDhwanee Admin
<br>
Cell: 9989268453
<br>
Whatsapp: 8639697735
<br>
Email: kaushikdhwanee@gmail.com
<br>
 

www.kaushikdhwanee.com
<br>
</h1>                                     <?php

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
                  