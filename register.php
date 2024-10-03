<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Trim the inputs to avoid unnecessary spaces
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    
    // Initialize an array for errors
    $errors = [];

    // Basic validation
    if (empty($username)) {
        $errors[] = 'Username is required.';
    }
    
    if (empty($email)) {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }

    // Check if the username already exists (simple simulation)
    if ($username === 'existingUser') {
        $errors[] = 'Username is already taken.';
    }

    // If there are errors, return them; otherwise, return success
    if (!empty($errors)) {
        echo implode('<br>', $errors);
    } else {
        echo 'Registration successful!';
    }
}
?>

