<?php
/** footer.php
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0	- 05.02.2012
 */
?>

      <?php tha_footer_before(); ?>
      <footer>
        <div id="footer-nav">
          <?php wp_nav_menu( array(
              'theme_location'    =>  'footer-menu',
              'depth'             =>  3,
              'fallback_cb'       =>  false,
              'walker'            =>  new The_Bootstrap_Nav_Walker,
          ) );
          ?>
        </div>

        <div id="colophon">
          <p>
<?php
$email = get_option('exploreveg-email');
if (! $email) {
    $email = 'info@exploreveg.org';
}
?>

            <strong>Email:</strong> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>

<?php
$phone = get_option('exploreveg-phone');
if ($phone) :
?>
            <br>
            <strong>Phone:</strong> <?php echo $phone; endif ?>
          </p>

          <p id="copyright">
            Copyright &copy; 2012-<?php print(Date("Y")); ?> Compassionate Action for Animals.
            <br>
            <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License"  src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/by-sa.png" /></a><br />All content on this site is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>, unless otherwise specified.
          </p>
        </div>
      </footer>
      <!-- <?php printf( __( '%d queries. %s seconds.', 'the-bootstrap' ), get_num_queries(), timer_stop(0, 3) ); ?> -->
      <?php wp_footer(); ?>

    </div>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  </body>
</html>
<?php


/* End of file footer.php */
/* Location: ./wp-content/themes/the-bootstrap/footer.php */
