<?php

/**
 * Car Client Operations
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
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
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
        $result['erorr'] = "Error: " . $sql . "<br>" . $conn->error;
        $result['id'] ="null";

        return $result;
    }
}

