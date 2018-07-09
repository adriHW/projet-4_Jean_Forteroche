<?php 
$page_title="Billet simple pour l'Alaska";
ob_start();
?>
<div class="container home_container">
    <div class="row row_error">
        <div class="col-lg-12">
            <?php
            if(isset($_SESSION['error_mess'])){
                if($_SESSION['error_mess'] != ""){
                ?>
                    <p id='error_mess'> <?= $_SESSION['error_mess']; ?> </p>
                    <?php
                }
                $_SESSION['error_mess'] = "";
            }
            ?>
        </div>
    </div>
    
    <div class="row">
        <div id="home_title_container" class="col-lg-12 home_section">
            <h2>Accueil</h2>
            <p>Bonjour et bienvue sur le site de mon tout dernier roman "Billet simple pour l'Alaska".
            Pour chacun des chapitres de ce livre vous trouverez une partie commentaire n'hésitez pas à y exprimer vos impressions que je me ferai un plaisir de lire, je vous souhaite une bonne lecture.</p>
        </div>
    </div>
    <div class="row">
        <div id="home_text_container" class="col-md-12 home_section">
            <div id="img_home" class="float-md-left">
                <img src="public/frontend/image/book_tr.jpg" />
            </div>
            <h3 >Un avant goût de l'histoire?</h3>
            <p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a 
            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.
            Tempore quo primis auspiciis in mundanum fulgorem surgeret victura dum erunt homines Roma, ut augeretur sublimibus incrementis, foedere pacis aeternae Virtus convenit atque Fortuna plerumque dissidentes, quarum si altera defuisset, ad perfectam non venerat summitatem.
            sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a.</p>
        </div>
    </div>
    <div class="row">
        <div id="home_button_container" class="col-lg-12">
            <a href="index.php?action=get_post&amp;chapter=1"><button id="btn_chapter_1" type="button" class="btn">Lire le premier chapitre</button></a>
        </div>
    </div>
    
</div>



<?php
$content = ob_get_clean();
require ('template.php');
?>