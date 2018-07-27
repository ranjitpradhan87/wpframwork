<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .col-md-8 -->
		<?php $layouts = array( 'layoutone', 'layouttwo' ); if( ! in_array( get_theme_mod( 'magnitheme_layouts' ), $layouts) ): ?>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div><!-- .col-md-4 -->
		<?php endif; ?>
	</div><!--.row-->
<?php

get_footer();
