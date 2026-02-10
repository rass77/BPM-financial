<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            echo "Login successful! Welcome " . $user['username'];
            header("Location: index.php");
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <form method="POST">
        <h2>Login</h2>

        <label>Email</label>
        <input type="email" name="email" class="form-control" required>

        <label>Password</label>
        <input type="password" name="password" class="form-control" required>

        <button type="submit" name="login" class="btn">Submit</button>

        <p>No account yet?
            <a href="register.php">Register here</a>
        </p>
    </form>
</div>
</body>
</html>
