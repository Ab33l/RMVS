<?php
include '../dbConfig.php';
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /gohub/build/rmvs-login/signin.php");
    exit;
}

$fullname = $_SESSION["full_name"];
$sessionId = $_SESSION["sessionId"];

// Define variables and initialize with empty values
date_default_timezone_set('Africa/Nairobi');
$nowdate = date('Y-m-d H:i:s');

$remsac = $bensac = $bensname = $bankremto = $swiftcode = $amount = $conrate = $paymentpurpose = $currency = $rmcomments = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["remsac"]))){
        $username_err = "Please enter remsac.";
    } else{
        $remsac = trim($_POST["remsac"]);
    }

    if(empty(trim($_POST["bensac"]))){
        $username_err = "Please enter bensac.";
    } else{
        $bensac = trim($_POST["bensac"]);
    }

    if(empty(trim($_POST["bensname"]))){
        $username_err = "Please enter bensname.";
    } else{
        $bensname = trim($_POST["bensname"]);
    }

    if(empty(trim($_POST["bankremto"]))){
        $username_err = "Please enter bankremto.";
    } else{
        $bankremto = trim($_POST["bankremto"]);
    }

    if(empty(trim($_POST["swiftcode"]))){
        $username_err = "Please enter swiftcode.";
    } else{
        $swiftcode = trim($_POST["swiftcode"]);
    }

    if(empty(trim($_POST["amount"]))){
        $username_err = "Please enter amount.";
    } else{
        $amount = trim($_POST["amount"]);
    }

    if(empty(trim($_POST["conrate"]))){
        $username_err = "Please enter conrate.";
    } else{
        $conrate = trim($_POST["conrate"]);
    }

    if(empty(trim($_POST["currency"]))){
        $username_err = "Please enter currency.";
    } else{
        $currency = trim($_POST["currency"]);
    }

    $paymentpurpose = trim($_POST["paymentpurpose"]);
    $rmcomments = trim($_POST["rmcomments"]);

    $stmt = $db->prepare("INSERT INTO instructions(instructionItemId, customerId, beneficiaryName, beneficiaryAcNo, beneficiaryBank, beneficiaryBankSwift, remitterName, remitterAcNo, currency, amount, rate, paymentPurpose, rmNarration, created, modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('iisisssisiissss', $instruction_ItemId, $session_Id, $bens_name, $bens_ac, $bank_remto, $swift_code, $rems_name, $rems_ac, $curr_ency, $am_ount, $r_ate, $payment_Purpose, $rmNarration, $created, $modified);
    $instruction_ItemId = 3;
    $session_Id = $sessionId;
    $bens_name = $bensname;
    $bens_ac = $bensac;
    $bank_remto = $bankremto;
    $swift_code = $swiftcode;
    $rems_name = $fullname;
    $rems_ac = $remsac;
    $curr_ency = $currency;
    $am_ount = $amount;
    $r_ate = $conrate;
    $payment_Purpose = $paymentpurpose;
    $rmNarration = $rmcomments;
    $created = $nowdate;
    $modified = $nowdate;

    $stmt->execute();
    $stmt->close();
    $_SESSION["rtgs_success"] = true;
    header("location: /gohub/build/darkpan/gohubrtgs.php");
}
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
        table {
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
}
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
                <a href="gohubhome.php" class="navbar-brand mx-4 mb-3">
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
                    <a href="gohubhome.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Account</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Current Account</a>
                            <a href="typography.html" class="dropdown-item">Savings Account</a>
                            <a href="element.html" class="dropdown-item">Business Account</a>
                        </div>
                    </div>
                    <a href="gohubrtgs.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>RTGS</a>
                    <a href="gohubtt.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Tele-Transfers</a>
                    <a href="gohubfd.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Fixed Deposits</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
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
                    <!--<input class="form-control bg-dark border-0" type="search" placeholder="Search">-->
                    <div id="txn-dates">
                        <input type="text" name="start" required placeholder="Start Date">
                    <span>to</span>
                        <input type="text" name="end" required placeholder="End Date">
                        <button type="button" class="btn btn-outline-primary" id="search_txns">Search Transaction</button> 
                    </div>
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
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
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
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


            <!-- Widget Start -->
            <div class="container-fluid pt-4 px-4">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
                        <div class="bg-secondary rounded h-100 p-4" style="width:70%;margin-left:15%;">
                            <h6 class="mb-4">Real-Time Gross Salary (RTGS) Form</h6>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput"
                                    placeholder="Remitter's Account Number" name="remsac" required>
                                <label for="floatingInput">Remitter's Account Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput"
                                    placeholder="Beneficiary's Account Number" name="bensac" required>
                                <label for="floatingInput">Beneficiary's Account Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Beneficiary's Full Name" name="bensname" required>
                                <label for="floatingInput">Beneficiary's Full Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Bank Remmiting To" name="bankremto" required>
                                <label for="floatingInput">Bank Remmiting To</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Swift Code" name="swiftcode" required>
                                <label for="floatingInput">Swift Code</label>
                            </div>
                            <hr>
                            <label for="floatingSelect">Currency To Be Remitted:  </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="currency" value="KSH" default>
                                <label class="form-check-label" for="inlineCheckbox1">KSH</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="currency" value="USD">
                                <label class="form-check-label" for="inlineCheckbox2">USD</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="currency" value="GBP">
                                <label class="form-check-label" for="inlineCheckbox3">GBP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="currency" value="EURO">
                                <label class="form-check-label" for="inlineCheckbox3">EURO</label>
                            </div>
                            <hr>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" min="1"
                                    placeholder="Amount" name="amount" required>
                                <label for="floatingInput">Amount</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" min="1"
                                    placeholder="Conversion Rate" name="conrate">
                                <label for="floatingInput">Conversion Rate</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Purpose of Payment"
                                    id="floatingTextarea" style="height: 150px;" name="paymentpurpose"></textarea>
                                <label for="floatingTextarea">Purpose of Payment</label>
                            </div>
                            <hr>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea" style="height: 150px;" name="rmcomments"></textarea>
                                <label for="floatingTextarea">Comments To RM</label>
                            </div>
                            <hr>
                            <div class="form-floating">
                            <button type="submit" class="btn btn-primary">Submit Your Transaction</button>
                            <button class="btn btn-warning" style="margin-left:60%;" onclick="location.href='gohubrtgs.php'">Cancel</button>
                            </div>
                        </div>
                    </form>
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

    <script>
$(document).ready(function () {
    $("input[name='currency']").change(function () {
        var maxAllowed = 1;
        var cnt = $("input[name='currency']:checked").length;
        if (cnt > maxAllowed) {
            $(this).prop("checked", "");
            alert('You can only select ' + maxAllowed + ' currency!!');
        }
    });
});
    </script>
</body>

</html>