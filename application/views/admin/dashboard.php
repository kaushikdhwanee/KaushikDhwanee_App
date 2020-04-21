			<!-- Main content -->

			<div class="content-wrapper">

			

				<!-- Dashboard content -->

				<div class="row">

					<div class="col-lg-12">



						<div class="panel panel-flat">

							<div class="panel-heading">

								
								<h5 class="panel-title"><a href="<?=base_url("admin/view_democlasses")?>">Pending Demo Requests: <?=$demos_count?></a></h5> 
								<h5 class="panel-title"><a href="<?=base_url("admin/viewleaves")?>">Pending Leave Applications: <?=$leave_requests_count?></a> </h5>
								<h5 class="panel-title"><a href="<?=base_url("admin/viewfeedbacks")?>">Pending Feedbacks: <?=$feedback_count?></a> </h5>
								<h5 class="panel-title"><a href="<?=base_url("admin/todayregistration")?>">Pending Enrollments:<?=$registration_count?></a> </h5>
								<h5 class="panel-title"><a href="<?=base_url("admin/todaysenrollment")?>">Today's Enrollment: <?=$enrollment_count?></a> </h5>
								<h5 class="panel-title"><a href="<?=base_url("admin/todaycollection")?>">Today's Fees Collection: <?=$total?></a> </h5>
								<h5 class="panel-title"><a href="<?=base_url("admin/sumcamp_enroll")?>">Summer Camp Enrollments: <?=$sumcamp_enroll?></a> </h5>
								<h5 class="panel-title"><a href="<?=base_url("admin/sumcamp_collection")?>">Summer Camp Collection: <?=$sumcamp_total?></a> </h5>
								<h5 class="panel-title"><a href="<?=base_url("admin/upcomingpayments")?>">Upcoming Pending Payments: <?=$upcoming_pending_fees?></a> </h5>
							
							</div>


<div class="mar-one"></div>

						</div>



					</div>



					<div class="col-lg-3">



						<!-- Progress counters -->

						



					</div>

				</div>

			</div>

			<!-- /main content -->



		</div>

		

	</div>


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
     $("#fileupload").change(function(){
    	//alert($('input[type=file]').val().replace(/C:\\fakepath\\/i, ''));
    	$(".image_name").html($('input[name=image]').val().replace(/C:\\fakepath\\/i, ''));
    });
      $("#fileupload1").change(function(){
    	//alert($('input[type=file]').val().replace(/C:\\fakepath\\/i, ''));
    	$(".image_name1").html($('input[name=mobile_image]').val().replace(/C:\\fakepath\\/i, ''));
    });
  });
</script>
	

