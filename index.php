<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Recipe Management</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Recipes</a></li>
            <li><a href="#">Ingredients</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Reviews</a></li>
            <?php
                session_start();
                if (isset($_SESSION["username"])) {
                    echo "<li><a href='logout.php'>Logout (" . $_SESSION["username"] . ")</a></li>";
                } else {
                    echo "<li><a href='login.php'>Login</a></li>";
                }
            ?>
        </ul>
    </nav>
    <main>
        <section id="content">
            <?php
                if (isset($_SESSION["message"])) {
                    echo "<p>" . $_SESSION["message"] . "</p>";
                    unset($_SESSION["message"]);
                }
            ?>
            <h2>Welcome to the Recipe Management System!</h2>
            <p>This system allows you to manage your recipes, ingredients, categories, and reviews.</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Recipe Management System</p>
    </footer>
</body>
</html>
