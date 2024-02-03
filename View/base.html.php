<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FANATIC GAME</title>
    <link rel="stylesheet" href="public/bootstrap-5.3.2-dist/css/bootstrap.css">
    <script src="public/bootstrap-5.3.2-dist/js/bootstrap.js"> </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito&family=Heebo:wght@600&family=Montserrat:wght@300&family=Noto+Sans&family=Pixelify+Sans:wght@500&family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="service/script_mobile.js"></script>
    <script src="service/script.js"></script>
    <script src="service/script_navbar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="Service/myScript.js" defer></script>
    <title>Document</title>
</head>

<body>
    <!-- ici on appelle header -->
    <section class="header">
        <section id="head_section">
            <div class="container">
                <div class="logo flex_imp">
                    <h1>GAMING SHOP</h1>
                    <img src="public/image-site-vitrine/logo_jeux-removebg-preview.png" alt="logo fanatic game" class="logo_size">
                </div>
            </div>
            <nav class="menu">
                <ul class="nav-list">
                    <li class="drop-transition"><a href="./index.php">JEUX</a>
                        <ul class="sub-menu">
                            <li><a href="#">JEUX PLAYSTATION</a></li>
                            <li><a href="#">JEUX XBOX</a></li>
                            <li><a href="#">JEUX NINTENDO</a></li>
                            <li><a href="#">JEUX PC</a></li>
                        </ul>
                    </li>

                    <li><a href="./View/page_articles.php">CONSOLE</a>
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
                    <?php if ($_SESSION['nom']) : ?>
                        <li><a href="" style="color: cornflowerblue;">MON COMPTE</a>
                            <ul class="sub-menu">
                                <li><a href=""><?= $_SESSION['nom'] ?></a></li>
                                <li><img src="<?= $_SESSION['photo'] ?>" alt="" width="100%"></li>
                                <li><a href="client&action=changePass">Changer MDP</a></li>
                                <li><a href="client&action=logout">LOGOUT</a></li>
                                <?php if ($_SESSION['id_role'] == 1) : ?>
                                    <li><a href="client&action=list">TABLEAU DE BORD</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li><a href="" style="color: cornflowerblue;">CONNEXION</a>
                            <ul class="sub-menu">
                                <li><a href="client&action=login">LOGIN</a></li>
                                <li><a href="client&action=register">CRÉER COMPTE</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </section>
        <section>
            <?= $fileContent ?>
        </section>
    </section>
    <!-------------------texte au dessus du carousel------------->
    <section id="body_section">
        <div class="heading_page">
            <div class="container_carousel">
                <div class="width_carousel">
                    <h1>Boutique Jeu Vidéo</h1>
                    <b>
                        <p class=text-bluegaming>Votre boutique référence, les dernières tendances gaming, accessoires, jeux, espace geek...</p>
                    </b>
                </div>
            </div>
            <!-----------------------------carousel----------------------------->
            <div class="container_carousel">
                <div class="width_carousel">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="public/image-site-vitrine/Star-Wars-Battlefront-II.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Star Wars Battlefront II</h5>
                                    <p class="text-bg-light">Réduction incroyable sur Star Wars Battlefront II à ne surtout pas rater</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="public/image-site-vitrine/God-Of-War-Wallpaper.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>God Of War</h5>
                                    <p class="text-bg-light">Rejoignez les aventures incontournables de Kratos à prix réduits.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="public/image-site-vitrine/halo-infinite.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Halo Infinite</h5>
                                    <p class="text-bg-light">Les dernières aventures de Spartan 117 à prix doux !</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="containers w-100">
                <div class="containers_carrousels">
                    <div class="card_primary">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card_body">
                            <h5 class="card-titre">Card title1</h5>
                            <p class="card-texte">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="buttun buttun-primary">AJOUTER AU PANIER</a>
                        </div>
                    </div>
                    <div class="card_primary">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card_body">
                            <h5 class="card-titre">Card title2</h5>
                            <p class="card-texte">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="buttun buttun-primary">AJOUTER AU PANIER</a>
                        </div>
                    </div>
                    <div class="card_primary">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card_body">
                            <h5 class="card-titre">Card title3</h5>
                            <p class="card-texte">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="buttun buttun-primary">AJOUTER AU PANIER</a>
                        </div>
                    </div>
                    <div class="card_primary">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card_body">
                            <h5 class="card-titre">Card title4</h5>
                            <p class="card-texte">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="buttun buttun-primary">AJOUTER AU PANIER</a>
                        </div>
                    </div>
                    <div class="card_primary">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card_body">
                            <h5 class="card-titre">Card title5</h5>
                            <p class="card-texte">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="buttun buttun-primary">AJOUTER AU PANIER</a>
                        </div>
                    </div>
                    <div class="card_primary">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card_body">
                            <h5 class="card-titre">Card title6</h5>
                            <p class="card-texte">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="buttun buttun-primary">AJOUTER AU PANIER</a>
                        </div>
                    </div>
                </div>
                <div class="containers_carrousels">
                    <div class="card_primary">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card_body">
                            <h5 class="card-titre">Card title1</h5>
                            <p class="card-texte">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="buttun buttun-primary">AJOUTER AU PANIER</a>
                        </div>
                    </div>
                    <div class="card_primary">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card_body">
                            <h5 class="card-titre">Card title2</h5>
                            <p class="card-texte">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="buttun buttun-primary">AJOUTER AU PANIER</a>
                        </div>
                    </div>
                    <div class="card_primary">
                        <img src="public/image-site-vitrine/fond-halo.jpeg" class="card-img-top" alt="...">
                        <div class="card_body">
                            <h5 class="card-titre">Card title3</h5>
                            <p class="card-texte">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="buttun buttun-primary">AJOUTER AU PANIER</a>
                        </div>
                    </div>
                    <div class="card_primary">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card_body">
                            <h5 class="card-titre">Card title4</h5>
                            <p class="card-texte">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="buttun buttun-primary">AJOUTER AU PANIER</a>
                        </div>
                    </div>
                    <div class="card_primary">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card_body">
                            <h5 class="card-titre">Card title5</h5>
                            <p class="card-texte">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="buttun buttun-primary">AJOUTER AU PANIER</a>
                        </div>
                    </div>
                    <div class="card_primary">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card_body">
                            <h5 class="card-titre">Card title6</h5>
                            <p class="card-texte">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="buttun buttun-primary">AJOUTER AU PANIER</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------------------------------------------------------------------->
</body>
<?php require_once('View/footer.php') ?>

</html>