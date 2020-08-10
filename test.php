<?php

include "./config/db.config.php";

$conn = dbConn();
    $sql ="SELECT name FROM car_images WHERE image_id = 47 ORDER BY id ASC ";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        // echo "Images Obtained";
        $result = $data->fetch_all();
        $_COOKIE['total_images'] = $data->num_rows;
        var_dump($result);
    } 

    echo $_COOKIE['total_images'];