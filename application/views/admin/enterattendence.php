<style type="text/css">
.border {
    
    display: block;
    
    
    border-bottom: 1px solid #000;
    margin-bottom:15px;
    
    padding: 0;
}
.icon-calendar{
	color:rgb(before);
	font-weight: bold;
}
  
</style>
			<div class="content-wrapper">
     			<div class="row">
					<div class="col-lg-12">

						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Enter Student Attendence</h5>
							</div>
							<div class="loader" style="display:none"></div>
							<div class="col-md-12 product">
							<div class="form-group  col-md-6">
                 <h4><?=$user_info['name']." (".$user_info['class_name'].")"?></h4>
                </div>
                  <div class="clearfix"></div>
              
                    <div>
							<form method="post" action="<?=base_url("admin/insertattendence")?>" id="student" enctype="multipart/form-data" >
							  <div class="col-md-12 ">
							    
                
                  <div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Date</p></label>
								<div class="form-group  col-md-4">
									<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar"></i></span>
										<input type="text" class="form-control" id="datepicker1" class="datepicker1" name="date" placeholder="Select Date" >
									</div>
								</div>
								 
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">Start Time</p></label>
								<div class="form-group col-md-4">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
										<input type="text" class="form-control" id="timepicker2" class="timepicker" name="time_in" placeholder="16:30">
									</div>
								</div>
								 
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4"><p class="sib-dis">End Time</p></label>
								<div class="form-group  col-md-4">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
										<input type="text" class="form-control" id="timepicker3" class="timepicker" name="time_out" placeholder="16:30" >
										<input type="hidden" name="enrolls" value="<?=$user_info['id']?>">
									</div>
								</div>
								 
									<div class="clearfix"></div>
								</div>
             
						    
								<div class="sub-btn form-group col-md-2">
								<input type="hidden" id="" class="registration_amount" name="member_id" value="<?=$member_id?>">
		<button type="submit" class="btn btn-primary active legitRipple center register">Submit</button>
		</div>         
                                                                                 
</div>

</form>

</div>



							</div>
							
							<div class="clearfix"></div>
						</div>
						

					</div>

					<div class="col-lg-3">

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



            
	
  $(document).ready(function(){

  	$('#datepicker1').datepicker({
        dateFormat: 'yy-mm-dd',
       
        changeMonth: true,
        changeYear: true,
        yearRange: '2012:c',

        minDate: new Date(2012, 3 - 1, 01),
		maxDate: new Date()
        
        
    });

  	
                $('#timepicker2').datetimepicker({
                	
                	icons: {up: 'fa fa-angle-up',
		                   down: 'fa fa-angle-down',
		                   time: 'fa fa-clock-o'},
                    format: 'LT'
                });
           $('#timepicker3').datetimepicker({
                	
                	icons: {up: 'fa fa-angle-up',
		                   down: 'fa fa-angle-down',
		                   time: 'fa fa-clock-o'},
                    format: 'LT'
                });

     $("#student").validate({
      rules: {
        
        date:"required",
        time_in:"required"
        
        
      }
    });

  

	

  });


</script>