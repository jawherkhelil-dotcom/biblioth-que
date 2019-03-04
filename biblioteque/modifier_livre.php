<?php
require_once './livre.php';
require_once './reserve.php';
$id=$_GET['id'];
$obj=livre::getlivreByid($id);
$liste_reserve= reserve::getreserve();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your keywords">
        <meta name="author" content="Your name">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/superfish.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/tms-0.4.1.js"></script>
        <script src="js/slider.js"></script>
        <style>
            input[type=submit]{
                padding:3px;
                border:0px;
                width:173px;
                height: 20px;
                font-size: 20;
                background-color:#a54400;
            }
            input[type=submit]:hover{
                background-color:#a9a9a9;
            }
            input[type=button]{
                padding:3px;
                border:0px;
                width:120px;
                height: 20px;
                font-size: 20;
                background-color:#a54400;
            }
            input[type=button]:hover{
                background-color:#a9a9a9;
            }
        </style>
    </head>
    <body>
        <div class="main-bg">
            <!-- Header -->
            <header>
                <div class="inner">
                    <h1 class="logo"><a href="index.php"></a></h1>
                    <nav>
                        <ul class="sf-menu">
                            <li class="current"><a href="index_admin.php">home</a></li>
                            <li><a href="liste_admin.php">Liste Admin</a></li>
                            <li><a href="liste_util.php">Liste Utilisateur</a></li>
                            <li><a href="index.php">logout</a></li>
                        </ul>
                    </nav>
                    <div class="clear"></div>
                </div>
                <div class="slider-container">
                    <div class="mp-slider">
                        <ul class="items">
                            <li><img src="images/img1.jpg"/><div class="banner mp-ban-1"><span class="row-1">bienvenu</span><span class="row-2">à</span><span class="row-3">bebliotéque</span></div></li>
                            <li><img src="images/img2.jpg"/><div class="banner mp-ban-2"><span class="row-1">smart</span><span class="row-2">bibliotéque</span><span class="row-3">en ligne</span></div></li>
                            <li><img src="images/img3.jpg"/><div class="banner mp-ban-3"><span class="row-1">réservé</span><span class="row-2">votre</span><span class="row-3">livre</span></div></li>
                            <li><img src="images/img4.jpg"/><div class="banner mp-ban-3"><span class="row-1">nous</span><span class="row-2">à votre</span><span class="row-3">service</span></div></li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="mp-prev"></a>
                <a href="#" class="mp-next"></a>
            </header>
            <!-- Content -->
            <section id="content"><div class="ic">More Website Templates @ TemplateMonster.com. July 16, 2012!</div>
                <div class="container_24">
                    <div class="wrapper">
                        <div class="grid_24 content-bg">
                            <div class="wrapper">
                                <div class="grid_16 suffix_1 prefix_1 alpha">
                                    <center>
                                        <article class="indent-bot">
                                            <div class="wrapper hr-border-1">
                                                <div class="grid_4 alpha">
                                                    <form method="post" action="modifier_livre_action.php">
                                                        <h2>Modifier Livre</h2>
                                                        <dl class="def-list-1">
                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                            <dt>
                                                            Nom Livre:
                                                            </dt>
                                                            <dd>
                                                                <input type="text" name="nom" value="<?php echo $obj->getNom(); ?>">
                                                            </dd>
                                                        </dl>
                                                        <dl class="def-list-1">
                                                            <dt>
                                                            Nom D'auteur:
                                                            </dt>
                                                            <dd>
                                                                <input type="text" name="auteur" value="<?php echo $obj->getAuteur(); ?>">
                                                            </dd>
                                                        </dl>
                                                        <dl class="def-list-1">
                                                            <dt>
                                                            <input type="submit" value="Modifier">
                                                            </dt>
                                                        </dl>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                        <br><br>
                                        <article class="banner-box">
                                            <div class="inner">
                                                <h3>Bibliotéque</h3>
                                                <h4>Qu'est ce que c'est site bibliotéque??</h4>
                                                <blockquote class="quote indent-right">
                                                    <strong>Ce site donner la droit à leur utilisateur de reservé les livres en ligne...</strong>
                                                </blockquote>
                                                <div class="alignright indent-right">
                                                    <span class="author">jawher khelil<i>(bibliotéquer)</i></span>
                                                </div>
                                            </div>
                                            <img src="images/banner-box-img.png" alt="" class="banner-box-img">
                                        </article>
                                    </center>
                                </div>
                                <div class="grid_5 suffix_1 omega">
                                    <article>
                                        <h3>Liste à reservé:</h3>
                                        <article class="indent-bot">
                                            <div class="wrapper hr-border-1">
                                                <?php
                                                foreach ($liste_reserve as $reserve) {
                                                    echo '<div class = "grid_4 alpha">';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo 'Id utilisateur : '.$reserve['id_util'].'';
                                                    echo '</dt>';
                                                    echo '</dl>';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo "Id livre 1 : ".$reserve['id_livre1']."";
                                                    echo '</dt>';
                                                    echo '</dl>';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo "Id livre 2 : ".$reserve['id_livre2']."";
                                                    echo '</dt>';
                                                    echo '</dl>';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo '<a href="supprimer_reserve_admin.php?id='.$reserve['id'].'"><input type="button" value="Supprimer"></a>';
                                                    echo '</dt>';
                                                    echo '</dl>';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo '-----------------------';
                                                    echo '</dt>';
                                                    echo '</dl>';
                                                    echo '</div>';
                                                }
                                                    ?>
                                            </div>
                                        </article>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Footer -->
            <footer>
                <div class="container_24">
                    <div class="wrapper">
                        <div class="grid_24 footer-bg">
                            <div class="hr-border-2"></div>
                            <div class="wrapper">
                                <div class="grid_7 suffix_1 prefix_1 alpha">
                                    <div class="copyright">
                                        &copy; 2017 <strong class="footer-logo">Bibliotéque</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>