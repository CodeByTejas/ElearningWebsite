<?php
// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signupInfo";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get input values
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];

  // Validate input values
  $errors = array();
  if (empty($first_name)) {
    $errors[] = "First name is required";
  }
  if (empty($last_name)) {
    $errors[] = "Last name is required";
  }
  if (empty($email)) {
    $errors[] = "Email is required";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
  }
  if (empty($phone)) {
    $errors[] = "Phone is required";
  }
  if (empty($password)) {
    $errors[] = "Password is required";
  }
  if ($password != $confirm_password) {
    $errors[] = "Passwords do not match";
  }

  // Insert user data into database if there are no errors
  if (empty($errors)) {
    $sql = "INSERT INTO users (first_name, last_name, email, phone, password) VALUES ('$first_name', '$last_name', '$email', '$phone', '$password')";
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    // Output errors
    echo "<ul>";
    foreach ($errors as $error) {
      echo "<li>$error</li>";
    }
    echo "</ul>";
  }
}
?>

<!-- HTML form -->
<form method="post">
  <label>First Name</label>
  <input type="text" name="first_name" placeholder="" />
  <label>Last Name</label>
  <input type="text" name="last_name" placeholder="" />
  <label>Email</label>
  <input type="email" name="email" placeholder="" />
  <label>Phone</label>
  <input type="phone" name="phone" placeholder="" />
  <label>Password</label>
  <input type="password" name="password" placeholder="" />
  <label>Confirm Password</label>
  <input type="password" name="confirm_password" placeholder="" />
  <input type="submit" value="Submit" />
</form>
