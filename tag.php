<?php
/** tag.php
 *
 * The template for displaying Tag Results pages.
 *
 * @author      Konstantin Obenland
 * @package     The Bootstrap
 * @since       1.0.0 - 07.02.2012
 */

$is_multi_post = true;

get_header(); ?>

      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <?php tha_content_before(); ?>
          <?php tha_content_top();
        
        if ( have_posts() ) : ?>

          <header class="page-header">
              <h1 class="page-title"><?php
                  $title = single_tag_title( '', false );
                  $is_weekly_update = preg_match( '/^weekly-update/', $title );
                  if ($is_weekly_update) {
                      echo tag_description();
                  }
                  else {
                      printf( __( 'Tag Archives: %s', 'the-bootstrap' ), '<span>' . $title . '</span>' );
                  }
              ?></h1>
    
              <?php
              if ( !$is_weekly_update && ( $tag_description = tag_description() ) ) {
                  echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
              } ?>
          </header><!-- .page-header -->
    
          <div class="posts">
            <?php
              while ( have_posts() ) {
                  the_post();
                  get_template_part( '/partials/content', get_post_format() );
              }
              the_bootstrap_content_nav();
            ?>
          </div>
        <?php
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

/* End of file tag.php */
/* Location: ./wp-content/themes/the-bootstrap/tag.php */
