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
            <div class="bgwhite">
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
                            <?php if ($briefGroup['design_process_image']) { ?>
                                <img src="<?= $briefGroup['design_process_image']['url'] ?>" alt="<?= $briefGroup['design_process_image']['title'] ?>" />
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            <?php
            $briefGroup2 = get_field('brief_group_2');
            if ($briefGroup2['show_brief_group_2'] == true) {
            ?>
                <div class="the-brief-group bg<?= $briefGroup2['background'] ?> section-padding">
                    <div class="max-width">
                        <div class="the-brief-group-2-grid">
                            <?php if ($briefGroup2['discovery_constraints']) { ?>
                            <div class="the-brief-discovery_constraints">
                                <h3>Discovery & Constraints</h3>
                                <p><?= $briefGroup2['discovery_constraints'] ?></p>
                            </div>
                            <?php } ?>
                            <div class="the-brief-target_users">
                                <h3>Target Users</h3>
                                <?php if ($briefGroup2['target_users_description']) { ?>
                                    <p><?= $briefGroup2['target_users_description'] ?></p>
                                <?php } ?>
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
                                <?php if ($briefGroup2['research_methods']) { ?>
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
                                <?php } ?>
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
                ?>
                <div class="research-group bg<?= $researchGroup['background'] ?> section-padding">
                    <div class="max-width">
                        <h2 class="tab-title">research 🔬</h2>
                        <?php
                        if ($researchGroup['background_research'] != '') {
                        ?>
                        <div class="research-background">
                            <h3>Background Research</h3>
                            <p><?= $researchGroup['background_research'] ?></p>
                        </div>
                        <?php
                        }
                        ?>
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

                <!-- Research Group 1 -->
                <?php
                $researchGroup1 = get_field('research_group_1');
                if ($researchGroup1['show_research_group_1'] == true) {
                ?>
                    <div class="research-group-1 bg<?= $researchGroup1['background'] ?> section-padding">
                        <img class="mobile-only" src="<?= $researchGroup1['image']['url'] ?>" alt="<?= $researchGroup1['image']['title'] ?>" />
                        <div class="max-width">
                            <div class="research-content">
                                <div>
                                    <h3><?= $researchGroup1['title'] ?></h3>
                                    <?php if ($researchGroup1['description'] != '') { ?>
                                        <p><?= $researchGroup1['description'] ?></p>
                                    <?php } ?>
                                    <?php if ($researchGroup1['content'] != '') { ?>
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
                                    </div>
                                    <?php } ?>
                                </div>
                                <img class="desktop-only" src="<?= $researchGroup1['image']['url'] ?>" alt="<?= $researchGroup1['image']['title'] ?>" />
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <!-- Research Group 2 -->
                <?php
                $researchGroup2 = get_field('research_group_2');
                $competitiveBenchmarking = $researchGroup2['competitive_benchmarking'];
                $researchsubGroup1 = $researchGroup2['research_group_2_sub_group_1'];
                $researchsubGroup2 = $researchGroup2['research_group_2_sub_group_2'];
                $researchsubGroup3 = $researchGroup2['research_group_2_sub_group_3'];

                
                if ($researchGroup2['show_research_group_2'] == true) {
                    if ($researchsubGroup1['show_research_2_sub_group_1'] == true) {
                    ?>
                        <div class="research-group research-group-2-sub-1 bg<?= $researchsubGroup1['background'] ?> section-padding">
                            <div class="max-width">
                                <div class="research-content">
                                    <?php if ($researchsubGroup1['title']) { ?>
                                        <h3><?= $researchsubGroup1['title'] ?></h3>
                                    <?php } ?>
                                    <?php if ($researchsubGroup1['content']) { ?>
                                        <p><?= $researchsubGroup1['content'] ?></p>
                                    <?php } ?>
                                    <div class="research-group-questions-grid research-group-questions-grid--1">
                                        <?php
                                        $questions = $researchsubGroup1['questions'];
                                        foreach ($questions as $question) {
                                        ?>
                                            <div class="research-group-questions-grid--inner">
                                                <h4><?= $question['question'] ?></h4>
                                                <?php if($question['data']) { ?><span><?= $question['data'] ?></span> <?php } ?>
                                                <?php if($question['answer']) { ?><p><?= $question['answer'] ?></p> <?php } ?>
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
                    if ($competitiveBenchmarking['show_competitive_benchmarking'] == true) {
                    ?>
                        <div class="research-group competitive_benchmarking bg<?= $competitiveBenchmarking['background'] ?> section-padding">
                            <div class="max-width">
                                <div class="research-content">
                                    <?php if ($competitiveBenchmarking['title']) { ?>
                                        <h3><?= $competitiveBenchmarking['title'] ?></h3>
                                    <?php } ?>
                                    <?php if ($competitiveBenchmarking['content']) { ?>
                                        <p class="competitive_benchmarking-content"><?= $competitiveBenchmarking['content'] ?></p>
                                    <?php } ?>
                                    <div class="competitive_benchmarking-table">
                                        <table class="competitive_benchmarking-table--desktop">
                                            <tr>
                                                <th>Feature</th>
                                                <th>Competitive Bank</th>
                                                <th>Our Solution</th>
                                            </tr>
                                            <?php
                                            $tableData = $competitiveBenchmarking['feature_table'];
                                            foreach ($tableData as $tableRow) {
                                            ?>
                                            <tr>
                                                <td><?= $tableRow['feature'] ?></td>
                                                <td><?= $tableRow['competitive_bank'] ?></td>
                                                <td><?= $tableRow['solution'] ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                        <div class="competitive_benchmarking-table--mobile">
                                            <?php
                                            $tableData = $competitiveBenchmarking['feature_table'];
                                            foreach ($tableData as $tableRow) {
                                            ?>
                                                <div class="competitive_benchmarking-table--mobile-row">
                                                    <p><strong>Feature:</strong> <?= $tableRow['feature'] ?></p>
                                                    <p><strong>Competitive Bank:</strong> <?= $tableRow['competitive_bank'] ?></p>
                                                    <p><strong>Our Solution:</strong> <?= $tableRow['solution'] ?></p>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if ($researchsubGroup2['show_research_2_sub_group_2'] == true) {
                    ?>
                        <div class="research-group research-group-2-sub-2 bg<?= $researchsubGroup2['background'] ?> section-padding">
                            <img class="mobile-only" src="<?= $researchsubGroup2['image']['url'] ?>" alt="<?= $researchsubGroup2['image']['title'] ?>" />
                            <div class="max-width">
                                <div class="research-content">
                                    <h3><?= $researchsubGroup2['title'] ?></h3>
                                    <p><?= $researchsubGroup2['content'] ?></p>
                                    <div class="research-group-2-grid">
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
                                        <img class="desktop-only" src="<?= $researchsubGroup2['image']['url'] ?>" alt="<?= $researchsubGroup2['image']['title'] ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if ($researchsubGroup3['show_research_2_sub_group_3'] == true) {
                    ?>
                        <div class="research-group research-group-2-sub-3 bg<?= $researchsubGroup3['background'] ?> section-padding">
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
                                                    <?php if($question['data']) { ?><span><?= $question['data'] ?></span> <?php } ?>
                                                    <?php if($question['answer']) { ?><p><?= $question['answer'] ?></p> <?php } ?>
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

                <!-- Research Insights -->
                <?php
                $researchInsights = get_field('research_insights');
                if ($researchInsights['show_research_insights'] == true) {
                ?>
                    <div class="research-group-1 research_insights bg<?= $researchInsights['background'] ?> section-padding">
                        <img class="mobile-only" src="<?= $researchInsights['image']['url'] ?>" alt="<?= $researchInsights['image']['title'] ?>" />
                        <div class="max-width">
                            <div class="research-content">
                                <div>
                                    <h3 class="research-content-title"><?= $researchInsights['title'] ?></h3>
                                    <?php if ($researchInsights['description'] != '') { ?>
                                        <p class="research-content-description"><?= $researchInsights['description'] ?></p>
                                    <?php } ?>
                                    <?php if ($researchInsights['content'] != '') { ?>
                                    <div class="research-group-1-grid">
                                        <ul class="list-items">
                                            <?php
                                            $items = $researchInsights['content'];
                                            foreach ($items as $item) {
                                            ?>
                                                <li><?= $item['item'] ?></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                                <img class="desktop-only" src="<?= $researchInsights['image']['url'] ?>" alt="<?= $researchInsights['image']['title'] ?>" />
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>

                <!-- Research Insights -->
                <?php
                $informedDesign = get_field('informed_design');
                if ($informedDesign['show_informed_design'] == true) {
                ?>
                    <div class="research-group-1 informed_design bg<?= $informedDesign['background'] ?> section-padding">
                        <img class="mobile-only" src="<?= $informedDesign['image']['url'] ?>" alt="<?= $informedDesign['image']['title'] ?>" />
                        <div class="max-width">
                            <div class="research-content">
                                <div>
                                    <h3 class="research-content-title"><?= $informedDesign['title'] ?></h3>
                                    <?php if ($informedDesign['description'] != '') { ?>
                                        <p class="research-content-description"><?= $informedDesign['description'] ?></p>
                                    <?php } ?>
                                    <?php if ($informedDesign['content'] != '') { ?>
                                    <div class="research-group-1-grid">
                                        <ul class="list-items">
                                            <?php
                                            $items = $informedDesign['content'];
                                            foreach ($items as $item) {
                                            ?>
                                                <li><?= $item['item'] ?></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                                <img class="desktop-only" src="<?= $informedDesign['image']['url'] ?>" alt="<?= $informedDesign['image']['title'] ?>" />
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
                                <?php if ($problemGroup['description'] != '') { ?>
                                    <p class="problem-content-description"><?= $problemGroup['description'] ?></p>
                                <?php } ?>
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
                    <div class="problem-statement bg<?= get_field('problem_statement_background') ?> section-padding">
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
                                <?php if ($userflow['image']) { ?>
                                <img src="<?= $userflow['image']['url'] ?>" alt="<?= $userflow['image']['title'] ?>" />
                                <?php } ?>
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
                                <?php if (get_field("visual_identity_image")) { ?>
                                    <img src="<?= get_field("visual_identity_image")['url'] ?>" alt="<?= get_field("visual_identity_image")['title'] ?>" />
                                <?php } ?>
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
                        <div class="max-width user-testing-group-grid">
                            <div>
                                <h2 class="tab-title">user testing 🦸</h2>
                                <div class="user-testing-content">
                                    <h3><?= $userTestingGroup['title'] ?></h3>
                                    <?php if ($userTestingGroup['description'] != '') { ?>
                                        <p class="user-testing-content-description"><?= $userTestingGroup['description'] ?></p>
                                    <?php } ?>
                                    <img class="mobile-only" src="<?= $userTestingGroup['image']['url'] ?>" alt="<?= $userTestingGroup['image']['title'] ?>" />
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
                                    </div>
                                </div>
                            </div>
                            <img class="desktop-only" src="<?= $userTestingGroup['image']['url'] ?>" alt="<?= $userTestingGroup['image']['title'] ?>" />
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
                            <h2 class="tab-title"><?= $takeawaysGroup['title'] ?> 🎁</h2>
                            <div class="takeaways-content">
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
                <a href="#top" class="button button--with-icon">
                    <span>Back to Top</span>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.5 3L13.5 8M13.5 8L8.5 13M13.5 8H2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Other Projects Navigation -->
        <div class="other-projects-section section-padding">
            <div class="max-width">
                <h2 class="section-title">Keep Reading</h2>
                <p class="section-sub-title">More examples of design that drives results.</p>
                <div class="projects-slider-wrapper">
                    <div class="swiper projectsSwiper">
                        <div class="swiper-wrapper">
                            <?php
                            // Get other projects excluding the current one
                            $current_post_id = get_the_ID();
                            $other_projects = new WP_Query(array(
                                'post_type' => 'projects',
                                'posts_per_page' => -1,
                                'post__not_in' => array($current_post_id),
                                'orderby' => 'date',
                                'order' => 'DESC'
                            ));

                            if ($other_projects->have_posts()) :
                                while ($other_projects->have_posts()) : $other_projects->the_post();
                                    $company = get_field('project_name');
                                    $title = get_field('project_title');
                                    $description = get_field('short_description') ?: get_field('about_excerpt');
                            ?>
                                    <div class="swiper-slide">
                                        <div class="project-card">
                                            <div class="project-card-content">
                                                <?php if ($company) : ?>
                                                    <p class="project-company"><?= esc_html($company) ?></p>
                                                <?php endif; ?>
                                                <h3 class="project-title"><?= $title ? esc_html($title) : get_the_title() ?></h3>
                                                <?php if ($description) : ?>
                                                    <p class="project-description"><?= esc_html($description) ?></p>
                                                <?php endif; ?>
                                                <a href="<?= get_permalink() ?>" class="button button--ghost project-card__button">
                                                    <span>Read Case Study</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                    
                    <div class="projects-slider-navigation-arrows">
                        <div class="slider-arrow slider-arrow-prev" aria-label="Previous project">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <path d="M31.667 20.0013L8.33366 20.0013M8.33366 20.0013L20.0003 31.668M8.33366 20.0013L20.0003 8.33464" stroke="#1E1E1E" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        
                        <div class="slider-arrow slider-arrow-next" aria-label="Next project">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <path d="M8.3335 19.9987H31.6668M31.6668 19.9987L20.0002 8.33203M31.6668 19.9987L20.0002 31.6654" stroke="#1E1E1E" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();

