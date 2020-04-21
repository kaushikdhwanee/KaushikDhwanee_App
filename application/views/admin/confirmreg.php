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

<div class="content-wrapper">
   <div class="row" style="margin-right:0; margin-left:0">
      <div class="col-lg-12">
<div class="news-area section-padding" id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            
            
                <!-- News Page Title-->
                <div class="page-title">
                        
                    <h2 >Thank You</h2>
                
<p>
	You have been successfully Registered and Enrolled with <span style="color:red"><?=$class_name?></span> starting from <span style="color:red"><?=$start_date?></span>
					</p>
					<p>Details of enrollment has been sent to registered email.</p>
					<p>Click the link <a href="<?=$whatsapp['whatsapp_link']?>"><?=$whatsapp['whatsapp_link']?></a> OR Scan the QR code to join whatsapp group of your class.</p>
					<p><img src="<?=base_url("uploads/qr_codes/".$whatsapp['qrcode'])?>" style="width:100px;"></p>
					
				<p>Please contact below number for further details</p>
					<span style="color:red"><?=$branches['mobile']?></span>
					
					<h3 style="margin-top:20px;">Happy Learning !</h3>
						<a href="http://kaushikdhwanee.in" style="margin-top:20px;">close</a>
				
				</div>
							
							
						

					</div>

					
				</div>
			</div>
	</div>
							
							
						

					</div>

					
				</div>
			</div>
	
			<!-- /main content -->

		
		
	

	<!-- Footer -->
	


