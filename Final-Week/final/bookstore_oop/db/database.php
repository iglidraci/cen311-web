<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    abstract class Environment
    {
        const Development = 0;
        const Production = 1;
    }
    
    class Database {
        private $host = 'localhost';
        private $db;
        private $user;
        private $password;
        private $charset = 'utf8mb4';
        private $connection = null;
        private $environment = Environment::Production;
        public function __construct () {
            if ($this->environment === Environment::Development) {
                $this -> db = 'bookstore_db';
                $this -> user = 'root';
                $this -> password = '';
            } elseif ($this -> environment === Environment::Production) {
                $this -> db = 'web22_idraci';
                $this -> user = 'idraci';
                // get it from environment variables
                $this -> password = '';
            }
        }
        
        // get the pdo object
        public function get_connection() {
            try {
                $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
                $pdo = new PDO($dsn, $this -> user, $this -> password);
                $this->connection = $pdo;
                // show me there is an error
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                echo '<div class="alert alert-danger" role="alert">
                        Failed to connect. '. $ex -> getMessage() .'</div>';
            }
            return $this->connection;
        }
    }

    abstract class BaseModel {
        public $connection;
        public $table_name;      
        public $id;
        public $delete_record = false;
        public function __construct($db, $table_name)
        {
            $this->connection = $db;
            $this->table_name = $table_name;
        }

        public function select_all() {
            $sql = "select * from " . $this->table_name . " where deleted=false";
            return $this->connection->query($sql);
        }
        private function delete_record() {
            try {
                $sql = "delete from $this -> table_name where id=:id";
                $stmt = $this -> connection -> prepare($sql);
                $stmt -> bindParam(":id", $this -> id);
                if ($stmt -> execute())
                    return true;
                return false;
            } catch (PDOException $ex) {
                echo $ex -> getMessage() . '<br>';
                return false;
            }
        }

        public function get() {
            $sql = "select * from " . $this->table_name . " where deleted=false and id=:id limit 1";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
            return $stmt;
        }

        protected function create($data) {
            try {
                $map_func = function($el) {
                    return ":$el";
                };
                $keys = implode(", ", array_keys($data));
                $values = implode(", ", array_map($map_func, array_keys($data)));
                $sql = "insert into $this->table_name ($keys) values ($values);";
                $stmt = $this ->connection -> prepare($sql);
                $stmt -> execute($data);
                return true;
            } catch (PDOException $ex) {
                echo $ex -> getMessage() . '<br>';
                return false;
            }
        }

        protected function update_record ($new_data) {
            try {
                $map_func = function($el) {
                    return "$el=:$el";
                };
                $placeholders = implode(", ", array_map($map_func, array_keys($new_data)));
                $sql = "update $this->table_name set $placeholders where id=:id";
                $new_data['id'] = $this->id;
                $stmt = $this->connection->prepare($sql);
                $stmt -> execute($new_data);
                return true;
            } catch (PDOException $ex) {
                echo $ex -> getMessage() . '<br>';
                return false;
            }
        }

        public function delete() {
            if ($this->delete_record)
                return $this->delete_record();
            else return $this->update_record(array('deleted' => true));
        }
    }

    $database = new Database();
    $connection = $database -> get_connection();
?>