<?php

/**
 * Car Client Operations
 *
 * */
require  "config/db.config.php";

/**
 * List Cars
 * @return $result
 * */
function getCars()
{
    $conn = dbConn();
    $sql = "SELECT id,make,model,description,transmision,seats,price FROM rent_car ORDER BY `id` DESC LIMIT 6";
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
 * List Cars
 * @return $result
 * */
function getCar($id)
{
    $conn = dbConn();
    $sql = "SELECT id,make,model,description,transmision,seats,price FROM rent_car WHERE id = '$id'";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        // echo "Record Obtained";
        $result = $data->fetch_assoc();

        return $result;
    } else {
        $result['error'] = "Error: " . $sql . "<br>" . $conn->error;
        $result['id'] ="null";

        return $result;
    }
}
/**
 * List Cars page
 * 
 */
function getPageCars()
{
    $conn = dbConn();
    $sql = "SELECT id,make,model,description,transmision,seats,price FROM rent_car ORDER BY `id` DESC";
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
 * List  Car Images
 *@return $result
 *
 * */
function getImages($carId)
{
    $conn = dbConn();
    $sql ="SELECT name FROM car_images WHERE image_id = '$carId' ORDER BY id ASC LIMIT 1";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        // echo "Images Obtained";
        $result = $data->fetch_all();

        return $result;
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        $result ="null";
        return $result;
    }

    $conn->close();
}
/**
 * List  Single Car Details- All Images
 *@return $result
 *
 * */
function getAllImages($carId)
{
    $conn = dbConn();
    $sql ="SELECT name FROM car_images WHERE image_id = '$carId' ORDER BY id ASC ";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        // echo "Images Obtained";
        $result = $data->fetch_all();
        $_COOKIE['total_images'] = $data->num_rows;
        return $result;
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        $result ="null";
        return $result;
    }

    $conn->close();
}