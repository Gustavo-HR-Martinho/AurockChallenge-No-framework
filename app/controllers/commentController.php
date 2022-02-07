<?php
    include('./repositories/commentRepository.php');

    class commentController{
        private $repository;

        public function __construct(){
            $this->repository = new commentRepository();
        }

        public function makeComment($authorname, $content, $post_id){
            $response = $this->repository->create($authorname, $content, $post_id);
            return $response;
        }
    }