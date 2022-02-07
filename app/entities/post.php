<?php
    class post {
        private $id;
        public $title;
        public $content;
        public $created_at;
        public $updated_at;

        public function __construct($title, $content){
            $this->title = $title;
            $this->content = $content;
        }

        public function getId(){
            return $this->id;
        }
    }