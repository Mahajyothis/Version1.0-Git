<!DOCTYPE html>
<html lang="en">
     <!---headsection--->
	<head>
		<meta charset='utf-8' />
		<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="assets/css/mystyle12.css" rel="stylesheet" type="text/css">
        <title>Freindship calc</title>
		   <link rel="stylesheet" type="text/css" href="assets/css/jquery.jqGauges.css">
    <script src="assets/js/jquery-1.5.1.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.jqGauges.min.js" type="text/javascript"></script>
    <!--[if IE]><script lang="javascript" type="text/javascript" src="assets/js/excanvas.js"></script><![endif]-->
  <script lang="javascript" type="text/javascript">
        $(document).ready(function () {
  var gradient1 = {
                type: 'linearGradient',
                x0: 0,
                y0: 0.5,
                x1: 1,
                y1: 0.5,
                colorStops: [{ offset: 0, color: '#FF0000' },
                             { offset: 1, color: '#FA8258' }]
            };

            var gradient2 = {
                type: 'linearGradient',
                x0: 0.5,
                y0: 0,
                x1: 0.5,
                y1: 1,
                colorStops: [{ offset: 0, color: '#80FF00' },
                             { offset: 1, color: '#01DF01' }]
            };
			var gradient3 = {
                type: 'linearGradient',
                x0: 0.5,
                y0: 2,
                x1: 1,
                y1: 0.5,
                colorStops: [{ offset: 0, color: '#FFFF00' },
                             { offset: 1, color: '#9AFE2E' }]
            };


            var anchorGradient = {
                type: 'radialGradient',
                x0: 0.35,
                y0: 0.35,
                r0: 0.0,
                x1: 0.35,
                y1: 0.35,
                r1: 1,
                colorStops: [{ offset: 0, color: '#4F6169' },
                             { offset: 1, color: '#252E32' }]
            };

            $('#jqRadialGauge').jqRadialGauge({
                background: '#F7F7F7',
                border: {
                    lineWidth: 6,
                    strokeStyle: '#76786A',
                    padding: 16
                },
                shadows: {
                    enabled: true
                },
                anchor: {
                    visible: true,
                    fillStyle: anchorGradient,
                    radius: 0.10
                },
                tooltips: {
                    disabled: false,
                    highlighting: true
                },
                animation: {
                    duration: 1
                },
                annotations: [
                                {
                                    text: 'Friendship Meter',
                                    font: '18px sans-serif',
                                    horizontalOffset: 0.5,
                                    verticalOffset: 0.80
                                }
                ],
                scales: [
                         {
                             minimum: 0,
                             maximum: 100,
                             startAngle: 140,
                             endAngle: 400,
                             majorTickMarks: {
                                 length: 12,
                                 lineWidth: 2,
                                 interval: 10,
                                 offset: 0.84
                             },
                             minorTickMarks: {
                                 visible: true,
                                 length: 8,
                                 lineWidth: 2,
                                 interval: 2,
                                 offset: 0.84
                             },
                             labels: {
                                 orientation: 'horizontal',
                                 interval: 10,
                                 offset: 2.00
                             },
                             needles: [
                                        {
                                            value:0,
                                            type: 'pointer',
                                            outerOffset: 0.8,
                                            mediumOffset: 0.7,
                                            width: 10,
                                            fillStyle: '#252E32'
                                        }
                             ],
                             ranges: [
                                        {
                                            outerOffset: 0.82,
                                            innerStartOffset: 0.76,
                                            innerEndOffset: 0.68,
                                            startValue: 0,
                                            endValue: 35,
                                            fillStyle: gradient1
                                        },
										 {
                                            outerOffset: 0.82,
                                            innerStartOffset: 0.68,
                                            innerEndOffset: 0.70,
                                            startValue: 35,
                                            endValue: 70,
                                            fillStyle: gradient3
                                        },
                                        {
                                            outerOffset: 0.82,
                                            innerStartOffset: 0.70,
                                            innerEndOffset: 0.76,
                                            startValue: 70,
                                            endValue: 100,
                                            fillStyle: gradient2
                                        }
                             ]
                         }
                ]
            });

            
        });
    </script>
   <!--css styles-->
        <style>
		
		.bck-img-cls{ background:url(http:www.mahajyothis.net/assets/img/img%203.png)}
		.labl{font-size: 273%;
color: #FFF;
font-family: cursive;
margin-left: -27%;}
		.btn-brdr{border: 8px solid #C94092;
border-radius: 38px;
outline: none;}
	.btn-warnings {
    color: gold;
    background-color: #bb3783;ss
    border-color: #bb3783;
    font-family: cursive;
    font-size: 22px;
}
#error{
    color: white;
    text-align:center;
	margin-top:3%;
    font-family: cursive;
    font-size: 18px;
}
.ui-jqradialgauge{
width:250px;
height:250px;
}
#result{
position: relative;
    /* text-align: center; */
    color: red;
    font-size: 100%;margin-left:-32%;
    font-family: cursive;padding-bottom:10px;
}
@media (max-width:360px){
.ui-jqradialgauge{
width:180px;
height:180px;
 position: initial !important;
}
.col-md-3{
width: 212px;
}
.col-md-12{
width: 256px;
}
#result{
margin-left: 40%;
}
}

		</style>
		<!--/css styles-->
	</head>	
	<!---/headsection--->
	<!---bodysection--->
	<body>
			<!---container section--->
		<div class="container main-dv-wdth">			
        <div class="col-md-12 col-md-offset-13">
                           <div class="col-md-12">
                          <img class="col-center-block" src="assets/img/img-1.png" alt="Love Calc" height="50%" width="50%">  
                           </div>						   
			<div id="output">		
			   <div class="col-md-12 middle ">
				<h1 class="fnt">How Compatiable Are You ?</h1>
					<br>
				</div>
					<br>
					<br>
                    <div class="col-md-12">
                    <img src="assets/img/img 3.png" style="   position: absolute;
     			height: 100%;
    			width: 87%;
    			margin-left: 6%;
    			left: 0px;
    			top: 0px;" height="100%" width="100%" />
    		<!---type your name--->
		<div class="col-md-3">				
		<div class="col-md-12 field-one" style="text-align:center;margin-top: 11%;">
                        <br>
                        <br>
                        <br>
                        <span class="labl">Your name</span>
				<input class="form-control  btn-brdr" id="name1" type="text">
					</div>
					 </div>
					 <!---/type your name--->
                    <div class="col-md-6">
			<div class="col-md-12">
                          <div style="text-align:center" id="general" class="img-responsive mrgn-cntr-cls">
                       		<div>
        <div id="jqRadialGauge" class="ui-jqradialgauge">
        <canvas style="position: absolute; left: 0px; top: 0px;"></canvas>
        <div style="position: absolute; 
        border-color: rgb(197, 248, 11); 
        left: 33.9999999999999px; top: 34.5421231774274px; 
        display: none;" class="ui-jqradialgauge-tooltip">
        <b>Element: range</b> <br>Start Value: 10<br>End Value: 100</div>
        <canvas  style="position: absolute; left: 0px; top: 0px;"></canvas></div>
    	</div>
                                </div>
				  </div>
				    </div>
				    <!---type your friend name--->
				<div class="col-md-3">
					<div class="col-md-12 field-two " style="text-align:center;margin-top: 11%;">
                      				<br>
                       				 <br>
                        			  <br>
                      <span class="labl">Your Friend Name</span>
					<input class="form-control btn-brdr" id="name2" type="text">
					 </div>
					  </div>
				           </div>
			                    </div>
			                     <!---/type your friend name--->
		<div id="error"></div>
			<div class="col-md-12" style="text-align:center;padding:50px">
			   <button class="btn btn-warnings" onclick="friendship()">Click it !!</button>
			</div>
		</div>
	   </div>		
	</body>
	<!---/bodysection--->
<!---javascript--->
<script>
 function friendship() {
      var name1 = $("#name1").val();
	  var name2 = $("#name2").val();	
      if(name1!=''&& name2!=''){
        $.ajax({
          url: "<?php base_url();?>friendanalysis?name1="+name1+"&& name2="+name2
        }).done(function( data ) {
          $("#general").html(data);
		   $("#error").html("");
		  return true;
        });   
      } 	  
	if(name1==''|| name2=='')
	  {
	   $("#error").html("Please Fill up the Above Fields");
	  }
    }
  
  </script>
    
			     <script type="text/javascript">
          $(document).ready(function () {
         $(document).on('click','span#button',function () {
           alert("hi");
             $('#reload').load('<?php echo base_url();?>friend');
          });
          });
      </script>
<!----/javascript--->	
</html>