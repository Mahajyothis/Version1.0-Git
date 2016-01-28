<script>
 function Uname() {
    
	  var Uname= $("#newUname").val();
	   alert(Uname);
      if(Uname!=''){
        $.ajax({
          url: "<?php base_url();?>settings?Uname="+Uname
        }).done(function( data ) {
          $("#general").html(data);
		   $("#Unameerror").html("Updated Successfully");
		  return true;
        });   
      } 
	  
	if(Uname=='')
	  {
	   $("#Unameerror").html("Please Fill up the Above Field");
	  }
    }
  
  </script>