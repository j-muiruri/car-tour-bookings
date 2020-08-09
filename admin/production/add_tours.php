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
    $addTour = addTour($name, $location, $group_size, $package_type, $days, $price);
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
<!--
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>-->
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
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" method="POST" data-parsley-validate
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
#
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
                                                    // var_dump($toursList);
                                                    $id = 1;
                                                    $result = $toursList;
                                                   
                                                    foreach ($result as $row) 
                                                    {
                                                        echo ' <tr id=tour_'.$row['0'].'>';
                                                        echo '<td>' . $id . '</td>';
                                                        echo '<td>' . $row['1'] . '</td>';
                                                        echo '<td>' . $row['2'] . '</td>';
                                                        echo '<td>' . $row['3'] . '</td>';
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