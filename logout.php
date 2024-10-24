<?php
session_start();

// Destroy session and remove cookies
session_unset();
session_destroy();

if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, "/");
    setcookie('username', '', time() - 3600, "/");
}

header('Location: login.php');
exit();
?>
