<?php $page_title='Modifier chapitre';?>

<?php 
ob_start();
$post_id = $data['post_id'];
$title = $data['title'];
$chapter = $data['chapter'];
$content_text = $data['content'];
$published =$data['published'];
?>

<div class="container container_content">
    <div class="row">
        <div class=" col-lg-12">
            <h1>Modification du chapitre <?= $chapter; ?></h1>
        </div>
    </div>
    <div class="row row_error">
        <div class="col-lg-12">
            <?php 
            if(isset($_SESSION['error_mess'])){
                if($_SESSION['error_mess'] != ""){
                ?>
                    <p class="error_mess"><?= $_SESSION['error_mess'] ?></p>
                <?php
                }
                $_SESSION['error_mess'] = "";
            }
            ?>
        </div>
    </div>
    <form action="index.php?action=update_post&amp;post_id=<?=$post_id;?>" method="post">
        <div class="row">
            <div class=" col-lg-12">
                <label for='title'>Titre du chapitre:<br><input type="text" class='' id='title' name='title' value="<?= $title; ?>"/></label>
                <label for='chapter'>Numero du chapitre:<br><input type="number" class='' id='chapter' name='chapter' value="<?= $chapter; ?>"/></label>
            </div>
        </div>
        <div class="row row_textarea">
            <div class="col-lg-12">
                <textarea rows="30" cols="120" type="text" id='text' name='content'><?= $content_text; ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-12">
                <input class='btn btn_lightB publish_new' type='submit' name="publish" value='Publier'/>
                <?php if($published == 0){
                ?>
                    <input class='btn btn_lightB save_new' type='submit' name="save" value='Sauvegarder'/>
                <?php } 
                ?>
            </div>
        </div>
    </form>
</div>



<?php $content = ob_get_clean(); 
require('template.php');
?>