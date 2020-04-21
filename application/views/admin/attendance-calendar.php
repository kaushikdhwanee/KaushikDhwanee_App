<style type="text/css">
	
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

	
    body
{
    font-family:Arial;
    font-size : 10pt;
    padding:5px;
}

.Highlighted {
   background-color : lightGreen !important;
   background-image :none !important;
   color: White !important;
   font-weight:bold !important;
   font-size: 12pt;
   border-radius: 3px;
}
</style>
<p style="font-weight: 900;">Count : <span id="attdat"><?= count($count) ?></span></p>
<div id="calendar" style="width: 600px"></div>
<script type="text/javascript">

$(document).ready(function() {
         var eventDates = {};
   <?php
                       
foreach($attendance as $data1){?>
  eventDates[ new Date( '<?=date('m/d/Y', strtotime($data1['date'])); ?>' )] = new Date( '<?=date('m/d/Y', strtotime($data1['date'])) ?>').toString();
<?php } 
?>

//eventDates[new Date('2018-07-30')] = new Date('2018-07-30');
console.log(eventDates);
  /*$(".event").prop( "disabled", true );*/
  
 jQuery('#calendar').datepicker({
  maxDate: 'today',
  dateFormat:'yy-mm-dd',
  onChangeMonthYear: function (year, month, inst) {
    $.ajax({
       type: "POST",
       dataType: 'json',
       url: "<?=base_url('admin/month_attendance')?>",
       data: {'month': month,'year': year,'enroll_id':'<?= $this->uri->segment(3) ?>'},       
       success: function(data) {         
           $('#attdat').text(data);
      }
    });
  },  
  beforeShowDay: function( date ) {
    console.log(eventDates);
    var highlight = eventDates[date];

    //alert(highlight);
    
    if(highlight) {
      
       return [true, "Highlighted", highlight];
       
    } else {
       return [true, '', ''];
    }
   }

  });

});
   
</script>