<?php
/** home.php
 *
 * Template Name: Veg Fest From Start to Finish Page
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
          get_template_part( '/partials/content', 'page' );
          comments_template();

          tha_content_bottom(); ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar();
        ?>
      </div>

<?php
get_footer();


/* End of file page.php */
/* Location: ./wp-content/themes/the-bootstrap/page.php */
