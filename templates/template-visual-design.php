<?php

/*
        *       Template Name: Visual Design Page
        *
        **/

get_header();
?>

<main class="page__visual-design">
    <div class="page__visual-design__container max-width">
        <div class="projects-gallery">
        <?php
            for ($i=0; $i<=11; $i++) {
        ?>
                <div class="project-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/vd-placeholder.png" alt="Project Image">
                    <span class="project-name">Project <?php echo $i + 1; ?></span>
                </div>
        <?php
            }
        ?>
        </div>  
    </div>
</main>

<?php get_template_part('templates/components/form', 'register'); ?>

<?php
get_footer();
?>