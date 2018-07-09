
<div id="<?= $header;  ?>" class="jumbotron header_nav">
<!--    <div id="overlay"></div>-->
    <div id="header_title">
        <h1>Billet simple pour l'Alaska</h1>
        <p>Par Jean Forteroche</p>
    </div>
</div>

<nav id="navibar" class="navbar navbar-expand-md navbar-dark bg-dark">
    
    <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapse_target">
        
        <ul class="navbar-nav ">
            <li id="Home" class="tabs_menu nav-item"><a href="index.php?action=display_home" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i>
                Accueil</a></li>
            <li id="a_propos" class="tabs_menu nav-item"><a href="index.php?action=display_about" class="nav-link">A propos</a></li>
            <li id="Billets" class="tabs_menu nav-item"><a href="index.php?action=display_chapters&amp;page_nb=1" class="nav-link">Les chapitres</a></li>
            <li id="Contact" class="tabs_menu nav-item"><a href="index.php?action=display_contact" class="nav-link">Contact</a></li>
        </ul>  
    </div>
     <form action="index.php?action=get_post"  method="post" id="what_chapter_container">
        <label for="what_chapter"> Chapitre nº</label><input type=number min="1" max="<?= $_SESSION['chapter_count']; ?>" id="what_chapter" name="chapter" class="form-control"/>
        <input id="btn_go" class="btn btn_dark_back" type="submit" value="Go"/>
    </form>
</nav>
