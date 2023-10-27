<?php 

require_once __DIR__ . '/../config/databaseController.php';

class Client{

    private int $id_clients;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $birthday;
    private int $phone;
    private string $city;
    private int $zipcode;
    private DateTime $created_at;
    private DateTime $updated_at;

    public function get_id_clients(): int{
        return $this->id_clients;
    }
    public function set_id_clients(int $id_clients){
        $this->id_clients = $id_clients;
    }

    public function get_lastname() :string{
        return $this->lastname;
    }

    public function set_lastname(string $lastname){
        $this->lastname = $lastname;
    }

    public function get_firstname() : string{
        return $this -> firstname;
    }
    public function set_firstname(string $firstname){
        $this->firstname = $firstname;
    }

    public function get_email() :string{
        return $this-> email;
    }
    public function set_email(string $email){
        $this->email = $email;
    }

    public function get_birthday() :string{
        return $this->birthday;
    }
    public function set_birthday(string $birthday){
        $this->birthday = $birthday;
    }

    public function get_phone() :int{
        return $this->phone;
    }
    public function set_phone(int $phone){
        $this->phone = $phone;
    }

    public function get_city() :string{
        return $this->city;
    }
    public function set_city(string $city){
        $this->city= $city;
    }

    public function get_zipcode() :int{
        return $this->zipcode;
    }
    public function set_zipcode(int $zipcode){
        $this->zipcode = $zipcode;
    }

    public function get_created_at() :DateTime{
        return $this->created_at;
    }
    public function set_created_at(DateTime $created_at){
        $this->created_at = $created_at; 
    }

    public function get_updated_at() :DateTime{
        return $this->updated_at;
    }
    public function set_updated_at(DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function add() :int
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `clients` (`lastname`, `firstname`, `email`, `birthday`, `phone`, `city`, `zipcode`)
        VALUES (:lastname, :firstname, :email, :birthday, :phone, :city, :zipcode);';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':lastname', $this->get_lastname());
        $sth->bindValue(':firstname', $this->get_firstname());
        $sth->bindValue(':email', $this->get_email());
        $sth->bindValue(':birthday', $this->get_birthday());
        $sth->bindValue(':phone', $this->get_phone());
        $sth->bindValue(':city', $this->get_city());
        $sth->bindValue(':zipcode', $this->get_zipcode());

        $result = $sth->execute();
        return $result;
    }

    public static function get(int $id_clients) :object
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `clients`WHERE `id_clients` = :id_clients;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_clients', $id_clients, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }
}