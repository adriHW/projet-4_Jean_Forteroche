<?php

require_once('model/Manager.php');

class PostManagerBack extends Manager{
    
    public function add_post($title, $chapter, $content, $published){
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO post (title, content, creation_date, published, chapter) VALUE(:title, :content, NOW(), :published, :chapter)');
        $addPost = $req->execute(array (
            ':title' => $title, 
            ':content' => $content,
            ':published' => $published,
            ':chapter' => $chapter
        ));
        return $addPost;
    }
    
    public function get_post($post_id){
        
        $db = $this->dbconnect();
        
        if($post_id == 'last'){
            $req = $db->query('SELECT post_id, title, content, creation_date, published, chapter FROM post ORDER BY post_id DESC LIMIT 1');
            $post = $req->fetch();
    
            return $post;
        }
        else{  
            $req = $db->prepare('SELECT post_id, title, content, creation_date, published, chapter FROM post WHERE post_id = :post_id');
            $req->execute(array(':post_id' => $post_id));
            $post = $req->fetch();
            
            return $post;
        }
        
    }
    
    public function get_posts_cate($cate){
        
        $db = $this->dbConnect();
         
        $req = $db->prepare('SELECT post_id, title, content, published, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss \') AS creation_date_fr, chapter FROM post WHERE published = :published ORDER BY post_id DESC');
        
        $req->execute(array(':published' => $cate));
        
        return $req;
    }
    
    public function get_posts(){
         
         $db = $this->dbConnect();
         
         $data = $db->query('SELECT post_id, title, content, published, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss \') AS creation_date_fr, chapter FROM post ORDER BY post_id DESC');
         return $data;
         
    }
    public function get_chapter($chapter){
        
         $db = $this->dbConnect();
        
         $req = $db->prepare('SELECT post_id, title, content, published, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss \') AS creation_date_fr, chapter FROM post WHERE chapter = :chapter');
        
        $req->execute(array(':chapter' => $chapter));
        
        return $req;
         
    }
    
    public function update_post($post_id, $title, $chapter, $content, $published){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post SET title=:title, chapter=:chapter, content=:content, published=:published WHERE post_id = :post_id');
        $req->execute(array(
            ':title' => $title,
            ':content' => $content, 
            ':published' => $published,
            ':chapter' => (int)$chapter,
            ':post_id' => $post_id
        ));
    }
    
    public function delete_post($post_id){
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM post WHERE post_id = :post_id');
        $req->execute(array(':post_id' => $post_id ));
    }
    
    public function last_published_post(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT post_id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss \') AS creation_date_fr, published, chapter FROM post WHERE published=1  ORDER BY chapter DESC LIMIT 1');
        $post = $req->fetch();
        return $post;
    }
    
    public function last_saved_post(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT post_id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss \') AS creation_date_fr, published, chapter FROM post WHERE published=0 ORDER BY post_id  DESC LIMIT 1');
        $post = $req->fetch();
        return $post;
    }
}