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

 .add{margin-left:10px; margin-top:15px; cursor:pointer;} 
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
		</style>
	</head>
<script type="text/javascript">
					
					
					function choosePhoto() {
						var file = Android.choosePhoto();
					}
					function setFilePath(file) {
					   if(file != '')
					   {
					   var image_show = 'data:image/png;base64,'+file;
					   $("#photo1").val(file);
					   $(".namepawan").attr("src",image_show);
					   }
					}
					function setFileUri(uri) {
					}
				</script> 
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
								<h6><i class="fa fa-plus-circle"></i><br>EDIT TEACHER</h6>
							</div>
							
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							<div class="swiper-slide">
								<div class="teacher-box">
									<form method="post" action="<?=base_url("admin_services/updateteacher")?>" id="teacher" enctype="multipart/form-data">

									<div class="form-group">
											<div class="input-group"><span class="input-group-btn">


 <img  src="<?=@($teacher_info['profile_pic']=="")?base_url("assets/admin_services/images/profile.png"):base_url("uploads/teacher_images/".$teacher_info['profile_pic'])?>"   class="img-responcive new_image" onClick="choosePhoto()"  style="width:100px" />
					<input type="hidden" name="image" id="photo1" value="" />												</span></div>
										</div><!--profile end-->
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="teacher_name" value="<?=$teacher_info['teacher_name']?>"  placeholder="Enter Teacher Name" class="form-control">
												<i class="fa fa-user" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="mobile" value="<?=$teacher_info['mobile']?>" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Enter Mobile Number" class="form-control">
												<i class="fa fa-phone" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="email" value="<?=$teacher_info['email']?>" placeholder="Enter Email id" class="form-control">
												<i class="fa fa-phone" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="whatsapp_number" value="<?=$teacher_info['whatsapp_number']?>" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Enter Whatsapp Number" class="form-control">
												<i class="fa fa-whatsapp" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="emergency_contact_name" value="<?=$teacher_info['emergency_contact_name']?>" placeholder="Enter Emergency Name" class="form-control">
												<i class="fa fa-user" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="emergency_contact_number" value="<?=$teacher_info['emergency_contact_number']?>" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Enter Emergency ContactNo" class="form-control">
												<i class="fa fa-mobile" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input id="datepicker-example1" class="form-control" value="<?=($teacher_info['date_of_joining']!="")?date("d-m-Y",strtotime($teacher_info['date_of_joining'])):""?>" name="date_of_joining" placeholder="Date of joining" type="text">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>

										<div class="form-group">
											<div class="icon-addon addon-lg">
												

												<select name="categories[]"  multiple="multiple"  class="form-control" >

						                            <?php
						                            	
						                            	if(!empty($classes))
						                            	{
						                            		foreach ($classes as $class_info) {
						                            			?>
						                            			 <option value="<?=$class_info['id']?>" <?=@in_array($class_info['id'], explode(",", $teacher_info['classes']))?"selected":""?>><?=$class_info['class_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>

						                </select>

												<i class="fa fa-cubes"  style="margin-top: -10px;"></i>
											</div>
										</div>

										<?php

							if(!empty($teacher_timings))
							{
								$z=1;
								foreach ($teacher_timings as $time_info) {
									 $selected_days= array();
									 //print_r($time_info);
									 //echo strtotime($time_info['in_time']);
									?>
										<div id="box">
										
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select placeholder="Select Branch"  name="branch[]" class="form-control">
       																	
												   <option value="">Select branch</option>
						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>" <?=@$time_info['branch_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>
											   </select>
												<i class="fa fa-map-marker"  style="margin-top: -10px;"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												

												<select name="days[<?=($z-1)?>][]"  multiple="multiple"  class="form-control" >

						                            <?php

						                             $selected_days= explode(",", $time_info['days']);
						                            	
						                            	foreach ($days as $key => $value) 
						                            	{
						                            		?>
						                            		<option value="<?=$key?>" <?=in_array($key, $selected_days)?"selected":""?> ><?=$value?></option> 
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
															<option value="<?=$i.":".$value1?>" <?=@(strtotime($i.":".$value1)==strtotime($time_info['in_time'])?"selected":"")?> ><?=date("h:i A",strtotime($i.":".$value1))?></option>
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
													for ($j=5; $j<=23; $j++) { 
														foreach ($x as $value1) {?>
															<option value="<?=$j.':'.$value1?>" <?=@(strtotime("$j:$value1")==strtotime($time_info['out_time'])?"selected":"")?>><?=date("h:i A",strtotime($j.":".$value1))?></option>
														<?php }
													}
													?>
														</select>
														<i class="fa fa-clock-o" aria-hidden="true"></i>
													</div>
												</div>
											</div>
											<div class="col-xs-2">
													
												<p class="add" id="add"><?=($z==1)?'<i class="fa fa-plus" aria-hidden="true"></i>':'<i class="fa fa-minus" aria-hidden="true"  id="remove" data='.$time_info['id'].'></i>'?> 
													</p><!-- <img src="add.png" width="32" height="32" border="0" align="top" class="add" id="add" /> -->
													
											</div>
											
										
										</div><!--row-->
                                       </div>
                                       <?php	$z++;
						}
							}else{
							?><div id="box">
										
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select placeholder="Select Branch"  name="branch[]" class="form-control">
       																	
												   <option value="">Select branch</option>
						                            	<?php
						                            	if(!empty($branches))
						                            	{
						                            		foreach ($branches as $branch_info) {
						                            			?>
						                            			 <option value="<?=$branch_info['id']?>" <?=@$class_info['cat_id']==$branch_info['id']?"selected":""?>><?=$branch_info['branch_name']?></option> 
						                            	<?php	}
						                            	}
						                            	?>
											   </select>
												<i class="fa fa-map-marker"  style="margin-top: -10px;"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												

												<select name="days[0][]"  multiple="multiple"  class="form-control" >

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
															<option value="<?=$i.":".$value1?>" ><?=date("h:i A",strtotime($i.":".$value1))?></option>
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
													
												<p class="add" id="add"><?=($i==1)?'<i class="fa fa-plus" aria-hidden="true"></i>':'<h6 class="add" id="remove" data='.$time_info['id'].'>-</h6>'?> 
													</p><!-- <img src="add.png" width="32" height="32" border="0" align="top" class="add" id="add" /> -->
													
											</div>
											
										
										</div><!--row-->
                                       </div>
                                       <?php }?>	
                                        <div class="form-group">
<!-- <i class="fa fa-map-marker" aria-hidden="true"></i>
 -->								 <input class="form-control" id="geocomplete" name="geolocation" value="<?=$teacher_info['location']?>"  placeholder="Location(geolocation)" type="text">
								 <input type="hidden" name="lat" value="" data-geo="lat">
                  				  <input type="hidden" name="lng" value="" data-geo="lng">
								<div class="map_canvas" style="display:none"></div>
								</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<textarea class="form-control" name="address" placeholder="Enter Address"><?=$teacher_info['address']?></textarea>
												
											</div>
										</div>
									
									<div class="form-group">
									<input type="hidden" name="teacher_id" value="<?=$teacher_info['teacher_id']?>">
									  <input type="submit" name="SUBMIT">
									  <a href="<?=base_url("admin_services/updateteacherstatus/".$teacher_info['teacher_id']."/".$teacher_info['status'])?>" >
										<!-- <i class="fa fa-times" style="color:rgb(204,204,204)"></i> -->&nbsp;&nbsp;<?=$teacher_info['status']==1?"Deactivate":"Activate"?>
									</a>
									 <!--  <div class="ripple"></div> -->
									</div></form>
								</div><!--teacher-box end-->
							</div><!---swiper-slide end 1-->
					</div><!--swiper-container end-->
				</div><!--offer end-->
			</section><!--tab slide end-->
		</div><!--hidden-sm hidden-lg hidden-md--->
	
		<!-- myDetails Modal -->
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
		<!---slider tab code------->
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
			upload.addEventListener("change", handleFiles, false);
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
	var z="<?=count($teacher_timings)?>";
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
												'<select name="days['+z+'][]"  multiple="multiple"  class="form-control" >'+

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
		z++;
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
          location: "<?php echo  @$branch_info['location'];?>",
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
      url:"<?=base_url("admin/getteacherclasses")?>",
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
		email: {"required":true,
		email:true},
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
        	whatsapp_number: {
        	
        	minlength: 10,
        	maxlength: 10,
        	
        	},
        	emergency_contact_number: {
        	
        	minlength: 10,
        	maxlength: 10,
        	
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
		</script>
