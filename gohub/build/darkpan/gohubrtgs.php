<?php
include '../dbConfig.php';

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /gohub/build/rmvs-login/signin.php");
    exit;
}

$_SESSION["rtgs_success"] = true;
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
    Swal.fire({
    icon: 'success',
    title: 'RTGS Transaction',
    text: 'RTGS Transaction successfully sent to Your RM'
})
}

</script>
    <?php
    if($_SESSION["rtgs_success"] == true){
        ?>
        <script type="text/javascript">
        fireSweetAlert();
        </script>
        <?php
        $_SESSION["rtgs_success"] = false;
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
                    <img src="../assets/img/icons/Logo.png" height="35" alt="logo" />
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['full_name']; ?></h6>
                        <span>Premier Client</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="gohubhome.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="gohubrtgs.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>RTGS</a>
                    <a href="gohubtt.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Tele-Transfers</a>
                    <a href="gohubfd.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Fixed Deposits</a>
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
                    <!--<div id="txn-dates">
                        <input type="text" name="start" required placeholder="Start Date">
                    <span>to</span>
                        <input type="text" name="end" required placeholder="End Date">
                        <button type="button" class="btn btn-outline-primary" id="search_txns">Search Transaction</button> 
                    </div>-->
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

                <button type="button" class="btn btn-outline-primary" style="margin-left:84%;" onclick="location.href='gohubrtgscrt.php'">Make a RTGS Transfer</button>
                <!--SAMPLE TXNS -->

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
                            $sessionId = $_SESSION["sessionId"];
                            $query = $db->query("SELECT * FROM instructions WHERE customerId = $sessionId AND instructionItemId = '3' ORDER BY instructionsId DESC");
                            if($query->num_rows > 0){ 
                                while($row = $query->fetch_assoc()){
                            ?>
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
                                    <!--<td><input type="button" class="btn btn-sm btn-primary" name="view" value="Detail" id="<?php echo $row["instructionId"]; ?>"/></td>-->
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
            <!-- Widget End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4" style="margin-top:190px;">
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
    <script>
        let attention = Prompt();


        const elem = document.getElementById('txn-dates');
        const rangepicker = new DateRangePicker(elem, {
            format: "yyyy-mm-dd",
        }); 

        document.getElementById("search_txns").addEventListener("click", function(){
        let html = `
        <form id="check-availability-form" action="" method="post" novalidate class="needs-validation">
            <div class="form-row">
                <div class="col">
                    <div class="form-row" id="txn-dates-modal">
                        <div class="col">
                            <input disabled required type="text" name="start" id="start" placeholder="Start Date">
                        </div>
                        <div class="col">
                            <input disabled required type="text" name="end" id="end" placeholder="End Date">
                        </div>

                    </div>
                </div>
            </div>
        </form>
        `;
        attention.customSearch({
            title: 'Select your transaction dates',
            msg: html,
        });

            //attention.success({msg: "Hello World"});
            //attention.error({msg: "Error"});
            //attention.toast({msg: "Hello World"});
        })

        function notifyModal(title, text, icon, confirmButtonText){
            Swal.fire({
                title: title,
                html: text,
                icon: icon,
                confirmButtonText: confirmButtonText
            })
        }

        function Prompt(){
            let toast = function(c){
                const{
                    msg = "",
                    icon = "success",
                    position = "top-end",
                } = c;
                const Toast = Swal.mixin({
                    toast: true,
                    title: msg,
                    position: position,
                    icon: icon,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({})
            }

            let success = function(c){
                const{
                    msg = "",
                    title="",
                    footer="",
                } = c;

                Swal.fire({
                    icon: 'success',
                    title: title,
                    text: msg,
                    footer: footer,
                })
            }

            let error = function(c){
                const{
                    msg = "",
                    title="",
                    footer="",
                } = c;

                Swal.fire({
                    icon: 'error',
                    title: title,
                    text: msg,
                    footer: footer,
                })
            }

            async function customSearch(c) {
             const {
                    msg = "",
                    title = "",
                } = c;

            const { value: formValues } = await Swal.fire({
                title: title,
                html: msg,
                backdrop: false,
                focusConfirm: false,
                showCancelButton: true,
                willOpen: () => {
                    const elem = document.getElementById("txn-dates-modal");
                    const rp = new DateRangePicker(elem, {
                        format: 'yyyy-mm-dd',
                        showOnFocus: true,
                    })
                },
                didOpen: () => {
                    document.getElementById("start").removeAttribute("disabled");
                    document.getElementById("end").removeAttribute("disabled");
                },
                preConfirm: () => {
                    return [
                        document.getElementById('start').value,
                        document.getElementById('end').value
                    ]
                }
            })

            if (formValues) {
                Swal.fire(JSON.stringify(formValues))
            }
        }

            return {
                toast: toast,
                success: success,
                error: error,
                customSearch: customSearch,
            }
        }

    </script>
    <!--date range picker-->

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>