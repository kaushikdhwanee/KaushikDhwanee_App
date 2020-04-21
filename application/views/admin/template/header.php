<!DOCTYPE html>

<html lang="en">

   <head>

      <meta charset="utf-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{csrf_token}}">
      <title>Kaushik Dhwanee</title>

      <!-- Global stylesheets -->
      <script type="text/javascript">
   window.BASEURL ="<?=base_url()?>";
   </script>

   <!-- Global stylesheets -->

   <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

   <link href="<?=base_url("assets/admin/css/styles.css")?>" rel="stylesheet" type="text/css">

   <link href="<?=base_url("assets/admin/css/custom-styles.css")?>" rel="stylesheet" type="text/css">

   <link href="<?=base_url("assets/admin/css/bootstrap.css")?>" rel="stylesheet" type="text/css">

   <link href="<?=base_url("assets/admin/css/core.css")?>" rel="stylesheet" type="text/css">

   <link href="<?=base_url("assets/admin/css/components.css")?>" rel="stylesheet" type="text/css">

   <link href="<?=base_url("assets/admin/css/colors.css")?>" rel="stylesheet" type="text/css">
  
   <link href="<?=base_url("assets/admin/css/font-awesome.min.css")?>" rel="stylesheet" type="text/css">
   <link href="<?=base_url("assets/admin/css/flags.css")?>" rel="stylesheet" type="text/css">
   <link href="<?=base_url("assets/admin/vendors/fullcalendar-3.10.0/fullcalendar.min.css")?>"/>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
   
   

   


       <!-- <link href="http://localhost/jobssavvy/assets/admin/css/dataTables.bootstrap.css" rel="stylesheet" media="screen">
       <link href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" rel="stylesheet"> -->

    



      <!-- /global stylesheets -->

      <!-- Core JS files -->

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAIBZT8aT2n2k8VtZ1J1b6GF8bN0uAvN_g"></script>


   <script type="text/javascript" src="<?=base_url("assets/admin/js/pace.min.js")?>"></script>

   <script type="text/javascript" src="<?=base_url("assets/admin/js/jquery.min.js")?>"></script>
   <script type="text/javascript" src="<?=base_url("assets/admin/vendors/fullcalendar-3.10.0/lib/moment.min.js")?>"></script>
	<script type="text/javascript" src="<?=base_url("assets/admin/vendors/fullcalendar-3.10.0/fullcalendar.min.js")?>"></script>
   
    <script src="<?=base_url("assets/admin/js/jquery.geocomplete.js")?>"></script>

  <script type="text/javascript" src="<?=base_url("assets/admin/js/jquery.validate.js")?>"></script>

   <script type="text/javascript" src="<?=base_url("assets/admin/js/bootstrap.min.js")?>"></script>

   <script type="text/javascript" src="<?=base_url("assets/admin/js/blockui.min.js")?>"></script>
   <script type="text/javascript" src="<?=base_url("assets/admin/js/countrypicker.min.js")?>"></script>
   <script type="text/javascript" src="<?=base_url("assets/admin/js/jquery.flagstrap.js")?>"></script>
   

      <!-- /core JS files -->

      <!-- Theme JS files -->
	  <script type="text/javascript" src="<?=base_url("assets/admin/js/form_layouts.js")?>"></script>

	  <script type="text/javascript" src="<?=base_url("assets/admin/js/select2.min.js")?>"></script>

      <script type="text/javascript" src="<?=base_url("assets/admin/js/legacy.js")?>"></script>
	   
		 <script type="text/javascript" src="<?=base_url("assets/admin/js/core.min.js")?>"></script>
		  <script type="text/javascript" src="<?=base_url("assets/admin/js/selectboxit.min.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("assets/admin/js/bootstrap_select.min.js")?>"></script>
      <script type="text/javascript" src="<?=base_url("assets/admin/js/form_bootstrap_select.js")?>"></script>
      <!-- <script type="text/javascript" src="<?=base_url("assets/admin/js/form_selectbox.js")?>"></script>-->
      <script type="text/javascript" src="<?=base_url("assets/admin/js/uniform.min.js")?>"></script>
   <script type="text/javascript" src="<?=base_url("assets/admin/js/switchery.min.js")?>"></script>
   <script type="text/javascript" src="<?=base_url("assets/admin/js/app.js")?>"></script>
   <script type="text/javascript" src="<?=base_url("assets/admin/js/ripple.min.js")?>"></script>
   <script type="text/javascript" src="<?=base_url("assets/admin/js/bootstrap_multiselect.js")?>"></script>
   <script type="text/javascript" src="<?=base_url("assets/admin/js/form_multiselect.js")?>"></script>
  <script type="text/javascript" src="<?=base_url("assets/admin/js/jgrowl.min.js")?>"></script> 
  <script type="text/javascript" src="<?=base_url("assets/admin/js/moment.min.js")?>"></script> 
  	
  <script type="text/javascript" src="<?=base_url("assets/admin/js/daterangepicker.js")?>"></script>
  <script type="text/javascript" src="<?=base_url("assets/admin/js/anytime.min.js")?>"></script>
  <script type="text/javascript" src="<?=base_url("assets/admin/js/picker.js")?>"></script>
 <script type="text/javascript" src="<?=base_url("assets/admin/js/picker_date.js")?>"></script>
  <script type="text/javascript" src="<?=base_url("assets/admin/js/picker.date.js")?>"></script>

  <script type="text/javascript" src="<?=base_url("assets/admin/js/picker.time.js")?>"></script>

<!--  <script type="text/javascript" src="<?=base_url("assets/admin/js/jquery-ui.js")?>"></script>--><!--  picker.date.js-->
  <script type="text/javascript" src="<?=base_url("assets/admin/js/numeric.min.js")?>"></script>
  <script type="text/javascript" src="<?=base_url("assets/admin/js/widgets.min.js")?>"></script>

<script type="text/javascript" src="<?=base_url("assets/admin/js/globalize.js")?>"></script>

<script type="text/javascript" src="<?=base_url("assets/admin/js/jqueryui_forms.js")?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">



 <!-- <script src="http://localhost/jobssavvy/assets/admin/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="http://localhost/jobssavvy/assets/admin/js/dataTables.bootstrap.js" type="text/javascript"></script>  -->


<script type="text/javascript">
  $(document).ready(function() {
   // $('#example').DataTable();
} );
</script>
<style>
.navbar-brand img{
  width:100%;
  height:40px;
  margin-top:8px;
}
#loading {
width: 100%;
height: 100%;
top: 0px;
left: 0px;
position: fixed;
display: block;
opacity: 0.7;
background-color: #000;
z-index: 1000;
text-align: center;
}

#loading-image {
position: absolute;
top: 250px;

margin:0px auto;
z-index: 100;
}
.black1{
   background-color: #000; !important
}
</style>
   </head>

   <body class="navbar-bottom navbar-top">


    <!--<div id="loading">
    
    <img id="loading-image" src="<?=base_url("assets/admin/images/loading.gif")?>" alt="">
</div>-->












      <!-- Main navbar -->

      <div class="navbar navbar-inverse bg-indigo navbar-fixed-top">

         <div class="navbar-header black1">

            <a class="navbar-brand " href="admin/index.php"><img src="<?=base_url("assets/admin/images/logo1.png")?>" alt=""></a>

            <ul class="nav navbar-nav visible-xs-block">

               <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>

               <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>

            </ul>

         </div>

         <div class="navbar-collapse collapse" id="navbar-mobile">

            <ul class="nav navbar-nav">

               <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">

               <li class="dropdown dropdown-user">

                  <a class="dropdown-toggle" data-toggle="dropdown">

                  <img src="<?=base_url("assets/admin/images/admin.jpg")?>" alt="">

                  <span><?=$this->session->userdata("username")?></span>

                  <i class="fa fa-angle-down"></i>

                  </a>

                  <ul class="dropdown-menu dropdown-menu-right">

                   <li><a href="<?=base_url("admin/logout")?>"><i class="fa fa-power-off"></i> Logout</a></li>

                  </ul>

               </li>

            </ul>

         </div>

      </div>

      <div class="page-container" style="min-height:153.76666259765625px">
     

      <!-- Page content -->

      <div class="page-content">

      <!-- Main sidebar -->

      <div class="sidebar sidebar-main sidebar-default">

         <div class="sidebar-content">

            <!-- Main navigation -->

            <div class="sidebar-category sidebar-category-visible">

               <div class="sidebar-user-material">

                  <div class="category-content">

                     <div class="sidebar-user-material-content">

                        <a href="#"><img src="<?=base_url("assets/admin/images/admin.jpg")?>" class="img-circle img-responsive" alt=""></a>

                       <!-- <h6>ADMIN </h6>

                        <span class="text-size-small">Hyderabad</span>-->

                     </div>

                  </div>

               </div>

               <div class="category-content no-padding">

                  <ul class="navigation navigation-main navigation-accordion">

                  <!-- Main -->

                  <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>

                  <li><a href="<?=base_url("admin/dashboard")?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

				    <li>

                     <a><i class="fa fa-cubes active"></i> <span>Branches</span></a>

                     <ul>
                   <?php if($this->session->userdata("user_type")==1){?>
                        <li class="<?= in_array($this->uri->segment(2),array("addbranch","viewbranches"))? "active" : ""  ?>"><a href="<?=base_url("admin/addbranch")?>">Add Branches</a></li>
                      <?php }?>
                        <li><a href="<?=base_url("admin/viewbranches")?>">View Branches</a></li>

                     </ul>

                  </li>
                   <?php if($this->session->userdata("user_type")==1){?>
				            <li>

                     <a href="#"><i class="fa fa-users"></i> <span>Categories</span></a>

                      <ul>
                       
                        <li class="<?= in_array($this->uri->segment(2),array("addcategory"))? "active" : ""  ?>"><a href="<?=base_url("admin/addcategory")?>">Manage Categories </a></li>
                        
                     

                     </ul>

                  </li>
                  <?php }?>
				    <li>

                     <a><i class="fa fa-desktop"></i> <span>Class</span></a>

                     <ul>
                      <?php if($this->session->userdata("user_type")==1){?>
                        <li class="<?= in_array($this->uri->segment(2),array("addclass","viewclasses"))? "active" : ""  ?>" ><a href="<?=base_url("admin/addclass")?>" id="layout1">Add Class </a></li>
                      <?php }?>
                        <li ><a href="<?=base_url("admin/viewclasses")?>" id="layout1"> View Classes </a></li>

                     </ul>

                  </li>

                  <li>

                     <a href="#"><i class="fa fa-tachometer"></i> <span>Teachers</span></a>

                     <ul>
                      <?php if($this->session->userdata("user_type")==1){?>
                        <li class="<?= in_array($this->uri->segment(2),array("addteacher","viewteachers","searchteacherschedule"))? "active" : ""  ?>"><a href="<?=base_url("admin/addteacher")?>">Add Teacher</a></li>
                      <?php }?>
                        <li><a href="<?=base_url("admin/viewteachers")?>">View Teacher </a></li>

                      <li><a href="<?=base_url("admin/searchteacherschedule")?>">Check Teacher Schedule</a></li>

                     </ul>

                  </li>

				          <li>

                     <a href="#"><i class="fa fa-users"></i> <span>Batches</span></a>

                      <ul>

                        <li class="<?=in_array($this->uri->segment(2), array("batches"))? "active" : "" ?>"><a href="<?=base_url("admin/batches")?>">Add Batches</a></li>

                     

                     </ul>

                  </li>

                  

                
           <?php if($this->session->userdata("user_type")==1){?>
				   <li>

                     <a href="#"><i class="fa fa-users"></i> <span>Manage Admin</span></a>

                      <ul>

                        <li  class="<?= in_array($this->uri->segment(2),array("addadminrole","viewadminroles"))? "active" : ""  ?>" ><a href="<?=base_url("admin/addadminrole")?>">Add Admin</a></li>

                        <li><a href="<?=base_url("admin/viewadminroles")?>">View Admin</a></li>

                     </ul>

                  </li>
              <?php }?>
                  <li><a href="<?=base_url("admin/notifications")?>"><i class="icon-home4"></i> <span>Notifications</span></a></li>

                  <li>

                     <a href="#"><i class="fa fa-inr" aria-hidden="true"></i> <span>Fee Management</span></a>

                      <ul>
               <?php if($this->session->userdata("user_type")==1){?>
					     <li class="<?= in_array($this->uri->segment(2),array("addplan","viewplans","collectfees"))? "active" : ""  ?>"><a href="<?=base_url("admin/addplan")?>">Add/edit Plan</a></li>
                <?php }?>
                       <li><a href="<?=base_url("admin/viewplans")?>">View Plans</a></li> 

                        <li><a href="<?=base_url("admin/collectfees")?>">Collect Fee</a></li>

                        <li><a href="<?=base_url("admin/viewreceipt")?>">View Receipts</a></li>

                     </ul>

                  </li>

				  <!--<li>

                     <a href="#"><i class="fa fa-users"></i><span>Batch Management</span></a>

                      <ul>

                        <li><a href="view-bills.php">Batch Glance</a></li>

                        

                     </ul>

                  </li>-->

                    <li  class="<?= in_array($this->uri->segment(2),array("creatediscounts",'addpromotions'))? "active" : ""  ?>">

                     <a href="#"><i class="fa fa-users"></i><span>Promotions</span></a>

                      <ul>
                       <?php if($this->session->userdata("user_type")==1){?>
                        <li><a href="<?=base_url("admin/creatediscounts")?>">Create Discounts</a></li>
                        <?php }?>
                          <li><a href="<?=base_url("admin/addpromotions")?>">Additional Promotions </a></li>

                      

                     </ul>

                    </li>

                     <li  class="<?= in_array($this->uri->segment(2),array("viewleaves"))? "active" : ""  ?>">

                     <a href="#"><i class="fa fa-users"></i><span>Leaves</span></a>

                      <ul>

                        <li><a href="<?=base_url("admin/viewleaves")?>">Manage Leaves</a></li>

                          

                      

                     </ul>

                    </li>

                     <li  class="<?= in_array($this->uri->segment(2),array("viewfeedbacks"))? "active" : ""  ?>">

                     <a href="#"><i class="fa fa-users"></i><span>Feedbacks</span></a>

                      <ul>

                        <li><a href="<?=base_url("admin/viewfeedbacks")?>">Manage Feedbacks</a></li>

                          

                      

                     </ul>

                    </li>

				    <li>

                     <a href="#"><i class="fa fa-users"></i><span>Demo Class Management</span></a>

                      <ul>

                        <li  class="<?= in_array($this->uri->segment(2),array("view_democlasses"))? "active" : ""  ?>"><a href="<?=base_url("admin/view_democlasses")?>">View Requests</a></li>

                       <!--  <li><a href="<?=base_url("admin/viewhistory")?>">View History</a></li> -->

                     </ul>

                    </li>

					  <li>

                     <a href="#"><i class="fa fa-users"></i><span>Manage Students</span></a>

                      <ul>

                        <li class="<?= in_array($this->uri->segment(2),array("addstudent","viewstudents"))? "active" : ""  ?>"><a href="<?=base_url("admin/addstudent")?>">Add Students</a></li>

                         <!--<li><a href="#">Enroll Students</a></li>--><?php //=base_url("admin/addenrollstudent")?>
                   <li><a href="<?=base_url("admin/viewusers")?>">View Users</a></li>
                   <li><a href="<?=base_url("admin/viewstudents")?>">View Student Profiles</a></li>
                   

                     </ul>

                    </li>
					  <li>

                     <a href="#"><i class="fa fa-users"></i><span>Summer camp</span></a>

                      <ul>
						  <li class="<?= in_array($this->uri->segment(2),array("viewstudent"))? "active" : ""  ?>"><a href="<?=base_url("admin/summercamp")?>">Add                           Students</a></li>
                     <li><a href="<?=base_url("admin/viewcampstudents")?>">View Students</a></li>
						  <li><a href="<?=base_url("admin/addlocation")?>">Add Location</a></li>
						  <li><a href="<?=base_url("admin/viewlocation")?>">View Location</a></li>
						  <li><a href="<?=base_url("admin/summerplan")?>">Add Plan</a></li>
                          <li><a href="<?=base_url("admin/viewsummerplan")?>">View Plan</a></li>
						  <li><a href="<?=base_url("admin/view_sumcamp_collection")?>">Summercamp Collection Report</a></li>
                        
						  
						  
                   

                     </ul>

                    </li>

					 <li>

                     <a href="#"><i class="fa fa-file-text" aria-hidden="true"></i><span>Report</span></a>

                       <ul>

                        <li><a href="<?=base_url("admin/viewcollection")?>">Fees Collection Report</a></li>

                        <li><a href="<?=base_url("admin/viewenrollment")?>">Enrollments Report</a></li>
						  

            						 

                     </ul> 

                    </li>
					  <li><a href="<?=base_url("admin/whatsapplink")?>"><i class="fa fa-users"></i>Add Whatsapp Link</a></li>
						  
                    <li><a href="<?=base_url("admin/attendance")?>"><i class="icon-home4"></i> <span>Attendance</span></a></li>
                    <li><a href="<?=base_url("admin/eventcalender")?>"><i class="icon-home4"></i> <span>Event Calender</span></a></li>


					

               </div>

            </div>

         </div>

      </div>

<button type="button" id="show-popup" style="display:none;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirmation</h4>
          </div>
          <div class="modal-body">
            <p><?= $this->session->flashdata("message"); ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    
      </div>
    </div>
 <?php
    if($this->session->flashdata("message") != null)
    {
  ?>
    <script>
      $(function(){
        $("#show-popup").trigger("click");
      });
    </script>
  <?php }?> 

