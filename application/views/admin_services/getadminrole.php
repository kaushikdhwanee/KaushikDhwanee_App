<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header view-popup-box-header">
							<a href="#" id="header-popup-icn"></a>
							<h4 class="modal-title"><?=$role_info['name']?></h4>
						</div>
						<div class="modal-body">
							<div class="popup-class">
							<p class="popup-txt">
									<a href="<?=base_url("admin_services/addadminrole/".$role_info['admin_role_id'])?>" id="popup-txt">
										<i class="fa fa-pencil" style="color:rgb(204,204,204)"></i>&nbsp;&nbsp;Edit
									</a>
								</p>
								<p class="popup-txt">
									<a href="<?=base_url("admin_services/updateadminrolestatus/".$role_info['admin_role_id']."/".$role_info['status'])?>" id="popup-txt">
										<i class="fa fa-times" style="color:rgb(204,204,204)"></i>&nbsp;&nbsp;<?=$role_info['status']==1?"Deactivate":"Activate"?>
									</a>
								</p>
								
							</div>
						</div>
					</div>
				</div>