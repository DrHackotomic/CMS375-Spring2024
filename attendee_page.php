<!-- Worked on this: Karam Hack -->

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
    $event_location = $_POST['event_location'];
    $event_format = $_POST['event_format'];

    // Prepare SQL query
    $sql = "SELECT * FROM event WHERE event_name LIKE ? OR event_location LIKE ? OR event_format LIKE ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "sss", "%$event_name%", "%$event_location%", "%$event_format%");
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
        echo "No events found";
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Welcome Attendees!</title>
    <title>Search Events</title>
</head>
<body>
    <h2>Search Events</h2>
    <form action="" method="post">
        <label for="event_name">Event Name:</label>
        <input type="text" id="event_name" name="event_name"><br>
        <label for="event_location">Event Location:</label>
        <input type="text" id="event_location" name="event_location"><br>
        <label for="event_format">Event Format:</label>
        <input type="text" id="event_format" name="event_format"><br>
        <input type="submit" value="Search">
    </form>
</body>
</html>
