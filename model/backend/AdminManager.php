<?php

require_once('model/Manager.php');

class AdminManager extends Manager{
    
    public function is_admin($user_name, $pwd){
        
        $pwdH = password_hash($pwd, PASSWORD_DEFAULT);
        
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM admin WHERE user_name = :user_name');
        $req->execute(array(':user_name' => $user_name));

        $data = $req->fetch();
        
        $req->closeCursor();
        
        return password_verify($pwd , $data['user_pwd']);
        
    }
}
