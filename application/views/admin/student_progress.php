<?php //include_once 'includes/header.php'?>

<!-- <script type="text/javascript" src="js/widgets.min.js"></script>

<script type="text/javascript" src="js/globalize.js"></script>

<script type="text/javascript" src="js/jqueryui_forms.js"></script> -->

<!-- Main content -->

<style>
.table-responsive {
    overflow-x: auto !important;
    min-height: .01%;
}
.refar-price [class*="text-size-small"]{
  font-size:13px !important;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
  padding:12px 10px !important;
}
.panel-title{
  background-color: lightgrey;
  margin:0;
  padding-left: 15px;
  font-style: italic;
  font-weight: bold;
}
	.heading{
	background-color:black;
		color:red;
		text-align:center;
		margin-bottom:15px;
		width:96%;
		left:2%;
		
		
	}
.panel-heading{
  margin: 0;
  padding:0;
  padding-bottom: 20px;

}
.view{
  margin-top: 50px !important;
}

td.details-control {
    background: url('../resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('../resources/details_close.png') no-repeat center center;
}

.child{
  background-color: grey;
  text-align: center;
}
	h6{
	font-style:italic;
		border-bottom:1px solid blue;
		width:10%;
		text-align:center
	}
.studentid{
  
  width: 150px;
  overflow:hidden 
}
</style>

<div class="content-wrapper">

 

   <div class="row">

      <div class="col-md-16 margin-0">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title ">View Student Progress</h5>

            </div>
                     

		 
		  <div class="row">
			  <div class="col-md-16">
				  <div class="col-md-12">
					  <h1 style="padding-left:20px; margin-bottom:20px;"><?=$profile['name']?>(<?=$profile['class_name']?>)</h1>
				  </div>
				  
				 <?php if(!empty($progress)){
				  foreach($progress as $prog)
				  { ?>
				 
				  <div class="col-md-12">
				  <div class="col-md-12 heading">
				  <p style="margin:0;"><?=$prog['created_on']?></p>
				  </div>
				  
				  
				  <?php if(!empty($prog['uploads'])){?>
				  <div class="col-md-12"style="margin-bottom:15px;">
				  <h6>Photos</h6>
				 
				  <?php $upload = explode(",", $prog['uploads']);
					 
					  foreach($upload as $loads){?>
				  
				  <div class="col-md-6 text-center">
				  	<a href="#"><img src="<?=base_url("uploads/teacher_upload/".$loads)?>" width="300px"></a>
				  </div>
				  
				  <?php }?>
					  </div>
				 <?php }?>
				 
				 
				  
				  <?php if(!empty($prog['video'])){?>
					  <div class="col-md-12">
				  <h6>Videos</h6>
				 <?php $videos = explode(",", $prog['video']);
					  foreach($videos as $video){?>
				  
				  <div class="col-md-6">
					  <video controls width="300" height="200" style="padding-top: 10px;" id="videoId" class="image">
                               
						  <source src="<?=base_url("uploads/teacher_upload/".$video)?>">
					  
					  
                      
                      </video>
					 
				  </div>
				  
				  <?php }?>
					  </div>	  
											
				 <?php }?>
					  </div>
				  
				  <?php }
	
}?>
			  </div>
			  
			  </div>
				  </div>
		  
		  </div>
		  
	   </div>
 </div>


</div>

<!-- Footer -->




