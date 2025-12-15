<?php
session_start();

function isValidPassword($password)
{
    return strlen($password) >= 8 &&
        preg_match('/[A-Z]/', $password) &&
        preg_match('/[a-z]/', $password) &&
        preg_match('/\d/', $password);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    $_SESSION['errors'] = [];

    if ($password !== $confirm) {
        $_SESSION['errors'][] = "Passwords do not match.";
    }

    if (!isValidPassword($password)) {
        $_SESSION['password_warning'] = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.";
    }

    $userFile = 'users.txt';
    if (!file_exists($userFile))
        file_put_contents($userFile, '');
    $users = file($userFile, FILE_IGNORE_NEW_LINES);

    foreach ($users as $user) {
        list($storedEmail) = explode('|', $user);
        if ($storedEmail === $email) {
            $_SESSION['errors'][] = "An account with this email already exists.";
            break;
        }
    }

    if (!empty($_SESSION['errors']) || !empty($_SESSION['password_warning'])) {
        header("Location: archive.php");
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    file_put_contents($userFile, "$email|$fullname|$hashedPassword\n", FILE_APPEND);

    $_SESSION['success'] = "Registration successful. You may now log in.";
    header("Location: archive.php");
    exit;
}
?>