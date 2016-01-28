<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friendshipmeter extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		}
		public function index(){
		$na1=$this->input->get('name1');
                $na2=$this->input->get('name2');
          //Convert Upper case Strings into lowercase strings
                $name1=strtolower($na1);
                $name2=strtolower($na2);
         //Insert the inputs to the database for future reference
                $data = array(
                   'fmID'=>'',
                   'name1' =>$name1 ,
                   'name2' => $name2
                    );

               $this->db->insert('FriendshipMeter', $data); 
        //Split the charecters 
               $characters = str_split($name1);
               $characters1 = str_split($name2);
       //intialize the val
               $val=0;
               $val1=0;
       //Get the Value for each charecter of user1
      foreach($characters as $char){   
$a=array("0.8"=>"a","2"=>"b","3"=>"c","4"=>"d","5"=>"e","8"=>"f","03"=>"g","05"=>"h","0.9"=>"i","1"=>"j","02"=>"k","2.9"=>"l","04"=>"m","4.9"=>"n","07"=>"o","8"=>"p","01"=>"q","1.9"=>"r","2.8"=>"s","3.9"=>"t","6"=>"u","5.8"=>"v","06"=>"w","4.8"=>"x","0.7"=>"y","7"=>"z");

      //Add the value 
             $val += array_search($char,$a);

}
     //Get the Value for each charecter of user2
     foreach($characters1 as $char1){   
$b=array("0.8"=>"a","2"=>"b","3"=>"c","4"=>"d","5"=>"e","8"=>"f","03"=>"g","05"=>"h","0.9"=>"i","1"=>"j","02"=>"k","2.9"=>"l","04"=>"m","4.9"=>"n","07"=>"o","8"=>"p","01"=>"q","1.9"=>"r","2.8"=>"s","3.9"=>"t","6"=>"u","5.8"=>"v","06"=>"w","4.8"=>"x","0.7"=>"y","7"=>"z");
            $val1 += array_search($char1,$b);
            }
    //Add the sum of two users value
            $e=round($val+$val1);

?>
   <script type="text/javascript">
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
                                            value:<?php 
											if($e<100){
																						
											//print the value when it is below 100
											echo $e;
											
											$sel="SELECT *
FROM FriendDescription
WHERE `fdValue`='$e'";
 $query = $this->db->query($sel);
				$val=$query->result_array();														
											}
											
											else{
											//print the value when it is above 100
												$g=round(($e/10)+30);
												
												echo $g;
												
												$sel="SELECT *
FROM FriendDescription
WHERE `fdValue`='$g'";

 $query = $this->db->query($sel);
				$val=$query->result_array();				
										
											}
											?>,
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
	<?php
	echo " <div>
        <div id='jqRadialGauge'  class='ui-jqradialgauge'>
        <canvas width='250' height='250' style='position: absolute; left: 0px; top: 0px;'></canvas><div style='position: absolute; border-color: rgb(197, 248, 11); left: 33.9999999999999px; top: 34.5421231774274px; display: none;' class='ui-jqradialgauge-tooltip'><b>Element: range</b> <br>Start Value: 10<br>End Value: 100</div><canvas width='350' height='350' style='position: absolute; left: 0px; top: 0px;'></canvas></div>
    </div>
                                </div>";
                                
                             echo "<div id='result' >".$val['0']['fdDescription']."</div>"; 
              
                                				}
                                				
                                				
                                				}			
					
	