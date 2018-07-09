<?php

require_once('model/Manager.php');

class CommentManagerBack extends Manager{
    
    public function get_coms($cate){
        $db = $this->dbConnect();
        if($cate == 'signaled'){
            $req = $db->query('SELECT  com_id, post_id, author, comment, DATE_FORMAT(creation_date, \' le %d/%m/%Y à %Hh%imin%ss \' ) AS creation_date_fr, signaled, moderate, accepted, chapter_com FROM comment WHERE signaled = 1 ORDER BY com_id DESC');
            return $req;
        } 
        elseif($cate == 'all'){
            $req = $db->query('SELECT  com_id, post_id, author, comment, DATE_FORMAT(creation_date, \' le %d/%m/%Y à %Hh%imin%ss \' ) AS creation_date_fr, signaled, moderate, accepted, chapter_com FROM comment ORDER BY com_id DESC');
            return $req;
        }
    }
    
    public function get_chapter_coms($chapter){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT  com_id, post_id, author, comment, DATE_FORMAT(creation_date, \' le %d/%m/%Y à %Hh%imin%ss \' ) AS creation_date_fr, signaled, moderate, accepted, chapter_com FROM comment WHERE chapter_com = :chapter ORDER BY com_id DESC');
        $req->execute(array(':chapter' => $chapter));
        
        return $req;
    }
    
    public function delete_com($com_id){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET comment = "Ce message a été supprimé.", moderate=1, accepted=0  WHERE com_id = :com_id');
        $req->execute(array(':com_id' => $com_id));
    }
    
    public function validate_com($com_id){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment SET moderate=1, accepted=1 WHERE com_id = :com_id');
        $req->execute(array(':com_id' => $com_id));
    }
    
    public function last_coms(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT  com_id, post_id, author, comment, DATE_FORMAT(creation_date, \' le %d/%m/%Y à %Hh%imin%ss \' ) AS creation_date_fr, signaled, moderate, accepted, chapter_com FROM comment ORDER BY com_id DESC LIMIT 5');
        return $req;
    }
    
}