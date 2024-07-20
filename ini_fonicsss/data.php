<?php
$servername = "localhost";
$dbname = "id21995101_db";
$username = "id21995101_sheisfonics";
$password = "Azkiya.08";
$api_key_value = "12345678912";

$api_key = $ph_act = $tdsValue = $t = $h = $pompa_a = $pompa_b = $pompa_ph_up =$pompa_ph_down = $fogger =$kipas =$lampu=$aerator= "";

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if ($api_key == $api_key_value) {
        $ph_act = test_input($_POST["ph_act"]);
        $tdsValue = test_input($_POST["tdsValue"]);
        $t = test_input($_POST["t"]);
        $h = test_input($_POST["h"]);
        $pompa_a = test_input($_POST["datapumpa"]);
        $pompa_b = test_input($_POST["datapumpb"]);
        $pompa_ph_up = test_input($_POST["datapumpphup"]);
        $pompa_ph_down = test_input($_POST["datapumpphdown"]);
        $fogger = test_input($_POST["datafogger"]);
        $kipas = test_input($_POST["datakipas"]);
        $lampu= test_input($_POST["datalamp"]);
        $aerator= test_input($_POST["dataaerator"]);
        

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO nilai (ph, nutrisi, suhu, kelembapan)
        VALUES ('$ph_act', '$tdsValue', '$t', '$h')";
        
        echo '<br>sql: '. $sql;

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Insert into aktuator table
        $sql_actuator = "INSERT INTO aktuator (pompa_a, pompa_b,pompa_ph_up, pompa_ph_down, fogger,kipas,lampu,aerator)
        VALUES ('$pompa_a', '$pompa_b','$pompa_ph_up', '$pompa_ph_down', '$fogger', '$kipas', '$lampu','$aerator' )";

        echo '<br>sql_actuator: '. $sql_actuator;

        if ($conn->query($sql_actuator) === TRUE) {
            echo "Aktuator records inserted successfully";
        } else {
            echo "Error inserting aktuator records: " . $sql_actuator . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Wrong API Key provided.";
    }
 /*   
} else {
    echo "No data posted with HTTP POST.";
}
*/

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
