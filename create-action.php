<?php
include_once 'autoloader/autoloader.php';
use App\Models\Auta;
use App\Controllers\CarsController;

$json = array_key_first($_POST);
$data = json_decode($json, true);
$database = new CarsController;
$car = new Auta;
$car->create($data, $database->databaseConnect());