<?php
    session_start();
    require "connection.php";
    $sql="SELECT * FROM expensedetail;";
    $result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link href="webpage.css" rel="stylesheet">
    <link href="sb-admin-2.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <!--Sidebar-->
        <ul class="navigation background sidebar sidebar-dark" id="accordionSidebar">
            <!--Sidebar-Brand-->
            <a class="sidebar-brand" href="index.php">
            <div>DASHBOARD</div></a>
            <hr class="sidebarhr">
            <!--Nav Item-Pages Collapse Menu-->
            <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <span>Projects</span></a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="collapseitems collapse-inner rounded">
                    <h5 class="collapse-header">Custom Components</h5>
                    <a class="collapse-item" href="projectadd.php">Add Project</a>
                    <a class="collapse-item" href="projectview.php">View Project</a>
                </div>
            </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <span>Expenses</span></a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="collapseitems collapse-inner rounded">
                        <h5 class="collapse-header">Custom Components</h5>
                        <a class="collapse-item" href="expense-add.php">Add Expenses</a>
                        <a class="collapse-item" href="expense-getinvoice.php">Invoice Generate</a>
                    </div>
                </div>
            </li>
            <hr class="sidebarhr">
            <div class="sidebar-heading">Add ons</div>
            <!--Nav Item-Pages Collapse Menu-->
            <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <span>Profile</span></a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="collapseitems collapse-inner rounded">
                    <h5 class="collapse-header">Login Pages</h5>
                    <a class="collapse-item" href="login.php">Login</a>
                </div>
            </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="expenselist.php"><span>Total Expense</span></a>
            </li>
            <hr class="sidebarhr">
        </ul>
        <!--End of Sidebar-->
        <!--Content Wrapper-->
        <div id="content-wrapper" class="flex-column">
            <!--Main Content-->
            <div id="content">
            <!--Topbar-->
            <nav class="navbar navbar-expand topcolor topbar">
                <h1><p class="head">EXPENSE MANAGEMENT AND INVOICE GENERATION&nbsp;&nbsp;&nbsp;</p></h1>
            <!--Nav Item-User Information-->
            <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
                <img class="img-profile rounded-circle" src="undraw_profile.svg"></a>
            <!--Dropdown-User Information-->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
            </li>
            </nav>
            <!--End of Topbar-->
            <!--Begin Page Content-->
            <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Invoice Generate</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Expensed On</th>
                                    <th>Invoice No</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>View Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                ?>
                                    <tr>
                                    <td><?php echo $row['ptitle'];?></td>
                                    <td><?php echo $row['spendedon'];?></td>
                                    <td><?php echo $row['invoice'];?></td>
                                    <td><?php echo $row['dat'];?></td>
                                    <td><?php echo $row['amount'];?></td>
                                    <td><a href="getinvoice.php?id=<?php echo $row['invoice'];?>" class="btn btn-primary" target="_blank">View</a></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <!-- /.container-fluid -->
        </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!--Logout Modal-->
    <div class="modal fade" id="logoutModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Ready to Leave</h5>
                    <button class="close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">Select "Logout" below if Ready to End current session.</div>
                <div class="modal-footer">
                    <a class="button btn-secondary" href="expense-getinvoice.php">Cancel</a>
                    <a class="button btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="jquery.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>
</html>