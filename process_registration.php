<!-- Worked on this: Karam Hack -->

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
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

// Function to randomize the User_id    
function generateString($length) {
    $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $key = "";
    for($i=0; $i<$length; $i++) 
        $key .= $charset[(mt_rand(0,(strlen($charset)-1)))]; 
    return $key;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $user_role = $_POST['user_role'];

    do {
        $user_id = generateString(5); // Generate a 5-character user_id
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $count = $stmt->fetchColumn();
    } while ($count > 0); // Keep generating until a unique user_id is found

    $sql = "INSERT INTO users (user_id, first_name, last_name, email, phone_number, user_role) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $first_name, $last_name, $email, $phone_number, $user_role]);

    echo "User registered successfully!";

    // Redirect based on user_role
    switch ($user_role) {
        case 'organizer':
            header("Location: createEvent.php");
            exit();
        case 'attendee':
            header("Location: attendee_page.php");
            exit();

    }
}
?>
