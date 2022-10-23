<?php 

require_once 'database.php';

class Book extends BaseModel {
    public $title;
    public $isbn;
    public $author_id;
    public $author_name;
    public $current_price;
    public $original_price;
    public $stock;
    public $published_date;
    public $deleted = false;

    public function __construct($db)
    {
        parent::__construct($db, 'book');
    }

    public function select_all() {
        $sql = "SELECT book.id, title, isbn, author.name as author_name, author_id,
                    COALESCE(current_price, original_price) as price
                    FROM book inner join author on book.author_id = author.id 
                    where book.deleted = false;";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function insert() {
        // validate them first
        $data = $this->to_assoc_array();
        return parent::create($data);
    }
    public function get() {
        $stmt = parent::get();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title = $row['title'];
        $this->isbn = $row['isbn'];
        $this->author_id = $row['author_id'];
        $this->current_price = $row['current_price'];
        $this->original_price = $row['original_price'];
        $this->stock = $row['stock'];
        $this->published_date = $row['published_date'];
    }
    public function update() {
         $new_data = $this->to_assoc_array();
         return parent::update_record($new_data);
    }
    private function to_assoc_array() {
        // convert obj properties into an assoc array
        $data = array(
            "isbn" => $this->isbn,
            "title" => $this->title,
            "author_id" => $this->author_id,
            "current_price" => $this->current_price,
            "original_price" => $this->original_price,
            "stock" => $this -> stock,
            "published_date" => $this->published_date
        );
        return $data;
    }
    public function get_prerequisites() {
        $sql = "
        WITH RECURSIVE books_extended(id, title, prerequisites_path)
        AS
        (
        SELECT id, title, title
        FROM book
        WHERE prerequisite_id IS NULL
        UNION ALL
        SELECT B2.id, B2.title, CONCAT(B1.prerequisites_path, '->', B2.title)
        FROM books_extended B1 JOIN book B2 ON B1.id=B2.prerequisite_id
        )
        SELECT * FROM books_extended;
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}


?>