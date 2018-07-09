<?php if(isset($_SESSION['user_name']) && isset($_SESSION['admin'])){ ?>

    <!DOCTYPE html>
    <html lang="">
    <head>
        <meta charset="UTF-8">
        <title><?= $page_title  ?></title>
        <meta name="Author" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="public/jquery-3.3.1.js"></script>
        <script src="public/bootstrap/js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="public/backend/style.css">
        <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=uyob9wj5aa4b44otv97hkwhb5o4zpqdgba03mooesgxk40qt"></script> 
        <script>tinymce.init({ selector:'textarea' });</script>
        <link rel="stylesheet" href="public/font-awesome-4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <?php include('header.php') ?>
    

        <section>
            <?= $content ?>
        </section>

        <?php include('footer.php') ?>

    </body>
    </html>
    
<?php }
else{
    header('location:index.php?action=admin_connect');
}
?>


