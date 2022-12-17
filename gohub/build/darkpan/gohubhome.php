<?php
session_start();
include '../dbConfig.php';
// Initialize the session
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /gohub/build/rmvs-login/signin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gohub</title>
 
     <!--SweetAlert-->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <!--SweetAlert-->

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

    <!--SweetAlert-->
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!--SweetAlert-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style>
   .hundred-chars {
    width: 60ch;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    }
    </style>
</head>

<body>
    
<script type="text/javascript">

function fireSweetAlert() {
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Signed in successfully'
})
}

</script>
    <?php
    if($_SESSION["log_time"] == false){
        ?>
        <script type="text/javascript">
        fireSweetAlert();
        </script>
        <?php
        $_SESSION["log_time"] = true;
    }
    ?>
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
                <a href="gohubhome.php" class="navbar-brand mx-4 mb-3">
                    <!-- <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>GoHub</h3> -->
                    <img src="../assets/img/icons/Logo.png" height="35" alt="logo" />
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION["full_name"]; ?></h6>
                        <span>Premier Client</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="gohubhome.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="gohubrtgs.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>RTGS</a>
                    <a href="gohubtt.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Tele-Transfers</a>
                    <a href="gohubfd.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Fixed Deposits</a>
                    <!--<a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>-->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="gohubhome.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <!--<div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>-->
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
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION["full_name"]; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="/gohub/build/rmvs-login/signout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <?php 
            $sessionId = $_SESSION["sessionId"];
            $clientrtgsquery = $db->query("SELECT SUM(amount) FROM instructions WHERE customerId = $sessionId AND instructionItemId = 3");
            $clienttquery = $db->query("SELECT SUM(amount) FROM instructions WHERE customerId = $sessionId AND instructionItemId = 4");
            $clientfdquery = $db->query("SELECT SUM(amtFixed) FROM fixed_deposits WHERE customerId = $sessionId");
            ?>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <!-- <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Net Balance</p>
                                <h6 class="mb-0">Ksh 1234</h6>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total RTGS</p>
                                <h6 class="mb-0">Ksh 
                                <?php 
                            if($clientrtgsquery->num_rows > 0){ 
                                while($row = $clientrtgsquery->fetch_assoc()){
                                    echo number_format($row['SUM(amount)'],2);
                                }}
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Term Deposit</p>
                                <h6 class="mb-0">Ksh. 
                                <?php 
                            if($clientfdquery->num_rows > 0){ 
                                while($row = $clientfdquery->fetch_assoc()){
                                    echo number_format($row['SUM(amtFixed)'],2);
                                }}else{ echo '0';}
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Tele-Transfers</p>
                                <h6 class="mb-0">Ksh
                                <?php 
                            if($clienttquery->num_rows > 0){ 
                                while($row = $clienttquery->fetch_assoc()){
                                    echo number_format($row['SUM(amount)'],2);
                                }}
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Local and international Transfers</h6>
                            </div>
                            <canvas id="newworldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Fixed Deposits (Investments)</h6>
                            </div>
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Transactions</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Date</th>
                                    <th scope="col">Transaction Type</th>
                                    <th scope="col">Beneficiary</th>
                                    <th scope="col">Beneficiary's Bank</th>
                                    <th scope="col">Beneficiary's Account</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php
                            //get rows query
                            $query = $db->query("SELECT * FROM instructions WHERE customerId = $sessionId ORDER BY instructionsId DESC LIMIT 5");
                            if($query->num_rows > 0){ 
                                while($row = $query->fetch_assoc()){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['created']; ?></td>
                                    <td><?php 
                                    if($row['instructionItemId'] == '3'){
                                        echo 'RTGS';
                                    }
                                    else{
                                           echo 'Telegraphic Transfer';
                                        }; ?></td>
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
                                    <td><button type="button" class="btn btn-sm btn-primary txn-details"  onclick="location.href='selectTxn.php?instructionsId=<?php echo $row['instructionsId']; ?>'">Detail</button></td>
                                </tr>
                                <?php } }else{ ?>
                                <p>Transact with Us to view your transactions</p>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
            <?php
    //get rows query
    $query = $db->query("SELECT year(maturityDate), SUM(amtFixed) AS amount_fixed FROM fixed_deposits WHERE customerId = $sessionId");
    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){
            $amtBeingFixed = $row['amount_fixed'];
    ?>
    <script>
var amtFixed = <?php echo json_encode($amtBeingFixed); ?>;
  new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [2020,2021,2022,2023,2024,2025,2026,2027],
    datasets: [{ 
        data: [202000,780000,amtFixed],
        label: "Amounts Fixed in FDs",
        borderColor: "#AC171A",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Cumulative FDs per year'
    }
  }
});

    </script>
    <?php }}?>





            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Featured Financial News</h6>
                            <div class="owl-carousel testimonial-carousel">
                            <?php
                            //get rows query
                            $query = $db->query("SELECT * FROM news WHERE featured = '2' ORDER BY newsId DESC LIMIT 4");
                            if($query->num_rows > 0){ 
                                while($row = $query->fetch_assoc()){
                                    $newsCategory = $row['newsCategoryId']; 
                                    $newsCategoryquery = $db->query("SELECT name FROM news_category WHERE newsCategoryId = $newsCategory");
                                    $_SESSION['newsId'] =  $row['newsId'];
                             ?>
                                <div class="testimonial-item text-center">
                                    <img src="<?php echo $row['newsImage'];?>" style="width: 100%; height: 240px;">
                                    <h5 class="mb-1"><?php echo $row['newsTitle'];?></h5>
                                    <p class="mb-0 hundred-chars"><?php echo $row['newsContent'];?></p>
                                </div>
                                <?php } }else{ ?>
                                <p>Featured News Not Updated</p>
                                <?php } ?>
                            </div>
                        </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                </div>
                </div>
            </div>
            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="gohubhome.php">GoHub</a>, All Right Reserved. 
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


        <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Transaction Details</h4>  
                </div>  
                <div class="modal-body" id="instructionDetail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

     <!--SweetAlert-->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <!--SweetAlert-->

    <!-- JavaScript Libraries -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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