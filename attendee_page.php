<!-- 
Worked on: Karam Hack
Assisted: Xandria Bramble
-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #007BFF;
            text-align: center;
            padding: 20px 0;
        }
        form {
            width: 80%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #ffffff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        li a {
            color: #007BFF;
            text-decoration: none;
        }
        li a:hover {
            text-decoration: underline;
        }
        .delete-button {
            display: none;
        }
        .top-right-buttons {
            position: fixed;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 10px;
        }

        .top-right-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }

        .top-right-buttons button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <div class="top-right-buttons">
        <button onclick="location.href='homepage.php'">Register New Account</button>
        <button onclick="location.href='createEvent.php'">Create Event</button>
        <button onclick="location.href='delete_account.php'">Delete Account</button>
        <button onclick="location.href='update_user.php'">Update Account Info</button>
    </div>

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
    } else {
        echo 'Connection established';
    }

    // Function to display all events
    function displayAllEvents($connection) {
        $sql = "SELECT * FROM event";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>All Events</h2>";
            echo "<ul>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<li><a href='attendee_page.php?event_id={$row['event_id']}'>{$row['event_name']}</a></li>";
            }
            echo "</ul>";
        } else {
            echo "No events found";
        }
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Fetch form data
        $event_name = $_POST['event_name'];
        // $location_id = $_POST['location_id'];

        // Prepare SQL query
        $sql = "SELECT * FROM event WHERE event_name LIKE ?";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "sss", "%$event_name%");
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Display search results
        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Search Results</h2>";
            echo "<ul>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<li><a href='attendee_page.php?event_id={$row['event_id']}'>{$row['event_name']}</a></li>";
            }
            echo "</ul>";
        } else {
            echo " <strong>No events found</strong>";
        }
    }


    

    
    // Display all events by default
    displayAllEvents($connection);

    // Display event details if an event_id is provided
    if (isset($_GET['event_id'])) {
        $event_id = $_GET['event_id'];
        $sql = "SELECT * FROM event WHERE event_id = ?";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "s", $event_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $event = mysqli_fetch_assoc($result);

        echo "<h2>Event Details</h2>";
        echo "<p>Event Name: {$event['event_name']}</p>";
        echo "<p>Event Location: {$event['location_id']}</p>";
        echo "<p>Event Date: {$event['event_date']}</p>";
        echo "<p>Event Time: {$event['event_time']}</p>";
        echo "<p>Summary: {$event['summary']}</p>";
        
    }

    mysqli_close($connection);
    ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
