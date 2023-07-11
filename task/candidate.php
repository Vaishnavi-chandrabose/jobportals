<html>
<style>
 body {
      background-color:#90EE90;
    }
button[type="button"]:hover  {
  background-color: #45a049;
}
button[type="button"]{
display: block;
  width: 10%;
  padding: 10px;
  background-color: #0047AB;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
 margin:10px;}

</style>
<script>
    function redirectToHome() {
      window.location.href = 'home.php';
    }
</script>
<body>
<div class="header">
    <button type="button" onclick="redirectToHome()" style="float: right;">Home</button>
  </div>
<div class="home-content">       
    <br>
    <table border="2">
        <thead>
      <tr>
        <th bgcolor="darksalmon" style="font-style:Georgia; color:brown; font-size:18px;">Job ID</th>
        <th bgcolor="#F0E68C" style="font-style:Georgia; color:brown; font-size:18px;">Company</th>
        <th bgcolor="#BCB88A" style="font-style:Georgia; color:brown; font-size:18px;">Name</th>
        <th bgcolor="rosybrown" style="font-style:Georgia; color:brown; font-size:18px;">Gender</th>
        <th bgcolor="darksalmon" style="font-style:Georgia; color:brown; font-size:18px;">Qualification</th>
        <th bgcolor="#73A16C" style="font-style:Georgia; color:brown; font-size:18px;">DOB</th>        
        <th bgcolor="#BCB88A" style="font-style:Georgia; color:brown; font-size:18px;">Mobile </th>
        <th bgcolor="rosybrown" style="font-style:Georgia; color:brown; font-size:18px;">Resume Upload</th>
      </tr>
    </thead>
    <tbody>
<?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "submit";
      $connection = new mysqli($servername, $username, $password, $database);
      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }
      $sql = "SELECT * FROM candidate";
      $result = $connection->query($sql);

            if (!$result) {
        die("Invalid query: " . $connection->error);
      }
      while($row = $result->fetch_assoc()) {
               echo "<tr>
	<td>" . $row["cid"] . "</td>
                    <td>" . $row["title"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["gender"] . "</td>
                    <td>" . $row["qualification"] . "</td>
                    <td>" . $row["dob"] . "</td>
                    <td>" . $row["mobile"] . "</td>
                    <td>" . $row["resume"] . "</td>
                   </tr>";                    
            }
            $connection->close();
            ?>
<?php
if (isset($_POST["register"])) {
  $sel = $_POST["selectt"];
 $job = $_POST["select"];
  $name = $_POST["name"];
  $gender = $_POST["gender"];
  $qualification = $_POST["qualification"];
  $dob = $_POST["dob"];
  $mobile = $_POST["mobile"];
  $resume = $_POST["resume"];    
  $con = mysqli_connect("localhost", "root", "", "submit");
    if(!$con)
        die("Connection failed");    
   $query = "INSERT INTO candidate ( id,title, name, gender, qualification, dob, mobile, resume) 
            VALUES ( '$sel','$job', '$name', '$gender', '$qualification', '$dob', '$mobile', '$resume')";    
      $r = mysqli_query($con, $query);
     if(!$r)
        die("Insertion failed");
    else
        echo '<script>alert("Successfully inserted")</script>';
    
    mysqli_close($con);
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "submit";
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST["delete"])) {
  $candidateId = $_POST["cid"];
  $query = "DELETE FROM candidate WHERE cid = '$candidateId'";

  if ($connection->query($query) === TRUE) {
    echo '<script>alert("Candidate deleted successfully")</script>';
  } else {
    echo "Error deleting candidate: " . $connection->error;
  }
}
?>
</div>
</body>
</html>

