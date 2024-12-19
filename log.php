<?php
// Start the session at the beginning of the script
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = "users";

$exist = false;
$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Error Occurred: " . mysqli_connect_error());
} else {
    echo "Welcome to PHP";
}

// Sanitize user inputs
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

$sql = "SELECT * FROM users WHERE email='$email' AND pwd='$pwd'";
$result = mysqli_query($conn, $sql);

// Check for query success
if ($result === false) {
    die("Error in SQL query: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    // Start a session to track the logged-in user
    $_SESSION['loggedin'] = true;  // Session variable to indicate login
    $_SESSION['email'] = $email;   // You can also store the email or other user info
    // Redirect to home page after login
    echo "<p>".$_SESSION['loggedin']."</p>";
    header('Location: home.html');
    exit();
} else {
    // Optionally, pass an error flag for feedback on the login page
    header('Location: log.html?error=invalid_credentials');
    exit();
}

// Close the connection
mysqli_close($conn);
?>