<?php get_header(); ?>

	<main class="max-width">
		
		<?php if(have_posts()): ?>

			<h1 class="section-heading">
				Results for <em><?php echo get_search_query(); ?></em>:
			</h1>

			<div class="case-study-cards flex-row-wrapper flex-stretch">

				<?php while(have_posts()): the_post(); ?>
					
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>

				<?php endwhile; ?>

			</div>

		<?php else: ?>

			<div>
				<p class="section-heading">
					Nothing found under the term "<em><?php echo get_search_query(); ?></em>".
				</p>
			</div>

		<?php endif; ?>

		<div class="section-heading">Search again:</div>
		<?php get_search_form(); ?>

	</main>

<?php get_footer(); ?>