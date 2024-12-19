<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'users';

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Error occurred: " . mysqli_connect_error());
} 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST["name"];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $c_pwd = $_POST['c_pwd'];
    $role = $_POST['role'];

    if ($pwd == $c_pwd) {
        // Check if the email already exists
        $check_sql = "SELECT * FROM users WHERE email = '$email'";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            echo "It already exists";
        } else {
            // Insert new record if email is unique
            $sql = "INSERT INTO users (`name`, `email`, `pwd`, `role`) VALUES ('$name', '$email', '$pwd', '$role')";
            if (mysqli_query($conn, $sql)) {
                header("location:log.html");
            } 
            else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Passwords do not match";
    }
}

mysqli_close($conn);
?>
