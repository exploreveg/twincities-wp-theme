<?php
/** author.php
 *
 * The template for displaying Author Archive pages.
 *
 * @author      Konstantin Obenland
 * @package     The Bootstrap
 * @since       1.0.0 - 07.02.2012
 */

$is_multi_post = true;

get_header(); ?>

      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <?php
          tha_content_before();
          tha_content_top();

          $author = get_queried_object();
          ?>

          <header>
            <h2 id="page-title">
              <?php echo $author->display_name; ?>
            </h2>
            <?php echo get_avatar( get_the_author_meta( 'user_email', $author->ID ), 128 ); ?>
          </header>

          <?php if ( get_the_author_meta( 'description', $author->ID ) ) : ?>
          <p id="author-bio">
            <?php the_author_meta( 'description', $author->ID ); ?>
          </p>
          <?php
          endif;
          if ( have_posts() ) :
              the_post();
              rewind_posts();
              echo exploreveg_show_all_posts($wp_query);
          else :
          ?>
          <div class="entry-content clearfix">
            <p>Looks like this author hasn't written anything yet.</p>
          </div>
          <?php
          endif;
          tha_content_bottom(); ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();


/* End of file author.php */
/* Location: ./wp-content/themes/the-bootstrap/author.php */
