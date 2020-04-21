<style>
.panel-title{
  background-color: lightgrey;
  margin:0;
  padding-left: 15px;
  font-style: italic;
  font-weight: bold;
	}	
	.panel-heading{
  margin: 0;
  padding:0;
  padding-bottom: 50px;

}
</style>

<div class="content-wrapper">

   <div class="row">

      <div class="col-lg-12">

     	<div class="panel panel-flat">

							<div class="panel-heading">

								<h5 class="panel-title">ADD Categories</h5>

								<br>



							</div>



							<div class="col-md-12 product">

							                       <form method="post" id="category" action="<?=base_url("admin/insertcategory")?>" enctype="multipart/form-data">


								<div class="form-group  col-md-5">



                      <input class="form-control" value="<?=@$category_info['category_name']?>" name="category_name" placeholder="Category Name" type="text">

                              



								</div>

								<div class="form-group  col-md-5">

										<input type="file" class="file-styled" id="fileupload"  name="image"  id="fileupload" >
                        <div id="dvPreview">
                        <?php if(isset($category_info) && !empty($category_info) && $category_info['logo']!=""){?>
                          <img src="<?=base_url('uploads/category_images/'.$category_info['logo'])?>" style="width:100px">
                       <?php } ?>
                        </div>
								</div>

						

								

								<div class="form-group col-md-2">
                           <input type="hidden" name="id" value="<?=@$category_info['id']?>">

		<button type="submit" class="btn btn-primary active legitRipple center">SUBMIT</button>

		</div>
</form>
							</div>

							

							<div class="clearfix"></div>

							 <div class="table-responsive">

            

               <table class="table text-nowrap">

                 
                  <thead>

                              <tr>

                                 <th>S No</th>

                                 <th> Category Image</th>

                                 <th >Category Name</th>
                                 
                                 <th >Status</th>

                                 <th >Action</th>

                              </tr>

                           </thead>


                  <tbody class="refar-price">

                              <?php if(!empty($categories)){
                                 $i=1;
                                    foreach ($categories as $category_info) {?>
                                       
                                 
                              <tr>

                              <td><?=$i?></td>

                              <td>

                              <div class="media-left media-middle">

                                       <a href="#"><img src="<?=base_url("uploads/category_images/".$category_info['logo'])?>" class="img-circle img-xs" alt=""></a>

                                    </div>

                                 </td>

                                 <td>

                                 

                                    <div class="media-left">

                                       <div class=""><a href="#" class="text-default text-semibold"><?=$category_info['category_name']?></a></div>

                                    </div>

                                 </td>

                                 <td><span class="label bg-blue"><?=$category_info['status']==1?"Active":"Inactive"?></span></td>

                                             

            <td class="text-center">

               <ul class="icons-list">

                  <li class="dropdown">

                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>

                     <ul class="dropdown-menu dropdown-menu-right">

                        
                        <li><a href="<?=base_url("admin/addcategory/".$category_info['id'])?>"><i class="fa fa-trash-o"></i> Edit</a></li>

                        <li><a href="<?=base_url("admin/updatecategorystatus/".$category_info['id']."/".$category_info['status'])?>" onclick="return confirm('Are you sure to change the status');"><i class="fa fa-refresh" aria-hidden="true"></i> <?=$category_info['status']==1?"Deactivate":"Activate"?></a></li>
<!--                         <li><a href="<?=base_url("admin/deletecategory/".$category_info['id'])?>" onclick="return confirm('are you sure you want delete this main category')"><i class="fa fa-trash-o"></i> Delete</a></li>
 -->

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
