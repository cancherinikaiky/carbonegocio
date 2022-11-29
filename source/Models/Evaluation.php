<?php

namespace Source\Models;

use Source\Core\Connect;

class Evaluation
{
    private $id;
    private $id_worker;
    private $id_client;
    private $title;
    private $service;
    private $text;
    private $date;

    /**
     * @param $id
     * @param $id_worker
     * @param $id_client
     * @param $title
     * @param $service
     * @param $text
     * @param $date
     */
    public function __construct
    (
        $id = NULL,
        $id_worker = NULL,
        $id_client = NULL,
        $title = NULL,
        $service = NULL,
        $text = NULL,
        $date = NULL
    )
    {
        $this->id = $id;
        $this->id_worker = $id_worker;
        $this->id_client = $id_client;
        $this->title = $title;
        $this->service = $service;
        $this->text = $text;
        $this->date = $date;
    }

    public function create() {

    }

    public function findByIdClient() {
        $query = "SELECT * FROM evaluations WHERE id_worker = :id_worker";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id_worker", $this->id_worker);
        $stmt->execute();

        if($stmt->rowCount() == 0) {
            return false;
        }
        return $stmt->fetchAll();
    }

    public function getId(): mixed
    {
        return $this->id;
    }

    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    public function getIdWorker(): mixed
    {
        return $this->id_worker;
    }

    public function setIdWorker(mixed $id_worker): void
    {
        $this->id_worker = $id_worker;
    }

    public function getIdClient(): mixed
    {
        return $this->id_client;
    }

    public function setIdClient(mixed $id_client): void
    {
        $this->id_client = $id_client;
    }

    public function getTitle(): mixed
    {
        return $this->title;
    }

    public function setTitle(mixed $title): void
    {
        $this->title = $title;
    }

    public function getService(): mixed
    {
        return $this->service;
    }

    public function setService(mixed $service): void
    {
        $this->service = $service;
    }

    public function getText(): mixed
    {
        return $this->text;
    }

    public function setText(mixed $text): void
    {
        $this->text = $text;
    }

    public function getDate(): mixed
    {
        return $this->date;
    }

    public function setDate(mixed $date): void
    {
        $this->date = $date;
    }
}