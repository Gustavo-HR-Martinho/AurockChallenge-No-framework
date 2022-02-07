<?php
    include('./entities/comment.php');

    class commentRepository{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost; dbname=noFramework', 'root', '');
        }

        public function create($authorname, $content, $post_id){
            $newComment = new comment($authorname, $content, $post_id);
            $save = $this->db->prepare('INSERT INTO Comments(authorname, content, post_id) VALUES (?, ?, ?)');
            $save->execute(array($newComment->authorname, $newComment->content, $post_id));

            if($save){
                return true;
            }
            return false;
        }

        public function getByPost($post_id){
            $get = $this->db->prepare("SELECT * FROM Comments WHERE post_id = ".$post_id);
            $get->execute();
            $result = $get->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
    }