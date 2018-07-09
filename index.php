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