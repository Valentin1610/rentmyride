<?php

require_once __DIR__ . '/../config/databaseController.php';
require_once __DIR__ . '/../config/regex.php';

class Vehicle
{
    private int $id_vehicles;
    private string $brand;
    private string $model;
    private string $registration;
    private int $mileage;
    private string $picture;
    private DateTime $created_at;
    private DateTime $updated_at;
    private DateTime $deleted_at;
    private int $id_types;

    // Recuperer l'ID de la table vehicles
    public function get_Id_vehicles(): int
    {
        return $this->id_vehicles;
    }
    // Set de l'ID de la table vehicles
    public function set_Id_vehicles(int $id_vehicles)
    {
        $this->id_vehicles=$id_vehicles;
    }
    
    public function get_brand() : string
    {
        return $this->brand;
    } 
    public function set_brand(string $brand)
    {
        $this->brand=$brand;
    }

    public function get_model() :string 
    {
        return $this->model;
    }
    public function set_model(string $model)
    {
        $this->model= $model;
    }

    public function get_registration() : string
    {
        return $this->registration;
    }
    public function set_registration(string $registration)
    {
        $this->registration = $registration;
    }

    public function get_mileage() : int
    {
        return $this->mileage;
    }
    public function set_mileage(int $mileage)
    {
        $this->mileage= $mileage;
    }

    public function get_picture() : string
    {
        return $this->picture;
    }
    public function set_picture(string $picture)
    {
        $this->picture=$picture;
    }

    public function get_created_at() : DateTime
    {
        return $this->created_at;
    }
    public function set_created_at(DateTime $created_at)
    {
        $this->created_at= $created_at;
    }

    public function get_updated_at() : DateTime
    {
        return $this->updated_at;
    }
    public function set_updated_at(DateTime $updated_at)
    {
        $this->updated_at= $updated_at;
    }

    public function get_deleted_at() : DateTime
    {
        return $this->deleted_at;
    }
    public function set_deleted_at(DateTime $deleted_at)
    {
        $this->deleted_at= $deleted_at;
    }

    public function get_id_types () : int
    {
        return $this->id_types;
    }
    
    public function set_id_types(int $id_types)
    {
        $this->id_types=$id_types;
    }

    public static function get_all() : array
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `vehicles`;';
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll();

        return $result;
    }
    public function insert() :bool 
    {
        $pdo = connect();
        $sql = "INSERT INTO `vehicles` (`brand`, `model`, `registration`, `mileage`, `picture`, `id_types`) 
        VALUE (:brand, :model, :registration, :mileage, :picture, :id_types);";
        $sth = $pdo->prepare($sql);
        
        $sth->bindValue(':brand', $this->get_brand());
        $sth->bindValue(':model', $this->get_model());
        $sth->bindValue(':registration', $this->get_registration());
        $sth->bindValue(':mileage', $this->get_mileage(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->get_picture());
        $sth->bindValue(':id_types', $this->get_id_types(), PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;

    }
} 
