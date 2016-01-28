<?php
	if(isset($_POST['submit'])){
		$captcha=$_POST['g-recaptcha-response'];
		if(!empty($captcha))
		{
			$errMsg= '';
			$google_url="https://www.google.com/recaptcha/api/siteverify";
			$secret='6Lcd3w8TAAAAAF23FXnmn-qtMX0ZBwe-Gl9ApCzX';
			$ip=$_SERVER['REMOTE_ADDR'];
			$captchaurl=$google_url."?secret=".$secret."&response=".$captcha."&remoteip=".$ip;
			
			$curl_init = curl_init();
			curl_setopt($curl_init, CURLOPT_URL, $captchaurl);
			curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_init, CURLOPT_TIMEOUT, 10);
			$results = curl_exec($curl_init);
			curl_close($curl_init);
			
			$results= json_decode($results, true);
			if($results['success']){
				$errMsg="Valid reCAPTCHA code. You are human.";
			}else{
				$errMsg="Invalid reCAPTCHA code.";
			}
		}else{
			$errMsg="Please re-enter your reCAPTCHA.";
		}
	}
	
?>
<html>
	<head>
		<title>Google New reCAPCTHA</title>
		<script src="https://www.google.com/recaptcha/api.js"></script>
	</head>
	<body>
		<center>
			<form method='POST' action=''>
			<div class='web'> 
			<h1>Google New reCAPTHA Demo</h1>
			<?php
				if(strlen($errMsg) > 0)
					echo '<span style="font-size:11px;color:#FF0000;">'.$errMsg.'</span>';
			?>
			<table>
				<tr>
					<td>Name:</td>
					<td><input type="name" style='width:295px;'></td>
				</tr>
				<tr>
					<td valign="top">Comment:</td>
					<td><textarea name="comment" rows="8" cols="39"></textarea></td>
				</tr>
				<tr>	
					<td></td>
					<td><div class="g-recaptcha" data-sitekey="6Lcd3w8TAAAAAHN4bq7UpChuwjLvoNHLipw_5LFV"></div></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Post comment"></td>
				</tr>
			</table>
			</div>
			</form>
		</center>
	</body>
</html>
<style>.web{font-family:tahoma;size:12px;top:10%;border:1px solid #CDCDCD;border-radius:10px;padding:10px;width:40%;}.result{color:#FF0000;}h1{margin:3px 0;font-size:13px;text-decoration:underline;}.tLink{font-family:tahoma;size:12px;padding-left:10px;}
input textarea{ width:300px; border:1px solid #CDCDCD;}
</style>