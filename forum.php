<?php
Error_reporting(0);
session_start();
include_once 'php/db_connect.php';
include_once 'php/psl-config.php';


//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/* ---------------- PHP Custom Scripts ---------

  YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
  E.G. $page_title = "Custom Title" */

$page_title = "Forum Post";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["views"]["sub"]["forum"]["sub"]["post"]["active"] = true;
include("inc/nav.php");
?>
<!-- MAIN CONTENT -->
<div id="content">

    <!-- Bread crumb is created dynamically -->
    <!-- row -->
    <div class="row">

        <!-- col -->

        <!-- end col -->

        <!-- right side of the page with the sparkline graphs -->
        <!-- col -->

        <!-- end col -->

    </div><div class="row">

        <div class="col-sm-12">

            <div class="well">

                <?php
//					$user_details = "select name,user_img,user_intro from user_info where user_id=$user_id";
//					
//					 $user_details_query = mysqli_query($con,$user_details);
//					 
//					  if(mysqli_num_rows($user_details_query) > 0)
//                     				{
//										 while($user_details_row = mysqli_fetch_array($user_details_query)){
//											 
//											 $user_pro_pic_img = $user_details_row["user_img"];
//											 $user_pro_name = $user_details_row["name"];
//											 $user_pro_intro = $user_details_row["user_intro"];
//											 
//										 }
//										
//					 
//									}
                ?>
                <!--      <div class="anq" id="app-growl"></div>
                      <nav class="ck pc os app-navbar" style="box-shadow: 5px 4px 8px rgb(136, 136, 136);">
                         <div class="by">
                            <div class="or">
                               <button type="button" class="ou collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
                               <span class="cv">Toggle navigation</span>
                               <span class="ov"></span>
                               <span class="ov"></span>
                               <span class="ov"></span>
                               </button>
                               <a class="e" href="home.php">
                               <img src="img/brand-white.png" alt="brand">
                               </a>
                            </div>
                            <div class="f collapse" id="navbar-collapse-main">
                               <ul class="nav navbar-nav ss">
                                  <li class="active">
                                     <a href="home.php">ডায়েরীর পাতা </a>
                                  </li>
                                  <li>
                                     <a href="profile.php">আমার ডায়েরী </a>
                                  </li>
                                                  <li>
                                     <a href="profilesetup.php">আমি শুধু আমি</a>
                                  </li>
                               </ul>
                               <ul class="nav navbar-nav og ale ss">
                                  <li style="display:none;">
                                     <a class="g" href="#">
                                     <span class="h ws"></span>
                                     </a>
                                  </li>
                                  <li>
                                     <button class="cg fm ox anl" data-toggle="popover" data-original-title="" title="">
                                     <img class="cu" src="<?php //echo $user_pro_pic_img ?>">
                                     </button>
                                  </li>
                               </ul>
                               <form class="ow og i" role="search">
                                  <div class="et">
                                     <input type="text" class="form-control" data-action="grow" placeholder="Search">
                                  </div>
                               </form>
                               <ul class="nav navbar-nav st su sv">
                                  <li><a href="home.php">ডায়েরীর পাতা </a></li>
                                  <li><a href="profile.php">আমার ডায়েরী</a></li>
                                  <li><a href="profilesetup.php">আমি শুধু আমি</a></li>
                                  <li><a href="#">নোটিফিকেশন</a></li>
<?php //if($user_id>0){  ?>
                                                        <li><a href="logout.php">লগ আউট</a></li>
                <?php //}else{  ?>
                                                        <li><a href="login.php">Login</a></li>
                <?php //}  ?>
                                                  
                               </ul>
                               <ul class="nav navbar-nav hidden">
<?php //if($user_id>0){  ?>
                                                        <li><a href="logout.php">Logout</a></li>
                <?php //}else{  ?>
                                                        <li><a href="login.php">Login</a></li>
                <?php //}  ?>
                                                  
                               </ul>
                            </div>
                         </div>
                      </nav>-->
                <!--      <div class="by amt">
                         <div class="gc">
                            <div class="gn" >
                               <div class="qv rc aog alu"style="box-shadow: 5px 4px 8px rgb(136, 136, 136);">
                                  <div class="qx" style="background-image: url(img/iceland.jpg);"></div>
                                  <div class="qw dj">
                                                  
                                     <a href="home.php">
                                     <img class="aoh" src="<?php //echo $user_pro_pic_img ?>">
                                     </a>
                                     <h5 class="qy">
                                        <a class="aku" href="home.php"><?php //echo $user_pro_name ?></a>
                                     </h5>
                                     <p class="alu"><?php //echo $user_pro_intro ?></p>
                                     <ul class="aoi" style="display:none;">
                                        <li class="aoj">
                                           <a href="home.phpuserModal" class="aku" data-toggle="modal">
                                              Story
                                              <h5 class="ali">12M</h5>
                                           </a>
                                        </li>
                                        <li class="aoj">
                                           <a href="home.phpuserModal" class="aku" data-toggle="modal">
                                              Views
                                              <h5 class="ali">1</h5>
                                           </a>
                                        </li>
                                     </ul>
                                  </div>
                               </div>
                            </div>-->
                <div class="gz">
                    <ul class="ca qo anx">
                        <li style="margin-bottom:25px;" class="qf b aml">
                            <form role="form" action="dopost.php" method="post" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <textarea class="form-control" name="postfill" value="" rows="3" placeholder="ডায়েরীর পাতায় কিছু লিখুন..." id="post"></textarea>
                                </div>
                                <div style="text-align:right;">

                                    <select id="mask" name="mask" style="-webkit-appearance: none;float:left;">

                                        <option value="0" style="background:url('img/mask/happy.ico') no-repeat right center;background-size:20px;"><b>Happy</b></option>
                                        <option value="1" style="background:url('img/mask/normal.png') no-repeat right center;background-size:20px;"><b>Good</b></option>
                                        <option value="2" style="background:url('img/mask/sad.png') no-repeat right center;background-size:20px;"><b>Sad</b></option>

                                    </select>


                                    <label><input type="checkbox" name="anonymous"value="" checked> পরিচয় গোপন</label>
                                    <!-- <button tyle=" padding:0px; margin:0px;" type="button" class="btn btn-default">
                                       <span style="font-size:25px; padding:0px;" class="glyphicon glyphicon-camera"><input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" /></span> </button> -->
                                    <span style="font-size:35px; padding:0px; color:#137BBD; border:none;" class="glyphicon glyphicon-camera btn btn-default btn-file">
                                        <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
                                    </span>
                                    <input  style="background-color: #2882b5;box-shadow: 5px 4px 8px rgb(136, 136, 136); font-weight: bold; color:white; width: 57px; height: 34px;" type="submit" value="Share">
                                </div>
                            </form>
                        </li>
<?php
if (mysqli_num_rows($res) > 0) {
    $i = 0;
    while ($row = mysqli_fetch_array($res)) {

        $check_anonymus = $row["post_anonymous"];
        //	$post_id_for_mask = $row["post_id"];

        if ($check_anonymus == true) {

            $post_mask = $row["mask_id"];

            $mask_load = "SELECT * from mask_image where mask_id=$post_mask";
            $mask_result = mysqli_query($con, $mask_load);
            if (mysqli_num_rows($mask_result) >= 0) {
                while ($mask_all = mysqli_fetch_array($mask_result)) {

                    $mask = $mask_all["mask_url"];
                }
            }



            $user_img = $mask;
            $user_name = "গোপন ডায়েরী";
        } else {

            $user_img = $row["user_img"];
            $user_name = $row["name"];
        }

        $i++;
        ?>
                                <?php $post_id = $row["post_id"]; ?>    
                                <li style="box-shadow: 6px 6px 13px #888888; margin-bottom:20px; " class="qf b aml">
                                    <a class="qj" href="home.php">
                                        <img class="qh cu" src="<?php echo $user_img ?>">
                                    </a>
                                    <div  class="qg">
                                        <div class="qn">
                                            <small class="eg dp"><?php echo $row["post_date"] ?></small>
                                            <h4><b><?php echo $user_name ?></b></h4>
                                        </div>
                                        <p>
        <?php echo $row["post"]; ?>
                                        </p>
        <?php
        $images = "select * from post,images where post.post_id=images.post_id and images.post_id =$post_id ";

        $images_post = mysqli_query($con, $images);
        if (mysqli_num_rows($images_post) > 0) {

            while ($row = mysqli_fetch_array($images_post)) {

                $images_post_src = $row["image_url"];
                ?>   
                                                <div class="img-responsive">

                                                    <img data-action="zoom" data-width="90%" data-height="90%" src="<?php echo $images_post_src ?>" class="img-responsive" alt="image" width="99%" height="236"> 

                                                    <!--  <div style="display: inline-block; margin-bottom: 10px; margin-right: 10px; vertical-align: bottom;">
                                                         <img class="img-responsive" data-action="zoom" data-width="1050" data-height="700" src="<?php // echo $images_post_src ?>" style="width: 273px; height: 183px;">
                                                      </div>  -->
                                                </div>
                                            <?php }
                                        } ?>
                                        <hr>
                                        <ul style="padding-left:0px;">
                                            <li >
                                                <form role="form" action="docomment.php" method="post" enctype="multipart/form-data">
                                                    <div style=" display:none;"> <label><input type="text" name="post_id" value="<?php echo $post_id; ?>" checked> </label></div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="commentfill" rows="1" placeholder="Write a comment" value="" id="comment"></textarea>
                                                    </div>
                                                    <div style="text-align:left;">
                                                        <label><input type="checkbox" name="comment_anonymous"value="" checked > পরিচয় গোপন </label>
                                                        <span style="font-size:35px; padding:0px; color:rgb(40, 181, 176); border:none;" class="glyphicon glyphicon-camera btn btn-default btn-file">
                                                            <input type="file" name="fileToUploadComment" id="fileToUploadComment">
                                                        </span>
                                                        <input  style="background-color: rgb(40, 181, 176);box-shadow: 5px 4px 8px rgb(136, 136, 136); font-weight: bold; color:white; width: 82px; height: 34px;" type="submit" value="মতামত">
                                                    </div>
                                                </form>
                                            </li>
                                        </ul>
                                        <hr>
        <?php
        //$post_id = $row["post_id"];

        $comment = "select * from post,user_info,comment where comment.post_id=post.post_id and comment.user_id=user_info.user_id and post.post_id=$post_id";

        $rcomment = mysqli_query($con, $comment);
        if (mysqli_num_rows($rcomment) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_array($rcomment)) {

                $comment_anonymous = $row["comment_anonymous"];
                $comment_image_url = $row["comment_image_url"];

                if ($comment_anonymous == true) {

                    $user_img_comment = "img/user_img/Anonymous_logo.png";
                    $user_name_comment = "Anonymous";
                } else {

                    $user_img_comment = $row["user_img"];
                    $user_name_comment = $row["name"];
                }


                $i++;
                ?>
                                                <ul class="qo alm">
                                                    <li class="qf">
                                                        <a class="qj" href="#">
                                                            <img class="qh cu" src="<?php echo $user_img_comment; ?>">
                                                        </a>
                                                        <div class="qg">
                                                            <strong><?php echo $user_name_comment; ?>: </strong>
                                                <?php echo $row["comment"]; ?> <span><small><i><sub><?php echo " " . $row["comment_time"]; ?></sub></i></small></span>
                                                <?php
                                                if ($comment_image_url) {
                                                    ?>
                                                                <div  class="img-responsive" style="display: inline-block; margin-bottom: 10px; margin-right: 10px; vertical-align: bottom;">

                                                                    <img data-action="zoom" data-width="70%" data-height="80%"  src="<?php echo $comment_image_url ?>" class="img-responsive" alt="image" width="50%" height="236"> 
                                                                </div>
                                                <?php } ?>		 
                                                        </div>
                                                    </li>
                                                </ul>
            <?php }
        } ?>
                                    </div>
                                </li>
    <?php }
} ?>
                    </ul>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/chart.js"></script>
        <script src="js/toolkit.js"></script>
        <script src="js/application.js"></script>
        <script>
            // execute/clear BS loaders for docs
            $(function () {
                if (window.BS && window.BS.loader && window.BS.loader.length) {
                    while (BS.loader.length) {
                        (BS.loader.pop())()
                    }
                }
            })
        </script>
        </body>
        </html>