<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FANATIC GAME</title>
    <link rel="stylesheet" href="../public/bootstrap-5.3.2-dist/css/bootstrap.css">
    <script src="../public/bootstrap-5.3.2-dist/js/bootstrap.js"> </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito&family=Heebo:wght@600&family=Montserrat:wght@300&family=Noto+Sans&family=Pixelify+Sans:wght@500&family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/filters.css">
    <script src="../service/script_mobile.js"></script>
    <script src="../service/script.js"></script>
    <script src="../service/script_navbar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <title>Document</title>
</head>

<body>
    <!-- ici on appelle header -->
    <section class="header">
        <section id="head_section">
            <div class="container">
                <div class="logo flex_imp">
                    <h1>GAMING SHOP</h1>
                    <img src="../public/image-site-vitrine/logo_jeux-removebg-preview.png" alt="logo fanatic game"
                        class="logo_size">
                </div>
            </div>
            <nav class="menu">
                <ul class="nav-list">
                    <li><a href="./index.php">JEUX</a>
                        <ul class="sub-menu">
                            <li><a href="#">JEUX PLAYSTATION</a></li>
                            <li><a href="#">JEUX XBOX</a></li>
                            <li><a href="#">JEUX NINTENDO</a></li>
                            <li><a href="#">JEUX PC</a></li>
                        </ul>
                    </li>

                    <li><a href="page_articles.php">CONSOLE</a>
                        <ul class="sub-menu">
                            <li><a href="#">PACK PLAYSTATION</a></li>
                            <li><a href="#">PACK XBOX</a></li>
                            <li><a href="#">PACK NINTENDO</a></li>
                        </ul>
                    </li>

                    <li><a href="">ACCESSOIRES</a>
                        <ul class="sub-menu">
                            <li><a href="#">PLAYSTATION</a></li>
                            <li><a href="#">XBOX</a></li>
                            <li><a href="#">NINTENDO</a></li>
                        </ul>
                    </li>

                    <li><a href="">MOBILIER GAMING</a>
                        <ul class="sub-menu">
                            <li><a href="#">CHAISE GAMING</a></li>
                            <li><a href="#">TABLE GAMING</a></li>
                            <li><a href="#">MOUSSE ACCOUSTIQUE</a></li>
                        </ul>
                    </li>

                    <li><a href="" style="color: cornflowerblue;">ESPACE GEEK</a>
                        <ul class="sub-menu">
                            <li><a href="#">GOODIES JEUX VIDÉO</a></li>
                            <li><a href="#">GOODIES MANGA</a></li>
                        </ul>
                    </li>

                    <li><a href="" style="color: cornflowerblue;">CONNEXION</a>
                        <ul class="sub-menu">
                            <li><a href="client&action=login">LOGIN</a></li>
                            <li><a href="client&action=inscription">INSCRIPTION</a></li>
                            <li><a href="client&action=list">TABLEAU DE BORD CLIENTS</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </section>
    </section>

    <body>
        <!-----------------------------page choix des articles----------------------------->
        <div class="main_pages">
            <?php require_once('../View/Filter/filtre_articles.php'); ?>
            <?php require_once('../View/carousel/carroussel_articles.php'); ?>
        </div>
    </body>
    <?php require_once('../View/footer.php'); ?>

</html>