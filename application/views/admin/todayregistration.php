<?php
function statusname($status)
{
  switch ($status) {
    case 1:
      return "Not Enrolled";
      break;
    case 2:
      return "Enrolled";
      break;
    
    
  }
}
?>

<div class="content-wrapper">

   <div class="row">

      <div class="col-lg-16">

     	<div class="panel panel-flat">

							<div class="panel-heading">

								<h5 class="panel-title">Today's Registration</h5>

								<br>
                


							</div>
            <?php if($this->session->userdata("user_type")==1){?>
            <form method="get">
                      <div class="col-md-12" >
                     
                      <div class=" col-md-3">
   
                               <select data-placeholder="select branch" class="select box" name="branch_id" >

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
                         
                         <div class=" col-md-3">
   
                               <input  name="search"  type="submit" name="search" >
                     
                        </div>
                      </div>
                   </form>
                  <?php }?>

							 <div class="table-responsive">

            

               <table class="table text-nowrap">

                 
                  <thead>

                              <tr>

                                 <th>S No</th>

                                 <th >Name </th>

                                 <th>Mobile No</th>
                                 <th>Email Id</th>

                                 <th>Branch</th>
								  <th>Class</th>
                                 <th>Registration Date</th>
                                 
                                 

                                 

                                 

                              </tr>

                           </thead>


                  <tbody class="refar-price">

                              <?php if(!empty($registration)){
                                 $i=1;
                                    foreach ($registration as $category_info) {?>
                                       
                                 
                              <tr>

                              <td><?=$i?></td>

                              <td>

                               <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$category_info['name']?></a></div>

                                    </div>

                                 </td>

                                 <td>

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$category_info['mobile']?></a></div>

                                    </div>

                                 </td>
                                 
                                 <td>

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$category_info['email']?></a></div>

                                    </div>

                                 </td>
                                 

                                  <td>
                                  

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$category_info['branch_name']?></a></div>

                                    </div>

                                 </td>
								  <td>
                                  

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$category_info['class_name']?></a></div>

                                    </div>

                                 </td>

                                  <td>

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$category_info['registration_date']?></a></div>

                                    </div>

                                 </td>
                                 

                                  
                                 

                

                                             

            

                              </tr>


<?php $i++;}
                                 }else{
                                    echo "<tr><td>No results found</td></tr>" ;  
                                 }
                                 ?>

                                 </tbody>

               </table>

            </div>

			<!-- <div class="page-nacation">

			   <ul class="pagination pagination-rounded">

								<li><a href="#">&lsaquo;</a></li>

								<li class="active"><a href="#">1</a></li>

								<li><a href="#">2</a></li>

								<li><a href="#">3</a></li>

								<li><a href="#">4</a></li>

								<li><a href="#">5</a></li>

								<li><a href="#">&rsaquo;</a></li>

							</ul>

							</div> -->

			   

						

						</div>

						</div>

      <div class="col-lg-3">

         <?php //$this->load->view("admin/template/right-sidepanel.php")?>

      </div>

   </div>

</div>

<!-- /main content -->

</div>

</div>

<!-- Footer -->





</body>

</html>


<script type="text/javascript">
  //$(document).ready(function(){
   $(window).load(function() {
   //alert("hiiii");
    $("#category").validate({
      rules: {
        category_name: "required",
        //image: "required",
      },
    });
     /*$("#fileupload").change(function(){
      //alert($('input[type=file]').val().replace(/C:\\fakepath\\/i, ''));
      $(".image_name").html($('input[type=file]').val().replace(/C:\\fakepath\\/i, ''));
    });*/
  });
</script>
