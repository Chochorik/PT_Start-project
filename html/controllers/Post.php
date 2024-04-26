<?php

class Post
{
    protected object $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:hostname=db;dbname=project', 'root', 'kali');
        } catch (PDOException $exception) {
            echo 'Не удалось подключиться к базе данных: ' . $exception->getMessage();
        }
    }

    public function create($title, $text): void
    {
        if (!$title || !$text) {
            die('Заполните все поля!');
        }

        $statement = $this->connection->prepare("INSERT INTO posts (title, main_text) VALUES ('$title', '$text')");

        try {
            $statement->execute();
        } catch (PDOException $exception) {
            die('Ошибка: ' . $exception->getMessage());
        }
    }

    public function getAll()
    {
        $statement = $this->connection->prepare('SELECT * FROM posts');
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM posts WHERE id=$id");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}