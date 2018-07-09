<?php

require_once('model/backend/PostManagerBack.php');
require_once('model/backend/CommentManagerBack.php');
require_once('model/backend/AdminManager.php');

class ControllerBack{
    
    public function display_admin_connect(){
        require('view/backend/admin_connect.php');
    }
    
    public function is_admin($user_name, $pwd){
        if($_SESSION['connect_error'] != ""){
             header('location:index.php?action=admin_connect');
        }
        else{
            $AdminM = new AdminManager;
            if($AdminM->is_admin($user_name, $pwd)){
                $_SESSION['user_name'] = $user_name;
                $_SESSION['admin'] = 1;
                header('location:index.php?action=admin_home');
            }
            else{
                $_SESSION['connect_error'] = 'Le nom d\'utilisateur ou le mot de passe est incorrect';
                header('location:index.php?action=admin_connect');
            }
        }
    }
    
    public function admin_home(){
        $postM = new PostManagerBack;
        $publishedP = $postM->last_published_post();
        $savedP = $postM->last_saved_post();
        $commentM = new CommentManagerBack;
        $last_coms = $commentM->last_coms();
        require('view/backend/admin_home.php');
    }

    public function new_chapter_interface(){
        require('view/backend/new_chapter.php');
    }
    
    public function add_post($title, $chapter, $content, $published){
        $postM = new PostManagerBack;
        $postM->add_post($title, $chapter, $content, $published);
        $this->editing_interface('last');
    }
    
    public function get_chapter($chapter){
        $postM = new PostManagerBack;
        $list = $postM->get_chapter($chapter);
        require('view/backend/display_posts.php');
    }
    
    public function get_posts_cate($cate){
        $postM = new PostManagerBack;
        $list = $postM->get_posts_cate($cate);
        require('view/backend/display_posts.php');
    }
    public function get_posts(){
        $postM = new PostManagerBack;
        $list = $postM->get_posts();
        require('view/backend/display_posts.php');
    }
    public function  delete_post($post_id, $page){
        $postM = new PostManagerBack;
        $postM->delete_post($post_id);
        header('location: index.php?action='.$page);
    }
    
    public function editing_interface($post_id){
        $postM = new PostManagerBack;
        $data = $postM->get_post($post_id);
        require('view/backend/editing_interface.php');
    }
    
    public function update_post($post_id, $title, $chapter, $content, $published){
        $postM = new PostManagerBack;
        $postM->update_post($post_id, $title, $chapter, $content, $published);
        $data = $postM->get_post($post_id);
        require('view/backend/editing_interface.php');
    }
    
    public function display_coms($cate, $from){
        if($cate == 'signaled' ){ 
            $commentM = new CommentManagerBack;
            $list = $commentM->get_coms($cate);
            require('view/backend/display_comments.php');
        }
        elseif($cate == 'all'){
            $commentM = new CommentManagerBack;
            $list = $commentM->get_coms($cate);
            require('view/backend/display_comments.php');
        }
    }
    
    public function chapter_coms($chapter, $from){
        $commentM = new CommentManagerBack;
        $list = $commentM->get_chapter_coms($chapter);
        require('view/backend/display_comments.php');
    }
    
    public function delete_com($com_id, $from){
        $commentM = new CommentManagerBack;
        $commentM->delete_com($com_id);
        if($from == "admin_home"){
            header('location: index.php?action=admin_home'); 
        }
        elseif($from == "all=1" || $from == "signaled=1"){
            header('location: index.php?action=display_coms&'.$from); 
        }
        else{
            header('location: index.php?action=chapter_coms&chapter='.$from); 
        }
    }
    
    public function validate_com($com_id, $from){
        $commentM = new CommentManagerBack;
        $commentM->validate_com($com_id);
        if($from == "admin_home"){
            header('location: index.php?action=admin_home'); 
        }
        elseif($from == "all=1" || $from == "signaled=1"){
            header('location: index.php?action=display_coms&'.$from); 
        }
        else{
            header('location: index.php?action=chapter_coms&chapter='.$from); 
        }
    }
    
}
    
    
    