
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete User Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        h2 {
            color: #007BFF;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Delete User Data</h2>
    <form method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Confirm Deletion">
        
    </form>

            <div><input type= "submit" onclick="location.href='attendee_page.php'" value="Return to Home Page"></div>

</body>
</html>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "0698416";
$dbname = "EventiqueHarmony";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);

// Query to find the user
$sql = "SELECT * FROM users WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email'";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    // User exists, proceed with deletion
    $sql = "DELETE FROM users WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email'";
    if (mysqli_query($connection, $sql)) {
        echo "User data successfully deleted.";
    } else {
        echo "Error deleting user data: " . mysqli_error($connection);
    }
} else {
    echo "No user found with the provided details.";
}

mysqli_close($connection);

?>