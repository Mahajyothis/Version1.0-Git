
   <body class="forum-page">
   <?php
	$user = $this->session->userdata('profile_data');	
	$mobile_url = $this->config->item('mobile_url');
   ?>
   	<div class="main-div">
    	  <div class="container-fluid">
    	  <?php echo $logo_login_part; ?>
          	
          	
            </div><!--header-->             
            <div class="row article-box">            
                	<img src="<?php echo base_url().MOBILE_IMAGES.'forum-head.png';?>" class="img-responsive img-center"/>                     
            </div><!--profile-box--> 
            <div class="form-search row" >
            	<form>
                	<div class="form-group col-xs-5 no-r-pad">
                    	<button class="btn btn-no-rad white orange-bg form-control form-sm" type="button" data-toggle="modal" data-target="#myModal">Ask Question?</button>
                    </div>
                    <div class="form-group col-xs-7 no-l-pad">                    	
                        <div class="input-group">
                          <input type="text" class="form-control  btn-no-rad forum-box white" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-default btn-no-rad search-frm" type="button"><i class="fa fa-search fa-lg"></i></button>
                          </span>
                        </div><!-- /input-group -->
                    </div>
                </form>
            </div>
<!--profile-div -->
<?php

if(empty($results))
{

    echo "<div class='col-lg-12' id='noDataFound' style='color:red;padding:35px;'>".$lang['no_data_found']."...!</div>";
}
else
{

    foreach($results as $result)
    {
      
         ?>
<div id="singleQestion_<?php echo $result->id_que;?>">      
<!-- @@@@ --> 

            <div class="row  forum-detail">            
                <div class="row profile-box forum-pic-box">
                    <div class=" col-xs-3 profile-pic no-r-pad">
                        <img src="" class="img-responsive img-center img-circle"/><h5 class="text-center orange-clr"><strong><?php echo $result->perdataFirstName;?> <?php echo $result->perdataLastName;?></strong></h5>
                    </div>  
                    <div class="col-xs-9 white">
                        <h5><?php echo $result->titleQue;?></h5>
                            <p><?php echo $result->bodyQue;?></p>                       
                    </div> 
                </div> <!--grp-pic-box-->                        	
                <div class="col-xs-12 text-center">
                	<div class="arc-comm forum-comm white">
                    	<ul class="list-inline">
                    	<li><i class="fa fa-repeat"></i>&nbsp;<span class="count comment-count">(<?php echo $result->total_comments; ?>)</span> Reply</li>
                        <li><i class="fa fa-thumbs-up"></i>&nbsp;<span class="count like-count">(<?php echo $result->total_likes;?>)</span> Likes</li>      
                        <li><i class="fa fa-clock-o"></i>&nbsp;<span class="count comment-count"></span> <?php echo $this->custom_function->get_notification_time($this->config->item('global_datetime'),$result->dDate);?></li>                    
                        </ul>
                    </div>
                </div>
            </div>     
            <div class="row"> 
            	<div class="col-md-12 tab-con">                	 
                      <ul  class="list-unstyled comment-list grp-list grp-own-list forum-list">  
                              <?php if(!empty($result->comments))
                        {
      			foreach($result->comments as $row)
      			{
      	
      
                            ?>            			
                            <li class="news-item">
                                <table cellpadding="">
                                <tbody><tr>
                                <td><img src="<?php echo ($row['photo'] && file_exists(UPLOADS.$row['photo'])) ? base_url().UPLOADS.$row['photo'] : base_url().UPLOADS.'profile.png';?>" height="40px" width="40px"><p class="fm" id="singlcomment" class="img-circle" width="40"></td>
                                <td class="comment">                                    
                                    <p><?php echo $row['comment'];?></p>                                   
                                </td>     
                                <td class="eandd text-center">
                                	<button class="edit"><i class="fa fa-pencil-square-o fa-lg"></i></button><br><button class="del"><i class="fa fa-trash fa-lg"></i></button>
                                </td>
                                </tr>
                                </tbody></table>  
                             </li> 
                             <?php  
		      	}
		      	
		      	
		      } 
		      
		      ?>   
                             
                            
                      </ul>

                      <a href="javascript:void(0)" class="view_more_forum_comments old_comments" style="color: darkgreen; font-weight: bold" data-postid="<?php echo $result->id_que;?>"><?=$lang['view-more-comments'];?></a>
                      
                </div>
                
            </div>  
            
            <div class="row forum-div">
            	<form>
                	<div class="form-group col-xs-8 no-r-pad">
                    	<textarea class="form-control btn-no-rad forum-box white" placeholder="Type Your Comment Here..."></textarea>
                    </div>
                    <div class="form-group col-xs-4 no-l-pad">
                    	<input type="submit" value="post" class="btn btn-no-rad white orange-bg form-control form-sm">
                    </div>
                </form>
                
            </div> 
            
<!--@@@@ -->            
</div> 
<?php }  } ?>
<!-- end of prfile box -->	            
          </div><!--container-fluid-->
    </div><!--plugin-->
    <footer>
    	<div class="container">
        	<div class="row">
            	<div class="col-xs-5">
                	<a href="#"><img src="" class="img-responsive img-center"></a>
                </div>
                <div class="col-xs-5  col-xs-offset-2">
                	<a href="#"><img src="" class="img-responsive img-center"></a>
                </div>
            </div>
        </div>
    </footer>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content forum-model-bg">
      <div class="modal-header forum-head-bg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title white" id="myModalLabel">Start New Discussion</h4>
      </div>
      <div class="modal-body white">
      	<form>
        <div class="row">
        	<div class="col-xs-12">
            	<label>Title</label>
            	<div class="form-group">
            		<input type="text" class="form-control">
            	</div>                                                                      	
                <label>Description</label>
            	<div class="form-group">
            		<textarea class="form-control"></textarea>
            	</div>
                <label>Category</label>
            	<div class="form-group">
            		<select class="form-control"><option>--Select--</option></select>
            	</div>                
                <div class="row">
                	<div class="col-xs-12">
                    	<label>Captcha</label>
                    </div>
                	<div class="col-xs-6">                    	
                        <div class="form-group">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-6 text-right">
                    	<button type="button" class="btn btn-sm cap-btn"><img src=""></button>                    	
                    </div>
                </div>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-no-rad btn-sm mo-btn mo-can-btn white" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-no-rad orange-bg white btn-sm mo-btn">Submit</button>
      </div>
    </div>
  </div>
</div>          	
       
      <!-- Include all compiled plugins (below), or include individual files as needed -->
        
      

   </body>
</html>