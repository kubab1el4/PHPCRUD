<?php
include_once 'autoloader/autoloader.php';
use App\Models\Auta;
use App\Controllers\CarsController;

$json_dane = $_POST[array_key_first($_POST)];
$idSamochodu = $_POST[array_key_last($_POST)];
$dane = json_decode($json_dane, true);
$database = new CarsController;
$car = new Auta;
$car->update($idSamochodu, $dane, $database->databaseConnect());
$database->stopConnection($database->databaseConnect());