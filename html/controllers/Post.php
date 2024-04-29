<?php

class Post
{
    protected object $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=db;dbname=project', 'root', 'kali');
        } catch (PDOException $exception) {
            echo 'Не удалось подключиться к базе данных: ' . $exception->getMessage();
        }
    }

    public function create($title, $text): void
    {
        if (!$title || !$text) {
            die('Заполните все поля!');
        }

        $title = strip_tags($title);
        $text = strip_tags($text);

        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

        $statement = $this->connection->prepare("INSERT INTO posts (title, main_text) VALUES (:title, :text)");
        $statement->bindValue('title', $title, PDO::PARAM_STR);
        $statement->bindValue('text', $text, PDO::PARAM_STR);

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
        settype($id, 'integer');

        $statement = $this->connection->prepare("SELECT * FROM posts WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}
