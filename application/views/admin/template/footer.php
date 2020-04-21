<style>
  
  .footer{
    position: fixed;
    
    z-index: 2000 !important;
  }
</style>

	<div class="navbar navbar-default navbar-fixed-bottom footer">

		<ul class="nav navbar-nav visible-xs-block">

			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>

		</ul>



		<div class="navbar-collapse collapse" id="footer">

			<div class="navbar-text">

				&copy; 2019. <a href="<?=base_url()?>" class="navbar-link">Kaushikdhwanee.com </a> by <a href="" class="navbar-link" target="_blank">KaushikDhwanee</a>

			</div>



			<div class="navbar-right">

				<ul class="nav navbar-nav">

					<li><a href="#">About</a></li>

					<li><a href="#">Terms</a></li>

					<li><a href="#">Contact</a></li>

				</ul>

			</div>

		</div>

	</div>


<script language="javascript" type="text/javascript">
$(function () {
$("#fileupload").change(function () {
	//alert("hiiiii");
if (typeof (FileReader) != "undefined") {
var dvPreview = $("#dvPreview");
dvPreview.html("");
var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
$($(this)[0].files).each(function () {
var file = $(this);
if (regex.test(file[0].name.toLowerCase())) {
var reader = new FileReader();
reader.onload = function (e) {
$("#showimg_div").remove();
var img = $("<img />");
img.attr("style", "height:100px;width: 100px");
img.attr("src", e.target.result);
dvPreview.append(img);
}
reader.readAsDataURL(file[0]);
} else {
alert(file[0].name + " is not a valid image file.");
dvPreview.html("");
return false;
}
});
} else {
alert("This browser does not support HTML5 FileReader.");
}
});
});
 $(function() {

    $( "#datepicker" ).datepicker({

      changeMonth: true,

      changeYear: true,

	  dateFormat: "dd-mm-yy",
	  yearRange: "-50:+0"

    });

    $( "#datepicker1" ).datepicker({

      //changeMonth: true,

      //changeYear: true,

	  dateFormat: "dd-mm-yy"

	  

    });

    $( "#datepicker2" ).datepicker({

      //changeMonth: true,

      //changeYear: true,

	  dateFormat: "dd-mm-yy",
	  //minDate:0

	  

    });

     $( ".datepicker2" ).datepicker({

      //changeMonth: true,

      //changeYear: true,

	  dateFormat: "dd-mm-yy",
	  minDate:0

	  

    });



   function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $("#dvPreview").find("img").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(".imgInp").change(function(){
	
    readURL(this);
});


  });
</script>




<script>
  $(window).load(function() {
   $('#loading').hide();
});
</script>

<script>
    $( document ).ready(function() {
   $( ".register" ).click(function(){
       //alert("ok");
     // $("#loading").show();
  });
   
});
</script>

