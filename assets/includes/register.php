<div class="modal fade" id="register" role="dialog">
  <div class="modal-dialog register-dialog">

    <!-- Modal content-->
    <div class="modal-content register-content">
      <!--<div class="modal-header register-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span> USER REGISTER</h4>
      </div>-->
      <div class="modal-body register-body" >
      
      <div class="load_page">
      <?php 
	   
if($_SERVER['REQUEST_URI']=='/mavrf/' || $_SERVER['REQUEST_URI']=='/mavrf'){
	   include 'includes/register1.php';
}
else
{
	$id=$_GET['uid'];
	
	$security=$_GET['security'];
	$con=mysqli_connect("localhost","mavrf","102238066","mavrf");
	$query = "SELECT e.`custID` FROM `email` e LEFT JOIN `customermaster`cm ON(cm.`custID`=e.`custID`) WHERE e.`custID` = '$id' && e.`security`='$security' && cm.`custStatus`='10'";
$result = mysqli_query($con, $query);

	if(mysqli_num_rows($result)==1){ 
	include 'includes/register2.php';
	
	}
	else{
		
		include 'includes/register1.php';
		
	}
	
}	?>     
     </div>       
   </div>        
 </div>  
 
</div>

</div>


				<script>
 
	function button_change1(){
	document.getElementById("submitbtn2").style.display = "none";
	document.getElementById("uploaded1").innerHTML = "Photo Uploaded Successfully";
	return true();
	}


</script>
  
  <script>
  $(document).ready(function () {
    $("#Uname").keyup(function () {
      var Uname = $(this).val();
      if (Uname == '') {
        $("#availability1").html("");
      }
	 
      else{
        $.ajax({
          url: "classes/validation.php?uname="+Uname
        }).done(function( data ) {
          $("#availability1").html(data);
        });   
      } 
    });
  });
  
  </script>
 <script>
  $(document).ready(function () {
    $("#email").blur(function () {
      var email = $(this).val();
      if (email == '') {
        $("#availability2").html("");
      }
	 
      else{
        $.ajax({
          url: "classes/email_validation.php?email="+email
        }).done(function( data ) {
          $("#availability2").html(data);
        });   
      } 
    });
  });
  
  </script>


 
<script>
function uservalidation(){
	var user = $("#Uname").val();
	if(user!=''){
		document.getElementById("use").innerHTML = "";
		return fasle;
	}
	return true;
}




function emailverification(){
	var user = $("#Uname").val();
	var email = $("#email").val();
	re = /\S+@\S+\.\S+/;
	if(user==''){
		document.getElementById("use").innerHTML = "Enter Username";
		return fasle;
	}
	
if(!re.test(email)) {
	  document.getElementById("emi").innerHTML = "Enter Valid Email ID ";
return false;}
if(re.test(email)) {
	  document.getElementById("emi").innerHTML = "";
return false;}

	return true;
	
	
}
function remailverification(){
	var email=$("#email").val();
	var retypeemail=$("#retypeemail").val();
	if(email ==''){
		document.getElementById("emi").innerHTML = "Enter Email ID ";
		return fasle;
	}
	
	 if(email!=retypeemail){
	   document.getElementById("remai").innerHTML = "Email Id is Missmatching";
	   return false;
   }
	if(email==retypeemail){
		document.getElementById("remai").innerHTML = "";
		return false;
	}
	return true;
}

function rpasswordvalidation(){
	
	var password = $("#Pword").val();
	var confirmpassword=$("#confirmpassword").val();
  
	if(password==''){
		document.getElementById("pass").innerHTML = "Enter Password ";
		return fasle;
	}
	
	if(password != confirmpassword){
	  document.getElementById("rpass").innerHTML = "Password is Missmatching";
	   return false;
   }
   if(password == confirmpassword){
	  document.getElementById("rpass").innerHTML = "";
	   return false;
   }
  
   return true;
}

function passwordvalidation(){
	var password = $("#Pword").val();
	
	
	
	
	
	 if(password != ''){
		document.getElementById("pass").innerHTML = "";
		return fasle;
	}
	return true;
}





</script>





<script type="text/javascript">
	function myFunction() {
   	
var user = $("#Uname").val();
var email = $("#email").val();
var password = $("#Pword").val();
var verification=$("#verification1").val();
var verification1=$("#verification2").val();
var retypeemail=$("#retypeemail").val();
var confirmpassword=$("#confirmpassword").val();
  
	
	if(user==''||email==''||password==''||retypeemail==''||confirmpassword=='') {
	  document.getElementById("emailmessage").innerHTML = "Please Fill up the Manditory Fields *.";
return false;}
	
	
	
	 if(verification == 1){
		 document.getElementById("use").innerHTML = "";
		  return false;
	  }
	  if(verification1 == 1){
		 document.getElementById("emai").innerHTML = "";
		  return false;
	  }
	  
	   
	 
  
  
  
  
$.post("classes/registration.php", { user: user,email:email,password:password},
   function(data) {
	
	
	
	
	
	
   document.getElementById("emailmessage").innerHTML = "Verification code is sent to your Email Id. Please Verify before Sign In.";
  
	 return true;
  
   
  
   
   });
	
}
</script>





<script type="text/javascript">
	function myFunction1() {
    
	
var fname = $("#fname").val();
var lname = $("#lname").val();
var birth = $("#birth").val();

var gender = $('#gender:checked').val();
var interested = $("#interested").val();
var about = $("#aboutme").val();
var area = $("#area").val();

var post = $("#post").val();
var road = $("#road").val();
var city = $("#city").val();

var district = $("#district").val();
var state = $("#state").val();
var country = $("#country").val();
var postcode = $("#postcode").val();

if(fname==''){
	document.getElementById("fnam").innerHTML = "Enter First Name";
	return false;
	
}
if(lname==''){
	document.getElementById("lnam").innerHTML = "Enter Last name";
	return false;
}
if(gender==''){
	document.getElementById("gen").innerHTML = "Select Your Gender";
	return false;
}
if(birth==''){
	document.getElementById("birt").innerHTML = "Choose your Date of Birth";
	return false;
}
if(postcode==''){
	document.getElementById("pos").innerHTML = "Enter your Post Code";
	return fasle;
}
if(interested==''){
	document.getElementById("int").innerHTML = "Select Your Interest";
	return false;
}
if(district==''){
	document.getElementById("dis").innerHTML = "Enter  District";
	return false;
}
if(city==''){
	document.getElementById("cit").innerHTML = "Enter  City";
	return false;
}
if(state==''){
	document.getElementById("stat").innerHTML = "Enter  State";
	return false;
}
if(country==''){
	document.getElementById("con").innerHTML = "Enter your Country";
	return false;
}
if(about==''){
	document.getElementById("abt").innerHTML = "Type something About you";
	return false;
}










$.post("classes/personal.php", { fname:fname,lname:lname,birth:birth,gender:gender,interested:interested,about:about,area:area,post:post,road:road,city:city,district:district,state:state,country:country,postcode:postcode},
   function(data) {
  
   
   });
	
	 document.getElementById("submit1").style.display = "none";
   document.getElementById("load").innerHTML = "<img src='images/loading.gif' height='40px' width='40px' style='margin-left: 47%;'>";
	 $('#general').load("includes/register3.php");
	 return true;
	
}
</script>
<script type="text/javascript">
	function myFunction2() {
    
	
var qualification = $("#qualification").val();
var professionaldetail = $("#professionaldetail").val();
var industry = $("#industry").val();
var description = $("#description").val();





$.post("classes/professional.php", { qualification:qualification,professionaldetail:professionaldetail,industry:industry,description:description},
   function(data) {
   
   
    document.getElementById("submit2").style.display = "none";
   document.getElementById("load").innerHTML = "<img src='images/loading.gif' height='40px' width='40px' style='margin-left: 47%;'>";
   $('#general').load("includes/register4.php");
   return true;
  
   });
	
	
	
	
}
</script>

				