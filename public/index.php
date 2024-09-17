<?php
include_once "core/session.php";
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
include "views/auth/login.php";
?>
