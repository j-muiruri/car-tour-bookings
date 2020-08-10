<?php
/**
 * Single Car Details
 *
 * */
require "classes/Car_client.php";
$id = $_GET['id'];
$carData = getCar($id);

if ($carData['id'] === "null") {
    $resource = "CAR";
    // Car not found
    header("Location: 404.php?resource=".$resource);
}
else {
    $carDetails = getCar($id);
    $rtitle = "Car Details";
    $itemName = $carDetails['make']. " - ".$carDetails['model'];
}

?>
    <!--== Preloader and Header Area Start ==-->
<?php include 'templates/car-details/header.php'; ?>
    <!--== Preloader, Header Area End ==-->

    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2><?php  echo $carDetails['make']. " - ".$carDetails['model'];?></h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p></p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-8">
                    <div class="car-details-content">
                        <h2><?php  echo $carDetails['make']. " - ".$carDetails['model'];?>
                        <span class="price">Rent: 
                        <b>Ksh. <?php  echo $carDetails['price'];?></b></span></h2>
                       
                        <?php
                                //Display images
                                $imageList = getAllImages($id);

                                $images = $imageList;
                                $imagenull = array(
                                    "name"=>"assets/img/car/car-6.jpg",
                                    "name"=>"images/toyota-v8.jpg",
                                    "name"=>"assets/img/car/car-1.jpg",
                                   "name"=>"assets/img/car/car-6.jpg"
                                 ) ;
                                if ($images != "null") {

                                    //Less than 2 images
                                    if ($_COOKIE['total_images']> 2) {
                                        echo '
                                            <div class="car-preview-crousel">';


                                        // tour images carousel
                                        foreach ($images as $imagerow) {
                                            echo '
                                        <div class="single-car-preview">
                                            <img src="admin/production/'.$imagerow['0'].' " alt="JSOFT">
                                        </div>
                                        ';
                                        }
                                        echo '</div>';
                                    }
                                    else {
                                        // single image
                                        foreach ($images as $imagerow1) {
                                            echo '
                                                <div class="single-car-preview">
                                            <img src="admin/production/'.$imagerow1['0'].' " alt="JSOFT">
                                        </div>'
                                        ;
                                        }
                                    }
                                } else {
                                    foreach ($imagenull as $imagerow) {
                                        //default images
                                        echo '<div class="single-car-preview">
                                            <img src="admin/production/'.$imagenull['0'].' " alt="JSOFT">
                                        </div>';
                                    }
                                }
                                    ?>
                     
                        <div class="car-details-info">
                            <h4>Additional Info</h4>
                            <p><?php  echo $carDetails['description'];?></p>

                            <div class="technical-info">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tech-info-table">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Class</th>
                                                    <td>Compact</td>
                                                </tr>
                                                <tr>
                                                    <th>Fuel</th>
                                                    <td>Petrol</td>
                                                </tr>
                                                <tr>
                                                    <th>Seats</th>
                                                    <td><?php  echo $carDetails['seats'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>GearBox</th>
                                                    <td><?php  echo $carDetails['transmision'];?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="tech-info-list">
                                            <ul>
                                                <li>ABS</li>
                                                <li>Air Bags</li>
                                                <li>Bluetooth</li>
                                                <li>Car Kit</li>
                                                <li>GPS</li>
                                                <li>Music</li>
                                                <li>Bluetooth</li>
                                                <li>ABS</li>
                                                <li>GPS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Review  Area  start-->
                            </div>
                    </div>
                </div>
                <!-- Car List Content End -->

                <!-- Sidebar Area Start -->
                <?php include 'templates/car-details/sidebar.php'; ?>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->

    <!--== Footer Area Start ==-->
    <?php include 'templates/car-details/footer.php'; ?>
    <!--== Footer Area End ==-->

    <!--Scripts here -->

</body>

</html>