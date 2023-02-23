<?php 

namespace App\Controllers;

use App\Models\Auta;

class ProductController
{
    public function displayData()
    {
        $string="SELECT * FROM ".$this->table;
        if ($result = mysqli_query($this->connectionString, $string)) {
            $this->dataSet = $result;
        }
    }
}