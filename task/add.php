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
       <th bgcolor="#73A16C" style="font-style:Georgia; color:brown; font-size:18px;">ID</th>
        <th bgcolor="#F0E68C" style="font-style:Georgia; color:brown; font-size:18px;">COMPANY NAME</th>
        <th bgcolor="#BCB88A" style="font-style:Georgia; color:brown; font-size:18px;">JOB TITLE</th>
        <th bgcolor="rosybrown" style="font-style:Georgia; color:brown; font-size:18px;">SALARY</th>
        <th bgcolor="darksalmon" style="font-style:Georgia; color:brown; font-size:18px;">NUMBER OF POSTING</th>
        <th bgcolor="#73A16C" style="font-style:Georgia; color:brown; font-size:18px;">LOCATION</th>
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
      $sql = "SELECT * FROM submit";
      $result = $connection->query($sql);

            if (!$result) {
        die("Invalid query: " . $connection->error);
      }
      while($row = $result->fetch_assoc()) {
               echo "<tr>
	<td>" . $row["id"] . "</td>
                    <td>" . $row["company"] . "</td>
                    <td>" . $row["job"] . "</td>
                    <td>" . $row["salary"] . "</td>
                    <td>" . $row["number"] . "</td>
                    <td>" . $row["location"] . "</td>
                   </tr>";
            }
            $connection->close();
            ?>
   </tbody>
    </table>
    
<?php
if(isset($_POST["submit"]))
{
    $id = $_POST["tid"];
    $a = $_POST["t1"];
    $b = $_POST["t2"];
    $c = $_POST["t3"];
    $d = $_POST["t4"];
    $e = $_POST["t5"];
    
    $con = mysqli_connect("localhost", "root", "", "submit");
    if(!$con)
        die("Connection failed");    
    $query = "INSERT INTO submit (id,company, job, salary, number, location) VALUES ('$id','$a', '$b', '$c', '$d', '$e')";    
    $r = mysqli_query($con, $query);
    if(!$r)
        die("Insertion failed");
    else
        echo '<script>alert("Successfully inserted")</script>';    
    mysqli_close($con);
}
?>
<?php
if(isset($_POST["edit"]))
{
    $id = $_POST["tid"];
    $a = $_POST["t1"];
    $b = $_POST["t2"];
    $c = $_POST["t3"];
    $d = $_POST["t4"];
    $e = $_POST["t5"];
    
    $con = mysqli_connect("localhost", "root", "", "submit");
    if(!$con)
        die("Connection failed");    
    $query = "UPDATE submit SET company='$a', job='$b', salary='$c', number='$d', location='$e' WHERE id='$id'";    
    $r = mysqli_query($con, $query);
    if(!$r)
        die("Update failed");
    else
        echo '<script>alert("Successfully updated")</script>';    
    mysqli_close($con);
}
?>

<?php
if(isset($_POST["delete"]))
{
    $id = $_POST["tid"];    
    $con = mysqli_connect("localhost", "root", "", "submit");
    if(!$con)
        die("Connection failed");    
    $query = "DELETE FROM submit WHERE id='$id'";    
    $r = mysqli_query($con, $query);
    if(!$r)
        die("Deletion failed");
    else
        echo '<script>alert("Successfully deleted")</script>';    
    mysqli_close($con);
}
?>
</div>
</body>
</html>
