<div id='header_container'>
    <nav id="navibar" class="navbar navbar-expand-md navbar-dark bg-dark">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapse_target">

            <ul class="navbar-nav ">
                <li id="Home" class="tabs_menu nav-item"><a href="index.php?action=admin_home" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i>
                    Accueil</a></li>
                <li id="new_chapter" class="tabs_menu nav-item"><a href="index.php?action=new_chapter" class="nav-link">Nouveau chapitre</a></li>     
                <li id="chapters" class="tabs_menu nav-item">
                    <a href="index.php?action=chapters_list" class="nav-link">Les chapitres</a>
                </li>
                <li id="Contact" class="tabs_menu nav-item"><a href="index.php?action=display_coms&amp;all=1" class="nav-link">Les commentaires</a></li>
            </ul>  
        </div>
        <form action="index.php?action=get_chapter"  method="post" id="what_chapter_container">
            <label for="what_chapter"> Chapitre nº</label><input type=number min="1" max="<?= $_SESSION['chapter_count'] ;?>" id="what_chapter" name="chapter" class="form-control"/>
            <input id="btn_go" class="btn btn_darkB" type="submit" value="Go"/>
        </form>
    </nav>
</div>