<?php 
session_start();
require('controller/frontend/ControllerFront.php');
require('controller/backend/ControllerBack.php');


try{
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        
        
//**************************************************************************//
//********************************  FRONTEND   ********************************//
//**************************************************************************//
        
        if($action == 'display_home'){
            $ctrFront = new ControllerFront;
            $ctrFront->display_page("home");
        }
        
        elseif($action == 'display_about'){
            $ctrFront = new ControllerFront;
            $ctrFront->display_page("about");
        }
        
        elseif($action == 'display_chapters'){
            if(isset($_GET['page_nb']) && is_int((int)$_GET['page_nb'])){
                $page_nb = (int)$_GET['page_nb'];
                $max_page = ceil($_SESSION['chapter_count']/6);
                if($page_nb > 0 && $page_nb <=  $max_page){
                    $ctrFront = new ControllerFront;
                    $ctrFront->display_chapters($page_nb);
                }
                else{
                    $_SESSION['error_mess'] = 'La page que vous recherchez n\'existe pas.';
                    $ctrFront = new ControllerFront();
                    $ctrFront->display_page("home");
                }
            }
            else{
                $_SESSION['error_mess'] = 'La page que vous recherchez n\'existe pas.';
                $ctrFront = new ControllerFront();
                $ctrFront->display_page("home");
            }
        }
        
        elseif($action == 'display_contact'){
            $ctrFront = new ControllerFront;
            $ctrFront->display_page("contact");
        }
        
        elseif($action == 'get_post'){
            if(isset($_GET['chapter'])){
                $chapter = (int)$_GET['chapter'];
                if($chapter > 0 && $chapter <= $_SESSION['chapter_count']){
                    $ctrFront = new ControllerFront;
                    $ctrFront->display_chapter($chapter);
                }
                else{
                    $_SESSION['error_mess'] = 'Le chapitre que vous recherchez n\'existe pas.<br> Ce livre contient '.$_SESSION['chapter_count'].' Chapitres';
                    $ctrFront = new ControllerFront();
                    $ctrFront->display_page("home");
                }
            }
            elseif(isset($_POST['chapter'])){
                $chapter = (int)$_POST['chapter'];
                $ctrFront = new ControllerFront;
                $ctrFront->display_chapter($chapter);
            }
            else{
                $_SESSION['error_mess'] = 'La page que vous recherchez n\'existe pas.';
                $ctrFront = new ControllerFront();
                $ctrFront->display_page("home");
            }
        }
        
        elseif($action == 'post_comment'){
            if(isset($_POST['post_id']) && isset($_POST['chapter'])){
                $id = (int) $_POST['post_id'];
                $chapter = (int) $_POST['chapter'];
                $author = $_POST['author'];
                $comment = $_POST['comment'];
                
                if(!empty($_POST['author']) && !empty($_POST['comment'])){
                    $ctrFront = new ControllerFront;
                    $ctrFront->add_comment($id, $chapter, $author, $comment);
                }
                else{
                    $_SESSION['error_mess'] = 'Pour envoyer un commentaire vous devez remplir les champs: Votre pseudo et votre commentaire';
                    $ctrFront = new ControllerFront;
                    $ctrFront->add_comment($id, $chapter, $author, $comment);
                }
            }
            else{
                throw new Exception('Identifiant incorrect');
            }
        }
        
        elseif($action == 'signaled'){
            if(!empty($_GET['com_id'])){
                $com_id = (int)$_GET['com_id'];
                $chapter = (int)$_GET['chapter'];
                echo $com_id;
                $ctrFront = new ControllerFront;
                $ctrFront->signaled_comment($com_id, $chapter);
            }
            else{
                throw new Exception('Identifiant manquant');
            }
        }
        
//**************************************************************************//
//********************************  BACKEND   ********************************//
//**************************************************************************//
        
        
//**************************************************************************//
//********************************  CONNECTION   ********************************//
//**************************************************************************//
        
        
        
        
        elseif($action == 'admin_connect'){
            if(isset($_SESSION['user_name']) && isset($_SESSION['admin'])){
                $ctrBack = new ControllerBack;
                $ctrBack->admin_home();
            }
            else{    
                $ctrBack = new ControllerBack;
                $ctrBack->display_admin_connect();
            }
        }
        
        elseif($action == 'validation'){
            if(!empty($_POST['user_name']) && !empty($_POST['user_pwd'])){      
                $user_name = $_POST['user_name'];
                $pwd = $_POST['user_pwd'];
                $ctrBack = new ControllerBack;
                $ctrBack->is_admin($user_name, $pwd);
            }
            else{
                $_SESSION['connect_error'] = 'Veuillez remplir les champs: nom d\'utilisateur et mot de passe pour vous connecter.';
                $ctrBack = new ControllerBack;
                $ctrBack->is_admin($user_name, $pwd);
            }
        }
        
        elseif($action == 'admin_home' ){
            $ctrBack = new ControllerBack;
            $ctrBack->admin_home();
        }
        
        elseif($action == 'sign_out'){
            session_destroy();
            $ctrBack = new ControllerBack;
            $ctrBack->display_admin_connect();
        }
        

//**************************************************************************//
//********************************  CHAPTER   ********************************//
//**************************************************************************//
        
        elseif($action == 'new_chapter'){
            $ctrBack = new ControllerBack;
            $ctrBack->new_chapter_interface();
        }
        
        
        elseif($action == 'add_post'){ 
            if(isset($_POST['publish'])){
                if(!empty($_POST['title']) && !empty($_POST['chapter']) && !empty($_POST['content']) ){
                    $published  = 1;
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $chapter = $_POST['chapter'];
                    $ctrBack = new ControllerBack;
                    $add_post_error = "";
                    $ctrBack->add_post($title, $chapter, $content, $published);
                }
                else{
                    $_SESSION['error_mess'] = "Pour publier un chapitre il faut que tous les champs soient remplis. <br> Votre travail a été sauvegardé";
                    $published = 0;
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $chapter = $_POST['chapter'];
                    $ctrBack = new ControllerBack;
                    $ctrBack->add_post($title, $chapter, $content, $published); 
                }
            }
            
            elseif(isset($_POST['save'])){
                $title = $_POST['title'];
                $content = $_POST['content'];
                $chapter = $_POST['chapter'];
                $published = 0;
                $ctrBack = new ControllerBack;
                $ctrBack->add_post($title, $chapter, $content,  $published);
                    
            }
        }
        
        
        elseif($action == 'get_chapter'){
            if(isset($_POST['chapter'])){
                $chapter = $_POST['chapter'];
                $ctrBack = new ControllerBack;
                $ctrBack->get_chapter($chapter);
            }
        }
        elseif($action == 'chapters_list'){
                $ctrBack = new ControllerBack;
            if(isset($_GET['category'])){
                $cate = $_GET['category'];
                if($cate == 0 || $cate == 1){
                    $ctrBack->get_posts_cate($cate);
                }
                else{
                    $ctrBack->admin_home();
                }
            }
            else{
                $ctrBack->get_posts();
            }
        }
        
        
        elseif($action == 'edit_chapter'){
            if(isset($_GET['post_id']) && $_GET['post_id'] > 0 && isset($_GET['from'])){
                $post_id = $_GET['post_id'];
                $ctrBack = new ControllerBack;
                $ctrBack->editing_interface($post_id);
            }
            else{
                throw Exception('Identifiant manquant ou incorrect');
            }
        }   
        
        elseif($action == 'delete_chapter'){
            if(isset($_GET['post_id']) && $_GET['post_id'] > 0 && isset($_GET['from'])){
                $from = $_GET['from'];
                $post_id = $_GET['post_id'];
                $ctrBack = new ControllerBack;
                $ctrBack->delete_post($post_id, $from);
            }
            else{
                throw Exception('Identifiant manquant ou incorrect');
            }
        }
        
        
        
        elseif($action == 'update_post'){ 
            if(isset($_GET['post_id']) && $_GET['post_id'] > 0){
                
                if(isset($_POST['publish'])){ 
                    if(!empty($_POST['title']) && !empty($_POST['chapter']) && !empty($_POST['content'])){
                        $published = 1;
                        $title = $_POST['title'];
                        $content = $_POST['content'];
                        $chapter = $_POST['chapter'];
                        $post_id = $_GET['post_id'];
                        $ctrBack = new ControllerBack;
                        $ctrBack->update_post($post_id, $title, $chapter, $content, $published);
                    }
                    else{

                        $_SESSION['error_mess'] = "Pour publier un chapitre il faut que tous les champs soient remplis. <br> Votre travail a été sauvegardé";
                        $published = 0;
                        $title = $_POST['title'];
                        $content = $_POST['content'];
                        $chapter = $_POST['chapter'];
                        $post_id = $_GET['post_id'];
                        $ctrBack = new ControllerBack;
                        $ctrBack->update_post($post_id, $title, $chapter, $content, $published);
                    }
                }
                elseif(isset($_POST['save'])){

                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $chapter = $_POST['chapter'];
                    $published = 0;
                    $post_id = $_GET['post_id'];
                    $ctrBack = new ControllerBack;
                    $ctrBack->update_post($post_id, $title, $chapter, $content, $published);
                }
            }     
        }
        
        
        
//**************************************************************************//
//********************************  REDIRECTION   ********************************//
//**************************************************************************//
           
        
        else{
            $ctrFront = new ControllerFront();
            $ctrFront->display_page("home");
        }
    }
    
    else{
        $ctrFront = new ControllerFront();
        $ctrFront->display_page("home");
    }
}
catch(Exception $e){
    echo 'Erreur:' . $e->getMessage();
}