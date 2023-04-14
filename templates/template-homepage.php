<?php

/*
        *       Template Name: Home Page
        *
        **/

get_header();
?>

<main>
    <div class="max-width">
        <div>
            <div class="intro">
                <p>
                    I am a ✨ <span>UI/UX & visual designer</span> ✨<br />
                    based in 📍Vancouver <br />
                    with experience in delivering end-to-end designs<br />
                    for software products.<br />
                    My ultimate goal as a designer is to <br />
                    <span>simplify complex concepts</span> through creative and intuitive design solutions.
                </p>
            </div>
            <div class="projects">
                <?php
                $projects = get_field('projects');
                if ($projects) {

                    foreach ($projects as $post) {
                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post);
                ?>
                        <div class="project" style='<?= (get_field('thumbnail')) ? "background-image: url(" . get_field('thumbnail')['url'] . ")" : "background: #F6BC9B;" ?>'>
                            <div class="project--inner">
                                <h2 class="project-title"><?= get_field('project_title'); ?> ✨</h2>
                                <div class="project-meta">
                                    <?php
                                    if (get_field('about_excerpt') != '') {
                                    ?>
                                        <div class="project-meta-content">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-laptop.svg" alt="About">
                                            <p>
                                                <span class="project-meta--heading">About:</span>
                                                <span class="project-meta--content"><?= get_field('about_excerpt'); ?></span>
                                            </p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (get_field('tools_excerpt') != '') {
                                    ?>
                                        <div class="project-meta-content">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-tools.svg" alt="Tools">
                                            <p>
                                                <span class="project-meta--heading">Tools:</span>
                                                <span class="project-meta--content"><?= get_field('tools_excerpt'); ?></span>
                                            </p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (get_field('tasks_excerpt') != '') {
                                    ?>
                                        <div class="project-meta-content">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-tasks.svg" alt="Tasks">
                                            <p>
                                                <span class="project-meta--heading">Tasks:</span>
                                                <span class="project-meta--content"><?= get_field('tasks_excerpt'); ?></span>
                                            </p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="project-cta">
                                    <a href="/projects/<?= $post->post_name; ?>" class="view-project">
                                        <span>view project</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</main>

<?php get_template_part('templates/components/form', 'register'); ?>

<?php
get_footer();
?>