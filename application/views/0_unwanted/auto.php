<?php
$q=$_GET['q'];
	//$my_data=mysql_real_escape_string($q);
			$my_data=str_replace("'", "", $q);		
						/*** query the database ***/
						$con=mysqli_connect("localhost","root","", "mavrf");
						$result = mysqli_query($con,"SELECT custName FROM customermaster WHERE custName LIKE '%$my_data%' ORDER BY custName ASC");
						// $result = DB::getInstance()->query("SELECT pc, id_citites FROM citites");

						/*** loop over the results ***/
						$count= 0;
						
						while($row = mysqli_fetch_array($result)) {
					
						echo $row['custName']."\n";
						
						}
						
						
						
										

?>