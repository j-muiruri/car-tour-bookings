<?php
/**
 * Db Connection
 * 
 * @author John Muiruri <jontedev@gmail.com>
 * @license GNU
 */
function dbConn()
{
    $servername = "localhost";
    $username = "test";
    $password = "";
    $dbname = "jofra";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // echo "Connected";
        return $conn;
    }
}
