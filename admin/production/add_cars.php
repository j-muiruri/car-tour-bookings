<?php
/**
 *Create Cars
 *
 * */

// require "./config/db.config.php";
require "./classes/Car_admin.php";
$msg = false;
$msg2 = false;

if (isset($_POST['car_add'])) {
    $model        = $_POST['car_model'];
    $make         = $_POST['car_make'];
    $description  = $_POST['car_description'];
    $pricing      = $_POST['car_rent_price'];
    $seats        = $_POST['car_rent_seats'];
    $transmission = $_POST['car_transmission'];
    $addCar       = addCar($model, $make, $description, $pricing, $seats, $transmission);
    $carId        = $addCar['id'];
    $carDetails   = getCar($carId);

    if ($addCar['add'] === true) {

        // echo "Trueeeeeeeeeeeeeee";
        $error = "Car Created!";
        $msg = '<div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                            <strong>'.$error.'</strong>
                        </div>';
    } else {
        $error = $addCar['msg'];
        $msg = '<div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                            <strong>'.$error.'</strong>
                        </div>';
    }

    /**
     * Image Uploads
     *
     * */
    $count = count($_FILES['car_rent_image']['name']);

    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $no           = $i + 1;
            $file_oldName = $_FILES['car_rent_image']['name'][$i];
            $file_name    = $carDetails['make'] . "_" . $carDetails['model'] . "_" . $addCar['id'] . "-" . $no;
            $file_tmp     = $_FILES['car_rent_image']['tmp_name'][$i];
            $file_size    = $_FILES['car_rent_image']['size'][$i];
            $file_error   = $_FILES['car_rent_image']['error'][$i];
            $file_type    = $_FILES['car_rent_image']['type'][$i];
            $file_ext     = explode('.', $file_name);
            $file_act_ext = strtolower(end($file_ext));
            $jpg          = ['jpg'];
            $png          = ['png'];
            $path         = 'images';

            // if (!in_array($file_act_ext, $jpg) || !in_array($file_act_ext, $png)) {

            //     echo $file_type;
            //     echo 'Only .jpg and .png Files Are Allowed!';
            // }

            if ($file_size > 2000000) {
                echo 'Image Size Should Be less Than 2mb.';
            }

            // $new_file_name = $name . $file_act_ext;
            $file_des = $path . '/' . $file_name.$file_act_ext;

            $move = move_uploaded_file($file_tmp, $file_des);
            if (!$move) {
                $errorImage = "Sorry Failed To Upload Image!";
                $msg2 = '<div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                            <strong>'.$errorImage.'</strong>
                        </div>';
            } else {
                $pathAdd =addImage($carDetails['id'], $file_des);

                if ($pathAdd) {
                    $errorImage = "Image Uploaded!";
                    $msg2 = '<div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                            <strong>'.$errorImage.'</strong>
                        </div>';
                }
                else {
                    $errorImage = "Sorry Failed To Upload Image!".$pathAdd['msg'];
                    $msg2 = '<div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                            <strong>'.$errorImage.'</strong>
                        </div>';
                }
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jofra Admin - Add New Car</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="dashboard_main.php" class="site_title"><i class="fa fa-paw"></i> <span>Jofra
                                Dashboard</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <?php
require "menu_profile.php";
?>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <?php
require "sidebar_menu.php";
?>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <?php
require "menu_footer.php";
?>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <?php
require "top_nav.php";
?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Car Bookings</h3>
                        </div>


                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add Car - Form</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <?php echo $msg;
                                    echo $msg2; ?>
                                    <form id="demo-form2" enctype="multipart/form-data" method="POST"
                                        data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="car_make">Make<span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-12 ">
                                                <input type="text" id="car_make" name="car_make" required="required"
                                                    class="form-control ">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="car_model">Model <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-12 ">
                                                <input type="text" id="car_model" name="car_model" required="required"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="car_description"
                                                class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                                            <div class="col-md-4 col-sm-12 ">
                                                <input id="car_description" class="form-control" type="text"
                                                    name="car_description" required>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label
                                                class="col-form-label col-md-3 col-sm-3 label-align">Transmission(Auto/Manual)</label>
                                            <div class="col-md-4 col-sm-12 ">
                                                <div id="car_transmission" class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-danger" data-toggle-class="btn-primary"
                                                        data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="car_transmission" value="manual"
                                                            class="join-btn" required> &nbsp; Manual &nbsp;
                                                    </label>
                                                    <label class="btn btn-primary" data-toggle-class="btn-primary"
                                                        data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="car_transmission" value="auto"
                                                            class="join-btn" required> Auto
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="car_rent_price"
                                                class="col-form-label col-md-3 col-sm-3 label-align">Booking Price (Ksh.
                                                )</label>
                                            <div class="col-md-4 col-sm-12 ">

                                                <input id="car_rent_price" class="form-control" type="number"
                                                    name="car_rent_price" required>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="car_rent_seats"
                                                class="col-form-label col-md-3 col-sm-3 label-align">No of Seats</label>
                                            <div class="col-md-4 col-sm-12 ">

                                                <input id="car_rent_seats" class="form-control" type="number"
                                                    name="car_rent_seats" required>
                                                <input id="car_add" class="form-control" type="hidden" name="car_add"
                                                    value="1">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="car_rent_image"
                                                class="col-form-label col-md-3 col-sm-3 label-align">Car Images</label>
                                            <div class="col-md-4 col-sm-12">
                                                <input id="car_rent_image[]" class="form-control" type="file" style=""
                                                    accept=".jpg, .png" name="car_rent_image[]" multiple>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-4 col-sm-12 offset-md-3">
                                                <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                                                <button class="btn btn-primary" type="reset">Reset</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- /page content -->

                        <!-- footer content -->
                        <?php
require "./footer.php"
?>

                        <!-- /footer content -->
                    </div>
                </div>

                <!-- jQuery -->
                <script src="../vendors/jquery/dist/jquery.min.js"></script>
                <!-- Bootstrap -->
                <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                <!-- FastClick -->
                <script src="../vendors/fastclick/lib/fastclick.js"></script>
                <!-- NProgress -->
                <script src="../vendors/nprogress/nprogress.js"></script>

                <!-- Custom Theme Scripts -->
                <script src="../build/js/custom.min.js"></script>
</body>

</html>