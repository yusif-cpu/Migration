<?php
include "header.php";
?>
<?php
$position_name = mysqli_query($conn, "SELECT * FROM `positions`");
$positionsay = mysqli_num_rows($position_name);

if (isset($_POST['addemployee'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $position = $_POST['position'];

    $addemployee = mysqli_query($conn, "INSERT INTO `employees` set  `name`= '$fname', `surname`='$lname', `age` = '$age', `email`='$email', `password`='$password', `position`='$position'");
    header("Location: employees.php");
}
?>
<div class="container">
    <div class="row">
        <div class="col-12 justify-content-center">
            <div class="justify-content-center"><h1 class="text-center">Add Employee</h1></div>
            <form class="form-row mt-5" method="post">
                <div class=" col-6">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="fname" placeholder="Name">
                </div>
                <div class="col-6">
                    <label for="">Surname</label>
                    <input class="form-control" type="text" name="lname" placeholder="Surname">
                </div>
                <div class="col-6 mt-2">
                    <label for="">Age</label>
                    <input class="form-control" type="number" name="age" placeholder="Age">
                </div>
                <div class="col-6 mt-2">
                    <label for="">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>
                <div class="col-6 mt-2">
                    <label for="">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="col-6 mt-2">
                    <label for="">Position</label>
                    <select class="form-control" name="position">
                        <?php foreach ($position_name as $positionname){ ?>
                            <option value="<?= $positionname['id'] ?>"><?= $positionname['position_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-success" name="addemployee">Add Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>
