<?php
/** page.php
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @author      Konstantin Obenland
 * @package     The Bootstrap
 * @since       1.0.0 - 07.02.2012
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
           get_sidebar(); ?>
      </div>

<?php
get_footer();


/* End of file page.php */
/* Location: ./wp-content/themes/the-bootstrap/page.php */
