<?php
session_start();

require __DIR__ . '/../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

echo "Welkom! Je bent ingelogd.";