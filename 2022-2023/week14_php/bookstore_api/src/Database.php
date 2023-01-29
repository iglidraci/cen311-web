<?php

class Database {
    public function __construct(private $host = '127.0.0.1', private $db = 'bookstore_db',
                                private $user = 'root', private $password = '') {

    }
    public function getConnection(): PDO {
        $dsn = "mysql:host={$this->host};dbname={$this->db}";
        return new PDO($dsn, $this->user, $this->password, array(
            PDO::ATTR_STRINGIFY_FETCHES => false
        ));
    }
}