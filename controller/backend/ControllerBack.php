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
    
    
}
    
    
    