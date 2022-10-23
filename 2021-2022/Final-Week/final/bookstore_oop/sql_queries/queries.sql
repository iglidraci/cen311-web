CREATE TABLE IF NOT EXISTS author (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted tinyint(1) default false
)  ENGINE=INNODB;

INSERT INTO `author` (`name`, `created_at`, `deleted`) VALUES ('Plato', current_timestamp(), '0');
INSERT INTO `author` (`name`, `created_at`, `deleted`) VALUES ('Arisotle', current_timestamp(), '0');


CREATE TABLE IF NOT EXISTS book (
    id INT AUTO_INCREMENT PRIMARY KEY,
    isbn char(13) unique,
    title VARCHAR(255) NOT NULL,
    author_id int,
    FOREIGN KEY (author_id)
        REFERENCES author (id)
        ON UPDATE RESTRICT ON DELETE CASCADE,
    stock int,
    original_price decimal,
    current_price decimal null,
    published_date DATE,
    deleted tinyint(1) DEFAULT false
)  ENGINE=INNODB;


CREATE TABLE if not exists `bookstore_db`.`user` ( `id` INT NOT NULL AUTO_INCREMENT , 
        `username` VARCHAR(50) NOT NULL , `password` VARCHAR(255) NOT NULL ,
        PRIMARY KEY (`id`), UNIQUE `unique_username` (`username`)) ENGINE = InnoDB;


CREATE TABLE if not exists `bookstore_db`.`customer_orders` ( `id` INT NOT NULL AUTO_INCREMENT , `customer` VARCHAR(100) NOT NULL , `Address` INT(100) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


CREATE TABLE if not exists `bookstore_db`.`ordered_books` ( `customer_order_id` INT NOT NULL , `book_id` INT NOT NULL , `price_paid` DECIMAL NOT NULL , `quantity` INT NOT NULL ) ENGINE = InnoDB;
ALTER TABLE `ordered_books` ADD CONSTRAINT `book_fk` FOREIGN KEY (`book_id`) REFERENCES `book`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
ALTER TABLE `ordered_books` ADD CONSTRAINT `order_fk` FOREIGN KEY (`customer_order_id`) REFERENCES `customer_orders`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
ALTER TABLE `ordered_books` ADD PRIMARY KEY(`customer_order_id`, `book_id`);

-- insert data into customer_orders
INSERT INTO `customer_orders` (`id`, `customer`, `Address`) VALUES (NULL, 'Foo', NULL), (NULL, 'Bar', NULL), (NULL, 'John', NULL), (NULL, 'Test', NULL), (NULL, 'Vlad', NULL)

-- stats
select isbn, SUM(ordered_books.price_paid * ordered_books.quantity) as total_generated from book inner join ordered_books on book.id = ordered_books.book_id inner join customer_orders on ordered_books.customer_order_id = customer_orders.id GROUP by book.id order by total_generated DESC;

-- prerequisite
ALTER TABLE `book` ADD `prerequisite_id` INT NULL AFTER `deleted`;
ALTER TABLE `book` ADD CONSTRAINT `prerequisite_fk` FOREIGN KEY (`prerequisite_id`) REFERENCES `book`(`id`) ON DELETE SET NULL ON UPDATE RESTRICT;

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
