<?php declare(strict_types=1);

namespace App;

use PDO;

class Database
{
    public function __construct(private string $host,
                                private string $name,
                                private string $user,
                                private string $password)
    {

    }

    public function getConnection(): PDO
    {
        $dns = "pgsql:host=$this->host;dbname=$this->name";

        $pdo = new PDO($dns, $this->user, $this->password,[

            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

        ]);

        return $pdo;
    }
}