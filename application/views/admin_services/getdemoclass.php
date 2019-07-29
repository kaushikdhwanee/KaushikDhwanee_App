				<?php 
				//print_r($user);
				?>
				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header view-popup-box-header">
							<a href="#" id="header-popup-icn"></a>
							<h4 class="modal-title"><?=$user['name']?></h4>
						</div>
						<div class="modal-body">
							<div class="popup-class">
							<p class="popup-txt">
									<a href="<?=base_url("admin_services/updatedemorequeststatus/".$user['id']."/2")?>" id="popup-txt">
										<i class="fa fa-pencil" style="color:rgb(204,204,204)"></i>&nbsp;&nbsp; In progress
									</a>
								</p>

								<p class="popup-txt">
									<a href="<?=base_url("admin_services/updatedemorequeststatus/".$user['id']."/3")?>" id="popup-txt">
										<i class="fa fa-pencil" style="color:rgb(204,204,204)"></i>&nbsp;&nbsp; Demo Scheduled
									</a>
								</p>
								<p class="popup-txt">
									<a href="<?=base_url("admin_services/updatedemorequeststatus/".$user['id']."/4")?>" id="popup-txt">
										<i class="fa fa-pencil" style="color:rgb(204,204,204)"></i>&nbsp;&nbsp; Converted
									</a>
								</p>
								<p class="popup-txt">
									<a href="<?=base_url("admin_services/updatedemorequeststatus/".$user['id']."/5")?>" id="popup-txt">
										<i class="fa fa-pencil" style="color:rgb(204,204,204)"></i>&nbsp;&nbsp; Did Not Joined
									</a>
								</p>

							</div>
						</div>
					</div>
				</div>
			