<?php
    session_start();

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Connect to database (replace with your database connection details)
        $conn = new mysqli("localhost", "username", "password", "database_name");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        // Check if user exists in the database
        $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit();
        } else {
            $_SESSION["message"] = "Invalid username or password";
        }

        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Recipe Management</h1>
