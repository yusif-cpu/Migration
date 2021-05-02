<?php include "header.php"; ?>
<?php
$id = $_GET['id'];
if (isset($_POST['editemployee'])) {
    if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['age']) || empty($_POST['salary']) || empty($_POST['position'])) { ?>
        <script type="text/javascript">alert("Empty")</script>
    <?php } else {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];
        $position = $_POST['position'];
        $employeeupt = mysqli_query($conn, "UPDATE `employees` set `name`='$fname', `surname`='$lname', `age`='$age', `salary`='$salary', `position`='$position'  WHERE `id` = '$id'");
        ?>
        <script type="text/javascript">alert("Success");</script>
    <?php }
}
$position_name = mysqli_query($conn, "SELECT * FROM `positions`");
$positionsay = mysqli_num_rows($position_name);

$employeetap = mysqli_query($conn,"SELECT * FROM `employees` WHERE `id` = '$id'");
$employeesay = mysqli_num_rows($employeetap);
$employee = mysqli_fetch_array($employeetap);


?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-10 col-md-9 col-sm-10">
            <div class="justify-content-center"><h1 class="text-center">Employee Edit</h1></div>
            <form action="" method="post" class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label for="">Name</label>
                    <input name="fname" type="text" value="<?= $employee['name']; ?>" class="form-control">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label for="">Surname</label>
                    <input name="lname" type="text" value="<?= $employee['surname']; ?>" class="form-control">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                    <label for="">Email</label>
                    <input name="email" id="emailinp" type="email" value="<?= $employee['email']; ?>" class="form-control"
                           style="cursor: no-drop">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                    <label for="">Age</label>
                    <input name="age" type="number" value="<?= $employee['age']; ?>" class="form-control">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                    <label for="">Salary</label>
                    <input name="salary" type="number" value="<?= $employee['salary']; ?>" class="form-control">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                    <label for="">Position</label>
                    <select class="form-control" name="position">
                        <option id="posid">
                            <?php
                            if ($employee['position'] == 1) { echo "Ceo"; }
                            elseif($employee['position'] == 2){ echo "Menecer"; }
                            elseif($employee['position'] == 3){ echo "Employee"; }
                            ?>
                        </option>
                        <?php foreach ($position_name as $positionname){ ?>
                            <option value="<?= $positionname['id'] ?>">
                                <?= $positionname['position_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" style="padding: 10px 70px;" name="editemployee" class="btn btn-success col-12">Save</button>
                </div>
                <div class="col-12 mt-3">
                    <a href="employees.php" style="padding: 10px 70px;"  class="btn btn-dark col-12">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener('load', function () {
        document.getElementById("emailinp").readOnly = true;
        document.getElementById("posid").disabled = true;
    });
</script>
