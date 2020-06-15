<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mon Lit</title>
    <!-- <link rel="icon" href="https://cdn.ycan.shop/stores/monlit/theme-settings/mWih5ydeDQTDV07yK7GjQzQGU9fKZOB5j45cbk9b.jpeg"> -->
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">

    <style>
        ::-webkit-scrollbar {
            width: 20px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #5de6de;
            background-image: linear-gradient(315deg, #5de6de 0%, #b58ecc 74%);
            border-radius: 10px;
        }
    </style>
    @section('linkcss')
    @show
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img style="width: 70%;" src="https://cdn.ycan.shop/stores/monlit/theme-settings/DGJnA1GfQWVA3j30pbv7UO1aNJFkhj5OkEdQDR1I.jpeg " alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/')}}">Accueil</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{url('/blog')}}" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <strong>Nos Marques</strong>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="{{url('/login')}}"> login</a>
                                        <a class="dropdown-item" href="{{url('/tracking')}}">tracking</a>
                                        <a class="dropdown-item" href="{{url('/checkout')}}">product checkout</a>
                                        <a class="dropdown-item" href="{{url('/cart')}}">shopping cart</a>
                                        <a class="dropdown-item" href="{{url('/confirmation')}}">confirmation</a>
                                        <a class="dropdown-item" href="{{url('/element')}}">elements</a>
                                    </div>
                                </li>
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{url('/blog')}}" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="{{url('/blog')}}"> blog</a>
                                        <a class="dropdown-item" href="{{url('/single-blog')}}">Single blog</a>
                                    </div>
                                </li> -->

                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{url('/contact')}}">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            @if(App\Http\Controllers\AuthController::IsAuthentificated())
                            <ul class="navbar-nav">
                                <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>

                                <li class="nav-item dropdown">
                                    <a style="cursor: pointer;" class=" dropdown-toggle">
                                        <i class="fas fa-user-shield" data-toggle="modal" data-target="#modalLogin"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="logout">se déconnecter</a>
                                    </div>
                                </li>

                                <div class="dropdown cart">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cart-plus"></i>
                                    </a>
                                </div>
                            </ul>
                            @else
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>

                            <a style="cursor: pointer;">
                                <i class="fas fa-user-shield" data-toggle="modal" data-target="#modalLogin"></i>
                            </a>

                            <div class="dropdown cart">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                            </div>
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Rechercher">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    @section('body')
    @show
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="LabelModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Authentification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="Post" autocomplete="off" id="formLogin">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="emailInput">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="usernameInput" name="usernameInput" placeholder="Pseudo">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="PasswordInput">Mot de passe</label>
                            <input type="password" class="form-control" id="passwordInput" name="passwordInput" placeholder="MotDePasse">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Qui sommes-nous</h4>
                        <ul class="list-unstyled">
                            <li><a href="">A propos de nous.</a></li>
                            <li><a href="">Notre réputation.</a></li>
                            <li><a href="">Plus d'infos.</a></li>
                            <li><a href="">Régle générale.</a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Quick Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Jobs</a></li>
                            <li><a href="">Brand Assets</a></li>
                            <li><a href="">Investor Relations</a></li>
                            <li><a href="">Terms of Service</a></li>
                        </ul>
                    </div>
                </div> -->
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Services</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Lorem.</a></li>
                            <li><a href="">Lorem, ipsum.</a></li>
                            <li><a href="">Lorem.</a></li>
                            <li><a href="">Lorem.</a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Resources</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Guides</a></li>
                            <li><a href="">Research</a></li>
                            <li><a href="">Experts</a></li>
                            <li><a href="">Agencies</a></li>
                        </ul>
                    </div>
                </div> -->
                <div class="col-sm-6 col-lg-4">
                    <div class="single_footer_part">
                        <h4>Newsletter</h4>
                        <p>Promotion et nouveaux produits chaque semaine !
                        </p>
                        <div id="mc_embed_signup">
                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part">
                                <input type="email" name="email" id="newsletter-form-email" placeholder="votre_email@mail.com" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '">
                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">s'abonner</button>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </P>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <ul class="list-unstyled">
                                <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    @section('scripts')
    @show
    <!-- custom js -->
    <script src="../js/custom.js"></script>
    <script>
        $(".owl-prev").html("précedent");
        $(".owl-next").html("suivant");

        var action = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
        action === "" ?
            document.getElementById('formLogin').action = "login-page=" + "home" :
            document.getElementById('formLogin').action = "login-page=" + action;
    </script>
</body>

</html>