<?php 

namespace Source\Models;

use Source\Core\Connect;

class Administration 
{
    private $id;
    private $name;
    private $email;
    private $password;


    public function __construct(
        int $id = NULL,
        string $name = NULL,
        string $email = NULL,
        string $password = NULL
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function create() {
        $query = "INSERT INTO admin (name, password, email) VALUES (:name, :password, :email)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();
        return true;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPasswordtId() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}