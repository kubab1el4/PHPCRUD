<?php 
namespace App\Models;

class Product
{
    protected $id;
    protected $nazwa;
    protected $max_speed;
    protected $silnik;
    protected $masa;
    protected $cena;
    protected $table;

    public function getId()
    {
        return $this->id;
    }

    public function getNazwa()
    {
        return $this->nazwa;
    }

    public function getMaxSpeed()
    {
        return $this->max_speed;
    }

    public function getSilnik()
    {
        return $this->silnik;
    }

    public function getMasa()
    {
        return $this->masa;
    }

    public function getCena()
    {
        return $this->cena;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function setNazwa(string $nazwa)
    {
        $this->nazwa = $nazwa;
    }

    public function setTable($table)
    {
        $this->table=$table;
    }

    public function setMaxSpeed(string $max_speed)
    {
        $this->max_speed = $max_speed;
    }

    public function setSilnik(string $silnik)
    {
        $this->silnik= $silnik;
    }

    public function setMasa(string $masa)
    {
        $this->masa= $masa;
    }
    public function setCena(string $cena)
    {
        $this->cena= $cena;
    }

    public function create(array $data)
    {

    }

    public function read(int $id, string $connectionString)
    {
        $string="SELECT * FROM ".$this->table;
        if ($result = mysqli_query($connectionString, $string)) {
            return json_encode($result);
        }
    }

    public function update(int $id, array $data)
    {

    }

    public function delete(int $id)
    {

    }
}