<?php
require_once "db.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $userRole = $_POST["userRole"];

    // Insert user into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === false) {
        die("Error inserting user: " . $conn->error);
    }

    // Redirect to a success page
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <label for="userRole">User Role:</label>
        <input type="text" name="userRole" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>

<?php

// Close the database connection
$conn->close();

?>
