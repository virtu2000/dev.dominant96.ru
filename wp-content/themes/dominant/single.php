<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dominant
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			?>
            <section>
            <div class="container">
                <div class="row">
                    <?=print_breadcrumbs();?>
                    <div class="col"><h1 class="section-title"><?php the_title() ?></h1></div>
                </div>
                <div class="row">
                    <div class="col"><?php the_content() ?></div>
                </div>
                <?php if ( comments_open() || get_comments_number() ) : ?>
                <div class="row">
                    <div class="col"><?php //comments_template(); ?></div>
                </div>

			    <?php endif; ?>
            </div>
            </section>
            <?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
