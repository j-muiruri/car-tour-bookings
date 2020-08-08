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
        echo "New record created successfully";

        return $conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        
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
        echo "Error: " . $sql . "<br>" . $conn->error;
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
        return true;
    } else {
        $result = "Error: " . $sql . "<br>" . $conn->error;
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
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
/**
 * Insert Images path after upload
 */
function addImage($carId,$pathname)
{
    $conn = dbConn();
    $resourcetype = "car";
    $sql = "INSERT INTO `car_images`(`name`, `image_id`, `type`) VALUES ('$pathname','$carId', '$resourcetype')";


    if ($conn->query($sql) === true) {
        echo "Image uploaded successfully";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    $resourcetype = "car";
    $sql ="SELECT name FROM car_images WHERE image_id = '$carId'";
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
    $sql = "DELETE FROM `car_images` WHERE `id` ='$id'";

    if ($conn->query($sql) === true) {
        // echo "Record deleted";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}