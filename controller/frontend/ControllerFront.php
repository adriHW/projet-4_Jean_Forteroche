<?php

require_once('model/frontend/PostManagerFront.php');
require_once('model/frontend/CommentManagerFront.php');


class ControllerFront{
    
    public function display_home(){
        $postM = new PostManagerFront;
        $chapter_count = $postM->chapter_count();
        require('view/frontend/home.php');
    }
    
    public function display_page($page){
        if($page == "home"){
            $postM = new PostManagerFront;
            $_SESSION['chapter_count'] = $postM->chapter_count();
            $header = "header_home";
            require('view/frontend/home.php');
        }
        if($page == "about"){
            $header = "header_about";
            require('view/frontend/about.php');
        }
        if($page == "contact"){
            $header = "header_contact";
            require('view/frontend/contact.php');
        }
    }
    
}