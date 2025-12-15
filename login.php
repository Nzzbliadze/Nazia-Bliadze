<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $userFile = 'users.txt';
    $_SESSION['errors'] = [];

    if (!file_exists($userFile)) {
        $_SESSION['errors'][] = "User database missing.";
        header("Location: archive.php");
        exit;
    }

    $users = file($userFile, FILE_IGNORE_NEW_LINES);
    $found = false;

    foreach ($users as $user) {
        list($storedEmail, $fullname, $hashedPassword) = explode('|', $user);
        if ($storedEmail === $email && password_verify($password, $hashedPassword)) {
            setcookie("user_name", $fullname, time() + 3600, "/");
            header("Location: archive.php");
            exit;
        }
    }

    $_SESSION['errors'][] = "Invalid email or password.";
    header("Location: archive.php");
    exit;
}
?>
