<?php
include "../header.php";
$myemail = $my['email'];
$myid = $my['id'];

if (isset($_POST['saveprofile'])) {
    if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['age'])) {
        ?>
        <script type="text/javascript">alert("Empty")</script>
    <?php } else {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];
        $position = $_POST['position'];
        $employeeupt = mysqli_query($conn, "UPDATE `employees` set `name`='$fname', `surname`='$lname', `age`='$age', `salary`='$salary', `position`='$position'  WHERE `id` = '$myid'");
        ?>
        <script type="text/javascript">alert("Success");</script>
    <?php }
}
$employeetap = mysqli_query($conn, "SELECT * FROM `employees` WHERE `email` = '$myemail'");
$my = mysqli_fetch_array($employeetap);
$myid = $my['id'];
$myname = $my['name'];

?>
<nav class="navbar navbar-expand-lg navbar-light bg-red py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.php">Migration Pro</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <?php if (!isset($_SESSION["employeelogin"])) { ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Login</a></li>
                <?php } elseif (isset($_SESSION["employeelogin"]) and $my['position'] == 1 or $my['position'] == 2 or $my['position'] == 3) { ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../Admin/index.php">Panel</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../Employee/index.php"><?= $myname ?></a></li>
                <?php } elseif (isset($_SESSION["employeelogin"]) and $my['position'] == 4 or $my['position'] == 5) { ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../Employee/index.php"><?= $myname ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-10 col-md-9 col-sm-10">
            <form action="" method="post" class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label for="">Name</label>
                    <input name="fname" type="text" value="<?= $my['name']; ?>" class="form-control">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label for="">Surname</label>
                    <input name="lname" type="text" value="<?= $my['surname']; ?>" class="form-control">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                    <label for="">Email</label>
                    <input name="email" id="emailinp" type="email" value="<?= $my['email']; ?>" class="form-control"
                           style="cursor: no-drop">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                    <label for="">Age</label>
                    <input name="age" type="number" value="<?= $my['age']; ?>" class="form-control">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                    <label for="">Position</label>
                    <input name="position" id="position" type="text" value="<?php if ($my['position'] == 1) {
                        echo "Ceo";
                    } elseif ($my['position'] == 2) {
                        echo "Main Admin";
                    } elseif ($my['position'] == 3) {
                        echo "Admin";
                    } elseif ($my['position'] == 4) {
                        echo "Menecer";
                    } elseif ($my['position'] == 5) {
                        echo "Employee";
                    }
                    ?>" class="form-control">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                    <label for="">Salary</label>
                    <input name="salary" id="salary" type="number" value="<?= $my['salary']; ?>" class="form-control">
                </div>
                <div class="col-6 mt-3">
                    <button type="submit" style="padding: 10px 70px;" name="saveprofile" class="btn btn-success col-12">Save</button>
                </div>
                <div class="col-6 mt-3">
                    <a onclick="location.href ='logout.php?logout'" type="submit" style="padding: 10px 70px;" class="btn btn-success col-12"> Exit
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener('load', function () {
        document.getElementById("emailinp").readOnly = true;
        document.getElementById("salary").readOnly = true;
        document.getElementById("position").readOnly = true;
    });
</script>