<?php
session_start();
include '../dbConfig.php';
// Initialize the session
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /gohub/gohubAdmin/signin.php");
    exit;
}
$userType = $_SESSION["userType"];
$staffId = $_SESSION["staffId"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GoHub</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="gohubhomeBO.php" class="navbar-brand mx-4 mb-3">
                    <!-- <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>GoHub</h3> -->
                    <img src="../assets/img/icons/Logo.png" height="35" alt="logo" />
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION["abNumber"]; ?></h6>
                        <span>
                            <?php 
                        if ($_SESSION["userType"] == 3){
                            echo "R.M";
                        }else{
                            echo "B.O.O";
                        } ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="gohubhome.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>RTGS</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="pendingrtgs.php" class="dropdown-item">Pending RTGS</a>
                            <a href="completedrtgs.php" class="dropdown-item">Completed RTGS</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>TT</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="pendingtt.php" class="dropdown-item">Pending TT</a>
                            <a href="completedtt.php" class="dropdown-item">Completed TT</a>
                        </div>
                    </div>
                    <?php 
                        if ($_SESSION["userType"] == 3){
                            ?>
                    <a href="fdlookup.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Fixed Deposits</a>
                    <?php
                        }else{
                            ?>
                    <a href="clientmgmt.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Client Mgmt</a>
                    <a href="staffmgmt.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Staff Mgmt</a>
                    <?php    } ?>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="gohubhomeBO.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notifications</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION["abNumber"]; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="/gohub/gohubAdmin/signout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Typography Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Real-time Gross Settlement (RTGS) Transactions</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Date</th>
                                    <th scope="col">Transaction Type</th>
                                    <th scope="col">Remitter</th>
                                    <th scope="col">Beneficiary</th>
                                    <th scope="col">Beneficiary's Bank</th>
                                    <th scope="col">Beneficiary's Account</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //get rows query
                            if($userType == 4){
                                $query = $db->query("SELECT * FROM instructions WHERE instructionStatus = '2' AND instructionItemId = '3'");
                            }else{
                                $first_query = $db->query("SELECT c.name AS 'Child' FROM relationship_mgmt c INNER JOIN relationship_mgmt p ON c.parent = p.rmgmtId WHERE p.name = $staffId");
                                $firstempty = [];
                                $newarray = [];
                                if($first_query->num_rows > 0){
                                    while($row = $first_query->fetch_assoc()){
                                        array_push($firstempty, $row['Child']);
                                    }
                                    $userStr = implode("", $firstempty);
                                    $chars = str_split($userStr);
                                    foreach ($chars as $char) {
                                        array_push($newarray, $char);
                                    }
                                    $newStr = implode(",", $newarray);
                                    $query = $db->query("SELECT * FROM instructions WHERE instructionStatus = '2' AND customerId IN ($newStr) AND instructionItemId = '3'");
                            }
                        }
                            if($query->num_rows > 0){ 
                                while($row = $query->fetch_assoc()){
                            ?>
                                <tr>
                                    <td><?php echo $row['created']; ?></td>
                                    <td><?php 
                                    if($row['instructionItemId'] == '3'){
                                        echo 'RTGS';
                                    }else{
                                        echo 'TT';
                                    }?></td>
                                    <td><?php echo $row['remitterName']; ?><</td>
                                    <td><?php echo $row['beneficiaryName']; ?></td>
                                    <td><?php echo $row['beneficiaryBank']; ?></td>
                                    <td><?php echo $row['beneficiaryAcNo']; ?></td>
                                    <td><?php echo $row['currency']. ' ' .number_format($row['amount'],2); ?></td>
                                    <td><?php 
                                    if($row['instructionStatus'] == '0'){
                                        echo "Received";
                                    }
                                    elseif($row['instructionStatus'] == '1'){ 
                                        echo "Being Processed";
                                    }
                                    else{
                                        echo 'Transaction Complete';
                                    }; ?></td>
                                    <?php 
                                    $_SESSION['instructionsId'] = $row['instructionsId']; 
                                    ?> 
                                    <!--<td><input type="button" class="btn btn-sm btn-primary" name="view" value="Detail" id="<?php echo $row["instructionId"]; ?>"/></td>-->
                                    <td><button type="button" class="btn btn-sm btn-primary txn-details"  onclick="location.href='selectTxn.php?instructionsId=<?php echo $row['instructionsId']; ?>'">Detail</button></td>
                                </tr>
                                <?php } }else{ ?>
                                <p>There are no completed RTGS Transactions in your queue</p>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Typography End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4" style="margin-top:370px;">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="gohubhomeBO.php">GoHub</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">Abel & Safari</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>