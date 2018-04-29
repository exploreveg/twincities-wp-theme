<?php
/** search.php
 *
 * The template for displaying Search Results pages.
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

          $title = have_posts() ? 'Search Results for: ' . get_search_query() : 'No Results Found';
          ?>

          <article>
            <header>
              <h2 id="page-title"><?php echo $title ?></h2>
            </header>

          <?php
          if ( have_posts() ) :
              echo exploreveg_show_all_posts($wp_query);
          else :
              ?>
            <div class="entry-content clearfix">
              <p>Nothing on the site matched your search. Please try again with different keywords.</p>
            </div>
          <?php
          endif;
        
          tha_content_bottom(); ?>
          </article>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();

/* End of file search.php */
/* Location: ./wp-content/themes/the-bootstrap/search.php */