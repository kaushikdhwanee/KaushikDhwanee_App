
				<!-- <div class="modal-dialog">
				
					<div class="modal-content">
						<div class="modal-header view-popup-box-header">
							<a href="<?=base_url("admin_services/addenroll/".$student['member_id'])?>" id="header-popup-icn"><i class="fa fa-pencil pull-right" aria-hidden="true"></i></a>
							<h5 class="modal-title"><?=$student['name']?></h5>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-xs-4">
									<center><i class="fa fa-envelope fa-2x"></i></center>
									<small class="view-small-txt1"><?=$student['email']?></small><center>
								</div>
								<div class="col-xs-4">
									<img src="images/branch1.jpg" class="img-circle popup-img-border"/>
								</div>
								<div class="col-xs-4">
									<center><i class="fa fa-phone fa-2x"></i><br>
									<small class="view-small-txt1"><?=$student['mobile']?></small><center>
								</div>
							</div>
							<hr>
							
							<p class="dob">Address</p>
							<small class="view-small-txt1"><?=$student['address']?>,</small>
							<div class="row">
								<div class="col-xs-6">
									<p class="dob">WhatsApp No</p><small class="view-small-txt1"><?=$student['whatsapp_number']?></small>
								</div>
								
							</div>

						</div>
					</div>
				</div> -->

				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header view-popup-box-header">
							<a href="#" id="header-popup-icn"></a>
							<h4 class="modal-title"><?=$student['name']?></h4>
						</div>
						<div class="modal-body">
							<div class="popup-class">
							<p class="popup-txt">
									<a href="<?=base_url("admin_services/addenroll/".$student['member_id'])?>" id="popup-txt">
										<i class="fa fa-pencil" style="color:rgb(204,204,204)"></i>&nbsp;&nbsp;Add New Class
									</a>
								</p>
								<!-- <p class="popup-txt">
									<a href="<?=base_url("admin_services/updateadminrolestatus/".$role_info['admin_role_id']."/".$role_info['status'])?>" id="popup-txt">
										<i class="fa fa-times" style="color:rgb(204,204,204)"></i>&nbsp;&nbsp;<?=$role_info['status']==1?"Deactivate":"Activate"?>
									</a>
								</p> -->
								
							</div>
						</div>
					</div>
				</div>
			