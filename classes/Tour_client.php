<?php

/**
 * Tour  Client Operations
 * 
 * */
//  require  "config/db.config.php";

/**
 * Add Tour to db 
 * @return true
 * */
function addTour($name,$location,$group_size,$package_type,$days,$price)
{
    $conn = dbConn();
    $sql = "INSERT INTO tours (`name`, `location`, `group_size`, `package_type`, `days`, `price`) 
    VALUES ('$name','$location','$group_size','$package_type','$days','$price')";


    if ($conn->query($sql) === true) {
        echo "New record created successfully";
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
    $sql = "SELECT `id`, `name`, `location`, `group_size`, `package_type`, `days`, `price` FROM tours";
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
    $sql = "SELECT `id`,`name`, `location`, `group_size`, `package_type`, `days`, `price` FROM tours WHERE id = '$id'";
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