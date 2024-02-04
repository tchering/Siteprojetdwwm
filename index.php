<?php
require 'vendor/autoload.php';
//---lancer la session----par défaut le nom est vide
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (!$_SESSION) {
    $_SESSION['nom'] = '';
}
include("Service/extra.php");

spl_autoload_register('charger');

$path = "accueil";
extract($_GET);
$fileName = ucfirst($path) . "Controller"; // AccueilController ClientController
$filePath = "Controller/$fileName.php";  // Controller/AccueilController.php

if (file_exists($filePath)) {
    $object = new $fileName();
} else {
    echo "desole cet $fileName existe pas";
    die;
}
