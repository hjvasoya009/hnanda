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

    <div class="single-project-page--wrapper">

        <!-- Tabs -->
        <?php
        if (get_field("show_tab_bar") == true) {
        ?>
            <div class="tabs-wrapper">
                <div class="tabs max-width">
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
            <div class="bgwhite section-padding">
                <div class="max-width">
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
                            <h4>Company</h4>
                            <span><?= get_field("brief_project") ?></span>
                        </div>
                        <div>
                            <h4>Timeline</h4>
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
            </div>

            <?php
            $briefGroup = get_field('brief_group');
            if ($briefGroup['prompt'] != '') {
            ?>
                <div class="the-brief-group bg<?= $briefGroup['background'] ?> section-padding">
                    <div class="max-width">
                        <h2 class="tab-title">The brief 🔎</h2>
                        <div class="the-brief-prompt">
                            <h3>Prompt</h3>
                            <p><?= $briefGroup['prompt'] ?></p>
                        </div>
                        <div class="the-brief-design-process">
                            <h3>Design Process</h3>
                            <p><?= $briefGroup['design_process'] ?></p>
                            <img src="<?= $briefGroup['design_process_image']['url'] ?>" alt="<?= $briefGroup['design_process_image']['title'] ?>" />
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            <?php
            $briefGroup2 = get_field('brief_group_2');
            if ($briefGroup2['target_users'] != '') {
            ?>
                <div class="the-brief-group bg<?= $briefGroup2['background'] ?> section-padding">
                    <div class="max-width">
                        <div class="the-brief-group-2-grid">
                            <div class="the-brief-target_users">
                                <h3>Target Users</h3>
                                <ul class="list-items">
                                    <?php
                                    $targetUsers = $briefGroup2['target_users'];
                                    foreach ($targetUsers as $targetUser) {
                                    ?>
                                        <li><?= $targetUser['user_group'] ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="the-brief-research_methods">
                                <h3>Research Methods</h3>
                                <ul class="list-items">
                                    <?php
                                    $researchMethods = $briefGroup2['research_methods'];
                                    foreach ($researchMethods as $researchMethod) {
                                    ?>
                                        <li><?= $researchMethod['method'] ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="the-brief-questions">
                                <h3>How Might We Questions</h3>
                                <ul class="list-items">
                                    <?php
                                    $questions = $briefGroup2['questions'];
                                    foreach ($questions as $question) {
                                    ?>
                                        <li><?= $question['question'] ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <!-- Research -->
        <?php
        if (get_field("show_research") == true) {
        ?>
            <div id="research" class="research tab-section">
                <!-- Research Group -->
                <?php
                $researchGroup = get_field('research_group');
                if ($researchGroup['background_research'] != '') {
                ?>
                    <div class="research-group bg<?= $researchGroup['background'] ?> section-padding">
                        <div class="max-width">
                            <h2 class="tab-title">research 🔬</h2>
                            <div class="research-background">
                                <h3>Background Research</h3>
                                <p><?= $researchGroup['background_research'] ?></p>
                            </div>
                            <div class="research-research_goals">
                                <h3>Research Goals</h3>
                                <ul class="list-items">
                                    <?php
                                    $researchGoals = $researchGroup['research_goals'];
                                    foreach ($researchGoals as $researchGoal) {
                                    ?>
                                        <li><?= $researchGoal['goal'] ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <!-- Research Group 1 -->
                <?php
                $researchGroup1 = get_field('research_group_1');
                if ($researchGroup1['title'] != '') {
                ?>
                    <div class="research-group-1 bg<?= $researchGroup1['background'] ?> section-padding">
                        <div class="max-width">
                            <div class="research-content">
                                <h3><?= $researchGroup1['title'] ?></h3>
                                <div class="research-group-1-grid">
                                    <ul class="list-items">
                                        <?php
                                        $items = $researchGroup1['content'];
                                        foreach ($items as $item) {
                                        ?>
                                            <li><?= $item['item'] ?></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                    <img src="<?= $researchGroup1['image']['url'] ?>" alt="<?= $researchGroup1['image']['title'] ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <!-- Research Group 2 -->
                <?php
                $researchGroup2 = get_field('research_group_2');
                $researchsubGroup1 = $researchGroup2['research_group_2_sub_group_1'];
                $researchsubGroup2 = $researchGroup2['research_group_2_sub_group_2'];
                $researchsubGroup3 = $researchGroup2['research_group_2_sub_group_3'];

                if ($researchsubGroup1['title'] != '') {
                ?>
                    <div class="research-group bg<?= $researchsubGroup1['background'] ?> section-padding">
                        <div class="max-width">
                            <div class="research-content">
                                <h3><?= $researchsubGroup1['title'] ?></h3>
                                <p><?= $researchsubGroup1['content'] ?></p>
                                <div class="research-group-questions-grid">
                                    <?php
                                    $questions = $researchsubGroup1['questions'];
                                    foreach ($questions as $question) {
                                    ?>
                                        <div class="research-group-questions-grid--inner">
                                            <h4><?= $question['question'] ?></h4>
                                            <div>
                                                <span><?= $question['data'] ?></span>
                                                <p><?= $question['answer'] ?></p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <?php
                if ($researchsubGroup2['content'] != '') {
                ?>
                    <div class="research-group bg<?= $researchsubGroup2['background'] ?> section-padding">
                        <div class="max-width">
                            <div class="research-content">
                                <h3><?= $researchsubGroup2['title'] ?></h3>
                                <p><?= $researchsubGroup2['content'] ?></p>
                                <div class="research-group-grid">
                                    <ul class="list-items">
                                        <?php
                                        $items = $researchsubGroup2['items'];
                                        foreach ($items as $item) {
                                        ?>
                                            <li><?= $item['item'] ?></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                    <img src="<?= $researchsubGroup2['image']['url'] ?>" alt="<?= $researchsubGroup2['image']['title'] ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <?php
                if (sizeof($researchsubGroup3['questions']) > 0) {
                ?>
                    <div class="research-group research-group-sub-3 bg<?= $researchsubGroup3['background'] ?> section-padding">
                        <div class="max-width">
                            <div class="research-content">
                                <div class="research-group-questions-grid research-group-sub-3-questions-grid">
                                    <?php
                                    $questions = $researchsubGroup3['questions'];
                                    foreach ($questions as $question) {
                                    ?>
                                        <div class="research-group-questions-grid--inner">
                                            <h4><?= $question['question'] ?></h4>
                                            <div>
                                                <span><?= $question['data'] ?></span>
                                                <p><?= $question['answer'] ?></p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <!-- Research Group 3 -->
                <?php
                $researchGroup3 = get_field('research_group_3');
                if ($researchGroup3['title'] != '') {
                ?>
                    <div class="research-group-3 bg<?= $researchGroup3['background'] ?> section-padding">
                        <div class="max-width">
                            <div class="research-content">
                                <h3><?= $researchGroup3['title'] ?></h3>
                                <p><?= $researchGroup3['content'] ?></p>
                                <img src="<?= $researchGroup3['image']['url'] ?>" alt="<?= $researchGroup3['image']['title'] ?>" />
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        <?php
        }
        ?>

        <!-- Problem -->
        <?php
        if (get_field("show_problem") == true) {
        ?>
            <div id="problem" class="problem tab-section">
                <?php
                $problemGroup = get_field('research_findings_painpoints');
                if ($problemGroup['title'] != '') {
                ?>
                    <div class="problem-group bg<?= $problemGroup['background'] ?> section-padding">
                        <div class="max-width">
                            <h2 class="tab-title">Problem 🤔</h2>
                            <div class="problem-content">
                                <h3><?= $problemGroup['title'] ?></h3>
                                <ul class="list-items">
                                    <?php
                                    $items = $problemGroup['content'];
                                    foreach ($items as $item) {
                                    ?>
                                        <li><?= $item['item'] ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <?php
                if (get_field('problem_statement') != '') {
                ?>

                    <div class="problem-statement bggreen section-padding">
                        <div class="max-width">
                            <h3>Problem Statement</h3>
                            <p><?= get_field('problem_statement') ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>

                <?php
                $userflow = get_field('userflow');
                if ($userflow['content'] != '') {
                ?>
                    <div class="problem-userflow bg<?= $userflow['background'] ?> section-padding">
                        <div class="max-width">
                            <div class="problem-content">
                                <h3>Userflows</h3>
                                <p><?= $userflow['content'] ?></p>
                                <img src="<?= $userflow['image']['url'] ?>" alt="<?= $userflow['image']['title'] ?>" />
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>

        <!-- Final Design -->
        <?php
        if (get_field("show_final_design") == true) {
        ?>
            <div id="final-design" class="final-design tab-section">
                <?php
                if (get_field("design_decision") != '') {
                ?>
                    <div class="final-design-group section-padding">
                        <div class="max-width">
                            <h2 class="tab-title">final design 👩🏼‍🎨</h2>
                            <div class="final-design-design_decision">
                                <h3>Design Decision</h3>
                                <p><?= get_field("design_decision") ?></p>
                            </div>
                            <div class="final-design-visual_identity">
                                <h3>Visual Identity</h3>
                                <p><?= get_field("visual_identity") ?></p>
                                <img src="<?= get_field("visual_identity_image")['url'] ?>" alt="<?= get_field("visual_identity_image")['title'] ?>" />
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <?php
                $prototype = get_field('prototype');
                if ($prototype['content'] != '') {
                ?>
                    <div class="final-design-prototype bg<?= $prototype['background'] ?> section-padding">
                        <div class="max-width">
                            <div class="problem-content">
                                <h3>Prototype</h3>
                                <p><?= $prototype['content'] ?></p>
                                <?php
                                if ($prototype['prototype_file']['type'] == 'image') {
                                ?>
                                    <img src="<?= $prototype['prototype_file']['url'] ?>" alt="<?= $prototype['prototype_file']['title'] ?>" />
                                <?php
                                } else if ($prototype['prototype_file']['type'] == 'video') {
                                ?>
                                    <video controls="" controlslist="nodownload">
                                        <source src="<?= $prototype['prototype_file']['url'] ?>" type="<?= $prototype['prototype_file']['mime_type'] ?>">
                                        Your browser does not support HTML5 video.
                                    </video>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <?php
                if (get_field('impact') != '') {
                ?>
                    <div class="final-design-impact section-padding">
                        <div class="max-width">
                            <h3>Impact</h3>
                            <p><?= get_field('impact') ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>

        <!-- User Testing -->
        <?php
        if (get_field("show_user_testing") == true) {
        ?>
            <div id="user-testing" class="user-testing tab-section">
                <?php
                $userTestingGroup = get_field('user_testing_group');
                if ($userTestingGroup['title'] != '') {
                ?>
                    <div class="user-testing-group bg<?= $userTestingGroup['background'] ?> section-padding">
                        <div class="max-width">
                            <h2 class="tab-title">user testing 🦸</h2>
                            <div class="user-testing-content">
                                <h3><?= $userTestingGroup['title'] ?></h3>
                                <div class="user-testing-group-grid">
                                    <ul class="list-items">
                                        <?php
                                        $items = $userTestingGroup['content'];
                                        foreach ($items as $item) {
                                        ?>
                                            <li><?= $item['item'] ?></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                    <img src="<?= $userTestingGroup['image']['url'] ?>" alt="<?= $userTestingGroup['image']['title'] ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>

        <!-- Takeaways -->
        <?php
        if (get_field("show_takeaways") == true) {
        ?>
            <div id="takeaways" class="takeaways tab-section">
                <?php
                $takeawaysGroup = get_field('takeaways_group');
                if ($takeawaysGroup['title'] != '') {
                ?>
                    <div class="takeaways-group bg<?= $takeawaysGroup['background'] ?> section-padding">
                        <div class="max-width">
                            <h2 class="tab-title">Takeaways 🎁</h2>
                            <div class="takeaways-content">
                                <h3><?= $takeawaysGroup['title'] ?></h3>
                                <p><?= $takeawaysGroup['content'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>

        <div class="page-nav max-width">
            <div class="page-nav--wrapper">
                <a href="/" class="button">Back to home</a>
                <a href="#top" class="button">Top</a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
