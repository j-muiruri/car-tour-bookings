<?php
/**
 * Create Tours
 *
 * */

// require "./config/db.config.php";
require "./classes/Tour_admin.php";
$msg = false;
$msg2 = false;

if (isset($_POST['tour_add'])) {
    $name= $_POST['tour_name'];
    $location = $_POST['tour_location'];
    $group_size = $_POST['tour_gsize'];
    $package_type = $_POST['tour_package'];
    $days = $_POST['tour_days'];
    $price = $_POST['tour_price'];
    $description = $_POST['tour_desc'];
    $addTour = addTour($name, $location, $group_size, $package_type, $days, $price, $description);
    $tourId        = $addTour['id'];
    $tourDetails   = getTour($tourId);

    if ($addTour['add'] === true) {

        // echo "Trueeeeeeeeeeeeeee";
        $error = "Tour Created!";
        $msg = '<div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                            <strong>'.$error.'</strong>
                        </div>';
    } else {
        $error = $addTour['msg'];
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
    $count = count($_FILES['tour_image']['name']);

    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $no = $i + 1;
            $file_oldName =  $_FILES['tour_image']['name'][$i];
            $file_name    = $tourDetails['name'] . "_" . $tourDetails['location'] . "_" . $addTour['id']."-".$no;
            $file_tmp     = $_FILES['tour_image']['tmp_name'][$i];
            $file_size    = $_FILES['tour_image']['size'][$i];
            $file_error   = $_FILES['tour_image']['error'][$i];
            $file_type    = $_FILES['tour_image']['type'][$i];
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
                $errorImage =  'Image Size Should Be less Than 2mb.';
                $msg2 = '<div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                            <strong>'.$errorImage.'</strong>
                        </div>';
            }

            // $new_file_name = $name . $file_act_ext;
            $file_des = $path . '/' . $file_name;

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
                $pathAdd =addImage($tourDetails['id'], $file_des);
                if ($pathAdd) {
                    $errorImage = "Image Uploaded!";
                    $msg2 = '<div class="alert center alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                            <strong class=" text-center">'.$errorImage.'</strong>
                        </div>';
                }
                else {
                    $errorImage = "Sorry Failed To Upload Image!".$pathAdd['msg'];
                    $msg2 = '<div class="alert  center alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                            <strong class=" text-center">'.$errorImage.'</strong>
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

    <title>Jofra Admin - Add New Tour</title>

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
                        <a href="dashboard_main.php" class="site_title"><i class="fa fa-paw"></i> <span>Jofra Dashboard</span></a>
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
                            <h3>Tour Bookings</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add Tour - Form</h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <?php echo $msg;
                                    echo $msg2; ?>
                                    <form id="demo-form2" enctype="multipart/form-data" method="POST" data-parsley-validate
                                        class="form-horizontal form-label-left">

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="tour_name">Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-12 ">
                                                <input type="text" id="tour_name" name="tour_name" required="required"
                                                    class="form-control ">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="tour_location">Location <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-12 ">
                                                <input type="text" id="tour_location" name="tour_location" required="required"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="tour_gsize"
                                                class="col-form-label col-md-3 col-sm-3 label-align">Group Size</label>
                                            <div class="col-md-4 col-sm-12 ">
                                                <input id="tour_gsize" class="form-control" type="number"
                                                    name="tour_gsize" required>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label
                                                class="col-form-label col-md-3 col-sm-3 label-align">Package type(Bed & Breakfast,Half,Full Board,All Inclusive)</label>
                                            <div class="col-md-4 col-sm-12 ">
                                                <div id="tour_package" class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-danger" data-toggle-class="btn-primary"
                                                        data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="tour_package" value="bed and breakfast"
                                                            class="join-btn" required> &nbsp; Bed & Breakfast &nbsp;
                                                    </label>
                                                    <label class="btn btn-secondary" data-toggle-class="btn-primary"
                                                        data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="tour_package" value="half board"
                                                            class="join-btn" required> Half Board
                                                    </label>
                                                    <label class="btn btn-info" data-toggle-class="btn-primary"
                                                        data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="tour_package" value="full board"
                                                            class="join-btn" required> &nbsp; Full Board &nbsp;
                                                    </label>
                                                    <label class="btn btn-warning" data-toggle-class="btn-primary"
                                                        data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="tour_package" value="all inclusive"
                                                            class="join-btn" required> &nbsp; All Inclusive &nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="tour_desc" class="col-form-label col-md-3 col-sm-3 label-align">Tour Description</label>
                                            <div class="col-md-4 col-sm-12 ">

                                                <textarea id="tour_desc" class="form-control" rows="5" name="tour_desc" required  data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 characters long description..." data-parsley-validation-threshold="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="tour_price"
                                                class="col-form-label col-md-3 col-sm-3 label-align">Booking Price (Ksh.
                                                )</label>
                                            <div class="col-md-4 col-sm-12 ">

                                                <input id="tour_price" class="form-control" type="number"
                                                    name="tour_price" required>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="tour_days"
                                                class="col-form-label col-md-3 col-sm-3 label-align">No of Days</label>
                                            <div class="col-md-4 col-sm-12 ">

                                                <input id="tour_days" class="form-control" type="number"
                                                    name="tour_days" required>
                                                <input id="tour_add" class="form-control" type="hidden" name="tour_add"
                                                    value="1">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                                <label for="tour_image"
                                                    class="col-form-label col-md-3 col-sm-3 label-align">Tour Images</label>
                                                <div class="col-md-4 col-sm-12">
                                                    <input id="tour_image[]" class="form-control" type="file" style=""
                                                        accept=".jpg, .png" name="tour_image[]" multiple>
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