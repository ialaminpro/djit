<<<<<<< HEAD
<?php
//initilize the page


include_once 'php/db_connect.php';
include_once 'php/functions.php';
sec_session_start();
//
//print_r($_SESSION);
require_once("inc/init.php");

require_once("inc/config.ui.php");



$page_title = "Login";


$page_css[] = "your_style.css";
$no_main_header = true;
$page_html_prop = array("id" => "extr-page", "class" => "animated fadeInDown");
include("inc/header.php");



if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
<header id="header">
        <!--<span id="logo"></span>-->

    <div id="logo-group">
        <span id="logo"> <img src="<?php echo ASSETS_URL; ?>/img/logo.png" alt="SmartAdmin"> </span>

        <!-- END AJAX-DROPDOWN -->
    </div>

    <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Need an account?</span> <a href="<?php echo APP_URL; ?>/register.php" class="btn btn-danger">Create account</a> </span>

</header>

<div id="main" role="main">

    <!-- MAIN CONTENT -->
    <div id="content" class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                <h1 class="txt-color-red login-header-big">Daffodil Japan IT</h1>
                <div class="hero">

                    <div class="pull-left login-desc-box-l">
                        <h4 class="paragraph-header">It's Okay to be Smart. Experience the simplicity of DJIT, everywhere you go!</h4>
                        <div class="login-app-icons">
                            <a href="<?php echo ASSETS_URL; ?>/index.php" class="btn btn-danger btn-sm">Go to Home</a>
                            <a href="<?php echo ASSETS_URL; ?>/search.php?param=" class="btn btn-danger btn-sm">Go To Search</a>
                        </div>
                    </div>

                    <img src="<?php echo ASSETS_URL; ?>/img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">

                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h5 class="about-heading">About DJIT - Are you up to date?</h5>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h5 class="about-heading">Not just your average!</h5>
                        <p>
                            Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi voluptatem accusantium!
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <div class="well no-padding">

                    <form action="php/process_login.php" id="login-form" method="post" class="smart-form client-form">
                        <header>
                            Sign In
                        </header>

                        <fieldset>

                            <section>
                                <label class="label">E-mail</label>
                                <label class="input"> <i class="icon-append fa fa-user"></i>
                                    <input type="email" name="email">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
                            </section>

                            <section>
                                <label class="label">Password</label>
                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    <input type="password" id="password" name="password">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
                                <div class="note">
                                    <a href="<?php echo APP_URL; ?>/forgotpassword.php">Forgot password?</a>
                                </div>
                            </section>

                            <section>
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" checked="">
                                    <i></i>Stay signed in</label>
                            </section>
                        </fieldset>
                        <?php
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == 4) {
                                echo '<p style="color:red;font-weight:bold;margin:10px;" class="error">Please Login !<br> Then Your Can Post'
                                . ''
                                . '</p>';
                            } else if ($_GET['error'] == 5) {
                                echo '<p style="color:red;font-weight:bold;margin:10px;" class="error">Please Login !<br> Then Your Can Comment'
                                . ''
                                . '</p>';
                            } else {
                                echo '<p style="color:red;font-weight:bold;margin:10px;" class="error">Error Logging In!<br> Not Match Your Email and Password!'
                                . ''
                                . '</p>';
                            }
                        }
                        ?> 
                        <footer>

                            <input class="btn btn-primary" type="button" 
                                   value="Login" 
                                   onclick="formhash(this.form, this.form.password);" /> 
                            <!--                            <button type="button" value="Login"  class="btn btn-primary" onclick="formhash(this.form, this.form.password);">
                                                            Sign in
                                                        </button>-->
                        </footer>
                    </form>
                    <?php
// echo 'fdsfasd'; exit();
                    if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';

                        echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
                    } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                    }
                    ?> 

                </div>

                <h5 class="text-center"> - Or sign in using -</h5>

                <ul class="list-inline text-center">
                    <li>
                        <a href="https://www.facebook.com/daffodiljapan/" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>

            </div>
        </div>
    </div>

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php
//include required scripts
include("inc/scripts.php");
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<script type="text/javascript">
    runAllForms();

    $(function () {
        // Validation
        $("#login-form").validate({
            // Rules for form validation
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                }
            },

            // Messages for form validation
            messages: {
                email: {
                    required: 'Please enter your email address',
                    email: 'Please enter a VALID email address'
                },
                password: {
                    required: 'Please enter your password'
                }
            },

            // Do not change code below
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });
    });
</script>

<?php
//include footer
include("inc/google-analytics.php");
=======
<?php
//initilize the page


include_once 'php/db_connect.php';
include_once 'php/functions.php';
sec_session_start();
//
//print_r($_SESSION);
require_once("inc/init.php");

require_once("inc/config.ui.php");



$page_title = "Login";


$page_css[] = "your_style.css";
$no_main_header = true;
$page_html_prop = array("id" => "extr-page", "class" => "animated fadeInDown");
include("inc/header.php");



if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
<header id="header">
        <!--<span id="logo"></span>-->

    <div id="logo-group">
        <span id="logo"> <img src="<?php echo ASSETS_URL; ?>/img/logo.png" alt="SmartAdmin"> </span>

        <!-- END AJAX-DROPDOWN -->
    </div>

    <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Need an account?</span> <a href="<?php echo APP_URL; ?>/register.php" class="btn btn-danger">Create account</a> </span>

</header>

<div id="main" role="main">

    <!-- MAIN CONTENT -->
    <div id="content" class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                <h1 class="txt-color-red login-header-big">Daffodil Japan IT</h1>
                <div class="hero">

                    <div class="pull-left login-desc-box-l">
                        <h4 class="paragraph-header">It's Okay to be Smart. Experience the simplicity of DJIT, everywhere you go!</h4>
                        <div class="login-app-icons">
                            <a href="<?php echo ASSETS_URL; ?>/index.php" class="btn btn-danger btn-sm">Go to Home</a>
                            <a href="<?php echo ASSETS_URL; ?>/search.php?param=" class="btn btn-danger btn-sm">Go To Search</a>
                        </div>
                    </div>

                    <img src="<?php echo ASSETS_URL; ?>/img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">

                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h5 class="about-heading">About DJIT - Are you up to date?</h5>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h5 class="about-heading">Not just your average!</h5>
                        <p>
                            Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi voluptatem accusantium!
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <div class="well no-padding">

                    <form action="php/process_login.php" id="login-form" method="post" class="smart-form client-form">
                        <header>
                            Sign In
                        </header>

                        <fieldset>

                            <section>
                                <label class="label">E-mail</label>
                                <label class="input"> <i class="icon-append fa fa-user"></i>
                                    <input type="email" name="email">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
                            </section>

                            <section>
                                <label class="label">Password</label>
                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    <input type="password" id="password" name="password">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
                                <div class="note">
                                    <a href="<?php echo APP_URL; ?>/forgotpassword.php">Forgot password?</a>
                                </div>
                            </section>

                            <section>
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" checked="">
                                    <i></i>Stay signed in</label>
                            </section>
                        </fieldset>
                        <?php
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == 4) {
                                echo '<p style="color:red;font-weight:bold;margin:10px;" class="error">Please Login !<br> Then Your Can Post'
                                . ''
                                . '</p>';
                            } else if ($_GET['error'] == 5) {
                                echo '<p style="color:red;font-weight:bold;margin:10px;" class="error">Please Login !<br> Then Your Can Comment'
                                . ''
                                . '</p>';
                            } else {
                                echo '<p style="color:red;font-weight:bold;margin:10px;" class="error">Error Logging In!<br> Not Match Your Email and Password!'
                                . ''
                                . '</p>';
                            }
                        }
                        ?> 
                        <footer>

                            <input class="btn btn-primary" type="button" 
                                   value="Login" 
                                   onclick="formhash(this.form, this.form.password);" /> 
                            <!--                            <button type="button" value="Login"  class="btn btn-primary" onclick="formhash(this.form, this.form.password);">
                                                            Sign in
                                                        </button>-->
                        </footer>
                    </form>
                    <?php
// echo 'fdsfasd'; exit();
                    if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';

                        echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
                    } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                    }
                    ?> 

                </div>

                <h5 class="text-center"> - Or sign in using -</h5>

                <ul class="list-inline text-center">
                    <li>
                        <a href="https://www.facebook.com/daffodiljapan/" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>

            </div>
        </div>
    </div>

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php
//include required scripts
include("inc/scripts.php");
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<script type="text/javascript">
    runAllForms();

    $(function () {
        // Validation
        $("#login-form").validate({
            // Rules for form validation
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                }
            },

            // Messages for form validation
            messages: {
                email: {
                    required: 'Please enter your email address',
                    email: 'Please enter a VALID email address'
                },
                password: {
                    required: 'Please enter your password'
                }
            },

            // Do not change code below
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });
    });
</script>

<?php
//include footer
include("inc/google-analytics.php");
>>>>>>> origin/master
?>