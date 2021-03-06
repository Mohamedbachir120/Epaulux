    

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EPAULUX</title>
  

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link media="screen and (min-width: 1024px)" href="css/style.css" rel="stylesheet">
    <link media="screen and (max-width: 1024px)" href="css/style_home_mob.css" rel="stylesheet">
  <link href="css/googlefont.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 	

</head>

<body>


    <div id="main">

        <div class="header">
            <a href="index.html"> <img src="css/nvlogo.PNG" alt="epaulux"></a>
            <form id="serch-box">
                <input type="text" class="form-control" id="searchinput" maxlength="64" placeholder="Recherche..." />
                <button type="submit"><i class=" fa fa-search" aria-hidden="true"></i></button>
                <span id="searchclear" class="btn-fermer-recherche"><i class="fa fa-times" aria-hidden="true"></i></span>
            </form>


            <button type="submit" class="connect"><i class="fa fa-user"></i><a href="{{ route('login') }}">Se connecter</a></button>
            <button type="submit" class="subscribe"><i class="fa fa-plus"></i><a href="{{ route('register') }}">S'inscrire</a></button>

        </div>



        <div class="navindex" id="nav">
            <ul>
                <li><a href="index.html#apropos">A propos</a></li>
                <li><a href="index.html#notreequipe"> Notre équipe</a></li>
                <li>
                    <a href="#">Produits</a>

                    <ul id="menuproduits">

                        <li id="menuepaulette">
                            <a href="#">Epaulettes<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            <ul id="sousmenuepaulette">
                                <li><a href="">Epaulettes "Mousse" Arrondies EAR</a></li>
                                <li><a href="">Epaulettes "Mousse" Magiques</a></li>
                                <li><a href="">Epaulettes "Mousse" Classiques L</a></li>
                                <li><a href="">Epaulettes BOCH EARB</a></li>
                            </ul>
                        </li>
                        <li id="menubordure">
                            <a href="#">Bordure<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            <ul id="sousmenubordure">
                                <li><a href="">Bordure matelas</a></li>
                                <li><a href="">Bordure matelas en polystère</a></li>
                                <li><a href="">Bordure matelas en coton</a></li>
                            </ul>
                        </li>
                        <li><a href="">Galons en rayonne</a></li>
                        <li><a href="">ZIGZAG</a></li>

                        <li><a href="">Cordon 100% rayonne</a></li>

                        <li><a href="">Macrame</a></li>
                        <li><a href="">Bande de survetement</a></li>
                        <li><a href="">Fermetures eclairs</a></li>
                        <li><a href="">Déchet</a></li>
                        <li><a href="">Cigare veste</a></li>
                        <li><a href="">Lacet</a></li>

                        <li id="menusangle">
                            <a href="">Sangles<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            <ul id="sousmenusangle">
                                <li><a href="">Sangle propylène</a></li>
                                <li><a href="">Sangle</a></li>
                            </ul>
                        </li>

                        <li><a href="">Fil à crochet</a></li>
                        <li><a href="">Boutons</a></li>
                    </ul>

                </li>

                <li>
                    <a href="index.html#contacts">Contacts</a>
                </li>
            </ul>
        </div>



        <section class="slider block" data-aos="fade-down" data-aos-duration="1500">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>

                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item  item-1 active">
                        <!--  <div class="info i-1">
                        <h1>Bienvenue à la premiere boutique en ligne de mercerie en gros
                            <br> epaulux .....................
                        </h1>

                    </div> -->
                    </div>

                    <div class="carousel-item item-2">
                        <!--   <div class="info i-2">
                        <h1>Lorem ipsum do</h1>
                    </div> -->
                    </div>
                    <div class="carousel-item item-3">
                        <!--  <div class="info i-3">
                        <h1>Lorem ipsum do</h1>
                    </div> -->

                    </div>

                    <div class="carousel-item item-4">
                        <!--  <div class="info i-4">
                        <h1>Lorem ipsum do</h1>
                    </div> -->

                    </div>

                    <div class="carousel-item item-5">
                        <!--   <div class="info i-5">
                        <h1>Lorem ipsum do</h1>
                    </div> -->
                    </div>

                    <div class="carousel-item item-6">
                        <!--  <div class="info i-6">
                        <h1>Lorem ipsum do</h1>
                    </div> -->

                    </div>

                    <div class="carousel-item item-7"></div>


                </div>
                <span class="prev">
            <a href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                </span>
                <span class="next">
                <a href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
                </span>
            </div>
        </section>
        <div class="features">
            <img src="css/ecommerce3.jpg" alt="" id="dl" data-aos="zoom-in" data-aos-duration="1000">
            <div class="row" data-aos="zoom-in" data-aos-duration="1500">
                <div class="feature-card" data-aos="fade-right" data-aos-duration="2500">
                    <img src="css/ser1.png" alt="">
                    <!-- <h4>UN SERVICE</h4> -->
                    <h4>Fast service</h4>

                </div>
                <div class="feature-card" data-aos="zoom-in" data-aos-duration="2500">
                    <img src="css/ser2.png" alt="">
                    <!-- <h4>UNE QUALITE</h4> -->
                    <h4>Secure paiment</h4>
                    <!-- fast service / img1 -->
                    <!-- secure payement / img2-->
                    <!-- expert team / img3 -->
                    <!-- affordable service / img4  -->

                </div>
                <div class="feature-card" data-aos="fade-left" data-aos-duration="2500">
                    <img src="css/ser3.png" alt="">
                    <!-- <h4>UN PRIX</h4> -->
                    <h4>Expert team</h4>

                </div>
            </div>
        </div>




        <div class="apropos block" id="apropos">
            <!-- <h1>Ets HADDAK Elmadjid</h1> -->
            <img src="css/logoapropos.png" alt="" data-aos="zoom-in" data-aos-duration="1500">
            <h4 data-aos="zoom-in" data-aos-duration="1500">Confection Industrielle de vêtement et lingerie</h4>
            <p class="line-break padding-top-10" data-aos="zoom-in" data-aos-duration="2000"></p>

            <p data-aos="zoom-in" data-aos-duration="2500"><span class="first-character ">U</span>n temps menacée de disparition définitive, la mercerie revient de loin. "EPAULUX" a été créée en 19.... Alger (Algérie).
                <!--  L’établissement HADDAK Elmadjid  -->Notre établissement fabrique lui-même ses différents articles. Ce privilège fait son originalité et sa force. Mais un changement s’impose actuellement à l’heure du e-commerce. EPAULUX va également investir la toile ce qui permettrait aux
                clients de découvrir un choix inédit d’épaulettes, bordures, galons, macramés, fermetures, sangles … car le sort de la mercerie est intimement lié au marché de la confection artisanale et il faut donc s’ouvrir à la vente en ligne grâce
                au site internet.</p>


        </div>


        <div class="notreentreprise" data-aos="zoom-in" data-aos-duration="1500">

            <p><span>''</span> quelque chose....................... <br> Tous nos produits sont disponible en ligne il suffit de nous joindre ... <br> Nous vous assurons un rapport qualité prix imbatable ! <br> Notre entreprise est leader dans son genre
                et est considéré comme le précurseur de cette activité en Algérie ! <br>
                <span>''</span>
            </p>

        </div>




      
        <div class="notreequipe" id="notreequipe">
            <h1 data-aos="zoom-in" data-aos-duration="1000">Notre Equipe</h1>
            <div class="line" data-aos="zoom-in" data-aos-duration="1000"></div>
            <div class="row">
                <div class="card " data-aos="fade-right" data-aos-duration="1500">
                    <div class="card card-info">
                        <h3>Gérant</h3>
                        <h4>HADDAK Elmadjid</h4>
                        <h6><i class="fa fa-envelope"></i></i>haddak_elmadjid@yahoo.com</h6>
                        <br>
                        <h6><i class="fa fa-phone"></i> 0661521754</h6>
                        <h6>0561647298</h6>
                        <h6>0770110611</h6>
                    </div>
                </div>

                <div class="card" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="card card-info">
                        <h3>Assisstant polyvalent intermittent</h3>
                        <h4>TADJ Réda Anouar</h4>
                        <h6><i class="fa fa-envelope"></i></i>tadj_anouar@yahoo.fr</h6>
                        <br>
                        <h6><i class="fa fa-phone"></i>0670345696</h6>
                    </div>
                </div>

                <div class="card" data-aos="fade-left" data-aos-duration="1500">
                    <div class="card card-info">
                        <h3>Responsable commercial</h3>
                        <h4>Nom prénom</h4>
                        <h6><i class="fa fa-envelope"></i></i>contact@yahoo.com</h6>
                        <br>
                        <h6><i class="fa fa-phone"></i>0123456789</h6>


                    </div>
                </div>

            </div>

        </div>












        <button class="scrollToTop"></button>




        <footer id="contacts" data-aos="zoom-in" data-aos-duration="1500">


            <div class="footer-info row">

                <div class="liens-utiles">
                    <h5>LIENS UTILES</h5>

                    <a href="index.html">
                        <div>
                            <img src="css/acceuil.png" alt="">
                        </div>
                        Acceuil
                    </a>

                    <a href="index.html#apropos">
                        <div>
                            <img src="css/apropos.png" alt="">
                        </div>
                        A propos
                    </a>

                    <a href="index.html#notreequipe">
                        <div>
                            <img src="css/equipe.png" alt="">
                        </div>
                        Notre équipe
                    </a>

                    <a href="">
                        <div>
                            <img src="css/produit.png" alt="">
                        </div>
                        Produits
                    </a>
                </div>



                <div class="contact">

                    <h5>CONTACT US</h5>

                    <span><img src="css/localisation.png" alt="">21 A Route de la Zouaoua,Cheraga - Alger. Algérie.</span>

                    <span><img src="css/telephone.png" alt="">00213.23-29-52-53</span>

                    <span><img src="css/fax.png" alt="">00213.23-29-52-54</span>

                    <span><img src="css/email.png" alt="">epaulux@yahoo.fr </span>

                    <span><img src="img/footer/siteweb.png" alt="">epaulux.dz</span>

                </div>

                <div class="localisation">
                    <!-- <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3196.314540318462!2d2.9695590152888554!3d36.76302107995626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fb034a0156aed%3A0x7a765345a33edb18!2sRoute%20de%20Zouaoua%D8%8C%20Ch%C3%A9raga!5e0!3m2!1sfr!2sdz!4v1584563951627!5m2!1sfr!2sdz"></iframe> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3196.245646425231!2d2.9616875152888915!3d36.764674079955945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fb038343a300f%3A0x28117afdfa5d2e75!2s21%20Route%20de%20Zouaoua%D8%8C%20Ch%C3%A9raga!5e0!3m2!1sfr!2sdz!4v1597254980593!5m2!1sfr!2sdz"
                        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>

            </div>


            <div class="reseauxsociaux">
                <a href=""><img src="css/fb.png" alt=""></a>
                <a href=""><img src="css/insta.png" alt=""></a>
                <a href=""><img src="css/twitter.png" alt=""></a>
                <a href=""><img src="css/in.png" alt=""></a>
                <a href=""><img src="css/gmail.png" alt=""></a>
            </div>
            <div class="copyright text-center">
                <p>Copyright &copy; 2020 EPAULUX company</p>
                <p> All rights reserved</p>
            </div>

        </footer>



    </div>
    <!-- main  -->


    <script src="css/jquery.min.js"></script>
    <script src="css/popper.min.js"></script>
    <script src="css/bootstrap.min.js"></script>
    <script src="css/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>




<script>
    $(document).ready(function() {

        window.onscroll = function() {
            myFunction()
        };

        var nav = document.getElementById("nav");
        var sticky = nav.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                nav.classList.add("sticky")
            } else {
                nav.classList.remove("sticky");
            }
        }
    });
</script>



<script>
    $(document).ready(function() {

        //Check to see if the window is top if not then display button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });

        //Click event to scroll to top
        $('.scrollToTop').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

    });
</script>








<!-- 
 <div class="box17">
 
     <ul class="icon">
         <li><a href="#"><i class="fa fa-search"></i></a></li>
         <li><a href="#"><i class="fa fa-link"></i></a></li>
     </ul>
 
 
     <div class="box-content">
         <h3 class="title">Williamson</h3>
         <span class="post">Web Developer</span>
     </div>
 
 
 </div>
 
  -->
<style>
    /*//////////////////////////////////////////////////////////// box ////////////////////////////////////////////////////////////*/
    
    .box17 {
        position: relative;
        width: 400px;
        height: 400px;
        background: red;
        margin-left: 50px;
        background-image: url("img/card-img.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    }
    
    .box17 .post {
        display: block;
        font-size: 14px;
        color: #fff
    }
    
    @media only screen and (max-width:990px) {
        .box17 {
            margin-bottom: 30px
        }
    }
    /*////////////////////////////////////////////////// box- box:after  //////////////////////////////////////////////////*/
    
    .box17:after {
        content: "";
        width: 100%;
        height: 100%;
        background: rgba(2, 162, 221, .9);
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        transition: all .5s ease 0s
    }
    
    .box17:hover:after {
        opacity: 1
    }
    /*/////////////////////////////////////////////////////// box-icon ///////////////////////////////////////////////////////*/
    
    .box17 .icon {
        width: 100%;
        height: 100%;
        list-style: none;
        padding: 0;
    }
    
    .box17 .icon li a {
        width: 45px;
        height: 45px;
        line-height: 45px;
        margin: 0 auto;
        top: 50%;
        border: 1px solid #fff;
        opacity: 0;
        position: absolute;
        transition: all .6s ease 0s
    }
    
    .box17:hover .icon li a {
        top: 30%;
        opacity: 1
    }
    
    .box17 .icon li a:hover {
        background: #fff;
        color: #02a2dd;
    }
    
    .box17 .icon li:first-child a {
        left: -90%;
        right: 0
    }
    
    .box17:hover .icon li:first-child a {
        left: -55px
    }
    
    .box17 .icon li:last-child a {
        right: -90%;
        left: 0
    }
    
    .box17:hover .icon li:last-child a {
        right: -55px
    }
    
    .box17:hover .box-content {
        bottom: 0
    }
    /*/////////////////////////////////////////////////// box-box-content ///////////////////////////////////////////////////*/
    
    .box17 .box-content {
        width: 100%;
        padding: 20px 10px;
        background: rgba(0, 0, 0, .1);
        margin-top: 400px;
        position: absolute;
        transition: all .6s ease 0s;
    }
</style>
