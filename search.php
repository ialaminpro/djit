<?php
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

$page_title = "Search";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
//$page_nav["views"]["sub"]["search"]["active"] = true;
//include("inc/nav.php");
?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<!--<div id="main" role="main">-->
<div  role="main">
    <?php
//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
//$breadcrumbs["New Crumb"] => "http://url.com"
    $breadcrumbs["Misc"] = "";
    include("inc/ribbon.php");
    ?>

    <!-- MAIN CONTENT -->
    <div id="content">

        <!-- row -->

        <div class="row">

            <div class="col-sm-12">

                <ul id="myTab1" class="nav nav-tabs bordered">
                    <li class="active">
                        <a href="#s1" data-toggle="tab">Search For Threads & Comments <i class="fa fa-caret-down"></i></a>
                    </li>
                    <!--                    <li>
                                            <a href="#s2" data-toggle="tab">Search Comments</a>
                                        </li>
                                        <li>
                                                <a href="#s3" data-toggle="tab">Search History</a>
                                        </li>-->
                    <li class="pull-right hidden-mobile">
                    </li>
                </ul>

                <div id="myTabContent1" class="tab-content bg-color-white padding-10">
                    <div class="tab-pane fade in active" id="s1">
                        <h1> Search <span class="semi-bold">Results</span></h1>
                        <br>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" >
                            <div class="input-group input-group-lg hidden-mobile">
                                <div class="input-group-btn">
                                    <!--                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                                            Everything <span class="caret"></span>
                                                                        </button>-->

                                    <?php
                                    if (isset($_GET['type'])) {
                                        $ty = $_GET['type'];
                                    } else {
                                        $ty = "";
                                    }
                                    ?>

                                    <select id="ddlViewBy" name="type" class="btn btn-default dropdown-toggle">
                                        <option <?= $ty == 0 ? "selected" : "" ?> value="0">Everything <span class="caret"></span></option>
                                        <option <?= $ty == 1 ? "selected" : "" ?>  value="1">Title <span class="caret"></span></option>
                                        <option <?= $ty == 2 ? "selected" : "" ?> value="2">Body <span class="caret"></span></option>
                                        <option <?= $ty == 3 ? "selected" : "" ?> value="3">Comment <span class="caret"></span></option>
                                        <option <?= $ty == 4 ? "selected" : "" ?> value="4">MySelf <span class="caret"></span></option>

                                    </select>
                                </div>
                                <?php
                                if (isset($_GET['param'])) {
                                    $search = $_GET['param'];
                                } else {
                                    $search = "";
                                }
                                ?>

                                <input class="form-control input-lg" name="param" type="text" value="<?= $search ?>" placeholder="Search again..." id="search-project">
                                <input type="hidden" value="<?= $_SESSION['user_id'] ?>" name="userid" class="user_id"/>

                                <div class="input-group-btn">
                                    <button type="submit" value="submit" name="submit" class="btn btn-default">
                                        &nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-search fa-lg"></i>&nbsp;&nbsp;&nbsp;
                                    </button>
                                </div>
                            </div>
                        </form>


                        <?php
                        if (isset($_GET['submit']) || isset($_GET['param'])) {
                            error_reporting(0);
                            $search = $_GET['param'];
                            $type = $_GET['type'] ? $_GET['type'] : '';
                            $userid = $_GET['userid'] ? $_GET['userid'] : '';

                            if ($type == 1) {
                                $sql = "SELECT * "
                                        . "FROM forum f "
                                        . "LEFT JOIN comments c on c.post_id=f.post_id  "
                                        . "LEFT JOIN  user u ON u.id=f.userid "
                                        . "where f.title Like '%$search%' "
                                        . "group by f.post_id ";
                            } else if ($type == 2) {
                                $sql = "SELECT * "
                                        . "FROM forum f "
                                        . "LEFT JOIN comments c on c.post_id=f.post_id  "
                                        . "LEFT JOIN  user u ON u.id=f.userid "
                                        . "Where f.details Like '%$search%' "
                                        . "group by f.post_id ";
                            } else if ($type == 3) {
                                $sql = "SELECT * "
                                        . "FROM forum f "
                                        . "LEFT JOIN comments c on c.post_id=f.post_id "
                                        . "LEFT JOIN  user u ON u.id=f.userid "
                                        . "where c.comment_details Like '%$search%' "
                                        . "group by f.post_id ";
                            } else if ($type == 0) {
                                $sql = "SELECT * "
                                        . "FROM forum f "
                                        . "LEFT JOIN comments c on c.post_id=f.post_id "
                                        . "LEFT JOIN  user u ON u.id=f.userid "
                                        . "where f.details Like '%$search%' "
                                        . "OR f.title Like '%$search%' "
                                        . "OR c.comment_details Like '%$search%' "
                                        . "group by f.post_id ";
                            } else if ($type == 4) {
                                $sql = "SELECT * "
                                        . "FROM forum f "
                                        . "LEFT JOIN comments c on c.post_id=f.post_id "
                                        . "LEFT JOIN  user u ON u.id=f.userid "
                                        . "where u.id = '{$userid}' "
                                        . "AND f.details Like '%$search%' "
                                        . "OR f.title Like '%$search%' "
                                        . "OR c.comment_details Like '%$search%' "
                                        . "group by f.post_id ";
                            } else {
                                
                            }
                        } else {
                            
                        }
                        $result = $mysqli->query($sql);
                        ?>
                        <h1 class="font-md"> Search Results for <span class="semi-bold"><?= $search; ?></span><small class="text-danger"> &nbsp;&nbsp;(<?= number_format($result->num_rows); ?> results)</small></h1>

                        <?php
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                
                                 //print_r($row);
                                ?>

                                <!--<div class="search-results clearfix">-->
                                <div class=" clearfix">
                                    <div class="chat-body no-padding profile-message">
                                        <ul>
                                            <li class="message">
                                                <?php if($row["photo"]){?>
                                                <img src=" <?php echo ASSETS_URL . '/' . $row["photo"]; ?>" class="online">
                                                <?php } ?>
                                                <span class="message-text"> <a href="javascript:void(0);" class="username"><?= $row['username'] ?>&nbsp;<small class="text-muted pull-right ultra-light"> <?= $row['update_date'] ?> </small></a> 

                                                    <?php
                                                    if ($row['img']) {
                                                        //echo $row['img'];

                                                        list($orig_width, $orig_height) = getimagesize($row['img']);

                                                        $width = $orig_width;
                                                        $height = $orig_height;

                                                        $max_height = 60;
                                                        $max_width = 80;
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


                                                        <div style="margin-top:15px;">

                                                            <img src="<?php echo ASSETS_URL; ?>/<?= $row["img"]; ?>"  width="<?= $width ?> px" height="<?= $height ?>" alt="">
                                                        </div>

                                                        <div style="margin-left:  <?php echo $width ? $width + 5 : 5; ?>px; ">
                                                        <?php }
                                                        ?>
                                                        <div>
                                                            <a href="javascript:void(0);">
                                                                <h5> <?= $row['title'] ?></h5>
                                                            </a>
                                                            <p class="description">
                                                                <?= $row['details'] ? $row['details'] : ''; ?>
                                                                <br>
                                                                <br>
                                                                <a href="javascript:void(0)" class="btn btn-default btn-xs">More Details</a>
                                                            </p>
                                                        </div>

                                                </span>
                                            </li>                                            
                                        </ul>

                                    </div>
                                </div>
                                <hr>






                                <?php
                            }
                        }
                        ?>



                    </div>



                    <div class="tab-pane fade" id="s3">
                        <h1> Search <span class="semi-bold">history</span></h1>
                        <p class="alert alert-info">
                            Your search history is turned off.

                        </p>

                        <span class="onoffswitch-title">Auto save Search History</span>
                        <span class="onoffswitch">
                            <input type="checkbox" name="save_history" class="onoffswitch-checkbox" id="save_history" checked="checked">
                            <label class="onoffswitch-label" for="save_history"> <span class="onoffswitch-inner" data-swchon-text="ON" data-swchoff-text="OFF"></span> <span class="onoffswitch-switch"></span> </label> </span>

                    </div>
                </div>

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

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<script type="text/javascript">
    $(document).ready(function () {
        $("#search-project").focus();
    })

</script>

<?php
//include footer
include("inc/google-analytics.php");
?>