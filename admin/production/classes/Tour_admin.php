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
        $result['id'] = $conn->insert_id;
        $result['add']  = true;
        return $result;
    } else {
        $result['add']  =false;
        $result['msg'] =  "Error: " . $sql . "<br>" . $conn->error;
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
        $result['msg'] = "Error: " . $sql . "<br>" . $conn->error;
        return $result;
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
        $result['edit']  = true;
        return $result;
    } else {
        $result['edit']  = false;
        $result['msg'] = "Error: " . $sql . "<br>" . $conn->error;
        return $result;
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
        $result['delete'] =  true;
        removeImage($id);
        return $result;
    } else {
        $result['delete'] =  false;
        $result['msg'] =  "Error: " . $sql . "<br>" . $conn->error;
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
        echo "Image uploaded successfully\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
        $result['add_img'] =  true;
        $result['msg'] =  "Image uploaded successfully";
        return $result;
    } else {
        echo "opposite of Image uploaded successfully\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
        $result['msg'] =   "Error: " . $sql . "<br>" . $conn->error;
        $result['add_img'] =  false;
        return $result;
    }

    $conn->close();
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
