<?php 
$page_title="Me contacter";
ob_start();
?>
<div class="container contact_container">
    <div class="row">
        <div id="contact_title_container" class="col-lg-12">
            <h2>Me contacter</h2>
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <i class="fa fa-address-card-o" aria-hidden="true"></i>
        </div>
    </div>
    <div class="row">
        <div id="contact_email" class="container_col_contact col-md-6 col-sm-12" >
            <div class="contact">
                <i class="fa fa-envelope-o fa-5x" aria-hidden="true"></i>
                <h3>Par email:</h3>
                <a id="email_link" href="mailto:truc.org">jeanforteroche@live.fr</a>
            </div>
        </div>
        <div class="container_col_contact col-md-6 col-sm-12" >
            <div class="contact">
                <i class="fa fa-address-card-o fa-5x" aria-hidden="true"></i>
                <h3>Par courrier:</h3>
                <p>Jean Forteroche</p>
                <p>Ville: Lyon 69001</p>
                <p>Adresse: 10 rue du temple</p>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ('template.php');
?>



<!--<a href="mailto:xxx@yz.org" </a>-->