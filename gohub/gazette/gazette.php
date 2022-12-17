<?php
include 'dbConfig.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>GoHub - TheGazette</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

    <style>
    .hundred-chars {
    width: 81ch;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
    </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>
    <!-- Header Area Start -->
    <header class="header-area">
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Breaking News Area -->
                    <div class="col-12 col-md-6">
                        <div class="breaking-news-area">
                            <h5 class="breaking-news-title">Featured News</h5>
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                            <?php
                            //get rows query
                            $query = $db->query("SELECT * FROM news WHERE featured = '1' ORDER BY newsId DESC LIMIT 4");
                            if($query->num_rows > 0){ 
                                while($row = $query->fetch_assoc()){
                                    //$_SESSION['newsId'] = $row['newsId'];

                            ?>
                            <li><a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>"><?php echo $row['newsTitle']; ?></a></li>
                            <?php } }else{ ?>
                                <p>Featured News Not Updated</p>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Stock News Area -->
                    <div class="col-12 col-md-6">
                        <div class="stock-news-area">
                            <div id="stockNewsTicker" class="ticker">
                                <ul>
                                    <li>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>eur/usd</span>
                                                <span>1.1862</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>0.18</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>BTC/usd</span>
                                                <span>15.674.99</span>
                                            </div>
                                            <div class="stock-index plus-index">
                                                <h4>8.60</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>ETH/usd</span>
                                                <span>674.99</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>13.60</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>eur/usd</span>
                                                <span>1.1862</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>0.18</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>BTC/usd</span>
                                                <span>15.674.99</span>
                                            </div>
                                            <div class="stock-index plus-index">
                                                <h4>8.60</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>ETH/usd</span>
                                                <span>674.99</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>13.60</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>eur/usd</span>
                                                <span>1.1862</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>3.95</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>BTC/usd</span>
                                                <span>15.674.99</span>
                                            </div>
                                            <div class="stock-index plus-index">
                                                <h4>4.78</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>ETH/usd</span>
                                                <span>674.99</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>11.37</h4>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Middle Header Area -->
        <div class="middle-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Logo Area -->
                    <div class="col-12 col-md-4">
                        <div class="logo-area">
                            <a href="index.html"><img src="img/core-img/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <!-- Header Advert Area -->
                    <div class="col-12 col-md-8">
                        <div class="header-advert-area">
                            <a href="#"><img src="img/bg-img/top-advert.png" alt="header-add"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Header Area -->
        <div class="bottom-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#gazetteMenu" aria-controls="gazetteMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>
                                <div class="collapse navbar-collapse" id="gazetteMenu">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="gazette.php">Today <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="index.html">Home</a>
                                                <a class="dropdown-item" href="catagory.html">Catagory</a>
                                                <a class="dropdown-item" href="single-post.html">Single Post</a>
                                                <a class="dropdown-item" href="about-us.html">About Us</a>
                                                <a class="dropdown-item" href="contact.html">Contact</a>
                                            </div>
                                        </li>
                                        <?php
                                        //get rows query
                                        $query = $db->query("SELECT * FROM news_category WHERE parent != '0' ORDER BY newsCategoryId DESC");
                                        if($query->num_rows > 0){ 
                                            while($row = $query->fetch_assoc()){
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><?php echo $row['name'];?></a>
                                        </li>
                                        <?php } }else{ ?>
                                        <p>Featured News Title Not Updated</p>
                                        <?php } ?>
                                    </ul>
                                    <!-- Search Form -->
                                    <div class="header-search-form mr-auto">
                                        <form action="#">
                                            <input type="search" placeholder="Input your keyword then press enter..." id="search" name="search">
                                            <input class="d-none" type="submit" value="submit">
                                        </form>
                                    </div>
                                    <!-- Search btn -->
                                    <div id="searchbtn">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Welcome Blog Slide Area Start -->
    <section class="welcome-blog-post-slide owl-carousel">
        <!-- Single Blog Post -->
        <?php
        //get rows query
        $query = $db->query("SELECT * FROM news WHERE featured = '2' ORDER BY newsId DESC LIMIT 4");
        if($query->num_rows > 0){ 
           while($row = $query->fetch_assoc()){
            $newsCategory = $row['newsCategoryId']; 
            $newsCategoryquery = $db->query("SELECT name FROM news_category WHERE newsCategoryId = $newsCategory");
            $_SESSION['newsId'] =  $row['newsId'];
        ?>
        <div class="single-blog-post-slide bg-img background-overlay-5" style="background-image: url(<?php echo $row['newsImage']; ?>);">
            <!-- Single Blog Post Content -->
            <div class="single-blog-post-content">
                <div class="tags">
                    <a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>">
                    <?php
                    if($newsCategoryquery->num_rows > 0){ 
                        while($crow = $newsCategoryquery->fetch_assoc()){                       
                            echo $crow['name'];
                    }}
                     ?></a>
                </div>
                <h3><a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>" class="font-pt"><?php echo $row['newsTitle'];?></a></h3>
                <div class="date">
                    <?php
                            $month = array("01"=>"January", "02"=>"February", "03"=>"March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "Novermber", "12" => "December");
                            $emptyArray = []; 
                            $secondArray = [];
                            $str = $row['writtenOn'];
                            $emptyArray = (explode(" ",$str));
                            $secondArray = (explode("-",$emptyArray[0]));
                            $year = $secondArray[0];
                            $date = $secondArray[2];
                            $replacements = array(0 => $month[$secondArray[1]], 1 => $date, 2 => $year);
                            $basket = array_replace($secondArray, $replacements);
                            $countdowntime = implode(" ",$basket);
                    ?>
                    <a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>"><?php echo $countdowntime; ?></a>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Featured News Not Updated</p>
        <?php } ?>
    </section>
    <!-- Welcome Blog Slide Area End -->

    <!-- Latest News Marquee Area Start -->
    <div class="latest-news-marquee-area">
        <div class="simple-marquee-container">
            <div class="marquee">
                <ul class="marquee-content-items">
                <?php
                //get rows query
                $query = $db->query("SELECT * FROM news WHERE featured = '3' ORDER BY newsId DESC LIMIT 4");
                if($query->num_rows > 0){ 
                    while($row = $query->fetch_assoc()){
                        $_SESSION['newsId'] = $row['newsId'];
                        $month = array("01"=>"January", "02"=>"February", "03"=>"March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "Novermber", "12" => "December");
                        $emptyArray = []; 
                        $secondArray = [];
                        $str = $row['writtenOn'];
                        $emptyArray = (explode(" ",$str));
                        $basket = $emptyArray[1];
                ?>
                    <li>
                        <a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>"><span class="latest-news-time"><?php echo $basket; ?></span><?php echo $row['newsTitle'];?></a>
                    </li>
                    <?php } }else{ ?>
                    <p>Featured News Not Updated</p>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Latest News Marquee Area End -->

    <!-- Main Content Area Start -->
    <section class="main-content-wrapper section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                <?php
                //get rows query
                $query = $db->query("SELECT * FROM news WHERE featured = '4'");
                if($query->num_rows > 0){ 
                    while($row = $query->fetch_assoc()){
                        $newsCategory = $row['newsCategoryId']; 
                        $newsCategoryquery = $db->query("SELECT name FROM news_category WHERE newsCategoryId = $newsCategory");
                        $_SESSION['newsId'] =  $row['newsId'];
                ?>
                    <!-- Gazette Welcome Post -->
                    <div class="gazette-welcome-post">
                        <!-- Post Tag -->
                        <div class="gazette-post-tag">
                        <a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>">
                        <?php
                            if($newsCategoryquery->num_rows > 0){ 
                                while($crow = $newsCategoryquery->fetch_assoc()){                       
                                    echo $crow['name'];
                            }}
                        ?></a>
                        </div>
                        <h2 class="font-pt"><?php echo $row['newsTitle']; ?></h2>
                        <p class="gazette-post-date">
                        <?php
                            $month = array("01"=>"January", "02"=>"February", "03"=>"March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "Novermber", "12" => "December");
                            $emptyArray = []; 
                            $secondArray = [];
                            $str = $row['writtenOn'];
                            $emptyArray = (explode(" ",$str));
                            $secondArray = (explode("-",$emptyArray[0]));
                            $year = $secondArray[0];
                            $date = $secondArray[2];
                            $replacements = array(0 => $month[$secondArray[1]], 1 => $date, 2 => $year);
                            $basket = array_replace($secondArray, $replacements);
                            $countdowntime = implode(" ",$basket);
                            echo $countdowntime;
                        ?>
                        </p>
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail my-5">
                            <img src="<?php echo $row['newsImage']; ?>" alt="post-thumb">
                        </div>
                        <!-- Post Excerpt -->
                        <p class="hundred-chars"><?php echo $row['newsContent']; ?></p>
                        <!-- Reading More -->
                        <div class="post-continue-reading-share d-sm-flex align-items-center justify-content-between mt-30">
                            <div class="post-continue-btn">
                                <a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>" class="font-pt">Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                            <div class="post-share-btn-group">
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <?php } }else{ ?>
                                <p>Featured News Not Updated</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="gazette-todays-post section_padding_100_50">
                        <div class="gazette-heading">
                            <h4>Today’s Most Popular</h4>
                        </div>
                        <?php
                        //get rows query
                        $query = $db->query("SELECT * FROM news WHERE featured = '5'");
                        if($query->num_rows > 0){ 
                            while($row = $query->fetch_assoc()){
                            $newsCategory = $row['newsCategoryId']; 
                            $newsCategoryquery = $db->query("SELECT name FROM news_category WHERE newsCategoryId = $newsCategory");
                            $_SESSION['newsId'] =  $row['newsId'];
                        ?>
                        <!-- Single Today Post -->
                        <div class="gazette-single-todays-post d-md-flex align-items-start mb-50">
                            <div class="todays-post-thumb">
                                <img src="<?php echo $row['newsImage']; ?>" alt="">
                            </div>
                            <div class="todays-post-content">
                                <!-- Post Tag -->
                                <div class="gazette-post-tag">
                                    <a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>">
                                    <?php
                                    if($newsCategoryquery->num_rows > 0){ 
                                        while($crow = $newsCategoryquery->fetch_assoc()){                       
                                            echo $crow['name'];
                                    }}
                                    ?>              
                                    </a>
                                </div>
                                <h3><a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>" class="font-pt mb-2"><?php echo $row['newsTitle']; ?></a></h3>
                                <span class="gazette-post-date mb-2">
                                <?php
                                  $month = array("01"=>"January", "02"=>"February", "03"=>"March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "Novermber", "12" => "December");
                                  $emptyArray = []; 
                                  $secondArray = [];
                                  $str = $row['writtenOn'];
                                  $emptyArray = (explode(" ",$str));
                                  $secondArray = (explode("-",$emptyArray[0]));
                                  $year = $secondArray[0];
                                  $date = $secondArray[2];
                                  $replacements = array(0 => $month[$secondArray[1]], 1 => $date, 2 => $year);
                                  $basket = array_replace($secondArray, $replacements);
                                  $countdowntime = implode(" ",$basket);
                                 echo $countdowntime;
                                ?>
                                </span>
                                <a href="#" class="post-total-comments">3 Comments</a>
                                <p class="hundred-chars"><?php echo $row['newsContent']; ?></p>
                            </div>
                        </div>
                        <?php } }else{ ?>
                        <p>Featured News Not Updated</p>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6">
                    <div class="sidebar-area">
                        <!-- Breaking News Widget -->
                        <div class="breaking-news-widget">
                            <div class="widget-title">
                                <h5>latest investment products</h5>
                            </div>
                            <?php
                        //get rows query
                        $query = $db->query("SELECT * FROM news WHERE featured = '8'");
                        if($query->num_rows > 0){ 
                            while($row = $query->fetch_assoc()){
                                $newsCategory = $row['newsCategoryId']; 
                                $newsCategoryquery = $db->query("SELECT name FROM news_category WHERE newsCategoryId = $newsCategory");
                        ?>
                            <!-- Single Breaking News Widget -->
                            <div class="single-breaking-news-widget">
                                <img src="<?php echo $row['newsImage'];?>" alt="">
                                <div class="breakingnews-title">
                                <p>
                                    <?php
                                    if($newsCategoryquery->num_rows > 0){ 
                                        while($crow = $newsCategoryquery->fetch_assoc()){                       
                                            echo $crow['name'];
                                    }}
                                    ?> 
                                    </p>
                                </div>
                                <div class="breaking-news-heading gradient-background-overlay">
                                <a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>" class="font-pt" style="color:white;hover:red;"><?php echo $row['newsTitle'];?></a>
                                </div>
                            </div>
                            <?php } }else{ ?>
                        <p>Featured News Not Updated</p>
                        <?php } ?>
                        </div>

                        <!-- Don't Miss Widget -->
                        <div class="donnot-miss-widget">
                            <div class="widget-title">
                                <h5>Don't miss</h5>
                            </div>
                            <!-- Single Don't Miss Post -->
                            <?php
                        //get rows query
                        $query = $db->query("SELECT * FROM news WHERE featured = '0'");
                        if($query->num_rows > 0){ 
                            while($row = $query->fetch_assoc()){
                                $newsCategory = $row['newsCategoryId']; 
                                $newsCategoryquery = $db->query("SELECT name FROM news_category WHERE newsCategoryId = $newsCategory");
                        ?>
                            <div class="single-dont-miss-post d-flex mb-30">
                                <div class="dont-miss-post-thumb">
                                    <img src="<?php echo $row['newsImage'];?>" alt="">
                                </div>
                                <div class="dont-miss-post-content">
                                    <a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>" class="font-pt"><?php echo $row['newsTitle'];?></a>
                                    <span>
                                    <?php
                                    $month = array("01"=>"January", "02"=>"February", "03"=>"March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "Novermber", "12" => "December");
                                    $emptyArray = []; 
                                    $secondArray = [];
                                    $str = $row['writtenOn'];
                                    $emptyArray = (explode(" ",$str));
                                    $secondArray = (explode("-",$emptyArray[0]));
                                    $year = $secondArray[0];
                                    $date = $secondArray[2];
                                    $replacements = array(0 => $month[$secondArray[1]], 1 => $date, 2 => $year);
                                    $basket = array_replace($secondArray, $replacements);
                                    $countdowntime = implode(" ",$basket);
                                    echo $countdowntime;
                                    ?>
                                    </span>
                                </div>
                            </div>
                            <?php } }else{ ?>
                        <p>Featured News Not Updated</p>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Area End -->

        <!-- Catagory Posts Area Start -->
        <div class="gazette-catagory-posts-area">
            <div class="container">
                <div class="row">
                <?php
                        //get rows query
                        $query = $db->query("SELECT * FROM news WHERE featured = '7'");
                        if($query->num_rows > 0){ 
                            while($row = $query->fetch_assoc()){
                            $newsCategory = $row['newsCategoryId']; 
                            $newsCategoryquery = $db->query("SELECT name FROM news_category WHERE newsCategoryId = $newsCategory");
                        ?>
                    <div class="col-12 col-md-6">
                        <!-- Single Catagory Post -->
                        <div class="gazette-single-catagory-post">
                            <div class="single-catagory-post-thumb mb-15">
                                <img src="<?php echo $row['newsImage'];?>" alt="">
                            </div>
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">
                                <a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>">
                                <?php
                                    if($newsCategoryquery->num_rows > 0){ 
                                        while($crow = $newsCategoryquery->fetch_assoc()){                       
                                            echo $crow['name'];
                                    }}
                                    ?> 
                                </a>
                            </div>
                            <?php $_SESSION['newsId'] =  $row['newsId']; ?>
                            <h5><a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>" class="font-pt"><?php echo $row['newsTitle'];?></a></h5>
                            <span>
                            <?php
                                  $month = array("01"=>"January", "02"=>"February", "03"=>"March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "Novermber", "12" => "December");
                                  $emptyArray = []; 
                                  $secondArray = [];
                                  $str = $row['writtenOn'];
                                  $emptyArray = (explode(" ",$str));
                                  $secondArray = (explode("-",$emptyArray[0]));
                                  $year = $secondArray[0];
                                  $date = $secondArray[2];
                                  $replacements = array(0 => $month[$secondArray[1]], 1 => $date, 2 => $year);
                                  $basket = array_replace($secondArray, $replacements);
                                  $countdowntime = implode(" ",$basket);
                                 echo $countdowntime;
                                ?>
                            </span>
                        </div>
                    </div>
                    <?php } }else{ ?>
                        <p>Featured News Not Updated</p>
                        <?php } ?>
                    <div class="col-12 col-md-6">
                        <div class="row">
                        <canvas id="myChart" style="width:134%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Catagory Posts Area End -->

    <!-- Video Posts Area Start -->
    <section class="gazatte-video-post-area section_padding_100_70 bg-gray">
        <div class="container">
            <div class="row">
            <?php
                //get rows query
                $query = $db->query("SELECT * FROM news_videos");
                if($query->num_rows > 0){ 
                    while($row = $query->fetch_assoc()){
                        $newsCategory = $row['newsCategoryId']; 
                        $newsCategoryquery = $db->query("SELECT name FROM news_category WHERE newsCategoryId = $newsCategory");
                ?>
                <!-- Single Video Post Start -->
                <div class="col-12 col-md-3">
                    <div class="single-video-post">
                        <div class="video-post-thumb">
                            <img src="<?php echo $row['newsImage'];?>" alt="">
                            <a href="<?php echo $row['newsVideo'];?>" class="videobtn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <h5><a href="<?php echo $row['newsVideo'];?>"><?php echo $row['videoTitle'];?></a></h5>
                    </div>
                </div>
                <?php } }else{ ?>
                <p>Featured News Not Updated</p>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Video Posts Area End -->

    <!-- Editorial Area Start -->
    <section class="gazatte-editorial-area section_padding_100 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="editorial-post-slides owl-carousel">

                        <!-- Editorial Post Single Slide -->
                        <?php
                        //get rows query
                        $query = $db->query("SELECT * FROM news WHERE featured = '6'");
                        if($query->num_rows > 0){ 
                            while($row = $query->fetch_assoc()){
                                $newsCategory = $row['newsCategoryId']; 
                                $newsCategoryquery = $db->query("SELECT name FROM news_category WHERE newsCategoryId = $newsCategory");
                        ?>
                        <div class="editorial-post-single-slide">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="editorial-post-thumb">
                                        <img src="<?php echo $row['newsImage']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="editorial-post-content">
                                        <!-- Post Tag -->
                                        <div class="gazette-post-tag">
                                            <a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>">
                                            <?php
                                            if($newsCategoryquery->num_rows > 0){ 
                                                while($crow = $newsCategoryquery->fetch_assoc()){                       
                                                    echo $crow['name'];
                                                }}
                                            ?> 
                                            </a>
                                        </div>
                                        <h2><a href="gazettepost.php?newsId=<?php echo $row['newsId']; ?>" class="font-pt mb-15"><?php echo $row['newsTitle']; ?></a></h2>
                                        <p class="editorial-post-date mb-15">
                                        <?php
                                        $month = array("01"=>"January", "02"=>"February", "03"=>"March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "Novermber", "12" => "December");
                                        $emptyArray = []; 
                                        $secondArray = [];
                                        $str = $row['writtenOn'];
                                        $emptyArray = (explode(" ",$str));
                                        $secondArray = (explode("-",$emptyArray[0]));
                                        $year = $secondArray[0];
                                        $date = $secondArray[2];
                                        $replacements = array(0 => $month[$secondArray[1]], 1 => $date, 2 => $year);
                                        $basket = array_replace($secondArray, $replacements);
                                        $countdowntime = implode(" ",$basket);
                                        echo $countdowntime;
                                        ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } }else{ ?>
                        <p>Featured News Not Updated</p>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Editorial Area End -->

    <!-- Footer Area Start -->
    <footer class="footer-area bg-img background-overlay" style="background-image: url(https://www.businessdailyafrica.com/resource/image/3248878/landscape_ratio16x9/1160/652/aab7a493e4c014fbe683cb5da8b56e9a/lt/absabank2302c.jpg);">
        <!-- Top Footer Area -->
        <div class="top-footer-area section_padding_100_70">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">Regions</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="#">U.S.</a></li>
                                <li><a href="#">Africa</a></li>
                                <li><a href="#">Americas</a></li>
                                <li><a href="#">Asia</a></li>
                                <li><a href="#">China</a></li>
                                <li><a href="#">Europe</a></li>
                                <li><a href="#">Middle</a></li>
                                <li><a href="#">East</a></li>
                                <li><a href="#">Opinion</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">Fashion</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="#">Election 2016</a></li>
                                <li><a href="#">Nation</a></li>
                                <li><a href="#">World</a></li>
                                <li><a href="#">Our Team</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">Politics</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Markets</a></li>
                                <li><a href="#">Tech</a></li>
                                <li><a href="#">Luxury</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">Featured</h4>
                            </div>
                            <ul class="footer-widget-menu">
                            <?php
                            //get rows query
                            $query = $db->query("SELECT * FROM news_category WHERE parent != '0' ORDER BY newsCategoryId DESC");
                            if($query->num_rows > 0){ 
                                while($row = $query->fetch_assoc()){
                            ?>
                            <li>
                            <a href="#"><?php echo $row['name'];?></a>
                            </li>
                            <?php } }else{ ?>
                            <p>Featured News Title Not Updated</p>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">FAQ</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="#">Aviation</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Traveller</a></li>
                                <li><a href="#">Destinations</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Food/Drink</a></li>
                                <li><a href="#">Hotels</a></li>
                                <li><a href="#">Partner Hotels</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">+More</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Architecture</a></li>
                                <li><a href="#">Arts</a></li>
                                <li><a href="#">Autos</a></li>
                                <li><a href="#">Luxury</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12">
                        <div class="copywrite-text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

    <script>
var xValues = ["Bonds", "Unit Trust", "Real Estate", "Money Market"];
var yValues = [40, 35, 15, 10];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Wealth Management Investment Portfolio In Percentage"
    }
  }
});
</script>

</body>

</html>