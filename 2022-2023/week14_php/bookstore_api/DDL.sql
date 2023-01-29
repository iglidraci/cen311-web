CREATE DATABASE "bookstore_db";

CREATE TABLE IF NOT EXISTS author (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted tinyint(1) default false
)  ENGINE=INNODB;

INSERT INTO `author` (`name`) VALUES ('Plato');
INSERT INTO `author` (`name`) VALUES ('Aristotle');


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