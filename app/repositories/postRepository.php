<?php
    include('./entities/post.php');

    class postRepository{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost; dbname=noFramework', 'root', '');
        }

        public function create($title, $content){
            $newPost = new post($title, $content);
            $save = $this->db->prepare('INSERT INTO Posts(title, content) VALUES (?, ?)');
            $save->execute(array($newPost->title, $newPost->content));

            if($save){
                return true;
            }
            return false;
        }

        public function getPosts(){
            $get = $this->db->prepare("SELECT * FROM Posts");
            $get->execute();
            $result = $get->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
    }