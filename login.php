<?php ob_start();
include "Database/connect.php";
include "header.php";
?>
<?php
if (isset($_POST['login'])){
    if (empty($_POST['email']) || empty($_POST['password'])){
        ?>
        <script type="text/javascript">alert("Empty");</script>
    <?php }else{
        $logintap = mysqli_query($conn,"SELECT * FROM `employees` WHERE `email`='".$_POST['email']."' AND `password`='".$_POST['password']."'");
        $loginsay = mysqli_num_rows($logintap);
        $login = mysqli_fetch_array($logintap);
        if ($login){
            $_SESSION['employeelogin'] = true;
            $_SESSION['email'] = $_POST['email'];
            header("Location: index.php");
        }else{ ?>
            <script>alert("Email or Password is not correct")</script>
        <?php }
    }
    if (@$login['block'] == 1 or @$login['deleted']){?>
        <script> alert("Your account blocked!");</script>
<?php
        session_destroy();
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="Admin/dist/css/adminlte.min.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><b>Migration</b>Pro</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in</p>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
            </div>
            <p class="mb-0 text-center">
                <a href="register.php" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="Admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="Admin/dist/js/adminlte.min.js"></script>

</body>
</html>
