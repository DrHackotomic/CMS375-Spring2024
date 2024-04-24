
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
        input[type="text"], input[type="email"], input[type="tel"], select {
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

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Generate a unique user_id
        $uniqueId = "UOO" . rand(0, 99999);
        $user_Id = substr($uniqueId, 0, 5);


        // Prepare an SQL statement
        $stmt = $connection->prepare("INSERT INTO users (user_id, first_name, last_name, email, phone_number, user_role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $user_id, $first_name, $last_name, $email, $phone_number, $user_role);

        // Set parameters and execute
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $user_role = $_POST['user_role'];
        $stmt->execute();

        echo "New user registered successfully.";
        $stmt->close();
    }

    $connection->close();
?>


    <h2>Register</h2>
    <form action="process_registration.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" required><br>
        <label for="user_role">Role:</label>
        <select id="user_role" name="user_role" required>
            <option value="organizer">Event Organizer</option>
            <option value="attendee">Attendee</option>
        </select><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
