<?php

/**
 * Tour Operations
 *
 * */
require "config/db.config.php";

/**
 * Add Tour to db
 * @return true
 * */
function addTour($name, $location, $group_size, $package_type, $days, $price, $description)
{
    $conn = dbConn();
    $sql  = "INSERT INTO tours (`name`, `location`, `group_size`, `package_type`, `days`, `price`, `description`)
    VALUES ('$name','$location','$group_size','$package_type','$days','$price', '$description')";

    if ($conn->query($sql) === true) {
        echo "New record created successfully";

        return $conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;

    }

    $conn->close();
}
/**
 * List Tours
 * @return $result
 * */
function getTours()
{
    $conn = dbConn();
    $sql  = "SELECT `id`, `name`, `location`, `group_size`, `package_type`, `days`, `price`, `description` FROM tours";
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
    $sql  = "SELECT `id`,`name`, `location`, `group_size`, `package_type`, `days`, `price`, `description` FROM tours WHERE id = '$id'";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        // echo "Record Obtained";
        $result = $data->fetch_assoc();
        return $result;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
/**
 * Edit Tours
 * @return true
 * */
function editTour($id, $name, $location, $group_size, $package_type, $days, $price, $description)
{
    $conn = dbConn();
    $sql  = "UPDATE tours
    SET `name`='$name',`location`='$location',`group_size`='$group_size',
    `package_type`='$package_type',`days`='$days',`price`='$price', `description` = '$description' WHERE`id` ='$id';";
    $data = $conn->query($sql);

    if ($data === true) {
        //echo "New record updated successfully";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        // return $result;
    }
}
/**
 * Delete tour
 */
function removeTour($id)
{
    $conn = dbConn();
    $sql  = "DELETE FROM `tours` WHERE `id` ='$id'";

    if ($conn->query($sql) === true) {
        // echo "Record deleted";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
/**
 * Insert Images path after upload
 */
function addImage($tourId, $pathname)
{
    $conn         = dbConn();
    $resourcetype = "tour";
    $sql          = "INSERT INTO `tour_images`(`name`, `image_id`, `type`) VALUES ('$pathname','$tourId', '$resourcetype')";

    if ($conn->query($sql) === true) {
        echo "Image uploaded successfully";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
/**
 * List  Tour Images
 *@return $result
 * */
function getImages($tourId)
{
    $conn = dbConn();
    $sql  = "SELECT name FROM tour_images WHERE image_id = '$tourId'";

    if ($data->num_rows > 0) {
        // echo "Images Obtained";
        $result = $data->fetch_all();
        return $result;
    } else {
// echo "Error: " . $sql . "<br>" . $conn->error;
        $result = "null";
        return $result;
    }

    $conn->close();
}
/**
 * Update Tour Images
 *@return $result
 * */
function editImage($id, $image_id, $name)
{
    $conn = dbConn();

    $sql = "UPDATE tour_images SET name ='$name', image_id='$image_id' WHERE id ='$id'";

    if ($data === true) {
        //echo "Image updated successfully";
        return true;
    } else {
        $result = "Error: " . $sql . "<br>" . $conn->error;

        return $result;
    }

    $conn->close();
}
/**
 * delete Tour Image
 */
function removeImage($id)
{
    $conn = dbConn();
    $sql  = "DELETE FROM `tour_images` WHERE `id` ='$id'";

    if ($conn->query($sql) === true) {
        // echo "Record deleted";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
