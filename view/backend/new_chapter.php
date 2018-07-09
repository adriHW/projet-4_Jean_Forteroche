<?php $page_title='Nouveau chapitre'; ?>

<?php ob_start(); ?>

<div class="container container_content">
    <div class="row row_new_chapter">
            <div class="col-lg-12">
               <h1 id="new_chapter_title">Nouveau chapitre</h1>
            </div>
    </div>
    <form action="index.php?action=add_post" method="post">
        <div class="row row_new_chapter">
            <div id="title_nb" class="col-lg-12">
                <label for='title'>Titre du chapitre: <br><input type="text" id='title' name='title'/></label>
                <label for='chapter'>Numero du chapitre: <br><input type="number" min="1" max="999" id='chapter' name='chapter'/></label>
            </div>
        </div>
        <div class="row row_textarea">
            <div class="col-lg-12">
                 <textarea rows="30" cols="120" type="text" class='' id='text' name='content'></textarea>
            </div>
        </div>
        <div class="row row_new_chapter">
            <div class="col-lg-12">
                <input class='btn btn_lightB publish_new' type='submit' name="publish" value='Publier'/>
                <input class='btn btn_lightB save_new' type='submit' name="save" value='Sauvegarder'/>
            </div>
        </div>
    </form>
</div>


<?php $content = ob_get_clean(); 
require('template.php');
?>

