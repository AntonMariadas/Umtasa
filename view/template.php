<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?></title>
    <meta name="description" content= <?= $description ?>>
    <meta name="robots" content="index,follow">
    <link rel="icon" type="image/jfif" href="public/images/logo/logo.jfif">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dawning+of+a+New+Day&family=Josefin+Sans&family=Love+Ya+Like+A+Sister&family=Pacifico&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <link rel="stylesheet" href= <?= $css ?>>
    <script src="public/assets/jquery-3.4.1.js"></script>
    <script src="public/js/header.js"></script>
    <?= $js ?>
</head>
<body>
<?php include('view/header.php') ?>
    
<?= $content ?>

<?php include('view/footer.php') ?>
</body>
</html>

