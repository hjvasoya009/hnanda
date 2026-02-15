<?php

/*
        *       Template Name: Home Page
        *
        **/

get_header();
?>

<main class="homepage">
    <div class="homepage__container max-width">
        <section class="homepage__intro">
            <p class="homepage__intro-line">Experienced Product Designer (UI/UX & Visual) based in Vancouver.</p>
            <p class="homepage__intro-line">I specialize in managing the complete lifecycle of software product design, leveraging strategic thinking to transform complex challenges into clear, intuitive, and user-centric interfaces.</p>
        </section>

        <?php
        $projects = get_field('projects');
        $cards = [];

        if ($projects) {
            $index = 0;
            foreach ($projects as $post) {
                setup_postdata($post);

                $cards[] = array(
                    'alignment'   => ($index % 2 === 0) ? 'media-right' : 'media-left',
                    'media_style' => ($index % 2 === 0) ? 'media--red-diagonal' : 'media--split-red',
                    'thumbnail'   => ($thumb = get_field('thumbnail')) ? $thumb['url'] : '',
                    'company'     => get_field('project_name'),
                    'title'       => get_field('project_title'),
                    'description' => get_field('short_description') ?: get_field('about_excerpt'),
                    'link'        => '/projects/' . $post->post_name
                );

                $index++;
            }
            wp_reset_postdata();
        } else {
            // Static fallback to mirror provided design when dynamic data is missing
            $cards = array(
                array(
                    'alignment'   => 'media-right',
                    'media_style' => 'media--red-diagonal',
                    'thumbnail'   => '',
                    'company'     => 'HSBC BANK',
                    'title'       => 'Securing international transfers to prevent fraud and meet regulatory mandates',
                    'description' => 'Designing a fraud-proof cancellation flow that balances US government compliance with seamless user control within the HSBC mobile app.',
                    'link'        => '#'
                ),
                array(
                    'alignment'   => 'media-left',
                    'media_style' => 'media--split-red',
                    'thumbnail'   => '',
                    'company'     => 'HSBC BANK',
                    'title'       => 'Optimizing HSBC profile management to eliminate validation errors and improve data accuracy',
                    'description' => 'Streamlining the user-facing update flow by surfacing complex technical constraints upfront with the latest Global Design System.',
                    'link'        => '#'
                ),
            );
        }
        ?>

        <section class="homepage__projects">
            <?php foreach ($cards as $card) : ?>
                <?php $has_thumb = !empty($card['thumbnail']); ?>
                <article class="project-card project-card--<?= esc_attr($card['alignment']); ?>">
                    <div class="project-card__media <?= esc_attr($card['media_style']); ?><?= $has_thumb ? ' has-image' : ''; ?>">
                        <?php if ($has_thumb) : ?>
                            <img src="<?= esc_url($card['thumbnail']); ?>" alt="<?= esc_attr($card['title']); ?>">
                        <?php else : ?>
                            <div class="project-card__media-placeholder"></div>
                        <?php endif; ?>
                    </div>
                    <div class="project-card__info">
                        <?php if (!empty($card['company'])) : ?>
                            <span class="project-card__label"><?= esc_html($card['company']); ?></span>
                        <?php endif; ?>

                        <?php if (!empty($card['title'])) : ?>
                            <h2 class="project-card__title"><?= wp_kses_post($card['title']); ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($card['description'])) : ?>
                            <p class="project-card__description"><?= wp_kses_post($card['description']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($card['link'])) : ?>
                            <a href="<?= esc_url($card['link']); ?>" class="button button--ghost project-card__button">
                                <span>Read Case Study</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </div>
</main>

<?php
get_footer();
?>