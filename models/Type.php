<?php
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../config/databaseController.php';


class Type
{
    private int $id_types;
    private string $type;

    public function get_Id_types(): int
    {
        return $this->id_types;
    }

    public function set_Id_types(int $id_types)
    {
        $this->id_types = $id_types;
    }

    public function get_type(): string
    {
        return $this->type;
    }

    public function set_type(string $type)
    {
        $this->type = $type;
    }

    public function insert(): bool
    {
        $pdo  = connect();
        $sql = 'INSERT INTO `types` (`type`) VALUES (:type) ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $this->get_type());
        $result = $sth->execute();

        return $result;
    }

    public static function isExist(string $type): bool 
    {
        $pdo = connect();
        $sql = "SELECT * FROM `types` WHERE `type` = :type ;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $type);
        $sth->execute();
        $result = $sth->fetch();

        return (bool) $result;
    }
    
    public static function getAll(): array
    {
        $pdo = connect();
        $sql = 'SELECT `type`, `id_types` FROM `types`;';
        $sth = $pdo->query($sql);
        $datas = $sth->fetchAll();

        return $datas;
    }

    public static function get(int $id_types): object
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `types` WHERE `id_types` = :id_type ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_type', $id_types, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    public function update() : bool
    {
        $pdo = connect();
        $sql = 'UPDATE `types` SET `type` = :type WHERE `id_types` = :id_types ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $this->get_type(), PDO::PARAM_STR);
        $sth->bindValue(':id_types', $this->get_Id_types(), PDO::PARAM_INT);
        return $sth->execute();

    }

    public static function delete(int $id_types) : bool
    {
        $pdo = connect();
        $sql = 'DELETE FROM `types` WHERE `id_types` = ?;';
        $sth = $pdo->prepare($sql);
        $sth->execute([$id_types]);
        return (bool) $sth->rowCount();
    }
}
