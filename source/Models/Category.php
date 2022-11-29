<?php 

namespace Source\Models;

use Source\Core\Connect;

class Category {
    private $id;
    private $field;

    public function __construct
    (
        int $id = NULL,
        string $field = NULL
    )
    {
        $this->id = $id;
        $this->field = $field;
    }

    public function selectAll() {
        $query = "SELECT * FROM categories";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findById($id) {
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if($stmt->rowCount() == 0) {
            return false;
        }else {
            return $stmt->fetch();
        }
    }


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getField() {
        return $this->field;
    }

    public function setField($field) {
        $this->field = $field;
    }
}