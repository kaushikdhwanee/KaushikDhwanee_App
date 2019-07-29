<div class="content-wrapper">

   <div class="row">

      <div class="col-lg-12">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">view Receipt</h5>

          

            </div>

           <div class="col-md-5 col-md-offset-4" >

                  <div class="form-group">

                     <select  class="select box" name="user_id"  id="mobile">
                                                <option value=""> Select Mobile</option>

                                        <?php
                                       if(!empty($users))
                                       {
                                          foreach ($users as $cat_info) 
                                          {
                                             ?>
                                              
                                              <option value="<?=$cat_info['id']?>"><?=$cat_info['mobile']."(".$cat_info['name'].")"?></option> 
                                     <?php   }
                                       }
                                       ?>


                                                  
                                              </select>

                  </div>

                  <!--  <div class="form-group">

                   <select  class="select box" name="member_id" id="members">
                                                <option value=""> Select User</option>

                                       


                                                  
                                              </select>

                  </div> -->

               </div>

			   

               <div class="clearfix"></div>

			   

			  <!--  <div class="cont-tables">

			     <ul>

				   <li><img src="images/face12.jpg"/></li>

				   <li><p>Santhi Kumari</p></li>

				   <li><p>9934549454</p></li>

				 </ul>

			   </div> -->

			    <div class="clearfix"></div>

			     <div class="table-responsive">

            

               <table class="table text-nowrap">

                  <thead>

                     <tr>

                        <th>S No</th>

						            <th>Date & Time</th>

                        <th>Receipt No</th>

                        <th>Amount</th>

						            <th>Mode</th>

                        <th>Acction</th> 

                     </tr>

                  </thead>

                  <tbody class="refar-price results">
                    <tr><td>No results found</td></tr>
                  </tbody>

               </table>

            </div>

			<div class="clearfix"></div>

         </div>

      </div>

      <div class="col-lg-3">


      </div>

   </div>

</div>

<!-- /main content -->

</div>

</div>




</body>

</html>


<script>

   $(document).ready(function(){

    $("#mobile").change(function(){
         var id = $(this).val();
        
         $.ajax({
            type:"post",
            url:"<?=base_url('admin/getreceipts')?>",
            data:{id:id},
            success: function(message){
               $(".results").html(message);
                     
            }
         });
         
      });
      
      /*$("#mobile").change(function(){
         var id = $(this).val();
         $("#members").empty("");
         $("#members").append('<option value="">select</option>'); 
         $.ajax({
            type:"post",
            url:"<?=base_url('admin/getstudents')?>",
            data:{id:id},
            success: function(message){
               var resp = JSON.parse(message);
                     if(resp.success==1)
                     {
                        
                        $.each(resp.students, function(index,value){
                           //console.log(value.start_time);
                           $("#members").append('<option value="'+value.id+'">'+value.name+'</option>');
                           //i++;
                        });

                        $(".select").selectpicker("refresh");

                     }
            }
         });
         
      });*/

     /* $("#month").change(function(){
         var member_id = $("#members").val();
         var month = $(this).val();
         $.ajax({
            type:"post",
            url:"<?=base_url('admin/getstudentbatches')?>",
            data:{member_id:member_id,month:month},
            success: function(message){

                  $(".student_info").html(message);
                        
            }
         });
         
      });*/

   });
</script>