<?php

require_once('model/Manager.php');

class PostManagerFront extends Manager{
     
     public function getPosts($page_nb){
         
         $db = $this->dbConnect();
         
         $page_nb = $page_nb*6-5;
         
         $req = $db->prepare('SELECT post_id, title, content, published, DATE_FORMAT(creation_date, \' %d/%m/%Y à %Hh%imin%ss \') AS creation_date_fr, chapter FROM post WHERE published = 1 AND chapter >= :chapter ORDER BY chapter LIMIT 6');
         
         $data = $req->execute(array(":chapter" => $page_nb));
         
         
         
         return $req;
         
     }
    
    public function chapter_count(){
         $db = $this->dbConnect();
         $req = $db->query('SELECT COUNT(post_id) AS count_id FROM post WHERE published=1');
         $count = $req->fetch();
         $chapter_count = $count["count_id"];
         return $chapter_count;
     }
    
     public function getPost($chapter){
        $db = $this->dbconnect();
        $req = $db->prepare('SELECT post_id, title, content, DATE_FORMAT(creation_date, \' %d/%m/%Y à %Hh%imin%ss \') AS creation_date_fr, published, chapter FROM post WHERE chapter = :chapter');
        $req->execute(array(':chapter' => $chapter));
        $post = $req->fetch();
            
        return $post;
     }
 
 
}