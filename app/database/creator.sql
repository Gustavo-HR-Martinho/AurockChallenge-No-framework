CREATE DATABASE noframework;
CREATE TABLE Posts (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title VARCHAR(50) NOT NULL,
    content text NOT NULL
);
CREATE TABLE Comments (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    authorname VARCHAR(32) NOT NULL,
    content text NOT NULL,
    post_id INT NOT NULL,
    FOREIGN KEY (post_id) REFERENCES Posts(id)
);