<?php
if(isset($_POST["register"]))
{
    $job = $_POST["job"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $qualification = $_POST["qualification"];
    $dob = $_POST["dob"];
    $mobile = $_POST["mobile"];
    $resume = $_POST["resume"];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "submit";
    $connection = new mysqli($servername, $username, $password, $database);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    
    $query = "INSERT INTO candidate (job, name, gender, qualification, dob, mobile, resume) 
              VALUES ('$job', '$name', '$gender', '$qualification', '$dob', '$mobile', '$resume')";
    
    $result = $connection->query($query);
    if (!$result) {
        die("Insertion failed: " . $connection->error);
    }
    
    echo '<script>alert("Successfully inserted")</script>';
    
    $connection->close();
}
?>
