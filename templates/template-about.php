<?php

/*
        *       Template Name: About Page
        *
        **/

get_header();
?>

<main class="page__about">
    <div class="page__about__container max-width">
        <div class="about">
            <div class="about-content">
                <div class="content">
                    <?= get_field('content'); ?>

                    <div class="cta-buttons">
                        <?php get_template_part('templates/partials/contact', 'buttons'); ?>
                    </div>
                </div>
                <img class="profile-picture" src="<?= get_field('profile_picture')['url']; ?>" alt="">
            </div>
        </div>
        
        <div class="clients">
            <div class="clients-header">
                <h2><?= get_field("clients_title"); ?></h2>
                <h3><?= get_field("clients_description"); ?></h3>
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

        <div class="design-process">
            <h3>My Design Process: The Path to User-Centered Solutions</h3>
            <div class="design-process-image">
                <?php get_template_part('templates/partials/design', 'process'); ?>
            </div>
            <div class="design-process-steps">
                <div class="step">
                    <h4>Empathize</h4>
                    <p>This foundational phase is about deeply understanding the users, their context, pain points, needs, and motivations. This involves user interviews, field studies, competitive analysis, and synthesizing research to move beyond assumptions.</p>
                </div>
                <div class="step">
                    <h4>Define</h4>
                    <p>I take the insights gathered during Empathise and clearly articulate the core problem. This phase results in clearly defined problem statements, user personas, and job-to-be-done statements that guide the entire project.</p>
                </div>
                <div class="step">
                    <h4>Ideate</h4>
                    <p>This is the expansive, creative phase where I generate a wide range of potential solutions. It involves collaborative brainstorming, sketching, and feature prioritization based on technical feasibility and user value.</p>
                </div>
                <div class="step">
                    <h4>Design</h4>
                    <p>Based on the strongest ideas, I move into detailed design, translating concepts into tangible wireframes, high-fidelity mockups, and interactive prototypes. This phase makes the vision testable.</p>
                </div>
                <div class="step">
                    <h4>Implement</h4>
                    <p>The finalized design is handed off to engineering partners. I work closely with development teams to ensure pixel-perfect delivery and provide necessary assets, specifications, and continuous design support throughout the build phase.</p>
                </div>
                <div class="step">
                    <h4>Test & Learn</h4>
                    <p>Once live or in a test environment, the solution is validated with real users. This involves usability testing, A/B testing, and analyzing performance metrics to gauge the solution's effectiveness and identify areas for improvement.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_template_part('templates/components/form', 'register'); ?>

<?php
get_footer();
?>