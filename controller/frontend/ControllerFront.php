<?php

require_once('model/frontend/PostManagerFront.php');
require_once('model/frontend/CommentManagerFront.php');


class ControllerFront{
    
    public function display_home(){
        $postM = new PostManagerFront;
        $chapter_count = $postM->chapter_count();
        require('view/frontend/home.php');
    }
    
    
    
}