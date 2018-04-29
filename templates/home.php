<?php
/** home.php
 *
 * Template Name: Home page
 *
 * @author 	Dave Rolsky
 * @package My Bootstrap - exploreveg
 */

get_header(); ?>

      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <?php tha_content_before(); ?>
          <?php tha_content_top();
        
          the_post();
          get_template_part( '/partials/content', 'front-page' );
          comments_template();

          tha_content_bottom(); ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();


/* End of file home.php */
/* Location: ./wp-content/themes/the-bootstrap/home.php */
