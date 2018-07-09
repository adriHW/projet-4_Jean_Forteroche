<?php
$page_title = 'Liste des chapitres';
ob_start();
?>

<div class="container list_chapters_container">
    
    <div class="row">
        <div id="chapters_title_container" class="col-lg-12">
            <h2>Les chapitres</h2>
        </div>
    </div>
    
    <div class="row btn_page_container">
        <div class="col-lg-12">
            <?php
            $page_count = ceil($chapter_count/6);
            for($i=1; $i <= $page_count; $i++){
                if($i == $page_nb){
                ?>
                    <a href="index.php?action=display_chapters&amp;page_nb=<?= $i; ?>"><button class="btn btn_page select_btn"><?= $i; ?></button></a>
                <?php
                }
                else{
                ?>
                    <a href="index.php?action=display_chapters&amp;page_nb=<?= $i; ?>"><button class="btn btn_page"><?= $i; ?></button></a>
                <?php
                }
            }
            ?>  
        </div>
    </div>
    
        <?php
        while($data = $list->fetch()){
            $title = htmlspecialchars($data['title']);
            $chapter = htmlspecialchars($data['chapter']);
            $text = substr($data['content'], 0, 250);
        ?>
        <div class="row row_chapters" >
            <div class='col-lg-12 extract_container'>
                <div class="extract_text">
                    <div class="title_chapter">
                        <h3>Chapter: <?= $chapter; ?></h3>
                        <h3><?= $title; ?></h3>
                    </div>
                    <div class="text_extract">
                        <p><?= $text; ?>[...]</p>
                    </div>
                </div>
                <div class="extract_button">
                    <a href='index.php?action=get_post&amp;chapter=<?= $chapter; ?>'><button class="btn btn_chapters">Lire la suite</button></a>
                </div>
            </div>   
        </div>
        <?php
        }
        ?>
    
    <div class="row btn_page_container">
        <div class="col-lg-12">
            <?php
            $page_count = ceil($chapter_count/6);
            for($i=1; $i <= $page_count; $i++){
                if($i == $page_nb){
                ?>
                    <a href="index.php?action=display_chapters&amp;page_nb=<?= $i; ?>"><button class="btn btn_page select_btn"><?= $i; ?></button></a>
                <?php
                }
                else{
                ?>
                    <a href="index.php?action=display_chapters&amp;page_nb=<?= $i; ?>"><button class="btn btn_page"><?= $i; ?></button></a>
                <?php
                }
            }
            ?>  
        </div>
    </div>
    
</div>
    
<?php 
$content = ob_get_clean();
require('template.php');
?>
