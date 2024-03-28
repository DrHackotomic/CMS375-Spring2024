
<!-- Worked on this: Karam Hack-->
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <!-- Will gather and push the data entered to process_role -->
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
