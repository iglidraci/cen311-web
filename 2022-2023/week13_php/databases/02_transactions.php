<?php

require_once 'db.php';

try {
    // Throw a PDOException if an error occurs.
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->beginTransaction();
    // PDO::exec() execute an SQL statement and return the number of affected rows
    $db->exec("insert into author (name) values ('Noam Chomsky')");
    $db->exec("insert into author (name) values ('Fyodor Dostoevsky')");

    $db->commit();
} catch (PDOException $exception) {
    $db->rollBack();
    echo "Transaction not completed: " . $exception->getMessage() . '<br>';
}

?>
