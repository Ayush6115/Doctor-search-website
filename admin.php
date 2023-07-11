<!-- admin.php -->

<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the admin credentials (example: hardcoded values)
    $validUsername = "ayush";
    $validPassword = "7667406057";

    if ($username === $validUsername && $password === $validPassword) {
        // Set session variables
        $_SESSION["admin"] = true;
        header("Location: admin_panel.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* style.css */

/* Container */
.login-container {
  width: 300px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f0f0f0;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

/* Heading */
h2 {
  text-align: center;
  margin-bottom: 20px;
}

/* Form */
form {
  display: flex;
  flex-direction: column;
}

input[type="text"],
input[type="password"] {
  margin-bottom: 10px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type="submit"] {
  background-color: #4caf50;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

.error {
  color: red;
  margin-top: 10px;
}

/* Optional: Additional styles to enhance the appearance */
body {
  background-color: #f5f5f5;
  font-family: Arial, sans-serif;
}

.login-container {
  margin-top: 100px;
}

    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Log In">
            <?php
            if (isset($error)) {
                echo '<p class="error">' . $error . '</p>';
            }
            ?>
        </form>
    </div>
</body>
</html>
