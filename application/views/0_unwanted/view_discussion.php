<?php
if($results) foreach($results as $result);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo $result->titleDis;?></title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
				<link href="<?php echo base_url('assets/dis/inner/css/styles.css');?>" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
            <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
            <script src="https://code.jquery.com/jquery-1.7.2.js"></script>
		<![endif]-->
		
	
</head>
	<body onload="display_cc()">
<div class="wrapper">
    <div class="box">
        <div class="row">
            <!-- sidebar -->
             <div class="column col-sm-3" id="sidebar" style="background-color:#E67E22;">
                <a href="<?php echo base_url()."discussions";?>"><span style="padding-top:10px;padding-left:10px;"><img style="margin-top:30px;" src="<?php echo base_url('assets/dis/img/dis.png');?>" height="50px" /></span></a>
                <ul class="nav">
                    <li class="active"><a href="<?php echo base_url('discussions/my_discussions');?>">My Discussions</a>
                    </li>
                    <li><a href="<?php echo base_url('discussions/public_discussions');?>">Public Discussions</a>
                    </li>
                </ul>
                <ul class="nav hidden-xs" id="sidebar-footer">
                    <li>
                      <a href="#"><h3>Mahajyothis</h3></a>
                    </li>
                </ul>
            </div>
		   
            <!-- /sidebar --> <!-- main -->
            <div class="column col-sm-9" id="main">
                <div class="padding">
                    <div class="full col-sm-9"> <!-- content -->
                        <div class="col-sm-12" id="featured">   
                          <div class="page-header text-muted">
                          <a  href="<?php echo base_url()."discussions/";?>"><span class="glyphicon glyphicon-chevron-left"></span> Back to discussions</a>
                          </div> 
                        </div> <!--/top story-->
                        <div class="row">    
                         <div class="col-sm-12"><img src="<?php echo ($result->photo && file_exists(UPLOADS.$result->photo)) ? base_url().UPLOADS.$result->photo : base_url().UPLOADS.'profile.png';?>" class="img-thumbnail" alt="Cinque Terre" width="150" height="150"></div>
							</div>
							<div class="col-sm-12"> 
                              <h4><?php echo $result->custName;?></h4>
							</div>
					<div class="col-sm-12">
					<div class="row">
					         <h3><?php echo $result->titleDis;?></h3>
                             <p class="readings" >
							 <?php echo $result->bodyDis;?>
							 
							 <?php  if($total_views->num_rows() <1){
                                
$views=$this->db->query("insert into views values('','DISCUSSION','".$result->id_dis."','".$this->session->userdata['profile_data'][0]['custID']."')");


}?>
							 </p>
                             </div>
							 <div class="col-sm-12">
                            <span class="label label-info"><span  class="glyphicon glyphicon-comment" ></span><span class="incc"> <?php echo $total_d;?></span> Comments</span>
							
							<span class="label label-danger"><span class="glyphicon glyphicon-time"></span>  <?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$result->dDate);?></span>
                                 <?php
                                 $user_row = $this->session->userdata('profile_data');
                                //echo $user_row['0']['custID'];
                                 $id = $this->uri->segment(3);
                                 $iid = explode("-",$id);
                                 $iiid = $iid[0];


                                 $discussion_likes="select
                                                    *
                                                    FROM
                                                    
                                                    recentactivity 
                                                    where raCategory='DISCUSSION' and CustID = '".$this->session->userdata['profile_data'][0]['custID']."' and catID='".$result->id_dis."'";
 $query = $this->db->query($discussion_likes);
                                 if($query->num_rows() == 1)
                                 {
                                 ?>

                                 <span class="label label-danger"><span class="glyphicon glyphicon-time"></span>Liked</span>
                                 <?php
                                 }
                                 else
                                 {
                                 ?>
                                 <span id="display_discussion_like" class="label label-danger"><span class="glyphicon glyphicon-time"></span><a href="#" onclick="like_discussion()">Like</a></span>
                                 <?php
                                 }
                                 ?>
                                 <!--<input type="button" class="c" value="click_me">-->

							</div>
							<div class="col-sm-12">
							 <br>
                            <p class="comment"><b>Comments:</b></p>
	                       </div>
						   <div class="col-sm-12">
                            <p class="idea">Tell Us What You Think!</p>
                               <!--<textarea id="message-text" class="form-control" style="border-radius:0px;background-color:#eee;color:#808008; width: 70%">Hiiii</textarea>-->
                               <!-------------------------------------------------------------------------------->

                                   <span id="display_comment">

                                   </span>
                               <a href="javascript:void(0);"  class="view_more_comments" style="color: darkgreen; font-weight: bold">view more comments</a>
                               <input type="text" id="increment_number" name="increment_number" value="4" style="display: none">
                               <span id="empty_comm" style="color: darkred;font-weight: bold; display: none">Hei Mr please give a comment</span>

                               <!-------------------------------------------------------------------------------->
	                       </div>


						   <div class="col-md-12">
						    <div class="col-sm-10">	
					<textarea class="form-control" style="border-radius:0px;background-color:#eee;color:#808008;" id="message-text"></textarea>

					
	                       </div>
						   <div class="col-md-2 submit" style="margin-top:10px;">
						   <!--<button type="button" class="btn btn-success" id="submit_comment" onclick="comment_submit()">Submit</button>-->
                           <button type="button" class="btn btn-success" id="submit_comment">Submit</button>
						   </div>
                            </div>
                            </div>
                           </div>
						    </div>
                 </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
        </div>
    </div>
</div>
	<!-- script references -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <!--This script is for like ths discussion -->
        <script>
            function like_discussion()
            {


var uid="<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";


                var custid=<?php  echo $result->custID;?>;
                var page="recentactivity";
                var cat="DISCUSSION";
                var act="LIKE";
                var did = <?php echo $result->id_dis;?> ;
              
                $.ajax({

                    url: "<?php echo base_url();?>Discussions/discussions_like?page="+page+"&& cat="+cat+"&& act="+act+"&& did="+did+"&& custid="+custid+"&& uid="+uid
                }).done(function( data )
                {



                    $.ajax
                    ({


                        url: "<?php echo base_url();?>Discussions/discussions_likes_html"
                    }).done(function( data )
                    {
                        //$("#add_like").html("<?php //echo "(".($val[0]['like']+1).")";  ?>");

                        //$("#add_discussion_like").html(data);
                        $("#display_discussion_like").html(data)
                        //return true;
                        //alert(data);
                    });




                });





            }

        </script>



    <!--<script>
        function display_cc()
        {
            var did = window.location.href.replace(/\D+/g, '' );

            $.ajax
            ({


                url: "<?php /*echo base_url();*/?>Discussions/display_commentssss?did="+did
            }).done(function( data )
            {
                //$("#add_like").html("<?php /*//echo "(".($val[0]['like']+1).")";  */?>");

                //$("#add_discussion_like").html(data);

                $("#display_comment").html(data)
                return true;
                //alert(data);
            });

        }
    </script>-->
<script>
    function display_cc()
    {
        var did = <?php echo $result->id_dis; ?>;
        //alert(did);
        $.ajax
        ({


            url: "<?php echo base_url();?>Discussions/display_commentssss?did="+did
        }).done(function( data )
        {
            //$("#add_like").html("<?php //echo "(".($val[0]['like']+1).")";  ?>");

            //$("#add_discussion_like").html(data);

            $("#display_comment").html(data)
            return true;
            //alert(data);
        });

    }
</script>
<script>
    $(document).ready(function(){
        $(".view_more_comments").click(function(){


            //var did = window.location.href.replace(/\D+/g, '' );
            var pathArray = window.location.pathname.split( '/' );
            var get_num = pathArray[3];
            var get_value = get_num.split('-');
            var did = get_value[0];
            var inc = $("#increment_number").val();
            // alert(inc);
            $.ajax
            ({


                url: "<?php echo base_url();?>Discussions/display_more_comments?did="+did+"&& inc="+inc
            }).done(function( data )
            {
                //$(".form-control").focus('');
                $("#display_comment").html(data)
                return true;
                //alert(data);
            });


        });
    });
</script>
<!--This script is for number increment -->
<script>
    $(document).ready(function(){
        $(".view_more_comments").click(function(){
            var $n = $("#increment_number");
            $n.val(Number($n.val())+4);
        });
    });
</script>

<!--This script is for submit the comment based on discussion -->
<script>
    $(document).ready(function(){
        $("#submit_comment").click(function()
        {
            var empty_comment = $(".form-control").val()
            if(empty_comment != "")
            {



                        var uid=<?php echo $result->custID;?>;
						var cid="<?php echo $this->session->userdata['profile_data'][0]['custID'];  ?>";
                        var page="recentactivity";
                        var cat="DISCUSSION";
                        var act="COMMENT";
                        var comment = $("#message-text").val();
                        var pid = <?php echo $result->id_dis; ?>;

                        $.ajax
                        ({

  url: "<?php echo base_url();?>activity?user_comment="+comment+"&uid="+uid+"&cid="+cid+"&pid="+pid+"&cat="+cat+"&act="+act
						
                            
                        }).done(function( data )
                        {


                            $('.incc').html(parseInt($('.incc').html(), 10)+1)



                            $(".form-control").val("")
                            $("#empty_comm").hide();
                            $("#increment_number").val("4");
                            var did = <?php echo $result->id_dis; ?>;
                            $.ajax
                            ({


                                url: "<?php echo base_url();?>Discussions/display_commentssss?did="+did
                            }).done(function( data )
                            {
                                //$("#total_d").html("<?php /*//echo "(".($val[0]['like']+1).")";  */?>");

                                //$("#add_discussion_like").html(data);
                                $("#display_comment").html(data)
                                return true;
                                //alert(data);

                            });





            });
            }
            else {$("#empty_comm").show();}




        });
    });
</script>


<!--This script is for view more comments based on discussion -->
   <!-- <script>
        $(document).ready(function(){
            $(".view_more_comments").click(function(){

                var n = $("#increment_number");
                n.val(Number(n.val())+4);
                //var did = window.location.href.replace(/\D+/g, '' );
                var pathArray = window.location.pathname.split( '/' );
                var get_num = pathArray[3];
                var get_value = get_num.split('-');
                var did = get_value[0];
                var inc = $("#increment_number").val();
                //alert(inc);
                $.ajax
                ({


                    url: "<?php /*echo base_url();*/?>Discussions/display_more_comments?did="+did+"&& inc="+inc
                }).done(function( data )
                {
                    //$(".form-control").focus('');
                    $("#display_comment").html(data)
                    return true;
                    //alert(data);
                });


            });
        });
    </script>-->
<!-------------------This script is to get exactly group id from the url-------------------------------->
<!--<script>
    $(document).ready(function(){
        $(".c").click(function(){

            var pathArray = window.location.pathname.split( '/' );
            var segment_1 = pathArray[3];
            var split1 = segment_1.split('-');
            alert(split1[0])
        });
    });
</script>-->

</body>
</html>