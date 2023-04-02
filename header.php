<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Blog" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php wp_title('|', true, 'right'); ?></title>
	<meta name="title" content="<?php wp_title('|', true, 'right'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<meta property="og:type" content="website">
	<meta property="og:url" content="https://hiteshrinanda.com">
	<meta property="og:title" content="<?php wp_title('|', true, 'right'); ?>">

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="icon" href="<?php bloginfo('template_directory'); ?>/assets/images/favicon.png" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/images/favicon.png" type="image/x-icon" />

	<?php
	if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply');
	wp_head();
	?>


</head>

<body <?php body_class(); ?>>