<?php
// Set the cookie name
$cookieName = 'potato_accessories';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle POST request to save the state to a cookie
    $accessories = isset($_POST['accessories']) ? $_POST['accessories'] : '';

    if (!empty($accessories)) {
        // Set the accessories data in a cookie
        setcookie($cookieName, $accessories, time() + (86400 * 30), "/"); // Cookie valid for 30 days
        echo 'Data saved successfully.';
    } else {
        echo 'No data to save.';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle GET request to retrieve the state from a cookie or create it if it doesn't exist
    if (isset($_COOKIE[$cookieName])) {
        $accessories = $_COOKIE[$cookieName];
        echo $accessories;
    } else {
        // Create the cookie and set its value to an empty string
        setcookie($cookieName, '', time() + (86400 * 30), "/"); // Cookie valid for 30 days
        echo '';
    }
} else {
    // Handle other request methods if needed
    echo 'Unsupported request method.';
}
?>
