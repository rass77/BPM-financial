<?php
include "db.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="login.css">
    <title>Register</title>
</head>
<body>
<div class="container">
    <form method="POST">
        <h2>Register</h2>

        <label>Username</label>
        <input type="text" name="username" class="form-control" required>

        <label>Email</label>
        <input type="email" name="email" class="form-control" required>

        <label>Password</label>
        <input type="password" name="password" class="form-control" required>

        <button type="submit" name="register" class="btn">Submit</button>

        <p>Already have an account?
            <a href="login.php">Login here</a>
        </p>
    </form>
</div>
</body>
</html>
