<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/admin_services/css/plan')?>/bootstrap.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/plan')?>/swiper.css" rel="stylesheet">
		<link href="<?=base_url('assets/admin_services/css/plan')?>/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
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
							  <h6><i class="fa fa-plus-circle"></i><br>SCHEDULE CLASSES</h6>
							</div>
							<!-- <div class="swiper-slide over" >
							  <h6><i class="fa fa-eye"></i><br>VIEW PLAN</h6>
							</div> -->
						</div><!--swiper-wrapper end-->
					</div><!--swiper-container end-->
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper swiper1" >
							<div class="swiper-slide">
								<div class="plan-box">
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

if(!empty($classes)){
foreach ($classes as $key => $value) {
?>

 <div class="panel panel-default">
                                          <div class="panel-heading monday-box"><?=$days[$key]?></div>
                                          <div class="panel-body">
                                              <div class="table-responsive"> 
                                             <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>BatchNo</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Class Name</th>
                                                    <!-- <th>Branch Name</th> -->
                                                  </tr>
                                                </thead><tbody>
                                                <?php
                                                if(!empty($value)){
                                                   $i=1;
                                                   foreach ($value as $batch_info) {?>
                                                     <tr>
                                                    <td>Batch<?=$i?></td>
                                                    <td><?=$batch_info['start_time']?></td>
                                                    <td><?=$batch_info['end_time']?></td>
                                                    <td><?=$batch_info['class_name']?></td>
                                                  <!--   <td><?=$batch_info['branch_name']?></td> -->
                                                  </tr>
                                                <?php  $i++;  }
                                                }else{ echo "<tr><td> No results</td></tr>";}
                                                ?>
                                                
                                                  
                                                  
                                                </tbody>  
                                              </table> 
                                              </div>
                                          </div>
                                         </div>

                     <?php
                                }
 }else{
                                    echo " <div class='panel panel-default'>
                                          <div class='panel-heading monday-box'>No results</div></div></div>" ;  
                                 }
                                 ?>
								</div><!--plan-box end-->
							</div><!---swiper-slide end 1-->
							
							
							
							
						</div><!--swiper-wrapper end-->
						
						
					</div><!--swiper-container end-->
				</div><!--offer end-->
			</section><!--tab slide end-->
		</div><!--hidden-sm hidden-lg hidden-md-->
	
	
		<script src="<?=base_url("assets/admin_services/js/jquery.min.js")?>"></script>
		<script src="<?=base_url("assets/admin_services/js/jquery.validate.js")?>"></script>


<script src="<?=base_url("assets/admin_services")?>/js/bootstrap.min.js"></script>
		<script src="<?=base_url("assets/admin_services")?>/js/swiper.js"></script>
		<!---slider tab code-->
		
		
	
	</body>
</html>

