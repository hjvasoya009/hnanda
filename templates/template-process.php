<?php

/*
        *       Template Name: Process Page
        *
        **/

get_header();
?>

<main>
    <div class="page__process max-width">
        <h2>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-construction.svg" alt="Page under construction!">
            <span>Page under construction!</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-construction.svg" alt="Page under construction!">
        </h2>
        <p>Stay tuned for updates</p>
        <h3>In the meantime, you can view my <a href="/">work</a> or read <a href="/about">about</a> me</h3>
    </div>
</main>

<?php get_template_part('templates/components/form', 'register'); ?>

<?php
get_footer();
?>