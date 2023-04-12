<?php

/*
        *       Template Name: About Page
        *
        **/

get_header();
?>

<main class="page__about">
    <div class="about-bg">
        <div class="bg-overlay">

        </div>
        <div class="max-width">
            <div class="about">
                <p class="about-excerpt"><?= get_field('excerpt'); ?></p>
                <div class="about-content">
                    <img class="profile-picture" src="<?= get_field('profile_picture')['url']; ?>" alt="">
                    <div class="content">
                        <?= get_field('content'); ?>
                    </div>
                </div>
            </div>
            <div class="gallery">
                <?php
                $images = get_field('image_grid');
                if ($images) : ?>
                    <?php foreach ($images as $image) : ?>
                        <img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>" />
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="interests-expertise">
                <div class="personal-interests">
                    <h3>
                        Personal Interests
                    </h3>
                    <p><?= get_field('personal_interests'); ?></p>
                </div>
                <div class="areas-of-expertise">
                    <h3>
                        Areas of expertise
                    </h3>
                    <p><?= get_field('areas_of_expertise'); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="max-width">
        <div class="clients">
            <div class="clients-header">
                <h2><?= get_field("clients_title"); ?></h2>
                <p><?= get_field("clients_description"); ?></p>
            </div>
            <div class="clients-list">
                <?php
                $images = get_field('clients_list');
                if ($images) : ?>
                    <?php foreach ($images as $image) : ?>
                        <img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>" />
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_template_part('templates/components/form', 'register'); ?>

<?php
get_footer();
?>