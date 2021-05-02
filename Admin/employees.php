<?php include "header.php"; ?>
<?php
$employeetap = mysqli_query($conn, "SELECT * FROM `employees`");
$employeesay = mysqli_num_rows($employeetap);
?>

<?php
if (isset($_POST['employeeblock'])) {
    $employeeid = $_POST['empblock'];
    ?>
    <meta http-equiv="refresh" content="1;URL=employees.php">
    <script>alert("Blocked")</script>
    <?php
    $block = mysqli_query($conn, "UPDATE `employees` set `block` = 1 WHERE `id` = '$employeeid'");
}

if (isset($_POST['employeeunblock'])) {
    $employeeid = $_POST['empblock'];
    ?>
    <meta http-equiv="refresh" content="1;URL=employees.php">
    <script>alert("Unblocked")</script>
    <?php
    $unblock = mysqli_query($conn, "UPDATE `employees` set `block` = 0 WHERE `id` = '$employeeid'");
}

if (isset($_POST['delete'])) {
    $employeeid = $_POST['empblock'];
    ?>
    <meta http-equiv="refresh" content="1;URL=employees.php">
    <script>alert("Deleted")</script>
    <?php
    $block = mysqli_query($conn, "UPDATE `employees` set `deleted` = 1 WHERE `id` = '$employeeid'");
}

if (isset($_POST['yesadmin'])) {
    $adminid = $_POST['chooseadmin'];
    ?>
    <meta http-equiv="refresh" content="1;URL=employees.php">
    <script>alert("Active Admin")</script>
    <?php
    $block = mysqli_query($conn, "UPDATE `employees` set `admin` = 1 WHERE `id` = '$adminid'");
}

if (isset($_POST['notadmin'])) {
    $adminid = $_POST['chooseadmin'];
    ?>
    <meta http-equiv="refresh" content="1;URL=employees.php">
    <script>alert("Deactive Admin")</script>
    <?php
    $block = mysqli_query($conn, "UPDATE `employees` set `admin` = 0 WHERE `id` = '$adminid'");
}

?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../index.php" class="brand-link">
            <img src="../migration.jfif" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Migration Pro</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $my['name'] . " " . $my['surname'] ?></a>
                    <a href="#" class="d-block"> <?php
                        if ($my['admin'] == 1){
                            echo "Admin";
                        }else {
                            if ($my['position'] == 1) {
                                echo "Ceo";
                            } elseif ($my['position'] == 2) {
                                echo "Menecer";
                            } elseif ($my['position'] == 3) {
                                echo "Employee";
                            }
                        }
                        ?></a>
                    <a onclick="location.href ='../Employee/logout.php?logout'" type="submit"> <i
                                class="fas fa-sign-out-alt" style="color: green"></i> Exit </a>
                </div>
            </div>
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Admin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="employees.php" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Employees</p>
                        </a>
                    </li>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employees</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">Employees</h1>
                                <a class="btn btn-success float-right" href="addemployee.php">Add Employee <i
                                            class="fas fa-plus"></i></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Age</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Position</th>
                                        <th>Salary</th>
                                        <?php if ($my['admin'] == 1){ ?><th>Admin</th> <?php } ?>
                                        <th>Edit</th>
                                        <th>Block</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <?php if ($my['admin'] == 1){ ?>
                                    <tbody>
                                    <?php while ($employee = mysqli_fetch_array($employeetap)) {
                                    if ($employee['deleted'] == 0) {?>
                                        <tr style="cursor: pointer;">
                                            <td><?= $employee['id'] ?></td>
                                            <td><?= $employee['name'] ?></td>
                                            <td><?= $employee['surname'] ?></td>
                                            <td><?= $employee['age'] ?></td>
                                            <td><?= $employee['email'] ?></td>
                                            <td><?= $employee['password'] ?></td>
                                            <td><?php if ($employee['position'] == 1) {echo "Ceo";} elseif ($employee['position'] == 2) {echo "Menecer";} elseif ($employee['position'] == 3) {echo "Employee";} ?></td>
                                            <td><?= $employee['salary'] ?></td>
                                            <form method="post">
                                                <input type="hidden" name="chooseadmin" value="<?= $employee['id']; ?>">
                                                <?php if ($employee['admin'] == 0) { ?><td><button type="submit" name="yesadmin" class="btn btn-dark">Active Admin</button></td>
                                                <?php } else { ?><td><button type="submit" name="notadmin" class="btn btn-info">Deactive Admin</button></td><?php } ?>
                                            </form>
                                            <td><a onclick="location.href = 'employeeEdit.php?id=<?= $employee['id']; ?>'" class="btn btn-success">Edit</a></td>
                                            <form action="" method="post">
                                                <input type="hidden" name="empblock" value="<?= $employee['id']; ?>">
                                                <?php if ($employee['block'] == 0) { ?>
                                                    <td><button type="submit" name="employeeblock" class="btn btn-warning">Block</button></td>
                                                <?php } else { ?><td><button type="submit" name="employeeunblock" class="btn btn-info">Unblock</button></td><?php } ?>
                                                    <td><button name="delete" class="btn btn-danger">Delete</button></td>
                                            </form>
                                        </tr>
                                    <?php } } ?>
                                    </tbody>
                                    <?php }else{ ?>
                                        <tbody>
                                        <?php while ($employee = mysqli_fetch_array($employeetap)) {
                                            if ($employee['deleted'] == 0) {?>
                                                <tr style="cursor: pointer;">
                                                    <td><?= $employee['id'] ?></td>
                                                    <td><?= $employee['name'] ?></td>
                                                    <td><?= $employee['surname'] ?></td>
                                                    <td><?= $employee['age'] ?></td>
                                                    <td><?= $employee['email'] ?></td>
                                                    <td><?= $employee['password'] ?></td>
                                                    <td><?php if ($employee['position'] == 1) {echo "Ceo";} elseif ($employee['position'] == 2) {echo "Menecer";} elseif ($employee['position'] == 3) {echo "Employee";} ?></td>
                                                    <td><?= $employee['salary'] ?></td>
                                                    <td><a onclick="location.href = 'employeeEdit.php?id=<?= $employee['id']; ?>'" class="btn btn-success">Edit</a></td>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="empblock" value="<?= $employee['id']; ?>">
                                                        <?php if ($employee['block'] == 0) { ?>
                                                            <td><button type="submit" name="employeeblock" class="btn btn-warning">Block</button></td>
                                                        <?php } else { ?><td><button type="submit" name="employeeunblock" class="btn btn-info">Unblock</button></td><?php } ?>
                                                        <td><button name="delete" class="btn btn-danger">Delete</button></td>
                                                    </form>
                                                </tr>
                                            <?php } } ?>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.1.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>
</html>
