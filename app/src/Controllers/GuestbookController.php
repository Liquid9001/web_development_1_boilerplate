<?php

namespace App\Controllers;

use App\Config;

class GuestbookController
{
    public function getAll()
    {
        try {
            $connectionString = "mysql:host=" . Config::DB_SERVER_NAME . ";dbname=" . Config::DB_NAME . ";";

            $connection = new \PDO(
                $connectionString,
                Config::DB_USERNAME,
                Config::DB_PASSWORD
            );

            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT id, posted_at, name, email, message FROM posts";
            $results = $connection->query($sql);
            $posts = $results->fetchAll(\PDO::FETCH_ASSOC);
            require __DIR__ . '/../Views/guestbook.php';


        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function postMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = htmlspecialchars($_POST['name'] ?? 'Anonymous');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $message = htmlspecialchars($_POST['message'] ?? '');

            try {
                $connectionString = "mysql:host=" . Config::DB_SERVER_NAME . ";dbname=" . Config::DB_NAME . ";";

                $connection = new \PDO(
                    $connectionString,
                    Config::DB_USERNAME,
                    Config::DB_PASSWORD
                );
                $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO posts (name, email, message) VALUES (:name, :email, :message)";
                $stmt = $connection->prepare($sql);
                $stmt->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':message' => $message
                ]);
                header('Location: /guestbook');
                exit();
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }

    }
}