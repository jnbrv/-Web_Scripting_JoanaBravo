<?php
session_start();
require "config.php"; // Make sure $conn = new mysqli(...)

// Function to sanitize input
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

/* ----------------------------
   REGISTRATION
----------------------------- */
if (isset($_POST['register'])) {
    $fullname   = sanitize($_POST['fullname']);
    $email      = sanitize($_POST['email']);
    $username   = sanitize($_POST['username']);
    $password   = sanitize($_POST['password']);
    $confirm    = sanitize($_POST['confirm_password']);
    $gender     = sanitize($_POST['gender']);
    $hobbies    = isset($_POST['hobbies']) ? implode(",", $_POST['hobbies']) : "";
    $country    = sanitize($_POST['country']);

    // Validate required fields
    if (empty($fullname) || empty($email) || empty($username) || empty($password) || empty($confirm) || empty($gender) || empty($country)) {
        die("All fields are required.");
    }

    // Check valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Confirm password check
    if ($password !== $confirm) {
        die("Passwords do not match.");
    }

    // Check duplicate username/email
    $checkUser = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $checkUser->bind_param("ss", $username, $email);
    $checkUser->execute();
    $checkUser->store_result();
    if ($checkUser->num_rows > 0) {
        die("Username or Email already exists.");
    }

    // Hash password
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, username, password, gender, hobbies, country) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss", $fullname, $email, $username, $hashedPass, $gender, $hobbies, $country);
    if ($stmt->execute()) {
        echo "✅ Registration successful. <a href='index.php'>Login here</a>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }
    exit();
}

/* ----------------------------
   LOGIN
----------------------------- */
if (isset($_POST['login'])) {
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    if (empty($username) || empty($password)) {
        die("Please fill in all fields.");
    }

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hashedPass);
        $stmt->fetch();
        if (password_verify($password, $hashedPass)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "❌ Invalid password.";
        }
    } else {
        echo "❌ User not found.";
    }
    exit();
}

// If no form was submitted
echo "Invalid request.";
