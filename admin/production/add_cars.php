<?php
/**
 * Admin Page for Cars
 *
 * */

// require "./config/db.config.php";
require "./classes/Car_admin.php";

if (isset($_POST['car_add'])) {
    $model = $_POST['car_model'];
    $make = $_POST['car_make'];
    $description = $_POST['car_description'];
    $pricing = $_POST['car_rent_price'];
    $seats = $_POST['car_rent_seats'];
    $transmission = $_POST['car_transmission'];
    $addCar = addCar($model, $make, $description, $pricing, $seats, $transmission);
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

    <title>Jofra Admin - Cars-add,list and delete</title>

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
                            <h3>Cars</h3>
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
                                    <h2>Add Car - Form</h2>
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
                                            <label for="description"
                                                class="col-form-label col-md-3 col-sm-3 label-align">No of Seats</label>
                                            <div class="col-md-4 col-sm-12 ">

                                                <input id="car_rent_seats" class="form-control" type="number"
                                                    name="car_rent_seats" required>
                                                <input id="car_add" class="form-control" type="hidden" name="car_add"
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
                                    <h2>List of Cars<small>Users</small></h2>
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
                                                            <th>Make</th>
                                                            <th>Model</th>
                                                            <th>Description</th>
                                                            <th>Transmission</th>
                                                            <th>No of Seats</th>
                                                            <th>Price per day</th>
                                                            <th>Edit Actions</th>
                                                            <th>Delete Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $carsList = getCars();
                                                    // var_dump($carsList);
                                                    $id = 1;
                                                    $result = $carsList;
                                                   
                                                    foreach ($result as $row) 
                                                    {
                                                        echo ' <tr id =car_'.$row['0'].'>';
                                                        echo '<td>' . $id . '</td>';
                                                        echo '<td>' . $row['1'] . '</td>';
                                                        echo '<td>' . $row['2'] . '</td>';
                                                        echo '<td>' . $row['3'] . '</td>';
                                                        echo '<td>' . $row['4'] . '</td>';
                                                        echo '<td>' . $row['5'] . '</td>';
                                                        echo '<td>' . $row['6'] . '</td>';
                                                        echo '<td><a class="btn btn-success" href="car_update.php?id='. $row['0'] .'">Edit</a></td>';
                                                        echo '<td><a class="btn btn-danger" href="car_delete.php?id='. $row['0'] .'">Delete</a></td>';
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