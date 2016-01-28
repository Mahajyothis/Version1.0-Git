<!DOCTYPE html>
<html>
<!--Headsection-->
<head>
<meta charset='utf-8' />
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
<link rel='stylesheet' href='assets/lib/cupertino/jquery-ui.min.css' type="text/css"  />
<link href='assets/css/fullcalendar.css' rel='stylesheet' />
<link href='assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
<link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
<script src='assets/lib/moment.min.js'></script>
<script src='assets/lib/jquery.min.js'></script>
<script src='assets/js/fullcalendar.min.js'></script>
<!---css styles--->
<style>
.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
	
	background-color:goldenrod;
	
	
}
</style>
<!---/css styles--->
	<?php
				
				$langquery="SELECT * FROM `internationalcalendar` "; 
$langresult= $this->db->query($langquery);
					 
				?>
<!----java script---->
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			theme: true,
			header: {
				left: 'prev,month,agendaWeek,agendaDay',
				center: 'title',
				right: 'next'
			},
			defaultDate: new Date(),
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: [
				
			<?php if ($langresult->num_rows() > 0)
{
   foreach ($langresult->result() as $row)
   {			
				
				
    ?>
				{
		
					title: '<?php echo $row->Title; ?>',
					
					start: '<?php echo $row->StartDate.$row->Stime;?>',
					end: '<?php echo $row->EndDate.$row->Etime;?>'
						
					
					
				},
				<?php }}   ?>
				
				
			]
		});
		
	});

</script>
<!----/java script---->
<!---/css styles-->
<style>

	body {
		
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		margin: 0 auto;
	}

	#calendar {
		 max-width: 45%;
		margin: 0 auto;
	}
table 
{
    border-collapse: separate;
    border-radius: 10px;
}

table tr 
{
    border-radius: 10px;
}

table tr td
{
    border: 1px solid #fc0;
    border-radius: 10px;
}

table.collapse
{
    border-collapse: collapse;
}
.back-img{
	height:100vh;
	    width: auto;
  font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; display:inline-block;font-weight:bold; color: #FFFFFF;
  background-color: rgba(2, 3, 5,0.8);
 /*background-color: #f36f2e; background-image: -webkit-gradient(linear, left top, left bottom, from(#f36f2e), to(#f3712f));
 background-image: -webkit-linear-gradient(top, #f36f2e, #f3712f);
 background-image: -moz-linear-gradient(top, #f36f2e, #f3712f);
 background-image: -ms-linear-gradient(top, #f36f2e, #f3712f);
 background-image: -o-linear-gradient(top, #f36f2e, #f3712f);
 background-image: linear-gradient(to bottom, #f36f2e, #f3712f);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#ff9a9a, endColorstr=#ff4040);*/
}
.top-txt{
 
  margin-right: 15px;
  text-align: center;}

.icn-sze{font-size: 75px;}
   .icn-clr{color: #c55227;}
   .mnth-title{text-align: center;
  color: #c55227;
  padding: 7px;
  }
  
.fc-month-button{position: absolute !important;
margin-top: 29px !important;
margin-left: -235px !important;
border-radius: 32px;
border: medium none !important;
text-align: center;
padding: 82px !important;
font-family: arial,helvetica,sans-serif;
text-decoration: none;
font-weight: bold;
color: #C55227;
outline: medium none;
background: transparent url("assets/img/MONTH.png") no-repeat scroll 35px 18px / 142px 138px;
text-transform: capitalize;

	
}
.fc-agendaWeek-button{ position: absolute !important;
    margin-top: 180px !important;
margin-left: -229px !important;
border-radius: 32px;
border: medium none !important;
text-align: center;
padding: 82px !important;
font-family: arial,helvetica,sans-serif;
text-decoration: none;
font-weight: bold;
color: #F9CAA5;
outline: medium none;
background: transparent url("assets/img/WEEK.png") no-repeat scroll 30px 20px / 142px 138px;
text-transform: capitalize;

	}
	.fc-sun{
		color:#238adb;
	}

	.fc-agendaDay-button{position: absolute !important;
margin-top: 340px !important;
margin-left: -223px !important;
border-radius: 32px;
border: medium none !important;
text-align: center;
padding: 82px !important;
font-family: arial,helvetica,sans-serif;
text-decoration: none;
font-weight: bold;
color: #C55227;
outline: medium none;
background: transparent url("assets/img/MONTH.png") no-repeat scroll  25px 20px / 142px 138px;
text-transform: capitalize;

  }
  
  .fc-prev-button { 
    outline: none;
    border: none;
       background-color:transparent;
    border-radius: 50%;
    height: 30px !important;
    width: 30px !important; }
  .fc-next-button {
    outline: none;
    border: none;
 background-color:transparent;
    border-radius: 50%;
    height: 30px !important;
    width: 30px !important;}
.fc-h-event .fc-event{ font-size:12px !important}
.fc-day-grid-container{ padding:1%}
 @media (min-width:880px) and (max-width:1379px){
	 .fc-day-grid-event .fc-content {
  
 font-size:10px;

}
.fc-ltr .fc-basic-view .fc-day-number {
   
    font-size: 24px;
    padding: 0%;
}
	 }

 @media (min-width:768px) and (max-width:879px){
	 .fc-day-grid-event .fc-content {
  
 font-size:10px;

}
#calendar {
	max-width:77% !important;
   float: right;	 
	}
.fc-ltr .fc-basic-view .fc-day-number {
   
    font-size: 24px;
    padding: 0%;
}
	 }
	  @media (min-width:400px) and (max-width:767px){
	 .fc-day-grid-event .fc-content {
  
 font-size:10px;

}
.ui-widget-header {
   
    font-size: 100% ;
}
.fc-ltr .fc-basic-view .fc-day-number {
   
    font-size: 24px;
    padding: 0%;
}
	 }

  @media (max-width:767px) {

#calendar {
	max-width:77% !important;
   float: right;	 
	}
	.ui-widget-header {
   
    font-size: 20px ;
}
  }
    @media (max-width:650px) {

#calendar {
	max-width:80% !important;
   height:500px;

	}
	.ui-widget-header {
   
    font-size:15px;
}
	
	.fc-month-button{ background-size: 105px 91px;
margin-top: 3px !important;
margin-left: -202px !important;
background-position: 56px 47px;}
	.fc-agendaWeek-button{background-size: 105px 91px;
margin-left: -199px !important;
background-position: 51px 47px;
margin-top: 105px !important;}
	.fc-agendaDay-button{background-size: 105px 91px;
margin-left: -194px !important;
background-position: 46px 47px;
margin-top: 208px !important;}
  }
   @media (max-width:360px) {

#calendar {
	max-width:77% !important;
   height:100%;
	}
	.fc-month-button{ background-size:57px 63px; margin-top: 3px !important;margin-left: -184px !important;}
	.fc-agendaWeek-button{background-size:57px 63px; margin-left: -180px !important; margin-top:78px !important;}
	.fc-agendaDay-button{background-size:57px 63px;margin-left: -174px !important;margin-top: 156px !important;}
  }
 @media (min-width:190px) and (max-width:450px){
	 .fc-day-grid-event .fc-content {
  
 font-size:5px !important;

}

.fc-ltr .fc-basic-view .fc-day-number {
   
    font-size: 19px;
    padding: 0;
}
a.fc-more {
    margin:0;
    font-size: 9px;
	 }

 }
 @media screen and (min-width:190px) and (max-width:550px)
{
.fc-month-button{ background-size: 81px 77px;
margin-top: 3px !important;
margin-left: -173px !important;
background-position: 59px 49px;
font-size: 11px !important;}
	.fc-agendaWeek-button{background-size: 81px 77px;
margin-top: 86px !important;
margin-left: -170px !important;
background-position: 55px 49px;
font-size: 11px !important;}
	.fc-agendaDay-button{    background-size: 81px 77px;
    margin-top: 170px !important;
    margin-left: -168px !important;
    background-position: 53px 49px;
    font-size: 11px !important;
}
	
}
</style>
<!----/css styles--->
</head>
<!--/Headsection-->
	<!--bodysection-->
	<body>
	
		<div class="back-img">
						 <div style="width:100%;margin-left:-8%;">
											<div id='calendar' style="padding-top:50px; height:auto !important;">
											</div>
						</div>
					
				</div>
			  
			  
		

</body>
<!--/bodysection-->

</html>