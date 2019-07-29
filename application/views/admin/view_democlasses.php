<?php
function statusname($status)
{
  switch ($status) {
    case 1:
      return "Pending";
      break;
    case 2:
      return "In Progress";
      break;
    
    case 3:
      return "Demo Scheduled";
      break;
    case 4:
      return "Converted";
      break;
      
    case 5:
      return "Did not Join";
      break;
    
    default:
      # code...
      break;
  }
}
?>

<div class="content-wrapper">

   <div class="row">

      <div class="col-lg-12">

     	<div class="panel panel-flat">

							<div class="panel-heading">

								<h5 class="panel-title">Demo Classes</h5>

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

                                 <th >Name(Mobile) </th>

                                 <th>Email</th>

                                 <th>Class</th>

                                 <th>Branch</th>
                                 
                                 <th width="30%">Description</th> 

                                 <th>Status</th>

                                 <th >Action</th>

                              </tr>

                           </thead>


                  <tbody class="refar-price">

                              <?php if(!empty($demos)){
                                 $i=1;
                                    foreach ($demos as $category_info) {?>
                                       
                                 
                              <tr>

                              <td><?=$i?></td>

                              <td>

                               <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$category_info['name']."(".$category_info['mobile'].")"?></a></div>

                                    </div>

                                 </td>

                                 <td>

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$category_info['email']?></a></div>

                                    </div>

                                 </td>
                                 <td>

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$category_info['class_name']?></a></div>

                                    </div>

                                 </td>

                                  <td>

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$category_info['branch_name']?></a></div>

                                    </div>

                                 </td>

                                 <td>

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$category_info['comments']?></a></div>

                                    </div>

                                 </td>

                <td><span class="label bg-blue" <?php if($category_info['status']==1){?> style="background-color: red !important; border-color: red; color: #fff;" <?php }?> ><?=statusname($category_info['status'])?></span></td>

                                             

            <td class="text-center">

               <ul class="icons-list">

                  <li class="dropdown">

                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                     <ul class="dropdown-menu dropdown-menu-right">

                        
                        <li><a href="<?=base_url("admin/updatedemorequeststatus/".$category_info['id']."/2")?>" onclick="return confirm('Are you sure to change the status');"><!-- <i class="fa fa-trash-o"></i> --> In progress</a></li>

                        <li><a href="<?=base_url("admin/updatedemorequeststatus/".$category_info['id']."/3")?>" onclick="return confirm('Are you sure to change the status');"><!-- <i class="fa fa-check-square-o"></i> --> Demo Scheduled<? //=$category_info['status']==1?"Deactivate":"Activate"?></a></li>

                        <li><a href="<?=base_url("admin/updatedemorequeststatus/".$category_info['id']."/4")?>" onclick="return confirm('Are you sure to change the status');"><!-- <i class="fa fa-check-square-o"></i> --> Converted<? //=$category_info['status']==1?"Deactivate":"Activate"?></a></li>

                        <li><a href="<?=base_url("admin/updatedemorequeststatus/".$category_info['id']."/5")?>" onclick="return confirm('Are you sure to change the status');"><!-- <i class="fa fa-check-square-o"></i> --> Did Not Join<? //=$category_info['status']==1?"Deactivate":"Activate"?></a></li>


                        <li class="divider"></li>

                     </ul>

                  </li>

               </ul>

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
