<?php
    class comment {
        private $id;
        public $authorname;
        public $content;
        public $post_id;
        public $created_at;
        public $updated_at;

        public function __construct($authorname, $content, $post_id){
            $this->authorname = $authorname;
            $this->content = $content;
            $this->post_id = $post_id;
        }

        public function getId(){
            return $this->id;
        }
    }