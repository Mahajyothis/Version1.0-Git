<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
    <meta charset="utf-8">
    <title>.:: Welcome to Discussions ::.</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<?php include_once('assets/js/discussion/dis.php');?>
	
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="<?php echo base_url('assets/dis/css/discussion.css');?>" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    	<script src="<?php echo base_url('assets/captcha/js/vpb_captcha_checker.js');?>"> </script>
</head>
<body>
<div class="wrapper" id="loadslow" style="display:none;">
<div class="box">
<div class="row">
<!-- sidebar -->
<div class="column col-sm-2" id="sidebar">
    <a href="<?php echo base_url()."discussions";?>"><span style="padding-top:10px;padding-left:10px;"><img style="margin-top:30px;" src="<?php echo base_url('assets/dis/img/dis.png');?>" height="50px" /></span></a>
    <ul class="nav">
        <li class="active"><a href="<?php echo base_url('discussions/own');?>"><?php echo $lang['my-discussions'];?></a>
        </li>
        <li><a href="<?php echo base_url('discussions/public_discussions');?>"><?php echo $lang['public-discussions'];?></a>
        </li>
    </ul>
    
</div>
<!-- /sidebar -->

<!-- main -->

<div class="column col-sm-10" id="main">
<div class="padding">
<?php

$user = $this->session->userdata('profile_data');
//print_r($all);

?>
<div class="row">
        <div class="col-md-4 col-md-offset-3">
            	
		  <form class="form-search form-inline" action="<?php echo base_url().'discussions/search';?>" method="get">
        <div class="input-group">
            <input type="text" class="form-control search-query" name="search" id="search" placeholder="<?php echo $lang['search-discussion'];?> ..." / style="width: 300px"> <span class="input-group-btn">
            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
            </span>

        </div>
    </form>
        </div>
		
            <a style="cursor:pointer;" href="<?php echo base_url('user/'.$user[0]['custName']);?>"> <i class="pull-right fa fa-home fa-2x" style="color: #60A2D8"></i></a>       
    </div> 
<div class="full col-sm-9">

<!-- content -->

<div class="col-sm-12" id="my-discussions">
    <div class="page-header text-muted"><span class="glyphicon glyphicon-comment" style="color:#60A2D8"></span></span>
        <?php 
        if($titleHead == 'Discussions')
        {
        	echo $lang['discussions'];
        }
        else if($titleHead == "My Discussions")
        {
         	echo $lang['my-discussions'];
        }
        else
        {
        	echo $lang['public-discussions'];
        }
        ?>

        <a style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal"><span class="pull-right btn btn-info" style="margin-top: -7px;">+ <?php echo $lang['start-discussion'];?></span></a>
    </div>

</div>
<div id="recentDiscussionsSection" style="display:none;"> 

</div>

<?php

if(empty($all))
{

    echo "<div class='col-lg-12' id='noDataFound' style='color:red;padding:35px;'>".$lang['no_data_found']."...!</div>";
}
else
{
 foreach($all as $dicussion)
{
    ?>
    <!--/top story-->



    <div class="row" id="singleDiscussion_<?php echo $dicussion->id_dis;?>">

        <div class="col-sm-10">
            <h3>
                <a class="dicussion-title-a" href="<?php echo base_url().'discussions/view/'.$dicussion->id_dis.'-'.$dicussion->slug;?>"><?php echo $dicussion->titleDis;?></a></h3>
            <?php if($dicussion->custID == $user[0]['custID']){?>

          
                <span class="userActions" id="<?php echo $dicussion->id_dis;?>"> 
                <a style="color:#46b8da;cursor:pointer;" data-toggle="modal" class="editDisc" data-target="#EditDiscussionmodel">
                    <span style="float:right; margin: -37px 28px 2px 22px;" class="glyphicon glyphicon-edit"></span>
                </a>
                <a style="color:#FF8F00;cursor:pointer;" class="DelDiscConfrm" data-toggle="modal" data-target="#DeleteDiscussionsModel"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>
				
				</span>





            <?php }
            else
            {
                ?>
				 <span class="userActions" id="<?php echo $dicussion->id_dis;?>"> 
                <a style="color:#808080;cursor:pointer;" data-toggle="modal" class="hideDisClick" title="<?php echo $lang['hide'];?>" data-target="#hideDiscussion"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-eye-close"></span></a>
				</span>
			
            <?php
            }
            ?>

            <p class="read-more">
                <?php $string = $dicussion->bodyDis;
                if (strlen($string) > 100) {
                    $trimstring = substr($string, 0, 100). ' <a  data-href="'.$dicussion->id_dis.'" data-toggle="tooltip" data-placement="top" title="'.$lang['read_more'].'" id="readmore" href="'.base_url().'discussions/view/'.$dicussion->id_dis.'-'.$dicussion->slug.'">'.$lang['read_more'].' &rarr;</a>';
                } else {
                    $trimstring = $string;
                }
                echo $trimstring;
               
                ?>


            </p>

            <h4>
                <input  type="text" id="did" name="did" class="did" value="<?php echo $dicussion->id_dis;?>" style="display: none">

				
				
				
				
                <span class="small" style="padding:3px;border-radius:3px;" title="<?=$lang['comments'];?>"><span class="small glyphicon glyphicon-comment"></span>&nbsp;<?php echo $dicussion->total_comments;   ?> </span>

            

                <span class="small" style="padding:3px;border-radius:3px;" title="<?=$lang['likes'];?>"><span class="small glyphicon glyphicon-thumbs-up"></span>&nbsp;<?php echo $dicussion->total_likes;  ?></span>
                
				



                <span class="small" style="padding:3px;border-radius:3px;" title="<?=$lang['views'];?>"><span class="small glyphicon glyphicon-eye-open"></span>&nbsp;<?php echo $dicussion->views;?></span>
               
                <small> <span class="small glyphicon glyphicon-time"></span> <?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$dicussion->dDate);?> </small>

                <small class="privacyBlock">

                    <?php
                    if($dicussion->privacy == 1)
                    {
                        ?>
                        <a data-toggle="tooltip" data-placement="top" title="<?php echo $lang['public'];?> <?php echo $lang['discussion'];?>"> <span class="small glyphicon glyphicon-globe"></span> <?php echo $lang['public'];?></a>
                    <?php
                    }
                    else
                    {
                        ?>
                        <a data-toggle="tooltip" data-placement="top" title="<?php echo $lang['private'];?> <?php echo $lang['discussion'];?>"> <span class="small glyphicon glyphicon-user"></span> <?php echo $lang['private'];?></a>
                    <?php } ?>


                </small>

            </h4>

        </div>

        <div class="col-sm-2">
            <div class="col-sm-12" style="text-align:center;margin-bottom:10px;"><a href="<?php if($dicussion->custID == $user[0]['custID']){echo base_url('user/'.$user[0]['custName']);} else { echo base_url()."basicprofile?uid=".$dicussion->custID; } ?>"><img style="border:1px solid #ddd;" src="<?php echo ($dicussion->photo && file_exists(UPLOADS.$dicussion->photo)) ? base_url().UPLOADS.$dicussion->photo : base_url().UPLOADS.'profile.png';?>" class="img-circle"></a>
            </div>
            <div class="col-sm-12" style="text-align:center;font-weight:bold;"><?php echo $dicussion->perdataFirstName." ".$dicussion->perdataLastName;if($dicussion->custID == $user[0]['custID']){?> <span style="color:#31B404;" title="<?php echo $lang['you'];?>" class="glyphicon glyphicon-ok-circle"></span><?php } ?></div>
        </div>
		
		 <div class="row divider">
        <div class="col-sm-12"><hr style="margin-top: 20px;margin-bottom: 20px; border: 0;border-top: 1px dashed #60A2D8"></div>
    </div>
    </div>
	
	
    
   
    
	
   
    <div class="modal fade" id="DeleteDiscussionsModel" tabindex="-1" role="dialog" aria-labelledby="DeleteDiscussionsModel">
        <div class="modal-dialog" role="document" style="z-index:9999;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><h3><?php echo $lang['delete_confirmation'];?></h3>
                </div>
                <div class="modal-body">
                    <?php echo $lang['do_you_want_to_delete'];?> 
                </div>
                <div class="modal-footer" >
                   <span class="tagetDelDis" id="">
                  <button type="button" class="btn btn-success btn-sm" id="deleteConfirmBtn"><?php echo $lang['delete'];?></button>
					
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo $lang['cancel'];?></button>
					<span>
                </div>
                </form>
            </div>
        </div>
    </div>


<?php } 
}
?>

<style>
    .pagination strong
    {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;


    }
</style>


<ul class="pull-right pagination">

    <?php
    echo $links;

    ?>
</ul>



<div class="col-sm-12">
    <!--<div class="page-header text-muted divider">
        Connect with Us
    </div>-->
</div>

<div class="row">
    <div class="col-sm-6">
        <a href="#"><img src="<?php echo base_url(); ?>assets/img/discussion/twiter.png"></a> <small class="text-muted">|</small> <a href="#"><img src="<?php echo base_url(); ?>assets/img/discussion/fb.png"></a> <small class="text-muted">|</small> <a href="#"><img src="<?php echo base_url(); ?>assets/img/discussion/message.png"></a>
    </div>
</div>

<hr>

<div class="row" id="footer">
    <div class="col-sm-6">

    </div>
   
</div>

<hr>



</div><!-- /col-9 -->
</div><!-- /padding -->
</div>
<!-- /main -->
</div>
</div>
</div>


               	<div class="modal fade" id="EditDiscussionmodel" tabindex="-1" role="dialog" aria-labelledby="EditDiscussionmodel">
                           <div class="modal-dialog" role="document" style="z-index:9999;">
                           <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><?php echo $lang['edit_a_discussion'];?></h4>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'discussions/update/';?>" enctype="multipart/form-data">
          <div class="form-group">
		 
			<label for="recipient-name" class="control-label"><?php echo $lang['title'];?>:</label>
            <input type="text" required class="form-control" name="Edit_titleDis" value="" id="Edit_titleDis">
			<input type="hidden" required class="form-control" name="Discussion_id_for_edit" value="" id="Discussion_id_for_edit">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label"><?php echo $lang['description'];?>:</label>
            <textarea class="form-control" name="Edit_bodyDis" id="Edit_bodyDis" required></textarea>
          </div>
		  
		    <div class="form-group">
            <label for="message-text" class="control-label"><?php echo $lang['category'];?>:<small>(<?php echo $lang['for_new_category'];?> : <span style="color:red;font-style:italic;">support@mahajyothis.net</span>)</small></label>
            <select class="form-control"  name="categoryEdit" id="categoryEdit">
										<option value='astrology'><?php echo $lang['astrology'];?></option>
										<option value='numerology'><?php echo $lang['numerology'];?></option>
										<option value='horoscope'><?php echo $lang['horoscope'];?></option>
										<option value='tarot-reading'><?php echo $lang['tarot_reading'];?></option>
										<option value='zodiac'><?php echo $lang['zodiac'];?></option>
										<option value='fengi-shui'><?php echo $lang['fengi_shui'];?></option>
										<option value='other'><?php echo $lang['other'];?></option>
      </select>
	  
          </div>
		  
		    <div class="form-group">
            <label for="message-text" class="control-label"><?php echo $lang['privacy'];?>:</label>
            <select class="form-control"  name="Edit_privacy" id="Edit_privacy">
			<option value='1'><?php echo $lang['public'];?></option>
			<option value='2'><?php echo $lang['private'];?></option>
			</select>
          </div>
    
      </div>
      <div class="modal-footer">
	    <span class="required_error hide pull-left" style="color:red;">* <?=$lang['please-kindly-fill-all-fields'];?></span>

		 <input type="submit" class="btn btn-success btn-sm" id="UpdateEditedDiscussion" value="<?php echo $lang['update'];?>" />
		 
		          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo $lang['cancel'];?></button>
      </div>
	      </form>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="z-index:9999;">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><?php echo $lang['start_new_discussion'];?></h4>
      </div>
      <div class="modal-body">
      <form method="post" id="NewDiscussionFORM" enctype="multipart/form-data">
          <div class="form-group">
		   <input type="hidden" required class="form-control" name="userID" id="userID" value="<?php echo $user[0]['custID'];?>">
            <label for="recipient-name" class="control-label"><?php echo $lang['title'];?>:</label>
            <input type="text" required class="form-control" name="titleDis" id="titleDis">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label"><?php echo $lang['description'];?>:</label>
            <textarea class="form-control" name="bodyDis" id="bodyDis" required></textarea>
          </div>
		  
		    
        <div class="form-group">
          <label for="message-text" class="control-label"><?php echo $lang['category'];?>: <small>(<?php echo $lang['for_new_category'];?>, <?php echo $lang['contact'];?> : <span style="color:red;font-style:italic;">support@mahajyothis.net</span>)</small></label>
            <select class="form-control"  name="category" id="category">
										<option value='astrology'><?php echo $lang['astrology'];?></option>
										<option value='numerology'><?php echo $lang['numerology'];?></option>
										<option value='horoscope'><?php echo $lang['horoscope'];?></option>
										<option value='tarot-reading'><?php echo $lang['tarot_reading'];?></option>
										<option value='zodiac'><?php echo $lang['zodiac'];?></option>
										<option value='fengi-shui'><?php echo $lang['fengi_shui'];?></option>
										<option value='other'><?php echo $lang['other'];?></option>
      </select>
	  
          </div>
		  
		    <div class="form-group">
            <label for="message-text" class="control-label"><?php echo $lang['privacy'];?>:</label>
            <select class="form-control"  name="privacy" id="privacy">
			<option value='1'><?php echo $lang['public'];?></option>
			<option value='2'><?php echo $lang['private'];?></option>
			</select>
			
			
          </div>
          
          <div class="form-group">
              <div style="width:300px; float:left;" align="left"><div class="vpb_captcha_wrapper"><img src="<?php echo base_url().'assets/captcha/';?>vasplusCaptcha.php?rand=<?php echo rand(); ?>" id='captchaimg' ></div>

<div style=" padding-top:5px;" align="left"><font style="font-family:Verdana, Geneva, sans-serif; font-size:11px;"><?=$lang['cant-read'];?> <span class="ccc"><a style="color:red;" href="javascript:void(0);" onClick="vpb_refresh_aptcha();" id="refCaptcha"><?=$lang['choose-another-image'];?></a></span></font></div>

</div>
            <input type="text" required class="form-control" placeholder="<?php echo $lang['enter_above_code_here'];?>" name="vpb_captcha_code" id="vpb_captcha_code">
          </div>
        <!--  <div class="g-recaptcha" data-sitekey="6Lcd3w8TAAAAAHN4bq7UpChuwjLvoNHLipw_5LFV"></div> -->
    
      </div>
      <div class="modal-footer">
          <span class="required_error hide pull-left" style="color:red;">* <?=$lang['please-kindly-fill-all-fields'];?></span>
		 <input type="submit" class="btn btn-success btn-success btn-sm" id="CreateNewdiscussion" value="<?php echo $lang['start-discussion'];?>" />
		 
		 <button type="button" class="btn btn-danger btn-sm" id="closeBtnCreate" data-dismiss="modal"><?php echo $lang['cancel'];?></button>
      </div>
	      </form>
    </div>
  </div>
</div>


<!-- script references -->

<script src="<?php echo base_url('assets/dis/js/bootstrap.min.js');?>"></script>

<script>
    $(document).ready(function(){

        $("#loadslow").fadeIn(600);

        $('[data-toggle="tooltip"]').tooltip();



    });


</script>

<div id="DummyDisBLOCK" class="hide">
<div class="row discussion_block" id="">

        <div class="col-sm-10">
            <h3>
			
                <a class="dicussion-title-a" href=""></a></h3>
            
                <span class="userActions" id=""> 
                <a style="color:#5BC0DE!important;cursor:pointer;" class="editDisc" data-toggle="modal" data-target="#EditDiscussionmodel">
                    <span style="float:right; margin: -37px 28px 2px 22px;color:#5BC0DE!important;" class="glyphicon glyphicon-edit"></span>
                </a>
                <a style="color:#FB9999;cursor:pointer;" data-toggle="modal" class="DelDiscConfrm" data-target="#DeleteDiscussionsModel"><span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span></a>
				
				</span>

 


            
            <p class="read-more">
           
            </p>

            <h4>
                <input type="text" id="did" name="did" class="did" value="" style="display: none">
                <span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-comment"></span>0 </span>

            

                <span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-thumbs-up"></span>0</span>
                
				



                <span class="small" style="padding:3px;border-radius:3px;"><span class="small glyphicon glyphicon-eye-open"></span>0</span>
                <small> <span class="small glyphicon glyphicon-time"></span> Few seconds ago </small>

                <small class="privacyBlock">

                                            <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Public discussion"> <span class="small glyphicon glyphicon-globe"></span> public</a>
                    

                </small>

            </h4>

        </div>

        <div class="col-sm-2">
            <div class="col-sm-12" style="text-align:center;margin-bottom:10px;"><a href="#"><img style="border:1px solid #ddd;" src="<?php echo base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'];?>" class="img-circle"></a>
            </div>
            <div class="col-sm-12" style="text-align:center;font-weight:bold;"><?php echo $this->session->userdata['profile_data'][0]['perdataFirstName']." ".$this->session->userdata['profile_data'][0]['perdataLastName'];?> <span style="color:#31B404;" title="You" class="glyphicon glyphicon-ok-circle"></span></div>
        </div>
		
		  <div class="row divider">
        <div class="col-sm-12"><hr style="margin-top: 20px;margin-bottom: 20px; border: 0;border-top: 1px dashed orange;"></div>
    </div>
    </div>
</div>


 <div class="modal fade" id="hideDiscussion" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document" style="z-index:9999;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><h3><?php echo $lang['hide_confirmation'];?></h3>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo $lang['do_you_want_to_hide'];?>
                                    </div>
                                    <div class="modal-footer">

                                        <a href="#" style="cursor:pointer;text-decoration:none;" class="" id="idtoHide"><button type="button" class="btn btn-success btn-sm" id="preHidethis"><?php echo $lang['hide'];?></button>
										</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><?php echo $lang['cancel'];?></button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>


<script>
$(document).ready(function() {

$('#CreateNewdiscussion').addClass('hide');

$('#vpb_captcha_code').keyup(function() {

var captchaAns = $('#vpb_captcha_code').val();

if(captchaAns != '')
{
   var dataString = 'vpb_captcha_code='+ captchaAns;
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>assets/captcha/captcha_checker.php",
			data: dataString,
			cache: false,
			success: function(response)
			{
			    data = parseInt(response);
				if(data == 0)
				{
				   $('#CreateNewdiscussion').addClass('hide');
				}
				else
				{
				   $('#CreateNewdiscussion').removeClass('hide');
				}
				
			}
		});
   //alert(val1+val2);
  
}
else
{
   $('#CreateNewdiscussion').addClass('hide');
}

});

});


</script>

</body>
</html>