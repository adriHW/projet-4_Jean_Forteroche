<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ?></title>
	<meta name="Author" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="public/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
    <script src="public/bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="public/frontend/style.css">
    <link rel="stylesheet" href="public/font-awesome-4.7.0/css/font-awesome.min.css"> 
    <script src="public/frontend/js/sticky_nav.js" async></script>
</head>
<body>
    <?php include("header.php")?>   
    <section>
        <?= $content ?>
    </section>
    <?php include("footer.php")?>
</body>
</html>
