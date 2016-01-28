<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Tarot_reading extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		 $this->load->database();
		 
	//Seperate the card numbers from the front end
$cards= ''.implode('',$_GET['cardNumbers'])."\n";
$first=$cards[0].$cards[1];
$second=$cards[3].$cards[4];
$third=$cards[6].$cards[7];

//Get the description of the first card
$sel="SELECT *
FROM `tarotreading`
WHERE `trValue`='$first'";
//Get the description of the first card
$sel1="SELECT *
FROM tarotreading
WHERE `trValue`='$second'";
//Get the description of the first card
$sel2="SELECT *
FROM tarotreading
WHERE `trValue`='$third'";

   $query = $this->db->query($sel);
   $query1 = $this->db->query($sel1);
   $query2 = $this->db->query($sel2);
   $val=$query->result_array();
   $val1=$query1->result_array();
   $val2=$query2->result_array();
   //print the corresponding description as a result
   echo "<div class='row'>
                  
						<div class='col-md-11'>
										
								<div class='col-md-12 bck-styl mrgn-tp'>
									 <div class='headng'>
											<span  class='headng-txt' style='color:#A52A2A;'>Know About Your Love & Relationship</span>
                                            </div>
                                            <div class='col-md-12'>
											<div class='col-md-3 paddng-cls-cntnt' >
										<img src='assets/img/tarot/".$val['0']['trImage']."'  class='img-responsive' align='middle' style='background-color:inherit; border:0px;'/>
											</div>
											<div class='col-md-9 paddng-cls-cntnt'>
                                            <h1 style='color:teal'>Positive traits</h1>
												<p style='color:captiontext;font-size:14px; letter-spacing:.5px;font-family: calibri;text-align:justify'>
												".$val['0']['rlPositive']."
								               			</p>
																								
											</div>
											<div class='col-md-9 paddng-cls-cntnt' >
                                             <h1 style='color:rgb(220, 20, 60);'>Negative traits</h1>
												<p style='color:captiontext;font-size:14px; letter-spacing:.5px; font-family: calibri; text-align:justify'>
												".$val['0']['rlNegative']."
												</p>
											</div>
									</div>
								</div>
										
								<div class='col-md-12 bck-styl' style='margin-top:20px'>
									 <div class='headng'>
											<span  class='headng-txt' style='color:#A52A2A;'>Know About Your Finance & Career</span>
                                            </div>
                                            <div class='col-md-12'>
											<div class='col-md-3 paddng-cls-cntnt' >
										<img src='assets/img/tarot/".$val1['0']['trImage']."'  class='img-responsive' align='middle' style='background-color:inherit; border:0px;' />
											</div>
											<div class='col-md-9 paddng-cls-cntnt'>
                                            <h1 style='color:teal;'>Finance</h1>
												<p style='color:captiontext;font-size:14px; letter-spacing:.5px; font-family: calibri; text-align:justify'>
												".$val1['0']['fcFinance']."
                                                						</p>
																								
											</div>
											<div class='col-md-9 paddng-cls-cntnt'>
                                             <h1 style='color:#DC143C'>Carrier</h1>
												<p style='color:captiontext;font-size:14px; letter-spacing:.5px; font-family: calibri;text-align:justify'>
											".$val1['0']['fcCarrier']."
												</p>
												</div>
											</div>
									
								</div>
					 <div class='col-md-12 bck-styl' style='margin-top:20px'>
									 <div class='headng'>
											<span  class='headng-txt' style='color:#A52A2A;'>Your Future Enhancement</span>
                                            </div>
                                            <div class='col-md-12'>
											<div class='col-md-3 paddng-cls-cntnt' >
										<img src='assets/img/tarot/".$val2['0']['trImage']."'  class='img-responsive' align='middle' style='background-color:inherit; border:0px;' />
											</div>
											<div class='col-md-9 paddng-cls-cntnt'>
                                            <h1 style='color:teal;'>Future</h1>
												<p style='color:captiontext;font-size:14px; letter-spacing:.5px; font-family: calibri;text-align:justify'>
												".$val2['0']['trFuture']."
                                                
												</p>
												</div>
												</div>
									</div></div>
			</div>";
	
   }}
   
   