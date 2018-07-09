<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>admin login</title>
	<meta name="Author" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="public/backend/style.css">
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
</head>
<body id="body_log">
    <div id="title_connect">
       <h1>Connexion à l'interface administrateur</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col_error col-lg-12">
                <?php
                if(isset($_SESSION['connect_error'])){
                    if($_SESSION['connect_error'] != ""){
                    ?>
                        <p class="error_mess"><?= $_SESSION['connect_error'] ?></p>
                    <?php
                    }
                    $_SESSION['connect_error'] = "";
                }
                ?>
            </div>
        </div>
        <div class="row ">
            <div  class="col-lg-8 offset-lg-2 col_login_form">
                <form action='index.php?action=validation' method='post' id="login_form_container">
                    <div class="row row_login">
                        <div class="col-md-6">
                            <label for='user_name'>Nom d'utilisateur:<br><input type='text' name='user_name' id='user_name' class='input_admin'/></label>
                        </div>
                        <div class="col-md-6">
                            <label for='user_pwd'>Mot de passe:<br><input type='password' name='user_pwd' id='user_pwd' class='input_admin'/></label>
                        </div>
                        <div class="col-md-12">
                            <div id="connect_button_container">
                                <input id="submit_button" type='submit' class="btn btn_darkB" id="submit_btn" value="Se connecter"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col_back_site_btn">
                <a href='index.php'><button class="btn back_btn btn_lightB">Retour au site</button></a>
            </div>
        </div>
    </div>
</body>
</html>
