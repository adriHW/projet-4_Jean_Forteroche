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
 
 
}