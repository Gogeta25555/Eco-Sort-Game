<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database for the website
$sql = "SELECT * FROM table_name";
$result = $conn->query($sql);

// Start HTML output
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <main>
        <section>
            <h1>Welcome to My Website</h1>
            <p>This is a brief introduction to my website.</p>
        </section>

        <section>
            <h2>Featured Content</h2>
            <?php
            // Loop through the data and display it
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<p>" . $row["content"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No data found.";
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 My Website. All rights reserved.</p>
    </footer>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>