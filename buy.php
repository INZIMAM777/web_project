
<?php
// Database connection
$servername = "localhost";  // Change to your database host
$username = "root";         // Change to your MySQL username
$password = "";             // Change to your MySQL password
$dbname = "real_estate_db"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = mysqli_real_escape_string($conn, $_POST['name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$day = mysqli_real_escape_string($conn, $_POST['day']);
$time = mysqli_real_escape_string($conn, $_POST['time']);
$place = mysqli_real_escape_string($conn, $_POST['place']);

// Validate server-side (You can add more checks as necessary)
if (empty($name) || empty($phone) || empty($day) || empty($time) || empty($place)) {
    die("Please fill all the fields.");
}

// Insert form data into MySQL database
$sql = "INSERT INTO enquiries (name, phone, day, time, place) VALUES ('$name', '$phone', '$day', '$time', '$place')";

if ($conn->query($sql) === TRUE) {
    echo "New enquiry submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
