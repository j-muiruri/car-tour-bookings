<?php

/**
* Jofra Home
* 
*/

 require 'classes/Car_client.php';
 require 'classes/Tour_client.php';
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>JOFRA SAFARIS</title>


    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Vegas Min CSS ===-->
    <link href="assets/css/plugins/vegas.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="assets/css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <!-- <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div> -->
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <?php
    include 'header.php';
    ?>
    <!--== Header Area End ==-->
    <!--== SlideshowBg Area Start ==-->
    <section id="slideslow-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="slideshowcontent">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <h1>TOURS, TRAVEL & CAR HIRE!</h1>
                                <p>FOR AS LOW AS KES 2,000 A DAY PLUS 15% DISCOUNT <br> FOR OUR RETURNING CUSTOMERS</p>
                                <!--
                                <div class="book-ur-car">
                                    <form action="index2.html">
                                        <div class="pick-location bookinput-item">
                                            <select class="custom-select">
                                              <option selected>Pick Location</option>
                                              <option value="1">Dhaka</option>
                                              <option value="2">Comilla</option>
                                              <option value="3">Barishal</option>
                                              <option value="3">Rangpur</option>
                                            </select>
                                        </div>

                                        <div class="pick-date bookinput-item">
                                            <input id="startDate2" placeholder="Pick Date" />
                                        </div>

                                        <div class="retern-date bookinput-item">
                                            <input id="endDate2" placeholder="Return Date" />
                                        </div>

                                        <div class="car-choose bookinput-item">
                                            <select class="custom-select">
                                              <option selected>Choose Car</option>
                                              <option value="1">BMW</option>
                                              <option value="2">Audi</option>
                                              <option value="3">Lexus</option>
                                            </select>
                                        </div>

                                        <div class="bookcar-btn bookinput-item">
                                            <button type="submit">Book Car</button>
                                        </div>
                                    </form>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== SlideshowBg Area End ==-->

    <!--== About Us Area Start ==-->
    <section id="about-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>About us</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Better Prices Exceptional People..</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <!-- About Content Start -->

                <!-- About Video Start -->
                <div class="col-lg-6">
                    <div class="about-video">
                        <iframe src="https://www.youtube.com/embed/gTEXJsw62iU?title=0&byline=0&portrait=0"></iframe>

                    </div>
                </div>
                <!-- About Video End -->

                <div class="col-lg-6">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="about-content">
                                <p>Whether it is corporate car hire, executive car hire, tours and travelm, organised
                                    trips, tires repair & tire sell, or
                                    executive car wash you want, try us - we've got it. We love adventure travel and
                                    always have. There’s something about the feeling of packaging a trip and making it
                                    successful.</p>

                                <p>Our trips include safaris and tours that take in awe-inspiring scenery and
                                    breathtaking wildlife encounters. We have adventure holidays designed specifically
                                    for families,
                                    mixed-activity holidays and seasonal getaways, perfect for all groups of people.
                                    There are unforgettable experiences in top destinations all over. From your own
                                    African odyssey,
                                    to a journey of discovery in expeditions, with Jofra these are just some of the
                                    memories waiting to be made.</p>
                                <div class="about-btn" class="row">
                                    <a href="contact.php">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Content End -->

            </div>
        </div>
    </section>
    <!--== About Us Area End ==-->

    <!--== Partner Area Start ==-->
    <div id="partner-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="partner-content-wrap">
                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/lekato-safaris-logo.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->
                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/logo.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->

                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/lekato-safaris-logo.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->

                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/logo.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->

                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/lekato-safaris-logo.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->
                        <!-- Single Partner Start -->
                        <div class="single-partner">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <img src="assets/img/partner/logo.png" alt="JSOFT">
                                </div>
                            </div>
                        </div>
                        <!-- Single Partner End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Partner Area End ==-->

    <!--== Services Area Start ==-->
    <section id="service-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Our Services</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Variety of cars to hire.</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>


            <!-- Service Content Start -->
            <div class="row">
                <!-- Single Service Start -->
                <div class="col-lg-4 text-center">
                    <div class="service-item">
                        <i class="fa fa-taxi"></i>
                        <h3>RENTAL CAR</h3>
                        <p>A variety of corporate and executive car to rent.</p>
                    </div>
                </div>
                <!-- Single Service End -->

                <!-- Single Service Start -->
                <div class="col-lg-4 text-center">
                    <div class="service-item">
                        <i class="fa fa-cog"></i>
                        <h3>TIRES REPAIR & SELLS</h3>
                        <p>A variety of tire brands available with an able team.</p>
                    </div>
                </div>
                <!-- Single Service End -->

                <!-- Single Service Start -->
                <div class="col-lg-4 text-center">
                    <div class="service-item">
                        <i class="fa fa-map-marker"></i>
                        <h3>TOURS & TRAVEL</h3>
                        <p>Join us for a lifetime experence with memories.</p>
                    </div>
                </div>
                <!-- Single Service End -->


                <!-- Single Service Start -->
                <div class="col-lg-4 text-center">
                    <div class="service-item">
                        <i class="fa fa-bath"></i>
                        <h3>car wash</h3>
                        <p>Dedicated in makinng your car clean & better.</p>
                    </div>
                </div>
                <!-- Single Service End -->





            </div>
            <!-- Service Content End -->
        </div>
    </section>
    <!--== Services Area End ==-->

    <!--== Fun Fact Area Start ==-->
    <section id="funfact-area" class="overlay section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 col-md-12 m-auto">
                    <div class="funfact-content-wrap">
                        <div class="row">
                            <!-- Single FunFact Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-smile-o"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <p><span class="counter">550</span>+</p>
                                        <h4>HAPPY CLIENTS</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FunFact End -->

                            <!-- Single FunFact Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-car"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <p><span class="counter">250</span>+</p>
                                        <h4>CARS FOR HIRE</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FunFact End -->

                            <!-- Single FunFact Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-bank"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <p><span class="counter">50</span>+</p>
                                        <h4>DESTINATIONS</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FunFact End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Fun Fact Area End ==-->

    <!--== Choose Car Area Start ==-->
    <section id="choose-car" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Choose your Car</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Make a booking tday and enjoy 15% discount</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <!-- Choose Area Content Start -->
                <div class="col-lg-12">
                    <div class="choose-content-wrap">
                        <!-- Choose Area Tab Menu -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#popular_cars" role="tab" aria-selected="true">popular Cars</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#newest_cars" role="tab" aria-selected="false">newest cars</a>
                            </li>
                        </ul>
                        <!-- Choose Area Tab Menu -->

                        <!-- Choose Area Tab content -->
                        <div class="tab-content" id="myTabContent">
                            <!-- Popular Cars Tab Start -->
                            <div class="tab-pane fade show active" id="popular_cars" role="tabpanel" aria-labelledby="home-tab">
                                <!-- Popular Cars Content Wrapper Start -->
                                <div class="popular-cars-wrap">
                                    <!-- Filtering Menu -->
                                    <div class="popucar-menu text-center">
                                        <a href="#" data-filter="*" class="active">all</a>
                                        <a href="#" data-filter=".saloon">Saloon</a>
                                        <a href="#" data-filter=".bus">Buses</a>
                                        <a href="#" data-filter=".suv">SUV</a>
                                    </div>

                                    <!-- Filtering Menu -->

                                    <!-- PopularCars Tab Content Start -->
                                    <div class="row popular-car-gird">
                                        <!-- Single Popular Car Start -->
                                        <?php
                                        $carsList = getCars();
                                        // var_dump($carsList);
                                        $id = 1;
                                        // $result = $carsList;

                                        foreach ($carsList as $row) :
                                        ?>
                                            <div class="col-lg-4 col-md-6 suv bus saloon">
                                                <div class="single-popular-car">

                                                <?php
                                //Display images
                                $imageList = getImages($row['0']);

                                $images = $imageList;
                                $imageNull = [];
                                $imagenull['0'] = "images/toyota-v8.jpg";
                                if ($images != "null") {
                                    foreach ($images as $imagerow):
                                        echo '

                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="#">

                                                        <img src="admin/production/'.$imagerow['0'].' " alt="JSOFT">
                                                    </a>
                                                </div>';
                                    endforeach;
                                } else {
                                    echo '

                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="#">

                                                        <img src="admin/production/'.$imagenull['0'].' " alt="JSOFT">
                                                    </a>
                                                </div>';
                                }
                                    ?>


                                                    <div class="p-car-content">
                                                        <h3>
                                                            <a href="#"><?php echo $row['1'] . " - " . $row['2']; ?></a>
                                                            <span class="price"><i class="fa fa-tag"></i><?php echo $row['5']; ?></span>
                                                        </h3>

                                                        <h5>HATCHBACK</h5>

                                                        <div class="p-car-feature">
                                                            <a href="#">2017</a>
                                                            <a href="#"><?php echo $row['4']; ?></a>
                                                            <a href="#">AIR CONDITION</a>
                                                            <br>
                                                         </div>
                                                        
                                                            <a class='rent-btn' href="car-details.php?id=<?php echo $row['0']; ?>">View this Car</a>
                                                            <?php
                                                    $make = $row['1'];
                                                    $model =  $row['2']; 
                                                    echo "<a href='book.php?make=$make&model=$model' class='rent-btn'>Book</a>";
                                                    ?> 
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Popular Car End -->
                                        <?php
                                        endforeach;
                                        ?>
                                        <!-- Single Popular Car End -->
                                        <h4><a class='rent-btn' href="our-cars.php">View More Cars</a></h4>
                                       
                                    </div>
                                    <!-- PopularCars Tab Content End -->
                                </div>
                                <!-- Popular Cars Content Wrapper End -->
                            </div>
                            <!-- Popular Cars Tab End -->
                        </div>
                        <!-- Choose Area Tab content -->
                    </div>
                </div>
                <!-- Choose Area Content End -->
            </div>
        </div>
    </section>
    <!--== Choose Car Area End ==-->



    <!--== Tours Area Start ==-->
    <section id="choose-car" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Tours and Excursions</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <!-- Choose Area Content Start -->
                <div class="col-lg-12">
                    <div class="choose-content-wrap">
                        <!-- Choose Area Tab Menu -->

                        <!-- Choose Area Tab Menu -->

                        <!-- Choose Area Tab content -->
                        <div class="tab-content" id="myTabContent">
                            <!-- Popular Cars Tab Start -->
                            <div class="tab-pane fade show active" id="popular_cars" role="tabpanel" aria-labelledby="home-tab">
                                <!-- Popular Cars Content Wrapper Start -->
                                <div class="popular-cars-wrap">
                                    <!-- Filtering Menu -->
                                    <div class="popucar-menu text-center">
                                        <a href="#" data-filter="*" class="active">all</a>
                                        <a href="#" data-filter=".con">Local Tours</a>
                                        <a href="#" data-filter=".hat">International Tours</a>
                                        <a href="#" data-filter=".mpv">Excursions</a>

                                    </div>

                                    <!-- Filtering Menu -->

                                    <!-- PopularCars Tab Content Start -->
                                    <div class="row popular-car-gird">
                                        <!-- Single Popular Car Start -->
                                        <?php
                                        /**
                                         * List Tours
                                         */
                                        $toursList = getTours();
                                        // var_dump($toursList);
                                        $id = 1;
                                        // $result = $toursList;

                                        foreach ($toursList as $row) :
                                        ?>
                                        <div class="col-lg-4 col-md-6 con suv mpv">
                                            <div class="single-popular-car">
                                                
                                            <?php
                                //Display images
                                $imageList = getTourImages($row['0']);

                                $images = $imageList;
                                $imageNull = [];
                                $imagenull['0'] = "images/tours2.jpg";
                                if ($images != "null") {
                                    foreach ($images as $imagerow):
                                        echo '

                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="#">

                                                        <img src="admin/production/'.$imagerow['0'].' " alt="JSOFT">
                                                    </a>
                                                </div>';
                                    endforeach;
                                } else {
                                    echo '

                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="#">

                                                        <img src="admin/production/'.$imagenull['0'].' " alt="JSOFT">
                                                    </a>
                                                </div>';
                                }
                                    ?>

                                                <div class="p-car-content">
                                                    <h3>
                                                        <a href="#"><?php echo $row['1']; ?></a>
                                                        <span class="price"><i class="fa fa-tag"></i>KES <?php echo $row['6']."/".$row['5']; ?> days</span>
                                                    </h3>

                                                    <h5>Tour</h5>

                                                    <div class="p-car-feature">
                                                        <a href="#"><?php echo $row['2']; ?></a>
                                                        <a href="#"><?php echo $row['4']; ?></a>
                                                        <a href="#">Group size: <?php echo $row['3']; ?></a>
                                                        <br>
                                                        
                                                    </div>
                                                    <a class='rent-btn' href="tour-details.php?id=<?php echo $row['0']; ?>">View this Tour</a>
                                                   
                                                   <a href="book.php?tour=<?php echo $row['1']; ?>" class='rent-btn'>Book</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Popular Car End -->

                                        <?php
                                        endforeach;
                                        ?>


<h4><a class='rent-btn' href="our-tours.php">View More Tours</a></h4>
                                    </div>
                                    <!-- PopularCars Tab Content End -->
                                </div>
                                <!-- Popular Cars Content Wrapper End -->
                            </div>
                            <!-- Popular Cars Tab End -->

                            <!-- Newest Cars Tab Start -->
                            <div class="tab-pane fade" id="newest_cars" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- Newest Cars Content Wrapper Start -->
                                <div class="popular-cars-wrap">
                                    <!-- Filtering Menu -->
                                    <div class="newcar-menu text-center">
                                        <a href="#" data-filter="*" class="active">all</a>
                                        <a href="#" data-filter=".toyota">toyota</a>
                                        <a href="#" data-filter=".bmw">bmw</a>
                                        <a href="#" data-filter=".audi">audi</a>
                                        <a href="#" data-filter=".tata">Tata</a>
                                    </div>

                                    <!-- Filtering Menu -->

                                    <!-- NewestCars Tab Content Start -->
                                    <div class="row newest-car-gird">
                                        <!-- Single Newest Car Start -->
                                        <div class="col-lg-4 col-md-6 tata audi">

                                            <div class="single-popular-car">
                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="assets/img/car/toyota-v8.jpg">
                                                        <img src="assets/img/car/toyota-v8.jpg" alt="JSOFT">
                                                    </a>
                                                </div>

                                                <div class="p-car-content">
                                                    <h3>
                                                        <a href="#">Toyota V8 2019</a>
                                                        <span class="price"><i class="fa fa-tag"></i>KES
                                                            10,000/day</span>
                                                    </h3>

                                                    <h5>HATCHBACK</h5>

                                                    <div class="p-car-feature">
                                                        <a href="#">2017</a>
                                                        <a href="#">manual</a>
                                                        <a href="#">AIR CONDITION</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Newest Car End -->

                                        <!-- Single Newest Car Start -->
                                        <div class="col-lg-4 col-md-6 bmw tata toyota">
                                            <div class="single-popular-car">
                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="assets/img/car/toyota-v8.jpg">
                                                        <img src="assets/img/car/toyota-v8.jpg" alt="JSOFT">
                                                    </a>
                                                </div>

                                                <div class="p-car-content">
                                                    <h3>
                                                        <a href="#">Toyota V8 2019</a>
                                                        <span class="price"><i class="fa fa-tag"></i>KES
                                                            10,000/day</span>
                                                    </h3>

                                                    <h5>HATCHBACK</h5>

                                                    <div class="p-car-feature">
                                                        <a href="#">2017</a>
                                                        <a href="#">manual</a>
                                                        <a href="#">AIR CONDITION</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Newest Car End -->

                                        <!-- Single Newest Car Start -->
                                        <div class="col-lg-4 col-md-6 bmw">
                                            <div class="single-popular-car">
                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="assets/img/car/toyota-v8.jpg">
                                                        <img src="assets/img/car/toyota-v8.jpg" alt="JSOFT">
                                                    </a>
                                                </div>

                                                <div class="p-car-content">
                                                    <h3>
                                                        <a href="#">Toyota V8 2019</a>
                                                        <span class="price"><i class="fa fa-tag"></i>KES
                                                            10,000/day</span>
                                                    </h3>

                                                    <h5>HATCHBACK</h5>

                                                    <div class="p-car-feature">
                                                        <a href="#">2017</a>
                                                        <a href="#">manual</a>
                                                        <a href="#">AIR CONDITION</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Newest Car End -->
                                    </div>
                                    <!-- NewestCars Tab Content End -->
                                </div>
                                <!-- Newest Cars Content Wrapper End -->
                            </div>
                            <!-- Newest Cars Tab End -->

                            <!-- Office Map Tab -->
                            <div class="tab-pane fade" id="office_map" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="map-area">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.6538067244583!2d90.37092511435942!3d23.79533919297639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0cce3251ab1%3A0x7a2aa979862a9643!2sJSoft!5e0!3m2!1sen!2sbd!4v1516771096779"></iframe>
                                </div>
                            </div>
                            <!-- Office Map Tab -->
                        </div>
                        <!-- Choose Area Tab content -->
                    </div>
                </div>
                <!-- Choose Area Content End -->
            </div>
        </div>
    </section>
    <!--== Tours Area End ==-->


    <!--== Testimonials Area Start ==-->
    <section id="testimonial-area" style="background-color: #eaeaea;" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Testimonials</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Our happy clients</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12 m-auto">
                    <div class="testimonial-content">
                        <!--== Single Testimoial Start ==-->
                        <div class="single-testimonial">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis totam obcaecati impedit,
                                at autem repellat vel magni architecto veritatis sed.</p>
                            <h3>Vongchong Smith</h3>
                            <div class="client-logo">
                                <img src="assets/img/client/client-pic-1.jpg" alt="JSOFT">
                            </div>
                        </div>
                        <!--== Single Testimoial End ==-->

                        <!--== Single Testimoial Start ==-->
                        <div class="single-testimonial">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis totam obcaecati impedit,
                                at autem repellat vel magni architecto veritatis sed.</p>
                            <h3>Christine Benson</h3>
                            <div class="client-logo">
                                <img src="assets/img/client/client-pic-3.jpg" alt="JSOFT">
                            </div>
                        </div>
                        <!--== Single Testimoial End ==-->

                        <!--== Single Testimoial Start ==-->
                        <div class="single-testimonial">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis totam obcaecati impedit,
                                at autem repellat vel magni architecto veritatis sed.</p>
                            <h3>Eliud Mwangi</h3>
                            <div class="client-logo">
                                <img src="assets/img/client/client-pic-2.jpg" alt="JSOFT">
                            </div>
                        </div>
                        <!--== Single Testimoial End ==-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Testimonials Area End ==-->

    <!--== Footer Area Start ==-->
    <?php
    include 'footer.php';
    ?>
    <!--== Footer Area End ==-->

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="assets/img/scroll-top.png" alt="JSOFT">
    </div>
    <!--== Scroll Top Area End ==-->

    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="assets/js/jquery-migrate.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="assets/js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="assets/js/plugins/gijgo.js"></script>
    <!--=== Vegas Min Js ===-->
    <script src="assets/js/plugins/vegas.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="assets/js/plugins/isotope.min.js"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="assets/js/plugins/slicknav.min.js"></script>

    <!--=== Mian Js ===-->
    <script src="assets/js/main.js"></script>

</body>

</html>