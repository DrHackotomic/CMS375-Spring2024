<!-- 
Worked on: Nicole Edoziem
Contributed: Karam Hack 
-->

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "0698416";
$dbname = "EventiqueHarmony";

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection established successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    // Generate a unique event_id here. This is a placeholder function.
    $event_id = generateUniqueEventId();

    $sql = "INSERT INTO event (event_id, organizer_id, event_name, event_type, event_date, event_time, summary, location_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$event_id, $_POST['organizer_id'], $_POST['event_name'], $_POST['event_type'], $_POST['event_date'], $_POST['event_time'], $_POST['summary'], $_POST['location_id']]);
        
        $message = "Event successfully created.";
    } catch (PDOException $e) {
        $message = "ERROR: Could not able to execute. " . $e->getMessage();
    }
}

function generateUniqueEventId() {
    // Example logic to generate a unique event_id
    // This is a placeholder. Replace with your actual logic.
    // Ensure the generated ID is no longer than 5 characters
    $uniqueId = "EVT" . rand(1000, 9999); // Generates a 5-character ID
    return substr($uniqueId, 0, 5); // Ensures the ID is no longer than 5 characters
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Event</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">
        <h2><i class="fas fa-calendar-plus icon"></i>Create a New Event</h2>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div><input type="text" name="organizer_id" placeholder="Organizer ID"></div>
            <div><input type="text" name="event_name" placeholder="Event Name"></div>
            <div><input type="text" name="event_type" placeholder="Event Type"></div>
            <div><input type="date" name="event_date"></div>
            <div><input type="time" name="event_time"></div>
            <div><textarea name="summary" placeholder="Event Summary"></textarea></div>
            <div><input type="text" name="location_id" placeholder="Location ID"></div>
            <div><input type="submit" value="Create Event"></div>
        </form>

        <div><input type= "submit" onclick="location.href='attendee_page.php'" value="Return to Home Page"></div>

        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
