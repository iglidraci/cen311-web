<?php

class BookManager {
    private PDO $connection;

    public function __construct(Database $db) {
        $this->connection = $db->getConnection();
    }

    public function fetchAll(): array {
        $sql = "select b.id as id, title, isbn, current_price, a.name as author_name 
                from book b inner join author a on b.author_id = a.id where b.deleted = 0";
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data): int {
        $sql = "insert into book (isbn, title, author_id, stock, original_price, 
                    current_price, published_date) 
                    values (:isbn, :title, :author_id, :stock, :original_price, :current_price, :published_date)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);
        return $this->connection->lastInsertId();
    }

    public function get($id) {
        $sql = "select b.*, a.name as author_name from book b inner join author a on b.author_id = a.id 
                where b.id = :id and b.deleted = 0";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($current, $new): int
    {
        $sql = "update book set isbn = :isbn, title = :title, author_id = :author_id,
                stock = :stock, original_price = :original_price, current_price = :current_price,
                published_date = :published_date where id = :id";
        $stmt = $this->connection->prepare($sql);
        $isbn = $new['isbn'] ?? $current['isbn'];
        $title = $new['title'] ?? $current['title'];
        $author_id = $new['author_id'] ?? $current['author_id'];
        $stock = $new['stock'] ?? $current['stock'];
        $original_price = $new['original_price'] ?? $current['original_price'];
        $current_price = $new['current_price'] ?? $current['current_price'];
        $published_date = $new['published_date'] ?? $current['published_date'];
        $stmt->bindParam('isbn', $isbn);
        $stmt->bindParam('title', $title);
        $stmt->bindParam('author_id', $author_id);
        $stmt->bindParam('stock', $stock);
        $stmt->bindParam('original_price', $original_price);
        $stmt->bindParam('current_price', $current_price);
        $stmt->bindParam('published_date', $published_date);
        $stmt->bindParam('id', $current['id']);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delete($id): int
    {
        $sql = "update book set deleted=1 where id = :id;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}