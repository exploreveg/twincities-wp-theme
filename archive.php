<?php
/** archive.php
 *
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

          <header>
            <h2 id="page-title">
              <?php
              if ( is_day() ) :
                  printf( __( 'Daily Archives: %s', 'the-bootstrap' ), '<span>' . get_the_date() . '</span>' );
              elseif ( is_month() ) :
                  printf( __( 'Monthly Archives: %s', 'the-bootstrap' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
              elseif ( is_year() ) :
                  printf( __( 'Yearly Archives: %s', 'the-bootstrap' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
              else :
                  if ( is_post_type_archive('weekly_update') ) {
                      _e( 'Weekly Update', 'the-bootstrap' );
                  }
                  else if ( is_post_type_archive('volunteer_newsletter') ) {
                      _e( 'Volunteer Newsletter', 'the-bootstrap' );
                  }
                  else {
                      _e( 'Blog Archives', 'the-bootstrap' );
                  }
              endif; ?>
            </h2>
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

/* End of file archive.php */
/* Location: ./wp-content/themes/the-bootstrap/archive.php */
