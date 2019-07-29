
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
								