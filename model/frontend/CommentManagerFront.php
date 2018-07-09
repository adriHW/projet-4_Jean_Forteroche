<?php 

require_once('model/Manager.php');


class CommentManagerFront extends Manager{
    
    
    public function getComments($post_id){
         $db = $this->dbConnect();
         $req = $db->prepare('SELECT com_id, post_id, author, comment, DATE_FORMAT(creation_date, \' %d/%m/%Y à %Hh%imin%ss \') AS creation_date_fr, signaled, moderate, accepted FROM comment WHERE post_id = :post_id ORDER BY com_id DESC');
         $req->execute(array( ':post_id' => $post_id));
         
         return $req;
     }
     
     public function add_comment($post_id, $author, $comment, $chapter_com){
         $db = $this->dbConnect();
         $req = $db->prepare('INSERT INTO comment (post_id, author, comment, creation_date, chapter_com) VALUES( :post_id, :author, :comment, NOW(), :chapter_com)');
         $add_line = $req->execute(array(
             ':post_id' => $post_id,
             ':author' => $author,
             ':comment' => $comment,
             ':chapter_com' =>$chapter_com
         ));
         return $add_line;
     }
     
     public function signaled_comment($com_id){
         $db = $this->dbConnect();
         echo $com_id;
         $req = $db->prepare('UPDATE comment SET signaled=1 WHERE com_id = :com_id');
         $req->execute(array(':com_id' => $com_id));
     }
}