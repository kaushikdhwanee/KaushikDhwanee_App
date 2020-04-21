<style>
.loaderdiv{
position: fixed; left: 0; top: 0; z-index: 999; width: 100%; height: 100%; overflow: visible; background: #333 ;opacity: 0.5;
}
.loader {
  margin: 0px auto;
    margin-top: 21%;
}
	
.panel-title{
  background-color: lightgrey;
  margin:0;
  padding-left: 15px;
  font-style: italic;
  font-weight: bold;
	}	
	.panel-heading{
  margin: 0;
  padding:0;
  padding-bottom: 50px;

}
.my-error-class {
    color:#FF0000;  /* red */
}
.text-danger{
color: #e32 !important;
font-size: x-small!important; 
}
.require:after {
    content:" *";
	font-size: x-small; 
    color: red;
	display:inline;
  }
</style>
<div class="loaderdiv" style="display:none"><div class="loader" ></div></div>
<div class="content-wrapper">
   <div class="row" style="margin-right:0; margin-left:0">
      <div class="col-lg-12">
<div class="news-area section-padding" id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            
            
                <!-- News Page Title-->
                <div class="page-title">
                        
                    <h2 >Payment Confirmation</h2>
					
					<?php if($f_code=="Ok"){ ?>
					<p>Welcome to KaushikDhwanee! </p>
					<p>Payment of Rs <?=$amt?> has been made successfully on <?=$date?>
					<p> Please click <a href="<?=base_url("register/insert")?>" style="color:white;"><button type="button" class="btn btn-primary">OK</button></a> for successful enrollment</p>
					
<?php } else { ?>
				<p> Your Transaction couldnot be processed.</p>
					<p>Please try again later</p>	

<?php } ?>
					

				</div>
							
							
						

					</div>

					
				</div>
			</div>
	</div>
							
							
						

					</div>

					
				</div>
			</div>
	
			<!-- /main content -->

		<script>
		$("button").click(function() {
		
	$('.loaderdiv').show();
		});
</script>

	<!-- Footer -->
	


