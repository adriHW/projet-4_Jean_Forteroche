<?php 
$page_title="A mon sujet";
ob_start();
?>
<div class="container about_container">
    <div class="row">
        <div id="about_title_container" class="col-lg-12">
            <h2 id="title_about">A propos</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 home_section about_text_container">
            <div  class="float-md-left img_about_min">
                <img class="img-responsive" src="public/frontend/image/about_img.jpg" alt="Billet simple pour l'Alaska mon histoire, mon voyage"/>
            </div>
                <h3 >Mon histoire, mon voyage:</h3>
                <p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a 
                Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.
                Tempore quo primis auspiciis in mundanum fulgorem surgeret victura dum erunt homines Roma, ut augeretur sublimibus incrementis, foedere pacis aeternae Virtus convenit atque Fortuna plerumque dissidentes, quarum si altera defuisset, ad perfectam non venerat summitatem.
                sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 home_section about_text_container">
            <div  class="float-md-left img_about_min">
                <img class="img-responsive" src="public/frontend/image/project_img.jpg" alt="Billet simple pour l'Alaska mes projets" />
            </div>
                <h3 >Mes projets:</h3>
                <p>Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.

                Thalassius vero ea tempestate praefectus praetorio praesens ipse quoque adrogantis ingenii, considerans incitationem eius ad multorum augeri discrimina, non maturitate vel consiliis mitigabat, ut aliquotiens celsae potestates iras principum molliverunt, sed adversando iurgandoque cum parum congrueret, eum ad rabiem potius evibrabat, Augustum actus eius exaggerando creberrime docens, idque, incertum qua mente, ne lateret adfectans. quibus mox Caesar acrius efferatus, velut contumaciae quoddam vexillum altius erigens, sine respectu salutis alienae vel suae ad vertenda opposita instar rapidi fluminis irrevocabili impetu ferebatur.</p>
        </div>
    </div>
    
</div>

<?php
$content = ob_get_clean();
require ('template.php');
?>