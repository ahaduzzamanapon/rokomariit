<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KT36QHFJ');
    </script>
    <!-- End Google Tag Manager -->


    <meta charset="UTF-8">
    <title><?= $meta_title ?> | <?= $domain_title ?></title>

    <meta name="keywords" content="<?= isset($meta_keywords) ? $meta_keywords : '' ?>">
    <meta name="description" content="<?= isset($meta_description) ? $meta_description : '' ?>">
    <meta name="tag" content="<?= isset($meta_tag) ? $meta_tag : '' ?>">
    <!-- <?php
            if (isset($meta_tag)) {
                $meta_tag = $meta_tag;
            } else {
                $meta_tag = $meta_keywords;
            }
            ?>
    <meta name="tag" content="<?= $meta_tag ?>"> -->
    <meta name="author" content="Mysoftheaven (BD) Ltd.">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url(); ?>setting_img/<?= $setting->image_file1 ?>">
    <link rel="shortcut icon" href="<?= base_url(); ?>setting_img/<?= $setting->image_file1 ?>">

    <!-- CSS Global -->
    <link href="<?= base_url(); ?>fwedget/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>fwedget/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>fwedget/assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>fwedget/assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= base_url(); ?>fwedget/assets/plugins/owl-carousel2/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>fwedget/assets/plugins/owl-carousel2/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>fwedget/assets/plugins/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>fwedget/assets/plugins/swiper/css/swiper.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>fwedget/assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?= base_url(); ?>fwedget/assets/css/theme.css" rel="stylesheet">
    <!-- <link href="<?= base_url(); ?>fwedget/assets/css/responsive.css" rel="stylesheet"> -->

    <!-- Head Libs -->
    <script src="<?= base_url(); ?>fwedget/assets/plugins/modernizr.custom.js"></script>

    <!-- Google recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        dataLayer.push({

            'event': 'Pageview',

            'pagePath': '<?php echo current_url(); ?>',

            'pageTitle': '<?= $meta_title ?> | <?= $domain_title ?>',

            'visitorType': '<?= $this->session->userdata('user_id') == '' ? 'customer' : '' ?>',

            'location_id': "<?php echo $_SERVER['REMOTE_ADDR']; ?>"

        });

        // (function(w, d, s, l, i) {

        //     w[l] = w[l] || [];

        //     w[l].push({

        //         'gtm.start': new Date().getTime(),

        //         event: 'gtm.js'

        //     });

        //     var f = d.getElementsByTagName(s)[0],

        //         j = d.createElement(s),

        //         dl = l != 'dataLayer' ? '&l=' + l : '';

        //     j.async = true;

        //     j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;

        //     f.parentNode.insertBefore(j, f);

        // })(window, document, 'script', 'dataLayer', 'GTM-KT36QHFJ');
    </script>


    <style>
        @media screen and (min-width: 350px) and (max-width: 460px) {
            .navigation{
                background-color: #45a7e7 !important;
                border: 2px solid #45a7e7 !important;
            }

            .sf-menu > li > a {
                background-color: transparent !important;
            }
            .menu-toggle-close .fa {
                color: #45a7e7 !important;
                background-color: #fff;
            }

            .btn-grad-training {
                padding: 5px 0px !important;
            }

        }
    </style>


    <!-- End Google Tag Manager -->


    <!--[if lt IE 9]>
    <script src="assets/plugins/iesupport/html5shiv.js"></script>
    <script src="assets/plugins/iesupport/respond.min.js"></script>
    <![endif]-->
</head>

<body id="home" class="wide">
    <?php
    update_sitemap_txt(current_url());
    ?>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KT36QHFJ"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- PRELOADER -->
    <!-- <div id="preloader">
    <div id="preloader-status">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div id="preloader-title">Loading</div>
    </div>
    </div> -->
    <!-- /PRELOADER -->

    <!-- WRAPPER -->
    <div class="wrapper">

        <!-- HEADER -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-6 col-xs-10 top-icon hidden-xs">
                        <!-- <span class="hidden-sm hidden-xs"><i class="fa fa-clock-o "></i><?= date('d : F : Y h:i:A') ?></span> -->
                        <span><a href="mailto:<?= $setting->contact_email ?>" style="font-size:15px;"><i class="fa fa-envelope"></i><?= $setting->contact_email ?></a></span>
                        <span><!-- <? //=$setting->contact_number
                                    ?> --> <a href="tel:+8801775-015791" style="font-size:15px;"><i class="fa fa-phone"></i><b>+8801775-015791,+8801913-036591</b></a></span>
                        <span><a href="https://www.google.com/maps?q=rokomari+it" target="_blank" style="font-size:15px;"><i class="fa fa-map-marker"></i>Get Direction</a> </span>


                    </div><!-- /.top-bar-content -->

                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <ul class="social-icons pull-right">
                            <?php foreach ($social as $item): ?>
                                <li><a href="<?= $item->url ?>"><i class="fa <?= $item->icon ?>"></i></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div><!-- /.top-bar-socials -->
                </div>
            </div>
        </div><!-- /#top-bar -->

        <header class="header fixed">
            <div class="header-wrapper">
                <div class="container">

                    <!-- Logo -->
                    <div class="logo">
                        <a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>setting_img/<?= $setting->image_file ?>" alt="Rokomari IT Ltd" width=""></a>
                    </div>
                    <!-- /Logo -->


                    <!-- Mobile menu toggle button -->
                    <a href="#" class="menu-toggle btn ripple-effect btn-theme-transparent" style="border: 2px solid;" ;><i class="fa fa-bars fa-2x" style="margin-top: 15px; padding: 5px; width: 55px!important;background-color: #45a7e7;"></i></a>
                    <!-- /Mobile menu toggle button -->

                    <!-- Navigation -->
                    <nav class="navigation closed clearfix">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!-- navigation menu -->

                                <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                                <ul class="nav sf-menu">
                                    <li class="<?php if ($method == 'home') {
                                                    echo 'active';
                                                } ?>"><a href="<?= base_url(); ?>">Home</a></li>
                                    <li class="<?php if ($method == 'article') {
                                                    echo 'active';
                                                } ?>"><a href="#">About Us</a>
                                        <ul>
                                            <?php
                                            $i = 0;
                                            foreach ($article_list as $item) {
                                                $i = $i + 1;

                                            ?>
                                                <li><a href="<?= base_url() . 'article/' . $item->slug ?>"><?= $item->name ?></a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>

                                    <li class="<?php if ($method == 'service') {
                                                    echo 'active';
                                                } ?>"><a href="#">Services</a>
                                        <ul>
                                            <?php
                                            $i = 0;
                                            foreach ($services as $item) {
                                                $i = $i + 1;
                                            ?>
                                                <li><a href="<?= base_url() . 'service/' . $item->slug ?>"><?= $item->name ?></a>
                                                </li>

                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li class="<?php if ($method == 'packages') {
                                                    echo 'active';
                                                } ?>"><a href="<?= base_url() . 'packages' ?>">Packages</a>
                                    </li>
                                    <!-- <li class="<?php if ($method == 'pages') {
                                                        echo 'active';
                                                    } ?>"><a href="#">Pages</a>
                                        <ul>
                                            <?php
                                            $i = 0;
                                            foreach ($pages as $item) {
                                                $i = $i + 1;
                                            ?>
                                                <li><a href="<?= base_url() . 'pages/' . $item->page_link ?>"><?= $item->title ?></a>
                                                </li>

                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li> -->
                                    <!-- <li><a href="<?= base_url() . '#' ?>">E-Learning</a></li> -->
                                    <!-- <li class="<?php if ($method == 'events') {
                                                        echo 'active';
                                                    } ?>"><a href="<?= base_url() . 'events' ?>">Events</a></li> -->
                                    <li class="<?php if ($method == 'contact') {
                                                    echo 'active';
                                                } ?>"><a href="<?= base_url() . 'contact-us' ?>">Contact Us</a></li>

                                    <li class="training btn-grad-training"><a class="train" href="<?= base_url() . 'training' ?>">Training</a></li>
                                    <!-- training (Hide) -->
                                </ul>
                                <!-- /navigation menu -->
                            </div>
                        </div>
                        <!-- Add Scroll Bar -->
                        <div class="swiper-scrollbar"></div>
                    </nav>
                    <!-- /Navigation -->
                </div>
            </div>
        </header>