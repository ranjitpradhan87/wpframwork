<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header();
?>

	<div class="row">
		<?php if( get_theme_mod( 'magnitheme_layouts' ) == 'layoutone' ): ?>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div><!-- .col-md-4 -->
		<?php endif; ?>
			<div class="<?php $layouts = array( 'layoutone', 'layouttwo' ); if( in_array( get_theme_mod( 'magnitheme_layouts' ), $layouts) ) echo "col-md-12"; else echo "col-md-8"; ?>">

			<div id="primary" class="content-area">
				<main id="main" class="site-main">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<?php $layouts = array( 'layoutone', 'layouttwo' ); if( ! in_array( get_theme_mod( 'magnitheme_layouts' ), $layouts) ): ?>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div><!-- .col-md-4 -->
		<?php endif; ?>
	</div><!-- .row -->


	<?php
	
	get_footer();
