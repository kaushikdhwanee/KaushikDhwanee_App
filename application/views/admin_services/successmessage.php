	<button type="button" id="show-popup" style="display:none;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#successMessage">Open Modal</button>
    <!-- Modal -->
    <div id="successMessage" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirmation</h4>
          </div>
          <div class="modal-body">
            <p class="txt-popup Messagez"><?= $this->session->flashdata("message"); ?></p>
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

   <script type="text/javascript">
       
       
       function choosePhoto() {
      //alert("hi");
           var file = Android.choosePhoto();
     
   
     
       }
       function setFilePath(file) {
   
         Android.showToast(file);
          if(file != '')
          {
          var image_show = 'data:image/png;base64,'+file;
          $("#photo1").val(file);
          $(".new_image").attr("src",image_show);
          }
       }
       function setFileUri(uri) {
     
          
      
       }
   </script> 