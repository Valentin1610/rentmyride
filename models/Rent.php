<?php

require_once  __DIR__ . '/../config/databaseController.php';

class Rent
{
    private int $id_rents;
    private string $startdate;
    private string $enddate;
    private DateTime $created_at;
    private DateTime $confirmed_at;
    private int $id_vehicles;
    private int $id_clients;

    public function get_id_rents(): int
    {
        return $this->id_rents;
    }
    public function set_id_rents(int $id_rents)
    {
        $this->id_rents = $id_rents;
    }

    public function get_startdate(): string
    {
        return $this->startdate;
    }
    public function set_startdate(string $startdate)
    {
        $this->startdate = $startdate;
    }

    public function get_enddate(): string
    {
        return $this->enddate;
    }
    public function set_enddate(string $enddate)
    {
        $this->enddate = $enddate;
    }

    public function get_created_at(): DateTime
    {
        return $this->created_at;
    }
    public function set_created_at(DateTime $created_at)
    {
        $this->created_at = $created_at;
    }

    public function get_confirmed_at(): DateTime
    {
        return $this->confirmed_at;
    }
    public function set_confirmed_at(DateTime $confirmed_at)
    {
        $this->confirmed_at = $confirmed_at;
    }

    public function get_id_vehicles(): int
    {
        return $this->id_vehicles;
    }
    public function set_id_vehicles(int $id_vehicles)
    {
        $this->id_vehicles = $id_vehicles;
    }

    public function get_id_clients(): int
    {
        return $this->id_clients;
    }
    public function set_id_clients(int $id_clients)
    {
        $this->id_clients = $id_clients;
    }

    public function add(): bool
    {
        $pdo = Database::connect();
        $sql = "INSERT INTO `rents` (`startdate`, `enddate`, `id_vehicles`, `id_clients`)
        VALUES (:startdate, :enddate, :id_vehicles, :id_clients);";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':startdate', $this->get_startdate());
        $sth->bindValue(':enddate', $this->get_enddate());
        $sth->bindValue(':id_vehicles', $this->get_id_vehicles(), PDO::PARAM_INT);
        $sth->bindValue(':id_clients', $this->get_id_clients(), PDO::PARAM_INT);

        $result = $sth->execute();
        return $result;
    }

    public static function get(int $id_rents)
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `rents` WHERE `id_rents` = :id_rents;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_rents', $id_rents, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }
}
