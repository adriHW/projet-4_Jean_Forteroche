
<?php $page_title = 'Chapitre';?>

<?php ob_start(); 

$post_id = $dataP['post_id'];
$title = htmlspecialchars($dataP['title']);
$chapter = htmlspecialchars($dataP['chapter']);
$prev_chapter = (int)htmlspecialchars($dataP['chapter'])-1;
$next_chapter = (int)htmlspecialchars($dataP['chapter'])+1;
$date = htmlspecialchars($dataP['creation_date_fr']);
$content = $dataP['content'];

?>



<div class="container chapter_com_container">
    
    <div class='row chapter_container'>
        <div class=" col-lg-12 chapter_col_container">
            <h3 id="chapter_title">Chapitre: <?= $chapter; ?><br><?= $title; ?></h3>
            <div class="text_container"><?= $content; ?></div>
        </div> 
    </div>
    
    
    
    
    
    
    <div class="row row_prev_next">
        <div class="col-lg-12 prev_next_container">
            <?php
            if($chapter == 1){
            ?>
                <a href='index.php?action=get_post&amp;chapter=<?= $next_chapter ?>'><button class="btn btn_clear">Chapitre <?= $chapter + 1; ?> &#187;</button></a>
            <?php
            }
            elseif($chapter == $chapter_count){
            ?>
                <a href='index.php?action=get_post&amp;chapter=<?= $prev_chapter ?>'><button class="btn btn_clear">&#171; Chapitre <?= $chapter - 1; ?></button></a>
            <?php
            }
            else{
            ?>
            <p>
                <a href='index.php?action=get_post&amp;chapter=<?= $prev_chapter ?>'><button class="btn btn_clear">&#171; Chapitre <?= $chapter - 1; ?></button></a>
                <a href='index.php?action=get_post&amp;chapter=<?= $next_chapter ?>'><button class="btn btn_clear">Chapitre <?= $chapter + 1; ?> &#187;</button></a>
            </p>
            <?php  
            }
            ?>
        </div>
    </div>
    
    
    
    
<!--    LAISSER UN COMMENTAIRE      --><!--    LAISSER UN COMMENTAIRE      --><!--    LAISSER UN COMMENTAIRE   -->
    <div class="row com_container">
        <div class="col-lg-12 form_com_container">
            <h3 class="title_com">Laisser un commentaire</h3>
            
            <div class = "row row_error">
                <div class="col-lg-12">
                    <?php
                    if(isset($_SESSION['error_mess'])){
                        if( $_SESSION['error_mess'] != "" ){
                        ?>
                            <p id='error_mess'> <?= $_SESSION['error_mess']; ?> </p>
                        <?php
                        }
                        $_SESSION['error_mess'] = "";
                    }
                    ?>
                </div>
            </div>
            
            <form action="index.php?action=post_comment" method="post">
                <input type="hidden" name="post_id" value="<?= $post_id ?>" /> 
                <input type="hidden" name="chapter" value="<?= $chapter ?>" /> 
                <div id="pseudo_form_container">
                    <label for="author">Votre pseudo:</label><br />
                    <input type="text" id="author" name="author" />
                </div>


                <div id="com_container">

                    <label for="comment">Votre commentaire:</label><br />

                    <textarea id="comment" class="form-control" name="comment" rows="5" cols="50"></textarea>

                </div>

                <div class="btn_container">
                    <input type="submit" class="btn send_com_btn btn_clear" value="Envoyer"/>
                </div>
            </form>
        </div>
    </div>
<!--    VOS COMMENTAIRES      --><!--    VOS COMMENTAIRES      --><!--    VOS COMMENTAIRES   -->
    <div class="row">
        <div class="col-lg-12 title_com">
            <h3>Vos commentaires</h3>
        </div>
    </div>
    <?php
    while($com = $dataC->fetch()){
        $com_id = $com['com_id'];
        $author = htmlspecialchars($com['author']) ;
        $date_com = $com['creation_date_fr'];
        $comment = nl2br(htmlspecialchars($com['comment']));
        $moderate = $com['moderate'];
        $signaled = $com['signaled'];
    ?>
    <div class="row com">
        <div class="col-lg-12"> 
            <?php
            if($signaled == 1){
            ?>
                <p class="signaled_com">Commentaire signalé</p>
            <?php
            }
            ?>
            <p><strong>Ecrit par: <?= $author; ?> </strong> <span class="com_date">  le <?= $date_com ?></span></p>
            <p><?= $comment ?></p>
            
            <div class="row">
                <div class="col-md-12">
                     <a href="index.php?action=signaled&amp;com_id=<?= $com_id; ?>&chapter=<?= $chapter; ?>"><button class="btn signal_com_btn">Signaler ce commentaire</button></a>
                </div>
            </div>
            
        </div>
    </div>
    <?php
    }
    ?>  

</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

