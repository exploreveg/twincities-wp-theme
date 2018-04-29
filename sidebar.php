<?php
/** sidebar.php
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0	- 05.02.2012
 */

tha_sidebars_before(); ?>
        <section class="widget-area col-sm-3 col-xs-12">
<?php
if ( get_option('exploreveg-use-custom-sidebar') ) {
    get_template_part('sidebar', 'exploreveg');
}
else {
    get_template_part('sidebar', 'standard');
}
?>
        </section>
<?php
tha_sidebars_after();

/* End of file sidebar.php */
/* Location: ./wp-content/themes/the-bootstrap/sidebar.php */
