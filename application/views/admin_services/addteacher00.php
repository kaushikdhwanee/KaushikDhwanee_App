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
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<![endif]-->
		
	</head>
	<body>
		<div class="hidden-lg hidden-sm hidden-md">
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
									<div class="profile">
								
									  <div class="avatar" id="avatar">
										<div id="preview"><img src="images/profile.png" id="avatar-image" class="avatar_img img-responsive" >
										</div>
										<div class="avatar_upload" >
										  <label class="upload_label">Upload
											<input type="file" id="upload">
										  </label>
										</div>
									  </div>
									  <div class="nickname">
										<span id="name" tabindex="4" data-key="1" contenteditable="true" onkeyup="changeAvatarName(event, this.dataset.key, this.textContent)" onblur="changeAvatarName('blur', this.dataset.key, this.textContent)">Aswini.K</span>
									  </div>
									</div><!--profile end-->
									<form method="post" action="<?=base_url("admin_services/insertteacher")?>" id="teacher" enctype="multipart/form-data">

										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="teacher_name"  placeholder="Enter Teacher Name" class="form-control">
												<i class="fa fa-user" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="mobile" placeholder="Enter Mobile Number" class="form-control">
												<i class="fa fa-phone" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" name="whatsapp_number" placeholder="Enter Whatsapp Number" class="form-control">
												<i class="fa fa-whatsapp" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" placeholder="Enter Emergency Name" class="form-control">
												<i class="fa fa-user" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" placeholder="Enter Emergency ContactNo" class="form-control">
												<i class="fa fa-mobile" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select multiple="multiple" placeholder="Select Class" onchange="console.log($(this).children(':selected').length)" class="testSelAll2">
													<option value="Guitar">&nbsp;Guitar</option>
													<option value="Tabla">&nbsp;Tabla</option>
													<option value="Bollywood Dance">&nbsp;Bollywood Dance</option>
													<option value="Kathak">&nbsp;Kathak</option>
												</select>
											<i class="fa fa-cubes"  style="margin-top: -10px;"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select multiple="multiple" placeholder="Select branch" onchange="console.log($(this).children(':selected').length)" class="testSelAll2">
													<option value=" Banjara Hills">&nbsp;Banjara Hills</option>
													<option value=" Chikkadpally">&nbsp;Chikkadpally</option>
													<option value=" Hitech City">&nbsp;Hitech City</option>
													<option value=" OTHER">&nbsp;OTHER</option>
												</select>
												<i class="fa fa-map-marker"  style="margin-top: -10px;"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input id="datepicker-example1" class="form-control" placeholder="Date" type="text">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>
										
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select class="form-control">
													<option>Login Time</option>
													<option>12:00 AM</option>
													<option>12:30 AM</option>
													<option>1:00  AM</option>
													<option>1:30  AM</option>
													<option>2:00  AM</option>
													<option>2:30  AM</option>
													<option>3:00  AM</option>
													<option>3:30  AM</option>
													<option>4:00  AM</option>
													<option>4:30  AM</option>
													<option>5:00  AM</option>
													<option>5:30  AM</option>
													<option>6:00  AM</option>
													<option>6:30  AM</option>
													<option>7:00  AM</option>
													<option>7:30  AM</option>
													<option>8:00  AM</option>
													<option>9:00  AM</option>
													<option>10:00 AM</option>
													<option>11:00 AM</option>
													<option>12:00 PM</option>
													<option>12:30 PM</option>
													<option>1:00  PM</option>
													<option>1:30  PM</option>
													<option>2:00  PM</option>
													<option>2:30  PM</option>
													<option>3:00  PM</option>
													<option>3:30  PM</option>
													<option>4:00  PM</option>
													<option>4:30  PM</option>
													<option>5:00  PM</option>
													<option>5:30  PM</option>
													<option>6:00  PM</option>
													<option>6:30  PM</option>
													<option>7:00  PM</option>
													<option>7:30  PM</option>
													<option>8:00  PM</option>
													<option>9:00  PM</option>
													<option>10:00 PM</option>
													<option>11:00 PM</option>
												</select>
												<i class="fa fa-clock-o" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select class="form-control">
													<option>LogOut Time</option>
													<option>12:00 AM</option>
													<option>12:30 AM</option>
													<option>1:00  AM</option>
													<option>1:30  AM</option>
													<option>2:00  AM</option>
													<option>2:30  AM</option>
													<option>3:00  AM</option>
													<option>3:30  AM</option>
													<option>4:00  AM</option>
													<option>4:30  AM</option>
													<option>5:00  AM</option>
													<option>5:30  AM</option>
													<option>6:00  AM</option>
													<option>6:30  AM</option>
													<option>7:00  AM</option>
													<option>7:30  AM</option>
													<option>8:00  AM</option>
													<option>9:00  AM</option>
													<option>10:00 AM</option>
													<option>11:00 AM</option>
													<option>12:00 PM</option>
													<option>12:30 PM</option>
													<option>1:00  PM</option>
													<option>1:30  PM</option>
													<option>2:00  PM</option>
													<option>2:30  PM</option>
													<option>3:00  PM</option>
													<option>3:30  PM</option>
													<option>4:00  PM</option>
													<option>4:30  PM</option>
													<option>5:00  PM</option>
													<option>5:30  PM</option>
													<option>6:00  PM</option>
													<option>6:30  PM</option>
													<option>7:00  PM</option>
													<option>7:30  PM</option>
													<option>8:00  PM</option>
													<option>9:00  PM</option>
													<option>10:00 PM</option>
													<option>11:00 PM</option>
												</select>
												<i class="fa fa-clock-o" aria-hidden="true"></i>
											</div>
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<textarea class="form-control" placeholder="Enter Address"></textarea>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
											</div>
										</div>
									</form>
									<div class="paper1">
									  <p id="num">SUBMIT</p>
									  <div class="ripple"></div>
									</div>
								</div><!--teacher-box end-->
							</div><!---swiper-slide end 1-->
							
							
							<div class="swiper-slide bg-clr-total-box">
								<div class="teacher-box">
									<div class="paper">
										<div class="row ">
											<div class="col-xs-6">
												<a href="#myDetails" data-toggle="modal" >
													<img src="images/teach1.jpg" class="img-circle immg-brder"/>
													<span class="view-tech-txt">AditiRao</span>
													<small class="view-small-txt">ElectricGuitar</small>
												</a>
											</div>
											<div class="col-xs-6">
												<a href="tel:040-69996989">
													<img src="images/phone.png" class="pull-right" style="height: 30px; margin-top: 10px;">
												</a>
											</div>
										</div>  
										<div class="ripple"></div>
									</div><!--1-->
									<div class="paper">
										<div class="row ">
											<div class="col-xs-6">
												<a href="#myDetails" data-toggle="modal" >
													<img src="images/teach2.jpg" class="img-circle immg-brder"/>
													<span class="view-tech-txt">Mounika</span>
													<small class="view-small-txt">ElectricGuitar</small>
												</a>
											</div>
											<div class="col-xs-6">
												<a href="tel:040-69996989">
													<img src="images/phone.png" class="pull-right" style="height: 30px; margin-top: 10px;">
												</a>
											</div>
										</div>
										<div class="ripple"></div>
									</div><!--2-->
									<div class="paper">
										<div class="row ">
											<div class="col-xs-6">
												<a href="#myDetails" data-toggle="modal" >
													<img src="images/teach2.jpg" class="img-circle immg-brder"/>
													<span class="view-tech-txt">sarvani</span>
													<small class="view-small-txt">ElectricGuitar</small>
												</a>
											</div>
											<div class="col-xs-6">
												<a href="tel:040-69996989">
													<img src="images/phone.png" class="pull-right" style="height: 30px; margin-top: 10px;">
												</a>
											</div>
										</div>
										<div class="ripple"></div>
									</div><!--3-->
									<div class="paper">
										<div class="row ">
											<div class="col-xs-6">
												<a href="#myDetails" data-toggle="modal" >
													<img src="images/teach2.jpg" class="img-circle immg-brder"/>
													<span class="view-tech-txt">Mounika</span>
													<small class="view-small-txt">ElectricGuitar</small>
												</a>
											</div>
											<div class="col-xs-6">
												<a href="tel:040-69996989">
													<img src="images/phone.png" class="pull-right" style="height: 30px; margin-top: 10px;">
												</a>
											</div>
										</div>
										<div class="ripple"></div>
									</div><!--4-->
								</div><!---teacher-box end---->
							</div><!---swiper-slide end 2-->
							
							
							<div class="swiper-slide">
								<div class="teacher-box">
									<form>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select class="form-control">
													<option>Select Branch</option>
													<option>SR.Nagar Branch</option>
													<option>Kukatpally Branch</option>
													<option>Ameerpet Branch</option>
												</select>
												<i class="fa fa-download" aria-hidden="true"></i>
											</div>
											
										</div>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<select class="form-control">
													<option>Select Teacher</option>
													<option>Amrita</option>
													<option>Sravani</option>
													<option>Rupa</option>
												</select>
												<i class="fa fa-download" aria-hidden="true"></i>
											</div>
										</div>
									</form>
									    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

											<div class="panel panel-default">
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
														<table class="table">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th> End Time</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Batch 1</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																	
																</tr>
																<tr>
																	<td>Batch 2</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																</tr>
															</tbody>
														</table>  
													</div>
												</div>
											</div><!--1-->

											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingTwo">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Tuesday
														</a>
													</h4>
												</div>
												<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
													<div class="panel-body">
														<table class="table">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th> End Time</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Batch 1</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																	
																</tr>
																<tr>
																	<td>Batch 2</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																</tr>
															</tbody>
														</table>  
													</div>
												</div>
											</div><!--2-->

											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingThree">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Wednesday
														</a>
													</h4>
												</div>
												<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
													<div class="panel-body">
														<table class="table">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th> End Time</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Batch 1</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																	
																</tr>
																<tr>
																	<td>Batch 2</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																</tr>
															</tbody>
														</table>  
													</div>
												</div>
											</div><!--3-->
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingFour">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Thursday
														</a>
													</h4>
												</div>
												<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
													<div class="panel-body">
														<table class="table">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th> End Time</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Batch 1</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																	
																</tr>
																<tr>
																	<td>Batch 2</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																</tr>
															</tbody>
														</table>  
													</div>
												</div>
											</div><!--4-->
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingFive">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Friday
														</a>
													</h4>
												</div>
												<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
													<div class="panel-body">
														<table class="table">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th> End Time</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Batch 1</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																	
																</tr>
																<tr>
																	<td>Batch 2</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																</tr>
															</tbody>
														</table>  
													</div>
												</div>
											</div><!--5-->
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingSix">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Saturday
														</a>
													</h4>
												</div>
												<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
													<div class="panel-body">
														<table class="table">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th> End Time</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Batch 1</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																	
																</tr>
																<tr>
																	<td>Batch 2</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																</tr>
															</tbody>
														</table>  
													</div>
												</div>
											</div><!--6-->
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingSeven">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
															<i class="more-less glyphicon glyphicon-plus"></i>
															Sunday
														</a>
													</h4>
												</div>
												<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
													<div class="panel-body">
														<table class="table">
															<thead>
																<tr>
																	<th>Batch No</th>
																	<th>Start Time</th>
																	<th> End Time</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Batch 1</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																	
																</tr>
																<tr>
																	<td>Batch 2</td>
																	<td>2:00 AM</td>
																	<td>3:00 AM</td>
																</tr>
															</tbody>
														</table>  
													</div>
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
			<div id="myDetails" class="modal fade" role="dialog">
				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header view-popup-box-header">
								<h4 class="modal-title">ADITI RAO</h4>
							<a href="#" id="header-popup-icn"><i class="fa fa-pencil pull-right" aria-hidden="true" style="margin-top: -21px;"></i></a>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-xs-4">
									<a href="tel:040-69996989"><center><i class="fa fa-phone fa-3x"></i></a><br>
									<span class="dob">CALL</span>
								</div>
								<div class="col-xs-4">
									<img src="images/teach.jpg" class="img-circle popup-img-border"/>
								</div>
								<div class="col-xs-4">
									<span class="dob">D.O.B</span><br>
									<h5 class="view-small-txt2">25<sup>th</sup>June1990</h5>
								</div>
							</div><!----row1 end---->
							<hr>
							<div class="row">
								<div class="col-xs-4">
									<img src="images/music1.jpg" class="img-circle popup-img-border"/>
									<p class="popup-txt">Guitar</p>
								</div>
								<div class="col-xs-4">
									<img src="images/music2.jpg" class="img-circle popup-img-border"/>
									<p class="popup-txt">ElectricGuitar</p>
									
								</div>
								<div class="col-xs-4">
									<img src="images/music3.jpg" class="img-circle popup-img-border"/>
									<p class="popup-txt">Violin</p>
								</div>
							</div><!----row2 end---->
							<p class="dob">Address:</p>
							<small class="view-small-txt1">House No 1-10-121, Flat No G1, Block-1, R K Towers, Mayur Marg, Begumpet, Hyderabad - 500016,</small>
							<br><br>
							<div class="row">
								<div class="col-xs-6">
									<p class="dob">Alternate No:</p><small class="view-small-txt1">9988776655</small>
								</div>
								<div class="col-xs-6">
									<a href="#" id="remove-box"><i class="fa fa-times" aria-hidden="true"></i></a>
									<p class="deactive">Deactive</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- myDetails Modal end-->	
	
		<script src="<?=base_url("assets/admin_services/js/jquery.min.js")?>"></script>

		<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAIBZT8aT2n2k8VtZ1J1b6GF8bN0uAvN_g"></script>

		    <script src="<?=base_url("assets/admin/js/jquery.geocomplete.js")?>"></script>		
		    <script src="<?=base_url("assets/admin_services")?>/js/bootstrap.min.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/swiper.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/jquery.sumoselect.min.js"></script>
		<script type="text/javascript" src="<?=base_url("assets/admin_services")?>/js/zebra_datepicker.js"></script>
        <script type="text/javascript" src="<?=base_url("assets/admin_services")?>/js/core.js"></script>
		<!--slider tab code-->
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
		<!--ripple effect-->
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
		<!----datepicker code-------->
		<script>
			$('#datepicker-example1').Zebra_DatePicker();
		</script>
		<!----accordion code-------->
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
		
	</body>
	</html>