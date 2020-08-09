<?php
/**
 * Admin Page for Tours
 *
 * */

// require "./config/db.config.php";
require "./classes/Tour_admin.php";

if (isset($_POST['tour_add'])) {
    $name= $_POST['tour_name'];
    $location = $_POST['tour_location'];
    $group_size = $_POST['tour_gsize'];
    $package_type = $_POST['tour_package'];
    $days = $_POST['tour_days'];
    $price = $_POST['tour_price'];
    $description = $_POST['tour_desc'];
    $addTour = addTour($name, $location, $group_size, $package_type, $days, $price, $description);
    $tourId        = $addTour;
    $tourDetails   = getTour($tourId);

    /**
     * Image Uploads
     * 
     * */
    $count = count($_FILES['tour_image']['name']);

    if ($count > 0) {
        
        for ($i = 0; $i < $count; $i++) {
            $no = $i + 1;
            $file_oldName =  $_FILES['tour_image']['name'][$i];
            $file_name    = $tourDetails['name'] . "_" . $tourDetails['location'] . "_" . $addTour."-".$no;
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
                echo 'Image Size Should Be less Than 2mb.';
            }

            // $new_file_name = $name . $file_act_ext;
            $file_des = $path . '/' . $file_name;

            $move = move_uploaded_file($file_tmp, $file_des);
            if (!$move) {
                return "Sorry Failed To Upload Image!";
            } else {
                addImage($tourDetails['id'], $file_des);
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

    <title>Jofra Admin - Tours-add,list and delete</title>

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
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Jofra Admin</span></a>
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

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add Tour - Form</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
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

                                                <textarea id="tour_desc" class="form-control" rows="5" name="tour_desc" required  data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long description..." data-parsley-validation-threshold="10"></textarea>
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
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>List of Tours<small>Users</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <p class="text-muted font-13 m-b-30">
                                                    Responsive is an extension for DataTables that resolves that problem
                                                    by optimising the table's layout for different screen sizes through
                                                    the dynamic insertion and removal of columns from the table.
                                                </p>

                                                <table id="datatable-responsive"
                                                    class="table table-striped table-bordered dt-responsive nowrap"
                                                    cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Location</th>
                                                            <th>Group Size</th>
                                                            <th>Description</th>
                                                            <th>Images</th>
                                                            <th>Package Type</th>
                                                            <th>No of Days</th>
                                                            <th>Price</th>
                                                            <th>Edit Actions</th>
                                                            <th>Delete Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
<?php
$toursList= getTours();

$id = 1;
$result = $toursList;

foreach ($result as $row) 
{
    echo ' <tr id=tour_'.$row['0'].'>';
    echo '<td>' . $id . '</td>';
    echo '<td>' . $row['1'] . '</td>';
    echo '<td>' . $row['2'] . '</td>';
    echo '<td>' . $row['3'] . '</td>';
    echo '<td>' . substr($row['7'], 0, 50). '</td>';

                                                         //Display images
    $imageList = getImages($row['0']);

    $images         = $imageList;
    $imageNull      = [];
    $imagenull['0'] = "images/tours2.jpg";
    if ($images != "null") {
        foreach ($images as $imagerow) {

            echo '<td> 
            
            <div class="thumbnail">
                <div class="image view view-first">
                          <img src ="' . $imagerow['0']. '" style="width: 100%; display: block;" />
                        <div class="mask">
                              <p>'. $imagerow['0'] . '</p>
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-link"></i></a>
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                </div>
             </div>
                          <td>';
            // echo '<td>' . $imagerow['0'] . '</td>';

        }
    } else {
        echo '
        <td>
            <div class="thumbnail">
                <div class="image view view-first">
                    <img src =" '. $imagenull['0'] . ' "  style="width: 100%; display: block;"/>
                        <div class="mask">
                                <p>'. $imagenull['0'] . '</p>
                                <div class="tools tools-bottom">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                    <a href="#"><i class="fa fa-times"></i></a>
                        </div>
                </div>
            </div>
        </td>';
    }

                                                        echo '<td>' . $row['4'] . '</td>';
                                                        echo '<td>' . $row['5'] . '</td>';
                                                        echo '<td>' . $row['6'] . '</td>';
                                                        echo '<td><a class="btn btn-success" href="tour_update.php?id='. $row['0'] .'">Edit</a></td>';
                                                        echo '<td><a class="btn btn-danger" href="tour_delete.php?id='. $row['0'] .'">Delete</a></td>';
                                                        echo ' </tr>';
                                                        ++$id;
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
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