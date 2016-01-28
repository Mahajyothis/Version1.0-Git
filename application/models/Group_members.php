<?php
$my_data=$_GET['q'];

	//$my_data=mysql_real_escape_string($q);
			//$my_data=str_replace("'", "", $q);		
						/*** query the database ***/
						$con=mysqli_connect("localhost","root","", "mavrf");
						$result = mysqli_query($con,"SELECT * FROM customermaster cm
						LEFT JOIN `personalphoto` pp ON (pp.`custID`=cm.`custID`)
						WHERE (cm.`custName` LIKE '%$my_data%' AND pp.photo!='') ORDER BY cm.`custName` ASC");
						// $result = DB::getInstance()->query("SELECT pc, id_citites FROM citites");

						/*** loop over the results ***/
						$count= 0;
						
						while($row = mysqli_fetch_array($result)) {
					
						echo "<img src=/uploads/".$row['photo']." height='25px' width='25px'>".$row['custName']."\n";
						
						}
						
						
						
										

?>