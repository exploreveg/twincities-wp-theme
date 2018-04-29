<?php
/** content-single.php
 *
 * The template for displaying content in the single.php template
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 07.02.2012
 */


tha_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php tha_entry_top(); ?>
	
	<header>
		<?php
        the_title( '<h2 id="page-title">', '</h2>' );
        exploreveg_show_entry_meta();
        ?>
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
		<?php
        echo exploreveg_post_thumbnail( $post->ID );

		the_content();

		the_bootstrap_link_pages(); ?>
	</div><!-- .entry-content -->

    <div id="social-buttons" class="row">
      <div class="col-md-4 col-xs-12">
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
      </div>

      <div class="col-md-4 col-xs-12">
        <a href="https://twitter.com/share" class="twitter-share-button social-button" data-via="exploreveg">Tweet</a>
      </div>

      <div class="col-md-4 col-xs-12">
        <!-- Place this tag where you want the +1 button to render. -->
        <div class="g-plusone social-button"></div>
        <!-- Place this tag after the last +1 button tag. -->
        <script type="text/javascript">
          (function() {
          var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
          po.src = 'https://apis.google.com/js/plusone.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>
      </div>
    </div>

	<?php tha_entry_bottom(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php tha_entry_after();


/* End of file content-single.php */
/* Location: ./wp-content/themes/the-bootstrap/partials/content-single.php */
