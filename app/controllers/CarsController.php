<?php 
namespace App\Controllers;
include config/config.php;

use App\Models\Auta;

class ProductController
{
    public function setConnectionString()
    {
        $this->connectionString = mysqli_connect($this->serverName, $this->userName, $this->passCode, $this->dbName);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
    }
}
