<!Doctype html>
<html lang="en">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>uploads/favicon.ico" />
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width">
    <?php require_once(CSS.'css.php'); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
<style>
.glyphicon{
top:-1px;
    cursor: pointer;
}
.user_liked{
margin-right:20px;
}
</style>

</head>
<body>
<div class="col-md-12 no-pad-clss">
<?php echo $menuIcons; ?>
<?php echo $menuCategories; ?>
<div class="col-md-9 no-pad-clss art-bck">
<div class="col-md-10 art-rhthead-bckclr no-pad-clss">
    <div class="col-md-12 art-bck-head no-pad-clss">
        <div class="pull-left" id="goBack">
            <a href="<?php echo ($this->session->userdata('back_url')) ? $this->session->userdata('back_url') : base_url('article');?>" class="fa fa-arrow-circle-o-left fa-3x"></a>
        </div>
        <div class="col-md-4 pull-right margn-cls">
            <span class="usr-log-cls"><span class="usr-nme"><a href="<?php echo base_url().'user/'.$this->session->userdata['profile_data'][0]['custName'];?>"><?php echo ucwords($this->session->userdata['profile_data'][0]['perdataFullName']); ?></a></span></span>
                            <span>
                                <a href="<?php echo base_url().'user/'.$this->session->userdata['profile_data'][0]['custName'];?>"><img src="<?php echo ($this->session->userdata['profile_data'][0]['photo'] && file_exists(UPLOADS.$this->session->userdata['profile_data'][0]['photo'])) ? base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo'] : base_url().UPLOADS.'profile.png';?>" alt="<?php echo $this->session->userdata['profile_data'][0]['photo']; ?>" class="img-responsive img-circle img-height-cls"></a>
                                </span>

        </div>
    </div>
</div>
<div class="site-wrapper">

<section class="container">
<div class="row">

<div class="col-md-9 col-md-offset-1 post-top">
<?php
if($results){ ?>
<article class="post">
    <div class="col-md-12" id="editDeleteDiv">
        <?php if($results->artCustID == $this->session->userdata['profile_data'][0]['custID']){ ?>
            <a href="javascript:void(0)" data-toggle="modal" data-target="#deleteConfirmation" class="glyphicon glyphicon-trash deleteConfirmation" title="<?php echo $lang['delete']; ?>"></a>
            <a class="glyphicon glyphicon-pencil" href="<?php echo base_url().'article/edit/'.$this->custom_function->create_ViewUrl($results->artID,$results->artTitle); ?>" title="<?php echo $lang['edit']; ?>"></a>
        <?php } ?>
    </div>
    <header>
        <img src="<?php echo ($results->artImage && file_exists(ARTICLES.$results->artImage)) ? base_url().ARTICLES.$results->artImage : base_url().ARTICLES.'Article-Default.jpg';?>" alt="<?php echo $results->artTitle; ?>" title="<?php echo $results->artTitle; ?>" >
        <div class="post-meta">
            <ul>
                <li><button><i class="fa fa-calendar"></i></button><div class="meta-content"><span><?php echo date("m/d/y g:i A", strtotime($results->artCreated)); ?></span></div></li>
                <li><button><i class="fa fa-folder-open"></i></button><div class="meta-content"><span> <?php echo $lang['categories']; ?>: <?php echo $results->artCategoryNames; ?></span></div></li>
                <li><button><i class="fa fa-user"></i></button><div class="meta-content"><span><?php echo $lang['admin_post']; ?></span></div></li>
            </ul>
        </div>
    </header>
    <h1> <?php echo $results->artTitle; ?></h1>
    <div class="post-content">
        <p><?php echo $results->artDesc; ?></p>
    </div>

    <div id="post-tags">
        <p>
            <?php
            if($results->artTags){
                echo '<label>'.$lang['tags'].'</label>';
                $artTags = explode(',', $results->artTags);
                foreach ($artTags as $key => $value) {
                    echo '<span>'.$value.'</span>';
                }
            }
            ?>
        </p>

    </div>
</article>
<span class="user" id="<?php echo $results->artCustID; ?>"></span>
(<span id="user_likes"><?php echo $results->totallikes; ?></span>)
<?php if(!$results->liked) {?>
  <span class="user_liked"><span class="glyphicon glyphicon-thumbs-up user_like" id="<?php echo $results->artID; ?>" > <?php echo $lang['like']; ?> </span></span>

<?php }else{ ?>
    <span class="user_unliked"> <span class="glyphicon glyphicon-thumbs-up user_unlike" id="<?php echo $results->artID; ?>"  > <?php echo $lang['unlike']; ?> <span></span></span></span>

<?php } ?>
<span class="glyphicon glyphicon-comment">  <?php echo $lang['comments']; ?> (<span id="comment_count"><?php echo $results->total_comments; ?></span>)</span>
<p style="margin-top: 3%"><?php echo $lang['recent_comments']; ?>:<span id="recent_comment_count"></span></p>

    <div class="coment_display">
        <?php
            if(!empty($comments)){
                foreach ($comments as $key => $value) { ?>
                    <div id="<?php echo $value->uaID; ?>" class='coment_single' >
                        <a href="<?php echo base_url().'basicprofile/?uid='.$value->custID ;?>"><img class="pro_art_new" src="<?php echo base_url().UPLOADS.$value->photo; ?>" ></a>
                        <div class="com_art_new"><a href="<?php echo base_url().'basicprofile/?uid='.$value->custID ;?>"><b><?php echo $value->perdataFullName; ?>:</b></a><p><?php echo nl2br($value->uaDescription); ?></p> 
                        
                                                </div>
                                                <?php if($this->session->userdata['profile_data'][0]['custID'] == $value->custID){ ?>
                                                <span class="glyphicon glyphicon-edit edit-comment" title="<?php echo $lang['edit']; ?>"></span>
                                                <span class="glyphicon glyphicon-trash trash-comment" title="<?php echo $lang['delete']; ?>"></span>
                                                <?php } ?>
                                                
                         <?php /* ?>
                         <a style="color:#46b8da;cursor:pointer;" data-toggle="modal" class="editDisc" data-target="#EditDiscussionmodel">
                                <span style="float:right; margin: -37px 28px 2px 22px;" class="glyphicon glyphicon-edit"></span>
                          </a>
                         <a style="color:#FF8F00;cursor:pointer;" class="DelDiscConfrm" data-toggle="modal" data-target="#DeleteDiscussionsModel">
                                <span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span>
                         </a>
                         <?php */ ?>

                    </div>
                    
        <?php   }
            }
        ?>

    </div>
    <?php if($results->total_comments > $comment_limit) { ?>
    <div id="view-more-comments-div"><a href="javascript:void(0);" id="view-more-comments"><?php echo $lang['more_comments']; ?></a></div>
    <?php } ?>

    <div class="input-group" id="comment-div">    
        <textarea id="message-text" class="form-control" placeholder="<?php echo $lang['type_comments']; ?>" aria-describedby="basic-addon2"></textarea>
        <button class="input-group-addon" id="commentBtn"><?php echo $lang['submit']; ?></button>
    </div>
    
    <?php
    } ?>

</div>

</div>
</section>


</div>
</div>
</div>

<div id="new_comment_hidden" class="hide">
    <div id="" class='coment_single' >
        <a href="<?php echo base_url().'user/'.$this->session->userdata['profile_data'][0]['custName'] ;?>"><img class="pro_art_new" src="<?php echo base_url().UPLOADS.$this->session->userdata['profile_data'][0]['photo']; ?>" ></a>
        <div class="bubble com_art_new"><a href="<?php echo base_url().'user/'.$this->session->userdata['profile_data'][0]['custName'] ;?>"><b style=""><?php echo $this->session->userdata['profile_data'][0]['perdataFullName']; ?>:</b></a><p></p></div>
        <span class="glyphicon glyphicon-edit edit-comment" title="<?php echo $lang['edit']; ?>"></span>
        <span class="glyphicon glyphicon-trash trash-comment" title="<?php echo $lang['delete']; ?>"></span>
        <?php /* ?>
        <a style="color:#46b8da;cursor:pointer;" data-toggle="modal" class="editDisc" data-target="#EditDiscussionmodel">
             <span style="float:right; margin: -37px 28px 2px 22px;" class="glyphicon glyphicon-edit"></span>
        </a>
        <a style="color:#FF8F00;cursor:pointer;" class="DelDiscConfrm" data-toggle="modal" data-target="#DeleteDiscussionsModel">
             <span style="float:right; margin: -37px 5px 2px 22px;" class="glyphicon glyphicon-trash"></span>
        </a>
        <?php */ ?>
    </div>
</div>

<?php echo $createArticlePopup; ?>
<?php echo $deletePopup; ?>

<?php include_once('assets/js/unlike/article_unlike.php');?>

<?php require_once(JS.'js.php'); ?>

</body>

</html>