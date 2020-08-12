<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?></title>
    <meta name="description" content= <?= $description ?>>
    <meta name="robots" content="index,follow">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dawning+of+a+New+Day&family=Josefin+Sans&family=Love+Ya+Like+A+Sister&family=Pacifico&family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/profil_admin.css">
    <?= $css ?>
</head>
<body>
<?php
if (isset($_GET['id']) && isset($_GET['token'])) {
    if (($_GET['id'] == $_SESSION['id']) && ($_GET['token'] == $_SESSION['token'])) { ?>

    <?= $content ?>

</body>
</html>
<?php
    }else {
        header('Location: espace-membre');
        exit;
    }
}

