<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$dbname = "contact";

// Create a new PDO instance
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Insert the data into the database
  try {
    $stmt = $pdo->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);
    $successMessage = "Thank you for your message!";

    // Redirect to home page after 3 seconds
    header("refresh:2;url=index.html");

    // Display the success message with custom CSS styles and background image
    echo '<body style="background-image: url(images/bg.png); 
        background-size: cover; 
        padding: 30px 10px 10px 50px;
        margin-top: 50px; 
        font-size: 28px; 
        color: #333;">' . $successMessage . '</body>';
        
    exit;
  } catch (PDOException $e) {
    echo "Oops! Something went wrong: " . $e->getMessage();
  }
}
?>
