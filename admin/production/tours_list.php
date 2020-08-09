<?php
/**
 * Admin Page Tour List
 *
 * */

// require "./config/db.config.php";
require "./classes/Tour_admin.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jofra Admin - Tour List</title>

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
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>List of Tours<small></small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <p class="text-muted font-13 m-b-30">
                                                    
                                                </p>

                                                <table id="tours_list"
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
                <!-- Datatables -->
                <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
                <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
                <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
                <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
                <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
                <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
                <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
                <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
                <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
                <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
                <script src="../vendors/jszip/dist/jszip.min.js"></script>
                <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
                <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

                

                <!-- Custom Theme Scripts -->
                <script src="../build/js/custom.min.js"></script>
                <script>
                $(document).ready(function() {
                    $('#tours_list').DataTable();
                });
                </script>
</body>

</html>