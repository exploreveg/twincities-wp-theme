<?php
/** category.php
 *
 * The template for displaying Category Archive pages.
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 05.02.2012
 */

get_header(); ?>

      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <?php tha_content_before(); ?>
          <?php tha_content_top();

		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php
					printf( __( 'Category Archives: %s', 'the-bootstrap' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
	
				<?php if ( $category_description = category_description() ) {
					echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
				} ?>
			</header><!-- .page-header -->
	
			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( '/partials/content', get_post_format() );
			}
			the_bootstrap_content_nav();
		else :
			get_template_part( '/partials/content', 'not-found' );
		endif;
		
        tha_content_bottom(); ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();


/* End of file index.php */
/* Location: ./wp-content/themes/the-bootstrap/category.php */