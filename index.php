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