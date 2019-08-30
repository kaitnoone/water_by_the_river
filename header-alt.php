<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes();?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes();?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes();?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes();?> class="no-js">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <?php // Google Chrome Frame for IE ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php wp_title('');?></title>

        <?php // mobile meta (hooray!) ?>
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
        <link rel="apple-touch-icon"
            href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
        <!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
        <?php // or, set /favicon.ico for IE10 win ?>
        <meta name="msapplication-TileColor" content="#f01d4f">
        <meta name="msapplication-TileImage"
            content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

        <link href='http://fonts.googleapis.com/css?family=Exo+2:400,400italic,700,700italic' rel='stylesheet'
            type='text/css'>
        <link rel="pingback" href="<?php bloginfo('pingback_url');?>">

        <?php // wordpress head functions ?>
        <?php wp_head();?>
        <?php // end of wordpress head ?>

        <?php // drop Google Analytics Here ?>
        <?php // end analytics ?>

    </head>

    <body class='tcc'>
        <div id='flowerright'></div>
        <div id='flowerleft'></div>
        <div id="container">

            <header class="header" role="banner">

                <div id="inner-header" class="wrap clearfix">

                    <?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
                    <div id='header-left'>
                        <h1 id="logo" class='tcc'><a href="<?php echo home_url(); ?>"
                                rel="nofollow"><?php bloginfo('name');?></a></h1>
                    </div>
                    <div id='header-right'>
                        <div class='clearfix'>
                            <div id='contact'>
                                <h6>(402) 488-6100</h6>
                                Mind.Body.Balance<br/>
7001 A Street, Suite 100<br/>
Lincoln, NE 68510
                            </div>

                            <a href='/' id='learn-more'>
                                Learn more about
                                <hr />
                                <strong>Water By The River
                                    Asian Medicine Clinic</strong>
                            </a>
                        </div>
                    </div>

                    <nav role="navigation clearfix">
                        <?php bones_secondary_nav('tccmenu');?>
                    </nav>

                    <?php // if you'd like to use the site description you can un-comment it below ?>
                    <?php // bloginfo('description'); ?>

                </div>
            </header>