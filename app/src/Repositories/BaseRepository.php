<?php

namespace App\Repositories;

use PDO;
use App\Config;

class BaseRepository
{
    public PDO $connection;

    public function __construct()
    {
        $connectionString = "mysql:host=" . Config::DB_SERVER_NAME . ";dbname=" . Config::DB_NAME . ";";
        $this->connection = new PDO(
            $connectionString,
            Config::DB_USERNAME,
            Config::DB_PASSWORD
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}