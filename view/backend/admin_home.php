<?php
$page_title = "admin-accueil";
ob_start();  
?>

<div class="container container_content">
    <!--title-->
    <div class="row">
        <div class="col-lg-12">
            <h1>Actualité</h1>
        </div>
    </div>
    
    
    <!--last chapter published-->
    <?php
    $post_idP = $publishedP['post_id'];
    $titleP = htmlspecialchars($publishedP['title']);
    $chapterP = htmlspecialchars($publishedP['chapter']);
    $dateP = $publishedP['creation_date_fr'];
    $contentP = substr($publishedP['content'], 0, 400);
    ?>
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col_container">
            <h2>Le dernier chapitre publié</h2>
            <div class='published_container post_container'>
                <div class="extract_post">
                    <h3>Chapitre <?= $chapterP; ?>: <?= $titleP; ?></h3><p>le <?= $dateP; ?></p> 
                    <p><?= $contentP; ?></p>
                </div>
                
<!--                button              -->
                <div class="post_button">
                    
                    <a href="index.php?action=edit_chapter&amp;post_id=<?= $post_idP;?>&from=<?= $_GET['action'];?>"><button class="btn btn_darkB" name="edit">Modifier</button></a>
                    
                    <a href="index.php?action=delete_chapter&amp;post_id=<?= $post_idP;?>&from=<?= $_GET['action'];?>"><button class="btn btn_darkB"name="delete">Supprimer</button></a>
                    
                    
                    <a href="index.php?action=chapter_coms&amp;chapter=<?= $chapterP;?>"><button class="btn btn_darkB" name="comment">Voir les commentaires</button></a>
                    
                </div>
            </div>
        </div>
    </div>

    <!--last chapter saved-->
    <?php
    $post_idS = $savedP['post_id'];
    $titleS = htmlspecialchars($savedP['title']);
    $chapterS = htmlspecialchars($savedP['chapter']);
    $dateS = $savedP['creation_date_fr'];
    $contentS = substr($savedP['content'], 0, 400);
    ?>
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col_container">
            <h2>Le dernier chapitre sauvegardé <span id="save">(non publié)</span></h2>
            <?php
            if($dateS == ""){
            ?>
                <div class="post_container">
                    <p>Aucun chapitre dans la catégorie chapitre sauvegardé</p>
                </div>
            <?php    
            }
            else{
            ?>
            <div class='saved_container post_container'>
                <div class="extract_post">
                    <h3>Chapitre <?= $chapterS; ?>: <?= $titleS; ?></h3><p>le <?= $dateS; ?></p> 
                    <p><?= $contentS; ?></p>
                </div>
                
<!--                button              -->
                <div class="post_button">
                    
                    <a href="index.php?action=edit_chapter&amp;post_id=<?= $post_idS;?>&from=<?= $_GET['action'];?>"><button class="btn btn_darkB" name="edit">Modifier</button></a>
                    
                    <a href="index.php?action=delete_chapter&amp;post_id=<?= $post_idS;?>&from=<?= $_GET['action'];?>"><button class="btn btn_darkB" name="delete">Supprimer</button></a>
                    
                </div>
            </div>
            <?php    
            }
            ?>
        </div>
    </div>
    
    
    <!--last 5 comments-->
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col_container">
            <h2>Les 5 derniers commentaires</h2>
            <div class="comment_container">
            <?php 
            while($data = $last_coms->fetch()){
                $com_idC = $data['com_id'];
                $post_idC = $data['post_id'];
                $authorC = htmlspecialchars($data['author']);
                $dateC = $data['creation_date_fr'];
                $comC  = htmlspecialchars($data['comment']);
                $chapterC = $data['chapter_com'];
                $moderate = $data['moderate'];
                $signaled = $data['signaled'];
                $accepted = $data['accepted'];
                $from = "admin_home";
            ?>
                <div class="post_container post_container_com">
                    <p class="com_header"> Concernant le chapitre <?= $chapterC; ?> écrit par: <?= $authorC; ?> <br> <span class="com_date"> <?= $dateC; ?></span></p>
                    <?php
                    if($signaled == 1){
                    ?>
                        <p class="signaled_com">Commentaire signalé</p>
                    <?php
                    }
                    ?>
                    <p class="com_text"><?= $comC; ?></p>
                    <div class="button_last_com">
                        
                        
                        
                        <?php
                        if($accepted == 1){
                        ?>
                            <a href="index.php?action=delete_com&amp;com_id=<?= $com_idC; ?>&from=<?= $from; ?>"><button class="btn btn_darkB">Supprimer</button></a>  
                        <?php
                        }
                        ?>
                        
                        <a href="index.php?action=chapter_coms&amp;chapter=<?= $chapterC ;?>"><button class="btn btn_darkB">Commentaires du chapitre <?= $chapterC ;?></button></a>
                        
                        <?php
                        if($signaled == 1 && $moderate == 0){
                        ?>
                            <a href="index.php?action=validate_com&amp;com_id=<?= $com_idC; ?>&from=<?= $from;?>"><button class="btn btn_darkB">Accepter</button></a>
                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
            <?php 
            }
            ?>
            </div>
        </div>
    </div>
</div>
  
<?php
$content = ob_get_clean(); 
require('template.php');
?>



