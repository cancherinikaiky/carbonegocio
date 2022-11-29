<?php 

namespace Source\Models;

use MongoDB\Driver\WriteConcern;
use Source\Core\Connect;

class Worker {
    private $id;
    private $company_name;
    private $name;
    private $cpf;
    private $email;
    private $phone;
    private $description;
    private $photo;
    private $idCategory;

    public function __construct
    (
        int $id = NULL,
        string $company_name = NULL,
        string $name = NULL,
        string $cpf = NULL,
        string $email = NULL,
        string $phone = NULL,
        string $description = NULL,
        string $photo = NULL,
        int $idCategory = NULL
    )
    {
        $this->id = $id;
        $this->company_name = $company_name;
        $this->name = $name;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->phone = $phone;
        $this->description = $description;
        $this->photo = $photo;
        $this->idCategory = $idCategory;
    }

    public function create(){
        $query = "INSERT INTO workers (company_name, name, cpf, email, phone, description, photo) VALUES (:company_name, :name, :cpf, :email, :phone, :description, :photo)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":company_name", $this->company_name);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":photo", $this->photo);

        $stmt->execute();
        return Connect::getInstance()->lastInsertId();
    }

    public function createWorkerCategory($idWorker) {
        $query = "INSERT INTO worker_categories (id_worker, id_category) VALUES (:id_worker, :id_category)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id_worker", $idWorker);
        $stmt->bindParam(":id_category", $this->idCategory);

        $stmt->execute();
        return true;
    }

    public function selectAll() {
        $query = "SELECT * FROM workers";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0) {
            return false;
        }else {
            return $stmt->fetchAll();
        }
    }

    public function findByIdWorker($id) {
        $query = "SELECT * FROM worker_categories WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if($stmt->rowCount() == 0) {
            return false;
        }else {
            return $stmt->fetchAll();
        }
    }

    public function findById($id) {
        $query = "SELECT * FROM workers WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if($stmt->rowCount() == 0) {
            return false;
        }else {
            return $stmt->fetchAll();
        }
//        $this->id = $worker->id;
//        $this->company_name = $worker->company_name;
//        $this->name = $worker->name;
//        $this->cpf = $worker->cpf;
//        $this->email = $worker->email;
//        $this->phone = $worker->phone;
//        $this->description = $worker->description;
//        $this->photo = $worker->photo;
//
//            $json = [
//                "id" => $this->id,
//                "company_name" => $this->company_name,
//                "name" => $this->name,
//                "cpf" => $this->cpf,
//                "email" => $this->email,
//                "phone" => $this->phone,
//                "description" => $this->description,
//                "photo" => $this->photo
//            ];
//            return $json;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCompanyName() {
        return $this->company_name;
    }

    public function setCompanyName($company_name) {
        $this->id = $company_name;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setPhoto($photo) {
        $this->phoneo = $photo;
    }
}