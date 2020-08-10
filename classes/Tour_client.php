<?php

/**
 * Tour  Client Operations
 * 
 * */
//  require  "config/db.config.php";
/**
 * List Tours
 * @return $result
 * */
function getTours()
{
    $conn = dbConn();
    $sql = "SELECT `id`, `name`, `location`, `group_size`, `package_type`, `days`, `price`, `description` FROM tours ORDER BY `id` DESC LIMIT 6";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        // echo "Record Obtained";
        $result = $data->fetch_all();
        
            return $result;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}
/**
 * List Single Tour
 * @return $result
 * */
function getTour($id)
{
    $conn = dbConn();
    $sql = "SELECT `id`,`name`, `location`, `group_size`, `package_type`, `days`, `price`,`description` FROM tours WHERE id = '$id'";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        // echo "Record Obtained";
        $result = $data->fetch_assoc();
        return $result;
    } else {
        $result['erorr'] = "Error: " . $sql . "<br>" . $conn->error;
        $result['id'] ="null";

        return $result;
    }
}
/**
 * List Tours page
 * 
 * */
function getPageTours()
{
    $conn = dbConn();
    $sql = "SELECT `id`, `name`, `location`, `group_size`, `package_type`, `days`, `price`, `description` FROM tours ORDER BY `id` DESC";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        // echo "Record Obtained";
        $result = $data->fetch_all();
        
            return $result;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

/**
 * List  Tour Images
 *@return $result
 * */
function getTourImages($tourId)
{
    $conn = dbConn();
    $sql  = "SELECT name FROM tour_images WHERE image_id = '$tourId' ORDER BY id ASC LIMIT 1";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        // echo "Images Obtained";
        $result = $data->fetch_all();
        return $result;
        
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        $result = "null";
        return $result;
    }
}

/**
 * List Single Tour Details- All Images
 *@return $result
 * */
function getAllTourImages($tourId)
{
    $conn = dbConn();
    $sql  = "SELECT name FROM tour_images WHERE image_id = '$tourId' ORDER BY id ASC";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        // echo "Images Obtained";
        $result = $data->fetch_all();
        $_COOKIE['total_images'] = $data->num_rows;
        return $result;
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        $result = "null";
        return $result;
    }
}