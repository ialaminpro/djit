<<<<<<< HEAD

<?php
error_reporting(0);
session_start();

//if(empty($_SESSION)){
//    header("Location: login.php");
//        exit();
//}
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
$page_css[] = "style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
//$page_nav["views"]["sub"]["forum"]["sub"]["post"]["active"] = true;
//include("inc/nav.php");
?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div  role="main">
    <?php
    //configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
    //$breadcrumbs["New Crumb"] => "http://url.com"
//    $breadcrumbs["Other Pages"] = "";
//    $breadcrumbs["Forum Layout"] = APP_URL . "/forum.php";
//    $breadcrumbs["Forum Topic"] = APP_URL . "/forum-topic.php";
    include("inc/ribbon.php");

    function resizeImage($filename, $max_width, $max_height) {

        list($orig_width, $orig_height) = getimagesize($filename);

        $width = $orig_width;
        $height = $orig_height;

        # taller
        if ($height > $max_height) {
            $width = ($max_height / $height) * $width;
            $height = $max_height;
        }

        # wider
        if ($width > $max_width) {
            $height = ($max_width / $width) * $height;
            $width = $max_width;
        }

        $image_p = imagecreatetruecolor($width, $height);

        $image = imagecreatefromjpeg($filename);

        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

        return $image_p;
    }
    ?>
    <style>
        label, input { display:block; }
        input.text { margin-bottom:12px; width:95%; padding: .4em; }
        fieldset { padding:0; border:0; margin-top:25px; }
        h1 { font-size: 1.2em; margin: .6em 0; }
        div#users-contain { width: 350px; margin: 20px 0; }
        div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
        div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
        .ui-dialog .ui-state-error { padding: .3em; }
        .validateTips { border: 1px solid transparent; padding: 0.3em; }
    </style>

    <!-- MAIN CONTENT -->
    <div id="content">

        <!-- Bread crumb is created dynamically -->
        <!-- row -->

        <!-- end row -->

        <!-- row -->
        <div class="row">

            <div class="col-sm-12">

                <div class="well">                  



                    <form action="post.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body status">
                            <div class="who clearfix">
                                <img src="<?php echo ASSETS_URL ?>/img/avatars/sunny.png<?php //echo ASSETS_URL . $row['photo'];                                                                                        ?>" alt="img" class="online">                         
                                <input type="text" value="" name="title" placeholder=" Write Your Post Title" class="title custom-scroll"/>
                            </div>

                            <div class="textarea-div">

                                <div class="typearea">
                                    <textarea placeholder="Write a reply..."  name="details" id="textarea-expand" class="custom-scroll editable"></textarea>
                                </div>

                            </div>

                            </style>
                            <!-- CHAT REPLY/SEND -->
                            <span class="textarea-controls">
                                <input class="btn btn-sm btn-primary pull-right post" type="submit" value="post" name="post">

                                <label class="btn-upload">
                                    <input type="file" class="file" name="fileToUpload" id="fileToUpload">
                                    <button class="btn fa fa-camera fa-fw fa-lg">Photo</button>
                                </label>

                                <input type="hidden" value="<?= $_SESSION['user_id'] ?>" name="userid" class="user_id"/>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-12">

                <div class="well"> 
                    <!-- Post -->

                    <?php
                    $sql = "SELECT * FROM forum,user where user.id=forum.userid ORDER  BY update_date DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            // print_r($row);
                            ?>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">

                                    <div class="panel panel-default">
                                        <div class="panel-body status">


                                            <div class="chat-body no-padding profile-message">
                                                <ul>
                                                    <li class="message">
                                                        <img src=" <?php echo ASSETS_URL . '/' . $row["photo"]; ?>" class="online">
                                                        <span class="message-text"> <a href="javascript:void(0);" class="username"><?= $row['username'] ?>&nbsp;<small class="text-muted pull-right ultra-light"> <?= $row['update_date'] ?> </small></a> 

                                                            <h5> <?= $row['title'] ?></h5>
                                                            <h6 style="font-size: 13px; font-weight: normal"> <?= $row['details'] ?> </h6>
                                                            <h6>

                                                                <?php
                                                                if ($row['img']) {
                                                                    //echo $row['img'];

                                                                    list($orig_width, $orig_height) = getimagesize($row['img']);

                                                                    $width = $orig_width;
                                                                    $height = $orig_height;

                                                                    $max_height = 180;
                                                                    $max_width = 250;
                                                                    # taller
                                                                    if ($height > $max_height) {
                                                                        $width = ($max_height / $height) * $width;
                                                                        $height = $max_height;
                                                                    }

                                                                    # wider
                                                                    if ($width > $max_width) {
                                                                        $height = ($max_width / $width) * $height;
                                                                        $width = $max_width;
                                                                    }
                                                                    ?>
                                                                    <a href="<?php echo APP_URL; ?>/profile.php"> <img src="<?php echo ASSETS_URL . '/' . $row['img']; ?>" width="<?= $width ?> px" height="<?= $height ?>" alt="avatar" class="online"> </a>
                                                                <?php } ?>

                                                            </h6>
                                                        </span>
                                                    </li>
                                                    <?php
                                                    if ($row['img']) {
                                                        list($orig_width, $orig_height) = getimagesize($row['img']);

                                                        $width = $orig_width;
                                                        $height = $orig_height;

                                                        $max_height = 180;
                                                        $max_width = 250;
                                                        # taller
                                                        if ($height > $max_height) {
                                                            $width = ($max_height / $height) * $width;
                                                            $height = $max_height;
                                                        }

                                                        # wider
                                                        if ($width > $max_width) {
                                                            $height = ($max_width / $width) * $height;
                                                            $width = $max_width;
                                                        }
                                                        ?>
                                                        <li style="margin-top:  <?php echo $height; ?>px;" class="message message-reply">
                                                        <?php } else { ?>
                                                        <li class="message message-reply">
                                                            <?php
                                                        }

                                                        $sql2 = "SELECT * FROM comments,user where user.id=comments.user_id and post_id='{$row['post_id']}' ORDER  BY comment_created_date DESC ";
                                                        $result2 = $mysqli->query($sql2);
                                                        ?>



                                                        <ul class="list-inline font-xs">
                                                            <!--                                                            <li>
                                                                                                                            <a href="javascript:void(0);" class="text-info"><i class="fa fa-reply"></i> Reply</a>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
                                                                                                                        </li>-->

                                                            <li>
                                                                <a href="javascript:void(0);" class="text-muted">Show All Comments (<?= $result2->num_rows ?>)</a>
                                                            </li>
                                                            <?php
                                                            if (!empty($_SESSION)) {
                                                                if ($row['userid'] == $_SESSION['user_id']) {
                                                                    ?>
                                                                    <li>
                                                                        <a href="javascript:void(0);" class="text-primary opener" data-id="<?= $row['post_id'] ?>">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);" class="text-danger post-delete" data-id="<?= $row['post_id'] ?>">Delete</a>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="text-primary dontdothis" data-id="<?= $row['post_id'] ?>">Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="text-danger dontdothis" data-id="<?= $row['post_id'] ?>">Delete</a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </li>



                                                    <?php
                                                    if ($result2->num_rows > 0) {
                                                        // output data of each row
                                                        while ($comment = $result2->fetch_assoc()) {

                                                            // print_r($comment)
                                                            //echo 
                                                            ?>

                                                            <li class="message" style="margin-left:100px;margin-top:10px;">

                                                                <ul class="list-inline font-xs">
                                                                    <li>
                                                                        <img src="<?php echo ASSETS_URL . '/' . $comment["photo"]; ?>" class="online">
                                                                    </li>
                                                                    <li>  
                                                                        <span class="message-text"> <a href="javascript:void(0);" class="username"><?= $comment["username"] ?>
                                                                                <small class="text-muted pull-right ultra-light">&nbsp; <?= $comment["comment_created_date"] ?> </small></a>
                                                                            <?= $comment["comment_details"] ?>

                                                                        </span>


                                                                    </li>


                                                                </ul>
                                                                <ul class="list-inline font-xs">

                                                                    <li>
                                                                        <?php
                                                                        if ($comment["comments_img"]) {
                                                                            list($orig_width, $orig_height) = getimagesize($comment["comments_img"]);

                                                                            $newwidth1 = $orig_width;
                                                                            $newheight1 = $orig_height;

                                                                            $max_height = 180;
                                                                            $max_width = 250;
                                                                            # taller
                                                                            if ($newheight1 > $max_height) {
                                                                                $newwidth1 = ($max_height / $newheight1) * $newwidth1;
                                                                                $newheight1 = $max_height;
                                                                            }

                                                                            # wider
                                                                            if ($newwidth1 > $max_width) {
                                                                                $newheight1 = ($max_width / $newwidth1) * $newheight1;
                                                                                $newwidth1 = $max_width;
                                                                            }
                                                                            ?>
                                                                            <span class="message-text"> <img src="<?php echo ASSETS_URL . '/' . $comment["comments_img"]; ?>" width="<?php echo $newwidth1 ?> px" height="<?php echo $newheight1 ?> px"  alt="avatar" > <i class="fa fa-smile-o txt-color-orange"></i> </span>;
                                                                        <?php } ?>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                if ($comment["comments_img"]) {
                                                                    list($orig_width, $orig_height) = getimagesize($comment["comments_img"]);

                                                                    $newwidth1 = $orig_width;
                                                                    $newheight1 = $orig_height;

                                                                    $max_height = 180;
                                                                    $max_width = 250;
                                                                    # taller
                                                                    if ($newheight1 > $max_height) {
                                                                        $newwidth1 = ($max_height / $newheight1) * $newwidth1;
                                                                        $newheight1 = $max_height;
                                                                    }

                                                                    # wider
                                                                    if ($newwidth1 > $max_width) {
                                                                        $newheight1 = ($max_width / $newwidth1) * $newheight1;
                                                                        $newwidth1 = $max_width;
                                                                    }
                                                                    ?>
                                                                    <ul  style="margin-left:60px; margin-top:  <?php echo $newheight1; ?>px;" class="list-inline font-xs">
                                                                    <?php } else { ?>

                                                                        <ul style="margin-left:60px; margin-top:10px;" class="list-inline font-xs">
                                                                        <?php } ?>


                                                                        <?php
                                                                        if (!empty($_SESSION)) {
                                                                            if ($comment['user_id'] == $_SESSION['user_id']) {
                                                                                ?>
                                                                                <li>
                                                                                    <a href="javascript:void(0);" data-id="<?= $comment['comment_id'] ?>" class="text-primary comment-edit">Edit</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:void(0);" class="text-danger comment-delete" data-id="<?= $comment['comment_id'] ?>">Delete</a>
                                                                                </li>
                                                                                <?php
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="text-primary dontdothis" data-id="<?= $row['post_id'] ?>">Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="text-danger dontdothis" data-id="<?= $row['post_id'] ?>">Delete</a>
                                                                            </li>


                                                                        <?php } ?>

                                                                    </ul>

                                                            </li>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>


                                                    <?php } ?>
                                                    <li class="message message-reply">

                                                        <form action="post.php" method="post" enctype="multipart/form-data">
                                                            <ul class="font-xs col-md-11">
                                                                <li class="font-xs col-md-9">
                                                                    <input class="form-control col-md-10 input-xs" name="comment" value="" onUnfocus="send()" placeholder="Type and enter" type="text">
                                                                </li>
                                                                <li class="font-xs col-md-2" style="margin-left:-45px;margin-top: 10px;" >
                                                                    <label class="btn-upload">
                                                                        <input type="file" class="file" name="fileToUpload" id="fileToUpload">
                                                                        <button class="btn fa fa-camera fa-fw fa-lg">Photo</button>
                                                                    </label>
                                                                    <input type="hidden" value="<?= $_SESSION['user_id'] ?>" name="userid" class="user_id"/>
                                                                    <input type="hidden" value="<?= $row['post_id'] ?>" name="post_id" class="post_id"/>
                                                                </li>

                                                            </ul>
                                                        </form>

                                                    </li>
                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>



                            <!-- end Post -->

                            <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>







                    <!--                    <div class="text-center">
                                            <ul class="pagination pagination-sm">
                                                <li class="disabled">
                                                    <a href="javascript:void(0);">Prev</a>
                                                </li>
                                                <li class="active">
                                                    <a href="javascript:void(0);">1</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">2</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">3</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">...</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">99</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Next</a>
                                                </li>
                                            </ul>
                                        </div>-->

                </div>
            </div>

        </div>
        <div class="row">
            <div id="dialog-form" title="Post Edit">
                <p class="validateTips">Post Edit.</p>

                <?php ?>
                <form action="post.php" method="post">
                    <fieldset>
                        <label for="name">Title</label>
                        <input type="text" name="etitle" id="etitle" value="" class="text ui-widget-content ui-corner-all etitle">
                        <input type="hidden" name="epost_id" id="epost_id" value="" class="text ui-widget-content ui-corner-all epost_id">
                        <label for="edetails">Description</label>
                        <input type="text" name="edetails" id="edetails" value="" class="text ui-widget-content ui-corner-all edetails">

                        <input type="submit">
                    </fieldset>
                </form>
            </div>           
            <div id="dialog-form-comment" title="Comment Edit">


                <form action="post.php" method="post">
                    <fieldset>
                        <input type="hidden" name="comment_id" id="comment_id" value="" class="text ui-widget-content ui-corner-all comment_id">
                        <label for="comment_details">Description</label>
                        <input type="text" name="comment_details" id="comment_details" value="" class="text ui-widget-content ui-corner-all comment_details">

                        <input type="submit">
                    </fieldset>
                </form>
            </div>           
        </div>
        <!-- end row -->

    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<?php
// include page footer
include("inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php
//include required scripts
include("inc/scripts.php");
?>

<!-- PAGE RELATED PLUGIN(S)-->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/summernote/summernote.min.js"></script>
<SCRIPT LANGUAGE="javascript">
    function send()
    {
        document.theform.submit()
    }
</SCRIPT>
<script type="text/javascript">
    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function () {

        $(".opener").click(function () {

            var data = {
                'post_id_edit': $(this).attr("data-id")
            };

            $.ajax({
                type: "POST",

                url: "<?php echo APP_URL; ?>/post.php",
                data: data,
                success: function (msg) {
                    //alert(msg);
                    if (msg != 'false')
                    {
                        var post_info = msg.split('#');

                        $('.epost_id').val(post_info[0]);
                        $('.etitle').val(post_info[1]);
                        $('.edetails').val(post_info[2]);
                        $('.img').val(post_info[3]);

                        $('.ajax-load-img').addClass("hide");
                        $('body').css("opacity", "1");
                    }
                }

            });

            $("#dialog-form").dialog("open");
        });
        $(".dontdothis").click(function () {
            alert("Sorry!!! You don't have Access");
        });

        $(".comment-edit").click(function () {

            var data = {
                'comment_id_edit': $(this).attr("data-id")
            };

            $.ajax({
                type: "POST",

                url: "<?php echo APP_URL; ?>/post.php",
                data: data,
                success: function (msg) {
                    //alert(msg);
                    if (msg != 'false')
                    {
                        var post_info = msg.split('#');

                        $('.comment_id').val(post_info[0]);
                        $('.comment_details').val(post_info[1]);
                        $('.post_id').val(post_info[2]);
                        $('.comments_img').val(post_info[3]);
                        $('.user_id').val(post_info[4]);

                        $('.ajax-load-img').addClass("hide");
                        $('body').css("opacity", "1");
                    }
                }

            });

            $("#dialog-form-comment").dialog("open");
        });


        $(function () {
            var dialog, form,
                    emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                    name = $("#name"),
                    email = $("#email"),
                    password = $("#password"),
                    allFields = $([]).add(name).add(email).add(password),
                    tips = $(".validateTips");

            function updateTips(t) {
                tips
                        .text(t)
                        .addClass("ui-state-highlight");
                setTimeout(function () {
                    tips.removeClass("ui-state-highlight", 1500);
                }, 500);
            }

            function checkLength(o, n, min, max) {
                if (o.val().length > max || o.val().length < min) {
                    o.addClass("ui-state-error");
                    updateTips("Length of " + n + " must be between " +
                            min + " and " + max + ".");
                    return false;
                } else {
                    return true;
                }
            }

            function checkRegexp(o, regexp, n) {
                if (!(regexp.test(o.val()))) {
                    o.addClass("ui-state-error");
                    updateTips(n);
                    return false;
                } else {
                    return true;
                }
            }

            function addUser() {
                var valid = true;
                allFields.removeClass("ui-state-error");

                valid = valid && checkLength(name, "username", 3, 16);
                valid = valid && checkLength(email, "email", 6, 80);
                valid = valid && checkLength(password, "password", 5, 16);

                valid = valid && checkRegexp(name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter.");
                valid = valid && checkRegexp(email, emailRegex, "eg. ui@jquery.com");
                valid = valid && checkRegexp(password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9");

                if (valid) {
                    $("#users tbody").append("<tr>" +
                            "<td>" + name.val() + "</td>" +
                            "<td>" + email.val() + "</td>" +
                            "<td>" + password.val() + "</td>" +
                            "</tr>");
                    dialog.dialog("close");
                }
                return valid;
            }

            dialog = $("#dialog-form").dialog({
                autoOpen: false,
                height: 400,
                width: 350,
                modal: true,
                buttons: {
//                    "Update": addUser,
                    Cancel: function () {
                        dialog.dialog("close");
                    }
                },
                close: function () {
                    form[ 0 ].reset();
                    allFields.removeClass("ui-state-error");
                }
            });
            dialog = $("#dialog-form-comment").dialog({
                autoOpen: false,
                height: 400,
                width: 350,
                modal: true,
                buttons: {
//                    "Update": addUser,
                    Cancel: function () {
                        dialog.dialog("close");
                    }
                },
                close: function () {
                    form[ 0 ].reset();
                    allFields.removeClass("ui-state-error");
                }
            });

            form = dialog.find("form").on("submit", function (event) {
//            alert(1);
                //event.preventDefault();
//                addUser();
            });

//            $("#create-user").button().on("click", function () {
//                dialog.dialog("open");
//            });
        });



        $(".post-delete").click(function () {


            var data = {
                'post_id_delete': $(this).attr("data-id")
            };

            $.ajax({
                type: "POST",

                url: "<?php echo APP_URL; ?>/post.php",
                data: data,
                success: function (res) {
                    $("body").css("opacity", "1.0");
                    $(".ajaxLoader").hide();

                    if (res == 1) {
                        alert('Successfully Deleted!');
                        window.location.reload();
                    } else {
                        alert('SORRY, SOME ERROR OCCURED !');
                    }
                }
            });
        });

        $(".comment-delete").click(function () {


            var data = {
                'comment_id_delete': $(this).attr("data-id")
            };

            $.ajax({
                type: "POST",

                url: "<?php echo APP_URL; ?>/post.php",
                data: data,
                success: function (res) {
                    $("body").css("opacity", "1.0");
                    $(".ajaxLoader").hide();

                    if (res == 1) {
                        alert('Successfully Deleted!');
                        window.location.reload();
                    } else {
                        alert('SORRY, SOME ERROR OCCURED !');
                    }
                }
            });

        });


        $('#forumPost').summernote({
            height: 180,
            focus: false,
            tabsize: 2
        });

    })

</script>

<?php
//include footer
include("inc/google-analytics.php");
?>

<script src='js/upload.js'></script>

<!--<script>
    $(document).ready(function () {

-->

<!--

        
    });
=======

<?php
error_reporting(0);
session_start();

//if(empty($_SESSION)){
//    header("Location: login.php");
//        exit();
//}
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
$page_css[] = "style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
//$page_nav["views"]["sub"]["forum"]["sub"]["post"]["active"] = true;
//include("inc/nav.php");
?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div  role="main">
    <?php
    //configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
    //$breadcrumbs["New Crumb"] => "http://url.com"
//    $breadcrumbs["Other Pages"] = "";
//    $breadcrumbs["Forum Layout"] = APP_URL . "/forum.php";
//    $breadcrumbs["Forum Topic"] = APP_URL . "/forum-topic.php";
    include("inc/ribbon.php");

    function resizeImage($filename, $max_width, $max_height) {

        list($orig_width, $orig_height) = getimagesize($filename);

        $width = $orig_width;
        $height = $orig_height;

        # taller
        if ($height > $max_height) {
            $width = ($max_height / $height) * $width;
            $height = $max_height;
        }

        # wider
        if ($width > $max_width) {
            $height = ($max_width / $width) * $height;
            $width = $max_width;
        }

        $image_p = imagecreatetruecolor($width, $height);

        $image = imagecreatefromjpeg($filename);

        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

        return $image_p;
    }
    ?>
    <style>
        label, input { display:block; }
        input.text { margin-bottom:12px; width:95%; padding: .4em; }
        fieldset { padding:0; border:0; margin-top:25px; }
        h1 { font-size: 1.2em; margin: .6em 0; }
        div#users-contain { width: 350px; margin: 20px 0; }
        div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
        div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
        .ui-dialog .ui-state-error { padding: .3em; }
        .validateTips { border: 1px solid transparent; padding: 0.3em; }
    </style>

    <!-- MAIN CONTENT -->
    <div id="content">

        <!-- Bread crumb is created dynamically -->
        <!-- row -->

        <!-- end row -->

        <!-- row -->
        <div class="row">

            <div class="col-sm-12">

                <div class="well">                  



                    <form action="post.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body status">
                            <div class="who clearfix">
                                <img src="<?php echo ASSETS_URL ?>/img/avatars/sunny.png<?php //echo ASSETS_URL . $row['photo'];                                                                                        ?>" alt="img" class="online">                         
                                <input type="text" value="" name="title" placeholder=" Write Your Post Title" class="title custom-scroll"/>
                            </div>

                            <div class="textarea-div">

                                <div class="typearea">
                                    <textarea placeholder="Write a reply..."  name="details" id="textarea-expand" class="custom-scroll editable"></textarea>
                                </div>

                            </div>

                            </style>
                            <!-- CHAT REPLY/SEND -->
                            <span class="textarea-controls">
                                <input class="btn btn-sm btn-primary pull-right post" type="submit" value="post" name="post">

                                <label class="btn-upload">
                                    <input type="file" class="file" name="fileToUpload" id="fileToUpload">
                                    <button class="btn fa fa-camera fa-fw fa-lg">Photo</button>
                                </label>

                                <input type="hidden" value="<?= $_SESSION['user_id'] ?>" name="userid" class="user_id"/>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-12">

                <div class="well"> 
                    <!-- Post -->

                    <?php
                    $sql = "SELECT * FROM forum,user where user.id=forum.userid ORDER  BY update_date DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            // print_r($row);
                            ?>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">

                                    <div class="panel panel-default">
                                        <div class="panel-body status">


                                            <div class="chat-body no-padding profile-message">
                                                <ul>
                                                    <li class="message">
                                                        <img src=" <?php echo ASSETS_URL . '/' . $row["photo"]; ?>" class="online">
                                                        <span class="message-text"> <a href="javascript:void(0);" class="username"><?= $row['username'] ?>&nbsp;<small class="text-muted pull-right ultra-light"> <?= $row['update_date'] ?> </small></a> 

                                                            <h5> <?= $row['title'] ?></h5>
                                                            <h6 style="font-size: 13px; font-weight: normal"> <?= $row['details'] ?> </h6>
                                                            <h6>

                                                                <?php
                                                                if ($row['img']) {
                                                                    //echo $row['img'];

                                                                    list($orig_width, $orig_height) = getimagesize($row['img']);

                                                                    $width = $orig_width;
                                                                    $height = $orig_height;

                                                                    $max_height = 180;
                                                                    $max_width = 250;
                                                                    # taller
                                                                    if ($height > $max_height) {
                                                                        $width = ($max_height / $height) * $width;
                                                                        $height = $max_height;
                                                                    }

                                                                    # wider
                                                                    if ($width > $max_width) {
                                                                        $height = ($max_width / $width) * $height;
                                                                        $width = $max_width;
                                                                    }
                                                                    ?>
                                                                    <a href="<?php echo APP_URL; ?>/profile.php"> <img src="<?php echo ASSETS_URL . '/' . $row['img']; ?>" width="<?= $width ?> px" height="<?= $height ?>" alt="avatar" class="online"> </a>
                                                                <?php } ?>

                                                            </h6>
                                                        </span>
                                                    </li>
                                                    <?php
                                                    if ($row['img']) {
                                                        list($orig_width, $orig_height) = getimagesize($row['img']);

                                                        $width = $orig_width;
                                                        $height = $orig_height;

                                                        $max_height = 180;
                                                        $max_width = 250;
                                                        # taller
                                                        if ($height > $max_height) {
                                                            $width = ($max_height / $height) * $width;
                                                            $height = $max_height;
                                                        }

                                                        # wider
                                                        if ($width > $max_width) {
                                                            $height = ($max_width / $width) * $height;
                                                            $width = $max_width;
                                                        }
                                                        ?>
                                                        <li style="margin-top:  <?php echo $height; ?>px;" class="message message-reply">
                                                        <?php } else { ?>
                                                        <li class="message message-reply">
                                                            <?php
                                                        }

                                                        $sql2 = "SELECT * FROM comments,user where user.id=comments.user_id and post_id='{$row['post_id']}' ORDER  BY comment_created_date DESC ";
                                                        $result2 = $mysqli->query($sql2);
                                                        ?>



                                                        <ul class="list-inline font-xs">
                                                            <!--                                                            <li>
                                                                                                                            <a href="javascript:void(0);" class="text-info"><i class="fa fa-reply"></i> Reply</a>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
                                                                                                                        </li>-->

                                                            <li>
                                                                <a href="javascript:void(0);" class="text-muted">Show All Comments (<?= $result2->num_rows ?>)</a>
                                                            </li>
                                                            <?php
                                                            if (!empty($_SESSION)) {
                                                                if ($row['userid'] == $_SESSION['user_id']) {
                                                                    ?>
                                                                    <li>
                                                                        <a href="javascript:void(0);" class="text-primary opener" data-id="<?= $row['post_id'] ?>">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);" class="text-danger post-delete" data-id="<?= $row['post_id'] ?>">Delete</a>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="text-primary dontdothis" data-id="<?= $row['post_id'] ?>">Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="text-danger dontdothis" data-id="<?= $row['post_id'] ?>">Delete</a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </li>



                                                    <?php
                                                    if ($result2->num_rows > 0) {
                                                        // output data of each row
                                                        while ($comment = $result2->fetch_assoc()) {

                                                            // print_r($comment)
                                                            //echo 
                                                            ?>

                                                            <li class="message" style="margin-left:100px;margin-top:10px;">

                                                                <ul class="list-inline font-xs">
                                                                    <li>
                                                                        <img src="<?php echo ASSETS_URL . '/' . $comment["photo"]; ?>" class="online">
                                                                    </li>
                                                                    <li>  
                                                                        <span class="message-text"> <a href="javascript:void(0);" class="username"><?= $comment["username"] ?>
                                                                                <small class="text-muted pull-right ultra-light">&nbsp; <?= $comment["comment_created_date"] ?> </small></a>
                                                                            <?= $comment["comment_details"] ?>

                                                                        </span>


                                                                    </li>


                                                                </ul>
                                                                <ul class="list-inline font-xs">

                                                                    <li>
                                                                        <?php
                                                                        if ($comment["comments_img"]) {
                                                                            list($orig_width, $orig_height) = getimagesize($comment["comments_img"]);

                                                                            $newwidth1 = $orig_width;
                                                                            $newheight1 = $orig_height;

                                                                            $max_height = 180;
                                                                            $max_width = 250;
                                                                            # taller
                                                                            if ($newheight1 > $max_height) {
                                                                                $newwidth1 = ($max_height / $newheight1) * $newwidth1;
                                                                                $newheight1 = $max_height;
                                                                            }

                                                                            # wider
                                                                            if ($newwidth1 > $max_width) {
                                                                                $newheight1 = ($max_width / $newwidth1) * $newheight1;
                                                                                $newwidth1 = $max_width;
                                                                            }
                                                                            ?>
                                                                            <span class="message-text"> <img src="<?php echo ASSETS_URL . '/' . $comment["comments_img"]; ?>" width="<?php echo $newwidth1 ?> px" height="<?php echo $newheight1 ?> px"  alt="avatar" > <i class="fa fa-smile-o txt-color-orange"></i> </span>;
                                                                        <?php } ?>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                if ($comment["comments_img"]) {
                                                                    list($orig_width, $orig_height) = getimagesize($comment["comments_img"]);

                                                                    $newwidth1 = $orig_width;
                                                                    $newheight1 = $orig_height;

                                                                    $max_height = 180;
                                                                    $max_width = 250;
                                                                    # taller
                                                                    if ($newheight1 > $max_height) {
                                                                        $newwidth1 = ($max_height / $newheight1) * $newwidth1;
                                                                        $newheight1 = $max_height;
                                                                    }

                                                                    # wider
                                                                    if ($newwidth1 > $max_width) {
                                                                        $newheight1 = ($max_width / $newwidth1) * $newheight1;
                                                                        $newwidth1 = $max_width;
                                                                    }
                                                                    ?>
                                                                    <ul  style="margin-left:60px; margin-top:  <?php echo $newheight1; ?>px;" class="list-inline font-xs">
                                                                    <?php } else { ?>

                                                                        <ul style="margin-left:60px; margin-top:10px;" class="list-inline font-xs">
                                                                        <?php } ?>


                                                                        <?php
                                                                        if (!empty($_SESSION)) {
                                                                            if ($comment['user_id'] == $_SESSION['user_id']) {
                                                                                ?>
                                                                                <li>
                                                                                    <a href="javascript:void(0);" data-id="<?= $comment['comment_id'] ?>" class="text-primary comment-edit">Edit</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:void(0);" class="text-danger comment-delete" data-id="<?= $comment['comment_id'] ?>">Delete</a>
                                                                                </li>
                                                                                <?php
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="text-primary dontdothis" data-id="<?= $row['post_id'] ?>">Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);" class="text-danger dontdothis" data-id="<?= $row['post_id'] ?>">Delete</a>
                                                                            </li>


                                                                        <?php } ?>

                                                                    </ul>

                                                            </li>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>


                                                    <?php } ?>
                                                    <li class="message message-reply">

                                                        <form action="post.php" method="post" enctype="multipart/form-data">
                                                            <ul class="font-xs col-md-11">
                                                                <li class="font-xs col-md-9">
                                                                    <input class="form-control col-md-10 input-xs" name="comment" value="" onUnfocus="send()" placeholder="Type and enter" type="text">
                                                                </li>
                                                                <li class="font-xs col-md-2" style="margin-left:-45px;margin-top: 10px;" >
                                                                    <label class="btn-upload">
                                                                        <input type="file" class="file" name="fileToUpload" id="fileToUpload">
                                                                        <button class="btn fa fa-camera fa-fw fa-lg">Photo</button>
                                                                    </label>
                                                                    <input type="hidden" value="<?= $_SESSION['user_id'] ?>" name="userid" class="user_id"/>
                                                                    <input type="hidden" value="<?= $row['post_id'] ?>" name="post_id" class="post_id"/>
                                                                </li>

                                                            </ul>
                                                        </form>

                                                    </li>
                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>



                            <!-- end Post -->

                            <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>







                    <!--                    <div class="text-center">
                                            <ul class="pagination pagination-sm">
                                                <li class="disabled">
                                                    <a href="javascript:void(0);">Prev</a>
                                                </li>
                                                <li class="active">
                                                    <a href="javascript:void(0);">1</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">2</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">3</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">...</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">99</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Next</a>
                                                </li>
                                            </ul>
                                        </div>-->

                </div>
            </div>

        </div>
        <div class="row">
            <div id="dialog-form" title="Post Edit">
                <p class="validateTips">Post Edit.</p>

                <?php ?>
                <form action="post.php" method="post">
                    <fieldset>
                        <label for="name">Title</label>
                        <input type="text" name="etitle" id="etitle" value="" class="text ui-widget-content ui-corner-all etitle">
                        <input type="hidden" name="epost_id" id="epost_id" value="" class="text ui-widget-content ui-corner-all epost_id">
                        <label for="edetails">Description</label>
                        <input type="text" name="edetails" id="edetails" value="" class="text ui-widget-content ui-corner-all edetails">

                        <input type="submit">
                    </fieldset>
                </form>
            </div>           
            <div id="dialog-form-comment" title="Comment Edit">


                <form action="post.php" method="post">
                    <fieldset>
                        <input type="hidden" name="comment_id" id="comment_id" value="" class="text ui-widget-content ui-corner-all comment_id">
                        <label for="comment_details">Description</label>
                        <input type="text" name="comment_details" id="comment_details" value="" class="text ui-widget-content ui-corner-all comment_details">

                        <input type="submit">
                    </fieldset>
                </form>
            </div>           
        </div>
        <!-- end row -->

    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<?php
// include page footer
include("inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php
//include required scripts
include("inc/scripts.php");
?>

<!-- PAGE RELATED PLUGIN(S)-->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/summernote/summernote.min.js"></script>
<SCRIPT LANGUAGE="javascript">
    function send()
    {
        document.theform.submit()
    }
</SCRIPT>
<script type="text/javascript">
    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function () {

        $(".opener").click(function () {

            var data = {
                'post_id_edit': $(this).attr("data-id")
            };

            $.ajax({
                type: "POST",

                url: "<?php echo APP_URL; ?>/post.php",
                data: data,
                success: function (msg) {
                    //alert(msg);
                    if (msg != 'false')
                    {
                        var post_info = msg.split('#');

                        $('.epost_id').val(post_info[0]);
                        $('.etitle').val(post_info[1]);
                        $('.edetails').val(post_info[2]);
                        $('.img').val(post_info[3]);

                        $('.ajax-load-img').addClass("hide");
                        $('body').css("opacity", "1");
                    }
                }

            });

            $("#dialog-form").dialog("open");
        });
        $(".dontdothis").click(function () {
            alert("Sorry!!! You don't have Access");
        });

        $(".comment-edit").click(function () {

            var data = {
                'comment_id_edit': $(this).attr("data-id")
            };

            $.ajax({
                type: "POST",

                url: "<?php echo APP_URL; ?>/post.php",
                data: data,
                success: function (msg) {
                    //alert(msg);
                    if (msg != 'false')
                    {
                        var post_info = msg.split('#');

                        $('.comment_id').val(post_info[0]);
                        $('.comment_details').val(post_info[1]);
                        $('.post_id').val(post_info[2]);
                        $('.comments_img').val(post_info[3]);
                        $('.user_id').val(post_info[4]);

                        $('.ajax-load-img').addClass("hide");
                        $('body').css("opacity", "1");
                    }
                }

            });

            $("#dialog-form-comment").dialog("open");
        });


        $(function () {
            var dialog, form,
                    emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                    name = $("#name"),
                    email = $("#email"),
                    password = $("#password"),
                    allFields = $([]).add(name).add(email).add(password),
                    tips = $(".validateTips");

            function updateTips(t) {
                tips
                        .text(t)
                        .addClass("ui-state-highlight");
                setTimeout(function () {
                    tips.removeClass("ui-state-highlight", 1500);
                }, 500);
            }

            function checkLength(o, n, min, max) {
                if (o.val().length > max || o.val().length < min) {
                    o.addClass("ui-state-error");
                    updateTips("Length of " + n + " must be between " +
                            min + " and " + max + ".");
                    return false;
                } else {
                    return true;
                }
            }

            function checkRegexp(o, regexp, n) {
                if (!(regexp.test(o.val()))) {
                    o.addClass("ui-state-error");
                    updateTips(n);
                    return false;
                } else {
                    return true;
                }
            }

            function addUser() {
                var valid = true;
                allFields.removeClass("ui-state-error");

                valid = valid && checkLength(name, "username", 3, 16);
                valid = valid && checkLength(email, "email", 6, 80);
                valid = valid && checkLength(password, "password", 5, 16);

                valid = valid && checkRegexp(name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter.");
                valid = valid && checkRegexp(email, emailRegex, "eg. ui@jquery.com");
                valid = valid && checkRegexp(password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9");

                if (valid) {
                    $("#users tbody").append("<tr>" +
                            "<td>" + name.val() + "</td>" +
                            "<td>" + email.val() + "</td>" +
                            "<td>" + password.val() + "</td>" +
                            "</tr>");
                    dialog.dialog("close");
                }
                return valid;
            }

            dialog = $("#dialog-form").dialog({
                autoOpen: false,
                height: 400,
                width: 350,
                modal: true,
                buttons: {
//                    "Update": addUser,
                    Cancel: function () {
                        dialog.dialog("close");
                    }
                },
                close: function () {
                    form[ 0 ].reset();
                    allFields.removeClass("ui-state-error");
                }
            });
            dialog = $("#dialog-form-comment").dialog({
                autoOpen: false,
                height: 400,
                width: 350,
                modal: true,
                buttons: {
//                    "Update": addUser,
                    Cancel: function () {
                        dialog.dialog("close");
                    }
                },
                close: function () {
                    form[ 0 ].reset();
                    allFields.removeClass("ui-state-error");
                }
            });

            form = dialog.find("form").on("submit", function (event) {
//            alert(1);
                //event.preventDefault();
//                addUser();
            });

//            $("#create-user").button().on("click", function () {
//                dialog.dialog("open");
//            });
        });



        $(".post-delete").click(function () {


            var data = {
                'post_id_delete': $(this).attr("data-id")
            };

            $.ajax({
                type: "POST",

                url: "<?php echo APP_URL; ?>/post.php",
                data: data,
                success: function (res) {
                    $("body").css("opacity", "1.0");
                    $(".ajaxLoader").hide();

                    if (res == 1) {
                        alert('Successfully Deleted!');
                        window.location.reload();
                    } else {
                        alert('SORRY, SOME ERROR OCCURED !');
                    }
                }
            });
        });

        $(".comment-delete").click(function () {


            var data = {
                'comment_id_delete': $(this).attr("data-id")
            };

            $.ajax({
                type: "POST",

                url: "<?php echo APP_URL; ?>/post.php",
                data: data,
                success: function (res) {
                    $("body").css("opacity", "1.0");
                    $(".ajaxLoader").hide();

                    if (res == 1) {
                        alert('Successfully Deleted!');
                        window.location.reload();
                    } else {
                        alert('SORRY, SOME ERROR OCCURED !');
                    }
                }
            });

        });


        $('#forumPost').summernote({
            height: 180,
            focus: false,
            tabsize: 2
        });

    })

</script>

<?php
//include footer
include("inc/google-analytics.php");
?>

<script src='js/upload.js'></script>

<!--<script>
    $(document).ready(function () {

-->

<!--

        
    });
>>>>>>> origin/master
</script>-->