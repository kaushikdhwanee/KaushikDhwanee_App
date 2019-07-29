<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/admin_services/css/teacher')?>/bootstrap.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/teacher')?>/swiper.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/teacher')?>/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link href="<?=base_url('assets/admin_services/css/teacher')?>/sumoselect.css" rel="stylesheet">
		<link rel="stylesheet" href="<?=base_url('assets/admin_services/css/teacher')?>/default.css" type="text/css">
		<link rel="stylesheet" href="<?=base_url('assets/admin_services/css/teacher')?>/date.css" type="text/css">
		<style>

.name{width:500px; height:25px; padding:10px; border-radius:5px; border:solid #999 1px; margin-bottom:15px; font-size:17px;-webkit-box-shadow: 1px 1px 10px #CCC;box-shadow: 1px 1px 10px #CCC; outline:none;}

input{ margin-top:5px;}

<!-- .add{margin-left:10px; margin-top:15px; cursor:pointer;} -->
.submit-button{
	width:100px;
	height:30px;
	background:#096;
	cursor:pointer;
	border:none;
	border-radius:5px;
	color:#fff;
	font-size:18px;
}
.add{
    background: #00AEF0;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    display: inline;
    padding: 7px 10px;
	margin-left: -10px;
	}
	
.new_image{
    width:100px;
    height:100px;
    border-radius:50%;
    border:2px solid #ccc;
    margin:0px 35%;
}

input[type=submit] {
    border: 1px solid  #00aeef;
    color: #fff;
    background: #00aeef;
    padding:2px 20px;
    border-radius: 3px;
    width:100%;
    height:50px;
}
		</style>
	</head>

<?php 

	$days = array(
			"1"=>'Monday',
		    "2"=>'Tuesday',
		    "3"=>'Wednesday',
		    "4"=>'Thursday',
		    "5"=>'Friday',
		    "6"=>'Saturday',
		    "7"=>'Sunday'
		);

?>
	<body>
		<div class="hidden-sm hidden-md hidden-lg">
			<section id="scroller" class="overflow">
				<div id="content" class="offer">
					<div class="swiper-container gallery-thumbs top-menu">
						<div class="swiper-wrapper some">
							<div class="swiper-slide over">
								<h6><i class="fa fa-plus-circle"></i><br>ADDTEACHER</h6>
							</div>
							<div class="swiper-slide over" >
								<h6><i class="fa fa-eye"></i><br>VIEWTEACHER</h6>
							</div>
							<div class="swiper-slide over">
								<h6><i class="fa fa-calendar-o"></i><br>SCHEDULE</h6>
							</div>
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							<div class="swiper-slide">
								<div class="teacher-box">
									<form method="post" action="<?=base_url("admin_services/insertteacher")?>" id="teacher" enctype="multipart/form-data">
					<img  src="<?=base_url("assets/admin_services/")?>images/profile.png"   class="img-responcive new_image" onClick="choosePhoto()"  />
					<input type="hidden" name="image" id="photo1" value="" />
									<!-- <div class="profile">
								
									  <div class="avatar" id="avatar">
										<div id="preview"><img onClick="choosePhoto()" src="<?=base_url("assets/admin_services/")?>images/profile.png" id="avatar-image" class="avatar_img img-responsive" >
										</div>
										<div class="avatar_upload" ><input type="hidden" name="image" id="photo1" value="" />
										  <label class="upload_label">
											                       

										  </label> --><!-- Upload
										</div>
									  </div>
									  <div class="nickname">
										<span id="name" tabindex="4" data-key="1" contenteditable="true" onkeyup="changeAvatarName(event, this.dataset.key, this.textContent)" onblur="changeAvatarName('blur', this.dataset.key, this.textContent)"></span>
									  </div>
									</div> --><!--profile end-->
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="teacher_name" autocomplete="off"  placeholder="Enter Teacher Name" class="form-control">
												<i class="fa fa-user" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="number" name="mobile" autocomplete="off" placeholder="Enter Mobile Number" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control">
												<i class="fa fa-phone" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="email" autocomplete="off" placeholder="Enter Email id" class="form-control">
												<i class="fa fa-phone" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="number" name="whatsapp_number" autocomplete="off" placeholder="Enter Whatsapp Number" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control">
												<i class="fa fa-whatsapp" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="emergency_contact_name" autocomplete="off" placeholder="Enter Emergency Name" class="form-control">
												<i class="fa fa-user" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="number" name="emergency_contact_number" autocomplete="off" placeholder="Enter Emergency ContactNo" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control">
												<i class="fa fa-mobile" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input id="datepicker-example1" class="form-control"  autocomplete="off" name="date_of_joining" placeholder="Date of joining" type="text">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>

										<div class="form-group">
											<div class="icon-addon addon-lg">
												

												<select name="categories[]" placeholder="select Classes" multiple="multiple"  class="form-control" >
												<option value="">Select classes</option>
						                            <?php
						                            	
						                            	if(!empty($classes))
						                            	{
						                            		foreach ($classes as $class_info) {
						                            			?>
						                            			 <option value="<?=$class_info['id']?>"><?=$class_info['class_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                </select>

												<i class="fa fa-cubes"  style="margin-top: -10px;"></i>
											</div>
										</div>


										<div id="box">
										
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select placeholder="Select Branches"   name="branch[]" class="form-control">
       																	
												   <option value="">Select branch</option>
						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>"><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>
											   </select>
												<i class="fa fa-map-marker"  style="margin-top: -10px;"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												

												<select placeholder="Select Days"  name="days[0][]"  multiple="multiple"  class="form-control" >
												<option value="">Select days</option>
						                            <?php
						                            	
						                            	foreach ($days as $key => $value) 
						                            	{
						                            		?>
						                            		<option value="<?=$key?>"><?=$value?></option> 
						                            	<?php	
						                            	}
						                            	?>

						                </select>

												<i class="fa fa-cubes"  style="margin-top: -10px;"></i>
											</div>
										</div>
										
										
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select name="in_time[]" class="form-control">
													<option value="">Login Time</option>
													<?php
													$x= array("00","30");
													for ($i=5; $i<=23; $i++) { 
														foreach ($x as $value1) {?>
															<option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
														<?php }
													}
													?>
												</select>
												<i class="fa fa-clock-o" aria-hidden="true"></i>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-10">
												<div class="form-group">
													<div class="icon-addon addon-lg">
														<select  name="out_time[]"  class="form-control">
															<option value="">Logout Time</option>
															<?php
													$x= array("00","30");
													for ($i=5; $i<=23; $i++) { 
														foreach ($x as $value1) {?>
															<option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>
														<?php }
													}
													?>
														</select>
														<i class="fa fa-clock-o" aria-hidden="true"></i>
													</div>
												</div>
											</div>
											<div class="col-xs-2">
												<p class="add" id="add"><i class="fa fa-plus" aria-hidden="true"></i></p>	
													<!-- <img src="add.png" width="32" height="32" border="0" align="top" class="add" id="add" /> -->
													
											</div>
											
										
										</div><!--row-->
                                       </div>
                                        <div class="form-group">
<!-- <i class="fa fa-map-marker" aria-hidden="true"></i>
 -->								 <input class="form-control" id="geocomplete" name="geolocation"  placeholder="Location(geolocation)" type="text">
								 <input type="hidden" name="lat" value="" data-geo="lat">
                  				  <input type="hidden" name="lng" value="" data-geo="lng">
								<div class="map_canvas" style="display:none"></div>
								</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<textarea class="form-control" name="address" placeholder="Enter Address"></textarea>
												
											</div>
										</div>
									
									<div class="form-group">
									  <input type="submit" name="SUBMIT">
									 <!--  <div class="ripple"></div> -->
									</div></form>
								</div><!--teacher-box end-->
							</div><!---swiper-slide end 1-->
							
							
							<div class="swiper-slide bg-clr-total-box">
							
								<div class="teacher-box ">
								<div class="form-group">
											<div class="icon-addon addon-lg">
												<select placeholder="Select Branch"   name="branch" id="branch" class="form-control">
       																	
												   <option value="">Select branch</option>
						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>"><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>
											   </select>

											</div>
										</div>
										<div class="teachers_list">
								 <?php if(!empty($teachers)){
                                
                                    foreach ($teachers as $teacher_info) {?>
									<div class="paper">
										<div class="row ">
											<div class="col-xs-6">
												<a href="<?=base_url("admin_services/editteacher/".$teacher_info['teacher_id'])?>"><!-- data-toggle="modal" class="getteacher" data="<?=$teacher_info['teacher_id']?>" id="clsses-link" -->
													<img src="<?=($teacher_info['profile_pic']!="")?base_url("uploads/teacher_images/".$teacher_info['profile_pic']):base_url("assets/admin_services/images/temp.jpg")?>" class="img-circle immg-brder"/> 
													<span class="view-tech-txt"><?=$teacher_info['teacher_name']?></span>
													<small class="view-small-txt"><?=date("d-m-Y",strtotime($teacher_info['date_of_joining']))?></small>
												</a>
											</div>
											<div class="col-xs-6">
												<a href="tel:<?=$teacher_info['mobile']?>">
													<img src="<?=base_url("assets/admin_services/")?>images/phone.png" class="pull-right" style="height: 30px; margin-top: 10px;">
												</a>
											</div>
										</div>  
										<div class="ripple"></div>
									</div><!--1-->
									<?php }
                                 }else{
                                    echo "<tr><td>No results found</td></tr>" ;  
                                 }
                                 ?>
                                 </div>
								</div><!---teacher-box end---->
							</div><!---swiper-slide end 2-->
							
							
							<div class="swiper-slide">
								<div class="teacher-box">
									<form>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select class="form-control" name="branch_id" id="branch_id">
													<option value="">Select Branch</option>
													 <?php if(!empty($branches)){
                                                   foreach ($branches as $branch_info) {?>
                                                   <option value="<?=$branch_info['id']?>"><?=$branch_info['branch_name']?></option>
                                                <?php }
                                                   }?>
												</select>
												<i class="fa fa-download" aria-hidden="true"></i>
											</div>
											
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select class="form-control" name="teacher_id"  id="teacher_id">
													<option value="">Select Teacher</option>
													<?php if(!empty($teachers)){
                                                   foreach ($teachers as $teacher_info) {?>
                                                   <option value="<?=$teacher_info['teacher_id']?>"><?=$teacher_info['teacher_name']?></option>
                                                <?php }
                                                   }?>
												</select>
												<i class="fa fa-download" aria-hidden="true"></i>
											</div>
										</div>
									</form>
									    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

											<div class="panel panel-default weekdays" data-id="1">
												<div class="panel-heading" role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Monday
														</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
														<table class="table" id="getclasses1">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th>End Time</th>
																	<th>Class Name</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>No data Found</td>
																
																</tr>
																
															</tbody>
														</table>  
													</div>
												</div>
											</div><!--1-->

											<div class="panel panel-default weekdays" data-id="2">
												<div class="panel-heading" role="tab" id="headingTwo">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Tuesday
														</a>
													</h4>
												</div>
												<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
													<div class="panel-body"><table class="table" id="getclasses2">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th>End Time</th>
																	<th>Class Name</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>No data Found</td>
																
																</tr>
																
															</tbody>
														</table> </div>
												</div>
											</div><!--2-->

											<div class="panel panel-default weekdays" data-id='3'>
												<div class="panel-heading" role="tab" id="headingThree">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Wednesday
														</a>
													</h4>
												</div>
												<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
													<div class="panel-body"><table class="table" id="getclasses3">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th>End Time</th>
																	<th>Class Name</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>No data Found</td>
																
																</tr>
																
															</tbody>
														</table> </div>
												</div>
											</div><!--3-->
											<div class="panel panel-default weekdays" data-id="4">
												<div class="panel-heading" role="tab" id="headingFour">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Thursday
														</a>
													</h4>
												</div>
												<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
													<div class="panel-body"><table class="table" id="getclasses4">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th>End Time</th>
																	<th>Class Name</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>No data Found</td>
																
																</tr>
																
															</tbody>
														</table> </div>
												</div>
											</div><!--4-->
											<div class="panel panel-default weekdays" data-id="5">
												<div class="panel-heading" role="tab" id="headingFive">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Friday
														</a>
													</h4>
												</div>
												<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
													<div class="panel-body"><table class="table" id="getclasses5">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th>End Time</th>
																	<th>Class Name</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>No data Found</td>
																
																</tr>
																
															</tbody>
														</table> </div>
												</div>
											</div><!--5-->
											<div class="panel panel-default weekdays" data-id="6">
												<div class="panel-heading" role="tab" id="headingSix">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Saturday
														</a>
													</h4>
												</div>
												<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
													<div class="panel-body"><table class="table" id="getclasses6">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th>End Time</th>
																	<th>Class Name</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>No data Found</td>
																
																</tr>
																
															</tbody>
														</table> </div>
												</div>
											</div><!--6-->
											<div class="panel panel-default weekdays" data-id="7">
												<div class="panel-heading" role="tab" id="headingSeven">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Sunday
														</a>
													</h4>
												</div>
												<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
													<div class="panel-body"><table class="table" id="getclasses7">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th>End Time</th>
																	<th>Class Name</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>No data Found</td>
																
																</tr>
																
															</tbody>
														</table> </div>
												</div>
											</div><!--7-->

										</div><!-- panel-group -->
								</div><!--teacher-box end--->
							</div><!---swiper-slide end 3-->
							
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
				</div><!--offer end-->
			</section><!--tab slide end-->
		</div><!--hidden-sm hidden-lg hidden-md--->
	
		<!-- myDetails Modal -->
			<div id="classDetails" class="modal fade" role="dialog"></div>
			<!-- myDetails Modal end-->	
	
		<script src="<?=base_url("assets/admin_services/js/jquery.min.js")?>"></script>
		<script src="<?=base_url("assets/admin_services/js/jquery.validate.js")?>"></script>
		<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAIBZT8aT2n2k8VtZ1J1b6GF8bN0uAvN_g"></script>

		<script src="<?=base_url("assets/admin/js/jquery.geocomplete.js")?>"></script>		
		<script src="<?=base_url("assets/admin_services")?>/js/bootstrap.min.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/swiper.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/jquery.sumoselect.min.js"></script>
		<script type="text/javascript" src="<?=base_url("assets/admin_services")?>/js/zebra_datepicker.js"></script>
        <script type="text/javascript" src="<?=base_url("assets/admin_services")?>/js/core.js"></script>
        <?php include 'successmessage.php';?>
		<!---slider tab code-->
		<script>
			var galleryTop = new Swiper('.gallery-top', {
			 
				spaceBetween: 0,
			});
			var galleryThumbs = new Swiper('.gallery-thumbs', {
				spaceBetween: 0,
				centeredSlides: true,
				slidesPerView: 'auto',
				touchRatio: 0.2,
				slideToClickedSlide: true
			});
			galleryTop.params.control = galleryThumbs;
			galleryThumbs.params.control = galleryTop;
			
		</script> 

		
		<!-----circle shape file upload image------>

		<script>
			var upload = document.getElementById("upload");
			var preview = document.getElementById("preview");
			var avatar = document.getElementById("avatar");
			var avatar_name = document.getElementById("name");
			var avatar_name_change_box =
			document.getElementById("change-name-box");

			var avatars = {
			  srcList: [
				{
				  name: "Cosmos",
				  src: encodeURIComponent("https://source.unsplash.com/rTZW4f02zY8/150x150")
				},
				{
				  name: "Walrus",
				  src: encodeURIComponent("https://source.unsplash.com/h13Y8vyIXNU/150x150")
				},
				 {
				  name: "Flowers",
				  src: encodeURIComponent("https://source.unsplash.com/PwWkzeJeJZE/150x150")
				},
				{
				  name: "Dog",
				  src: encodeURIComponent("https://source.unsplash.com/oCJuJQqvCzc/150x150")
				}
			  ],
			  activeKey: 1,
			  add: function(_name, _src){
				this.activeKey = this.srcList.length;
				return (this.srcList.push({name: _name, src: encodeURIComponent(_src)}) - 1);
			  },
			  changeName: function(key, _name) {
				
				if ( !Number.isInteger(key) ) {
				  return false;
				}
				this.srcList[key].name = _name;
				if ( avatar_name.dataset.key == key)
				{
				  avatar_name.textContent = _name;  
				}
				return _name;
			  },
			  showNext: function(){
				
				var _next = this.activeKey + 1;
				if ( _next >= this.srcList.length ) {
				  _next = 0;
				}
				this.showByKey(_next);
				
			  },
			  showLast: function(){
				var _next = this.activeKey - 1;
				if ( _next < 0 ) {
				  _next = this.srcList.length - 1;
				}
				this.showByKey(_next);
			  },
			  showByKey: function(_next) {
				var _on = this.srcList[_next];
				if ( !_on.name ) return;
				
				while(preview.firstChild) {
				  preview.removeChild(preview.firstChild);
				}
				
				var img = document.createElement("img");
				img.src = decodeURIComponent(_on.src);
				img.className = "avatar_img--loading";
				img.onload = function() {
				  img.classList.add("avatar_img");
				}
				avatar_name.textContent = _on.name;
				avatar_name.setAttribute("data-key", _next);
				preview.appendChild(img);
				this.activeKey = _next;
			  }
			};

			function showAvatar(key) {
			  if ( !key ) {
				key = avatars.activeKey;
			  }
			  
			}

			/*

			/** Handle uploading of files */
			//upload.addEventListener("change", handleFiles, false);
			function handleFiles() {
			  var files = this.files;
			  for (var i = 0; i < files.length; i++) {
				var file = files[i];
				var imageType = /^image\//;
				
				if (!imageType.test(file.type)) {
				  avatar.classList.add("avatar--upload-error");
				  setTimeout(function(){
					avatar.classList.remove("avatar--upload-error");
				  },1200);
				  continue;
				}
				
				avatar.classList.remove("avatar--upload-error");
				
				while(preview.firstChild) {
				  preview.removeChild(preview.firstChild);
				}
				
				var img = document.createElement("img");
				img.file = file;
				img.src = window.URL.createObjectURL(file);
				img.onload = function() {
				  // window.URL.revokeObjectURL(this.src);
				}
				img.className ="avatar_img";
				
				/* Clear focus and any text editing mode */
				document.activeElement.blur();
				window.getSelection().removeAllRanges();
				
				var _avatarKey = avatars.add(file.name, img.src);
				avatar_name.textContent = file.name;
				avatar_name.setAttribute("data-key", _avatarKey);
				preview.appendChild(img);
			  }
			}

			/** Inline functions */
			window.changeAvatarName = function(event, key, name) {
			  if (event.keyCode != 13 && event != 'blur') return;
			  key = parseInt(key);
			  if ( !name ) return;
			  var change = avatars.changeName(key, name);
			  document.activeElement.blur();
			  // remove selection abilities
			  window.getSelection().removeAllRanges();
				
			};

			window.changeAvatar = function(dir){
			  if ( dir === 'next' ) {
				avatars.showNext();
			  }
			  else {
				avatars.showLast();
			  }
			};
			window.handleAriaUpload = function(e, obj) {
			  if(e.keyCode == 13) {
				obj.click();
			  }
			};
		</script>
		<!------------multi selection----------->
		<script>
		   $(document).ready(function () {
			window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 3, selectAll:true, captionFormatAllSelected: "Yeah, OK, so everything." });
			window.test = $('.testsel').SumoSelect({okCancelInMulti:true, captionFormatAllSelected: "Yeah, OK, so everything." });

			window.testSelAll = $('.testSelAll').SumoSelect({okCancelInMulti:true, selectAll:true });

			window.testSelAll2 = $('.testSelAll2').SumoSelect({selectAll:true});

			<!-- window.testSelAlld = $('.SlectBox-grp').SumoSelect({okCancelInMulti:true, selectAll:true }); -->



			window.Search = $('.search-box').SumoSelect({ csvDispCount: 3, search: true, searchText:'Enter here.' });
			window.searchSelAll = $('.search-box-sel-all').SumoSelect({ csvDispCount: 3, selectAll:true, search: true, searchText:'Enter here.', okCancelInMulti:true });
			window.searchSelAll = $('.search-box-open-up').SumoSelect({ csvDispCount: 3, selectAll:true, search: false, searchText:'Enter here.', up:true });

			window.groups_eg_g = $('.groups_eg_g').SumoSelect({selectAll:true, search:true });


			$('.SlectBox').on('sumo:opened', function(o) {
			  console.log("dropdown opened", o)
			});

			});
			
		</script>
		<!-----ripple effect-->
		<script>
				$(document).ready(function() {
			   $(".paper").mousedown(function(e) {
				  var ripple = $(this).find(".ripple");
				  ripple.removeClass("animate");
				  var x = parseInt(e.pageX - $(this).offset().left) - (ripple.width() / 2);
				  var y = parseInt(e.pageY - $(this).offset().top) - (ripple.height() / 2);
				  ripple.css({
					 top: y,
					 left: x
				  }).addClass("animate");
			   });
			});

			//button effect
				$(document).ready(function() {
			   $(".paper1").mousedown(function(e) {
				  var ripple = $(this).find(".ripple");
				  ripple.removeClass("animate");
				  var x = parseInt(e.pageX - $(this).offset().left) - (ripple.width() / 2);
				  var y = parseInt(e.pageY - $(this).offset().top) - (ripple.height() / 2);
				  ripple.css({
					 top: y,
					 left: x
				  }).addClass("animate");
			   });
			});
		</script>
	
		<script>
			function toggleIcon(e) {
				$(e.target)
					.prev('.panel-heading')
					.find(".more-less")
					.toggleClass('glyphicon-plus glyphicon-minus');
			}
			$('.panel-group').on('hidden.bs.collapse', toggleIcon);
			$('.panel-group').on('shown.bs.collapse', toggleIcon);
			
</script>
<script>

$(document).ready(function(){
	var count = 1;
	$('#add').click(function(){

		var inp = $('#box');
		
		var i = $('input').size() + 1;
		
		$('<div id="box' + i +'"><div class="form-group">'+
											'<div class="icon-addon addon-lg">'+
												'<select placeholder="Select Branch"  name="branch[]" class="form-control">'+
       																	
												  ' <option value="">Select branch</option>'+
						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 '<option value="<?=$branch_info['id']?>" <?=@$class_info['cat_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> '+
						                            	<?php	}
						                            	}
						                            	?>
											  ' </select>'+
												'<i class="fa fa-map-marker"  style="margin-top: -10px;"></i>'+
											'</div>'+
																					'</div>'+
										'<div class="form-group">'+
											'<div class="icon-addon addon-lg">'+
												'<select name="days[0][]" placeholder="Select Days"  multiple="multiple"  class="form-control" >'+

						                            <?php
						                            	
						                            	foreach ($days as $key => $value) 
						                            	{
						                            		?>
						                            		'<option value="<?=$key?>"><?=$value?></option>'+ 
						                            	<?php	
						                            	}
						                            	?>

						                '</select>'+

												'<i class="fa fa-cubes"  style="margin-top: -10px;"></i>'+
											'</div>'+
										'</div>'+
										
										
										'<div class="form-group">'+
											'<div class="icon-addon addon-lg">'+
												'<select name="in_time[]" class="form-control">'+
													'<option value="">Login Time</option>'+
													<?php
													$x= array("00","30");
													for ($i=5; $i<=23; $i++) { 
														foreach ($x as $value1) {?>
															'<option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>'+
														<?php }
													}
													?>
												'</select>'+
												'<i class="fa fa-clock-o" aria-hidden="true"></i>'+
											'</div>'+
										'</div>'+
										'<div class="row">'+
											'<div class="col-xs-10">'+
												'<div class="form-group">'+
													'<div class="icon-addon addon-lg">'+
														'<select  name="out_time[]"  class="form-control">'+
															'<option value="">Logout Time</option>'+
															<?php
													$x= array("00","30");
													for ($i=5; $i<=23; $i++) { 
														foreach ($x as $value1) {?>
															'<option value="<?=$i.":".$value1?>"><?=date("h:i A",strtotime($i.":".$value1))?></option>'+
														<?php }
													}
													?>
														'</select>'+
														'<i class="fa fa-clock-o" aria-hidden="true"></i>'+
													'</div>'+
												'</div>'+
											'</div>'+
											'<div class="col-xs-2">'+
												'<p class="add" id="remove"><i class="fa fa-minus"  aria-hidden="true"></i></p>'+
													
											'</div>'+
										'</div></div>').appendTo(inp);
		inp.find(".SlectBox"+count).SumoSelect();
		inp.find("#datepicker-example1"+count).Zebra_DatePicker();
		i++;
		
	});
	
	
	$('body').on('click','#remove',function(){
		$(this).parent().parent().parent('div').remove();
	});

		
});

</script>
	</body>
	</html>

	 <script type="text/javascript">
   //function initialize() {}
     $(function(){
     	
        $("#geocomplete").geocomplete({
          //location: "<?php echo  @$branch_info['location'];?>",
          map: ".map_canvas",
          details: "form",
          types: ["geocode", "establishment"],
        
        });       
      $("#geocomplete").bind("geocode:dragged", function(event, latLng){
           $("input[name=lat]").val(latLng.lat());
           $("input[name=lng]").val(latLng.lng());
       
          $("#reset").show();
        });
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        });

      
   
      });







var branch_id;
var teacher_id;
var  day_type=1;
 function getbatchclasses()
 {
   $.ajax({
      type:"post",
      data:{day_type:day_type,teacher_id:teacher_id,branch_id:branch_id},
      url:"<?=base_url("admin_services/getteacherclasses")?>",
      success : function(data){
         $("#getclasses"+day_type).html(data);
         $('.dropdown-toggle').dropdown();
      }
   });
 }


   $(".weekdays").click(function(){

   day_type = $(this).data('id');
   getbatchclasses();

 });
   $(document).ready(function(){
       $("#branch_id").change(function(){
         branch_id = $(this).val();
         $("#teacher_id").val('');
      });
      $("#teacher_id").change(function(){
         teacher_id = $(this).val();
         branch_id = $("#branch_id").val();
         if(teacher_id!="" && branch_id!="")
         {
            getbatchclasses();
         }
      });


     /* $(document).on("click",".updatestatus1",function(){
  
      var batch_class_id = $(this).attr('id');
      var status = $(this).data('id');
      alert(status);
      $.ajax({
         type:"post",
         url:"<?=base_url('admin/updatebatchclassstatus')?>",
         data:{batch_class_id:batch_class_id,status:status},
         success: function(data)
         {
           //
           if(data==1)
           {
             alert("status updated successfully");  
           }                  
         }

      });

      });*/


   });


</script>
<script type="text/javascript">
	var vendor_id ="";  	
	vendor_id ="<?=$this->uri->segment('3')?>";
  $(document).ready(function(){
  	
     $("#teacher").validate({
      rules: {
        name: "required",
       	password:"required",
		email: "required",
        date_of_joining:"required",
        password: "required",
        mobile: {
        	required: true,
        	minlength: 10,
        	maxlength: 10,
        	remote:{
        		url: "<?=base_url('admin_services/checkmobile')?>",
        		type:"POST",
        		data:{
        			mobile:function(){
        				return $("input[name=mobile]").val();
        				},
        			vendor_id: vendor_id	
        			},
        	},
        	},
      },
      messages:{
      	mobile:{
      		remote:"Aleready registered",
      	}
      }
    });
      });
  </script>
  <script type="text/javascript">
			$(document).on("click",".getteacher",function(){
				
				var teacher_id = $(this).attr('data');
				$.ajax({
					type:"post",
					url:"<?=base_url("admin_services/getteacher")?>",
					data:{teacher_id:teacher_id},
					success: function(message)
					{
						$("#classDetails").html(message);
						 $('#classDetails').modal('show');
					}
				});
			});

			$(document).on("change","#branch",function(){
				
				var branch = $(this).val();
				$.ajax({
					type:"post",
					url:"<?=base_url("admin_services/getteachers")?>",
					data:{branch:branch},
					success: function(message)
					{
						$(".teachers_list").html(message);
						 //$('#classDetails').modal('show');
					}
				});
			});
		</script>
