<?php

require_once 'db.php';

try {
    // simply update an author
    $db->query("update author set name = 'Socrates' where name = 'Plato'");
    /*
     * Prepared statements
     * They can be thought of as a kind of compiled template for the SQL that an application wants to run,
     * that can be customized using variable parameters.
     * PDO::prepare() prepares an SQL statement to be executed by the PDOStatement::execute() method.
     * PDO::prepare() returns a PDOStatement object
     * The statement template can contain zero or more named (:name) or question mark (?) parameter markers for
     * which real values will be substituted when the statement is executed
     * */

    $statement = $db->prepare("select * from author");
    $statement->execute();
    // PDOStatement::fetch() Fetches a row from a result set associated with a PDOStatement object
    while ($row = $statement->fetch()) {
        echo "id " . $row['id'] . ", name " . $row['name'], "<br>";
    }
    // here we prepare the SQL statement with placeholders
    $statement = $db->prepare("insert into book (isbn, title, author_id, stock, original_price, 
                  current_price, published_date) values (:isbn, :title, :author_id, :stock, :original_price,
                                                         :current_price, :published_date)");
    // Execute a prepared statement with an array of named values
    $statement->execute(array(
        'isbn' => '1234567891234',
        'title' => 'Book1',
        'author_id' => 1,
        'stock' => 10,
        'original_price' => 200.5,
        'current_price' => 190.5,
        'published_date' => '2022-01-31'
    ));

    $db = null; // explicitly close the db connection

} catch (PDOException $exception) {
    echo "DB error:" . $exception->getMessage() . "<br>";
}