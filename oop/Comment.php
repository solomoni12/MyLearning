<?php
    
    class Comment{
        private $user;
        private $content;

        public function __construct(User $user, $content)
        {
            $this->user = $user;
            $this->content = $content;
        }

        public function getUser(){
            return $this->user;
        }

        public function getContent(){
            return $this->content;
        }
    }
?>