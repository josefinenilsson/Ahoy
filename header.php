<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title( '/', true, 'right' ); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script defer src="<?php bloginfo('template_directory') ?>/js/jquery.fitvids.js"></script>
</head>
<body>
    <header class="main-header">
        <a href="/" class="site-info"><img class="site-logo" src="<?php bloginfo('template_directory') ?>/img/logo.png"><span class="site-title"><?php bloginfo('name'); ?></span></a>
        <?php wp_nav_menu( array( 'menu_class' => 'menu', 'depth' => 1 , 'container' => 'nav', 'container_class' => 'primary-menu', 'container_id' => 'site-navigation', 'fallback_cb' => false) ); ?>
    </header>