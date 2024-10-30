<?php require_once './inc/session.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pharmacy Inventory and Customer Information System</title>


    <!-- Global stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900">
    <link rel="stylesheet" href="assets/css/icons/icomoon/styles.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap_limitless.min.css">
    <link rel="stylesheet" href="assets/css/layout.min.css">
    <link rel="stylesheet" href="assets/css/components.min.css">
    <link rel="stylesheet" href="assets/css/colors.min.css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="assets/js/main/jquery.min.js"></script>
    <script src="assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script src="assets/js/app.js"></script>
    <!-- /theme JS files -->

    <style>
        .login-cover {
        background-image: url(assets/images/login_cover.png); /* Update the path */
        background-size: cover; /* Ensures the background covers the whole area */
        background-position: center; /* Centers the background image */
        height: auto; /* Full height of the viewport */
        display: flex;
        justify-content: center;
        align-items: center;
    }

</style>

</head>

<body>

    <div class="navbar navbar-expand-md navbar-dark">
        <div class="mt-2 mr-5">
            <a  class="d-inline-block font-size-lg">
                <!--  <img src="global_assets/images/favicon.png" alt="Logo" class="logo" style="height: 40px; vertical-align: middle;"> -->
                Pharmacy Inventory and Customer Information System
            </a>
        </div>
    
    
        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
        </div>
    
        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="" class="navbar-nav-link">
                        <i class="icon-home"></i>
                        <span class="d-md-none ml-2">Home</span>
                    </a>
                </li>
    
                <li class="nav-item dropdown">
                    <a href="" class="navbar-nav-link">
                        <i class="icon-user-tie"></i>
                        <span class="d-md-none ml-2">My Account</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="page-content login-cover">
        <div class="content-wrapper">
            <div class="content d-flex justify-content-center align-items-center">
                <form class="login-form" method="post" action="./model/login/login.php">
                    
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-people icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Login to your account</h5>
                                <span class="d-block text-muted">Your credentials</span>
                            </div>
    
                            <div class="form-group">
                                <input type="text" class="form-control" name="username"  placeholder="Login ID or Username" required
                                    value="<?php echo isset($_POST['username']) ? htmlentities($_POST['username']) : ''; ?>">
                            </div>
    
                            <div class="form-group">
                                <input required name="password" type="password" class="form-control" placeholder="Password" required
                                    value="<?php echo isset($_POST['password']) ? htmlentities($_POST['password']) : ''; ?>">
                            </div>
    
                            <div class="form-group d-flex align-items-center">
                                <div class="form-check mb-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-input-styled">
                                        Remember
                                    </label>
                                </div>
                                <a href="" class="ml-auto">Forgot password?</a>
                            </div>
    
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" name="m-submit">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="navbar navbar-expand-lg navbar-light">
        <div class="text-center d-lg-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                <i class="icon-unfold mr-2"></i>
            </button>
        </div>
    
        <div class="navbar-collapse collapse text-center d-flex justify-content-center" id="navbar-footer">
            <span class="navbar-text font-size-sm">
                 &copy <?php echo date('Y'); ?>. <a href="#"> Pharmacy Inventory and Customer Information System</a> by <a href="#">SWIFT MATRIX NETWORKS ACADEMY</a>
            </span>
        </div>
    
    </div>
</body>

</html>
<?php 
require_once './inc/popmsg.php';
