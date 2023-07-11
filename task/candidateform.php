<!DOCTYPE html>
<html>
<head>
  <title>Job Application Form</title>
<style>
body {
  font-family: Arial, sans-serif;
  background:url("three.jfif");
 background-repeat:no-repeat;
 background-size:100% 140%;
}

h1 {
  text-align: center;
}

form {
  max-width: 400px;
  margin: 0 auto;
}

div {
  margin-bottom: 10px;
}

label {
  display: inline-block;
  width: 120px;
}

input[type="text"],
input[type="date"],
input[type="tel"],
input[type="file"] {
  width: 200px;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="radio"] {
  margin-right: 5px;
}

button[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #0047AB;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
 margin:10px;
}

button[type="submit"]:hover,
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

.error {
  color: red;
  font-size: 12px;
  margin-top: 5px;
}

</style>
  <script>
   function redirectToHome() {
      window.location.href = 'home.php';
    }
function showConfirmation() {
  const job = document.getElementById('job').value;
  const name = document.getElementById('name').value;
  const gender = document.querySelector('input[name="gender"]:checked');
  const qualification = document.getElementById('qualification').value;
  const dob = document.getElementById('dob').value;
  const mobile = document.getElementById('mobile').value;
  const resume = document.getElementById('resume').value;
  const errorMessage = document.getElementById('error-message');
  errorMessage.innerHTML = '';

  if (!job || !name || !gender || !qualification || !dob || !mobile || !resume) {
    errorMessage.innerHTML = 'All fields are required.';
    return false;
  }
}
</script>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "submit";
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sql2 = "SELECT id, company FROM submit"; 
$result2 = $connection->query($sql2);

if (!$result2) {
    die("Invalid query: " . $connection->error);
}

$submit = array(); 

if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
        $submit[] = $row2; 
    }
}
?>
 <div class="header">
    <button type="button" onclick="redirectToHome()" style="float: right;">Home</button>
  </div>
<h1>Job Application Form</h1>
<form name="place" method="post" action="candidate.php">
 <div>
 <label for="job">Job:</label>
 <select id="job" name="select">
  <?php
  foreach ($submit as $array) {      
  echo '<option value="' . $array["company"] . '">' . $array["company"] . '</option>';
  }
   ?>
 </select>
    </div>
    <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div>
      <label>Gender:</label>
      <label for="male">Male</label>
      <input type="radio" id="male" name="gender" value="Male" required>
      <label for="female">Female</label>
      <input type="radio" id="female" name="gender" value="Female" required>
    </div>
    <div>
      <label for="qualification">Qualification:</label>
      <input type="text" id="qualification" name="qualification" required>
    </div>
    <div>
      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" required>
    </div>
    <div>
      <label for="mobile">Mobile:</label>
      <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required>
    </div>
    <div>
      <label for="resume">Resume:</label>
      <input type="file" id="resume" name="resume" required>
    </div>
    <div id="error-message" class="error"></div>
    <button type="submit" id="register" name="register" onclick="return showConfirmation()">REGISTER</button>
   <label for="cid">Candidate id to Delete:</label>
    
  </form>
<form name="place" method="post" action="candidate.php">
 <input type="number" id="cid" name="cid">   <button type="submit" id="delete" name="delete">DELETE</button>
</form>
</body>
</html>