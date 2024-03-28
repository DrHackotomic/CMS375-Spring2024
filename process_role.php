<!-- Worked on this: Karam Hack-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["user_role"])) {
    $role = $_POST["user_role"];
    if ($role == "organizer") {
        // Redirect to the event organizer page
        header("Location: createEvent.php");
        exit;
    } elseif ($role == "attendee") {
        // Redirect to the attendee page
        header("Location: attendee_page.php");
        exit;
    }
}
?>
