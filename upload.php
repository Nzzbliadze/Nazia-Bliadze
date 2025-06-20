<?php
session_start();

if (!isset($_COOKIE['user_name'])) {
    $_SESSION['error'] = "You must be logged in to upload.";
    header("Location: archive.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploadedFile'])) {
    $uploadsDir = 'uploads/';
    if (!file_exists($uploadsDir)) mkdir($uploadsDir, 0777, true);

    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = basename($_FILES['uploadedFile']['name']);
    $destPath = $uploadsDir . $fileName;

    $allowedTypes = ['pdf', 'docx', 'txt'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedTypes)) {
        $_SESSION['error'] = "Unsupported file type.";
        header("Location: archive.php");
        exit;
    }

    if (move_uploaded_file($fileTmpPath, $destPath)) {
        $_SESSION['message'] = "File uploaded successfully.";
    } else {
        $_SESSION['error'] = "File upload failed.";
    }
}

header("Location: archive.php");
exit;
