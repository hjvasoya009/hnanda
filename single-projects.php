<?php

/*
* 	Template Name: Project Detail
*	Template Post Type: Project
*
**/

get_header();
?>

<main class="single-project-page">
    <div class="hero-image">
        <img src="<?= get_field("hero_image")['url'] ?>" alt="<?= get_field("hero_image")['title'] ?>">
    </div>

    <div class="max-width single-project-page--wrapper">
        <?php
        if (get_field("show_tab_bar") == true) {
        ?>
            <div class="tabs-wrapper">
                <div class="tabs">
                    <ul>
                        <?php echo (get_field("show_brief") == true) ? '<li class="tab-item active"><a href="#the-brief">The Brief</a></li>' : '' ?>
                        <?php echo (get_field("show_research") == true) ? '<li class="tab-item"><a href="#research">Research</a></li>' : '' ?>
                        <?php echo (get_field("show_problem") == true) ? '<li class="tab-item"><a href="#problem">Problem</a></li>' : '' ?>
                        <?php echo (get_field("show_final_design") == true) ? '<li class="tab-item"><a href="#final-design">Final Design</a></li>' : '' ?>
                        <?php echo (get_field("show_user_testing") == true) ? '<li class="tab-item"><a href="#user-testing">User Testing</a></li>' : '' ?>
                        <?php echo (get_field("show_takeaways") == true) ? '<li class="tab-item"><a href="#takeaways">Takeaways</a></li>' : '' ?>
                    </ul>
                </div>
            </div>
        <?php
        }
        ?>

        <!-- The Brief -->
        <div id="the-brief" class="the-brief tab-section">
            <div class="the-brief-header">
                <h3><?= get_field("brief_title") ?></h3>
                <p><?= get_field("brief_description") ?></p>
            </div>

            <div class="the-brief-meta">
                <div>
                    <h4>Position</h4>
                    <span><?= get_field("brief_position") ?></span>
                </div>
                <div>
                    <h4>Project</h4>
                    <span><?= get_field("brief_project") ?></span>
                </div>
                <div>
                    <h4>Timleline</h4>
                    <span><?= get_field("brief_timeline") ?></span>
                </div>
                <div>
                    <h4>Tools Used</h4>
                    <span><?= get_field("brief_tools_used") ?></span>
                </div>
            </div>

            <?php
            if (get_field("brief_thumbnail") != '') {
            ?>
                <div class="the-brief-thumbnail">
                    <img src="<?= get_field("brief_thumbnail")['url'] ?>" alt="<?= get_field("brief_thumbnail")['title'] ?>">
                </div>
            <?php
            }
            ?>

            <div class="the-brief-content">
                <div><?= get_field("brief_content") ?></div>
            </div>
        </div>

        <!-- Research -->
        <?php
        if (get_field("show_research") == true) {
        ?>
            <div id="research" class="research tab-section">
                <p>Research Section</p>
            </div>
        <?php
        }
        ?>

        <!-- Problem -->
        <?php
        if (get_field("show_problem") == true) {
        ?>
            <div id="problem" class="problem tab-section">
                <p>Problem Section</p>
            </div>
        <?php
        }
        ?>

        <!-- Final Design -->
        <?php
        if (get_field("show_final_design") == true) {
        ?>
            <div id="final-design" class="final-design tab-section">
                <p>Final Design Section</p>
            </div>
        <?php
        }
        ?>

        <!-- User Testing -->
        <?php
        if (get_field("show_user_testing") == true) {
        ?>
            <div id="user-testing" class="user-testing tab-section">
                <p>User Testing Section</p>
            </div>
        <?php
        }
        ?>

        <!-- Takeaways -->
        <?php
        if (get_field("show_takeaways") == true) {
        ?>
            <div id="takeaways" class="takeaways tab-section">
                <p>Takeaways Section</p>
            </div>
        <?php
        }
        ?>

        <div class="page-nav">
            <div class="page-nav--wrapper">
                <a href="/" class="button">Back to home</a>
                <a href="#top" class="button">Top</a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
