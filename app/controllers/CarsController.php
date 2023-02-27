<?php
namespace App\Controllers;

include_once "autoloader/autoloader.php";

use App\Models\Auta;
use PDO;

class CarsController
{
    public function databaseConnect()
    {
        include_once "config/config.php";
        try {
            $dbh = new PDO(
                "mysql:" . DB_HOST . "=localhost;dbname=" . DB_NAME . "",
                DB_USER,
                DB_PASS,
                [PDO::ATTR_PERSISTENT => true]
            );
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $dbh;
    }
    public function stopConnection($dbh)
    {
        $dbh=null;
    }
    public function readAll($dbh)
    {
        $data = [];
        foreach ($dbh->query("SELECT * from auta") as $row) {
            array_push($data, $row);
        }
        $json = json_encode($data);
        return $json;
    }
    public function buildItemList($json)
    {
        $data = json_decode($json, true);
        echo "<ul class='lista list-group p-3 pagination flex-wrap'>";
        foreach ($data as $item) {
            echo "<li class='rekord text-dark list-group-item d-flex justify-content-around d-flex flex-wrap mb-2' id='" . $item["id"] . "'><div>ID: " .
                $item["id"] .
                "</div><div>Nazwa: " .
                $item["nazwa"] .
                "</div><div>Prędkość Maksymalna: " .
                $item["max_speed"] .
                "[km/h]</div><div>Silnik: " .
                $item["silnik"] .
                "</div><div>Masa: " .
                $item["masa"] .
                "[KG]</div><div>Cena: " .
                $item["cena"] .
                "[PLN]</div><button type='button' id='" .
                $item["id"] .
                "'class='delete btn btn-danger'>Usuń</button></li>";
        }
        echo "</ul>";
    }
}