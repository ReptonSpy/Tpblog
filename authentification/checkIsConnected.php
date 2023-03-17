<?php
session_start();
if (!$_SESSION['is_connected']) {
    header('location: /connexion.php');
}