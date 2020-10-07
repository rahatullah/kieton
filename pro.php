<?php
   include 'timeline/includes/config.php';
   include 'timeline/includes/smileys.php';
   include 'timeline/includes/security.php';
   require_once('hm_functions.php');
   require_once('startsession.php');
   
   
   if (isset($_SESSION['hm_id'])) {
   	$hm_info = profileInfo($_SESSION['hm_id']);
   }
   $user_hm_id = $hm_info['hm_id'];
   $user_first_name = $hm_info['first_name'];
   $user_last_name = $hm_info['last_name'];
   $user_profile_pic = $hm_info['profile_pic'];
   $hm_name = $user_first_name . " " . $user_last_name;
   ?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Profile</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	  
      
	  <link href="timeline/assets/stylesheets/normalize.css" media="screen" rel="stylesheet" type="text/css" />
      <link href="timeline/assets/stylesheets/all.css" media="screen" rel="stylesheet" type="text/css" />
      <link href="timeline/assets/stylesheets/timeline.css" media="screen" rel="stylesheet" type="text/css" />
      
      <link href="timeline/assets/stylesheets/comments.css" media="screen" rel="stylesheet" type="text/css" />
	  
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  
	  <!-- Theme CSS -->
    	<link href="boot/css/freelancer.min.css" rel="stylesheet">

      <style>
         body {
         font: 20px Montserrat, sans-serif;
         line-height: 1.8;
         color: #f5f6f7;
         }
         p {font-size: 16px;}
         .margin {margin-bottom: 45px;}
         .bg-1 {
         background-color: #1abc9c; /* Green */
         color: #ffffff;
         }
         .bg-2 {
         background-color: #474e5d; /* Dark Blue */
         color: #ffffff;
         }
         .bg-3 {
         background-color: #ffffff; /* White */
         color: #555555;
         }
         .bg-4 {
         background-color: #2f2f2f; /* Black Gray */
         color: #fff;
         }
         .container-fluid {
         padding-top: 70px;
         padding-bottom: 70px;
         }
         .navbar {
         padding-top: 15px;
         padding-bottom: 15px;
         border: 0;
         border-radius: 0;
         margin-bottom: 0;
         font-size: 12px;
         letter-spacing: 5px;
         }
         .navbar-nav  li a:hover {
         color: #1abc9c !important;
         }
      </style>
   </head>
   <body id="who1">
      <!-- Navbar -->
      <nav id="mainNav" class="navbar navbar-fixed-top navbar-custom">
         <div class="container">
            <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="glyphicon glyphicon-option-vertical"></span>
				</button>

               <a class="navbar-brand" href="#who1" style="font-size:15px;">Rahatullah Ansari</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav navbar-right">
                  <li class="page-scroll"><a href="#who1">WHO</a></li>
                  <li class="page-scroll"><a href="#what">WHAT</a></li>
                  <li class="page-scroll"><a href="#where">WHERE</a></li>
               </ul>
            </div>
         </div>
      </nav><br>
      <!-- First Container -->
      <div id="who" class="container-fluid bg-1" style="background-image:url(images/profile_pic/Koala.jpg); background-size:100%; background-position:center; background-repeat:no-repeat;">
         <img src="images/profile_pic/FB_IMG_1454510805954.jpg" class="img-responsive img-circle" alt="Profile Picture" width="80" height="80">
		 <br>
         <p>I'm an entrepreneur</p>
		 <a href="#" class="btn btn-default btn-sm" title="Edit profile">
         	<span class="glyphicon glyphicon-edit"></span> Edit
         </a>
		 <a href="#" class="btn btn-default btn-sm" title="Send friend request">
         	<span class="glyphicon glyphicon-plus"></span> Friend
         </a>
		 <a href="#" class="btn btn-default btn-sm" title="Send message">
         	<span class="glyphicon glyphicon-envelope"></span> Message
         </a>
      </div>
      <!-- Second Container -->
      <div id="what" class="container-fluid bg-2">
         <h3 class="margin">About me!</h3>
         <p>Founder and C.E.O. at HELPMIII</p>
		 <p>Live in :- Ghaziabad, U.P.</p>
		 <p>From :- Jaunpur, U.P.</p>
		 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
		 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
         <a href="#" class="btn btn-default btn-sm" title="Edit about section">
         	<span class="glyphicon glyphicon-edit"></span> Edit
         </a>
		 <a href="#" class="btn btn-default btn-sm" title="View work">
         	<span class="glyphicon glyphicon-briefcase"></span> Work
         </a>
		 <a href="#" class="btn btn-default btn-sm" title="View Contact">
         	<span class="glyphicon glyphicon-phone"></span> Contact
         </a>
		 <a href="#" class="btn btn-default btn-sm" title="Get location">
         	<span class="glyphicon glyphicon-map-marker"></span> Location
         </a>
      </div>
      <!-- Third Container (Grid) -->
      <div id="where" class="container-fluid bg-3 text-center">
         
         
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 class="margin">Where i'm</h3>
                    <h4>Lorem ipsum dolor sit amet consectetur.</h4>
                </div>
            </div>
			<br>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="boot/img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2009-2011</h4>
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut volup</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="boot/img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>March 2011</h4>
                                    <h4 class="subheading">An Agency is Born</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut volu</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="boot/img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>December 2012</h4>
                                    <h4 class="subheading">Transition to Full Service</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, </p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="boot/img/about/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>July 2014</h4>
                                    <h4 class="subheading">Phase Two Expansion</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
							<a href="#" style="text-decoration:none;"  title="Click here to work with me.">
								<div class="timeline-image">
									<h4>Be Part
										<br>Of My
										<br>Story!
									</h4>
								</div>
							</a>
                        </li>
                    </ul>
                </div>
            </div>
			<br>
        	<a href="#" class="btn btn-default btn-sm" title="Edit where section">
				<span class="glyphicon glyphicon-edit"></span> Edit
			</a>
      </div>
	  
	  <div class="index">
	  <div class="container">
         <ol class="timeline clearfix">
            <li class="left">
               <i class="pointer"></i>
               <div class="unit" id="tabs">
                  <ul class="actions">
                     <li><a href="#tabs-1"><i class="icon icon-status"></i>Status</a></li>
                     <li><a href="#tabs-2"><i class="icon icon-photo"></i>Add Picture</a></li>
                     <li><a href="#tabs-3"><i class="icon icon-video"></i>Add Video</a></li>
                  </ul>
                  <span class="ajax_indi"><img src="assets/images/loader.gif"></span>
                  <!-- Units -->
                  <div class="actionUnits" id="tabs-1">
                     <form id="npost" name="npost">
                        <p class="formUnit" id="Status"> <i class="active"></i>
                           <textarea name="message" placeholder="Come On! Make over your thoughts or views into words..." id="message" cols="30" rows="3"></textarea>
                           <input type="hidden" name="user_hm_id" id="user_hm_id" value="<?php echo $user_hm_id; ?>">
                        <ol class="controls clearfix">
                           <li class="post">
                              <input class="uibutton confirm fb_submit" type="button" title="npost" value="Post">
                           </li>
                        </ol>
                        </p>
                     </form>
                  </div>
                  <div class="actionUnits" id="tabs-2">
                     <form id="picpost" name="picpost">
                        <p class="formUnit"> <i class="active_pic"></i>
                           <textarea name="message" placeholder="Come On! Make over your thoughts or views into words..." id="pmessage" cols="30" rows="3"></textarea>
                           <input type="hidden" name="pic_url" id="pic_url">
                           <input type="hidden" name="user_hm_id" id="user_hm_id" value="<?php echo $user_hm_id; ?>">
                           <button class="uibutton" type="button" id="upload_pic">Upload Picture</button><span id="statuss"></span>
                        <ol class="controls clearfix">
                           <li class="post">
                              <input class="uibutton confirm fb_submit"  type="button" value="Post" title="picpost">
                           </li>
                        </ol>
                        </p>
                        <p id="files"></p>
                     </form>
                  </div>
                  <div class="actionUnits" id="tabs-3">
                     <form id="vidpost" name="vidpost">
                        <p class="formUnit" id="Status"> <i class="active_vid"></i>
                           <textarea name="message" placeholder="Come On! Make over your thoughts or views into words..." id="vmessage" cols="30" rows="3"></textarea>
                           <input type="text" name="y_link" style="width:100%" id="y_link" placeholder="Enter Youtube Url Like:- www.youtube.com/watch?v=rdmycu13Png">
                           <input type="hidden" name="user_hm_id" id="user_hm_id" value="<?php echo $user_hm_id; ?>">
                        <ol class="controls clearfix">
                           <li class="post">
                              <input class="uibutton confirm fb_submit" type="button" value="Post" title="vidpost">
                           </li>
                        </ol>
                        </p>
                     </form>
                  </div>
                  <!-- / Units -->
               </div>
            </li>
         </ol>
         <style>
            p.msg_wrap { word-wrap:break-word; }
         </style>
         <ol class="timeline clearfix" id="tupdate">
            <?php
               
               $query="SELECT * FROM `posts` ORDER BY `pid` DESC LIMIT $post_limit";
               $result = mysqli_query($connection , $query);
            ?>
            <?php $al = 2; 
               while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 
               	$post_id = $row['pid']; 
				$post_hm_info = profileInfo($row['post_hm_id']);
				$post_user_first_name = $post_hm_info['first_name'];
				$post_user_last_name = $post_hm_info['last_name'];
				$post_user_profile_pic = $post_hm_info['profile_pic'];
				$post_hm_name = $post_user_first_name . " " . $post_user_last_name;
			?>
            <li class="<?php echo alignment(2); ?>" id="post-<?php echo $post_id; ?>">
               <i class="pointer" id="pagination-<?php echo $post_id;?>"></i>
               <div class="unit">
                  <!-- Story -->
                  <div class="storyUnit">
                     <div class="imageUnit">
                        <a href="#"><img src="images/profile_pic/<?php echo $post_user_profile_pic; ?>" width="32" height="32" alt=""></a>
                        <p style="float:right; text-align:right;"><a href="javascript:;" class="post-delete" id="post_delete_<?php echo $post_id; ?>">X</a></p>
                        <div class="imageUnit-content">
                           <h4><a href="#" target="_blank"><?php echo $post_hm_name; ?> </a> <small> <?php echo timeAgo($row['date']);?> via Web</small></h4>
                           
                        </div>
                     </div>
                     <pre class="msg_wrap"><?php echo parse_smileys(make_clickable(nl2br(stripslashes($row['desc']))), $smiley_folder); ?></pre>
                     <?php if(!empty($row['vid_url'])) { ?>
                     <iframe width="400" height="300" src="http://www.youtube.com/embed/<?php echo get_youtubeid($row['vid_url']);?>" frameborder="0" allowfullscreen></iframe>
                     <?php } elseif(!empty($row['image_url'])) { ?>
                     <img src="image.php/<?php echo $row['image_url'];?>?width=400&nocache&quality=100&image=/timeline/uploads/<?php echo $row['image_url'];?>">
                     <?php } ?>
                  </div>
                  <div class="activity-comments">
                     <ul id="CommentPosted<?php echo $post_id; ?>">
                        <?php 
                           //fetch comments from comments table using post id
                           $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `cpid`=$post_id ORDER BY `cid` ASC ");
                           $total_comments = mysqli_num_rows($comments);
                           ?>
                        <li class="show-all" id="show-all-<?php echo $post_id; ?>" <?php if($total_comments == 0) { ?> style="display:none" <?php } ?>><a href="javascript:;"><span id="comment_count_<?php echo $post_id;?>"><?php echo $total_comments;?></span> comments</a></li>
                        <?php 
                           while($comt = mysqli_fetch_array($comments,MYSQLI_ASSOC)) {
                           	$comment_id = $comt['cid']; 
                           	
                           	if($comt['cmt_hm_id'] == $user_hm_id){
                           	
                           ?>
                        <li id="li-comment-<?php echo $comment_id; ?>">
                           <div class="acomment-avatar">
                              <a href="#" rel="nofollow">
                              <img src="images/profile_pic/<?php echo $user_profile_pic; ?>" alt="Avatar Image" >
                              </a>
                              <p style="float:right; text-align:right; font-size:10px;"><a href="javascript:;" rel="<?php echo $post_id; ?>" class="comment-delete" id="comment_delete_<?php echo $comment_id; ?>">X</a></p>
                           </div>
                           <div class="acomment-meta">
                              <a href="#" target="_blank"><?php echo $hm_name; ?></a>  <?php echo timeAgo($comt['commented_date']);?> 
                           </div>
                           <div class="acomment-content">
                              <pre class="msg_wrap"><?php echo parse_smileys(make_clickable(nl2br(stripslashes($comt['comment']))), $smiley_folder); ?></pre>
                           </div><br>
                        </li>
                        <?php 
                           } else {
                           	$cmt_hm_info = profileInfo($comt['cmt_hm_id']);
                           	$cmt_user_first_name = $cmt_hm_info['first_name'];
                           	$cmt_user_last_name = $cmt_hm_info['last_name'];
                           	$cmt_user_profile_pic = $cmt_hm_info['profile_pic'];
                           	$cmt_hm_name = $cmt_user_first_name . " " . $cmt_user_last_name;
                           
                           ?>
                        <li id="li-comment-<?php echo $comment_id; ?>">
                           <div class="acomment-avatar">
                              <a href="#" rel="nofollow">
                              <img src="images/profile_pic/<?php echo $cmt_user_profile_pic; ?>" alt="Avatar Image" >
                              </a>
                              <p style="float:right; text-align:right; font-size:10px;"><a href="javascript:;" rel="<?php echo $post_id; ?>" class="comment-delete" id="comment_delete_<?php echo $comment_id; ?>">X</a></p>
                           </div>
                           <div class="acomment-meta">
                              <a href="#" target="_blank"><?php echo $cmt_hm_name; ?></a>  <?php echo timeAgo($comt['commented_date']);?> 
                           </div>
                           <div class="acomment-content">
                              <pre class="msg_wrap"><?php echo parse_smileys(make_clickable(nl2br(stripslashes($comt['comment']))), $smiley_folder); ?></pre>
                           </div><br>
                        </li>
                        <?php
                           }
						  }
                         ?>
                     </ul>
                     <a href="javascript:;" class="acomment-reply" title="" id="acomment-comment-<?php echo $post_id; ?>">
                     Write a comment..</a>
                     <form  method="post" id="fb-<?php echo $post_id; ?>" class="ac-form">
                        <div class="ac-reply-avatar"><img src="images/profile_pic/<?php echo $user_profile_pic; ?>" width="30" height="30" alt="Avatar Image"></div>
                        <div class="ac-reply-content">
                           <div class="ac-textarea">
                              <textarea id="ac-input-<?php echo $post_id; ?>" class="ac-input" name="comment" style="height:40px;"></textarea>
                              <input type="hidden" id="act-id-<?php echo $post_id; ?>" name="act_id" value="<?php echo $post_id; ?>" />
							  <input type="hidden" name="user_hm_id" id="user_hm_id" value="<?php echo $user_hm_id; ?>">
                           </div>
                           <input name="ac_form_submit" class="uibutton confirm live_comment_submit" title="fb-<?php echo $post_id; ?>" id="comment_id_<?php echo $post_id; ?>" type="button" value="Submit"> &nbsp; or <a href="javascript:;" class="comment_cancel" id="<?php echo $post_id; ?>">Cancel</a>			
                        </div>
                     </form>
                  </div>
                  <!-- / Units -->
               </div>
            </li>
            <?php 
               } 
               ?>
         </ol>
      </div>
	  </div>
	  
      <!-- Footer -->
      <footer class="container-fluid bg-4 text-center">
         <a href="#" class="btn btn-default btn-sm" title="Send friend request">
         	<span class="glyphicon glyphicon-plus"></span> As friend
         </a>
		 <a href="#" class="btn btn-default btn-sm" title="Send message">
         	<span class="glyphicon glyphicon-envelope"></span> Message
         </a>
		 <a href="#" class="btn btn-default btn-sm" title="View work">
         	<span class="glyphicon glyphicon-briefcase"></span> Work
         </a>
		 <a href="#" class="btn btn-default btn-sm" title="View Contact">
         	<span class="glyphicon glyphicon-phone"></span> Contact
         </a>
		 <a href="#" class="btn btn-default btn-sm" title="Get location">
         	<span class="glyphicon glyphicon-map-marker"></span> Location
         </a>
		 <a href="#" class="btn btn-default btn-sm" title="Checkout Website">
         	<span class="glyphicon glyphicon-globe"></span> Website
         </a>
      </footer>
	  
	  <!-- jQuery -->
    <script src="boot/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="boot/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="boot/js/freelancer.min.js"></script>
	  
	  
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
      <script type="text/javascript">
         var domain = "";
           // Simple infinite Scrolling
           
           $(function(){
             
               var $timeline = $('#tupdate'),
                   $spinner = $('#Spinner').hide();
             
               function loadMore(){
                 
                 $(window).unbind('scroll.posts');
                 
                 $spinner.show();
                 
                 $.ajax({
                   url: "profile/loadmore.php?lastPost="+ $(".pointer:last").attr('id'),
                   success: function(html){
                       if(html){
                           $timeline.append(html);
                           $spinner.hide();
                       }else{
                           $spinner.html('<p>No more posts to show.</p>');
                       }
                       
                       $(window).bind('scroll.posts',scrollEvent);
                   }
                 });
               }
             
             
               //lastAddedLiveFunc();
               $(window).bind('scroll.posts',scrollEvent);
               
               function scrollEvent(){
                 var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
                 var  scrolltrigger = 0.95;
         
                 if  ((wintop/(docheight-winheight)) > scrolltrigger)  loadMore();
               }
               
           });
         
         $(function(){
         $('#tabs div').hide();
         $('#tabs div:first').show();
         $('#tabs ul li:first').addClass('active');
         $('#tabs ul li a').click(function(){ 
         $('#tabs ul li').removeClass('active');
         $(this).parent().addClass('active'); 
         var currentTab = $(this).attr('href'); 
         $('#tabs div').hide();
         $(currentTab).show();
         return false;
         });
         
         
         jQuery('a.acomment-reply').live("click", function(e) {
         var getpID =  jQuery(this).attr('id').replace('acomment-comment-','');
         jQuery("#acomment-comment-"+getpID).hide();
         jQuery("#fb-"+getpID).css('display','block');
         jQuery("#ac-input-"+getpID).focus();
         		e.preventDefault();
         				});
         
         jQuery('a.comment_cancel').live("click", function(e) {
         
         var getpID =  jQuery(this).attr('id');	
         
         jQuery("#fb-"+getpID).css('display','');
         jQuery("#acomment-comment-"+getpID).show();
         jQuery("#ac-input-"+getpID).val('');
         e.preventDefault();
         });
         
         
         
         });
      </script>
      <script src="profile/assets/javascripts/all.js" type="text/javascript"></script>
      <script src="profile/assets/javascripts/ajaxupload.3.5.js" type="text/javascript"></script>
      <script type="text/javascript" > 
         jQuery(document).ready(function() {
         	var btnUpload=jQuery('#upload_pic');
         	var status=jQuery('#statuss');
         	new AjaxUpload(btnUpload, {
         		action: 'profile/upload-img.php',
         		name: 'uploadfile',
         		onSubmit: function(file, ext){
         			 if (! (ext && /^(jpg|jpeg|gif|png)$/.test(ext))){ 
                            // extension is not allowed 
         				status.text('Only JPG or GIF files are allowed');
         				return false;
         			}
         			status.text('Uploading...');
         		},
         		onComplete: function(file, response){
         			//On completion clear the status
         			status.text('');
         
         			//Add uploaded file to list
         			if(response==="success"){
         				jQuery('#pic_url').val(file);
         				//jQuery('#files').empty();
         				//jQuery('#files').text(file+' added').addClass('successe');
         				//var ts = Math.round((new Date()).getTime() / 1000);
         				jQuery('#files').html('<img src="profile/uploads/'+file+'" height="100" width="100">');
         			} else{
         				//jQuery('#files').text(file+' upload failed').addClass('errore');
         			}
         		}
         	});
         	
         });
      </script> 
	  
	  
            
	
   </body>
</html>