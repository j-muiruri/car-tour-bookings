<?php
/**
 * Delete pg
 */

require "./classes/Car_admin.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    removeCar($id);
    header("Location: cars_list.php#datatable-responsive");
}

?>
