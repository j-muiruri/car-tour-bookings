<?php

/**
 * Car Operations
 *
 * */
require  "config/db.config.php";

/**
 * Add Car to db
 * @return true
 * */
function addCar($model, $make, $description, $pricing, $seats, $transmission)
{
    $conn = dbConn();
    $sql = "INSERT INTO rent_car(make, model, description, transmision, seats, price) 
    VALUES ('$make','$model','$description','$transmission','$seats','$pricing')";


    if ($conn->query($sql) === true) {
        $result['id'] = $conn->insert_id;
        $result['add']  = true;
        return $result;
    } else {
        $result['add']  =false;
        $result['msg'] =  "Error: " . $sql . "<br>" . $conn->error;
    }
}
/**
 * List Cars
 * @return $result
 * */
function getCars()
{
    $conn = dbConn();
    $sql = "SELECT id,make,model,description,transmision,seats,price FROM rent_car";
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
 * List Car
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
        $result['msg'] = "Error: " . $sql . "<br>" . $conn->error;
        return $result;
    }
}
/**
 * Edit Cars
 * @return true
 * */
function editCar($id, $model, $make, $description, $pricing, $seats, $transmission)
{
    $conn = dbConn();
    $sql = "UPDATE rent_car SET make='$make',model='$model',
    description='$description',transmision='$transmission',seats='$seats',price='$pricing' WHERE id ='$id'";
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
 * delete car
 */
function removeCar($id)
{
    $conn = dbConn();
    $sql = "DELETE FROM `rent_car` WHERE `id` ='$id'";


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
function addImage($carId, $pathname)
{
    $conn = dbConn();
    $resourcetype = "car";
    $sql = "INSERT INTO `car_images`(`name`, `image_id`, `type`) VALUES ('$pathname','$carId', '$resourcetype')";


    if ($conn->query($sql) === true) {
        
        $result['add_img'] =  true;
        $result['msg'] =  "Image uploaded successfully";
        return $result;
    } else {
        
        $result['msg'] =   "Error: " . $sql . "<br>" . $conn->error;
        $result['add_img'] =  false;
        return $result;
    }

    $conn->close();
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
 * Update Car Images
 *@return $result
 * */
function editImage($id, $image_id, $name)
{
    $conn = dbConn();
    $resourcetype = "car";
    $sql ="UPDATE car_images SET name ='$name', image_id='$image_id' WHERE id ='$id'";

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
 * delete Car Image
 */
function removeImage($id)
{
    $conn = dbConn();
    $sql = "DELETE FROM `car_images` WHERE `image_id` ='$id'";

    if ($conn->query($sql) === true) {
        // echo "Record deleted";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
