<?php
    include('./repositories/postRepository.php');

    class postController{
        private $postRepository;
        private $commentRepository;

        public function __construct(){
            $this->postRepository = new postRepository();
            $this->commentRepository = new commentRepository();
        }

        public function makePost($title, $content){
            $response = [
                'code' =>'',
                'content' => ''
            ];

            if(empty($title) || empty($content)){
                $response->code = 400;
                $response->content = 'Um ou mais campos não foram preenchidos';
                return $response;
           }

           $response->content = $this->postRepository->create($title, $content);

            if(!$response->content){
                $response->code = 400;
                $response->content = 'Não foi possivel cadastrar o post';
                return $response;
            }

            $response->code = 201;
            return $response;
        }

        public function getPosts(){
            $posts = $this->postRepository->getPosts();

            foreach ($posts as $key => $post) {
                $posts[$key]->comments = $this->commentRepository->getByPost($post->id);
            }

            return $posts;
        }
    }