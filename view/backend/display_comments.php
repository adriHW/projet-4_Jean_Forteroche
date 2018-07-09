<?php 

$page_title = 'Les commentaires';

ob_start();
?>

<div class="container container_content">

    <?php
    //page title

    if($from == 'signaled=1'){
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1>Les commentaires signalés</h1>
        </div>
    </div>
    <?php
    }
    elseif($from == 'all=1'){
    ?>
        <div class="row">
            <div class="col-lg-12">
                <h1>Tous les commentaires</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="index.php?action=display_coms&amp;signaled=1"><button class="btn btn_darkB">Voir les commentaires signalés</button></a>
            </div>
        </div>
    <?php    
    }
    else{
    ?>
        <div class="row">
            <div class="col-lg-12">
                <h1>Les commentaires du chapitre: <?=$from?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="index.php?action=display_coms&amp;signaled=1"><button class="btn btn_darkB">Voir les commentaires signalés</button></a>
            </div>
        </div>
    <?php   
    }

    //comment

    $count = $list->rowCount();

    if($count == 0){ 

    ?>
        <p id="no_post"> Aucun commentaire trouvé </p>
    <?php 
    }
    else{
    ?>
    <div class="row">
        <div id="list_coms_container" class="col-lg-10 offset-lg-1">
            <?php 
            while($data = $list->fetch() ){

                $author = htmlspecialchars($data['author']);
                $date = $data['creation_date_fr'];
                $comment = htmlspecialchars($data['comment']);
                $chapter = $data["chapter_com"];
                $moderate = $data["moderate"];
                $com_id = $data['com_id'];
                $signaled = $data['signaled'];
                $accepted = $data['accepted'];
            ?>
                <div class="com_post">
                    <p class="com_header"> Concernant le chapitre <?= $chapter; ?> écrit par: <?= $author; ?> <br> <span class="com_date"> <?= $date; ?></span></p>
                    <?php
                    if($signaled == 1){
                    ?>
                        <p class="signaled_com">Commentaire signalé</p>
                    <?php
                    }
                    ?>
                    <p class="com_text"><?= $comment; ?></p>
                    <div class="button_last_com">
                        
                        <?php
                        if($accepted == 1){
                        ?>
                            <a href="index.php?action=delete_com&amp;com_id=<?= $com_id; ?>&from=<?= $from; ?>"><button class="btn btn_darkB">Supprimer</button></a>  
                        <?php
                        }
                        ?>
                        
                        <a href="index.php?action=chapter_coms&amp;chapter=<?= $chapter ;?>"><button class="btn btn_darkB">Commentaires chapitre <?= $chapter ;?></button></a>
                        
                        <?php
                        if($signaled == 1 && $moderate == 0){
                        ?>
                            <a href="index.php?action=validate_com&amp;com_id=<?= $com_id; ?>&from=<?= $from;?>"><button class="btn btn_darkB">Accepter</button></a>
                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
            <?php
            }
        }
        ?>
        </div>
    </div>

</div>

<?php $content = ob_get_clean() ?>
<?php require('template.php') ?>