<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Email</title>
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
    <h2>Change Email</h2>
    <form method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="current_email">Current Email:</label>
        <input type="email" id="current_email" name="current_email" required><br>
        <label for="new_email">New Email:</label>
        <input type="email" id="new_email" name="new_email" required><br>
        <input type="submit" value="Update Email">
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
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data with checks
    $first_name = isset($_POST['first_name']) ? $conn->real_escape_string($_POST['first_name']) : '';
    $last_name = isset($_POST['last_name']) ? $conn->real_escape_string($_POST['last_name']) : '';
    $current_email = isset($_POST['current_email']) ? $conn->real_escape_string($_POST['current_email']) : '';
    $new_email = isset($_POST['new_email']) ? $conn->real_escape_string($_POST['new_email']) : '';

    // Proceed with the update only if all fields are set
    if (!empty($first_name) && !empty($last_name) && !empty($current_email) && !empty($new_email)) {
        // Query to find the user
        $sql = "SELECT * FROM Users WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$current_email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User exists, proceed with email update
            $sql = "UPDATE Users SET email = '$new_email' WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$current_email'";
            if ($conn->query($sql) === TRUE) {
                echo "Email updated successfully.";
            } else {
                echo "Error updating email: " . $conn->error;
            }
        } else {
            echo "No user found with the provided details.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}

$conn->close();
?>