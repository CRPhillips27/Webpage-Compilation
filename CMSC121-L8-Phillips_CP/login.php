<?php
// Check if both username and password are provided
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        $username = $_POST['name'];
        $password = $_POST['password'];

    // Replace these values with your correct username and password
        $correctUsername = "student number";
        $correctPassword = "12345";

    // Check if the provided username and password are correct
        if ($username === $correctUsername && $password === $correctPassword) {
        // Set up a user session to remember the user
            session_start();
            $_SESSION['name'] = $username;

        // Redirect the user to the desired page, e.g., todolist.php
            header("Location: todolist.php");
            exit();
        } else {
        // Redirect the user back to index.php with an error message
            header("Location: index.php?error=1");
            exit();
        }
    }

    else {
    // If either username or password is missing, issue an HTTP 400 error (Bad Request)
        http_response_code(400);
        exit();
    }
?>