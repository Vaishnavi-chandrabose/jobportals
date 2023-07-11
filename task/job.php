<!DOCTYPE html>
<html>
<head>
  <title>JOB PORTAL</title>
  <style>
    body {
      background: url("four.jpeg");
      background-repeat: no-repeat;
      background-size: 100% 140%;
    }

    h1 {
      text-align: center;
    }

    section {
      margin: 0 auto;
      width: 400px;
      text-align: center;
    }

    form {
      margin-top: 20px;
    }

    table {
      margin-bottom: 20px;
    }

    label {
      display: inline-block;
      width: 150px;
      text-align: right;
      margin-right: 10px;
      font-size: 20px;
      color: #fff;
    }

    input[type="text"],
    input[type="number"],
    select {
      width: 200px;
      padding: 5px;
      margin-bottom: 10px;
    }

    button[type="submit"],
    button[type="edit"],
    button[type="delete"],
    button[type="button"] {
      display: inline-block;
      padding: 10px 20px;
      background-color: #0047AB;
      color: #fff;
      text-decoration: none;
      border: none;
      border-radius: 4px;
      margin-right: 10px;
      cursor: pointer;
    }

    button[type="submit"]:hover,
    button[type="edit"]:hover,
    button[type="delete"]:hover,
    button[type="button"]:hover {
      background-color: #45a049;
    }

    .error-message {
      color: red;
      margin-top: 5px;
    }
  </style>
  <script>
    function redirectToHome() {
      window.location.href = 'home.php';
    }
    function validateForm() {
      var company = document.forms["place"]["t1"].value;
      var jobTitle = document.forms["place"]["t2"].value;
      var salary = document.forms["place"]["t3"].value;
      var postings = document.forms["place"]["t4"].value;
      var location = document.forms["place"]["t5"].value;

      if (company === "") {
        document.getElementById("companyError").innerHTML =
          "Company field is required";
        return false;
      }

      if (jobTitle === "") {
        document.getElementById("jobTitleError").innerHTML =
          "Job Title field is required";
        return false;
      }

      if (salary === "") {
        document.getElementById("salaryError").innerHTML =
          "Salary field is required";
        return false;
      }

      if (postings === "") {
        document.getElementById("postingsError").innerHTML =
          "Number of Postings field is required";
        return false;
      }

      if (location === "") {
        document.getElementById("locationError").innerHTML =
          "Location field is required";
        return false;
      }
    }
  </script>
</head>
<body>
  <div class="header">
    <button type="button" onclick="redirectToHome()" style="float: right;">Home</button>
  </div>
  <h1><center>JOB LIST</center></h1>
  <center>
    <section id="dashboard">
      <form name="place" method="post" action="add.php" onsubmit="return validateForm()">
        <table>
          <tr>
            <td><label for="company">Company</label></td>
            <td>
              <select id="company" name="t1">
                <option value="">Select Company</option>
                <option value="HCL">HCL</option>
                <option value="TCS">TCS</option>
                <option value="CTS">CTS</option>
                <option value="ZOHO">ZOHO</option>
                <option value="INFOSYS">INFOSYS</option>
              </select>
              <span id="companyError" class="error-message"></span>
            </td>
          </tr>
          <tr>
            <td><label for="job-title">Job Title</label></td>
            <td>
              <input type="text" id="job-title" name="t2">
              <span id="jobTitleError" class="error-message"></span>
            </td>
          </tr>
          <tr>
            <td><label for="salary">Salary</label></td>
            <td>
              <input type="number" id="salary" name="t3">
              <span id="salaryError" class="error-message"></span>
            </td>
          </tr>
          <tr>
            <td><label for="posting">Number of Postings</label></td>
            <td>
              <input type="number" id="posting" name="t4">
              <span id="postingsError" class="error-message"></span>
            </td>
          </tr>
          <tr>
            <td><label for="location">Location</label></td>
            <td>
              <select id="location" name="t5">
                <option value="">Select Location</option>
                <option value="Madurai">Madurai</option>
                <option value="Chennai">Chennai</option>
                <option value="Coimbatore">Coimbatore</option>
                <option value="Trichy">Trichy</option>
                <option value="Tirunelveli">Tirunelveli</option>
              </select>
              <span id="locationError" class="error-message"></span>
            </td>
          </tr>
          <tr>
            <td><label for="id">ID</label></td>
            <td><input type="number" id="tid" name="tid"></td>
          </tr>
        </table>
        <button type="submit" name="submit">Submit</button>
        <button type="edit" name="edit">Edit</button>
      </form>
      <form  name="place" method="post" action="add.php">
        <label for="tid">ID:</label>
        <input type="number" id="tid" name="tid">
      <button type="delete" name="delete">Delete</button>
      </form>
    </section>
  </center>
  <div class="footer">
    <!-- Footer content here -->
  </div>
</body>
</html>
