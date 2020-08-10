<?php
/**
 * Delete pg
 */

require "./classes/Tour_admin.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    removeTour($id);

    header("Location: tours_list.php");
}
// $id ="32";

// removeTour($id);
?>