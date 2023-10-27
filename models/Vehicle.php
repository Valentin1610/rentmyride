<?php

require_once __DIR__ . '/../config/databaseController.php';

class Vehicle
{
    private int $id_vehicles;
    private string $brand;
    private string $model;
    private string $registration;
    private int $mileage;
    private ?string $picture;
    private DateTime $created_at;
    private DateTime $updated_at;
    private ?DateTime $deleted_at;
    private int $id_types;

    // Recuperer l'ID de la table vehicles
    public function get_Id_vehicles(): int
    {
        return $this->id_vehicles;
    }
    // Set de l'ID de la table vehicles
    public function set_Id_vehicles(int $id_vehicles)
    {
        $this->id_vehicles = $id_vehicles;
    }

    public function get_brand(): string
    {
        return $this->brand;
    }
    public function set_brand(string $brand)
    {
        $this->brand = $brand;
    }

    public function get_model(): string
    {
        return $this->model;
    }
    public function set_model(string $model)
    {
        $this->model = $model;
    }

    public function get_registration(): string
    {
        return $this->registration;
    }
    public function set_registration(string $registration)
    {
        $this->registration = $registration;
    }

    public function get_mileage(): int
    {
        return $this->mileage;
    }
    public function set_mileage(int $mileage)
    {
        $this->mileage = $mileage;
    }

    public function get_picture(): ?string
    {
        return $this->picture;
    }
    public function set_picture(?string $picture)
    {
        $this->picture = $picture;
    }

    public function get_created_at(): DateTime
    {
        return $this->created_at;
    }
    public function set_created_at(DateTime $created_at)
    {
        $this->created_at = $created_at;
    }

    public function get_updated_at(): DateTime
    {
        return $this->updated_at;
    }
    public function set_updated_at(?DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function get_deleted_at(): ?DateTime
    {
        return $this->deleted_at;
    }
    public function set_deleted_at(?DateTime $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    public function get_id_types(): int
    {
        return $this->id_types;
    }

    public function set_id_types(int $id_types)
    {
        $this->id_types = $id_types;
    }

    public static function get_all(string $order = "ASC", int $id_types = 0, string $searchs = '', int $page = 1, bool $all = false): array
    {
        $offset = ($page - 1) * NB_ELEMENTS_PER_PAGE;
        $pdo = Database::connect();
        $sql = "SELECT * 
        FROM `vehicles` 
        INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types`
        WHERE `vehicles`.`deleted_at` IS NULL";
        if (!empty($searchs)) {
            $sql = $sql . " AND (`vehicles`.`brand` LIKE :searchs OR `vehicles`.`model` LIKE :searchs)";
        }

        if ($id_types != 0) {
            $sql = $sql . " AND `types`.`id_types` = :id_types";
        }
        $sql = $sql . " ORDER BY `vehicles`.`id_types` $order, `vehicles`.`brand` $order, `vehicles`.`model` $order";

        if ($all == false) {
            $sql = $sql . " LIMIT :limit OFFSET :offset ;";
        }

        $sth = $pdo->prepare($sql);

        if ($id_types != 0) {
            $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        }

        if (!empty($searchs)) {
            $sth->bindValue(':searchs', '%' . $searchs . '%');
        }
        if ($all == false) {
            $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
            $sth->bindValue(':limit', NB_ELEMENTS_PER_PAGE, PDO::PARAM_INT);
        }
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = "INSERT INTO `vehicles` (`brand`, `model`, `registration`, `mileage`, `picture`, `id_types`) 
        VALUES (:brand, :model, :registration, :mileage, :picture, :id_types);";
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

    public static function get(int $id_vehicles): object
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `vehicles` WHERE `id_vehicles` = :id_vehicles ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicles', $id_vehicles, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    public function update(): bool
    {
        $pdo = Database::connect();
        $sql = "UPDATE `vehicles` 
        SET `brand` = :brand, 
        `model` = :model,
        `registration`= :registration,
        `mileage` = :mileage, 
        `picture` =:picture,
        `id_types` = :id_types
        WHERE `id_vehicles`= :id_vehicles;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicles', $this->get_id_vehicles(), PDO::PARAM_INT);
        $sth->bindValue(':brand', $this->get_brand());
        $sth->bindValue(':model', $this->get_model());
        $sth->bindValue(':registration', $this->get_registration());
        $sth->bindValue(':mileage', $this->get_mileage(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->get_picture());
        $sth->bindValue(':id_types', $this->get_id_types(), PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function archive(int $id_vehicles): bool
    {
        $pdo = Database::connect();
        $sql = "UPDATE `vehicles`
        SET `deleted_at` = NOW() 
        WHERE `id_vehicles` = :id_vehicles ;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicles', $id_vehicles);
        $sth->execute();

        return (bool) $sth->rowCount();
    }

    public static function get_archive(string $order): array
    {
        $pdo = Database::connect();
        $sql = "SELECT *
        FROM `vehicles` 
        INNER JOIN `types` ON `vehicles`.`id_types` = `types`. `id_types`
        WHERE `vehicles` . `deleted_at` IS NOT NULL 
        ORDER BY `vehicles` . `brand` $order ;";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }

    public static function restore(string $order): array
    {

        $pdo = Database::connect();
        $sql = "SELECT `vehicles`. *, `types`. `type`
        FROM `vehicles`
        INNER JOIN `types` 
        ON `vehicles`. `id_vehicles` = `types`. `id_types`
        WHERE `deleted_at` IS NULL 
        ORDER BY `types`. `type`, `vehicles`.$order ;";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }
}
