<?php
include '../dbConfig.php';

session_start();
//$fixedDepositId = $_SESSION['fixedDepositId'];        // Collecting data from query string
$fixedDepositId = $_GET['fixedDepositId'];
if(!is_numeric($fixedDepositId)){ // Checking data it is a number or not
echo "Data Error" . $_SESSION['fixedDepositId'];    
exit;
}


$query = $db->query("SELECT * FROM fixed_deposits WHERE fixedDepositId = $fixedDepositId");
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GoHub</title>
    <!--date range picker-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/css/datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/css/datepicker-bs4.min.css">
    <!--date range picker-->

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

    <style>
        .datepicker {
            z-index: 10000;
        }
        /* table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
} */
    </style>
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
                    <a href="gohubhomeBO.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>RTGS</a>
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
                    <a href="fdlookup.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Fixed Deposits</a>
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
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
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


            <!-- Widget Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary text-center rounded p-4">
            <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <tr>
                        <td>Transaction Reference</td>
                        <td>
                            <?php 
                            $result = uniqid();
                            echo $result; 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Investment Type</td>
                        <td><?php 
                                    if($row['acTypeId'] == 9){
                                        echo 'Fixed Deposit';
                                    } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Client's Name</td>
                        <td>
                                        <?php
                                        $client_name = $row['customerId'];
                                        $namequery = $db->query("SELECT full_name FROM customers WHERE status = '1' AND sessionId = $client_name");
                                        if($namequery->num_rows > 0){ 
                                            while($namerow = $namequery->fetch_assoc()){
                                                echo $namerow['full_name'];
                                            }}
                                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Fixed Deposit Account Number</td>
                        <td><?php echo $row['acNo']; ?></td>
                    </tr>
                    <tr>
                        <td>Current/Savings Associated Account Number</td>
                        <td><?php echo $row['casaAcNo']; ?></td>
                    </tr>
                    <tr>
                        <td>Amount Fixed</td>
                        <td><?php echo $row['currency']. ' ' .number_format($row['amtFixed'],2); ?></td>
                    </tr>
                    <tr>
                        <td>Term in Months</td>
                        <td><?php echo $row['termMonths']. 'months'; ?></td>
                    </tr>   
                    <tr>
                        <td>Interest Rate</td>
                        <td><?php echo $row['interestRate']. '%'; ?></td>
                    </tr>
                    <tr>
                        <td>Maturity Amount</td>
                        <td><?php echo $row['currency']. ' ' .number_format($row['maturityAmt'],2); ?></td>
                    </tr>
                    <tr>
                        <td>Maturity Countdown Date</td>
                        <td id="maturityCountdown">
                            <?php
                            $month = array("01"=>"January", "02"=>"February", "03"=>"March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "Novermber", "12" => "December");
                            $emptyArray = []; 
                            $secondArray = [];
                            $str = $row['maturityDate'];
                            $emptyArray = (explode(" ",$str));
                            $secondArray = (explode("-",$emptyArray[0]));
                            $year = $secondArray[0];
                            $date = $secondArray[2];
                            $replacements = array(0 => $month[$secondArray[1]], 1 => $date, 2 => $year);
                            $basket = array_replace($secondArray, $replacements);
                            array_push($basket,$emptyArray[1]);
                            $countdowntime = implode(" ",$basket);?>
                            </td>
                            <script>
                            // Set the date we're counting down to
                            var dedline = <?php echo json_encode($countdowntime); ?>;
                            var countDownDate = new Date(dedline).getTime();
                            
                            // Update the count down every 1 second
                            var x = setInterval(function() {
                            
                              // Get today's date and time
                              var now = new Date().getTime();
                                
                              // Find the distance between now and the count down date
                              var distance = countDownDate - now;
                                
                              // Time calculations for days, hours, minutes and seconds
                              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                              var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                
                              // Output the result in an element with id="demo"
                              document.getElementById("maturityCountdown").innerHTML = days + "d " + hours + "h "
                              + minutes + "m " + seconds + "s ";
                                
                              // If the count down is over, write some text 
                              if (distance < 0) {
                                clearInterval(x);
                                document.getElementById("maturityCountdown").innerHTML = "EXPIRED";
                              }
                            }, 1000);
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>Fixed Deposit Status</td>
                        <td>
                        <?php 
                            if($row['status'] == '0'){
                                echo "Matured";
                            }
                            else{
                                echo 'Fixed';
                            }; ?>
                        </td>
                    </tr>
                    <?php } }else{ ?>
                        <p>Specific Fixed Deposit Transaction Is Still Being Processed</p>
                    <?php } ?>
                </table>
                    </div>
                    </div>
            </div>
            <!-- Widget End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">GoHub</a>, All Right Reserved. 
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
     <!--SweetAlert-->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <!--SweetAlert-->

    <!--date range picker-->
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/js/datepicker-full.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>