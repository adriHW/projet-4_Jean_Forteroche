<?php 

$page_title = 'Liste des chapitres';

ob_start();
?>
<div class="container container_content">
    <div class="row">
        <div class="col-lg-12">
            <h1 id="title_chapters_page">Les chapitres</h1>
        </div>
    </div>
<?php

$countLine = $list->rowCount();

if($countLine == 0){ ?>
    <p id="no_post"> Aucun chapitre trouvé </p>
<?php 
}
else{  
    while($data = $list->fetch()){
        
        $title = $data['title'];
        $chapter = $data['chapter'];
        $date = $data['creation_date_fr'];
        $text = substr($data['content'], 0, 250);
        $post_id = $data['post_id'];
        $published = $data['published'];
        
    ?>
    
    
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col_container">
            <h3>Chapitre <?= $chapter; ?>: <?= $title; ?></h3>
            <p class="date_chapter">le <?= $date; ?></p>
            <?php 
            if($published == 0){
            ?>
                <p class="chapter_info">Ce chapitre n'est pas publié</p>
            <?php 
            } 
            ?>
            <div class='published_container post_container'>
                <div class="extract_post"> 
                    <p><?= $text; ?></p>
                </div>
                
<!--                button              -->
                <div class="post_button">
                    
                    <a href="index.php?action=edit_chapter&amp;post_id=<?= $post_id;?>&from=<?= $_GET['action'];?>"><button class="btn btn_darkB" name="edit">Modifier</button></a>
                    
                    <a href="index.php?action=delete_chapter&amp;post_id=<?= $post_id;?>&from=<?= $_GET['action'];?>"><button class="btn btn_darkB"name="delete">Supprimer</button></a>
                    
                    <?php
                    if($published == 1){
                    ?>
                    <a href="index.php?action=chapter_coms&amp;chapter=<?= $chapter;?>"><button class="btn btn_darkB" name="comment">Voir les commentaires</button></a>
                    <?php 
                    } 
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    <?php
    }
}
?>
</div>


<?php
$content = ob_get_clean();
require('template.php');
?>

