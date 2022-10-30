<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <!-- Page Title -->
    <title>Syslab - Demandes laboratoire</title>
    <!-- Favicon Icon -->
    <link rel="icon" href="https://barounilab.com/wp-content/uploads/2021/11/cropped-logo-BAROUNI.png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('style') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('style') }}/css/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('style') }}/css/slick.css" />
    <link rel="stylesheet" href="{{ asset('style') }}/css/lightgallery.min.css" />
    <link rel="stylesheet" href="{{ asset('style') }}/css/animate.css" />
    <link rel="stylesheet" href="{{ asset('style') }}/css/jQueryUi.min.css" />
    <link rel="stylesheet" href="{{ asset('style') }}/css/textRotate.css" />
    <link rel="stylesheet" href="{{ asset('style') }}/css/select2.min.css" />
    <link rel="stylesheet" href="{{ asset('style') }}/css/style.css" />
</head>

<body>
    <div class="st-perloader">
        <div class="st-perloader-in">
            <div class="st-wave-first">
                <svg enable-background="new 0 0 300.08 300.08" viewBox="0 0 300.08 300.08"
                    xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path
                            d="m293.26 184.14h-82.877l-12.692-76.138c-.546-3.287-3.396-5.701-6.718-5.701-.034 0-.061 0-.089 0-3.369.027-6.199 2.523-6.677 5.845l-12.507 87.602-14.874-148.69c-.355-3.43-3.205-6.056-6.643-6.138-.048 0-.096 0-.143 0-3.39 0-6.274 2.489-6.752 5.852l-19.621 137.368h-9.405l-12.221-42.782c-.866-3.028-3.812-5.149-6.8-4.944-3.13.109-5.777 2.332-6.431 5.395l-8.941 42.332h-73.049c-3.771 0-6.82 3.049-6.82 6.82 0 3.778 3.049 6.82 6.82 6.82h78.566c3.219 0 6.002-2.251 6.67-5.408l4.406-20.856 6.09 21.313c.839 2.939 3.526 4.951 6.568 4.951h20.46c3.396 0 6.274-2.489 6.752-5.845l12.508-87.596 14.874 148.683c.355 3.437 3.205 6.056 6.643 6.138h.143c3.39 0 6.274-2.489 6.752-5.845l14.227-99.599 6.397 38.362c.546 3.287 3.396 5.702 6.725 5.702h88.66c3.771 0 6.82-3.049 6.82-6.82-.001-3.772-3.05-6.821-6.821-6.821z" />
                    </g>
                </svg>
            </div>
            <div class="st-wave-second">
                <svg enable-background="new 0 0 300.08 300.08" viewBox="0 0 300.08 300.08"
                    xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path
                            d="m293.26 184.14h-82.877l-12.692-76.138c-.546-3.287-3.396-5.701-6.718-5.701-.034 0-.061 0-.089 0-3.369.027-6.199 2.523-6.677 5.845l-12.507 87.602-14.874-148.69c-.355-3.43-3.205-6.056-6.643-6.138-.048 0-.096 0-.143 0-3.39 0-6.274 2.489-6.752 5.852l-19.621 137.368h-9.405l-12.221-42.782c-.866-3.028-3.812-5.149-6.8-4.944-3.13.109-5.777 2.332-6.431 5.395l-8.941 42.332h-73.049c-3.771 0-6.82 3.049-6.82 6.82 0 3.778 3.049 6.82 6.82 6.82h78.566c3.219 0 6.002-2.251 6.67-5.408l4.406-20.856 6.09 21.313c.839 2.939 3.526 4.951 6.568 4.951h20.46c3.396 0 6.274-2.489 6.752-5.845l12.508-87.596 14.874 148.683c.355 3.437 3.205 6.056 6.643 6.138h.143c3.39 0 6.274-2.489 6.752-5.845l14.227-99.599 6.397 38.362c.546 3.287 3.396 5.702 6.725 5.702h88.66c3.771 0 6.82-3.049 6.82-6.82-.001-3.772-3.05-6.821-6.821-6.821z" />
                    </g>
                </svg>
            </div>
        </div>
    </div>
    <!-- Start Header Section -->
    <header class="st-site-header st-style1 st-sticky-header">
        <div class="st-top-header">
            <div class="container">
                <div class="st-top-header-in">
                    <ul class="st-top-header-list">
                        <li>
                            <svg enable-background="new 0 0 479.058 479.058" viewBox="0 0 479.058 479.058"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m434.146 59.882h-389.234c-24.766 0-44.912 20.146-44.912 44.912v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159l-200.355 173.649-200.356-173.649c1.769-.736 3.704-1.159 5.738-1.159zm0 299.411h-389.234c-8.26 0-14.971-6.71-14.971-14.971v-251.648l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z" />
                            </svg>
                            <a href="mailto:resultats@barounilab.com">resultats@barounilab.com</a>
                        </li>
                        <li>
                            <svg enable-background="new 0 0 512.021 512.021" viewBox="0 0 512.021 512.021"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="m367.988 512.021c-16.528 0-32.916-2.922-48.941-8.744-70.598-25.646-136.128-67.416-189.508-120.795s-95.15-118.91-120.795-189.508c-8.241-22.688-10.673-46.108-7.226-69.612 3.229-22.016 11.757-43.389 24.663-61.809 12.963-18.501 30.245-33.889 49.977-44.5 21.042-11.315 44.009-17.053 68.265-17.053 7.544 0 14.064 5.271 15.645 12.647l25.114 117.199c1.137 5.307-.494 10.829-4.331 14.667l-42.913 42.912c40.482 80.486 106.17 146.174 186.656 186.656l42.912-42.913c3.837-3.837 9.36-5.466 14.667-4.331l117.199 25.114c7.377 1.581 12.647 8.101 12.647 15.645 0 24.256-5.738 47.224-17.054 68.266-10.611 19.732-25.999 37.014-44.5 49.977-18.419 12.906-39.792 21.434-61.809 24.663-6.899 1.013-13.797 1.518-20.668 1.519zm-236.349-479.321c-31.995 3.532-60.393 20.302-79.251 47.217-21.206 30.265-26.151 67.49-13.567 102.132 49.304 135.726 155.425 241.847 291.151 291.151 34.641 12.584 71.867 7.64 102.132-13.567 26.915-18.858 43.685-47.256 47.217-79.251l-95.341-20.43-44.816 44.816c-4.769 4.769-12.015 6.036-18.117 3.168-95.19-44.72-172.242-121.772-216.962-216.962-2.867-6.103-1.601-13.349 3.168-18.117l44.816-44.816z" />
                                    <path
                                        d="m496.02 272c-8.836 0-16-7.164-16-16 0-123.514-100.486-224-224-224-8.836 0-16-7.164-16-16s7.164-16 16-16c68.381 0 132.668 26.628 181.02 74.98s74.98 112.639 74.98 181.02c0 8.836-7.163 16-16 16z" />
                                    <path
                                        d="m432.02 272c-8.836 0-16-7.164-16-16 0-88.224-71.776-160-160-160-8.836 0-16-7.164-16-16s7.164-16 16-16c105.869 0 192 86.131 192 192 0 8.836-7.163 16-16 16z" />
                                    <path
                                        d="m368.02 272c-8.836 0-16-7.164-16-16 0-52.935-43.065-96-96-96-8.836 0-16-7.164-16-16s7.164-16 16-16c70.58 0 128 57.42 128 128 0 8.836-7.163 16-16 16z" />
                                </g>
                            </svg>
                            <a>(+216) 71 236 155 - 71 767 177</a>
                        </li>
                    </ul>
                    <a href="{{ route('login') }}" class="st-top-header-btn st-smooth-move">Connexion</a>
                </div>
            </div>
        </div>
        <div class="st-main-header">
            <div class="container">
                <div class="st-main-header-in">
                    <div class="st-main-header-left">
                        <a class="st-site-branding" href="index.html"><img
                                src="https://barounilab.com/wp-content/uploads/2021/11/cropped-logo-BAROUNI.png"
                                style="width: 100%; max-width: 100px" /></a>
                    </div>
                    <div class="st-main-header-right">
                        <div class="st-nav">
                            <ul class="st-nav-list st-onepage-nav">
                                <li><a href="#home" class="st-smooth-move">Accueil</a></li>
                                <li><a href="#about" class="st-smooth-move">A propos</a></li>
                                <li><a href="#department" class="st-smooth-move">Remise des résultats des analyses</a>
                                </li>
                                <li><a href="#localisation" class="st-smooth-move">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Section -->

    <div class="st-content" id="home">
        <div class="st-height-b125 st-height-lg-b80"></div>
        <!-- Start Hero Seciton -->
        <div class="st-hero st-style1 st-dynamic-bg st-bg st-fixed-bg" style="height: 550px;"
            data-src="https://barounilab.com/wp-content/uploads/2022/04/immunofluorecsence.jpg">
            <div class="container">
                <div class="st-hero-text st-style1 text-center">
                    <h1 class="st-hero-title cd-headline clip cd-headline-style1" style="font-size: 41px;">
                        Notre laboratoire <br>
                        <span class=" cd-words-wrapper">
                            <b class="is-visible">est crée en en 1984.</b>
                            <b>est en modernisation <br>continue.</b>
                            <b>est doté des outils les <br> plus performants.</b>
                        </span>
                    </h1>
                    <div class="st-hero-subtitle"> - ESPACE CONFRÈRES - </div>
                </div>
            </div>
        </div>
        <!-- End Hero Seciton -->

        <!-- Start About Seciton -->
        <section class="st-about-wrap" id="about">
            <div class="st-shape-bg">
                <img src="{{ asset('style') }}/img/shape/about-bg-shape.svg" alt="shape">
            </div>
            <div class="st-height-b120 st-height-lg-b50"></div>
            <div class="container">
                <div class="st-section-heading st-style1">
                    <h2 class="st-section-heading-title">A propos</h2>
                    <div class="st-seperator">
                        <div class="st-seperator-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                        </div>

                        <div class="st-seperator-right wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                        </div>
                    </div>
                    <div class="st-section-heading-subtitle">Dans le cadre du système de management qualité et afin
                        d’améliorer notre collaboration ainsi que le bon déroulement du service de la sous-traitance,
                        nous avons établi des carnets dédiés aux demandes d’analyses ainsi qu’aux demandes de calcul
                        du risque de trisomie 13, 18 et 21.
                        Nous vous prions d’associer tout prélèvement à la demande correspondante dûment remplie.
                    </div>
                </div>
                <div class="st-height-b40 st-height-lg-b40"></div>
            </div>
        </section>
        <!-- End About Seciton -->

        <div class="st-height-b120 st-height-lg-b80"></div>

        <!-- Start department Section -->
        <section id="department">
            <div class="container">
                <div class="st-section-heading st-style1">
                    <h2 class="st-section-heading-title">Dates de réception et de remise des résultats des analyses
                        faites en série</h2>
                    <div class="st-seperator">
                        <div class="st-seperator-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                        </div>
                        <div class="st-seperator-right wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                        </div>
                    </div>
                </div>
                <div class="st-height-b40 st-height-lg-b40"></div>
            </div>
            <div class="container">
                <div class="st-tabs st-fade-tabs st-style1">
                    <ul class="st-tab-links st-style1 st-mp0">
                        <li class="st-tab-title active ">
                            <a href="#Crutches" class="st-blue-box">
                                <span>Sérologie des mycoplasmes uro-génitaux </span>
                            </a>
                        </li>
                        <li class="st-tab-title">
                            <a href="#X-ray" class="st-red-box">
                                <span>DOSAGE DE LA G6PD</span>
                            </a>
                        </li>
                        <li class="st-tab-title">
                            <a href="#Pulmonary" class="st-green-box">
                                <span>ELECTROPHORÈSE DE L’HÉMOGLOBINE</span>
                            </a>
                        </li>
                        <li class="st-tab-title">
                            <a href="#Cardiology" class="st-dip-blue-box">
                                <span>IgE SPÉCIFIQUES PHADIA</span>
                            </a>
                        </li>
                        <li class="st-tab-title">
                            <a href="#DentalCare" class="st-orange-box">
                                <span>PCR CHLAMYDIA TRACHOMATIS ET MYCOPLASMA</span>
                            </a>
                        </li>
                        <li class="st-tab-title">
                            <a href="#Neurology" class="st-gray-box">

                                <span>SÉROLOGIE DU KYSTE HYDATIQUE</span>
                            </a>
                        </li>
                    </ul>
                    <div class="st-height-b25 st-height-lg-b25"></div>
                    <div class="tab-content">
                        <div id="Crutches" class="st-tab active">
                            <div class="st-imagebox st-style2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                            <div class="st-shedule-wrap">
                                                <div class="st-shedule">
                                                    <h2 class="st-shedule-title">Dernier délai de réception
                                                    </h2>
                                                    <ul class="st-shedule-list">
                                                        <li>
                                                            <div class="st-shedule-left">Lundi</div>
                                                            <div class="st-shedule-right">14H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Mercredi</div>
                                                            <div class="st-shedule-right">14H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Vendredi</div>
                                                            <div class="st-shedule-right">14H </div>
                                                        </li>
                                                    </ul> <br>
                                                    <h2 class="st-shedule-title">Transmission des résultats
                                                    </h2>
                                                    <ul class="st-shedule-list">
                                                        <li>
                                                            <div class="st-shedule-left">Lundi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Mercredi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Vendredi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="st-vertical-middle">
                                            <div class="st-vertical-middle-in">
                                                <div class="st-imagebox-info">
                                                    <h2 class="st-imagebox-title">Sérologie des mycoplasmes
                                                        uro-génitaux</span>
                                                    </h2>
                                                </div>
                                                <div class="st-imagebox-btn">
                                                    <a href="https://barounilab.com/wp-content/uploads/2021/11/LABO-BAROUNI-GUIDE-2021-.pdf"
                                                        target="_blank"
                                                        class="st-btn st-style1 st-size-medium st-color1"> Télécharger
                                                        le guide</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="X-ray" class="st-tab">
                            <div class="st-imagebox st-style2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                            <div class="st-shedule-wrap">
                                                <div class="st-shedule">
                                                    <h2 class="st-shedule-title">Dernier délai de réception
                                                    </h2>
                                                    <ul class="st-shedule-list">
                                                        <li>
                                                            <div class="st-shedule-left">Mardi</div>
                                                            <div class="st-shedule-right">14H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Vendredi</div>
                                                            <div class="st-shedule-right">14H </div>
                                                        </li>
                                                    </ul> <br>
                                                    <h2 class="st-shedule-title">Transmission des résultats
                                                    </h2>
                                                    <ul class="st-shedule-list">
                                                        <li>
                                                            <div class="st-shedule-left">Mercredi</div>
                                                            <div class="st-shedule-right">12H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Samedi</div>
                                                            <div class="st-shedule-right">12H </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="st-vertical-middle">
                                            <div class="st-vertical-middle-in">
                                                <div class="st-imagebox-info">
                                                    <h2 class="st-imagebox-title">DOSAGE DE LA G6PD</span></h2>
                                                </div>
                                                <div class="st-imagebox-btn">
                                                    <a href="https://barounilab.com/wp-content/uploads/2021/11/LABO-BAROUNI-GUIDE-2021-.pdf"
                                                        target="_blank"
                                                        class="st-btn st-style1 st-size-medium st-color1"> Télécharger
                                                        le guide</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="Pulmonary" class="st-tab">
                            <div class="st-imagebox st-style2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                            <div class="st-shedule-wrap">
                                                <div class="st-shedule">
                                                    <h2 class="st-shedule-title">Dernier délai de réception
                                                    </h2>
                                                    <ul class="st-shedule-list">
                                                        <li>
                                                            <div class="st-shedule-left">Lundi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Jeudi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                    </ul> <br>
                                                    <h2 class="st-shedule-title">Transmission des résultats
                                                    </h2>
                                                    <ul class="st-shedule-list">
                                                        <li>
                                                            <div class="st-shedule-left">Mercredi</div>
                                                            <div class="st-shedule-right">10H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Samedi</div>
                                                            <div class="st-shedule-right">10H </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="st-vertical-middle">
                                            <div class="st-vertical-middle-in">
                                                <div class="st-imagebox-info">
                                                    <h2 class="st-imagebox-title">ELECTROPHORÈSE DE L’HÉMOGLOBINE</span>
                                                    </h2>
                                                </div>
                                                <div class="st-imagebox-btn">
                                                    <a href="https://barounilab.com/wp-content/uploads/2021/11/LABO-BAROUNI-GUIDE-2021-.pdf"
                                                        target="_blank"
                                                        class="st-btn st-style1 st-size-medium st-color1"> Télécharger
                                                        le guide</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="Cardiology" class="st-tab">
                            <div class="st-imagebox st-style2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                            <div class="st-shedule-wrap">
                                                <div class="st-shedule">
                                                    <h2 class="st-shedule-title">Dernier délai de réception
                                                    </h2>
                                                    <ul class="st-shedule-list">
                                                        <li>
                                                            <div class="st-shedule-left">Lundi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Jeudi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                    </ul> <br>
                                                    <h2 class="st-shedule-title">Transmission des résultats
                                                    </h2>
                                                    <ul class="st-shedule-list">
                                                        <li>
                                                            <div class="st-shedule-left">Mardi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Vendredi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="st-vertical-middle">
                                            <div class="st-vertical-middle-in">
                                                <div class="st-imagebox-info">
                                                    <h2 class="st-imagebox-title">IgE SPÉCIFIQUES PHADIA</span>
                                                    </h2>
                                                </div>
                                                <div class="st-imagebox-btn">
                                                    <a href="https://barounilab.com/wp-content/uploads/2021/11/LABO-BAROUNI-GUIDE-2021-.pdf"
                                                        target="_blank"
                                                        class="st-btn st-style1 st-size-medium st-color1"> Télécharger
                                                        le guide</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="DentalCare" class="st-tab">
                            <div class="st-imagebox st-style2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                            <div class="st-shedule-wrap">
                                                <div class="st-shedule">
                                                    <h2 class="st-shedule-title">Dernier délai de réception
                                                    </h2>
                                                    <ul class="st-shedule-list">
                                                        <li>
                                                            <div class="st-shedule-left">Lundi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Mercredi </div>
                                                            <div class="st-shedule-right">17H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Vendredi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                    </ul> <br>
                                                    <h2 class="st-shedule-title">Transmission des résultats
                                                    </h2>
                                                    <ul class="st-shedule-list">
                                                        <li>
                                                            <div class="st-shedule-left">Mardi</div>
                                                            <div class="st-shedule-right">17H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Jeudi</div>
                                                            <div class="st-shedule-right">17H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Samedi</div>
                                                            <div class="st-shedule-right">13H </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="st-vertical-middle">
                                            <div class="st-vertical-middle-in">
                                                <div class="st-imagebox-info">
                                                    <h2 class="st-imagebox-title">PCR CHLAMYDIA TRACHOMATIS ET
                                                        MYCOPLASMA
                                                        </span>
                                                    </h2>
                                                </div>
                                                <div class="st-imagebox-btn">
                                                    <a href="https://barounilab.com/wp-content/uploads/2021/11/LABO-BAROUNI-GUIDE-2021-.pdf"
                                                        target="_blank"
                                                        class="st-btn st-style1 st-size-medium st-color1"> Télécharger
                                                        le guide</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="Neurology" class="st-tab">
                            <div class="st-imagebox st-style2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                            <div class="st-shedule-wrap">
                                                <div class="st-shedule">
                                                    <h2 class="st-shedule-title">Dernier délai de réception
                                                    </h2>
                                                    <ul class="st-shedule-list">

                                                        <li>
                                                            <div class="st-shedule-left">Mercredi </div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Samedi</div>
                                                            <div class="st-shedule-right">13H </div>
                                                        </li>
                                                    </ul> <br>
                                                    <h2 class="st-shedule-title">Transmission des résultats
                                                    </h2>
                                                    <ul class="st-shedule-list">
                                                        <li>
                                                            <div class="st-shedule-left">Lundi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                        <li>
                                                            <div class="st-shedule-left">Jeudi</div>
                                                            <div class="st-shedule-right">18H </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="st-vertical-middle">
                                            <div class="st-vertical-middle-in">
                                                <div class="st-imagebox-info">
                                                    <h2 class="st-imagebox-title">SÉROLOGIE DU KYSTE HYDATIQUE
                                                        </span>
                                                    </h2>
                                                </div>
                                                <div class="st-imagebox-btn">
                                                    <a href="https://barounilab.com/wp-content/uploads/2021/11/LABO-BAROUNI-GUIDE-2021-.pdf"
                                                        target="_blank"
                                                        class="st-btn st-style1 st-size-medium st-color1"> Télécharger
                                                        le guide</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .st-tabs -->
            </div>
        </section>
        <!-- End department Section -->
        <div class="st-height-b120 st-height-lg-b80"></div>

        <div class="st-google-map" id="localisation">
            <div class=" st-section-heading st-style1">
                <h2 class="st-section-heading-title">Localisation</h2>
                <div class="st-seperator">
                    <div class="st-seperator-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                    </div>
                    <div class="st-seperator-right wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                    </div>
                </div>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3192.7568120891724!2d10.164985050204058!3d36.84829987259313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd3359ab1071a5%3A0xd32c9fbc95c687e4!2sLaboratoire%20d&#39;analyses%20m%C3%A9dicales%20Mohamed%20Nejib%20Barouni!5e0!3m2!1sen!2stn!4v1664520534979!5m2!1sen!2stn"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="st-height-b120 st-height-lg-b80"></div>


    <!-- Start Footer -->
    <footer class="st-site-footer st-sticky-footer st-dynamic-bg" data-src="{{ asset('style') }}/img/footer-bg.png">
        <div class="st-main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" id="contact-us">
                        <div class="st-footer-widget">
                            <div class="st-text-field">

                                <div class="st-height-b25 st-height-lg-b25"></div>
                                <div class="st-footer-text"
                                    style=" text-align: justify;text-justify: inter-word ;position: relative;top: 45px;">
                                    Notre laboratoire est en modernisation continue afin d’atteindre une parfaite
                                    concordance avec les exigences internationales en matière de management de la
                                    qualité de nos prestation.</div>
                                <div class="st-height-b25 st-height-lg-b25"></div>

                            </div>
                        </div>
                    </div><!-- .col -->
                    <div class="col-lg-4">
                        <div class="st-footer-widget" style="margin-left: 25px;">
                            <h2 class="st-footer-widget-title">Partenaires
                            </h2>
                            <ul class="st-footer-widget-nav st-mp0">
                                <li> <img src="https://barounilab.com/wp-content/uploads/2021/12/Labo-Cerba-1.jpg"
                                        width="130px" height="130px">
                                    <img src="https://barounilab.com/wp-content/uploads/2021/12/LOGOOOO-1024x1024.png"
                                        width="130px" height="130px"> <br>
                                    <img src="https://barounilab.com/wp-content/uploads/2021/12/biomnis-2.png"
                                        width="130px" height="130px">
                                </li>

                            </ul>
                        </div>
                    </div><!-- .col -->

                    <div class="col-lg-4">
                        <div class="st-footer-widget">
                            <h2 class="st-footer-widget-title">Contacts</h2>
                            <ul class="st-footer-contact-list st-mp0">
                                <li><span class="st-footer-contact-title">Address:</span> Centre Médical EL FARABI - El
                                    Menzah 6 - Ariana 2091 - Tunisie
                                </li>
                                <li><span class="st-footer-contact-title">Email:</span> resultats@barounilab.com </li>
                                <li><span class="st-footer-contact-title">Phone:</span>(+216) 71 236 155 <br> (+216) 71
                                    767 177 </li>
                            </ul>
                        </div>
                    </div><!-- .col -->
                </div>
            </div>
        </div>
        <div class="st-copyright-wrap">
            <div class="container">
                <div class="st-copyright-in">
                    <div class="st-left-copyright">
                        <div class="st-copyright-text">&copy;2022 <b>Skipper System</b></div>
                    </div>
                    <div class="st-right-copyright">
                        <div id="st-backtotop"><i class="fas fa-angle-up"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Start Video Popup -->
    <div class="st-video-popup">
        <div class="st-video-popup-overlay"></div>
        <div class="st-video-popup-content">
            <div class="st-video-popup-layer"></div>
            <div class="st-video-popup-container">
                <div class="st-video-popup-align">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="about:blank"></iframe>
                    </div>
                </div>
                <div class="st-video-popup-close"></div>
            </div>
        </div>
    </div>
    <!-- End Video Popup -->

    <!-- Scripts -->
    <script src="{{ asset('style') }}/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{ asset('style') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('style') }}/js/isotope.pkg.min.js"></script>
    <script src="{{ asset('style') }}/js/jquery.slick.min.js"></script>
    <script src="{{ asset('style') }}/js/mailchimp.min.js"></script>
    <script src="{{ asset('style') }}/js/counter.min.js"></script>
    <script src="{{ asset('style') }}/js/lightgallery.min.js"></script>
    <script src="{{ asset('style') }}/js/ripples.min.js"></script>
    <script src="{{ asset('style') }}/js/wow.min.js"></script>
    <script src="{{ asset('style') }}/js/jQueryUi.js"></script>
    <script src="{{ asset('style') }}/js/textRotate.min.js"></script>
    <script src="{{ asset('style') }}/js/select2.min.js"></script>
    <script ript src="{{ asset('style') }}/js/main.js"></script>
</body>

</html>